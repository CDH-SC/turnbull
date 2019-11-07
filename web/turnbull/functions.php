<?php
/**
 * @file functions.php
 * Functions used by the website.
 */

// Error Reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Definitions
//define("ROOT_FOLDER", "http://" . $_SERVER["HTTP_HOST"] . "/turnbull/");
define("ROOT_FOLDER", "/turnbull/");

/**
 * Grab files within a specified directory.
 *
 * @param {Array} $files: An array of filenames.
 * @param {string} $directory: The directory the $files parameter is in.
 * @return {Array}
 */
function grabFiles($files, $directory) {
  $array = array();

  foreach ($files as $file) {
    if ($file == "." || $file == "..") { continue; }

    $doc = new DOMDocument();
    $doc->load($directory . "/" . $file);

    $title  = determineTitle($doc->getElementsByTagName("title"));
    $info   = pathinfo($directory . "/" . $file);
    $number = intval(substr($info["filename"], 2, 3));

    // Manually modify the title.
    if ($directory == "appendices" && stripos($title, "Preface") !== false) {
      if (stripos($file, "1788") !== false) {
        $title = "Preface <em>(1788)</em>";
      } else {
        $title = "Preface <em>(1794)</em>";
      }
    } else if ($file == "asongsfromrecruit.xml") {
      $title = "Songs from <em>The Recruit</em>";
    } else if (in_array($number, array(47, 64, 74, 89, 93))) {
      $title = preg_replace(array("/\s+/", "/\z([?.!])/"), " ", $doc->getElementsByTagName("title")->item(1)->nodeValue);
    } else if ($number == 33) {
      $title = "The Bard";
    } else if ($number == 99) {
      // $title = "Song <span class='hide'> - Poems from Burns's Letter (1793)</span>";
    }

    if (substr($title, 0, 1) == "\"") {
      $title = substr($title, 1);
    }

    if (substr($title, strlen($title) - 1, 1) == "\"") {
      $title = substr($title, 0, -1);
    }

    $stats = array(
      "link" => str_replace(" ", "-", strtolower(preg_replace("/[^a-zA-Z 0-9]+/", "", $title))),
      "file" => $file,
      "title" => $title
    );

    array_push($array, $stats);
  } // foreach ($files as $file)

  // Manually rearrange list items.
  // 8/6/15 - Detect count() for search to not break.
  if ($directory == "appendices" && count($files) != 1) {
    $array = array_reverse($array);
  }

  return $array;
} // function grabFiles($files, $directory, $min = false, $max = false)

/**
 * Renders a navigational anchor.
 *
 * @param {Array} $item: The item to be rendered.
 * @return {string}
 */
function renderNavItem($item, $directory) {
  return "<a href='" . ROOT_FOLDER . $directory . "/" . $item["link"] . "' data-file='" . $item["file"] . "'>" . $item["title"] . "</a>";
} // function navItem($item)

/**
 * Determine the title of the poem.
 *
 * @param {DOMNodeList} $nodes: All variations of <title> within the DOMDocument.
 * @return {string}
 */
function determineTitle($nodes) {
  foreach ($nodes as $item) {
    if ($item->parentNode->nodeName == "head") {
      return preg_replace(array("/\s+/", "/\s([?.!])/"), " ", $item->firstChild->nodeValue);
    }
  }
} // function determineTitle($nodes)

/**
 * Get a poem based on the pre-determined title.
 *
 * @param {string} $title: Pre-determined title.
 * @param {string} $file: The name of the attached file.
 */
function findPoem($title, $file) {
  $doc = new DOMDocument();

  foreach (array("america", "appendices", "burns", "poems", "poetical") as $directory) {
    if (file_exists($directory . "/" . $file)) {
      $doc->load($directory . "/" . $file);
      break;
    }
  }

  renderPoem($doc);
} // function findPoem($title)

/**
 * Render a poem's XML.
 *
 * @param {DOMDocument} $document: The poem.
 */
function renderPoem($document) {
  $text = $document->getElementsByTagName("text");

  foreach ($text as $item) {
    hitBranch($item);
  }

  ?>
  <div class="col-xs-12">
    <div class="center-block" id="poem">
      <?php
      foreach ($text as $items) {
        foreach ($items->childNodes as $line) {
          print $line->ownerDocument->saveXML($line);
        }
      }
      ?>
    </div>
  </div>
  <?php
} // function renderPoem($document)

/**
 * Recursively go through the entire DOMDocument.
 *
 * @param {DOMNode} $node: The current node.
 */
function hitBranch($node) {
  if ($node->hasChildNodes()) {

    if ($node->nodeName == "head" && $node->firstChild->nodeName != "title") {
      $node = renameNode($node, "h3");
      $node->setAttribute("class", "text-center");
    } else if ($node->nodeName == "title") {
      $node = renameNode($node, "titler");
      $node->setAttribute("class", "text-center");
    }

    foreach ($node->childNodes as $child) {
      hitBranch($child);
    }
  } // if ($node->childNodes)
} // function hitBranch($node)

/**
 * Rename a node.
 *
 * @param {DOMElement} $oldNode: The node that is being renamed.
 * @param {string} $name: The new name.
 * @return {DOMElement}
 */
function renameNode($oldNode, $name) {
  $newNode = $oldNode->ownerDocument->createElement($name);

  while ($oldNode->firstChild) {
    $newNode->appendChild($oldNode->firstChild);
  }

  foreach ($oldNode->attributes as $attribute) {
    $newNode->setAttribute($attribute->nodeName, $attribute->nodeValue);
  }

  return $oldNode->parentNode->insertBefore($newNode, $oldNode->parentNode->childNodes->item(1));
} // function renameNode($oldNode, $name)

/**
 * Search through poems for a specified text.
 *
 * @param {string} $text: User submitted query.
 */
function searchPoems($query) {
  $query = trim($query);
  $files = array_merge(scandir("america"), scandir("appendices"), scandir("burns"), scandir("poems"), scandir("poetical"));
  $poems = array();

  foreach ($files as $file) {
    if ($file == "." || $file == "..") { continue; }

    $location = "";
    $document = new DOMDocument();

    foreach (array("america", "appendices", "burns", "poems", "poetical") as $directory) {
      if (file_exists($directory . "/" . $file)) {
        $document->load($directory . "/" . $file);
        $location = $directory;
        break;
      }
    }

    $find = false;
    $text = $document->getElementsByTagName("text");

    foreach ($text as $items) {
      foreach ($items->childNodes as $item) {
        $value = trim($item->nodeValue);

        if ($value === "") {
          continue;
        } else if (stripos($value, $query) !== false) {
          array_push($poems, array("file" => $file, "location" => $location));
          $find = true;
          break;
        } // if ($value === "")
      } // foreach ($item->childNodes as $item)
      if ($find) { break; }
    } // foreach ($text as $items)
  } // foreach ($files as $file)
  ?>
  <h1>Search</h1>
  <h3>Query: <?php print str_replace("-", " ", $query); ?></h3>

  <hr>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Category</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($poems as $item): ?>
        <?php $poem = grabFiles(array($item["file"]), $item["location"]); ?>
        <tr>
          <td><?php print $poem[0]["title"]; ?></td>

          <?php if ($item["location"] == "america"): ?>
            <td>Poems in America</td>
            <td><a href="<?php print ROOT_FOLDER; ?>america/<?php print $poem[0]["link"]; ?>" class="btn btn-primary">View</a></td>
          <?php elseif ($item["location"] == "appendices"): ?>
            <td>Appendices</td>
            <td><a href="<?php print ROOT_FOLDER; ?>appendices/<?php print $poem[0]["link"]; ?>" class="btn btn-primary">View</a></td>
          <?php elseif ($item["location"] == "burns"): ?>
            <td>Poems from Burns's Letter (1793)</td>
            <td><a href="<?php print ROOT_FOLDER; ?>burns/<?php print $poem[0]["link"]; ?>" class="btn btn-primary">View</a></td>
          <?php elseif ($item["location"] == "poems"): ?>
            <td><em>Poems</em> (1794)</td>
            <td><a href="<?php print ROOT_FOLDER; ?>poems/<?php print $poem[0]["link"]; ?>" class="btn btn-primary">View</a></td>
          <?php elseif ($item["location"] == "poetical"): ?>
            <td><em>Poetical Essays</em> (1788)</td>
            <td><a href="<?php print ROOT_FOLDER; ?>poetical/<?php print $poem[0]["link"]; ?>" class="btn btn-primary">View</a></td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php
} // function searchPoems($query)

<?php
/**
 * @file renderer.php
 * Class for a Renderer object.
 */

class Renderer {

  /**
   * Renders a random poem for the index page.
   */
  public function renderRandom() {
    $directories = array("america", "burns", "poems", "poetical");

    for ($i = 0; $i < 5; $i++) {
      $folder = $directories[rand(0, count($directories) - 1)];
      $files  = scandir($folder);
      $file   = $files[rand(2, count($files) - 1)];
      $poem   = new Poem($file, $folder);

      $document = new DOMDocument();
      $document->load($folder . "/" . $file);

      $line = $document->getElementsByTagName("l");
      ?>
      <a href="<?php print ROOT_FOLDER; ?>collections/<?php print $poem->getLink(); ?>" class="list-group-item">
        <h3 class="list-group-item-heading"><?php print $poem->getTitle(); ?></h3>
        <p class="list-group-item-text"><?php print $line->item(0)->removeChild($line->item(0)->firstChild)->nodeValue; ?></p>
        <p class="list-group-item-text"><?php print $line->item(1)->removeChild($line->item(1)->firstChild)->nodeValue; ?></p>
        <p class="list-group-item-text text-muted">...</p>
      </a>
      <?php
    } // for ($i = 0; $i < 5; $i++)
  } // public function renderRandom()

  /**
   * Renders a poem.
   *
   * @param {Poem} $poem: The poem object to be rendered.
   */
  public function renderPoem($poem) {
    $document = new DOMDocument();
    $document->load(ROOT_FOLDER . $poem->getDirectory() . "/" . $poem->getFile());

    $text = $document->getElementsByTagName("text");

    foreach ($text as $item) {
      $this->touchBranch($item);
    }

    $this->renderXMLContents($text);
  } // public function renderPoem($poem)

  /**
   * Renders a credit list.
   *
   * @param {String} $header: The header of the list.
   * @param {Array} $people: The array of people.
   */
  public function renderCredit($header, $people) {
    ?>
    <h2><?php print $header; ?></h2>
    <ul class="list-unstyled">
      <?php foreach ($people as $person): ?>
        <li><?php print $person; ?></li>
      <?php endforeach; ?>
    </ul>
    <?php
  } // public function renderCredit($header, $people)

  /**
   * Renders the interior of an XML document.
   * - Trims all 2 or more spaces.
   *
   * @param {DOMNodeList} $nodes: The elements to be rendered.
   */
  public function renderXMLContents($nodes) {
    foreach ($nodes as $node) {
      print preg_replace("!\s+!", " ", $node->ownerDocument->saveHTML());
    }
  } // public function renderXMLContents($nodes)

  /**
   * Recursive functionality that runs down the hierarchy tree and manipulates pre-specified nodes.
   *
   * @param {DOMNode} $node: The node to be touched.
   */
  private function touchBranch($node) {
    if ($node->hasChildNodes()) {
      // Rename <head> tags.
      if ($node->nodeName == "head") {
        $node = $this->renameNode($node, "h3");
        $node->setAttribute("class", "text-center");
      } // if ($node->nodeName == "head")

      // Run down it's children.
      foreach ($node->childNodes as $child) {
        $this->touchBranch($child);
      } // foreach ($node->childNodes as $child)
    } // if ($node->hasChildNodes())
  } // private function touchBranch($node)

  /**
   * Renames a DOMNode object.
   *
   * @param {DOMNode} $old: The old node to be renamed.
   * @param {String} $name: The name for the old node.
   * @return {DOMNode}
   */
  private function renameNode($old, $name) {
    $new = $old->ownerDocument->createElement($name);

    while ($old->firstChild) {
      $new->appendChild($old->firstChild);
    } // while ($old->firstChild)

    foreach ($old->attributes as $attribute) {
      $new->setAttribute($attribute->nodeName, $attribute->nodeValue);
    } // foreach ($old->attributes as $attribute)

    return $old->parentNode->insertBefore($new, $old->parentNode->childNodes->item(1));
  } // private function renameNode($old, $name)
} // class Renderer

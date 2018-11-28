<?php
/**
 * @file searcher.php
 * Class for a searching object.
 */

class Searcher {
  private static $lines;
  private static $query;

  public function __construct($query) {
    $this->lines = array();
    $this->query = $query;
  } // public function __construct($query)

  /**
   * Renders a table's content.
   *
   * @param {String} $directory: The directory of poems to be scanned.
   */
  public function render($directory) {
    $document = new DOMDocument();

    foreach (scandir($directory) as $file) {
      if ($file == "." || $file == "..") { continue; }

      $document->load(ROOT_FOLDER . $directory . "/" . $file);

      $this->scan($document->getElementsByTagName("text")->item(0));

      if (count($this->lines) !== 0) {
        $poem = new Poem($file, $directory);
        ?>
        <tr>
          <td><?php print $poem->getTitle(); ?></td>
          <td>
            <?php for ($i = 0; $i < count($this->lines); $i++): ?>
              <p><?php print $this->highlight($this->lines[$i]); ?></p>
            <?php endfor; ?>
          </td>
          <td><a href="<?php print ROOT_FOLDER . "collections/" . $poem->getLink(); ?>" class="btn btn-turnbull">View</a></td>
        </tr>
        <?php
        // Reset lines so we're not printing the same lines again.
        $this->lines = array();
      } // if (count($this->lines) !== 0)
    } // foreach (scandir($directory) as $file)
  } // public function render($directory)

  /**
   * Recursively run through the node hierarchy tree for the query location.
   *
   * @param {DOMNodeList} $nodes: The element to be searched for the query or look at it's child.
   */
  private function scan($nodes) {
    if ($nodes->hasChildNodes()) {
      foreach ($nodes->childNodes as $node) {
        $this->scan($node);
      }
    } else if (stripos($nodes->nodeValue, $this->query) !== false) {
      array_push($this->lines, $nodes->nodeValue);
    } // if ($nodes->hasChildNodes())
  } // private function scan($nodes)

  /**
   * Highlight the query within a text line.
   *
   * @param {String} $line: The line to be scanned.
   * @return {String}
   */
  private function highlight($line) {
    return substr($line, 0, stripos($line, $this->query)) . "<span style='font-weight: bold;'>" . $this->query . "</span>" . substr($line, stripos($line, $this->query) + strlen($this->query), strlen($line));
  } // private function highlight($line)
} // class Searcher

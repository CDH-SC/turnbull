<?php
/**
 * @file poem.php
 * Class for a poem object.
 */

class Poem {
  private static $file;
  private static $link;
  private static $title;
  private static $directory;

  public function __construct($file = "", $directory = "", $title = "", $link = "") {
    $this->file = $file;
    $this->link = $link;
    $this->title = $title;
    $this->directory = $directory;

    $this->finalize();
  } // public function __construct($file = "", $directory = "")

  /**
   * Finalizes a poem's values.
   * - Looks at each variable in a specific order if it is empty, then assign it.
   * - Assure that the title has all punctuation removed.
   */
  private function finalize() {
    if ($this->file === "") {
      $this->file = $this->determineFile();
    }

    if ($this->directory === "") {
      $this->directory = $this->determineDirectory();
    }

    if ($this->title === "") {
      $this->title = $this->determineTitle();
    }

    // Remove punctuation.
    if (substr($this->title, 0, 1) === "\"") {
      $this->title = substr($this->title, 1);
    }

    if (substr($this->title, -1) === "\"") {
      $this->title = substr($this->title, 0, -1);
    }

    if (substr($this->title, -1) === ".") {
      $this->title = substr($this->title, 0, -1);
    }

    if ($this->link === "") {
      $this->link = $this->determineLink();
    }
  } // public function finalize()

  /**
   * Determines a poem's file.
   *
   * Pre-needed values:
   * - Directory
   */
  private function determineFile() {
    if ($this->directory === "") {
      throw new Error("Unable to determine file. Directory is not specified.");
    }

    foreach (scandir($this->directory) as $file) {
      if ($file == "." || $file == "..") { continue; }

      // Create a temporary poem object that has a file and cross-check.
      $temp = new Poem($file, $this->directory);

      // If the compressed link is the actual URL: we've found the poem.
      if ($this->directory . "/" . $this->link === $temp->getLink()) {
        // If we're doing the above left combination, this means the link is not proper.
        $this->link = $this->directory . "/" . $this->link;

        return $file;
      }
    } // foreach (scandir($this->directory) as $file)
  } // private function determineFile()

  /**
   * Determines the directory the poem is located in.
   *
   * Pre-needed values:
   * - File
   *
   * @return {String}
   */
  private function determineDirectory() {
    if ($this->file === "") {
      throw new Error("Unable to determine directory. File is not specified.");
    }

    // Array contents are pre-determined directories.
    foreach (array("america", "appendices", "burns", "poems", "poetical") as $directory) {
      if (in_array(scandir($directory), $this->file)) {
        return $directory;
      } // if (in_array(scandir($directory), $this->file))
    } // foreach (array("america", "appendices", "burns", "poems", "poetical") as $directory)
  } // private function determineDirectory()

  /**
   * Determines a title of a poem.
   *
   * Pre-needed values:
   * - File
   * - Directory
   *
   * @return {String}
   */
  private function determineTitle() {
    if ($this->directory === "" || $this->file === "") {
      throw new Error("Unable to determine title. Directory or file is not specified.");
    }

    $document = new DOMDocument();
    $document->load(ROOT_FOLDER . $this->directory . "/" . $this->file);

    foreach ($document->getElementsByTagName("title") as $title) {
      if ($title->parentNode->nodeName === "head") {
        $value = $this->stripWhiteSpace($title->firstChild->nodeValue);

        // If need be, manually rename the title based on specifications.
        if ($this->directory == "appendices" && stripos($value, "Preface") !== false) {
          if (stripos($this->file, "1788") !== false) {
            return "Preface <em>(1788)</em>";
          } else {
            return "Preface <em>(1794)</em>";
          } // if (stripos($this->file, "1788") !== false)
        } else if ($this->file === "asongsfromrecruit.xml") {
          return "Songs from <em>The Recruit</em>";
        } else {
          $pathinfo = pathinfo($this->directory . "/" . $this->file);
          $filename = intval(substr($pathinfo["filename"], 2, 3));

          if (in_array($filename, array(47, 64, 74, 89, 93))) {
            return $this->stripWhiteSpace($document->getElementsByTagName("title")->item(1)->nodeValue);
          } else if ($filename === 33) {
            return "The Bard";
          } // if (in_array($filename, array(47, 64, 74, 89, 93)))

          return $value;
        } // if ($this->directory == "appendices" && stripos($this->title, "Preface") !== false)
      } // if ($title->parentNode->nodeName === "head")
    } // foreach ($document->getElementsByTagName("title") as $title)
  } // private function determineTitle()

  /**
   * Determines a poem's link.
   *
   * Pre-needed values:
   * - Title
   * - Directory
   *
   * @return {String}
   */
  private function determineLink() {
    if ($this->directory === "" || $this->title === "") {
      throw new Error("Unable to determine link. Directory or title is not specified.");
    }

    return $this->directory . "/" . str_replace(" ", "-", strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $this->title)));
  } // private function determineLink()

  /**
   * Strips all whitespace from a string.
   *
   * @param {String} $string: The string to be stripped.
   * @return {String}
   */
  private function stripWhiteSpace($string) {
    return preg_replace(array("/\s+/", "/\s([?.!])/"), " ", trim($string));
  } // private function stripWhiteSpace($string)

  public function getFile() {
    return $this->file;
  } // public function getFile()

  public function getLink() {
    return $this->link;
  } // public function getLink()

  public function getTitle() {
    return $this->title;
  } // public function getTitle()

  public function getDirectory() {
    return $this->directory;
  } // public function getDirectory()
} // class Poem

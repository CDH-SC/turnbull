<?php
/**
 * @file application.php
 * Main class of the website.
 */

class Application {
  private $title;
  private $classes;
  private $compass;
  private $scripts;

  public function __construct() {
    $this->title = "";
    $this->classes = array("bootstrap.css", "dataTables.bootstrap.css", "turnbull.css");
    $this->compass = array("Home", "About Turnbull", "About Project", "Poetical Essays", "Burns's Letter", "Poems", "Poems in America", "Appendices", "References", "Credits");
    $this->scripts = array("jquery.min.js", "bootstrap.min.js", "dataTables.min.js", "dataTables.bootstrap.min.js", "platform.min.js", "turnbull.js");
  } // public function __construct()

  /**
   * Renders the Navigation
   */
  public function renderNavigation() {
    // TODO 8/28/15: Active list item.
    ?>
    <ul class="nav navbar-nav">
      <?php foreach ($this->compass as $item): ?>
        <li class="<?php print $this->isActive($item); ?>"><a href="<?php print $this->renderLink($item); ?>"><?php print $item; ?></a></li>
      <?php endforeach; ?>
      <li><a href="<?php print ROOT_FOLDER; ?>search" id="search"><i class="glyphicon glyphicon-search"></i></a></li>
    </ul>

    <form class="form-horizontal col-xs-3" action="<?php print ROOT_FOLDER; ?>search" style="display: none;">
      <fieldset>
        <div class="form-group">
          <label class="control-label hide">Search</label>
          <div class="col-xs-12">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search Turnbull's poems">
          </div>
          <button type="submit" class="btn btn-primary hide">Search</button>
        </div>
      </fieldset>
    </form>
    <?php
  } // public function renderNavigation()

  private function renderLink($item) {
    if ($item === "Home") {
      return ROOT_FOLDER;
    } else if ($item === "About Gavin Turnbull") {
      return ROOT_FOLDER . "about/turnbull";
    } else if ($item === "About This Project") {
      return ROOT_FOLDER . "about/project";
    } else {
      return ROOT_FOLDER . strtolower($item);
    }
  }

  private function isActive($item) {
    $request = explode("/", $_SERVER["REQUEST_URI"]);

    // print "<p>" . $this->title . "</p>";
    // print "<pre>" . print_r($request, true) . "</pre>";
    // print "<p>" . $item . "</p>";

    // About page.
    if ($this->title === "About" && in_array("about", $request) && ($item === "About Gavin Turnbull" && in_array("turnbull", $request) || $item === "About This Project" && in_array("project", $request))) {
      return "active";
    }
  }

  public function setTitle($title) {
    $this->title = $title;
  } // public function setTitle($title)

  public function getTitle() {
    return $this->title;
  } // public function getTitle()

  public function getClasses() {
    return $this->classes;
  } // public function getClasses()

  public function getScripts() {
    return $this->scripts;
  } // public function getScripts()
} // class Application

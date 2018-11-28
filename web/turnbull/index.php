<?php
/**
 * @file index.php
 * Displays the main page.
 */
require_once "functions.php";
require_once "content.php";

if (isset($_GET["title"])) {
  $title = trim($_GET["title"]);

  switch ($title) {
    case "Home":
      printHome();
      break;
    case "About Gavin Turnbull":
      printGavin();
      break;
    case "About This Project":
      printProject();
      break;
    case "Credits and Acknowledgments":
      printCredits();
      break;
    case "Selected References":
      printReferences();
      break;
    default:
      findPoem($title, $_GET["file"]);
      break;
  }
  exit();
} // if (isset($_GET["title"]))

if (isset($_GET["search"])) {
  searchPoems(trim($_GET["search"]));
  exit();
} // if (isset($_GET["search"]))

$burns      = grabFiles(scandir("burns"), "burns");
$poems      = grabFiles(scandir("poems"), "poems");
$america    = grabFiles(scandir("america"), "america");
$poetical   = grabFiles(scandir("poetical"), "poetical");
$appendices = grabFiles(scandir("appendices"), "appendices");

?><!DOCTYPE html>
<html style="overflow: hidden;">
<head>
  <meta charset="UTF-8">

  <title>Turnbull Project</title>

  <?php foreach (array("bootstrap.min.css", "dataTables.bootstrap.css", "fancybox.css", "turnbull.css") as $class): ?>
    <link rel="stylesheet" href="<?php print ROOT_FOLDER; ?>css/<?php print $class; ?>">
  <?php endforeach; ?>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-65356438-1', 'auto');
    ga('send', 'pageview');
  </script>
</head>
<body>
  <noscript>
    <style>.container { display: none !important; }</style>
    <div>You need JavaScript activated to use this site.</div>
  </noscript>

  <header class="container">
    <div class="row">
      <div class="col-xs-12">
        <img src="<?php print ROOT_FOLDER; ?>img/turnbull_signature_transparent.png" class="img-responsive">

        <h1 class="pull-left">The Collected Poems of Gavin Turnbull Online</h1>

        <div class="alert alert-warning center-block col-xs-4 hide">
          <h2 class="text-center"></h2>
          <p>Unfortunately, this software cannot handle all features used on this website.</p>
          <p>We recommend you to <a href="" target="_blank"></a> or switch to another browser.</p>
        </div>

        <form class="navbar-form navbar-right" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row">
      <nav>
        <ul class="list-unstyled" style="margin-bottom: 0;">
          <li><a href="<?php print ROOT_FOLDER; ?>home">Home</a></li>
          <li><a href="<?php print ROOT_FOLDER; ?>about-project">About This Project</a></li>
          <li><a href="<?php print ROOT_FOLDER; ?>about-turnbull">About Gavin Turnbull</a></li>

          <li><a href="#"><em>Poetical Essays</em> (1788)<i class="glyphicon glyphicon-triangle-left"></i></a></li>
          <ul class="list-unstyled has-children" data-url="poetical" style="display: none;">
            <?php foreach ($poetical as $item): ?>
              <li><?php print renderNavItem($item, "poetical"); ?></li>
            <?php endforeach; ?>
          </ul>

          <li><a href="#">Poems from Burns's Letter (1793)<i class="glyphicon glyphicon-triangle-left"></i></a></li>
          <ul class="list-unstyled has-children" data-url="burns" style="display: none;">
            <?php foreach ($burns as $item): ?>
              <li><?php print renderNavItem($item, "burns"); ?></li>
            <?php endforeach; ?>
          </ul>

          <li><a href="#"><em>Poems</em> (1794)<i class="glyphicon glyphicon-triangle-left"></i></a></li>
          <ul class="list-unstyled has-children" data-url="poems" style="display: none;">
            <?php foreach ($poems as $item): ?>
              <li><?php print renderNavItem($item, "poems"); ?></li>
            <?php endforeach; ?>
          </ul>

          <li><a href="#">Poems in America<i class="glyphicon glyphicon-triangle-left"></i></a></li>
          <ul class="list-unstyled has-children" data-url="america" style="display: none;">
            <?php foreach ($america as $item): ?>
              <li><?php print renderNavItem($item, "america"); ?></li>
            <?php endforeach; ?>
          </ul>

          <li><a href="#">Appendices<i class="glyphicon glyphicon-triangle-left"></i></a></li>
          <ul class="list-unstyled has-children" data-url="appendices" style="display: none;">
            <?php foreach ($appendices as $item): ?>
              <li><?php print renderNavItem($item, "appendices"); ?></li>
            <?php endforeach; ?>
          </ul>

          <li><a href="<?php print ROOT_FOLDER; ?>selected-references">Selected References</a></li>
          <li><a href="<?php print ROOT_FOLDER; ?>credits-acknowledgments">Credits and Acknowledgments</a></li>
        </ul>
      </nav>

      <div class="col-xs-9 main" id="main"></div>
    </div>
  </div>

  <?php foreach (array("jquery.min.js", "bootstrap.min.js", "dataTables.min.js", "dataTables.bootstrap.min.js", "fancybox.js", "platform.min.js", "turnbull.js") as $script): ?>
    <script src="<?php print ROOT_FOLDER; ?>js/<?php print $script; ?>"></script>
  <?php endforeach; ?>

</body>
</html>

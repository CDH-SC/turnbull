<?php
/**
 * @file poems.php
 * Renders the poem page.
 */

require_once "includes/configuration.php";

if (isset($_GET["getTitles"], $_GET["category"])) {
  foreach (scandir($_GET["category"]) as $file) {
    if ($file == "." || $file == "..") { continue; }

    $poem = new Poem($file, $_GET["category"]);
    ?>
    <a href="<?php print ROOT_FOLDER; ?>collections/<?php print $poem->getLink(); ?>" class="list-group-item"><?php print $poem->getTitle(); ?></a>
    <?php
  } // foreach (scandir($_GET["category"]) as $file)
  return;
} // if (isset($_GET["getTitles"], $_GET["category"]))

if (isset($_GET["directory"], $_GET["title"])) {
  $poem = new Poem("", $_GET["directory"], "", $_GET["title"]);
  $application->setTitle($poem->getTitle() . " - " . ucfirst($poem->getDirectory()));
} else {
  $application->setTitle("Poems");
} // if (isset($_GET["directory"], $_GET["title"]))

require "layout/header.php";
?>
<?php if (isset($_GET["title"])): ?>
  <article class="container">
    <div class="row page-header">
      <div class="col-xs-12">
        <h1><?php print $poem->getTitle(); ?></h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-1">
        <?php
        $render = new Renderer();
        $render->renderPoem($poem);
        ?>
      </div>
    </div>
  </article>
<?php else: ?>
  <div class="container">
    <div class="row page-header">
      <div class="col-xs-12">
        <h1>Poems</h1>
      </div>
    </div>

    <div class="row">
      <?php foreach (array("<em>Poetical Essays</em> (1788)" => "poetical", "Poems from Burn's Letter (1793)" => "burns", "<em>Poems</em> (1794)" => "poems", "Poems in America" => "america", "Appendices" => "appendices") as $title=>$id): ?>
        <div class="col-xs-2" style="width: 20%;">
          <div class="panel panel-turnbull" id="<?php print $id; ?>">
            <div class="panel-heading text-center"<?php print $id === "burns" ? ' style="padding: 10px 0; font-size: 13px;"' : ""; ?>><?php print $title; ?></div>
            <div class="panel-body list-group">
              <p class="text-center" style="margin-bottom: 0;"><i class="glyphicon glyphicon-refresh glyphicon-refresh-animate" style="top: 2px; right: 3px;"></i> Loading...</p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>
<?php require "layout/footer.php"; ?>

<?php
/**
 * @file search.php
 * Renders the search page.
 */

require_once "includes/configuration.php";

$application->setTitle("Search");

require "layout/header.php";
?>
<div class="container">
  <div class="row page-header">
    <div class="col-xs-12">
      <h1>Search</h1>
    </div>
  </div>

  <?php if (isset($_GET["search"])): ?>
    <?php
    // Static database replication.
    $tabs = array(
      "poetical" => "<em>Poetical Essays</em>",
      "burns" => "Poems from Burns's Letter",
      "poems" => "Poems",
      "america" => "Poems in America",
      "appendices" => "Appendices"
    );

    $content = array("poetical", "burns", "poems", "america", "appendices");
    ?>
    <section class="row">
      <div class="col-xs-12">
        <ul class="nav nav-tabs">
          <?php foreach ($tabs as $id=>$title): ?>
            <li class="<?php print $id == "poetical" ? "active" : ""; ?>"><a href="<?php print ROOT_FOLDER; ?>#<?php print $id; ?>" data-toggle="tab"><?php print $title; ?></a></li>
          <?php endforeach; ?>
        </ul>

        <div class="tab-content">
          <?php for ($i = 0; $i < count($content); $i++): ?>
            <div class="tab-pane <?php print $i === 0 ? "active" : ""; ?>" id="<?php print $content[$i]; ?>">
              <table class="table dt">
                <thead>
                  <tr>
                    <th style="width: 200px;">Title</th>
                    <th>Line(s)</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $searcher = new Searcher($_GET["search"]);
                  $searcher->render($content[$i]);
                  ?>
                </tbody>
              </table>
            </div>
          <?php endfor; ?>
        </div>
      </div>
    </section>
  <?php else: ?>
    <div class="row">
      <div class="col-xs-6">
        <form class="form-horizontal" action="<?php print ROOT_FOLDER; ?>search">
          <fieldset>
            <div class="form-group">
              <label class="control-label hide">Search</label>
              <div class="col-xs-12">
                <input type="text" class="form-control" name="search" autocomplete="off">
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>

    <hr>

    <div class="row">
      <div class="col-xs-12">
        <p><strong>Your search returned 0 results.</strong></p>
        <p>Please check your spelling or enter more general terms.</p>
      </div>
    </div>
  <?php endif; ?>
</div>
<?php require "layout/footer.php"; ?>

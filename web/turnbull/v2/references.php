<?php
/**
 * @file references.php
 * Renders the references page.
 */

require_once "includes/configuration.php";

$application->setTitle("Selected References");

require "layout/header.php";
?>
<div class="container">
  <div class="row page-header">
    <div class="col-xs-12">
      <h1>Selected References</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <?php
      $document = new DOMDocument();
      $document->load("includes/references.xml");

      $render = new Renderer();
      $render->renderXMLContents($document->getElementsByTagName("text"));
      ?>
    </div>
  </div>
</div>
<?php require "layout/footer.php"; ?>

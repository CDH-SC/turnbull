<?php
/**
 * @file credits.php
 * Renders the credits page.
 */

require_once "includes/configuration.php";

$application->setTitle("Credits and Acknowledgments");

$render = new Renderer();
$credit = array(
  "Editors" => array("Patrick Scott", "John Knox", "Rachel Mann"),
  "Editorial Assistants" => array("Eric Roper"),
  "Text Entry" => array("Sej Harman"),
  "Website" => array("Collin Haines", "Carly Keith"),
  "Project Advisers <small><em>(Project Planning Phase)</em></small>" => array("Tony Harrells", "Michael Gavin", "Colin Wilder")
);

require "layout/header.php";
?>
<div class="container">
  <div class="row page-header">
    <div class="col-xs-12">
      <h1>Credits and Acknowledgments</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <?php foreach ($credit as $header=>$list): ?>
        <?php $render->renderCredit($header, $list); ?>
      <?php endforeach; ?>

      <h3>Acknowledgments</h3>
      <p class="text-justify">Major support for this project was provided by an ASPIRE grant to Patrick Scott from the Office of the Vice-President for Research, University of South Carolina. Support for Eric Roper's participation was provided by an Explorer Scholar award from the South Carolina Honors College.</p>

      <p class="text-justify">The editors wish to acknowledge assistance and facilities provided by the Center for Digital Humanities, the Irvin Department of Rare Books and Special Collections, and the University of South Carolina Libraries.</p>

      <p class="text-justify">Patrick Scott also wishes to acknowledge assistance during research here and in Scotland from: Charles Lesser and Steven Tuttle, South Carolina Department of Archives and History; Fritz Hamer, Michael Berry, and others, South Caroliana Library; Nicholas Butler, Charleston City Archives; Frank Shaw, who published an exploratory article about Turnbull on Robert Burns Lives!; David Hill Radcliffe, Virginia Tech; David Hopes and Sean McGlashan, Robert Burns Birthplace Museum, Alloway; Tom Barclay, Carnegie Library, Ayr; Graham Roberts, Ewart Library, Dumfries; Mike Duguid and Russell Brydon, Broughton House, Kirkcudbright; Ross McGregor, Burns Monument Centre and Dick Institute, Kilmarnock; Rhona Brown, Gerard Carruthers, and the Centre for Robert Burns Studies, University of Glasgow, which hosted a presentation on editorial choices for Turnbull's poem "The Cottage;" and staff in the National Library of Scotland, Edinburgh University Library, Glasgow University Library, and the Mitchell Library, Glasgow.</p>
    </div>
  </div>
</div>
<?php require "layout/footer.php"; ?>

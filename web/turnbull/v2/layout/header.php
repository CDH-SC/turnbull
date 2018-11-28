<?php
/**
 * @file header.php
 * Renders the beginning HTML structure.
 */

require_once "includes/configuration.php";
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Center for Digital Humanities - University of South Carolina">
  <meta name="keywords" content="gavin, turnbull, poems, scottish, poet">
  <meta name="description" content="The Collected Poem of Gavin Turnbull Online presents the first-ever full collection of writings by the Scottish poet Gavin Turnbull (1765-1816).">

  <title><?php print trim($application->getTitle()) === "" ? "The Collected Poems of Gavin Turnbull Online" : $application->getTitle() . " - The Collected Poems of Gavin Turnbull Online"; ?></title>

  <?php foreach ($application->getClasses() as $class): ?>
    <link rel="stylesheet" href="<?php print ROOT_FOLDER; ?>css/<?php print $class; ?>">
  <?php endforeach; ?>
</head>
<body>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1 style="font-weight: 300;">The Collected Poems of Gavin Turnbull Online</h1>
        </div>
      </div>
    </div>
  </header>

  <nav>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <?php $application->renderNavigation(); ?>
        </div>
      </div>
    </div>
  </nav>

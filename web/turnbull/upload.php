<?php
/**
 * @file upload.php
 * Upload/Overwrite XML files.
 */

// Error Reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

  <title>Upload - Turnbull Project</title>

  <link rel="stylesheet" href="http://lichen.csd.sc.edu/turnbull/css/bootstrap.min.css">
</head>
<body>
  <header class="container">
    <div class="row page-header">
      <div class="col-xs-12">
        <h1>XML File Upload</h1>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <form class="form-horizontal" action="http://lichen.csd.sc.edu/turnbull/upload" method="POST" enctype="multipart/form-data">
          <fieldset>
            <div class="form-group">
              <label for="folder" class="control-label col-xs-2">Category</label>
              <div class="col-xs-10">
                <select id="folder" name="folder" class="form-control" required="">
                  <option value="select">Select a Category</option>
                  <?php foreach (array("america" => "Poems in America", "appendices" => "Appendices", "burns" => "Poems from Burns's Letter (1793)", "poems" => "<em>Poems</em> (1794)", "poetical" => "<em>Poetical Essays</em> (1788)") as $value=>$text): ?>
                    <option value="<?php print $value; ?>"><?php print $text; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="files" class="control-label col-xs-2">File</label>
              <div class="col-xs-10">
                <input type="file" id="files" name="files[]" multiple="" accept="text/xml">
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="control-label col-xs-2">Password</label>
              <div class="col-xs-10">
                <input type="password" id="password" name="password">
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-2 center-block">
                <button type="submit" class="btn btn-primary col-xs-12">Upload</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>

    <?php if (isset($_POST["folder"], $_FILES["files"], $_POST["password"])): ?>
      <div class="row">
        <div class="col-xs-12">
          <?php if ($_POST["folder"] === "select"): ?>
            <div class="alert alert-warning">
              <p><i class="glyphicon glyphicon-exclamation-sign"></i> Please select a category.</p>
            </div>
          <?php elseif (trim($_FILES["files"]["name"][0]) === ""): ?>
            <div class="alert alert-warning">
              <p><i class="glyphicon glyphicon-exclamation-sign"></i> Please select at least one file.</p>
            </div>
          <?php elseif ($_POST["password"] !== "Andromeda940"): ?>
            <div class="alert alert-warning">
              <p><i class="glyphicon glyphicon-exclamation-sign"></i> Please input the correct password.</p>
            </div>
          <?php else: ?>
            <?php if ($_POST["folder"] === "america"): ?>
              <h2>Upload Results for Poems in America</h2>
            <?php elseif ($_POST["folder"] === "appendices"): ?>
              <h2>Upload Results for Appendices</h2>
            <?php elseif ($_POST["folder"] === "burns"): ?>
              <h2>Upload Results for Poems from Burns's Letter (1793)</h2>
            <?php elseif ($_POST["folder"] === "poems"): ?>
              <h2>Upload Results for <em>Poems</em> (1794)</h2>
            <?php elseif ($_POST["folder"] === "poetical"): ?>
              <h2>Upload Results for <em>Poetical Essays</em> (1788)</h2>
            <?php else: ?>
              <h2>Please select a proper folder</h2>
            <?php exit; ?>
            <?php endif; ?>

            <ul class="list-unstyled">
              <?php for ($i = 0; $i < count($_FILES["files"]["name"]); $i++): ?>
                <?php if (move_uploaded_file($_FILES["files"]["tmp_name"][$i], "/var/www/html/turnbull/" . $_POST["folder"] . "/" . basename($_FILES["files"]["name"][$i]))): ?>
                  <li class="label label-success"><?php print $_FILES["files"]["name"][$i]; ?> was uploaded!</li><br>
                <?php else: ?>
                  <li class="label label-danger"><?php print $_FILES["files"]["name"][$i]; ?> was not uploaded!</li><br>
                <?php endif; ?>
              <?php endfor; ?>
            </ul>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <script src="http://lichen.csd.sc.edu/turnbull/js/jquery.min.js"></script>
  <script src="http://lichen.csd.sc.edu/turnbull/js/bootstrap.min.js"></script>
</body>
</html>

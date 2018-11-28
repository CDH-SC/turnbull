<?php
/**
 * @file footer.php
 * Renders the ending HTML structure.
 */
?>
  <footer>
    <div class="container">
      <div class="row"></div>
    </div>
  </footer>

  <?php foreach ($application->getScripts() as $script): ?>
    <script src="<?php print ROOT_FOLDER; ?>js/<?php print $script; ?>"></script>
  <?php endforeach; ?>

</body>
</html>

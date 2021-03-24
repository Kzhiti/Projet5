<?php   $title = "Forbidden";
        ob_start(); ?>
    <h2>Error 403: Forbidden</h2>
<?php $content = ob_get_clean();
      require'layout.php'; ?>

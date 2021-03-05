<?php   $title = "Articles";
        ob_start(); ?>
    <?php if(isset($_SESSION['pseudo']) && ($_SESSION['role'] == "Administrateur")) { ?>
        <div class="post">
            <a class="post-a" href="../public/index.php?action=post">Ajouter un article</a>
        </div>
    <?php } ?>
    <div class="container">

    </div>
<?php $content = ob_get_clean();
      require'layout.php'; ?>

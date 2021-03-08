<?php   $title = "Modifer un Article";
ob_start(); ?>
    <div class="container-post">
        <form id="booking-form2" action="../public/index.php?action=updatepost" method="POST">
            <input class="post-input-title" type="text" id="titre" name="titre" value="<?= $_POST['titre'] ?>">
            <br>
            <input class="post-input-descr" type="textarea" id="description" name="description" value="<?= $_POST['description'] ?>">
            <br>
            <input type="hidden" id="post_id" name="post_id" value="<?= $article->getID() ?>">
            <button class="submit" type="submit">Confirmer</button>
        </form>
    </div>
<?php $content = ob_get_clean();
require'layout.php'; ?>
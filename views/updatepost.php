<?php   $title = "Modifer un Article";
ob_start(); ?>
    <div class="container-post">
        <form id="booking-form2" action="../public/index.php?action=updatepost" method="POST">
            <input class="post-input-title" type="text" id="titre" name="titre" value="<?= htmlspecialchars($_POST['titre']) ?>">
            <br>
            <input class="post-input-title" type="text" id="chapo" name="chapo" value="<?= htmlspecialchars($_POST['chapo']) ?>">
            <br>
            <input class="post-input-descr" type="textarea" id="description" name="description" value="<?= htmlspecialchars($_POST['description']) ?>">
            <br>
            <input type="hidden" id="post_id" name="post_id" value="<?= $article->getID() ?>">
            <button class="submit" type="submit">Confirmer</button>
        </form>
        <form id="booking-form2" action="../public/index.php?action=deletepost" method="POST">
            <input type="hidden" id="post_id" name="post_id" value="<?= $article->getID() ?>">
            <button class="submit" type="submit">Supprimer</button>
        </form>
    </div>
<?php $content = ob_get_clean();
require'layout.php'; ?>
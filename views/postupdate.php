<?php   $title = "Articles";
ob_start(); ?>
<?php if(isset($_SESSION['pseudo']) && ($_SESSION['role'] == "Administrateur")) { ?>
    <div class="post">
        <a class="post-a" href="../public/index.php?action=post">Ajouter un article</a>
        <a class="post-a" href="../public/index.php?action=updatelistpost">Modifier un article</a>
    </div>
    <br>
<?php }
    if ($data) {
    foreach ($data as $post) { ?>
        <div class="container-post">
            <form id="booking-form2" action="../public/index.php?action=getupdatepost" method="POST">
                <input class="post-input-title" type="text" id="titre" name="titre" value="<?= htmlspecialchars($post['titre']) ?>">
                <br>
                <input class="post-input-descr" type="textarea" id="description" name="description" value="<?= htmlspecialchars($post['description']) ?>">
                <br>
                <input class="post-input-date" type="text" id="modifier_le" name="modifier_le" value="<?= date('d-m-Y', strtotime(htmlspecialchars($post['modifier_le']))) ?>">
                <br>
                <button class="submit" type="submit">Modifier</button>
            </form>
        </div>
    <br>
   <?php }
    }
$content = ob_get_clean();
require'layout.php'; ?>
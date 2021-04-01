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
                <form id="booking-form2" action="../public/index.php?action=singlepost" method="POST">
                    <label class="post-input-title"><?= htmlspecialchars($post->getTitre()) ?></label>
                    <br>
                    <input class="post-input-title" type="hidden" id="titre" name="titre" value="<?= htmlspecialchars($post->getTitre()) ?>">
                    <br>
                    <label class="post-input-descr"><?= htmlspecialchars($post->getChapo()) ?></label>
                    <br>
                    <input class="post-input-descr" type="hidden" id="chapo" name="chapo" value="<?= htmlspecialchars($post->getChapo()) ?>">
                    <br>
                    <label class="post-input-descr"><?= htmlspecialchars($post->getDescription()) ?></label>
                    <br>
                    <input class="post-input-descr" type="hidden" id="description" name="description" value="<?= htmlspecialchars($post->getDescription()) ?>">
                    <br>
                    <label class="post-input-date"><?= date('d-m-Y', strtotime($post->getDateModif())) ?></label>
                    <br>
                    <input class="post-input-date" type="hidden" id="modifier_le" name="modifier_le" value="<?= date('d-m-Y', strtotime($post->getDateModif())) ?>">
                    <br>
                    <input type="hidden" id="article_id" name="article_id" value="<?php $post->getId() ?>">
                    <button class="submit" type="submit">Détails</button>
                </form>
            </div>
            <br>
           <?php }
        }
$content = ob_get_clean();
require'layout.php'; ?>

<?php   $title = "Gestion";
ob_start();
    if ($data) { ?>
    <h2>Commentaires à Valider</h2>
        <br>
    <?php foreach ($data as $comment) {
                $post_temp = $this->post_manager->findPostByID($comment->getArticleID());
                $user_temp = $this->user_manager->findUserByID($comment->getUserID()); ?>
                <div class="container-managing">
                    <form id="booking-form2" action="../public/index.php?action=validecomment" method="POST">
                        <textarea rows="6" cols="21" class="com-input-title" type="text" id="description" name="description"><?= htmlspecialchars($comment->getDescription()) ?></textarea>
                        <br>
                        <input class="post-input-text" type="text" id="article" name="article" value="Article: <?= htmlspecialchars($post_temp->getTitre()) ?>">
                        <br>
                        <input class="post-input-text" type="text" id="author" name="author" value="Auteur: <?= htmlspecialchars($user_temp->getPseudo()) ?>">
                        <br>
                        <input type="hidden" id="user_id" name="user_id" value="<?= htmlspecialchars($user_temp->getId()) ?>">
                        <input type="hidden" id="article_id" name="article_id" value="<?= htmlspecialchars($post_temp->getID()) ?>">
                        <input type="hidden" id="id" name="id" value="<?= $comment->getId() ?>">
                        <button class="submit" type="submit">Valider le Commentaire</button>
                    </form>
                </div><br>
   <?php }
    }
    else {?>
        <div class="container-managing">
            <h2>Aucun Commentaire à Valider</h2>
        </div>
    <?php }
$content = ob_get_clean();
require'layout.php'; ?>
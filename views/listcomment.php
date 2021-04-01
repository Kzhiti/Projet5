<?php   $title = "Gestion";
ob_start();
    if ($data) { ?>
    <h2>Commentaires à Valider</h2>
        <br>
    <?php foreach ($data as $data) {
                ?>
                <div class="container-managing">
                    <form id="booking-form2" action="../public/index.php?action=validecomment" method="POST">
                        <textarea rows="6" cols="21" class="com-input-title" type="text" id="description" name="description"><?= htmlspecialchars($data['comment']->getDescription()) ?></textarea>
                        <br>
                        <label class="post-input-text"><?= htmlspecialchars($data['a_titre']) ?></label>
                        <br>
                        <input class="post-input-text" type="hidden" id="article" name="article" value="Article: <?= htmlspecialchars($data['a_titre']) ?>">
                        <br>
                        <label class="post-input-text"><?= htmlspecialchars($data['pseudo']) ?></label>
                        <br>
                        <input class="post-input-text" type="hidden" id="author" name="author" value="Auteur: <?= htmlspecialchars($data['pseudo']) ?>">
                        <br>
                        <input type="hidden" id="id" name="id" value="<?= $data['comment']->getId() ?>">
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
<?php   $title = "Article";
        ob_start(); ?>
    <div>
        <?php if($data) { ?>
            <div class="listcom">
                <h2>Commentaires</h2>
                <br>
               <?php foreach ($data as $com) {?>
                   <p class="com"><?= htmlspecialchars($com['description']) ?></p>
                   <br>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="container-post-single"><h2><?= $singlepost->getTitre() ?></h2>
            <br><p class="descr"><?= $singlepost->getDescription() ?></p>
            <br><p class="author">Auteur: <?= $user->getPseudo() ?></p>
            <br><p class="date-modif">Modifié le <?= date('d-m-Y', strtotime($singlepost->getDateModif())) ?></p>
        </div>
    </div>
    <?php if (isset($_SESSION['id'])) { ?>
        <div class="container">
            <div class="booking-content">
                <div class="booking-form2">
                    <h2>Laisser un Commentaire</h2>

                    <form id="booking-form" action="../public/index.php?action=comment" method="POST">

                        <input type="textarea" id="descr_com" name="descr_com" placeholder="Votre Commentaire" required>
                        <br>
                        <input type="hidden" id="post_id" name="post_id" value="<?= $singlepost->getID() ?>">
                        <br>
                        <button class="submit" type="submit">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    <?php }
    $content = ob_get_clean();
    require'layout.php'; ?>


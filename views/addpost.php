<?php   $title = "Ajout d'un Article";
    ob_start(); ?>
    <div class="container">
        <div class="booking-content">
            <div class="booking-form2">
                <h2>Ajouter un article</h2>
                <?php if(isset($_SESSION['flash'])) { ?>
                    <?php foreach($_SESSION['flash'] as $type => $message){?>
                        <div>
                            <?= $message; ?>
                        </div>
                    <?php } ?>
                    <?php unset($_SESSION['flash']); ?>
                <?php } ?>
                <form id="booking-form" action="../public/index.php?action=post" method="POST">

                    <input type="text" id="titre" name="titre" placeholder="Titre">
                    <br>
                    <input type="text" id="chapo" name="chapo" placeholder="Chapô">
                    <br>
                    <input type="textarea" id="descr" name="descr" placeholder="Description">
                    <br>
                    <button class="submit" type="submit">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean();
      require'layout.php'; ?>

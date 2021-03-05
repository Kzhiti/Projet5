<?php   $title = "Connexion";
        ob_start(); ?>
    <div class="container">
        <div class="booking-content">
            <div class="booking-image">
                <img class="booking-img" src="../public/img/Inscription.jpg" alt="Booking Image">
            </div>
            <div class="booking-form">
                <h2>Veuillez vous connecter</h2>
                <br>
                <?php if(isset($_SESSION['flash'])) { ?>
                    <?php foreach($_SESSION['flash'] as $type => $message){?>
                        <div>
                            <?= $message; ?>
                        </div>
                    <?php } ?>
                    <?php unset($_SESSION['flash']); ?>
                <?php } ?>
                <form id="booking-form" action="../public/index.php?action=login" method="POST">

                    <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo">

                    <input type="password" id="password" name="password" placeholder="Mot de passe">

                    <button class="submit" type="submit">Se Connecter</button>
                </form>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean();
      require'layout.php'; ?>
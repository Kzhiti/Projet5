<?php   $title = "Accueil";
        ob_start(); ?>
        <div class="container">
            <div class="booking-content">
                <div class="booking-image">
                    <img class="booking-img" src="../public/img/clavier2.jpg" alt="Booking Image">
                </div>
                <div class="booking-form">
                    <h2>Un projet en tête ?<br> Contactez moi !</h2>
                    <form id="booking-form" action="../public/index.php?action=contact" method="POST">

                        <input type="text" id="nom" name="nom" placeholder="Votre Nom">
                        <br>
                        <input type="email" id="email" name="email" placeholder="Votre Email">
                        <br>
                        <input type="text" id="message" name="message" placeholder="Votre Message">
                        <br>
                        <button class="submit" type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="div-container-photo-cv">
            <div class="div-content-photo-cv">
                <div class="photo-cv-text">
                    <p>ZHITI Kylian <br>Développeur Web<br><a class="a-cv" href="../public/img/CV-Zhiti.pdf" target="_blank">Voir mon CV</a></p>
                </div>
                <div class="photo-cv-img">
                    <img class="photo-cv" src="../public/img/photo_cv.jpg" alt="Photo CV">
                </div>
            </div>
        </div>
<?php $content = ob_get_clean();
        require'layout.php'; ?>

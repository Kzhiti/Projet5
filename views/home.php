<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Accueil</title>
    <link href="../public/css/style.css" rel="stylesheet" />
</head>
<header>
    <h1 class="header_title">Le Développeur à toutes heures</h1>
    <?php if(!isset($_SESSION['user'])) { ?>
        <a href="../public/index.php?action=login">Se Connecter</a>
        <a href="../public/index.php?action=register">S'inscrire</a>
    <?php } ?>
    <a href="../public/index.php">Accueil</a>
    <?php if(isset($_SESSION['user'])) { ?>
        <a href="../public/index.php?action=logout">Deconnexion</a>
    <?php } ?>
</header>
<body>
    <div class="main">
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
                    <p>ZHITI Kylian <br>Développeur Web<br><a href="../public/img/CV-Zhiti.pdf">Voir mon CV</a></p>
                </div>
                <div class="photo-cv-img">
                    <img class="photo-cv" src="../public/img/photo_cv.jpg" alt="Photo CV">
                </div>
            </div>
        </div>
    </div>
</body>
<footer>

</footer>
</html>
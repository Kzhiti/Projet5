<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Connexion</title>
    <link href="../public/css/style.css" rel="stylesheet" />
</head>
<header>
    <h1 class="header_title">Le Développeur à toutes heures</h1>
    <a href="../public/index.php?action=login">Se Connecter</a>
    <a href="../public/index.php?action=register">S'inscrire</a>
    <a href="../public/index.php">Accueil</a>
    <a href="../public/index.php?action=logout">Deconnexion</a>
</header>
<body>
<div class="main">
    <div class="container">
        <div class="booking-content">
            <div class="booking-image">
                <img class="booking-img" src="../public/img/Inscription.jpg" alt="Booking Image">
            </div>
            <div class="booking-form">
                <h2>Veuillez vous connecter</h2>
                <form id="booking-form" action="../public/index.php?action=login" method="POST">

                    <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo">

                    <input type="password" id="password" name="password" placeholder="Mot de passe">

                    <button class="submit" type="submit">Se Connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
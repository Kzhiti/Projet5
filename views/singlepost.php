<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Article</title>
    <link href="../public/css/style.css" rel="stylesheet" />
</head>
<header>
    <h1 class="header_title">Le Développeur à toutes heures</h1>
    <?php if(!isset($_SESSION['user'])) { ?>
        <a href="../public/index.php?action=login">Se Connecter</a>
        <a href="../public/index.php?action=register">S'inscrire</a>
    <?php } ?>
    <a href="../public/index.php?action=listpost">Articles</a>
    <a href="../public/index.php">Accueil</a>
    <?php if(isset($_SESSION['user'])) { ?>
        <a href="../public/index.php?action=logout">Deconnexion</a>
    <?php } ?>
</header>
<body>
<div class="main">
    <div class="container">
        <div class="booking-content">
            <div class="booking-form2">

            </div>
        </div>
    </div>
</div>
</body>
<footer>
    <a class="a-footer" href="https://github.com/Kzhiti" target="_blank"><img src="../public/img/github.png"></a>
    <a class="a-footer" href="https://twitter.com/?lang=fr" target="_blank"><img src="../public/img/twitter.png"></a>
    <a class="a-footer" href="https://fr.linkedin.com/" target="_blank"><img src="../public/img/linkedin.png"></a>
</footer>
</html><?php

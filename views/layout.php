<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width"/>
    <title><?= $title?></title>
    <link href="../public/css/style.css" rel="stylesheet" />
</head>
<body>
<header>
    <h1 class="header_title">Le Développeur à toutes heures</h1>
    <?php if(!isset($_SESSION['pseudo'])) { ?>
        <a href="../public/index.php?action=login">Se Connecter</a>
        <a href="../public/index.php?action=register">S'inscrire</a>
    <?php } ?>
    <a href="../public/index.php?action=listpost">Articles</a>
    <a href="../public/index.php">Accueil</a>
    <?php if(isset($_SESSION['pseudo'])) { ?>
        <a href="../public/index.php?action=logout">Deconnexion</a>
    <?php } ?>
</header>
<div class="main">
        <?= $content?>
</div>

<footer>
    <a class="a-footer" href="https://github.com/Kzhiti" target="_blank"><img src="../public/img/github.png"></a>
    <a class="a-footer" href="https://twitter.com/?lang=fr" target="_blank"><img src="../public/img/twitter.png"></a>
    <a class="a-footer" href="https://fr.linkedin.com/" target="_blank"><img src="../public/img/linkedin.png"></a>
    <?php if(isset($_SESSION['pseudo']) && ($_SESSION['role'] == "Administrateur")) { ?>
        <a class="a-managing" href="../public/index.php?action=managing">Administration</a>
    <?php } ?>
</footer>
</body>
</html>
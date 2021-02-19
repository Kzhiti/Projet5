<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Connexion</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <h1>Connexion</h1>

    <form class="" action="../controllers/AuthController.php" method="POST">

        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo" required>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se Connecter</button>
    </form>
</body>
</html>
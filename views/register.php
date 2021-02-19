<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Inscription</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <h1>Inscription</h1>
    <form class="" action="../public/index.php?action=register" method="POST">

        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo" required>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirmer le mot de passe</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
<?php

require("../models/entities/User.php");
require("../models/entities/UserTab.php");

//public function inscription() {
    $user = new User();
    $user_tab = new UserTab();
    $user->setPseudo($_POST['pseudo']);
    $user->setRole("Utilisateur");

    //On vérifie que les mots de passe soient identiques
    if ($_POST['password'] == $_POST['confirm_password']) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->setPassword($password);
    }
    else {
        //Message Erreur
    }

    $users = $user_tab->getAll();

    //On vérifie qu'il n'y ait pas d'autres utilisateurs porant le même pseudo
    foreach ($users as $currentUser) {
        if ($user->getPseudo() == $currentUser->getPseudo()) {
            //Message Erreur
        }
    }

    $user_tab->addUser($user);
    //Message validation + Header Accueil
    header('../views/inscription.php');
//}
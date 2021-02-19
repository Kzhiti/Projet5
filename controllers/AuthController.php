<?php


namespace Controllers;

use Entities\User;
use Managers\UserManager;

class AuthController
{

    public function login(User $user) {
        $user_tab = new UserManager();
        if ($user_tab->findUser($user) != null) {
            if ($user->getPassword() == $user_tab->findUser($user)->getPassword()) {
                session_start();
                $_SESSION['pseudo'] = $user->getPseudo();
                $_SESSION['password'] = $user->getPassword();
                $_SESSION['role'] = $user->getRole();
                $_SESSION['date_creation'] = $user->getDateCreation();
            }
        }
        else {
            echo "Votre pseudo ou votre mot de passe sont éronnés";
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
    }

    public function inscription()
    {
        /*$user = new User();
        $user_tab = new UserTab();
        $user->setPseudo($_POST['pseudo']);
        $user->setRole("Utilisateur");

        //On vérifie que les mots de passe soient identiques
        if ($_POST['password'] == $_POST['confirm_password']) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->setPassword($password);
        } else {
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
        //header('../views/inscription.php');*/
        echo "Bonjour";
    }
}
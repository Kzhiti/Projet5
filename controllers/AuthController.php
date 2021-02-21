<?php


namespace Controllers;

use Entities\User;
use Managers\SessionFlash;
use Managers\UserManager;

class AuthController
{
    private $user_manager;

    public function __construct()
    {
        $this->user_manager = new UserManager();
    }

    public function login()
    {
        require('../views/login.php');

        if (isset($_POST['pseudo'])) {
            $error = 0;

            if (empty($_POST['pseudo']) || mb_strlen($_POST['pseudo']) < 3 || mb_strlen($_POST['pseudo']) > 19) {
                // $error++;
                SessionFlash::sessionFlash("Erreur", "Pseudo Invalide");
            } else {
                if (!($this->user_manager->findUser($_POST['pseudo']))) {
                    // $error++;
                    SessionFlash::sessionFlash("Erreur", "Pseudo Introuvable");
                }
            }
            if (empty($_POST['password'])) {
                //  $error++;
                SessionFlash::sessionFlash("Erreur", "Mot de passe invalide");
            }


            if (/*$error === 0*/!(isset($_SESSION['flash']))) {
                $user = $this->user_manager->findUser($_POST['pseudo']);
                $_SESSION['user'] = serialize($user);
                header('Location: index.php');
                return;
            }
            else {
                header('Location: index.php?action=login');
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: index.php');
        return;
    }

    public function register()
    {
        require('../views/register.php');
        if (isset($_POST['pseudo'])) {

            $user = new User();
          //  $error = 0;
            if (empty($_POST['pseudo']) || mb_strlen($_POST['pseudo']) < 3 || mb_strlen($_POST['pseudo']) > 19) {
               // $error++;
                SessionFlash::sessionFlash("Erreur", "Pseudo Invalide");
            } else {
                if ($this->user_manager->findUser($_POST['pseudo'])) {
                   // $error++;
                    SessionFlash::sessionFlash("Erreur", "Pseudo déjà utilisé");
                }
            }
            if (empty($_POST['password'])) {
              //  $error++;
                SessionFlash::sessionFlash("Erreur", "Mot de passe invalide");
            }

            if ($_POST['password'] != $_POST['confirm_password']) {
              //  $error++;
                SessionFlash::sessionFlash("Erreur", "Les mots de passe ne sont pas identiques");
            }

            if (/*$error === 0*/!(isset($_SESSION['flash']))) {
                $user->setPseudo($_POST['pseudo']);
                $user->setRole("Utilisateur");
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->setPassword($password);
                $this->user_manager->addUser($user);
                header('Location: index.php?action=login');
            }
            else {
                header('Location: index.php?action=register');
                foreach ($_SESSION['flash'] as $type => $message) {
                    echo $message;
                }
            }
        }
        return;
    }
}
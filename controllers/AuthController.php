<?php


namespace Controllers;

use App\Response;
use App\Session;

use Entities\User;

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
            $user = $this->user_manager->findUser($_POST['pseudo']);

            if ($user === null) {
                Session::setFlash("Erreur utilisateur introuvable", "Veuillez entrer un pseudo et un mot de passe valides");
            }
            else {
                if (empty($_POST['pseudo']) || mb_strlen($_POST['pseudo']) < 3 || mb_strlen($_POST['pseudo'] || $_POST['pseudo'] === null) > 19) {
                    Session::setFlash("Erreur pseudo invalide", "Veuillez réessayer");
                } else {
                    if (!($user)) {
                        Session::setFlash("Erreur pseudo introuvable", "Veuillez réessayer");
                    }
                }
                if (empty($_POST['password']) || $_POST['password'] === null) {
                    Session::setFlash("Erreur mot de passe invalide", "Veuillez réessayer");
                } else {
                    if (!password_verify($_POST['password'], $user->getPassword())) {
                        Session::setFlash("Erreur mot de passe incorrect", "Veuillez réessayer");
                    }
                }

                if (!(isset($_SESSION['flash']))) {
                    $_SESSION['id'] = $user->getId();
                    $_SESSION['pseudo'] = $_POST['pseudo'];
                    $_SESSION['role'] = $user->getRole();
                    Response::redirect('index.php');
                    return;
                } else {
                    Response::redirect('index.php?action=login');
                }
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['pseudo']);
        unset($_SESSION['role']);
        Response::redirect('index.php');
        return;
    }

    public function register()
    {
        require('../views/register.php');
        if (isset($_POST['pseudo'])) {

            $user = new User();
            if (empty($_POST['pseudo']) || mb_strlen($_POST['pseudo']) < 3 || mb_strlen($_POST['pseudo']) > 19 || $_POST['pseudo'] === null) {
                Session::setFlash("Erreur pseudo invalide",  "Veuillez réessayer");
            } else {
                if ($this->user_manager->findUser($_POST['pseudo'])) {
                    Session::setFlash("Erreur pseudo déjà utilisé", "Veuillez réessayer");
                }
            }
            if (empty($_POST['password']) || $_POST['password'] === null) {
                Session::setFlash("Erreur mot de passe invalide", "Veuillez réessayer");
            }

            if ($_POST['password'] != $_POST['confirm_password']) {
                Session::setFlash("Erreur les mots de passe ne sont pas identiques", "Veuillez réessayer");
            }

            if (!(isset($_SESSION['flash']))) {
                $user->setPseudo($_POST['pseudo']);
                $user->setRole("Utilisateur");
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->setPassword($password);
                $this->user_manager->addUser($user);
                Response::redirect('index.php?action=login');
            }
            else {
                Response::redirect('index.php?action=register');
            }
        }
        return;
    }
}
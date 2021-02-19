<?php


namespace Controllers;

use Entities\User;
use Managers\UserManager;

class AuthController
{
    private $user_manager;

    public function __construct() {
        $this->user_manager = new UserManager();
    }

    public function login(User $user) {
        require ('../views/login.php');

        if ($this->user_manager->findUser($user)) {
            if ($user->getPassword() == $this->user_manager->findUser($user)->getPassword()) {
                session_start();
                $_SESSION['pseudo'] = $user->getPseudo();
                $_SESSION['password'] = $user->getPassword();
                $_SESSION['role'] = $user->getRole();
                $_SESSION['date_creation'] = $user->getDateCreation();
            }
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
    }

    public function register() {
        require ('../views/register.php');
        if (isset($_POST['pseudo'])) {

            $user = new User();
            $error = 0;
            if (empty($_POST['pseudo']) || mb_strlen($_POST['pseudo'])<3 || mb_strlen($_POST['pseudo'])>19) {
                $error++;
            }
            else {
                if ($this->user_manager->findUser($_POST['pseudo'])) {
                    $error++;
                }
            }
            if (empty($_POST['password']) || $_POST['password'] != $_POST['confirm_password']) {
                $error++;
            }

            if ($error === 0) {
                $user->setPseudo($_POST['pseudo']);
                $user->setRole("Utilisateur");
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->setPassword($password);
                $this->user_manager->addUser($user);
            }
            header('Location: index.php?action=login');
        }
        return;
    }
}
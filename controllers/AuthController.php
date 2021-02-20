<?php


namespace Controllers;

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
            $error = 0;

            if (empty($_POST['pseudo']) || mb_strlen($_POST['pseudo']) < 3 || mb_strlen($_POST['pseudo']) > 19) {
                $error++;
                echo "1";
            } else {
                if (!($this->user_manager->findUser($_POST['pseudo']))) {
                    $error++;
                    echo "2";
                }
            }
            if (empty($_POST['password'])) {
                $error++;
                echo "3";
            }

            if ($error === 0) {
                $user = $this->user_manager->findUser($_POST['pseudo']);
                    $_SESSION['user'] = serialize($user);
                    header('Location: index.php');
                    return;
            }
            else {
                //Erreur
                header('Location: index.php?action=login');
                return;
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
            $error = 0;
            if (empty($_POST['pseudo']) || mb_strlen($_POST['pseudo']) < 3 || mb_strlen($_POST['pseudo']) > 19) {
                $error++;
            } else {
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
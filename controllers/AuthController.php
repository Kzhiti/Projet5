<?php


namespace Controllers;

use Entities\User;
use Managers\UserManager;

class AuthController
{

    public function login(User $user) {
        require ('../views/login.php');
        $user_tab = new UserManager();
        try {
            if ($user_tab->findUser($user) != null) {
                if ($user->getPassword() == $user_tab->findUser($user)->getPassword()) {
                    session_start();
                    $_SESSION['pseudo'] = $user->getPseudo();
                    $_SESSION['password'] = $user->getPassword();
                    $_SESSION['role'] = $user->getRole();
                    $_SESSION['date_creation'] = $user->getDateCreation();
                }
            } else {
                throw new \Exception('Votre Pseudo ou votre Mot de Passe sont éronnés');
            }
        }
        catch(\Exception $e) {
            echo 'Erreur : '. $e->getMessage();
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
    }

    public function register() {
        if (isset($_POST['pseudo'])) {

            $user = new User();
            $user_tab = new UserManager();
            $user->setPseudo($_POST['pseudo']);
            $user->setRole("Utilisateur");

            if ($_POST['password'] == $_POST['confirm_password']) {
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->setPassword($password);
            } else {

            }

           /* if ($user_tab->findUser($user)) {

            }*/

            $user_tab->addUser($user);

            echo "Bonjour";
        }
        else {
            echo "fail";
        }
        //require('../views/register.php');
    }
}
<?php

namespace Controllers;

use App\Session;

use Entities\Article;
use Entities\User;
use Managers\{PostManager, UserManager};

class AdminController {
    private $user_manager;
    private $post_manager;

    public function __construct()
    {
        $this->user_manager = new UserManager();
        $this->post_manager = new PostManager();
    }

    public function admin() {
        require('../views/managing.php');
    }

    public function listUser() {
        require('../views/listuser.php');
        $data = $this->user_manager->getAll();
        if ($data) {
            foreach ($data as $post) {
                if ($post['role'] == "Utilisateur") {
                    echo '<div class="container-managing">
                              <form id="booking-form2" action="../public/index.php?action=rights" method="POST">
                                <input class="post-input-title" type="text" id="pseudo" name="pseudo" value="'. $post['pseudo'] .'">
                                <br>
                                <button class="submit" type="submit">Passer Administrateur</button>
                              </form>
                           </div><br>';
                }
                else {
                    echo '<div class="container-managing">
                              <form id="booking-form2" action="" method="POST">
                                <input class="post-input-title" type="text" id="pseudo" name="pseudo" value="'. $post['pseudo'] .'">
                                <br>
                                <p class="managing">Administrateur</p>
                              </form>
                           </div><br>';
                }
            }
        }
    }

    public function giveRights() {
        $this->user_manager->changeRole("Administrateur", $_POST['pseudo']);
        $_SESSION['role'] = "Administrateur";
        header('Location: index.php?action=listuser');
    }

    public function listComment() {
        require('../views/listcomment.php');
    }
}
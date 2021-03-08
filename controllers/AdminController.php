<?php

namespace Controllers;

use App\Session;

use Entities\Article;
use Entities\User;
use Managers\{CommentManager, PostManager, UserManager};

class AdminController {
    private $user_manager;
    private $post_manager;
    private $comment_manager;

    public function __construct()
    {
        $this->user_manager = new UserManager();
        $this->post_manager = new PostManager();
        $this->comment_manager = new CommentManager();
    }

    public function admin() {
        require('../views/managing.php');
    }

    public function listUser() {
        $data = $this->user_manager->getAll();
        require('../views/listuser.php');
    }

    public function giveRights() {
        $this->user_manager->changeRole("Administrateur", $_POST['pseudo']);
        header('Location: index.php?action=listuser');
    }

    public function listComment() {
        $data = $this->comment_manager->getAllUnvalid();
        require('../views/listcomment.php');
    }

    public function valideComment() {
        $this->comment_manager->changeValide($_POST['id']);
        header('Location: index.php?action=listcomment');
    }

}
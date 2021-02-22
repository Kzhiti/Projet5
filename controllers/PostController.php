<?php

namespace Controllers;

use App\Session;

use Entities\User;
use Entities\Article;
use Managers\PostManager;

class PostController {

    private $post_manager;

    public function __construct()
    {
        $this->post_manager = new PostManager();
    }

    public function post() {
        require('../views/addpost.php');
        if (isset($_POST['titre'])) {
            $post = new Article();
            $user = new User();
            $user = serialize($_SESSION['user']);
            if (empty($_POST['titre'])) {
                Session::setFlash("Erreur titre invalide", "Veuillez remplir le champ titre");
            }
            if (empty($_POST['descr'])) {
                Session::setFlash("Erreur description invalide", "Veuillez remplir le champ description");
            }
            if (!(isset($_SESSION['flash']))) {
                $post->setTitre($_POST['titre']);
                $post->setDescription($_POST['descr']);
                $post->setUser_id(1);
                $this->post_manager->addPost($post);
                header('Location: index.php?action=listpost');
            }
            else {
                header('Location: index.php?action=addpost');
            }
        }
    }

    public function listPost() {
        require('../views/post.php');
        $data = $this->post_manager->getAll();
        if ($data) {
            foreach ($data as $post) {
                echo '<div class="container-post"><a href="">' . $post['titre'] . '</a><br>' . $post['description'] . '<br>' . $post['modifier_le'] . '</div><br>';
            }
        }
    }
}
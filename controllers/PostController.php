<?php

namespace Controllers;

use App\Session;

use Entities\Article;
use Entities\Commentaire;
use Managers\{PostManager, UserManager, CommentManager};


class PostController {

    private $post_manager;
    private $user_manager;
    private $comment_manager;

    public function __construct()
    {
        $this->post_manager = new PostManager();
        $this->user_manager = new UserManager();
        $this->comment_manager = new CommentManager();
    }

    public function post() {
        require('../views/addpost.php');
        echo '<br>';
        if (isset($_POST['titre'])) {
            $post = new Article();
            if (empty($_POST['titre'])) {
                Session::setFlash("Erreur titre invalide", "Veuillez remplir le champ titre");
            }
            if (empty($_POST['descr'])) {
                Session::setFlash("Erreur description invalide", "Veuillez remplir le champ description");
            }
            if (!(isset($_SESSION['flash']))) {
                $post->setTitre($_POST['titre']);
                $post->setDescription($_POST['descr']);
                $post->setUser_id($_SESSION['id']);
                $this->post_manager->addPost($post);
                header('Location: index.php?action=listpost');
            }
            else {
                header('Location: index.php?action=post');
            }
        }
    }

    public function listPost() {
        $data = $this->post_manager->getAll();
        require('../views/post.php');
    }

    public function updateListPost() {
        $data = $this->post_manager->getAll();
        require('../views/postupdate.php');
    }

    public function getUpdatePost() {
        $article = $this->post_manager->findPost($_POST['titre']);
        require('../views/updatepost.php');
    }

    public function updatePost() {
        $this->post_manager->changePost($_POST['titre'], $_POST['description'], $_POST['post_id']);
        header('Location: index.php?action=listpost');
    }

    public function singlePost() {
        $singlepost = $this->post_manager->findPost($_POST['titre']);
        $user = $this->user_manager->findUserByID($singlepost->getUserID());
        $data = $this->comment_manager->getAllValidById($singlepost->getID());
        //$data = $this->comment_manager->getAll();
        require('../views/singlepost.php');
    }

    public function getCommentForm() {
        if (isset($_POST['descr_com'])) {
            $comment = new Commentaire();
            $comment->setUser_id($_SESSION['id']);
            $comment->setDescription($_POST['descr_com']);
            $comment->setArticle_id($_POST['post_id']);
            $this->comment_manager->addComment($comment);
            header('Location: index.php?action=listpost');
        }
    }
}
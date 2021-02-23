<?php

namespace Controllers;

use App\Session;

use Entities\User;
use Entities\Article;
use Managers\PostManager;
use Managers\UserManager;

class PostController {

    private $post_manager;
    private $user_manager;

    public function __construct()
    {
        $this->post_manager = new PostManager();
        $this->user_manager = new UserManager();
    }

    public function post() {
        require('../views/addpost.php');
        echo '<br>';
        if (isset($_POST['titre'])) {
            $post = new Article();
            $user = $this->user_manager->findUser($_SESSION['pseudo']);
            if (empty($_POST['titre'])) {
                Session::setFlash("Erreur titre invalide", "Veuillez remplir le champ titre");
            }
            if (empty($_POST['descr'])) {
                Session::setFlash("Erreur description invalide", "Veuillez remplir le champ description");
            }
            if (!(isset($_SESSION['flash']))) {
                $post->setTitre($_POST['titre']);
                $post->setDescription($_POST['descr']);
                $post->setUser_id($user->getId());
                $this->post_manager->addPost($post);
                header('Location: index.php?action=listpost');
            }
            else {
                header('Location: index.php?action=post');
            }
        }
    }

    public function listPost() {
        require('../views/post.php');
        $data = $this->post_manager->getAll();
        if ($data) {
            foreach ($data as $post) {
                //echo '<div class="container-post"><a href="../public/index.php?action=singlepost">' . $post['titre'] . '</a><br>' . $post['description'] . '<br>' . $post['modifier_le'] . '</div><br>';
                echo '<div class="container-post">
                            <form id="booking-form2" action="../public/index.php?action=singlepost" method="POST">
                                <input class="post-input-title" type="text" id="titre" name="titre" value="'. $post['titre'] .'">
                                <br>
                                <input class="post-input-descr" type="text" id="description" name="description" value="'. $post['description'] .'">
                                <br>
                                <input class="post-input-date" type="text" id="modifier_le" name="modifier_le" value="'. $post['modifier_le'] .'">
                                <br>
                                <button class="submit" type="submit">Détails</button>
                            </form>
                       </div>
                       <br>
                       ';
            }
        }
    }

    public function singlePost() {
        require('../views/singlepost.php');
        $singlepost = $this->post_manager->findPost($_POST['titre']);
        $user = $this->user_manager->findUserByID($singlepost->getUserID());
        echo '<div class="container-post"><h2>' . $singlepost->getTitre() . ' </h2>
                    <br><p class="descr">' . $singlepost->getDescription() . ' </p>
                    <br><p class="author">Auteur: ' . $user->getPseudo() . ' </p>
                    <br><p class="date-modif">Modifié le ' . $singlepost->getDateModif() . ' </p>
              </div>
              <br>';
    }
}
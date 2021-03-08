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
        require('../views/post.php');
        $data = $this->post_manager->getAll();
        if ($data) {
            foreach ($data as $post) {
                //echo '<div class="container-post"><a href="../public/index.php?action=singlepost">' . $post['titre'] . '</a><br>' . $post['description'] . '<br>' . $post['modifier_le'] . '</div><br>';
                echo '<div class="container-post">
                            <form id="booking-form2" action="../public/index.php?action=singlepost" method="POST">
                                <input class="post-input-title" type="text" id="titre" name="titre" value="'. $post['titre'] .'">
                                <br>
                                <input class="post-input-descr" type="textarea" id="description" name="description" value="'. $post['description'] .'">
                                <br>
                                <input class="post-input-date" type="text" id="modifier_le" name="modifier_le" value="'. $post['modifier_le'] .'">
                                <br>
                                <input type="hidden" id="article_id" name="article_id" value="'. $post['id'] .'">
                                <button class="submit" type="submit">Détails</button>
                            </form>
                       </div>
                       <br>
                       ';
            }
        }
    }

    public function updateListPost() {
        require('../views/post.php');
        $data = $this->post_manager->getAll();
        if ($data) {
            foreach ($data as $post) {
                echo '<div class="container-post">
                            <form id="booking-form2" action="../public/index.php?action=getupdatepost" method="POST">
                                <input class="post-input-title" type="text" id="titre" name="titre" value="'. $post['titre'] .'">
                                <br>
                                <input class="post-input-descr" type="textarea" id="description" name="description" value="'. $post['description'] .'">
                                <br>
                                <input class="post-input-date" type="text" id="modifier_le" name="modifier_le" value="'. $post['modifier_le'] .'">
                                <br>
                                <button class="submit" type="submit">Modifier</button>
                            </form>
                       </div>
                       <br>
                       ';
            }
        }
    }

    public function getUpdatePost() {
        require('../views/updatepost.php');
        $article = $this->post_manager->findPost($_POST['titre']);
        echo '<div class="container-post">
                            <form id="booking-form2" action="../public/index.php?action=updatepost" method="POST">
                                <input class="post-input-title" type="text" id="titre" name="titre" value="'. $_POST['titre'] .'">
                                <br>
                                <input class="post-input-descr" type="textarea" id="description" name="description" value="'. $_POST['description'] .'">
                                <br>
                                <input type="hidden" id="post_id" name="post_id" value="'. $article->getID() .'">
                                <button class="submit" type="submit">Modifier</button>
                            </form>
                       </div>
                       <br>
                       ';
    }

    public function updatePost() {
        $this->post_manager->changePost($_POST['titre'], $_POST['description'], $_POST['post_id']);
        header('Location: index.php?action=listpost');
    }

    public function singlePost() {
        require('../views/singlepost.php');
        $singlepost = $this->post_manager->findPost($_POST['titre']);
        $user = $this->user_manager->findUserByID($singlepost->getUserID());
        echo '<div class="container-post"><h2>' . $singlepost->getTitre() . ' </h2>
                    <br><p class="descr">' . $singlepost->getDescription() . ' </p>
                    <br><p class="author">Auteur: ' . $user->getPseudo() . ' </p>
                    <br><p class="date-modif">Modifié le ' . $singlepost->getDateModif() . ' </p>
              </div>';
              if (isset($_SESSION['id'])) {
                  echo '<div class="container">
                        <div class="booking-content">
                            <div class="booking-form2">
                                <h2>Laisser un Commentaire</h2>
                               
                                <form id="booking-form" action="../public/index.php?action=comment" method="POST">
                    
                                    <input type="textarea" id="descr_com" name="descr_com" placeholder="Votre Commentaire" required>
                                    <br>
                                    <input type="hidden" id="post_id" name="post_id" value="' . $singlepost->getID() . '">
                                    <br>
                                    <button class="submit" type="submit">Ajouter</button>
                                </form>
                            </div>
                        </div>
                  </div>
                  <br>
                  <br>
                  <br>';
              }
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
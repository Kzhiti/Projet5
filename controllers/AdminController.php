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
        header('Location: index.php?action=listuser');
    }

    public function listComment() {
        require('../views/listcomment.php');
        $data = $this->comment_manager->getAllUnvalid();
        if ($data) {
            echo '<h2>Commentaires à Valider</h2><br>';
            foreach ($data as $post) {
                $post_temp = $this->post_manager->findPostByID($post['article_id']);
                $user_temp = $this->user_manager->findUserByID($post['user_id']);
                echo '<div class="container-managing">
                          <form id="booking-form2" action="../public/index.php?action=validecomment" method="POST">
                            <input class="post-input-title" type="text" id="description" name="description" value="'. $post['description'] .'">
                            <br>
                            <input class="post-input-text" type="text" id="article" name="article" value="Article: '. $post_temp->getTitre() .'">
                            <br>
                            <input class="post-input-text" type="text" id="author" name="author" value="Auteur: '. $user_temp->getPseudo() .'">
                            <br>
                            <input type="hidden" id="user_id" name="user_id" value="'. $user_temp->getId() .'">
                            <input type="hidden" id="article_id" name="article_id" value="'. $post_temp->getID() .'">
                            <input type="hidden" id="id" name="id" value="'. $post['id'] .'">
                            <button class="submit" type="submit">Valider le Commentaire</button>
                          </form>
                       </div><br>';
            }
        }
        else {
            echo '<div class="container-managing">
                        <h2>Aucun Commentaire à Valider</h2>
                  </div>';
        }
    }

    public function valideComment() {
        $this->comment_manager->changeValide($_POST['id']);
        header('Location: index.php?action=listcomment');
    }

}
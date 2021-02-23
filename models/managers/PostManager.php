<?php

namespace Managers;

use Entities\Article;

class PostManager
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = new \PDO('mysql:host=127.0.0.1;port=3306;dbname=projet5', 'root', 'root', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addPost(Article $post)
    {
        $req = $this->db->prepare('INSERT INTO article(user_id, titre, description, modifier_le) 
                     VALUES(?,?,?,NOW())');
        /*$req->bindValue(':pseudo', $user->getPseudo());
        $req->bindValue(':password', $user->getPassword());
        $req->bindValue(':role', $user->getRole());
        $req->bindValue(':date_creation', date("d.m.y"));*/
        $req->execute(array($post->getUserID(), $post->getTitre(), $post->getDescription()));
    }

    public function findPost($title)
    {
        $req = $this->db->prepare('SELECT * FROM article WHERE titre = ?');
        $req->execute(array($title));
        $data = $req->fetch();
        if($data) {
            return new Article($data);
        }
        return null;
    }

    public function getAll()
    {
        $req = $this->db->query('SELECT * FROM article');
        $req->execute();

        return $req->fetchAll();
    }
}

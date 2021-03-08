<?php

namespace Managers;

use Entities\Commentaire;

class CommentManager
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

    public function addComment(Commentaire $comment)
    {
        $req = $this->db->prepare('INSERT INTO commentaire (user_id, article_id, description, valide, date_creation) 
                     VALUES(?,?,?,?,NOW())');

        $req->execute(array($comment->getUserID(), $comment->getArticleID(), $comment->getDescription(), 0));
    }

    public function findCommentByUserId($user_id)
    {
        $req = $this->db->prepare('SELECT * FROM commentaire WHERE user_id = ?');
        $req->execute(array($user_id));
        $data = $req->fetch();
        if ($data) {
            return new Commentaire($data);
        }
        return null;
    }

    public function findCommentByArticleId($article_id)
    {
        $req = $this->db->prepare('SELECT * FROM commentaire WHERE article_id = ?');
        $req->execute(array($article_id));
        $data = $req->fetch();
        if ($data) {
            return new Commentaire($data);
        }
        return null;
    }

    public function getAllValidById($article_id) {
        $req = $this->db->prepare('SELECT * FROM commentaire WHERE article_id = ? AND valide = ? ORDER BY date_creation DESC');
        $req->execute(array($article_id, 1));
        return $req->fetchAll();
    }

    public function getAll()
    {
        $req = $this->db->query('SELECT * FROM commentaire ORDER BY date_creation DESC');
        $req->execute();

        return $req->fetchAll();
    }

    public function getAllUnvalid() {
        $req = $this->db->query('SELECT * FROM commentaire WHERE valide = 0 ORDER BY date_creation DESC');
        $req->execute();

        return $req->fetchAll();
    }

    public function getAllValid() {
        $req = $this->db->query('SELECT * FROM commentaire WHERE valide = 1');
        $req->execute();

        return $req->fetchAll();
    }

    public function changeValide($comment_id) {
        $req = $this->db->prepare('UPDATE commentaire SET valide = 1 WHERE id = ?');
        $req->execute(array($comment_id));
    }
}

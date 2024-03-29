<?php

namespace Managers;

use Entities\Commentaire;

class CommentManager extends Manager
{

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
        $comments = [];
        $res = $req->fetchAll();
        foreach ($res as $comment) {
            $comments[] = new Commentaire($comment);
        }
        return $comments;
    }

    public function getAll()
    {
        $req = $this->db->query('SELECT * FROM commentaire ORDER BY date_creation DESC');
        $req->execute();
        $comments = [];
        $res = $req->fetchAll();
        foreach ($res as $comment) {
            $comments[] = new Commentaire($comment);
        }
        return $comments;
    }

    public function getAllUnvalid() {
        $sql = 'SELECT c.*, u.pseudo, a.titre FROM commentaire c, article a, user u WHERE c.valide = 0 AND u.id = c.user_id AND a.id = c.article_id ORDER BY c.date_creation DESC';
        $req = $this->db->query($sql);
        $req->execute();

        $comments = [];
        $res = $req->fetchAll();
        foreach ($res as $comment) {
           $comments[] = ['pseudo'=>$comment['pseudo'], 'a_titre'=>$comment['titre'], 'comment'=>new Commentaire($comment)];
        }
        return $comments;
    }

    public function getAllValid() {
        $req = $this->db->query('SELECT * FROM commentaire WHERE valide = 1');
        $req->execute();
        $comments = [];
        $res = $req->fetchAll();
        foreach ($res as $comment) {
            $comments[] = new Commentaire($comment);
        }
        return $comments;
    }

    public function changeValide($comment_id) {
        $req = $this->db->prepare('UPDATE commentaire SET valide = 1 WHERE id = ?');
        $req->execute(array($comment_id));
    }

    public function deleteComment($id) {
        $req = $this->db->prepare('DELETE FROM commentaire WHERE id = ?');
        $req->execute(array($id));
    }
}

<?php

namespace Managers;

use Entities\Article;

class PostManager extends Manager
{

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
        if ($data) {
            return new Article($data);
        }
        return null;
    }

    public function findPostByID($id)
    {
        $req = $this->db->prepare('SELECT * FROM article WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        if ($data) {
            return new Article($data);
        }
        return null;
    }

    public function getAll()
    {
        $req = $this->db->query('SELECT * FROM article ORDER BY modifier_le DESC');
        $req->execute();
        $posts = [];
        $res = $req->fetchAll();
        foreach ($res as $post) {
            $posts[] = new Article($post);
        }
        return $posts;
    }

    public function changePost($new_title, $new_description, $id) {
        $req = $this->db->prepare('UPDATE article SET titre = ?, description = ?, modifier_le = NOW() WHERE id = ?');
        $req->execute(array($new_title, $new_description, $id));
    }
}

<?php

namespace Managers;

use Entities\Article;

class PostManager extends Manager
{

    public function addPost(Article $post)
    {
        $req = $this->db->prepare('INSERT INTO article(user_id, titre, chapo, description, modifier_le) 
                     VALUES(?,?,?,?,NOW())');
        $req->execute(array($post->getUserID(), $post->getTitre(), $post->getChapo(), $post->getDescription()));
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

    public function changePost($new_title, $new_chapo, $new_description, $id) {
        $req = $this->db->prepare('UPDATE article SET titre = ?, chapo = ?, description = ?, modifier_le = NOW() WHERE id = ?');
        $req->execute(array($new_title, $new_chapo, $new_description, $id));
    }

    public function deletePost($id) {
        $req = $this->db->prepare('DELETE FROM article WHERE id = ?');
        $req->execute(array($id));
    }
}

<?php

namespace Managers;

use Entities\User;

class UserManager
{
    private $db;

    public function __construct() {
        try {
            $this->db = new \PDO('mysql:host=127.0.0.1;port=3306;dbname=projet5', 'root', 'root', array(\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION));
        }
        catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addUser(User $user)
    {
        $req = $this->db->prepare('INSERT INTO user(pseudo, password, role, date_creation) 
                     VALUES(?,?,?,NOW())');
        /*$req->bindValue(':pseudo', $user->getPseudo());
        $req->bindValue(':password', $user->getPassword());
        $req->bindValue(':role', $user->getRole());
        $req->bindValue(':date_creation', date("d.m.y"));*/
        $req->execute(array($user->getPseudo(), $user->getPassword(), $user->getRole()));
    }

    public function findUser($username)
    {
        $req = $this->db->prepare('SELECT * FROM user WHERE pseudo = ?');
        $req->execute(array($username));
        $data = $req->fetch();
        if($data) {
            return new User($data);
        }
        return null;
    }

    public function findUserByID($id)
    {
        $req = $this->db->prepare('SELECT * FROM user WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        if($data) {
            return new User($data);
        }
        return null;
    }


    public function getAll()
    {
        $req = $this->db->query('SELECT * FROM user');
        $req->execute();

        return $req->fetchAll();
    }

    public function changeRole($role, $pseudo) {
        $req = $this->db->prepare('UPDATE user SET role = ? WHERE pseudo = ?');
        $req->execute(array($role, $pseudo));
    }
}
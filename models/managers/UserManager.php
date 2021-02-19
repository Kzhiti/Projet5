<?php

namespace Managers;

use Entities\User;

class UserManager
{
    private $db;

    public function __construct() {
        $this->db = new \PDO('mysql:host=localhost;dbname=projet5;charset=utf8_general_ci', 'root', 'root');
    }

    public function addUser(User $user)
    {
        $req = $this->db->prepare('INSERT INTO user(pseudo, password, role, date_creation) 
                     VALUES(:pseudo, :password, :role, :date_creation)');
        $req->bindValue(':pseudo', $user->getPseudo());
        $req->bindValue(':password', $user->getPassword());
        $req->bindValue(':role', $user->getRole());
        $req->bindValue(':date_creation', $user->getDateCreation());
        $req->execute();
    }

    public function findUser(User $user)
    {
        $req = $this->db->prepare('SELECT * FROM user WHERE pseudo = '.$user->getPseudo());
        $req->execute();

        return $req->fetch();
    }


    public function getAll()
    {
        $req = $this->db->query('SELECT * FROM user');
        $req->execute();

        return $req->fetchAll();
    }
}
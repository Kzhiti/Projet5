<?php

require_once("User.php");

class UserTab {

    private $db = new PDO('mysql:host=localhost;dbname=projet5;charset=utf8_general_ci', 'root', 'root');


    //Poser question par rapport à ID
    public function addUser(User $user) {
        $req = this->db->prepare('INSERT INTO user(pseudo, password, role, date_creation) 
                     VALUES(:pseudo, :password, :role, :date_creation)');
        $req->bindValue(':pseudo', $user->getPseudo());
        $req->bindValue(':password', $user->getPassword());
        $req->bindValue(':role', $user->getRole());
        $req->bindValue(':date_creation', $user->getDateCreation());
        $req->execute();
    }


    public function getAll() {
        $req = $this->db->query('SELECT * FROM user');
        $req->execute();

        return $req->fetchAll();
    }

    public function update(User $user) {
        $req = this->db->prepare('UPDATE user SET pseudo = "'.$user->getPseudo().'", password = "'.$user->getPassword().'", role = "'.$$user->getRole()'"
                                  WHERE id="'.$user->getID().'"');
        $req->execute();
    }
}
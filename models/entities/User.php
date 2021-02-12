<?php

class User{
    private $id;
    private $pseudo;
    private $password;
    private $role;
    private $date_creation;
}

public function getID() {
    return $id;
}

public function getPseudo() {
    return $pseudo;
}

public function getPassword() {
    return $password;
}

public function getRole() {
    return $role;
}

public function getDateCreation() {
    return $date_creation;
}

public function setPseudo($new_pseudo) {
    $pseudo = $new_pseudo;
}

public function setPassword($new_password) {
    $password = $new_password;
}

public function setRole($new_role) {
    $role = $new_role;
}

public function setDateCreation($new_date) {
    $date_creation = $new_date;
}
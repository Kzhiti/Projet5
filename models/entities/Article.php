<?php

class Article {
    private $id;
    private $user_id;
    private $titre;
    private $description;
    private $modifier_le;
}

public function getID() {
    return $id;
}

public function getUserID() {
    return $user_id;
}

public function getTitre() {
    return $titre;
}

public function getDescription() {
    return $description;
}

public function getDateModif() {
    return $modifier_le;
}

public function setTitre($new_title) {
    $titre = $new_title;
}

public function setDescription($new_description) {
    $description = $new_description;
}

public function setDateModif($new_date) {
    $modifier_le = $new_date;
}
<?php

class Commentaire {
    private $id;
    private $user_id;
    private $article_id;
    private $decription;
    private $date_creation;
    private $valide;
}

public function getID() {
    return $id;
}

public function getUserID() {
    return $user_id;
}

public function getArticleID() {
    return $article_id;
}

public function getDescription() {
    return $description;
}

public function getDateCreation() {
    return $date_creation;
}

public function getValid() {
    return $valide;
}

public function setDescription($new_description) {
    $description = $new_description;
}

public function setDateCreation($new_date) {
    $date_creation = $new_date;
}

public function setValid($new_valid) {
    $valide = $new_valid;
}
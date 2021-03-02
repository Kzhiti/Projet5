<?php

namespace Entities;

class Commentaire
{
    private $id;
    private $user_id;
    private $article_id;
    private $decription;
    private $date_creation;
    private $valide;


    public function getID()
    {
        return $this->id;
    }

    public function getUserID()
    {
        return $this->user_id;
    }

    public function getArticleID()
    {
        return $this->article_id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDateCreation()
    {
        return $this->date_creation;
    }

    public function getValid()
    {
        return $this->valide;
    }

    public function setId($new_id) {
        $this->id = $new_id;
    }

    public function setDescription($new_description)
    {
        $this->description = $new_description;
    }

    public function setDate_creation($new_date)
    {
        $this->date_creation = $new_date;
    }

    public function setValid($new_valid)
    {
        $this->valide = $new_valid;
    }
}
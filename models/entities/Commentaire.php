<?php

namespace Entities;

class Commentaire extends Entity
{
    private $user_id;
    private $article_id;
    private $description;
    private $date_creation;
    private $valide;

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

    public function setUser_id($new_id) {
        $this->user_id = $new_id;
    }

    public function setArticle_id($new_id) {
        $this->article_id = $new_id;
    }

    public function setDescription($new_description)
    {
        $this->description = $new_description;
    }

    public function setDate_creation($new_date)
    {
        $this->date_creation = $new_date;
    }

    public function setValide($new_valid)
    {
        $this->valide = $new_valid;
    }
}
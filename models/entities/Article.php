<?php

namespace Entities;

class Article
{
    private $id;
    private $user_id;
    private $titre;
    private $description;
    private $modifier_le;


    public function getID()
    {
        return $this->id;
    }

    public function getUserID()
    {
        return $this->user_id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDateModif()
    {
        return $this->modifier_le;
    }

    public function setId($new_id) {
        $this->id = $new_id;
    }

    public function setTitre($new_title)
    {
        $this->titre = $new_title;
    }

    public function setDescription($new_description)
    {
        $this->description = $new_description;
    }

    public function setModifier_le($new_date)
    {
        $this->modifier_le = $new_date;
    }
}
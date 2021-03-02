<?php

namespace Entities;

class Article
{
    private $id;
    private $user_id;
    private $titre;
    private $description;
    private $modifier_le;


    public function __construct(array $data = null) {
        if($data) {
            $this->hydrate($data);
        }
    }

    private function hydrate($data) {
        foreach($data as $key=>$value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

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

    public function setUser_id($new_id) {
        $this->user_id = $new_id;
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
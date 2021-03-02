<?php

namespace Entities;

class User
{
    private $id;
    private $pseudo;
    private $password;
    private $role;
    private $date_creation;

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

    public function getId()
    {
        return $this->id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getDateCreation()
    {
        return $this->date_creation;
    }

    public function setId($new_id) {
        $this->id = $new_id;
    }

    public function setPseudo($new_pseudo)
    {
        $this->pseudo = $new_pseudo;
    }


    public function setPassword($new_password)
    {
        $this->password = $new_password;
    }

    public function setRole($new_role)
    {
        $this->role = $new_role;
    }

    public function setDate_creation($new_date)
    {
        $this->date_creation = $new_date;
    }
}
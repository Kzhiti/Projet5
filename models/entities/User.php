<?php

namespace Entities;

class User extends Entity
{
    private $pseudo;
    private $password;
    private $role;
    private $date_creation;

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
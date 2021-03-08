<?php

namespace Middleware;

class Admin extends Middleware
{

    public function __construct() {
        if(!$this->allow()) {
            Response::launch403();
        }
    }

    protected function allow() : boolean {
        return (isset($_SESSION['role']) && $_SESSION['role'] == "Administrateur");
    }
}
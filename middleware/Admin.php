<?php

namespace Middleware;
use App\Response;

class Admin extends Middleware
{

    public function __construct() {
        if(!$this->allow()) {
            Response::launch403();
        }
    }

    protected function allow() : bool {
        return (isset($_SESSION['role']) && $_SESSION['role'] == "Administrateur");
    }
}
<?php


namespace Middleware;


class Auth extends Middleware
{
    public function __construct()
    {
        if(!$this->allow()) {
            Response::redirect('index.php?action=login');
        }
    }

    protected function allow() : bool {
        return isset($_SESSION['id']);
    }
}
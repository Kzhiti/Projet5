<?php
namespace Middleware;


class NotAuth extends Middleware
{

    public function __construct()
    {
        if(!$this->allow()) {
            Response::redirect('index.php?action=');
        }
    }

    protected function allow() : boolean {
        return !isset($_SESSION['id']);
    }
}
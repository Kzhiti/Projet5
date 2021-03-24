<?php
namespace Middleware;


use App\Response;

class NotAuth extends Middleware
{

    public function __construct()
    {
        if(!$this->allow()) {
            Response::launch403();
        }
    }

    protected function allow() : bool {
        return !isset($_SESSION['id']);
    }
}
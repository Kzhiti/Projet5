<?php


namespace Middleware;
use App\Response;


abstract class Middleware
{
    protected abstract function allow() : boolean;
}
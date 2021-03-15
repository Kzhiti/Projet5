<?php


namespace Middleware;


abstract class Middleware
{
    protected abstract function allow() : bool;
}
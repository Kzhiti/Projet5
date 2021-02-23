<?php
session_start();
require "../vendor/autoload.php";

use Controllers\AuthController;
use Controllers\ContactController;
use Controllers\PostController;

$action = $_GET['action'] ?? "";

if ($action != "") {
    switch ($action) {
        case 'register' :
            $controller = new AuthController();
            $controller->register();
            break;
        case 'login' :
            $controller = new AuthController();
            $controller->login();
            break;
        case 'logout' :
            $controller = new AuthController();
            $controller->logout();
            break;
        case 'contact' :
            $controller = new ContactController();
            $controller->contact();
            break;
        case 'listpost' :
            $controller = new PostController();
            $controller->listPost();
            break;
        case 'post' :
            $controller = new PostController();
            $controller->post();
            break;
        case 'singlepost' :
            $controller = new PostController();
            $controller->singlePost();
            break;
    }
}
else {
    require ('../views/home.php');
}
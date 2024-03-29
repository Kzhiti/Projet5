<?php
session_start();
require "../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

use App\Response;
use Controllers\AuthController;
use Controllers\ContactController;
use Controllers\PostController;
use Controllers\AdminController;


$action = $_GET['action'] ?? "";

if ($action != "") {
    switch ($action) {
        case 'register' :
            $user = new Middleware\NotAuth();
            $controller = new AuthController();
            $controller->register();
            break;
        case 'login' :
            $user = new Middleware\NotAuth();
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
            $admin = new Middleware\Admin();
            $controller = new PostController();
            $controller->post();
            break;
        case 'updatelistpost' :
            $admin = new Middleware\Admin();
            $controller = new PostController();
            $controller->updateListPost();

            break;
        case 'getupdatepost' :
            $admin = new Middleware\Admin();
            $controller = new PostController();
            $controller->getUpdatePost();
            break;
        case 'updatepost' :
            $controller = new PostController();
            $controller->updatePost();
            break;
        case 'singlepost' :
            $controller = new PostController();
            $controller->singlePost();
            break;
        case 'managing' :
            $admin = new Middleware\Admin();
            $controller = new AdminController();
            $controller->admin();
            break;
        case 'listuser' :
            $admin = new Middleware\Admin();
            $controller = new AdminController();
            $controller->listUser();
            break;
        case 'listcomment' :
            $admin = new Middleware\Admin();
            $controller = new AdminController();
            $controller->listComment();
            break;
        case 'rights' :
            $controller = new AdminController();
            $controller->giveRights();
            break;
        case 'comment' :
            $controller = new PostController();
            $controller->getCommentForm();
            break;
        case 'validecomment' :
            $controller = new AdminController();
            $controller->valideComment();
            break;
        case 'deletepost' :
            $controller = new PostController();
            $controller->getDeletePost();
            break;
        case 'deletecomment' :
            $controller = new AdminController();
            $controller->getDeleteComment();
            break;
    }
}
else {
    Response::view('../views/home.php');
}
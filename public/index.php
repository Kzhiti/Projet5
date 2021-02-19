<?php

require "../vendor/autoload.php";

use Controllers\AuthController;
use Controllers\ContactController;

$action = $_GET['action'] ?? "";

if ($action != "") {
    switch ($action) {
        case 'register' :
            $controller = new AuthController();
            $controller->register();
            break;
        case 'login' :
            $controller = new AuthController();
            //$controller->login();
            break;
        case 'logout' :
            $controller = new AuthController();
            $controller->logout();
            break;
        case 'contact' :
            $controller = new ContactController();
            $controller->contact();
            break;
    }
}
else {
    require ('../views/home.php');
}
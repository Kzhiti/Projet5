<?php

require "../vendor/autoload.php";

use Controllers\AuthController;

require ('../controllers/AuthController.php');

$action = $_GET['action'] ?? "";

if ($action != "") {
    switch ($action) {
        case 'registerPage' :
            require ('../views/register.php');
            break;
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
    }
}
else {
    require ('../views/home.php');
}
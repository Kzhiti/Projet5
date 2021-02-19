<?php

require "../vendor/autoload.php";

use Controllers\AuthController;

$action = $_GET['action'] ?? "";


switch($action) {
    case 'inscription' :
        $controller = new AuthController();
        $controller->inscription();
        break;
}
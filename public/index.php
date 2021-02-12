<?php

require "../vendor/autoload.php";

use Controllers\InscriptionController;

$action = $_GET['action'] ?? "";


switch($action) {
    case 'inscription' :
        $controller = new InscriptionController();
        $controller->inscription();
        break;
}
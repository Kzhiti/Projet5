<?php

private function dbConnect() {
    try {
        $db = new PDO('mysql:host=localhost;dbname=projet5;charset=utf8_general_ci', 'root', 'root');
    }
    catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    return $db;
}
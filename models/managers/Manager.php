<?php

namespace Managers;

abstract  class Manager {

    protected $db;

     public function __construct() {
         try {
             $this->db = new \PDO('mysql:host='. $_ENV['DB_HOST'] .';port='. $_ENV['DB_PORT'] .';dbname='. $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
         } catch (\PDOException $e) {
             echo $e->getMessage();
         }
     }
}
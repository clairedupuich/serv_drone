<?php

class MonPdo {
        private $hosthome = "localhost";
        private $database = "servdrone";
        private $userName = "claire";
        private $password = "claire";

        private $connexion = "mysql:host=".$hosthome.";dbname=".$database;
        public $monPdo = new PDO($connexion, $userName, $password)
        return $monPdo;

}




?>
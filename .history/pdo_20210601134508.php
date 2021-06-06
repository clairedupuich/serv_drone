<?php

class MonPdo {

    

        private $hosthome = "localhost";
        private $database = "servdrone";
        private $userName = "claire";
        private $password = "claire";

        private static $monPdo

        public static function utiliserPdo() {
            
        }

        private $connexion = "mysql:host=".$hosthome.";dbname=".$database;
        public $monPdo = new PDO($connexion, $userName, $password)
        return $monPdo;

}

class Personnage {
    public $prenom;
    public $nom;
    public $sexe;

    public __construct($prenomPerso, $nomPerso, $sexePerso) {
        $this->prenom = $prenomPerso;
        $this->nom = $nomPerso;
        $this->sexe = $sexePerso;
    }
}




?>
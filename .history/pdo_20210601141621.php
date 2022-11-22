<?php

class MonPdo {

    

        private $hosthome = "localhost";
        private $database = "servdrone";
        private $userName = "claire";
        private $password = "claire";

        private static $monPdo = null;

        public static function utiliserPdo() {
            if(is_null($monPdo)){
                try {
                    $connexion = "mysql:host=".$hosthome.";dbname=".$database;
                    public SELF:$monPdo = new PDO($connexion, $userName, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            
                } catch(PDOException $exception){
                    $errorMessage = "Erreur de connexion à la base de données".$exception->getMessage();
                    die($errorMessage);
                }
                
            }

            return SELF::$monPdo;
  
        }
}


?>
<?php

class MonPdo {

    

        private $hosthome = "localhost";
        private $database = "servdrone";
        private $userName = "claire";
        private $password = "claire";

        private static $monPdo = null;

        public static function utiliserPdo() {
            if(is_null(self::$monPdo)){
                try {
                    $connexion = "mysql:host=".$hosthome.";dbname=".$database;
                    public self:$monPdo = new PDO($connexion, $userName, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            
                } catch(PDOException $exception){
                    $errorMessage = "Erreur de connexion à la base de données".$exception->getMessage();
                    die($errorMessage);
                }
                
            }

            return self::$monPdo;
  
        }
}


?>
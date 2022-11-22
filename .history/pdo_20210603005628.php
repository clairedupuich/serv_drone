<?php

class MonPdo {
    private $hosthome = 'localhost';
    private $database = 'servdrone';
    private $userName = 'claire';
    private $password = 'claire';

        private static $monPdo = null;

        public static function utiliserPdo() {
            if(is_null(self::$monPdo)){
                try {
                    $connexion =mysqli_connect("localhost", "claire", "claire", "servdrone",3308) // 'mysql:host='.$hosthome.';port=3308;dbname='.$database;
                    self::$monPdo = new PDO($connexion, $userName, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            
                } catch(PDOException $exception){
                    $errorMessage = "Erreur de connexion à la base de données".$exception->getMessage();
                    die($errorMessage);
                }
                self::$monPdo->exec("SET CHARACTER SET UTF8");
                
             }

            return self::$monPdo;
      }

}
        

    


 /* 环境条件condtantes d'environnement  */
/* define("DBHOST","localhost");
define("DBUSER","claire");
define("DBPASS","claire");
define("DBNAME","servdrone");

/* DNS de connexion */
// $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

/* on va se connecter pdo */
/* try{
    //on instancie pdo
    $db = new PDO($dsn,DBUSER,DBPASS);

    echo "On est connecté";

    //on s'assure d'envoyer les données en UTF8
    $db->exec("SET NAMES utf8");
}catch(PDOException $e){
    die("Erreur : ".$e->getMessage());
}  */

//ici on est connectés à la base 
//on peut récupérer la liste de utilisateur
//    $sql = "SELECT * FROM 'users'";
//on exécute directement la requete


?>
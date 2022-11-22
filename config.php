<?php
// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'claire');
define('DB_PASSWORD', 'claire');
define('DB_NAME', 'servdrone');
 
// Connexion � la base de donn�es MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME,3308);
 
// V�rifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>
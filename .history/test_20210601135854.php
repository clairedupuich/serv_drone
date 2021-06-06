<?php

require_once("pdo.php");


$sql = "INSERT INTO `users` 
(email, firstname, lastname, password) 
VALUES ('Jean-Marie@gmail.com', 'Jean-Marie', 'Dupuich', 'test')";

function execute($sql) {

    $pdo = MonPdo::utiliserPdo();
$statement = $pdo->prepare($sql);
$statement->execute();

}




?>
<?php

require_once("pdo.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$sql = "INSERT INTO `users` 
(email, firstname, lastname, password) 
VALUES ('Jean-Marie@gmail.com', 'Jean-Marie', 'Dupuich', 'test')";

function execute($sql) {

    $pdo = MonPdo::utiliserPdo();
$statement = $pdo->prepare($sql);
$statement->execute();

}

if(isset($_POST["adress"])){
    execute($sql);
}

?>


<form action="#" method="POST">
    <input type="text" name="adress"></input>

</form>
    
</body>
</html>




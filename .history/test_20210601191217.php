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
    require_once("pdo.php");

    if(isset($_POST["username"])) {
         echo "bonjour".$_POST["usern"];
    }

    ?>
        <form action="#" method="POST">

                compt
                <label for="pseudo">Nom d'utilisateur</label>
                <input type="text" id ="pseudo" name="username">
            
                密码mot de pass
                <label for="pwd">Mot de passe</label>
                <input type="password" name="password" id="pwd">
               
                <button type="submit">Valider</button>
                
        </form>
    </body>
</html>
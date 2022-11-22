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
    require_once("pdo.php") 

    ?>
        <form action="#" method="POST">

                compt
                <input type="text" name="userName" size="20" maxlength="15" placeholder="Veuillez remplir le nom d'utilisateur">
                <br>
            
                密码mot de pass
                <input type="password" name="password" size="20" maxlength="15">
                <br>
                <input type="submit" value="登录connexion">
                <input type="button" onclick="window.location.href='register.html'" value="注册inscrit">
                
        </form>
    </body>
</html>
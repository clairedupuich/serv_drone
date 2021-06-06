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
    //require_once("pdo.php");

    $hosthome = 'localhost';
    $database = 'servdrone';
    $userName = 'claire';
    $password = 'claire'; //此处直接链接数据库。pdo文件不能运行。


                try {
                    $connexion = 'mysql:host='.$hosthome.';port=3308;dbname='.$database;
                    $monPdo = new PDO($connexion, $userName, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    if(isset($_POST["submit"])) {
                        if(isset($_POST["username"], $_POST["password"], $_POST["email"]) && !empty($_POST["username"])&& !empty($_POST["password"]) && !empty($_POST["email"])) {
                            //echo "bonjour".$_POST["username"];
                            $firstname = $_POST["username"];
                            $password = $_POST["password"];
                            $email = $_POST["email"];
                            //$pdo = MonPdo::utiliserPdo(); // tu te connectes à PDO
                            $sql = "INSERT INTO `users` (`firstName`, `password`, `email`) VALUES ('".$firstname."', '".$password."', '".$email."')";
                            $requete = $monPdo->prepare($sql);
                            $requete->execute();
                            
                       } else {
                           echo "Veuillez remplir tout !";
                       }
                    }
            
                } catch(PDOException $exception){
                    $errorMessage = "Erreur de connexion à la base de données".$exception->getMessage();
                    die($errorMessage);
                }

    

    // $_POST = [
    //     "username" => "claire"
    //     "password" => "123"
            //"email" => "n;,n;,n",
            //"submit" => "submit"


    // ]
    

    ?>
     <h2>Enregistrement des utilisateurs et système de connexion</h2>
<hr>
        <form action="#" method="POST">
            

                
                <label for="pseudo">Nom d'utilisateur</label>
                <input type="text" id ="pseudo" name="username"><br>
            
               
                <label for="pwd">Mot de passe</label>
                <input type="password" name="password" id="pwd"><br>

                <label for="mail">votre Mail</label>
                <input type="email" name="email" id="mail"><br>
               
                <button type="submit" name="submit" value="submit">Valider</button>
                <input type="reset" name="cancel" value="Recharge">
        </form>
        
        <form action="login_process.php" method="POST">
        compt
        <input type="text" name="userName" size="20" maxlength="15" placeholder="Veuillez remplir le nom d'utilisateur">
        <br>
    
        密码mot de pass
        <input type="password" name="password" size="20" maxlength="15">
        <br>
        <input type="submit" value="登录connexion">
        <input type="button" onclick="window.location.href='register.html'" value="注册inscrit">
    </form>

</html>
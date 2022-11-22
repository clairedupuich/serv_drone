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

                         /*输入没有逻辑问题，开始判断用户名是否已经存在于数据库*/
        $select = "select * from users where firstName = '$name'";
        $query = $conn->query($select);
        $row = mysqli_fetch_assoc($query);
        /*如果存在，则说明数据库中有重名的*/
        if ($row){
            echo "<script>alert('用户名已存在，请重新输入！')</script>";
        }else{
            $insert = "insert into admin(name,password) value('$name','$password')";
            $query1 = $conn->query($insert);

                            
                            $sql = "INSERT INTO `users` (`firstName`, `password`, `email`) VALUES ('".$firstname."', '".$password."', '".$email."')";
                            $requete = $monPdo->prepare($sql);
                            $requete->execute();
                            //注册成功，前往登录
                            echo "<script>alert('inscription réussie,Aller à la connexion！');
                            window.location.href='test1.php';
                            </script>";
                            
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
    </body>
</html>
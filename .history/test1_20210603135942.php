<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css" media="screen" type="text/css" />
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
                    

                    /*判断是否上面的表单是否有输入，有输入时才执行以下部分，不然打开页面的时候会报错*/
if ($_POST){
    /*获取表单传输过来的值*/
    $firstName = $_POST['username'];
    $password = $_POST['password'];
    /*echo $firstName;
    echo $password;*/

        $select = "select * from users where firstName = '$firstName' and password = '$password'";
        echo $select;
   
        $query = $conn->query($select);
        $row = mysqli_fetch_assoc($query);
        /*判断数据库中是否存在传输过来的信息*/
       
       if(row)  {
            echo "<script>alert('connexion réussie登录成功！');</script>";     //假如做了登录后的页面，还可以跳转到客户自己的账户进行修改 window.location.href='index.php';
        }else{
            echo "<script>alert('nom d'utilisateur ou mot de passe incorrect！')</script>";
        }
}
            
                } catch(PDOException $exception){
                    $errorMessage = "Erreur de connexion à la base de données".$exception->getMessage();
                    die($errorMessage);
                }

    

    

    ?>
     <h2>Si vous êtes déjà inscrit, veuillez vous connecter sur cette page</h2>
<hr>
<div id="container">
            <!-- zone de connexion -->
            
            <form action="verification.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN' >
                <input type="button" id="zc"  value="inscrit">  <!-- 假如在单独的html文件中可以通过在input中直接加入 onclick="window.location.href='register.html'" 来实现链接 -->
        </form>
        
        <!--在点击注册的时候，需要跳转到注册页面,使用js代码来实现-->
<script>
    $('#zc').click(function () {
        window.location.href="test.php";
    });
</script>
               
               
               
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>

</html>
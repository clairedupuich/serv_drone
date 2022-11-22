<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 实现登录功能 -->
    <?php
    include_once("function/database.php");
    // $userName = $_POST['userName'];
    // $password = $_POST['password'];
    $userName = addslashes($_POST['userName']);
    $password = addslashes($_POST['password']);
    getConnect();
    $loginSQL = "select * from users where userName='$userName' and password='$password'";
    echo $loginSQL;
    $resultLogin = mysql_query($loginSQL);
    if (mysql_num_rows($resultLogin) > 0) {          //假如在数据库中有对应的数据，则显示登录成功，否则显示登录失败
        echo "connexion réussie登录成功";
    } else {
        echo "Échec de la connexion登录失败";
    }
    closeConnect();
?>

</body>
</html>
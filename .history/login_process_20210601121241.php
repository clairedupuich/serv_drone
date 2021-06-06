

    <!-- 实现登录功能 -->
    <?php
    include_once("database.php"); /*因为需要链接数据库，所以先引入链接数据库的代码*/
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



    <!-- 实现注册功能 -->
    <?php
   
    include_once("database.php");  /*因为需要链接数据库，所以先引入链接数据库的代码*/

    if (empty($_POST)) {
        exit("Les données du formulaire que vous avez soumises dépassent post_max_size! <br>");  //您提交的表单数据超过post_max_size
    }

    // 判断输入密码与确认密码是否相同
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if ($password != $confirmPassword) {
        exit("Le mot de passe saisi n'est pas égal au mot de passe confirmé！");  //输入的密码与确认密码不相等
    }

    $userName = $_POST['userName'];
    $domain = $_POST['domain'];
    $userName = $userName . $domain;

    // 判断用户名是否重复
    $userNameSQL = "select * from users where userName = '$userName'";
    getConnect();
    $resultSet = mysql_query($userNameSQL);
    if (mysql_num_rows($resultSet) > 0) {
        exit("Le nom d'utilisateur est déjà occupé, veuillez changer pour un autre nom d'utilisateur"); //用户名已被占用，请更换其他用户名
    }

    $sex = $_POST['sex'];
  

    $registerSQL = "insert into users values(null, '$userName', '$password', '$sex')";

    $userSQL = "select * from users where user_id = '$userID'";
    $userResult = mysql_query($userSQL);
    if ($user = mysql_fetch_array($userResult)) {
        echo "Votre nom d'utilisateur enregistré est：" . $user['userName'];   //您的注册用户名为
    } else {
        exit("L'enregistrement de l'utilisateur a échoué！");                                    //用户注册失败
    }
    closeConnect();


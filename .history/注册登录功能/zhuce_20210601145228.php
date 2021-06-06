<!--注册页面，简易化的功能，只需要输入用户名和密码即可，但需要判断用户名是否已经存在-->
<meta charset="UTF-8">
<?php

/*需要连接数据库，将代码连接进来*/
include ('sql.php');
?>
<style>
    *{
        padding: 0;
        margin: 0;
        list-style: none;
        text-decoration: none;
    }
</style>

<form method="post">
    <h1>注册页面</h1>
    <ul>
        <li><input type="text"  name="name" placeholder="输入登录名"></li>
        <li><input type="password" name="password1" placeholder="输入密码"></li>
        <li><input type="password" name="password" placeholder="确认密码"></li>
        <li><input type="submit" value="注册"> <input type="button" value="返回登录" id="dl"></li>
    </ul>
</form>

<?php
if ($_POST){
    $name = $_POST['name'];
    $password1 = $_POST['password1'];
    $password = $_POST['password'];
    if ($password1 == $password){
        /*输入没有逻辑问题，开始判断用户名是否已经存在于数据库*/
        $select = "select * from admin where name = '$name'";
        $query = $conn->query($select);
        $row = mysqli_fetch_assoc($query);
        /*如果存在，则说明数据库中有重名的*/
        if ($row){
            echo "<script>alert('用户名已存在，请重新输入！')</script>";
        }else{
            $insert = "insert into admin(name,password) value('$name','$password')";
            $query1 = $conn->query($insert);
            /*将这语句执行后，就已经能够将数据存入数据库中，所以需要弹到登录页面进行登录*/
            echo "<script>alert('注册成功，前往登录！');
window.location.href='denglu.php';
</script>";
        }
    }else{
        echo "<script>alert('两次密码不一致，请重新输入！')</script>";
    }
}
?>
<!--点击返回登录后，需要跳转到登录页面，还是使用js来进行-->
<script>
    $('#dl').click(function () {
        window.location.href="denglu.php";
    });
</script>

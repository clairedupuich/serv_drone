<meta charset="UTF-8">
<?php
/*因为需要链接数据库，所以先引入链接数据库的代码*/
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
    <h1>登录页面</h1>
    <ul>
        <li><input type="text" name="name" placeholder="输入登录名"></li>
        <li><input type="password" name="password" placeholder="输入密码"></li>
        <li><input type="submit" value="登录"> <input type="button" value="去注册" id="zc"></li>
    </ul>
</form>

<?php
/*判断是否上面的表单是否有输入，有输入时才执行以下部分，不然打开页面的时候会报错*/
if ($_POST){
    /*获取表单传输过来的值*/
    $name = $_POST['name'];
    $password = $_POST['password'];
    /*echo $name;
    echo $password1;
    echo $password;*/

        $select = "select * from admin where name = '$name' and password = '$password'";
        $query = $conn->query($select);
        $row = mysqli_fetch_assoc($query);
        /*判断数据库中是否存在传输过来的信息*/
        if ($row){
            echo "<script>alert('登录成功！');
window.location.href='index.php';
</script>";
        }else{
            echo "<script>alert('用户名或密码错误！')</script>";
        }
}
?>
<!--在点击注册的时候，需要跳转到注册页面,使用js代码来实现-->
<script>
    $('#zc').click(function () {
        window.location.href="zhuce.php";
    });
</script>


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

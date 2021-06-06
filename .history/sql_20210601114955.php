
<?php
/*因为需要链接数据库，所以先引入链接数据库的代码*/
include ('sql.php');
?>
 <!--  实现数据库连接与关闭的函数   -->

 <?php
    $databaseConnection = null;
    function getConnect() {
        $hosthome = "localhost";
        $database = "servdrone";
        $userName = "claire";
        $password = "claire";
        global $databaseConnection;
        $databaseConnection = @mysql_connect($hosthome, $userName, $password) or die (mysql_error());
        mysql_query("set names gbk");
        @mysql_select_db($database, $databaseConnection) or die (mysql_error());
    }
    
    function closeConnect() {
        global $databaseConnection;
        if ($databaseConnection) {
            @mysql_close($databaseConnection) or die (mysql_error());
        }
    }
?>

 <!-- 实现数据库连接与关闭的函数 -->
 <?php 
     $dbms='mysql';               //数据库类型，mysql为mysql，mssql为dblib，
     $host='localhost';               //数据库主机名:端口，默认端口可以忽略
     $dbName='servdrone';             //数据库名
     $user='claire';               //用户名
     $passwd='claire';               //用户密码
     $dsn='$dbms:host=$host;dbname=$dbName';                //组成数据源
      
     $sql = '';
      
      
     $DB = new PDO($dsn, $user, $passwd);    //初始化对象
     //$rs = $DB->query($sql);             //查询语句
     //$rs = $dbh->exec($sql);             //插入或者更新等语句
      
     while($row = $rs->fetch()){
         print_r($row);                   //输出
     }
         
    ?>


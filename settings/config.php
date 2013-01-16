<!DOCTYPE html>
<?php
define('HOSTNAME', 'localhost'); //数据库主机名
define('USERNAME', 'pandacareteam'); //数据库用户名
define('PASSWORD', 'panda'); //数据库用户登录密码
define('DATABASE_NAME', 'pandacare'); //需要查询的数据库
$conn = mysql_connect(HOSTNAME, USERNAME, PASSWORD) or
        die(mysql_error());
//连接不上，就会显示mysql出错的原因。
mysql_select_db(DATABASE_NAME,$conn) or die(mysql_error());

?>

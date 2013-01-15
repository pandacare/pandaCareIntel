<html>
<head>
<title>Activation</title>
<meta http-equiv="Conten-Type" content="text/html; charset=gb2312"></meta>
</head>
<body>
<?php
//获取用户名，激活码
$UserName1=$HTTP_POST_VARS["UserName"];
$actNum1=$HTTP_POST_VARS["actNum"];
include 'config.php';
//检查用户名和激活码是否正确
$query="select * from als_signup where UserName='$UserName1' and
actNum='$actNum1'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
if ($row)
{
//如果用户名和激活码正确，成功激活，将数据库表中激活码设为 0
$query="update als_signup set actNum='0' where UserName='$UserName1'";
$result=mysql_query($query);
?>
Succeed.。<br>
Click <a href="login.php">here</a> to login.
<?php
}
else
{
echo "Error<br>";
?>
<a href="activate.php">Return</a>
<?php
}
?>
</body>
</html>
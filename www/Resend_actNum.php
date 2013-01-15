<html>
<head>
<title>Resend activation number</title>
<meta http-equiv="Conten-Type" content="text/html; charset=gb2312"></meta>
</head>
<body>
<?php
//获取用户名，激活码，邮件地址
$UserName1=$HTTP_POST_VARS["UserName"];
$actNum1=$HTTP_POST_VARS["actNum"];
$Email1=$HTTP_POST_VARS["Email"];
$Resend=$HTTP_POST_VARS["Resend"];//检查是否需要重发激活码.在点击重新发送激活码后传递的隐藏数据
//如果用户要求再次发送激活码
include 'config.php';
if ($Resend==1)
{
$query="select * from als_signup where UserName='$UserName1' and Email='$Email1'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);

if ($row)
{

$actNum=$row["actNum"];
$subject="激活码";
$message="您的激活码为：$actNum";
mail($Email1,$subject,$message);
?>
Activation number has been resent.<br>
Click <a href="activate.php">here</a> to reactivate。
<?php
}
else
{
?>
Wrong username or email address。<br>

Click <a href="activate.php">here</a>to return。
<?php
}
}
?>
</body>
</html>
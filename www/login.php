<?php
//在显示登录界面之前，首先判断是否保存了用户登录信息，如果有，则自动登录
include 'config.php';
session_start(); //启动会话
$query = "select * from als_signup where UserName='{$_SESSION['UserName']}' and
Password='{$_SESSION['Password']}'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
if ($row) {
//如果 session 会话变量用户名与密码匹配，则自动登录，直接跳转到管理页面
    header("refresh:1;url=http://localhost/newproject/manage.php");
    exit;
}
?>
<html>
    <head>
        <title>Log in</title>
    </head>
    <body>
        <form name="form1" method="post" action="login_go.php">
            Name:<input name="UserName" type="text" size="20" id="UserName"></input><br>
            Password:<input name="Password" type="password" size="20"
                            id="Password"></input><br>
            <input name="KeepInfo" type="checkbox" value="KeepInfo"></input>Save Information(7
            days)<br><br>
            <input name="Submit" type="submit" value="Log in"></input>
        </form>
        <a href="forgot.php">Forgot password?</a>
        <a href="SignUp.php">New Account</a>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require("config.php");
        session_start(); //启动会话
//获取用户的登录信息。用户名，密码，是否保存信息
        if ($_POST['Submit']) {
            $UserName1 = $_POST["UserName"];
            $Password1 = $_POST["Password"];
            $Remember = $_POST["KeepInfo"];
        }
//如果用户点击了保存登录信息，将 Remember 置为 1，否则置为 0
        if ($Remember == "KeepInfo") {
            $Remember = "1";
        } else {

            $Remember = "0";
        }
//查询用户名是否存在
        $query = "select * from Members where UserName='$UserName1'";
        $result = mysql_query($query);
        $row = mysql_fetch_array($result);
        //echo $row['ID'] . " " . $row['UserName'] . " " . $row['Patients_ID'];

        if ($row) {
//查询用户是否已经激活
            if ($row['actNum'] == "0") {
//判断登录失败次数是否小于等于 5 次
                if ($row['NumLoginFail'] <= 5) {
//判断密码是否正确
                    if ($row['Password'] == $Password1) {
//如果密码正确，修改最近登录时间，将登录失败信息清除
                        $datetime = date("d-m-Y G:i");
                        $query = "update Members set LastLogin='$datetime' where
UserName='$UserName1'";
                        $result = mysql_query($query);
                        $query = "update Members set NumLoginFail='0' where UserName='$UserName1'";
                        $result = mysql_query($query);
//创建会话，保存登录信息
                        session_unset(); //删除会话
                        session_destroy();
//发送 cookie 到客户端，密码被加密
                        if ($Remember == '1') {
                            setcookie("RememberCookieUserName", $UserName1, (time() + 604800));
                            setcookie("RememberCookiePassword", md5($Password1), (time() + 604800));
                            exit;
                        }
                        
                        //$_POST["UserName"] = $UserName1;
                        //$_POST["Password"] = $Password1;
                        //header("refresh:1;url=http://localhost/newproject/manage.php");
                    } else {
//密码错误，登录失败
//检查上次登录失败时间是否在 5min 之内，如果不是，则登录失败次数增加 1
                        $datetime = date("d-m-Y G:i ", strtotime("-5 minutes")); //获取 5 分钟以前的时
                        $timenow = date("d-m-Y G:i "); //获取现在的时间
                        if ($row['LastLoginFail'] < $datetime) {//不在 5min 之内
//登录失败次数加 1
                            $query = "update Members set NumLoginFail=NumLoginFail+1 where
UserName='$UserName1'";
                            $result = mysql_query($query);
//修改登录失败时间
                            $query = "update Members set LastLoginFail='$timenow' where
UserName='$UserName1'";
                            $result = mysql_query($query);
//返回到登录页面
                            header("refresh:5;url=http://localhost/newproject/login.php");
                            echo "Wrong Password<br>";
                        } else { //在 5min 之内，只修改登录失败时间
                            $query = "update Members set LastLoginFail='$timenow' where
UserName='$UserName1'";
                            $result = mysql_query($query);
//返回到登录页面
                            header("refresh:5;url=http://localhost/newproject/login.php");
                            echo "Wrong password<br>";
                        }
                    }
                } else {
//失败次数超过 5 次
//检查时间，如果上次登录失败在半个小时前，则解锁，给用户一次重新登录机会。只有一次机会
                    $datetime = date("d-m-Y G:i, ", strtotime("-30 minutes"));
                    if ($row['LastLoginFail'] < $datetime) { //半个小时以前
                        $query = "update Members set NumLoginFail='5' where UserName='$UserName1'";
                        $result = mysql_query($query);
                    } else {
//半个小时内，则锁定帐户，返回到登录页面，半个小时后解锁
                        $timenow = date("d-m-Y G:i ");
                        $query = "update Members set LastLoginFail='$timenow' where
UserName='$UserName1'";
                        $result = mysql_query($query);
                        header("refresh:5;url=http://localhost/newproject/login.php");
                        echo "Your account has been locked";
                        echo "<br>automatically return after 5 seconds";
                        exit;
                    }
                }
            }
//激活码不为 0.用户需要激活
            else {
                header("refresh:5;url=http://localhost/newproject/activate.php");
                echo "Your account hasnot been activated. <br> automatically return after 5 seconds";
            }
        }
        ?>

        <form name="form2" method="post" action="manage.php">
            Hello! Dear <input name="UserName" type="text" id="UserName" value="<?php echo htmlspecialchars($UserName1); ?>"></input><br><br>
            <input name="Display" type="submit" value="Click to see the patients' information!"></input>
        </form>
        
    </body>
</html>

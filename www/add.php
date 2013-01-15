<!DOCTYPE html>
<?php
//用户注册以后的数据处理文件。需要先检查数据合法性，然后写入数据库
//获取注册用户提交的数据
$UserName1=$_POST["UserName"];//用户名
$Password1=$_POST["Password"];//密码
$ConfirmPassword1=$_POST["ConfirmPassword"];//确认密码
$Email1=$_POST["Email"];//邮箱
//定义保存激活码变量
$actnum="";
//导入数据库文件
include 'config.php';
//定义产生激活码函数
function Check_actnum()
{
$chars_for_actnum=array("A","B","C","D","E","F","G","H","I","J","K","L",
"M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d",
"e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v",
"w","x","y","z","1","2","3","4","5","6","7","8","9","0"
);
for ($i=1;$i<=20;$i++)//生成一个 20 个字符的激活码
{
$actnum.=$chars_for_actnum[mt_rand(0,count($chars_for_actnum)-1)];
}
return $actnum;
}
//判断用户名函数
function Check_username($UserName)//参数为用户注册的用户名
{
//用户名三个方面检查
//是否为空 字符串检测 长度检测
$Max_Strlen_UserName=16;//用户名最大长度
$Min_Strlen_UserName=4;//用户名最短长度
$UserNameChars="^[A-Za-z0-9_-]";//字符串检测的正则表达式
$UserNameGood="Good username";//定义返回的字符串变量
if($UserName=="")
{
$UserNameGood="username error";
echo "username error";
return $UserNameGood;
}
if(!ereg("$UserNameChars",$UserName))//正则表达式匹配检查
{
$UserNameGood="username error";
echo "username error";
return $UserNameGood;
}
if (strlen($UserName)<$Min_Strlen_UserName ||
strlen($UserName)>$Max_Strlen_UserName)
{
 $UserNameGood="the lenghth of username should be 4 to 16";
 echo "the lenghth of username should be 4 to 16";
 return $UserNameGood;
}
return $UserNameGood;
}
//判断密码是否合法函数
function Check_Password($Password)
{
//是否为空 字符串检测 长度检测
$Max_Strlen_Password=16;//密码最大长度
$Min_Strlen_Password=6;//密码最短长度
$PasswordChars="^[A-Za-z0-9_-]";//密码字符串检测正则表达式
$PasswordGood="Good Password";//定义返回的字符串变量
if($Password=="")
{
$PasswordGood="Good Password";
echo "Good Password";
return $PasswordGood;
}

if(!ereg("$PasswordChars",$Password))
{
$PasswordGood="Bad password";
echo "Bad Password";
return $PasswordGood;
}

if(strlen($Password)<$Min_Strlen_Password ||
strlen($Password)>$Max_Strlen_Password)

{
$PasswordGood="the length of password should be 6 to 16";
echo "the length of password should be 6 to 16";
return $PasswordGood;
}
return $PasswordGood;
}
//判断邮箱是否合法函数
function Check_Email($Email)
{
$EmailChars="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*$";//正则表达式判断是否是合法邮箱地址
$EmailGood="Good Email";
if($Email=="")
{
$EmailGood="Email Error";
return $EmailGood;
}
if(!ereg("$EmailChars",$Email))//正则表达式匹配检查
{
$EmailGood="Bad Email";
return $EmailGood;
}
return $EmailGood;
}
//判断两次密码输入是否一致
function Check_ConfirmPassword($Password,$ConfirmPassword)
{
$ConfirmPasswordGood="Password OK";
}
if($Password<>$ConfirmPassword)
{
$ConfirmPasswordGood="Diffirent password input";
return $ConfirmPasswordGood;
}
else
{    
return $ConfirmPasswordGood;
}
//调用函数，检测用户输入的数据
$UserNameGood=Check_username($UserName1);
$PasswordGood=Check_Password($Password1);
$EmailGood=Check_Email($Email1);
$ConfirmPasswordGood=Check_ConfirmPassword($Password1,$ConfirmPassword1);
$error=false;//定义变量判断注册数据是否出现错误
if($UserNameGood !="Good username")
{
$error=true;//改变 error 的值表示出现了错误
echo $UserNameGood;//输出错误信息
echo "<br>";
}
if($PasswordGood !="Good password")
{
$$error=true;
echo $PasswordGood;
echo "<br>";
}
if($EmailGood !="Good email address")
{
$error=true;
echo $EmailGood;
echo "<br>";
}
if ($ConfirmPasswordGood !="Password OK")
{
$error=true;
echo $ConfirmPasswordGood;
echo "<br>";
}
//判断数据库中用户名和 email 是否已经存在
$query="select * from als_signup where UserName='$UserName1' or Email='$Email1'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
while ($row)
{
if ($row["UserName"]==$UserName1)
{

$error=true;
echo "Existed username<br>";
}
if ($row["Email"]==$Email1)
{
$error=true;
echo "Existed email address<br>";
}
}
//如果数据检测都合法，则将用户资料写进数据库表
if ($error==false) //$error==false 表示没有错误
{
$actnum=Check_actnum();//调用激活码函数
$Datetime=date("d-m-y G:i");//获取注册时间，也就是数据写入到用户表的时间
$query="insert into als_signup
(UserName,Password,Email,actNum,UserLevel,SignUpdate,LastLogin,LastLoginFail,Nu
mLoginFail)
values
('$UserName1','$Password1','$Email1','$actnum','1','$Datetime','0','0','0')";
$result=mysql_query($query);
$to=$Email1;//用户注册的邮箱
$subject="Activation number";
$message="Your activation number is $actnum";
$header="From:kristin-wang@163.com"."\r\n";//邮件头信息
if(mail($to,$subject,$message,$header))//php 中 mail()函数用来发送邮件，需要更改 php.ini 文件，最好安装 SMTP 服务器
{
//产生链接，链接到激活页面
?>   
Please check your email and activate your account. Click <a href="activate.php">here</a>to activate
<?php
}
}
?>
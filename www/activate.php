<html>
<head>
<title>Account Activation</title>
<meta http-equiv="Conten-Type" content="text/html; charset=iso-8859-1"></meta>
</head>
<body>
<h1>Account Activation</h1>
<form name="form1" method="post" action="active_go.php" >
Thank you, activation number has been sent to your email box.<br>
Username：<input name="UserName" type="text" id="UserName" size="20"></input><br>
Activation number：<input name="actNum" type="text" id="actNum" size="20"></input><br>
<input name="Submit" type="submit" value="激活"></input><br>
</form>
<br><br><br>
<form name="form2" method="post" action="Resend_actNum.php">
Resend email：<br>
Username：<input name="UserName" type="text" id="UserName" size="20"></input><br>
Email：<input name="Email" type="text" id="Email" size="20"></input>
<input name="Resend" type="hidden" id="Resend" value="1"></input><br>
<input name="Submit" type="submit" value="发送"></input>
</form>
</body>
</html>
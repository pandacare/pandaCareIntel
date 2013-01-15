<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "PandaCare Information Centre";
        echo "<br /> <br />";
        echo "Exsting users? Please login!";
        echo "<br /> <br />";
        ?>
        
        <form name="form1" method="post" action="login_go.php">
        Name:<input name="UserName" type="text" size="20" id="UserName"></input><br>
        Password:<input name="Password" type="password" size="20"
        id="Password"></input><br><br>
        <input name="KeepInfo" type="checkbox" value="KeepInfo"></input>Save Information(7
        days)<br><br>
        <input name="Submit" type="submit" value="Log in"></input>
        </form>
        <a href="forgot.php">Forgot password?</a>
        <a href="SignUp.php">New Account</a>
    </body>
</html>

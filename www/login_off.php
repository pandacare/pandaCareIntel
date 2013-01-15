
<!DOCTYPE html>
<?php

session_start();

setcookie("RememberCookieUserName","UserName",time()-60);
setcookie("RememberCookiePassword","Password",time()-60);

session_unset();
session_destroy();

header("refresh:1;url=http://localhost/newproject/login.php");
?>

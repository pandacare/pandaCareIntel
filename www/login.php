<?php
include '../settings/config.php';

$query = "select * from als_signup where UserName='{$_SESSION['UserName']}' and
Password='{$_SESSION['Password']}'";
$result = mysql_query($query);
if($result) {
$row = mysql_fetch_array($result);
if ($row) {
    header("refresh:1;url=http://localhost/newproject/manage.php");
    exit;
}
}
$template_name = 'templates/login_template.php';
?>

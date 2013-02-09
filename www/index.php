<?php
session_start();

if(!isset($_GET['url'])) {
	$url = "";
} else {
	$url = $_GET['url'];
}

$template_name = '';
$context = array("blocks" => array(), "debug" => true);

if (preg_match("/^$/", $url)) {
	include_once('home.php');
}
else if(preg_match("/^login\/?$/", $url)) {
	include_once('login.php');
}
else if (preg_match("/^manage\/?$/", $url))
{
	include_once('manage.php');
}
else if (preg_match("/^example\/?$/", $url))
{
	include_once('example.php');
}
else
{
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found', true, 404);
	exit();
}

if ($template_name != '')
{
	include_once($template_name);
}
?>
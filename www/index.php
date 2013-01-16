<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$url = $_GET['url'];

$template_name = '';
$context = array("blocks" => array(), "debug" => true);

if (preg_match("/^$/", $url))
{
	include_once('login.php');
}
else if (preg_match("/^manage\/$/", $url))
{
	include_once('manage.php');
}
else if (preg_match("/^example\/$/", $url))
{
	include_once('example.php');
}
else
{
	// This is the error case, which we should handle at some point
}

if ($template_name != '')
{
	include_once($template_name);
}
?>
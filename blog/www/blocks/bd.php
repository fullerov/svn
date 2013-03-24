<?
ob_start();
session_start();
$db= mysql_connect("openserver","blog","12345");
mysql_select_db("blog",$db);
?>
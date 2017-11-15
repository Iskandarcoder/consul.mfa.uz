<?php
session_start();

$host="localhost";
$user="master";
$pass="master001";
$base="consul";
$bd = mysql_connect($host, $user, $pass) or die("Error:".mysql_error());
mysql_select_db($base, $bd) or die("Can't select DB ".mysql_error());
 mysql_query("SET NAMES 'UTF8'");
 
     $login = $_POST['nomi'];
     $text  = $_POST['text'];
     $cdate = date("Y-m-d H:m:s");
     $query = "INSERT INTO comments (nomi, text_com, sana )
							  VALUES ('$login', '$text', '$cdate')";
		$result = mysql_query($query) or die(mysql_error());
?>
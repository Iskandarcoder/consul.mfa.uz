<?php
$host='localhost';
$user="master";
$pass="master001";
$base="evisa";
//$bd = mysql_connect('win-6i06io39bdr', "root", "") or die("Error:".mysql_error());
$bd = mysql_connect($host, $user, $pass) or die("Error:".mysql_error());
mysql_select_db($base, $bd) or die("Can't select DB ".mysql_error());
 mysql_query("SET NAMES 'UTF8'");
?>
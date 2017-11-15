<?php

if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
 {
include('../db.php');
mysql_query("SET NAMES 'UTF8'");

$guid = strtoupper ($_GET['id']);
$q="select * from kus where  id like  ";
$query=$q."'%".$guid."%'";

 $x=0;   
$sql=mysql_query($query);
$row = mysql_fetch_assoc($sql);
header("Content-type: application/json");
echo json_encode($row); 
//echo json_encode(convert('cp1251', 'utf-8',$arr));
 }
?>
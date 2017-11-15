
<html>
<head>
<style>
#chetchik{
  float: left;
  width: 200px;  
}
</style>
</head>
<body>
<p class="chetchik">
<?php>

$res = mysql_query("SELECT `views`, `hosts` FROM `visits` WHERE `date`='$date'");
$row = mysql_fetch_assoc($res);
 echo 'Kirishlar soni: ' . $row['hosts'] . '<br />';
 echo 'Ko`rishlar soni: ' . $row['views'] ;
 ?>
 </p>
</body>
</html>
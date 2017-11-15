<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];
mysql_query("SET NAMES 'UTF8'");
$sql=mysql_query("SELECT * FROM l_elchixona where id='$id'");
?>
<head>
	<title>Сворачиваемые блоки</title>
	<meta http-equiv="Content-Language" content="ru" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<link rel="stylesheet" media="screen" type="text/css" href="css/adresa.css" />
	<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="js/adresa.js"></script>
</head>
<body>
<?php
while($row=mysql_fetch_array($sql))
{
$id=$row['id'];
$nomi=$row['nomi_rus'];
$data=$row['adress'];
$telefon=$row['telefon'];
$fax=$row['fax'];
$email=$row['e_mail'];
$site=$row['web_site'];
$chasi=$row['chasi'];
$ko=$row['Okrug'];
echo "<tr><td class=\"adrs\"  width=\"300\" colspan=\"2\"><div align=\"center\"><b>".$nomi."<b></div></td></tr>";
echo "<tr><td class=\"adrs\"  width=\"300\"><b>Адрес загранучреждения:</b></td>";
echo "<td class=\"adrs\" >".$data."</td></tr>";
echo "<tr><td class=\"adrs\"  width=\"300\"><b>Телефон(ы)загранучреждения:</b></td>";
echo "<td class=\"adrs\" >".$telefon."</td></tr>";
echo "<tr><td class=\"adrs\"  width=\"300\"><b>Факс загранучреждения:</b></td>";
echo "<td class=\"adrs\" >".$fax."</td></tr>";
echo "<tr><td class=\"adrs\"  width=\"300\"><b>E-mail:</b></td>";
echo "<td class=\"adrs\" >".$email."</td></tr>";
echo "<tr><td class=\"adrs\"  width=\"300\"><b>Веб-сайт:</b></td>";
echo "<td class=\"adrs\" >".$site."</td></tr>";
echo "<tr><td class=\"adrs\"  width=\"300\"><b>Время приема:</b></td>";
echo "<td class=\"adrs\" >".$chasi."</td></tr>";
echo "<tr><td class=\"adrs\"  width=\"300\"><b>Консульский округ:</b></td>";
echo "<td class=\"adrs\" >".$ko."</td></tr>";


//echo '<option value="'.$id.'">'.$data.'</option>';
}

}

?>
</body>
</html>

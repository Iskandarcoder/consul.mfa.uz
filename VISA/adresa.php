<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
define('EDMS_MFA',true);
include('db.php');
mysql_select_db($base,$bd);

$select = mysql_query("SELECT * FROM l_elchixona ");

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
<div class="blok">Адреса загранучреждений Узбекистана </div>
		<div id="content">
		<?php
		$i=0;
while($row=mysql_fetch_array($select))
{	$i=$i+1;
$id=$row['id'];
$nomi=$row['nomi_rus'];
$data=$row['adress'];
$telefon=$row['telefon'];
$fax=$row['fax'];
$email=$row['e_mail'];
$site=$row['web_site'];
$chasi=$row['chasi'];
$ko=$row['Okrug'];
$c='Телефон:'.$telefon.' Факс:'.$fax.' e-mail '.$email.$site.$chasi.$ko;
echo "<div class=\"post\">\n";
echo "				<div class=\"title\">\n";
echo "					<h3>".$i.".".$nomi."</h3>\n";
echo "					<p>Адрес:".$data."</p>\n";
echo "				</div>\n";
echo "				<div class=\"entry\">\n";
echo "<table> ";
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
echo "</table>";
echo "				</div>\n";
echo "			</div>	\n";

}
?>



</body>
</html>
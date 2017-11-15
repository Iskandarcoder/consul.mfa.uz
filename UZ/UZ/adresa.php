<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
define('EDMS_MFA',true);
include('db.php');
//mysql_select_db($base,$bd);

$select = mysql_query("SELECT * FROM l_elchixona ");

?>
<head>
	<!--<title>Ochilb yopiladigan bloklar</title>-->
	<meta http-equiv="Content-Language" content="ru" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<link rel="stylesheet" media="screen" type="text/css" href="css/adresa.css" />
	<script type="text/javascript" src="js/adresa.js"></script>
</head>

<body>
<?php
	include("count.php");
?>
<h2>O`zbekistonnig xorijdagi vakolatxonalari </h2>
		<div id="content">
		<?php
		$i=0;
while($row=mysql_fetch_array($select))
{
	$i=$i+1;
$id=$row['id'];
$nomi=$row['nomi_uzb'];
$data=$row['adress'];
$telefon=$row['telefon'];
$fax=$row['fax'];
$email=$row['e_mail'];
$site=$row['web_site'];
$chasi=$row['chasi'];
$ko=$row['Okrug'];
$c='Telefon:'.$telefon.' Faks:'.$fax.' e-mail '.$email.$site.$chasi.$ko;
echo "<div class=\"post\">\n";
echo "				<div class=\"title\">\n";
echo "					<h3>".$i.".  ".$nomi."</h3>\n";
echo "					<p>Adres:".$data."</p>\n";
echo "				</div>\n";
echo "				<div class=\"entry\">\n";
echo "<table> ";
echo "<tr><td class=\"adrs\"  width=\"300\"><b>Vakolatxona telefonlari:</b></td>";
echo "<td class=\"adrs\" >".$telefon."</td></tr>";
echo "<tr><td class=\"adrs\"  width=\"300\"><b>Vakolatxona Faksi:</b></td>";
echo "<td class=\"adrs\" >".$fax."</td></tr>";
echo "<tr><td class=\"adrs\"  width=\"300\"><b>E-mail:</b></td>";
echo "<td class=\"adrs\" >".$email."</td></tr>";
echo "<tr><td class=\"adrs\"  width=\"300\"><b>Veb-sahifa:</b></td>";
echo "<td class=\"adrs\" >".$site."</td></tr>";
//echo "<tr><td class=\"adrs\"  width=\"300\"><b>Qabul vaqtlari:</b></td>";
//echo "<td class=\"adrs\" >".$chasi."</td></tr>";
echo "<tr><td class=\"adrs\"  width=\"300\"><b>Konsullik okrugi:</b></td>";
echo "<td class=\"adrs\" >".$ko."</td></tr>";
echo "</table>";
echo "				</div>\n";
echo "			</div>	\n";

}
?>



</body>
</html>
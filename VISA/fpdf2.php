<?php
/*
$db = sqlite_open("bdsql\price.db");
$query_table = sqlite_query($db, "CREATE TABLE price_ceni
                              (id INTEGER PRIMARY KEY,
                               name TEXT,
                               cena TEXT,
                               opt_cena TEXT,
                               kol_vo TEXT);");
$query_insert = sqlite_query($db, "INSERT INTO price_ceni(id,name,cena,opt_cena,kol_vo) VALUES (NULL,'So-dimm ddr2 pc-3200/4200/5300/6400 2056mb','25 u.e.','10 u.e.','125 sht.');");
$query_insert = sqlite_query($db, "INSERT INTO price_ceni(id,name,cena,opt_cena,kol_vo) VALUES (NULL,'SATA 40-160GB','146 u.e.','121 u.e.','1005 sht.');");
$query_insert = sqlite_query($db, "INSERT INTO price_ceni(id,name,cena,opt_cena,kol_vo) VALUES (NULL,'DVD-R','1595 u.e.','1220 u.e.','1725 sht.');");
$query_insert = sqlite_query($db, "INSERT INTO price_ceni(id,name,cena,opt_cena,kol_vo) VALUES (NULL,'Nvidia 32mb geforce4 420go','2555  u.e.','1230  u.e.','12895 sht.');");
$query_insert = sqlite_query($db, "INSERT INTO price_ceni(id,name,cena,opt_cena,kol_vo) VALUES (NULL,'HP 17-20v','2655  u.e.','2360  u.e.','14525 sht.');");
$query_insert = sqlite_query($db, "INSERT INTO price_ceni(id,name,cena,opt_cena,kol_vo) VALUES (NULL,'HP pavilion zd7000','5225  u.e.','3330  u.e.','4725 sht.');");
$query_insert = sqlite_query($db, "INSERT INTO price_ceni(id,name,cena,opt_cena,kol_vo) VALUES (NULL,'Matrix 15.4 *(1280*800)','22345  u.e.','1330  u.e.','12335 sht.');");
 */
define('FPDF_FONTPATH','fpdf2/fpdf/font/');
require('fpdf2/fpdf/fpdf.php');
require('printing.class.php');
include('db.php');
$printing = new Printing();
$printing->Open();
 // Подключаем кириллические шрифты
$printing->AddFont('ArialMT','','arial.php');
$printing->AddFont('Arial-BoldMT','','arialbd.php');
$printing->AddFont('Arial-BoldItalicMT','','arialbi.php');
$printing->AddPage(); //Добавляем страничку в документ
$printing->Title('Прайс-лист','fpdf2/logo.jpg','ООО "имя компании"','г. Симферополь ул. КИМ д.1 кв.10','тел. 024-263','www.yourname.ua'); // Выводим заголовок воспользовавшись новым методом

$header = array("№", "ФИО", "Баркод", "миллат"); // Все заголовки столбцов загоняем в массив
mysql_query("SET NAMES 'UTF-8'");
$select = mysql_query("SELECT  id,fam,barcode,millat FROM anketa");
//$db = sqlite_open("bdsql/price.db"); // Открывает базу данных SQLite
//$query = sqlite_query($db, "SELECT * FROM price_ceni;"); // Выборка всех данных из таблицы price_ceni
$printing->OutputTable($header,$select);
//$file=basename(tempna('.','tmp'));
//rename($file,$file.'.pdf');
//$file.='.pdf';
//$printing->Output($file,'F');// Выводим документ в браузер
$printing->Output();
?>


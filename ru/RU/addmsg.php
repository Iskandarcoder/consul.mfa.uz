<?php
session_start();

$host="localhost";
$user="master";
$pass="master001";
$base="consul";
$bd = mysql_connect($host, $user, $pass) or die("Error:".mysql_error());
mysql_select_db($base, $bd) or die("Can't select DB ".mysql_error());
 mysql_query("SET NAMES 'UTF8'");

	include("count.php");

   $crypt_text = $_POST['result'];
  if($crypt_text=='') exit;
  $guid =  substr($crypt_text,0,32);
  $famismi = substr($crypt_text,32,7);
    $keyi = substr($crypt_text,32);

 $res = mysql_query("SELECT * FROM usl_key where id='".$guid."'");
 if(mysql_num_rows($res)==0)
   {
        print_r( '-1');
        exit;
 }
$row = mysql_fetch_array($res);
   $famism = $row['famism'];
   $key = $row['name'];


mysql_query("delete from usl_key where id='".$guid."'");

if($key != $keyi){
   print_r('-2');
        exit;
           }


$fio    =strtoupper($_POST['fio']);
$davlat    = $_POST['davlat'];
$manzil   = $_POST['manzil'];
$email   = $_POST['email'];
$text    = $_POST['text'];
$sana=date('Y.m.d');
$status = 0;


$result = mysql_query ("INSERT INTO muammo (text,fio,davlat,manzil,email,sana,status)  
                                             VALUES ('".$text."','".$fio."','".$davlat."','".$manzil."','".$email."','".$sana."','".$status."')");
if ($result == 'true')
      echo "Ваше сообщение принято! \n\r  Ответ будет отправлен на Ваш  E-mail адрес.";
	else
	echo "По техническим причинам Ваше сообщение не принято.";

?>

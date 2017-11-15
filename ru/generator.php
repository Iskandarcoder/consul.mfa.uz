<?php
include('../ru/db.php');
include('../ru/function.php');
$d=getdate();
$str = $_POST['a'].$_POST['b'];

$guid = guid(); 

$name_md5=md5($d['minutes'].$str.$d['seconds']); 
$ser=$name_md5[1].$name_md5[3].$name_md5[5].$name_md5[2].$name_md5[0]; 
$key=$ser.md5(md5($ser).md5(md5($ser).md5($ser).md5($d['yday'])));   // 37 bayt

//mysql_query ("TRUNCATE TABLE usl_key") or die(mysql_error());
$lSQL ="INSERT  INTO usl_key (id,famism,name) VALUE('".$guid."','".$str."','".$key."')";
 $sql = mysql_query($lSQL);  
 if($sql)
 { 
 /*
//открываем модуль шифрования и получаем его дискриптор
$td = mcrypt_module_open(MCRYPT_BLOWFISH,'',MCRYPT_MODE_CFB,'');
//  получаем размер вектора шифрования на основе дискриптора.
$iv_size = mcrypt_enc_get_iv_size($td);
// Создание вектора шифрования
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
// открытие буфера обмена  для шифровки данных
mcrypt_generic_init($td,$key,$iv);
//  шифруем даные
$crypt_text = mcrypt_generic($td,$str);
//  закрываем буфер обмена и модуль
mcrypt_generic_deinit($td);
mcrypt_module_close($td); 
echo  $guid.base64_encode($iv.$crypt_text);*/
echo $guid.$key;
}
?>
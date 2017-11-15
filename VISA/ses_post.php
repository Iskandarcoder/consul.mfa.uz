<?php

session_start();
//session_destroy();
 $_SESSION['index']=$_SESSION['index']+1;
 $_SESSION['fam'][$_SESSION['index']]=$_POST['fam'];
 $_SESSION['ism'][$_SESSION['index']]=$_POST['ism'];
 $_SESSION['sharif'][$_SESSION['index']]=$_POST['sharif'];
 $_SESSION['prejfam'][$_SESSION['index']]=$_POST['prejfam'];
 $_SESSION['prejism'][$_SESSION['index']]=$_POST['prejism'];
 $_SESSION['prejsharif'][$_SESSION['index']]=$_POST['prejsharif'];
 $_SESSION['phpto'][$_SESSION['index']]=$_POST['photo'];
 $_SESSION['pol'][$_SESSION['index']]=$_POST['pol'];

  $_SESSION['birthYear'][$_SESSION['index']]=$_POST['birthYear'];
  $_SESSION['tugoy'][$_SESSION['index']]=$_POST['tugoy'];
  $_SESSION['tugDay'][$_SESSION['index']]=$_POST['tugDay'];

   $_SESSION['strana1'][$_SESSION['index']]=$_POST['strana1'];
 $_SESSION['tugjoy'][$_SESSION['index']]=$_POST['tugjoy'];

    $_SESSION['fuqaro'][$_SESSION['index']]=$_POST['fuqaro'];
 $_SESSION['prejfuqaro'][$_SESSION['index']]=$_POST['prejfuqaro'];
 $_SESSION['tip'][$_SESSION['index']]=$_POST['tip'];
 $_SESSION['nomer'][$_SESSION['index']]=$_POST['nomer'];

 $_SESSION['vidanYear'][$_SESSION['index']]=$_POST['vidanYear'];
  $_SESSION['vidanMonth'][$_SESSION['index']]=$_POST['vidanMonth'];
   $_SESSION['vidan'][$_SESSION['index']]=$_POST['vidan'];

 $_SESSION['srokYear'][$_SESSION['index']]=$_POST['srokYear'];
 $_SESSION['srokMonth'][$_SESSION['index']]=$_POST['srokMonth'];
 $_SESSION['srok'][$_SESSION['index']]=$_POST['srok'];

 $_SESSION['kem'][$_SESSION['index']]=$_POST['kem'];
 $_SESSION['sem_pol'][$_SESSION['index']]=$_POST['sem_pol'];
 $_SESSION['fiosup'][$_SESSION['index']]=$_POST['fiosup'];

 $_SESSION['kirYear'][$_SESSION['index']]=$_POST['kirYear'];
  $_SESSION['kiroy'][$_SESSION['index']]=$_POST['kiroy'];
   $_SESSION['kirkun'][$_SESSION['index']]=$_POST['kirkun'];

 $_SESSION['chiq_Year'][$_SESSION['index']]=$_POST['chiq_Year'];
  $_SESSION['chiq_oy'][$_SESSION['index']]=$_POST['chiq_oy'];
   $_SESSION['chiq_kun'][$_SESSION['index']]=$_POST['chiq_kun'];

    $_SESSION['kol_kir'][$_SESSION['index']]=$_POST['kol_kir'];
 $_SESSION['kun'][$_SESSION['index']]=$_POST['kun'];
    $_SESSION['rass_kun'][$_SESSION['index']]=$_POST['rass_kun'];

    $_SESSION['elchixona'][$_SESSION['index']]=$_POST['elchixona'];

 $_SESSION['maqsad'][$_SESSION['index']]=$_POST['maqsad'];
 $_SESSION['taklifchi'][$_SESSION['index']]=$_POST['taklifchi'];
 $_SESSION['adressru'][$_SESSION['index']]=$_POST['adressru'];
 $_SESSION['avvalkir'][$_SESSION['index']]=$_POST['avvalkir'];
 $_SESSION['fio_deti'][$_SESSION['index']]=$_POST['fio_deti'];

    $_SESSION['job'][$_SESSION['index']]=$_POST['job'];

 $_SESSION['job2'][$_SESSION['index']]=$_POST['job2'];
 $_SESSION['jobadres'][$_SESSION['index']]=$_POST['jobadres'];
 $_SESSION['mesto_propis'][$_SESSION['index']]=$_POST['mesto_propis'];
 $_SESSION['operator'][$_SESSION['index']]=$_POST['operator'];
 $_SESSION['status'][$_SESSION['index']]=$_POST['status'];
 $_SESSION['data_reg'][$_SESSION['index']]=$_POST['data_reg'];
 $_SESSION['data_end'][$_SESSION['index']]=$_POST['data_end'];


/*
echo  $_SESSION['fam'][$_SESSION['index']];
echo  $_SESSION['ism'][$_SESSION['index']];
echo  $_SESSION['sharif'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['prejfam'][$_SESSION['index']];
echo  $_SESSION['prejism'][$_SESSION['index']];
echo  $_SESSION['prejsharif'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['photo'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['pol'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['birthYear'][$_SESSION['index']];
echo  $_SESSION['tugoy'][$_SESSION['index']];
echo  $_SESSION['tugDay'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['strana1'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['tugjoy'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['fuqaro'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['prejfuqaro'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['tip'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['nomer'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['vidanYear'][$_SESSION['index']];
echo  $_SESSION['vidanMonth'][$_SESSION['index']];
echo  $_SESSION['vidan'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['srokYear'][$_SESSION['index']];
echo  $_SESSION['srokMonth'][$_SESSION['index']];
echo  $_SESSION['srok'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['kem'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['sem_pol'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['fiosup'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['kirYear'][$_SESSION['index']];
echo  $_SESSION['kiroy'][$_SESSION['index']];
echo  $_SESSION['kirkun'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['chiq_Year'][$_SESSION['index']];
echo  $_SESSION['chiq_oy'][$_SESSION['index']];
echo  $_SESSION['chiq_kun'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['kol_kir'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['kun'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['rass_kun'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['elchixona'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['maqsad'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['taklifchi'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['adressru'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['avvalkir'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['fio_deti'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['job'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['job2'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['jobadres'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['mesto_propis'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['operator'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['status'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['data_reg'][$_SESSION['index']];
echo "\n";
echo  $_SESSION['data_end'][$_SESSION['index']];
echo "\n";
   echo $_SESSION['index'];

  */
?>

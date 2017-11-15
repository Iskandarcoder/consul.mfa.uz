<?php
include('db.php');
 require('pdfb/pdfb.php');
 /*
  $s='';
 echo '<div style="background-color:#ffa; padding:20px">';
 echo 'Фамилия: '.$_POST['fam'];
 echo '<br>Имя: '.$_POST['ism'];
 echo '<br>Отчество: '.$_POST['sharif'];
 echo '<br>Национальность: '.$_POST['millat'];
 echo '<br>Дата рождения: '.$_POST['tugkun'];
 echo '<br>Место рождения: '.$_POST['yashjoy'];
 echo '<br>';
      echo '<br>Тип документа: '.$_POST['tip'];
      echo '<br>Серия: '.$_POST['seriya'];
      echo '<br>Номер: '.$_POST['nomer'];
      echo '<br>Выданный: '.$_POST['vidan'];
      echo '<br>Кем: '.$_POST['kem'];
       if($_POST['radio']=="1")  $s='Утерян';
       if($_POST['radio']=="2") $s='Просрочен';
       if($_POST['radio']=="3") $s='Украден';
       echo '<br>Что случилось: '.$s;
      echo '<br>Причина : '.$_POST['sabab'];
      echo '<br>Адрес постояннного жительства : '.$_POST['adress'];
      echo '<br>№ Телефона : '.$_POST['phone'];
      echo '<br>Фото файл : '.$_POST['fileup'];
 echo '<br>';
     echo '<br>Страна : '.$_POST['strana'];
     echo '<br>Город : '.$_POST['gorod'];
     echo '<br>Дата приезда : '.$_POST['kun'];
     echo '<br>Цель приезда : '.$_POST['maqsad'];
     echo '<br>Род занятий : '.$_POST['job'];
     echo '<br>Адрес временнного проживания : '.$_POST['vr_adress'];
     echo '<br>Телефон : '.$_POST['phone1'];
echo '<br>';
     echo '<br>Дата возврата : '.$_POST['vozvrat'];
     echo '<br>ФИО : '.$_POST['fio_deti'];
     echo '<br>Дата рождения : '.$_POST['data_rojd'];
     echo '<br>ФИО : '.$_POST['fio_deti2'];
     echo '<br>Дата рождения : '.$_POST['data_rojd2'];
     echo '<br>ФИО : '.$_POST['fio_deti3'];
     echo '<br>Дата рождения : '.$_POST['data_rojd3'];
     echo '<br>ФИО : '.$_POST['fio_deti4'];
     echo '<br>Дата рождения : '.$_POST['data_rojd4'];
 echo '</div>';
  */
   $p='upload/'.basename($_POST['fileup']);
  $f=fopen($p,"rb");
  $upload=fread($f,filesize($p));
   fclose($f);
   $upload=addslashes($upload);  //Защита переменных от опасных символов ("прослешька переменных")
       if($_POST['radio']=="1")  $s='Утерян';
       if($_POST['radio']=="2") $s='Просрочен';
       if($_POST['radio']=="3") $s='Украден';
         $chk_pasport=0;
         $chk_photo=0;
         $chk_sert=0;
         $chk_pmj=0;
         $chk_potv=0;
       if($_POST['chk_pasport']) $chk_pasport=1;
       if($_POST['chk_photo'])  $chk_photo=1;
       if($_POST['chk_sert'])   $chk_sert=1;
       if($_POST['chk_pmj'])    $chk_pmj=1;
       if($_POST['chk_potv'])   $chk_potv=1;
//
     $str=$_POST['elchixona'];
   //  $n=StrPos($str,'/');
     $elchixona=40;//Substr($str,1,n-1);
     $id_elchixona=48;//Substr($str,n+1);
     echo  $elchixona;
     $bar_code='';
     $sert_raqam='';
     $consul='';
     $data_reg=date('Y-m-d');
     $status=0;
  $sql = mysql_query("INSERT  INTO Anketa (fam,ism,sharif,millat,tugkun,yashjoy,photo,
                                           tip,seriya,nomer,vidan,srok,kem,nima,sabab,adress,phone,
                                           strana,gorod,kun,maqsad,job,vr_adress,phone1,
                                           vozvrat,fio_deti,data_rojd,fio_deti2,data_rojd2,fio_deti3,data_rojd3,
                                           fio_otsa,data_ro,mesto_ro,adres_o,mesto_rab_o,dol_tel_o,
                                           fio_mat,data_rm,mesto_rm,adres_m,mesto_rab_m,dol_tel_m,
                                           fio_sup,data_rs,mesto_rs,adres_s,mesto_rab_s,dol_tel_s,
                                           chk_pasport,chk_photo,chk_sert,chk_pmj,chk_potv,
                                           id_elchixona,barcode,elchixona,sert_raqam,consul,
                                           data_reg,status)
          values ('".$_POST['fam']."',
                  '".$_POST['ism']."',
                  '".$_POST['sharif']."',
                  '".$_POST['millat']."',
                  '".$_POST['tugkun']."',
                  '".$_POST['yashjoy']."',
                  '".$upload."',
                  '".$_POST['tip']."',
                  '".$_POST['seriya']."',
                  '".$_POST['nomer']."',
                  '".$_POST['vidan']."',
                  '".$_POST['srok']."',
                  '".$_POST['kem']."',
                  '".$s."',
                  '".$_POST['sabab']."',
                  '".$_POST['adress']."',
                  '".$_POST['phone']."',
                  '".$_POST['strana']."',
                  '".$_POST['gorod']."',
                  '".$_POST['kun']."',
                  '".$_POST['maqsad']."',
                  '".$_POST['job']."',
                  '".$_POST['vr_adress']."',
                  '".$_POST['phone1']."',
                  '".$_POST['vozvrat']."',
                  '".$_POST['fio_deti']."',
                  '".$_POST['data_rojd']."',
                  '".$_POST['fio_deti2']."',
                  '".$_POST['data_rojd2']."',
                  '".$_POST['fio_deti3']."',
                  '".$_POST['data_rojd3']."',
               '".$_POST['otes']."',
                  '".$_POST['data_r_o']."',
                  '".$_POST['mesto_r_o']."',
                  '".$_POST['adrespro_o']."',
                  '".$_POST['mesto_rab_o']."',
                  '".$_POST['dol_tel_o']."',
               '".$_POST['mat']."',
                  '".$_POST['data_r_m']."',
                  '".$_POST['mesto_r_m']."',
                  '".$_POST['adrespro_m']."',
                  '".$_POST['mesto_rab_m']."',
                  '".$_POST['dol_tel_m']."',
               '".$_POST['suprug']."',
                  '".$_POST['data_r_s']."',
                  '".$_POST['mesto_r_s']."',
                  '".$_POST['adrespro_s']."',
                  '".$_POST['mesto_rab_s']."',
                  '".$_POST['dol_tel_s']."',
                  '".$chk_pasport."',
                  '".$chk_photo."',
                  '".$chk_sert."',
                  '".$chk_pmj."',
                  '".$chk_potv."',
                  '".$id_elchixona."',
                  '".$bar_code."',
                  '".$elchixona."',
                  '".$sert_raqam."',
                  '".$consul."',
                  '".$data_reg."',
                  '".$status."');");

if($sql)
{
 // Успешно записан
   mysql_query("LOCK TABLES Anketa WRITE");
  $result=mysql_query("SELECT LAST_INSERT_ID() AS LID");
     while($record = mysql_fetch_array($result))
       $res=$record['LID'];
	      mysql_query("UNLOCK TABLES");
      $today = date("Ymd"); //20100916
      $today=substr($today,2);
      $bar_code=$res.$today;
    mysql_query ("UPDATE Anketa SET barcode = '".$bar_code."' WHERE id='".$res."';");
//
class PDF extends PDFB
  {
    function Header1()
    {
      //
    }

    function Footer1()
    {
      //
    }
  }
// Создание PDF объекта и установка свойств
  $pdf = new PDF("p", "pt", "A4");
  $pdf->SetAuthor("MFA UZ");
  $pdf->SetTitle(" ");
  $pdf->AddFont("Times");
  $pdf->SetFont("Times", "", 10);
  // Загрузка шаблона
  $pdf->setSourceFile("anketa_rus.pdf");
  $tplidx = $pdf->ImportPage(1);
    // Добавить новую страницу используя шаблон
  $pdf->AddPage();
  $pdf->useTemplate($tplidx);
  $pdf->BarCode($bar_code, "C128B", 400, 15, 300, 80, 0.5, 0.5, 2, 5, "", "PNG");
  $pdf->Image($p, 420, 140, 105, 145);
     $pdf->SetFont("Times", "", 13);
  $pdf->Text(140, 158, $_POST['fam']);
 $pdf->Text(140, 188, $_POST['ism']);
  $pdf->Text(160, 218, $_POST['sharif']);
    $pdf->Text(175, 248, $_POST['millat']);
       $yil=substr($_POST['tugkun'],0,4);
     $Oy=substr($_POST['tugkun'],5,2);
     $Kun=substr($_POST['tugkun'],8,2);
      $pdf->Text(175, 278, $Kun."/".$Oy."/".$yil);
     $pdf->Text(180, 308, $_POST['yashjoy']);
          $pdf->Text(100, 368, $_POST['adress']);
        $pdf->Text(280, 398, $_POST['phone'].", Tel:".$_POST['phone']);
         $yil=substr($_POST['kun'],0,4);
     $Oy=substr($_POST['kun'],5,2);
     $Kun=substr($_POST['kun'],8,2);
        $pdf->Text(120, 428, $Kun."/".$Oy."/".$yil);
            $pdf->Text(320, 428, $_POST['maqsad']);
        $pdf->Text(150, 458, $_POST['job']);
     $pdf->Text(100, 510, $_POST['vr_adress'].", Tel:".$_POST['phone1']);
        $pdf->Text(350, 530, $_POST['seriya']);
        $pdf->Text(410, 530, $_POST['nomer']);
        $pdf->Text(175, 560, $_POST['vidan']);
        $pdf->Text(315, 560, $_POST['kem']);
          $pdf->Text(100, 615, $s);
        $pdf->Text(100, 635, $_POST['sabab']);
        $pdf->Text(215, 720, $_POST['fio_deti']);
        $pdf->Text(100, 742, $_POST['fio_deti2']);
        $pdf->Text(100, 762, $_POST['fio_det3']);
         $yil=substr($_POST['vozvrat'],0,4);
     $Oy=substr($_POST['vozvrat'],5,2);
     $Kun=substr($_POST['vozvrat'],8,2);
        $pdf->Text(255, 785, $Kun."/".$Oy."/".$yil);
 //
  $tplidx = $pdf->ImportPage(2);
  $pdf->AddPage();
  $pdf->useTemplate($tplidx);

   $otes=$_POST['otes'];
   $n=strlen($otes);
   if($n>18)
   {      $n1=strpos($otes,' ');
      if($n1>0) {                 $pdf->Text(90, 125, substr($otes,0,$n1));
                 $s=substr($otes,$n1+1);
                 $n2=strpos($s,' ');
                 if($n2>0) { $pdf->Text(90, 135, substr($s,0,$n2));
                             $s=substr($s,$n2+1);
                             $pdf->Text(90, 145, $s);
                           }
                 else
                      $pdf->Text(90, 135, $s);      	         }

   }
   else
      $pdf->Text(90, 125, $otes);

    $mat=$_POST['mat'];
   $n=strlen($mat);
   if($n>18)
   {
      $n1=strpos($mat,' ');
      if($n1>0) {
                 $pdf->Text(90, 170, substr($mat,0,$n1));
                 $s=substr($mat,$n1+1);
                 $n2=strpos($s,' ');
                 if($n2>0) { $pdf->Text(90, 180, substr($s,0,$n2));
                             $s=substr($s,$n2+1);
                             $pdf->Text(90, 190, $s);
                           }
                 else
                      $pdf->Text(90, 170, $s);
      	         }

   }
   else
      $pdf->Text(90, 125, $mat);

    $mat=$_POST['suprug'];
   $n=strlen($suprug);
   if($n>18)
   {
      $n1=strpos($suprug,' ');
      if($n1>0) {
                 $pdf->Text(90, 215, substr($suprug,0,$n1));
                 $s=substr($suprug,$n1+1);
                 $n2=strpos($s,' ');
                 if($n2>0) { $pdf->Text(90, 225, substr($s,0,$n2));
                             $s=substr($s,$n2+1);
                             $pdf->Text(90, 235, $s);
                           }
                 else
                      $pdf->Text(90, 170, $s);
      	         }

   }
   else
      $pdf->Text(90, 125, $suprug);


   $pdf->Text(200, 125, $_POST['data_r_o']);
   $pdf->Text(200, 137, $_POST['mesto_r_o']);
   $pdf->Text(200, 171, $_POST['data_r_m']);
   $pdf->Text(200, 182, $_POST['mesto_r_m']);
   $pdf->Text(200, 215, $_POST['data_r_s']);
   $pdf->Text(200, 227, $_POST['mesto_r_s']);

  $otes=$_POST['adrespro_o'];
  $n=strlen($otes);
  if($n>18)
     {
       $s=substr($otes,0,17);
        $pdf->Text(275, 125,$s);
        $s=substr($otes,18);
        $n1=strlen($s);
        if($n1>19){
            $s1=substr($s,0,17);            $pdf->Text(275, 135,$s1);
            $s=substr($s,18);
            $pdf->Text(275, 145,$s);
        }
        else
         $pdf->Text(275, 135,$s);     	}
   else
        $pdf->Text(275, 125,$otes);


   $mat=$_POST['adrespro_m'];
  $n=strlen($mat);
  if($n>18)
     {
       $s=substr($mat,0,17);
        $pdf->Text(275, 170,$s);
        $s=substr($mat,18);
        $n1=strlen($s);
        if($n1>19){
            $s1=substr($s,0,17);
            $pdf->Text(275, 180,$s1);
            $s=substr($s,18);
            $pdf->Text(275, 190,$s);
        }
        else
         $pdf->Text(275, 180,$s);
     	}
   else
        $pdf->Text(275, 170,$mat);

   $suprug=$_POST['adrespro_s'];
  $n=strlen($suprug);
  if($n>18)
     {
       $s=substr($suprug,0,17);
        $pdf->Text(275, 215,$s);
        $s=substr($suprug,18);
        $n1=strlen($s);
        if($n1>19){
            $s1=substr($s,0,17);
            $pdf->Text(275, 225,$s1);
            $s=substr($s,18);
            $pdf->Text(275, 235,$s);
        }
        else
         $pdf->Text(275, 225,$s);
     	}
   else
        $pdf->Text(275, 215,$suprug);


 $otes=$_POST['mesto_rab_o'];
  if(strlen($otes)>23)
        $pdf->Text(400, 125, substr($otes,0,22));
     else
        $pdf->Text(400, 125, $otes);
  $dol_tel_o=$_POST['dol_tel_o'];
  if(strlen($dol_tel_o)>23)
        {$pdf->Text(400, 135, substr($dol_tel_o,0,22));
         $pdf->Text(400, 145, substr($dol_tel_o,23));}
     else
        $pdf->Text(400, 135, $dol_tel_o);

 $mat=$_POST['mesto_rab_m'];
  if(strlen($mat)>23)
        $pdf->Text(400, 170, substr($mat,0,22));
     else
        $pdf->Text(400, 170, $mat);
  $dol_tel_m=$_POST['dol_tel_m'];
  if(strlen($dol_tel_m)>23)
        {$pdf->Text(400, 185, substr($dol_tel_m,0,22));
         $pdf->Text(400, 195, substr($dol_tel_m,23));}
     else
        $pdf->Text(400, 185, $dol_tel_m);

 $sup=$_POST['mesto_rab_s'];
  if(strlen($sup)>23)
        $pdf->Text(400, 215, substr($sup,0,22));
     else
        $pdf->Text(400, 215, $sup);
  $dol_tel_s=$_POST['dol_tel_s'];
  if(strlen($dol_tel_s)>23)
        {$pdf->Text(400, 225, substr($dol_tel_s,0,22));
         $pdf->Text(400, 235, substr($dol_tel_s,23));}
     else
        $pdf->Text(400, 225, $dol_tel_s);

     if($chk_pasport==1)
   $pdf->Text(87, 327, "v");
 if($chk_photo==1)
   $pdf->Text(87, 353, "v");
 if($chk_sert==1)
   $pdf->Text(87, 379, "v");
 if($chk_pmj==1)
   $pdf->Text(87, 413, "v");
 if($chk_potv==1)
   $pdf->Text(87, 439, "v");

  $pdf->Output("downloads/anketa.pdf","F");
    $pdf->closeParsers();
   echo "Успешно!";
 }
else
{
  echo "<p><b>Error: ".mysql_error()."</b></p>";
  exit();
}
  mysql_close($bd);
?>
<?php
session_start();

include('db.php');
 require('pdfb/pdfb.php');

 $M=$_SESSION[index];
 //if($M==0)
 //{
   $p='';
  if ($_POST['fileup']!=''){
  $p='upload\\'.$_POST['fileup'];
  // echo 'PDF: '.$p;
  $f=fopen($p,"rb");
  $upload=fread($f,filesize($p));
   fclose($f);
   $upload=addslashes($upload);  //Защита переменных от опасных символов ("прослешька переменных")
    }
      $str=$_POST['elchixona'];
     $n=strPos($str,'/');
      $elchixona=Substr($str,0,$n);
     $id_elchixona=Substr($str,$n+2);

      $str=$_POST['fuqaro'];
     $n=strPos($str,'/');
      $fuqaro=Substr($str,0,$n);
     $id_fuqaro=Substr($str,$n+2);

     $str=$_POST['strana1'];
     $n=strPos($str,'/');
      $strana1=Substr($str,0,$n);
     $id_strana1=Substr($str,$n+2);

     $str=$_POST['kol_kir'];
     $n=strPos($str,'/');
      $kol_kir=Substr($str,0,$n);
     $id_kol_kir=Substr($str,$n+2);

     $str=$_POST['rass_kun'];
     $n=strPos($str,'/');
      $rass_kun=Substr($str,0,$n);
     $id_rass_kun=Substr($str,$n+2);

     $str=$_POST['job'];
     $n=strPos($str,'/');
      $job=Substr($str,0,$n);
     $id_job=Substr($str,$n+2);

     $bar_code='';
     $gruppa='';
     $status='';
     $data_reg=date('Y-m-d');
     $data_end=date('Y-m-d',(time()+3600*24*90));
  //   echo $data_end;

//     $data_end=date('Y-m-d').'+10 day';
//     $data_end = strtotime(date("Y-m-d", strtotime($date)) . " +1 month");



     $tugkun=$_POST['birthYear'].'-'.$_POST['tugoy'].'-'.$_POST['tugkun'];
     $vidan=$_POST['vidanYear'].'-'.$_POST['vidanMonth'].'-'.$_POST['vidan'];
     $srok=$_POST['srokYear'].'-'.$_POST['srokMonth'].'-'.$_POST['srok'];
     $kirkun=$_POST['kirYear'].'-'.$_POST['kiroy'].'-'.$_POST['kirkun'];
     $chiq_kun=$_POST['chiq_Year'].'-'.$_POST['chiq_oy'].'-'.$_POST['chiq_kun'];


 $query="INSERT  INTO anketa
          values (NULL,'".$bar_code."','".$gruppa."','".$_POST['fam']."',"

                  ."'".$_POST['ism']."',"
                  ."'".$_POST['sharif']."',"
                  ."'".$_POST['prejfam']."',"
                  ."'".$_POST['prejism']."',"
                  ."'".$_POST['prejsharif']."',"
                  ."NULL,"
           		  ."'".$_POST['pol']."',"
				  ."'".$tugkun."',"
                  ."'".$id_strana1."',"
                  ."'".$strana1."',"
                  ."'".$_POST['tugjoy']."',"
                  ."'".$id_fuqaro."',"
                  ."'".$fuqaro."',"
                  ."'".$_POST['prejfuqaro']."',"
                  ."'".$_POST['tip']."',"
                  ."'".$_POST['nomer']."',"
                  ."'".$vidan."',"
                  ."'".$srok."',"
                  ."'".$_POST['kem']."',"
                  ."'".$_POST['sem_pol']."',"
                  ."'".$_POST['fiosup']."',"
                  ."'".$kirkun."',"
                  ."'".$chiq_kun."',"
                  ."'".$id_kol_kir."',"
                  ."'".$kol_kir."',"
                  ."'".$_POST['kun']."',"
                  ."'".$id_rass_kun."',"
                  ."'".$rass_kun."',"
                  ."'".$id_elchixona."',"
                  ."'".$elchixona."',"
                  ."'".$_POST['maqsad']."',"
                  ."'".$_POST['taklifchi']."',"
                  ."'".$_POST['adressru']."',"
                  ."'".$_POST['avvalkir']."',"
                  ."'".$_POST['fio_deti']."',"
                  ."'".$id_job."',"
                  ."'".$job."',"
                  ."'".$_POST['job2']."',"
                  ."'".$_POST['jobadres']."',"
                  ."'".$_POST['mesto_propis']."',"
                  ."'".$_POST['operator']."',"
                  ."'".$status."',"
                  ."'".$data_reg."',"
				  ."'".$data_end."')";

//echo $query;
$sql = mysql_query($query);

if($sql)
{
 // Успешно записан
//   mysql_query("LOCK TABLES anketa WRITE");
  $result=mysql_query("SELECT LAST_INSERT_ID() AS LID");
  while($record = mysql_fetch_array($result))
       $res=$record['LID'];
//	      mysql_query("UNLOCK TABLES");
   $today = date("Ymd"); //20100916
   $today=substr($today,2);
   $bar_code=$res.$today;

    mysql_query ("UPDATE anketa SET barcode = '".$bar_code."' WHERE id='".$res."';");
//}
// for($i=0; $i<=$M; $i++)
 //{

 //}


//  echo 'Last id:'+$result;
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
  $pdf->AddFont("Verdana");
  $pdf->SetFont("Verdana", "", 10);
  $pdf->setSourceFile('anketa_rus.pdf');
  $tplidx = $pdf->ImportPage(1);
  $pdf->AddPage();
  $pdf->useTemplate($tplidx);


 $pdf->BarCode($bar_code, "C128B", 380, 715, 400, 120, 0.45, 0.5, 2, 5, "", "PNG");

 if ($p!='')
 $pdf->Image($p, 262, 85, 100, 120);

  $pdf->SetFont("Arial", "", 9);
  $fam=iconv("UTF-8","CP1251",$_POST['fam']);
  $pdf->SetFont("Arial", "", 9);
  $ism=iconv("UTF-8","CP1251",$_POST['ism']);
  $pdf->SetFont("Arial", "", 9);
  $sharif=iconv("UTF-8","CP1251",$_POST['sharif']);
  $pdf->SetFont("Arial", "", 9);
  $prejfam=iconv("UTF-8","CP1251",$_POST['prejfam']);
  $pdf->SetFont("Arial", "", 9);
  $prejism=iconv("UTF-8","CP1251",$_POST['prejism']);
  $pdf->SetFont("Arial", "", 9);
  $prejsharif=iconv("UTF-8","CP1251",$_POST['prejsharif']);
  $pdf->SetFont("Verdana", "", 9);
  $tugkun=iconv("UTF-8","CP1251",$_POST['tugkun']);
  $pdf->SetFont("Verdana", "", 9);
  $tugjoy=iconv("UTF-8","CP1251",$_POST['tugjoy']);
  $pdf->SetFont("Verdana", "", 9);
  $strana1=iconv("UTF-8","CP1251",$strana1);
  $pdf->SetFont("Verdana", "", 9);
  $fuqaro=iconv("UTF-8","CP1251",$fuqaro);
  $pdf->SetFont("Verdana", "", 9);
  $prejfuqaro=iconv("UTF-8","CP1251",$prejfuqaro);
  $pdf->SetFont("Verdana", "", 9);
  $tip=iconv("UTF-8","CP1251",$_POST['tip']);
  $pdf->SetFont("Verdana", "", 9);
  $kem=iconv("UTF-8","CP1251",$_POST['kem']);
  $pdf->SetFont("Verdana", "", 9);
  $pol=iconv("UTF-8","CP1251",$_POST['pol']);
  $pdf->SetFont("Verdana", "", 9);
  $sem_pol=iconv("UTF-8","CP1251",$_POST['sem_pol']);
  $pdf->SetFont("Verdana", "", 9);
  $fiosup=iconv("UTF-8","CP1251",$_POST['fiosup']);
  $pdf->SetFont("Verdana", "", 9);
  $kol_kir=iconv("UTF-8","CP1251",$kol_kir);
  $pdf->SetFont("Verdana", "", 9);
  $rass_kun=iconv("UTF-8","CP1251",$rass_kun);
  $pdf->SetFont("Verdana", "", 9);
  $elchixona=iconv("UTF-8","CP1251",$elchixona);
    $pdf->SetFont("Verdana", "", 9);
  $maqsad=iconv("UTF-8","CP1251",$_POST['maqsad']);
    $pdf->SetFont("Verdana", "", 9);
  $taklifchi=iconv("UTF-8","CP1251",$_POST['taklifchi']);
    $pdf->SetFont("Verdana", "", 9);
  $job=iconv("UTF-8","CP1251",$job);
    $pdf->SetFont("Verdana", "", 9);
  $job2=iconv("UTF-8","CP1251",$_POST['job2']);
  $pdf->SetFont("Verdana", "", 9);
  $jobadres=iconv("UTF-8","CP1251",$_POST['jobadres']);
  $pdf->SetFont("Verdana", "", 9);
  $adressru=iconv("UTF-8","CP1251",$_POST['adressru']);
    $pdf->SetFont("Verdana", "", 9);
  $mesto_propis=iconv("UTF-8","CP1251",$_POST['mesto_propis']);
  $pdf->SetFont("Verdana", "", 9);
  $avvalkir=iconv("UTF-8","CP1251",$_POST['avvalkir']);
    $pdf->SetFont("Verdana", "", 9);
  $fio_deti=iconv("UTF-8","CP1251",$_POST['fio_deti']);



 $pdf->Text(191, 74,$data_reg);
 $pdf->Text(430, 74,$data_end);
//birinchi qatorda
 $pdf->Text(48, 110,$fam);
 $pdf->Text(260, 110,$prejfam);

//ikkinchi qatorda
 $pdf->Text(48, 152,$ism);
 $pdf->Text(260, 152,$prejism);

//uchincji qatorda
 $pdf->Text(48, 192,$sharif);
 $pdf->Text(260, 192,$prejsharif);

//turtinchi qatorda
       $yil=$_POST['birthYear'];
       $Oy=$_POST['tugoy'];
       $Kun=$_POST['tugkun'];
 $pdf->Text(48, 232, $Kun.".".$Oy.".".$yil);
 $pdf->Text(145, 232,$tugjoy);
 $pdf->Text(260, 232,$strana1);
 $pdf->Text(350, 232,$fuqaro);
 $pdf->Text(465, 232,$prejfuqaro);
           // $pdf->Text(280, 398,$strana).','.$pdf->Text(350, 398,$gorod);

//beshinchi qatorda
 $pdf->Text(48, 266,$tip);
 $pdf->Text(145, 266,$nomer);
       $yil=$_POST['vidanYear'];
       $Oy=$_POST['vidanMonth'];
       $Kun=$_POST['vidan'];
 $pdf->Text(260, 266, $Kun.".".$Oy.".".$yil);
 $pdf->Text(350, 266,$kem);
       $yil=$_POST['srokYear'];
       $Oy=$_POST['srokMonth'];
       $Kun=$_POST['srok'];
 $pdf->Text(465, 266, $Kun.".".$Oy.".".$yil);

//oltinchi qatorda
 $pdf->Text(48, 303,$pol);
 $pdf->Text(145, 303,$sem_pol);
 $pdf->Text(260, 303,$fiosup);
       $Kun=$_POST['kirkun'];
       $yil=$_POST['kirYear'];
       $Oy=$_POST['kiroy'];
       $Kun=$_POST['kirkun'];
 $pdf->Text(440, 303, $Kun.".".$Oy.".".$yil);
       $yil=$_POST['chiq_Year'];
       $Oy=$_POST['chiq_oy'];
       $Kun=$_POST['chiq_kun'];
 $pdf->Text(500, 303, $Kun.".".$Oy.".".$yil);

//ettinchi qatorda
 $pdf->Text(48, 337,$kol_kir);
 $pdf->Text(145, 337, $_POST['kun']);
 $pdf->Text(260, 337,$rass_kun);
 $pdf->Text(418, 337,$elchixona);

//sakkizinchi qatorda i dalshe
 $pdf->Text(48, 369,$maqsad);
 $pdf->Text(48, 404,$taklifchi);
 $pdf->Text(48, 438,$job);
 $pdf->Text(48, 472,$job2);
 $pdf->Text(48, 506,$jobadres);
 $pdf->Text(48, 540,$adressru);
 $pdf->Text(48, 575,$mesto_propis);
 $pdf->Text(48, 609,$avvalkir);
 $pdf->Text(48, 643,$fio_deti);

  echo "&nbsp;";
  $pdf->Output("downloads/anketa.pdf","F");
//$pdf->Output();

    $pdf->closeParsers();

 //  echo "Успешно!";
 }
else
{
  echo "<p><b>Error: ".mysql_error()."</b></p>";
  exit();
}
  mysql_close($bd);

?>

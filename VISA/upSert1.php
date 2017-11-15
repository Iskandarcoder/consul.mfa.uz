<?php

include('db.php');
 require('pdfb/pdfb.php');
 include_once("function.php");
set_error_handler('evisa_error');

  $kalit=-1;
 $grp='';

 class PDF extends PDFB
  {
    function Header1()
    {
    }
    function cp1251_to_utf8($s){
          $c209 = chr(209); $c208 = chr(208); $c129 = chr(129);
          for($i=0; $i<strlen($s); $i++)    {
              $c=ord($s[$i]);
              if ($c>=192 and $c<=239) $t.=$c208.chr($c-48);
              elseif ($c>239) $t.=$c209.chr($c-112);
              elseif ($c==184) $t.=$c209.$c209;
              elseif ($c==168)    $t.=$c208.$c129;
              else $t.=$s[$i];
          }
          return $t;
      }
      function utf8_to_cp1251($s)
       {
           for ($c=0;$c<strlen($s);$c++)
           {
              $i=ord($s[$c]);
              if ($i<=127) $out.=$s[$c];
                  if ($byte2){
                      $new_c2=($c1&3)*64+($i&63);
                      $new_c1=($c1>>2)&5;
                      $new_i=$new_c1*256+$new_c2;
                  if ($new_i==1025){
                      $out_i=168;
                  } else {
                      if ($new_i==1105){
                          $out_i=184;
                      } else {
                          $out_i=$new_i-848;
                      }
                  }
                  $out.=chr($out_i);
                  $byte2=false;
                  }
              if (($i>>5)==6) {
                  $c1=$i;
                  $byte2=true;
              }
           }
           return $out;
       }
    function Footer1()
    {
      //
    }
    function Text1($s,$x,$y,$key)
    {
     if($key==0)
     $this->SetFont("Verdanab", "", 8);
     else
      $this->SetFont("Verdana", "", 8);
     $this->Text($x,$y,$s);
    }
 function Text4($s,$x,$y,$key)
    {
     if($key==0)
     $this->SetFont("Verdana", "", 7);
     else
      $this->SetFont("Verdana", "", 7);
     $this->Text($x,$y,$s);
    }
    function Text3($s,$x,$y,$key)
    {
     if($key==0)
     $this->SetFont("Verdanab", "", 9);
     else
      $this->SetFont("Verdana", "", 9);
     $this->Text($x,$y,$s);
    }
    function Text2($s,$x,$y,$key)
    {
     if($key==0)
     $this->SetFont("Verdana", "", 8);
     else
      $this->SetFont("Verdana", "", 8);
     $this->Text($x,$y,$s);
    }
   }

// Создание PDF объекта и установка свойств

  $pdf = new PDF("p", "mm", "A4");
     $pdf->SetAuthor("MFA UZ");
     $pdf->AddFont("Verdana");
 $pdf->AddFont("Verdanab");
  //  int $bar_kod[];
  $bar_code[0]="a";
 	foreach($_POST['clients'] as $key => $_value)
	{
	   $pdf->AddPage();
   $kalit=$kalit+1;
    $p='';
    /*
  if ($_value['photo']!=''){
  $p='upload\\'.$_value['photo'];
  // echo 'PDF: '.$p;
  $f=fopen($p,"rb");
  $upload=fread($f,filesize($p));
   fclose($f);
   $upload=addslashes($upload);  //Защита переменных от опасных символов ("прослешька переменных")
    }
    else
    */
     $upload='';

      $str=$_value['elchixona'];
     $n=strPos($str,'/');
      $elchixona=Substr($str,0,$n);
     $id_elchixona=Substr($str,$n+1);

      $str=$_value['fuqaro'];
     $n=strPos($str,'/');
      $fuqaro=Substr($str,0,$n);
      $s1= Substr($str,$n+1);
      $n1=strPos($s1,'/');
     $id_fuqaro=Substr($s1,0,$n1);
     $upr=substr($s1,$n1+1);

     $str=$_value['strana1'];
     $n=strPos($str,'/');
      $strana1=Substr($str,0,$n);
     $id_strana1=Substr($str,$n+1);

     $str=$_value['kol_kir'];
     $n=strPos($str,'/');
      $kol_kir=Substr($str,0,$n);
     $id_kol_kir=Substr($str,$n+1);

     $str=$_value['rass_kun'];
     $n=strPos($str,'/');
      $rass_kun=Substr($str,0,$n);
     $id_rass_kun=Substr($str,$n+1);

     $str=$_value['job'];
     $n=strPos($str,'/');
      $job=Substr($str,0,$n);
     $id_job=Substr($str,$n+1);

  //   if(strlen($_value['maqsad'])>200)$_value['maqsad']=Substr($_value['maqsad'],0,200);
  //   if(strlen($_value['taklifchi'])>200)$_value['taklifchi']=Substr($_value['taklifchi'],0,200);
  //   if(strlen($_value['adressru'])>200)$_value['adressru']=Substr($_value['adressru'],0,200);
  //   if(strlen($_value['avvalkir'])>200)$_value['avvalkir']=Substr($_value['avvalkir'],0,200);
  //   if(strlen($_value['fio_deti'])>200)$_value['fio_deti']=Substr($_value['fio_deti'],0,200);
  //   if(strlen($_value['job2'])>200)$_value['job2']=Substr($_value['job2'],0,200);
  //   if(strlen($_value['jobadres'])>200)$_value['jobadres']=Substr($_value['jobadres'],0,200);
  //   if(strlen($_value['mesto_propis'])>200)$_value['mesto_propis']=Substr($_value['mesto_propis'],0,200);
     $bar_code='';
     $gruppa='';
     $status='';
     $data_reg=date('Y.m.d');
     $data_end=date('Y.m.d',(time()+3600*24*90));
  //   echo $data_end;

//     $data_end=date('Y-m-d').'+10 day';
//     $data_end = strtotime(date("Y-m-d", strtotime($date)) . " +1 month");


     $toy=sprintf("%02s",$_value['tugoy']);
  //   $n=strPos($str,'/');
    //  $toy=Substr($str,0,$n);

     $tugkun=$_value['birthYear'].'.'.$toy.'.'.$_value['tugDay'];

     $voy=sprintf("%02s",$_value['vidanMonth']);
//     $n=strPos($str,'/');
  //   $voy=Substr($str,0,$n);

     $vidan=$_value['vidanYear'].'.'.$voy.'.'.$_value['vidanDay'];

     $soy=sprintf("%02s",$_value['srokMonth']);
//     $n=strPos($str,'/');
  //   $soy=Substr($str,0,$n);

     $srok=$_value['srokYear'].'.'.$soy.'.'.$_value['srokDay'];

     $koy=sprintf("%02s",$_value['kiroy']);
//     $n=strPos($str,'/');
  //   $koy=Substr($str,0,$n);

     $kirkun=$_value['kirYear'].'.'.$koy.'.'.$_value['kirkun'];

     $choy=sprintf("%02s",$_value['chiq_oy']);
//     $n=strPos($str,'/');
  //   $choy=Substr($str,0,$n);

     $chiq_kun=$_value['chiq_Year'].'.'.$choy.'.'.$_value['chiq_kun'];

     $qqq = "";
    $_value['nomer']=str_replace(" ",$qqq,$_value['nomer']);

   //  $n=strPos($_POST['goroda'],'/');
     $goroda=$_POST['goroda']; //,0,$n);
  //   if $goroda =='' { $goroda="" };



 $query="INSERT  INTO anketa
          values (NULL,'".$bar_code."',NULL,'".$_value['fam']."',"
                  ."'".$_value['ism']."',"
                  ."'".$_value['sharif']."',"
                  ."'".$_value['prejfam']."',"
                  ."'".$_value['prejism']."',"
                  ."'".$_value['prejsharif']."',"
                  ."'".$upload."',"
           		  ."'".$_value['pol']."',"
				  ."'".$tugkun."',"
                  ."'".$id_strana1."',"
                  ."'".$strana1."',"
                  ."'".str_replace("\n"," ",addslashes(html_entity_decode($_value['tugjoy'])))."',"
     //             ."'".str_replace("\n"," ",addslashes($_value['tugjoy']))."',"
                  ."'".$id_fuqaro."',"
                  ."'".$upr."',"
                  ."'".$fuqaro."',"
                  ."'".$_value['prejfuqaro']."',"
                  ."'".$_value['tip']."',"
                  ."'".$_value['nomer']."',"
                  ."'".$vidan."',"
                  ."'".$srok."',"
                  ."'".str_replace("\n"," ",addslashes(html_entity_decode($_value['kem'])))."',"
//                  ."'".str_replace("\n"," ",addslashes($_value['kem']))."',"
                  ."'".$_value['sem_pol']."',"
                  ."'".str_replace("\n"," ",addslashes(html_entity_decode($_value['fiosup'])))."',"
//                  ."'".str_replace("\n"," ",addslashes($_value['fiosup']))."',"
                  ."'".$kirkun."',"
                  ."'".$chiq_kun."',"
                  ."'".$id_kol_kir."',"
                  ."'".$kol_kir."',"
                  ."'".$_value['kun']."',"
                  ."'".$id_rass_kun."',"
                  ."'".$rass_kun."',"
                  ."'".$id_elchixona."',"
                  ."'".$elchixona."',"
                  ."'".str_replace("\n"," ",addslashes(html_entity_decode($_value['maqsad'])))."',"
//                  ."'".str_replace("\n"," ",addslashes($_value['maqsad']))."',"
                  ."'".str_replace("\n"," ",addslashes(html_entity_decode($_value['taklifchi'])))."',"
                  ."'".str_replace("\n"," ",addslashes(html_entity_decode($_value['adressru'])))."',"
//                  ."'".str_replace("\n"," ",addslashes($_value['adressru']))."',"
                  ."'".str_replace("\n"," ",addslashes(html_entity_decode($_value['avvalkir'])))."',"
//                  ."'".str_replace("\n"," ",addslashes($_value['avvalkir']))."',"
                  ."'".str_replace("\n"," ",addslashes(html_entity_decode($_value['fio_deti'])))."',"
//                  ."'".str_replace("\n"," ",addslashes($_value['fio_deti']))."',"
                  ."'".$id_job."',"
                  ."'".$job."',"
                  ."'".str_replace("\n"," ",addslashes(html_entity_decode($_value['job2'])))."',"
//                  ."'".str_replace("\n"," ",addslashes($_value['job2']))."',"
                  ."'".str_replace("\n"," ",addslashes(html_entity_decode($_value['jobadres'])))."',"
//                  ."'".str_replace("\n"," ",addslashes($_value['jobadres']))."',"
                  ."'".str_replace("\n"," ",addslashes(html_entity_decode($_value['mesto_propis'])))."',"
//                  ."'".str_replace("\n"," ",addslashes($_value['mesto_propis']))."',"
                  ."'".$_value['operator']."',"
                  ."'".$status."',"
                  ."'".$data_reg."',"
				  ."'".$data_end."',"
				  ."'".$goroda."')";

//echo $query; //,'".$goroda."')";
$sql = mysql_query($query) or trigger_error("Error in query" .mysql_error());

if($sql)
{
 // Успешно записан
//   mysql_query("LOCK TABLES anketa WRITE");
  $result=mysql_query("SELECT LAST_INSERT_ID() AS LID") or trigger_error("Error in query" .mysql_error());
  while($record = mysql_fetch_array($result))
       $res=$record['LID'];
//	      mysql_query("UNLOCK TABLES");
   $today = date("Ymd"); //20100916
   $today=substr($today,2);
   $bar_code[$kalit]=$res.$today;

    if($kalit==0) $grp=$res;

    mysql_query("UPDATE anketa SET barcode = '".$bar_code[$kalit]."',gruppa = '".$grp."' WHERE id='".$res."';")  or trigger_error("Error in query" .mysql_error());
   // $str_err=trigger_error("Error in query" .mysql_error());

//         echo $bar_code[$kalit];
// $pdf->SetMargins(15,15,15);
 $pdf->SetFont("Verdanab", "", 11);

    $title="Ministry of Foreign Affairs of the Republic of Uzbekistan";
      $title1="Visa Application";
    $pdf->Cell(185,10,$title,0,2,'C');
    $pdf->Cell(185,5,$title1,0,1,'C');

      $pdf->SetFontSize(7);
     $pdf->Cell(95,5,"Registration date:  "."$data_reg",'T,L,B',0,'C');
    $pdf->Cell(95,5,"Expiration date:  "."$data_end",'T,B,R',1,'C');
  //    $pdf->Cell(1);

 $pdf->BarCode($bar_code[$kalit], "C128B", 124, 253, 200, 46, 0.45, 0.5, 2, 5, "", "PNG");
 // echo $bar_code[$kalit];
       if ($p!='')
 $pdf->Image($p, 162, 31, 35, 43);

   $pdf->SetFontSize(10);

   $pdf->Cell(75,12,"",'1',0,'L');
   $pdf->Text1("Surname",12,34,1);
   $pdf->Text3($_value['fam'],12,39,0);
   $pdf->Cell(75,12,"",'1',0,'C');
   $pdf->Text1("Previous Surname",86,34,1);
   $pdf->Text3($_value['prejfam'],86,39,0);
   $pdf->Cell(40,12,"",'L,T,R',1,'C');
   $pdf->Cell(75,12,"",'1',0,'C');
   $pdf->Text1("First Name",12,46,1);
   $pdf->Text3($_value['ism'],12,51,0);
   $pdf->Cell(75,12,"",'1',0,'C');
   $pdf->Text1("Previous First Name",86,46,1);
   $pdf->Text3($_value['prejism'],86,51,0);
   $pdf->Cell(40,12,"",'L,R',1,'C');
   $pdf->Cell(75,12,"",'1',0,'C');
   $pdf->Text1("Other Names",12,58,1);
   $pdf->Text3($_value['sharif'],12,63,0);
   $pdf->Cell(75,12,"",'1',0,'C');
   $pdf->Text1("Previous Other Names",86,58,1);
   $pdf->Text3($_value['prejsharif'],86,63,0);
   $pdf->Cell(40,12,"",'L,R',1,'C');
   $pdf->Cell(150,15,"",'1',0,'C');
   $pdf->Cell(40,15,"",'L,B,R',1,'C');

   $pdf->Cell(30,12,"",'1',0,'L');
   $pdf->Text1("Date of Birth",12,85,1);
   $tugkun=iconv("UTF-8","CP1251",$tugkun);
      $yil=$_value['birthYear'];
        $Oy=$toy;
        $Kun=sprintf("%02d",$_value['tugDay']);
        $pdf->Text1($Kun.".".$Oy.".".$yil,12,90,0);
  //   $pdf->Text1($tugkun,12,84,0);
   $pdf->Cell(32,12,"",'1',0,'L');
   $pdf->Text1("Place of Birth",42,85,1);
   $tugjoy=iconv("UTF-8","CP1251",$_value['tugjoy']);
  if(strlen($tugjoy)>25)$tugjoy=Substr($tugjoy,0,15);
   $pdf->Text1($tugjoy,42,90,0);
//   $pdf->Text1("",46,84,0);


   $pdf->Cell(40,12,"",'1',0,'L');
   $pdf->Text1("Country of Birth",75,85,1);
   $strana1=iconv("UTF-8","CP1251",$strana1);
   $pdf->Text1($strana1,75,90,0);
   $pdf->Cell(45,12,"",'1',0,'L');
   $pdf->Text1("Citizenship",114,85,1);
     $str=$_value['fuqaro'];
     $n=strPos($str,'/');
      $fuqaro=Substr($str,0,$n);
   $fuqaro=iconv("UTF-8","CP1251",$fuqaro);
   $pdf->Text1($fuqaro,114,90,0);

   $pdf->Cell(43,12,"",'1',1,'L');
   $pdf->Text1("Previous Citizenship",159,85,1);

   $str=$_value['prejfuqaro'];
     $n=strPos($str,'/');
      $prejfuqaro=Substr($str,0,$n);

   $prejfuqaro=iconv("UTF-8","CP1251",$prejfuqaro);
   $pdf->Text1($prejfuqaro,159,90,0);
   $pdf->Cell(30,12,"",'1',0,'L');
   $pdf->Text1("Passport Type",12,97,1);
$tip=iconv("UTF-8","CP1251",$_value['tip']);

if(strlen($tip)>12)$tip=Substr($tip,0,12);
  $pdf->Text1($tip,12,102,0);
   $pdf->Cell(32,12,"",'1',0,'L');
   $pdf->Text1("Passport Number",42,97,1);
$nomer=iconv("UTF-8","CP1251",$_value['nomer']);
  $pdf->Text1($nomer,42,102,0);
   $pdf->Cell(40,12,"",'1',0,'L');
   $pdf->Text1("Date of Issue",75,97,1);

//   $vidan=iconv("UTF-8","CP1251",$vidan);
       $yil=$_value['vidanYear'];
        $Oy=$voy;
        $Kun=sprintf("%02d",$_value['vidanDay']);
        $pdf->Text1($Kun.".".$Oy.".".$yil,75,102,0);

  //$pdf->Text1($vidan,75,99,0);
   $pdf->Cell(45,12,"",'1',0,'L');
   $pdf->Text1("Issue By",114,97,1);
  $kem=iconv("UTF-8","CP1251//IGNORE",$_value['kem']);
  if(strlen($kem)>21)$kem=Substr($kem,0,21);
   $pdf->Text1($kem,114,102,0);
   $pdf->Cell(43,12,"",'1',1,'L');
   $pdf->Text1("Expiration Date",159,97,1);
//$srok=iconv("UTF-8","CP1251",$srok);
        $yil=$_value['srokYear'];
        $Oy=$soy;
         $Kun=sprintf("%02d",$_value['srokDay']);
//        $Kun=$_value['srokDay'];
        $pdf->Text1($Kun.".".$Oy.".".$yil,159,102,0);
//   $pdf->Text1($srok,159,99,0);

   $pdf->Cell(30,12,"",'1',0,'L');
   $pdf->Text1("Sex",12,109,1);
$pol=iconv("UTF-8","CP1251",$_value['pol']);
   $pdf->Text1($pol,12,114,0);
   $pdf->Cell(35,12,"",'1',0,'L');
   $pdf->Text1("Marital Status",42,109,1);
  $sem_pol=iconv("UTF-8","CP1251",$_value['sem_pol']);
   $pdf->Text1($sem_pol,42,114,0);
   $pdf->Cell(70,12,"",'1',0,'L');
   $pdf->Text1("Spouse's Surname, First and Other Names",77,109,1);
  $pdf->SetFontSize(6);
  $fiosup=iconv("UTF-8","CP1251",$_value['fiosup']);
  if(strlen($fiosup)>34)$fiosup=Substr($fiosup,0,34);
   $pdf->Text1($fiosup,77,114,0);
   $pdf->Cell(55,12,"",'1',1,'L');
   $pdf->Text1("Planned Period of Visit (from-to)",146,109,1);
        $yil=$_value['kirYear'];
        $Oy=$koy;
        $Kun=sprintf("%02d",$_value['kirkun']);
 //     $Kun=$_value['kirkun'];
        $pdf->Text1($Kun.".".$Oy.".".$yil,146,114,0);
//   $pdf->Text1("$kirkun",146,114,0);
      $pdf->Text1("-",166,114,0);
        $yil=$_value['chiq_Year'];
        $Oy=$choy;
        $Kun=sprintf("%02d",$_value['chiq_kun']);
//        $Kun=$_value['chiq_kun'];
     $pdf->Text1($Kun.".".$Oy.".".$yil,169,114,0);
//  $pdf->Text1("$chiq_kun",169,114,0);

   $pdf->Cell(37,12,"",'1',0,'L');
   $pdf->Text1("Number of Entries",12,121,1);
$kol_kir=iconv("UTF-8","CP1251",$kol_kir);
   $pdf->Text1($kol_kir,12,126,0);
   $pdf->Cell(37,12,"",'1',0,'L');
   $pdf->Text1("Duration of Stay",50,121,1);
$kun=iconv("UTF-8","CP1251",$_value['kun']);
   $pdf->Text1($kun,50,126,0);
   $pdf->Cell(62,12,"",'1',0,'L');
   $pdf->Text1("Duration of Visa Procedure",86,121,1);
$rass_kun=iconv("UTF-8","CP1251",$rass_kun);
   $pdf->Text1($rass_kun,86,126,0);
   $pdf->Cell(54,12,"",'1',1,'L');
   $pdf->Text1("Place of Visa Issuance",148,121,1);
//$elchixona=iconv("UTF-8","CP1251",$_value['elchixona']);
 $elchixona=iconv("UTF-8","CP1251",$elchixona);
  $pdf->Text1($elchixona,148,126,0);


  $maqsad=$_value['maqsad'];
  $taklifchi=$_value['taklifchi'];
  $job=$job;
  $job2=$_value['job2'];
  $jobadres=$_value['jobadres'];
  $adressru=$_value['adressru'];
  $mesto_propis=$_value['mesto_propis'];
  $avvalkir=iconv("UTF-8","CP1251",$_value['avvalkir']);
  $fio_deti=iconv("UTF-8","CP1251",$_value['fio_deti']);

   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Route for transit through the territory of the Republic of Uzbekistan (cities):",12,133,1);
   $goroda=iconv("UTF-8","CP1251",$goroda);
   $pdf->Text2($goroda,12,138,0);

   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Purpose of Visit",12,144,1);
   if(strlen($maqsad)>100)$maqsad=Substr($maqsad,0,100);
   $pdf->Text2($maqsad,12,149,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Inviting Party",12,155,1);
   if(strlen($taklifchi)>100)$taklifchi=Substr($taklifchi,0,100);
   $pdf->Text2($taklifchi,12,160,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Occupation",12,166,1);
   if(strlen($job)>100)$job=Substr($job,0,100);
   $pdf->Text2($job,12,171,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Place of Work (Study) and Position",12,177,1);
   if(strlen($job2)>100)$job2=Substr($job2,0,100);
   $pdf->Text2($job2,12,182,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Work (Study) Address and Phone",12,188,1);
   if(strlen($jobadres)>100)$jobadres=Substr($jobadres,0,100);
   $pdf->Text2($jobadres,12,193,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Home Address,Phone and E-mail",12,199,1);
   if(strlen($mesto_propis)>100)$mesto_propis=Substr($mesto_propis,0,100);
   $pdf->Text2($mesto_propis,12,204,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Address in Uzbekistan",12,210,1);
   if(strlen($adressru)>100)$adressru=Substr($adressru,0,100);
   $pdf->Text2($adressru,12,215,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Previous Visits to Uzbekistan",12,221,1);
   if(strlen($avvalkir)>100)$avvalkir=Substr($avvalkir,0,100);
   $pdf->Text2($avvalkir,12,226,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Accompanied Persons",12,232,1);
   if(strlen($fio_deti)>100)$fio_deti=Substr($fio_deti,0,100);
   $pdf->Text2($fio_deti,12,237,0);

   $pdf->Cell(95,5,"",'1',0,'L');
   $pdf->Text1("Applicant's signature  ______________",36,242,1);
   $pdf->Cell(95,5,"",'1',1,'L');
   $pdf->Text1("Date (dd.mm.yyyy): ______________",120,242,1);

   $pdf->Cell(190,8,"",'1',1,'L');
   $pdf->Text1("Comment: Please answer all the questions, visa request will not be processed if Application is incomplete.",16,247,1);
   $pdf->Text1("Providing false information may cause the denial of visa",12,250,1);

   $pdf->Cell(124,4,"For official use only",'1',0,'L');
   $pdf->Cell(66,4,"",'L,T,R',1,'L');
   $pdf->SetFontSize(5);
   $pdf->Cell(31,9,"",'1',0,'L');
$pdf->Text4("Qayd №",11,258,0);
   $pdf->Cell(31,9,"",'1',0,'L');
$pdf->Text4("Blank №",42,258,0);
   $pdf->Cell(31,9,"",'1',0,'L');
$pdf->Text4("Tasdiq №",73,258,0);
   $pdf->Cell(31,9,"",'1',0,'L');
$pdf->Text4("Visa turi",104,258,0);
   $pdf->Cell(66,9,"",'L,R',1,'L');
   $pdf->Cell(31,9,"",'1',0,'L');
$pdf->Text4("Berilgan sana",11,267,0);
   $pdf->Cell(31,9,"",'1',0,'L');
$pdf->Text4("Muddati",42,267,0);
   $pdf->Cell(31,9,"",'1',0,'L');
$pdf->Text4("Tushum",73,267,0);
   $pdf->Cell(31,9,"",'1',0,'L');
$pdf->Text4("Xaqiqiy xarajat",104,267,0);
   $pdf->Cell(66,9,"",'L,B,R',1,'L');

//   echo "&nbsp;";
 // $pdf->Output("downloads/anketa.pdf","F");
//$pdf->Output();
  //$pdf->closeParsers();
//      echo "Успешно!!!";
 }
else
{
 // echo "<p><b>Error: ".mysql_error()."</b></p>";
//  echo "-1";
  echo "Error in form not use button Enter in field";

  exit();
}

   $bar_code1[$kalit]=$bar_code[$kalit];

 } // foreach

      if($kalit >0) {
	   $pdf->AddPage();
	//     echo $bar_code1[0];
	   $pdf->SetFont("Verdanab", "", 11);
    $title="Ministry of Foreign Affairs of the Republic of Uzbekistan";
      $title1="Visa Application";
    $pdf->Cell(190,10,$title,0,2,'C');
    $pdf->Cell(190,5,$title1,0,1,'C');


   $pdf->SetFontSize(8);
   $pdf->Cell(6,13,"",'L,R,T',0,'L');
   $pdf->Text1("№",11,30,1);
   $pdf->Cell(30,8,"",'1',0,'L');
   $pdf->Text1("Surname,",25,28,1);
   $pdf->Text1("First name",25,31,1);
   $pdf->Cell(25,8,"",'1',0,'L');
   $pdf->Text1("Date and Place",49,28,1);
   $pdf->Text1("Birth",52,31,1);
   $pdf->Cell(27,8,"",'1',0,'L');
   $pdf->Text1("Citizenship",74,30,1);
   $pdf->Cell(26,8,"",'1',0,'L');
   $pdf->Text1("Passport number",99,30,1);
   $pdf->Cell(8,8,"",'1',0,'L');
   $pdf->Text1("Sex",125,30,1);
   $pdf->Cell(38,8,"",'1',0,'L');
   $pdf->Text1("Place of work",142,28,1);
   $pdf->Text1("(study) and position",137,31,1);
   $pdf->Cell(32,8,"",'L,R,T',1,'L');
   $pdf->Text1("Stroke a code",178,30,1);

   $pdf->Cell(6,5,"",'L,R,B',0,'L');
   $pdf->Text1("№",11,30,1);
   $pdf->Cell(30,5,"",'1',0,'L');
   $pdf->Text1("1",29,36,1);
   $pdf->Cell(25,5,"",'1',0,'L');
   $pdf->Text1("2",59,36,1);
   $pdf->Cell(27,5,"",'1',0,'L');
   $pdf->Text1("3",84,36,1);
   $pdf->Cell(26,5,"",'1',0,'L');
   $pdf->Text1("4",117,36,1);
   $pdf->Cell(8,5,"",'1',0,'L');
   $pdf->Text1("5",127,36,1);
   $pdf->Cell(38,5,"",'1',0,'L');
   $pdf->Text1("6",148,36,1);
   $pdf->Cell(32,5,"",'L,R,B',1,'L');
   $pdf->Text1("",178,36,1);

   $mm=0;
   $my=32;

   $kalit=-1;
  // echo $bar_code[0];
    // echo $bar_code[1];

 foreach($_POST['clients'] as $key => $_value)

	{
	$mm++;
	$my=$my+10;
	++$kalit;
	 $pdf->Cell(6,10,"",'1',0,'L');
    $pdf->Text2($mm,12,$my+2,1);
   $pdf->Cell(30,10,"",'1',0,'L');
   $pdf->Text2($_value['fam'],17,$my,1);
   $pdf->Text2($_value['ism'],17,$my+3,1);
   $pdf->Cell(25,10,"",'1',0,'L');

       $yil=$_value['birthYear'];
 $toy=sprintf("%02s",$_value['tugoy']);
       $Kun=sprintf("%02d",$_value['tugDay']);
//       $Kun=$_value['tugDay'];

   $tugkun=$Kun.".".$toy.".".$yil;
   $pdf->Text2($tugkun,48,$my,1);
   $tugjoy=$_value['tugjoy'];
   $pdf->Text2($tugjoy,48,$my+3,1);
   $pdf->Cell(27,10,"",'1',0,'L');
      $str=$_value['fuqaro'];
      $n=strpos($str,'/');
      $fuqaro=substr($str,0,$n);
//   $fuqaro=iconv("UTF-8","CP1251",$fuqaro);
   if(strlen($fuqaro)>15)$fuqaro=Substr($fuqaro,0,15);
   $pdf->Text2($fuqaro,73,$my+1,1);
   $pdf->Cell(26,10,"",'1',0,'L');
   $nomer=$_value['nomer'];
   $pdf->Text2($nomer,99,$my+1,1);
   $pdf->Cell(8,10,"",'1',0,'L');
   $pol=$_value['pol'];
   $pdf->Text2($pol[0],125,$my+1,1);
   $pdf->Cell(38,10,"",'1',0,'L');
   $job2=$_value['job2'];
   if(strlen($job2)>20)$job2=Substr($job2,0,20);
   $pdf->Text2($job2,133,$my+1,1);
   $pdf->Cell(32,10,"",'1',1,'L');

   $pdf->Text2($bar_code1[$kalit],178,$my+2,0);
  	   }

 $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text2("Inviting Party",12,$my+10,1);
   $taklifchi=$_value['taklifchi'];
   if(strlen($taklifchi)>100)$taklifchi=Substr($taklifchi,0,100);
   $pdf->Text2($taklifchi,12,$my+14,1);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text2("Number of entries",12,$my+21,1);
   $pdf->Text2($kol_kir,12,$my+25,1);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text2("Planned period of visit",12,$my+32,1);
   $pdf->Text2("$kirkun",12,$my+36,0);
   $pdf->Text2("-",32,$my+36,0);
   $pdf->Text2("$chiq_kun",35,$my+36,1);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text2("Duration of visa procedure",12,$my+43,1);
   $pdf->Text2($rass_kun,12,$my+47,0);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text2("Place of visa issuance",12,$my+54,0);
   $pdf->Text2($elchixona,12,$my+58,0);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text1("Route for transit through the territory of the Republic of Uzbekistan (cities):",12,$my+65,1);
   $pdf->Text2($goroda,12,$my+69,0);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text2("Purpose of visit",12,$my+76,1);
   $maqsad=$_value['maqsad'];
   if(strlen($maqsad)>100)$maqsad=Substr($maqsad,0,100);
   $pdf->Text2($maqsad,12,$my+80,0);
 }
 //$tfile=tmpfile();
$folder=dirname(__FILE__);
$folder.='\\downloads\\';
$temp_file = tempnam($folder, 'vs_'.date('Y-m-d'));
// $temp_file = tempnam(sys_get_temp_dir(), 'vs_'.date('Y-m-d'));
$temp_mask=$temp_file;
$temp_file=str_replace('.tmp','.pdf',$temp_file);

// $afile=explode('.', $temp_file)
// $temp_file=sys_get_temp_dir().$afile[0].'.pdf';
// $_SESSION['tmp_file_name']=$tfile;
// $pdf->Output("downloads/anketa.pdf","F");
 $pdf->Output($temp_file,"F");
 mysql_close($bd);

	if ($fd = fopen ($temp_file, "r"))
	{
	    $fsize = filesize($temp_file);
    	$path_parts = pathinfo($temp_file);
	    $ext = strtolower($path_parts["extension"]);
    	switch ($ext) {
        	case "pdf":
	        header("Content-type: application/pdf"); // add here more headers for diff. extensions
    	    header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a download
        	break;
	        default;
    	    header("Content-type: application/octet-stream");
        	header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
	    }
    	header("Content-length: $fsize");
	    header("Cache-control: private"); //use this to open files directly
    	while(!feof($fd)) {
	        $buffer = fread($fd, 2048);
    	    echo $buffer;
	    }
	}
	fclose ($fd);
	unlink($temp_file);
	unlink($temp_mask);
?>
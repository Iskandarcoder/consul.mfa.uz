<?php
include('db.php');
 require('pdfb/pdfb.php');
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
  if ($_value['photo']!=''){
  $p='upload\\'.$_value['photo'];
  // echo 'PDF: '.$p;
  $f=fopen($p,"rb");
  $upload=fread($f,filesize($p));
   fclose($f);
   $upload=addslashes($upload);  //Защита переменных от опасных символов ("прослешька переменных")
    }
    else
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

     $bar_code='';
     $gruppa='';
     $status='';
     $data_reg=date('Y.m.d');
     $data_end=date('Y.m.d',(time()+3600*24*90));
  //   echo $data_end;

//     $data_end=date('Y-m-d').'+10 day';
//     $data_end = strtotime(date("Y-m-d", strtotime($date)) . " +1 month");


     $str=$_value['tugoy'];
     $n=strPos($str,'/');
      $toy=Substr($str,0,$n);

     $tugkun=$_value['birthYear'].'.'.$toy.'.'.$_value['tugDay'];

     $str=$_value['vidanMonth'];
     $n=strPos($str,'/');
     $voy=Substr($str,0,$n);

     $vidan=$_value['vidanYear'].'.'.$voy.'.'.$_value['vidanDay'];

     $str=$_value['srokMonth'];
     $n=strPos($str,'/');
     $soy=Substr($str,0,$n);

     $srok=$_value['srokYear'].'.'.$soy.'.'.$_value['srokDay'];

     $str=$_value['kiroy'];
     $n=strPos($str,'/');
     $koy=Substr($str,0,$n);

     $kirkun=$_value['kirYear'].'.'.$koy.'.'.$_value['kirkun'];

     $str=$_value['chiq_oy'];
     $n=strPos($str,'/');
     $choy=Substr($str,0,$n);

     $chiq_kun=$_value['chiq_Year'].'.'.$choy.'.'.$_value['chiq_kun'];


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
                  ."'".$_value['tugjoy']."',"
                  ."'".$id_fuqaro."',"
                  ."'".$upr."',"
                  ."'".$fuqaro."',"
                  ."'".$_value['prejfuqaro']."',"
                  ."'".$_value['tip']."',"
                  ."'".$_value['nomer']."',"
                  ."'".$vidan."',"
                  ."'".$srok."',"
                  ."'".$_value['kem']."',"
                  ."'".$_value['sem_pol']."',"
                  ."'".$_value['fiosup']."',"
                  ."'".$kirkun."',"
                  ."'".$chiq_kun."',"
                  ."'".$id_kol_kir."',"
                  ."'".$kol_kir."',"
                  ."'".$_value['kun']."',"
                  ."'".$id_rass_kun."',"
                  ."'".$rass_kun."',"
                  ."'".$id_elchixona."',"
                  ."'".$elchixona."',"
                  ."'".$_value['maqsad']."',"
                  ."'".$_value['taklifchi']."',"
                  ."'".$_value['adressru']."',"
                  ."'".$_value['avvalkir']."',"
                  ."'".$_value['fio_deti']."',"
                  ."'".$id_job."',"
                  ."'".$job."',"
                  ."'".$_value['job2']."',"
                  ."'".$_value['jobadres']."',"
                  ."'".$_value['mesto_propis']."',"
                  ."'".$_value['operator']."',"
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
   $bar_code[$kalit]=$res.$today;
  //  echo $bar_code[$kalit];
    if($kalit==0) $grp=$res;

    mysql_query ("UPDATE anketa SET barcode = '".$bar_code[$kalit]."',gruppa = '".$grp."' WHERE id='".$res."';");


// $pdf->SetMargins(15,15,15);
 $pdf->SetFont("Verdanab", "", 11);

      $title="Министерство иностранных дел Республики Узбекистан";
      $title1="Визовая анкета";
    $pdf->Cell(185,10,$title,0,2,'C');
    $pdf->Cell(185,5,$title1,0,1,'C');

      $pdf->SetFontSize(7);
    $pdf->Cell(95,5,"Дата заполнения:  "."$data_reg",'T,L,B',0,'C');
    $pdf->Cell(95,5,"Срок истечения:  "."$data_end",'T,B,R',1,'C');
  //    $pdf->Cell(1);

 $pdf->BarCode($bar_code[$kalit], "C128B", 124, 253, 200, 46, 0.45, 0.5, 2, 5, "", "PNG");
 // echo $bar_code[$kalit];
if ($p!='')
 $pdf->Image($p, 162, 31, 35, 43);

   $pdf->SetFontSize(10);

   $pdf->Cell(75,15,"",'1',0,'L');
   $pdf->Text1("Фамилия",12,34,1);
   $pdf->Text3($_value['fam'],12,39,0);
   $pdf->Cell(75,15,"",'1',0,'C');
   $pdf->Text1("Прежняя фамилия",86,34,1);
   $pdf->Text3($_value['prejfam'],86,39,0);
   $pdf->Cell(40,15,"",'L,T,R',1,'C');
   $pdf->Cell(75,15,"",'1',0,'C');
   $pdf->Text1("Имя",12,49,1);
   $pdf->Text3($_value['ism'],12,54,0);
   $pdf->Cell(75,15,"",'1',0,'C');
   $pdf->Text1("Прежнее имя",86,49,1);
   $pdf->Text3($_value['prejfam'],86,54,0);
   $pdf->Cell(40,15,"",'L,R',1,'C');
   $pdf->Cell(75,15,"",'1',0,'C');
   $pdf->Text1("Отчество",12,64,1);
   $pdf->Text3($_value['sharif'],12,69,0);
   $pdf->Cell(75,15,"",'1',0,'C');
   $pdf->Text1("Прежнее отчество",86,64,1);
   $pdf->Text3($_value['prejsharif'],86,69,0);
   $pdf->Cell(40,15,"",'L,B,R',1,'C');

   $pdf->Cell(30,15,"",'1',0,'L');
   $pdf->Text1("Дата рождения",12,79,1);
   $tugkun=iconv("UTF-8","CP1251",$tugkun);
      $yil=$_value['birthYear'];
        $Oy=$toy;
        $Kun=$_value['tugDay'];
        $pdf->Text1($Kun.".".$Oy.".".$yil,12,84,0);

//   $pdf->Text1($tugkun,12,84,0);
   $pdf->Cell(32,15,"",'1',0,'L');
   $pdf->Text1("Место рождения",42,79,1);
   $tugjoy=iconv("UTF-8","CP1251",$_value['tugjoy']);
   $pdf->Text1($tugjoy,42,84,0);
   $pdf->Text1("",46,84,0);
   $pdf->Cell(40,15,"",'1',0,'L');
   $pdf->Text1("Страна рождения",75,79,1);
   $strana1=iconv("UTF-8","CP1251",$strana1);
   $pdf->Text1($strana1,75,84,0);
   $pdf->Cell(45,15,"",'1',0,'L');
   $pdf->Text1("Гражданство",114,79,1);
     $str=$_value['fuqaro'];
     $n=strPos($str,'/');
      $fuqaro=Substr($str,0,$n);
   $fuqaro=iconv("UTF-8","CP1251",$fuqaro);
   $pdf->Text1($fuqaro,114,84,0);
   $pdf->Cell(43,15,"",'1',1,'L');
   $pdf->Text1("Прежнее гражданство",159,79,1);
   $prejfuqaro=iconv("UTF-8","CP1251",$prejfuqaro);
   $pdf->Text1($prejfuqaro,159,84,0);

   $pdf->Cell(30,15,"",'1',0,'L');
   $pdf->Text1("Тип паспорта",12,94,1);
$tip=iconv("UTF-8","CP1251",$_value['tip']);
if(strlen($tip)>12)$tip=Substr($tip,0,12);
  $pdf->Text1($tip,12,99,0);
   $pdf->Cell(32,15,"",'1',0,'L');
   $pdf->Text1("Номер паспорта",42,94,1);
$nomer=iconv("UTF-8","CP1251",$_value['nomer']);
  $pdf->Text1($nomer,42,99,0);
   $pdf->Cell(40,15,"",'1',0,'L');
   $pdf->Text1("Дата выдачи паспорта",75,94,1);
//   $vidan=iconv("UTF-8","CP1251",$vidan);
           $yil=$_value['vidanYear'];
        $Oy=$voy;
        $Kun=$_value['vidanDay'];
        $pdf->Text1($Kun.".".$Oy.".".$yil,75,99,0);
  //$pdf->Text1($vidan,75,99,0);
   $pdf->Cell(45,15,"",'1',0,'L');
   $pdf->Text1("Кем выдан паспорт",114,94,1);
  $kem=iconv("UTF-8","CP1251",$_value['kem']);
  if(strlen($kem)>21)$kem=Substr($kem,0,21);
   $pdf->Text1($kem,114,99,0);
   $pdf->Cell(43,15,"",'1',1,'L');
   $pdf->Text1("Срок действия паспорта",159,94,1);
//$srok=iconv("UTF-8","CP1251",$srok);
        $yil=$_value['srokYear'];
        $Oy=$soy;
        $Kun=$_value['srokDay'];
        $pdf->Text1($Kun.".".$Oy.".".$yil,159,99,0);
//   $pdf->Text1($srok,159,99,0);

   $pdf->Cell(30,15,"",'1',0,'L');
   $pdf->Text1("Пол",12,109,1);
$pol=iconv("UTF-8","CP1251",$_value['pol']);
   $pdf->Text1($pol,12,114,0);
   $pdf->Cell(35,15,"",'1',0,'L');
   $pdf->Text1("Семейное положение",42,109,1);
  $sem_pol=iconv("UTF-8","CP1251",$_value['sem_pol']);
   $pdf->Text1($sem_pol,42,114,0);
   $pdf->Cell(70,15,"",'1',0,'L');
   $pdf->Text1("Фамилия, имя, отчество супруги/супруга",77,109,1);
  $pdf->SetFontSize(6);
  $fiosup=iconv("UTF-8","CP1251",$_value['fiosup']);
  if(strlen($fiosup)>34)$fiosup=Substr($fiosup,0,34);
   $pdf->Text1($fiosup,77,114,0);
   $pdf->Cell(55,15,"",'1',1,'L');
   $pdf->Text1("Планируемый срок пребывания",146,109,1);
        $yil=$_value['kirYear'];
        $Oy=$koy;
        $Kun=$_value['kirkun'];
        $pdf->Text1($Kun.".".$Oy.".".$yil,146,114,0);
//   $pdf->Text1("$kirkun",146,114,0);
      $pdf->Text1("-",166,114,0);
        $yil=$_value['chiq_Year'];
        $Oy=$choy;
        $Kun=$_value['chiq_kun'];
     $pdf->Text1($Kun.".".$Oy.".".$yil,169,114,0);
//  $pdf->Text1("$chiq_kun",169,114,0);

   $pdf->Cell(37,15,"",'1',0,'L');
   $pdf->Text1("Количество въездов",12,124,1);
$kol_kir=iconv("UTF-8","CP1251",$kol_kir);
   $pdf->Text1($kol_kir,12,129,0);
   $pdf->Cell(37,15,"",'1',0,'L');
   $pdf->Text1("Количество дней",50,124,1);
$kun=iconv("UTF-8","CP1251",$_value['kun']);
   $pdf->Text1($kun,50,129,0);
   $pdf->Cell(62,15,"",'1',0,'L');
   $pdf->Text1("Срок рассмотрения визовой заявки",86,124,1);
$rass_kun=iconv("UTF-8","CP1251",$rass_kun);
   $pdf->Text1($rass_kun,86,129,0);
   $pdf->Cell(54,15,"",'1',1,'L');
   $pdf->Text1("Место получения визы",148,124,1);
//$elchixona=iconv("UTF-8","CP1251",$_value['elchixona']);
 $elchixona=iconv("UTF-8","CP1251",$elchixona);
  $pdf->Text1($elchixona,148,129,0);


  $maqsad=iconv("UTF-8","CP1251",$_value['maqsad']);
  $taklifchi=iconv("UTF-8","CP1251",$_value['taklifchi']);
  $job=iconv("UTF-8","CP1251",$job);
  $job2=iconv("UTF-8","CP1251",$_value['job2']);
  $jobadres=iconv("UTF-8","CP1251",$_value['jobadres']);
  $adressru=iconv("UTF-8","CP1251",$_value['adressru']);
  $mesto_propis=iconv("UTF-8","CP1251",$_value['mesto_propis']);
  $avvalkir=iconv("UTF-8","CP1251",$_value['avvalkir']);
  $fio_deti=iconv("UTF-8","CP1251",$_value['fio_deti']);

   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Цель поездки",12,139,1);
   if(strlen($maqsad)>100)$maqsad=Substr($maqsad,0,100);
   $pdf->Text2($maqsad,12,144,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Приглашающая сторона",12,149,1);
   if(strlen($taklifchi)>100)$taklifchi=Substr($taklifchi,0,100);
   $pdf->Text2($taklifchi,12,154,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Род деятельности",12,160,1);
   if(strlen($job)>100)$job=Substr($job,0,100);
   $pdf->Text2($job,12,165,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Место работы (учебы) и должность",12,171,1);
   if(strlen($job2)>100)$job2=Substr($job2,0,100);
   $pdf->Text2($job2,12,176,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Адрес места работы (учебы)",12,182,1);
   if(strlen($jobadres)>100)$jobadres=Substr($jobadres,0,100);
   $pdf->Text2($jobadres,12,187,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Место постоянного проживания",12,193,1);
   if(strlen($mesto_propis)>100)$mesto_propis=Substr($mesto_propis,0,100);
   $pdf->Text2($mesto_propis,12,197,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Адрес проживания в Узбекистане",12,204,1);
   if(strlen($adressru)>100)$adressru=Substr($adressru,0,100);
   $pdf->Text2($adressru,12,209,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Предыдущие поездки в Узбекистан",12,215,1);
   if(strlen($avvalkir)>100)$avvalkir=Substr($avvalkir,0,100);
   $pdf->Text2($avvalkir,12,219,0);
   $pdf->Cell(190,11,"",'1',1,'L');
   $pdf->Text1("Совместно следующие лица",12,226,1);
   if(strlen($fio_deti)>100)$fio_deti=Substr($fio_deti,0,100);
   $pdf->Text2($fio_deti,12,231,0);

   $pdf->Cell(95,10,"",'1',0,'L');
   $pdf->Text1("Подпись заявителя  ______________",36,241,1);
   $pdf->Cell(95,10,"",'1',1,'L');
   $pdf->Text1("Дата (дд.мм.гггг): ______________",120,241,1);

   $pdf->Cell(190,8,"",'1',1,'L');
   $pdf->Text1("Примичание: Необходимо заполнить все пункты анкеты. Предоставление неверной информации может повлечь за",16,247,1);
   $pdf->Text1("собой отказ в выдаче визы или ее аннулирование",12,251,1);

   $pdf->Cell(124,4,"Для служебных заметок",'1',0,'L');
   $pdf->Cell(66,4,"",'L,T,R',1,'L');
   $pdf->SetFontSize(6);
   $pdf->Cell(31,9,"Qayd №",'1',0,'L');
   $pdf->Cell(31,9,"Blank №  ",'1',0,'L');
   $pdf->Cell(31,9,"Tasdiq №",'1',0,'L');
   $pdf->Cell(31,9,"Visa turi",'1',0,'L');
   $pdf->Cell(66,9,"",'L,R',1,'L');
   $pdf->Cell(31,9,"Berilgan sana",'1',0,'L');
   $pdf->Cell(31,9,"Muddati",'1',0,'L');
   $pdf->Cell(31,9,"Tushum",'1',0,'L');
   $pdf->Cell(31,9,"Xaqiqiy xarajat",'1',0,'L');
   $pdf->Cell(66,9,"",'L,B,R',1,'L');

   echo "&nbsp;";
  //$pdf->Output("downloads/anketa.pdf","F");
//$pdf->Output();
  //$pdf->closeParsers();
    //  echo "Успешно!";
 }
else
{
 // echo "<p><b>Error: ".mysql_error()."</b></p>";
  echo "-1";

  exit();
}

   $bar_code1[$kalit]=$bar_code[$kalit];

 } // foreach

      if($kalit >0) {
	   $pdf->AddPage();
	//     echo $bar_code1[0];
	   $pdf->SetFont("Verdanab", "", 11);
    $title="Министерство иностранных дел Республики Узбекистан";
      $title1="Визовая анкета";
    $pdf->Cell(190,10,$title,0,2,'C');
    $pdf->Cell(190,5,$title1,0,1,'C');


   $pdf->SetFontSize(8);
   $pdf->Cell(6,13,"",'L,R,T',0,'L');
   $pdf->Text1("№",11,30,1);
   $pdf->Cell(30,8,"",'1',0,'L');
   $pdf->Text1("Ф.И.О",25,30,1);
   $pdf->Cell(25,8,"",'1',0,'L');
   $pdf->Text1("Дата и место",49,28,1);
   $pdf->Text1("рождения",52,31,1);
   $pdf->Cell(27,8,"",'1',0,'L');
   $pdf->Text1("Гражданство",74,30,1);
   $pdf->Cell(26,8,"",'1',0,'L');
   $pdf->Text1("Номер паспорта",99,30,1);
   $pdf->Cell(8,8,"",'1',0,'L');
   $pdf->Text1("Пол",125,30,1);
   $pdf->Cell(38,8,"",'1',0,'L');
   $pdf->Text1("Место работы",142,28,1);
   $pdf->Text1("учебы и должность",137,31,1);
   $pdf->Cell(32,8,"",'L,R,T',1,'L');
   $pdf->Text1("Штрих код",178,30,1);

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
   $tugkun=iconv("UTF-8","CP1251",$tugkun);
   $pdf->Text2($tugkun,48,$my,1);
   $tugjoy=iconv("UTF-8","CP1251",$_value['tugjoy']);
   $pdf->Text2($tugjoy,48,$my+3,1);
   $pdf->Cell(27,10,"",'1',0,'L');
      $str=$_value['fuqaro'];
      $n=strPos($str,'/');
      $fuqaro=Substr($str,0,$n);
   $fuqaro=iconv("UTF-8","CP1251",$fuqaro);
   if(strlen($fuqaro)>15)$fuqaro=Substr($fuqaro,0,15);
   $pdf->Text2($fuqaro,73,$my+1,1);
   $pdf->Cell(26,10,"",'1',0,'L');
   $nomer=iconv("UTF-8","CP1251",$_value['nomer']);
   $pdf->Text2($nomer,99,$my+1,1);
   $pdf->Cell(8,10,"",'1',0,'L');
   $pol=iconv("UTF-8","CP1251",$_value['pol']);
   $pdf->Text2($pol[0],125,$my+1,1);
   $pdf->Cell(38,10,"",'1',0,'L');
   $job2=iconv("UTF-8","CP1251",$_value['job2']);
   if(strlen($job2)>20)$job2=Substr($job2,0,20);
   $pdf->Text2($job2,133,$my+1,1);
   $pdf->Cell(32,10,"",'1',1,'L');

   $pdf->Text2($bar_code1[$kalit],178,$my+2,0);
  	   }

   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text2("Приглашающая сторона",12,$my+10,1);
   $taklifchi=iconv("UTF-8","CP1251",$_value['taklifchi']);
   if(strlen($taklifchi)>100)$taklifchi=Substr($taklifchi,0,100);
   $pdf->Text2($taklifchi,12,$my+14,1);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text2("Количество въездов",12,$my+21,1);
   $pdf->Text2($kol_kir,12,$my+25,1);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text2("Планируемый срок пребывания",12,$my+32,1);
   $pdf->Text2("$kirkun",12,$my+36,0);
   $pdf->Text2("-",32,$my+36,0);
   $pdf->Text2("$chiq_kun",35,$my+36,1);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text2("Срок рассмотрения визовой заявки",12,$my+43,1);
   $pdf->Text2($rass_kun,12,$my+47,0);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text2("Место получения визы",12,$my+54,0);
   $pdf->Text2($elchixona,12,$my+58,0);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text2("Цель поездки",12,$my+65,1);
   $maqsad=iconv("UTF-8","CP1251",$_value['maqsad']);
   if(strlen($maqsad)>100)$maqsad=Substr($maqsad,0,100);
   $pdf->Text2($maqsad,12,$my+69,0);
 }
 $pdf->Output("downloads/anketa.pdf","F");
  mysql_close($bd);
?>

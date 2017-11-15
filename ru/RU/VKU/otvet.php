<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
include('../db.php');
 require('pdfb/pdfb.php');
//include_once('pdfb/ufpdf.php');
mysql_query("SET NAMES 'UTF8'");

$guid = strtoupper ($_GET['name']);
$q="select * from kus where  id like  ";
$query=$q."'%".$guid."%'";

 $x=0;   
$sql=mysql_query($query);
if($sql){
$row=mysql_fetch_array($sql);
$x=mysql_num_rows($sql);
}

if($x>1)
{
   echo "Введите по больше символов ID!";
   exit;
}
  //$b="<p class='otvet_o'> Sizning ID:&nbsp&nbsp<span>".$guid."</span></p>";
  if($x==1)
{
  $guid = $row["id"];
  $fam=$row['surname_latin'];
  $ism=$row['name_latin'];
  $sharif =$row["patronym_latin"];
  $division_id =$row["division_id"];
  $reg_num = $row["reg_num"];
  $begin_date = $row["begin_date"];

  if(($row['status']=='0') OR ($row['status']=='9'))
  {
$b = $row['status']; 
  	$b = $b."<p class='otvet_o'>Уважаемый &nbsp".$fam.'  '.$ism."</p>";
	echo   $b."#<p class='otvet'>Для Вас пока не найдена информация.<br/>Ждите! </p>";
}

  if($row['status']=='6')
  {
  $b = "6#Уважаемый &nbsp".$fam.'  '.$ism."<span><br/> Ваш запрос не прошел проверки!</span></p>";
  $info = "Ответ Консула:<br />".$row['add_info'];
   echo    $b."<p class='otvet'>".$info."</p>";
   }

   if($row['status']=='7')
  {
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
// 
$query = "select * from vku_kart where elchihona_k =";
$query .= "'".$division_id."'"; 

 $KD = mysql_query($query);
 $row=mysql_fetch_array($KD);
$x=mysql_num_rows($KD);
if($x>0)
{
  $pdf = new PDF("p", "pt", "A4");
  $pdf->SetAuthor("MFA UZ");
  $pdf->SetTitle(" ");
  $pdf->AddFont("Verdana");
  $pdf->SetFont("Verdana", "", 9);
  // 
  $pdf->setSourceFile('../VKU/Kart_rus.pdf');
  $tplidx = $pdf->ImportPage(1);
 //
  $pdf->AddPage();
  $pdf->useTemplate($tplidx);
  $pdf->BarCode($guid, "C128B", 300, 180, 480, 80, 0.55, 0.5, 1, 5, "", "PNG");
  
  $elchixona = iconv("UTF-8","CP1251",$row["elchihona_qn_rus"]);
  $elchixona=wordwrap($elchixona,250,"\n");
	$pdf->SetXY(33,70);
	$pdf-> Cell(250,8,$elchixona,0,0,'L',0);
  
    $pdf->SetFontSize(8);  
 $elchixona = iconv("UTF-8","CP1251",$row["ish_vaqti_rus"]);
  $elchixona=wordwrap($elchixona,250,"\n");
	$pdf->SetXY(33,100);
	$pdf-> Cell(250,8,$elchixona,0,0,'L',0);
    
  $elchixona = $row["ish_vaqti_c_rus"];
  $elchixona=wordwrap($elchixona,250,"\n");
	$pdf->SetXY(33,110);
	$pdf-> Cell(250,8,$elchixona,0,0,'L',0);
    
     $elchixona = $row["tel"];
  $elchixona=wordwrap($elchixona,250,"\n");
	$pdf->SetXY(33,140);
	$pdf-> Cell(250,8,$elchixona,0,0,'L',0);
    
     $elchixona = $row["email"];
  $elchixona=wordwrap($elchixona,250,"\n");
	$pdf->SetXY(33,150);
	$pdf-> Cell(250,8,$elchixona,0,0,'L',0);
  
     $elchixona = iconv('UTF-8', 'windows-1252', $row["adres"]);
  $elchixona=wordwrap($elchixona,250,"\n");
	$pdf->SetXY(33,180);
	$pdf-> Cell(250,8,$elchixona,0,0,'L',0);
    
  
  $pdf->SetFontSize(9);
  $elchixona = iconv('UTF-8', 'windows-1251', $row["elchihona_tn_rus"]); 
  	$elchixona=wordwrap($elchixona,250,"\n");
	$pdf->SetXY(310,97);
	$pdf-> Cell(250,8,$elchixona,0,0,'C',0);
    
$elchixona = iconv('UTF-8', 'windows-1251', $row["elchihona_tn1_rus"]); 
    $elchixona=wordwrap($elchixona,230,"\n");
	$pdf->SetXY(310,107);
    $pdf->Cell(250,8,$elchixona,0,0,'C',0);
  
  $pdf->SetFont('Helvetica','B',8);
  $fuqaro = $fam." ".$ism." ";
  if($sharif!="XXX")
  $fuqaro .= $sharif;  
  	$pdf->SetXY(310,140);
 $pdf->Cell(250,8,$fuqaro,0,0,'C',0);
 
 $pdf->SetFont('Verdana','',7);
 $N = "(№";
 $N = iconv( 'UTF-8','windows-1251',$N );
    $begindate = $N.$reg_num." / ";
     $begin_date = substr($begin_date,8,2).".".substr($begin_date,5,2).".".substr($begin_date,0,4);
     $begindate =$begindate.$begin_date.")";
    	$pdf->SetXY(310,165);
 $pdf->Cell(250,8,$begindate,0,0,'C',0);
    
  $Sfile="K-".$guid.".pdf";
  $SPathfile="../downloads/".$Sfile;
 $temp_file= $SPathfile;

 $pdf->Output($SPathfile,"F");
 $pdf->closeParsers();
 print_r( "7/ru/RU/downloads/".$Sfile);
}
  	//unlink($SPathfile);
exit;
    }
 }
  else
    echo  "#<p class='otvet'>Для этого ID не найдена информация из базы данных.<br/>Ошибка ввода! </p>";
 }
?>

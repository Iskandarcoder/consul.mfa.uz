<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
print_r ($_POST);
exit;
include('../db.php');
 require('pdfb/pdfb.php');
include("../function.php");
  $crypt_text = $_POST['result'];
  if($crypt_text=='') exit;
  $guid =  substr($crypt_text,0,32);
 //  $crypt_text = base64_decode( substr($crypt_text,32));
  $famismi = substr($crypt_text,32,7);
    $keyi = substr($crypt_text,32);
//Agar bazada kalit bo`lmasa
 $res = mysql_query("SELECT * FROM usl_key where id='".$guid."'");
 if(mysql_num_rows($res)==0)
   {
        print_r( '-1');
        exit;	
 }
  $row = mysql_fetch_array($res);
   $famism = $row['famism'];
   $key = $row['name'];    // 37 bayt bo`lishi kerak

/*
  //Captcha natijasini tekshirish
$td = mcrypt_module_open(MCRYPT_BLOWFISH,'',MCRYPT_MODE_CFB,'');
$iv_size1 = mcrypt_enc_get_iv_size($td);
$iv1 = substr($crypt_text,0,$iv_size1);
$crypt_text1 = substr($crypt_text,$iv_size1);
mcrypt_generic_init($td,$key,$iv1);
$text = mdecrypt_generic($td,$crypt_text1);
mcrypt_generic_deinit($td);
mcrypt_module_close($td);
*/
//mysql_query ("TRUNCATE TABLE usl_key") or die(mysql_error());
mysql_query("delete from usl_key where id='".$guid."'");
if($famism != $famismi) || ($key != $keyi){
   //if($famism != $text{
   print_r('-2');
        exit;	
}
//

//echo $_POST['upfile'];
  if ($_POST['upfile']!=''){
    $sf = basename($_POST['upfile']);  
  $p='../ru/upload/'.$sf;

 $f=fopen($p,"rb");
  $upload=fread($f,filesize($p));

   fclose($f);
   $upload=addslashes($upload);  
    }
 //
      $p_guid         =guid();
 
// 1-ch tab
      $p_surnamel    =strtoupper($_POST['fam']);
     $p_namel         =strtoupper($_POST['ism']);
     $p_patronyml  =strtoupper($_POST['sharif']);
     if ($_POST['famk']!='')  
     $p_surnamec  =mb_strtoupper($_POST['famk'],"UTF-8");
      if ($_POST['ismk']!='') 
      $p_namec       =mb_strtoupper($_POST['ismk'],"UTF-8");
     if ($_POST['sharifk']!='')  
     $p_patronymc  =mb_strtoupper($_POST['sharifk'],"UTF-8");
    if ($_POST['sharif']=='') 
         $p_sharif        ='XXX';
     $p_birth              =$_POST['tugkun'];	//*
     $p_birthcomp     = 1;
     $p_nation            =$_POST['nation'];
     $p_sex                  =$_POST['jins'];
     $p_marital           =$_POST['oila'];
     
  // 2-ch tab   
  $p_countryb = $_POST["strana"];
  $p_regionb = $_POST["oblast"];
  $p_districtb = $_POST["rayon1"];
  $p_birthb    =''; 
  $p_birthe    =$_POST["tugjoy_lat"];
  
 //3-chi tab 
 $p_doctypeb  = $_POST["doc_tip"];
 $p_seryb        = strtoupper($_POST["seriya"]);
 $p_numberb  = $_POST["nomer"];
 $p_datebegb  = $_POST["vidanDay"];            //
 $p_dateendb  = 'NULL';
 $p_issuedbyb  = $_POST["kem"];
 $p_cause         = $_POST["sabab"];
 
 //4-ch tab
 $p_country      = 182;
 $p_region        =$_POST["oblast2"];
 $p_district       =$_POST["rayon2"];
 $p_place          =$_POST["selectPlaces"];
 $p_street         =$_POST["selectStreet"];
 $p_house         =$_POST["home"];
 $p_korpus        =$_POST["korpus"];
 $p_flat              =$_POST["flat"];
 $p_address      =$_POST["adress_uz"];
 
 //5-ch tab
 $p_countryout          =$_POST["for_strana"];
 $p_reasonb               =$_POST["maqsad"];
 $p_dateenter            =$_POST["kelDay"];          //*
 $p_work                   =$_POST["job"];
 $p_addressout         =$_POST["vr_adress"];
 $p_dateout              =$_POST["vozvratDay"];    //*
 

     $str=$_POST['elchixona'];
      $n=strPos($str,'/');
     $p_division=Substr($str,0,$n); 
     $id_elchixona=Substr($str,$n+1);
     $embassy=stName('sp_division',$p_division);
 //Qo`shimcha
 $p_reasonfull         ='';
 $p_certiftype         = 2;
 $p_photo              = $upload;
 $p_datesent         = date('Y-m-d');
$p_status              =0;

 /////////

  $p_dateenter       = ToMysqlDate($p_dateenter);
  $p_dateout       = ToMysqlDate($p_dateout);
   if($p_datebegb != '')
   $p_dateb   = ToMysqlDate($p_datebegb);
   else
    $p_dateb   = ' NULL';

   $lSQL='INSERT  INTO anketa_new (p_guid, p_division,                       
                                                              p_surnamec,           p_namec,                p_patronymc,
                                                              p_surnamel,            p_namel,                 p_patronyml,                   p_birth,
                                                              p_birthcomp,          p_sex,                      p_nation,                          p_countryb,                     
                                                              p_regionb,              p_districtb,              p_birthb,                           p_birthe,                 
                                                              p_doctypeb,           p_seryb,                   p_numberb,                      p_datebegb,                     
                                                              p_issuedbyb,          p_country,               p_region,                           p_district,                         
                                                              p_place,                  p_street,                  p_certiftype,                      p_house,   
                                                              p_korpus,                p_flat,                      p_address,                         p_marital,                       
                                                              p_countryout,         p_addressout,         p_cause,                            p_reasonb,
                                                             p_reasonfull,           p_dateout ,              p_dateenter,                      p_photo,
                                                             p_work,                   p_datesent,              p_status )';

   $lSQL=$lSQL." values ('".$p_guid."',  '".$p_division."',          
                                         '".$p_surnamec."',        '".$p_namec."',             '".$p_patronymc."',
                                         '".$p_surnamel."',         '".$p_namel."',               '".$p_patronyml."',      '".$p_birth."',
                                        '".$p_birthcomp."',         '".$p_sex."',                   '".$p_nation."',              '".$p_countryb."',        
                                        '".$p_regionb."',";
        if($p_dictrictb == 0)  
             $lSQL=$lSQL.'NULL,';
             else
                 $lSQL=$lSQL."'".$p_dictrictb."',";
                $lSQL=$lSQL."'".$p_birthb."',               '".$p_birthe."',              '".$p_doctypeb."',
                                        '".$p_seryb."',          '".$p_numberb."',               '".$p_dateb."',";

             $lSQL=$lSQL."'".$p_issuedbyb."',    '".$p_country."',             '".$p_region."',             '".$p_district."',";
             
           if($p_place == 0)
             $lSQL=$lSQL.'NULL,';
             else
                 $lSQL=$lSQL."'".$p_place."',";  
            if($p_street == 0)
             $lSQL=$lSQL.'NULL,';
             else
                 $lSQL=$lSQL."'".$p_street."',";         
                 $lSQL=$lSQL."'".$p_certiftype."',          '".$p_house."',                 '".$p_korpus."',
                                         '".$p_flat."',                    '".$p_address."',              '".$p_marital."',                     
                                         '".$p_countryout."',       '".$p_addressout."',        '".$p_cause."',                '".$p_reasonb."',              
                                          '".$p_reasonfull."',        '".$p_dateout."',             '".$p_dateenter."',          '".$p_photo."',            
                                         '".$p_work."',                  '".$p_datesent."',            '".$p_status."')";
                           
   $sql = mysql_query($lSQL);
 if($sql!=1)
 { print_r("-3");
   exit;}
                                        
 //mysql_query("LOCK TABLES anketa WRITE");
  //$result=mysql_query("SELECT LAST_INSERT_ID() AS LID");
  //   while($record = mysql_fetch_array($result))
 //      $res=$record['LID'];
//	      mysql_query("UNLOCK TABLES");
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
// 
  $pdf = new PDF("p", "pt", "A4");
  $pdf->SetAuthor("MFA UZ");
  $pdf->SetTitle(" ");
  $pdf->AddFont("Verdana");
  $pdf->SetFont("Verdana", "", 10);
  // 
  $pdf->setSourceFile('../SERT/Anketa_rus.pdf');
  $tplidx = $pdf->ImportPage(1);
 //
  $pdf->AddPage();
  $pdf->useTemplate($tplidx);
  $pdf->BarCode($guid, "C128B", 42, 10, 450, 80, 0.5, 0.5, 1, 5, "", "PNG");
if ($p!='')
 $pdf->Image($p, 467, 28, 102, 103);
 //	Image ($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array())
  $pdf->SetFont("Verdana", "", 10);
 $embassy=iconv("UTF-8","CP1251",$embassy);
  $embassy=wordwrap($embassy,300,"\n");
    $pdf->SetXY(42,50);
    $pdf-> MultiCell(300,10,$embassy);
	
  $fio=$p_surnamel.'  '.$p_namel;
  $pdf->SetFont("Verdana", "", 10);
  IF ($p_patronyml != 'XXX')
     $fio = $fio.'  '.$p_patronyml;

 	$fio=wordwrap($fio,200,"\n");
	$pdf->SetXY(342,213);
	$pdf-> MultiCell(222,8,$fio);
	
 $Kun=wordwrap($p_birth,200,"\n");
    	 $pdf->SetXY(342,238);
	 $pdf-> MultiCell(222,8,$Kun); 
	 
	if($p_birthe != '')
	$tugjoy = $p_birthe;
	else
	{
	$tugjoy = iconv("UTF-8","CP1251",trim(stName('sp_country',$p_countryb))).',';
	$tugjoy = $tugjoy. iconv("UTF-8","CP1251", trim(stName('sp_region',$p_regionb)));
	}
 $tugjoy=wordwrap($tugjoy,200,"\n");
	 $pdf->SetXY(342,256);
	 $pdf-> MultiCell(222,8,$tugjoy);
	 
 $millat=stName('sp_nation',$p_nation);	 
 $millat=wordwrap($millat,200,"\n");
	 $pdf->SetXY(342,275);
	 $pdf-> MultiCell(222,8,$millat);	 
	 
      $pdf->SetFont("Verdana", "", 9);
$p_address=wordwrap($p_address,200,"\n");
	 $pdf->SetXY(342,287);
	 $pdf-> MultiCell(222,8, iconv("UTF-8","CP1251",$p_address));	 

    $pasport=$p_seryb." ".$p_numberb.' '.$p_datebegb.", ".$p_issuedbyb;
     $pasport=wordwrap($pasport,200,"\n");
	 $pdf->SetXY(342,322);
	 $pdf-> MultiCell(222,8,$pasport);	

$sabab =  iconv("UTF-8","CP1251", trim(stName('sp_sertcause',$p_cause)));	  
$sabab=wordwrap($sabab,200,"\n");
	 $pdf->SetXY(342,355);
	 $pdf-> MultiCell(222,8,$sabab);	 
	 
    $kelDay=$_POST['kelDay'];
$maqsad  = iconv("UTF-8","CP1251", trim(stName('sp_reasonb',$p_reasonb)));   
     $maqsad=$maqsad.',  '.$kelDay;
     $maqsad=wordwrap($maqsad,200,"\n");
	 $pdf->SetXY(342,428);
	 $pdf-> MultiCell(222,8,$maqsad);	
	 
	  $pdf->SetFont("Verdana", "", 7);
$strana  = iconv("UTF-8","CP1251", trim(stName('sp_country',$p_countryout)));   	  
      $strana=$strana.", ".$p_addressout;
     $strana=wordwrap($strana,200,"\n");
	 $pdf->SetXY(342,534);
	 $pdf-> MultiCell(222,8,$strana);
	 
     $vozvratDay=$_POST['vozvratDay'];
     $vozvratDay=wordwrap($vozvratDay,200,"\n");
	 $pdf->SetXY(342,568);
	 $pdf-> MultiCell(222,8,$vozvratDay);	 
//
 $qar                     =$_POST["qar"];
 $mesto_r            =$_POST["mesto_r"];
 $mesto_rab        =$_POST["mesto_rab"];
 $data_r               =$_POST["data_r"];
 $adrespro           =$_POST["adrespro"];
 $dol_tel              =$_POST["dol_tel"];
 
 $qarindosh = '';
 if($qar !='')   $qarindosh .= $qar.',';
 if($mesto_r !='')   $qarindosh .= $mesto_r.',';
 if($mesto_rab !='')   $qarindosh .= $mesto_rab.',';
 if($data_r !='')   $qarindosh .= $data_r.',';
 if($adrespro !='')   $qarindosh .= $adrespro.',';
  if($dol_tel !='')   $qarindosh .= $dol_tel;
 
   $qarindosh = wordwrap($qarindosh,200,"\n");
	  $pdf->SetXY(342,588);
	$pdf-> MultiCell(222,8,$qarindosh); 
//

  $Sfile=$guid.".pdf";
  $SPathfile="../downloads/".$Sfile;
 $temp_file= $SPathfile;

 $pdf->Output($SPathfile,"F");
 $pdf->closeParsers();
 print_r( "/ru/downloads/".$Sfile);

  	//unlink($SPathfile);
exit;
///
function ToMysqlDate($nParm)
{
    $day=substr($nParm,0,2);
    $n=strPos($nParm,'.');
    $month=substr($nParm,$n+1,2);
    $year=substr($nParm,$n+4,4);
	$mysqldate = $year.'-'.$month.'-'.$day;
	return $mysqldate;
	}
function stName($ntable,$val)
{
	$lSql="SELECT sp_name04 FROM ".$ntable." WHERE sp_id=".$val;
	$select = mysql_query($lSql);
	if ($select){
	list($strName) = mysql_fetch_row($select);
	}
	else
	{
		$strName=$lSql;
	}
	return $strName;
	}
?>
</body>
</html>
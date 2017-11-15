<?php
session_start();

$host="localhost";
$user="master";
$pass="master001";
$base="consul";
$bd = mysql_connect($host, $user, $pass) or die("Error:".mysql_error());
mysql_select_db($base, $bd) or die("Can't select DB ".mysql_error());
 mysql_query("SET NAMES 'UTF8'");
 
//error_reporting('E_ALL & ~E_NOTICE');

 require('pdfb/pdfb.php');
function guid(){
    if (function_exists('com_create_guid')){
        $guid=com_create_guid();
        $guid=str_replace("-","",$guid);
		$guid=str_replace("{","",$guid);
		$guid=str_replace("}","",$guid);
		return $guid;
    }else{
        mt_srand((double)microtime()*10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// ""
                substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12);
        return $charid;
    }
}

  $crypt_text = $_POST['result'];
  if($crypt_text=='') exit;
  $guid =  substr($crypt_text,0,32);
  // $crypt_text = base64_decode( substr($crypt_text,32));
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
   $key = $row['name'];    

mysql_query("delete from usl_key where id='".$guid."'");

if($key != $keyi){
   print_r('-2');
        exit;
           }
//
 $upload_Photo = null;
$upload_Pass = null;
$upload_Mal = null;
      $guid         =guid();
$uploaddir = $_SERVER['DOCUMENT_ROOT'].'./uz/upload/';
/*foreach ($_FILES["fileToUpload"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["fileToUpload"]["tmp_name"][$key];
        if($key == 0)
        {
         $upload_Photo =$uploaddir.$guid.'-Photo-'.basename($_FILES["fileToUpload"]["name"][$key]);
         move_uploaded_file($tmp_name, $upload_Photo);
         }
         
        if($key == 1)
         {
         	 $upload_Pass =$uploaddir.$guid.'-Pass-'.basename($_FILES["fileToUpload"]["name"][$key]);
         	move_uploaded_file($tmp_name, $upload_Pass);
         	 }
         	 
          if($key == 2)
          {
          $upload_Mal =$uploaddir.$guid.'-Sp-'.basename($_FILES["fileToUpload"]["name"][$key]);
        move_uploaded_file($tmp_name, $upload_Mal);          		
	}
    }
}*/
//
 /*
else
{
   switch ($_FILES['fileToUpload']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }
    }*/
   $tmp_name = $_FILES["fileToUpload1"]["tmp_name"];
         $upload_Photo =$uploaddir.$guid.'-Photo-'.basename($_FILES["fileToUpload1"]["name"]);
         move_uploaded_file($tmp_name, $upload_Photo);
$tmp_name = $_FILES["fileToUpload2"]["tmp_name"];
         $upload_Pass =$uploaddir.$guid.'-Pass-'.basename($_FILES["fileToUpload2"]["name"]);
         move_uploaded_file($tmp_name, $upload_Pass);
$tmp_name = $_FILES["fileToUpload3"]["tmp_name"];
         $upload_Mal =$uploaddir.$guid.'-Sp-'.basename($_FILES["fileToUpload3"]["name"]);
         move_uploaded_file($tmp_name, $upload_Mal);
         
         
  $p=$upload_Photo;

 $f=fopen($p,"rb");
  $upload=fread($f,filesize($p));
   fclose($f);
   $upload=addslashes($upload);  
 //
      $guid =guid();

// 1-ch tab

      $surname_latin    =strtoupper($_POST['fam']);
     $name_latin         =strtoupper($_POST['ism']);
     $patronym_latin  =strtoupper($_POST['sharif']);
     if ($_POST['famk']!='')  
     $surname_cyrillic  =mb_strtoupper($_POST['famk'],"UTF-8");
      if ($_POST['ismk']!='') 
      $name_cyrillic       =mb_strtoupper($_POST['ismk'],"UTF-8");
     if ($_POST['sharifk']!='')  
     $patronym_cyrillic  =mb_strtoupper($_POST['sharifk'],"UTF-8");
    if ($_POST['sharif']=='') 
         $patronym_latin        ='XXX';
     $birth_date              =$_POST['tugkun'];	//*

     $nationality_id                   =$_POST['nation'];
     $sex_id                                 =$_POST['jins'];
     $marital_status_id            =$_POST['oila'];

  // 2-ch tab   

 $birth_country_id = $_POST["strana"];
  $birth_region_id = $_POST["oblast"];
  $birth_district_id = $_POST["rayon1"];
    
 //3-chi tab 
 $document_type_id  = $_POST["doc_tip"];
 $doc_seria        = strtoupper($_POST["seriya"]);
 $doc_number  = $_POST["nomer"];
 $date_begin_document  = $_POST["vidanDay"];            //
 $date_end_document  = $_POST["muddatDay"];
 $doc_div_id  = $_POST["doc_div"];
 $document_div_place         = $_POST["kem"];
 
 //4-ch tab
 $living_country_id      = 182;
 $living_region_id        =$_POST["oblast2"];
 $living_district_id       =$_POST["rayon2"];
 $liviing_place_id          =$_POST["selectPlaces"];
 $living_street_id         =$_POST["selectStreet"];
 $living_house         =$_POST["home"];
 $living_block        =$_POST["korpus"];
 $living_flat              =$_POST["flat"];
 $living_place_latin      ="Uzbekistan";
 
 //5-ch tab
 $living_foreign_country_id  = $_POST["for_strana"]; 
 $living_foreign_place          =$_POST["vr_adress"];
 $foundation_cons_acc       =$_POST["asos"];
 $arrival_date                        =$_POST["kelDay"];          //*
 $work_place                          =$_POST["job"];
 $living_uzb_place                =$_POST["adress_uz"];
 
 //Qo`shimcha
     $str=$_POST['elchixona'];
    //  $n=strPos($str,'/');
     $division_id= $str; //Substr($str,0,$n); 
//     $id_elchixona=Substr($str,$n+1);
   $embassy=stName('sp_division',$division_id);

 $photo              = $upload;
 $creation_date         = date('Y-m-d');
$status              =0;
$consular_account_type =1;
 /////////


  $arrival_date       = ToMysqlDate($arrival_date);
  $date_begin_document       = ToMysqlDate($date_begin_document);
   $date_end_document       = ToMysqlDate($date_end_document);
   $birth_date  = ToMysqlDate($birth_date);


   $lSQL= 'INSERT  INTO kus ( id, division_id,  surname_cyrillic,   name_cyrillic,   patronym_cyrillic,    surname_latin,  name_latin, 
                                                    patronym_latin,  birth_date, photo,  sex_id,   nationality_id,   marital_status_id,   birth_country_id,
                                                    birth_region_id,   birth_district_id,  doc_seria,  document_type_id, doc_number,  date_begin_document,
                                                    date_end_document ,  document_div_id,  document_div_place,  living_country_id, living_region_id,
                                                    living_district_id,  living_place_id, living_street_id, living_block, living_house, living_flat, living_place_latin,
                                                    living_foreign_country_id, living_foreign_place, consular_account_type, begin_date, arrival_date, work_place, creation_date,
                                                    living_uzb_place,  send_status, foundation_cons_acc, status )';

   $lSQL=$lSQL." values ('".$guid."',  '".$division_id."',  '".$surname_cyrillic."', 
   '".$name_cyrillic."',  '".$patronym_cyrillic."',
   '".$surname_latin."',   '".$name_latin."',  '".$patronym_latin."',
   '".$birth_date."', '".$photo."', '".$sex_id."', '".$nationality_id."',";
                                              
       if($marital_status_id == 0)     $lSQL=$lSQL.'NULL,';
             else                       $lSQL=$lSQL."'".$marital_status_id."',";       
              $lSQL=$lSQL."'".$birth_country_id."',   '".$birth_region_id."',";                                
                                               
        if($birth_district_id == 0)     $lSQL=$lSQL.'NULL,';
             else                       $lSQL=$lSQL."'".$birth_district_id."',";
                 
       $lSQL=$lSQL."'".$doc_seria."',   '".$document_type_id."', '".$doc_number."', 
                  	   '".$date_begin_document."',    '".$date_end_document."', ";
          
        if($doc_div_id == 0)            $lSQL=$lSQL.'NULL,';
             else                       $lSQL=$lSQL."'".$doc_div_id."',";      
                 
       $lSQL=$lSQL."'".$document_div_place."', '".$living_country_id."', 
	   '".$living_region_id."', '".$living_district_id."', ";
                  
        if($living_place_id == 0)        $lSQL=$lSQL.'NULL,';
             else                        $lSQL=$lSQL."'".$living_place_id."',";  
        if($living_street_id == 0)       $lSQL=$lSQL.'NULL,';
             else                        $lSQL=$lSQL."'".$living_street_id."',";         
                 
              $lSQL=$lSQL."'".$living_block."',   '".$living_house."', '".$living_flat."', 
			  '".$living_place_latin."', ";
              $lSQL=$lSQL."'".$living_foreign_country_id."',   '".$living_foreign_place."',
			  '".$consular_account_type."', '".$arrival_date."', '".$arrival_date."', ";
              $lSQL=$lSQL."'".$work_place."',  '".$creation_date."', '".$living_uzb_place."', 
			  '".$send_status."', '".$foundation_cons_acc."', 
              '".$status."' )";
  
   $sql = mysql_query($lSQL);
 if($sql!=1)
 {
   unlink($upload_Photo);
   unlink($upload_Pass);
   if($upload_Mal != null)
       unlink($upload_Mal);	  
 print_r("-3");
   exit;
   }
   
     $f=fopen($upload_Pass,"rb");
  $upload=fread($f,filesize($upload_Pass));
   fclose($f);
   $uploadPass=addslashes($upload);  
   
   if($upload_Mal != null)
   {
   $f=fopen($upload_Mal,"rb");
  $upload1=fread($f,filesize($upload_Mal));
   fclose($f);
   $uploadMal=addslashes($upload1);  
   }
   
   $lSQL = 'INSERT  INTO kus_blob ( id,copy_pass,copy_mal)';
     $lSQL =$lSQL." values ('".$guid."','".$uploadPass."',";
     if($upload_Mal != null)
         $lSQL =$lSQL."'".$uploadMal."'";
         else
              $lSQL=$lSQL.'NULL';
         $lSQL =$lSQL.")";
          mysql_query($lSQL);
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

  $pdf->setSourceFile('vreg_kuuz.pdf');
  $tplidx = $pdf->ImportPage(1);

 //
  $pdf->AddPage();
  $pdf->useTemplate($tplidx,0, 0, 0, 0, true);
  $pdf->BarCode($guid,  "C128B", 120, 790, 820, 60, 0.5, 0.5, 2, 5, "", "PNG");

if ($p!='')
 $pdf->Image($upload_Photo,480, 30, 90, 110);

  $pdf->SetFont("Verdana", "", 10);
  $embassy=iconv("UTF-8","CP1251",$embassy);
  $embassy=wordwrap($embassy,300,"\n");
    $pdf->SetXY(70, 40);
    $pdf-> MultiCell(300,12,$embassy);

  $fio=$surname_latin.'  '.$name_latin;
  $pdf->SetFont("Verdana", "", 10);
  $fio = $fio.'  '.$patronym_latin;

 	$fio=wordwrap($fio,200,"\n");
	$pdf->SetXY(340,170);
	$pdf-> MultiCell(222,10,$fio);
	
 $Kun=wordwrap($_POST['tugkun'],200,"\n");
    	 $pdf->SetXY(340,232);
	 $pdf-> MultiCell(222,8,$Kun); 
	 
	$tugjoy = iconv("UTF-8","CP1251",trim(stName('sp_country',$birth_country_id))).',';
	$tugjoy = $tugjoy. iconv("UTF-8","CP1251", trim(stName('sp_region',$birth_region_id)));

  $tugjoy=wordwrap($tugjoy,200,"\n");
	 $pdf->SetXY(340,250);
	 $pdf-> MultiCell(222,8,$tugjoy);
	 
 $millat=stName('sp_nation',$nationality_id);	 
 $millat=wordwrap($millat,200,"\n");
	 $pdf->SetXY(340,265);
	 $pdf-> MultiCell(222,8,$millat);	 

$kel_maqsad = $_POST["kelDay"].", ".$_POST["asos"]; 
$kel_maqsad = wordwrap($kel_maqsad ,300,"\n");
         $pdf->SetXY(340,360);
	 $pdf-> MultiCell(220,12, $kel_maqsad);	
	 
$living_uzb_place=wordwrap($living_uzb_place,300,"\n");
	 $pdf->SetXY(340,430);
	 $pdf-> MultiCell(200,12, iconv("UTF-8","CP1251",$living_uzb_place));	 

$living_foreign_place=wordwrap($living_foreign_place,300,"\n");
	 $pdf->SetXY(340,490);
	 $pdf-> MultiCell(200,12, iconv("UTF-8","CP1251",$living_foreign_place));
	 
$work_place=wordwrap($work_place,300,"\n");
	 $pdf->SetXY(340,550);
	 $pdf-> MultiCell(200,12, iconv("UTF-8","CP1251",$work_place));	 
	 
   
$passport = $doc_seria." ".$doc_number.', '.$_POST["vidanDay"];
if($doc_div_id == 0)
  $passport = $passport.'  '.$document_div_place;
  else
    $passport = $passport.'  '.iconv("UTF-8","CP1251",trim(stName('sp_division',$doc_div_id)));	
  
  $passport=wordwrap($passport,300,"\n");
	 $pdf->SetXY(340,620);
	 $pdf-> MultiCell(200,12, $passport);	 
 
 $Sfile=$guid.".pdf";
  $SPathfile="../downloads/".$Sfile;
 $temp_file= $SPathfile;

 $pdf->Output($SPathfile,"F");
 $pdf->closeParsers();
print_r( "/uz/uz/downloads/".$Sfile);	 
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
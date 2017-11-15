<?php
include('db.php');
 require('pdfb/pdfb.php');
   $p='upload/'.basename($_POST['fileup']);
  $f=fopen($p,"rb");
  $upload=fread($f,filesize($p));
   fclose($f);
   $upload=addslashes($upload);  //Защита переменных от опасных символов ("прослешька переменных")
 //
     $ch_fuqaro='';
     $almashish='';
    $bar_code='';
     $data_reg=date('Y-m-d');
  $sql = mysql_query("INSERT  INTO kons_uchet (barcode,fio,ism,sharif,oila,tugkun,tugjoy,millat,photo,bilim,qachon,kasb,
                                               uz_chiqish,sabab,uz_adress,uz_tel,chet_adress,chet_tel,ish_lavozim,
                                               uz_qar_fio1,uz_qar_adr1,uz_qar_fio2,uz_qar_adr2,
                                               chet_qar_fio1,chet_qar_adr1,chet_qar_fio2,chet_qar_adr2,
                                               p_nomer,p_seriya,p_kogda,p_kim_tom,p_muddat,
                                               p_shahs,chet_fuqaro,id_elchixona,p_almashish,data_zay)

          values ('".$bar_code."',
                  '".$_POST['fam']."',
                  '".$_POST['ism']."',
                  '".$_POST['sharif']."',
                  '".$_POST['o_xolat']."',
                  '".$_POST['tugkun']."',
                  '".$_POST['tugjoy']."',
                  '".$_POST['millat']."',
                  '".$upload."',
                  '".$_POST['obrazov']."',
                  '".$_POST['kogda']."',
                  '".$_POST['spes']."',
                  '".$_POST['kogdaV']."',
                  '".$_POST['maqsad']."',
                  '".$_POST['adress']."',
                  '".$_POST['phone']."',
                  '".$_POST['vr_adress']."',
                  '".$_POST['phone1']."',
                  '".$_POST['job']."',
                  '".$_POST['qar_fio1']."',
                   '".$_POST['qar_adr1']."',
                   '".$_POST['qar_fio2']."',
                   '".$_POST['qar_adr2']."',
                  '".$_POST['ch_qar_fio1']."',
                  '".$_POST['ch_qar_adr1']."',
                  '".$_POST['ch_qar_fio2']."',
                  '".$_POST['ch_qar_adr2']."',
                  '".$_POST['nomer']."',
                  '".$_POST['seriya']."',
                  '".$_POST['vidan']."',
                  '".$_POST['kem']."',
                  '".$_POST['srok']."',
                  '".$_POST['lisa']."',
                  '".$ch_fuqaro."',
                  '".$_POST['elchixona']."',
                  '".$almashish."',
                  '".$data_reg."');");

if($sql)
{
 // Успешно записан
    mysql_query("LOCK TABLES kons_uchet WRITE");
  $result=mysql_query("SELECT LAST_INSERT_ID() AS LID");
     while($record = mysql_fetch_array($result))
       $res=$record['LID'];
	      mysql_query("UNLOCK TABLES");
      $today = date("Ymd"); //20100916
      $today=substr($today,2);
      $bar_code=$res.$today;
    mysql_query ("UPDATE kons_uchet SET barcode = '".$bar_code."' WHERE id='".$res."';");
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
  $pdf->setSourceFile("Reg_KU.pdf");
  $tplidx = $pdf->ImportPage(1);
    // Добавить новую страницу используя шаблон
  $pdf->AddPage();
  $pdf->useTemplate($tplidx);
  $pdf->BarCode($bar_code, "C128B", 250, 10, 300, 80, 0.5, 0.5, 2, 5, "", "PNG");
  $pdf->Image($p, 442, 40, 93, 113);
     $pdf->SetFont("Times", "", 13);

       $aa= mysql_query("SELECT nomi_rus FROM l_elchixona where id='".$_POST['elchixona']."'");
       if($aa)
      {
        $el = mysql_fetch_array($aa);
        $pdf->Text(45, 57, $el['nomi_rus']);
      }
  $pdf->Text(290, 192, $_POST['fam']);
  $pdf->Text(290, 207, $_POST['ism'].' '.$_POST['sharif']);
       $yil=substr($_POST['tugkun'],0,4);
     $Oy=substr($_POST['tugkun'],5,2);
     $Kun=substr($_POST['tugkun'],8,2);
      $pdf->Text(290, 240, $Kun."/".$Oy."/".$yil."г.");
      $pdf->Text(290, 255, $_POST['tugjoy']);
      $pdf->Text(290, 290, $_POST['millat']);
      $pdf->Text(290, 305, $_POST['o_xolat']);
      $pdf->Text(290, 327, $_POST['obrazov'].",");
      $pdf->Text(290, 340, $_POST['spes'].",");
         $yil=substr($_POST['kogda'],0,4);
     $Oy=substr($_POST['kogda'],5,2);
     $Kun=substr($_POST['kogda'],8,2);
      $pdf->Text(290, 358, $Kun."/".$Oy."/".$yil."г.");
       $yil=substr($_POST['kogdaV'],0,4);
     $Oy=substr($_POST['kogdaV'],5,2);
     $Kun=substr($_POST['kogdaV'],8,2);
      $pdf->Text(290, 373, $Kun."/".$Oy."/".$yil."г.");
      $pdf->Text(290, 390, $_POST['maqsad']);
       $pdf->Text(290, 438, $_POST['adress']);
      $pdf->Text(290, 483, $_POST['job']);
//
      $pdf->Text(290, 570, $_POST['qar_fio1']);
      $n=strlen($_POST['qar_adr1']);
      $key=0;
     if($n > 36)
        {  $pdf->Text(290, 585, substr($_POST['qar_adr1'],0,35));
           $pdf->Text(290, 600, substr($_POST['qar_adr1'],36));
           $key=1;
           }
       else
        $pdf->Text(290, 585, $_POST['qar_adr1']);
       if($key==0)
          $pdf->Text(290, 600, $_POST['qar_fio2']);
        else
          $pdf->Text(290, 615, $_POST['qar_fio2']);
          $n=strlen($_POST['qar_adr2']);
       if($key==0)
            $posy=615;
            else
              $posy=630;

         if($n>36)
             {  $pdf->Text(290, $posy, substr($_POST['qar_adr2'],0,35));
                $pdf->Text(290, $posy+15, substr($_POST['qar_adr2'],36));
              }
             else
                $pdf->Text(290, $posy, $_POST['qar_adr2']);
  //
     $pdf->Text(290, 665, $_POST['ch_qar_fio1']);
         $n=strlen($_POST['ch_qar_adr1']);
      $key=0;
     if($n > 36)
     {
         $pdf->Text(290, 680, substr($_POST['ch_qar_adr1'],0,35));
         $pdf->Text(290, 695, substr($_POST['ch_qar_adr1'],36));
         $key=1;
     }
     else
        $pdf->Text(290, 680, $_POST['ch_qar_adr1']);
       if($key==0)
          $pdf->Text(290, 695, $_POST['ch_qar_fio2']);
        else
         $pdf->Text(290, 710, $_POST['ch_qar_fio2']);
          $n=strlen($_POST['ch_qar_adr2']);
         if($key==0)
          $posy=710;
            else
              $posy=725;
         if($n>36)
            {  $pdf->Text(290, $posy, substr($_POST['ch_qar_adr2'],0,35));
               $pdf->Text(290, $posy+15, substr($_POST['ch_qar_adr2'],36));            	}
          else
             $pdf->Text(290, $posy, $_POST['ch_qar_adr2']);
 //
  $tplidx = $pdf->ImportPage(2);
  $pdf->AddPage();
  $pdf->useTemplate($tplidx);
         $yil=substr($_POST['vidan'],0,4);
     $Oy=substr($_POST['vidan'],5,2);
     $Kun=substr($_POST['vidan'],8,2);
       $pdf->Text(290, 50, $_POST['seriya'].'-'.$_POST['nomer'].'   '.$Kun."/".$Oy."/".$yil."г.");
         $yil=substr($_POST['srok'],0,4);
     $Oy=substr($_POST['srok'],5,2);
     $Kun=substr($_POST['srok'],8,2);
       $pdf->Text(290, 67, "Срок до:".$Kun."/".$Oy."/".$yil."г.");
      $pdf->Text(290, 82, $_POST['kem']);
        $pdf->Text(290, 160, $_POST['lisa']);
  $pdf->Text(290, 285, $_POST['vr_adress']);
    $pdf->Text(290, 380, "Контактный телефон:".$_POST['phone1']);

  $pdf->Output("downloads/Reg_KU.pdf","F");
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
<?php
session_start();

 require('pdfb/pdfb.php');

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
    {     if($key==0)
     $this->SetFont("Verdana", "", 8);
     else
      $this->SetFont("Verdana", "", 8);
     $this->Text($x,$y,$s);
    }
  }

// Создание PDF объекта и установка свойств

  $pdf = new PDF("p", "mm", "A4");
   $pdf->AddPage();
   $pdf->SetAuthor("MFA UZ");
   $pdf->AddFont("Verdana");
   $pdf->AddFont("Verdanab");
  $pdf->SetFont("Verdanab", "", 11);

      $title="Министерство иностранных дел Республики Узбекистан";
      $title1="Визовая анкета";
    $pdf->Cell(190,10,$title,0,2,'C');
    $pdf->Cell(190,5,$title1,0,1,'C');

      $pdf->SetFontSize(8);
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


   $pdf->Cell(6,10,"",'1',0,'L');
   $pdf->Text1("№",11,30,1);
   $pdf->Cell(30,10,"",'1',0,'L');
//   $pdf->Text1("Kamolov",17,42,1);
   $pdf->Text1($_value['fam'],17,42,1);
  // $pdf->Text1("Ubaydulla",17,45,1);
   $pdf->Text1($_value['ism'],17,45,1);
   $pdf->Cell(25,10,"",'1',0,'L');
//   $pdf->Text1("06.06.1978",48,42,1);
   $pdf->Text1("$tugkun",48,42,1);
//   $pdf->Text1("Тошкент",48,45,1);
   $tugjoy=iconv("UTF-8","CP1251",$_value['tugjoy']);
   $pdf->Text1($tugjoy,48,42,1);
  $pdf->Cell(27,10,"",'1',0,'L');
  // $pdf->Text1("Узбекистан",73,43,1);
  $fuqaro=iconv("UTF-8","CP1251",$fuqaro);
   $pdf->Text1($fuqaro,73,43,1);
   $pdf->Cell(26,10,"",'1',0,'L');
//   $pdf->Text1("123456789",99,43,1);
   $nomer=iconv("UTF-8","CP1251",$_value['nomer']);
   $pdf->Text1($nomer,99,43,1);
   $pdf->Cell(8,10,"",'1',0,'L');
//   $pdf->Text1("Муж",125,43,1);
   $pol=iconv("UTF-8","CP1251",$_value['pol']);
   $pdf->Text1($pol,125,43,1);
   $pdf->Cell(38,10,"",'1',0,'L');
//   $pdf->Text1("Бизнесмен",133,42,1);
 //  $pdf->Text1("Бизнесмен",133,45,1);
   $job2=iconv("UTF-8","CP1251",$_value['job2']);
   $pdf->Text1($job2,133,43,1);
   $pdf->Cell(32,10,"",'1',1,'L');
//   $pdf->Text1("Штрих код",178,30,1);
//   $pdf->BarCode($bar_code, "C128B", 124, 253, 200, 46, 0.45, 0.5, 2, 5, "", "PNG");



   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text1("Приглашающая сторона",12,52,1);
   $taklifchi=iconv("UTF-8","CP1251",$_value['taklifchi']);
   $pdf->Text1($taklifchi,12,54,1);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text1("Количество въездов",12,63,1);
   $kol_kir=iconv("UTF-8","CP1251",$kol_kir);
   $pdf->Text1($kol_kir,12,65,1);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text1("Планируемый срок пребывания",12,74,1);
   $pdf->Text1("$kirkun",12,76,0);
   $pdf->Text1("-",32,76,0);
   $pdf->Text1("$chiq_kun",35,76,1);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text1("Срок рассмотрения визовой заявки",12,85,1);
   $rass_kun=iconv("UTF-8","CP1251",$rass_kun);
   $pdf->Text1($rass_kun,12,87,0);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text1("Место получения визы",12,96,0);
   $elchixona=iconv("UTF-8","CP1251",$elchixona);
   $pdf->Text1($elchixona,12,98,0);
   $pdf->Cell(192,11,"",'1',1,'L');
   $pdf->Text1("Цель поездки",12,107,1);
   $maqsad=iconv("UTF-8","CP1251",$_value['maqsad']);
   $pdf->Text1($maqsad,12,109,0);


if ($p!='')    //Если есть рисунок
 $pdf->Image($p, 462, 85, 100, 120);

  $pdf->SetFont("Arial", "", 9);

 // echo "&nbsp;";
//  $pdf->Output("downloads/anketa.pdf","F");
$pdf->Output();

    $pdf->closeParsers();

?>


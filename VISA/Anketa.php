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
     $this->SetFont("Verdanab", "", 8);
     else
      $this->SetFont("Verdana", "", 8);
     $this->Text($x,$y,$s);
    }
  }

// Создание PDF объекта и установка свойств

  $pdf = new PDF("p", "mm", "A4");
   $pdf->AddPage();
        $pdf->SetMargins(15,15,15);
  $pdf->SetAuthor("MFA UZ");
   $pdf->AddFont("Verdana");
   $pdf->AddFont("Verdanab");
  $pdf->SetFont("Verdanab", "", 11);

      $title="Министерство иностранных дел Республики Узбекистан";
      $title1="Визовая анкета";
    $pdf->Cell(180,10,$title,0,2,'C');
    $pdf->Cell(180,5,$title1,0,1,'C');

      $pdf->SetFontSize(8);
    $pdf->Cell(90,5,"Дата заполнения:  "."2012-02-15",'T,L,B',0,'C');
    $pdf->Cell(90,5,"Срок истечения:  "."2012-05-15",'T,B,R',1,'C');
  //    $pdf->Cell(1);
   $pdf->SetFontSize(8);
   $pdf->Cell(70,15,"",'1',0,'L');
   $pdf->Text1("Фамилия",16,34,1);
   $pdf->Text1("Kamolov",16,39,0);
   $pdf->Cell(70,15,"",'1',0,'C');
   $pdf->Text1("Прежняя фамилия",86,34,1);
   $pdf->Cell(40,15,"",'L,T,R',1,'C');
   $pdf->Cell(70,15,"",'1',0,'C');
   $pdf->Text1("Имя",16,49,1);
   $pdf->Cell(70,15,"",'1',0,'C');
   $pdf->Text1("Прежнее имя",86,49,1);
   $pdf->Cell(40,15,"Место для Фото",'L,R',1,'C');
   $pdf->Cell(70,15,"",'1',0,'C');
   $pdf->Text1("Отчество",16,64,1);
   $pdf->Cell(70,15,"",'1',0,'C');
   $pdf->Text1("Прежнее отчество",86,64,1);
   $pdf->Cell(40,15,"",'L,B,R',1,'C');

   $pdf->Cell(30,15,"",'1',0,'L');
   $pdf->Text1("Дата рождения",16,79,1);
   $pdf->Cell(35,15,"",'1',0,'L');
   $pdf->Text1("Место рождения",46,79,1);
   $pdf->Text1("",46,84,0);
   $pdf->Cell(35,15,"",'1',0,'L');
   $pdf->Text1("Страна рождения",81,79,1);
   $pdf->Cell(40,15,"",'1',0,'L');
      $pdf->Text1("Гражданство",116,79,1);
   $pdf->Cell(40,15,"",'1',1,'L');
         $pdf->Text1("Прежнее гражданство",156,79,1);

   $pdf->Cell(30,15,"",'1',0,'L');
      $pdf->Text1("Тип паспорта",16,94,1);
   $pdf->Cell(35,15,"",'1',0,'L');
         $pdf->Text1("Номер паспорта",46,94,1);
   $pdf->Cell(35,15,"",'1',0,'L');
         $pdf->Text1("Дата выдачи паспорта",81,94,1);
   $pdf->Cell(40,15,"",'1',0,'L');
            $pdf->Text1("Кем выдан паспорт",116,94,1);
   $pdf->Cell(40,15,"",'1',1,'L');
            $pdf->Text1("Срок действия паспорта",156,94,1);


   $pdf->Cell(30,15,"",'1',0,'L');
        $pdf->Text1("Пол",16,109,1);
   $pdf->Cell(35,15,"",'1',0,'L');
           $pdf->Text1("Семейное положение",46,109,1);
   $pdf->Cell(65,15,"",'1',0,'L');
              $pdf->Text1("Фамилия, имя, отчество супруги/супруга",81,109,1);
   $pdf->Cell(50,15,"",'1',1,'L');
           $pdf->Text1("Планируемый срок пребывания",146,109,1);


   $pdf->Cell(35,15,"",'1',0,'L');
          $pdf->Text1("Количество въездов",16,124,1);
   $pdf->Cell(35,15,"",'1',0,'L');
             $pdf->Text1("Количество дней",51,124,1);
   $pdf->Cell(60,15,"",'1',0,'L');
             $pdf->Text1("Срок рассмотрения визовой заявки",86,124,1);
   $pdf->Cell(50,15,"",'1',1,'L');
             $pdf->Text1("Место получения визы",146,124,1);


   $pdf->Cell(180,11,"",'1',1,'L');
             $pdf->Text1("Цель поездки",16,139,1);
   $pdf->Cell(180,11,"",'1',1,'L');
                $pdf->Text1("Приглашающая сторона",16,149,1);
   $pdf->Cell(180,11,"",'1',1,'L');
                   $pdf->Text1("Род деятельности",16,160,1);
   $pdf->Cell(180,11,"",'1',1,'L');
                      $pdf->Text1("Место работы (учебы) и должность",16,171,1);
   $pdf->Cell(180,11,"",'1',1,'L');
                   $pdf->Text1("Адрес места работы (учебы)",16,182,1);
   $pdf->Cell(180,11,"",'1',1,'L');
                $pdf->Text1("Место постоянного проживания",16,193,1);
   $pdf->Cell(180,11,"",'1',1,'L');
                $pdf->Text1("Адрес проживания в Узбекистане",16,204,1);
   $pdf->Cell(180,11,"",'1',1,'L');
                $pdf->Text1("Предыдущие поездки в Узбекистан",16,215,1);
   $pdf->Cell(180,11,"",'1',1,'L');
             $pdf->Text1("Совместно следующие лица",16,226,1);
   $pdf->Cell(90,10,"",'1',0,'L');
                $pdf->Text1("Подпись заявителя  ______________",36,241,1);
   $pdf->Cell(90,10,"",'1',1,'L');
               $pdf->Text1("Дата (дд.мм.гггг): ______________",120,241,1);
   $pdf->Cell(180,8,"",'1',1,'L');
   $pdf->Text1("Примичание: Необходимо заполнить все пункты анкеты. Предоставление неверной информации может повлечь за",16,247,1);
   $pdf->Text1("собой отказ в выдаче визы или ее аннулирование",16,251,1);
   $pdf->Cell(120,4,"Для служебных заметок",'1',0,'L');
   $pdf->Cell(60,4,"",'L,T,R',1,'L');
    $pdf->SetFontSize(6);

   $pdf->Cell(30,9,"Qayd №",'1',0,'L');
   $pdf->Cell(30,9,"Blank №  ",'1',0,'L');
   $pdf->Cell(30,9,"Tasdiq №",'1',0,'L');
   $pdf->Cell(30,9,"Visa turi",'1',0,'L');
   $pdf->Cell(60,9,"",'L,R',1,'L');
   $pdf->Cell(30,9,"Berilgan sana",'1',0,'L');
   $pdf->Cell(30,9,"Muddati",'1',0,'L');
   $pdf->Cell(30,9,"Tushum",'1',0,'L');
   $pdf->Cell(30,9,"Xaqiqiy xarajat",'1',0,'L');
   $pdf->Cell(60,9,"",'L,B,R',1,'L');




   //   $pdf->Cell(180,2,"Keldi",1,1,'C');
    // $title="Визовая анкета";
   //
   // $pdf->Text(180,20,$title);
  //  $pdf->Cell(700,15,'',1,0,'C');
  //$pdf->Text(10,17,'2012-02-15');
  //$pdf->Text(200,17,'2012-05-15');
  //$pdf->SetFont("Verdana", "", 10);

 // $pdf->BarCode($bar_code, "C128B", 380, 715, 400, 120, 0.45, 0.5, 2, 5, "", "PNG");

if ($p!='')    //Если есть рисунок
 $pdf->Image($p, 462, 85, 100, 120);

  $pdf->SetFont("Arial", "", 9);

/* $pdf->Text(191, 74,$data_reg);
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
       $yil=$_value['birthYear'];
       $Oy=$_value['tugoy'];
       $Kun=$_value['tugkun'];
 $pdf->Text(48, 232, $Kun.".".$Oy.".".$yil);
 $pdf->Text(145, 232,$tugjoy);
 $pdf->Text(260, 232,$strana1);
 $pdf->Text(350, 232,$fuqaro);
 $pdf->Text(465, 232,$prejfuqaro);
           // $pdf->Text(280, 398,$strana).','.$pdf->Text(350, 398,$gorod);

//beshinchi qatorda
 $pdf->Text(48, 266,$tip);
 $pdf->Text(145, 266,$nomer);
       $yil=$_value['vidanYear'];
       $Oy=$_value['vidanMonth'];
       $Kun=$_value['vidan'];
 $pdf->Text(260, 266, $Kun.".".$Oy.".".$yil);
 $pdf->Text(350, 266,$kem);
       $yil=$_value['srokYear'];
       $Oy=$_value['srokMonth'];
       $Kun=$_value['srok'];
 $pdf->Text(465, 266, $Kun.".".$Oy.".".$yil);

//oltinchi qatorda
 $pdf->Text(48, 303,$pol);
 $pdf->Text(145, 303,$sem_pol);
 $pdf->Text(260, 303,$fiosup);
       $Kun=$_value['kirkun'];
       $yil=$_value['kirYear'];
       $Oy=$_value['kiroy'];
       $Kun=$_value['kirkun'];
 $pdf->Text(440, 303, $Kun.".".$Oy.".".$yil);
       $yil=$_value['chiq_Year'];
       $Oy=$_value['chiq_oy'];
       $Kun=$_value['chiq_kun'];
 $pdf->Text(500, 303, $Kun.".".$Oy.".".$yil);

//ettinchi qatorda
 $pdf->Text(48, 337,$kol_kir);
 $pdf->Text(145, 337, $_value['kun']);
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
  */
 // echo "&nbsp;";
//  $pdf->Output("downloads/anketa.pdf","F");
$pdf->Output();

    $pdf->closeParsers();

?>


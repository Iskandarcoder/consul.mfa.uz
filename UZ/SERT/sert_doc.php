<html>
<head>

<style>

  h3{
	text-align: center;
	 color: #1479dd;
	  text-shadow:1px 1px 1px #fff;
}
.sert_doc{
	font-family: 'Open Sans', sans-serif;
    color: #333;
}
.sert_doc  li{
    padding-top: 3px;
    margin-left: 20px;
    font-family: 'Open Sans', sans-serif;
    font-weight: bold;
  }
 .sert_doc .sp1{
 	color: darkred; 
	 font-family: 'Open Sans', sans-serif; 
    } 
 p#prim{
      color: #e00;
   }
    
#p1{
    padding: 10px;
    font-family: 'Open Sans', sans-serif;
    font-weight: bold;
    text-decoration: underline;
    }
    
    p strong{
    font-family: 'Open Sans', sans-serif;
    color: darkblue;
    font-style: normal;
	    }
    
    .sert_doc span{
        color:darkblue;
                 }
/*
Убираем input, оформляем спаны
Итак, теперь нам надо скрыть со страницы обычные чекбоксы.
Теперь нужно как-то оформить новые поля. Оформлять мы будем элементы span, так как они находятся внутри label.
Этим селектором мы выбрали все спаны в лейблах, которые находятся в коде сразу за inputами с типом checkbox. Таким образом, оформление применится к нашим спанам. Мы даем им блочно-строчный тип, определенную ширину и высоту, отступ справа, чтобы текст не прилегал вплотную.
Для оформления я добавил толстую зеленую рамку и закругление углов в 5 пикселей. Также добавим стиль для курсора — при наведении на спаны он должен меняться с обычного вида на указывающий перст.
*/
input[type="checkbox"] {
display:none;
}
input[type="checkbox"] + label span{
display:inline-block;
width:30px;
margin-right: 5px;
height:30px;
vertical-align:middle;
border: 4px solid green;
cursor:pointer;
border-radius: 5px;
}
input[type="checkbox"]:checked + label span{
background:url(images/s3.png) no-repeat;
}



/*Для списка*/

.styled-select select {
   background: transparent;
   width: 600px;
   padding: 4px;
   font-size: 14px;
   border: 1px solid #ccc;
   height: 34px;
}
.styled-select {
   width: 580px;
   height: 34px;
   overflow: hidden;
   background: url(images/new_arrow.png) no-repeat right #A6D437;
   border-radius: 15px;
   }

</style>
 

</head>
 <?php
//	include("function.php");
   // include 'count.php';
?>

<body>

 <div class="sert_doc container well well-lg">
<h3>O`ZBEKISTON RESPUBLIKASIGA QAYTISH UCHUN YO`RIQNOMA VA SERTIFIKAT RASMIYLASHTIRISH TARTIBI </h3>

<p class="text-justify">O`zbekiston Respublikasiga qaytish guvohnomasi (bundan keyin - Sertifikat) O`zbekiston Respublikasining chet eldagi diplomatik vakolatxonalari va konsullik  muassasalari (bundan keyin - Konsullik muassasalari) tomonidan chet elda vaqtincha yashayotgan va O`zbekistonda doimiy ro`yxatda turgan O`zbekiston Respublikasi fuqarolari va fuqaroligi bo`lmagan shaxslarga quyidagi holatlarda beriladi: shaxsini tasdiqlovchi hujjatini yo`qotgan, hujjati yaroqsiz holga kelgan, xorijiy davlat vakolatli idoralari tomonidan olib qo`yilgan, o`g’irlatilgan, muddati o`tgan, varaqlari tugagan, avval pasport bilan rasmiylashtirilmagan fuqarolar.</p>
<p class="text-justify">Sertifikatni olish uchun arizachi Konsullik muassasasining veb-saytida shaxsni tasdiqlash haqidagi so`rovnoma – arizasini to`ldiradi va unga elektron fotosuratni biriktiradi.</p>
    <p id='p1'>Sertifikatni olish uchun arizachi Konsullik muassasasiga quyidagi hujjatlarni taqdim qiladi:</p>
    <li>qog`ozda chop etilgan, arizachinig imzosi qo`yilgan, bar-kodi ko`rsatilgan electron so`rovnoma – arizasi, 3 nusxada;</li>
    <li>2 dona rangli fotosurat (3х4 sм);</li>
    <p ><strong class="p1">Eslatma: (elektron ariza-anketaga biriktiriluvchi fotosuratga qo`yiladigan talablar)</strong></p>
<div>
<span>- fotosurat o`ichamlari 300x400 piksel (px) bo`lishi;</span><br />
<span>- fotosurat sifati 96 dpi dan kam bo`lmasligi;</span><br />
<span>- fayl formati JPEG;</span><br />
<span>- fayl hajmi 30KB dan oshmasligi;</span><br />
<span>- ko`z qorachiqlari orasidagi masofa 90 px bo`lishi;</span><br />
<span>- suratning tiniq va kontrastli bo`lishi;</span><br />
<span>- suratga tushuvchi shaxsning nigohi obyektivga tog`ri yo`naltirilgan bo`lishi;</span><br />
<span>- yuz pardozining (makiyaj) me'yoriyligi;</span><br />
<span>- suratdagi yorug`lik va kontrastning me'yoriyligi;</span><br />
<span>- ko`zlar ochiq va yaxshi ko`rinishi, sochlar ularni to`sib qo`ymagan bo`lishi;</span><br />
<span>- fotosuratda yuzning markazda joylashuvi, ko`zoynaksiz, bosh kiyimisiz, yuz qirralarining aniq ko`rinishi;</span><br />
<span>- orqa fonning yorug`, bir xil, dog`larsiz, bezaksiz va chiziqlarsiz bo`lishi</span>
</div>
    <li>muddati o`tgan, yaroqsiz holga kelgan, viza varaqlari tugagan shaxsni tasdiqlovchi hujjatning asli;</li>
    <li>shaxsni tasdiqlovchi hujjatning olib qo`yilganligi yoki o`g`irlatilganligini tasdiqlovchi xorijiy davlat vakolatli idoralari ma’lumotnomasining asli va nusxasi;</li>
    <li>shaxsni tasdiqlovchi hujjat yo`qolganda - yo`qolgan shaxsni tasdiqlovchi hujjat yoki shaxsni tasdiqlovchi boshqa ma’lumotnoma nusxasi va shaxsni tasdiqlovchi hujjat yo`qolganligi haqida vakolatli idoralarning ma’lumotnomasi (imkoniyat darajasida);</li>
    <li>avval pasport bilan rasmiylashtirilmagan fuqarolar uchun – ularning tug`ilganlik haqida guvohnomasi va ota-onasining pasportlaridan nusxa;</li>
    <li>konsullik to`lovlari chiptasi (kvitansiyasi).</li>
    <p>Arizachiga Sertifikat O`zbekiston Respublikasi vakolatli idoralari tomonidan uning shaxsi tasdiqlangandan so`ng beriladi.</p>
    <p>Sertifikat bir oy, istisno holatlarda uch oygacha muddatga beriladi. Sertifikatning muddati uzaytirilmaydi.</p>
    <p>Sertifikat har bir kishiga alohida rasmiylashtiriladi. Sertifikatga bolalar yozilmaydi.</p>
    <p>Shaxsni tasdiqlovchi hujjat yaroqsiz holga kelgan, muddati o`tgan va viza varaqlari tugagan holda mazkur hujjat Konsullik muassasasiga topshirilishi lozim.</p>
    <p>Shaxsni tasdiqlovchi hujjat yuqotilgan, xorijiy davlat vakolatli idoralari tomonidan olib qo`yilgan va o`g`irlatilganligi sababli Sertifikatni olish maqsadida Konsullik muassasasiga murojaat qilib, so`rovnoma – arizasi topshirilgandan so`ng arizachining mazkur shaxsni tasdiqlovchi hujjati haqiqiy emas, deb e’lon qilinadi va topilgan yoki qaytarilgan shaxsni tasdiqlovchi hujjati Konsullik muassasasiga topshirilishi shart.</p>
    <p>Arizachi O`bekistonga kelgandan so`ng 10 kundan kech bo`lmagan muddat ichida Sertifikatni doimiy yashash joyidagi ichki ishlar idoralariga pasport olish uchun topshirilishi lozim.</p>
    <p>Sertifikat olish uchun 50 AQSH dollari miqdoridagi konsullik to`lovlari va 5 (MDH davlatlarida)-10 (boshqa davlatlarda) AQSH dollari miqdoridagi ma’muriy xarajatlar undiriladi. 16 yoshga to`lmagan bolalar ushbu to`lovlardan ozod etiladi.</p>
    <p id='p1'>Sertifikat quyidagi shaxslarga berilmaydi:</p>
    <li>xorijiy fuqarolarga;</li>
    <li>O`zbekiston hududida doimiy ro`yxati yo`q fuqaroligi bo`lmagan shaxslarga;</li>
    <li>uzrli sababsiz O`zbekiston hududida 3 yildan ortiq bo`lmaganligi sababli O`zbekiston hududidagi doimiy ro`yxati bekor qilingan fuqaroligi bo`lmagan shaxslarga;</li>
    <li>O`zbekiston fuqaroligidan chiqqan yoki fuqaroligi yo`qotilgan shaxslarga.</li>
    <p>Quyidagi holatlarda ham arizachiga Sertifikat berish rad etilishi mumkin:</p>
    <li>o`zi haqida yoki shaxsni tasdiqlovchi hujjatining yo`qolganligi to`g`risida yolg`on ma’lumotlar bersa;</li>
    <li>taqdim qilinishi lozim bo`lgan hujjatlar va ma’lumotlar belgilangan talablarga mos kelmasa (hujjatlar yetarli emas, so`rovnoma – arizasidagi ma’lumotlar aniq va to`liq emas);</li>
    <li>taqdim qilingan hujjatlardagi ma’lumotlar haqiqiy bo`lmasa.</li>   

<p id="p1">Sertifikat berilgan shaxs O`zbekistonga kelganidan so`ng yangi pasportni rasmiylashtirish uchun doimiy yashash joyidagi ichki ishlar idoralariga ushbu sertifikatni topshirishi shart.</p>
<p><a href="/uz/reglament/sertf.pdf">Interaktiv xizmat reglamenti</a></p>

<hr />
<br />
<br />

<input type="checkbox" id="chk_inst" name="chk_inst" onclick = "InstNext(this)"/>
<label for="chk_inst"><span></span> - Yo`riqnoma bilan tanishdim</label>
            

                  <br />
                  <div class="text-center">
	        <button id="next" class="btn btn-info btn-lg" disabled=true onclick=location.href="?action=vvod"> Davom etish</button>
                  </div>
</div>
                  
                  
    <script type="text/javascript">
  $(document).ready(function($)
   {
   	
      function InstNext()  {
   	link2="location.href='?action=vvod'";
  if ($('#chk_inst').is(':checked'))
      {
      $("#next").attr("onClick",link2);
      $('#next').attr('disabled',false);                         /*Š즥 뮮𐫠򩮨 ︨*/
       }
     else
     {
     	  $('#next').attr('disabled','disabled');                /*Š즥 뮮𐫠򩮨 𐩸*/
     }
  };
   	});
   </script>	
   
   
                   
</body>
<!--<?php //include 'show_stats.php';?>-->
</html>
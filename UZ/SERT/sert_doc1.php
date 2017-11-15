<html>
<head>
	<!--<script src="js/jquery-1.4.min.js" type="text/javascript"></script>-->
<style>
.sert_doc{
    color: #0a0a0a;
    margin: 20px;
}
.sert_doc p{
    font: 20px/140% Segoe;
    text-indent: 25px;
}
.sert_doc p strong{
    font: 20px Tahoma, Verdana, sans-serif;
    color: darkblue;
    font-style: italic;
}
.sert_doc h4{
    text-align: center;
      font: 25px Tahoma, Verdana, sans-serif;
     color: #333;
}
 .sert_doc li{
    color: #090909;
    padding-top: 5px;
    margin-left: 60px;
    font: 18px Tahoma, Verdana, sans-serif;
}
.sert_doc span{
    color: #f53040;
        margin-left: 60px;
        font: 20px;
}
#p1{
    padding: 15px;
    font: 18px Tahoma, Verdana, sans-serif;
    font-weight: bold;
}
 hr{
    border: none; 
    background-color: red; 
    color: red; 
    height: 2px; 
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
width:20px;
margin-right: 5px;
height:20px;
vertical-align:middle;
border: 4px solid green;
cursor:pointer;
border-radius: 5px;
margin-left: 50px;
}
input[type="checkbox"]:checked + label span{
background:url(images/s3.png) no-repeat;
}

/* Для кнопки*/
  div.btn {
     margin-left: 43%;
  }
#next {
background: #2E8CE3;
padding: 7px 30px;
font-size: 13px;
font-weight: bold;
color: #FFFFFF;
text-align: center;
border: solid 1px #73C8F0;
cursor: pointer;
border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
background: -moz-linear-gradient(0% 100% 90deg, #2E8CE3, #73C2FD);
background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#73C2FD), 
to(#2E8CE3));
box-shadow: inset 0 1px 0 0 #FFFFFF;
-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
border-bottom: 1px solid rgba(0,0,0,0.25); 
text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
}
	
#next:hover { 
background: #2E69E3; 
background: -moz-linear-gradient(0% 100% 90deg, #2E69E3, #59C2FF);
background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#59C2FF), 
to(#2E69E3));
}

#next:active {
background: #2E69E3; 
background: -moz-linear-gradient(0% 100% 90deg, #2E69E3, #59C2FF);
background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#59C2FF), 
to(#2E69E3));
box-shadow: inset 1px 1px 0 0 #004A7F;
-moz-box-shadow: inset 1px 1px 0 0 #004A7F;
-webkit-box-shadow: inset 1px 1px 0 0 #004A7F;
padding: 8px 29px 6px 31px;
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
   margin-left: 100px;
}

</style>
 

</head>
 <?php
//	include("function.php");
   // include 'count.php';
?>

<body>
 <input  id="ses_name" type="hidden"  value = "<?php  echo $_SESSION['login'];?>" />
<div class="sert_doc">
<h4>O`zbekiston Respublikasiga qaytish uchun yo`riqnoma va sertifikat olish tartibi </h4>

<p>O`zbekiston Respublikasiga qaytish uchun sertifikat vaqtincha chet elda bo`lgan O`zbekiston Respublikasi 
fuqarolariga va fuqaroligi bo`lmagan shaxslarga O`zbekistonga kirish huquqini beruvchi hujjat 
hisoblanadi, va chet elda ularning harakatlanish hujjati (fuqaroning pasporti, 
16 yoshga to`lmagan fuqaroning yo`ki fuqaroligi bo`lmagan shaxsning guvohnomasi) 
yo`qolgan (yaroqsizlangan) hollarda beriladi.<br />
Shuningdek, O`zbekiston Respublikasi fuqarolari chet elda bo`lgan vaqnlarida pasportlarining amal qilish muddati tugaganida qaytish uchun sertifikat rasmiylashtiriladi.
</p>
<p>Bundan tashqari, ota-onalarining yoki boshqa qonuniy vakillarining pasportlari asosida chet elda bo`lgan O`zbekiston Respublikasi fuqarolari 16 yoshga to`lganda qaytish uchun sertifikat berilishi mumkin.</p>
<p>Arizachida harakatlanish hujjati mavjud emasligi sababli uning shaxsini tasdiqlash zarur 
bo`lganida, qaytish uchun sertifikat faqatgina pasport yoki fuqaroligi bo`lmagan shaxsning guvohnomasini 
bergan ichki ishlar idoralarining tegishli tasdiqlovchi hujjati olinganidan so`ng beriladi. 
Yuqoridagilarni hisobga olgan holda, qaytish uchun sertifikatni rasmiylashtirish muddati arizachi tomonidan chet 
eldagi konsullik muassasasiga taqdim etilgan ma`lumotlarning to`liqligiga qarab, 
5 ish kunigacha davrini tashkil etishi mumkin.</p>
<p>O`zbekiston Respublikasi fuqarosining yoki fuqaroligi bo`lmagan shaxsning shaxsini tasdiqlovchi hujjat 
yo`qolganligi (yaroqsizlanganligi) yuzasidan murojaatlari shaxsan arizachi tomonidan 
O`zbekiston Respublikasining chet eldagi konsullik muassasalari qabul qilish kunlari va soatlarida amalga oshiriladi.</p>
<p><strong>Sertifikatni olish uchun konsullik muassasasiga quyidagi hujjatlarni taqdim etish kerak:</strong></p>

<li> to`ldirilgan elektron ariza-anketa<br /></li>
<p><strong>Eslatma</strong>: (elektron ariza-anketaga biriktiriluvchi fotosuratga qo`yiladigan talablar)<br /></p>
<div>
<span>- fotosurat o'lchamlari 300x400 piksel (px) bo'lishi;</span><br />
<span>- fotosurat sifati 96 dpi dan kam bo'lmasligi;</span><br />
<span>- fayl formati JPEG;</span><br />
<span>- fayl hajmi 30KB dan oshmasligi;</span><br />
<span>- ko'z qorachig'lari orasidagi masofa 90 px bo'lishi;</span><br />
<span>- surat tiniq va kontrastli bo'lshi;</span><br />
<span>- suratga tushuvchi shahsni nigohi ob'ektivga tog'ri yo'naltirilgan bo'lishi;</span><br />
<span>- yuz pardozining(makiyaj) me'yoriyligi;</span><br />
<span>- suratdagi yorug'ik va kontrastning me'yoriyligi;</span><br />
<span>- ko'zlar ochiq va yahshi ko'rinishi, sochlar to'sib qo'ymagan bo'lishi;</span><br />
<span>- fotosuratda yuzning markazda joylashuvi, ko'zoynaksiz, bosh kiyimisiz, yuz qirralarining aniq ko'rinishi;</span><br />
<span>- orqa fonning yorug', bir hil, dog'larsiz, bezaksiz va chiziqlarsiz bo'lishi</span>
</div>
<li> muddati tugagan/yaroqsizlangan pasport/16 yoshgacha shaxsning guvohnomasi/FBSh guvohnomasi;<br/></li>
<li> ikkita fotosurat (35x45mm);<br/></li>
<li> sertifikatga yozib qo`yiladigan har bir bolaning ikkita fotosurati (35x45mm);<br/></li>
<li> arizachi ishlaydigan, o`qishda, davolanishda yoki xizmat safarida bo`lgan tegishli tashkilotning tasdiqlovchi hujjati;<br/></li>
<li> o`rnatilgan miqdordagi konsullik yig`imi;<br/></li>
<li>qaytarib yuborish uchun puli to`langan konvert (zaruriy holda).<br/></li>
 <br/>
<p> Bundan tashqari, yo`qotilishi yoki o`g`irlanishi natijasida arizachining harakatlanish hujjati mavjud bo`lmagani holda quyidagi qo`shimcha hujjatlar kerak:</p>
<li> yo`qotilgan/o`g`irlangan pasport nusxasi (agar bor bo`lsa);</li>
<li> arizachining harakatlanish hujjati yo`qolganligi to`g`risida ariza bilan murojaat etganligini tasdiqlovchi doimiy yashash joyidagi mamlakatning vakolatli idoralarining rasmiy hujjati;</li>
<li> arizachi tashrif buyurgan mamlakat vakolatli idoralari tomonidan berilgan va arizachining harakatlanish hujjati 
yo`qolganligi/o`g`ilanganligi to`g`risida ariza bilan murojaat etganligini tasdiqlovchi rasmiy hujjat</li>
</div>


<p id="p1">Qaytish uchun sertifikat berilgan shaxs O`zbekistonga kelganidan so`ng yangi pasportni 
rasmiylashtirish uchun doimiy yashash joyidagi ichki ishlar idoralariga ushbu sertifikatni topshirishi shart.</p>
<hr />
<br />
<br />

<input type="checkbox" id="chk_inst" name="chk_inst" onclick = "InstNext('vvod')"/>
<label for="chk_inst"><span></span> - Yo`riqnoma bilan tanishdim</label>
            

<!--  <div id="label_elchixona">Sertifikat olish joyinin tanlang:</div>    
 <div class="styled-select">
    <select id="elchixona" name="elchixona" onclick = "InstNext(this)" >
              <?php
                      echo '<option selected="selected" value="0" > ----- Tanlanmagan ------- </option>';
              		 $select = mysql_query("SELECT sp_name04, sp_id, sp_idfirst FROM sp_division where sp_id >= 40000 and sp_id <= 40099 order by 1");      //Элчихоналар
	    		     while(list($sp_name04,$sp_id,$sp_idfirst) = mysql_fetch_row($select))
               	       	echo "<option value='$sp_id/$sp_idfirst'>$sp_name04</option>";
                       
       	//		      echo "</select>";
                ?>
</select>                
</div>
   -->         
                   <br />
                  <div class="btn">
	        <button id="next"  disabled=true onclick=location.href="?action=vvod"> Davom etish</button>
                  </div>
                  
                  
                  
    <script type="text/javascript">
  $(document).ready(function($)
   {
   		User_Session();
   	     $('#Chiqish').click( function(){
	$.ajax({
		type: "POST",
		url:  "/uz/Chiqish.php",
		success: function(){
                          $('#ses_name').val('');
                          User_Session();
                      }
                  });
  	});     	
   
  /////	
      function InstNext()  {
   	link2="location.href='?action=vvod'";
  if ($('#chk_inst').is(':checked'))
      {     
      $("#next").attr("onClick",link2);
      $('#next').attr('disabled',false);                         /*Далее кнопкасини очиш*/
       }
     else
     {
     	  $('#next').attr('disabled','disabled');                /*Далее кнопкасини ёпиш*/
     }
  };
   	});
   </script>	
   
   
                   
</body>
<!--<?php //include 'show_stats.php';?>-->
</html>
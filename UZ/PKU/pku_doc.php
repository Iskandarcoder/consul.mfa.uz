<html>
<head>
<style>
.vku_doc{
    color: #333;
    font-family: 'Open Sans', sans-serif;
}


.vku_doc p strong{
    /*font-family: 'Roboto Condensed', sans-serif;*/
    font: 18px 'Trebuchet MS',Tahoma, Verdana, sans-serif;
    color: #0a0a0a;
    font-style: italic;
}
.vku_doc h3 {
    text-align: center;
    color: #1479dd;
    text-shadow: 1px 1px 1px #fff;
}
 .vku_doc li{
    padding-top: 3px;
    margin-left: 20px;
    font-family: 'Open Sans', sans-serif;
    font-weight: bold;
}
.vku_doc span{
    color:darkorchid;
    font: 17px;
}
#p1{
    padding: 15px;
    font: 18px 'Trebuchet MS',Tahoma, Verdana, sans-serif;
    font-weight: bold;
    color: #22313F;
}
    #p2{
        font: 17px 'Trebuchet MS',Tahoma, Verdana, sans-serif;
        color:darkorchid;
    }    

    span {
    color:crimson;
    padding-top: 5px;
    font: 17px 'Trebuchet MS',Tahoma, Verdana, sans-serif;       
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
<div class="vku_doc container well well-lg">
<h3>DOIMIY KONSULLIK HISOBIGA OLISH TARTIBI</h3>

<p>O`zbekiston Respublikasi Prezidentining 2011-yil 5-yanvardagi PF-4262-sonli “O`zbekiston Respublikasida pasport tizimini takomillashtirishga doir qo`shimcha chora-tadbirlar to`g`risida”gi Farmonining 1-ilovasi 51-52 bandlariga ko`ra:</p>
<LI>o`rnatilgan tartibda  xorijga doimiy yashashga chiqqan, shuningdek, vaqtincha chet elda bo`lib turuvchi fuqarolar O`zbekiston Respublikasining xorijdagi konsullik muassasalarida doimiy yoki vaqtincha konsullik ro`yxatiga turadilar.</LI>
<LI>doimiy konsullik ro`yxatiga xorijga doimiy yashashga chiqqan va chet elga chiqishlarini o`rnatilgan tartibda rasmiylashtirgan fuqarolar olinadi.</LI>
<P>Vaqtincha konsullik ro`yxatiga olinmagan fuqarolar chet elda vaqtincha  bo`lgan paytlarida pasportlarini yo`qotgan, amal qilish muddatini o`tkazib yuborgan yoki yaroqsiz holga keltirilgan hollarda tegishli konsullik muassasasiga O`zbekiston Respublikasiga qaytish guvohnomasini (Sertifikat) olish uchun murojaat qiladilar.</P>
<P>Doimiy konsullik hisobiga turish uchun vakolatxona konsullik bo`limiga quyidagi hujjatlarni taqdim etish kerak:</P>
<li> O`zbekiston Respublikasi fuqarosining pasporti asl nusxasi + pasport nusxasi (O`zbekiston Respublikasida ro`yxatga olinganlik to`g`risidagi axborot bilan);<br /></li>
<li> O`zbekiston Respublikasidan doimiy yashshga jo`nab ketish manzil varaqasi va nusxasi (faqat Mustaqil Davlatlar Hamdo`stligi davlatlariga doimiy yashashga ketgan fuqarolar uchun);<br /></li>
<li>doimiy turar joyi mamlakati hududida yashash yoki ro`yxatga olingan joyidan ma’lumotnoma;<br /></li>
<li> 3x4 sm o`lchamli fotosurat – 1 dona;<br /></li>
<li>konsullik hisobiga olish uchun konsullik yig`imi;<br /></li>
<li> elektron tarzda to`ldirilgan konsullik hisobiga olish varag`i.;<br /></li>
<p><a href="/uz/reglament/k_uchet.pdf">Interaktiv xizmat reglamenti</a></p>


<p id="p1"><strong>Izoh</strong>: (Doimiy konsullik hisobiga olish 1 ish kuni ichida rasmiylashtiriladi.)<br /></p>

<hr />
<br />
<br />

<input type="checkbox" id="chk_inst" name="chk_inst" onclick = "InstNext('vvod_pku')";/>
<label for="chk_inst"><span></span> - Yo`riqnoma bilan tanishdim</label>
            

                   <br />
                  <div class="text-center">
	        <button id="next" class="btn btn-info btn-lg" disabled=true onclick=location.href="?action=vvod_pku"> Davom etish</button>
                  </div>
       </div>           
                  
                  
    <script type="text/javascript">
  $(document).ready(function($)
   {
   	
      function InstNextPku()  {
   	link2="location.href='?action=vvod_pku'";
  if ($('#chk_inst').is(':checked'))
      {
      $("#next").attr("onClick",link2);
      $('#next').attr('disabled',false);                      
       }
     else
     {
     	  $('#next').attr('disabled','disabled');              
     }
  };
   	});
   </script>	
   
   
                   
</body>

</html>
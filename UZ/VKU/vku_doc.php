<html>
<head>
<style>
.vku_doc{
    font-family: 'Open Sans', sans-serif;
    color: #333;
    }

.vku_doc p strong{
    font-family: 'Open Sans', sans-serif;
    color: darkblue;
    font-style: normal;
}
.vku_doc h3{
    font-family: 'Open Sans', sans-serif;
	  text-align: center;
    color: #1479dd;
    text-shadow:1px 1px 1px #fff;
}
 .vku_doc li{
    color: #333;
    padding-top: 5px;
    font-family: 'Open Sans', sans-serif;
     font-weight: bold;
      margin-left: 20px;
}
.vku_doc span{
    color: #f53040;
    font: 20px;
}
    #p1{
    padding: 10px;
    font-family: 'Open Sans', sans-serif;
    font-weight: normal;
    text-decoration: underline;
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
<h3>VAQTINCHALIK KONSULLIK HISOBIGA OLISH TARTIBI </h3>

<p>O`zbekiston Respublikasi Prezidentining 05.01.2011y.dagi PF-4262 raqamli «O`zbekiston Respublikasida pasport tizimini takomillashtirishning qo`shimcha chora-tadbirlari haqida» nomli Farmoni №1-ilovasining 51 va 53 punktlariga asosan:</p>
<li>doimiy yashash uchun belgilangan tartibda xorijga ketgan, hamda xorijda vaqtincha yashayotgan fuqarolar O`zbekiston Respublikasining xorijdagi konsullik muassasalarida doimiy yoki vaqtincha konsullik ro`yxatida hisobga olinadilar;</li>
<li>xorijga xizmat safari bilan yoki o`qish, davolanish, hamda kontrakt asosida (O`zbekiston Respublikasi Vazirlar Mahkamasining 12.11.2003y.dagi №505 tartib raqamli «O`zbekiston Respublikasi fuqarolarining xorijdagi mehnat faoliyatini tashkil etishni takomillashtirish chora-tadbirlari haqida» nomli Qarori qoidalariga mos holda) ishlash uchun vaqtincha muddatga belgilangan tartibda rasman jo`nab ketgan fuqarolar vaqtinchalik konsullik ro`yxatida qayd qilinadilar;</li>
<p>Agar xorijga jo`nab ketgan fuqaro xorijiy mamlakatda qonuniy ravishda 6 (olti) oydan ortiq bo`lgan muddat davomida bo`lsa, u vaqtincha konsullik ro`yxatiga olinadi.</p>
<p>Vaqtincha xorijda bo`lgan, hamda doimiy yoki vaqtincha konsullik ro`yxatida qayd qilinmagan fuqarolar pasportlari yo`qolganda yoki yaroqsiz holga kelganda, hamda pasportlarining amal qilish muddati tugagan holda, O`zbekiston Respublikasiga qaytish guvohnomasi (sertifikarti) olish uchun respublikaning xorijdagi konsullik muassasalariga murojaat qiladilar.</p>
<p id='p1'>Vaqtinchalik konsullik hisobiga turish uchun vakolatxona konsullik bo`limiga quyidagi hujjatlarni taqdim etish kerak:</p>

<li> O`zbekiston Respublikasi fuqarosining pasporti asl nusxasi + pasport nusxasi (O`zbekiston Respublikasida ro`yxatga olinganlik to`g`risidagi axborot bilan)</li>
<li> Kelgan mamlakat hududida ro`hatdan o`tganlik haqida ma`lumotnoma;<br /></li>
<li> 3x4 sm o`lchamli fotosurat – 1 dona;<br /></li>
<li> elektron tarzda to`ldirilgan konsullik hisobiga olish varag`i.;<br /></li>
<p><a href="/uz/reglament/k_uchet.pdf">Interaktiv xizmat reglamenti</a></p>


<p><strong>Izoh</strong>: (Konsullik hisobiga olish 1 ish kuni ichida rasmiylashtiriladi.)<br /></p>
<hr />
<br />
<br />



<input type="checkbox" id="chk_inst" name="chk_inst" onclick = "InstNext('vvod_vku')"/>
<label for="chk_inst"><span></span> - Yo`riqnoma bilan tanishdim</label>
            

                   <br />
                  <div class="text-center">
	        <button id="next"  class="btn btn-info btn-lg" disabled=true  onclick=location.href="?action=vvod_vku"> Davom etish</button>
                  </div>
                  
    
               </div>    
</body>

</html>
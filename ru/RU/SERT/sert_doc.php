<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<style>

  h3{
	text-align: center;
	 color: #1479dd;
	  text-shadow:1px 1px 1px #fff;
}
.sert_doc{
	margin: 20px;
	font-family: 'Open Sans', sans-serif;
    color: #333;
}
.sert_doc  li{
    padding-top: 3px;
    margin-left: 55px;
    font-family: 'Open Sans', sans-serif;
    font-weight: bold;
  }
 .sert_doc .sp1{
	margin-left: 20px;
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
	margin-left: 55px;
    }
    
    .sert_doc span{
        color:darkblue;
        margin-left: 55px;
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
<div class="sert_doc">
<h3>ПОРЯДОК ПОЛУЧЕНИЯ СЕРТИФИКАТА НА ВОЗРАЩЕНИЕ
 В РЕСПУБЛИКУ УЗБЕКИСТАН
 </h3>

<p>Сертификат на возвращение в Республику Узбекистан (далее – сертификат) выдается дипломатическими 
представительствами и консульскими учреждениями Республики Узбекистан за рубежом (далее –  консульские учреждения) 
временно находящимся за рубежом, постоянно прописанным гражданам Республики Узбекистан и лицам без гражданства в 
случаях утери, порчи, изъятии компетентными органами иностранного государства, кражи, истечения срока действия, израсходования
 страниц паспорта гражданина Республики Узбекистан либо проездного документа лица без гражданства 
 (далее – проездной документ), а также в случае, если лицо ранее не было документировано паспортом.
</p>
<p>Для получения сертификата заявитель заполняет на веб-сайте консульского учреждения анкету-заявление о подтверждении 
личности и прикрепляет к ней электронную фотографию.</p>


<p id='p1'>Для получения сертификата заявитель представляет в консульское учреждение следующие документы:</p>
<li>заполненная, распечатанная с бар-кодом на бумаге и подписанная заявителем анкета-заявление в 3-х экземплярах;</li>
<li>две цветные фотографии размером 3х4 см;</li>
<p ><strong class="p1">ВАЖНО!!! Фотография прикрепляемая к электронной анкете-заявлению должна отвечать следующим требованиям:</strong></p>
<div>
<span>- размер фотографии 300 х 400 пикселей (рх);</span><br />
<span>- разрешение не менее 96 dpi;</span><br />
<span>- формат файла JPEG;</span><br />
<span>- размер файла не должен превышать 30 Кбай;</span><br />
<span>- расстояние между зрачками глаз должно быть равно 90 пикселей (рх);</span><br />
<span>- изображение должно быть резким и контрастным;</span><br />
<span>- взгляд фотографируемого должен быть направлен прямо в объектив;/span><br />
<span>- нейтральный макияж, не искажающий или сильно меняющий черты лица;/span><br />
<span>- яркость/контраст должны быть умеренными;</span><br />
<span>- глаза открыты и хорошо видны, их не должны закрывать волосы;</span><br />
<span>- лицо на фотографии должно располагаться в центре снимка, строго в анфас, без очков,</span><br />
<span> &nbsp  головных уборов и поворотов или с наклоном головы, контуры лица должны быть отчетливо видны;</span><br />
<span>- задний фон должен быть однородным и светлым, без пятен, узоров и полос;</span><br />
<span>- однородное освещение при съемке, никаких бликов, засветленных участков, резких теней и контрастов;</span>
</div>
<li>оригинал проездного документа (в случае его порчи, истечения срока действия или израсходования страниц);</li>
<li>оригинал и копия документа, выданного компетентными органами страны пребывания, подтверждающего изъятие или 
кражу проездного документа;</li>
<li>по мере возможности документ, выданный компетентными органами страны пребывания, подтверждающий утрату 
проездного документа, копия утерянного проездного документа и/или иной документ, подтверждающий личность заявителя, 
выданный уполномоченными органами Республики Узбекистан;</li>
<li>копия свидетельства о рождении и паспортов родителей (для лиц, ранее не документированных паспортом);</li>
<li>квитанция об уплате консульского сбора и сбора на возмещение фактических расходов.</li>

<p>Выдача сертификата осуществляется только после получения соответствующего подтверждения компетентных органов 
Республики Узбекистан.</p>
<p>Сертификат выдается сроком действия на 1 месяц, в исключительных случаях до трех месяцев. Срок действия сертификата
продлению не подлежит.</p>
<p>Сертификат оформляется на каждое лицо отдельно. Вписание 
в сертификат несовершеннолетних детей не допускается. 
</p>
<p>В случае выдачи сертификата в связи с истечением срока действия, порчей или израсходованием страниц проездного 
документа, указанный документ должен быть сдан в консульское учреждение.</p>
<p>При обращении и подачи анкеты-заявления заявителя в консульское учреждение для получения сертификата в связи c утерей, 
изъятием или кражей проездного документа, его проездной документ объявляется недействительным и в случае нахождения или 
возвращения утерянного, изъятого или украденного проездного документа он подлежит обязательной сдаче в консульское 
учреждение.</p>
<p>Заявителю необходимо по прибытии в Республику Узбекистан в срок не позднее 10 дней после прибытия сдать сертификат в органы внутренних дел по месту жительства для получения нового паспорта.</p>
<p>За оформление и выдачу сертификата взимается консульский сбор в размере 50 долл.США и сбор на возмещение
 фактических расходов в размере 5 долл. США (в странах СНГ) и 10 долл. США (в других странах).</p>
<p>От уплаты консульского сбора и сбора на возмещение фактических расходов за оформление и выдачу 
сертификата освобождаются дети до 16 лет.</p>

<p id="p1">Сертификат не выдается:</p>
<li>иностранным гражданам; </li>
<li>лицам без гражданства, не имеющим постоянную прописку на территории Республики Узбекистан;</li>
<li>лицам без гражданства,  которым аннулирована  постоянная прописка в Республике Узбекистан,
 в связи с их отсутствием по месту постоянной прописки более трех лет без уважительных причин;</li>
<li>лицам, вышедшим или утратившим гражданство Республики Узбекистан;</li>
<p>В следующих случаях также заявителю может быть отказано в выдаче сертификата на возвращение в Республику Узбекистан:</p>
<li>cообщение заведомо ложных сведений о себе либо ложности утери проездного документа;</li>
<li>несоответствие сдаваемых документов установленным требованиям (неполный перечень, неправильное заполнение).</li>
<p><a href="/uz/reglament/sertf.pdf">Регламент интерактивной услуги</a></p>



</div>


<p id="p1">По прибытию в Узбекистан лицо, которому был выдан сертификат на возвращение, обязано сдать сертификат в органы 
внутренних дел по месту постоянного проживания для оформления нового паспорта.</p>
<hr />
<br />
<br />

<input type="checkbox" id="chk_inst" name="chk_inst" onclick = "InstNext(this)"/>
<label for="chk_inst"><span></span> - Ознакомлен с инструкцией</label>
            

                   <br />
                  <div class="btn">
	        <button id="next"  disabled=true onclick=location.href="?action=vvod"> Далее...</button>
                  </div>
                  
                  
                  
    <script type="text/javascript">
  $(document).ready(function($)
   {
   	
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
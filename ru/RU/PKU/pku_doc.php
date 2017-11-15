<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<script src="js/jquery-1.4.2.js" type="text/javascript"></script>	
<style>
.vku_doc{
    font-family: 'Open Sans', sans-serif;
    color: #333;
    margin: 20px;
}
.vku_doc p{
    font-family: 'Open Sans', sans-serif;
    color: #333;
    text-indent: 25px;
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
    margin-left: 60px;
    font-family: 'Open Sans', sans-serif;
     font-weight: bold;
}
.vku_doc span{
    color: #f53040;
        margin-left: 60px;
        font: 20px;
}
#p1{
    padding: 10px;
    font-family: 'Open Sans', sans-serif;
    font-weight: normal;
    text-decoration: underline;
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
<div class="vku_doc">
<h3>ПОРЯДОК РЕГИСТРАЦИИ НА ПОСТОЯННЫЙ КОНСУЛЬСКИЙ УЧЕТ В ЗАГРАНУЧРЕЖДЕНИЯХ РЕСПУБЛИКИ УЗБЕКИСТАН</h3>

<p>В соответствии с пунктами 51 и 52 приложения №1 к Указу Президента Республики Узбекистан УП-4262 от 05.01.2011г. «О дополнительных мерах по совершенствованию паспортной системы Республики Узбекистан»:
</p>

<li>граждане, выехавшие в установленном порядке за границу на постоянное жительство, а также временно находящиеся за границей, встают на постоянный или временный консульский учет в консульских учреждениях Республики Узбекистан за рубежом.</li>
<li> на постоянный консульский учет оформляются граждане, выехавшие за границу для постоянного проживания и оформившие в установленном порядке выезд за рубеж на постоянное жительство.</li>
<p>Граждане, временно находящиеся за границей и не состоящие на постоянном или временном консульском учете в консульских учреждениях Республики Узбекистан за рубежом, в случае утери паспорта, его порчи или истечения срока действия обращаются в консульское учреждение Республики Узбекистан для получения свидетельства на возвращение в Республику Узбекистан.</p>
<p id='p1'>Для того, чтобы встать на консульский учет в Посольстве Республики Узбекистан в зарубежом необходимо представить в Консульский отдел Посольства следующие документы:</p>
<li>оригинал паспорта гражданина Республики Узбекистан + копия паспорта (с информацией о прописке-выписке из Республики Узбекистан);</li>
<li> Копия и оригинал адресного листка убытия из Республики Узбекистан (только для граждан выехавших на ПМЖ в страны СНГ);</li>
<li>справку с места жительства или регистрация на территории страны пребывания;</li>
<li>фотографию – 1 шт. размером 3х4 см.;</li>
<li>консульские сборы за консульский учет;</li>
<li>заполненную электронную регистрационную карточку;</li>
<p><a href="/uz/reglament/k_uchet.pdf">Регламент интерактивной услуги</a></p>


<p><strong>Примечание:</strong> Консульский учет оформляется в течение 1 рабочего дня.</p>

<hr />
<br />
<br />

<input type="checkbox" id="chk_inst" name="chk_inst" onclick = "InstNext('vvod_pku')";/>
<label for="chk_inst"><span></span> - Ознакомлен с инструкцией</label>
            

                   <br />
                  <div class="btn">
	        <button id="next"  disabled=true onclick=location.href="?action=vvod_pku"> Далее...</button>
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
<!DOCTYPE HTML >
<html >
    <head>
	    <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
            <link href="css/f_manba.css" rel="stylesheet" type="text/css" />

      </head>
   

<?php
	include("db.php");
	include("function.php"); 
	include("count.php");
?>
  <body class="FM">
  <input  id="ses_name" type="hidden"  value = "<?php  echo $_SESSION['login'];?>" />

  <h3>Полезные источники</h3>
  <ul class="f-manba">

<li>
<div><a href="https://www.gov.uz" target="_blank">
<span class="m1  sp_img"></span>
<span><strong>Правительственный <br/> портал</strong></span>
</a>
</div>
</li>

<!--<li>
<div><a href="https://www.press-service.uz" target="_blank">
<span class="m0  sp_img"></span>
<span><strong>O`zbekiston Respublikasi Prezidentining <br/> matbuot hizmati</strong></span>
</a>
</div>
</li>-->


<li>
<div><a href="https://www.my.gov.uz" target="_blank">
<span class="m2 sp_img"></span>
<span><strong>Единый портал интерактивных <br/>государственных услуг</strong></span>
     </a>
</div>
</li>

<!--<li>
<div><a href="http://www.senat.uz" target="_blank">
<span class="m9 sp_img"></span>
<span><strong>O`zbekiston Respublikasi <br/>Oliy Majlisining Senati</strong></span>
     </a>
</div>
</li>
-->
<!--
<li>
<div><a href="http://yt.uz" target="_blank">
<span class="m10 sp_img"></span>
<span><strong>Yangi texnologiyalar  <br/>ilmiy-axborot markazi</strong></span>
     </a>
</div>
</li>
-->
<li>
<div><a href="http://www.mfa.uz" target="_blank">
<span class="m3 sp_img"></span>
<span><strong>Министерство иностранных дел <br/>Республики Узбекистан</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="http://jahonnews.uz" target="_blank">
<span class="m4 sp_img"></span>
<span><strong>Информационное агентство  Jahon  </strong></span>
     </a>
</div>
</li>

<li>
<div><a href="http://www.mvd.uz" target="_blank">
<span class="m5 sp_img"></span>
<span><strong>Министерство внутренных дел <br/>Республики Узбекистан </strong></span>
     </a>
</div>
</li>

<li>
<div><a href="http://www.prokuratura.uz/ru/" target="_blank">
<span class="m6 sp_img"></span>
<span><strong>Генеральная прокуратура <br/>Республики Узбекистан </strong></span>
     </a>
</div>
</li>

<li>
<div><a href="http://www.soliq.uz" target="_blank">
<span class="m7 sp_img"></span>
<span><strong>Государственный налоговый комитет  <br/>Республики Узбекистан</strong></span>
     </a>
</div>
</li>

<li>
<div><a href="http://egovernment.uz" target="_blank">
<span class="m8 sp_img"></span>
<span><strong>Центр развития системы  <br/>«Электронное правительство»</strong></span>
     </a>
</div>
</li>

<!--
<li>
<div><a href="https://esi.uz" target="_blank">
<span class="m8 sp_img"></span>
<span><strong>Yagona identifikatsialash   <br/>axborot tizimi</strong></span>
     </a>
</div>
</li>


<li>
<div><a href="http://yt.uz" target="_blank">
<span class="m9 sp_img"></span>
<span><strong>Yangi texnologiyalar  <br/>ilmiy-axborot markazi</strong></span>
     </a>
</div>
</li>


<li>
<div><a href="http://yt.uz" target="_blank">
<span class="m11 sp_img"></span>
<span><strong>Yangi texnologiyalar  <br/>ilmiy-axborot markazi</strong></span>
     </a>
</div>
</li>-->
</ul>
<script type="text/javascript">
  $(document).ready(function($)     
   {
	   	User_Session();
   	 	     $('#Chiqish').click( function(){
	 $.ajax({
		type: "POST",
		url:  "/ru/Chiqish.php",
		success: function(){
                          $('#ses_name').val('');
                          User_Session();
                      }
                  });
  	});     
   });
   </script>
  </body>
  </html>
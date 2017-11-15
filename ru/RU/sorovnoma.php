<!DOCTYPE HTML>
<html>
<head>
<!--<script type="text/javascript" src="http://simpoll.ru/embed/framejs/77d2dffb"></script>-->
<!--<noscript><a href="http://simpoll.ru/run/survey/77d2dffb">Simpoll.ru</a></noscript-->
        <link href="css/opros.css" rel="stylesheet" type="text/css" />    
</head>
<?php
	include("count.php");
?>
  <!-- <?php
function validip($ip) {
	if (!empty($ip) && ip2long($ip)!=-1) {
		$reserved_ips = array (
			array('0.0.0.0','2.255.255.255'),
			array('10.0.0.0','10.255.255.255'),
			array('127.0.0.0','127.255.255.255'),
			array('169.254.0.0','169.254.255.255'),
			array('172.16.0.0','172.31.255.255'),
			array('192.0.2.0','192.0.2.255'),
			array('192.168.0.0','192.168.255.255'),
			array('255.255.255.0','255.255.255.255')
		);
 
		foreach ($reserved_ips as $r) {
			$min = ip2long($r[0]);
			$max = ip2long($r[1]);
			if ((ip2long($ip) >= $min) && (ip2long($ip) <= $max)) return false;
		}
 
		return true;
 
	} else {
		return false;
	}
}
 
function getip() {
	if (validip(@$_SERVER["HTTP_CLIENT_IP"])) {
		return $_SERVER["HTTP_CLIENT_IP"];
	}
 
	foreach (explode(",",@$_SERVER["HTTP_X_FORWARDED_FOR"]) as $ip) {
		if (validip(trim($ip))) { return $ip; }
	}
 
	if (validip(@$_SERVER["HTTP_X_FORWARDED"])) {
		return $_SERVER["HTTP_X_FORWARDED"];
	} elseif (validip(@$_SERVER["HTTP_FORWARDED_FOR"])) {
		return $_SERVER["HTTP_FORWARDED_FOR"];
	} elseif (validip(@$_SERVER["HTTP_FORWARDED"])) {
		return $_SERVER["HTTP_FORWARDED"];
	} elseif (validip(@$_SERVER["HTTP_X_FORWARDED"])) {
		return $_SERVER["HTTP_X_FORWARDED"];
	} else {
		return $_SERVER["REMOTE_ADDR"];
	}
}
 
echo getip();
 
?> -->
<body>
 <input  id="ses_user_survey" type="hidden"  value = "<?php  echo $_SESSION['user_survey'];?>" />
<br/>
                   <h2>Опрос</h2>
  <div class="survey_view">
        <!-- So`rovnoma formasi -->
         <form id="survey_form"  enctype="multipart/form-data">
              
    <div class="survey_questions">
      <!-- 1-chi savol -->
     <div class="question"">
        <div class="number">1</div>
        <h3> Как вы оцениваете новый интерактивный сайт?  </h3>
            <div class="variants">
                  <div class="variant"><label><input type="radio" name="myradio1"  value="alo"            class="input_radio"  tabindex="-1" />Отлично </label></div>
                  <div class="variant"><label><input type="radio"  name="myradio1" value="yahshi"       class="input_radio"  tabindex="-1" />Хорошо </label></div>
                  <div class="variant"><label><input type="radio"  name="myradio1" value="qoniqarli"  class="input_radio"  tabindex="-1" />Нормально </label></div>
                  <div class="variant"><label><input type="radio"  name="myradio1" value="yomon"      class="input_radio"  tabindex="-1" />Плохо </label></div></div>
             <!--  1-chi savolga javoblar -->
            <div  class="answers"><div id="alo" class="answ" >Отлично - </div><div  class="answ1"><div  id="answ11" ></div></div></div> 
            <div  class="answers"><div id="yahshi" class="answ">Хорошо - </div><div  class="answ1">	<div  id="answ12"></div></div></div> 
            <div  class="answers"><div  id="qoniqarli" class="answ">Нормально - </div>	<div class="answ1"><div  id="answ13"></div></div></div> 
            <div  class="answers"><div  id="yomon" class="answ">Плохо - </div><div class="answ1">	<div  id="answ14"></div></div></div> 
      </div>
         
      <div class="question">
           <div class="number">2</div>
             <!-- 2-chi savol  -->
         <h3>По Вашему мнению какие услуги Министерства иностранных дел должны быть интерактивным? </h3>
          <div class="variants">
            <div class="variant"><label> <input type="radio" name="myradio2" value="1"  class="input_radio"  tabindex="-1" />ИСТРЕБОВАНИЕ ДОКУМЕНТОВ ИЗ РЕСПУБЛИКИ УЗБЕКИСТАН </label> </div>
            <div class="variant"><label> <input type="radio" name="myradio2" value="2"  class="input_radio" tabindex="-1" /> ОФОРМЛЕНИЕ СВИДЕТЕЛЬСТВА О РОЖДЕНИИ</label></div>
             <div class="variant"><label> <input type="radio" name="myradio2" value="3"  class="input_radio" tabindex="-1" /> РЕГИСТРАЦИЯ БРАКА</label></div>
            <div class="variant"><label> <input type="radio" name="myradio2" value="4"  class="input_radio" tabindex="-1" /> ОФОРМЛЕНИЕ РАЗРЕШИТЕЛЬНОЙ ЗАПИСИ ДЛЯ ВЫЕЗДА ЗА ГРАНИЦУ (РЗ) </label></div>
            <div class="variant"><label> <input type="radio" name="myradio2" value="5"  class="input_radio" tabindex="-1" />ОФОРМЛЕНИЕ ПОСТАНОВЛЕНИЯ НА ПОСТАЯННОЕ ЖИТЕЛЬСТВО (ПМЖ) </label></div>       
              <div class="variant"><label> <input type="radio" name="myradio2" value="6"  class="input_radio" tabindex="-1" /> ОФОРМЛЕНИЕ ВЫХОДА ИЗ ГРАЖДАНСТВА РЕСПУБЛИКИ УЗБЕКИСТАН</label></div> 
            </div>
            <!-- 2-chi savolga javoblar -->
          <div  class="answers">	<div   id="1" class="answ">ИСТРЕБОВАНИЕ ДОКУМЕНТОВ ИЗ РЕСПУБЛИКИ УЗБЕКИСТАН - </div><div  class="answ1"><div  id="answ21"></div></div></div> 
          <div  class="answers"><div  id="2" class="answ">ОФОРМЛЕНИЕ СВИДЕТЕЛЬСТВА О РОЖДЕНИИ- </div><div class="answ1"><div id="answ22"></div></div></div> 
          <div  class="answers"><div  id="3" class="answ">РЕГИСТРАЦИЯ БРАКА- </div><div class="answ1"><div id="answ22"></div></div></div> 
          <div  class="answers"><div  id="4" class="answ">ОФОРМЛЕНИЕ РАЗРЕШИТЕЛЬНОЙ ЗАПИСИ ДЛЯ ВЫЕЗДА ЗА ГРАНИЦУ (РЗ)- </div><div class="answ1"><div id="answ22"></div></div></div>
           <div  class="answers"><div  id="5" class="answ"> ОФОРМЛЕНИЕ ПОСТАНОВЛЕНИЯ НА ПОСТАЯННОЕ ЖИТЕЛЬСТВО (ПМЖ)- </div><div class="answ1"><div id="answ22"></div></div></div> 
          <div  class="answers"><div  id="6" class="answ">ОФОРМЛЕНИЕ ВЫХОДА ИЗ ГРАЖДАНСТВА РЕСПУБЛИКИ УЗБЕКИСТАН- </div><div class="answ1"><div id="answ22"></div></div></div>
      </div>
      
      <div class="question" >
       <div class="number">3</div>
       <!-- 3-chi savol  -->
       <h3> Как узнали о сайте интерактивных услуг МИД "consul.mfa.uz"? </h3>
          <div class="variants">
        <div class="variant"><label> <input type="radio" name="myradio2" value="1"  class="input_radio"  tabindex="-1" />на веб-сайте МИД "www.mfa.uz" </label> </div>
            <div class="variant"><label> <input type="radio" name="myradio2" value="2"  class="input_radio" tabindex="-1" />от сотрудников МИД</label></div>
             <div class="variant"><label> <input type="radio" name="myradio2" value="3"  class="input_radio" tabindex="-1" />от сотрудников посольств и консульств Узбекистан
</label></div>
            <div class="variant"><label> <input type="radio" name="myradio2" value="4"  class="input_radio" tabindex="-1" />от друзей </label></div>
             <div class="variant"><label> <input type="radio" name="myradio2" value="5"  class="input_radio" tabindex="-1" />другие источники </label></div>
          </div>
         <!-- 3-chi savolga javoblar -->
          <div  class="answers"><div id="Yangilik" class="answ" >на веб-сайте МИД "www.mfa.uz" - </div><div  class="answ1"><div  id="answ11" ></div></div></div> 
            <div  class="answers"><div id="Sayt" class="answ">от сотрудников МИД - </div><div  class="answ1">	<div  id="answ12"></div></div></div> 
            <div  class="answers"><div  id="Poisk" class="answ">от сотрудников посольств и консульств Узбекистан - </div>	<div class="answ1"><div  id="answ13"></div></div></div> 
            <div  class="answers"><div  id="Tanish" class="answ">от друзей - </div><div class="answ1">	<div  id="answ14"></div></div></div> 
            <div  class="answers"><div  id="Tanish" class="answ">другие источники  - </div><div class="answ1">	<div  id="answ14"></div></div></div> 
    
   
    <div class="question" >
       <div class="number">4</div>
       <!-- 4-chi savol  -->
       <h3> Как, по Вашему мнению, можно улучшить процесс оказания интерактивных услуг? </h3>
          <div class="variants">
        <div class="variant"><label> <input type="radio" name="myradio2" value="1"  class="input_radio"  tabindex="-1" /> необходимо широко освещать в СМИ
 </label> </div>
            <div class="variant"><label> <input type="radio" name="myradio2" value="2"  class="input_radio" tabindex="-1" />усовершенствовать веб-сайт
</label></div>
             <div class="variant"><label> <input type="radio" name="myradio2" value="3"  class="input_radio" tabindex="-1" />добавить дополнительные функции
</label></div>    
       <div class="variant"><label> <input type="radio" name="myradio2" value="3"  class="input_radio" tabindex="-1" />устранить проблемы при открытии/загрузке веб-сайта

</label></div> 
          </div>
         <!-- 4-chi savolga javoblar -->
          <div  class="answers"><div id="Yangilik" class="answ" >необходимо широко освещать в СМИ
 </label> </div> - </div><div  class="answ1"><div  id="answ11" ></div></div></div> 
            <div  class="answers"><div id="Sayt" class="answ">усовершенствовать веб-сайт - </div><div  class="answ1">	<div  id="answ12"></div></div></div> 
            <div  class="answers"><div  id="Poisk" class="answ">добавить дополнительные функции - </div>	<div class="answ1"><div id="answ13"></div></div></div> 
           <div  class="answers"><div  id="Poisk" class="answ">устранить проблемы при открытии/загрузке веб-сайта
 - </div>	<div class="answ1"><div id="answ13"></div></div></div>    
            </div>
 
          <div class="question" >
       <div class="number">5</div>
       <!-- 5-chi savol  -->
       <h3> Вы удовлетворены с оказанными услугами? </h3>
          <div class="variants">
        <div class="variant"><label> <input type="radio" name="myradio2" value="1"  class="input_radio"  tabindex="-1" />Да </label> </div>
            <div class="variant"><label> <input type="radio" name="myradio2" value="2"  class="input_radio" tabindex="-1" />Нет</label></div>
                   
          </div>
         <!-- 5-chi savolga javoblar -->
          <div  class="answers"><div id="Yangilik" class="answ" >Да - </div><div  class="answ1"><div  id="answ11" ></div></div></div> 
            <div  class="answers"><div id="Sayt" class="answ">Нет - </div><div  class="answ1">	<div  id="answ12"></div></div></div> 
            </div></div></div> 
    </div>


          <div class="question" >
       <div class="number">6</div>
       <!-- 6-chi savol  -->
       <h3> Какие есть у Вас есть предложение? </h3>
          <div class="variants">
         <div class="answer"><textarea  id="quest" name="quest" class="textarea" rows="4" ></textarea></div>
          </div>
         <!-- 6-chi savolga javoblar -->
          <div  class="answers">	<div  id="jtext" class="answ">Направившие свое мнение - </div><div  class="answ1"><div  id="answ31"></div></div></div> 
    </div>

     <div class="survey_submit">
       <input  type="submit" class="submit" name="submit" value="Отправка" />
     </div>
  <!--   <input type="hidden" name="ip" value="<?php  $_SERVER['HTTP_CLIENT_IP']; ?>"  /> -->
    </form>
   </div>
    
  <div class="survey_message">
   <br>
   <span></span>
<div id="survey_message">Вы уже принимали участие в опросе.</div>
</div>
   
    <script type="text/javascript">
  $(document).ready(function($)     
  {
  	  if($('#ses_user_survey').val() !='' )
      {
      		 $.ajax({
		type: "POST",
		url:  "oprosj.php",
		success: showResponse
                  });
      	
     }
  		$(".submit").css( 'display','none');  
  		$(".input_radio").click(function(e){ 
  		   $(".submit").css( 'display','block');
  		});
  		
  	var options = {
		type: "POST",
	//	target: '#htmlTarget',
	//	beforeSerialize: beforeSerialize,
	//	beforeSubmit:  showRequest,
		success: showResponse,
		url:  "oprosj.php"
	              };	
      $('#survey_form').submit(function() {
         	$('#survey_form').ajaxSubmit(options);
  	return false;
   	});
   	    //После получения ответа
       function showResponse(res){
      //       stopLoadingAnimation();
     $data = $.parseJSON(res);
      $('.survey_message span').html('Всего голосов:: '+$data.count); 
      
      $pr =$data.alo*100/$data.count;
       $pr =$pr.toFixed(1);   
      $('div[id=alo]').text('Отлично - '+$pr+'%'); 
       $('#answ11').css('width',$pr*5);
       
       $pr =$data.yahshi*100/$data.count;
       $pr =$pr.toFixed(1);   
      $('div[id=yahshi]').text('Хорошо - '+$pr+'%'); 
       $('#answ12').css('width',$pr*5);

       $pr =$data.qoniqarli*100/$data.count; 
       $pr =$pr.toFixed(1);   
      $('div[id=qoniqarli]').text('Нормально - '+$pr+'%'); 
       $('#answ13').css('width',$pr*5);

       $pr =$data.yomon*100/$data.count;
       $pr =$pr.toFixed(1);   
      $('div[id=yomon]').text('Плохо - '+$pr+'%'); 
       $('#answ14').css('width',$pr*5);
        
        $pr =$data.ha*100/$data.count;
       $pr =$pr.toFixed(1);   
      $('div[id=ha]').text('Да - '+$pr+'%'); 
       $('#answ21').css('width',$pr*5);
     
         $pr =$data.yoq*100/$data.count;
       $pr =$pr.toFixed(1);   
      $('div[id=yoq]').text('Нет - '+$pr+'%'); 
       $('#answ22').css('width',$pr*5);
       
           $pr =$data.jtext*100/$data.count;
       $pr =$pr.toFixed(1);   
      $('div[id=jtext]').text('Ответили - '+$pr+'%'); 
       $('#answ31').css('width',$pr*5);
     
          $('.answers').css('display','block');
          $('.variants').css('display','none');   
          $('.variants').css('display','none');   
          $(".submit").css( 'display','none'); 
           $('.survey_message').css('display','block');
          return;
  }
 }); 
 </script>                        
</body>
</html>
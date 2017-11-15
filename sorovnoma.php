<!DOCTYPE HTML>
<html>
<head>
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
                   <h2>So`rovnoma</h2>
  <div class="survey_view">
        <!-- So`rovnoma formasi -->
         <form id="survey_form"  enctype="multipart/form-data">
              
    <div class="survey_questions">
      <!-- 1-chi savol -->
     <div class="question"">
        <div class="number">1</div>
        <h3> Bizning yangi  interaktiv saytga  munosabatingiz?  </h3>
            <div class="variants">
                  <div class="variant"><label><input type="radio" name="myradio1"  value="alo"            class="input_radio"  tabindex="-1" />A`lo </label></div>
                  <div class="variant"><label><input type="radio"  name="myradio1" value="yahshi"       class="input_radio"  tabindex="-1" />Yahshi </label></div>
                  <div class="variant"><label><input type="radio"  name="myradio1" value="qoniqarli"  class="input_radio"  tabindex="-1" />Qoniqarli </label></div>
                  <div class="variant"><label><input type="radio"  name="myradio1" value="yomon"      class="input_radio"  tabindex="-1" />Yomon </label></div></div>
             <!--  1-chi savolga javoblar -->
            <div  class="answers"><div id="alo" class="answ" >A`lo - </div><div  class="answ1"><div  id="answ11" ></div></div></div> 
            <div  class="answers"><div id="yahshi" class="answ">Yahshi - </div><div  class="answ1">	<div  id="answ12"></div></div></div> 
            <div  class="answers"><div  id="qoniqarli" class="answ">Qoniqarli - </div>	<div class="answ1"><div  id="answ13"></div></div></div> 
            <div  class="answers"><div  id="yomon" class="answ">Yomon - </div><div class="answ1">	<div  id="answ14"></div></div></div> 
      </div>
         
     <div class="question">
           <div class="number">2</div>
             <!-- 2-chi savol  -->
         <h3>  Tashqi ishlar vazirligining qanday xizmatlarini ineraktiv ko`rinishga keltirishni istardingiz? </h3>
          <div class="variants">
            <div class="variant"><label> <input type="radio" name="myradio2" value="1"  class="input_radio"  tabindex="-1" />O`ZBEKISTONDAN HUJJATLARNI SO`RAB OLISH </label> </div>
            <div class="variant"><label> <input type="radio" name="myradio2" value="2"  class="input_radio" tabindex="-1" />TUG`ILGANLIK HAQIDAGI GUVOHNOMA RASMIYLASHTIRISH</label></div>
             <div class="variant"><label> <input type="radio" name="myradio2" value="3"  class="input_radio" tabindex="-1" />NIKOH TUZILGANLIGINI QAYD ETISH</label></div>
            <div class="variant"><label> <input type="radio" name="myradio2" value="4"  class="input_radio" tabindex="-1" />XORIJGA CHIQISH UCHUN RUXSAT YOZUVINI RASMIYLASHTIRISH </label></div>
            <div class="variant"><label> <input type="radio" name="myradio2" value="5"  class="input_radio" tabindex="-1" />XORIJGA DOIMIY YASHASHGA CHIQISH YOZUVINI RASMIYLASHTIRISH </label></div>       
              <div class="variant"><label> <input type="radio" name="myradio2" value="6"  class="input_radio" tabindex="-1" />O`ZBEKISTON RESPUBLIKASI FUQOROLIGIDAN CHIQISHNI RASMIYLASHTIRISH</label></div> 
            </div>
            <!-- 2-chi savolga javoblar -->
          <div  class="answers">	<div   id="1" class="answ">O`ZBEKISTONDAN HUJJATLARNI SO`RAB OLISH - </div><div  class="answ1"><div  id="answ21"></div></div></div> 
          <div  class="answers"><div  id="2" class="answ">TUG`ILGANLIK HAQIDAGI GUVOHNOMA RASMIYLASHTIRISH- </div><div class="answ1"><div id="answ22"></div></div></div> 
          <div  class="answers"><div  id="3" class="answ">NIKOH TUZILGANLIGINI QAYD ETISH- </div><div class="answ1"><div id="answ22"></div></div></div> 
          <div  class="answers"><div  id="4" class="answ">XORIJGA CHIQISH UCHUN RUXSAT YOZUVINI RASMIYLASHTIRISH- </div><div class="answ1"><div id="answ22"></div></div></div>
           <div  class="answers"><div  id="5" class="answ">XORIJGA DOIMIY YASHASHGA CHIQISH YOZUVINI RASMIYLASHTIRISH- </div><div class="answ1"><div id="answ22"></div></div></div> 
          <div  class="answers"><div  id="6" class="answ">O`ZBEKISTON RESPUBLIKASI FUQOROLIGIDAN CHIQISHNI RASMIYLASHTIRISH- </div><div class="answ1"><div id="answ22"></div></div></div>
      </div>
      
      <div class="question" >
       <div class="number">3</div>
       <!-- 3-chi savol  -->
       <h3> Siz TIV interaktiv xizmatlari mavjudligi to`g`risida qanday bildingiz? </h3>
          <div class="variants">
        <div class="variant"><label> <input type="radio" name="myradio2" value="1"  class="input_radio"  tabindex="-1" />Yangiliklar orqali </label> </div>
            <div class="variant"><label> <input type="radio" name="myradio2" value="2"  class="input_radio" tabindex="-1" />Boshqa saytlardan</label></div>
             <div class="variant"><label> <input type="radio" name="myradio2" value="3"  class="input_radio" tabindex="-1" />Qidiruv tizimlari orqali</label></div>
            <div class="variant"><label> <input type="radio" name="myradio2" value="4"  class="input_radio" tabindex="-1" />Tanishlarim oraqli </label></div>
          </div>
         <!-- 3-chi savolga javoblar -->
          <div  class="answers"><div id="Yangilik" class="answ" >Yangiliklar orqali - </div><div  class="answ1"><div  id="answ11" ></div></div></div> 
            <div  class="answers"><div id="Sayt" class="answ">Boshqa saytlardan - </div><div  class="answ1">	<div  id="answ12"></div></div></div> 
            <div  class="answers"><div  id="Poisk" class="answ">Qidiruv tizimlari orqali - </div>	<div class="answ1"><div  id="answ13"></div></div></div> 
            <div  class="answers"><div  id="Tanish" class="answ">Tanishlarim oraqli - </div><div class="answ1">	<div  id="answ14"></div></div></div> 
    
   
    <div class="question" >
       <div class="number">4</div>
       <!-- 4-chi savol  -->
       <h3> Interaktiv xizmatlardan foydalanishdagi asosiy muammo nimada deb o`ylaysiz ? </h3>
          <div class="variants">
        <div class="variant"><label> <input type="radio" name="myradio2" value="1"  class="input_radio"  tabindex="-1" />Muammo yoq </label> </div>
            <div class="variant"><label> <input type="radio" name="myradio2" value="2"  class="input_radio" tabindex="-1" />Foydalanish tartibini yaxshiroq tanishtirish</label></div>
             <div class="variant"><label> <input type="radio" name="myradio2" value="3"  class="input_radio" tabindex="-1" />Ko`rsatilgan xizmat bo`yicha natijani ko`rishni rivojlantirish</label></div>           
          </div>
         <!-- 4-chi savolga javoblar -->
          <div  class="answers"><div id="Yangilik" class="answ" >Muammo yoq - </div><div  class="answ1"><div  id="answ11" ></div></div></div> 
            <div  class="answers"><div id="Sayt" class="answ">Foydalanish tartibini yaxshiroq tanishtirish - </div><div  class="answ1">	<div  id="answ12"></div></div></div> 
            <div  class="answers"><div  id="Poisk" class="answ">Ko`rsatilgan xizmat bo`yicha natijani ko`rishni rivojlantirish - </div>	<div class="answ1"><div id="answ13"></div></div></div> 
            </div>
 
          <div class="question" >
       <div class="number">5</div>
       <!-- 5-chi savol  -->
       <h3> Konsullik xizmatlaridan qoniqdingizmi? </h3>
          <div class="variants">
        <div class="variant"><label> <input type="radio" name="myradio2" value="1"  class="input_radio"  tabindex="-1" />Xa </label> </div>
            <div class="variant"><label> <input type="radio" name="myradio2" value="2"  class="input_radio" tabindex="-1" />Yo`q</label></div>
             <div class="variant"><label> <input type="radio" name="myradio2" value="3"  class="input_radio" tabindex="-1" />O`rtacha</label></div>           
          </div>
         <!-- 5-chi savolga javoblar -->
          <div  class="answers"><div id="Yangilik" class="answ" >Xa - </div><div  class="answ1"><div  id="answ11" ></div></div></div> 
            <div  class="answers"><div id="Sayt" class="answ">Yo`q - </div><div  class="answ1">	<div  id="answ12"></div></div></div> 
            <div  class="answers"><div  id="Poisk" class="answ">O`rtacha- </div>	<div class="answ1"><div  id="answ13"></div></div></div> 
    </div>


          <div class="question" >
       <div class="number">6</div>
       <!-- 6-chi savol  -->
       <h3> Bizning interaktiv saytda qanday qo`shimchalar va o`zgartirishlar kiritishni taklif etasiz? </h3>
          <div class="variants">
         <div class="answer"><textarea  id="quest" name="quest" class="textarea" rows="4" ></textarea></div>
          </div>
         <!-- 6-chi savolga javoblar -->
          <div  class="answers">	<div  id="jtext" class="answ">Javob yozganlar - </div><div  class="answ1"><div  id="answ31"></div></div></div> 
    </div>
     <div class="survey_submit">
       <input  type="submit" class="submit" name="submit" value="Jo`natish" />
     </div>
  <!--   <input type="hidden" name="ip" value="<?php  $_SERVER['HTTP_CLIENT_IP']; ?>"  /> -->
    </form>
   </div>
    
  <div class="survey_message">
   <br>
   <span></span>
<div id="survey_message">So`rovnomada qatnashgansiz uchun raxmat!</div>
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
      $('.survey_message span').html('Umumiy ovozlar soni: '+$data.count); 
      
      $pr =$data.alo*100/$data.count;
       $pr =$pr.toFixed(1);   
      $('div[id=alo]').text('A`lo - '+$pr+'%'); 
       $('#answ11').css('width',$pr*5);
       
       $pr =$data.yahshi*100/$data.count;
       $pr =$pr.toFixed(1);   
      $('div[id=yahshi]').text('Yahshi - '+$pr+'%'); 
       $('#answ12').css('width',$pr*5);

       $pr =$data.qoniqarli*100/$data.count; 
       $pr =$pr.toFixed(1);   
      $('div[id=qoniqarli]').text('Qoniqarli - '+$pr+'%'); 
       $('#answ13').css('width',$pr*5);

       $pr =$data.yomon*100/$data.count;
       $pr =$pr.toFixed(1);   
      $('div[id=yomon]').text('Yomon - '+$pr+'%'); 
       $('#answ14').css('width',$pr*5);
        
        $pr =$data.ha*100/$data.count;
       $pr =$pr.toFixed(1);   
      $('div[id=ha]').text('Ha - '+$pr+'%'); 
       $('#answ21').css('width',$pr*5);
     
         $pr =$data.yoq*100/$data.count;
       $pr =$pr.toFixed(1);   
      $('div[id=yoq]').text('Yo`q - '+$pr+'%'); 
       $('#answ22').css('width',$pr*5);
       
           $pr =$data.jtext*100/$data.count;
       $pr =$pr.toFixed(1);   
      $('div[id=jtext]').text('Javob yozganlar - '+$pr+'%'); 
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
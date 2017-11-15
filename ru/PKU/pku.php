<!DOCTYPE HTML >
<html >
    <head>
	    <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
     <link href="css/pku.css" rel="stylesheet" type="text/css" />
     <link href="css/comment.css" rel="stylesheet" type="text/css" />    
  <style> 
 
  </style>   
      </head>
   

<?php
	include("function.php"); 
	include("count.php");
	include('../ru/db.php');
?>
  <body>
<div id="dialog" class='ui-dialog'></div>
<input  id="ses_name" type="hidden"  value = "<?php  echo $_SESSION['login'];?>" />

       <h2 >Регистрационная карточка граждан Республики Узбекистан <span>постоянно</span> проживающих за границей</h2>
            <br/>
     <div id="wrapper1">

   <form id="formElem" name="formElem" action="" method="post">  
 <input type="radio" checked="checked" name="tab" id="tab-1"/>  
 <label for="tab-1" id="tab-label-1">Основные данные</label>    
 <input type="radio" name="tab" id="tab-2"/>
<label for="tab-2" id="tab-label-2">Паспорт</label>
<input type="radio" name="tab" id="tab-3"/>
<label for="tab-3" id="tab-label-3">Место рождения</label>
<input type="radio" name="tab" id="tab-4"/>
<label for="tab-4" id="tab-label-4">Место жительство в Узбекистане  </label>
<input type="radio" name="tab" id="tab-5"/>
<label for="tab-5" id="tab-label-5">Допольнителные данные </label>

<div class="content-article">

 <div class="block2" >
<fieldset>
<article   class="tab-1" > <?php include "pku/pku1.php"; ?> </article>

<article  class="tab-2"> <?php include "pku/pku3.php"; ?></article>

<article  class="tab-3"> <?php include "pku/pku2.php"; ?></article>

<article  class="tab-4"> <?php include "pku/pku4.php"; ?></article>

<article  class="tab-5"> <?php include "pku/pku5.php"; ?></article>
</fieldset>
</div>


	 <div class="block3">
			<div class="block1" id="uploadOutput"> </div>
     <div class="photo">
     <div>Фото...</div>
        <input  size="1" class="fileupl" type="file" name="fileToUpload" id="fileToUpload" value="#"  onchange="ajaxUpload(this.form,'photo_upload.php', ''); return false;"/>
    </div>
    <!--<div><input id="fileup" name="fileup" type="hidden" value="  "></div>-->
         </div>
       
<br /><br />
 <br />
 

 <div class="chck" >
 <div id="captcha">
  <input type="checkbox" id="c1" name="captcha" />
 <label for="c1"><span class="class_span"></span> - Я, не робот</label>	
 </div>
  <br /><br /> 
  <div class="question_answer">
<button id="registerButton2" type="submit" >Загрузка (печать) анкеты</button>
 </div>
                     <div id="anketa_res">
     <p >
      <span>Topshirilgan anketa</span> holatini ko`rish uchun <span> ID </span>ni kiriting
      </p> <!-- dan kamida <span>8 </span>ta simvolni-->
                    <input id='anketa'   name='anketa'  maxlength='32' 
                    <p >
 <a id="usl_o" class="btn1 " >Ok</a>
</p> 
                    </div>
 </div> <!--class="chck"-->
  </div><!--content-article-->
     <input id="result" name="result"/> 
</form>

</div><!--wrapper1-->

<div id="rating"><div id="baho"></div>
<div><div class="stars"></div><p class="progress" id="p1"></p></div>
<div class="rating" id="param1">0.0</div>
<p >
 <a id="usl_3" class="btn " >Оценить</a>
</p>
<!--<div id="comments">
<p >
 <a href="comments.php" target="_blank">Izoh qoldirish</a>
</p>
</div>-->
<br />
</div> 
<br/><br/>
<div id='htmlTarget'>  </div>
<img id="loadImg" src="images/loading.gif" />


<div class="popup_overlay"></div>        <!--GIF animatsia uchun-->
<div class="popup">
  <div class="popup_title">
    So`rov natijasi <span class="closer">X</span>
  </div>
  <div class="popup_content">
    <p id="z_id"></p>
    <p id="javob"> </p>
  </div>
</div>

  <?php
      	$sql= mysql_query("SELECT COUNT(id) as cc from comments where moder =1");
         $arr = mysql_fetch_array($sql); 
          echo '<header>Комментарии пользователей: <span>'.$arr['cc'].' </span></header>';

     echo '<div class="comments">';     
       $select = mysql_query("SELECT  id,nomi,text_com,sana  FROM comments where moder =1 order by sana  DESC")   or die(mysql_error());
         while(list($id,$nomi,$text_com,$sana) = mysql_fetch_row($select))
       {
       echo '<div class="comm_head">';      	
       echo '<div class="comm_name">'.$nomi.'</div>';      	
       echo '<div class="comm_date">'.$sana.'</div>';
       echo '</div>';
       echo '<div class="comm_body">'; 
       echo '<div class="comm_text">'.$text_com.'</div>';
       echo '</div>';
       }
      echo '</div>'; 
 ?>

 <p id="RO_eslat">Оставить комментарий</p>
  <div class="add_comm">
Оставить комментарий:
<textarea rows="10" cols="68" name="user_text"  ></textarea>
<div class="c_right">
<input  type="button" id="comm_send"  value="Jo`natish"></div>
</div>
<p id="eslat">Все Ваши комментарии обязательно проходят модерацию.</p>


   <script type="text/javascript">
  $(document).ready(function($)
   {
   	 	$('.add_comm').hide();
   	$('#eslat').hide();
   	
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
   
  $('#fileToUpload').val('');
    
    	$("#formElem").keypress(function(e) {   
      	if(e.keyCode ==13) {
      		e.preventDefault();
       		return false;}
    });
  $("#fam,#famk,#sharifk,#ism,#ismk,#sharif,#tugkun,#oblast,#rayon1,#seriya,#nomer,#vidanDay,#muddatDay, #kem,#home,#korpus,#flat,#adress_uz,#kelDay,#vr_adress,#asos").val('');
  $("#nation").val('44');
  $("#jins").val('1');
  $("#strana").val('182');
  $("#oila,#oblast,#rayon1,#rayon2,#selectPlaces,#selectStreet,#elchixona,#doc_div").val('0');
  $("#for_strana").val('-1');
  $("#doc_tip").val('46');
   $("#oblast2").val('10');
    $("#oblast ").removeAttr("disabled");
    $("#rayon1").removeAttr("disabled"); 
  
   $("#tugkun").mask("99.99.9999", {placeholder: "дд.мм.гггг" });
   $("#vidanDay").mask("99.99.9999", {placeholder: "дд.мм.гггг" });
   $("#muddatDay").mask("99.99.9999", {placeholder: "дд.мм.гггг" });
   $("#kelDay").mask("99.99.9999", {placeholder: "дд.мм.гггг" });
 
 $("#result").val('');
 
     $('#tugkun,#kelDay,#vidanDay,#muddatDay').blur(function() {
     	var id = $(this).attr('id');
        var val = $(this).val();
        proverka_date(id,val);
    });
      //     
     $('input#fam,input#ism,input#adress_uz,input#vr_adress,input#seriya,input#nomer,input#asos').unbind().blur( function(){
         var id = $(this).attr('id');
         var val = $(this).val();
           switch(id)
       {
         case 'fam':
         case 'ism':
         case 'adress_uz':
         case 'vr_adress':
         case 'seriya':
         case 'nomer':
         case 'asos':
          if(val != '')
          {
            $(this).removeClass('error').addClass('not_error');
          //   $(this).css('background-color','#FFFFFF');
           }
          else
                {   
                   $(this).removeClass('not_error').addClass('error');
               //     $(this).css('background-color','#FFEFEF');
                }
       } // end switch(...)
     });
     //
       $('#oblast,#rayon2,#for_strana,#elchixona').blur(function() {
     	var id = $(this).attr('id');
        var val = $(this).val();
        proverka_spisok(id,val);   
    });
   
$('#htmlTarget').hide();
$('#result').hide();
$('#anketa_res').hide();
$('#registerButton2').attr('disabled', true);
        
 var options = {
		type: "POST",
		beforeSerialize: beforeSerialize,
		beforeSubmit:  showRequest,
		success: showResponse,
		url:  "PKU/upPku.php"
	              };

	$('#formElem').submit(function() {
         	$('#formElem').ajaxSubmit(options);
  	return false;
   	});
 
       // 
        function beforeSerialize($form, options) {
     	      var val = $('#doc_div').val();
     	      var val1 = $('#kem').val();
     	 if((val > 0)||(val1.length >0)) 
     	 {
     	           $('#doc_div' ).removeClass('error').addClass('not_error'); 
     	           $('#kem' ).removeClass('error').addClass('not_error'); 
     	 }
     	           else
  	           	 {
     	           $('#doc_div' ).removeClass('not_error').addClass('error'); 
     	           $('#kem' ).removeClass('not_error').addClass('error'); 
     	                    }
  	 return true;
}
        // До отправки
        function showRequest(formData, jqForm, options) { 
    //    var queryString = $.param(formData);	alert(queryString); 
         if($('input#fileToUpload').val() == '')
	 {  
	MyAlert('Фото обязательно!', 'Ошибка');
	return false;	
	}

	 if($('.error').length > 0)
        {
            MyAlert( 'Обнаружены ' + $('.error').length+ ' ошибок!','Уведомление');
		  return false;
          }
           else
{
     $('#registerButton2').attr('disabled', true);
      startLoadingAnimation();
    	     return true;
    	     }
        }  
  
       //После получения ответа
       function showResponse(res){
             stopLoadingAnimation();
   //    
       $('.class_span').css({ 'background-image': 'none' });
       $('#registerButton2').attr('disabled', true);
        if(res == -1)
        {
          MyAlert('Подтвердите, что Вы не робот!','Ошибка');
          return;
          }
        if(res == -2)
        {
        MyAlert('Подтвердите, что Вы не робот!','Ошибка');
          return;	
	}
	    if(res == -3)
        {
  MyAlert('Ошибка при записи в базу данных!','Проверьте данные');
          return;	
	}
   
     //MyAlert(res,'');
    	   	  //window.location.href  =  res;
 	   	  window.open(res, '_blank');
  }
 
 $('#c1').click(function(e){ 
    $('#c1').is(':checked') ? true : false;
    if($("#c1").is(':checked')) 
 {
  var fam =  $('#fam').val();
  var ism =  $('#ism').val();
   if((fam=='')||(ism==''))    return;
    { 
    $('.class_span').css({'background-image':'url(/ru/images/ajax-loader_snake_20.gif ', 'backgroundRepeat': 'no-repeat'});
    $('#registerButton2').attr('disabled', true);
    $.post('/ru/generator.php',{a: fam,b: ism},function(data){
      	$('#result').val(data);
        $('.class_span').css({'background-image':'url(/ru/images/s3.png ', 'backgroundRepeat': 'no-repeat'});  	
        $('#registerButton2').attr('disabled', false);
      	});
    }
    }
   else 
   {
       $('.class_span').css({ 'background-image': 'none' });
       $('#registerButton2').attr('disabled', true);
       }
 })

//////
 function move(e, obj){
    var summ=0;
 //   var id = obj.next().attr('id').substr(1);
    var progress = e.pageX - obj.offset().left; 
    var rating = progress * 5 / $('.stars').width();
    $('#param1').text(rating.toFixed(1));
    obj.next().width(progress);
  //  $('.rating').each(function(){ summ += parseFloat($(this).text()); });
 //   summ = summ / $('.rating').length;
  //  $('#sum_progress').width(Math.round($('.stars').width() * summ / 5));
  //  $('#summ').text(summ.toFixed(2));
 }

 $('#rating .stars').click(function(e){
    $(this).toggleClass('fixed');
    move(e, $(this));
 });

$('#RO_eslat').click(function(e){
	  if($('#ses_name').val()=='')
	  MyAlert("Комментарии могут оставить только зарегистрированные пользователи!","Предупреждение");
          // else
	  //   window.open('comments/comments.php', '_blank');
	   });
$('#comm_send').click(function(e){
	var text = $('.add_comm textarea').val();
	if(text == '')
		return false;
	$.ajax({
		type: "POST",
		beforeSend:  startLoadingAnimation(),
		data: 'nomi='+$('#ses_name').val()+'&text='+text,
		url:  "/ru/writeComment.php",
		success: function(e){
			stopLoadingAnimation();
		MyAlert('Ваше комментарий отправлено.','Результат');
			$('.add_comm textarea').val('');
			}
                  });
	});

 $('#rating .stars').mousemove(function(e){ 
    if ($(this).hasClass('fixed')==false) 
       move(e, $(this));
    
 });

 $('#usl_3').click(function(){ 
    summ = parseFloat($('#param1').text());
    jQuery.post('change_rating.php', {
        usl_id: "usl_3",
        rating: summ
    }, notice);
 });

 //Javob olish
    $('#usl_o').click(function(){
   	$z_id = $('#anketa').val();
   	$a= "name="+$z_id +"&id=1"; 
   if($z_id != '')   {
   	startLoadingAnimation();
    $.get("SERT/otvet.php",$a, function(answer){
           $n=answer.indexOf('#');
        ID = answer.substring(0,$n);
   	$('#z_id').html(ID);
   	 $s=answer.substring($n+1);
         $("#javob").html($s);
                 stopLoadingAnimation();   
    $('.popup,.popup_overlay').fadeIn(400); 
    $('.closer,.popup_overlay').click(function(){
    $('.popup,.popup_overlay').fadeOut(400); }
                                                          )               } );
                       }
});	

function startLoadingAnimation() // - функция запуска анимации
{
 var imgObj = $("#loadImg");
  imgObj.show();
   // вычислим в какие координаты нужно поместить изображение загрузки,
  // чтобы оно оказалось в серидине страницы:
  var centerY = $(window).scrollTop() + ($(window).height() + imgObj.height())/2;
  var centerX = $(window).scrollLeft() + ($(window).width() + imgObj.width())/2;
   // поменяем координаты изображения на нужные:
  imgObj.offset({top:centerY, left:centerX});
}
function stopLoadingAnimation() // - функция останавливающая анимацию
{
  $("#loadImg").hide();
}


   function notice(text){
    MyAlert(text,'Результат');
   // $('#message').fadeOut(200, function(){ $(this).text(text); }).fadeIn(200);
 }   
//
  });  
   </script>
   
 </body>

</html>

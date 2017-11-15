<!DOCTYPE HTML >
<html >
    <head>
	    <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
     <link href="css/sert.css" rel="stylesheet" type="text/css" />
     <link href="css/comment.css" rel="stylesheet" type="text/css" />    
    
      </head>
   

<?php
	include("function.php"); 
	include("count.php");
	include('../uz/db.php');
?>
  <body>
<div id="dialog" class='ui-dialog'></div>
 <input  id="ses_name" type="hidden"  value = "<?php  echo $_SESSION['login'];?>" />

     <h2 >Sertifikat olish uchun hujjatlarni tayyorlashda shaxsiy ma`lumotlarni kiritish</h2>
            <br/>
     <div id="wrapper1">

   <form id="formElem" name="formElem" action="" method="post">  
 <input type="radio" checked="checked" name="tab" id="tab-1"/>  
 <label for="tab-1" id="tab-label-1">Asosiy ma`lumotlar</label>    
 <input type="radio" name="tab" id="tab-2"/>
<label for="tab-2" id="tab-label-2">Tug`ilgan joyi</label>
<input type="radio" name="tab" id="tab-3"/>
<label for="tab-3" id="tab-label-3">Pasport</label>
<input type="radio" name="tab" id="tab-4"/>
<input type="radio" name="tab" id="tab-5"/>
<label for="tab-5" id="tab-label-5">O`zbekistonda yashash(gan) joyi </label>
<input type="radio" name="tab" id="tab-6"/>
<label for="tab-6" id="tab-label-6">Qoshimcha ma`lumotlar </label>

<div class="content-article">

 <div class="block2" >
<fieldset>
<article   class="tab-1" > <?php include "sert/step1.php"; ?> </article>

<article  class="tab-2"> <?php include "sert/step2.php"; ?></article>

<article  class="tab-3"> <?php include "sert/step3.php"; ?></article>

<article  class="tab-5"> <?php include "sert/step5.php"; ?></article>

<article  class="tab-6"> <?php include "sert/step6.php"; ?></article>
</fieldset>
</div>


	 <div class="block3">
			<div class="block1" id="uploadOutput"> </div>
     <div class="photo">
     <div>Surat...</div>
        <input  size="1" class="fileupl" type="file" name="fileToUpload" id="fileToUpload" value="#"  onchange="ajaxUpload(this.form,'photo_upload.php', ''); return false;"/>
    </div>
    <!--<div><input id="fileup" name="fileup" type="hidden" value="  "></div>-->
         </div>
       
<br /><br />
 <br />
 

 <div class="chck" style="width:550px">
 <div id="captcha">
  <input type="checkbox" id="c1" name="captcha" />
 <label for="c1"><span class="class_span"></span> - Men, robot emasman</label>	
 </div>
  <br /><br /> 
  <div class="question_answer">
<button id="registerButton2" type="submit" >Anketani yuklab olish (Chop etish)</button>
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

<div style="margin: 210px 100px 0 555px;">
<img src="./sert/saytt-uzb.jpg" weight="250" height="250">
</div>


     <input id="result" name="result"/> 
</form>

</div><!--wrapper1-->

<div id="rating"><div id="baho"></div>
<div><div class="stars"></div><p class="progress" id="p1"></p></div>
<div class="rating" id="param1">0.0</div>
<p >
 <a id="usl_1" class="btn " >Baholash</a>
</p>

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
          echo '<header>Foydalanuvchilarning izohlari: <span>'.$arr['cc'].' ta</span></header>';

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

 <p id="RO_eslat">Izoh qoldirish</p>
  <div class="add_comm">
Izoh qoldirish:
<textarea rows="10" cols="68" name="user_text"  ></textarea>
<div class="c_right">
<input  type="button" id="comm_send"  value="Jo`natish"></div>
</div>
<p id="eslat">Sizning barcha izohlaringiz moderatsiyadan o`tadi.</p>



   <script type="text/javascript">
  $(document).ready(function($)     
   {
   
	//alert("keldi");   
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
   
  /////	
  $('#fileToUpload').val('');
    
   $("#formElem").keypress(function(e) {   
      	if(e.keyCode ==13) {
      		e.preventDefault();
       		return false;}
    });
  

$("#famk,#sharifk,#ismk,#sharif,#tugkun,#oblast,#rayon1,#tugjoy_lat,#seria,#nomer,#vidanDay,#kem,#home,#korpus,#flat,#kelDay,#vr_adress,#vozvratDay").val('');
  $("#nation").val('44');
  $('#fam').val('<?php echo $_SESSION['sur_name']; ?>');
  $('#ism').val('<?php echo $_SESSION['first_name']; ?>');
  $('#adress_uz').val('<?php echo $_SESSION['per_adr']; ?>');
  $('#kem').val('<?php echo $_SESSION['pport_issue_place']; ?>');
  $("#jins,#oila,#sabab").val('1');
  $("#strana").val('182');
  $("#oblast,#rayon1,#rayon2,#selectPlaces,#selectStreet,#maqsad,#elchixona").val('0');
  $("#for_strana").val('-1');
  $("#doc_tip").val('46');
   $("#oblast2").val('10');
    $("#oblast ").removeAttr("disabled");
    $("#rayon1").removeAttr("disabled"); 
  
   $("#tugkun").mask("99.99.9999", {placeholder: "kk.oo.yyyy" });
   $("#vidanDay").mask("99.99.9999", {placeholder: "kk.oo.yyyy" });
   $("#vozvratDay").mask("99.99.9999", {placeholder: "kk.oo.yyyy" });
   $("#kelDay").mask("99.99.9999", {placeholder: "kk.oo.yyyy" });
   $("#data_r").mask("99.99.9999", {placeholder: "kk.oo.yyyy" }); 
 
 $("#result").val(''); 
 
     $('#tugkun,#kelDay,#vozvratDay').blur(function() {
     	var id = $(this).attr('id');
        var val = $(this).val();
        proverka_date(id,val);
    });
      //     
       $('input#fam,input#ism,input#adress_uz,input#vr_adress').unbind().blur( function(){
         var id = $(this).attr('id');
         var val = $(this).val();
           switch(id)
       {
         case 'fam':
         case 'ism':
         case 'adress_uz':
         case 'vr_adress':
		// case 'job':
          if(val != '')
          {
		 //  if(id == 'job')    
			//   $('input#job').val(val.replace(/[^a-zA-Z �-��-߸� 0-9| |`-�]/g,''));     
          // if(id == 'vr_adress') 
		//   $('input#vr_adress').val(val.replace(/[^a-zA-Z �-��-߸� 0-9| |`-�]/g,''));
            $(this).removeClass('error').addClass('not_error');
          //   $(this).css('background-color','#FFFFFF');
           }
          else
                {  // if(id != 'job')
                   $(this).removeClass('not_error').addClass('error');
               //     $(this).css('background-color','#FFEFEF');
                }
       } // end switch(...)
     });
     //
       $('#oblast,#rayon2,#for_strana,#maqsad,#elchixona').blur(function() {
     	var id = $(this).attr('id');
        var val = $(this).val();
        proverka_spisok(id,val);
    });
  //  alert('bbbb');
$('#htmlTarget').hide();
$('#result').hide();
$('#registerButton2').attr('disabled', true);
        
 var options = {
		type: "POST",
	//	target: '#htmlTarget',
		beforeSerialize: beforeSerialize,
		beforeSubmit:  showRequest,
		success: showResponse,
		url:  "SERT/upSert.php"
	              };

	$('#formElem').submit(function() {
         	$('#formElem').ajaxSubmit(options);
  	return false;
   	});
 
       // 
        function beforeSerialize($form, options) {
  	 return true;
}
        // До отправки
        function showRequest(formData, jqForm, options) { 
    //    var queryString = $.param(formData);	alert(queryString); 
         if($('input#fileToUpload').val() == '')
	 {  
	MyAlert('Fotoni yuklash shart!', 'Xato');
	return false;	
	}

	 if($('.error').length > 0)
        {
            MyAlert( $('.error').length+ ' ta joyda xato bor!','Xabarnoma');
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
          MyAlert('Robot emasligingizni tasdiqlang!','Xato');
          return;
          }
        if(res == -2)
        {
        MyAlert('Robot emasligingizni qaytadan tasdiqlang!','Xato');
          return;	
	}
	    if(res == -3)
        {
        MyAlert('Bazaga yozishda xato!','Ma`lumot');
          return;	
	}
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
    $('.class_span').css({'background-image':'url(/uz/images/ajax-loader_snake_20.gif ', 'backgroundRepeat': 'no-repeat'});
    $('#registerButton2').attr('disabled', true);
    $.post('/uz/generator.php',{a: fam,b: ism},function(data){
      	$('#result').val(data);
        $('.class_span').css({'background-image':'url(/uz/images/s3.png ', 'backgroundRepeat': 'no-repeat'});  	
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
	  MyAlert("Ro`yxatdan o`tgan foydalanuvchilarga izoh qoldirish ruxsat etiladi!","Eslatma");
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
		url:  "/uz/writeComment.php",
		success: function(e){
			stopLoadingAnimation();
			MyAlert('Sizning izohingiz  jo`natildi.','Ma`lumotnoma');
			$('.add_comm textarea').val('');
			}
                  });
	});
 $('#rating .stars').mousemove(function(e){ 
    if ($(this).hasClass('fixed')==false) 
       move(e, $(this));
    
 });

 $('#usl_1').click(function(){ 
    summ = parseFloat($('#param1').text());
    jQuery.post('change_rating.php', {
        usl_id: "usl_1",
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
    MyAlert(text,'Natija');
   // $('#message').fadeOut(200, function(){ $(this).text(text); }).fadeIn(200);
 }   
//
  });  
   </script>
   
 </body>

</html>

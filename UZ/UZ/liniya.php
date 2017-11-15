<!DOCTYPE HTML>
<html>
<head>
<style>
	 h3{
            font-size:20px;
            text-shadow:1px 1px 1px #fff;
            padding:2px;
            text-align: center;
           color: #1479dd;
        }
        h3 span{
   	  color: #bb6920;
   	  }
   	  .mydiv{
   	  	width: 900px;
   	  	background-color: #eee;
	     margin: 0 auto;	
	}
	#form1{
		margin-left:  20px;
	}
	.data{
		width:  500px;
		font:16px "Trebuchet MS", tahoma, verdana, arial narrow,    arial; 
		margin-top: 5px;
	}
	.textarea{
		font:16px "Trebuchet MS", tahoma, verdana, arial narrow,    arial; 
		margin-top: 5px;
	}
	form  label{
		font:16px "Trebuchet MS", tahoma, verdana, arial narrow,    arial; 
		color: darkblue;
		padding: 5px 5px;
	}
	 #captcha{
	border: 1px solid darkred;
	padding: 10px;
	width: 270px;
	margin-left: 20px;
}
#result{
 float: left;
 width: 600px;
}  
input[id="c1"] {
    display:none;
 }
input[id="c1"] + label{
   margin-left: 10px; 
}
input[id="c1"] + label span{
display:inline-block;
width:22px;
margin-right: 5px;
height:22px;
vertical-align:middle;
border: 3px solid green;
cursor:pointer;
border-radius: 4px;
margin-left: 5px;
}
input[id="c1"]:checked + label span{
}

#yuborish {
    background: #4797ed none repeat scroll 0 0;
    border: medium none;
    border: 1px solid #4797ed;
    border-radius: 10px;
    box-shadow: 0 0 3px #aaa;
    clear: both;
    color: #fff;
    cursor: pointer;
    display: block;
   font:18px "Trebuchet MS", tahoma, verdana, arial narrow,    arial; 
    margin-left: 350px;
    outline: medium none;
    padding: 7px 20px;
    text-shadow: 0 1px 1px #777;
    }
 #yuborish:hover{
    background: #d8d8d8 none repeat scroll 0 0;
    color: #666;
    text-shadow: 1px 1px 1px #fff;
    border: 1px solid #4797ed
 }     
 .is-visible {
  visibility: visible;
  opacity: 1;
  -webkit-transition: opacity 0.3s 0, visibility 0 0;
  -moz-transition: opacity 0.3s 0, visibility 0 0;
  transition: opacity 0.3s 0, visibility 0 0;
   -webkit-transform: translateY(0);
  -moz-transform: translateY(0);
  -ms-transform: translateY(0);
  -o-transform: translateY(0);
  transform: translateY(0);
  }
  .has-error {
  border: 1px solid #d76666;
}
 .ui-dialog { position: fixed; padding: .1em; width: 300px; overflow: hidden; text-align: center;}
 /*input:invalid {
outline:2px solid red;
outline-offset:2px;
}*/
</style>

</head>

<?php
	include("db.php");
	include("function.php"); 
	include("count.php");
?>
<body>
<div id="dialog" class='ui-dialog'></div>
<input  id="ses_name" type="hidden"  value = "<?php  echo $_SESSION['login'];?>" />

<h3>Siz yashab turgan mamlakatingizda<span> yuzaga kelgan muammolaringizni </span>mazkur sahifa orqali <br/> O`zbekiston Respublikasi konsullik xizmatiga bildirishingiz mumkin</h3>
<div class="mydiv">
		  <form id="form1"  name="form1" method="post" >
	            <p>
		      <label>Xorijda duch kelgan muammolaringizni kiriting.<br/>
		      <textarea  class="textarea"  name="text"   cols="112" rows="8" ></textarea>
		      </label>
		    </p>
         <p>
		      <label> Ism sharifingiz<br>
   	          <input class="data"    name="fio"  id="fio"  type="text" size="40"   >
		      </label>
		    </p>
  	     <p>
  	           <label>Qaysi davlatdasiz?
		<br>
      <input class="data" name="davlat" type="text"  id="davlat"   size="40">
		       </label>
		       </p>
		    <p>
		      <label>Ushbu davlatdagi manzilingiz (telefon raqamingiz)<br>
   	          <input class="data"  name="manzil"  id="manzil"   type="text" size="40">
		      </label>
		    </p>
		    <p>
		      <label>Email adresingiz<br>
   	          <input class="data"   name="email"  id="email" type="text"    size="40">
   	          <span id="validEmail"></span>
              </label>  
		    </p>
	
    <label>"Spam"dan himoya<br>		    
    <div id="captcha">
  <input type="checkbox" id="c1" name="captcha" />
 <label for="c1"><span class="class_span"></span> - Men, robot emasman</label>	
 </div>
  <br /> 
             <p>
		      <label>
		      <input  id="yuborish"   type="button" name="Submit" value="Yuborish">
		      </label>
		    </p>

  <input id="result" name="result"/> 
  </form>
</div>
<img id="loadImg" src="images/loading.gif" />

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
   	$('#result').hide();
   	$('#loadImg').hide();
   	
      var yuborish = $('#yuborish');
     var textarea = $('.textarea');
     var fio = $('#fio');
     var davlat = $('#davlat');
     var manzil = $('#manzil');
     var email = $('#email');
     var result = $('#result');

      yuborish.click( function(){ 
	$.ajax({
		type: "POST",
		beforeSend:  showRequest,
		data: 'result='+result.val()+'&text='+textarea.val()+'&fio='+fio.val()+'&davlat='+davlat.val()+'&manzil='+manzil.val()+'&email='+email.val(),
		success: showResponse,
		url:  "../uz/addmsg.php"
	              });
  	});
   
   function showRequest() { 
      if(textarea.val()=='')  {
      	 MyAlert("Muammo haqida ma`lumot kiritish shart!",'Xato');
      	 return false;
      	};
      	  if(fio.val()=='')  {
      	 MyAlert("Ism  sharifingiz  haqida ma`lumot kiritish shart!",'Xato');
      	 return false;
      	};
    	  if(davlat.val()=='')  {
      	 MyAlert("Qaysi davlatdaligingiz  haqida ma`lumot kiritish shart!",'Xato');
      	 return false;
      	};
 	  if(manzil.val()=='')  {
      	 MyAlert("Turar joy manziligingiz  haqida ma`lumot kiritish shart!",'Xato');
      	 return false;
      	};

     var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
 	if(!pattern.test(email.val()))  
     {
  	MyAlert("Email adresni  to`g`ri kiriting!",'Xato');
      	 return false;
    }

       startLoadingAnimation();
    $('#form1').attr('disabled',true);
       	     return true;  
      }

 //После получения ответа
      function  showResponse(res){ 
          stopLoadingAnimation();
          $('#form1').attr('disabled',false);  
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
	 MyAlert(res, 'Natija');
	 textarea.val('');
          return;	
  }  
   
 ///////  	
   	$('#c1').click(function(e){ 
   	var fam = fio.val();
   	var ism = '';
                  $('#c1').is(':checked') ? true : false;
    if($("#c1").is(':checked')) 
 {
 	if(fam=='')    return;
     $('.class_span').css({'background-image':'url(../uz/images/ajax-loader_snake_20.gif ', 'backgroundRepeat': 'no-repeat'});
    $('#yuborish').attr('disabled', true);
     
                $.post('../uz/generator.php',{a: fam,b: ism},function(data){
               	$('#result').val(data); 
                 $('.class_span').css({'background-image':'url(../uz/images/s3.png ', 'backgroundRepeat': 'no-repeat'});  	
                 $('#yuborish').attr('disabled', false);
                });
  }
   else 
   {
       $('.class_span').css({ 'background-image': 'none' });
       $('#yuborish').attr('disabled', true);
       }
});
  function startLoadingAnimation() 
{
 var imgObj = $("#loadImg");
  imgObj.show();
  var centerY = $(window).scrollTop() + ($(window).height() + imgObj.height())/2;
  var centerX = $(window).scrollLeft() + ($(window).width() + imgObj.width())/2;
  imgObj.offset({top:centerY, left:centerX});
}
function stopLoadingAnimation() 
{
  $("#loadImg").hide();
} 
  function MyAlert(text,caption) {
    $("#dialog").text(text); 
    	$("#dialog").dialog({
          autoOpen: false,
          title: caption,
          maxWidth:500,  
          modal: true, 
          buttons: {
              "OK": function() { $(this).dialog("close"); }}
         });
    $("#dialog").dialog("open");	
	} 
	
});
</script>
</body>
</html>
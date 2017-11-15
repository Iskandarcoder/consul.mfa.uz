<script type="text/javascript" src="js/jquery.form.js"></script>
 <?php
	include("function.php");
	include("db.php");
 ?>
<div id="content">

<div id="wrapper1">
	<div id="steps">
		<form id="formElem" name="formElem" action="" method="post">
		     <!-- page 1  --> <br />
			<?php include "step1.php"; ?>
			<!-- page 2  -->  <br />
			<?php include "step2.php";?>
			<!-- page 3  -->  <br />
			<?php include "step3.php";?>
			<!-- page 4  -->  <br />
			<?php include "step4.php";?>
			<!-- page 5  -->  <br />
			<?php include "step5.php";?>
       </form>
	</div> <!--div id="steps"-->
</div>  <!-- <div id="wrapper1">-->
</div>  <!-- <div id="content">-->
<p id='htmlTarget'></p>
   <!-- modal content -->
<div id='confirm'>
	<div class='header'><span>Информация</span></div>
		<div class='message'></div>
		<div class='buttons'>
		<!--<div class='no simplemodal-close'>No</div>-->
		<div class='yes'>OK</div>
	</div>
</div>
<!-- preload the images -->
<div style='display:none'>
<img src='images/confirm/header.gif' alt='' />
<img src='images/confirm/button.gif' alt='' />
</div>
<script type="text/javascript">
 var clients;
 var i_key = 0;
 var ClientData = new Object();
$(document).ready(function()
{
	var fieldsetCount = $('#formElem').children().length;
   	var current 	= 1;
	var stepsWidth	= 0;
    var widths 		= new Array();

$("#topnav li").prepend("<span></span>"); //????????? ?????? ??? <span> ?? ??????? ???????? ??????.
$("#topnav li").each(function() { //??? ??????? ???????? ??????...
var linkText = $(this).find("a").html(); //??????? ????? ?????? ????
$(this).find("span").show().html(linkText); //????????? ????? ? ??? <span>
});
$("#topnav li").hover(function() {	//??? ????????? ????
$(this).find("span").stop().animate({
marginTop: "-40" //??????? ??? <span> ? ?????????? ??? ????? ?? 40px
}, 250);
} , function() { //????? ????, ??? ?????? ????? ? ????????...
$(this).find("span").stop().animate({
marginTop: "0" //?????????? ??? <span> ? ????????? ?????????????? (0px)
}, 250);
});

//label2value();

	var options = {
		type: "POST",
		target: '#htmlTarget',
		beforeSerialize: beforeSerialize,
		beforeSubmit:  showRequest,
		data : ClientData,
		success: showResponse,
		url:  "upSert1.php"
	              };
	$('#formElem').submit(function() {
		$(this).ajaxSubmit(options);
		return false;
	});
});
function beforeSerialize($form, options) {
    $form[0].fileup.value =$form[0].fileToUpload.value;
 $('#loading').show();
    return true;
}
function showRequest(formData, jqForm, options) {
    return true;
}
function showResponse(res){

 $('#loading').hide();
   $('#pic').click();
       	 $("#registerButton").show();
  	//    $('#registerButton').attr('disabled','disabled');
    //   $('#registerButton').css({ "background-color" : '#d8d8d8','color' : '#888'});
    	 $("#ochistit").show();
    //	 alert(res);

if (res!="<head></head><body>-1</body>"){
// 	confirm("Ваши данные сохранены успешно.\nЧтобы получить анкету нажмите 'OK'",
// 	        function () {
//			window.location.href = 'download.php?download_file=anketa.pdf';

    //       $('#navigation').hide();
  //         $('#new').show();
 //                       }
                      //  );

         $('#fio').empty();
    	 $("#li3").show();
    	  button_ed(1,'ochistit');
    	 ClientData=0;

    	 ClientData = new Object();

    	 }

 	 else {
 	  	 	if ($('#fio').length==1) $("#li3").show();
 	 	   jAlert('Необходимо заполнить объязательные поля', 'Ошибка');
 	 	}

}
function confirm(message, callback) {
	$('#confirm').modal({
		closeHTML: "<a href='#' title='Close' class='modal-close'>x</a>",
		position: ["20%",],
		overlayId: 'confirm-overlay',
		containerId: 'confirm-container',
		onShow: function (dialog) {
			$('.message', dialog.data[0]).append(message);
  			// if the user clicks "OK"
			$('.yes', dialog.data[0]).click(function () {
				// call the callback
				if ($.isFunction(callback)) {
					callback.apply();
				}
				// close the dialog
				$.modal.close();
			});
		} //onShow
	});
 }
</script>


 <script language="javascript" type="text/javascript">
var ajax=null;
                        function getAjax(){
                            if (window.ActiveXObject) // для IE
                                return new ActiveXObject("Microsoft.XMLHTTP");
                            else if (window.XMLHttpRequest)
                         return new XMLHttpRequest();
                                else {
                                  alert("Browser does not support AJAX.");
                        return null;
                                     }
                                           }

////


////  АКТИВАЦИЯ КНОПКИ
                           function button_ed(parm1,parm2)
                         {
                              if(parm1==0)
                             {
                                $('#'+parm2).attr('disabled','disabled');
                                $('#'+parm2).css({ "background-color" : '#d8d8d8','color' : '#888'});
                             }
                         else
                           {
                              $('#'+parm2).attr('disabled','');
                              $('#'+parm2).css({ "background-color":'#4797ED', "color":'#fff' });
                           }
                         }
/////  ПРОВЕРКА ГРУППЫ ПОЛЕЙ
 	function validateSteps(){
			var FormErrors = false;
    for(var i = 1; i < 5; ++i)
    {
		var error = 1;
		var hasError = false;

		$('#formElem').children(':nth-child('+ parseInt(i) +')').find(':input:not(button)').each(function()
		{
			var $this 		= $(this);
			var valueLength = jQuery.trim($this.val()).length;
			if($this.class!='mandatory') return 1;

/*             if($this.attr('id')=='fileup') return error;
             if($this.attr('id') == 'sharif') return error;
             if($this.attr('id') == 'prejfam') return error;
             if($this.attr('id') == 'prejism') return error;
             if($this.attr('id') == 'prejsharif') return error;
             if($this.attr('id') == 'fiosup') return error;
             if($this.attr('id') == 'prejfuqaro') return error;
             if($this.attr('id') == 'fileToUpload') return error;
             if($this.attr('id') == 'fio') return error;
  */
    	if(valueLength == ''){
				hasError = true;
				$this.css('background-color','#FFEDEF');
 			      if($this.attr('id')=='fam')  button_ed(0,'registerButton2')
			}
			else
			{    if($this.attr('id')=='fam')
  			       button_ed(1,'registerButton2')
  				$this.css('background-color','#FFFFFF');
			}
		});
		var $link = $('#navigation li:nth-child(' + parseInt(i) + ') a');
		$link.parent().find('.error,.checked').remove();

		var valclass = 'checked';
		if(hasError){
			error = -1;
			valclass = 'error';
		}
		$('<span class="'+valclass+'"></span>').insertAfter($link);

			if(error == -1)
				FormErrors = true;

		$('#formElem').data('errors',FormErrors);
	}
	return error;
};
/////  АКТИВАЦИЯ 3-й ГРУППЫ ПОЛЕЙ
function enabdisab(parm)
{
       	if (parm == 0)
       	{
        $('#fam').val('');
      	$('#ism').val('');
      	$('#sharif').val('');
      	$('#prejfam').val('');
      	$('#prejism').val('');
      	$('#prejsharif').val('');
      	$('#pol').val('');
      	$('#tugDay').val('');

      	$('#strana1').val('');
      	$('#tugjoy').val('');
      	$('#fuqaro').val('');
      	$('#prejfuqaro').val('');
      	$('#prejism').val('');
      	$('#tip').val('');
      	$('#nomer').val('');
      	$('#vidanDay').val('');
      	$('#srokDay').val('');
      	$('#kem').val('');
      	$("#sem_pol").val('');
      	$('#fiosup').val('');

      	$('#adressru').val('');
      	$('#avvalkir').val('');
      	$('#fio_deti').val('');
      	$('#job').val('');
      	$('#job2').val('');
      	$('#jobadres').val('');
      	$('#mesto_propis').val('');

       /*
      	$('#kirkun').attr('readonly',true);
        $('#kiroy').attr('readonly',true);
        $('#kirYear').attr('readonly',true);

      	$('#chiq_kun').attr('readonly',true);
        $('#chiq_oy').attr('readonly',true);
        $('#chiq_Year').attr('readonly',true);
      	$('#kol_kir').attr('readonly',true);
        $('#kun').attr('readonly',true);
        $('#rass_kun').attr('readonly',true);
      	$('#elchixona').attr('readonly',true);
        $('#maqsad').attr('readonly',true);
        $('#taklifchi').attr('readonly',true);
         */
        $('#li3').hide();
              $('#steps').stop().animate({marginLeft: '-' +'0px'},500,function(){});
      $('#fam').focus();
        }
        else {
        $('#kirkun').removeAttr('disabled');
        $('#kiroy').removeAttr('disabled');
        $('#kirYear').removeAttr('disabled');
       	$('#chiq_kun').removeAttr('disabled');
        $('#chiq_oy').removeAttr('disabled');
        $('#chiq_Year').removeAttr('disabled');
      	$('#kol_kir').removeAttr('disabled');
        $('#kun').removeAttr('disabled');
        $('#rass_kun').removeAttr('disabled');
      	$('#elchixona').removeAttr('disabled');
        $('#maqsad').removeAttr('disabled');
        $('#taklifchi').removeAttr('disabled');
              }
 }
 /////
 function ClientAdd()
{
       ClientData['clients['+i_key+'][fam]']=$('#fam').val();
       ClientData['clients['+i_key+'][ism]']=$('#ism').val();
       ClientData['clients['+i_key+'][sharif]']=$('#sharif').val();
       ClientData['clients['+i_key+'][prejfam]']=$('#prejfam').val();
       ClientData['clients['+i_key+'][prejism]']=$('#prejism').val();
       ClientData['clients['+i_key+'][prejsharif]']=$('#prejsharif').val();
       ClientData['clients['+i_key+'][photo]']=$('#fileToUpload').val();
       ClientData['clients['+i_key+'][pol]']=$('#pol').val();
       ClientData['clients['+i_key+'][birthYear]']=$('#birthYear').val();
       ClientData['clients['+i_key+'][tugoy]']=$('#tugoy').val();
       ClientData['clients['+i_key+'][tugDay]']=$('#tugDay').val();
       //  Блок 2
       ClientData['clients['+i_key+'][strana1]']=$('#strana1').val();
       ClientData['clients['+i_key+'][tugjoy]']=$('#tugjoy').val();
       ClientData['clients['+i_key+'][fuqaro]']=$('#fuqaro').val();
       ClientData['clients['+i_key+'][prejfuqaro]']=$('#prejfuqaro').val();
       ClientData['clients['+i_key+'][tip]']=$('#tip').val();
       ClientData['clients['+i_key+'][nomer]']=$('#nomer').val();
       ClientData['clients['+i_key+'][vidanYear]']=$('#vidanYear').val();
       ClientData['clients['+i_key+'][vidanMonth]']=$('#vidanMonth').val();
       ClientData['clients['+i_key+'][vidanDay]']=$('#vidanDay').val();
       ClientData['clients['+i_key+'][srokYear]']=$('#srokYear').val();
       ClientData['clients['+i_key+'][srokMonth]']=$('#srokMonth').val();
       ClientData['clients['+i_key+'][srokDay]']=$('#srokDay').val();
       ClientData['clients['+i_key+'][kem]']=$('#kem').val();
       ClientData['clients['+i_key+'][sem_pol]']=$('#sem_pol').val();
       ClientData['clients['+i_key+'][fiosup]']=$('#fiosup').val();
       //  Блок 3
       ClientData['clients['+i_key+'][kirYear]']=$('#kirYear').val();
       ClientData['clients['+i_key+'][kiroy]']=$('#kiroy').val();
       ClientData['clients['+i_key+'][kirkun]']=$('#kirkun').val();
       ClientData['clients['+i_key+'][chiq_Year]']=$('#chiq_Year').val();
       ClientData['clients['+i_key+'][chiq_oy]']=$('#chiq_oy').val();
       ClientData['clients['+i_key+'][chiq_kun]']=$('#chiq_kun').val();
       ClientData['clients['+i_key+'][kol_kir]']=$('#kol_kir').val();
       ClientData['clients['+i_key+'][kun]']=$('#kun').val();
       ClientData['clients['+i_key+'][rass_kun]']=$('#rass_kun').val();
       ClientData['clients['+i_key+'][elchixona]']=$('#elchixona').val();
       ClientData['clients['+i_key+'][maqsad]']=$('#maqsad').val();
       //     alert(i_key+'  '+ClientData['clients['+i_key+'][maqsad]']);
       ClientData['clients['+i_key+'][taklifchi]']=$('#taklifchi').val();
       //  Блок 4
       ClientData['clients['+i_key+'][adressru]']=$('#adressru').val();
       ClientData['clients['+i_key+'][avvalkir]']=$('#avvalkir').val();
       ClientData['clients['+i_key+'][fio_deti]']=$('#fio_deti').val();
       ClientData['clients['+i_key+'][job]']=$('#job').val();
       ClientData['clients['+i_key+'][job2]']=$('#job2').val();
       ClientData['clients['+i_key+'][jobadres]']=$('#jobadres').val();
       ClientData['clients['+i_key+'][mesto_propis]']=$('#mesto_propis').val();
       //
       ClientData['clients['+i_key+'][operator]']='';
       ClientData['clients['+i_key+++'][status]']='';
}
function removeLastClient()
{
	 i_key--;
	 $("#fio option:last").remove();
}

/////  ДОБАВИТЬ СЛИЕНТА В ГРУППУ (Нажатие на кнопку registerButton2)
       function add_client(){
 	   if($('#formElem').data('errors'))
			jAlert('Необходимо заполнить объязательные поля', 'Ошибка')
		else
            if(validatef($("#fam").val(), 'en', '"Фамилия"')==-1)
        {
        	return -1;
         }
         if(validatef($("#ism").val(), 'en', '"Имя"')==-1)
         {
         	return -1;
          }
          if(validatef($("#sharif").val(), 'en', '"Отчество"')==-1)
          {
          	return -1;
           }
           if(validatef($("#prejfam").val(), 'en', '"Прежняя фамилия"')==-1)
           {
           	return -1;
            }
            if(validatef($("#prejism").val(), 'en', '"Прежнее имя"')==-1)
            {
            	return -1;
             }
             if(validatef($("#prejsharif").val(), 'en', '"Прежние отчество и другие имена"')==-1)
             {
             	return -1;
              }
              if(validatef($("#tugDay").val(), 'raqam', '"Дата рождения"')==-1)
              {
              	return -1;
              }
				if(validatef($("#nomer").val(), 'en123', '"Номер паспорта"')==-1)
                {
                	return -1;
                 }
                 if(validatef($("#vidanDay").val(), 'raqam', '"Дата выдачи документа"')==-1)
                 {
                 	return -1;
                 }
                 if(validatef($("#srokDay").val(), 'raqam', '"Срок действия документа"')==-1)
                 {
                 	return -1;
                 }
                 if(validatef($("#kirkun").val(), 'raqam', '"Планируемый срок пребывания"')==-1)
                 {
                 	return -1;
                  }
                  if(validatef($("#chiq_kun").val(), 'raqam', '"Планируемый срок пребывания"')==-1)
                  {
                  	return -1;
                  }
		          {
		          if(validation1()==-1) return false;
		          if(AppendFio()==0)
		          {
		          	ClientAdd();
   		            enabdisab(0);
                  }
     	          }
     	         return false;
           };
////  ПЕРЕХОД НА ПЕЧАТЬ (Нажатие на кнопку Печать)
	function shag5()
	{
                            if(validatef($("#fam").val(), 'en', '"Фамилия"')==-1)
                                {
                                	 return -1;
                                }
                                if(validatef($("#ism").val(), 'en', '"Имя"')==-1)
                                {
                                	 return -1;
                                }
                                if(validatef($("#sharif").val(), 'en', '"Отчество"')==-1)
                                {
                                	 return -1;
                                }
                                if(validatef($("#prejfam").val(), 'en', '"Прежняя фамилия"')==-1)
                                {
                                	 return -1;
                                }
                                if(validatef($("#prejism").val(), 'en', '"Прежнее имя"')==-1)
                                {
                                	 return -1;
                                }
                                if(validatef($("#prejsharif").val(), 'en', '"Прежние отчество и другие имена"')==-1)
                                {
                                	 return -1;
                                }
                                 if(validatef($("#tugDay").val(), 'raqam', '"Дата рождения"')==-1)
                                {
                                	 return -1;
                                }
								if(validatef($("#nomer").val(), 'en123', '"Номер паспорта"')==-1)
                                {
                                	 return -1;
                                }
                                if(validatef($("#vidanDay").val(), 'raqam', '"Дата выдачи документа"')==-1)
                                {
                                	 return -1;
                                }
                                if(validatef($("#srokDay").val(), 'raqam', '"Срок действия документа"')==-1)
                                {
                                	 return -1;
                                }
                                if(validatef($("#kirkun").val(), 'raqam', '"Планируемый срок пребывания"')==-1)
                                {
                                	 return -1;
                                }
                                if(validatef($("#chiq_kun").val(), 'raqam', '"Планируемый срок пребывания"')==-1)
                                {
                                	 return -1;
                                }

                               validateSteps();
                               if(!$('#formElem').data('errors'))
                                {
                                  if(validation1()==-1)  return -1;
                                     if(AppendFio()==0)
                                     ClientAdd();
                                }
                                else
                                {
		                            if($("select[id=fio] option").size()==0)
        	                         {
            	                     	jAlert('Необходимо заполнить объязательные поля', 'Ошибка');
	            	                     return false;
                    	             }
									else if(validatef($("#fam").val(), 'en', '"Фамилия"')==-1)
	                                {
    	                            	 return -1;
        	                        }
            	                    if(validatef($("#ism").val(), 'en', '"Имя"')==-1)
                	                {
                    	            	 return -1;
                        	        }
                            	    if(validatef($("#sharif").val(), 'en', '"Отчество"')==-1)
                                	{
                                		 return -1;
	                                }
    	                            if(validatef($("#prejfam").val(), 'en', '"Прежняя фамилия"')==-1)
        	                        {
            	                    	 return -1;
                	                }
                    	            if(validatef($("#prejism").val(), 'en', '"Прежнее имя"')==-1)
                        	        {
                            	    	 return -1;
                                	}
	                                if(validatef($("#prejsharif").val(), 'en', '"Прежние отчество и другие имена"')==-1)
    	                            {
        	                        	 return -1;
            	                    }
                	                 if(validatef($("#tugDay").val(), 'raqam', '"Дата рождения"')==-1)
                    	            {
                        	        	 return -1;
                            	    }
									if(validatef($("#nomer").val(), 'en123', '"Номер паспорта"')==-1)
	                                {
    	                            	 return -1;
        	                        }
            	                    if(validatef($("#vidanDay").val(), 'raqam', '"Дата выдачи документа"')==-1)
                	                {
                    	            	 return -1;
                        	        }
                            	    if(validatef($("#srokDay").val(), 'raqam', '"Срок действия документа"')==-1)
                                	{
                                		 return -1;
	                                }
    	                            if(validatef($("#kirkun").val(), 'raqam', '"Планируемый срок пребывания"')==-1)
        	                        {
            	                    	 return -1;
                	                }
                    	            if(validatef($("#chiq_kun").val(), 'raqam', '"Планируемый срок пребывания"')==-1)
                        	        {
                            	    	 return -1;
                                	}
                              	     //$('#steps').stop().animate({marginLeft: '-' +'3800px'},500,function(){});
//                             	     window.location.assign("step5.php");
                                    return true;
                                  }
//                                      $('#navigation').hide();
  //                                    $('#new').hide();
//                                  $('#steps').stop().animate({marginLeft: '-' +'3800px'},500,function(){});
						//		alert("hi");
						//		window.location.assign("step5.php");
					}

                       ///Проверка фамилии и имя////

function validatef(field, type, name) {
   var pp = '';
 // Только английские буквы
   if(type == 'en')
   {
	   var pp = /^[a-z A-Z]*$/;
   }

   // Англ. и цифры (для номер паспорта)
   if(type == 'en123')
   {
       var pp = /^[-/._a-zA-Z0-9 ]*$/;
   }

   // Цифры
   if(type == 'raqam')
   {
        var pp = /^[0-9]*$/;
   }

// Присутствие значения в поле
      if (field === ''){
         return false;
      }
//Проверка поля по выбранному типу
    else if(!field.match(pp))
    {
     jAlert('Проверьте формат заполненного поля '+name+'', 'Ошибка');
   	return -1;
    }
      return true;
   }

</script>
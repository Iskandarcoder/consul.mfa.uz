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
   //		$('#pic').click();
		$('#ct_captcha').val("");
		$('#loading').className='hidden';
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
function showResponse(res,stat)
{

	$('#loading').hide();
   	$('#pic').click();
  //  $("#registerButton").show();
    //$("#ochistit").show();
}
$(function()
{
	$('#registerButton').bind('click',function(){
      var a = "ct_captcha="+$('#ct_captcha').val();
      var otvet=5;
	   enabdisab(1);
      $.ajax({
	                type: "POST",
	                url: "check.php",
	                data: a,
	                async: false,
	               success: function(text)
	               {
		         		if(text=='-1')
        		        {
                      jAlert('Enter the numbers drawn in the picture, or click the "Refresh picture" to get new numbers!', 'Error');
			                otvet=-1;
            		        return false;
			            }
			            else
			                 return true;
	    	       } //End function
	            });
	            if(otvet==-1) return false
	              else
	              {
	            //  	$('#registerButton').hide();
	              	//$('#loading').show();
	             // 	$('#loading').className='unhidden';

	              	return true;
	              	}
	});
});
function unhide()
{
	var item = document.getElementById('main_block');
	if (item)
	{
		item.className=(item.className=='hidden')?'unhidden':'hidden';
	}
	var item2 = document.getElementById('captcha_block');
	if (item2)
	{
		item2.className=(item2.className=='hidden')?'unhidden':'hidden';
	}
	if($(item2).hasClass('unhidden'))
	{
		$('#ct_captcha').focus();
	}
	var item3 = document.getElementById('back_btn');
	if (item3)
	{
		item3.className=(item3.className=='hidden')?'unhidden':'hidden';
	}
 }
function go_back()
{
	 removeLastClient();
	 unhide();
}
function finish()
{
	var item = document.getElementById('main_block');
 	if (item)
	{
		 item.className='hidden';
	}
	var item2 = document.getElementById('captcha_block');
	if (item2)
	{
		item2.className='unhidden';
	}
 }
 function submit_form(frm)
 {
	if(!checkForm(frm))
		return false;

	if(AppendFio()==true)
	{
		ClientAdd();
	}

	unhide();

	//$('#pic').click();

	return true;
 }
function nextClient(frm)
{
	if(!checkForm(frm))
		return false;

	if(AppendFio())
		ClientAdd();
    clearFields();
    $('#travel_info').hide();
    $('#fam').focus();
    return true;
}
function clearFields()
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
}

function checkForm(theForm)
{
	var els = theForm.elements;
	var val1='';
 	for(i=0; i<els.length; i++){
 		if (HasClassName(els[i],'mandatory'))
 		{


	 		val1=els[i].value;
			val1=$.trim(val1);
			if (val1==null || val1=='' || val1=='/')
 			{
// 				alert('Please, fill all required fields!'+' '+els[i].name+' is invalid!');
 		          jAlert('The field "'+$("label[for=" + els[i].name+ "]").text()+'" is empty!',"Invalid entry");
//                  jAlert('    field "'+$("label[for=" + els[i].name+ "]").text()+'" ','Error');
return false;
 			}

 		}
 		//Check type
 			if($(els[i]).hasClass('en'))
 			{
 				 if(!els[i].value.match(/^[a-z A-Z]*$/)){
    				jAlert('Check up a format of the filled field  "'+$("label[for=" + els[i].name+ "]").text()+'" ','Error');
				    return false;
			    }
 			}
 			if ($(els[i]).hasClass('en123'))
 			{
 				 if(!els[i].value.match(/^[-/._a-zA-Z0-9 ] !	@#$«»:;%^&*`№""\n<>=+_|.,?()]*$/)){
    				jAlert('Check up a format of the filled field  "'+$("label[for=" + els[i].name+ "]").text()+'" ','Error');
				    return false;
			    }
 			}
 			if ($(els[i]).hasClass('digit'))
 			{
 			if(!els[i].value.match( /^[0-9]*$/)){
    				jAlert('Check up a format of the filled field  "'+$("label[for=" + els[i].name+ "]").text()+'" ','Error');
				    return false;
			    }
 			}

 			if ($('#kol_kir').val()=='Transit one/6' || $('#kol_kir').val()=='Transit two/11')
 		 {
 			if ($('#goroda').val()==''||$('#goroda').val()=='null')
 			{ 			jAlert('The field "'+$("label[for='goroda']").text()+'" is empty!',"Invalid entry");
			return false;
			}
 		}

 	}

 	if(!checkDates())
 	{
 		return false;
 	}

 	return true;
}
function checkDates()
{

   	var date1=$('#tugoy').val()+'/'+$('#tugDay').val()+'/'+$('#birthYear').val();
	if(!isValidDate(date1))
	{
		jAlert('Please, correct "'+$("label[for=tugkun]").text()+'" on the form!','Error');
		$('#tugDay').focus();
		return false;
	}
	date1=$('#vidanMonth').val()+'/'+$('#vidanDay').val()+'/'+$('#vidanYear').val();
	if(!isValidDate(date1))
	{
        jAlert('Please, correct "'+$("label[for=vidan]").text()+'" on the form!','Error');
        $('#vidanDay').focus();
		return false;
	}
	date1=$('#srokMonth').val()+'/'+$('#srokDay').val()+'/'+$('#srokYear').val();
	if(!isValidDate(date1))
	{
        jAlert('Please, correct "'+$("label[for=srok]").text()+'" on the form!','Error');
		$('#srokDay').focus();
		return false;
	}
	date1=$('#kiroy').val()+'/'+$('#kirkun').val()+'/'+$('#kirYear').val();
	if(!isValidDate(date1))
	{
        jAlert('Please, correct "'+$("label[for=kirkun]").text()+'" on the form!','Error');
		$('#kirkun').focus();
		return false;
	}
	var date2=$('#chiq_oy').val()+'/'+$('#chiq_kun').val()+'/'+$('#chiq_Year').val();
	if(!isValidDate(date2))
	{
        jAlert('Please, correct "'+$("label[for=chiq_kun]").text()+'" on the form!','Error');
		$('#chiq_kun').focus();
		return false;
	}

    	var d1 =parseInt($('#kirkun').val());
	var m1 =parseInt($('#kiroy').val());
	var y1 =parseInt($('#kirYear').val());
	var d2 =parseInt($('#chiq_kun').val());
	var m2 =parseInt($('#chiq_oy').val());
	var y2 =parseInt($('#chiq_Year').val());

//	var oy1=pad2($('#kiroy').val());
//	var oy2=pad2($('#chiq_oy').val());

//	date1=pad2($('#kirkun').val())+'/'+oy1+'/'+$('#kirYear').val();
//	date2=pad2($('#chiq_kun').val())+'/'+oy2+'/'+$('#chiq_Year').val();
	date1=new Date(y1,m1,d1);
	date2=new Date(y2,m2,d2);
	if( date1 > date2)
	{
        jAlert('Please, correct "'+$("label[for=kirkun]").text()+'" on the form!','Error');
		$('#kirkun').focus();
		return false;
	}
	return true;
}
function HasClassName(objElement, strClass)
{
   // if there is a class
   if ( objElement.className )
    {
      // the classes are just a space separated list, so first get the list
      var arrList = objElement.className.split(' ');
      // get uppercase class for comparison purposes
      var strClassUpper = strClass.toUpperCase();
      // find all instances and remove them
      for ( var i = 0; i < arrList.length; i++ )
         {
         // if class found
         if ( arrList[i].toUpperCase() == strClassUpper )
            {
            // we found it
            return true;
            }
         }
      }
   // if we got here then the class name is not there
   return false;
}

function IsNumeric(sText)
{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;

   if (sText.length == 0) return true;
   for (i = 0; i < sText.length && IsNumber == true; i++)
      {
      Char = sText.charAt(i);
      if (ValidChars.indexOf(Char) == -1)
         {
	         IsNumber = false;
         }
      }
   return IsNumber;
}
function isValidDate(dateStr) {
// Checks for the following valid date formats:
// MM/DD/YY   MM/DD/YYYY   MM-DD-YY   MM-DD-YYYY
// Also separates date into month, day, and year variables
var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{2}|\d{4})$/;
// To require a 4 digit year entry, use this line instead:
// var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/;
var matchArray = dateStr.match(datePat); // is the format ok?
if (matchArray == null) {
//alert("Date is not in a valid format."+dateStr)
return false;
}
month = matchArray[1]; // parse date into variables
day = matchArray[3];
year = matchArray[4];
if (month < 1 || month > 12) { // check month range
//alert("Month must be between 1 and 12.");
return false;
}
if (day < 1 || day > 31) {
//alert("Day must be between 1 and 31.");
return false;
}
if ((month==4 || month==6 || month==9 || month==11) && day==31) {
//alert("Month "+month+" doesn't have 31 days!")
return false
}
if (month == 2) { // check for february 29th
var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
if (day>29 || (day==29 && !isleap)) {
//alert("February " + year + " doesn't have " + day + " days!");
return false;
}
}
return true;  // date is valid
}
function AppendFio()
{
	var a=$('#fam').val()+' '+$('#ism').val();
	var index=0;
	var cnt=$('#fio option').length;
	cnt++;
   $('#fio option').each(function()
	{
 		//if(this.text==a.toString()){index=-1;  return false;}
 	 } );
 	 index=1;
            if(index!=-1)
            {
           	            // $('#registerButton').attr('disabled','');
       	                // $("#registerButton").css({ "background-color":'#4797ED', "color":'#fff' });
        if(cnt==14)
		{
			$('#registerButton2').hide();
		}

       $("#fio").append('<option value="4">'+cnt+'. '+a+'</option>');
                        return true;
         	}
            else
            	            return false;
           };


//GET Ajax
function getAjaxApp()
{
	 // stores the reference to the XMLHttpRequest object
  var xmlHttp;
 // if running Internet Explorer 6 or older
  if(window.ActiveXObject)
  {
    try {
      xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    catch (e) {
      xmlHttp = false;
    }
  }
  // if running Mozilla or other browsers
  else
  {
    try {
      xmlHttp = new XMLHttpRequest();
    }
    catch (e) {
      xmlHttp = false;
    }
  }
  // return the created object or display an error message
  if (!xmlHttp)
    alert("Error creating the XMLHttpRequest object.");
  else
    return xmlHttp;
}
function valid_type(field, type) {
   var pp = '';
// Только английские буквы
   if(type == 'en'){
   var pp = /^[a-z A-Z]*$/;
   }
// Только русские буквы
   else if(type == 'ru'){
   var pp = /^[а-я А-Я]*$/;
   }
// Англо-русские буквы
   else if(type == 'enru'){
   var pp = /^[a-z A-Z а-я А-Я]*$/;
   }
// Англ. и цифры
   else if(type == 'en123'){
   var pp = /^[-/._a-zA-Z0-9 ]*$/;
   }
// Цифры
   else if(type == '123'){
   var pp = /^[0-9]*$/;
   }
//Ошибка если не указан параметр
   else if(pp == ''){
   return false;
   }
//Проверка поля по выбранному типу
    else if(!field.value.match(pp)){
    	alert('Not valid type for '+field.name);
	    return false;
    }
      return true;
   }
function pad2(number)
{
     return (number < 10 ? '0' : '') + number;
}
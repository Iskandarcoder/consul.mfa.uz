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
        		        	alert(' Escriba los numeros han pintado del dibujo!', 'Error');
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
	{		$('#ct_captcha').focus();	}
	var item3 = document.getElementById('back_btn');
	if (item3)
	{
		item3.className=(item3.className=='hidden')?'unhidden':'hidden';
	}

}
function go_back()
{	 removeLastClient();
	 unhide();}
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
 {	if(!checkForm(frm))
		return false;

	if(AppendFio())
		ClientAdd();

	unhide();

	$('#pic').click();

	return true; }
function nextClient(frm)
{	if(!checkForm(frm))
		return false;

	if(AppendFio())
		ClientAdd();
    clearFields();
    $('#infoblock3').hide();
    $('#fam').focus();
    return true;}
function clearFields()
{	   $('#fam').val('');
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
      	$('#mesto_propis').val('');}

function checkForm(theForm)
{
	var els = theForm.elements;
 	for(i=0; i<els.length; i++){
 		if (HasClassName(els[i],'mandatory'))
 		{ 			if (els[i].value==null || els[i].value=='' || els[i].value=='/')
 			{
// 				alert('Please, fill all required fields!'+' '+els[i].name+' is invalid!');
 				jAlert('Please, fill all required fields!','Invalid entry');
 				return false;
 			}
 		}
 		//Check type
 			if($(els[i]).hasClass('en'))
 			{ 				 if(!els[i].value.match(/^[a-z A-Z]*$/)){
    				jAlert('Value for "'+$("label[for=" + els[i].name+ "]").text()+'" is invalid!','Invalid entry');
				    return false;
			    }
 			}
 			if ($(els[i]).hasClass('en123'))
 			{
 				 if(!els[i].value.match(/^[-/._a-zA-Z0-9 ]*$/)){
    				jAlert('Value for "'+$("label[for=" + els[i].name+ "]").text()+'" is invalid!','Invalid entry');
				    return false;
			    }
 			}
 			if ($(els[i]).hasClass('digit'))
 			{
 			if(!els[i].value.match( /^[0-9]*$/)){
    				jAlert('Value for "'+$("label[for=" + els[i].name+ "]").text()+'" is invalid!','Invalid entry');
				    return false;
			    }
 			}
 	}

 	if(!checkDates())
 	{ 		return false; 	}

 	return true;
}
function checkDates()
{
	var date1=$('#tugoy').val()+'/'+$('#tugDay').val()+'/'+$('#birthYear').val();
	if(!isValidDate(date1))
	{
		jAlert('Value for "'+$("label[for=tugDay]").text()+'" is invalid!','Invalid input');
		$('#tugDay').focus();		return false;	}
	date1=$('#vidanMonth').val()+'/'+$('#vidanDay').val()+'/'+$('#vidanYear').val();
	if(!isValidDate(date1))
	{
		$('#vidanDay').focus();
		return false;
	}
	date1=$('#srokMonth').val()+'/'+$('#srokDay').val()+'/'+$('#srokYear').val();
	if(!isValidDate(date1))
	{
		$('#srokDay').focus();
		return false;
	}
	date1=$('#kiroy').val()+'/'+$('#kirkun').val()+'/'+$('#kirYear').val();
	if(!isValidDate(date1))
	{
		$('#kirkun').focus();
		return false;
	}
	var date2=$('#chiq_oy').val()+'/'+$('#chiq_kun').val()+'/'+$('#chiq_Year').val();
	if(!isValidDate(date2))
	{
		$('#chiq_kun').focus();
		return false;
	}
	var oy1=pad2($('#kiroy').val());
	var oy2=pad2($('#chiq_oy').val());

	date1=pad2($('#kirkun').val())+'/'+oy1+'/'+$('#kirYear').val();
	date2=pad2($('#chiq_kun').val())+'/'+oy2+'/'+$('#chiq_Year').val();
	if( (new Date(date1).getTime() > new Date(date2).getTime()))
	{		jAlert('Пожалуйста, исправьте "Планируемый срок пребывания" на форме!','Invalid input');
		$('#kirkun').focus();
		return false;	}
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
   $('#fio option').each(function()
	{
 		if(this.text==a.toString()){index=-1;  return false;}
 	 } );
            if(index!=-1)
            {
           	            // $('#registerButton').attr('disabled','');
       	                // $("#registerButton").css({ "background-color":'#4797ED', "color":'#fff' });
                         $("#fio").append('<option value="4">'+a+'</option>');
                        return true;
         	}
            else
            	            return false;
           };

//GET Ajax
function getAjaxApp()
{	 // stores the reference to the XMLHttpRequest object
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
    else if(!field.value.match(pp)){    	alert('Not valid type for '+field.name);
	    return false;
    }
      return true;
   }
function pad2(number)
{
     return (number < 10 ? '0' : '') + number;
}
<script type="text/javascript" src="js/jquery.form.js"></script>
 <?php
	include("function.php");
	include("db.php");
    set_error_handler('evisa_error');
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
ClientData['clients['+i_key+'][tugjoy]']=repl_dq($('#tugjoy').val());
//       ClientData['clients['+i_key+'][tugjoy]']=$('#tugjoy').val();
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
ClientData['clients['+i_key+'][kem]']=repl_dq($('#kem').val());
//       ClientData['clients['+i_key+'][kem]']=$('#kem').val();
       ClientData['clients['+i_key+'][sem_pol]']=$('#sem_pol').val();
ClientData['clients['+i_key+'][fiosup]']=repl_dq($('#fiosup').val());
//       ClientData['clients['+i_key+'][fiosup]']=$('#fiosup').val();
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
    ClientData['clients['+i_key+'][maqsad]']=repl_dq($('#maqsad').val());
      // ClientData['clients['+i_key+'][maqsad]']=$('#maqsad').val();
    ClientData['clients['+i_key+'][taklifchi]']=repl_dq($('#taklifchi').val());
      // ClientData['clients['+i_key+'][taklifchi]']=$('#taklifchi').val();
       //  Блок 4
    ClientData['clients['+i_key+'][adressru]']=repl_dq($('#adressru').val());
//       ClientData['clients['+i_key+'][adressru]']=$('#adressru').val();
    ClientData['clients['+i_key+'][avvalkir]']=repl_dq($('#avvalkir').val());
//       ClientData['clients['+i_key+'][avvalkir]']=$('#avvalkir').val();
    ClientData['clients['+i_key+'][fio_deti]']=repl_dq($('#fio_deti').val());
//       ClientData['clients['+i_key+'][fio_deti]']=$('#fio_deti').val();
    ClientData['clients['+i_key+'][job]']=repl_dq($('#job').val());
//       ClientData['clients['+i_key+'][job]']=$('#job').val();
    ClientData['clients['+i_key+'][job2]']=repl_dq($('#job2').val());
//       ClientData['clients['+i_key+'][job2]']=$('#job2').val();
    ClientData['clients['+i_key+'][jobadres]']=repl_dq($('#jobadres').val());
//       ClientData['clients['+i_key+'][jobadres]']=$('#jobadres').val();
    ClientData['clients['+i_key+'][mesto_propis]']=repl_dq($('#mesto_propis').val());
//       ClientData['clients['+i_key+'][mesto_propis]']=$('#mesto_propis').val();
       //
       ClientData['clients['+i_key+'][operator]']='';
       ClientData['clients['+i_key+++'][status]']='';
}
function repl_dq(str)
{
//	return str.replace(/\"/g,'\'');
	return str.replace(/\"/g,'&quot;');
}
function removeLastClient()
{
	 i_key--;
	 $("#fio option:last").remove();
}

</script>
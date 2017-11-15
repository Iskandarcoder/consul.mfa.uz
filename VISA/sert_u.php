<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	       <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.4.custom.css"  rel="stylesheet" />
	<script src="js/jquery-ui-1.8.6.custom.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.8.4.custom.min.js" type="text/javascript"></script>
   	<script src="js/jquery.ui.datepicker-ru.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="captcha/captcha.css">

	<link rel="stylesheet" href="css/style1.css" type="text/css" media="screen"/>
     <script type="text/javascript" src="js/jquery.form.js"></script>
     <script type="text/javascript" src="js/sliding.form.js"></script>
      <script type="text/javascript" src="js/ajaxupload.js"></script>
<link rel="stylesheet" type="text/css" href="css/latest.css">
<link rel="stylesheet" type="text/css" href="css/keyboard.css">
    <script type="text/javascript" src="js/keyboard.js"></script>
   <script type="text/javascript" src="js/jquery.simplemodal-1.3.5.js"></script>
   <link rel="stylesheet" type="text/css" href="css/confirm.css" media='screen'>

   </head>
    <style>
        span.reference{
            position:fixed;
            left:5px;
            top:5px;
            font-size:5px;
            text-shadow:1px 1px 1px #fff;
        }
        span.reference a{
            color:#555;
            text-decoration:none;
			text-transform:uppercase;
        }
        span.reference a:hover{
            color:#000;

        }
        h2{
            //color:#ccc;
            font-size:20px;
            text-shadow:1px 1px 1px #fff;
            padding:5px;
        }
		.block1 {
	width: 100px;
	height: 130px;
	background: #eee;
	margin-top: 10px;
	  -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    outline: none;
	padding: 2px;
	padding-right: 2px;
	border: solid 1px #ccc;
	float: left;
	align:center;
   }
   	.block2 {
	width: 460px;
/*	height: 350px;*/
	float: left;
   }
      	.block3 {
	width: 100px;
	height: 200px;
	float: left;
   }
     .select {
    color: maroon; /* Цвет текста */
    font-weight: 600; /* Жирное начертание */
    text-align:center;
 }
  </style>
<?php
	include("function.php");
	include("db.php");
	$query="SELECT * FROM anketa where barcode='".$_GET['id']."'";
	$sql=mysql_query($query);
	$row=mysql_fetch_array($sql);
	$fam=$row['fam'];
	$ism=$row['ism'];
	$sharif=$row['sharif'];
	$arr=getSana($row['tugkun']);
	$tyear=$arr[0];
	$tday=$arr[2];
	$vid=getSana($row['vidan']);
	$sr=getSana($row['srok']);
	$kun=getSana($row['kun']);
	$vozv=getSana($row['vozvrat']);
	$deti_r1=getSana($row['data_rojd']);
    $deti_r2=getSana($row['data_rojd2']);
	$deti_r3=getSana($row['data_rojd3']);
	$data_ro=getSana($row['data_ro']);
	$data_rm=getSana($row['data_rm']);
	$deti_rs=getSana($row['data_rs']);
?>
    <body>
        <div id="content">
            <h2>ВИЗОВАЯ АНКЕТА</h2>
            <br>
         <div id="wrapper1">
         <div id="steps">
             <form id="formElem" name="formElem" action="" method="post">
                <fieldset class="step">
                  <legend>Персональная информация (только английскими буквами)</legend>
			 <div class="block2" >
                    <p class="sh1">
                    <label for="fam"> <font style="color:red;">*</font>&nbsp;Фамилия</label>
<?php
echo "<input id='fam' name='fam' value='".$fam. "'/>";
?>
                  </p>
                    <p class="sh1">
                    <label for="ism"> <font style="color:red;">*</font>&nbsp;Имя</label>
<?php
echo "<input id='ism' name='ism' value='".$ism. "'/>";
?>
                  </p>
                    <p class="sh1">
                    <label for="sharif"> </font>&nbsp;Отчество</Label>
<?php
echo "<input id='sharif' name='sharif' value='".$sharif. "'/>";
?>
                  </p>
                    <p class="sh1">
                    <label for="millat"> Прежняя фамилия</label>
                    <input id="millat" name="millat" <?php echo 'value="'.$row['millat'].'"'; ?> type="text"  />
                  </p>

                     <p class="sh1">
                    <label for="millat"> Прежнее имя</label>
                    <input id="millat" name="millat" <?php echo 'value="'.$row['millat'].'"'; ?> type="text"  />
                  </p>

                     <p class="sh1">
                    <label for="millat"> Прежние отчество и другие имена</label>
                    <input id="millat" name="millat" <?php echo 'value="'.$row['millat'].'"'; ?> type="text"  />
                  </p>


                    <p class="sh1">

			   <label for="photo">Загрузка фото</Label>
            <input name="fileToUpload" id="fileToUpload"  size="32"  border="0" type="file" onchange="ajaxUpload(this.form,'photo_upload.php', ''); return false;"/>
                     </p>
		      </div> <!--class block2-->

			<div class="block3">
			<div class="block1" name="uploadOutput" id="uploadOutput" ></div>
			</div>
    <div><input id="fileup" name="fileup" type="hidden" value="  "></div> <!--Для сохранение имени файла-->
                   <p class="sh1">
                    <label for="tip">Пол</label>
              <?php
             //  include('db.php');
               $select = mysql_query("SELECT NOMI_RUS FROM l_dokument") or die(mysql_error());
               echo "<select name='tip' id='tip'>";
           while(list($name_rus) = mysql_fetch_row($select))
	      if ($name_rus==$row['tip']) {echo "<option selected='selected'>$name_rus</option>"; }
              else {echo "<option>$name_rus</option>";}
              echo "</select>";
//              mysql_close($bd);
                ?>
	             </p>

                   <p class="sh1">
                    <label for="tugkun"> <font style="color:red;">*</font>Дата рождения</label>
<?php
                   echo '<input name="tugkun" type="text" id="birthDay" value="'.$tday.'" size="3">';

                    echo '<select name="tugoy" id="tugoy">';
		    for ($i=1;$i<=12;$i++)
		{
			$a=sprintf("%02s",$i);
		if ($a==$arr[1])
		{
		    echo '<option selected="selected" value="'.$a.'">'.getMonth($i).'</option>';
		}
		else {
		    echo '<option value="'.$a.'">'.getMonth($i).'</option>';
		}
		}
		    echo '</select>';

               echo "<select name='birthYear' id='birthYear'>";
                         $Year=date("Y");$i=0;
               for ($i=$Year-80;$i<=$Year;$i++)
               {
		if ($i==$tyear)
		{
	          echo "<option selected>$i</option>";
		}
		else {
                 echo "<option>$i</option>"; }
               	}

              echo "</select>";

                ?>


                  </p>

                    <p class="sh1">
                    <label for="yashjoy"><font style="color:red;">*</font>Место рождения</label>
                    <input id="yashjoy" name="yashjoy" <?php echo 'value="'.$row['yashjoy'].'"'; ?> type="text"  />
                  </p>
                     <p class="sh1">
                    <label for="strana"><font style="color:red;">*</font>&nbsp;Страна рождение</label>
               <?php
               $select = mysql_query("SELECT  nomi_rus FROM l_davlat ORDER BY nomi_rus");
               echo "<select name='strana' id='strana'>";
           while(list($name_rus) = mysql_fetch_row($select))
               if ($name_rus==$row['strana']) {echo "<option selected='selected'>$name_rus</option>"; }
              else {echo "<option>$name_rus</option>";}
              echo "</select>";
                ?>
                  </p>



              </fieldset>

             <fieldset class="step">

                    <legend>Паспортные данные</legend>

                      <p class="sh1">
                    <label for="strana"><font style="color:red;">*</font>&nbsp;Гражданство</label>
               <?php
               $select = mysql_query("SELECT  nomi_rus FROM l_davlat ORDER BY nomi_rus");
               echo "<select name='strana' id='strana'>";
           while(list($name_rus) = mysql_fetch_row($select))
               if ($name_rus==$row['strana']) {echo "<option selected='selected'>$name_rus</option>"; }
              else {echo "<option>$name_rus</option>";}
              echo "</select>";
                ?>
                  </p>

                   <p class="sh1">
                    <label for="strana"><font style="color:red;">*</font>&nbsp;Прежнее гражданство</label>
               <?php
               $select = mysql_query("SELECT  nomi_rus FROM l_davlat ORDER BY nomi_rus");
               echo "<select name='strana' id='strana'>";
           while(list($name_rus) = mysql_fetch_row($select))
               if ($name_rus==$row['strana']) {echo "<option selected='selected'>$name_rus</option>"; }
              else {echo "<option>$name_rus</option>";}
              echo "</select>";
                ?>
                  </p>

                  <p class="sh1">
                    <label for="tip">Тип паспорта</label>
              <?php
             //  include('db.php');
               $select = mysql_query("SELECT NOMI_RUS FROM l_dokument") or die(mysql_error());
               echo "<select name='tip' id='tip'>";
           while(list($name_rus) = mysql_fetch_row($select))
	      if ($name_rus==$row['tip']) {echo "<option selected='selected'>$name_rus</option>"; }
              else {echo "<option>$name_rus</option>";}
              echo "</select>";
//              mysql_close($bd);
                ?>
	             </p>


                   <p class="sh1">
	            <label for="nomer">Номер</label>
                    <input id="nomer" name="nomer" <?php echo 'value="'.$row['nomer'].'"'; ?> type="text"  />
		   </p>
		    <p class="sh1">
		    <label for="vidan">Дата выдачи паспорта</label>
		    <input name="vidan" type="text" id="birthDay" <?php echo 'value="'.$vid[2].'"'; ?> size="3">
                    <select name="vidanMonth" id="birthMonth">
<?php	    for ($i=1;$i<=12;$i++)
		{$a=sprintf("%02s",$i);
		if ($a==$vid[1])
		{echo '<option selected="selected" value="'.$a.'">'.getMonth($i).'</option>';}
		else {echo '<option value="'.$a.'">'.getMonth($i).'</option>';	}}
		echo '</select>';
                echo "<select name='vidanYear' id='birthYear'>";
                     $Year=date("Y");$i=0;
               for ($i=$year-($year-1991);$i<=$Year+45;$i++)
               {if ($i==$vid[0])
		{echo "<option selected>$i</option>";}
		else {echo "<option>$i</option>"; }}
              echo "</select>";
?>
                    </p>

            <p class="sh1">
		    <label for="vidan">Срок действия паспорта</label>
                    <input name="srok" type="text" id="birthDay" <?php echo 'value="'.$sr[2].'"'; ?>  size="3">
                    <select name='srokMonth' id="birthMonth">
<?php	    for ($i=1;$i<=12;$i++)
		{$a=sprintf("%02s",$i);
		if ($a==$sr[1])
		{echo '<option selected="selected" value="'.$a.'">'.getMonth($i).'</option>';}
		else {echo '<option value="'.$a.'">'.getMonth($i).'</option>';	}}
		echo '</select>';
                echo "<select name='srokYear' id='birthYear'>";
                     $Year=date("Y");$i=0;
               for ($i=$year-($year-1991);$i<=$Year+45;$i++)
               {if ($i==$sr[0])
		{echo "<option selected>$i</option>";}
		else {echo "<option>$i</option>"; }}
              echo "</select>";
?>
                    </p>
                       <p class="sh2">
                   <label for="kem">Орган выдачи </label>
                    <input id="kem" name="kem" <?php echo 'value="'.$row['kem'].'"'; ?>  type="text"  />
                  </p>
                     <p class="sh1">
                    <label for="tip">Семейное положение</label>
              <?php
             //  include('db.php');
               $select = mysql_query("SELECT NOMI_RUS FROM l_dokument") or die(mysql_error());
               echo "<select name='tip' id='tip'>";
           while(list($name_rus) = mysql_fetch_row($select))
	      if ($name_rus==$row['tip']) {echo "<option selected='selected'>$name_rus</option>"; }
              else {echo "<option>$name_rus</option>";}
              echo "</select>";
//              mysql_close($bd);
                ?>
	             </p>

            				    <p class="sh2">
                    <label for="sabab"> <font style="color:red;">*</font>Фамилия, имя и отчество супруги/супруга</label>
                    <input id="sabab" name="sabab"  <?php echo 'value="'.$row['sabab'].'"'; ?>  type="text" class="keyboardInput"/>
                  </p>

              </fieldset>

			 <fieldset class="step">
                  <legend>Информация о поездке</Legend>
                  <br>
		 <p class="sh3">
		    <label for="kun"><font style="color:red;">*</font>&nbsp;Планируемый срок пребывания с </Label>
                    <input name="kun" <?php echo 'value="'.$kun[2].'"'; ?>  type="text" id="birthDay" size="3">
                    <select name='keloy' id="birthMonth">
		<?php	    for ($i=1;$i<=12;$i++)
		{$a=sprintf("%02s",$i);
		if ($a==$kun[1])
		{echo '<option selected="selected" value="'.$a.'">'.getMonth($i).'</option>';}
		else {echo '<option value="'.$a.'">'.getMonth($i).'</option>';	}}
		echo '</select>';
                echo "<select name='kelYear' id='birthYear'>";
                     $Year=date("Y");$i=0;
               for ($i=$year-($year-1991);$i<=$Year;$i++)
               {if ($i==$kun[0])
		{echo "<option selected>$i</option>";}
		else {echo "<option>$i</option>"; }}
              echo "</select>";
?>
                 </p>

                      <p class="sh3">
		    <label for="kun"><font style="color:red;">*</font>&nbsp;по </Label>
                    <input name="kun" <?php echo 'value="'.$kun[2].'"'; ?>  type="text" id="birthDay" size="3">
                    <select name='keloy' id="birthMonth">
		<?php	    for ($i=1;$i<=12;$i++)
		{$a=sprintf("%02s",$i);
		if ($a==$kun[1])
		{echo '<option selected="selected" value="'.$a.'">'.getMonth($i).'</option>';}
		else {echo '<option value="'.$a.'">'.getMonth($i).'</option>';	}}
		echo '</select>';
                echo "<select name='kelYear' id='birthYear'>";
                     $Year=date("Y");$i=0;
               for ($i=$year-($year-1991);$i<=$Year;$i++)
               {if ($i==$kun[0])
		{echo "<option selected>$i</option>";}
		else {echo "<option>$i</option>"; }}
              echo "</select>";
?>
                 </p>
                    <p class="sh3">
                    <label for="strana"><font style="color:red;">*</font>&nbsp;Количество въездов </label>
               <?php
               $select = mysql_query("SELECT  nomi_rus FROM l_davlat ORDER BY nomi_rus");
               echo "<select name='strana' id='strana'>";
           while(list($name_rus) = mysql_fetch_row($select))
               if ($name_rus==$row['strana']) {echo "<option selected='selected'>$name_rus</option>"; }
              else {echo "<option>$name_rus</option>";}
              echo "</select>";
                ?>
                  </p>

				 <p class="sh3">
                    <label for="seriya">Количество дней</label>
                    <input id="seriya" name="seriya" <?php echo 'value="'.$row['seriya'].'"'; ?> type="text"  />
                    </p>

 <p class="sh3">
                    <label for="strana"><font style="color:red;">*</font>&nbsp;Срок рассмотрения визовой заявки</label>
               <?php
               $select = mysql_query("SELECT  nomi_rus FROM l_davlat ORDER BY nomi_rus");
               echo "<select name='strana' id='strana'>";
           while(list($name_rus) = mysql_fetch_row($select))
               if ($name_rus==$row['strana']) {echo "<option selected='selected'>$name_rus</option>"; }
              else {echo "<option>$name_rus</option>";}
              echo "</select>";
                ?>
                  </p>

                   <p class="sh3">
               <label for="elchixona">Место получения визы</label>
<?php
		$select = mysql_query("SELECT  id,nomi_rus,kod_id FROM l_elchixona");
           echo "<select name='elchixona' id='elchixona' >";
         while(list($id, $name_rus,$kod_id) = mysql_fetch_row($select))
               if ($id==$row['elchixona']) {echo '<option selected="selected" value='.$id/$kod_id.'>'.$name_rus.'</option>';
 }
              else {echo "<option value='$id/$kod_id'>$name_rus</option>";}
              echo "</select>";
                ?>
              </p>

                    <p class="sh3">
                    <label for="maqsad"><font style="color:red;">*</font>&nbsp;Цель поездки</Label>
                    <input id="maqsad" name="maqsad" <?php echo 'value="'.$row['maqsad'].'"'; ?> type="text" class="keyboardInput"  />
                  </p>
                    <p class="sh3">
                    <label for="job"><font style="color:red;">*</font>&nbsp;Приглашающая сторона</label>
                    <input id="job" name="job" <?php echo 'value="'.$row['job'].'"'; ?> type="text" class="keyboardInput"  />
                  </p>

              </fieldset>

               <fieldset class="step">
	   				<p class="sh4">Дополнительная информация</p>
					<p class="sh4">
                    <label for="fio_deti">Адрес проживания в Узбекистане</Label>
                   <input id="fio_deti" name="fio_deti" <?php echo 'value="'.$row['fio_deti'].'"'; ?> type="text" >
                   </p>

					<p class="sh4">
		<label for="fio_deti2">Предыдущие поездки в Узбекистан</Label>
                  <input id="fio_deti2" name="fio_deti2" <?php echo 'value="'.$row['fio_deti2'].'"'; ?> type="text" >
                   </p>

		<p class="sh4">
                   <label for="fio_deti3">Совместно следующие лица</Label>
                   <input id="fio_deti3" name="fio_deti3" <?php echo 'value="'.$row['fio_deti3'].'"'; ?>  type="text" >
                   </p>
                       	<p class="sh4">
                       <label for="otes">Род деятельности</label>
                    <input   name="otes" id="otes" <?php echo 'value="'.$row['fio_otsa'].'"'; ?> type="text" >
                </p>
                <p class="sh4">
                    <label for="mesto_rab_o">Место работы (учебы) и должность</label>
                    <input   name="mesto_rab_o" id="mesto_rab_o" <?php echo 'value="'.$row['mesto_rab_o'].'"'; ?> type="text" >
                </p>
                <p class="sh4">
                    <label for="mesto_rab_o">Адрес места работы (учебы)</label>
                    <input   name="mesto_rab_o" id="mesto_rab_o" <?php echo 'value="'.$row['mesto_rab_o'].'"'; ?> type="text" >
                </p>
                       <p class="sh4">
                    <label for="mesto_rab_o">Место постоянного проживания</label>
                    <input   name="mesto_rab_o" id="mesto_rab_o" <?php echo 'value="'.$row['mesto_rab_o'].'"'; ?> type="text" >
                </p>


<br><br>

                  <br>

     <p class="sh2" align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;При надлежащем заполнении анкеты, каждая страничка отмечается (<img src="images/checked.png">)зеленой галочкой в углу.<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Красный крестик (<img src="images/error.png">)указывает на незаполненность страницы, недостаточность информации, либо наличие ошибок в нем.<br><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В таком случае необходимо заново заполнить страницу и подтвердить правильность ввода нажатием соответствующей кнопки.
 </p>
            <br> <br><br>

<div class="ajax-fc-container" ></div>

 <br>
              <p class="submit">
                    <button id="registerButton" type="submit">Подолжить (печать)</button>
              </p>

      <div id="loading" align="center" style="display:none";><span><img src="images/loading49.gif"> </span></div>
                   <br><br><br>

             </fieldset>
                </form>
            </div> <!--div id="steps"-->

                     <!-- Навигация  -->
              <div id="navigation" style="display:none";>
                    <ul>
                        <li class="selected"> <a href="#">1</a> </li>
                        <li> <a href="#">2</a> </li>
                        <li> <a href="#">3</a> </li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
						<li><a href="#">6</a></li>
						<li><a href="#">7</a></li>
						<li class="next"><a href="#">Далее</a></li>
                    </ul>
              </div>
          </div>  <!-- <div id="wrapper1">-->
        </div>  <!-- <div id="content">-->

        <p id='htmlTarget'>   </p>
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

 <script>
$(function(){
<!--///* <!-   $(".ajax-fc-container").captcha({formId: "formElem"});-->*///-->
  $.datepicker.setDefaults(
        $.extend($.datepicker.regional["ru"])
  );
  $("#tugkun").datepicker();
  $("#vidan").datepicker();
  $("#srok").datepicker();
  $("#kun").datepicker();
  $("#vozvrat").datepicker();
 // $("#data_rojd").datepicker();
 // $("#data_rojd2").datepicker();
 // $("#data_rojd3").datepicker();
  $("#data_rojd4").datepicker();
    $("#data_r_o").datepicker();
      $("#data_r_m").datepicker();
        $("#data_r_s").datepicker();
});
</script>

   <script type="text/javascript">
   $(document).ready(function()
{
   $(".otvet").hide();

   $('#o').toggle(function() {
   $(this).next().slideDown(300);
   $(this).removeClass('plus').addClass('minus');
    if($('#m').hasClass('minus')){
  	$('#m').removeClass('minus').addClass('plus');
  	$('#m').next().slideUp(100); };
  	  if($('#s').hasClass('minus')){
  	$('#s').removeClass('minus').addClass('plus');
  	$('#s').next().slideUp(100); }
},
function() {
   $(this).next().slideUp(300);
   $(this).removeClass('minus').addClass('plus');
});

   $('#m').toggle(function() {
   $(this).next().slideDown(300);
   $(this).removeClass('plus').addClass('minus');
       if($('#o').hasClass('minus')){
  	$('#o').removeClass('minus').addClass('plus');
  	  $('#o').next().slideUp(100); };
  	  if($('#s').hasClass('minus')){
  	$('#s').removeClass('minus').addClass('plus');
  	$('#s').next().slideUp(100); }
},
function() {
   $(this).next().slideUp(300);
   $(this).removeClass('minus').addClass('plus');
});

   $('#s').toggle(function() {
   $(this).next().slideDown(300);
   $(this).removeClass('plus').addClass('minus');
       if($('#o').hasClass('minus')){
  	$('#o').removeClass('minus').addClass('plus');
  	  $('#o').next().slideUp(100); };
  	  if($('#m').hasClass('minus')){
  	$('#m').removeClass('minus').addClass('plus');
  	$('#m').next().slideUp(100); }
},
function() {
   $(this).next().slideUp(300);
   $(this).removeClass('minus').addClass('plus');
});
////

 	  $('#loading').hide();
  //  $('#htmlTarget').hide();

       $("#loading")
	.ajaxStart(function(){
		$(this).show();
	 $("#registerButton").hide();
	})
	.ajaxComplete(function(){
		$(this).hide();
    $("#registerButton").show();
	});

	var options = {
		type: "POST",
		target: '#htmlTarget',
		beforeSerialize: beforeSerialize,
		beforeSubmit:  showRequest,
		success: showResponse,
		url:  "upSert.php"
	              };

	$('#formElem').submit(function() {
		$(this).ajaxSubmit(options);
		return false;
	});
     return false;
});
function beforeSerialize($form, options) {
    $form[0].fileup.value =$form[0].fileToUpload.value;
    return true;
}

function showRequest(formData, jqForm, options) {
 //var queryString = $.param(formData);
// alert(queryString=>fileToUpload);
 //alert(jqForm[0].fileToUpload.value);
 // alert(jqForm[0].fileup.value);
 // alert($('#elchixona').val());
	return true;
}
function showResponse(responseText, statusText, xhr, $form)  {
   // $.modal("<div><h1>SimpleModal</h1></div>");
 	confirm("Ваши данные сохранены успешно.\nЧтобы получить анкету нажмите 'OK'", function () {
			window.location.href = 'download.php?download_file=anketa.pdf';
			});
   // alert('status: ' + statusText + '\n\nresponseText: \n' + responseText +
   //    '\n\nThe output div should have already been updated with the responseText.');
    //    $('#htmlTarget').fadeIn('slow');
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

 </body>
</html>

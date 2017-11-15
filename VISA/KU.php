<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
      <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.4.custom.css"  rel="stylesheet"
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.8.4.custom.min.js" type="text/javascript"></script>
	<script src="js/i118n/jquery.ui.datepicker-ru.js" type="text/javascript"></script>
	<script src="js/i18n/jquery-ui-i18n.js" type="text/javascript"></script>

	 <link rel="stylesheet" href="css/styleKU.css" type="text/css" media="screen"/>
     <script type="text/javascript" src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/slidingKU.js"></script>
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
            font-size:10px;
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
	width: 435px;
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
   }
  </style>

    <body>
               <h2>Заполнение регистрационной карточки консульского учета  </h2>
                           <div> <p id='htmlTarget'>*****   </p>  </div>
              <!-- Навигация  -->
              <div id="navigation"> <!--style="display:none";>-->
                    <ul>
                        <li class="selected"> <a href="#">1</a> </li>
                        <li> <a href="#">2</a> </li>
                        <li> <a href="#">3</a> </li>
                        <li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
	                 </ul>
              </div>

        <div id="content">
          <div id="wrapper1">
            <div id="steps">
           <form id="formElem" name="formElem" action="" method="post">
        <fieldset class="step">
                  <legend>Основные данные</legend>
			 <div class="block2" >
                    <p class="sh1">
                    <label for="fam">Фамилия(+прежняя фамилия)</label>
                    <input id="fam" name="fam" />   <!--autocomplete=OFF-->
                  </p>
                    <p class="sh1">
                    <label for="ism">Имя</label>
                    <input id="ism" name="ism"   />
                  </p>
                    <p class="sh1">
                    <label for="sharif">Отчество</Label>
                    <input id="sharif" name="sharif"  />
                  </p>
                    <p class="sh1">
                    <label for="millat">Национальность</label>
                    <input id="millat" name="millat" type="text"  />
                  </p>
                  <p class="sh1">
                    <label for="o_xolat">Семейное положение(указать ФИО супруга/и)</label>
                    <input id="o_xolat" name="o_xolat" type="text"  />
                  </p>
                    <p class="sh1">
                    <label for="tugkun">Дата рождения</label>
                    <input id="tugkun" name="tugkun"  type="text"  />
                  </p>
                   <p class="sh1">
                    <label for="tugjoy">Место рождения</label>
                    <input id="tugjoy" name="tugjoy"  type="text"  />
                  </p>
                    <p class="sh1">

			   <label for="photo">Загрузка фото</Label>
         <input name="fileToUpload" id="fileToUpload"  size="27"  border="0" type="file" onchange="ajaxUpload(this.form,'photo_upload.php', ''); return false;"/>
                     </p>
		      </div> <!--class block2-->

			<div class="block3">
			<div class="block1" name="uploadOutput" id="uploadOutput" ></div>
			</div>
    <div><input id="fileup" name="fileup" type="hidden" value="  "></div>
        </fieldset>

        <fieldset class="step">
                  <legend>Паспортные данные</legend>
                   <p class="sh2">
                    <label for="seriya">Серия</label>
                    <input id="seriya" name="seriya" type="text"  />
				    </p>
				    <p class="sh2">
			        <label for="nomer">Номер</label>
                    <input id="nomer" name="nomer" type="text"  />
			       </p>

				    <p class="sh2">
				    <label for="vidan">Выданный: (Когда)</label>
                    <input id="vidan" name="vidan"  type="text" />
                    </p>
				    <p class="sh2">
                    <label for="srok">Срок действия</label>
                    <input id="srok" name="srok"  type="text" />
                  </p>

                    <p class="sh2">
				    <label for="kem">Выданный: (Кем)</label>
                    <input id="kem" name="kem"  type="text"  />
  			    <p class="sh2">
                    <label for="lisa"> Лица внесенные в паспорт</label>
                    <input id="lisa" name="lisa"  type="text" class="keyboardInput"/>
                  </p>

				    <p class="sh2">
                    <label for="adress">Адрес постоянного проживания</label>
                    <input id="adress" name="adress"  type="text" class="keyboardInput"  />
                  </p>
				     <p class="sh2">
				    <label for="phone">№ Телефона</label>
                    <input id="phone" name="phone"  type="text"  />
                  </p>
       </fieldset>

	   <fieldset class="step">
                  <legend>Образование, специальность, выезд из Узбекистана</Legend>
                      <p class="sh3">
                    <label for="obrazov">Окончил что</label>
                    <input id="obrazov" name="obrazov" type="text" class="keyboardInput"/>
                     </p>
                    <p class="sh3">
                    <label for="kogda">Когда окончил</label>
                    <input id="kogda" name="kogda" type="text"/>
                  </p>
				 <p class="sh3">
				    <label for="spes">Специальность</Label>
                    <input id="spes" name="spes"  type="text" class="keyboardInput" />
                 </p>
                    <p class="sh3">
                    <label for="kogdaV">Когда выехал из Узбекистана</label>
                    <input id="kogdaV" name="kogdaV" type="text"/>
                  </p>
                    <p class="sh3">
                    <label for="maqsad">С какой целью</Label>
                    <input id="maqsad" name="maqsad" type="text" class="keyboardInput"  />
                  </p>

                       <p class="sh3">
                    <label id="rodv_ru">Родственники в Республики Узбекистан (ФИО и адреса)</Label>
                    </p>
                    <p class="sh3">
                    <label for="qar_fio1">1.ФИО</Label>
                    <input id="qar_fio1"  name="qar_fio1" class="keyboardInput"></input>
                    </p>
                    <p class="sh3">
                    <label for="qar_adr1">Адрес</Label>
                    <input id="qar_adr1"  name="qar_adr1" class="keyboardInput"></input>
                    </p>
                    <p class="sh3">
                 <label for="qar_fio2">2.ФИО</Label>
                    <input id="qar_fio2"  name="qar_fio2" class="keyboardInput"></input>
                    </p>
                    <p class="sh3">
                    <label for="qar_adr2">Адрес</Label>
                    <input id="qar_adr2"  name="qar_adr2" class="keyboardInput"></input>
                    </p>
            </fieldset>

          <fieldset class="step">
				 <legend>Адрес и род деятельности за рубежом</legend>
				 <p class="sh2">
                    <label for="job">Род занятий</label>
                    <input id="job" name="job" type="text" class="keyboardInput"  />
                  </p>
                    <p class="sh2">
                    <label for="vr_adress">Адрес временного проживания</label>
                    <input id="vr_adress" name="vr_adress" type="text"  />
                  </p>
				  <p class="sh2">
				    <label for="phone1">№ Телефона</label>
                    <input id="phone1" name="phone1"  type="text"  />

                   <p class="sh3">
                    <label id="ch_rodv_ru">Родственники вне Республики Узбекистан (ФИО и адреса)</Label>
                    </p>
                    <p class="sh3">
                    <label for="ch_qar_fio1">1.ФИО</Label>
                    <input id="ch_qar_fio1"  name="ch_qar_fio1" class="keyboardInput"></input>
                    </p>
                    <p class="sh3">
                    <label for="ch_qar_adr1">Адрес</Label>
                    <input id="ch_qar_adr1"  name="ch_qar_adr1" class="keyboardInput"></input>
                    </p>
                    <p class="sh3">
                 <label for="ch_qar_fio2">2.ФИО</Label>
                    <input id="ch_qar_fio2"  name="ch_qar_fio2" class="keyboardInput"></input>
                    </p>
                    <p class="sh3">
                    <label for="ch_qar_adr2">Адрес</Label>
                    <input id="ch_qar_adr2"  name="ch_qar_adr2" class="keyboardInput"></input>
                    </p>

                    <p class="sh4">Для регистрации, выберите загранпредставительство Республики Узбекистан </p>
             <p class="sh2">
             <?php
               include('db.php');
               $select = mysql_query("SELECT  id,nomi_rus FROM L_Elchixona");
           echo "<select  name='elchixona' id='elchixona' >";
         while(list($id, $name_rus) = mysql_fetch_row($select))
            {
            echo "echo <option value='$id'>$name_rus</option>";
            }
            echo"</select>";
            mysql_close($bd);
            ?>
              </p>
         </fieldset>

  		 <fieldset class="step">
                <br>
                  <legend>Подтверждение</legend>
                  <br>
                  <h1>&nbsp;&nbsp;&nbsp;&nbsp;Примечание</h1>
        <p class="sh2"> Если каждый шаг отмечен зеленой подтверждающей иконкой, то в форме<br> все поля заполнены правильно.<br>
            <span class="select">Красная иконка указывает на наличие ошибок в некоторых полях ввода.</span><br>
            При таких случаях следует исправить ошибки и подтвердит правильность ввода информации. </p>
            <br> <br><br>
                    <p class="submit">
                    <button id="registerButton" type="submit">Подтверждаю</button>
                    </p>
      <div id="loading" align="center" style="display:none";><span><img src="images/loading49.gif"> </span>
           </fieldset>
              </form>
            </div> <!--div id="steps"-->
          </div>  <!-- <div id="wrapper1">-->
        </div>  <!-- <div id="content">-->


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
  $.datepicker.setDefaults(
        $.extend($.datepicker.regional["ru"])
  );
  $("#tugkun").datepicker();
  $("#vidan").datepicker();
  $("#kun").datepicker();
  $("#srok").datepicker();
  $("#kogda").datepicker();
  $("#kogdaV").datepicker();
});
</script>

   <script type="text/javascript">
   $(document).ready(function()
{
 	  $('#loading').hide();
     $('#htmlTarget').hide();

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
		success:       showResponse,
		url:  "upKU.php"
	              };

	$('#formElem').submit(function() {
		$(this).ajaxSubmit(options);
		return false;
	});

   return false;
});
function beforeSerialize($form, options) {
    $form[0].fileup.value =$form[0].fileToUpload.value;
 //   alert(options.url);
    return true;
}

function showRequest(formData, jqForm, options) {
// var queryString = $.param(formData);
// alert(queryString=>fileToUpload);
	return true;
}
function showResponse(responseText, statusText, xhr, $form)  {
   // $.modal("<div><h1>SimpleModal</h1></div>");

 	confirm("Ваши данные сохранены успешно.\nПосле получения регистрационную карточку,\n заверьте и  согласно инструкции отправьте в загранпредставительство Республики Узбекистан", function () {
			window.location.href = 'download.php?download_file=Reg_KU.pdf';
			});
   // alert('status: ' + statusText + '\n\nresponseText: \n' + responseText +
   //    '\n\nThe output div should have already been updated with the responseText.');
     //   $('#htmlTarget').fadeIn('slow');
}

function confirm(message, callback) {
	$('#confirm').modal({
		closeHTML: "<a href='#' title='Close' class='modal-close'>x</a>",
		position: ["30%",],
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
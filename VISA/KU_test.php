<html>

<head>
  <title></title>
  <script type="text/javascript" src="js/jquery.js"></script>
   <script type="text/javascript" src="jquery.form.js"></script>
     <script type="text/javascript" src="sliding.form.js"></script>
      <script type="text/javascript" src="js/ajaxupload.js"></script>
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
	 alert('Qalay!!!');
		$(this).ajaxSubmit(options);
		return false;
	});

   return false;
});
function beforeSerialize($form, options) {
 //   $form[0].fileup.value =$form[0].fileToUpload.value;
    return true;
}

function showRequest(formData, jqForm, options) {
// var queryString = $.param(formData);
 alert('Qlaya!');
//    alert(jqForm[0].fileToUpload.value);
  //  alert(jqForm[0].fileup.value);
	return true;
}
function showResponse(responseText, statusText, xhr, $form)  {
   // $.modal("<div><h1>SimpleModal</h1></div>");
 	confirm("Ваши данные сохранены успешно.\nПосле получения регистрационную карточку,\n заверьте и  согласно инструкции отправьте в загранпредставительство Республики Узбекистан", function () {
			window.location.href = 'download.php?download_file=anketa.pdf';
			});
   // alert('status: ' + statusText + '\n\nresponseText: \n' + responseText +
   //    '\n\nThe output div should have already been updated with the responseText.');
     //   $('#htmlTarget').fadeIn('slow');
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
</head>

<body>

<form id="formElem" name="formElem" action="" method="post">
<p class="submit">
                    <button id="registerButton" type="submit">Подтверждаю</button>
                    </p>

</form>

</body>

</html>
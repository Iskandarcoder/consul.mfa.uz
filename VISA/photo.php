<head>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1251" />
<title>Untitled Document</title>
 <style type="text/css">
   .block1 {
	width: 100px;
	height: 130px;
	background: #eee;
	padding: 2px;
	padding-right: 2px;
	border: solid 1px black;
	float: left;
	align:center;
   }
  </style>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.form.js"></script>

</head>

<body>
    <form id="uploadForm" action="" method="post" enctype="multipart/form-data">
   	<input name="MAX_FILE_SIZE" value="100000" type="hidden"/>
     Выберете фото файл: <input name="fileToUpload" id="fileToUpload"  type="file"/>
      	<input value="Submit" type="submit"/>
	</form>
    <div class="block1" id="uploadOutput" ></div>
	<img id="loading" src="loading.gif" style="display:none;"/>


  <script type="text/javascript">
$(document).ready(function()
{
   var options = {
     target: "#uploadOutput",
	 url: "photo_upload.php",
	//  url: "up4jq.php",
	  beforeSubmit: showRequest,
	  success: showResponse
			     };

     $("#loading")
            .ajaxStart(function(){$(this).show();})
            .ajaxComplete(function(){$(this).hide();});

       $('#uploadForm').submit(function()
	   {
	   document.getElementById('uploadOutput').innerHTML = '';
	   $("#uploadForm").ajaxSubmit(options);  return false;
	   });

	function showRequest(formData, jqForm, options)
  {
  //    var queryString = $.param(formData);
  //   alert('Вот что мы передаем: \n\n' + queryString);
  //   alert('Вот что мы передаем: \n\n' + options.target+'\n'+options.url+'\n'+options.dataType+'\n'+options.success+'\n');
	//var fileToUploadValue = $('input[@name=fileToUpload]').fieldValue();
//	if (!fileToUploadValue[0])
//	   {
	//	document.getElementById('uploadOutput').innerHTML = 'Пожалуйста выберете файл!.';
	//	return false; //Форма не отправляется
	//   }
	return true;
  }

    function showResponse(data, statusText)
	 {
	/*  if (statusText == 'success')
	   {
		if (data.img != '')
		{
			document.getElementById('uploadOutput').innerHTML = '<img src="/upload/thumb/'+data.img+'" />';
		}
 		 else
			document.getElementById('uploadOutput').innerHTML = data.error;
	   }
	 else
	   	document.getElementById('uploadOutput').innerHTML = 'Unknow error!';*/
	 }
});
</script>
</body>
</html>

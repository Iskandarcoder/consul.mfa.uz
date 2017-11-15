<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	       <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <!-- <script type="text/javascript" src="js/jquery.form.js"></script>
   	-->
          <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
          <script type="text/javascript" src="js/jquery.json-2.3.js"></script>

 </head>
    <body>
   <div id="content">
<h2>ВИЗОВАЯ АНКЕТА</h2>
      <div id="wrapper1">
         <div id="steps">
	<form id="myForm" name="myForm" action="" method="post">
    	    <p class="sh1">
                 <label for="fam"> <font style="color:red;">*</font>&nbsp;Фамилия </label>
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
           <button  type="submit">Загрузить анкету </button>
            <button  id="add1" type="button">Добавить в группу </button>
              <button  id="ochistit" type="reset">Очистить форму </button>
      </form>
         </div>
            </div>
               </div>

 <script language="javascript" type="text/javascript">
 $(function(){
  var clients;
  var i_key=0;
 var data = new Object();

 $('#add1').bind('click',function()
  {
    data['clients['+i_key+'][fam]']=$('#fam').val();
  data['clients['+i_key+++'][ism]']=$('#ism').val();
  });
 ///
 $('#ochistit').bind('click',function()
  {
  data=0;
  data = new Object();
  i_key=0;
  });
  ///    $('#myForm').submit(function()
    {

     	$.ajax({   		url: 'dataparser.php',
   		type: 'POST',
   		data: data,
   		success: function(res){	alert(res); }
   	});
    return false;
   });
 });
</script>

 </body>
</html>

<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="" content="">
<link href="css/table_css.css" rel="stylesheet" type="text/css">
<style>#chart1{   height: 500px;}</style> 
 </head>
<script type="text/javascript" src="js/jquery.jqplot.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.jqplot.min.css" />
<script type="text/javascript" src="js/plugins/jqplot.barRenderer.js"></script>
<script type="text/javascript" src="js/plugins/jqplot.highlighter.js"></script>
<script type="text/javascript" src="js/plugins/jqplot.cursor.js"></script>
<script type="text/javascript" src="js/plugins/jqplot.pointLabels.js"></script>
<script type="text/javascript" src="js/plugins/jqplot.categoryAxisRenderer.js"></script>
 <?php
	include("db.php");
	include("function.php"); 
	include("count.php");
?>

    <body>
    <div id="dialog" class='ui-dialog'></div>
 <input  id="ses_name" type="hidden"  value = "<?php  echo $_SESSION['login'];?>" />
 <div id="wrapper">   
<h1>Статистика и мониторинг <br/>(2017 г.)</h1>
<h2>Общее количество вхождений :  <span></span></h2>
 <h3>Общее количество просмотров:  <span></span></h3>
 
<div><br></div>
    <div id="tableContainer" class="tableContainer">
<table class="scrollTable" width="100%" border="0" cellpadding="0"  cellspacing="0">
<thead class="fixedHeader">
	<tr class="alternateRow">
	 	<th><a href="#">№</a></th>
		<th><a href="#">Виды действий</a></th>
		<th><a href="#">Количество</a></th>
		<th><a href="#">%  (отн. просмотров)</a></th>
	</tr>
</thead>
<tbody class="scrollContent">

	<tr class="normalRow" >
		<td>1.</td>
		<td> &nbsp; Обращения для получения сертификата на возвращение</td>
		<td id="tr1td3">50</td>
		<td id="tr1td4"></td>
	</tr>
		<tr class="alternateRow">
		<td>2.</td>
		<td> &nbsp; Обращения для постановки на постоянный консульский учет</td>
		<td id="tr2td3"></td>
		<td id="tr2td4"></td>
	</tr>
		<tr class="normalRow">
		<td>3.</td>
		<td> &nbsp; Обращения для постановки на временный консульский учет</td>
		<td id="tr3td3"></td>
		<td id="tr3td4"></td>
	</tr>
			<tr class="alternateRow">
		<td>4.</td>
		<td> &nbsp; Оставившие рейтинговые оценки</td>
	        <td id="tr4td3"></td>
		<td id="tr4td4"></td>
	</tr>
			<tr class="normalRow">
		<td>5.</td>
		<td> &nbsp; Оставившие коментарии</td>
		<td id="tr5td3"></td>
		<td id="tr5td4"></td>
	</tr>
			<tr class="alternateRow">
		<td>6.</td>
		<td> &nbsp; Ответившие на опрос</td>
		<td id="tr6td3"></td>
		<td id="tr6td4"></td>
	</tr>
			<tr class="normalRow">
		<td>7.</td>
		<td> &nbsp; Зарегистрированные</td>
		<td id="tr7td3"></td>
		<td id="tr7td4"></td>
	</tr>
			<tr class="alternateRow">
		<td>8.</td>
		<td> &nbsp; Online-обращения</td>
		<td id="tr8td3"></td>
		<td id="tr8td4"></td>
	</tr>
</tbody>
</table>	
</div>
<div><br/><br/><br/></div>
<img id="loadImg" src="images/loading.gif" />
  <div id="chart1" ></div>
  </div>
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
  	/*
   	  if($('#ses_name').val()=='')
	  {
 MyAlert("Имеют доступ только зарегистрированные пользователи!","Памятка");
 setTimeout(function(){
	  window.history.back();
             return true;
},3000); 
         }*/
         $('#wrapper').show();
     
      		 $.ajax({
		type: "POST",
		beforeSend:  startLoadingAnimation(),
		url:  "statj.php",
		success: showResponse
                  }); 
     
   function showResponse(res){
             stopLoadingAnimation();
               $data = $.parseJSON(res);   
       $('h2 span').text($data.hosts);
       $('h3 span').text($data.views);

		var MyRows = $('table.scrollTable').find('tr');
		  $(MyRows[1]).find('td:eq('+2+')').html($data.sert-374);   
		          $(MyRows[1]).find('td:eq('+3+')').html((($data.sert-374)*100/$data.views).toFixed(1)+'%' ); 
                   $(MyRows[2]).find('td:eq('+2+')').html($data.pku);
                           $(MyRows[2]).find('td:eq('+3+')').html(($data.pku*100/$data.views).toFixed(1)+'%' ); 
                   $(MyRows[3]).find('td:eq('+2+')').html($data.vku);
                          $(MyRows[3]).find('td:eq('+3+')').html(($data.vku*100/$data.views).toFixed(1)+'%' ); 
                   $(MyRows[4]).find('td:eq('+2+')').html($data.c);
                          $(MyRows[4]).find('td:eq('+3+')').html(($data.c*100/$data.views).toFixed(1)+'%  ('+ ($data.rating/$data.c).toFixed(1)+')'); 
                   $(MyRows[5]).find('td:eq('+2+')').html($data.izoh);
                       $(MyRows[5]).find('td:eq('+3+')').html(($data.izoh*100/$data.views).toFixed(1)+'%' ); 
                   $(MyRows[6]).find('td:eq('+2+')').html($data.opros);
                         $(MyRows[6]).find('td:eq('+3+')').html(($data.opros*100/$data.views).toFixed(1)+'%' ); 
                   $(MyRows[7]).find('td:eq('+2+')').html($data.klients);
                         $(MyRows[7]).find('td:eq('+3+')').html(($data.klients*100/$data.views).toFixed(1)+'%' ); 
                   $(MyRows[8]).find('td:eq('+2+')').html($data.muammo);
                      $(MyRows[8]).find('td:eq('+3+')').html(($data.muammo*100/$data.views).toFixed(1)+'%' ); 
     
   	 $.jqplot.config.enablePlugins = true;  //$data.sert =parseInt($data.sert); alert($data.sert);
        var s1 = [parseInt($data.sert-374),parseInt($data.pku), parseInt($data.vku), parseInt($data.c),
                         parseInt($data.izoh),parseInt($data.opros),parseInt($data.klients),parseInt($data.muammo)];
        var ticks = ['1', '2', '3', '4','5','6','7','8'];
 $('#chart1').jqplot('chart1', [s1], {
        seriesColors:['#85802b', '#00749F', '#73C774', '#C73acC', '#17BDB8', '#7a5fb4', '#C7754C', '#e7aaB8'],
         animate: !$.jqplot.use_excanvas,
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer, pointLabels: { show: true },  //formatString: '%d'},
            rendererOptions: {
                varyBarColor: true
            }
        },
        axes:{
    //    	yaxis: { autoscale: true },
            xaxis:{
                renderer: $.jqplot.CategoryAxisRenderer,
                 ticks: ticks
            }
        },
        highlighter: { show: false }
    });	
      };
      
      
        	
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
      });
   </script>    
   </body>
</html>


<html>
 <?php
define('EDMS_MFA',true);
include('db.php');
mysql_select_db($base,$bd);

?>
<head>
  <title></title>
  <script type="text/javascript" src="js/jquery.js"></script>
   <script type="text/javascript" src="js/jquery.tooltip.js"></script>
   <link rel="stylesheet" type="text/css" href="css/style1.css" media='screen'>
   <script type="text/javascript" src="js/usl.js"></script>
<script type="text/javascript">
 $(function() {
$('#tooltiper img,#tooltiper1 img ').tooltip({
track: true,
delay: 0,
showURL: false,
fade: 200
});
});
function javob(){
if($("input[id$='sert']").is(':checked'))
{
alert('keldi!');
$("input[id$='ku']").attr('disabled',true);
$('#s_sert').css('display','block');
$('#s_pl').css('display','none');
}
else {if ($("input[id$='pl']").is(':checked')) {
	$("input[id$='sert']").attr('disabled',true);
	$('#s_sert').css('display','none');
	$('#s_pl').css('display','block');
}
     else {
	$("input[id$='ku']").attr('disabled',false);
	$("input[id$='pl']").attr('disabled',false);
	$("input[id$='sert']").attr('disabled',false);
	$('#s_sert').css('display','none');
	$('#s_pl').css('display','none');
	};
	};
};


</script>
  <style type="text/css">
<!--
#adress form input:checked + label {
color: #1593db/*#f00;*/;
}

-->
#tooltip {
width: 500px;
position: absolute;
z-index: 10;
border: 1px solid #1593db;
background-color: #e5f5fe;
font: 0,75 em verdana;
color: #000;
padding: 5px;
/*opacity: 0.85;*/
-moz-border-radius: 5px;
-webkit-border-radius: 5px;

}
#tooltiper img, #tooltiper1 img {
cursor:pointer;
}
</style>
 </head>

<body>
<div class="blok">Консульские услуги </div>

<div id="adress">
Выберите вид консульского действия, по которому Вы бы хотели сделать заявление, и нажмите «Далее»<br><br>
<div id="btn2">
В случае если Вы хотите узнать о статусе рассмотрения ранее представленного заявления и получить информацию о
статусе его рассмотрения, нажмите <strong>"Узнать ответ"</strong> <br><br>
</div>
<form id="myform" name="myform" action="index.php?action=vvod" method="post">
  <?php
    $select = mysql_query("SELECT * FROM l_uslugi") or die(mysql_error());
      while ($row=mysql_fetch_array($select))
      {
    echo "<div id=\"sh5\">\n";
    	echo "<div id=\"tooltiper\">\n";
		    echo "<div class=\"post\">\n";
		   		echo "<div class=\"title\">";
                echo "<input type=\"checkbox\" value=\"1\" name='".$row['sayt']."' onclick=\"selectByName(this.form,this.name)\">";
                echo "<label for='".$row['sayt']."'>".$row['nomi_rus']."</label>";
	            echo "</div>\n";
	            echo "<div id=\"1\" class=\"entry\">\n";
	            echo "<p> <a class=\"btn\" href=\"index.php?action=".$row['sayt']."\"><span><span>Далее</span></span></a>&nbsp <a class=\"btn\" href=\"index.php?action=shtrix&id=".$row['id']."\"><span><span>Узнать ответ</span></span></a></p>";
	            echo "</div>\n";
            echo "</div>\n";
        echo "</div>\n";
    echo "</div>\n";
              echo "<br>";
//              mysql_close($bd);
}
                ?>
</form>
</div>

</body>

</html>

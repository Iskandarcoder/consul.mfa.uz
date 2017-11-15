<head>
	<title>Сворачиваемые блоки</title>
	<meta http-equiv="Content-Language" content="ru" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<link rel="stylesheet" media="screen" type="text/css" href="css/adresa.css" />
	<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="js/adresa.js"></script>
</head>
<?php
define('EDMS_MFA',true);
include('db.php');
mysql_select_db($base,$bd);
$select = mysql_query("SELECT id, nomi_rus FROM l_elchixona ");
echo "<h2>Шаг №1. Выберите страну пребывания чтобы узнать обслужающего загранучреждения РУ </h2>";
echo "<script language=\"JavaScript\">\n";
echo "    <!--\n";
echo "    function go(i){\n";
echo "	var id=i;";
echo "  var dataString = 'id='+ id;";
echo "\n";

echo  " $('form#myform').attr({";
echo  " 'action': 'index.php?action=vvod&id='+i";
echo  "	});";

echo "$.ajax";
echo "({";
echo "type: \"POST\",";
echo "url: \"ajax_city.php\",";
echo "data: dataString,";
echo "cache: false, ";
echo "success: function(html)";
echo "{";
echo "$(\".adr\").html(html);";
echo "}";
echo "});";
echo "    }\n";
echo "    -->\n";
echo "    </script>\n";
echo " ";
echo "<p><form   name=\"myForm\"> Выбор страны пребывания: ";
echo "<select id='mySelect' name='mySelect'  onChange=\"go(parseInt(this.value));\">";
while(list($id, $name_rus) = mysql_fetch_row($select))
            {
            //$srt=iconv('UTF-8', 'CP1251', $gnrname);
            echo "echo <option value='$id'>$name_rus</option>";
            }
                echo"</select>";

echo "</form></p> ";
mysql_close($bd);

echo '<div class="adress">';
echo '<table class="adr" border="0" width="100%">';
echo '</table>';
echo '</div>';
echo ' <br />';
echo '<form id="myform" method=post action="index.php?action=vvod&id=" align="center" name="SelForm">';
echo ' <p align="center">';
echo ' <input type="checkbox" name="checkbox" value="checkbox" onClick="Active(this.form)" />';
echo ' Я выбрал нужную загранучреждение РУ';
echo '  <br />';
echo '	<input type=submit name="validation" disabled  value="Далее >> ">';
echo '	</p>';
echo '</form>';
?>

<script type="text/javascript">
function addLoadEvent(func) {
    var oldonload = window.onload;
    if (typeof window.onload != 'function') {
        window.onload = func;
    } else {
        window.onload = function() {
            if (oldonload) {
                oldonload();
            }
            func();
        }
    }
}
addLoadEvent(function() {
    go(1);
})

function Active(myform) {
if(myform.checkbox.checked == true) {myform.validation.disabled = false }
if(myform.checkbox.checked == false) {myform.validation.disabled = true }
}
</script>



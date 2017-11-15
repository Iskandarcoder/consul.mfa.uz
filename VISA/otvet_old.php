<?php

if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
include('db.php');
/*    mysql_query("INSERT INTO contact (email) VALUES ('ure')");*/
$query="SELECT * FROM msg_anketa where barcode='".$_POST[name_post]."'";

$sql=mysql_query($query);

$row=mysql_fetch_array($sql);
// Тут, товарисчи, вы можете делать что хотите. Данные из формы приходят методом POST,
// т.е. имеют вид $_POST["varible"]
$data=$row['msg'];
if(mysql_num_rows($sql) >0)
{
echo "<p class='otvet'>".$data."$_POST[fam]<br />
      <br />
Для внесения исправлений нажмите:<button id='edit' display='none'>Отредактировать</button>
</p>


";
}
else
{
echo "<p class='otvet'>Для Вас нет сообщении</p>";	};
}
?>

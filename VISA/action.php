<?php
 echo $_POST['submit'];
 print "Keldi";
switch($_POST['submit']) { //получаем значение переменной action

   case "Далее>>" :


   break;

   case "contacts" :

      require_once("contacts.php"); // выводим данные Контакты

   break;

   default : // если значение переменной action не указано, либо её не существует, либо нет искомого значения

      print "Данных нет";

   break;

}

?>

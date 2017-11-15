<html>

<head>
  <title></title>
</head>

<body>

<h2>Ввод штрих кода</h2>
<div id="adress">
Введите штрих код, полученный при оформлении первоначальной анкеты (штрих код был указан на распечатанном анкете на правом угле)<br><br>
<form id="myform" name="myform" action="index.php?action=vvod" method="post">
  <div id="tooltiper">
  <label for="sert">Введите штрих код анкеты</label>&nbsp;
    <input name="Edit" type="text" value="" id="sert">
</div>
<br>
   <div id="tooltiper">
  <label for="sert">Введите номер вашего паспорта</label>&nbsp;
    <input name="Edit" type="text" value="" id="sert">
    (Внимание!Только номер не серия)
</div>
<br>
<p align="center">
   <input id="validation" type=submit name="validation" value="Далее >> ">
   </p>
</form>
</div>

</body>

</html>
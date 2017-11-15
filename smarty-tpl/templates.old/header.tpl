<!DOCTYPE HTML>
<?php
	session_start();
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<link rel="stylesheet" type="text/css" href="css/oneid.css">
</head>

<body>
<div id="block-header">

<div class="login_select" >      
  <ul> 
  <li  id="OneID"> 
  <?php
  //    echo "<a title='Вход' href='Kirish.php'>";
  //    echo "<img src='images/kirish3.png'/>Kirish (Ro`yhatdan o`tish)</a>&nbsp&nbsp";
	  if ($_SESSION['oneid'] == 0)
	  {
	     echo "<input class='MyButton' type='button' value='ID.GOV.UZ orqali avtorizatsiya' 
	 	  onclick=\"window.location.href='Kirish.php'\" />";
	  }
	  else
	  {
		  echo $_SESSION['sur_name']."&nbsp".$_SESSION['first_name']."&nbsp&nbsp";
		  echo "<input class='MyExitButton' type='button' value='Chiqish' 
	 	  onclick=\"window.location.href='oneid/logout.php'\" />";

	  }
?>
   </li>
   <li id="Chiqish">
        <!--<a title="Chiqish" href="#">-->
      <img src="images/chiqish.png"/>
      Chiqish
   <!--   </a>-->
   </li>
  <li id="klient">
      <img src="images/user.png"/>
      Foydalanuvchi:  <span></span>
  </li>
</ul>
</div>


<div class="lang_select" >      
  <ul> 
  <li class="active_lang">
      <a title="uz" href="javascript:;">
      <img src="images/uz.png"/>
      <span>O`zbekcha</span>
      </a>
   </li>
  <li>
     <a title="ru" href="http://consul.mfa.uz/ru/?action=vibor">
     <img src="images/ru.png"/>
     <span>Русский</span>
     </a>
  </li>
</ul>
</div>


</div>
</body>
</html>
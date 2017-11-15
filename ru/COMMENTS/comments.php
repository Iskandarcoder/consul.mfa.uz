<!DOCTYPE HTML 
<html>
<head>
<title></title>
<meta name="" content="" charset="utf8">
     <link href="/uz/css/comment.css" rel="stylesheet" type="text/css" />
<style>
  
</style>
</head>
<?php
	include("../uz/db.php");
?>
<body>
 <header>Foydalanuvchilarning izohlari: <span></span></header>
 <div class="comments">
 <?php
       $select = mysql_query("SELECT  id,nomi,text_com,sana  FROM comments where moder ==1 order by sana ")   or die(mysql_error());
         while(list($id,$nomi,$text_com,$sana) = mysql_fetch_row($select))
       {
       echo '<div class="comm_head">';      	
       echo '<div class="comm_name">'.$nomi.'</div>';      	
       echo '<div class="comm_date">'.$sana.'</div>';
       echo '</div>';
       echo '<div class="comm_body">'; 
       echo '<div class="comm_text">'.$text_com.'</div>';
       echo '</div>';
       }
 ?>
 <div class="comm_head">
	<div class="comm_name">Rovshan</div>
	<div class="comm_date">2016-12-16 10:09:25</div>
 	</div>
  <div class="comm_body">
 	<div class="comm_text">Отлично, лёгкий, простенький и удобно СПАСИБО! Отличный сайт!</div>
 </div>	

 <div class="comm_head">
	<div class="comm_name">Karim</div>
	<div class="comm_date">2016-12-16 14:12:10</div>
 	</div>
  <div class="comm_body">
 	<div class="comm_text">Baraka topinglar, engil va qulay!<br>Gap bo`lishi mumkin emas!</div>
 </div>	
 </div>
  <div class="_line"></div>
  
<form class="add_comm" action="rating_with_stars.php#last" method="POST">
Izoh qoldirish:
<textarea rows="20" cols="68" name="user_text" required="required"></textarea>
<div class="c_right">
<input type="submit" value="Jo`natish"></div>
</form>
<p id="eslat">Sizning barcha izohlaringiz moderatsiyadan o`tadi.</p> <!--Перед публикацией все комментарии проходят обязательную модерацию!</p>-->
</body>
</html>
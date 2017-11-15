<?php
include_once("db.php");
	$login = $_POST['nomi']; 
         $password = $_POST['pas']; 
         $mdPassword = md5($password);

//$login = stripslashes($login);
//$login = htmlspecialchars($login);
//$password = stripslashes($password);
//$password = htmlspecialchars($password);
   $query = "SELECT id FROM klients WHERE login='$login' AND  password='$mdPassword'";

   $sql = mysql_query($query)   or die(mysql_error());
  $id_user = mysql_fetch_array($sql);   

if (empty($id_user['id'])){
	echo '-1';   // ("Извините, введённый вами логин или пароль неверный.");
}
else {
    $_SESSION['password']=$password; 
    $_SESSION['login']=$login; 
    $_SESSION['id']=$id_user['id'];
    echo '0';
}
?>

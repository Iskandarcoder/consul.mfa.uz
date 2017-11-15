<?php
    include_once("db.php");
                         $login = $_POST['nomi'];
			$password = $_POST['pas'];
			$mdPassword = md5($password);
			$email = $_POST['email'];
			$rdate = date("Y-m-d");
			$ism = $_POST['ism'];
			$fam = $_POST['fam']; 
    		$query = ("SELECT id FROM klients WHERE login='$login'");
			$sql = mysql_query($query) or die(mysql_error());
			
			if (mysql_num_rows($sql) > 0) {
				echo '-1' ;        //Пользователь с таким логином зарегистрированый!
			}
			else {
				    if($email != '')
				      {
				$query2 = ("SELECT id FROM klients  WHERE email='$email'");
				$sql = mysql_query($query2) or die(mysql_error());
				if (mysql_num_rows($sql) > 0){
					echo '-2';   //Пользователь с таким e-mail зарегистрированый!
					}
				}
				else{
					$query = "INSERT INTO klients (login, password, email, sana, ism, fam )
							  VALUES ('$login', '$mdPassword', '$email', '$rdate', '$ism', '$fam')";
					$result = mysql_query($query) or die(mysql_error());
					if($result)
					{
 $_SESSION['login'] = $login;
 $_SESSION['password'] = $password;
 $_SESSION['id'] = mysql_insert_id();
					echo '0';   //Вы успешно зарегистрировались!
					}
					else
					echo '-3';
				       }
			        }
?>
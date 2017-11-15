<?php
include "db.php";
 $usl_id=$_POST["usl_id"];

if ($_POST["rating"]>=0 and $_POST["rating"]<=5) $ocenka=$_POST["rating"];
else $ocenka='';
$date = date("Y-m-d");
 $ip=$_SERVER['REMOTE_ADDR'];
 $user_rating = $_SESSION["user_rating"];
 
 if($user_rating == 1)
 {
	 echo 'Siz bugun baho bergansiz!';
	 exit;
}
 if ($ocenka >0) {
 $res=mysql_query("SELECT count(id) FROM votes WHERE id_usl='".$usl_id."' and ip='".$ip."' and date='".$date."'");
$a = mysql_fetch_array($res);

 if($a[0]== 0) {
    
    $res=mysql_query("INSERT INTO votes (date,id_usl,ip,rating)
        values ('".$date."','".$usl_id."','".$ip."','".$ocenka."')");
     $_SESSION["user_rating"]=1;
    echo 'Rahmat, Sizning bahoingiz hisobga olinadi!';
 }
    else 
       echo 'Siz bugun baho bergansiz!';
}
?>
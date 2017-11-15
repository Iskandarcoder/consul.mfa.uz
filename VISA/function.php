<?php
 function getSana($access_date)
		{
		$ar_date=explode("-",$access_date);
		return $ar_date;
		}
function getMonth($n)			// Oylarining nomini olish
{
	include('db.php');
	$lSQL="SELECT * FROM l_oy where id=".$n;
	$sql=mysql_query($lSQL);
	$row=mysql_fetch_array($sql);
	return $row['ctitle_uz']."/".$row['proverka'];
}
function evisa_error($errno, $errstr, $errfile, $errline)
{
	$filename=basename($errfile);
	echo "<div class='error2'>";
	echo "<b>DB Error  [$errno]</b>\n";
/*	echo "<b>Error  [$errno]:</b> $errstr<br />\n";
    echo "File: <b>$filename </b>Line: <b>$errline</b>";
    */
    echo '</div>';
   	//Log the error
    include('db.php');
	$descr=addslashes($errstr);
 	$query="INSERT INTO errorlog_php values(NULL,NOW(),$errno,'$filename',$errline,'$descr')";
	$res=mysql_query($query) or die(mysql_error());

    exit(1);
}
?>
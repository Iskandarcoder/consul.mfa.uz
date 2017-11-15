<?php

if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
include('db.php');
mysql_query("SET NAMES 'UTF8'");
$log=0;
	if (strlen(trim($_POST[barkod]))>0)
	{
		if (strlen(trim($_POST[pasp_no]))>0)
		{
		//	$qqq = "";
			$pasp_no= str_replace (" ", $qqq, $_POST[pasp_no]);
//			$q=" barkod='".$_POST[barkod]."' and Pasp_No like '%".$_POST[pasp_no]."%'";
			$q=" barkod='".$_POST[barkod]."' and Pasp_No='".$pasp_no."'";
		}
		else
		{
			$q=" barkod='".$_POST[barkod]."'";
		}
	}
	else
	{
		if (strlen(trim($_POST[pasp_no]))>0)
	    {
//	    	$q=" Pasp_No like '%".$_POST[pasp_no]."%'";
            $pasp_no= str_replace (" ", $qqq, $_POST[pasp_no]);
	    	$q=" Pasp_No='".$pasp_no."'";
	    }
	    else
	    {
	    	$log=1;
	    }
	}
  //  echo "-".$log;
    if ($log==0)
    {

		$query="SELECT * FROM ruxsat where ".$q." order by id_visa desc";

//	      echo $query;
		$sql=mysql_query($query);
		$row=mysql_fetch_array($sql);

		if(mysql_num_rows($sql)>0)
		{
		//Echo "<p class='otvet'>Дата регистрации: ".$kir."";
			$Telex=$row['Telex'];
			$fio=$row['Family'];
			$pass=$row['Pasp_No'];
            $visa=$row['Viza_Joy'];
			$Kirish=$row['Kirish'];
			$Chiqish=$row['Chiqish'];

			echo "<p class='otvet'>&nbsp;&nbsp;Data of registration:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";echo date('d.m.Y', strtotime($Kirish));
			echo "<p class='otvet'>&nbsp;&nbsp;Surname, name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$fio."";
			echo "<p class='otvet'>&nbsp;&nbsp;Passport number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$pass."";
			echo "<p class='otvet'>&nbsp;&nbsp;Place of Visa Issuance:&nbsp;&nbsp;".$visa."";
			echo "<p class='otvet'>&nbsp;&nbsp;Telex number and date: &nbsp;".$Telex."&nbsp; from &nbsp;";echo date('d.m.Y', strtotime($Chiqish));



		}
		else
		{
    $ss="status='1' and "; 
                  $pos = strpos($q, 'barkod');
if($pos === false)
           $q=$ss.$q;
  else
     $q = $ss.substr($q,0,4)."code".substr($q,7); 

    
$pos = strpos($q, 'Pasp_No'); 
if($pos != false)
     $q = substr($q,0,$pos)."nomer=".substr($q,$pos+8); 
   
                $query="SELECT * FROM anketa where ".$q;

                $sql=mysql_query($query);

		$row=mysql_fetch_array($sql);

		if(mysql_num_rows($sql)>0)
		{
$fio=$row['fam']." ".$row['ism']." ".$row['sharif'];
                  echo "<p class='otvet'>&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   Visa application form of </br>
                 &nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
                                   $fio </br>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   is under consideration</p>";
                  }
                 else
                 {
		   echo "<p class='otvet'>&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We have not any information for you</p>";
                 }
		};
	}
	else
	{
			echo "<p class='otvet'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Enter bar code or passport №</p>";
			$log=0;
	}
}
?>

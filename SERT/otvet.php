<?php
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
include('../db.php');
mysql_query("SET NAMES 'UTF8'");

$query="SELECT * FROM ";
 $guid = strtoupper ($_GET['name']);  
 if($_GET['id']==1) $query .="javob_mvd where P_MID_GUID =".$guid;
 if($_GET['id']==2) $query .="msg_vku where ";
 if($_GET['id']==3) $query .="msg_ku where ";
/* if($_GET['key']==1)  
 {

  if(strlen($guid)>=12)
    $query .= "P_MID_GUID like '%".$_GET['name']."%'";
    else
    {
    echo "0#<p class='otvet'>ID kamida 12 simvol bo`lishi shart </p>";
    exit;
    }  
    }
  else
    $query .= "n_pasport='".$_GET['name']."'"." ORDER BY sana DESC";
*/
 $x=0;   
$sql=mysql_query($query);
if($sql){
$row=mysql_fetch_array($sql);
$x=mysql_num_rows($sql);
}
  $b="<p class='otvet_o'> Sizning ID:&nbsp&nbsp<span>".$guid."</span></p";
  if($x>0)
{
  $info = 'Hurmatli  ';
  $fam=$row['P_SURNAMEL'];
  $ism=$row['P_NAMEL'];
  $info = $info.$fam.'  '.$ism.'!<br /><br/> Siz uchun O`zb.Res. IIV dan javob bor.';
   echo    $b."#<p class='otvet'>".$info."</p>";
   }
  else
    echo   $b."#<p class='otvet'>Siz uchun ma`lumot topilmadi.<br/>Kuzatib bo`ring!</p>";
    //   echo   $b."#<p class='otvet'>Hurmatli Rahimov Rovshan!<br /><br/> Siz uchun O`zb.Res. IIV dan javob bor'</p>";
}
?>

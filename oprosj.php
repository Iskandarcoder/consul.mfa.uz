<?php
include('../uz/db.php');

  $ip=$_SERVER['REMOTE_ADDR'];
 $user_survey = $_SESSION["user_survey"];
 
   // if(isset($_POST['submit']))
{
	 switch($_POST['myradio1'])
    {
        case "alo":
            $alo = 1; $yahshi = 0; $qoniqarli = 0; $yomon = 0; 
            break;
        case "yahshi":
           $alo = 0; $yahshi = 1; $qoniqarli = 0; $yomon = 0;
            break;
        case "qoniqarli":
           $alo = 0; $yahshi = 0; $qoniqarli = 1; $yomon = 0;
            break;
            case "yomon":
           $alo = 0; $yahshi = 0; $qoniqarli = 0; $yomon = 1;
            break;
              default:
            $alo = 0; $yahshi = 0; $qoniqarli = 0; $yomon = 0; 
            break;
    }
     switch($_POST['myradio2'])
    {
        case "ha":
            $ha = 1; $yoq = 0; 
            break;
        case "yoq":
            $ha = 0; $yoq = 1; 
            break;
            default:
            $ha = 0; $yoq = 0; 
            break;
     }
      $jtext = $_POST['quest'];
       $date = date("Y-m-d");    
 
   $res=mysql_query("SELECT count(id)   FROM   opros_j   WHERE   ip_out ='".$ip."'  and date='".$date."'");
$a = mysql_fetch_array($res);
      
 if(($user_survey ==1)||($a[0] > 0))      //Если опрос  сделан во время сессии или  с этого IP сегодня
 {
 	
	 print_r(answer());
	 exit;
}
 else
{
     $res=mysql_query("INSERT  INTO  opros_j   (ip_out,alo,yahshi,qoniqarli,yomon,ha,yoq,jtext,date)
       values ('".$ip."','".$alo."','".$yahshi."','".$qoniqarli."','".$yomon."','".$ha."', '".$yoq."', '".$jtext."','".$date."')");
       
   $_SESSION["user_survey"]=1;
        print_r(answer());
}    
}
 
 function answer(){
      $answer_count = mysql_fetch_array(mysql_query("SELECT count(id)   FROM   opros_j"));  
      $alo_count =        mysql_fetch_array(mysql_query("SELECT count(alo)   FROM   opros_j  WHERE   alo = 1"));	
      $yahshi_count =        mysql_fetch_array(mysql_query("SELECT count(yahshi)   FROM   opros_j  WHERE   yahshi = 1"));	
      $qoniqarli_count =        mysql_fetch_array(mysql_query("SELECT count(qoniqarli)   FROM   opros_j  WHERE   qoniqarli = 1"));	
      $yomon_count =       mysql_fetch_array( mysql_query("SELECT count(yomon)   FROM   opros_j  WHERE   yomon = 1"));	
      $ha_count =        mysql_fetch_array(mysql_query("SELECT count(ha)   FROM   opros_j  WHERE   ha = 1"));	
      $yoq_count =        mysql_fetch_array(mysql_query("SELECT count(yoq)   FROM   opros_j  WHERE   yoq = 1"));	
      $jtext_count =        mysql_fetch_array(mysql_query("SELECT count(jtext)   FROM   opros_j  WHERE   jtext != ''"));	
      $arr = array("count" => $answer_count[0],
                          "alo" => $alo_count[0],
                          "yahshi" => $yahshi_count[0],
                          "qoniqarli" => $qoniqarli_count[0],
                          "yomon" => $yomon_count[0],
                          "ha" => $ha_count[0],
                          "yoq" => $yoq_count[0],
                          "jtext" => $jtext_count[0]);
                          return  json_encode($arr);
}
  
  /*  function findUserIP(){
            $forward_ip = @getenv('HTTP_X_FORWARDED_FOR');
            if(empty($forward_ip)){
                    $user_ip = @getenv('REMOTE_ADDR');
                    $proxy_ip = '';
            }
            else{
                    $user_ip = $forward_ip;
                    $proxy_ip = @getenv('REMOTE_ADDR');
            }
       }*/
?>
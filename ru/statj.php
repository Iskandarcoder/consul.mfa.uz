<?php
include('db.php');
  
     $date =   "2016-01-01";    
     $date1 = "2015-11-20";
     
     $res=mysql_query("SELECT sum(hosts), sum(views)        FROM   visits  WHERE   date >= '".$date."'");
$row = mysql_fetch_array($res);
 $hosts= $row[0];
 $views = $row[1];
       $res=mysql_query("SELECT count(p_id)   FROM   anketa_new ");  // WHERE   p_dateenter >= '".$date1."'");
$row = mysql_fetch_array($res);
 $sert = $row[0];
       $res=mysql_query("SELECT count(id)         FROM   kus  WHERE   consular_account_type = 0");
$row = mysql_fetch_array($res);
 $pku= $row[0];
       $res=mysql_query("SELECT count(id)         FROM   kus  WHERE   consular_account_type = 1");
$row = mysql_fetch_array($res);
 $vku= $row[0];
        $res=mysql_query("SELECT count(id), sum(rating)        FROM   votes  WHERE   date >= '".$date."'");
$row = mysql_fetch_array($res);
 $c= $row[0];
 $rating = $row[1];
       $res=mysql_query("SELECT count(id)         FROM   comments  WHERE   sana >= '".$date."'");
$row = mysql_fetch_array($res);
 $izoh= $row[0];
      $res=mysql_query("SELECT count(id)         FROM   opros_j  WHERE   date >= '".$date."'");
$row = mysql_fetch_array($res);
 $opros= $row[0];
      $res=mysql_query("SELECT count(id)         FROM   klients ");
$row = mysql_fetch_array($res);
 $klients= $row[0];
     $res=mysql_query("SELECT count(id)         FROM   muammo  WHERE   sana >= '".$date."'");
$row = mysql_fetch_array($res);
 $muammo= $row[0];
      $arr = array("hosts" => $hosts,
                             "views" => $views,
                             "sert" => $sert,
                            "pku" => $pku,
                            "vku" => $vku,
                            "c" => $c,
                            "rating" => $rating,
                            "izoh" => $izoh,
                            "opros" => $opros,
                            "klients" => $klients,
                            "muammo" => $muammo);
          echo  json_encode($arr);
?>
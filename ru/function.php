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
	return $row['ctitle_ru']."/".$row['proverka'];
}


function guid(){ 
    if (function_exists('com_create_guid')){
        $guid=com_create_guid();
        $guid=str_replace("-","",$guid);
		$guid=str_replace("{","",$guid);
		$guid=str_replace("}","",$guid);
		return $guid;
    }else{
        mt_srand((double)microtime()*10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// ""
                substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12);
        return $charid;
    }
}

?>
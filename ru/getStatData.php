<?php
/*echo  $data =  '{
  "cols": [
        {"id":"",  "label":"Topping",  "type":"string"},
        {"id":"",  "label":"Slices",       "type":"number"}
      ],
  "rows": [
        {"c":[{"v":"Mushrooms"},{"v":3}]},
        {"c":[{"v":"Onions"},         {"v":1}]},
        {"c":[{"v":"Olives"},           {"v":1}]},
        {"c":[{"v":"Zucchini"},       {"v":1}]},
        {"c":[{"v":"Pepperoni"},    {"v":2}]}
      ]
}'*/
 include_once("db.php");
 /*$data = array(
	"cols"=>array( 0=>array("label"=>"Sana",            "type"=>"string"),
	                           1=>array("label"=> "IP adres",     "type"=>"string"),
	                           2=>array("label"=>"Baho",           "type"=>"number")
	                  ),
	  "rows"=>array( "c"=>array(0=>array("v"=>""),
	                                                   1=>array("v"=>""),
	                                                   2=>array("v"=>"")
	                                                   )
	                                               )
                           );
          $query = "SELECT date,id_usl,ip,rating FROM votes ";
	 $res = mysql_query($query);      
	   while($row = mysql_fetch_assoc($res))
	{
		$data["rows"]["c"][0]["v"]=$row["date"];
		$data["rows"]["c"][1]["v"]=$row["ip"];
		$data["rows"]["c"][2]["v"]=$row["rating"];
		}        */ 
 function getDataString()
 {
	$query = "SELECT date,id_usl,ip,rating FROM votes ";
	$res = mysql_query($query);
	$data ='{ "cols": [';
	$data .='{ "label":"Sana",        "type":"string"},' ;
	$data .='{ "label":"IP adres",  "type":"string"},' ;
	$data .='{ "label":"Baho",       "type":"number"}' ;
	$data .='], "rows": [';
	
	while($row = mysql_fetch_assoc($res))
	{
	$data .='{"c":[{"v":"'
	                .$row['date'].
	                '"},{"v":"'
	                .$row['ip'].
	               '"},{"v":"'
	                .$row['rating'].
	                '"}]},';	
	}
	$data = rtrim($data,',');
	$data .=']}';
	return $data;
};

echo getDataString();
//echo json_encode($data); 
?>
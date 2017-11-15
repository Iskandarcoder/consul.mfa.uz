<?php
/*$data = json_decode($_POST['jsonData']);
 // echo $data->{'fam'};
$response = 'Получено параметров   '.count($data)."\n";
foreach($data as $key => $value){	$response .= 'Параметр: ' .$key. ' Значение: '.$value."\n";
	}
	echo $response;
	*/
	foreach($_POST['clients'] as $key => $value)
	{      $response .= 'Параметр: ' .$key. ' Значение: '.$value[fam]."\n";
       $response .= 'Параметр: ' .$key. ' Значение: '.$value[ism]."\n";
		}
	echo $response;
?>

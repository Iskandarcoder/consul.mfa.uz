<?php
/*$data = json_decode($_POST['jsonData']);
 // echo $data->{'fam'};
$response = 'Получено параметров   '.count($data)."\n";
foreach($data as $key => $value){	$response .= 'Параметр: ' .$key. ' Значение: '.$value."\n";
	}
	echo $response;
	*/
	foreach($_POST['clients'] as $key => $value)
	{      $response .= $key. ':   '.$value[fam]."\n";
      $response .= $key. ':   '.$value[ism]."\n";
      $response .= $key. ':   '.$value[sharif]."\n";
      $response .= $key. ':   '.$value[prejfam]."\n";
      $response .= $key. ':   '.$value[prejism]."\n";
      $response .= $key. ':   '.$value[prejsharif]."\n";
      $response .= $key. ':   '.$value[photo]."\n";
      $response .= $key. ':   '.$value[pol]."\n";
      $response .= $key. ':   '.$value[birthYear]."\n";
      $response .= $key. ':   '.$value[tugoy]."\n";
      $response .= $key. ':   '.$value[tugDay]."\n";
      $response .= $key. ':   '.$value[strana1]."\n";
      $response .= $key. ':   '.$value[tugjoy]."\n";
      $response .= $key. ':   '.$value[fuqaro]."\n";
      $response .= $key. ':   '.$value[prejfuqaro]."\n";
      $response .= $key. ':   '.$value[tip]."\n";
      $response .= $key. ':   '.$value[nomer]."\n";
      $response .= $key. ':   '.$value[vidanYear]."\n";
      $response .= $key. ':   '.$value[vidanMonth]."\n";
      $response .= $key. ':   '.$value[vidanDay]."\n";
      $response .= $key. ':   '.$value[srokYear]."\n";
      $response .= $key. ':   '.$value[srokMonth]."\n";
      $response .= $key. ':   '.$value[srokDay]."\n";
      $response .= $key. ':   '.$value[kem]."\n";
      $response .= $key. ':   '.$value[sem_pol]."\n";
      $response .= $key. ':   '.$value[fiosup]."\n";
      $response .= $key. ':   '.$value[kirYear]."\n";
      $response .= $key. ':   '.$value[kiroy]."\n";
      $response .= $key. ':   '.$value[kirkun]."\n";
      $response .= $key. ':   '.$value[chiq_Year]."\n";
      $response .= $key. ':   '.$value[chiq_oy]."\n";
      $response .= $key. ':   '.$value[chiq_kun]."\n";
     $response .= $key. ':   '.$value[kol_kir]."\n";
     $response .= $key. ':   '.$value[kun]."\n";
     $response .= $key. ':   '.$value[rass_kun]."\n";
     $response .= $key. ':   '.$value[elchixona]."\n";
     $response .= $key. ':   '.$value[maqsad]."\n";
     $response .= $key. ':   '.$value[taklifchi]."\n";
     $response .= $key. ':   '.$value[adressru]."\n";
     $response .= $key. ':   '.$value[avvalkir]."\n";
     $response .= $key. ':   '.$value[fio_deti]."\n";
     $response .= $key. ':   '.$value[job]."\n";
     $response .= $key. ':   '.$value[job2]."\n";
     $response .= $key. ':   '.$value[mesto_propis]."\n";
     $response .= $key. ':   '.$value[operator]."\n";
     $response .= $key. ':   '.$value[status]."\n";
		}
	echo $response;
?>

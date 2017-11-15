<?php
session_start();

$authorizationurl = "https://sso.gov.uz:8443/sso/oauth/Authorization.do";
$clientid = "consul_mfa_uz";
$clientsecret = "Ta4STuEUU2/WQ6sKlBBagQ==";
$scope = "consul_mfa_uz";

$authCode = $_GET["code"];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$authorizationurl);
curl_setopt($ch, CURLOPT_POST, true);

$param = "grant_type=" . rawurlencode('one_authorization_code');
$param = $param . "&client_id=" . rawurlencode($clientid);
$param = $param . "&client_secret=" . rawurlencode($clientsecret);
$param = $param . "&code=" . rawurlencode($authCode);
$param = $param . "&scope=" . rawurlencode($scope);
$param = $param . "&redirect_uri=" . rawurlencode("");

curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec ($ch);
curl_close ($ch);

$obj = json_decode($result);

$access_token = $obj->{'access_token'};

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$authorizationurl);
curl_setopt($ch, CURLOPT_POST, true);

$param = "grant_type=" . rawurlencode('one_access_token_identify');
$param = $param . "&client_id=" . rawurlencode($clientid);
$param = $param . "&client_secret=" . rawurlencode($clientsecret);
$param = $param . "&scope=" . rawurlencode($scope);
$param = $param . "&access_token=" . rawurlencode($access_token);

curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$results = curl_exec ($ch);
curl_close ($ch);

//echo  $results;
	 $str = $results;
     $str= substr($str,1);
     $lll = strlen($str);
     $str= substr($str,0,$lll-1);
    // $str = '"oneid":"1",'.$str.',';
     $i = 1;
     for ($i = 0; $i <= 27; $i++)
     {
     	 $metka = strpos($str, ":");
     	 $valid1 = substr($str,0,$metka);
     	 $gs = str_replace('"','',$valid1);

     	 $gs = str_replace(' ','',$gs);
		 $gs = str_replace(chr(13),'',$gs);
		 $gs = str_replace(chr(10),'',$gs);

	     $str= substr($str,$metka+1);
    	 $metka = strpos($str, ",");
	     $valid = substr($str,0,$metka);
	     $valid = str_replace('"','',$valid);
	     $_SESSION[$gs]=$valid;
	     echo $_SESSION[$gs]."<br>";
	     $str = substr($str,$metka+1);
     }
	 $_SESSION['oneid']=1;

header('Location: http://consul.mfa.uz/uz/?action=vibor');
?>
<?php
$authorizationurl = "https://sso.gov.uz:8443/sso/oauth/Authorization.do";
$clientid = "adp.gov.uz";
$clientsecret = "adp.gov.uz";
$scope = "adp.gov.uz";

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

echo  $results;

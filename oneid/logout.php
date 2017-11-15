<?php

/**
 remove Local Session
*/

	session_start();


	$_SESSION['oneid']=0;
	$_SESSION['valid']='';
	$_SESSION['tem_adr']='';
	$_SESSION['role_list']='';
	$_SESSION['le_name']='';
	$_SESSION['gd']='';
	$_SESSION['per_adr']='';
	$_SESSION['tin']='';
	$_SESSION['pport_issue_date']='';
	$_SESSION['sur_name']='';
	$_SESSION['first_name']='';
	$_SESSION['le_tin']='';
	$_SESSION['user_id']='';
	$_SESSION['birth_date']='';
	$_SESSION['user_type']='';
	$_SESSION['birth_cntry']='';
	$_SESSION['pport_expr_date']='';
	$_SESSION['ret_cd']='';
	$_SESSION['natn']='';
	$_SESSION['ws_list']='';
	$_SESSION['pport_no']='';
	$_SESSION['mid_name']='';
	$_SESSION['mob_phone_no']='';
	$_SESSION['pin']='';
	$_SESSION['email']='';
	$_SESSION['sess_id']='';
	$_SESSION['pport_issue_place']='';
	$_SESSION['full_name']='';


$clientid = "consul_mfa_uz";
header("Location:" . "https://sso.gov.uz:8443/sso/svc/tk/SLOUzb.do?id=" . $clientid);
?>

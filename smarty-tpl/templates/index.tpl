<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="no-cache" charset="utf8" />
      <link href="css/reset.css" rel="stylesheet" type="text/css" />
      <link href="css/style.css" rel="stylesheet" type="text/css" />
      <link href="css/menu2.css" rel="stylesheet" type="text/css"/>
      <link href="css/style_fix.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css"/>
        
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.css"/>
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.theme.css"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        
  <script type="text/javascript" src="js/ajaxupload.js"></script>                       
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.form.js"></script>
  <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
   <script type="text/javascript" src="js/jquery-ui.js"></script>
   <script type="text/javascript" src="js/functiyalar.js"></script>
	<title>{$site_name}</title>
</head>
<body>
{include file="Header.tpl"}

<div id="mySidenav" class="sidenav hidden-xs hidden-sm">

 <a href="?action=sorov" id="about"><p>Опрос</p> <i class="fa fa-check-square-o fa-2x"></i></a> 
<a href="?action=liniya" id="blog"><p>Онлайн обращения</p> <i class="fa fa-comments-o fa-2x"></i></a>
 <a href="?action=pol_ist" id="projects"><p>Полезные ссылки</p> <i class="fa fa-external-link fa-2x"></i></a>
 <a href="?action=stat" id="contact"><p>Статистика</p> <i class="fa fa-line-chart fa-2x"></i></a>

</div>


      <div id="wrapper">
        {include_php file=$Action.name}
      </div>
 {include file="footer.tpl"}
</div>

</body>
</html>
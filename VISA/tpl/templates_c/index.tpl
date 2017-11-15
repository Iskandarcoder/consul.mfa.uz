<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>{$title}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" lang="ru" content="{$keywords}">
<meta name=Robots content="all">


<link rel="stylesheet" type="text/css" href="css/stylecapthcha.css"/>
<link rel="stylesheet" href="css/style1.css" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/confirm.css" media='screen'/>
<link rel="stylesheet" type="text/css" href="css/jquery.alerts.css" media='screen'/>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media='screen'/>
 <link rel="stylesheet" type="text/css" href="css/multiple-select.css" media='screen'/>

<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/ajaxupload.js"></script>
<script src="js/jquery-ui-1.8.6.custom.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.simplemodal-1.3.5.js"></script>
<script type="text/javascript" src="js/jquery.alerts.js"></script>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.multiple.select.js"></script>
<script type="text/javascript" src="js/imagesize.js"></script>
<script type="text/javascript" src="js/utils.js"></script>

</head>
<body>
<div id="header"></div>
<div id="bar">
<div id="gmenu">{include_php file="Menu.php"}
</div>
</div>
<table id=wrapper border="0" cellspacing="0" cellpadding="0">
 <tr  valign="top">
     <td class="body_txt">
     {include_php file=$Action.name}
        </td>
  </tr>
  </table>
 {include file="Footer.tpl" }


</body>
</html>


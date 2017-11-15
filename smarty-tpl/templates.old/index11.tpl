<!DOCTYPE HTML>
<html>
<head><!--<meta http-equiv="Cache-Control" content="no-cache"text/htm>-->
	<meta http-equiv="content-type" content="no-cache" charset="utf-8" />
     <link href="css/reset.css" rel="stylesheet" type="text/css" />
     <link href="css/style.css" rel="stylesheet" type="text/css" />
     <link href="css/menu2.css" rel="stylesheet" type="text/css"/>
       <link href="css/style_fix.css" rel="stylesheet" type="text/css" />
       <link href="css/chosen.css" rel="stylesheet" type="text/css" />
        
          <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.css"/>
            <link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.theme.css"/>
        
  <script type="text/javascript" src="js/ajaxupload.js"></script>                       
 <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.form.js"></script>
  <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
   <script type="text/javascript" src="js/jquery-ui.js"></script>
   <script type="text/javascript" src="js/functiyalar.js"></script>
   <script type="text/javascript" src="js/chosen.js"></script>

	<title>{$site_name}</title>
</head>

<body>

<ul id="navigation">
  <li class="opros"><a class="tooltip" href="?action=sorov" ><span class="classic">So`rovnoma</span></a></li>
  <li class="fikr"><a class="tooltip" href="?action=liniya"><span class="classic2">"Online" murojaatnoma</span></a></li>
  <li class="manba"><a class="tooltip" href="?action=pol_ist"><span class="classic1">Foydali manbaalar</span></a></li>
  <li class="stat"><a class="tooltip" href="?action=stat"><span class="classic1">Statistika ma`lumotlari</span></a></li>
</ul>

<div id="block-body">

{include file="Header.tpl"}
{include file="menu.tpl"}

<table id="body" >
    <tr valign="top">
      <td id="block-content">{include_php file=$Action.name}</td>
    </tr>
</table>



{include file="footer.tpl"}
</div>

</body>
</html>
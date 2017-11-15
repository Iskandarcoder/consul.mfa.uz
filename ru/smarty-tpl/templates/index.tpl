<!DOCTYPE HTML>
<html>
<head><!--<meta http-equiv="Cache-Control" content="no-cache"text/htm>-->
	<meta http-equiv="content-type" content="no-cache" charset="utf8" />
     <link href="css/reset.css" rel="stylesheet" type="text/css" />
     <link href="css/style.css" rel="stylesheet" type="text/css" />
     <link href="css/menu2.css" rel="stylesheet" type="text/css"/>
       <link href="css/style_fix.css" rel="stylesheet" type="text/css" />
        
          <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.css"/>
            <link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.theme.css"/>
        
  <script type="text/javascript" src="js/ajaxupload.js"></script>                       
 <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.form.js"></script>
  <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
   <script type="text/javascript" src="js/jquery-ui.js"></script>
   <script type="text/javascript" src="js/functiyalar.js"></script>

	<title>{$site_name}</title>
</head>
<!-- Chatra {literal} -->
<script>
    (function(d, w, c) {
        w.ChatraID = 'Lf584CS2uBui8Zrqs';
        var s = d.createElement('script');
        w[c] = w[c] || function() {
            (w[c].q = w[c].q || []).push(arguments);
        };
        s.async = true;
        s.src = (d.location.protocol === 'https:' ? 'https:': 'http:')
        + '//call.chatra.io/chatra.js';
        if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');
</script>
<!-- /Chatra {/literal} -->
<body>

<ul id="navigation">
  <li class="opros"><a class="tooltip" href="?action=sorov" ><span class="classic">Опрос</span></a></li>
  <li class="fikr"><a class="tooltip" href="?action=liniya"><span class="classic2"> Онлайн обращения</span></a></li>
  <li class="manba"><a class="tooltip" href="?action=pol_ist"><span class="classic1">Полезные ссылки</span></a></li>
  <li class="stat"><a class="tooltip" href="?action=stat"><span class="classic1">Статистика</span></a></li>
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>{$title}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<META HTTP-EQUIV="Pragma" content="no-cache">
<META HTTP-EQUIV="Expires" Content="Mon, 28 Mar 1999 00:00:01 GMT">
<meta name="Document-state" content ="Dynamic">
<meta name="description" content="{$description}">
<meta name="keywords" lang="ru" content="{$keywords}">
<meta name=Robots content="all">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/imagesize.css" type="text/css" />
<script type="text/javascript" src="js/imagesize.js"></script>
</head>

<body>

{include file="Header.tpl"}
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr valign="top" >
  <td colspan="2">{include_php file="Menu.php"}</td>
 </tr>

   <tr valign="top">
	<td width="120" >
     <!--  <div class="lmenu">
            <a href="?page=main">Главная</a>
            <a href="?page=chzv">Часто задаваемые вопросы</a>
            <a href="?page=adress">Адреса загранучреждений Узбекистана</a>
    	</div>
		-->

		<div>
<p><img class="expando" border="0" src="images/mfa-small.jpg" width="80" height="50"></p>
<p><img class="expando" border="0" src="images/sentyabr1.jpg" width="80" height="50"></p>
<p><img class="expando" border="0" src="images/e-visa_r.jpg" width="80" height="50"></p>
       </div>
      <!--  <div class="lblock">
       <h2>Поcледние новости</h2>
          {$blok_news}
        </div>-->

    </td>
        <td class="body_txt">
      {include_php file=$Action}
        </td>
  </tr>
  </table>


  <br>
    {include file="Footer.tpl" Img1="Images/mfa-small.jpg"  Img2="Images/e-visa_r.jpg"
                               Img3="Images/sentyabr1.jpg" }


</body>
</html>


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
<link rel="stylesheet" type="text/css" href="css/stran.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
 <script type="text/javascript">
<!--
	var mybrowser=BrowserDetect.browser;
	var version=BrowserDetect.version;
	if(mybrowser=='Explorer' && version<'8')
		window.location='incompatible.html';
// -->
</script>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.4.custom.css"  rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/stylecapthcha.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery.alerts.css">
<link rel="stylesheet" href="css/style1.css" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/confirm.css" media='screen'>
<script src="js/jquery-ui-1.8.6.custom.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/sliding.form.js"></script>
<script type="text/javascript" src="js/ajaxupload.js"></script>
<script type="text/javascript" src="js/jquery.simplemodal-1.3.5.js"></script>
<script type="text/javascript" src="js/jquery.alerts.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="sliding.form.js"></script>
<script type="text/javascript" src="ajaxupload.js"></script>
<script type="text/javascript" src="js/ui.datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="css/latest.css">
<link rel="stylesheet" type="text/css" href="css/keyboard.css">
<script type="text/javascript" src="js/keyboard.js"></script>
<script language="javascript" type="text/javascript">
function AppendFio()
{
	var a=$('#fam').val()+' '+$('#ism').val();
	var index=0;
   $('#fio option').each(function()
	{
 		if(this.text==a.toString()){index=-1;  return false;}
 	 } );
            if(index!=-1)
            {
           	             $('#registerButton').attr('disabled','');
       	                 $("#registerButton").css({ "background-color":'#4797ED', "color":'#fff' });
                         $("#fio").append('<option value="4">'+a+'</option>');
                        return 0;
         	}
            else
            	            return -1;
           };
</script>
<div id="header"></div>
</head>

<body>

{*{include file="Header.tpl"}*}
<table id=wrapper2 border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td width="200" >
       <div class="lmenu">
            <a href="?page=main">Главная</a>
            <a href="?page=chzv">Часто задаваемые вопросы</a>
            <a href="?page=adress">Адреса загранучреждений Узбекистана</a>
    	</div>
        <div class="lblock">
          <h2>Поcледние новости</h2>
              {$blok_news}
        </div>

    </td>
        <td class="body_txt">
          {include_php file=$Action}
        </td>
  </tr>
  </table>
    {include file="Footer.tpl" Img1="Images/mfa-small.jpg"  Img2="Images/e-visa_r.jpg"
                               Img3="Images/sentyabr1.jpg" }

</body>
</html>


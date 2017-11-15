<?php /* Smarty version 2.6.20, created on 2011-09-21 11:32:44
         compiled from index.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<meta name="keywords" lang="ru" content="<?php echo $this->_tpl_vars['keywords']; ?>
">
<meta name=Robots content="all">
<div id="header"></div>


<link rel="stylesheet" type="text/css" href="css/stran.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
   <script type="text/javascript" src="js/imagesize.js"></script>
</head>
<body>

<div id="bar">
<div id="gmenu"><?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => "Menu.php", 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
<img id="headerImg" src="images/gerb.png" alt="*" />
</div>
<table id=wrapper border="0" cellspacing="0" cellpadding="0">

  <tr  valign="top">
  <td bgcolor="#FFFF99" width="200">
  <div class="blok">Полезные ссылки</div>
    <div >
<p><a href="http://www.mfa.uz" target="_blank"><img bgcolor="#3BB3C2" class="expando" border="0" src="images/mfa.jpg"
alt="Министерство иностранных дел Республики Узбекистан" width="120" height="80"></p>
<p><a href="http://mfa.uz/rus/pressa_i_media_servis/znam_data/nez_19let/" target="_blank"><img class="expando" border="0" src="images/sentyabr1.jpg" width="120" height="80"></p>
<p><a href="http://www.evisa.mfa.uz" target="_blank"><img class="expando" border="0" src="images/e-visa_r.jpg" width="120" height="80"></p>
       </div>
  </td>
        <td class="body_txt">


     <?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => $this->_tpl_vars['Action']['name'], 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>


        </td>
  </tr>
  </table>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


</body>
</html>

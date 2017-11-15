<?php /* Smarty version 2.6.20, created on 2012-04-04 11:24:54
         compiled from index.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" lang="ru" content="<?php echo $this->_tpl_vars['keywords']; ?>
">
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
<div id="gmenu"><?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => "Menu.php", 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>

</div>
</div>
<table id=wrapper border="0" cellspacing="0" cellpadding="0">
 <tr  valign="top">
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


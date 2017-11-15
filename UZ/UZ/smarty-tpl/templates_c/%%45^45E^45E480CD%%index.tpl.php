<?php /* Smarty version 2.6.20, created on 2017-01-12 13:57:11
         compiled from index.tpl */ ?>
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

	<title><?php echo $this->_tpl_vars['site_name']; ?>
</title>
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
  <li class="opros"><a class="tooltip" href="?action=sorov" ><span class="classic">So`rovnoma</span></a></li>
  <li class="fikr"><a class="tooltip" href="?action=liniya"><span class="classic2"> On-line murojat</span></a></li>
  <li class="manba"><a class="tooltip" href="?action=pol_ist"><span class="classic1">Foydali manbaalar</span></a></li>
  <li class="stat"><a class="tooltip" href="?action=stat"><span class="classic1">Statistika</span></a></li>
</ul>

<div id="block-body">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table id="body" >
    <tr valign="top">
      <td id="block-content"><?php require_once(SMARTY_CORE_DIR . 'core.smarty_include_php.php');
smarty_core_smarty_include_php(array('smarty_file' => $this->_tpl_vars['Action']['name'], 'smarty_assign' => '', 'smarty_once' => false, 'smarty_include_vars' => array()), $this); ?>
</td>
    </tr>
</table>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

</body>
</html>
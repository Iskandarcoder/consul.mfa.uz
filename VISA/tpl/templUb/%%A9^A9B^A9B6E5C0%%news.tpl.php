<?php /* Smarty version 2.6.20, created on 2008-12-05 19:10:40
         compiled from news.tpl */ ?>

 <?php $_from = $this->_tpl_vars['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new']):
?>
 
 	<div style="font-size:12px;padding-bottom:16px;">
    <span style="font-size:11px;"><?php echo $this->_tpl_vars['new']['date']; ?>
</span><br>
	<span style="font-weight:bold;"><?php echo $this->_tpl_vars['new']['title']; ?>
</span><br>
	<?php echo $this->_tpl_vars['new']['text']; ?>
<br>
    <span style="font-size:10px;"><a href="#">подробнее</a></span>
     </div>

 <?php endforeach; endif; unset($_from); ?>
<?php /* Smarty version 2.6.12, created on 2016-03-16 00:27:06
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'index.tpl', 11, false),array('modifier', 'escape', 'index.tpl', 11, false),)), $this); ?>
<?php $this->assign('meta_description', $this->_tpl_vars['app']->setting->site_description); ?>
<?php if ($_SESSION['magnify']):  $this->assign('scripts', '/tjpzoom.js');  endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div style="padding-bottom: 5px">
<?php if ($this->_tpl_vars['links']): ?>
<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
<?php echo $this->_tpl_vars['link']; ?>
&nbsp;&nbsp;&nbsp;
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
Pixels Sold: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pixels_used'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 Available: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pixels_avail'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&nbsp;&nbsp;<?php if ($_SESSION['magnify']): ?><a href="index.php?magnify=0<?php if ($_REQUEST['grid'] > 1): ?>&amp;grid=<?php echo ((is_array($_tmp=$_REQUEST['grid'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">Magnifier Off</a><?php else: ?><a href="index.php?magnify=1<?php if ($_REQUEST['grid'] > 1): ?>&amp;grid=<?php echo ((is_array($_tmp=$_REQUEST['grid'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">Magnifier On</a><?php endif; ?></div>
  
<table cellspacing="0" cellpadding="0">
<?php $_from = $this->_tpl_vars['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['grids']):
?>
<tr>
<?php $_from = $this->_tpl_vars['grids']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['grid']):
?>
<td><?php if (! $_SESSION['magnify']): ?><map name="grid_<?php echo $this->_tpl_vars['grid']->id; ?>
"><?php echo $this->_tpl_vars['grid']->map(); ?>
</map><?php endif; ?><div style="float: left"<?php if ($_SESSION['magnify']): ?> onmouseover="zoom_on(event,<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->width)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
,<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->height)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
,'<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->url())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');" onmousemove="zoom_move(event);" onmouseout="zoom_off();"<?php endif; ?>><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->url())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" usemap="#grid_<?php echo $this->_tpl_vars['grid']->id; ?>
" width="<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->width)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" height="<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->height)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" alt="" border="0" /></div><div style="clear: both"></div></td>
<?php endforeach; endif; unset($_from); ?>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>

<br />
<div align="center"><a target="_blank" style="font-size:10px;color:#999999;font-family: Arial;" href="http://www.tufat.com/millionpixelscript.php">Powered by GPix</a></div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wz_tooltip.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
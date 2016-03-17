<?php /* Smarty version 2.6.12, created on 2016-03-16 01:34:37
         compiled from get_pixels_done.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'get_pixels_done.tpl', 4, false),array('function', 'url', 'get_pixels_done.tpl', 13, false),)), $this); ?>
<?php $this->assign('page_title', 'Thank You'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<p>Thank you for your order!</p>

<p>Your confirmation number is <strong><?php echo ((is_array($_tmp=$_REQUEST['region_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</strong>. Please keep this number in case you need to contact us about your pixels.</p>

<p>You will receive an e-mail from us shortly with instructions on how
to update your pixels.</p>

<p><a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => "/index.php"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Return to Home Page</a></p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
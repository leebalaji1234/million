<?php /* Smarty version 2.6.12, created on 2016-03-18 11:28:55
         compiled from wz_tooltip.inc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'wz_tooltip.inc.tpl', 1, false),array('modifier', 'escape', 'wz_tooltip.inc.tpl', 1, false),)), $this); ?>
<script type="text/javascript" src="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/wz_tooltip.js'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
"></script>
<script type="text/javascript">
ttDelay = 0;
ttBgColor = '#FFFFCC';
ttFontColor = '#333300';
ttWidth = 160;
tt_Init();
</script>
<?php /* Smarty version 2.6.12, created on 2016-04-24 03:41:35
         compiled from admin/toolbar.inc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'admin/toolbar.inc.tpl', 4, false),array('function', 'language_selector', 'admin/toolbar.inc.tpl', 7, false),array('modifier', 'escape', 'admin/toolbar.inc.tpl', 4, false),)), $this); ?>
<div class="toolbar">
  <table width="100%">
    <tr>
      <td><a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => "/admin/index.php"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Admin Home</a></td>
      <td align="right">
        <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => "/admin/logout.php"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Logout</a>&nbsp;&nbsp; 
        <?php echo smarty_function_language_selector(array(), $this);?>

      </td>
    </tr>
  </table>
</div>
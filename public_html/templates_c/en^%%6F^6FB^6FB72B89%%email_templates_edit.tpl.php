<?php /* Smarty version 2.6.12, created on 2016-03-19 16:18:33
         compiled from admin/email_templates_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/email_templates_edit.tpl', 5, false),array('function', 'show_errors', 'admin/email_templates_edit.tpl', 7, false),array('function', 'start_form', 'admin/email_templates_edit.tpl', 8, false),array('function', 'snippet_textfield', 'admin/email_templates_edit.tpl', 18, false),array('function', 'snippet_textarea', 'admin/email_templates_edit.tpl', 23, false),array('function', 'end_form', 'admin/email_templates_edit.tpl', 36, false),)), $this); ?>
<?php $this->assign('page_title', 'Edit Email Template'); ?>
<?php $this->assign('scripts', "/snippet.js"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array('onSubmit' => "snippetSubmit(this); return true;"), $this);?>

<table>

  <tr>
    <td class="label">Template Name:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['template']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr>
    <td class="label">Subject:</td>
    <td><?php echo smarty_function_snippet_textfield(array('name' => $this->_tpl_vars['template']->snippet_key_subject(),'size' => '50'), $this);?>
</td>
  </tr>

  <tr valign="top">
    <td class="label">Body:</td>
    <td><?php echo smarty_function_snippet_textarea(array('name' => $this->_tpl_vars['template']->snippet_key_body(),'use_editor' => $this->_tpl_vars['app']->setting->html_email,'rows' => '12'), $this);?>
</td>
  </tr>

  <tr valign="top">
    <td class="label">Parameters Available:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['template']->parameters)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

</table>
<p>
  <input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$_REQUEST['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  <input name="submit" type="submit" value="Save" />
</p>
<?php echo smarty_function_end_form(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
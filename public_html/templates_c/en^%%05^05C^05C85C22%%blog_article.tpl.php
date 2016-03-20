<?php /* Smarty version 2.6.12, created on 2016-03-18 02:25:25
         compiled from admin/blog_article.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/blog_article.tpl', 5, false),array('function', 'show_errors', 'admin/blog_article.tpl', 7, false),array('function', 'start_form', 'admin/blog_article.tpl', 8, false),array('function', 'snippet_textfield', 'admin/blog_article.tpl', 25, false),array('function', 'snippet_textarea', 'admin/blog_article.tpl', 30, false),array('function', 'end_form', 'admin/blog_article.tpl', 42, false),)), $this); ?>
<?php if ($_REQUEST['new']):  $this->assign('page_title', 'New Blog Article');  else:  $this->assign('page_title', 'Edit Blog Article');  endif; ?>
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

  <?php if (! $_REQUEST['new']): ?>
  <tr>
    <td class="label">Article Id:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['blog_article']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr>
    <td class="label">Date Posted:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['blog_article']->created_at)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>
  <?php endif; ?>

  <tr>
    <td class="label">Title:</td>
    <td><?php echo smarty_function_snippet_textfield(array('name' => 'blog_article_title','size' => '80'), $this);?>
</td>
  </tr>

  <tr valign="top">
    <td class="label">Body:</td>
    <td><?php echo smarty_function_snippet_textarea(array('name' => 'blog_article_body','rows' => '8'), $this);?>
</td>
  </tr>

</table>
<?php if ($_REQUEST['new']): ?>
<input type="hidden" name="new" value="1" />
<?php else: ?>
<input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$_REQUEST['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php endif; ?>

<p>
  <input type="submit" name="submit_button" value="Save" />
<?php echo smarty_function_end_form(array(), $this);?>

  <?php if (! $_REQUEST['new']): ?>
	<?php echo smarty_function_start_form(array(), $this);?>

  &nbsp;&nbsp;
	<input type="hidden" name="action" value="delete" />
	<input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$_REQUEST['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  <input type="submit" name="submit_button" value="Delete" />
	<?php echo smarty_function_end_form(array(), $this);?>

  <?php endif; ?>
</p>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
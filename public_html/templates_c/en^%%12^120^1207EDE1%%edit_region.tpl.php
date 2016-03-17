<?php /* Smarty version 2.6.12, created on 2016-03-16 01:37:33
         compiled from admin/edit_region.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/edit_region.tpl', 15, false),array('function', 'show_errors', 'admin/edit_region.tpl', 17, false),array('function', 'start_form', 'admin/edit_region.tpl', 18, false),array('function', 'html_options', 'admin/edit_region.tpl', 48, false),array('function', 'url', 'admin/edit_region.tpl', 55, false),array('function', 'end_form', 'admin/edit_region.tpl', 116, false),)), $this); ?>
<?php $this->assign('page_title', 'Edit Region'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="text/javascript">
function upload_image()
{
  var f = document.forms[0];
  f.upload_image.value = \'1\';
  f.submit();
}
</script>
'; ?>


<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array('name' => 'edit_form'), $this);?>

<table width="100%">

  <tr>
    <td class="label">Region ID:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['region']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr>
    <td class="label">Grid:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr>
    <td class="label">Location:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['region']->x)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
, <?php echo ((is_array($_tmp=$this->_tpl_vars['region']->y)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr>
    <td class="label">Size:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['region']->width)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 x <?php echo ((is_array($_tmp=$this->_tpl_vars['region']->height)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr>
    <td class="label">Created:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['region']->created_on)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr>
    <td class="label">Status:</td>
    <td><?php echo smarty_function_html_options(array('name' => 'status','selected' => $_REQUEST['status'],'options' => $this->_tpl_vars['statuses']), $this);?>
</td>
  </tr>

  <tr>
    <td class="label">Image:</td>
    <td>
      <?php if ($_SESSION['image']): ?>
      <img src="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/session_image.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?x=<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" alt="Uploaded Image" />&nbsp;&nbsp;
      <a href="javascript:upload_image()">Replace Image</a>
      <?php else: ?>
      <a href="javascript:upload_image()">Upload Image</a>
      <?php endif; ?>
    </td>
  </tr>

  <tr>
    <td class="label">URL:</td>
    <td><input name="url" size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">Title:</td>
    <td><input name="title" size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">Alt Tag Value:</td>
    <td><input name="alt" size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['alt'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">E-Mail:</td>
    <td><input name="email" size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> <a href="javascript:void(0)" onclick="var f=document.edit_form; f.send_confirmation.value=1; f.submit();">Send Purchase Confirmation</a></td>
  </tr>

  <tr>
    <td class="label">Notes:</td>
    <td><textarea name="notes" style="width: 100%" rows="3"><?php echo ((is_array($_tmp=$_REQUEST['notes'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
  </tr>

  <tr>
    <td class="label">Clicks:</td>
    <td><input name="clicks" size="8" value="<?php echo ((is_array($_tmp=$_REQUEST['clicks'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">Expires At:</td>
    <td><input name="expires_at" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['expires_at'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">Send Reminder At:</td>
    <td><input name="reminder_at" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['reminder_at'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">Purge At:</td>
    <td><input name="purge_at" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['purge_at'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

</table>

<input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['region']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="upload_image" value="" />
<input type="hidden" name="send_confirmation" value="" />

<p>
<input type="submit" name="submit_button" value="Save" />&nbsp;
<?php echo smarty_function_end_form(array(), $this);?>

<?php echo smarty_function_start_form(array('name' => 'delete_form'), $this);?>

<input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['region']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="send_confirmation" value="" />
<input type="hidden" name="action" value="delete" />
<input type="submit" name="submit_button" value="Delete" />
<?php echo smarty_function_end_form(array(), $this);?>

</p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php /* Smarty version 2.6.12, created on 2016-03-16 01:34:54
         compiled from admin/maintain_grids_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/maintain_grids_edit.tpl', 17, false),array('function', 'show_errors', 'admin/maintain_grids_edit.tpl', 19, false),array('function', 'start_form', 'admin/maintain_grids_edit.tpl', 20, false),array('function', 'url', 'admin/maintain_grids_edit.tpl', 57, false),array('function', 'html_options', 'admin/maintain_grids_edit.tpl', 68, false),array('function', 'html_yesno', 'admin/maintain_grids_edit.tpl', 108, false),array('function', 'snippet_textfield', 'admin/maintain_grids_edit.tpl', 118, false),array('function', 'snippet_textarea', 'admin/maintain_grids_edit.tpl', 128, false),array('function', 'end_form', 'admin/maintain_grids_edit.tpl', 139, false),)), $this); ?>
<?php $this->assign('page_title', 'Edit Grid'); ?>
<?php $this->assign('scripts', "/snippet.js"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="text/javascript">
function upload_image(n)
{
  var f = document.forms[0];
  f.upload_image.value = n;
  snippetSubmit(f);
  f.submit();
}
</script>
'; ?>


<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array('onSubmit' => "snippetSubmit(this); return true;"), $this);?>

<table>

  <tr>
    <td class="label">Grid Name:</td>
    <td><input name="name" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">Grid Width:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->width)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 pixels</td>
  </tr>

  <tr>
    <td class="label">Grid Height:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->height)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 pixels</td>
  </tr>

  <tr>
    <td class="label">Gridline Color:</td>
    <td><input name="grid_color" size="8" value="<?php echo ((is_array($_tmp=$_REQUEST['grid_color'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> (RRGGBB hex digits)</td>
  </tr>

  <tr>
    <td class="label">Gridline Transparency:</td>
    <td><input name="grid_transparency" size="4" value="<?php echo ((is_array($_tmp=$_REQUEST['grid_transparency'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />% (0-100, 0=opaque, 100=fully transparent)</td>
  </tr>

  <tr>
    <td class="label">Background Color:</td>
    <td><input name="background_color" size="8" value="<?php echo ((is_array($_tmp=$_REQUEST['background_color'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> (RRGGBB hex digits)</td>
  </tr>

  <tr>
    <td class="label">Background Image:</td>
    <td>
      <?php if ($_SESSION['image']): ?>
      <img src="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/session_image.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?x=<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" alt="Uploaded Image" />&nbsp;&nbsp;
      <br /><a href="javascript:upload_image('1')">Replace Image</a>
      <br /><a href="javascript:upload_image('3')">Clear Image</a>
      <?php else: ?>
      <a href="javascript:upload_image('1')">Upload Image</a>
      <?php endif; ?>
    </td>
  </tr>

  <tr>
    <td class="label">Show images gallery:</td>
    <td><?php echo smarty_function_html_options(array('name' => 'images_gallery','selected' => $_REQUEST['images_gallery'],'options' => $this->_tpl_vars['images_gallery_options']), $this);?>
</td>
  </tr>

  <tr>
    <td class="label">Price:</td>
    <td><?php echo $this->_tpl_vars['app']->setting->currency_symbol; ?>
<input name="pixel_price" size="8" value="<?php echo ((is_array($_tmp=$_REQUEST['pixel_price'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> (Per block of <?php echo ((is_array($_tmp=$_REQUEST['selectable_square_size'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 x <?php echo ((is_array($_tmp=$_REQUEST['selectable_square_size'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 pixels)</td>
  </tr>

  <tr>
    <td class="label">Selectable square side size:</td>
    <td><input name="selectable_square_size" size="8" value="<?php echo ((is_array($_tmp=$_REQUEST['selectable_square_size'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />pixels; size of square side which will be used for region select and price calculation.</td>
  </tr>

  <tr>
    <td class="label">Maximum Region Width:</td>
    <td><input name="region_max_width" size="8" value="<?php echo ((is_array($_tmp=$_REQUEST['region_max_width'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> pixels; must be a multiple of <?php echo ((is_array($_tmp=$_REQUEST['selectable_square_size'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
; 0=no limit</td>
  </tr>

  <tr>
    <td class="label">Maximum Region Height:</td>
    <td><input name="region_max_height" size="8" value="<?php echo ((is_array($_tmp=$_REQUEST['region_max_height'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> pixels; must be a multiple of <?php echo ((is_array($_tmp=$_REQUEST['selectable_square_size'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
; 0=no limit</td>
  </tr>

  <tr>
    <td class="label">Region Expiration Days:</td>
    <td><input name="expire_days" size="8" value="<?php echo ((is_array($_tmp=$_REQUEST['expire_days'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> 0=regions never expire</td>
  </tr>

  <tr>
    <td class="label">Region Reminder Days:</td>
    <td><input name="reminder_days" size="8" value="<?php echo ((is_array($_tmp=$_REQUEST['reminder_days'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> days before expiration. 0=do not send reminders.</td>
  </tr>

  <tr>
    <td class="label">Region Purge Days:</td>
    <td><input name="purge_days" size="8" value="<?php echo ((is_array($_tmp=$_REQUEST['purge_days'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> days after expiration. 0=do not purge expired regions.</td>
  </tr>

  <tr>
    <td class="label">Allow free and paid regions:</td>
    <td><?php echo smarty_function_html_yesno(array('name' => 'allow_free_paid'), $this);?>
</td>
  </tr>

  <tr>
    <td class="label">Maximum square for free region:</td>
    <td><input name="free_square" size="8" value="<?php echo ((is_array($_tmp=$_REQUEST['free_square'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />px.  If this value is 0, free regions will not be allowed. Please set price to pixels</td>
  </tr>

  <tr>
    <td class="label">Grid Title:</td>
    <td><?php echo smarty_function_snippet_textfield(array('name' => 'grid_title','size' => '50'), $this);?>
</td>
  </tr>

  <tr>
    <td class="label">Buy Button Title:</td>
    <td><?php echo smarty_function_snippet_textfield(array('name' => 'grid_buy_button','size' => '50'), $this);?>
</td>
  </tr>

  <tr valign="top">
    <td class="label">Grid Description:</td>
    <td><?php echo smarty_function_snippet_textarea(array('name' => 'grid_description','rows' => '8'), $this);?>
</td>
  </tr>

</table>
<p>
  <input type="hidden" name="action" value="<?php echo ((is_array($_tmp=$_REQUEST['action'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  <input type="hidden" name="upload_image" value="" />
  <?php if ($_REQUEST['action'] == 'edit'): ?>
    <input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$_REQUEST['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  <?php endif; ?>
  <input name="submit_button" type="submit" value="Save" />&nbsp;
<?php echo smarty_function_end_form(array(), $this);?>

<?php echo smarty_function_start_form(array(), $this);?>

  <?php if ($_REQUEST['action'] == 'edit'): ?>
    <input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$_REQUEST['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
    <input type="hidden" name="action" value="<?php echo ((is_array($_tmp=$_REQUEST['action'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
    <input type="hidden" name="upload_image" value="" />
    <input type="hidden" name="delete" value="true" />
    <input name="submit_button" type="submit" value="Delete" />
  <?php endif; ?>
<?php echo smarty_function_end_form(array(), $this);?>

</p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
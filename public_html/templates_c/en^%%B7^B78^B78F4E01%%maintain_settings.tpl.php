<?php /* Smarty version 2.6.12, created on 2016-03-16 01:25:35
         compiled from admin/maintain_settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/maintain_settings.tpl', 4, false),array('function', 'show_errors', 'admin/maintain_settings.tpl', 6, false),array('function', 'start_form', 'admin/maintain_settings.tpl', 7, false),array('function', 'html_yesno', 'admin/maintain_settings.tpl', 28, false),array('function', 'html_options', 'admin/maintain_settings.tpl', 110, false),array('function', 'end_form', 'admin/maintain_settings.tpl', 132, false),)), $this); ?>
<?php $this->assign('page_title', 'General Settings'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array(), $this);?>


<table>

  <tr>
    <td class="label">Site Name:</td>
    <td><input name="site_name" size="50" value="<?php echo ((is_array($_tmp=$_REQUEST['site_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">Site Description:</td>
    <td><textarea name="site_description" style="width: 100%" rows="3"><?php echo ((is_array($_tmp=$_REQUEST['site_description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
  </tr>

  <tr>
    <td class="label">Currency Symbol:</td>
    <td><input name="currency_symbol" size="3" value="<?php echo ((is_array($_tmp=$_REQUEST['currency_symbol'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">Use User Accounts?</td>
    <td><?php echo smarty_function_html_yesno(array('name' => 'user_accounts'), $this);?>
</td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">Region Approval Required?</td>
    <td><?php echo smarty_function_html_yesno(array('name' => 'approval_required'), $this);?>
</td>
  </tr>

  <tr>
    <td class="label">Administrator E-Mail Address:</td>
    <td><input name="admin_email" size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['admin_email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">Email Format:</td>
    <td><?php echo smarty_function_html_yesno(array('name' => 'html_email','yes' => 'HTML','no' => 'Plain Text'), $this);?>
</td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">Use FCKeditor?</td>
    <td><?php echo smarty_function_html_yesno(array('name' => 'use_fckeditor'), $this);?>
</td>
  </tr>

  <tr>
    <td class="label">Secret Key:</td>
    <td><input name="secret" size="30" value="<?php echo ((is_array($_tmp=$_REQUEST['secret'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">Create Interlaced Images?</td>
    <td><?php echo smarty_function_html_yesno(array('name' => 'interlaced_images'), $this);?>
</td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">Allow upload images?</td>
    <td><?php echo smarty_function_html_yesno(array('name' => 'upload_images'), $this);?>
</td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">Create Palette Images?</td>
    <td><?php echo smarty_function_html_yesno(array('name' => 'palette_images'), $this);?>
</td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">Allow Blog Comments?</td>
    <td><?php echo smarty_function_html_yesno(array('name' => 'blog_comments'), $this);?>
</td>
  </tr>

  <?php if (! $this->_tpl_vars['captchas_supported']): ?>
  <tr style="vertical-align: baseline">
    <td class="label">&nbsp;</td>
    <td><span class="error">Warning: CAPTCHA's in blog comments not supported (required FreeType support in PHP)</span></td>
  </tr>
  <?php endif; ?>

  <tr style="vertical-align: baseline">
    <td class="label">Show Grids As:</td>
    <td><?php echo smarty_function_html_yesno(array('name' => 'multiple_grid_pages','yes' => "Multiple Pages (one grid per page)",'no' => "Single Page (all grids on one page)"), $this);?>
</td>
  </tr>

  <tr>
    <td class="label">Grid Columns:</td>
    <td><input name="grid_columns" size="3" value="<?php echo ((is_array($_tmp=$_REQUEST['grid_columns'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> (Applies only when all grids are on one page)</td>
  </tr>

  <tr>
    <td class="label">RSS Latest Pixels Feed Size:</td>
    <td><input name="rss_latest_pixels" size="3" value="<?php echo ((is_array($_tmp=$_REQUEST['rss_latest_pixels'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> (0 to disable this feed)</td>
  </tr>

  <tr>
    <td class="label">RSS Top Pixels Feed Size:</td>
    <td><input name="rss_top_pixels" size="3" value="<?php echo ((is_array($_tmp=$_REQUEST['rss_top_pixels'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> (0 to disable this feed)</td>
  </tr>

  <tr>
    <td class="label">RSS Blog Articles Feed Size:</td>
    <td><input name="rss_blog_articles" size="3" value="<?php echo ((is_array($_tmp=$_REQUEST['rss_blog_articles'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> (0 to disable this feed)</td>
  </tr>

	<tr style="vertical-align: baseline">
		<td class="label">Link structure (SEO):</td>
		<td><?php echo smarty_function_html_options(array('name' => 'seo_status','options' => $this->_tpl_vars['seo_optimization'],'selected' => $_REQUEST['seo_status']), $this);?>
</td>
	</tr>

	<tr style="vertical-align: baseline">
    <td class="label">Show 'Clicks' Column in Pixel List?</td>
    <td><?php echo smarty_function_html_yesno(array('name' => 'pixel_list_by_clicks'), $this);?>
</td>
  </tr>

	<tr style="vertical-align: baseline">
    <td class="label">Show 'Images' Column in Pixel List?</td>
    <td><?php echo smarty_function_html_yesno(array('name' => 'pixel_list_enable_images'), $this);?>
</td>
  </tr>

	<tr style="vertical-align: baseline">
		<td class="label">Sort order for image galleries:</td>
		<td><?php echo smarty_function_html_options(array('name' => 'order_image_galleries','options' => $this->_tpl_vars['order_image_galleries'],'selected' => $_REQUEST['order_image_galleries']), $this);?>
</td>
	</tr>

</table>

<p><input type="submit" value="Save" /></p>

<?php echo smarty_function_end_form(array(), $this);?>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
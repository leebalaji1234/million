<?php /* Smarty version 2.6.12, created on 2016-03-20 13:12:51
         compiled from admin/menu.inc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'admin/menu.inc.tpl', 3, false),array('modifier', 'escape', 'admin/menu.inc.tpl', 3, false),)), $this); ?>
<div class="menu">
<h2>Site Configuration</h2>
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/maintain_settings.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">General Settings</a><br />
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/email_templates.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Email Templates</a><br />
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/link_to_us.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">'Link to Us' Configuration</a><br />
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/change_password.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Change Username/Password</a><br />

<h2>Grids</h2>
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/maintain_grids.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Maintain Grids</a><br />
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/republish_grids.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Republish Grids</a><br />

<h2>Regions</h2>
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/create_region.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Create Region</a><br />
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/maintain_regions.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Maintain Regions</a><br />

<h2>Payments</h2>
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/payment_modules.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Payment Modules</a><br />
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/payment_history.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Payment History</a><br />

<h2>Users</h2>
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/user_accounts.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">User Accounts</a><br />

<h2>Language Support</h2>
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/maintain_languages.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Maintain Languages</a><br />
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/update_language_texts.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Update Language Texts</a><br />
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/export_language_texts.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Export Language Texts</a><br />
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/import_language_texts.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Import Language Texts</a><br />

<h2>Other</h2>
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/blog.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Blog</a><br />
<!--<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/joomla_integration.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Joomla integration</a><br />-->
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/newsletters.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Newsletters</a><br />
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/send_newsletter.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Send Newsletter</a><br />
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/clear_templates.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Clear Compiled Templates</a><br />
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/clear_cache.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Clear Cache</a><br />
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/test_email.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Test Email</a><br />
</div>
<?php /* Smarty version 2.6.12, created on 2016-03-18 11:46:06
         compiled from login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'login.tpl', 4, false),array('function', 'url', 'login.tpl', 8, false),array('function', 'show_errors', 'login.tpl', 10, false),array('function', 'start_form', 'login.tpl', 11, false),array('function', 'end_form', 'login.tpl', 28, false),)), $this); ?>
<?php $this->assign('page_title', 'Login'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php echo $_SESSION['before_login']; ?>


<p>Don't have an account? <a href="<?php echo smarty_function_url(array('href' => '/signup.php'), $this);?>
">Sign Up Now</a>.</p>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array(), $this);?>

<table>

  <tr>
    <td class="label">Enter your E-Mail Address:</td>
    <td><input name="email" size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">Password:</td>
    <td><input type="password" name="pass" size="20" /> <a href="<?php echo smarty_function_url(array('href' => '/retrieve_password.php'), $this);?>
">Forgot your Password?</a></td>
  </tr>

</table>
<p>
  <input type="submit" value="Log In" />
</p>
<?php echo smarty_function_end_form(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
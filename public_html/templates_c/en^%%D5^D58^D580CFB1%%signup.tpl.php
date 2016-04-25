<?php /* Smarty version 2.6.12, created on 2016-04-24 23:46:40
         compiled from signup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'signup.tpl', 4, false),array('function', 'url', 'signup.tpl', 7, false),array('function', 'show_errors', 'signup.tpl', 11, false),array('function', 'start_form', 'signup.tpl', 12, false),array('function', 'end_form', 'signup.tpl', 73, false),)), $this); ?>
<?php $this->assign('page_title', 'Create Account'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<p>Use this form to create an account on <?php echo ((is_array($_tmp=$this->_tpl_vars['app']->setting->site_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
.
If you already have an account, you may <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/login.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Log In</a> instead.</p>

<p>Your E-Mail address will be your account login.</p>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array(), $this);?>

<table>

  <tr>
    <!-- class="label" -->
    <td >Enter your E-Mail Address:</td>
    <td><input name="email" size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td >Re-enter your E-Mail Address:</td>
    <td><input name="email_confirm" size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['email_confirm'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td >First Name:</td>
    <td><input name="first_name" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['first_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td >Last Name:</td>
    <td><input name="last_name" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['last_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td >Create a Password:</td>
    <td><input type="password" name="pass" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['pass'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> (Must be at least 5 characters long)</td>
  </tr>

  <tr>
    <td >Re-enter Password:</td>
    <td><input type="password" name="pass_confirm" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['pass_confirm'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>
  
  <tr>
    <td >Country:</td>
    <td><select name="country" id="theme1" class="form-control" onchange="countrySelect(this.value);" >
                      <option value="">Choose country</option> 
                        <?php $_from = $this->_tpl_vars['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['country']):
?>
                        <option  value='<?php echo $this->_tpl_vars['country']->id; ?>
' <?php if ($_REQUEST['country'] == $this->_tpl_vars['country']->id): ?> selected='selected' <?php endif; ?> ><?php echo $this->_tpl_vars['country']->name; ?>
 </option>
                        <?php endforeach; endif; unset($_from); ?>
                      </select></td>
  </tr>
  <tr>
    <td >State:</td>
    <td><select name="state" id="state" class="form-control" onchange="stateSelect(this.value);"> 
                         
                      </select></td>
  </tr>
  <tr>
    <td >City:</td>
    <td><select name="city" id="city" class="form-control" > 
                         
                      </select></td>
  </tr>


</table>
<p>
  <input type="submit" value="Create Account" />
</p>
<?php echo smarty_function_end_form(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
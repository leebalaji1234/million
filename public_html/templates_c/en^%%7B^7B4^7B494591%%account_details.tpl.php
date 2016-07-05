<?php /* Smarty version 2.6.12, created on 2016-06-18 01:03:48
         compiled from account_details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'account_details.tpl', 7, false),array('function', 'show_errors', 'account_details.tpl', 11, false),array('function', 'start_form', 'account_details.tpl', 12, false),array('function', 'end_form', 'account_details.tpl', 83, false),)), $this); ?>
<?php $this->assign('page_title', 'Account Details'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="section">
  <div class="container">
    <div class="row">
          <div class="col-md-12">
<h3 class="text-info"><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3>
<hr/>
 

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array('class' => "form-horizontal"), $this);?>

<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >First Name:</label>
  </div>
  <div class="col-sm-5"> 
  <p   class="form-control" ><?php echo ((is_array($_tmp=$_REQUEST['first_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >Last Name:</label>
  </div>
  <div class="col-sm-5"> 
   <p   class="form-control" ><?php echo ((is_array($_tmp=$_REQUEST['last_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >E-Mail Address:</label>
  </div>
  <div class="col-sm-5"> 
   <p   class="form-control" ><?php echo ((is_array($_tmp=$this->_tpl_vars['user']->email)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >New E-Mail Address:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="email" class="form-control" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> (Leave blank to keep current address)
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >Re-Enter New E-Mail Address:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="email_confirm" class="form-control" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['email_confirm'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> 
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >Password:</label>
  </div>
  <div class="col-sm-5"> 
   ************
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >New Password:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="pass"  type="password" class="form-control" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['pass'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> (Leave blank to keep current password)
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >Re-Enter New Password:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="pass_confirm"  type="password" class="form-control" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['pass_confirm'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />  
  </div>
</div>
 <div class="form-group">
<div class="col-sm-offset-3 col-sm-6">
   <input type="submit" value="Save Changes" class="btn btn-primary" name="submit_button"> 
</div>
</div>
 
<?php echo smarty_function_end_form(array(), $this);?>

</div>
</div>
</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php /* Smarty version 2.6.12, created on 2016-04-24 04:03:17
         compiled from login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'login.tpl', 6, false),array('function', 'show_errors', 'login.tpl', 13, false),array('function', 'start_form', 'login.tpl', 14, false),array('function', 'url', 'login.tpl', 47, false),array('function', 'end_form', 'login.tpl', 57, false),)), $this); ?>
<?php $this->assign('page_title', 'Login'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="section">
  <div class="container">
 	<div class="row">
 		<!-- <h3 class="text-center"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</strong></h3>
 		<hr/> -->
 		<div class="col-md-12">
<p class="text-danger text-center"><?php echo $_SESSION['before_login']; ?>
</p>



<p class="text-danger text-center"><?php echo smarty_function_show_errors(array(), $this);?>
</p>
<?php echo smarty_function_start_form(array('class' => "form-horizontal"), $this);?>


 <!--  <div class="alert alert-primary col-md-10 text-center">
        <button contenteditable="false" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Thanks for Register to us!</strong> You will be receive an email with your code. You can use code on the upload art
      </div> -->
          <div class="panel panel-default">
              <div class="panel-heading">
                <span class="text-primary"> <strong>Login</strong> </span>
              </div>
              <div class="panel-body">
             
                  <div class="form-group">
                     <div class="col-sm-offset-3  col-md-5">
                      <label   class="control-label">Email</label> 
                     
                      <input  name="email"   class="form-control" palceholder="Enter email ..." value="<?php echo ((is_array($_tmp=$_REQUEST['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3  col-md-5"> 
                      <label  class="control-label">Password</label>
                    
                    
                      <input type="password" name="pass"  class="form-control" palceholder="Enter password ..."  />
                    </div>
                  </div>
                     
                   
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-10">
                      <input name="submit_button" type="submit" class="btn btn-primary" value="Sign In &gt;&gt;" /> 
                     </br>
                   <a href="<?php echo smarty_function_url(array('href' => '/retrieve_password.php'), $this);?>
">Forgot your Password?</a>
                   <p>Don't have an account? <a href="<?php echo smarty_function_url(array('href' => '/signup.php'), $this);?>
">Sign Up Now</a>.</p>
                    </div>
                  </div>
                
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
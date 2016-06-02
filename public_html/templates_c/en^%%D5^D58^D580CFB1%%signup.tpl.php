<?php /* Smarty version 2.6.12, created on 2016-06-02 00:45:34
         compiled from signup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'signup.tpl', 14, false),array('function', 'show_errors', 'signup.tpl', 20, false),array('function', 'start_form', 'signup.tpl', 21, false),array('function', 'url', 'signup.tpl', 133, false),array('function', 'end_form', 'signup.tpl', 138, false),)), $this); ?>
<?php $this->assign('page_title', 'Sign Up'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" href="custom_lib/datepicker/css/datepicker.css" type="text/css" />
 
 

<script type="text/javascript" src="custom_lib/datepicker/js/datepicker.js"></script>
<script type="text/javascript" src="custom_lib/datepicker/js/eye.js"></script>
<script type="text/javascript" src="custom_lib/datepicker/js/utils.js"></script>
<script type="text/javascript" src="custom_lib/datepicker/js/layout.js?ver=1.0.2"></script>
<div class="section">
  <div class="container">
  <div class="row">
<!-- <h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1> -->
<div class="col-md-12">
 

<!-- <blockquote>Your E-Mail address will be your account login.</blockquote> -->

<p class="text-danger text-center"><?php echo smarty_function_show_errors(array(), $this);?>
</p>
<?php echo smarty_function_start_form(array('class' => "form-horizontal"), $this);?>

 <div class="panel panel-default">
              <div class="panel-heading">
                <span class="text-primary ">  <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</strong>  </span>
                 
              </div>
              <div class="panel-body">
              <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">First Name</label> 
                     </div>
                      <div class="col-md-5">
                      <input  name="first_name" size="20" class="form-control" palceholder="First name here ..." value="<?php echo ((is_array($_tmp=$_REQUEST['first_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
                    </div>
                  </div>

                  <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">Last Name</label> 
                     </div>
                      <div class="col-md-5">
                      <input  name="last_name" size="20" class="form-control" palceholder="Last name here ..." value="<?php echo ((is_array($_tmp=$_REQUEST['last_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
                    </div>
                  </div>
                <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">Email</label> 
                      </div>
                      <div class="col-md-5">
                      <input  name="email"  size="80" class="form-control" palceholder="Enter email ..." value="<?php echo ((is_array($_tmp=$_REQUEST['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
                    </div>
                  </div>

                  <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">Confirm Email</label> 
                     </div>
                      <div class="col-md-5">
                      <input  name="email_confirm" size="80"  class="form-control" palceholder="Confirm email ..." value="<?php echo ((is_array($_tmp=$_REQUEST['email_confirm'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
                    </div>
                  </div>

                  
                  <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">Password</label> 
                     </div>
                      <div class="col-md-5">
                      <input type="password" name="pass" size="20" class="form-control" palceholder="password here ..." value="<?php echo ((is_array($_tmp=$_REQUEST['pass'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"  />(Must be at least 8 characters long)
                    </div>
                  </div>
                  <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">Confirm Password</label> 
                     </div>
                      <div class="col-md-5">
                      <input type="password" name="pass_confirm" size="20" class="form-control" palceholder="confirm password here ..." value="<?php echo ((is_array($_tmp=$_REQUEST['pass_confirm'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"  />(Must be at least 8 characters long)
                    </div>
                  </div>
                   <!-- dob -->
                   
                  <div class="form-group required">
                    <div class="col-sm-2">
                      <label for="inputDate" class="control-label"> Date of Birth</label>
                    </div>
                    <div class="col-sm-5">  
                     <input name="dob"   id="inputDate" class="form-control inputDate" placeholder="mm/dd/YYYY"  value="01/01/2016" onchange="ajaxCallToCreateAge(this.value);"   />
                     <small>mm/dd/YYYY</small>
                    </div>
                  </div>
                    
                  <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">Country</label> 
                     </div>
                      <div class="col-md-5">
                      <select name="country" id="theme1" class="form-control" onchange="countrySelect(this.value);" >
                      <option value="">Choose country</option> 
                        <?php $_from = $this->_tpl_vars['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['country']):
?>
                        <option  value='<?php echo $this->_tpl_vars['country']->id; ?>
' <?php if ($_REQUEST['country'] == $this->_tpl_vars['country']->id): ?> selected='selected' <?php endif; ?> ><?php echo $this->_tpl_vars['country']->name; ?>
 </option>
                        <?php endforeach; endif; unset($_from); ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">State</label> 
                     </div>
                      <div class="col-md-5">
                      <select name="state" id="state" class="form-control" onchange="stateSelect(this.value);"> 
                         
                      </select>
                    </div>
                  </div>
                   <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">City</label> 
                     </div>
                      <div class="col-md-5">
                      <select name="city" id="city" class="form-control" > 
                         
                      </select>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3">
                      <input name="submit_button" type="submit" class="btn btn-primary" value="Create Account &gt;&gt;" /> 
                      
                    </div>
                    <div class="col-md-10">
                      <p>Use this form to create an account on <?php echo ((is_array($_tmp=$this->_tpl_vars['app']->setting->site_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
.
If you already have an account, you may <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/login.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Log In</a> instead.</p>
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
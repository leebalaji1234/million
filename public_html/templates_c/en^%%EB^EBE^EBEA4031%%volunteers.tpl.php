<?php /* Smarty version 2.6.12, created on 2016-04-24 04:03:11
         compiled from volunteers.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'volunteers.tpl', 6, false),array('function', 'show_errors', 'volunteers.tpl', 7, false),array('function', 'start_form', 'volunteers.tpl', 8, false),array('function', 'end_form', 'volunteers.tpl', 132, false),)), $this); ?>
<?php $this->assign('page_title', 'Volunteer Register ');  $this->assign('pagename', 'volunteer');  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="section">
  <div class="container">
<!-- <h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1> -->  
<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array('enctype' => "multipart/form-data",'class' => "form-horizontal"), $this);?>

  
<div class="row">
 <!--  <div class="alert alert-primary col-md-10 text-center">
        <button contenteditable="false" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Thanks for Register to us!</strong> You will be receive an email with your code. You can use code on the upload art
      </div> -->
          <div class="col-md-12">
            <div class="panel panel-default">
              <div  >
                <span class="text-primary col-md-5"> <h4><strong>Volunteer Register | Get Volunteer Code</strong></h4>
                   </span> 
              <p class="text-left col-md-6">
                
                <div class="input-group ">
                   
                <input type="text" class="form-control" id="getemail" placeholder="Enter registered email">

              
               <span class="input-group-btn">
                <a class="btn btn-success" type="submit" onclick="getVolunteercode($('#getemail').val());">Show Code</a>
                </span>
                 
                </div>

                 

            </p>
                  <hr/>
              </div>
              <div class="panel-body">
                <div class="form-group">
                    <div class="col-sm-2">
                      <label for="file1" class="control-label">Name</label>
                    </div>
                    <div class="col-sm-5"> 
                      <input  name="name" id="title1" class="form-control" palceholder="Enter name ..." value="<?php echo ((is_array($_tmp=$_REQUEST['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="file1" class="control-label">Email</label>
                    </div>
                    <div class="col-sm-5"> 
                      <input  name="email" id="title1" class="form-control" palceholder="Enter email ..." value="<?php echo ((is_array($_tmp=$_REQUEST['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
                    </div>
                  </div>
                   <div class="form-group">
                    <div class="col-sm-2">
                      <label for="file1" class="control-label">Phone</label>
                    </div>
                    <div class="col-sm-5"> 
                      <input  name="phone" id="title1" class="form-control" palceholder="Enter phone ..." value="<?php echo ((is_array($_tmp=$_REQUEST['phone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="desc" class="control-label">Address</label>
                    </div>
                    <div class="col-sm-5"> 
                       
                      <textarea name="address" id="desc" class="form-control" palceholder="address  here ..."  ><?php echo ((is_array($_tmp=$_REQUEST['address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="title1" class="control-label">Country</label>
                    </div>
                    <div class="col-sm-5"> 
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
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="desc" class="control-label">State</label>
                    </div>
                    <div class="col-sm-5"> 
                       
                      <select name="state" id="state" class="form-control" onchange="stateSelect(this.value);"> 
                         
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="title1" class="control-label">City</label>
                    </div>
                    <div class="col-sm-5"> 
                     <select name="city" id="city" class="form-control" > 
                         
                      </select>
                    </div>
                  </div>
                  
                <?php if ($this->_tpl_vars['captcha_url']): ?>
               <div class="form-group ">
                     
                    <div class="col-sm-5 col-sm-offset-2 well"> 
                     <input name="phrase" size="10" value="" />&nbsp;
                     <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['captcha_url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="vertical-align: middle;border-radius:20px;border:2px solid grey;" alt="CAPTCHA Image" />
                      <p class="text-muted">Enter text from image at right</p> 
                    </div>
                  </div>
                <?php endif; ?>
         
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                       
                      
                       <input name="submit_button" type="submit" class="btn btn-primary" value="Continue &gt;&gt;" /> 
                    </div>
                  </div>
                
              </div>
            </div>
          </div>
        </div>


<?php echo smarty_function_end_form(array(), $this);?>

</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 
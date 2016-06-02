<?php /* Smarty version 2.6.12, created on 2016-06-02 00:25:06
         compiled from upload_drawing.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'upload_drawing.tpl', 13, false),array('function', 'show_errors', 'upload_drawing.tpl', 14, false),array('function', 'start_form', 'upload_drawing.tpl', 15, false),array('function', 'end_form', 'upload_drawing.tpl', 252, false),)), $this); ?>
<?php $this->assign('page_title', 'Upload Art');  $_smarty_tpl_vars = $this->_tpl_vars;
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
<!-- <h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1> -->  
<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array('enctype' => "multipart/form-data",'class' => "form-horizontal"), $this);?>

<input type="hidden" name="MAX_FILE_SIZE" value="200000" /> 
<?php if ($this->_tpl_vars['app']->setting->upload_images): ?> 
<!--  <div class="col-md-12">
            <span class="alert alert-dismissable alert-info">
              Upload a GIF, JPG, or PNG image. It will automatically be converted to PNG
format and resized to the region size of <?php echo ((is_array($_tmp=$_REQUEST['w'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 x
<?php echo ((is_array($_tmp=$_REQUEST['h'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 pixels.</span>
          </div> -->
 
<?php endif;  if ($this->_tpl_vars['step']): ?>
<input type="hidden" name="step" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['step'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php endif; ?>
<!-- <input type="hidden" name="w" value="<?php echo ((is_array($_tmp=$_REQUEST['w'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="h" value="<?php echo ((is_array($_tmp=$_REQUEST['h'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> -->
<div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <span class="text-primary"> <strong>Upload Art Work</strong> </span>
              </div>
              <div class="panel-body">
                <div class="form-group required">
                    <div class="col-sm-2">
                      <label for="picture" class="control-label">Upload Art Image</label>
                    </div>
                    <div class="col-sm-5"> 
                      <input  class="form-control"   name="file" type="file" size="180" id="picture" required />
                      <p id="pic_error1" style="display:none; color:#FF0000;">Image formats should be JPG, JPEG, PNG or GIF.</p>
   <p id="pic_error2" style="display:none; color:#FF0000;">Max file size should be 2MB.</p>
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-2">
                      <label for="title1" class="control-label">Art Title</label>
                    </div>
                    <div class="col-sm-5"> 
                      <input  name="title" id="title1" class="form-control" palceholder="Art title here ..." value="<?php echo ((is_array($_tmp=$_REQUEST['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-2">
                      <label for="desc" class="control-label">Art Description</label>
                    </div>
                    <div class="col-sm-5"> 
                       
                      <textarea name="description" id="desc" class="form-control" palceholder="Art description here ..."  ><?php echo ((is_array($_tmp=$_REQUEST['description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-2">
                      <label for="theme1" class="control-label"> Choice of Theme</label>
                    </div>
                    <div class="col-sm-5">  
                      <select name="theme_id" id="theme1" class="form-control" > 
                        <?php $_from = $this->_tpl_vars['themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['theme']):
?>
                        <option  value='<?php echo $this->_tpl_vars['theme']->id; ?>
' <?php if ($_REQUEST['theme_id'] == $this->_tpl_vars['theme']->id): ?> selected='selected' <?php endif; ?> ><?php echo $this->_tpl_vars['theme']->name; ?>
 </option>
                        <?php endforeach; endif; unset($_from); ?>
                      </select>
                    </div>
                  </div>
                  
                  <!-- dob -->
                  <?php if ($this->_tpl_vars['dobdisplay'] == 'enable'): ?>
                  <div class="form-group required">
                    <div class="col-sm-2">
                      <label for="inputDate" class="control-label"> Date of Birth</label>
                    </div>
                    <div class="col-sm-5">  
                     <input name="dob"   id="inputDate" class="form-control inputDate" placeholder="mm/dd/YYYY"  value="01/01/2016" onchange="ajaxCallToCreateAge(this.value);"   />
                     <small>mm/dd/YYYY</small>
                    </div>
                  </div>
                   <?php endif; ?>
                   <!-- parent -->
                    <?php if ($this->_tpl_vars['parentdisplay'] == 'enable'): ?>
                  <div class="form-group parent_placeholder required" style="display:<?php echo $this->_tpl_vars['parentdisplay']; ?>
;">
                    <div class="col-sm-2">
                      <label for="dob1" class="control-label">  Guardian Name</label>
                    </div>
                    <div class="col-sm-5">  
                     <input name="parent_name" class="form-control" placeholder="Parent (or) Guardian name here"  value="<?php echo ((is_array($_tmp=$_REQUEST['parent_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
                    </div>
                  </div>

                  <div class="form-group parent_placeholder required" style="display:<?php echo $this->_tpl_vars['parentdisplay']; ?>
;">
                    <div class="col-sm-2">
                      <label for="dob1" class="control-label"> Guardian Details</label>
                    </div>
                    <div class="col-sm-5">  
                     <textarea name="parent_details" class="form-control" placeholder="<address>,<phone>,<email>..etc" ><?php echo ((is_array($_tmp=$_REQUEST['parent_details'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea> 
                    </div>
                  </div>
                   <?php endif; ?>
                    
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="volunteer_id" class="control-label">Volunteer Code</label>
                    </div>
                    <div class="col-sm-5"> 
                       
                      <select name="volunteer_id" id="volunteer_id" class="form-control"  >
                      <option value="">Choose Volunteer Code</option> 
                        <?php $_from = $this->_tpl_vars['vcodes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vcode']):
?>
                        <option  value='<?php echo $this->_tpl_vars['vcode']->id; ?>
' <?php if ($_REQUEST['volunteer_id'] == $this->_tpl_vars['vcode']->id): ?> selected='selected' <?php endif; ?> >MDD<?php echo $this->_tpl_vars['vcode']->id; ?>
 | <?php echo $this->_tpl_vars['vcode']->name; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-offset-2 col-sm-6"> 
                    <label  ><input type="checkbox" name="is_watermark"   <?php if ($_REQUEST['is_watermark']): ?> checked="checked"<?php endif; ?>/> Art have “milliondolardrawings” as alphabet drawing at the right bottom </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-offset-2 col-sm-6"> 
                    <label  ><input type="checkbox" name="proof" id="proof" onchange="onProofSelection();" <?php if ($_REQUEST['proof']): ?> checked="checked"<?php endif; ?>/> Proof for Make of art in youtube</label>
                    </div>
                     
                  </div>
                   <div class="form-group proof_placeholder" <?php if ($_REQUEST['proof']): ?> style="display:block;"<?php endif;  if (! $_REQUEST['proof']): ?> style="display:none;"<?php endif; ?>;>
                    <div class="col-sm-2">
                      <label for="dob1" class="control-label"> Youtube video link</label>
                    </div>
                    <div class="col-sm-5">  
                    <textarea class="form-control" placeholder="Youtube url only [https://www.youtube.com/watch?v=<videoid>]" name="proof_file"><?php echo ((is_array($_tmp=$_REQUEST['proof_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
                    </div>
                  </div>
                  <?php if ($this->_tpl_vars['captcha_url']): ?>
               <div class="form-group ">
                     
                    <div class="col-sm-5 col-sm-offset-2 well"> 
                     <input name="phrase" size="10" value="" />&nbsp;
                     <img id="captcha" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['captcha_url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="vertical-align: middle;border-radius:20px;border:2px solid grey;" alt="CAPTCHA Image" /> <i class="fa fa-2x fa-refresh" style="margin-left:10px;" onclick="CaptchaRefresh();"></i>
                      <p class="text-muted">Enter text from image at right</p> 
                    </div>
                  </div>
                <?php endif; ?>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                       
                      <?php if ($this->_tpl_vars['app']->setting->upload_images): ?> 
                       <input name="submit_button" type="submit" class="btn btn-primary" value="Continue &gt;&gt;" />&nbsp;&nbsp; <?php endif; ?>
                    </div>
                  </div>
               <!-- <table> -->
  <!-- <tr>
    <td >Upload Drawing Image:</td>
    <td><input name="file" type="file" size="80" /></td>
  </tr> -->
   <!-- <tr>
    <td >Drawing title:</td>
    <td><input name="title" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr> -->
  <!--  <tr>
    <td >Description:</td>
    <td><textarea name="description" size="20"   ><?php echo ((is_array($_tmp=$_REQUEST['description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
  </tr> -->
<!-- <tr>
    <td >Drawing Themes:</td>
    <td><select name="theme_id">
       
       
       <?php $_from = $this->_tpl_vars['themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['theme']):
?>
          <option  value='<?php echo $this->_tpl_vars['theme']->id; ?>
' <?php if ($_REQUEST['theme_id'] == $this->_tpl_vars['theme']->id): ?> selected='selected' <?php endif; ?> ><?php echo $this->_tpl_vars['theme']->name; ?>
 </option>
       <?php endforeach; endif; unset($_from); ?>
    </select></td>
  </tr>  -->
  <?php if ($this->_tpl_vars['dobdisplay'] == 'enable'): ?>
 <!-- <tr>
    <td >Date of Birth:  </td>
    <td><input name="dob" size="20" onchange="ajaxCallToCreateAge(this.value);"   />
      <p>mm/dd/YYYY</p></td>
 </tr> -->
 <?php endif; ?>
   <?php if ($this->_tpl_vars['parentdisplay'] == 'enable'): ?> 
  <!-- <tr class="parent_placeholder" style="display:<?php echo $this->_tpl_vars['parentdisplay']; ?>
;">
    <td >Parent / Guardian Name:</td>
    <td><input name="parent_name" size="20"  value="<?php echo ((is_array($_tmp=$_REQUEST['parent_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> 
 </tr>  -->
 <!-- <tr class="parent_placeholder" style="display:<?php echo $this->_tpl_vars['parentdisplay']; ?>
;">
    <td >Parent / Guardian Details:</td>
    <td><textarea name="parent_details" size="20" ><?php echo ((is_array($_tmp=$_REQUEST['parent_details'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea> 
 </tr> -->
 <?php endif; ?>
 <!--  <tr>
    <td >School/Volunteer Name:</td>
    <td><input name="volunteer_name" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['volunteer_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr> -->
  <!-- <tr>
    <td >School/Volunteer Country:</td>
    <td><input name="volunteer_country" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['volunteer_country'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr> -->
  <!-- <tr>
    <td >School/Volunteer State:</td>
    <td><input name="volunteer_state" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['volunteer_state'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr> -->
  <!-- <tr>
    <td >School/Volunteer City:</td>
    <td><input name="volunteer_city" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['volunteer_city'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr> -->
  <!-- <tr>
    <td >School/Volunteer Address:</td>
    <td><textarea name="volunteer_address" size="20"  ><?php echo ((is_array($_tmp=$_REQUEST['volunteer_address'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
  </tr> -->
  <!-- <tr>
    <td >School/Volunteer Phone:</td>
    <td><input name="volunteer_phone" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['volunteer_phone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr> -->
  <!-- <tr> 
    <td colspan="2"><input type="checkbox" name="is_watermark"  <?php if ($_REQUEST['is_watermark'] != ''): ?> checked="checked"<?php endif; ?>/> Art have “milliondolardrawings” as alphabet drawing at the right bottom </td>
  </tr> -->
<!-- <tr> 
    <td colspan="2"><input type="checkbox" name="proof" id="proof" onchange="onProofSelection();" <?php if ($_REQUEST['proof_file'] != ''): ?> checked="checked"<?php endif; ?>/> Make of art in youtube </td>
  </tr> -->
   <!-- <tr class="proof_placeholder" style="display:<?php if ($_REQUEST['proof_file'] != ''): ?> block<?php endif;  if ($_REQUEST['proof_file'] == ''): ?> none<?php endif; ?>;">
    <td >Youtube video link:</td>
    <td> --><!-- <input name="proof_file" type="file" size="80" /> -->
     <!-- <textarea name="proof_file"><?php echo ((is_array($_tmp=$_REQUEST['proof_file'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
    </td>
  </tr>
   


</table>
<?php if ($this->_tpl_vars['app']->setting->upload_images): ?>
  <p>
  <input name="submit_button" type="submit" value="Continue &gt;&gt;" />&nbsp;&nbsp;
  </p> 
<?php endif; ?> -->
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
 
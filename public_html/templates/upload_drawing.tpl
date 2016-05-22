{assign var="page_title" value="##Upload Art##"}
{include file="header.inc.tpl"}
<link rel="stylesheet" href="custom_lib/datepicker/css/datepicker.css" type="text/css" />
 
 

<script type="text/javascript" src="custom_lib/datepicker/js/datepicker.js"></script>
<script type="text/javascript" src="custom_lib/datepicker/js/eye.js"></script>
<script type="text/javascript" src="custom_lib/datepicker/js/utils.js"></script>
<script type="text/javascript" src="custom_lib/datepicker/js/layout.js?ver=1.0.2"></script>
<div class="section">
  <div class="container">
<!-- <h1>{$page_title|escape}</h1> -->  
{show_errors}
{start_form enctype="multipart/form-data" class="form-horizontal"}
<input type="hidden" name="MAX_FILE_SIZE" value="100000" /> 
{if $app->setting->upload_images} 
<!--  <div class="col-md-12">
            <span class="alert alert-dismissable alert-info">
              ##Upload a GIF, JPG, or PNG image. It will automatically be converted to PNG
format and resized to the region size of## {$smarty.request.w|escape} x
{$smarty.request.h|escape} ##pixels##.</span>
          </div> -->
 
{/if}
{if $step}
<input type="hidden" name="step" value="{$step|escape}" />
{/if}
<!-- <input type="hidden" name="w" value="{$smarty.request.w|escape}" />
<input type="hidden" name="h" value="{$smarty.request.h|escape}" /> -->
<div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <span class="text-primary"> <strong>Upload Art Work</strong> </span>
              </div>
              <div class="panel-body">
                <div class="form-group required">
                    <div class="col-sm-2">
                      <label for="picture" class="control-label">##Upload Art Image##</label>
                    </div>
                    <div class="col-sm-5"> 
                      <input  class="form-control"   name="file" type="file" size="180" id="picture" required />
                      <p id="pic_error1" style="display:none; color:#FF0000;">Image formats should be JPG, JPEG, PNG or GIF.</p>
   <p id="pic_error2" style="display:none; color:#FF0000;">Max file size should be 1MB.</p>
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-2">
                      <label for="title1" class="control-label">##Art Title##</label>
                    </div>
                    <div class="col-sm-5"> 
                      <input  name="title" id="title1" class="form-control" palceholder="Art title here ..." value="{$smarty.request.title|escape}" />
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-2">
                      <label for="desc" class="control-label">##Art Description##</label>
                    </div>
                    <div class="col-sm-5"> 
                       
                      <textarea name="description" id="desc" class="form-control" palceholder="Art description here ..."  >{$smarty.request.description|escape}</textarea>
                    </div>
                  </div>
                  <div class="form-group required">
                    <div class="col-sm-2">
                      <label for="theme1" class="control-label">## Choice of Theme##</label>
                    </div>
                    <div class="col-sm-5">  
                      <select name="theme_id" id="theme1" class="form-control" > 
                        {foreach item=theme from=$themes}
                        <option  value='{$theme->id}' {if $smarty.request.theme_id == $theme->id} selected='selected' {/if} >{$theme->name} </option>
                        {/foreach}
                      </select>
                    </div>
                  </div>
                  
                  <!-- dob -->
                  {if $dobdisplay == 'enable'}
                  <div class="form-group required">
                    <div class="col-sm-2">
                      <label for="inputDate" class="control-label">## Date of Birth##</label>
                    </div>
                    <div class="col-sm-5">  
                     <input name="dob"   id="inputDate" class="form-control inputDate" placeholder="mm/dd/YYYY"  value="01/01/2016" onchange="ajaxCallToCreateAge(this.value);"   />
                     <small>mm/dd/YYYY</small>
                    </div>
                  </div>
                   {/if}
                   <!-- parent -->
                    {if $parentdisplay == 'enable'}
                  <div class="form-group parent_placeholder required" style="display:{$parentdisplay == 'enable'?'block':'none'};">
                    <div class="col-sm-2">
                      <label for="dob1" class="control-label">##  Guardian Name##</label>
                    </div>
                    <div class="col-sm-5">  
                     <input name="parent_name" class="form-control" placeholder="Parent (or) Guardian name here"  value="{$smarty.request.parent_name|escape}" />
                    </div>
                  </div>

                  <div class="form-group parent_placeholder required" style="display:{$parentdisplay == 'enable'?'block':'none'};">
                    <div class="col-sm-2">
                      <label for="dob1" class="control-label">## Guardian Details##</label>
                    </div>
                    <div class="col-sm-5">  
                     <textarea name="parent_details" class="form-control" placeholder="<address>,<phone>,<email>..etc" >{$smarty.request.parent_details|escape}</textarea> 
                    </div>
                  </div>
                   {/if}
                    
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="volunteer_id" class="control-label">##Volunteer Code##</label>
                    </div>
                    <div class="col-sm-5"> 
                       
                      <select name="volunteer_id" id="volunteer_id" class="form-control"  >
                      <option value="">Choose Volunteer Code</option> 
                        {foreach item=vcode from=$vcodes}
                        <option  value='{$vcode->id}' {if $smarty.request.volunteer_id == $vcode->id} selected='selected' {/if} >MDD{$vcode->id} | {$vcode->name}</option>
                        {/foreach}
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-offset-2 col-sm-6"> 
                    <label  ><input type="checkbox" name="is_watermark"   {if $smarty.request.is_watermark } checked="checked"{/if}/> Art have “milliondolardrawings” as alphabet drawing at the right bottom </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-offset-2 col-sm-6"> 
                    <label  ><input type="checkbox" name="proof" id="proof" onchange="onProofSelection();" {if $smarty.request.proof} checked="checked"{/if}/> Proof for Make of art in youtube</label>
                    </div>
                     
                  </div>
                   <div class="form-group proof_placeholder" {if $smarty.request.proof} style="display:block;"{/if}{if !$smarty.request.proof} style="display:none;"{/if};>
                    <div class="col-sm-2">
                      <label for="dob1" class="control-label">## Youtube video link##</label>
                    </div>
                    <div class="col-sm-5">  
                    <textarea class="form-control" placeholder="Youtube url only [https://www.youtube.com/watch?v=<videoid>]" name="proof_file">{$smarty.request.proof_file|escape}</textarea>
                    </div>
                  </div>
                  {if $captcha_url}
               <div class="form-group ">
                     
                    <div class="col-sm-5 col-sm-offset-2 well"> 
                     <input name="phrase" size="10" value="" />&nbsp;
                     <img id="captcha" src="{$captcha_url|escape}" style="vertical-align: middle;border-radius:20px;border:2px solid grey;" alt="##CAPTCHA Image##" /> <i class="fa fa-2x fa-refresh" style="margin-left:10px;" onclick="CaptchaRefresh();"></i>
                      <p class="text-muted">##Enter text from image at right##</p> 
                    </div>
                  </div>
                {/if}
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                       
                      {if $app->setting->upload_images} 
                       <input name="submit_button" type="submit" class="btn btn-primary" value="##Continue## &gt;&gt;" />&nbsp;&nbsp; {/if}
                    </div>
                  </div>
               <!-- <table> -->
  <!-- <tr>
    <td >##Upload Drawing Image##:</td>
    <td><input name="file" type="file" size="80" /></td>
  </tr> -->
   <!-- <tr>
    <td >##Drawing title##:</td>
    <td><input name="title" size="20" value="{$smarty.request.title|escape}" /></td>
  </tr> -->
  <!--  <tr>
    <td >##Description##:</td>
    <td><textarea name="description" size="20"   >{$smarty.request.description|escape}</textarea></td>
  </tr> -->
<!-- <tr>
    <td >##Drawing Themes##:</td>
    <td><select name="theme_id">
       
       
       {foreach item=theme from=$themes}
          <option  value='{$theme->id}' {if $smarty.request.theme_id == $theme->id} selected='selected' {/if} >{$theme->name} </option>
       {/foreach}
    </select></td>
  </tr>  -->
  {if $dobdisplay == 'enable'}
 <!-- <tr>
    <td >##Date of Birth##:  </td>
    <td><input name="dob" size="20" onchange="ajaxCallToCreateAge(this.value);"   />
      <p>mm/dd/YYYY</p></td>
 </tr> -->
 {/if}
   {if $parentdisplay == 'enable'} 
  <!-- <tr class="parent_placeholder" style="display:{$parentdisplay == 'enable'?'block':'none'};">
    <td >##Parent / Guardian Name##:</td>
    <td><input name="parent_name" size="20"  value="{$smarty.request.parent_name|escape}" /> 
 </tr>  -->
 <!-- <tr class="parent_placeholder" style="display:{$parentdisplay == 'enable'?'block':'none'};">
    <td >##Parent / Guardian Details##:</td>
    <td><textarea name="parent_details" size="20" >{$smarty.request.parent_details|escape}</textarea> 
 </tr> -->
 {/if}
 <!--  <tr>
    <td >##School/Volunteer Name##:</td>
    <td><input name="volunteer_name" size="20" value="{$smarty.request.volunteer_name|escape}" /></td>
  </tr> -->
  <!-- <tr>
    <td >##School/Volunteer Country##:</td>
    <td><input name="volunteer_country" size="20" value="{$smarty.request.volunteer_country|escape}" /></td>
  </tr> -->
  <!-- <tr>
    <td >##School/Volunteer State##:</td>
    <td><input name="volunteer_state" size="20" value="{$smarty.request.volunteer_state|escape}" /></td>
  </tr> -->
  <!-- <tr>
    <td >##School/Volunteer City##:</td>
    <td><input name="volunteer_city" size="20" value="{$smarty.request.volunteer_city|escape}" /></td>
  </tr> -->
  <!-- <tr>
    <td >##School/Volunteer Address##:</td>
    <td><textarea name="volunteer_address" size="20"  >{$smarty.request.volunteer_address|escape}</textarea></td>
  </tr> -->
  <!-- <tr>
    <td >##School/Volunteer Phone##:</td>
    <td><input name="volunteer_phone" size="20" value="{$smarty.request.volunteer_phone|escape}" /></td>
  </tr> -->
  <!-- <tr> 
    <td colspan="2"><input type="checkbox" name="is_watermark"  {if $smarty.request.is_watermark != ''} checked="checked"{/if}/> Art have “milliondolardrawings” as alphabet drawing at the right bottom </td>
  </tr> -->
<!-- <tr> 
    <td colspan="2"><input type="checkbox" name="proof" id="proof" onchange="onProofSelection();" {if $smarty.request.proof_file != ''} checked="checked"{/if}/> Make of art in youtube </td>
  </tr> -->
   <!-- <tr class="proof_placeholder" style="display:{if $smarty.request.proof_file != ''} block{/if}{if $smarty.request.proof_file == ''} none{/if};">
    <td >##Youtube video link##:</td>
    <td> --><!-- <input name="proof_file" type="file" size="80" /> -->
     <!-- <textarea name="proof_file">{$smarty.request.proof_file|escape}</textarea>
    </td>
  </tr>
   


</table>
{if $app->setting->upload_images}
  <p>
  <input name="submit_button" type="submit" value="##Continue## &gt;&gt;" />&nbsp;&nbsp;
  </p> 
{/if} -->
              </div>
            </div>
          </div>
        </div>


{end_form}
</div>
</div>
{include file="footer.inc.tpl"}
 
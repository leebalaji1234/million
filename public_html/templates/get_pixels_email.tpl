{assign var="page_title" value="##Sponsor Personal Details##"}
{include file="header.inc.tpl"}
<div class="section">
  <div class="container">
    <div class="row">
          <div class="col-md-12">
<h3 class="text-info">{$page_title|escape}</h3>
<hr/>

{include file="get_pixels_order_status.inc.tpl"}
<blockquote>
<p class="text-warning">##Please enter your e-mail address so we can contact you about your pixels.
##</p>
<p class="text-warning">##Provide twitter username for display feeds on hompage.
##</p>
</blockquote>

{show_errors}
{start_form class="form-horizontal"}

<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >##Your E-Mail Address##:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="email" class="form-control" size="80" placeholder="Enter email address here..." value="{$smarty.request.email|escape}" />
  </div>
</div>

<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >##Re-Enter E-Mail Address##:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="email_confirm" class="form-control" placeholder="Confirm email address here..." size="80" value="{$smarty.request.email_confirm|escape}" />
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" ><i class="fa fa-fw fa-twitter"></i> ##Twitter Username##:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="twitter_name" class="form-control" size="80" placeholder="Twitter username here eg.<@username>" value="{$smarty.request.twitter_name|escape}" />
  </div>
</div>
<div class="form-group">
  
  <div class="col-sm-offset-3 col-sm-5"> 
  <label class="control-label" > <input name="own_theme" id="own_theme" type="checkbox" onchange="ownThemeOptionEnabler();"/> I like to have my own drawing theme on this site</label>
  </div>
</div>
<div class="form-group theme_options" style="display:none;">
   
  <div class="col-sm-offset-3 col-sm-5"> 
  <blockquote>
    <p class="text-warning">Extra price applicable for your own theme</p> 
  </blockquote>
    
  </div>
</div>
<div class="form-group theme_options" style="display:none;">
  <div class="col-sm-3">
    <label class="control-label" >  ##Theme Name##:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="theme_name" class="form-control" placeholder="Enter theme name here ..." size="80" value="{$smarty.request.theme_name|escape}" />
   <input type="hidden" name="category_id" value="3" />

  </div>
</div>
<div class="form-group theme_options" style="display:none;">
  <div class="col-sm-3">
    <label class="control-label" >  ##Theme Description##:</label>
  </div>
  <div class="col-sm-5"> 
   <textarea name="theme_description" class="form-control" placeholder="Theme description here ...">{$smarty.request.theme_description|escape}</textarea>

  </div>
</div>
 <div class="form-group">
<div class="col-sm-offset-3 col-sm-6">
   
  <input type="hidden" name="step" value="{$step|escape}" />

   <input type="submit" value="Continue &gt;&gt;" class="btn btn-primary" name="submit_button"> 
</div>
</div>
 
{end_form}


</div>
</div>
</div>
</div>

{include file="footer.inc.tpl"}

{assign var="page_title" value="##Describe Your Pixels##"}
{include file="header.inc.tpl"}
<div class="section">
  <div class="container">
    <div class="row">
          <div class="col-md-12">
<h3 class="text-info">{$page_title|escape}</h3>
<hr/>

{include file="get_pixels_order_status.inc.tpl"}
<blockquote>
             <p class="text-warning">##Specify the URL for the site your pixels will be linked to. It must start
with <tt>http://</tt> or <tt>https://</tt>. You may also specify an optional
title and alt tag value for your pixels. If you leave the title blank, your URL
will be used as the title. If you leave the alt tag value blank, the title (or
URL) will be used.##</p>
              
            </blockquote>


{show_errors}
{start_form class="form-horizontal"}

<div class="form-group required">
  <div class="col-sm-2">
    <label class="control-label" >##URL for Your Site##:</label>
  </div>
  <div class="col-sm-5"> 
    <input class="form-control" name="url" size="80" value="{$smarty.request.url|escape}" />
  </div>
</div>

<div class="form-group required">
  <div class="col-sm-2">
    <label class="control-label" >##Title for Your Pixels##:</label>
  </div>
  <div class="col-sm-5"> 
    
    <input class="form-control" name="title" size="80" value="{$smarty.request.title|escape}" />
  </div>
</div>

<div class="form-group required">
  <div class="col-sm-2">
    <label class="control-label" >##Mouseover display text for Your Pixels##:</label>
  </div>
  <div class="col-sm-5"> 
    
    <input class="form-control" name="alt" size="80" value="{$smarty.request.alt|escape}" />
  </div>
</div>

 

<div class="form-group">
<div class="col-sm-offset-2 col-sm-6">
   
  <input type="hidden" name="step" value="{$step|escape}" />

   <input type="submit" value="Continue &gt;&gt;" class="btn btn-primary" name="submit_button"> 
</div>
</div>
 
{end_form}
<!-- {start_form}
<p>
<input type="hidden" name="step" value="{$step|escape}" />
<input type="hidden" name="skip_details" value="true">
<input name="submit" type="submit" value="##I will fill details later## &gt;&gt;" />&nbsp;&nbsp;
</p>
{end_form} -->

</div>
</div>
</div>
</div>
{include file="footer.inc.tpl"}
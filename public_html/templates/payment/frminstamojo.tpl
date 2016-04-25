  
<div class="row">
  <div class="form-group">
  	<div class="col-sm-6"> 
    <img width="200"  class="img-responsive" src="{url|escape href='images/instamojo.png'}" border="0"   alt="InstaMojo" />  
   </div>
   <div class="col-sm-6"> 
 <blockquote>
{start_form action=$module->action|escape}
{foreach key=name item=item from=$module->hidden}
<input type="hidden" name="{$name|escape}" value="{$item|escape}" />
{/foreach}
<p>
   
  <button type="submit" class="btn btn-primary col-md-4" > >> ##Pay with## {$module->name|escape}</button>
</p>
{end_form}
</blockquote>
  </div>
  </div>
 
  </div>

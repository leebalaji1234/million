{assign var="page_title" value="##Select Payment Method##"}
{include file="header.inc.tpl"}
<div class="section">
  <div class="container">
    <div class="row">
          <div class="col-md-12">
<h3 class="text-info">{$page_title|escape}</h3>
<hr/>

{include file="get_pixels_order_status.inc.tpl"}

{if $smarty.request.amount == 0}
  {if $smarty.session.payment_controller=="renew"}
  ##No payment is required. Select "Continue" to renew your pixels.##
  {else}
  ##No payment is required. Select "Continue" to create your pixels.##
  {/if}

  {start_form}
  <input type="hidden" name="step" value="{$step|escape}" />
  {if $smarty.session.payment_controller=="renew"}
  <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  <input type="hidden" name="digest" value="{$smarty.request.digest|escape}" />
  <input type="hidden" name="email" value="{$smarty.request.email|escape}" />
  {/if}
  <p><input type="submit" value="##Continue## &gt;&gt;" /></p>
{end_form}
{else }
 <div class="row">
  <div class="col-md-12">
    
    {foreach item=module from=$modules} 
    {include file=$module->form()} 
    {/foreach}
    
  </div>
</div>
{/if}

            
               
            
          
</div>
</div>
</div>
</div>
{include file="footer.inc.tpl"}

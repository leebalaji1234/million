{assign var="page_title" value="##Select Payment Method##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

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
  {foreach item=module from=$modules}
  <hr />
  {include file=$module->form()}
  {/foreach}
{/if}
{include file="footer.inc.tpl"}

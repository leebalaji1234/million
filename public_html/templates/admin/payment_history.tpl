{assign var="page_title" value="##Payment History##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Show:## 
{if $smarty.request.show != 'unverified' && $smarty.request.show != 'error'}<strong>##All##</strong>{else}<a href="{url|escape}?show=all">##All##</a>{/if} |
{if $smarty.request.show == 'unverified'}<strong>##Unverified##</strong>{else}<a href="{url|escape}?show=unverified">##Unverified##</a>{/if} |
{if $smarty.request.show == 'error'}<strong>##Errors##</strong>{else}<a href="{url|escape}?show=error">##Errors##</a>{/if}
</p>

<table class="grid">

  <tr>
    <th>##Id##</th>
    <th>##Method##</th>
    <th>##Amount##</th>
    <th>##Completed##</th>
    <th>##Verified?##</th>
    <th>##Error?##</th>
  </tr>

  {foreach item=payment from=$payments}
  <tr>
    <td><a href="{url|escape}?id={$payment->id|escape}&amp;show={$smarty.request.show|escape}">{$payment->id|escape}</a></td>
    <td>{$payment->payment_method|escape}</td>
    <td style="text-align: right">{$payment->amount|number_format:2|escape}</td>
    <td>{$payment->completed_at|escape}</td>
    <td style="text-align: center">{if $payment->is_verified}##Yes##{else}##No##{/if}</td>
    <td style="text-align: center">{if $payment->is_error}##Yes##{else}##No##{/if}</td>
  </tr>
  {foreachelse}
  <tr>
    <td colspan="6">##No matching payments found##</td>
  </tr>
  {/foreach}

</table>

{include file="admin/footer.inc.tpl"}

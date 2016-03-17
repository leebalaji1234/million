{assign var="page_title" value="##Confirm Payment##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{include file="get_pixels_order_status.inc.tpl"}

<p>##Please confirm payment details below:##</p>

{start_form action=$module->action|escape}
{foreach key=name item=item from=$module->hidden}
<input type="hidden" name="{$name|escape}" value="{$item|escape}" />
{/foreach}
<table>

  <tr>
    <td class="label">##Amount##:</td>
    <td>{$app->setting->currency_symbol|escape}{$smarty.request.amount|number_format:2|escape}</td>
  </tr>

  <tr>
    <td class="label">##Credit Card Owner##:</td>
    <td>{$smarty.request.ipayment_cc_owner|escape}</td>
  </tr>

  <tr>
    <td class="label">##Credit Card Type##:</td>
    <td>{$smarty.request.ipayment_cc_type|escape}</td>
  </tr>

  <tr>
    <td class="label">##Credit Card Number##:</td>
    <td>{$smarty.request.ipayment_cc_number|escape}</td>
  </tr>

  <tr>
    <td class="label">##Credit Card Check Number##:</td>
    <td>{$smarty.request.ipayment_cc_cvv|escape}</td>
  </tr>

</table>
<p>
  <input type="submit" value="##Submit Payment##" />
</p>
{end_form}

{include file="footer.inc.tpl"}

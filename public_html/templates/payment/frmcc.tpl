<h2>##Credit Card##</h2>
<blockquote>
{if $smarty.request.module_key==$module->module_key}{show_errors}{/if}
{start_form}
{foreach key=name item=item from=$module->hidden}
<input type="hidden" name="{$name|escape}" value="{$item|escape}" />
{/foreach}
<table width="100%">

  <tr>
    <td class="label">##Credit Card Owner##:</td>
    <td><input type="text" name="cc_owner" size="40" value="{$smarty.request.cc_owner|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Credit Card Number##:</td>
    <td><input type="text" name="cc_number" size="20" value="{$smarty.request.cc_number|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Credit Card Exp. Date##:</td>
    <td>{html_select_date_translated display_days=false end_year=+10 prefix="cc_expires_"}</td>
  </tr>

</table>
<p>
  <input type="submit" value="##Pay with## {$module->name|escape} &gt;&gt;" />
</p>
{end_form}
</blockquote>

{if $smarty.request.action == 'edit'}{assign var="page_title" value="##Edit Language##"}{else}{assign var="page_title" value="##New Language##"}{/if}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{show_errors}
{start_form}
<table>
  <tr>

    <td class="label">##Language Code##:</td>
    <td>
    {if $smarty.request.action == 'edit'}
    {$smarty.request.code}{if $default} (default){/if}
    {else}
    <input name="code" size="5" value="{$smarty.request.code|escape}" />
    (##Use <a href="http://www.loc.gov/standards/iso639-2/englangn.html" target="_blank">ISO 639-1 Language Code</a> values##)
    {/if}
    </td>
  </tr>

  <tr>
    <td class="label">##Language Name##:</td>
    <td><input name="name" size="20" value="{$smarty.request.name|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Decimal Point Char##:</td>
    <td><input name="decimal_point" size="3" value="{$smarty.request.decimal_point|escape}" /> (##Use '?' character for a blank space##)</td>
  </tr>

  <tr>
    <td class="label">##Thousands Separator Char##:</td>
    <td><input name="thousands_separator" size="3" value="{$smarty.request.thousands_separator|escape}" /> (##Use '?' character for a blank space##)</td>
  </tr>

</table>
<p>
  <input type="hidden" name="action" value="{$smarty.request.action|escape}" />
  {if $smarty.request.action == 'edit'}
  <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  <input type="hidden" name="code" value="{$smarty.request.code|escape}" />
  {/if}
  <input name="submit" type="submit" value="##Save##" />&nbsp;
	
{end_form}
  {if $smarty.request.action == 'edit' && !$default}
	{start_form}
  <input type="hidden" name="action" value="{$smarty.request.action|escape}" />
  <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  <input type="hidden" name="code" value="{$smarty.request.code|escape}" />
  <input type="hidden" name="action" value="delete" />
  <input name="submit" type="submit" value="##Delete##" />
	{end_form}
  {/if}
</p>

{include file="admin/footer.inc.tpl"}

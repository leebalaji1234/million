{if $smarty.request.new}{assign var="page_title" value="##New Newsletter##"}{else}{assign var="page_title" value="##Edit Newsletter##"}{/if}
{assign var="scripts" value="/snippet.js"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{show_errors}
{start_form onSubmit="snippetSubmit(this); return true;"}
<table>

  {if !$smarty.request.new}
  <tr>
    <td class="label">##Article Id##:</td>
    <td>{$newsletter->id|escape}</td>
  </tr>

  <tr>
    <td class="label">##Date Posted##:</td>
    <td>{$newsletter->created_at|escape}</td>
  </tr>
  {/if}

  <tr>
    <td class="label">##Title##:</td>
    <td>{snippet_textfield name='newsletter_title' size='80'}</td>
  </tr>

  <tr valign="top">
    <td class="label">##Body##:</td>
    <td>{snippet_textarea name='newsletter_body' rows='8'}</td>
  </tr>

</table>
{if $smarty.request.new}
<input type="hidden" name="new" value="1" />
{else}
<input type="hidden" name="id" value="{$smarty.request.id|escape}" />
{/if}

<p>
  <input type="submit" name="submit_button" value="##Save##" />
{end_form}
  {if !$smarty.request.new}
  &nbsp;&nbsp;
	{start_form}
	<input type="hidden" name="id" value="{$smarty.request.id|escape}" />
	<input type="hidden" name="action" value="delete" />
  <input type="submit" name="submit_button" value="##Delete##" />
	{end_form}
  {/if}
</p>


{include file="admin/footer.inc.tpl"}

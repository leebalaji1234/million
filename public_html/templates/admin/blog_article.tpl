{if $smarty.request.new}{assign var="page_title" value="##New Blog Article##"}{else}{assign var="page_title" value="##Edit Blog Article##"}{/if}
{assign var="scripts" value="/snippet.js"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{show_errors}
{start_form onSubmit="snippetSubmit(this); return true;"}
<table>

  {if !$smarty.request.new}
  <tr>
    <td class="label">##Article Id##:</td>
    <td>{$blog_article->id|escape}</td>
  </tr>

  <tr>
    <td class="label">##Date Posted##:</td>
    <td>{$blog_article->created_at|escape}</td>
  </tr>
  {/if}

  <tr>
    <td class="label">##Title##:</td>
    <td>{snippet_textfield name='blog_article_title' size='80'}</td>
  </tr>

  <tr valign="top">
    <td class="label">##Body##:</td>
    <td>{snippet_textarea name='blog_article_body' rows='8'}</td>
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
	{start_form}
  &nbsp;&nbsp;
	<input type="hidden" name="action" value="delete" />
	<input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  <input type="submit" name="submit_button" value="##Delete##" />
	{end_form}
  {/if}
</p>


{include file="admin/footer.inc.tpl"}

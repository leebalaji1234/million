{assign var="page_title" value="##Delete Blog Article##"}
{include file="admin/header.inc.tpl"}

<h1 class="notice">{$page_title|escape}</h1>

{start_form}
<p>
  <strong>##WARNING!##</strong> ##Deleting an article will permanently remove it from the database.##
</p>
<p>
  <input type="checkbox" name="confirm" value="confirm" /> ##Yes, I want to delete the article## <strong>{snippet|escape name='blog_article_title' seq=$blog_article->id}</strong>
</p>
<p>
  <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  <input type="hidden" name="action" value="delete" />
  <input name="submit_button" type="submit" value="##Delete##" />
{end_form}
</p>

{include file="admin/footer.inc.tpl"}

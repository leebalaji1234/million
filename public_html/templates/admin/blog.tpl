{assign var="page_title" value="##Blog##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<table class="grid">

  <tr>
    <th>##Id##</th>
    <th>##Date##</th>
    <th>##Title##</th>
    <th>##Comments##</th>
  </tr>

  {foreach item=blog_article from=$blog_articles}
  <tr>
    <td>{$blog_article->id|escape}</td>
    <td>{$blog_article->created_at|escape}</td>
    <td><a href="{url|escape href='/admin/blog_article.php'}?id={$blog_article->id|escape}">{snippet|escape name='blog_article_title' seq=$blog_article->id}</a></td>
    <td align="center">{if $blog_article->num_comments}<a href="{url|escape href='/admin/blog_comments.php'}?id={$blog_article->id|escape}">{$blog_article->num_comments}</a>{else}0{/if}</td>
  </tr>
  {/foreach}

</table>

<p>
  <a href="{url|escape href='/admin/blog_article.php'}?new=1">##New Article##</a>
</p>

{include file="admin/footer.inc.tpl"}

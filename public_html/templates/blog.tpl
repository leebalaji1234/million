{assign var="page_title" value="##Blog##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<table width="100%">
  <tr valign="top">

    <td>

{foreach item=blog_article from=$blog_articles}
<div class="blog_article">
  <p class="blog_article_title"><a href="{url|escape href='/blog_article.php'}?id={$blog_article->id|escape}">{snippet|escape name='blog_article_title' seq=$blog_article->id}</a></p>
  <p class="blog_article_date">{$blog_article->created_at|date_format:'%B %d, %Y'}</p>
  <p class="blog_article_body">{snippet name='blog_article_body' seq=$blog_article->id}</p>
  {if $app->setting->blog_comments}
  <p class="blog_article_comments"><a href="{url|escape href='/blog_article.php'}?id={$blog_article->id|escape}#comments">{$blog_article->num_comments|escape} ##Comment(s)##</a></p>
  {/if}
</div>
{/foreach}

    </td>

    <td width="1%" style="white-space: nowrap">
      <h2>##Previous Articles##</h2>
      <ul>
      {foreach key=month item=month_name from=$months}
      <li>{if $month==$smarty.request.month}<strong>{$month_name|escape}</strong>{else}<a href="{url|escape}?month={$month|escape}">{$month_name|escape}</a>{/if}</li>
      {/foreach}
      </ul>
    </td>

  </tr>
</table>

{include file="footer.inc.tpl"}

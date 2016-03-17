{assign var="page_title" value="##Blog##"}
{include file="header.inc.tpl"}

<h1 class="blog_article_title">{snippet|escape name='blog_article_title' seq=$blog_article->id}</h1>
<p class="blog_article_date">{$blog_article->created_at|date_format:'%B %d, %Y'}</p>
<p class="blog_article_body">{snippet name='blog_article_body' seq=$blog_article->id}</p>

{if $app->setting->blog_comments}
<blockquote>
<a name="comments"></a>

{if $blog_comments}
<h2 class="blog_comment">##Comments##</h2>
{foreach item=blog_comment from=$blog_comments}
<div class="blog_comment">
<p class="blog_comment_date">Posted {$blog_comment->created_at|date_format:'%B %d, %Y %H:%M'} by {$blog_comment->author|escape}</p>
<p class="blog_comment_body">{$blog_comment->body|escape|nl2br}</p>
</div>
{/foreach}
{/if}

<h2 class="blog_comment">##Add A Comment##</h2>
{show_errors}
{start_form}
<table>

  <tr>
    <td class="label">##Your Name##:</td>
    <td><input name="author" size="50" value="{$smarty.request.author|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Your Comment##:</td>
    <td><textarea name="body" rows="8" style="width: 25em">{$smarty.request.body|escape}</textarea></td>
  </tr>

  {if $captcha_url}
  <tr>
    <td class="label">##Text from Image at Right##:</td>
    <td><input name="phrase" size="10" value="" />&nbsp;<img src="{$captcha_url|escape}" style="vertical-align: middle" alt="##CAPTCHA Image##" /></td>
  </tr>
  {/if}

</table>
<p>
  <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  <input type="submit" value="##Add Comment##" />
</p>
{end_form}

</blockquote>
{/if}

{include file="footer.inc.tpl"}

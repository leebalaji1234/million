{assign var="page_title" value="##Blog Comments##"}
{include file="admin/header.inc.tpl"}

<h1>##Comments on ##{snippet|escape name='blog_article_title' seq=$blog_article->id|escape}</h1>

{start_form}
<table>
{foreach item=blog_comment from=$blog_comments}

    <tr>
      <td class="label">##Date Posted##:</td>
      <td>{$blog_comment->created_at}</td>
    </tr>

    <tr>
      <td class="label">&nbsp;</td>
      <td><input type="checkbox" name="delete[{$blog_comment->id|escape}]" value="1" /> ##Delete this comment##</td>
    </tr>

    <tr>
      <td class="label">##Author##:</td>
      <td><input name="author[{$blog_comment->id|escape}]" size="50" value="{$blog_comment->author|escape}" /></td>
    </tr>

    <tr>
      <td class="label">##Comment##:</td>
      <td><textarea name="body[{$blog_comment->id|escape}]" style="width: 25em" rows="8">{$blog_comment->body|escape}</textarea></td>
    </tr>

    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>

{/foreach}
</table>
<p>
  <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  <input type="submit" name="submit_button" value="##Save Changes##" />
</p>
{end_form}

{include file="admin/footer.inc.tpl"}

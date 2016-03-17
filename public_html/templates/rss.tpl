{assign var="page_title" value="##RSS Feeds##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##The following RSS Feeds are available:##</p>

<ul>
  {if $app->setting->rss_latest_pixels > 0}
  <li><a href="{url href='/rss_latest_pixels.php'}">{$app->setting->rss_latest_pixels|escape} ##most recently added pixels##</a></li>
  {/if}
  {if $app->setting->rss_top_pixels > 0}
  <li><a href="{url href='/rss_top_pixels.php'}">{$app->setting->rss_top_pixels|escape} ##most active pixels##</a></li>
  {/if}
  {if $app->setting->rss_blog_articles > 0}
  <li><a href="{url href='/rss_blog_articles.php'}">{$app->setting->rss_blog_articles|escape} ##latest blog articles##</a></li>
  {/if}
</ul>

{include file="footer.inc.tpl"}

<?xml version="1.0"?>
<rss version="2.0">
  <channel>
    <title>{$app->setting->site_title|escape} Blog Articles</title>
    <link>{url href='/index.php'|escape}</link>
    <description>{$app->setting->site_description|escape}</description>
    {foreach item=item from=$items}
    <item>
      <title>{snippet|escape name='blog_article_title' seq=$item->id}</title>
      <description>{snippet|escape name='blog_article_body' seq=$item->id}</description>
      <link>{url href='/blog_article.php'|escape}?id={$item->id|escape}</link>
      <pubDate>{$item->created_at_rfc822()|escape}</pubDate>
      <guid>{url href='/blog_article.php'|escape}?id={$item->id|escape}</guid>
    </item>
    {/foreach}
  </channel>
</rss>

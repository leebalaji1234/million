<?xml version="1.0"?>
<rss version="2.0">
  <channel>
    <title>{$app->setting->site_title|escape} Top Pixels</title>
    <link>{url href='/index.php'|escape}</link>
    <description>{$app->setting->site_description|escape}</description>
    {foreach item=item from=$items}
    <item>
      <title>{$item->title()|escape}</title>
      <link>{url href='/index.php'|escape}?r={$item->id|escape}</link>
      <pubDate>{$item->created_on_rfc822()|escape}</pubDate>
      <guid>{url href='/index.php'|escape}?r={$item->id|escape}</guid>
    </item>
    {/foreach}
  </channel>
</rss>

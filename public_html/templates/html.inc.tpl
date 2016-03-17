<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language_code|escape|default:'en'}" lang="{$language_code|escape|default:'en'}">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{if $meta_description}
  <meta name="description" content="{$meta_description|escape}" />
{/if}
{if $meta_robots}
  <meta name="robots" content="{$meta_robots|escape}" />
{/if}
{foreach item=stylesheet from=$stylesheets}
  <link rel="stylesheet" type="text/css" href="{url|escape href=$stylesheet}" />
{/foreach}
{if $app->setting->rss_latest_pixels > 0}
  <link rel="alternate" type="application/rss+xml" title= "##Latest Pixels##" href="{url href='/rss_latest_pixels.php'}" />
{/if}
{if $app->setting->rss_top_pixels > 0}
  <link rel="alternate" type="application/rss+xml" title= "##Top Pixels##" href="{url href='/rss_top_pixels.php'}" />
{/if}
{if $app->setting->rss_blog_articles > 0}
  <link rel="alternate" type="application/rss+xml" title= "##Blog Articles##" href="{url href='/rss_blog_articles.php'}" />
{/if}
{foreach item=script from=$scripts}
  <script type="text/javascript" src="{url|escape href=$script}"></script>
{/foreach}
  <title>{$site_title|escape}{if $page_title} - {$page_title|escape}{/if}</title>
</head>

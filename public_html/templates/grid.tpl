<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{$language_code|escape|default:'en'}" lang="{$language_code|escape|default:'en'}">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>{snippet|escape name="grid_title" seq=$grid->id}</title>
</head>
<body>
  <map name="grid_{$grid->id}">{$grid->map()}</map><div><img src="{$grid->url()|escape}" usemap="#grid_{$grid->id}" width="{$grid->width|escape}" height="{$grid->height|escape}" alt="" border="0" /></div>
{include file='wz_tooltip.inc.tpl'}
</body>
</html>

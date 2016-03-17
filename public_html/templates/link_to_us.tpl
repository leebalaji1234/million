{assign var="page_title" value="##Link to Us##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Please use the HTML code below to include a banner or link to## {$app->setting->site_name|escape}. ##Thank you for linking to us.##</p>

<blockquote>
{foreach item=banner from=$link_banners}
<p>&nbsp;</p>
<div>{$banner->replace_parameters()}</div>
<textarea class="code" rows="3" readonly="readonly" onfocus="this.select()">{$banner->replace_parameters()|escape}</textarea>
{/foreach}

{foreach item=link from=$link_links}
<p>&nbsp;</p>
<div>{$link->replace_parameters()}</div>
<textarea class="code" rows="3" readonly="readonly" onfocus="this.select()">{$link->replace_parameters()|escape}</textarea>
{/foreach}
</blockquote>

{include file="footer.inc.tpl"}

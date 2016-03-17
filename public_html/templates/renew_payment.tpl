{assign var="page_title" value="##Select Payment Method##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{include file="get_pixels_order_status.inc.tpl"}

{foreach item=module from=$modules}
<hr />
{include file=$module->form()}
{/foreach}

{include file="footer.inc.tpl"}

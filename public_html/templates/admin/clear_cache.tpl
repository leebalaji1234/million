{assign var="page_title" value="##Clear Cache##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##This function will delete all cached pages##</p>

{start_form}
  <input type="submit" value="##Clear Cache Now##" />
{end_form}

{include file="admin/footer.inc.tpl"}

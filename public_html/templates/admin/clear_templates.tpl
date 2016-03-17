{assign var="page_title" value="##Clear Compiled Templates##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##This function will delete all the compiled Smarty templates from the
following directory:##</p>

<p class="indent"><tt>{$dir|escape}</tt></p>

{start_form}
  <input type="submit" value="##Clear Compiled Templates Now##" />
{end_form}

{include file="admin/footer.inc.tpl"}

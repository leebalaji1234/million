{assign var="page_title" value="##Republish Grids##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##This function will regenerate the grid image(s) in the##
<tt>{$smarty.const.GRIDS_DIR|escape}</tt> ##directory, according to
the current region information.##</p>

{start_form}
  <input type="submit" value="##Republish Grids Now##" />
{end_form}

{include file="admin/footer.inc.tpl"}

{assign var="page_title" value="##New Grid##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Enter the dimensions for the new grid. Once a grid has been created, its
dimensions cannot be changed. You will be able to change other grid parameters
at the next step.##</p>

{show_errors}
{start_form}
<table>

  <tr>
    <td class="label">##Grid Width##:</td>
    <td>{if $smarty.request.action == 'new'}<input name="width" size="5" value="{$smarty.request.width|escape}" /> ##pixels (must be a multiple of## {$smarty.request.selectable_square_size|escape}){else}{$smarty.request.width|escape} ##pixels##{/if}</td>
  </tr>

  <tr>
    <td class="label">##Grid Height##:</td>
    <td>{if $smarty.request.action == 'new'}<input name="height" size="5" value="{$smarty.request.height|escape}" /> ##pixels (must be a multiple of## {$smarty.request.selectable_square_size|escape}){else}{$smarty.request.height|escape} ##pixels##{/if}</td>
  </tr>

</table>
<p>
  <input type="hidden" name="action" value="{$smarty.request.action|escape}" />
  <input name="submit_button" type="submit" value="##Save##" />&nbsp;
</p>
{end_form}

{include file="admin/footer.inc.tpl"}
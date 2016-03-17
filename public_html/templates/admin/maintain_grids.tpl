{assign var="page_title" value="##Maintain Grids##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<table class="grid">
  <tr>
    <th>##Name##</th>
    <th>##Size##</th>
    <th>##Move##</th>
  </tr>
  {section name=i loop=$rows}
  <tr>
    <td><a href="{url|escape}?action=edit&amp;id={$rows[i]->id|escape}">{$rows[i]->name|escape}</a></td>
    <td>{$rows[i]->width|escape} x {$rows[i]->height|escape}</td>
    <td align="center">{if $smarty.section.i.first}&nbsp;{else}
    {start_form}
    <input type="hidden" name="action" value="move_up" />
    <input type="hidden" name="id" value="{$rows[i]->id|escape}" />
    <input type="image" src="{url|escape href='/images/sm_uparrow.gif'}" alt="Up Arrow" title="Move Up" />
    {end_form}
    {/if}</td>
  </tr>
  {/section}
</table>

<p><a href="{url|escape}?action=new">##Add a Grid##</a></p>

{include file="admin/footer.inc.tpl"}

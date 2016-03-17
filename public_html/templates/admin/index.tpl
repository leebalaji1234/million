{include file='admin/header.inc.tpl'}

<h1>{$app->setting->site_name} ##Administration Area##</h1>

{show_errors}
{start_form}

<table>

  <tr>
    <td colspan="2"><h2>Site Status</h2></td>
  </tr>

  <tr>
    <td class="label">##Script Version##:</td>
    <td>{$smarty.const.PACKAGE_VERSION|escape}</td>
  </tr>

  <tr>
    <td class="label">##Public Site Status##:</td>
    <td>
    {if $app->setting->site_down}
      <span class="error"><strong>##Down for Maintenance##</strong></span>
      <input type="hidden" name="do" value="site_up" />
      &nbsp; <input type="submit" value="Activate Site" />
    {else}
      ##Up##
      <input type="hidden" name="do" value="site_dn" />
      &nbsp; <input type="submit" value="Deactivate Site for Maintenance" />
    {/if}
    </td>
  </tr>

  <tr>
    <td colspan="2"><h2>##Grid Performance##</h2></td>
  </tr>

  <tr>
    <td class="label">##Number of Grids##:</td>
    <td>{$num_grids}</td>
  </tr>

  {foreach item=grid from=$grids}
  <tr>
    <td class="label"><a href="{url|escape href="/admin/maintain_regions.php"}?grid_id={$grid.grid->id|escape}">{$grid.grid->name|escape}</a></td>
    <td>
      {foreach item=zone from=$grid.zones}<img src="{$zone.src|escape}" width="{$zone.pct*3}" height="16" title="{$zone.title|escape}" border="0" alt="{$zone.title|escape}" />{/foreach}
      &nbsp; {$grid.pct}% ##active##
    </td>
  </tr>
  {/foreach}

  <tr>
    <td class="label">##Overall Pixels##:</td>
    <td>##Active##: {$active_pixels|number_format|escape} ##pixels##, ##Inactive##: {$inactive_pixels|number_format|escape} ##pixels##, ##Available##: {$avail_pixels|number_format|escape} ##pixels##, ##Total##: {$total_pixels|number_format|escape} ##pixels##</td>
  </tr>

  <tr>
    <td class="label">##Overall Peformance##:</td>
    <td>{$active_pct}% ##active##</td>
  </tr>

</table>

{end_form}

{include file='admin/footer.inc.tpl'}

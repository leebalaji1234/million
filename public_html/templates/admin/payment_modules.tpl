{assign var="page_title" value="##Payment Modules##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<table class="grid">
  <tr>
    <th>##Module##</th>
    <th>##Display Order##</th>
    <th>##Action##</th>
  </tr>
  {foreach item="module" from=$modules}
  <tr>
    <td>{$module->name|escape}</td>
    <td align="center">{if $module->is_enabled}{$module->display_order|escape}{else}&nbsp;{/if}</td>
    <td>
      {start_form style="margin-top: 0; margin-bottom: 0"}
      <input type="hidden" name="id" value="{$module->id|escape}" />
      {if $module->is_enabled}
      <input type="submit" name="_configure" value="##Configure##" />
      &nbsp;&nbsp;
      <input type="submit" name="_disable" value="##Disable##" />
      {else}
      <input type="submit" name="_enable" value="##Enable##" />
      {/if}
      {end_form}
    </td>
  </tr>
  {/foreach}
</table>

{include file="admin/footer.inc.tpl"}

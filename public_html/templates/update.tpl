{assign var="page_title" value="##Update Your Pixels##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{literal}
<script type="text/javascript">
function upload_image()
{
  var f = document.forms[0];
  f.upload_image.value = '1';
  f.submit();
}
</script>
{/literal}

{show_errors}
{start_form}

<table width="100%">

  <tr>
    <td class="label">##Region ID##:</td>
    <td>{$region->id|escape}</td>
  </tr>

  <tr>
    <td class="label">##Status##:</td>
    <td>{$region->status_description($region->status)|escape}</td>
  </tr>

  <tr>
    <td class="label">##Size##:</td>
    <td>{$region->width|escape} x {$region->height|escape}</td>
  </tr>

  <tr>
    <td class="label">##Clicks##:</td>
    <td>{$region->clicks|escape}</td>
  </tr>

  <tr>
    <td class="label">##Image##:</td>
    <td>
      {if $smarty.session.image}
      <img src="{url|escape href='/session_image.php'}?x={$smarty.now|escape}" alt="Uploaded Image" />&nbsp;&nbsp;
      <a href="javascript:upload_image()">##Replace Image##</a>
      {else}
      <a href="javascript:upload_image()">##Upload Image##</a>
      {/if}
    </td>
  </tr>

  <tr>
    <td class="label">##URL##:</td>
    <td><input name="url" size="80" value="{$smarty.request.url|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Title##:</td>
    <td><input name="title" size="80" value="{$smarty.request.title|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Alt Tag Value##:</td>
    <td><input name="alt" size="80" value="{$smarty.request.alt|escape}" /></td>
  </tr>

  {if $region->expires_at}
  <tr>
    <td class="label">##Expires at##:</td>
    <td>{$region->expires_at|escape}
    {if $renew_url}&nbsp;&nbsp;&nbsp;<a href="{$renew_url|escape}">Renew Now</a>{/if}
    </td>
  </tr>
  {/if}

  {if $region->purge_at}
  <tr>
    <td class="label">##Will be removed at##:</td>
    <td>{$region->purge_at|escape}</td>
  </tr>
  {/if}

</table>

<input type="hidden" name="id" value="{$region->id|escape}" />
<input type="hidden" name="digest" value="{$smarty.request.digest|escape}" />
<input type="hidden" name="email" value="{$smarty.request.email|escape}" />
<input type="hidden" name="upload_image" value="" />

<p>
<input type="submit" name="submit_button" value="##Save##" />&nbsp;
</p>
{end_form}

{include file="footer.inc.tpl"}

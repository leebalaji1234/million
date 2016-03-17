{assign var="page_title" value="##Edit Region##"}
{include file="admin/header.inc.tpl"}

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

<h1>{$page_title|escape}</h1>

{show_errors}
{start_form name="edit_form"}
<table width="100%">

  <tr>
    <td class="label">##Region ID##:</td>
    <td>{$region->id|escape}</td>
  </tr>

  <tr>
    <td class="label">##Grid##:</td>
    <td>{$grid->name|escape}</td>
  </tr>

  <tr>
    <td class="label">##Location##:</td>
    <td>{$region->x|escape}, {$region->y|escape}</td>
  </tr>

  <tr>
    <td class="label">##Size##:</td>
    <td>{$region->width|escape} x {$region->height|escape}</td>
  </tr>

  <tr>
    <td class="label">##Created##:</td>
    <td>{$region->created_on|escape}</td>
  </tr>

  <tr>
    <td class="label">##Status##:</td>
    <td>{html_options name="status" selected=$smarty.request.status options=$statuses}</td>
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

  <tr>
    <td class="label">##E-Mail##:</td>
    <td><input name="email" size="80" value="{$smarty.request.email|escape}" /> <a href="javascript:void(0)" onclick="var f=document.edit_form; f.send_confirmation.value=1; f.submit();">Send Purchase Confirmation</a></td>
  </tr>

  <tr>
    <td class="label">##Notes##:</td>
    <td><textarea name="notes" style="width: 100%" rows="3">{$smarty.request.notes|escape}</textarea></td>
  </tr>

  <tr>
    <td class="label">##Clicks##:</td>
    <td><input name="clicks" size="8" value="{$smarty.request.clicks|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Expires At##:</td>
    <td><input name="expires_at" size="20" value="{$smarty.request.expires_at|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Send Reminder At##:</td>
    <td><input name="reminder_at" size="20" value="{$smarty.request.reminder_at|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Purge At##:</td>
    <td><input name="purge_at" size="20" value="{$smarty.request.purge_at|escape}" /></td>
  </tr>

</table>

<input type="hidden" name="id" value="{$region->id|escape}" />
<input type="hidden" name="upload_image" value="" />
<input type="hidden" name="send_confirmation" value="" />

<p>
<input type="submit" name="submit_button" value="##Save##" />&nbsp;
{end_form}
{start_form name="delete_form"}
<input type="hidden" name="id" value="{$region->id|escape}" />
<input type="hidden" name="send_confirmation" value="" />
<input type="hidden" name="action" value="delete" />
<input type="submit" name="submit_button" value="##Delete##" />
{end_form}
</p>

{include file="admin/footer.inc.tpl"}

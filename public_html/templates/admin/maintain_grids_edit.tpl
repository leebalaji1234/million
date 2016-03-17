{assign var="page_title" value="##Edit Grid##"}
{assign var="scripts" value="/snippet.js"}
{include file="admin/header.inc.tpl"}

{literal}
<script type="text/javascript">
function upload_image(n)
{
  var f = document.forms[0];
  f.upload_image.value = n;
  snippetSubmit(f);
  f.submit();
}
</script>
{/literal}

<h1>{$page_title|escape}</h1>

{show_errors}
{start_form onSubmit="snippetSubmit(this); return true;"}
<table>

  <tr>
    <td class="label">##Grid Name##:</td>
    <td><input name="name" size="20" value="{$smarty.request.name|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Grid Width##:</td>
    <td>{$grid->width|escape} ##pixels##</td>
  </tr>

  <tr>
    <td class="label">##Grid Height##:</td>
    <td>{$grid->height|escape} ##pixels##</td>
  </tr>

  <tr>
    <td class="label">##Gridline Color##:</td>
    <td><input name="grid_color" size="8" value="{$smarty.request.grid_color|escape}" /> ##(RRGGBB hex digits)##</td>
  </tr>

  <tr>
    <td class="label">##Gridline Transparency##:</td>
    <td><input name="grid_transparency" size="4" value="{$smarty.request.grid_transparency|escape}" />% ##(0-100, 0=opaque, 100=fully transparent)##</td>
  </tr>

  <tr>
    <td class="label">##Background Color##:</td>
    <td><input name="background_color" size="8" value="{$smarty.request.background_color|escape}" /> ##(RRGGBB hex digits)##</td>
  </tr>

  <tr>
    <td class="label">##Background Image##:</td>
    <td>
      {if $smarty.session.image}
      <img src="{url|escape href='/session_image.php'}?x={$smarty.now|escape}" alt="Uploaded Image" />&nbsp;&nbsp;
      <br /><a href="javascript:upload_image('1')">##Replace Image##</a>
      <br /><a href="javascript:upload_image('3')">##Clear Image##</a>
      {else}
      <a href="javascript:upload_image('1')">##Upload Image##</a>
      {/if}
    </td>
  </tr>

  <tr>
    <td class="label">##Show images gallery##:</td>
    <td>{html_options name="images_gallery" selected=$smarty.request.images_gallery options=$images_gallery_options}</td>
  </tr>

  <tr>
    <td class="label">##Price##:</td>
    <td>{$app->setting->currency_symbol}<input name="pixel_price" size="8" value="{$smarty.request.pixel_price|escape}" /> (##Per block of## {$smarty.request.selectable_square_size|escape} x {$smarty.request.selectable_square_size|escape} ##pixels##)</td>
  </tr>

  <tr>
    <td class="label">##Selectable square side size##:</td>
    <td><input name="selectable_square_size" size="8" value="{$smarty.request.selectable_square_size|escape}" />##pixels; size of square side which will be used for region select and price calculation.##</td>
  </tr>

  <tr>
    <td class="label">##Maximum Region Width##:</td>
    <td><input name="region_max_width" size="8" value="{$smarty.request.region_max_width|escape}" /> ##pixels; must be a multiple of## {$smarty.request.selectable_square_size|escape}; ##0=no limit##</td>
  </tr>

  <tr>
    <td class="label">##Maximum Region Height##:</td>
    <td><input name="region_max_height" size="8" value="{$smarty.request.region_max_height|escape}" /> ##pixels; must be a multiple of## {$smarty.request.selectable_square_size|escape}; ##0=no limit##</td>
  </tr>

  <tr>
    <td class="label">##Region Expiration Days##:</td>
    <td><input name="expire_days" size="8" value="{$smarty.request.expire_days|escape}" /> ##0=regions never expire##</td>
  </tr>

  <tr>
    <td class="label">##Region Reminder Days##:</td>
    <td><input name="reminder_days" size="8" value="{$smarty.request.reminder_days|escape}" /> ##days before expiration. 0=do not send reminders.##</td>
  </tr>

  <tr>
    <td class="label">##Region Purge Days##:</td>
    <td><input name="purge_days" size="8" value="{$smarty.request.purge_days|escape}" /> ##days after expiration. 0=do not purge expired regions.##</td>
  </tr>

  <tr>
    <td class="label">##Allow free and paid regions##:</td>
    <td>{html_yesno name="allow_free_paid"}</td>
  </tr>

  <tr>
    <td class="label">##Maximum square for free region##:</td>
    <td><input name="free_square" size="8" value="{$smarty.request.free_square|escape}" />##px##. ## If this value is 0, free regions will not be allowed. Please set price to pixels##</td>
  </tr>

  <tr>
    <td class="label">##Grid Title##:</td>
    <td>{snippet_textfield name="grid_title" size="50"}</td>
  </tr>

  <tr>
    <td class="label">##Buy Button Title##:</td>
    <td>{snippet_textfield name="grid_buy_button" size="50"}</td>
  </tr>

  <tr valign="top">
    <td class="label">##Grid Description##:</td>
    <td>{snippet_textarea name="grid_description" rows="8"}</td>
  </tr>

</table>
<p>
  <input type="hidden" name="action" value="{$smarty.request.action|escape}" />
  <input type="hidden" name="upload_image" value="" />
  {if $smarty.request.action == 'edit'}
    <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  {/if}
  <input name="submit_button" type="submit" value="##Save##" />&nbsp;
{end_form}
{start_form}
  {if $smarty.request.action == 'edit'}
    <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
    <input type="hidden" name="action" value="{$smarty.request.action|escape}" />
    <input type="hidden" name="upload_image" value="" />
    <input type="hidden" name="delete" value="true" />
    <input name="submit_button" type="submit" value="##Delete##" />
  {/if}
{end_form}
</p>

{include file="admin/footer.inc.tpl"}

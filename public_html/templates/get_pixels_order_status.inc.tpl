<div class="indent">
<table>
  {if $smarty.session.payment_controller=="renew"}
  <tr>
    <td class="label">##Renewal Amount##:</td>
    <td>{$app->setting->currency_symbol}{$order_status.amount|number_format:2}</td>
  </tr>
  <tr>
    <td class="label">##Renewal Term##:</td>
    <td>{$grid->expire_days|escape} days (through {$order_status.new_expires_at|escape})</td>
  </tr>
  {else}
  <tr>
    <td class="label">##Your Selection##:</td>
    <td>{snippet|escape name="grid_title" seq=$grid->id}{if $order_status.w}, {$order_status.w|escape} x {$order_status.h|escape} pixels{if $order_status.amount != 0}, {$app->setting->currency_symbol}{$order_status.amount|number_format:2}{/if}{/if}</td>
  </tr>
  {/if}
  {if $smarty.session.image}
  <tr>
    <td class="label">##Your Image##:</td>
    <td><img src="{url|escape href='/session_image.php'}?x={$smarty.now|escape}" alt="Uploaded Image" style="vertical-align: middle" /> (##Actual Size##)</td>
  </tr>
  {/if}
  {if $order_status.url}
  <tr>
    <td class="label">##URL for Your Site##:</td>
    <td>{$order_status.url|escape}</td>
  </tr>
  <tr>
    <td class="label">##Title for Your Pixels##:</td>
    <td>{$order_status.title|escape}</td>
  </tr>
  <tr>
    <td class="label">##Alt Tag Value for Your Pixels##:</td>
    <td>{$order_status.alt|escape}</td>
  </tr>
  {/if}
  {if $order_status.email}
  <tr>
    <td class="label">##Your E-Mail Address##:</td>
    <td>{$order_status.email|escape}</td>
  </tr>
  {/if}
</table>
</div>

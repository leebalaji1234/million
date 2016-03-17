{assign var="page_title" value="##Edit Payment History##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{show_errors}
{start_form}
<table width="100%">

  <tr>
    <td class="label">##Payment ID##:</td>
    <td>{$payment->id|escape}</td>
  </tr>

  <tr>
    <td class="label">##Region ID##:</td>
    <td>{if $payment->_region_deleted}{$payment->region_id|escape} (Deleted){else}<a href="{url href='/admin/edit_region.php'}?id={$payment->region_id|escape}">{$payment->region_id|escape}</a>{/if}</td>
  </tr>

  <tr>
    <td class="label">##Email##:</td>
    <td>{$payment->email|escape}</td>
  </tr>

  <tr>
    <td class="label">##Payment Method##:</td>
    <td>{$payment->payment_method|escape}</td>
  </tr>

  <tr>
    <td class="label">##Amount##:</td>
    <td>{$payment->amount|escape}</td>
  </tr>

  <tr>
    <td class="label">##Completed##?</td>
    <td>{if $payment->is_completed}{$payment->completed_at|escape}{else}##No##{/if}</td>
  </tr>

  <tr>
    <td class="label">##Verified##?</td>
    <td>{if $payment->is_verified}{$payment->verified_at|escape}{else}##No## <input type="checkbox" name="verify" value="1" /> ##Change to 'Verified'##{/if}</td>
  </tr>

  <tr style="vertical-align: top">
    <td class="label">##Verification Variables##:</td>
    <td>{if $payment->verified_vars}<pre>{$payment->verified_vars|escape}</pre>{/if}</td>
  </tr>

  <tr>
    <td class="label">##Error##?</td>
    <td>{if $payment->is_error}##Yes## <input type="checkbox" name="clear_error" value="1" /> ##Clear Error Status##{else}##No##{/if}</td>
  </tr>

  <tr>
    <td class="label">##Transaction ID##:</td>
    <td>{$payment->txn_id|escape}</td>
  </tr>

  <tr style="vertical-align: top">
    <td class="label">##Notes##:</td>
    <td><textarea name="notes" style="width: 100%" rows="8">{$smarty.request.notes|escape}</textarea></td>
  </tr>

</table>

<input type="hidden" name="id" value="{$payment->id|escape}" />
<input type="hidden" name="show" value="{$smarty.request.show}" />

<p>
<input type="submit" value="##Save##" />
</p>
{end_form}

{include file="admin/footer.inc.tpl"}

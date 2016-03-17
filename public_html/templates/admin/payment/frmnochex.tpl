<p>
  <strong>##E-Mail Address##</strong><br />
  ##The e-mail address to use for the NOCHEX service##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_NOCHEX_ID]" value="{$paymod_data.MODULE_PAYMENT_NOCHEX_ID|escape}" size="40" />
</p>
<p>
  <strong>##NOCHEX URL##</strong><br />
  ##The URL for posting to the NOCHEX service##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_NOCHEX_URL]" value="{$paymod_data.MODULE_PAYMENT_NOCHEX_URL|escape}" size="80" />
</p>
<p>
  <strong>##Use APC?##</strong><br />
  ##Use NOCHEX Automatic Payment Confirmation? (Recommended; requires cURL extension)##<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_NOCHEX_USE_APC]" value="1"{if $paymod_data.MODULE_PAYMENT_NOCHEX_USE_APC} checked="checked"{/if} /> Yes
  &nbsp;&nbsp;<input type="radio" name="configuration[MODULE_PAYMENT_NOCHEX_USE_APC]" value="0"{if !$paymod_data.MODULE_PAYMENT_NOCHEX_USE_APC} checked="checked"{/if} /> No<br />
  ##<strong>Note</strong>: If you do not use APC, purchased regions will be set
  to "Pending" status until you verify payment manually.##<br />
</p>
<p>
  <strong>##NOCHEX Verification URL##</strong><br />
  ##The URL for posting APC verification back to NOCHEX##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_NOCHEX_VERIFY_URL]" value="{$paymod_data.MODULE_PAYMENT_NOCHEX_VERIFY_URL|escape}" size="80" />
</p>

<p>
  <strong>##Merchant ID##</strong><br />
  ##Merchant ID to use for the SECPay service##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_SECPAY_MERCHANT_ID]" value="{$paymod_data.MODULE_PAYMENT_SECPAY_MERCHANT_ID|escape}" />
</p>
<p>
  <strong>##SECPay URL##</strong><br />
  ##The URL for posting to the SECPay service##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_SECPAY_URL]" value="{$paymod_data.MODULE_PAYMENT_SECPAY_URL|escape}" size="80" />
</p>
<p>
  <strong>##Currency Code##</strong><br />
  ##SECPay currency code for transaction amounts. Optional; if omitted, default currency is used.##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_SECPAY_CURRENCY]" value="{$paymod_data.MODULE_PAYMENT_SECPAY_CURRENCY|escape}" size="3" />
</p>
<p>
  <strong>##Transaction Mode##</strong><br />
  ##Transaction mode to use for the SECPay service##<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_SECPAY_TEST_STATUS]" value="live"
          {if $paymod_data.MODULE_PAYMENT_SECPAY_TEST_STATUS == 'live'}checked="checked"{/if} /> ##Live Mode##<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_SECPAY_TEST_STATUS]" value="true"
          {if $paymod_data.MODULE_PAYMENT_SECPAY_TEST_STATUS == 'true'}checked="checked"{/if} /> ##Test Mode (Always Successful)##<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_SECPAY_TEST_STATUS]" value="false"
          {if $paymod_data.MODULE_PAYMENT_SECPAY_TEST_STATUS == 'false'}checked="checked"{/if} /> ##Test Mode (Always Fail)##<br />
</p>
<p>
  <strong>##Remote Password##</strong><br />
  ##Remote Password used to authenticate outgoing SECPay post. Optional; if omitted, outgoing authentication token will not be created.##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_SECPAY_REMOTE_PASSWORD]" value="{$paymod_data.MODULE_PAYMENT_SECPAY_REMOTE_PASSWORD|escape}" /><br />
</p>
<p>
  <strong>##Digest Key##</strong><br />
  ##Digest Key used to validate SECPay callback. Optional; if omitted, callback validation will not be performed.##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_SECPAY_DIGEST_KEY]" value="{$paymod_data.MODULE_PAYMENT_SECPAY_DIGEST_KEY|escape}" /><br />
  ##Note: If you do not use a digest key, pixels will be placed in "Pending" status until you manually validate the payment.##<br />
</p>

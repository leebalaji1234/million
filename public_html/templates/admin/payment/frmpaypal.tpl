<p>
  <strong>##E-Mail Address##</strong><br />
  ##The e-mail address to use for the PayPal service##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_PAYPAL_ID]" value="{$paymod_data.MODULE_PAYMENT_PAYPAL_ID|escape}" size="40" />
</p>
<p>
  <strong>##PayPal URL##</strong><br />
  ##The URL for posting to the PayPal service##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_PAYPAL_URL]" value="{$paymod_data.MODULE_PAYMENT_PAYPAL_URL|escape}" size="80" />
</p>
<p>
  <strong>##Use IPN?##</strong><br />
  ##Use PayPal Instant Payment Notification? (Recommended; requires cURL extension)##<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_PAYPAL_USE_IPN]" value="1"{if $paymod_data.MODULE_PAYMENT_PAYPAL_USE_IPN} checked="checked"{/if} /> Yes
  &nbsp;&nbsp;<input type="radio" name="configuration[MODULE_PAYMENT_PAYPAL_USE_IPN]" value="0"{if !$paymod_data.MODULE_PAYMENT_PAYPAL_USE_IPN} checked="checked"{/if} /> No<br />
  ##<strong>Note</strong>: If you do not use IPN, purchased regions will be set
  to "Pending" status until you verify payment manually.##<br />
</p>
<p>
  <strong>##Test IPN?##</strong><br />
  ##For sandbox functionality.##<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_PAYPAL_TEST_IPN]" value="1"{if $paymod_data.MODULE_PAYMENT_PAYPAL_TEST_IPN} checked="checked"{/if} /> Yes
  &nbsp;&nbsp;<input type="radio" name="configuration[MODULE_PAYMENT_PAYPAL_TEST_IPN]" value="0"{if !$paymod_data.MODULE_PAYMENT_PAYPAL_TEST_IPN} checked="checked"{/if} /> No<br />
  ##<strong>Note</strong>: You need to configured sandbox before to use this.##<br />
</p>
<p>
  <strong>##PayPal Verification URL##</strong><br />
  ##The URL for posting IPN verification back to PayPal##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_PAYPAL_VERIFY_URL]" value="{$paymod_data.MODULE_PAYMENT_PAYPAL_VERIFY_URL|escape}" size="80" />
<p>
  <strong>##Currency Code##</strong><br />
  ##Paypal currency code for transaction amounts##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_PAYPAL_CURRENCY]" value="{$paymod_data.MODULE_PAYMENT_PAYPAL_CURRENCY|escape}" size="3" />
</p>

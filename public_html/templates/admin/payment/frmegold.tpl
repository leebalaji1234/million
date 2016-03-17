<p>
  <strong>##E-Gold URL##</strong><br />
  ##The URL for posting to the E-Gold service##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_EGOLD_URL]" value="{$paymod_data.MODULE_PAYMENT_EGOLD_URL|escape}" size="80" />
</p>
<p>
  <strong>##Merchant Account Number##</strong><br />
  ##The number of your account to which payment is to be made.##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_EGOLD_PAYEE_ACCOUNT]" value="{$paymod_data.MODULE_PAYMENT_EGOLD_PAYEE_ACCOUNT|escape}" size="10" />
</p>
<p>
  <strong>##Merchant Account Name##</strong><br />
  ##(optional) The merchant name to be displayed on the E-Gold payment form. If blank, your Site Name will be used.##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_EGOLD_PAYEE_NAME]" value="{$paymod_data.MODULE_PAYMENT_EGOLD_PAYEE_NAME|escape}" size="80" />
</p>
<p>
  <strong>##Payment Units Code##</strong><br />
  ##Payment unit code from the E-gold interface specification.##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_EGOLD_PAYMENT_UNITS]" value="{$paymod_data.MODULE_PAYMENT_EGOLD_PAYMENT_UNITS|escape}" size="5" />
</p>
<p>
  <strong>##Payment Metal ID##</strong><br />
  ##Payment metal ID code from the E-gold interface specification.##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_EGOLD_PAYMENT_METAL_ID]" value="{$paymod_data.MODULE_PAYMENT_EGOLD_PAYMENT_METAL_ID|escape}" size="5" />
</p>
<p>
  <strong>##Alternate Passphrase##</strong><br />
  ##(optional) Passphrase used to compute the V2_HASH field on the status POST from E-Gold. If left blank, the V2_HASH field is not checked.##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_EGOLD_ALTERNATE_PASSPHRASE]" value="{$paymod_data.MODULE_PAYMENT_EGOLD_ALTERNATE_PASSPHRASE|escape}" size="80" />
</p>

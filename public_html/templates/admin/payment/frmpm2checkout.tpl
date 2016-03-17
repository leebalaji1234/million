<p>
  <strong>##Login/Merchant ID##</strong><br />
  ##Login/Merchant ID used for the 2CheckOut service##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_2CHECKOUT_LOGIN]" value="{$paymod_data.MODULE_PAYMENT_2CHECKOUT_LOGIN|escape}" />
</p>
<p>
  <strong>##2Checkout URL##</strong><br />
  ##The URL for posting to the 2Checkout service##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_2CHECKOUT_URL]" value="{$paymod_data.MODULE_PAYMENT_2CHECKOUT_URL|escape}" size="80" />
</p>
<p>
  <strong>##Transaction Mode##</strong><br />
  ##Transaction mode used for the 2Checkout service##<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_2CHECKOUT_TESTMODE]" value="1"
      {if $paymod_data.MODULE_PAYMENT_2CHECKOUT_TESTMODE}checked="checked"{/if} /> ##Test##<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_2CHECKOUT_TESTMODE]" value="0"
      {if !$paymod_data.MODULE_PAYMENT_2CHECKOUT_TESTMODE}checked="checked"{/if} /> ##Production##<br />
</p>
<p>
  <strong>##Product ID##</strong><br />
  ##Product ID for pixel purchases as defined in 2Checkout database##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_2CHECKOUT_C_PROD]" value="{$paymod_data.MODULE_PAYMENT_2CHECKOUT_C_PROD|escape}" size="10" />
</p>
<p>
  <strong>##Product ID Type##</strong><br />
  ##Product ID type for above ID##<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_2CHECKOUT_ID_TYPE]" value="1" {if $paymod_data.MODULE_PAYMENT_2CHECKOUT_ID_TYPE==1}checked="checked"{/if}/>##Vendor Product ID##<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_2CHECKOUT_ID_TYPE]" value="2" {if $paymod_data.MODULE_PAYMENT_2CHECKOUT_ID_TYPE!=1}checked="checked"{/if}/>##Assigned Product ID##<br />
</p>
<p>
  <strong>##Secret Word##</strong><br />
  ##Secret word used to validate MD5 hash on post from 2Checkout. Optional.##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_2CHECKOUT_SECRET_WORD]" value="{$paymod_data.MODULE_PAYMENT_2CHECKOUT_SECRET_WORD|escape}" /><br />
  ##Note: If you do not use a secret word, pixels will be placed in "Pending" status until you manually validate the payment.##<br />
</p>

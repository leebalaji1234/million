<p>
  <strong>##Account Number##</strong><br />
  ##The account number used for the iPayment service##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_IPAYMENT_ID]" value="{$paymod_data.MODULE_PAYMENT_IPAYMENT_ID|escape}" />
</p>
<p>
  <strong>##ipayment.de URL##</strong><br />
  ##The URL for posting to the ipayment.de service. The text <tt>[id]</tt> will be replaced with the Account Number from above when the checkout form is generated.##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_IPAYMENT_URL]" value="{$paymod_data.MODULE_PAYMENT_IPAYMENT_URL|escape}" size="80" />
</p>
<p>
  <strong>##User ID##</strong><br />
  ##The user ID for the iPayment service##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_IPAYMENT_USER_ID]" value="{$paymod_data.MODULE_PAYMENT_IPAYMENT_USER_ID|escape}" />
</p>
<p>
  <strong>##User Password##</strong><br />
  ##The user password for the iPayment service##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_IPAYMENT_PASSWORD]" value="{$paymod_data.MODULE_PAYMENT_IPAYMENT_PASSWORD|escape}" />
</p>
<p>
  <strong>##Transaction Currency##</strong><br />
  ##The currency to use for credit card transactions##<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_IPAYMENT_CURRENCY]" value="Always EUR"
      {if $paymod_data.MODULE_PAYMENT_IPAYMENT_CURRENCY == 'Always EUR'}CHECKED{/if} /> Always EUR<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_IPAYMENT_CURRENCY]" value="Always USD"
      {if $paymod_data.MODULE_PAYMENT_IPAYMENT_CURRENCY == 'Always USD'}CHECKED{/if} /> Always USD<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_IPAYMENT_CURRENCY]" value="Either EUR or USD, else EUR" 
      {if $paymod_data.MODULE_PAYMENT_IPAYMENT_CURRENCY == "Either EUR or USD, else EUR"}CHECKED{/if} /> Either EUR or USD, else EUR<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_IPAYMENT_CURRENCY]" value="Either EUR or USD, else USD"
      {if $paymod_data.MODULE_PAYMENT_IPAYMENT_CURRENCY == 'Either EUR or USD, else USD'}CHECKED{/if} /> Either EUR or USD, else USD
</p>

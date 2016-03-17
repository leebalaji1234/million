<p>
  <strong>##Merchant ID##</strong><br />
  ##Merchant ID used for the PSiGate service##
  <br />
  <input type="text" name="configuration[MODULE_PAYMENT_PSIGATE_MERCHANT_ID]" value="{$paymod_data.MODULE_PAYMENT_PSIGATE_MERCHANT_ID|escape}" />
</p>
<p>
  <strong>##PSiGate URL##</strong><br />
  ##The URL for posting to the PSiGate service##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_PSIGATE_URL]" value="{$paymod_data.MODULE_PAYMENT_PSIGATE_URL|escape}" size="80" />
</p>
<p>			
  <strong>##Transaction Currency##</strong><br />
  ##The currency to use for credit card transactions##
  <br />
  <input type="radio" name="configuration[MODULE_PAYMENT_PSIGATE_CURRENCY]" value="CAD"
  {if $paymod_data.MODULE_PAYMENT_PSIGATE_CURRENCY == 'CAD'}checked="checked"{/if} /> CAD<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_PSIGATE_CURRENCY]" value="USD" 
  {if $paymod_data.MODULE_PAYMENT_PSIGATE_CURRENCY == 'USD'}checked="checked"{/if} /> USD
</p>

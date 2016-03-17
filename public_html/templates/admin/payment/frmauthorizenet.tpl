<p>
  <strong>##Login Username##</strong><br />
  ##The login username used for the Authorize.net service##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_AUTHORIZENET_LOGIN]" value="{$paymod_data.MODULE_PAYMENT_AUTHORIZENET_LOGIN|escape}" />
</p>
<p>
  <strong>##Transaction Key##</strong><br />
  ##Transaction Key used for encrypting TP data##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_AUTHORIZENET_TXNKEY]" value="{$paymod_data.MODULE_PAYMENT_AUTHORIZENET_TXNKEY|escape}" />
</p>
<p>
  <strong>##Currency Code##</strong><br />
  ##Currency code for transaction amounts##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_AUTHORIZENET_CURRENCY]" value="{$paymod_data.MODULE_PAYMENT_AUTHORIZENET_CURRENCY|escape}" size="3" />
</p>
<p>
  <strong>##Authorize.Net URL##</strong><br />
  ##The URL for posting to the Authorize.Net gateway##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_AUTHORIZENET_URL]" value="{$paymod_data.MODULE_PAYMENT_AUTHORIZENET_URL|escape}" size="80" />
</p>
<p>
  <strong>##MD5 Key##</strong><br />
  ##MD5 Key used to create hash on Relay Response. As defined in your Authorize.Net merchant account settings. Recommended. If blank, MD5 hash will not be checked for authenticity.##<br />
  <input type="text" name="configuration[MODULE_PAYMENT_AUTHORIZENET_MD5_KEY]" value="{$paymod_data.MODULE_PAYMENT_AUTHORIZENET_MD5_KEY|escape}" size="20" />
</p>
<p>
  <strong>##Transaction Mode##</strong><br />
  ##Transaction mode used for processing orders##<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_AUTHORIZENET_TESTMODE]" value="Test"
              {if $paymod_data.MODULE_PAYMENT_AUTHORIZENET_TESTMODE== 'Test'}checked{/if} /> Test<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_AUTHORIZENET_TESTMODE]" value="Production"
              {if $paymod_data.MODULE_PAYMENT_AUTHORIZENET_TESTMODE == 'Production'}checked{/if} /> Production
</p>

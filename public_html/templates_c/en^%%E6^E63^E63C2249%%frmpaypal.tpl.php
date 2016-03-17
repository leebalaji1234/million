<?php /* Smarty version 2.6.12, created on 2016-03-16 00:28:20
         compiled from admin/payment/frmpaypal.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/payment/frmpaypal.tpl', 4, false),)), $this); ?>
<p>
  <strong>E-Mail Address</strong><br />
  The e-mail address to use for the PayPal service<br />
  <input type="text" name="configuration[MODULE_PAYMENT_PAYPAL_ID]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['paymod_data']['MODULE_PAYMENT_PAYPAL_ID'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="40" />
</p>
<p>
  <strong>PayPal URL</strong><br />
  The URL for posting to the PayPal service<br />
  <input type="text" name="configuration[MODULE_PAYMENT_PAYPAL_URL]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['paymod_data']['MODULE_PAYMENT_PAYPAL_URL'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="80" />
</p>
<p>
  <strong>Use IPN?</strong><br />
  Use PayPal Instant Payment Notification? (Recommended; requires cURL extension)<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_PAYPAL_USE_IPN]" value="1"<?php if ($this->_tpl_vars['paymod_data']['MODULE_PAYMENT_PAYPAL_USE_IPN']): ?> checked="checked"<?php endif; ?> /> Yes
  &nbsp;&nbsp;<input type="radio" name="configuration[MODULE_PAYMENT_PAYPAL_USE_IPN]" value="0"<?php if (! $this->_tpl_vars['paymod_data']['MODULE_PAYMENT_PAYPAL_USE_IPN']): ?> checked="checked"<?php endif; ?> /> No<br />
  <strong>Note</strong>: If you do not use IPN, purchased regions will be set
  to "Pending" status until you verify payment manually.<br />
</p>
<p>
  <strong>Test IPN?</strong><br />
  For sandbox functionality.<br />
  <input type="radio" name="configuration[MODULE_PAYMENT_PAYPAL_TEST_IPN]" value="1"<?php if ($this->_tpl_vars['paymod_data']['MODULE_PAYMENT_PAYPAL_TEST_IPN']): ?> checked="checked"<?php endif; ?> /> Yes
  &nbsp;&nbsp;<input type="radio" name="configuration[MODULE_PAYMENT_PAYPAL_TEST_IPN]" value="0"<?php if (! $this->_tpl_vars['paymod_data']['MODULE_PAYMENT_PAYPAL_TEST_IPN']): ?> checked="checked"<?php endif; ?> /> No<br />
  <strong>Note</strong>: You need to configured sandbox before to use this.<br />
</p>
<p>
  <strong>PayPal Verification URL</strong><br />
  The URL for posting IPN verification back to PayPal<br />
  <input type="text" name="configuration[MODULE_PAYMENT_PAYPAL_VERIFY_URL]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['paymod_data']['MODULE_PAYMENT_PAYPAL_VERIFY_URL'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="80" />
<p>
  <strong>Currency Code</strong><br />
  Paypal currency code for transaction amounts<br />
  <input type="text" name="configuration[MODULE_PAYMENT_PAYPAL_CURRENCY]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['paymod_data']['MODULE_PAYMENT_PAYPAL_CURRENCY'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="3" />
</p>
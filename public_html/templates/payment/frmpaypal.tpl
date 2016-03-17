<p>
  <img src="{url|escape href='images/PayPal_mark_60x38.gif'}" border="0" width="60" height="38" alt="PayPal" />
</p>
<blockquote>
{start_form action=$module->action|escape}
{foreach key=name item=item from=$module->hidden}
<input type="hidden" name="{$name|escape}" value="{$item|escape}" />
{/foreach}
<p>
  <input type="submit" value="##Pay with## {$module->name|escape} &gt;&gt;" />
</p>
{end_form}
</blockquote>

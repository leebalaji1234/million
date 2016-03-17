<p>
  <img src="{url|escape href='images/e-gold_logo.gif'}" border="0" width="88" height="33" alt="E-Gold" />
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

<h2>{snippet|escape name="offline_payment_title"}</h2>
<blockquote>
{if $smarty.request.module_key==$module->module_key}{show_errors}{/if}
{start_form}
{foreach key=name item=item from=$module->hidden}
<input type="hidden" name="{$name|escape}" value="{$item|escape}" />
{/foreach}
{snippet name="offline_payment_description"}
<p>
  <input type="submit" value="##Pay with## {snippet|escape name="offline_payment_title"} &gt;&gt;" />
</p>
{end_form}
</blockquote>

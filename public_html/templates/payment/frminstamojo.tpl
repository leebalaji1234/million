<p>
  <img src="{url|escape href='images/instamojo.png'}" border="0"   alt="InstaMojo" />
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

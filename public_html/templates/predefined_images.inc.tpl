
<div class="tabber">

  {foreach key=dir item=image_list from=$predefined_images}
  <div class="tabbertab" title="{$dir|escape}">
    <h3>{$dir|escape}</h3>
    {foreach item=image_url from=$image_list}
    <a href="#" onclick="select_image('{$image_url|escape}'); return false"><img src="{url|escape href="/$image_url"}" style="margin: 3px" alt="" border="0" /></a>
    {/foreach}
  </div>
  {/foreach}

</div>

<input type="hidden" name="predefined_image" value="" />

{literal}
<script type="text/javascript">
function select_image(img)
{
  var f = document.forms[0];
  f.predefined_image.value = img;
  f.submit();
}
</script>
{/literal}

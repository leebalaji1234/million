{assign var="page_title" value="##Send Newsletter##"}
{include file="admin/header.inc.tpl"}

{literal}
<script type="text/javascript">
function merge_addresses(type)
{
  var f = document.forms[0];
  f.merge_addresses.value = type;
  f.submit();
}
</script>
{/literal}

<h1>{$page_title|escape}</h1>

{show_errors}
{start_form}
<table>

  <tr>
    <td class="label">##Newsletter to Send##:</td>
    <td colspan="2">{html_options name="id" options=$newsletters}</td>
  </tr>

  <tr>
    <td class="label">##E-Mail Address(es)##:<br />##(one address per line)##</td>
    <td width="1%"><textarea name="addr" cols="40" rows="10">{$smarty.request.addr|escape}</textarea></td>
    <td>
      ##Merge Addresses:##<br />
      <a href="javascript:merge_addresses('pixels')">##Pixel Owners##</a><br />
      {if $app->setting->user_accounts}<a href="javascript:merge_addresses('users')">##Users##</a><br />{/if}
      <a href="javascript:merge_addresses('admin')">##Administrator E-Mail##</a><br />
    </td>
  </tr>

</table>
<p>
  <input type="hidden" name="merge_addresses" value="" />
  <input type="submit" name="submit_button" value="##Send Newsletter##" />
</p>
{end_form}

{include file="admin/footer.inc.tpl"}

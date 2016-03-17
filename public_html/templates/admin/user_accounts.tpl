{assign var="page_title" value="##User Accounts##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<table class="grid">

  <tr>
    <th>##Id##</th>
    <th>##Last Name##</th>
    <th>##First Name##</th>
    <th>##E-Mail Address##</th>
    <th>##Date Created##</th>
  </tr>

  {foreach item=user from=$users}
  <tr>
    <td><a href="{url|escape}?id={$user->id|escape}">{$user->id|escape}</a></td>
    <td>{$user->last_name|escape}</td>
    <td>{$user->first_name|escape}</td>
    <td>{$user->email|escape}</td>
    <td>{$user->created_at|escape}</td>
  </tr>
  {/foreach}

</table>

{include file="admin/footer.inc.tpl"}

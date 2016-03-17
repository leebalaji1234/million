{assign var="page_title" value="##'Link to Us' Configuration##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{show_errors}
{start_form enctype="multipart/form-data"}

<table>

  <tr>
    <td colspan="2"><h2>##Feature Status##</h2></td>
  </tr>

  <tr>
    <td colspan="2"><p>##If you enable the 'Link to Us' feature, a link is
    added to the site toolbar that shows a page containing banners and/or links
    that other sites can use to link to your pixel site.##</p></td>
  </tr>

  <tr>
    <td class="label">##'Link to Us' feature enabled?##</td>
    <td>{html_yesno name="link_to_us_enabled"}</td>
  </tr>

  <tr>
    <td colspan="2"><h2>##Banners##</h2></td>
  </tr>

  {foreach item=banner from=$banners}
  {assign var=id value=$banner->id}
  <tr>
    <td class="label">##Image##</td>
    <td><img src="{$banner->image_url()}" alt="banner"></td>
  </tr>
  <tr>
    <td class="label">##Example##</td>
    <td>
      {$banner->replace_parameters()}
      &nbsp; <input type="checkbox" name="banner_delete[{$id|escape}]" /> ##Delete this banner##
    </td>
  </tr>


  <tr>
    <td class="label">##HTML Code##</td>
    <td><textarea cols="50" rows="3" name="banner_html[{$id|escape}]">{$smarty.request.banner_html.$id|escape}</textarea></td>
  </tr>

  <tr> <td>&nbsp;</td> <td><hr /></td> </tr>
  {/foreach}
 
  <tr>
    <td class="label">##Upload New Banner##</td>
    <td><input type="file" name="banner_file_new" size="50" />
  </tr>
 
  <tr>
    <td class="label">##HTML Code##<br />##(optional)##</td>
    <td><textarea cols="50" rows="3" name="banner_html_new">{$smarty.request.banner_html_new|escape}</textarea>
<br />##Allowed parameters: [site_name], [site_url], [banner_url]##</td>
  </tr>

  <tr>
    <td colspan="2"><h2>##Links##</h2></td>
  </tr>

  {foreach item=link from=$links}
  {assign var=id value=$link->id}
  <tr>
    <td class="label">##Example##</td>
    <td>
      {$link->replace_parameters()}
      &nbsp; <input type="checkbox" name="link_delete[{$id|escape}]" /> ##Delete this link##
    </td>
  </tr>

  <tr>
    <td class="label">##HTML Code##</td>
    <td><textarea cols="50" rows="3" name="link_html[{$id|escape}]">{$smarty.request.link_html.$id|escape}</textarea></td>
  </tr>

  <tr> <td>&nbsp;</td> <td><hr /></td> </tr>
  {/foreach}

  <tr>
    <td class="label">##New Link##<br />##HTML Code##</td>
    <td><textarea cols="50" rows="3" name="link_html_new">{$smarty.request.link_html_new|escape}</textarea>
<br />##Allowed parameters: [site_name], [site_url]##</td>
  </tr>

</table>

<p><input type="submit" value="##Save##" /></p>

{end_form}

{include file="admin/footer.inc.tpl"}
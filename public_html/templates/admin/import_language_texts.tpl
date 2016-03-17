{assign var="page_title" value="##Import Language Texts##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{if empty($ids)}

<p>##No language XML files were found in## <tt>{$smarty.const.TEMP_DIR}</tt>.
##You need to export a language using## <a href="{url
href="/admin/export_language_texts.php}">##Export Lanugage Texts##</a>
##first##.</p>

{else}

<p>##This function will import a previously-exported language texts XML file
that has had translations added.##</p>

<p>##Only## <tt>&lt;text&gt;</tt> ##elements with non-empty comment will be
imported.  The English text enclosed in XML comments will be ignored##.</p>

<p>##Only languages for which XML files exist in the##
<tt>{$smarty.const.TEMP_DIR}</tt> ##directory are shown##.</p>

<p class="boxed">##<strong>Note:</strong> Due to limitations of the
PHP XML parser, the XML file <strong>must</strong> be in UTF-8 encoding.##</p>

{show_errors}
{start_form}
<table>
  <tr>
    <td class="label">##Langage to Import##:</td>
    <td>{html_radios name="id" options=$ids selected=$smarty.request.id}</td>
  </tr>
</table>

<p>
  <input type="submit" value="##Import Texts##" />
</p>
{end_form}

{/if}

{include file="admin/footer.inc.tpl"}

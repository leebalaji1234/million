{assign var="page_title" value="##Export Language Texts##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{if empty($ids)}
<p>##No languages were found to export. You must create a language with##
<a href="{url|escape href="/admin/maintain_languages.php"}">##Maintain Languages##</a>
##first##.</p>
{else}

<p>(##You should run## <a href="{url|escape href="/admin/update_language_texts.php"}">
##Update Language Texts##</a> ##first if you haven't already done so.##)</p>

<p>##This function will export texts for one language to an XML file to your
application's "temp" directory##:</p>

<p class="indent"><tt>{$smarty.const.TEMP_DIR}</tt></p>

<p>##You may export all texts, or only those texts that do not have a
translation yet. After making translations, you can re-import the file with##
<a href="{url|escape href="/admin/import_language_texts.php"}">##Import Language
Texts##</a>.</p>

<p>##Texts that do not have a translation will be written to the XML file as
the English text enclosed in an XML comment## <tt>(&lt;!-- ...  --&gt;)</tt>.
##Add your translation after the comment (but inside the## <tt>&lt;text&gt;</tt>
##element). You should only remove the comment marks if you wish to use the
English text verbatim as the translation text. Do not remove or change the##
<tt>&lt;digest="..."&lt;</tt> ##attribute##.</p>

{show_errors}
{start_form}
<table>
  <tr>
    <td class="label">##Langage to Export##:</td>
    <td>{html_radios name="id" options=$ids selected=$smarty.request.id}</td>
  </tr>
  <tr>
    <td class="label">##Texts to Include##:</td>
    <td>{html_radios name="type" options=$types selected=$smarty.request.type}</td>
  </tr>
</table>

<p>
  <input type="submit" value="##Export Texts##" />
</p>
{end_form}

{/if}

{include file="admin/footer.inc.tpl"}

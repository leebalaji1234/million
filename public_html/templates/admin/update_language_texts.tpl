{assign var="page_title" value="##Update Language Texts##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##This function will scan templates and PHP source code, looking
for multi-language texts enclosed in pairs of hash marks like this:##</p>

<p class="indent"><tt>&#x23;&#x23;English Text&#x23;&#x23;</tt></p>

<p>##The following directories will be searched##:</p>

<ul>
  {section name=dir loop=$dirs}
  <li><tt>{$dirs[dir]|escape}</tt></li>
  {/section}
</ul>

<p>##Each text found will be added to the database if it is not already there.##</p>

<p>##You should run this function after making any changes to the templates or
the application source code, or after an application upgrade. It is safe to
run this at any time.##</p>

{start_form}
  <input type="submit" value="##Update Language Texts Now##" />
{end_form}

{include file="admin/footer.inc.tpl"}

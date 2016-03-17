{assign var="page_title" value="##General Settings##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{show_errors}
{start_form}

<table>

  <tr>
    <td class="label">##Site Name##:</td>
    <td><input name="site_name" size="50" value="{$smarty.request.site_name|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Site Description##:</td>
    <td><textarea name="site_description" style="width: 100%" rows="3">{$smarty.request.site_description|escape}</textarea></td>
  </tr>

  <tr>
    <td class="label">##Currency Symbol##:</td>
    <td><input name="currency_symbol" size="3" value="{$smarty.request.currency_symbol|escape}" /></td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">##Use User Accounts?##</td>
    <td>{html_yesno name="user_accounts"}</td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">##Region Approval Required?##</td>
    <td>{html_yesno name="approval_required"}</td>
  </tr>

  <tr>
    <td class="label">##Administrator E-Mail Address##:</td>
    <td><input name="admin_email" size="80" value="{$smarty.request.admin_email|escape}" /></td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">##Email Format##:</td>
    <td>{html_yesno name="html_email" yes="##HTML##" no="##Plain Text##"}</td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">##Use FCKeditor##?</td>
    <td>{html_yesno name="use_fckeditor"}</td>
  </tr>

  <tr>
    <td class="label">##Secret Key##:</td>
    <td><input name="secret" size="30" value="{$smarty.request.secret|escape}" /></td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">##Create Interlaced Images##?</td>
    <td>{html_yesno name="interlaced_images"}</td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">##Allow upload images##?</td>
    <td>{html_yesno name="upload_images"}</td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">##Create Palette Images##?</td>
    <td>{html_yesno name="palette_images"}</td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">##Allow Blog Comments##?</td>
    <td>{html_yesno name="blog_comments"}</td>
  </tr>

  {if !$captchas_supported}
  <tr style="vertical-align: baseline">
    <td class="label">&nbsp;</td>
    <td><span class="error">Warning: CAPTCHA's in blog comments not supported (required FreeType support in PHP)</span></td>
  </tr>
  {/if}

  <tr style="vertical-align: baseline">
    <td class="label">##Show Grids As##:</td>
    <td>{html_yesno name="multiple_grid_pages" yes="##Multiple Pages (one grid per page)##" no="##Single Page (all grids on one page)##"}</td>
  </tr>

  <tr>
    <td class="label">##Grid Columns##:</td>
    <td><input name="grid_columns" size="3" value="{$smarty.request.grid_columns|escape}" /> ##(Applies only when all grids are on one page)##</td>
  </tr>

  <tr>
    <td class="label">##RSS Latest Pixels Feed Size##:</td>
    <td><input name="rss_latest_pixels" size="3" value="{$smarty.request.rss_latest_pixels|escape}" /> ##(0 to disable this feed)##</td>
  </tr>

  <tr>
    <td class="label">##RSS Top Pixels Feed Size##:</td>
    <td><input name="rss_top_pixels" size="3" value="{$smarty.request.rss_top_pixels|escape}" /> ##(0 to disable this feed)##</td>
  </tr>

  <tr>
    <td class="label">##RSS Blog Articles Feed Size##:</td>
    <td><input name="rss_blog_articles" size="3" value="{$smarty.request.rss_blog_articles|escape}" /> ##(0 to disable this feed)##</td>
  </tr>

	<tr style="vertical-align: baseline">
		<td class="label">##Link structure (SEO):##</td>
		<td>{html_options name=seo_status options=$seo_optimization	selected=$smarty.request.seo_status}</td>
	</tr>

	<tr style="vertical-align: baseline">
    <td class="label">##Show 'Clicks' Column in Pixel List##?</td>
    <td>{html_yesno name="pixel_list_by_clicks"}</td>
  </tr>

	<tr style="vertical-align: baseline">
    <td class="label">##Show 'Images' Column in Pixel List##?</td>
    <td>{html_yesno name="pixel_list_enable_images"}</td>
  </tr>

	<tr style="vertical-align: baseline">
		<td class="label">##Sort order for image galleries:##</td>
		<td>{html_options name="order_image_galleries" options=$order_image_galleries	selected=$smarty.request.order_image_galleries}</td>
	</tr>

</table>

<p><input type="submit" value="##Save##" /></p>

{end_form}


{include file="admin/footer.inc.tpl"}

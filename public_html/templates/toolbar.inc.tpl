<div class="toolbar">
  <table width="100%">
    <tr>
      <td>
        <a href="{url|escape href='/index.php'}">##Home##</a>
        &nbsp;&nbsp;
        <a href="{url|escape href='/get_pixels.php'}">##Get Pixels##</a>
        &nbsp;&nbsp;
        <a href="{url|escape href='/pixel_list.php'}">##Pixel List##</a>
        &nbsp;&nbsp;
        <a href="{url|escape href='/tell_a_friend.php'}">##Tell a Friend##</a>
        &nbsp;&nbsp;
        {if $app->setting->link_to_us_enabled}
        <a href="{url|escape href='/link_to_us.php'}">##Link to Us##</a>
        &nbsp;&nbsp;
        {/if}
        <a href="{url|escape href='/blog.php'}">##Blog##</a>
        {if $app->setting->rss_feeds_enabled()}
        &nbsp;&nbsp;
        <a href="{url|escape href='/rss.php'}">##RSS##</a>
        {/if}
      </td>
      <td align="right">
        {if $app->setting->user_accounts}
          {if $smarty.session.user_id}
            Welcome, <strong>{$smarty.session.first_name} {$smarty.session.last_name}</strong>
            &nbsp;&nbsp;
            <a href="{url|escape href='/account.php'}">##Your Account##</a>
            &nbsp;&nbsp;
            <a href="{url|escape href='/logout.php'}">##Log Out##</a>
            &nbsp;&nbsp;
          {else}
            <a href="{url|escape href='/login.php'}">##Log In##</a>
            &nbsp;&nbsp;
            <a href="{url|escape href='/signup.php'}">##Create Account##</a>
            &nbsp;&nbsp;
          {/if}
        {/if}
        {language_selector}
      </td>
    </tr>
  </table>
</div>

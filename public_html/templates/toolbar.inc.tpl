<div class="toolbar">
  <table width="100%">
    <tr>
      <td>
        <a href="{url|escape href='/index.php'}">##Home##</a>
        &nbsp;&nbsp;
        <a href="{url|escape href='/get_pixels.php'}">##Become Sponsor##</a>
        &nbsp;&nbsp;
        <a href="{url|escape href='/drawings.php'}">##Drawings##</a>
         
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

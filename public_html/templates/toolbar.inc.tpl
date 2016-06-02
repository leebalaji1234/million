<div class="section">
  <div class="navbar navbar-default navbar-fixed-top" style="-webkit-box-shadow:inset 22px 22px 22px 22px #FC3059;
box-shadow:inset 22px 22px 22px 22px #ffffff;">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="padding:3px;"><img height="50" alt="Brand" src="images/million2.jpg"></a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li >
                <a href="{url|escape href='/index.php'}"><i class="fa fa-home"></i></a>
              </li>
              <li class="active">
                <a href="get_pixels.php?step=2">Become Sponsor !</a>
              </li>
              <li>
                <a href="{url|escape href='/drawings.php'}">Drawings</a>
              </li>
               <li {if pagename == 'volunteer'} class="active" {/if}>
                <a href="{url|escape href='/volunteer.php'}">Volunteers</a>
              </li>
              {if $app->setting->user_accounts}
                {if $smarty.session.user_id}
                <li> <a href="{url|escape href='/account.php'}">Welcome,  {$smarty.session.first_name} {$smarty.session.last_name} </a>
                </li>
               <!--  <li>
                <a href="{url|escape href='/account.php'}">##Your Account##</a>
                </li> -->
                <li>
                <a href="{url|escape href='/logout.php'}">##Log Out##</a>
                </li>
              {else}
                <li><a href="{url|escape href='/login.php'}">##Log In##</a> </li>
                
                <li><a href="{url|escape href='/signup.php'}">##Register##</a></li>
                
                {/if}
              {/if} 
            </ul>
          </div>
        </div>
  </div> 

</div> 
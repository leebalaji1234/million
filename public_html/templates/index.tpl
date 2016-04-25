{assign var="meta_description" value=$app->setting->site_description}
{if $smarty.session.magnify}{assign var="scripts" value='/tjpzoom.js'}{/if}
{include file='header.inc.tpl'}

<div class="section">
  <div class="row" >
     
<div class="col-md-12 label label-info text-muted toolinfo" style="font-weight:bold;padding-right:0px;">
{if $links}
{foreach item=link from=$links}
{$link}&nbsp;&nbsp;&nbsp;
{/foreach}
{/if}
##Pixels Sold##: {$pixels_used|number_format|escape} ##Available##: {$pixels_avail|number_format|escape}&nbsp;&nbsp;{if $smarty.session.magnify}<a class="btn btn-default" href="index.php?magnify=0{if $smarty.request.grid>1}&amp;grid={$smarty.request.grid|escape}{/if}"><i class="fa fa-1x fa-search-minus"></i></a>{else}<a class="btn btn-default" href="index.php?magnify=1{if $smarty.request.grid>1}&amp;grid={$smarty.request.grid|escape}{/if}"><i class="fa fa-1x fa-search-plus"></i></a>{/if}
</div>
<!-- pixel board starts here -->
  <div class="col-md-10 pixelboard">
 
{foreach item=grids from=$rows}
 
{foreach item=grid from=$grids}
 
	{if !$smarty.session.magnify}
  <map name="grid_{$grid->id}">{$grid->map()}</map>
  {/if}
  <!-- float: left -->
	<div style=""{if $smarty.session.magnify} onmouseover="zoom_on(event,{$grid->width|escape},{$grid->height|escape},'{$grid->url()|escape}');" onmousemove="zoom_move(event);" onmouseout="zoom_off();"{/if}><img class="img-responsive" width="100%" src="{$grid->url()|escape}" usemap="#grid_{$grid->id}"   alt="" border="0" /></div><div style="clear: both"></div>

  <!--  <div style="float: left"{if $smarty.session.magnify} onmouseover="zoom_on(event,{$grid->width|escape},{$grid->height|escape},'{$grid->url()|escape}');" onmousemove="zoom_move(event);" onmouseout="zoom_off();"{/if}><img   src="{$grid->url()|escape}" usemap="#grid_{$grid->id}" width="{$grid->width|escape}" height="{$grid->height|escape}" alt="" border="0" /></div><div style="clear: both"></div> --> 
 
{/foreach}
 
{/foreach}
</div>
<!-- pixel board ends here -->
 
<!-- twitter page starts here-->
  
<div class="col-md-2  feedswidget" style="display:none;padding-left:0px;">
  <div class="panel panel-primary" style="height:1068px;overflow-y:auto;">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <i class="fa fa-fw fa-twitter"></i>Sponsor Feeds</h3>
              </div>
              <div class="panel-body">
                <div id="tweecool"></div>
              </div>
 </div>
</div>
 <!-- twitter page ends here -->


 <!-- top drawings starts here -->
  
      <div class="container">
        <div class="row" id="drawings">
          <div class="col-md-12">
            <h2 class="text-center text-primary">Top Drawings</h2>
            <p class="text-center">Most likes by peoples.</p>
          </div>
        </div>
        <div class="row">
       
          {foreach item=d from=$alldrawings}
          <div class="col-md-2">
           <a href="drawing.php?id={$d->id|escape}"> <img src="{$d->drawing_image|escape}" class="center-block img-circle img-responsive">
            <h3 class="text-center">{$d->title|escape}</h3>
          </a>
            <!-- <p class="text-center">View</a></p> -->
          </div> 
          {/foreach}
        </div>
     </div>
     
    <!-- top drawings -->

 <!-- top sponsors starts here -->
  
      <div class="container">
        <div class="row" id="sponsors">
          <div class="col-md-12">
            <h2 class="text-center text-primary">Top Sponsors</h2>
            <p class="text-center">Most sponsored.</p>
          </div>
        </div>
        <div class="row">
       
          {foreach item=d from=$alldrawings}
          <div class="col-md-2">
            <img src="http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png" class="center-block img-circle img-responsive" class="center-block img-circle img-responsive">
            <h3 class="text-center">{$d->title|escape}</h3>
           
            <!-- <p class="text-center">View</a></p> -->
          </div> 
          {/foreach}
        </div>
     </div>
     
    <!-- top sponsors -->

 <!-- top volunteers starts here -->
  
      <div class="container">
        <div class="row" id="volunteers">
          <div class="col-md-12">
            <h2 class="text-center text-primary">Top Volunteers</h2>
            <p class="text-center">Most entrants referred.</p>
          </div>
        </div>
        <div class="row">
       
          {foreach item=v from=$allvolunteers}
          <div class="col-md-2">
            <img src="http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png" class="center-block img-circle img-responsive">
            <h3 class="text-center">{$v->name|escape}</h3>
             <p class="text-center">MDD{$v->id|escape}</p> 
          </div> 
          {/foreach}
        </div>
     </div>
     
    <!-- top volunteers -->


 </div> 
<!-- row ends -->
</div>
{include file='wz_tooltip.inc.tpl'}
{include file='footer.inc.tpl'}

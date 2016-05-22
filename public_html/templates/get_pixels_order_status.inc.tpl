<div class="panel panel-default">
              <div class="panel-heading">
                <span class="text-primary"> <strong>Current Order Status</strong> </span>
              </div>
              <div class="panel-body">
{if $smarty.session.payment_controller!="renew"}
<h5 class="text-info">{snippet|escape name="grid_title" seq=$grid->id}</h5> 
<p class="text-danger">Current Selection : <strong>{if $order_status.w} {$order_status.w|escape} x {$order_status.h|escape} pixels{if $order_status.amount != 0}, Price  : {$app->setting->currency_symbol}{$order_status.amount|number_format:2}{/if}{/if}
      {if $inramount} | <i class="fa fa-inr"></i> {$inramount}{/if}</strong></p>
{/if}

{if $order_status.url}
<div class="col-sm-3"> 
  <div class="form-group">
   <h5 class="text-danger">##Site URL## </h5> 
  <h5 class="text-primary">{$order_status.url|escape} </h5> 
  </div>
 </div>  
 <div class="col-sm-3"> 
  <div class="form-group">
   <h5 class="text-danger">##Title## </h5> 
  <h5 class="text-primary">{$order_status.title|escape}</h5> 
  </div>
 </div> 
 <div class="col-sm-3"> 
  <div class="form-group">
   <h5 class="text-danger">##Mouseover Text## </h5> 
  <h5 class="text-primary">{$order_status.alt|escape}</h5> 
  </div>
 </div>  
  {/if}
  {if $order_status.email}
  <div class="col-sm-3"> 
  <div class="form-group">
   <h5 class="text-danger">##Email## </h5> 
  <h5 class="text-primary">{$order_status.email|escape}</h5> 
  </div>
 </div> 
   
  {/if}
{if $smarty.session.image}
<div class="col-sm-12"> 
<div class="form-group">
   <h5 class="text-danger">Image </h5>
   <img src="{url|escape href='/session_image.php'}?x={$smarty.now|escape}" alt="Uploaded Image" style="vertical-align: middle" /> (##Actual Size##) 
</div>
</div>
{/if}
<!-- <p class="text-right"><button class="btn btn-primary" onclick="window.history.back();">Back</button></p> -->

<!-- 

<div class="indent">
<table>
  {if $smarty.session.payment_controller=="renew"}
  <tr>
    <td class="label">##Renewal Amount##:</td>
    <td>{$app->setting->currency_symbol}{$order_status.amount|number_format:2}</td>
  </tr>
  <tr>
    <td class="label">##Renewal Term##:</td>
    <td>{$grid->expire_days|escape} days (through {$order_status.new_expires_at|escape})</td>
  </tr>
  {else}
  <tr>
    <td class="label">##Your Selection##:</td>
    <td>{snippet|escape name="grid_title" seq=$grid->id}{if $order_status.w}, {$order_status.w|escape} x {$order_status.h|escape} pixels{if $order_status.amount != 0}, {$app->setting->currency_symbol}{$order_status.amount|number_format:2}{/if}{/if}
      {if $inramount}<i class="fa fa-inr"></i> {$inramount}{/if}
    </td>
  </tr>
  {/if}
  {if $smarty.session.image}
  <tr>
    <td class="label">##Your Image##:</td>
    <td><img src="{url|escape href='/session_image.php'}?x={$smarty.now|escape}" alt="Uploaded Image" style="vertical-align: middle" /> (##Actual Size##)</td>
  </tr>
  {/if}
  {if $order_status.url}
  <tr>
    <td class="label">##URL for Your Site##:</td>
    <td>{$order_status.url|escape}</td>
  </tr>
  <tr>
    <td class="label">##Title for Your Pixels##:</td>
    <td>{$order_status.title|escape}</td>
  </tr>
  <tr>
    <td class="label">##Alt Tag Value for Your Pixels##:</td>
    <td>{$order_status.alt|escape}</td>
  </tr>
  {/if}
  {if $order_status.email}
  <tr>
    <td class="label">##Your E-Mail Address##:</td>
    <td>{$order_status.email|escape}</td>
  </tr>
  {/if}
</table>
</div> -->
</div>
</div>
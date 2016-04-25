{assign var="page_title" value="##Your Account##"}
{include file="header.inc.tpl"}
<div class="section">
  <div class="container">
    <div class="row">
          <div class="col-md-12">
<h3 class="text-info" > {$page_title|escape} </h3> 
<hr/>
<p class="text-right"><a class="btn btn-info" href="{url|escape href='/account_details.php'}">##Edit Profile##</a></p>
 <h4 class="text-info"> Drawings </h4> 
<hr/>
 

<table class="table table-bordered table-condensed table-hover table-striped">
  <tr>
    <th class="text-primary"> Drawing</th>   
    <th class="text-primary text-center"> Clicks</th>
    <th class="text-primary text-center"> Likes</th>
    <th class="text-primary text-center"> Reports</th>
    <th class="text-primary text-center"> Sponsors</th>
    <th class="text-primary text-center" > Amount</th>
    <th class="text-primary text-center" > Status</th>
    <th class="text-primary text-center"> Created</th>
     
  </tr>
  {section name=drawing loop=$drawings}
     
  <tr>
    <td><img src='{$drawings[drawing]->drawing_image}'  class="img-responsive" width="150" height="150"/><br/>{$drawings[drawing]->title}<br/>{$drawings[drawing]->description}</td>

    <td class="text-center"> {$drawings[drawing]->clicks}</td>
    <td class="text-center">{$drawings[drawing]->likes}</td>
    <td class="text-center">{$drawings[drawing]->reports}</td>
    <td class="text-center"> {foreach from=$allSponsor key=myId item=i}
   {if $myId == $drawings[drawing]->id}{', '|implode:$i.title} {/if}</li>
{/foreach}</td>
    <td class="text-center">{foreach from=$allSponsor key=myId item=i}
   {if $myId == $drawings[drawing]->id}{', '|implode:$i.amount} {/if}</li>
{/foreach}</td>
<td class="text-center">{if $drawings[drawing]->status != 0} <span class="label label-danger">Disabled</span> {else} <span class="label label-success">Enabled</span> {/if}</td>
    <td class="text-center">{$drawings[drawing]->created_at|datetime_to_date|escape}</td>
     
     
  </tr>
  {/section}
</table>

  
</div>
</div>
</div>
</div>
{include file="footer.inc.tpl"}

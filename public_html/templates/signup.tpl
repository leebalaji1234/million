{assign var="page_title" value="##Sign Up##"}
{include file="header.inc.tpl"}
<div class="section">
  <div class="container">
  <div class="row">
<!-- <h1>{$page_title|escape}</h1> -->
<div class="col-md-12">
 

<!-- <blockquote>##Your E-Mail address will be your account login.##</blockquote> -->

<p class="text-danger text-center">{show_errors}</p>
{start_form class="form-horizontal"}
 <div class="panel panel-default">
              <div class="panel-heading">
                <span class="text-primary ">  <strong>{$page_title|escape}</strong>  </span>
                 
              </div>
              <div class="panel-body">
                <div class="form-group">
                     <div class="col-md-2">
                      <label   class="control-label">##Email##</label> 
                      </div>
                      <div class="col-md-5">
                      <input  name="email"  size="80" class="form-control" palceholder="Enter email ..." value="{$smarty.request.email|escape}" />
                    </div>
                  </div>

                  <div class="form-group">
                     <div class="col-md-2">
                      <label   class="control-label">##Confirm Email##</label> 
                     </div>
                      <div class="col-md-5">
                      <input  name="email_confirm" size="80"  class="form-control" palceholder="Confirm email ..." value="{$smarty.request.email_confirm|escape}" />
                    </div>
                  </div>

                  <div class="form-group">
                     <div class="col-md-2">
                      <label   class="control-label">##First Name##</label> 
                     </div>
                      <div class="col-md-5">
                      <input  name="first_name" size="20" class="form-control" palceholder="First name here ..." value="{$smarty.request.first_name|escape}" />
                    </div>
                  </div>

                  <div class="form-group">
                     <div class="col-md-2">
                      <label   class="control-label">##First Name##</label> 
                     </div>
                      <div class="col-md-5">
                      <input  name="last_name" size="20" class="form-control" palceholder="Last name here ..." value="{$smarty.request.last_name|escape}" />
                    </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-2">
                      <label   class="control-label">##Password##</label> 
                     </div>
                      <div class="col-md-5">
                      <input type="password" name="pass" size="20" class="form-control" palceholder="password here ..." value="{$smarty.request.pass|escape}"  />##(Must be at least 5 characters long)##
                    </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-2">
                      <label   class="control-label">##Confirm Password##</label> 
                     </div>
                      <div class="col-md-5">
                      <input type="password" name="pass_confirm" size="20" class="form-control" palceholder="confirm password here ..." value="{$smarty.request.pass_confirm|escape}"  />##(Must be at least 5 characters long)##
                    </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-2">
                      <label   class="control-label">##Country##</label> 
                     </div>
                      <div class="col-md-5">
                      <select name="country" id="theme1" class="form-control" onchange="countrySelect(this.value);" >
                      <option value="">Choose country</option> 
                        {foreach item=country from=$countries}
                        <option  value='{$country->id}' {if $smarty.request.country == $country->id} selected='selected' {/if} >{$country->name} </option>
                        {/foreach}
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-2">
                      <label   class="control-label">##State##</label> 
                     </div>
                      <div class="col-md-5">
                      <select name="state" id="state" class="form-control" onchange="stateSelect(this.value);"> 
                         
                      </select>
                    </div>
                  </div>
                   <div class="form-group">
                     <div class="col-md-2">
                      <label   class="control-label">##City##</label> 
                     </div>
                      <div class="col-md-5">
                      <select name="city" id="city" class="form-control" > 
                         
                      </select>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3">
                      <input name="submit_button" type="submit" class="btn btn-primary" value="##Create Account## &gt;&gt;" /> 
                      
                    </div>
                    <div class="col-md-10">
                      <p>##Use this form to create an account on## {$app->setting->site_name|escape}.
##If you already have an account, you may## <a href="{url|escape href='/login.php'}">##Log In##</a> ##instead##.</p>
                    </div>
                  </div>
 </div>
            </div>
{end_form}
</div>
</div>
</div>
</div>
{include file="footer.inc.tpl"}

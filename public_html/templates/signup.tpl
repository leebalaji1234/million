{assign var="page_title" value="##Sign Up##"}
{assign var="pagename" value="register"}
{include file="header.inc.tpl"}
<link rel="stylesheet" href="custom_lib/datepicker/css/datepicker.css" type="text/css" />
 
 

<script type="text/javascript" src="custom_lib/datepicker/js/datepicker.js"></script>
<script type="text/javascript" src="custom_lib/datepicker/js/eye.js"></script>
<script type="text/javascript" src="custom_lib/datepicker/js/utils.js"></script>
<script type="text/javascript" src="custom_lib/datepicker/js/layout.js?ver=1.0.2"></script>
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
              <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">##First Name##</label> 
                     </div>
                      <div class="col-md-5">
                      <input  name="first_name" size="20" class="form-control" palceholder="First name here ..." value="{$smarty.request.first_name|escape}" />
                    </div>
                  </div>

                  <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">##Last Name##</label> 
                     </div>
                      <div class="col-md-5">
                      <input  name="last_name" size="20" class="form-control" palceholder="Last name here ..." value="{$smarty.request.last_name|escape}" />
                    </div>
                  </div>
                <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">##Email##</label> 
                      </div>
                      <div class="col-md-5">
                      <input  name="email"  size="80" class="form-control" palceholder="Enter email ..." value="{$smarty.request.email|escape}" />
                    </div>
                  </div>

                  <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">##Confirm Email##</label> 
                     </div>
                      <div class="col-md-5">
                      <input  name="email_confirm" size="80"  class="form-control" palceholder="Confirm email ..." value="{$smarty.request.email_confirm|escape}" />
                    </div>
                  </div>

                  
                  <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">##Password##</label> 
                     </div>
                      <div class="col-md-5">
                      <input type="password" name="pass" size="20" class="form-control" palceholder="password here ..." value="{$smarty.request.pass|escape}"  />##(Must be at least 8 characters long)##
                    </div>
                  </div>
                  <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">##Confirm Password##</label> 
                     </div>
                      <div class="col-md-5">
                      <input type="password" name="pass_confirm" size="20" class="form-control" palceholder="confirm password here ..." value="{$smarty.request.pass_confirm|escape}"  />##(Must be at least 8 characters long)##
                    </div>
                  </div>
                   <!-- dob -->
                   
                  <div class="form-group required">
                    <div class="col-sm-2">
                      <label for="inputDate" class="control-label">## Date of Birth##</label>
                    </div>
                    <div class="col-sm-5">  
                     <input name="dob"   id="inputDate" class="form-control inputDate" placeholder="mm/dd/YYYY"  value="01/01/2016" readonly="readonly" onchange="ajaxCallToCreateAge(this.value);"   />
                     <small>mm/dd/YYYY</small>
                    </div>
                  </div>
                    
                  <div class="form-group required">
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
                  <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">##State##</label> 
                     </div>
                      <div class="col-md-5">
                      <select name="state" id="state" class="form-control" onchange="stateSelect(this.value);"> 
                         
                      </select>
                    </div>
                  </div>
                   <div class="form-group required">
                     <div class="col-md-2">
                      <label   class="control-label">##City##</label> 
                     </div>
                      <div class="col-md-5">
                      <select name="city" id="city" class="form-control" onchange="citySelect(this.value);" > 
                         
                      </select>
                       <span id="citymanualoption" > 
                       
                       </span>
                    </div>
                  </div>
                  {if $captcha_url}
               <div class="form-group ">
                     
                    <div class="col-sm-5 col-sm-offset-2 well"> 
                     <input name="phrase" size="10" value="" />&nbsp;
                     <img id="captcha" src="{$captcha_url|escape}" style="vertical-align: middle;border-radius:20px;border:2px solid grey;" alt="##CAPTCHA Image##" /> <i class="fa fa-2x fa-refresh" style="margin-left:10px;" onclick="CaptchaRefresh();"></i>
                      <p class="text-muted">##Enter text from image at right##</p> 
                    </div>
                  </div>
                {/if}

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

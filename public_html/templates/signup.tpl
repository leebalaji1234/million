{assign var="page_title" value="##Create Account##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Use this form to create an account on## {$app->setting->site_name|escape}.
##If you already have an account, you may## <a href="{url|escape href='/login.php'}">##Log In##</a> ##instead##.</p>

<p>##Your E-Mail address will be your account login.##</p>

{show_errors}
{start_form}
<table>

  <tr>
    <!-- class="label" -->
    <td >##Enter your E-Mail Address##:</td>
    <td><input name="email" size="80" value="{$smarty.request.email|escape}" /></td>
  </tr>

  <tr>
    <td >##Re-enter your E-Mail Address##:</td>
    <td><input name="email_confirm" size="80" value="{$smarty.request.email_confirm|escape}" /></td>
  </tr>

  <tr>
    <td >##First Name##:</td>
    <td><input name="first_name" size="20" value="{$smarty.request.first_name|escape}" /></td>
  </tr>

  <tr>
    <td >##Last Name##:</td>
    <td><input name="last_name" size="20" value="{$smarty.request.last_name|escape}" /></td>
  </tr>

  <tr>
    <td >##Create a Password##:</td>
    <td><input type="password" name="pass" size="20" value="{$smarty.request.pass|escape}" /> ##(Must be at least 5 characters long)##</td>
  </tr>

  <tr>
    <td >##Re-enter Password##:</td>
    <td><input type="password" name="pass_confirm" size="20" value="{$smarty.request.pass_confirm|escape}" /></td>
  </tr>
  
  <tr>
    <td >##Country##:</td>
    <td><select name="country" id="theme1" class="form-control" onchange="countrySelect(this.value);" >
                      <option value="">Choose country</option> 
                        {foreach item=country from=$countries}
                        <option  value='{$country->id}' {if $smarty.request.country == $country->id} selected='selected' {/if} >{$country->name} </option>
                        {/foreach}
                      </select></td>
  </tr>
  <tr>
    <td >##State##:</td>
    <td><select name="state" id="state" class="form-control" onchange="stateSelect(this.value);"> 
                         
                      </select></td>
  </tr>
  <tr>
    <td >##City##:</td>
    <td><select name="city" id="city" class="form-control" > 
                         
                      </select></td>
  </tr>


</table>
<p>
  <input type="submit" value="##Create Account##" />
</p>
{end_form}

{include file="footer.inc.tpl"}

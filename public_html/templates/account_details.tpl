{assign var="page_title" value="##Account Details##"}
{include file="header.inc.tpl"}
<div class="section">
  <div class="container">
    <div class="row">
          <div class="col-md-12">
<h3 class="text-info">{$page_title|escape}</h3>
<hr/>
 

{show_errors}
{start_form class="form-horizontal"}
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >##First Name##:</label>
  </div>
  <div class="col-sm-5"> 
  <p   class="form-control" >{$smarty.request.first_name|escape}</p>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >##Last Name##:</label>
  </div>
  <div class="col-sm-5"> 
   <p   class="form-control" >{$smarty.request.last_name|escape}</p>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >##E-Mail Address##:</label>
  </div>
  <div class="col-sm-5"> 
   <p   class="form-control" >{$user->email|escape}</p>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >##New E-Mail Address##:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="email" class="form-control" size="20" value="{$smarty.request.email|escape}" /> (##Leave blank to keep current address##)
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >##Re-Enter New E-Mail Address##:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="email_confirm" class="form-control" size="20" value="{$smarty.request.email_confirm|escape}" /> 
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >##Password##:</label>
  </div>
  <div class="col-sm-5"> 
   ************
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >##New Password##:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="pass"  type="password" class="form-control" size="20" value="{$smarty.request.pass|escape}" /> (##Leave blank to keep current password##)
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >##Re-Enter New Password##:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="pass_confirm"  type="password" class="form-control" size="20" value="{$smarty.request.pass_confirm|escape}" />  
  </div>
</div>
 <div class="form-group">
<div class="col-sm-offset-3 col-sm-6">
   <input type="submit" value="##Save Changes##" class="btn btn-primary" name="submit_button"> 
</div>
</div>
 
{end_form}
</div>
</div>
</div>
</div>
{include file="footer.inc.tpl"}

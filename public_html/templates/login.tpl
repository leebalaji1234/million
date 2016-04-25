{assign var="page_title" value="##Login##"}
{include file="header.inc.tpl"}
<div class="section">
  <div class="container">
 	<div class="row">
 		<!-- <h3 class="text-center"><strong>{$page_title|escape}</strong></h3>
 		<hr/> -->
 		<div class="col-md-12">
<p class="text-danger text-center">{$smarty.session.before_login}</p>



<p class="text-danger text-center">{show_errors}</p>
{start_form class="form-horizontal"}

 <!--  <div class="alert alert-primary col-md-10 text-center">
        <button contenteditable="false" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Thanks for Register to us!</strong> You will be receive an email with your code. You can use code on the upload art
      </div> -->
          <div class="panel panel-default">
              <div class="panel-heading">
                <span class="text-primary"> <strong>Login</strong> </span>
              </div>
              <div class="panel-body">
             
                  <div class="form-group">
                     <div class="col-sm-offset-3  col-md-5">
                      <label   class="control-label">##Email##</label> 
                     
                      <input  name="email"   class="form-control" palceholder="Enter email ..." value="{$smarty.request.email|escape}" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3  col-md-5"> 
                      <label  class="control-label">##Password##</label>
                    
                    
                      <input type="password" name="pass"  class="form-control" palceholder="Enter password ..."  />
                    </div>
                  </div>
                     
                   
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-10">
                      <input name="submit_button" type="submit" class="btn btn-primary" value="##Sign In## &gt;&gt;" /> 
                     </br>
                   <a href="{url href='/retrieve_password.php'}">##Forgot your Password?##</a>
                   <p>##Don't have an account?## <a href="{url href='/signup.php'}">##Sign Up Now##</a>.</p>
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

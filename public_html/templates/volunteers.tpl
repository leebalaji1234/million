{assign var="page_title" value="##Volunteer Register | Get Volunteer Code##"}
{assign var="pagename" value="volunteer"}
{include file="header.inc.tpl"}
<div class="section">
  <div class="container">
<!-- <h1>{$page_title|escape}</h1> -->  
{show_errors}
{start_form enctype="multipart/form-data" class="form-horizontal"}
  
<div class="row">
 <!--  <div class="alert alert-primary col-md-10 text-center">
        <button contenteditable="false" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Thanks for Register to us!</strong> You will be receive an email with your code. You can use code on the upload art
      </div> -->
          <div class="col-md-12">
            <div class="panel panel-default">
              <div  >
                <span class="text-primary col-md-5"> <h4><strong>Volunteer Register | Get Volunteer Code</strong></h4>
                   </span> 
              <p class="text-left col-md-6">
                
                <div class="input-group ">
                   
                <input type="text" class="form-control" id="getemail" placeholder="Enter registered email">

              
               <span class="input-group-btn">
                <a class="btn btn-success" type="submit" onclick="getVolunteercode($('#getemail').val());">Show Code</a>
                </span>
                 
                </div>

                 

            </p>
                  <hr/>
              </div>
              <div class="panel-body">
                <div class="form-group">
                    <div class="col-sm-2">
                      <label for="file1" class="control-label">##Name##</label>
                    </div>
                    <div class="col-sm-5"> 
                      <input  name="name" id="title1" class="form-control" palceholder="Enter name ..." value="{$smarty.request.name|escape}" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="file1" class="control-label">##Email##</label>
                    </div>
                    <div class="col-sm-5"> 
                      <input  name="email" id="title1" class="form-control" palceholder="Enter email ..." value="{$smarty.request.email|escape}" />
                    </div>
                  </div>
                   <div class="form-group">
                    <div class="col-sm-2">
                      <label for="file1" class="control-label">##Phone##</label>
                    </div>
                    <div class="col-sm-5"> 
                      <input  name="phone" id="title1" class="form-control" palceholder="Enter phone ..." value="{$smarty.request.phone|escape}" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="desc" class="control-label">##Address##</label>
                    </div>
                    <div class="col-sm-5"> 
                       
                      <textarea name="address" id="desc" class="form-control" palceholder="address  here ..."  >{$smarty.request.address|escape}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="title1" class="control-label">##Country##</label>
                    </div>
                    <div class="col-sm-5"> 
                      <select name="country" id="theme1" class="form-control" onchange="countrySelect(this.value);" >
                      <option value="">Choose country</option> 
                        {foreach item=country from=$countries}
                        <option  value='{$country->id}' {if $smarty.request.country == $country->id} selected='selected' {/if} >{$country->name} </option>
                        {/foreach}
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="desc" class="control-label">##State##</label>
                    </div>
                    <div class="col-sm-5"> 
                       
                      <select name="state" id="state" class="form-control" onchange="stateSelect(this.value);"> 
                         
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="title1" class="control-label">##City##</label>
                    </div>
                    <div class="col-sm-5"> 
                     <select name="city" id="city" class="form-control" > 
                         
                      </select>
                    </div>
                  </div>
                  
                {if $captcha_url}
               <div class="form-group ">
                     
                    <div class="col-sm-5 col-sm-offset-2 well"> 
                     <input name="phrase" size="10" value="" />&nbsp;
                     <img src="{$captcha_url|escape}" style="vertical-align: middle;border-radius:20px;border:2px solid grey;" alt="##CAPTCHA Image##" />
                      <p class="text-muted">##Enter text from image at right##</p> 
                    </div>
                  </div>
                {/if}
         
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                       
                      
                       <input name="submit_button" type="submit" class="btn btn-primary" value="##Continue## &gt;&gt;" /> 
                    </div>
                  </div>
                
              </div>
            </div>
          </div>
        </div>


{end_form}
</div>
</div>
{include file="footer.inc.tpl"}
 
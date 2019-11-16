{include file='../../mView/includes/login/header_login.tpl'}
<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 
 
  <div id="login-page">
    <div class="container">
    





      <form class="form-login" method="post" name="login_form" action="{$Aciont}">
        <h2 class="form-login-heading">recovery</h2>
        
{if $feedback neq ''}
<div class="alert alert-sm alert-border-left alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  {$feedback}
</div>
{/if} 
      

        <div class="login-wrap">  
        
        <input type="text" name="username" id="username" class="form-control" required  placeholder="User name" value="{$username}">   
        
        <input type="text" name="phone" id="phone" class="form-control" required  placeholder="phone" value="{$phone}">   
          <br>
          <input type="hidden" id="user_id" name="user_id" value="user_id" />
        <br>
          <input type="text" name="otb" id="otb" class="form-control" required  placeholder="otb">   
          <br>  
           <input type="password" id="pass" name="pass" class="form-control" placeholder="Enter New Password">
          <br>
          <input type="password" id="confirm_pass" name="confirm_pass" class="form-control" placeholder="Enter Confirm Password" >
           <br>
              <br>
          <button class="btn btn-theme btn-block"  type="submit" name="submit" value="submit_reset" 
          onClick="formhashRecover(this.form, this.form.pass);">
          <i class="fa fa-lock"></i> update</button>
         
 
        </div>
      
       
      </form>
    </div>
  </div> 
{include file='../../mView/includes/login/footer_login.tpl'}
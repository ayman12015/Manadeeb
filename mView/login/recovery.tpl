{include file='../../mView/includes/login/header_login.tpl'}
<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 
 
  <div id="login-page">
    <div class="container">
    





      <form class="form-login" method="post" name="login_form" action="{$Aciont}">
        <h2 class="form-login-heading">sign in now</h2>
        
{if $feedback neq ''}
<div class="alert alert-sm alert-border-left alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  {$feedback}
</div>
{/if}


        <div class="login-wrap">        
          <input type="text" name="uId" id="uId" class="form-control" placeholder="Email" required autofocus>
          <br>
         
         
          <button class="btn btn-theme btn-block" href="{$Aciont}" type="submit" ><i class="fa fa-lock"></i> SIGN IN</button>
         
 
           <div class="registration">
            <br/>
           <a data-toggle="modal" href="../../controllers/login/RecoverPassword.php"> Forgot Password?</a>
          </div>
        </div>
       
      </form>
    </div>
  </div> 
{include file='../../mView/includes/login/footer_login.tpl'}
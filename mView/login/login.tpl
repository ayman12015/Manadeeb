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
          <input type="text" name="uId" id="uId" class="form-control" placeholder="User ID" required autofocus>
          <br>
          <input type="password" name="password" id="password" class="form-control" required  placeholder="Password">
          <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
            <!-- <span class="pull-right">
            <a data-toggle="modal" href="../controllers/login.html#myModal"> Forgot Password?</a>
            </span> -->
            </label>
          <button class="btn btn-theme btn-block" href="{$Aciont}" type="button" onClick="formhashRecover(this.form, this.form.password);"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
 
          <div class="registration">
            Click Here to recover your password!<br/>
           <a data-toggle="modal" href="../controllers/login.html#myModal"> Forgot Password?</a>
          </div>
        </div>
        <!-- Modal -->
         </form>
         
         
         <form name="form1" id="form1" method="post" action="#">
       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address or phone below to reset your password.</p>
                <input type="text" name="email" placeholder="Email / phone" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="submit" name="submit" value="resetPass" >Submit</button>
              </div>
            </div>
          </div>
        </div> 
        </form>
                <!-- modal -->
     
    </div>
  </div> 
{include file='../../mView/includes/login/footer_login.tpl'}
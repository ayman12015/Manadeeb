{include file='../../includes/header_login.tpl'}
<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
    
   
      <form class="form-login" method="post" action="{$Aciont}">
       
        <h2 class="form-login-heading">Register New Account</h2>
        <div class="login-wrap">
          <input type="text" name="uId" id="uId" class="form-control" placeholder="User Email" autofocus>
          <br>
          
          <input type="password" name="uPass1" id="uPass1" class="form-control" placeholder="Password">
          <br>
          
          <input type="password" name="uPass2" id="uPass2" class="form-control" placeholder="re-password">
          <br>
              <select class="form-control">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
 
            </label>
            
            <br>
            
          <button class="btn btn-theme btn-block" href="{$Aciont}" type="submit"><i class="fa fa-lock"></i>Register</button>
          
          <hr>
          <div class="login-social-link centered">
            <p>or you can Register via your social network</p>
            <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
          </div>
          <div class="registration">
            You have account ?<br/>
            <a class="" href="../controllers/login.php">
              Go to login page
              </a>
          </div>
        </div>

      </form>
    </div>
  </div> 
{include file='../../includes/footer_login.tpl'}
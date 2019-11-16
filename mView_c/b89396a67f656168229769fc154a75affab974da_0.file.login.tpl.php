<?php
/* Smarty version 3.1.33, created on 2019-11-16 20:59:17
  from 'C:\wamp64\www\manadeeb\mView\login\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dd0632585cfa6_32453236',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b89396a67f656168229769fc154a75affab974da' => 
    array (
      0 => 'C:\\wamp64\\www\\manadeeb\\mView\\login\\login.tpl',
      1 => 1568043189,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../mView/includes/login/header_login.tpl' => 1,
    'file:../../mView/includes/login/footer_login.tpl' => 1,
  ),
),false)) {
function content_5dd0632585cfa6_32453236 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:../../mView/includes/login/header_login.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
 
 
  <div id="login-page">
    <div class="container">
    





      <form class="form-login" method="post" name="login_form" action="<?php echo $_smarty_tpl->tpl_vars['Aciont']->value;?>
">
        <h2 class="form-login-heading">sign in now</h2>
        
<?php if ($_smarty_tpl->tpl_vars['feedback']->value != '') {?>
<div class="alert alert-sm alert-border-left alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <?php echo $_smarty_tpl->tpl_vars['feedback']->value;?>

</div>
<?php }?>


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
          <button class="btn btn-theme btn-block" href="<?php echo $_smarty_tpl->tpl_vars['Aciont']->value;?>
" type="button" onClick="formhashRecover(this.form, this.form.password);"><i class="fa fa-lock"></i> SIGN IN</button>
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
<?php $_smarty_tpl->_subTemplateRender('file:../../mView/includes/login/footer_login.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

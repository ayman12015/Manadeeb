{include file='../../mView/includes/header.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}




{foreach from=$Users item=$User}   
<div class="modal fade" id="myModalEdit{$User.user_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Edit User Data</h4>
                    </div>
                    

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            
                    <form class="cmxform form-horizontal style-form" name="registration_form" id="registration_form" method="post" action="{$REQUEST_URI}">
                       
              
            {if $success_msg neq ''}
            <div class="alert alert-success"><b>Well done!</b> {$success_msg}</div>
            {/if}
            
            {if $error_msg neq ''}
            <div class="alert alert-danger"><b>Error:{$error_msg}</div>
            {/if}
            
                                                                                   
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$NewUser_User_Name}</label>
                  <div class="col-sm-10">
                     <input type="text" value="{$User.username}" name="username" id="username" class="form-control" placeholder="Enter User Full Name" required>
                  </div>
                   <label class="col-sm-2 col-sm-2 control-label">{$NewUser_User_Name}</label>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$NewUser_User_E_maile}</label>
                  <div class="col-sm-10">
                    <input class="form-control" value="{$User.email}" id="cemail" type="email" name="email" placeholder="Enter User Email" />
                  </div>
                </div>
        
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$NewUser_User_Phone}</label>
                  <div class="col-sm-10">
                    <input class="form-control" value="{$User.phone}" id="phone" type="number" name="phone" maxlength="14" placeholder="Enter User Phone" required />
                    <span class="help-block"> {$NewUser_Phone_number_should_be_start_with}</span>
                  </div>
                </div> 
                <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">NewUser status</label> 
                          <div class="col-sm-10">
                             <select class="form-control" name="status" value="{$User.status}<">
                                 <option value="0">Active</option>
                                 <option value="1">Not Active</option>
                             </select>           
                  </div>                                                
                </div>

               <input type="hidden" name="user_id" id="user_id" value="{$User.user_id}" />
                
          
        
        
        <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="UpdateWebUser" value="UpdateWebUser">Update Info.</button>                                   
                      <button class="btn btn-theme04" type="button" name="$user_id" value="deleteWebUser" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
              </form>   
              
                 </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
                       
                  </div>
                </div>
              </div>
 {/foreach}  
 
 
  
 {foreach from=$Users item=$User}  
<div class="modal fade" id="myModalReset{$User.user_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
                    </div>
                    <form name="form1" action="#?Reset" method="post">
                    <div class="modal-body">                      
                        <div class="form-group">
                          <label class="col-sm col-sm control-label">User Name</label>
                          <div class="col-sm">
                         <input type="text" id="user_name" name="user_name" class="form-control" value="{$User.username}" readonly="readonly">
                          </div>
                        </div>                      
                    </div>
                    <input type="hidden" id="user_id" name="user_id" value="{$User.user_id}"  />
                    
                    
                    <div class="modal-body">                      
                        <div class="form-group">
                          <label class="col-sm col-sm control-label">New Password</label>
                          <div class="col-sm">
                             <input type="password" id="pass" name="pass" class="form-control" placeholder="Enter New Password">
                          </div>
                        </div>                      
                    </div>
                    
                    
                    <div class="modal-body">                      
                        <div class="form-group">
                          <label class="col-sm col-sm control-label">Confirm Password</label>
                          <div class="col-sm">
                           <input type="password" id="confirm_pass" name="confirm_pass" class="form-control" placeholder="Enter Confirm Password" >
                          </div>
                        </div>                      
                    </div>
                    
                    
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" name="submit_reset" value="submit_reset" class="btn btn-primary" onclick="return resetformhash(this.form,
                     this.form.user_id,
                                   this.form.pass,
                                   this.form.confirm_pass
                                   );">Save changes</button>
                    </div>
                    </form>                    
                  </div>
                </div>
              </div>
 {/foreach}                
              

     <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
      
           <div class="content-panel" {if $session_lang eq 'AR'}  align="right" {/if} >                                 
              <div class="panel-body" >
                {$NewUser_Password_Notes}

                </ul>
              </div>
            </div>
            
        <h3 {if $session_lang eq 'AR'}dir="rtl" {/if}><i class="fa fa-angle-right">{$NewUser_Add_New_User_web}</i></h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
		  
          <form {if $session_lang eq 'AR'}dir="rtl" {/if} class="cmxform form-horizontal style-form" name="registration_form" id="registration_form" method="post" action="{$REQUEST_URI}">
                			 
              
            {if $success_msg neq ''}
            <div class="alert alert-success"><b>Well done!</b> {$success_msg}</div>
            {/if}
            
            {if $error_msg neq ''}
            <div class="alert alert-danger"><b>Error:{$error_msg}</div>
            {/if}
            
                                                                                   
                <div class="form-group">
                  {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewUser_User_Name}</label>
                  {/if}
                  <div class="col-sm-10">
                     <input type="text" name="username" id="username" class="form-control" placeholder="{$NewUser_Enter_User_Full_Name}" required>
                  </div>
                  
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewUser_User_Name}</label>
                  {/if}
                  
                </div>
                
                <div class="form-group">
                  {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewUser_User_E_maile}</label>
                  {/if}
                  
                  
                  
                  <div class="col-sm-10">
                    <input class="form-control " id="cemail" type="email" name="email" placeholder="{$Enter_NewUser_User_E_maile}" />
                  </div>
                  
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewUser_User_E_maile}</label>
                  {/if}
                  
                </div>
				
                <div class="form-group">
                   {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewUser_User_Phone}</label>
                   {/if}
                  <div class="col-sm-10">
                    <input class="form-control " id="phone" type="number" name="phone" maxlength="14" placeholder="{$Enter_NewUser_User_Phone}" required />
                    
                   <div class="parent" {if $session_lang eq 'AR'} align="right" {/if}> <span class="help-block" > {$NewUser_Phone_number_should_be_start_with}</span></div>
                  </div>


                   {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewUser_User_Phone}</label>
                   {/if}
                </div>
                
                <div class="form-group">
                   {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewUser_User_Password}</label>
                   {/if}
                  <div class="col-sm-10">
                    <input class="form-control " id="password" type="password" name="password" maxlength="14" placeholder="{$Enter_NewUserPhone_User_Password}"  />
                  </div>
                   {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewUser_User_Password}</label>
                   {/if}
                </div>
                
                 <div class="form-group">

                   {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewUser_Confirm_password}</label>
                   {/if}
                  <div class="col-sm-10">
                    <input class="form-control " id="confirmpwd" type="password" name="confirmpwd" maxlength="14" placeholder="{$Enter_NewUserPhone_Confirm_password}"  />
                  </div>
                   {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewUser_Confirm_password}</label>
                   {/if}
                </div>
                
                
				
				
				<div class="form-group"  {if $session_lang eq 'AR'} align="right" {/if} >
                
                  <div class="col-sm-11">

                  <label><strong>{$NewUser_User_Privileges}</strong></label>

                   </div>
                  
                  <div class="col-sm-10">
						<div class="radio"  >
						<label>
						  <input type="radio" value="0" name="UserPrivileges" id="UserPrivileges0" disabled>
						  {$NewUser_Admin_Accout_All_Pages_allwed}
						  </label>
					  </div>
						<div class="radio">
						<label>
						  <input type="radio" name="UserPrivileges" id="UserPrivileges1" value="1" checked="checked" >
						  {$NewUser_Sales_Administration_Pages_Allowed}
						  </label>
					  </div>
					  <div class="radio">
						<label>
						  <input type="radio" name="UserPrivileges" id="UserPrivileges2" value="2">
						    {$NewUser_Financial_Management_Pages_Allowed}
						  </label>
					  </div>
					  <div class="radio">
						<label >
						  <input type="radio" name="UserPrivileges" id="UserPrivileges3" value="3">
						    {$NewUser_Production_Management_Pages_Allowed}
						  </label>
					  </div>
                  </div>
                </div>
				
				<div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="button" name="AddWebUser" value="AddWebUser" onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.phone,
                                   this.form.password,
                                   this.form.confirmpwd,
                                   this.form.UserPrivileges);">{$btn_Save}</button>                                   
                      <button class="btn btn-theme04" type="button">{$btn_Cancel}</button>
                    </div>
                  </div>
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
        <!-- INLINE FORM ELELEMNTS -->
		
		 <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
             
                {if $session_lang eq 'AR'} 
                 <table dir="rtl" class="table table-striped table-advance table-hover">
                <h4 dir="rtl" ><i class="fa fa-angle-left">{$NewUser_Users_List}</i></h4>
                {else}
                 <table class="table table-striped table-advance table-hover">
                <h4> <i class="fa fa-angle-right"></i>{$NewUser_Users_List}</h4>
                {/if}
                <hr>
                
                <thead >
                  <tr >
                    <th><i class="fa fa-bullhorn"></i>{$NewUser_User_Name}</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i>{$NewUser_User_E_mail}</th>
                    <th><i class="fa fa-bookmark"></i>{$NewUser_User_Phone}</th>
					<th><i class="fa fa-bookmark"></i>{$NewUser_User_Privileges}</th>
                    <th><i class=" fa fa-edit"></i>{$NewUser_Status}</th>
                    <th></th>
                  </tr>
                </thead>
                
               <tbody align="left">
               {foreach from=$Users item=$User}                    
                  <tr>                    
                    <td><a href="#">{$User.username} </a></td>
                    <td>{$User.email}</td>
                    <td class="hidden-phone">{$User.phone}</td>
					<td class="hidden-phone">{$User.type}</td>
                    <td><a href="#">{$User.status}</a></td>
                    <td> 		
                    
           
                        
                        
       <button class="btn btn-success btn-xs" data-target="#myModalReset{$User.user_id}" data-toggle="modal" data-placement="bottom" title="Reset Password">
      <i class="fa fa-retweet"></i>
      </button>                      
      
      <button class="btn btn-primary btn-xs" data-target="#myModalEdit{$User.user_id}" data-toggle="modal" data-placement="bottom" title="Edit User">
      <i class="fa fa-pencil"></i>
      </button>
      <button class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="bottom" title="Lock User">
      <i class="fa fa-lock "></i>
      </button>
      <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="Delete User">
      <i class="fa fa-trash-o "></i>
      </button>					  
					</td>
                  </tr>
               {/foreach}                                  
                </tbody>
              </table>
			  
			  
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
		
		
      </section>

      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->  
{include file='../../mView/includes/footer.tpl'}
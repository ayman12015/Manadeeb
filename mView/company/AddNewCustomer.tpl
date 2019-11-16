 {include file='../../mView/includes/header.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}




{foreach from=$customers item=$Customer}  
<div class="modal fade" id="myModalEdit{$Customer.cust_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Edit Customers Data</h4>
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
                  <label class="col-sm-2 col-sm-2 control-label">{$Customer_name}</label>
                  <div class="col-sm-10">
                     <input type="text" name="cust_name" value="{$Customer.cust_name}" id="cust_name " class="form-control" placeholder="{$Enter_Customer_name}" required>
                  </div>
                </div>
                
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$Customer_shop_name}</label>
                  <div class="col-sm-10">
                    <input class="form-control " value="{$Customer.cust_shop_name}" id="cust_shop_name" type="text" name="cust_shop_name" placeholder="{$Enter_Customer_shop_name}" />
                  </div>
                </div>
        
               <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$Customer_phone}</label>
                  <div class="col-sm-10" {if $session_lang eq 'AR'}align="right"{/if}>
                    <input class="form-control " id="cust_mobile" value="{$Customer.cust_mobile}" type="number" name="cust_mobile" maxlength="14" placeholder="{$Enter_Customer_phone}" required />                    
                    <span class="help-block"> {$NewUser_Phone_number_should_be_start_with}</span>                    
                  </div>
                </div>
             
               <input type="hidden" name="cust_id" id="cust_id" value="{$Customer.cust_id}" />
               
        
        
        
        <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="UpdateCustomerInfo" value="">Update Info.</button>                                   
                      <button class="btn btn-theme04" type="button" data-dismiss="modal">Cancel</button>
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
 
 
              
              

     <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
       
        
        {if $session_lang eq 'AR'}    
		<h3 dir="rtl"><i class="fa fa-angle-left"></i>{$AddNewCustomer_New_Customers}</h3>
        {else}                
        <h3><i class="fa fa-angle-right"></i>{$AddNewCustomer_New_Customers}</h3>
        {/if}
        
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
      
          <form {if $session_lang eq 'AR'} dir="rtl" {/if} class="cmxform form-horizontal style-form" name="registration_form" id="registration_form" method="post" action="{$REQUEST_URI}">
                       
              
            {if $success_msg neq ''}
            <div class="alert alert-success"><b>Well done!</b> {$success_msg}</div>
            {/if}
            
            {if $error_msg neq ''}
            <div class="alert alert-danger"><b>Error:{$error_msg}</div>
            {/if}
            
                 <div class="form-group">
                  {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Registration_number}</label>
                  {/if}
                  <div class="col-sm-10">
                    <input class="form-control " id="location_id" type="number" name="location_id" maxlength="8" placeholder="{$Enter_Registration_number}" required />
                  </div>
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Registration_number}</label>
                  {/if}
                </div>
                                                                                   
                <div class="form-group">
                    {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Customer_name}</label>
                   {/if}
                  <div class="col-sm-10">
                     <input type="text" name="cust_name" id="cust_name " class="form-control" placeholder="{$Enter_Customer_name}" required>
                  </div>
                   {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Customer_name}</label>
                   {/if}
                </div>
                
                <div class="form-group">
                  {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Customer_shop_name}</label>
                  {/if}
                  <div class="col-sm-10">
                    <input class="form-control " id="cust_shop_name" type="text" name="cust_shop_name" placeholder="{$Enter_Customer_shop_name}" />
                  </div>
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Customer_shop_name}</label>
                  {/if}
                </div>
        
                <div class="form-group">
                  {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Customer_phone}</label>
                  {/if}
                  <div class="col-sm-10" {if $session_lang eq 'AR'}align="right"{/if}>
                    <input class="form-control " id="cust_mobile" type="number" name="cust_mobile" maxlength="14" placeholder="{$Enter_Customer_phone}" required />                    
                    <span class="help-block"> {$NewUser_Phone_number_should_be_start_with}</span>                    
                  </div>
                  
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Customer_phone}</label>
                  {/if}
                  
                </div>
                
                <div class="form-group">
                 {if $session_lang eq 'EN'}
                  <label class="col-sm-2 control-label">{$Days_of_work}</label>                 
                  {/if}
                   <div class="col-sm-4">
                    <select class="form-control" name="weekId">
                      <option value="0">Saturday</option>
                      <option value="1">Sunday</option>
                      <option value="2">Monday</option>
                      <option value="3">Tuesday</option>
                      <option value="4">wednesday</option>
                      <option value="5">Thursday</option>
                  </select>           
                  </div>  
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 control-label">{$Days_of_work}</label>
                  {/if}
                  
                  {if $session_lang eq 'EN'}        
                  <label class="col-sm-2 control-label">Users</label>
                  {/if}                
                   <div class="col-sm-4">
                    <select class="form-control" name="user_id" id="user_id">
                      {foreach from=$Users item=$User} 
                      <option value="{$User.id}">{$User.username}</option>
                       {/foreach}  
                  </select>                                                                                  
                </div>
                  {if $session_lang eq 'AR'}        
                  <label class="col-sm-2 control-label">اسم المندوب</label>
                  {/if}                               
                  <div class="form-group">                           
                  </div>                                                
                </div>
                
                
              
                

        <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="AddNewCustomer" value="AddNewCustomer">{$btn_Save}</button>                                   
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
              <table {if $session_lang eq 'AR'} dir="rtl" {/if} class="table table-striped table-advance table-hover">
                {if $session_lang eq 'AR'}
                <h4 dir="rtl"><i class="fa fa-angle-left"></i>{$AddNewCustomer_Users_List}</h4>
                {else}                
                <h4><i class="fa fa-angle-right"></i>{$NewUser_Users_List}</h4>
                {/if}
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i>{$AddNewCustomer_Customer_Name}</th>
                    <th><i class="fa fa-bookmark"></i>{$AddNewCustomer_Phone}</th>
          <th><i class="fa fa-bookmark"></i>{$AddNewCustomer_Shop_Name}</th>
                    <th><i class=" fa fa-edit"></i>{$AddNewCustomer_Date}</th>
                    <th></th>
                  </tr>
                </thead>
               <tbody align="left">
               {foreach from=$customers item=$Customer}                    
                  <tr>                    
                    <td><a href="basic_table.html#">{$Customer.cust_name} </a></td>
                    <td class="hidden-phone">{$Customer.cust_mobile}</td>
          <td class="hidden-phone">{$Customer.cust_shop_name}</td>
                    <td><a href="#">{$Customer.entered_date}</a></td>
                    <td>    
                    
           
                        
                        
    
      
      <button class="btn btn-primary btn-xs" data-target="#myModalEdit{$Customer.cust_id}" data-toggle="modal" data-placement="bottom" title="Edit User">
      <i class="fa fa-pencil"></i>
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
{include file='../../mView/includes/header.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}



{foreach from=$Vendors item=$Vendor}  
<div class="modal fade" id="myModalvendor{$Vendor.vendor_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               
               <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Edit product Vendor</h4>
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
                  <label class="col-sm-2 col-sm-2 control-label">{$Vendors_Vendor_Name}</label>
                  <div class="col-sm-10">
                     <input type="text" name="vendor_name" value="{$Vendor.vendor_name}" class="form-control" placeholder="{$Vendors_Vendor_Name}" required>
                  </div>

                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$Vendors_Vendor_Phone}</label>
                  <div class="col-sm-3">
                     <input type="text" name="vendor_phone" value="{$Vendor.vendor_phone}" class="form-control" placeholder="{$Vendors_Vendor_Phonee}" required>
                  </div> 
                

                    <label class="col-sm-1 col-sm-1 control-label">{$Vendors_Vendor_Tell}</label>

                  <div class="col-sm-3">
                     <input type="text" name="vendor_tell" value="{$Vendor.vendor_tell}" class="form-control" placeholder="{$Vendors_Vendor_Tell}" required>
                  </div>               
                </div>
                
                
                

               <input type="hidden" name="vendor_id" id="vendor_id" value="{$Vendor.vendor_id}" />
               
        
        
        
        <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="EditNewVendor" value="EditNewVendor">Update Info.</button>                                   
                      <button class="btn btn-theme04" type="button"  data-dismiss="modal">Cancel</button>
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
        <h3 dir="rtl"><i class="fa fa-angle-left"></i>{$Vendors_Add_New_Products_Vendors}</h3>
        {else}
        <h3><i class="fa fa-angle-right"></i>{$Vendors_Add_New_Products_Vendors}</h3>
        {/if}
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
				<form {if $session_lang eq 'AR'} dir="rtl" {/if} class="cmxform form-horizontal style-form" id="commentForm" method="post" action="#">
			 

                <div class="form-group">
                  {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Vendors_Vendor_Name}</label>
                    {/if}
                  <div class="col-sm-10">
                     <input type="text" name="vendor_name" class="form-control" placeholder="{$Vendors_Vendor_Name}" required>
                  </div>
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Vendors_Vendor_Name}</label>
                    {/if}
                </div>
                
                <div class="form-group">
                   {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Vendors_Vendor_Phone}</label>
                  {/if}
                  <div class="col-sm-3">
                     <input type="text" name="vendor_phone" class="form-control" placeholder="{$Vendors_Vendor_Phonee}" required>
                  </div> 
                   {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Vendors_Vendor_Phone}</label>
                  {/if}
                     {if $session_lang eq 'EN'}
                    <label class="col-sm-1 col-sm-1 control-label">{$Vendors_Vendor_Tell}</label>
                     {/if}

                  <div class="col-sm-3">
                     <input type="text" name="vendor_tell" class="form-control" placeholder="{$Vendors_Vendor_Telll}" required>
                  </div>  
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Vendors_Vendor_Tell}</label>
                  {/if}                
                </div>
                
                
                <div class="form-group">
                    {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Vendors_Company_Name}</label>
                  {/if}
                  <div class="col-sm-10">
                    <input class="form-control " id="CompanyName" name="CompanyName" type="text" placeholder="{$Vendors_Enter_Vendors_Company_Name}" />
                  </div>
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Vendors_Company_Name}</label>
                  {/if}
                </div>
                
                <div class="form-group">
                  {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Vendors_Company_Address}</label>
                  {/if}
                  <div class="col-sm-10">
                    <input class="form-control " id="address" name="address" type="text" placeholder="{$Vendors_Company_Addresss}" />
                  </div>
                   {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Vendors_Company_Address}</label>
                  {/if}
                </div>
                
                
 
				<div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" name="submit" value="SaveVendorInfo" type="submit">{$btn_Save}</button>
                      <button class="btn btn-theme04" name="submit" value="VendorInfoClear" type="button">{$btn_Cancel}</button>
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
                <h4 dir="rtl"><i class="fa fa-angle-left"></i>{$Vendors_Packages_List}</h4>
                {else}
                <h4><i class="fa fa-angle-right"></i>{$Vendors_Packages_List}</h4>
                {/if}
                
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i>{$Vendors_Vendor_Name}</th>
                    <th><i class="fa fa-bullhorn"></i>{$Vendors_Vendor_Phone}</th>
                    <th><i class="fa fa-bullhorn"></i>{$Vendors_Vendor_Tell}</th>                    
                    <th><i class="fa fa-bullhorn"></i>{$Vendors_Company_Name}</th>
                    <th></th>
                  </tr>
                </thead>
               <tbody align="left">
                                 
                  {foreach from=$Vendors item=$Vendor}  
                  <tr>
                    <td> {$Vendor.vendor_name}</td>
                    <td class="hidden-phone">{$Vendor.vendor_phone}</td>
                    <td class="hidden-phone">{$Vendor.vendor_tell}</td>
                    <td class="hidden-phone">{$Vendor.vendor_company_name}</td>                    
                    <td> 		
                    
                     <button class="btn btn-success btn-xs" data-target="#myModalvendor{$Vendor.vendor_id}" data-toggle="modal" data-placement="bottom" title="Reset Vendor">
            <i class="fa fa-pencil"></i>
            </button>
					  <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="Delete Package">
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
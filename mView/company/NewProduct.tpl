{include file='../../mView/includes/header.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}
 
{foreach from=$Products item=$product}       
<div class="modal fade" id="myModalParoduct{$product.prod_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               
               <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Edit Package Data</h4>
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
                  <label class="col-sm-2 col-sm-2 control-label">{$NewProduct_Product_Name}</label>
                  <div class="col-sm-10">
                     <input type="text" name="prod_name" id="prod_name" value="{$product.prod_name}" class="form-control" placeholder="{$NewProduct_Enter_Product_Name}" required>
                  </div>

                </div>

                 <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">{$NewProduct_Product_Status}</label>
                          <div class="col-sm-10">
                             <select class="form-control" name="status" value="{$product.status}">
                                 <option value="1">{$NewProduct_Active}</option>س
                                 <option value="0">{$NewProduct_Not_Active}</option>
                             </select>           
                  </div>                                                
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$NewProduct_Product_Vendor}</label>                  
                     <div class="col-sm-9">
                        <select class="form-control" name="vendor_id" id="vendor_id" >
                         {counter start=0 step=1 print=false name=bla}
                         {foreach from=$Vendors item=$vendor}
                            <option value="{$vendor.vendor_id}" selected="selected">{$vendor.vendor_name}</option>
                         {/foreach}                      
                       </select>       
                       <span class="input-group-btn add-on" dir="ltr">
                        <button data-toggle="modal" data-target="#myModalVendor"value="{$product.manageable}" class="btn btn-theme"   data-placement="bottom" title="Add Vendor"
                        <i class="fa fa-plus"></i>
                        </button>
                        </span>                                                      
                  </div>                                              
                </div>

                <div class="form-group" >
                    <label for="agree" class="control-label col-lg-2 col-sm-3">{$NewProduct_Is_Product_with_managed_inventory}</label>
                    
                    <div class="col-lg-10 col-sm-9">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" name="manageable" value="1" id="manageable" />
                    </div>
                  </div>
                
                

               <input type="hidden" name="prod_id" id="prod_id" value="{$product.prod_id}" />
               
        
        
        
        <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="EditNewProduct" value="EditNewProduct">Update Info.</button>                                   
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
        <h3 dir="rtl"><i class="fa fa-angle-left"></i>{$NewProduct_Add_New_Product}</h3>
        {else}
        <h3><i class="fa fa-angle-right"></i>{$NewProduct_Add_New_Product}</h3>
        {/if}
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            
            {if $return eq '1'}
            <div class="alert alert-success"><b>Well done!</b> Data saved Successfully.</div>
            {/if}
            
            {if $return eq '0'}
            <div class="alert alert-danger"><b>Unknown error </b>Data not saved.</div>
            {/if}
            
            <div class="alert"></div>
            
            
        <form {if $session_lang eq 'AR'} dir="rtl" {/if} class="cmxform form-horizontal style-form" id="commentForm" method="post" action="#">      
               
                <div class="form-group">
                  {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewProduct_Product_Name}</label>
                  {/if}
                  <div class="col-sm-10">
                     <input type="text" name="prod_name" id="prod_name" class="form-control" placeholder="{$NewProduct_Enter_Product_Name}" required>
                  </div>
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewProduct_Product_Name}</label>
                  {/if}
                  
                </div>                                 
                
                
         <div class="form-group">
                   {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewProduct_Product_Status}</label>
                  {/if}
                  <div class="col-sm-10">
                    <select class="form-control" name="status">
                      <option value="1">{$NewProduct_Active}</option>
                      <option value="0">{$NewProduct_Not_Active}</option>
                  </select>           
                  </div>                                                
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewProduct_Product_Status}</label>
                  {/if}
                </div>
                
         <div class="form-group">

                  {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewProduct_Product_Vendor}</label>                  
                  {/if}
                  <div class="col-sm-9">
                    <select class="form-control" name="vendor_id" id="vendor_id" >
                    {counter start=0 step=1 print=false name=bla}
                  {foreach from=$Vendors item=$vendor}
                      <option value="{$vendor.vendor_id}" selected="selected">{$vendor.vendor_name}</option>
                    {/foreach}                      
                  </select>       
                    <span class="input-group-btn add-on" dir="ltr">
                        <button data-toggle="modal" data-target="#myModalVendor" class="btn btn-theme"   data-placement="bottom" title="Add Vendor"
                <i class="fa fa-plus"></i>
              </button>
                     </span>                                                      
                  </div>        
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$NewProduct_Product_Vendor}</label>
                  {/if}                                        
                </div>                                
        
        <div class="form-group" >
                    {if $session_lang eq 'EN'}
                    <label for="agree" class="control-label col-lg-2 col-sm-3">{$NewProduct_Is_Product_with_managed_inventory}</label>
                    {/if}
                    
                    <div class="col-lg-10 col-sm-9">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" name="manageable" value="1" id="manageable" />
                    </div>
                    {if $session_lang eq 'AR'}
                    <label for="agree" class="control-label col-lg-2 col-sm-3">{$NewProduct_Is_Product_with_managed_inventory}</label>
                    {/if}
                  </div>
                
                <div class="form-group ">
                 {if $session_lang eq 'EN'}
                    <label for="ccomment" class="control-label col-lg-2">{$NewProduct_Product_Descriptions}</label>
                 {/if}
                    <div class="col-lg-10">
                      <textarea class="form-control " id="Descriptions" name="Descriptions"></textarea>
                    </div>
                 {if $session_lang eq 'AR'}
                    <label for="ccomment" class="control-label col-lg-2">{$NewProduct_Product_Descriptions}</label>
                 {/if}
                 
                  </div>
                  
        
        <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="AddNewProduct" value="Save">{$btn_Save}</button>
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
                <h4 dir="rtl"><i class="fa fa-angle-left"></i>{$NewProduct_Product_List}</h4>
                {else}                
                <h4><i class="fa fa-angle-right"></i>{$NewProduct_Product_List}</h4>
                {/if}
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i>{$NewProduct_Product_Name}</th>
          <th><i class="fa fa-bullhorn"></i>{$NewProduct_Product_Vendor}</th>
                    <th><i class="fa fa-bullhorn"></i>{$NewProduct_Product_Status}</th>
                    <th><i class=" fa fa-check"></i>{$NewProduct_managed}</th>
                    <th></th>
                  </tr>
                </thead>
               <tbody align="left">             
               
               {foreach from=$Products item=$product}       
                  <tr>
                    <td><a href="basic_table.html#">{$product.prod_name}</a></td>
                    <td class="hidden-phone">{$product.vendor_name}</td>
                    
                    {if $product.status eq 1}
                    <td><span class="label label-success label-mini">{$NewProduct_Active}</span></td>
                    {else}
                    <td><span class="label label-danger label-mini">{$NewProduct_Not_Active}</span></td>
                    {/if}
                    
                    {if $product.manageable eq 1}
                    <td><button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button></td>
                    {else}
                    <td><button class="btn btn-success btn-xs"><i class=" fa fa-square"></i></button></td>
                    {/if}                                        
                    
                    <td>    
                      <button class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="bottom" title="Change Status">
            <i class="fa fa-retweet"></i>
            </button>                      
                      <button class="btn btn-success btn-xs" data-target="#myModalParoduct{$product.prod_id}" data-toggle="modal" data-placement="bottom" title="Reset Package">
            <i class="fa fa-pencil"></i>
            </button>
            <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="Delete Product">
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
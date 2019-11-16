{include file='../../mView/includes/header.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}


  {foreach from=$StoresList item=$Store}   
<div class="modal fade" id="myModalStore{$Store.storeId}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

               <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">{$CreateStore_Edit_customer_Class}</h4>
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
                  <label class="col-sm-2 col-sm-2 control-label">{$CreateStore_Store_Name}</label>
                  <div class="col-sm-6">
                    <input class="form-control " id="store_name" value="{$Store.store_name}" type="text" name="store_name" placeholder="{$CreateStore_Enter_Store_Name}"  required/>
                  </div>
                </div>  

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$CreateStore_Store_Types}</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="store_type" value= "{$Store.store_type_name}" id="store_type">     
                    <option value="0"  >{$CreateStore_Select_Store_Type}</option>               
                      <option value="1"  >{$CreateStore_Normal_Store}</option>
                      <option value="2"  >{$CreateStore_Shipping_Store}</option>
                      <option value="3"  >{$CreateStore_Return_Store}</option>                                          
                  </select>           
                  </div> 
                </div> 


                 <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$CreateStore_Store_Status}</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="Store_status" value="{$Store.store_status_name}" id="Store_status">     
                    <option value="0"  >{$CreateStore_Select_Store_Status}</option>               
                      <option value="1"  >{$CreateStore_Active}</option>
                      <option value="2"  >{$CreateStore_Not_Active}</option>
                  </select>           
                  </div>   
                </div>  
                  
                

               <input type="hidden" name="storeId" id="storeId" value="{$Store.storeId}" />
               
         
        
         
        <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="UpdateStore" value="UpdateStore">{$CreateStore_Update_Info}</button> 
                                                       
                      <button class="btn btn-theme04" type="button" data-dismiss="modal">{$CreateStore_Cancel}</button>
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
        <h3><i class="fa fa-angle-right"></i>{$CreateStore_Create_New_Store}</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
  <form dir="rtl" class="cmxform form-horizontal style-form" id="commentForm" method="post" action="#">
			{if $success_msg neq ''}
            <div class="alert alert-success"><b>Well done!</b> {$success_msg}</div>
            {/if}
            
            {if $error_msg neq ''}
            <div class="alert alert-danger"><b>Error:{$error_msg}</div>
            {/if}
 
               
               <div class="form-group">
                 {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$CreateStore_Store_Name}</label>
                  {/if}
                  <div class="col-sm-6">
                    <input class="form-control " id="store_name" type="text" name="store_name" placeholder="{$CreateStore_Enter_Store_Name}"  required/>
                  </div>
                   {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$CreateStore_Store_Name}</label>
                  {/if}    
                </div>    
                
              
                <div class="form-group">
                   {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$CreateStore_Store_Types}</label>
                  {/if}
                  <div class="col-sm-6">
                    <select class="form-control" name="store_type" id="store_type">     
                    <option value="0"  >{$CreateStore_Select_Store_Type}</option>               
                      <option value="1"  >{$CreateStore_Normal_Store}</option>
                      <option value="2"  >{$CreateStore_Shipping_Store}</option>
                      <option value="3"  >{$CreateStore_Return_Store}</option>                                          
                	</select>           
                  </div> 
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$CreateStore_Store_Types}</label>
                  {/if}   
                </div>      
                
                 <div class="form-group">
                  {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$CreateStore_Store_Status}</label>
                  {/if}
                  <div class="col-sm-6">
                    <select class="form-control" name="Store_status" id="Store_status">     
                    <option value="0"  >{$CreateStore_Select_Store_Status}</option>               
                      <option value="1"  >{$CreateStore_Active}</option>
                      <option value="2"  >{$CreateStore_Not_Active}</option>
                	</select>           
                  </div>  
                   {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$CreateStore_Store_Status}</label>
                  {/if}  
                </div>      
                 	                      
        
        <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
        <button class="btn btn-theme" name="submit" value="Save_store" type="submit">{$btn_Save}</button>
        <button class="btn btn-theme04" name="submit" type="submit" value="Cancel">{$btn_Cancel}</button>
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
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>{$CreateStore_Store_List}</h4>
                <hr>
                <thead>
                  <tr>
                    <th>{$CreateStore_Store_Name}</th>
                    <th><i class="fa fa-bullhorn"></i>{$CreateStore_Store_Type}</th>
                    <th><i class="fa fa-bullhorn"></i>{$CreateStore_Status}</th>                    
                    <th><i class="fa fa-bullhorn"></i>{$CreateStore_Created_Date}</th>
                    <th></th>
                  </tr>
                </thead>
               <tbody> 
               
               {foreach from=$StoresList item=$Store}                        
                  <tr>
                    <td>{$Store.store_name}</td>
                    <td>{$Store.store_type_name}</td>
                    <td>{$Store.store_status_name}</td>                    
                    <td class="hidden-phone">{$Store.created_dt}</td>                    
                    <td> 	
                                     	 
                      <button class="btn btn-success btn-xs" data-target="#myModalStore{$Store.storeId}" data-toggle="modal" data-placement="bottom" title="Reset customer class">
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
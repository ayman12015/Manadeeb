{include file='../../mView/includes/header.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}


 {foreach from=$ProductStore item=$Store}  
<div class="modal fade" id="myModalclasEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">{$ProductsStore_Edit_Customers_class_Data}</h4>
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
                  <label class="col-sm-2 col-sm-2 control-label">{$CustomersClasse_Class_Name}</label>
                  <div class="col-sm-10">
                    <input class="form-control " value="{$cls.cls_name}" id="Class_Name" type="text" name="Class_Name" placeholder="{$Enter_CustomersClasse_Class_Name}"  required/>
                  </div>                                  
                </div>    
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$CustomersClasse_Class_Sales_Status}</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="Sales_Status" value="{$cls.cls_SalesStatus}" id="Sales_Status">     
                    <option value="0"  >{$ProductsStore_Select_Store_Status}</option>               
                      <option value="0"  >{$ProductsStore_Active}</option>
                      <option value="1"  >{$ProductsStore_Not_Active}</option>
                  </select>           
                  </div> 
 
                </div>   
            
                                                                                   
                
                
                  
        
             
               <input type="hidden" name="cls_id" id="cls_id" value="{$cls.cls_id}" />
               
        
        
        
        <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="UpdateCustomerClass" value="UpdateCustomerClass">{$ProductsStore_Update_Info}</button>                                   
                      <button class="btn btn-theme04" type="button" data-dismiss="modal">{$ProductsStore_Cancel}</button>
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
        <h3><i class="fa fa-angle-right"></i>{$ProductsStore_Add_New_Product_to_Store}</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
  <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="ProductsStore.php">
			{if $success_msg neq ''}
            <div class="alert alert-success"><b>Well done!</b> {$success_msg}</div>
            {/if}
            
            {if $error_msg neq ''}
            <div class="alert alert-danger"><b>Error:{$error_msg}</div>
            {/if}
 
               
               <div class="form-group">
                 {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$ProductsStore_Store_Name}</label>
                  {/if}
                  <div class="col-sm-6">
                    <select class="form-control" name="storeId" id="Shipping_storeId" onchange="getStoreAvalableQTY(this.value)">
                    <option value="0"  >{$ProductsStore_Select_Store_Name}</option>               
                    {foreach from=$Stores item=$Store} 
                      <option value="{$Store.storeId}"  >{$Store.store_name}</option>
                    {/foreach}                    
                                          
                	</select>           
                  </div>  
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$ProductsStore_Store_Name}</label>
                  {/if}  
                </div>    
                
              
                <div class="form-group">
                  {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$ProductsStore_Product_Name}</label>
                  {/if}
                  <div class="col-sm-6">
                    <select class="form-control" name="priceId" id="priceId" onchange="getStoreAvalableQTY()">     
                    <option value="0"  >{$ProductsStore_Select_Product_Name}</option>               
                    {foreach from=$Products item=$Product} 
                      <option value="{$Product.priceId}"  >{$Product.ProdNamePackage}</option>
                    {/foreach}                                                              
                	</select>           
                    
                    <label class="col-sm-2 control-label" >
                    <span class="badge bg-important">
                    <div id="AvalableQTYVal">{$ProductsStore_Avalable_QTY}</div>
                     </span>                    
                    </label>  
                    
                  </div>  
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$ProductsStore_Product_Name}</label>
                  {/if}  
                </div>       
                
                        
        <div class="form-group">
         {if $session_lang eq 'EN'}
        <label class="col-sm-2 col-sm-2 control-label">{$ProductsStore_Product_QTY}.</label>
        {/if}
        <div class="col-sm-3">
        <input class="form-control " id="qty" type="text" name="qty" placeholder="{$ProductsStore_Enter_Product_QTY}"  required/>
        </div>
         {if $session_lang eq 'AR'}
        <label class="col-sm-2 col-sm-2 control-label">{$ProductsStore_Product_QTY}.</label>
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
                <h4><i class="fa fa-angle-right"></i>{$ProductsStore_Store_List}</h4>
                <hr>
                <thead>
                  <tr>
                    <th>{$ProductsStore_Store_Name}</th>
                    <th><i class="fa fa-bullhorn"></i>{$ProductsStore_Product_Name}</th>
                    <th><i class="fa fa-bullhorn"></i>{$ProductsStore_Product_Package}</th>
                    <th><i class="fa fa-bullhorn"></i>{$ProductsStore_QTY}</th>
                    <th><i class="fa fa-bullhorn"></i>{$ProductsStore_Movement_Type}</th>
                    <th><i class="fa fa-bullhorn"></i>{$ProductsStore_Movement_Entre_Date}</th>
                    <th></th>
                  </tr>
                </thead>
               <tbody> 
               
               {foreach from=$ProductStore item=$Store}                        
                  <tr>
                    <td>{$Store.store_name}</td>
                    <td>{$Store.prod_name}</td>
                    <td>{$Store.package_name}</td>
                    <td class="hidden-phone">{$Store.qty}</td>
                    <td class="hidden-phone">{$Store.TranType}</td>
                    <td class="hidden-phone">{$Store.tran_date}</td>
                    <td> 		                    
                       <button class="btn btn-success btn-xs" data-target="#myModalclasEdit" data-toggle="modal" data-placement="bottom" title="Reset customer class">
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
		
        
         <!-- row -->
        <div class="row mt">
          <div class="col-md-6">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>{$ProductsStore_Products_In_Store}</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i>{$ProductsStore_Store_Namee}</th>
                    <th><i class="fa fa-bullhorn"></i>{$ProductsStore_Product_Name}</th>
                    <th><i class="fa fa-bullhorn"></i>{$ProductsStore_Package}</th>
                    <th><i class="fa fa-bullhorn"></i>{$ProductsStore_QTY_AVALABLE}</th>	
                  </tr>
                </thead>
               <tbody> 
               
               {foreach from=$ProductInStore item=$prod}                        
                  <tr>
                    <td>{$prod.store_name}</td>
                    <td>{$prod.prod_name}</td>
                    <td>{$prod.package_name}</td>
                    <td class="hidden-phone">{$prod.QTY_AVALABLE}</td>                                        
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
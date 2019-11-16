{include file='../../mView/includes/header.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}


<div class="modal fade" id="UpdateReturnValue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">{$NewShipmentment_Update_Returned_Value}</h4>
                    </div>
						<form name="form1" action="NewShipmentment.php?selected={$selected}" method="post">
                    <div class="modal-body">                      
                        <div class="form-group">
                          <label class="col-sm col-sm control-label">{$NewShipmentment_Shipping_ID}</label>
                          <div class="col-sm">
                             <input type="text" id="ShippingID" name="ShippingID" class="form-control" placeholder="Shipping ID" readonly="readonly" required>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="col-sm col-sm control-label">{$NewShipmentment_Product_Name}</label>
                          <div class="col-sm">
                             <input type="text" id="ProductName" name="ProductName" class="form-control" placeholder="{$NewShipmentment_Product_Name}" readonly="readonly" required>
                          </div>
                        </div>
<input type="hidden" id="old_qty" name="old_qty" value="" />
                        
                        
                        <div class="form-group">
                          <label class="col-sm col-sm control-label">{$NewShipmentment_Returned_Value}</label>
                          <div class="col-sm">
                             <input type="text" id="return" name="return" class="form-control" placeholder="{$NewShipmentment_Enter_Returned_Value}" required>
                          </div>
                        </div>   
                        
                        
                  <div class="form-group">
                  <label class="col-sm col-sm control-label">{$NewShipmentment_Store_Name}</label>
                  <div class="col-sm">
                    <select class="form-control" name="storeId" id="storeId">     
                    {foreach from=$StoresList item=$Stores} 
                      <option value="{$Stores.storeId}" {if $Stores.store_type eq 3} selected="selected" {/if}  >{$Stores.store_name}</option>
                    {/foreach}                                                              
                	</select>           
                  </div>    
                
                </div>  
                                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">{$NewShipmentment_Cancel}</button>
                      <button type="submit" name="submit_return" class="btn btn-primary">{$NewShipmentment_Add_Returned}</button>
                    </div>
                    </form>                    
                  </div>
                </div>
              </div>       
              
              
<div class="modal fade" id="ProductsReceipt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Shipped Products Receipt</h4>
                    </div>
                    <form name="formprint" action="#?Vendor" method="post">
                 
                    <div class="modal-body">                      
                    
                     <div class="invoice-body">
                <div class="pull-left">
                  <h1>Manadeeb</h1>
                  <address>
                <strong>{$COM_company_name}.</strong><br>
                {$COM_Address}<br>
                {$COM_City}, {$COM_Country}<br>
                <abbr title="Phone">P:</abbr> {$COM_tell}
              </address>
                </div>
                <!-- /pull-left -->
                <div class="pull-right">
                  <h2>RECEIVE INVOICE</h2>
                </div>
                <!-- /pull-right -->
                <div class="clearfix"></div>
                <br>
                <br>
                <br>
                <div class="row">
                  <div class="col-md-9">
                    <h4>{$USR_username}</h4>
                    <address>
                  <strong>Received And Responsible.</strong><br>
                  {$COM_City}, {$COM_Country}<br>
                  {$USR_email}<br>
                  <abbr title="Phone">P:</abbr> {$USR_phone}
                </address>
                  </div>
                  <!-- /col-md-9 -->
                  <div class="col-md-3">
                    <br>
                    <div>
                      <div class="pull-left"> INVOICE NO : </div>
                      <div class="pull-right"> #{$INVOICE_NO} </div>
                      <div class="clearfix"></div>
                    </div>
                    <div>
                      <!-- /col-md-3 -->
                      <div class="pull-left"> INVOICE DATE : </div>
                      <div class="pull-right"> {$INVOICE_DATE} </div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- /row -->
                    <br>
                     
                  </div>
                  <!-- /invoice-body -->
                </div>
                <!-- /col-lg-10 -->
                <table class="table">
                  <thead>
                  
                    <tr>
                      <th style="width:60px" class="text-center">QTY</th>
                      <th class="text-left">DESCRIPTION</th>
                      <th style="width:140px" class="text-right">UNIT PRICE</th>
                      <th style="width:140px" class="text-right">PAID AMT.</th>
                      <th style="width:115px" class="text-right">PENDING AMT.</th>
                    </tr>
                   
                  </thead>
                  <tbody>
                    {foreach from=$ShipmentmentFinanceList item=$FList}
                    <tr>
                      <td class="text-center">{$FList.qty}</td>
                      <td>{$FList.ProdNamePackage}</td>
                      <td class="text-right">{$FList.ProductPackagePrice}</td>
                      <td class="text-right">{$FList.PaidAmount}</td>
                      <td class="text-right">{$FList.Pending}</td>
                    </tr>
                    {/foreach}
                     
                      <td colspan="3" rowspan="5">
                        <h4>Terms and Conditions</h4>
                        <p>Thank you for your business, please process this invoice within the time.</p>
                        <td class="text-right"><strong>Subtotal</strong></td>
                        <td class="text-right">{$FList.toalPendingAmt}</td>
                    </tr>
                     <tr>
                      <td class="text-right no-border"><strong>Shipping</strong></td>
                      <td class="text-right">0.00</td>
                    </tr>
                    <tr>
                      <td class="text-right no-border"><strong>VAT Included in Total</strong></td>
                      <td class="text-right">0.00</td>
                    </tr>
                    <tr>
                      <td class="text-right no-border">
                        <div class="well well-small green"><strong>Total</strong></div>
                      </td>
                      <td class="text-right"><strong>{$FList.toalPendingAmt}</strong></td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <br>
              </div>
                        
                    
	                </div>                                
	
    			 
                 
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" name="submit_vendor" class="btn btn-primary">Print Receipt</button>
                    </div>
                    </form>                    
                  </div>
                </div>
              </div>  
              
              
              
     <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!-- page start-->
        <div class="row mt">
          <div class="col-sm-3">
            <section class="panel">
            
              <div class="panel-body">     
                         <h4 class="gen-case">
                    {$NewShipmentment_Users_List}                   
                  </h4>
                <ul class="nav nav-pills nav-stacked mail-nav">
{foreach from=$Users item=$user} 
 
{if $selected eq $user.id}
<li class="active"><a href="?selected={$user.id}"><i class="fa fa-male"></i> {$user.username}  <span class="label label-theme pull-right inbox-notification">{$user.NotComplete}</span></a></li>
{else}
<li class=""><a href="?selected={$user.id}"> <i class="fa fa-male"></i> {$user.username}   <span class="label label-theme pull-right inbox-notification">{$user.NotComplete}</span></a></li> 
{/if}

{/foreach}        
                </ul>
              </div>
              
              <hr />
              
              
              <div class="panel-body">     
                         <h4 class="gen-case">
                    {$NewShipmentment_Customers_Requests}                   
                  </h4>
                <ul class="nav nav-pills nav-stacked mail-nav">

{if $selected neq ''}
    {foreach from=$CustomersRequest item=$rqu} 
    <li class="active"><a href="?selected={$user.id}"><i class="fa fa-male">
    </i> {$rqu.ProdName}<span class="label label-theme pull-right inbox-notification">{$rqu.qty}</span></a></li>
    {/foreach}
{/if}

                </ul>
              </div>
              
      
      {if $selected neq ''}   
               <hr />
             
             
              <div class="panel-body">     
                         <h4 class="gen-case">
                    {$NewShipmentment_Proposed_Quantities}                   
                  </h4>
                <ul class="nav nav-pills nav-stacked mail-nav">
 
{if $selected neq ''}
<li class="active"><a href="?selected={$user.id}"><i class="fa fa-male">
</i> فراخ ميكو جوال صغير <span class="label label-theme pull-right inbox-notification">75</span></a></li>

<li class="active"><a href="?selected={$user.id}"><i class="fa fa-male">
</i> فراخ ميكو جوال كبير <span class="label label-theme pull-right inbox-notification">86</span></a></li>


<li class="active"><a href="?selected={$user.id}"><i class="fa fa-male">
</i> فراخ ميكو صدور <span class="label label-theme pull-right inbox-notification">16</span></a></li>


<li class="active"><a href="?selected={$user.id}"><i class="fa fa-male">
</i> فراخ ميكو افخاد <span class="label label-theme pull-right inbox-notification">25</span></a></li>


{/if}
 
     
                </ul>
              </div>
              
              {/if}
              
               
              
            </section>           
          </div>
          
          
          
          
          
          
          
          
          
          
          <div class="col-sm-9">
            <section class="panel">
            <header class="panel-heading wht-bg">
              {if $session_lang eq 'EN'}
                <h4 class="gen-case">
                    {$New_Shipmentment_Product_Shipment}                  
                </h4>
                {/if}
                {if $session_lang eq 'AR'}
                <h4 class="gen-case">
                    {$New_Shipmentment_Product_Shipment}                  
                </h4>
                {/if}
            </header>
               <!--main content start-->                             
        <!-- BASIC FORM ELELEMNTS -->
        
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
				<form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="#">		
            
            {if $success_msg neq ''}
            <div class="alert alert-success"><b>Well done!</b> {$success_msg}</div>
            {/if}
            
            {if $error_msg neq ''}
            <div class="alert alert-danger"><b>Error:{$error_msg}</div>
            {/if}
                	
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$NewShipmentment_Product_Name}</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="priceId" id="priceId" onchange="GetProductPackagePrice(this.value)">     
                    <option value="0"  >{$NewShipmentment_Select_Product_Name}</option>               
                    {foreach from=$Products item=$Product} 
                      <option value="{$Product.priceId}"  >{$Product.ProdNamePackage}</option>
                    {/foreach}                    
                                          
                	</select>           
                  </div>    
                </div>        
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$NewShipmentment_Store_Name}</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="storeId" id="Shipping_storeId" onchange="getStoreAvalableQTY()">     
                    {foreach from=$StoresList item=$Stores} 
                      <option value="{$Stores.storeId}" {if $Stores.store_type eq 2} selected="selected" {/if}  >{$Stores.store_name}</option>
                    {/foreach}                                                              
                	</select>     
                    
                    <label class="col-sm-2 control-label" >
                    <span class="badge bg-important">
                    <div id="AvalableQTYVal">{$NewShipmentment_Avalable_QTY}</div>
                     </span>                    
                    </label>  
                    
                          
                  </div>     
                </div>  
                                         
                
				<div class="form-group">
                 
                  
                  <label class="col-sm-2 control-label">{$NewShipmentment_Product_Package_Price}</label>
                  <div class="col-sm-2">
                     <input type="text" id="ProductPackagePrice" name="ProductPackagePrice" class="form-control" placeholder="0.00" required disabled="disabled">   
                  </div>
                  
                   <label class="col-sm-2 control-label">{$NewShipmentment_Quantity}</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="qty" id="qty" placeholder="{$NewShipmentment_Enter_QTY}" required onchange="GetTotalPrice(this.value)">     
                  </div>
                                                                  
                </div>
                
                
				 <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$NewShipmentment_Total_Price}</label>
                  <div class="col-sm-3">
                   <input type="text" class="form-control" name="TotalPrice" id="TotalPrice" placeholder="0.00" required disabled="disabled">                                
                  </div>                                                
                </div>
                <input type="hidden" name="owner_id" value="{$selected}" />                                
							
                            
				<div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="submit" {if $selected eq ''} disabled="disabled" {/if} ><i class="fa fa-mail-forward">{$NewShipmentment_Add_to_Truck}</i></button>
                      
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
              <table class="table table-striped table-advance table-hover">
                <div class="form-group">
                <h4>
                <i class="fa fa-angle-right"></i>{$NewShipmentment_List_of_Shipped_Products}                
                    <button data-toggle="modal" data-target="#ProductsReceipt" class="btn btn-theme"   data-placement="bottom" title="Add Vendor">
                        <i class="fa fa-print">{$NewShipmentment_Print_Shipped_Products}</i>
                    </button>
                </div>    
                </h4>
                
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i>{$NewShipmentment_Product_Name}</th>
                    <th><i class="fa fa-bullhorn"></i>{$NewShipmentment_Quantity}</th>                    
					<th><i class="fa fa-bullhorn"></i>{$NewShipmentment_Product_Package_Price}</th>
                    <th><i class=" fa fa-check"></i>{$NewShipmentment_Total_Price}</th>
                    <th><i class="fa fa-bullhorn"></i>{$NewShipmentment_Payment_Status}</th>                    
                    <th></th>
                  </tr>
                </thead>
               <tbody>  
               
               {foreach from=$ShipmentmentList item=$List}                                  
                  <tr>
                    <td>
                      <a href="basic_table.html#">{$List.ProdNamePackage}</a>
                    </td>
                    <td class="hidden-phone">{$List.qty}</td>
                    <td class="hidden-phone">{$List.ProductPackagePrice}</td>
                    <td>{$List.TotalPrice}</td>
                    
					 <td><span class="{$List.spanclass}">{$List.PaymentStatus}</span></td>
                     
                     <td> 		                    
                     
                      
                                  
 <button data-toggle="modal" data-target="#UpdateReturnValue" onclick="SetReturneId('{$List.ShippingId}','{$List.ProdNamePackage}','{$List.qty}')" class="btn btn-success btn-xs"   data-placement="bottom" title="Returned Quantity">
		<i class="fa fa-retweet"></i>
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

    <!-- /MAIN CONTENT -->
    <!--main content end-->
          </div>
        </div>
      </section>
      <!-- /wrapper -->
    </section>

      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->  
{include file='../../mView/includes/footer.tpl'}
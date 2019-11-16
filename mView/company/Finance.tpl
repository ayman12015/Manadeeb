{include file='../../mView/includes/header.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}

<div class="modal fade" id="myModalVendor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                  <h1>DASHIO</h1>
                  <address>
                <strong>Admin Theme, Inc.</strong><br>
                795 Asome Ave, Suite 850<br>
                New York, 94447<br>
                <abbr title="Phone">P:</abbr> (123) 456-7890
              </address>
                </div>
                <!-- /pull-left -->
                <div class="pull-right">
                  <h2>Receive Receipt</h2>
                </div>
                <!-- /pull-right -->
                <div class="clearfix"></div>
                <br>
                <br>
                <br>
                <div class="row">
                  <div class="col-md-9">
                    <h4>Paul Smith</h4>
                    <address>
                  <strong>Enterprise Corp.</strong><br>
                  234 Great Ave, Suite 600<br>
                  San Francisco, CA 94107<br>
                  <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>
                  </div>
                  <!-- /col-md-9 -->
                  <div class="col-md-3">
                    <br>
                    <div>
                      <div class="pull-left"> INVOICE NO : </div>
                      <div class="pull-right"> 000283 </div>
                      <div class="clearfix"></div>
                    </div>
                    <div>
                      <!-- /col-md-3 -->
                      <div class="pull-left"> INVOICE DATE : </div>
                      <div class="pull-right"> 15/03/14 </div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- /row -->
                    <br>
                    <div class="well well-small green">
                      <div class="pull-left"> Total Due : </div>
                      <div class="pull-right"> 8,000 USD </div>
                      <div class="clearfix"></div>
                    </div>
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
                      <th style="width:90px" class="text-right">TOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">1</td>
                      <td>Flat Pack Heritage</td>
                      <td class="text-right">$429.00</td>
                      <td class="text-right">$429.00</td>
                    </tr>
                    <tr>
                      <td class="text-center">2</td>
                      <td>Carry On Suitcase</td>
                      <td class="text-right">$300.00</td>
                      <td class="text-right">$600.00</td>
                    </tr>
                    <tr>
                      <td colspan="2" rowspan="4">
                        <h4>Terms and Conditions</h4>
                        <p>Thank you for your business. We do expect payment within 21 days, so please process this invoice within that time. There will be a 1.5% interest charge per month on late invoices.</p>
                        <td class="text-right"><strong>Subtotal</strong></td>
                        <td class="text-right">$1029.00</td>
                    </tr>
                    <tr>
                      <td class="text-right no-border"><strong>Shipping</strong></td>
                      <td class="text-right">$0.00</td>
                    </tr>
                    <tr>
                      <td class="text-right no-border"><strong>VAT Included in Total</strong></td>
                      <td class="text-right">$0.00</td>
                    </tr>
                    <tr>
                      <td class="text-right no-border">
                        <div class="well well-small green"><strong>Total</strong></div>
                      </td>
                      <td class="text-right"><strong>$1029.00</strong></td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <br>
              </div>
                        
                    
	                </div>                                
	
    			 
                 
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
                    {$Finance_Users_List}                   
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
            </section>
             
          </div>
          
          <div class="col-sm-9">
            <section class="panel">
            <header class="panel-heading wht-bg">
              {if $session_lang eq 'EN'}
                <h4 class="gen-case">
                    {$Finance_Finance_Receipt_Payment}                  
                </h4>
                {/if}
                {if $session_lang eq 'AR'}
                <h4 class="gen-case">
                    {$Finance_Finance_Receipt_Payment}                  
                </h4>
                {/if}
            </header>
               <!--main content start-->                             
        <!-- BASIC FORM ELELEMNTS -->
        
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
				<form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="{$REQUEST_URI}">		
            
            {if $success_msg neq ''}
            <div class="alert alert-success"><b>Well done!</b> {$success_msg}</div>
            {/if}
            
            {if $error_msg neq ''}
            <div class="alert alert-danger"><b>Error:{$error_msg}</div>
            {/if}
                        
            
                <div class="form-group">
                  
                  <label class="col-sm-2 col-sm-2 control-label">{$Finance_Product_Name}</label>
                  <div class="col-sm-6">                   
                    <input type="text" class="form-control" value="{$ProductName}"  name="ProdName" id="ProdName" placeholder="" required readonly="readonly">                             
                  </div>    
                </div>                                 
                
				<div class="form-group">
                                   
                      <label class="col-sm-2 control-label">{$Finance_Product_Package_Price}</label>
                      <div class="col-sm-2">
                         <input type="text" id="ProductPackagePrice" name="ProductPackagePrice" value="{$ProductPackagePrice}" class="form-control" placeholder="0.00" required readonly="readonly">   
                      </div>
                      
                       <label class="col-sm-2 control-label">{$Finance_Quantity}</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="qty" id="qty" value="{$qty}" placeholder="0.00" required readonly="readonly">     
                      </div>       
                                                                             
                 </div>
                
				<div class="form-group">                 
                  
                  <label class="col-sm-2 control-label">{$Finance_Total_Amount}</label>
                  <div class="col-sm-2">
                     <input type="text" id="ProductPackagePrice" name="TotalPrice" value="{$TotalPrice}" class="form-control" placeholder="0.00" required readonly="readonly">   
                  </div>
                  
                   <label class="col-sm-2 control-label">{$Finance_Remaining_Balance}</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="RemainingBalance" id="RemainingAmount" value="{$RemainingBalance}" placeholder="0.00" required readonly="readonly">        
                  </div>
                                                                  
                </div>
                
                
				 <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$Finance_Amount}</label>
                  
                  <div class="col-sm-3">
                  <input type="text" class="form-control" {if $selected eq '' or $Receipt_id eq ''} disabled="disabled"  {/if} 
                  name="NewAmount" 
                  id="NewAmount" 
                  align="middle" 
                  placeholder="0.00" 
                  required >
                  
                  </div>
                                                                  
                  
                </div>
                <input type="hidden" name="owner_id" value="{$selected}" />                                
							
				<div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">					
                    
                    
                    <button class="btn btn-theme" type="submit" name="submit" value="AddReceiptPayment" 
                    {if $selected eq '' or $Receipt_id eq ''} disabled="disabled"  {/if} >
                    <i class="fa fa-mail-forward">{$Finance_Add_Receipt_Payment}</i>
                    </button>                                                            
                      
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
        
 
             
 
 <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
   
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>{$Finance_User_Pending_Receipt}</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>{$Finance_Product_Name}</th>
                    <th>{$Finance_Quantity}</th>                    
                    <th class="hidden-phone">{$Finance_Price}</th>
                    <th class="hidden-phone">{$Finance_Total_Amount}</th>
                    <th class="hidden-phone">{$Finance_Paid_Amount}</th>
                    <th class="hidden-phone">{$Finance_Pending_Amount}</th>
                    <th class="hidden-phone">{$Finance_Shipping_Date}</th>
                    <th class="hidden-phone">{$Finance_Action}</th>
                  </tr>
                </thead>
                <tbody>
                 {foreach from=$ShipmentmentList item=$List}   
                  <tr class="gradeX">
                    <td><a href="../company/rptProductsPackagesPrice.php?selected={$List.priceId}" target="_blank">{$List.ProdNamePackage}</a></td>
                    <td>{$List.qty}</td>
                    <td class="hidden-phone">{$List.ProductPackagePrice}</td>
                    <td class="center hidden-phone">{$List.TotalPrice}</td>
                    <td class="center hidden-phone">{$List.PaidAmount}</td>
                    <td class="center hidden-phone">{$List.Pending}</td>
                     <td class="center hidden-phone">{$List.Shipping_dt}</td>
                    <td class="center hidden-phone"><a href="../../controllers/company/Finance.php?selected={$selected}&ShippingId={$List.ShippingId}">Add Payment</a></td>                    
                  </tr>
                 {/foreach} 
                  <tr>
                      <td colspan="3"><strong>{$Finance_Total}</strong></td>
                      <td><strong>{$List.toalTotalPrice}</strong></td>                      
                      <td><strong>{$List.toalPaidAmt}</strong></td>                      
                      <td><strong>{$List.toalPendingAmt}</strong></td>                     
                 </tr>
                 
                                 
                </tbody>
              </table>           
     
    </section>
    <!-- /MAIN CONTENT -->
    
    
    
			  
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
{include file='../../mView/includes/footer_pagination.tpl'}
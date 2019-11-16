{include file='../../mView/includes/rptheader.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>{$rptTrucksShipmentment_Trucks_Shipmentments_Report}</h3>
        <div class="row mt">
          <div class="col-lg-12">
          
          <hr>
          
          <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
             
              <form class="form-horizontal style-form" method="post" action="#" >
 
                <div class="form-group">
                  <label class="control-label col-md-2">{$rptTrucksShipmentment_User_Name}</label>
                  <div class="col-md-4">
                    <select class="form-control" name="owner_id" id="owner_id">    
        <option value="0">Select User Name</option>               
        {foreach from=$Users item=$user}  
          <option value="{$user.id}" {if $selected eq $user.id } selected="selected" {/if} >
           {$user.username}</option>
        {/foreach}                                             
        </select>      
                    
                  </div>
                </div>
                 
                
                <div class="form-group">
                  <label class="control-label col-md-2">{$rptTrucksShipmentment_Date_Range}</label>
                  <div class="col-md-4">
                    <div class="input-group input-large" data-date="01/01/2019" data-date-format="yyyy-mm-dd">
                      <input type="text" value="{$dtFrom}" class="form-control dpd1" name="dtfrom">
                      <span class="input-group-addon">{$rptTrucksShipmentment_To}</span>
                      <input type="text" value="{$dtTo}" class="form-control dpd2" name="dtto">
                    </div>
                    <span class="help-block">{$rptTrucksShipmentment_Select_date_range}</span>
                  </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10" align="right">
            <button class="btn btn-theme" type="submit" name="rptsubmit" value="rptsubmit">{$rptTrucksShipmentment_Preview_Report}</button>
		            </div>
          	</div>
            
              </form>
            
            
                  
          </div>
          <!-- /col-lg-12 -->
        </div>   
             
          <hr> 
              
<div id="rptPrint">
            <div class="content-panel">
  
              <h4><i class="fa fa-angle-right"></i>{$rptTrucksShipmentment_Report_Name_Trucks_Shipmentments}</h4>
              <h4><i class="fa fa-angle-right"></i> {$rptActiveUsersWeb_Report_Date}  {$reportDate}</h4>
              {if $selected neq ''}
              <h4><i class="fa fa-angle-right"></i> User Name: {$UsrName}</h4>
              <h4><i class="fa fa-angle-right"></i> Shipmentments Date Range: {$dtFrom} <strong>To</strong> {$dtTo}
        
        </h4>
        {/if}
        
        
               <p>&nbsp;</p>

              <h4> </h4>
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>{$rptTrucksShipmentment_NO}</th>
                      <th>{$rptTrucksShipmentment_Product_Name}</th>
                      <th class="numeric">{$rptTrucksShipmentment_Product_QTY}</th>
                      <th class="numeric">{$rptTrucksShipmentment_Product_Package_Price}</th>
                      <th class="numeric">{$rptTrucksShipmentment_Product_Total_Price}</th>
                      <th class="numeric">{$rptTrucksShipmentment_Shipping_Date}</th>
                      <th class="numeric">{$rptTrucksShipmentment_Payment_Status}</th>
                    </tr>
                  </thead>
                  <tbody>
                  {foreach from=$ShipmentmentList item=$Shipmentment}     
                    <tr>
                      <td>{$Shipmentment.mycount}</td>
                      <td>{$Shipmentment.ProdNamePackage}</td>
                      <td class="numeric">{$Shipmentment.qty}</td>
                      <td class="numeric">{$Shipmentment.ProductPackagePrice}</td>
                      <td class="numeric">{$Shipmentment.TotalPrice}</td>
                      <td class="numeric">{$Shipmentment.ShippingDate}</td>
                      <td><span class="{$Shipmentment.spanclass}">{$Shipmentment.PaymentStatus}</span></td>
                    </tr>
                  {/foreach}   
                 
                  </tbody>
                </table>
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10" align="right">
                <button class="btn btn-theme" type="button" name="rptPrint" value="rptPrint" onclick="rptPrint('rptPrint')">{$rptTrucksShipmentment_Print_Report}</button>
                    </div>
                  </div>
                  
                <p>&nbsp;</p>
                 
                  
              </section>
            </div>
            <!-- /content-panel -->
            </div>
            <!-- /rptPrint -->
          </div>
          <!-- /col-lg-4 -->
        </div>
        <p><!-- /row --></p>
        <p>&nbsp;</p>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->  
{include file='../../mView/includes/rptfooter.tpl'}
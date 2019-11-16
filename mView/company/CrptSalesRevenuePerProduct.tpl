{include file='../../mView/includes/rptheader.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>{$CrptSalesRevenuePerProduct_Sales_Revenue_PerProduct_Report}</h3>
        <div class="row mt">
          <div class="col-lg-12">
          
          <hr>
          
          <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
             
              <form class="form-horizontal style-form" method="post" action="#" >
 
                <div class="form-group">
                  <label class="control-label col-md-2">{$CrptSalesRevenuePerProduct_Product_Name}</label>
                  <div class="col-md-4">
                    <select class="form-control" name="prod_id" id="prod_id">    
        <option value="0">Select Product Name</option>               
        {foreach from=$Products item=$Product}  
          <option value="{$Product.prod_id}" {if $prod_id eq $Product.prod_id } selected="selected" {/if} >
           {$Product.prod_name}</option>
        {/foreach}                                             
        </select>      
                    
                  </div>
                </div>
                 
                
                <div class="form-group">
                  <label class="control-label col-md-2">{$CrptSalesRevenuePerProduct_Date_Range}</label>
                  <div class="col-md-4">
                    <div class="input-group input-large" data-date="01/01/2019" data-date-format="yyyy-mm-dd">
                      <input type="text" value="{$dtFrom}" class="form-control dpd1" name="dtfrom">
                      <span class="input-group-addon">{$CrptSalesRevenuePerProduct_To}</span>
                      <input type="text" value="{$dtTo}" class="form-control dpd2" name="dtto">
                    </div>
                    <span class="help-block">{$CrptSalesRevenuePerProduct_Select_date_range}</span>
                  </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10" align="right">
            <button class="btn btn-theme" type="submit" name="rptsubmit" value="rptsubmit">{$CrptSalesRevenuePerProduct_Preview_Report}</button>
		            </div>
          	</div>
            
              </form>
            
            
                  
          </div>
          <!-- /col-lg-12 -->
        </div>   
             
          <hr> 
<div id="rptPrint">
            <div class="content-panel">
  
              <h4><i class="fa fa-angle-right"></i>{$CrptSalesRevenuePerProduct_Report_Name_Sales_Revenue_PerProduct}</h4>          
              <h4><i class="fa fa-angle-right"></i> {$rptActiveUsersWeb_Report_Date}  {$reportDate}</h4>
              {if $dtFrom neq ''}
              <h4><i class="fa fa-angle-right"></i> Product Name: {$ProdName}</h4>
              <h4><i class="fa fa-angle-right"></i> Payments Date Range: {$dtFrom} <strong>To</strong> {$dtTo}
        
        </h4>
        {/if}
        
        
               <p>&nbsp;</p>

              <h4> </h4>
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                     <th>{$CrptSalesRevenuePerProduct_NO}</th>
                      <th>{$CrptSalesRevenuePerProduct_Vendor}</th>
                      <th>{$CrptSalesRevenuePerProduct_Product_Name}</th>
                      <th>{$CrptSalesRevenuePerProduct_Packages_Name}</th>                                            
                      <th class="numeric">{$CrptSalesRevenuePerProduct_Sales_QTY}</th>
                      <th class="numeric">{$CrptSalesRevenuePerProduct_Product_Cost}</th>
                      <th class="numeric">{$CrptSalesRevenuePerProduct_Product_Price}</th>   
                      <th class="numeric">{$CrptSalesRevenuePerProduct_Cost_Revenue}</th>
                      <th class="numeric">{$CrptSalesRevenuePerProduct_Sales_Revenue}</th>                   
                      <th class="numeric">{$CrptSalesRevenuePerProduct_Sales_Date}</th>
                    </tr>
                  </thead>
                 <tbody>
                  {foreach from=$SalesRevenueList item=$pay}     
                    <tr>
                      <td>{$pay.mycount}</td>                      
                      <td>{$pay.vendor_name}</td>
                      <td>{$pay.ProdName}</td>
                      <td>{$pay.SizerName}</td>                      
                      <td class="numeric">{$pay.SalesQTY}</td>   
                      <td class="numeric">{$pay.ProductCost}</td>   
                      <td class="numeric">{$pay.ProdPrice}</td>   
                      <td class="numeric">{$pay.CostRevenue}</td>   
                      <td class="numeric">{$pay.SalesRevenue}</td>   
                      <td class="numeric">{$pay.BillDate}</td>
                    </tr>
                  {/foreach}   
                  
                  <tr>
                      <td colspan="7"><strong>{$CrptSalesRevenuePerProduct_Total}</strong></td>
                      <td><strong>{$pay.totalCost}</strong></td>                      
                      <td><strong>{$pay.totalRevenue}</strong></td>                      
                 </tr>
                    
                 
                  </tbody>
                </table>
                
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10" align="right">
                <button class="btn btn-theme" type="button" name="rptPrint" value="rptPrint" onclick="rptPrint('rptPrint')">{$CrptSalesRevenuePerProduct_Print_Report}</button>
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
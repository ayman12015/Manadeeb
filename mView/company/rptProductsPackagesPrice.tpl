{include file='../../mView/includes/rptheader.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>{$rptProductsPackagesPrice_Product_Packages_Price_Report}</h3>
        <div class="row mt">
          <div class="col-lg-12">
          
          <hr>
           <div class="row mt">
            <div class="col-lg-5">
              
             {$rptProductsPackagesPrice_Product_Name}
        <select class="form-control" onchange="RptGoto('rptProductsPackagesPrice',this.value)">    
        <option value="0">Select Product Name</option>               
        {foreach from=$Products item=$Prod} 
          <option value="{$Prod.prod_id}" {if $selected eq $Prod.prod_id } selected="selected" {/if} >{$Prod.vendor_name} - {$Prod.prod_name}</option>
        {/foreach}                                             
        </select>           
                  
              
             </div>
             </div>
               <hr> 
              
              
<div id="rptPrint">
            <div class="content-panel">
  
              <h4><i class="fa fa-angle-right"></i>{$rptProductsPackagesPrice_Report_Name_Product_Packages_Price}</h4>
              <h4><i class="fa fa-angle-right"></i>{$rptActiveUsersWeb_Report_Date}  {$reportDate}</h4>
              {if $selected neq ''}
              <h4><i class="fa fa-angle-right"></i> Product Vendor :  
        {foreach from=$Products item=$Product}
        {if $selected eq $Product.prod_id } {$Product.vendor_name} {/if}
        {/foreach}
        </h4>
        {/if}
        
        {if $selected neq ''}
              <h4><i class="fa fa-angle-right"></i> Product Name :  
        {foreach from=$Products item=$Product}
        {if $selected eq $Product.prod_id } {$Product.prod_name} {/if}
        {/foreach}
        </h4>
        {/if}
        
        
               <p>&nbsp;</p>

              <h4> </h4>
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>{$rptProductsPackagesPrice_NO}</th>
                      <th>{$rptProductsPackagesPrice_Product_Name}</th>
                      <th class="numeric">{$rptProductsPackagesPrice_Package}</th>
                      <th class="numeric">{$rptProductsPackagesPrice_Product_Price}</th>
                      <th class="numeric">{$rptProductsPackagesPrice_Product_Cost}</th>
                      <th class="numeric">{$rptProductsPackagesPrice_REG_Date}</th>
                    </tr>
                  </thead>
                  <tbody>
                  {foreach from=$ProductsPackages item=$Product}     
                    <tr>
                      <td>{$Product.mycount}</td>
                      <td>{$Product.prod_name}</td>
                      <td class="numeric">{$Product.package_name}</td>
                      <td class="numeric">{$Product.ProductPrice}</td>
                      <td class="numeric">{$Product.ProductCost}</td>
                      <td class="numeric">{$Product.PriceDate}</td>
                    </tr>
                  {/foreach}   
                 
                  </tbody>
                </table>
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10" align="right">
                <button class="btn btn-theme" type="button" name="rptPrint" value="rptPrint" onclick="rptPrint('rptPrint')">{$rptProductsPackagesPrice_Print_Report}</button>
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
{include file='../../mView/includes/footer_pagination.tpl'}
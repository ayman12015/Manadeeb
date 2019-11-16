{include file='../../mView/includes/rptheader.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>{$CrptProductsSalesGeneral_Products_Sales_General_Report}</h3>
        <div class="row mt">
          <div class="col-lg-12">
          
          <hr>
          
          <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
             
              <form class="form-horizontal style-form" method="post" action="#" >
                                 
                <div class="form-group">
                  <label class="control-label col-md-2">{$CrptProductsSalesGeneral_Date_Range}</label>
                  <div class="col-md-4">
                    <div class="input-group input-large" data-date="01/01/2019" data-date-format="yyyy-mm-dd">
                      <input type="text" value="{$dtFrom}" class="form-control dpd1" name="dtfrom">
                      <span class="input-group-addon">{$CrptProductsSalesGeneral_To}</span>
                      <input type="text" value="{$dtTo}" class="form-control dpd2" name="dtto">
                    </div>
                    <span class="help-block">{$CrptProductsSalesGeneral_Select_date_range}</span>
                  </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10" align="right">
            <button class="btn btn-theme" type="submit" name="rptsubmit" value="rptsubmit">{$CrptProductsSalesGeneral_Preview_Report}</button>
		            </div>
          	</div>
            
              </form>
            
            
                  
          </div>
          <!-- /col-lg-12 -->
        </div>   
             
          <hr> 
            
            <div id="rptPrint">  
            <div class="content-panel">
  
              <h4><i class="fa fa-angle-right"></i>{$CrptProductsSalesGeneral_Report_Name_Products_Sales_General}</h4>          
              <h4><i class="fa fa-angle-right"></i> {$rptActiveUsersWeb_Report_Date}  {$reportDate}</h4>    
              {if $dtFrom neq ''}
              <h4><i class="fa fa-angle-right"></i> Sales Date Range: {$dtFrom} <strong>To</strong> {$dtTo}
        
        </h4>
        {/if}
                         
        
               <p>&nbsp;</p>

              <h4> </h4>
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>{$CrptProductsSalesGeneral_NO}</th>
                      <th>{$CrptProductsSalesGeneral_Vendor}</th>
                      <th>{$CrptProductsSalesGeneral_Product_Name}</th>
                      <th>{$CrptProductsSalesGeneral_Packages_Name}</th>                                            
                      <th class="numeric">{$CrptProductsSalesGeneral_Sales_QTY}</th>                      
                      <th class="numeric">{$CrptProductsSalesGeneral_Sales_Date}</th>
                    </tr>
                  </thead>
                  <tbody>
                  {foreach from=$ProductsSalesLis item=$pay}     
                    <tr>
                      <td>{$pay.mycount}</td>                      
                      <td>{$pay.vendor_name}</td>
                      <td>{$pay.ProdName}</td>
                      <td>{$pay.SizerName}</td>                      
                      <td class="numeric">{$pay.SalesQTY}</td>   
                      <td class="numeric">{$pay.BillDate}</td>
                    </tr>
                  {/foreach}   
                 
                  </tbody>
                </table>
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10" align="right">
                <button class="btn btn-theme" type="button" name="rptPrint" value="rptPrint" onclick="rptPrint('rptPrint')">{$CrptProductsSalesPerProduc_Print_Report}</button>
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
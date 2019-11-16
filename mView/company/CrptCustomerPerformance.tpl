{include file='../../mView/includes/rptheader.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>{$CrptProductsSalesGeneral_Customers_Performers_Report}</h3>
        <div class="row mt">
          <div class="col-lg-12">
          
          <hr>
           <div class="row mt">
            <div class="col-lg-5">
              
              {$rptUserCustomers_User_Name}
        <select class="form-control" onchange="RptGoto('rptCustomerPerformance',this.value)">
        <option value="0">Select User Name</option>
        {foreach from=$Users item=$User}
        <option value="{$User.id}" {if $selected eq $User.id }selected="selected" {/if}>{$User.username}</option>
        {/foreach}
        </select>
              
             </div>
             </div>
               <hr> 
              
<div id="rptPrint">
            <div class="content-panel">
  
              <h4><i class="fa fa-angle-right"></i>{$CrptProductsSalesGeneral_ReportName}: {$CrptProductsSalesGeneral_Customers_Performance}</h4>
              <h4><i class="fa fa-angle-right"></i> {$rptActiveUsersWeb_Report_Date}  {$reportDate}</h4>
              <h4><i class="fa fa-angle-right"></i>{$rptUserCustomers_User_Name} 
        {foreach from=$Users item=$User}
        {if $selected eq $User.id } {$User.username} {/if}
        {/foreach}
        </h4>
               <p>&nbsp;</p>
               
              
               
              
              <h4> </h4>
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>{$rptUserCustomers_NO}</th>
                      <th>{$rptUserCustomers_Customer_Name}</th>
                      <th class="numeric">{$rptUserCustomers_Shop_Name}</th>
                      <th class="numeric">{$rptUserCustomers_Customer_Phone}</th>
                      <th class="numeric">{$rptUserCustomers_Performance}</th>
                      <th class="numeric">{$rptUserCustomers_REG_Date}</th>
                    </tr>
                  </thead>
                  <tbody>
                  {foreach from=$CUSTOMERS item=$CUSTOMER}     
                    <tr>
                      <td>{$CUSTOMER.mycount}</td>
                      <td>
                      {if $CUSTOMER.up gt 0 }
                      <img src="../../Design/img/UP.png" width="10" height="10" alt="UP" /> 
                      {else}
                      <img src="../../Design/img/DOWN.png" width="10" height="10" alt="DOWN"/>
                      {/if}
                      {$CUSTOMER.cust_name}</td>
                      <td class="numeric">{$CUSTOMER.cust_shop_name}</td>
                      <td class="numeric">{$CUSTOMER.cust_mobile}</td>
                      <td class="numeric">
                      {if $CUSTOMER.up gt 0 }
                      <img src="../../Design/img/UP.png" width="10" height="10" alt="UP" /> +{$CUSTOMER.up}
                      {else}
                      <img src="../../Design/img/DOWN.png" width="10" height="10" alt="DOWN"/> {$CUSTOMER.up}
                      {/if}
                      </td>
                      <td class="numeric">{$CUSTOMER.entered_date}</td>                      
                    </tr>
                  {/foreach}   
                 
                  </tbody>
                </table>
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10" align="right">
				<button class="btn btn-theme" type="button" name="rptPrint" value="rptPrint" onclick="rptPrint('rptPrint')">{$rptUserCustomers_Print_Report}</button>	
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
{include file='../../mView/includes/rptheader.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Customers Pending Bills Report</h3>
        <div class="row mt">
          <div class="col-lg-12">
          
          <hr>
           <div class="row mt">
            <div class="col-lg-5">              
             User Name (POS)
        <select class="form-control" onchange="RptGoto('rptCustomersPendingBills',this.value)">    
        <option value="0">Select Product Name</option>               
        {foreach from=$UserList item=$usr} 
        
          <option value="{$usr.id}" 
          {if $usr.id eq $selected }
          selected="selected" 
          {/if}
          
          >{$usr.username}</option>
          
        {/foreach}                                             
        </select>           
                  
              
             </div>
             </div>
               <hr> 
              
              
<div id="rptPrint">
            <div class="content-panel">
  
              <h4><i class="fa fa-angle-right"></i>Report Name : Customers Pending Bills</h4>
              <h4><i class="fa fa-angle-right"></i> {$rptActiveUsersWeb_Report_Date}  {$reportDate}</h4>
              {if $selected neq ''}
              <h4><i class="fa fa-angle-right"></i> User Name (POS) :  
        {foreach from=$UserList item=$usr}
        {if $selected eq $usr.id} {$usr.username} {/if}
        {/foreach}
        </h4>
        {/if}
        
        
        
               <p>&nbsp;</p>

              <h4> </h4>
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Customer Name</th>
                      <th class="numeric">Product Name</th>
                      <th class="numeric">QTY</th>
                      <th class="numeric">Price</th>
                      <th class="numeric">Total Amt.</th>
                      <th class="numeric">Paid Amt.</th>
                      <th class="numeric">Pending Amt.</th>                      
                      <th class="numeric">Bill Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  {foreach from=$PendingBills item=$bill}     
                    <tr>
                      <td>{$bill.mycount}</td>
                      <td>{$bill.cust_name}</td>
                      <td class="numeric">{$bill.ProdName}</td>
                      <td class="numeric">{$bill.ProdQty}</td>
                      <td class="numeric">{$bill.ProdPrice}</td>
                      <td class="numeric">{$bill.Total_Price}</td>
                      <td class="numeric">{$bill.PaidAmt}</td>
                      <td class="numeric">{$bill.PendingAmt}</td>
                      <td class="numeric">{$bill.Bill_dt}</td>
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
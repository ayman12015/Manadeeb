{include file='../../mView/includes/header.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}


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
                    {$CustomersRequests_Users_List}                   
                  </h4>
                <ul class="nav nav-pills nav-stacked mail-nav">


{foreach from=$UserRequestList item=$req}       
<li 
{if $selected eq $req.id}
class="active"
{/if}
>
<a href="?selected={$req.id}"><i class="fa fa-male"></i>{$req.username}<span class="label label-theme pull-right inbox-notification">{$req.status_name}</span></a></li>
{/foreach}     




				 
                </ul>
              </div>
            </section>
             
          </div>
          <div class="col-sm-9">
            <section class="panel">
              <header class="panel-heading wht-bg">
                <h4 class="gen-case">                    
					{$CustomersRequests_Customers_Requests}                                    
                  </h4>
              </header>
			  
              
              
              
              <div class="panel-body minimal">
                <div class="mail-option">
                  
                    
                     
                  <!--<div class="btn-group">
                    <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                      <i class=" fa fa-refresh"></i>
                      </a>
                  </div>-->
                  
                  
                                       				
				
                <div class="table-inbox-wrap ">                 
                  <div class="content-panel">                  
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>{$CustomersRequests_Requests_List}</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i>{$CustomersRequests_Product_Name}</th>
					<th><i class="fa fa-bullhorn"></i>{$CustomersRequests_Requested_QTY}</th>
                    <th><i class="fa fa-bullhorn"></i>{$CustomersRequests_Price_Upon_Request}</th>
                    <th><i class=" fa fa-check"></i>{$CustomersRequests_Customer_Name}</th>
                    <th><i class=" fa fa-check"></i>{$CustomersRequests_Customer_Phone}</th>
                    <th><i class=" fa fa-check"></i>{$CustomersRequests_Request_Date}</th>
                    <th><i class=" fa fa-check"></i>{$CustomersRequests_Request_Status}</th>
                    <th></th>
                  </tr>
                </thead>
               <tbody>             
               
               {foreach from=$RequestsList item=$product}       
               		{if $product.owner_id eq $selected }
                  <tr>
                    <td>{$product.ProdName}</td>
                    <td class="hidden-phone">{$product.RequestedProdQty}</td>
                    <td class="hidden-phone">{$product.PriceUponRequest}</td>
                    <td class="hidden-phone">{$product.cust_name}</td>
                    <td class="hidden-phone">{$product.cust_mobile}</td>
                    <td class="hidden-phone">{$product.ReqDate}</td>
                                        
                    {if $product.request_status neq 0}
    <td><button class="btn btn-success btn-xs"  onclick="UpdateFeaturedClass('Request','Frd'+{$product.ReqId},{$product.ReqId},'0')">
    <i id="Frd{$product.ReqId}" class="fa fa-check"></i></button></td>
        {else}
    <td><button class="btn btn-success btn-xs"  onclick="UpdateFeaturedClass('Request','Frd'+{$product.ReqId},{$product.ReqId},'1')">
    <i id="Frd{$product.ReqId}" class="fa fa-square"></i></button></td>    
                    {/if}                                                                                
                  </tr>
                  {/if}
              {/foreach}                                                              
                </tbody>
              </table>			 
            </div>
            <!-- /content-panel -->            
                  
                  
                </div>				
				
              </div>
            </section>
          </div>
        </div>
      </section>
      <!-- /wrapper -->
    </section>

      <!-- /wrapper -->
    </section>
    <p><!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start--></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    {include file='../../mView/includes/footer.tpl'}

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
                    {$CustomersClassification_List_of_Classes}                  
                  </h4>
                <ul class="nav nav-pills nav-stacked mail-nav">
   
{foreach from=$CLASSES item=$cls} 
{if $selected eq $cls.cls_id}
<li class="active"><a href="?selected={$cls.cls_id}"><i class="fa fa-male"></i> {$cls.cls_name}  <span class="label label-theme pull-right inbox-notification">{$cls.CustomerCount}</span></a></li>
{else}
<li class=""><a href="?selected={$cls.cls_id}"> <i class="fa fa-male"></i> {$cls.cls_name}   <span class="label label-theme pull-right inbox-notification"> {$cls.CustomerCount}</span></a></li> 
{/if}
{/foreach}
				 
                </ul>
              </div>
            </section>
             
          </div>
          <div class="col-sm-9">
            <section class="panel">
              <header class="panel-heading wht-bg">
                <h4 class="gen-case">
                    {$CustomersManagement_Customers_List}                  
                  </h4>
              </header>
			  
              
              
              
              <div class="panel-body minimal">
                <div class="mail-option">
                  <div class="chk-all">
                    <div class="pull-left mail-checkbox">
                      <input type="checkbox" value="0" id="checkAll" class="" onclick="chkCust()">
                    </div>
                    <div class="btn-group">
                      <a data-toggle="dropdown" href="#" class="btn mini all">
                        All
                        <i class="fa fa-angle-down "></i>
                        </a>
                      <ul class="dropdown-menu">
                        <li><a href="#" onclick="chkCheckedUnChaked('All')"> All</a></li>
                        <li><a href="#" onclick="chkCheckedUnChaked('None')"> None</a></li>
                      </ul>
                    </div>
                  </div>
             
                  <!--<div class="btn-group">
                    <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                      <i class=" fa fa-refresh"></i>
                      </a>
                  </div>-->
                  <div class="btn-group hidden-phone">
                    <a data-toggle="dropdown" href="#" class="btn mini blue">
                      Move to
                      <i class="fa fa-angle-down "></i>
                      </a>
                    <ul class="dropdown-menu">
                      
                      {foreach from=$CLASSES item=$cls} 
						{if $selected neq $cls.cls_id}
                          <li onclick="GetAction('{$selected}','{$cls.cls_id}','cls')"><a href="#"><i class="fa fa-user"></i> {$cls.cls_name}</a></li>
                        {/if}
					  {/foreach}
                      					  
                      <li class="divider"></li>
                      <li><a href="#"><i class="fa fa-trash-o"></i> Recycle Bin</a></li>
                    </ul>
                  </div>
                  
                  <ul class="unstyled inbox-pagination">
                  {assign var=total_count value=$CUSTOMERS|@count}
                    <li><span>{if $total_count eq 0} 0 {else}1 {/if}-{$total_count} of {$total_count}</span></li>
                    <li>
                      <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                    </li>
                    <li>
                      <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                    </li>
                  </ul>
                </div>                               				
				
                <div class="table-inbox-wrap ">
                  <table class="table table-inbox table-hover">
                    <tbody>      
                    <form name="form1" id="form1" method="post" action="">
                    {foreach from=$CUSTOMERS item=$CUSTOMER} 
                      <tr class="">
                        <td class="inbox-small-cells">
                          <input type="checkbox" id="chk{$CUSTOMER.mycount}" name="CUSTOMER{$CUSTOMER.mycount}" class="mail-checkbox" value="{$CUSTOMER.cust_id}">
                        </td>
                        <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                        <td class="view-message  dont-show"><a href="mail_view.html">{$CUSTOMER.cust_name}</a></td>
                        <td class="view-message "><a href="mail_view.html">{$CUSTOMER.cust_shop_name}</a></td>
                        <td class="view-message  inbox-small-cells"><i class=""></i></td>
                        <td class="view-message  text-right">{$CustomersClassification_REG_Date}: {$CUSTOMER.entered_date}</td>
                        <td class="view-message  text-right">{$CustomersClassification_Auto_Move}
                        <input onchange="SetAutoMove(this.value,'{$CUSTOMER.cust_id}')" type="checkbox" id="chkm{$CUSTOMER.mycount}" name="CUSTOMERm{$CUSTOMER.mycount}" class="mail-checkbox" value="{$CUSTOMER.cls_auto}" {if $CUSTOMER.cls_auto eq '0'} checked="checked" {/if} ></td>
                      </tr>
                    {/foreach}
                    </form>
                    </tbody>
                  </table>
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

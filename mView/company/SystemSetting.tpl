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
      <section class="wrapper" >
        <!-- page start-->
        <div class="row mt">
          <div class="col-sm-3">
            <section class="panel">
              <div class="panel-body">     
                         <h4 class="gen-case">
                    {$SystemSetting_SystemSetting}                   
                  </h4>
                <ul class="nav nav-pills nav-stacked mail-nav">
   

<li 
{if $selected eq 1}
class="active"
{/if}
>
<a href="?selected=1"><i class="fa fa-male"></i>{$SystemSetting_Main_Graph}<span class="label label-theme pull-right inbox-notification"></span></a></li>

<li 
{if $selected eq 2}
class="active"
{/if}
>
<a href="?selected=2"><i class="fa fa-male"></i>{$SystemSetting_Working_Days}<span class="label label-theme pull-right inbox-notification"></span></a></li>

<li 
{if $selected eq 3}
class="active"
{/if}
>
<a href="?selected=3"><i class="fa fa-male"></i>{$SystemSetting_Accounting_System_Integration} <span class="label label-theme pull-right inbox-notification"></span></a></li>	

<li 
{if $selected eq 4}
class="active"
{/if}
>
<a href="?selected=4"><i class="fa fa-male"></i>{$SystemSetting_Users_Pages_Privileges} <span class="label label-theme pull-right inbox-notification"></span></a></li>			 
                </ul>
              </div>
            </section>            
             
          </div>
          <div class="col-sm-9">
            <section class="panel">
              <header class="panel-heading wht-bg">
                <h4 class="gen-case">                    
                    {if $selected eq 1} {$SystemSetting_Main_Graph_Settings} {/if}                 
                    {if $selected eq 2} {$SystemSetting_Working_Days_Settings} {/if}                 
                    {if $selected eq 3} {$SystemSetting_Accounting_System_Integrations_Settings} {/if}   
                    {if $selected eq 4} {$SystemSetting_Users_Pages_Privileges} {/if}                                     
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
                  {if $selected eq 1}
                  
                  <div class="content-panel">
              <table {if $session_lang eq 'AR'} dir="rtl" {/if} class="table table-striped table-advance table-hover" >
              {if $session_lang eq 'AR'}
                <h4 dir="rtl"><i class="fa fa-angle-left"></i>{$NewProduct_Product_List}</h4>
                {else}
                <h4><i class="fa fa-angle-right"></i>{$NewProduct_Product_List}</h4>
               {/if}
                
                <hr>
                <thead dir="rtl">
                  <tr>
                    <th><i class="fa fa-bullhorn"></i>{$NewProduct_Product_Name}</th>
					<th><i class="fa fa-bullhorn"></i>{$NewProduct_Product_Vendor}</th>
                    <th><i class="fa fa-bullhorn"></i>{$NewProduct_Product_Status}</th>
                    <th><i class=" fa fa-check"></i>{$NewProduct_featured}</th>
                    <th></th>
                  </tr>
                </thead>
               <tbody align="left">             
               
               {foreach from=$Products item=$product}       
                  <tr>
                    <td><a href="basic_table.html#">{$product.prod_name}</a></td>
                    <td class="hidden-phone">{$product.vendor_name}</td>
                    
                    {if $product.status eq 1}
                    <td><span class="label label-success label-mini">{$SystemSetting_Active}</span></td>
                    {else}
                    <td><span class="label label-danger label-mini">{$SystemSetting_Not_Active}</span></td>
                    {/if}
                    
                    {if $product.featured eq 1}
    <td><button class="btn btn-success btn-xs"  onclick="UpdateFeaturedClass('Featured','Frd'+{$product.prod_id},{$product.prod_id},'0')">
    <i id="Frd{$product.prod_id}" class="fa fa-check"></i></button></td>
        {else}
    <td><button class="btn btn-success btn-xs"  onclick="UpdateFeaturedClass('Featured','Frd'+{$product.prod_id},{$product.prod_id},'1')">
    <i id="Frd{$product.prod_id}" class="fa fa-square"></i></button></td>    
                    {/if}                                                                                
                  </tr>
              {/foreach}                                                              
                </tbody>
              </table>			  			  
            </div>
            <!-- /content-panel -->            
                  {elseif $selected eq 2}
                  
                   <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
              {if $session_lang eq 'AR'}
                <h4 dir="rtl" ><i class="fa fa-angle-left"></i>{$SystemSetting_Working_Days_List}</h4>
              {else}
                <h4><i class="fa fa-angle-right"></i>{$SystemSetting_Working_Days_List}</h4>
              {/if}
                
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i>{$SystemSetting_Day_of_the_week}</th>
					<th><i class=" fa fa-check"></i>{$SystemSetting_Working_Day}</th> 
                
                  </tr>
                </thead>
               <tbody>             
               
               
                  <tr>
                    <td><a href="basic_table.html#">{$SystemSetting_Saturday}</a></td>                    
    				<td><button class="btn btn-success btn-xs"> <i class="fa fa-check"></i></button></td>    
				  </tr>
                  <tr>
                    <td><a href="basic_table.html#">{$SystemSetting_Sunday}</a></td>                    
    				<td><button class="btn btn-success btn-xs"> <i class="fa fa-check"></i></button></td>    
				  </tr>
                  <tr>
                    <td><a href="basic_table.html#">{$SystemSetting_Monday}</a></td>                    
    				<td><button class="btn btn-success btn-xs"> <i class="fa fa-check"></i></button></td>    
				  </tr>
                  <tr>
                    <td><a href="basic_table.html#">{$SystemSetting_Tuesday}</a></td>                    
    				<td><button class="btn btn-success btn-xs"> <i class="fa fa-check"></i></button></td>    
				  </tr>
                  <tr>
                    <td><a href="basic_table.html#">{$SystemSetting_Wednesday}</a></td>                    
    				<td><button class="btn btn-success btn-xs"> <i class="fa fa-check"></i></button></td>    
				  </tr>
                  <tr>
                    <td><a href="basic_table.html#">{$SystemSetting_Thursday}</a></td>                    
    				<td><button class="btn btn-success btn-xs"> <i class="fa fa-check"></i></button></td>    
				  </tr>
                  <tr>
                    <td><a href="basic_table.html#">{$SystemSetting_Friday}</a></td>                    
    				<td><button class="btn btn-success btn-xs"> <i class="fa fa-square"></i></button></td>    
				  </tr>
                                                                            
                </tbody>
              </table>			  			  
            </div>
            <!-- /content-panel -->      
            
            {elseif $selected eq 3}       
                                 
             <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
  <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="ProductsStore.php">
			{if $success_msg neq ''}
            <div class="alert alert-success"><b>Well done!</b> {$success_msg}</div>
            {/if}
            
            {if $error_msg neq ''}
            <div class="alert alert-danger"><b>Error:{$error_msg}</div>
            {/if}
 
               
               <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$SystemSetting_System_Name}</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="system_id" id="system_id">     
                      <option value="1">{$SystemSetting_QuickBooks}</option>                                          
                      <option value="1">{$SystemSetting_Odoo}</option>                                          
                	</select>           
                  </div>     
                </div>    
                
              
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">{$SystemSetting_IP_Address}</label>
                  <div class="col-sm-4">
                     <input class="form-control " id="IPA" type="text" name="IPA" placeholder="{$SystemSetting_Enter_Server_IP}"  required/>    
                  </div>    
                </div>       
                
                        
        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">{$SystemSetting_Organization_Name}</label>
        <div class="col-sm-6">
        <input class="form-control " id="OrganizationName" type="text" name="OrganizationName" placeholder="{$SystemSetting_Enter_Organization_Name}"  required/>
        </div>
        </div>
        
        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">{$SystemSetting_User_Name}</label>
        <div class="col-sm-6">
        <input class="form-control " id="UserName" type="text" name="UserName" placeholder="{$SystemSetting_Ente_User_Name}"  required/>
        </div>
        </div>
        
        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">{$SystemSetting_Organization_Password}</label>
        <div class="col-sm-4">
        <input class="form-control " id="OrganizationPassword" type="text" name="OrganizationName" placeholder="{$SystemSetting_Enter_Organization_Password}"  required/>
        </div>
        </div>
        
         <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">{$SystemSetting_Re_Password}</label>
        <div class="col-sm-4">
        <input class="form-control " id="RePassword" type="text" name="RePassword" placeholder="{$SystemSetting_Enter_Re_Enter_Password}"  required/>
        </div>
        </div>
        
        <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
        <button class="btn btn-theme" name="submit" value="Save_store" type="submit">{$SystemSetting_Save}</button>
        <button class="btn btn-theme04" name="submit" type="submit" value="Cancel">{$SystemSetting_Cancel}</button>
        </div>
        </div>
        
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
            
         <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4 ><i class="fa fa-angle-right"></i>{$SystemSetting_Accounting_System_Configration}</h4>
                <hr>
                <thead>
                  <tr>
                    <th>{$SystemSetting_System_Name}</th>
                    <th><i class="fa fa-bullhorn"></i>{$SystemSetting_IP_Address}</th>
                    <th><i class="fa fa-bullhorn"></i>{$SystemSetting_Organization_Name}</th>
                    <th><i class="fa fa-bullhorn"></i>{$SystemSetting_User_Name}</th>
                    <th></th>
                  </tr>
                </thead>
               <tbody> 
               
                                
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="hidden-phone"></td>                  		  
					</td>                    
                  </tr>		
            
                  
                </tbody>
              </table>
			  
			  
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
        
                  
                  
                
              
              {elseif $selected eq 4}
              
              <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
          <table class="table table-striped table-advance table-hover">
                <h4> <i class="fa fa-angle-right"></i>{$SystemSetting_Users_Pages_Privilegess}</h4>
                
                <hr>
                
                <thead >
                  <tr >
                    <th>{$SystemSetting_Pages_Privileges}</th>
                    {foreach from=$pages_group item=$g}
                        <th>{$g.Group_name}</th> <!-- 1 -->
                    {/foreach} 
                     
                      
                  </tr>
                </thead>
                
               <tbody align="left">
                                 
         {foreach from=$pages item=$Page}           
                  <tr>                                     
                       <td>{$Page.page_name}</td>
                       
                       {foreach from=$pages_display item=$d}
                           {foreach from=$pages_group item=$g}
                               {if $Page.page_id eq $d.page_id && $d.Group_id eq $g.Group_id}
                                    {if $d.status eq '1'}
                                        <td><button class="btn btn-success btn-xs" 
                                        onclick="UpdateGroupPrevileges('{$d.Group_id}',{$d.page_id},'{$d.Group_id}{$d.page_id}')"> 
                                        <i id="{$d.Group_id}{$d.page_id}" class="fa fa-check"></i></button></td>
                                    {else}
                                        <td><button class="btn btn-success btn-xs" 
                                        onclick="UpdateGroupPrevileges('{$d.Group_id}',{$d.page_id},'{$d.Group_id}{$d.page_id}')"> 
                                        <i id="{$d.Group_id}{$d.page_id}" class="fa fa-square"></i></button></td>
                                    {/if}                             
                               {/if}
                       		{/foreach}     
                       {/foreach} 
                       
                        
                                                                                                    
                  </tr>
        {/foreach}  
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>                
        {/if}
        
        
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
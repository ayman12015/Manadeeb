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
                    {$ClassesConfigrations_Customers_Classes_List}                 
                  </h4>
                <ul class="nav nav-pills nav-stacked mail-nav">   
{foreach from=$ClassesList item=$cls} 
{if $cls.default_cls neq 1}
<li class="{if $selected eq  $cls.cls_id} {assign var="cls_name" value=$cls.cls_name} active{/if}">
<a href="?selected={$cls.cls_id}"><i class="fa fa-male"></i>{$cls.cls_name}
<span class="label label-theme pull-right inbox-notification"></span></a></li>
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
                {if isset($cls_name) && $cls_name neq ''}   
                	{$cls_name} {$ClassesConfigrations_Configrations}
                {else}
                    {$ClassesConfigrations_Customers_Classes_Configurations}                                     
                {/if}
                  </h4>
              </header>
              
              <h3><i class="fa fa-angle-right"> 
              {$ClassesConfigrations_This_section_indicates_which_client_will_be_offered_for_this_Class}
              </i></h3>			                
              <div class="panel-body minimal">                
                {if isset($cls_name) && $cls_name neq ''}   
               
               
                <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn">
                  <div class="grey-header">
                    <h5>                    
                    <input type="checkbox"
                    value="{$selected}" 
            onclick="clsUpdateConfigStatus(this.checked,'MinimumRegistrationPeriod',this.value)"
                    id="chkMinimumRegistrationPeriod"
                    name="chkMinimumRegistrationPeriod" 
                {if isset($chkMinimumRegistrationPeriod) && $chkMinimumRegistrationPeriod == '0'}
                checked="true" 
                {/if}

                    required/>
                    {$ClassesConfigrations_Minimum_Registration_Period}
                    </h5>
                  </div>       
                   <div class="form-group">
                   <h6>{$ClassesConfigrations_Enter_Registration_Period_Per_day}</h6>
                     <p>&nbsp;                     </p>
                       <input type="text" 
                     class="form-control" 
                     placeholder="{$ClassesConfigrations_Enter_Registration_Period}" 
                     name="MinimumRegistrationPeriodval" 
                     id="MinimumRegistrationPeriodval" 
                     required>                        
                     <canvas id="serverstatus03" height="5"></canvas> 
                     <input type="button" value="{$ClassesConfigrations_UPDATE}" 
                     onclick="UpdateClsValue('MinimumRegistrationPeriodval','chkMinimumRegistrationPeriod','MinimumRegistrationPeriodConfig_id','MinimumRegistrationPeriodSval')"/>
                     <input type="hidden" name="MinimumRegistrationPeriodConfig_id" id="MinimumRegistrationPeriodConfig_id" 
                     value="{if isset($MinimumRegistrationPeriodConfig_id)} {$MinimumRegistrationPeriodConfig_id} {/if}" />
                     
                     <input type="text" 
                     class="form-control" 
                     placeholder="Registration Period" 
                     name="MinimumRegistrationPeriodSval" 
                     id="MinimumRegistrationPeriodSval" 
                     value="{if isset($MinimumRegistrationPeriodSval)} {$MinimumRegistrationPeriodSval} {/if}" 
                     readonly="true" 
                     required>

                     </p>
                  </div>
                  
                </div>
              </div>
              
              
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn">
                  <div class="grey-header">
                    <h5>                    
                    <input type="checkbox" 
                    value="{$selected}" 
            onclick="clsUpdateConfigStatus(this.checked,'MinimumSalesConsumed',this.value)"
                    id="chkMinimumSalesConsumed"
                    name="chkMinimumSalesConsumed" 
                {if isset($chkMinimumSalesConsumed) && $chkMinimumSalesConsumed == '0'}
                checked="true" 
                {/if}
                    required/>             
                    {$ClassesConfigrations_Minimum_Sales_Consumed}<strong>{$ClassesConfigrations_weekly}</strong>
                    </h5>
                  </div>                                    
                  <div class="form-group">
                   <h6>{$ClassesConfigrations_Enter_Sales_Consumed_Per_Product}</h6>					
                    <select id="MinimumSalesConsumedLval" class="form-control" >     
                    <option value="0">{$ClassesConfigrations_Select_Product_Name}</option>  
                       {foreach from=$GetProductsPrices item=$price}                        	
                        <option value="{$price.priceId}">{$price.ProdNamePackage}</option>                   
                       {/foreach}               
                	</select>
                    <input type="text" 
                     class="form-control" 
                     placeholder="{$ClassesConfigrations_Enter_Product_QTY}" 
                     name="MinimumSalesConsumedval" 
                     id="MinimumSalesConsumedval" required>                                           
                     <canvas id="serverstatus03" height="5"></canvas> 
                    <input type="button" value="{$ClassesConfigrations_UPDATE}" onclick="UpdateClsListValue('MinimumSalesConsumedval','MinimumSalesConsumedLval','chkMinimumSalesConsumed','MinimumSalesConsumedConfig_id','MinimumSalesConsumedSval','0')"/>
                     <input type="hidden" name="MinimumSalesConsumedConfig_id" id="MinimumSalesConsumedConfig_id" 
                     value="{if isset($MinimumSalesConsumedConfig_id)} {$MinimumSalesConsumedConfig_id} {/if}" />
                     
                    <select multiple class="form-control" name="MinimumSalesConsumedSval" id="MinimumSalesConsumedSval">	 
                    {foreach from=$CLS_CONFIGRATION_VALUES item=$cls}  
                    {if isset($MinimumSalesConsumedConfig_id) && $MinimumSalesConsumedConfig_id eq $cls.config_id}
                    <option>{$cls.name_value}</option>                         
                    {/if}
                    {/foreach} 
    	            </select>
                 </div>
                 
                </div>
              </div>
              
              
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn">
                  <div class="grey-header">
                    <h5>                    
                    <input type="checkbox"
                    value="{$selected}" 
            onclick="clsUpdateConfigStatus(this.checked,'MinimumSalesAmount',this.value)"
                    id="chkMinimumSalesAmount"
                    name="chkMinimumSalesAmount" 
                {if isset($chkMinimumSalesAmount) && $chkMinimumSalesAmount == '0'}
                checked="true" 
                {/if}

                    required/>
                    {$ClassesConfigrations_Minimum_Sales_Amount}<strong>{$ClassesConfigrations_weekly}</strong>
                    </h5>
                  </div>       
                   <div class="form-group">
                   <h6>{$ClassesConfigrations_Enter_Sales_Amount_Per_day}</h6>
                     <p>&nbsp;                     </p>
                       <input type="text" 
                     class="form-control" 
                     placeholder="{$ClassesConfigrations_Enter_Sales_Amount}" 
                     name="MinimumSalesAmountval" 
                     id="MinimumSalesAmountval" 
                     required>                        
                     <canvas id="serverstatus03" height="5"></canvas> 
                     <input type="button" value="{$ClassesConfigrations_UPDATE}"
                     onclick="UpdateClsValue('MinimumSalesAmountval','chkMinimumSalesAmount','MinimumSalesAmountConfig_id','MinimumSalesAmountSval')"/>
                     <input type="hidden" name="MinimumSalesAmountConfig_id" id="MinimumSalesAmountConfig_id" 
                     value="{if isset($MinimumSalesAmountConfig_id)} {$MinimumSalesAmountConfig_id} {/if}" />
                     
                     <input type="text" 
                     class="form-control" 
                     placeholder="{$ClassesConfigrations_Sales_Amount}" 
                     name="MinimumSalesAmountSval" 
                     id="MinimumSalesAmountSval" 
                     value="{if isset($MinimumSalesAmountSval)} {$MinimumSalesAmountSval} {/if}" 
                     readonly="true" 
                     required>

                     </p>
                  </div>
                  
                </div>
              </div>
              
                                                       
              {/if}                                 
              </div>                            
		  </div>								
        </div>
 
            <section class="panel">
            
              <header class="panel-heading wht-bg">
                <h4 class="gen-case">             
                {if isset($cls_name) && $cls_name neq ''}   
                	{$cls_name} {$ClassesConfigrations_Configrations}
                {else}
                    {$ClassesConfigrations_Customers_Classes_Configrations}                                     
                {/if}
                  </h4>
              </header>
			  <h3><i class="fa fa-angle-right"> 
              {$ClassesConfigrations_This_section_indicates_the_way_of_dealing_with_customers_present_in_this_Class}
              </i></h3>	
              
              <div class="panel-body minimal">                
                {if isset($cls_name) && $cls_name neq ''}   
                



                <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn">
                  <div class="grey-header">
                    <h5>                    
                    <input type="checkbox" 
                    value="{$selected}" 
            onclick="clsUpdateConfigStatus(this.checked,'MaximumSalesQTY',this.value)"
                    id="chkMaximumSalesQTY"
                    name="chkMaximumSalesQTY" 
                {if isset($chkMaximumSalesQTY) && $chkMaximumSalesQTY == '0'}
                checked="true" 
                {/if}
                    required/>             
                    {$ClassesConfigrations_Maximum_Sales_QTY}<strong>{$ClassesConfigrations_Daily}</strong>
                    </h5>
                  </div>                                    
                  <div class="form-group">
                   <h6>{$ClassesConfigrations_Enter_Sales_Consumed_Per_Product}</h6>         
                    <select id="MaximumSalesQTYLval" class="form-control" >     
                    <option value="0">{$ClassesConfigrations_Select_Product_Name}</option>  
                       {foreach from=$GetProductsPrices item=$price}                          
                        <option value="{$price.priceId}">{$price.ProdNamePackage}</option>
                       {/foreach}               
                  </select>
                    <input type="text" 
                     class="form-control" 
                     placeholder="{$ClassesConfigrations_Enter_Product_QTY}" 
                     name="MaximumSalesQTYval" 
                     id="MaximumSalesQTYval" required>                                           
                     <canvas id="serverstatus03" height="5"></canvas> 
                    <input type="button" value="{$ClassesConfigrations_UPDATE}" onclick="UpdateClsListValue('MaximumSalesQTYval','MaximumSalesQTYLval','chkMaximumSalesQTY','MaximumSalesQTYConfig_id','MaximumSalesQTYSval','1')"/>
                     <input type="hidden" name="MaximumSalesQTYConfig_id" id="MaximumSalesQTYConfig_id" 
                     value="{if isset($MaximumSalesQTYConfig_id)} {$MaximumSalesQTYConfig_id} {/if}" />
                     
                    <select multiple class="form-control" name="MaximumSalesQTYSval" id="MaximumSalesQTYSval">   
                    {foreach from=$CLS_CONFIGRATION_VALUES item=$cls}  
                    {if isset($MaximumSalesQTYConfig_id) && $MaximumSalesQTYConfig_id eq $cls.config_id}
                    <option>{$cls.name_value}</option>                         
                    {/if}
                    {/foreach} 
                  </select>
                 </div>
                </div>
              </div>


              
              
               <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn">
                  <div class="grey-header">
                    <h5>                    
                    <input type="checkbox"
                    value="{$selected}" 
            onclick="clsUpdateConfigStatus(this.checked,'MaximumSalesAmount',this.value)"
                    id="chkMaximumSalesAmount"
                    name="chkMaximumSalesAmount" 
                {if isset($chkMaximumSalesAmount) && $chkMaximumSalesAmount == '0'}
                checked="true" 
                {/if}

                    required/>
                    {$ClassesConfigrations_Maximum_Sales_Amount}<strong>{$ClassesConfigrations_Daily}</strong>
                    </h5>
                  </div>       
                   <div class="form-group">
                   <h6>{$ClassesConfigrations_Enter_Sales_Amount_Per_day}</h6>
                     <p>&nbsp;                     </p>
                       <input type="text" 
                     class="form-control" 
                     placeholder="{$ClassesConfigrations_Enter_Sales_Amount}" 
                     name="MaximumSalesAmountval" 
                     id="MaximumSalesAmountval" 
                     required>                        
                     <canvas id="serverstatus03" height="5"></canvas> 
                     <input type="button" value="{$ClassesConfigrations_UPDATE}" 
                     onclick="UpdateClsValue('MaximumSalesAmountval','chkMaximumSalesAmount','MaximumSalesAmountConfig_id','MaximumSalesAmountSval')"/>
                     <input type="hidden" name="MaximumSalesAmountConfig_id" id="MaximumSalesAmountConfig_id" 
                     value="{if isset($MaximumSalesAmountConfig_id)} {$MaximumSalesAmountConfig_id} {/if}" />
                     
                     <input type="text" 
                     class="form-control" 
                     placeholder="{$ClassesConfigrations_Sales_Amount}" 
                     name="MaximumSalesAmountSval" 
                     id="MaximumSalesAmountSval" 
                     value="{if isset($MaximumSalesAmountSval)} {$MaximumSalesAmountSval} {/if}" 
                     readonly="true" 
                     required>

                     </p>
                  </div>
                  
                </div>
              </div>
              
              
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn">
                  <div class="grey-header">
                    <h5>                    
                    <input type="checkbox" 
                    value="{$selected}" 
            onclick="clsUpdateConfigStatus(this.checked,'MaximumInstallmentQTY',this.value)"
                    id="chkMaximumInstallmentQTY"
                    name="chkMaximumInstallmentQTY" 
                {if isset($chkMaximumInstallmentQTY) && $chkMaximumInstallmentQTY == '0'}
                checked="true" 
                {/if}
                    required/>             
                    {$ClassesConfigrations_Maximum_Installment_QTY}<strong>{$ClassesConfigrations_Per_Product}</strong>
                    </h5>
                  </div>                                    
                  <div class="form-group">
                   <h6>{$ClassesConfigrations_Enter_Maximum_Installment_QTY}</h6>         
                    <select id="MaximumInstallmentQTYLval" class="form-control" >     
                    <option value="0">{$ClassesConfigrations_Select_Product_Name}</option>  
                       {foreach from=$GetProductsPrices item=$price}                          
                        <option value="{$price.priceId}">{$price.ProdNamePackage}</option>
                       {/foreach}               
                  </select>
                    <input type="text" 
                     class="form-control" 
                     placeholder="{$ClassesConfigrations_Enter_Product_QTY}" 
                     name="MaximumInstallmentQTYval" 
                     id="MaximumInstallmentQTYval" required>                                           
                     <canvas id="serverstatus03" height="5"></canvas> 
                    <input type="button" value="{$ClassesConfigrations_UPDATE}" onclick="UpdateClsListValue('MaximumInstallmentQTYval','MaximumInstallmentQTYLval','chkMaximumInstallmentQTY','MaximumInstallmentQTYConfig_id','MaximumInstallmentQTYSval','1')"/>
                     <input type="hidden" name="MaximumInstallmentQTYConfig_id" id="MaximumInstallmentQTYConfig_id" 
                     value="{if isset($MaximumInstallmentQTYConfig_id)} {$MaximumInstallmentQTYConfig_id} {/if}" />
                     
                    <select multiple class="form-control" name="MaximumInstallmentQTYSval" id="MaximumInstallmentQTYSval">   
                    {foreach from=$CLS_CONFIGRATION_VALUES item=$cls}  
                    {if isset($MaximumInstallmentQTYConfig_id) && $MaximumInstallmentQTYConfig_id eq $cls.config_id}
                    <option>{$cls.name_value}</option>                         
                    {/if}
                    {/foreach} 
                  </select>
                 </div>
                </div>
              </div>
                
              
              
              <p>&nbsp;                     </p>
               <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn">
                  <div class="grey-header">
                    <h5>                    
                    <input type="checkbox"
                    value="{$selected}" 
            onclick="clsUpdateConfigStatus(this.checked,'MaximumInstallmentAmount',this.value)"
                    id="chkMaximumInstallmentAmount"
                    name="chkMaximumInstallmentAmount" 
                {if isset($chkMaximumInstallmentAmount) && $chkMaximumInstallmentAmount == '0'}
                checked="true" 
                {/if}

                    required/>
                    {$ClassesConfigrations_Maximum_Installment_Amount}
                    </h5>
                  </div>       
                   <div class="form-group">
                   <h6>{$ClassesConfigrations_Enter_Maximum_Installment_Amount}</h6>
                     <p>&nbsp;                     </p>
                       <input type="text" 
                     class="form-control" 
                     placeholder="{$ClassesConfigrations_Enter_Sales_Amount}" 
                     name="MaximumInstallmentAmountval" 
                     id="MaximumInstallmentAmountval" 
                     required>                        
                     <canvas id="serverstatus03" height="5"></canvas> 
                     <input type="button" value="{$ClassesConfigrations_UPDATE}" 
                     onclick="UpdateClsValue('MaximumInstallmentAmountval','chkMaximumInstallmentAmount','MaximumInstallmentAmountConfig_id','MaximumInstallmentAmountSval')"/>
                     <input type="hidden" name="MaximumInstallmentAmountConfig_id" id="MaximumInstallmentAmountConfig_id" 
                     value="{if isset($MaximumInstallmentAmountConfig_id)} {$MaximumInstallmentAmountConfig_id} {/if}" />
                     
                     <input type="text" 
                     class="form-control" 
                     placeholder="{$ClassesConfigrations_Sales_Amount}" 
                     name="MaximumInstallmentAmountSval" 
                     id="MaximumInstallmentAmountSval" 
                     value="{if isset($MaximumInstallmentAmountSval)} {$MaximumInstallmentAmountSval} {/if}" 
                     readonly="true" 
                     required>

                     </p>
                  </div>
                  
                </div>
              </div> 
              
                                   
              {/if}                                 
              </div>                            
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

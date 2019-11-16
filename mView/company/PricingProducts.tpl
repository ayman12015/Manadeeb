{include file='../../mView/includes/header.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}


 {foreach from=$ProductsPricess item=$price}  
<div class="modal fade" id="myModalPrice{$price.priceId}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

               
               <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Edit Package Data</h4>
                    </div>
                    

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            
                    <form class="cmxform form-horizontal style-form" name="registration_form" id="registration_form" method="post" action="{$REQUEST_URI}">
                       
              
            {if $success_msg neq ''}
            <div class="alert alert-success"><b>Well done!</b> {$success_msg}</div>
            {/if}
            
            {if $error_msg neq ''}
            <div class="alert alert-danger"><b>Error:{$error_msg}</div>
            {/if}
            
                                                                                   
                 <div class="form-group">
                  <label class="col-sm-2 control-label">{$PricingProducts_Select_Product_Name}</label>
                  <div class="col-sm-10">
                     <select name="prod_id" id="prod_id" class="form-control">
                 {foreach from=$Products item=$product}                      
                      <option value="{$product.prod_id}">{$product.prod_name}</option>
                {/foreach}
                  </select>    
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">{$PricingProducts_Select_Product_Package}</label>
                  <div class="col-sm-10">
                     <select name="package_id" id="package_id" class="form-control">
                     {foreach from=$Packages item=$Package}                      
                      <option value="{$Package.package_id}">{$Package.package_name}</option>
                   {/foreach}
                  </select>    
                  </div>

                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" dir="rtl">{$PricingProducts_Product_Package_Price}</label>
                  <div class="col-sm-4">
                    <input type="text" name="ProductPrice" value="{$price.ProductPrice}" id="ProductPrice" class="form-control" placeholder="{$Enter_PricingProducts_Product_Package_Price}" required>     
                  </div>

                  <label class="col-sm-2 control-label">{$PricingProducts_Product_Package_Cost}</label>

                  <div class="col-sm-4">
                    <input type="text" name="ProductCost" value="{$price.ProductCost}" id="ProductCost" class="form-control" placeholder="{$Enter_PricingProducts_Product_Package_Cost}" required>     
                  </div>
                                                                  
                </div>

                
                
                

               <input type="hidden" name="priceId" id="priceId" value="{$price.priceId}" />
               
        
        
        
        <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="UpdatePrice" value="UpdatePrice">Update Info.</button>                                   
                      <button class="btn btn-theme04" type="button"  data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
              </form>   
              
                 </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
                       
                  </div>
                </div>
              </div>  
              {/foreach}

     <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        {if $session_lang eq 'AR'}
        <h3 dir="rtl"><i class="fa fa-angle-left"></i>{$PricingProducts_Products_Prices}</h3>
        {else}
        <h3><i class="fa fa-angle-right"></i>{$PricingProducts_Products_Prices}</h3>
        {/if}
        
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            
             {if $return eq '1'}
            <div class="alert alert-success"><b>Well done!</b> Data saved Successfully.</div>
            {/if}
            
            {if $return eq '0'}
            <div class="alert alert-danger"><b>Unknown error </b>Data not saved.</div>
            {/if}
            
            <div class="alert"></div>
            
            
				<form {if $session_lang eq 'AR'} dir="rtl" {/if} class="cmxform form-horizontal style-form" id="commentForm" method="post" action="#">
			 
                       
                  <div class="form-group">
                  {if $session_lang eq 'EN'}
                  <label class="col-sm-2 control-label">{$PricingProducts_Select_Product_Name}</label>
                  {/if}
                  <div class="col-sm-10">
                     <select name="prod_id" id="prod_id" class="form-control">
				{foreach from=$Products item=$product}                      
                      <option value="{$product.prod_id}">{$product.prod_name}</option>
                {/foreach}
                	</select>    
                  </div>
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 control-label">{$PricingProducts_Select_Product_Name}</label>
                  {/if}
                </div>
                
                <div class="form-group">
                {if $session_lang eq 'EN'}
                  <label class="col-sm-2 control-label">{$PricingProducts_Select_Product_Package}</label>
                  {/if}
                  <div class="col-sm-10">
                     <select name="package_id" id="package_id" class="form-control">
                     {foreach from=$Packages item=$Package}                      
                      <option value="{$Package.package_id}">{$Package.package_name}</option>
                	 {/foreach}
                	</select>    
                  </div>
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 control-label">{$PricingProducts_Select_Product_Package}</label>
                  {/if}
                </div>
                
                
                
                <div class="form-group">
				{if $session_lang eq 'EN'}
                  <label class="col-sm-2 control-label" dir="rtl">{$PricingProducts_Product_Package_Price}</label>
                {/if}
                  <div class="col-sm-4">
                    <input type="text" name="ProductPrice" id="ProductPrice" class="form-control" placeholder="{$Enter_PricingProducts_Product_Package_Price}" required>     
                  </div>
                {if $session_lang eq 'AR'}
                  <label class="col-sm-2 control-label" dir="rtl">{$PricingProducts_Product_Package_Price}</label>
                {/if}

                {if $session_lang eq 'EN'}
                  <label class="col-sm-2 control-label">{$PricingProducts_Product_Package_Cost}</label>
                {/if}
                  <div class="col-sm-4">
                    <input type="text" name="ProductCost" id="ProductCost" class="form-control" placeholder="{$Enter_PricingProducts_Product_Package_Cost}" required>     
                  </div>
                {if $session_lang eq 'AR'}
                  <label class="col-sm-2 control-label">{$PricingProducts_Product_Package_Cost}</label>
                {/if}
                                                                  
                </div>
                
				 
				
				<div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="submit" value="AddNewProductsPrices">{$btn_Save}</button>
                      <button class="btn btn-theme04" type="submit">{$btn_Cancel}</button>
                    </div>
                  </div>
                  
                  
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
        <!-- INLINE FORM ELELEMNTS -->
		
		 <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table {if $session_lang eq 'AR'} dir="rtl" {/if} class="table table-striped table-advance table-hover">              
              {if $session_lang eq 'AR'}
                <h4 dir="rtl"><i class="fa fa-angle-left"></i>{$PricingProducts_Prices_List}</h4>
              {else}
                <h4><i class="fa fa-angle-right"></i>{$PricingProducts_Prices_List}</h4>
              {/if}
              
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i>{$PricingProducts_Product_Name}</th>
                    <th><i class="fa fa-bullhorn"></i>{$PricingProducts_Package}</th>
                    <th><i class="fa fa-bullhorn"></i>{$PricingProducts_Product_Price}</th>
                    <th><i class="fa fa-bullhorn"></i>{$PricingProducts_Product_Cost}</th>
                    <th><i class="fa fa-bullhorn"></i>{$PricingProducts_Set_Date}</th>
                    
                    <th></th>
                  </tr>
                </thead>
               <tbody align="left"> 
               
               {foreach from=$ProductsPricess item=$price}                        
                  <tr>
                    <td>{$price.prod_name}</td>
                    <td>{$price.package_name}</td>
                    <td class="hidden-phone">{$price.ProductPrice}</td>
                    <td class="hidden-phone">{$price.ProductCost}</td>
                    <td class="hidden-phone">{$price.PriceDate}</td>
                    <td> 		                    
                     <button class="btn btn-primary btn-xs" data-target="#myModalPrice{$price.priceId}" data-toggle="modal" data-placement="bottom" title="Reset product pricing">
            <i class="fa fa-pencil"></i>
            </button>
					  <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="Delete Package">
					  <i class="fa fa-trash-o "></i>
					  </button>					  
					</td>                    
                  </tr>		
               {/foreach} 
                  		  
                  
				  
                </tbody>
              </table>
			  
			  
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
		
		
      </section>

      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->  
{include file='../../mView/includes/footer.tpl'}
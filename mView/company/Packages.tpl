{include file='../../mView/includes/header.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}

{foreach from=$Packages item=$package}   
<div class="modal fade" id="myModalPackge{$package.package_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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
                  <label dir="rtl" class="col-sm-2 col-sm-2 control-label">{$Packages_Package_Name}</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" value="{$package.package_name}" placeholder="{$Enter_Packages_Package_Name}" name="package_name" id="package_name" required>
                  </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">{$Packages_Package_Abbreviation}</label>
                  <div class="col-sm-10">
                    <input class="form-control " value="{$package.package_abbreviation}" id="package_abbreviation" type="text" name="package_abbreviation" placeholder="{$Enter_Packages_Package_Abbreviation}" required />
                  </div> 
                </div>

               <input type="hidden" name="package_id" id="package_id" value="{$package.package_id}" />
               
        
        
        
        <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="UpdatePackage" value="UpdatePackage">Update Info.</button>                                   
                      <button class="btn btn-theme04" type="button">Cancel</button>
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
        <h3 dir="rtl"><i class="fa fa-angle-left"></i>{$Packages_Add_New_Products_Packages}</h3>
        {else}
        <h3><i class="fa fa-angle-right"></i>{$Packages_Add_New_Products_Packages}</h3>
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
            
                        
				<form {if $session_lang eq 'AR'} dir="rtl" {/if} class="cmxform form-horizontal style-form"  id="commentForm" method="post" action="#">
			           
                <div class="form-group">
                  {if $session_lang eq 'EN'}
                  <label dir="rtl" class="col-sm-2 col-sm-2 control-label">{$Packages_Package_Name}</label>
                  {/if}
                  <div class="col-sm-10">
                     <input type="text" class="form-control" placeholder="{$Enter_Packages_Package_Name}" name="package_name" id="package_name" required>
                  </div>
                  {if $session_lang eq 'AR'}
                  <label dir="rtl" class="col-sm-2 col-sm-2 control-label">{$Packages_Package_Name}</label>
                  {/if}
                </div>
                <div class="form-group">
                  {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Packages_Package_Abbreviation}</label>
                   {/if}
                  <div class="col-sm-10">
                    <input class="form-control " id="package_abbreviation" type="text" name="package_abbreviation" placeholder="{$Enter_Packages_Package_Abbreviation}" required />
                  </div>
                   {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$Packages_Package_Abbreviation}</label>
                   {/if}
                </div>
 
				<div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name="AddPakage" value="Save" >{$btn_Save}</button>
                      <button class="btn btn-theme04" type="button">{$btn_Cancel}</button>
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
                <h4 dir="rtl"><i class="fa fa-angle-left"></i>{$Packages_Packages_List}</h4>
                {else}
                <h4><i class="fa fa-angle-right"></i>{$Packages_Packages_List}</h4>
                {/if}
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i>{$Packages_Package_Name}</th>
                   <th><i class="fa fa-bullhorn"></i>{$Packages_Package_Abbreviation}</th>
                    <th></th>
                  </tr>
                </thead>
               <tbody align="left">                  
                  
                  
                  {foreach from=$Packages item=$package}                                        
                  <tr>
                    <td> {$package.package_name}</td>
                    <td class="hidden-phone">{$package.package_abbreviation}</td>                    
                    <td> 		                    
             <button class="btn btn-success btn-xs" data-target="#myModalPackge{$package.package_id}" data-toggle="modal" data-placement="bottom" title="Reset Package">
            <i class="fa fa-pencil"></i>
            </button>
					  <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="Delete Package">
					  <i class="fa fa-trash-o "></i>
					  </button>					  
					</td>
                  </tr>
                  {/foreach} 
                    
                  </tr>
				  
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
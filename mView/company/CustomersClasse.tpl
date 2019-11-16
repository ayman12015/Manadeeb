{include file='../../mView/includes/header.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}




     <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        
        {if $session_lang eq 'AR'}
        <h3 dir="rtl"><i class="fa fa-angle-lft"></i>{$CustomersClasse_Create_Customer_Classes}</h3>
        {else}        
        <h3><i class="fa fa-angle-right"></i>{$CustomersClasse_Create_Customer_Classes}</h3>
        {/if}
        
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
  <form {if $session_lang eq 'AR'} dir="rtl" {/if} class="cmxform form-horizontal style-form" id="commentForm" method="post" action="#">
			{if $success_msg neq ''}
            <div class="alert alert-success"><b>Well done!</b> {$success_msg}</div>
            {/if}
            
            {if $error_msg neq ''}
            <div class="alert alert-danger"><b>Error:{$error_msg}</div>
            {/if}
 
               
               <div class="form-group">
                 {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$CustomersClasse_Class_Name}</label>
                  {/if}
                  <div class="col-sm-10">
                    <input class="form-control " id="Class_Name" type="text" name="Class_Name" placeholder="{$Enter_CustomersClasse_Class_Name}"  required/>
                  </div> 
                  {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$CustomersClasse_Class_Name}</label>
                  {/if}                                    
                </div>    
                
                 <div class="form-group">
                   {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$CustomersClasse_Classe_Code}</label>
                  {/if}                  
                  <div class="col-sm-10">
                    <input class="form-control " id="Class_Code" type="text" name="Class_Code" placeholder="{$Enter_CustomersClasse_Classe_Code}"  required/>
                  </div>
                    {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$CustomersClasse_Classe_Code}</label>
                  {/if}    
                </div>    
                
                 
                 <div class="form-group">
                  {if $session_lang eq 'EN'}
                  <label class="col-sm-2 col-sm-2 control-label">{$CustomersClasse_Class_Sales_Status}</label>
                   {/if} 
                  <div class="col-sm-10">
                    <select class="form-control" name="Sales_Status" id="Sales_Status">     
                    <option value="0"  >{$CustomersClasse_Select_Store_Status}</option>               
                      <option value="0"  >{$CustomersClasse_Active}</option>
                      <option value="1"  >{$CustomersClasse_Not_Active}</option>
                	</select>           
                  </div> 
                   {if $session_lang eq 'AR'}
                  <label class="col-sm-2 col-sm-2 control-label">{$CustomersClasse_Class_Sales_Status}</label>
                   {/if}    
                </div>      
                 	                      
        
        <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
        <button class="btn btn-theme" name="submit" value="Save_class" type="submit">{$btn_Save}</button>
        <button class="btn btn-theme04" name="submit" type="submit" value="Cancel">{$btn_Cancel}</button>
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
               <h4 dir="rtl"><i class="fa fa-angle-left"></i>قائمة التصنيفات</h4>
               {else}
                <h4><i class="fa fa-angle-right"></i>Classes List</h4>
                {/if}
                <hr>
                <thead>
                  <tr>
                    <th>{$CustomersClasse_Class_Name}</th>
                    <th><i class="fa fa-bullhorn"></i>{$CustomersClasse_Status}</th>
                    <th></th>
                  </tr>
                </thead>
               <tbody align="left">                
               {foreach from=$ClassesList item=$cls}                        
                  <tr>
                    <td>{$cls.cls_name}</td>
                    <td>{$cls.cls_SalesStatus}</td>
                    {if $cls.default_cls eq '1' }
                    <td> 		                    
                       			  
					</td>                    
                    {else}
                    <td> 		                    
                      <button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="bottom" title="Edit Class">
					  <i class="fa fa-pencil"></i>
					  </button>
					  <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="Delete Class">
					  <i class="fa fa-trash-o "></i>
					  </button>					  
					</td>                    
                    {/if}
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
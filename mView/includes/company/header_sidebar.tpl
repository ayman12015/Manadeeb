    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
    <p class="centered"><a href="../../controllers/company/index.php"><img src="../../Design/img/ui-sam.jpg" class="img-circle" width="80"></a></p>
         
          <h5 class="centered">{$elmohandis_paint}</h5>                
          <li class="mt">
              {foreach from=$pagesAllwed item=$page}  
               {if $page.tab eq '1'} 
              <a class="{$page.active_cls}" href="{$page.pageUrl}">
              <i class="fa fa-dashboard"></i>
              <span style="font-size: 14px;font-weight: bold;">{$page.page_name}</span>
              </a>
              {/if}
                {/foreach}   

          </li>

          
         <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-user"></i>
              <span style="font-size: 14px;font-weight: bold;">{$Users_management}</span>
            </a>
         
         <ul class="sub">
               {foreach from=$pagesAllwed item=$page}  
               {if $page.tab eq '2'} 
                <li class="{$page.active_cls}">
                <a href="{$page.pageUrl}">{$page.page_name}</a></li>
                {/if}
                {/foreach}        
            </ul>   
          </li>
      
      

       <li class="sub-menu">
            <a href="javascript:;">            
              <i class="fa fa-shopping-cart"></i>
              <span style="font-size: 14px;font-weight: bold;">{$products_management}</span>
              </a>
            <ul class="sub">
               {foreach from=$pagesAllwed item=$page}  
               {if $page.tab eq '3'} 
                <li class="{$page.active_cls}">
                <a href="{$page.pageUrl}">{$page.page_name}</a></li>
                {/if}
                {/foreach}        
            </ul>   

          </li> 
               


           <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span style="font-size: 14px;font-weight: bold;">{$Customers_Management}</span>
              </a>

<ul class="sub">
               {foreach from=$pagesAllwed item=$page}  
               {if $page.tab eq '4'} 
                <li class="{$page.active_cls}">
                <a href="{$page.pageUrl}">{$page.page_name}</a></li>
                {/if}
                {/foreach}        
            </ul>   

          </li>
           
          
      <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-archive"></i>
              <span style="font-size: 14px;font-weight: bold;">{$Store_Management}</span>
              </a>
              
               <ul class="sub">
               {foreach from=$pagesAllwed item=$page}  
               {if $page.tab eq '5'} 
                <li class="{$page.active_cls}">
                <a href="{$page.pageUrl}">{$page.page_name}</a></li>
                {/if}
                {/foreach}        
            </ul>   

          </li>
          
          
          
          
      <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-truck"></i>
              <span style="font-size: 14px;font-weight: bold;">{$Trucks_and_Shipment}</span>
              </a>
            <ul class="sub">
               {foreach from=$pagesAllwed item=$page}  
               {if $page.tab eq '6'} 
                <li class="{$page.active_cls}">
                <a href="{$page.pageUrl}">{$page.page_name}</a></li>
                {/if}
                {/foreach}        
            </ul>   

          </li>
          
          
          
          
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-dollar"></i>
              <span style="font-size: 14px;font-weight: bold;">{$Finance_Management}</span>
              </a>
            <ul class="sub">
               {foreach from=$pagesAllwed item=$page}  
               {if $page.tab eq '7'} 
                <li class="{$page.active_cls}">
                <a href="{$page.pageUrl}">{$page.page_name}</a></li>
                {/if}
                {/foreach}        
            </ul>   
          </li>
          
      
    <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-building-o"></i>
              <span style="font-size: 14px;font-weight: bold;">{$General_Reports}</span>
              </a>
            
        <ul class="sub">
               {foreach from=$pagesAllwed item=$page}  
               {if $page.tab eq '8'} 
                <li class="{$page.active_cls}">
                <a href="{$page.pageUrl}">{$page.page_name}</a></li>
                {/if}
                {/foreach}        
            </ul>   
        
       </li>
      

      <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-building-o"></i>
              <span style="font-size: 14px;font-weight: bold;">{$Custome_Reports}</span>
              </a>
            
        <ul class="sub">
               {foreach from=$pagesAllwed item=$page}  
               {if $page.tab eq '9'} 
                <li class="{$page.active_cls}">
                <a href="{$page.pageUrl}">{$page.page_name}</a></li>
                {/if}
                {/foreach}        
            </ul>   
        
       </li>
 
          
          <li class="mt">
            {foreach from=$pagesAllwed item=$page}  
               {if $page.tab eq '10'} 
            <a href="{$page.pageUrl}">
              <i class="fa fa-map-marker"></i>
              <span style="font-size: 14px;font-weight: bold;">{$page.page_name}</span>
              </a>
              {/if}
                {/foreach} 
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
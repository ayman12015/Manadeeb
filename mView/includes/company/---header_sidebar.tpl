    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="../../controllers/company/index.php"><img src="../../Design/img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">ELMOHANDIS PAINTS</h5>
          <li class="mt">
            <a class="{if isset($active_index)}active {/if}" href="../../controllers/company/index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
         <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-user"></i>
              <span>Users Management</span>
              </a>
            <ul class="sub">
			  <li class="{if isset($active_NewUser)}active {/if}"><a href="../../controllers/company/NewUser.php">Add New User (Admin)</a></li>
              <li class="{if isset($active_NewUserPhone)}active {/if}"><a href="../../controllers/company/NewUserPhone.php">Add New User (POS)</a></li>
                           
              <li class="{if isset($active_SystemSetting)}active {/if}"><a href="../../controllers/company/SystemSetting.php">System Setting</a></li>
 
            </ul>
          </li>
      
		   <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-shopping-cart"></i>
              <span>Prodcts Management</span>
              </a>
            <ul class="sub">
            	<li class="{if isset($active_Vendors)}active {/if}">
                <a href="../../controllers/company/Vendors.php">Products Vendors</a></li>
                <li class="{if isset($active_Packages)}active {/if}">
                <a href="../../controllers/company/Packages.php">Products Packages</a></li>                
                <li class="{if isset($active_NewProduct)}active {/if}">
                <a href="../../controllers/company/NewProduct.php">Add New Product</a></li>
			    <li class="{if isset($active_PricingProducts)}active {/if}">
                <a href="../../controllers/company/PricingProducts.php">Pricing Products</a></li>
			     			  
            </ul>
            
          </li> 
                    
           <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Customers Management</span>
              </a>
<ul class="sub">
<li class="{if isset($active_AddNewCustomer)}active {/if}"><a href="../../controllers/company/AddNewCustomer.php">Add New Customer</a></li>
<li class="{if isset($active_CustomersClasse)}active {/if}"><a href="../../controllers/company/CustomersClasse.php">Customers Classe</a></li>
<li class="{if isset($active_ClassesConfigrations)}active {/if}"><a href="../../controllers/company/ClassesConfigrations.php">Classes Configrations</a></li>
<li class="{if isset($active_CustomersClassification)}active {/if}"><a href="../../controllers/company/CustomersClassification.php">Customers Classification</a></li>
<li class="{if isset($active_CustomersManagement)}active {/if}"><a href="../../controllers/company/CustomersManagement.php">Manage Users Customers</a></li>


</ul>
          </li>
          
          
		  <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-archive"></i>
              <span>Store Management</span>
              </a>
            <ul class="sub">
              
              <li class="{if isset($active_CreateStore)}active {/if}"><a href="../../controllers/company/CreateStore.php">Create Store</a></li>
              
              <li class="{if isset($active_ProductsStore)}active {/if}"><a href="../../controllers/company/ProductsStore.php">Products Store</a></li>
              
            </ul>
          </li>
          
          
          
          
		  <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-truck"></i>
              <span>Trucks & Shipmentment</span>
              </a>
            <ul class="sub">
<li class="{if isset($active_CustomersRequests)}active {/if}"><a href="../../controllers/company/CustomersRequests.php">Customers Requests</a></l         
><li class="{if isset($active_NewShipmentment)}active {/if}"><a href="../../controllers/company/NewShipmentment.php">New Shipmentment</a></li>
   
<!--<li class="{if isset($active_CollectionOfInvoices)}active {/if}"><a href="../../controllers/company/CollectionOfInvoices.php">Collection Of Invoices</a></li>    -->
            </ul>
          </li>
          
          
          
          
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-dollar"></i>
              <span>Finance Management</span>
              </a>
            <ul class="sub">
              <li class="{if isset($active_Finance)}active {/if}"><a href="../../controllers/company/Finance.php">Finance</a></li>            
            </ul>
          </li>
          
		  
		<li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-building-o"></i>
              <span>General Reports</span>
              </a>
            
        <ul class="sub">
            <li class="{if isset($active_rptActiveUsersWeb)}active {/if}">
            <a href="../../controllers/company/rptActiveUsersWeb.php">Users Status (Admin)</a></li>
        </ul>
        <ul class="sub">
            <li class="{if isset($active_rptActiveUsersPhone)}active {/if}">
            <a href="../../controllers/company/rptActiveUsersPhone.php">Users Status (POS)</a></li>
        </ul>
        <ul class="sub">
            <li class="{if isset($active_rptUserCustomers)}active {/if}">
            <a href="../../controllers/company/rptUserCustomers.php">User Customers</a></li>
        </ul>
        <ul class="sub">
            <li class="{if isset($active_rptProductsPackagesPrice)}active {/if}">
            <a href="../../controllers/company/rptProductsPackagesPrice.php">Product Packages & Price</a></li>
        </ul>
        <ul class="sub">
            <li class="{if isset($active_rptTrucksShipmentment)}active {/if}">
            <a href="../../controllers/company/rptTrucksShipmentment.php">Trucks Shipmentment</a></li>
        </ul>
        <ul class="sub">
            <li class="{if isset($active_rptReceiptsPayment)}active {/if}">
            <a href="../../controllers/company/rptReceiptsPayment.php">Receipts Payment </a></li>
        </ul>
        
         <ul class="sub">
            <li class="{if isset($active_rptCustomersPendingBills)}active {/if}">
            <a href="../../controllers/company/rptCustomersPendingBills.php">Customers Pending Bills</a></li>
        </ul>
        
       </li>
		  
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-bar-chart-o"></i>
              <span>Custome Reports</span>
              </a>
              
    <ul class="sub">            
    <li class="{if isset($active_CrptCustomerPerformance)}active {/if}">
        <a href="../../controllers/company/CrptCustomerPerformance.php">Customer Performance</a>
    </li>              
  </ul>
              
    
  <ul class="sub">            
    <li class="{if isset($active_CrptProductsSalesGeneral)}active {/if}">
        <a href="../../controllers/company/CrptProductsSalesGeneral.php">Products Sales-General</a>
    </li>              
  </ul>
  
  <ul class="sub">            
    <li class="{if isset($active_CrptProductsSalesPerProduc)}active {/if}">
        <a href="../../controllers/company/CrptProductsSalesPerProduc.php">Products Sales–Per Product</a>
    </li>              
  </ul>
  
  <ul class="sub">            
    <li class="{if isset($active_CrptSalesRevenueGeneral)}active {/if}">
        <a href="../../controllers/company/CrptSalesRevenueGeneral.php">Sales Revenue-General</a>
    </li>              
  </ul>
  
  <ul class="sub">            
    <li class="{if isset($active_CrptSalesRevenuePerProduct)}active {/if}">
        <a href="../../controllers/company/CrptSalesRevenuePerProduct.php">Sales Revenue–Per Product</a>
    </li>              
  </ul> 
                        
</li>
          
          <li>
            <a href="../../controllers/company/google_maps.php">
              <i class="fa fa-map-marker"></i>
              <span>Customer Loaction in Map</span>
              </a>
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
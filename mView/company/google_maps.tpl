{include file='../../mView/includes/header.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}




<body>
  <section id="container">
   
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading">
                {$google_maps_Map_with_Customer_Loaction_List}
                
                 <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
             
              <form class="form-horizontal style-form" method="post" action="#" >
 
                <div class="form-group">
                  <label class="control-label col-md-2">{$google_maps_Select_User_Name}</label>
                  <div class="col-md-4">
                    <select class="form-control" name="prod_id" id="prod_id" onChange="LoadMap(this.value)">    
        <option value="0">{$google_maps_Select_User_Name}</option>               
        {foreach from=$Users item=$usr}  
          <option value="{$usr.id}" {if $user_id eq $usr.id } selected="selected" {/if} >
           {$usr.username}</option>
        {/foreach}                                             
        </select>      
                    
                  </div>
                </div>
                
              </header>
              <div class="panel-body">
                <div id="gmap-list"></div>
              </div>
            </section>
          </div>
        </div>
                
        <!-- page end-->
      </section>
      <!-- /wrapper -->
      
      
      
      
      
{include file='../../mView/includes/map_footer.tpl'}
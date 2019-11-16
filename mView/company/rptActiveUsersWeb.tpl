{include file='../../mView/includes/rptheader.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}

<!--main content start-->
    <section id="main-content">
      <section class="wrapper">

        <h3><i class="fa fa-angle-right"></i>{$rptActiveUsersWeb_Actives_Users_Report}</h3>

        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i>{$rptActiveUsersWeb_Report_Name_Actives_Users_admin}</h4>
              <h4><i class="fa fa-angle-right"></i> {$rptActiveUsersWeb_Report_Date}  {$reportDate}</h4>
              <p>&nbsp;</p>
              <h4> </h4>
              
        <div id="rptPrint">
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>{$rptActiveUsersWeb_NO}</th> 
                      <th>{$rptActiveUsersWeb_User_Name}</th>
                      <th class="numeric">{$rptActiveUsersWeb_User_E_mail}</th>
                      <th class="numeric">{$rptActiveUsersWeb_User_Phone}</th>
                      <th class="numeric">{$rptActiveUsersWeb_User_Privileges}</th>
                      <th class="numeric">{$rptActiveUsersWeb_Status}</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  {foreach from=$Users item=$User}     
                    <tr>
                      <td>{$User.mycount}</td>
                      <td>{$User.username}</td>
                      <td class="numeric">{$User.email}</td>
                      <td class="numeric">{$User.phone}</td>
                      <td class="numeric">{$User.type}</td>
                      <td class="numeric">{$User.status}</td>
                    </tr>
                  {/foreach}   
                 
                  </tbody>
                </table>
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10" align="right">
                 <button class="btn btn-theme" type="button" name="rptPrint" value="rptPrint" onclick="rptPrint('rptPrint')">{$rptActiveUsersWeb_Print_Report}</button>
                    </div>
                  </div>
                  
                <p>&nbsp;</p>
                 
                  
              </section>
            </div>
            <!-- /content-panel -->
            
</div>
            <!-- /rptPrint -->
          </div>
          <!-- /col-lg-4 -->
        </div>
        <p><!-- /row --></p>
        <p>&nbsp;</p>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->  
{include file='../../mView/includes/footer_pagination.tpl'}
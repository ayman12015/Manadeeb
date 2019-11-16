{include file='../../mView/includes/Dashboard_header.tpl'}
{include file='../../mView/includes/company/header_notify.tpl'}
{include file='../../mView/includes/company/header_sidebar.tpl'}


    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">         
            
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3  {if $session_lang eq 'AR'}dir="rtl" {/if} >{$index_GraphTitel} - {$CUR_DATE}</h3>
            </div>
            <div class="custom-bar-chart">
                   <ul class="y-axis">
                    <li><span>100%</span></li>
                    <li><span>80%</span></li>
                    <li><span>60%</span></li>
                    <li><span>40%</span></li>
                    <li><span>20%</span></li>
                    <li><span>0%</span></li>
                  </ul>                             
               
    {foreach from=$GRAPH_PRODUCT_SALLED_PERCENTAG item=$GRAPH}
          <div class="bar">
          <div class="title">{$GRAPH.ProdName}</div>
          <div class="value tooltips" data-original-title="{$GRAPH.SalledPercentag}% {$GRAPH.SizerName}" data-toggle="tooltip" data-placement="top">{$GRAPH.SalledPercentag}%</div>
          </div>
    {/foreach} 
         
              
            </div>
            <!--custom chart end-->
            <!--custom chart end-->
            <div class="row mt">
              <!-- /col-md-4 -->
               <div class="col-md-4 col-sm-4 mb">
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5>{$index_Market_Coverage}</h5>
                  </div>
                  <canvas id="serverstatus03" height="120" width="120"></canvas>
                  {literal}
                  <script>
                    var doughnutData = [{
                        value: 60,
                        color: "#2b2b2b"
                      },
                      {
                        value: 40,
                        color: "#fffffd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus03").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  {/literal}
                  <h3 style="font-size: 18px;">{$index_USED} %60</h3>
                </div>
              </div>
              
              
             
              <div class="col-md-4 mb">
                <div class="weather pn">
                  <i>{$weather_logo}</i>
                  <h5>{$weather_country}</h5>
                  <h2>{$weather_temperature}</h2>
                   <h4>{$weather_desc}</h4>
                   {$weather_visibility}
                   {$weather_humidity}
                   {$weather_windspeed}
                   {$weather_sunrise}
                   {$weather_sunset}
                </div>
                 
              </div>                                        
           
              <!-- <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="product-panel-2 pn">
                  <div class="badge badge-hot">HOT</div>
                  <img src="../../Design/img/product.jpg" width="200" alt="">
                  <h5 class="mt">Flat Pack Heritage</h5>
                  <h6>TOTAL SALES: 1388</h6>
                  <button class="btn btn-small btn-theme04">FULL REPORT</button>
                </div>
              </div>-->
              <!-- /col-md-4 -->
              
              <div class="col-md-4 col-sm-4 mb">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                  <div class="green-header">
                    {$index_REVENUE}
                  </div>
                  <div class="chart mt">
                    <div class="sparkline" 
                    data-type="line" 
                    data-resize="true" 
                    data-height="100" 
                    data-width="90%" 
                    data-line-width="1" 
                    data-line-color="#fff" 
                    data-spot-color="#fff" 
                    data-fill-color="" 
                    data-highlight-line-color="#fff" 
                    data-spot-radius="4" 
                    data-data="[170,120,200,250,300,200,290,170,120,200,250,300,200,290]">
                    </div>
                  </div>
                  <p class="mt"><b> </b><br/>{$index_Month_Incom}</p>
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
           
             
            
            
            
            
            
            
             <!-- /row -->
          <!--  <div class="row">         
              <div class="col-md-12 mb">
                <div class="message-p pn">
                  <div class="message-header">
                    {$index_DIRECT_MESSAGE}
                  </div>
                  
                  <div class="row">
                    <div class="col-md-3 centered hidden-sm hidden-xs">
                      <img src="../../Design/img/ui-danro.jpg" class="img-circle" width="65">
                    </div>
                    <div class="col-md-9">
                      <p>
                        <name>Dan Rogers</name>
                        sent you a message.
                      </p>
                      <p class="small">3 hours ago</p>
                      <p class="message">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                      <form class="form-inline" role="form">
                        <div class="form-group">
                          <input type="text" class="form-control" id="exampleInputText" placeholder="Reply Dan">
                        </div>
                        <button type="submit" class="btn btn-default">Send</button>
                      </form>
                    </div>
                  </div>
                </div>-->
                <!-- /Message Panel-->
              <!--</div>-->
              <!-- /col-md-8  -->
           <!--</div>-->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
         <div class="col-lg-3 ds">
 
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <div class="donut-main">
              <h4>{$index_COMPLETED_PROGRESS_IN_SALES}</h4>
              <canvas id="newchart" height="130" width="130"></canvas>
              <script>
                var doughnutData = [{
                    value: {$COMPLETED_ACTIONS_PROGRESS_DONE},
                    color: "#4ECDC4"
                  },
                  {
                    value: {$COMPLETED_ACTIONS_PROGRESS_REMAINDED},
                    color: "#fdfdfd"
                  }
                ];
                var myDoughnut = new Chart(document.getElementById("newchart").getContext("2d")).Doughnut(doughnutData);
              </script>
            </div>
            <!--NEW EARNING STATS -->
            <div class="panel terques-chart">
              <div class="panel-body">
                <div class="chart">
                  <div class="centered">
                    <span>{$index_TODAY_Sales_Percentag}</span> <strong> %{$COMPLETED_ACTIONS_PROGRESS_DONE}</strong>
                  </div>
                  <br>
                      <div class="sparkline" 
                      data-type="line" 
                      data-resize="true" 
                      data-height="100" 
                      data-width="100%" 
                      data-line-width="1" 
                      data-line-color="#fff" 
                      data-spot-color="#fff" 
                      data-fill-color="" 
                      data-highlight-line-color="#fff" 
                      data-spot-radius="3" 
                      data-data="[200,135,667,333,526,996,564,123,890,564,455]">
                      </div>
                </div>
              </div>
            </div>
            <!--new earning end-->
            <!-- RECENT ACTIVITIES SECTION -->
            
            <h4 class="centered mt">{$index_RECENT_ACTIVITY}</h4>
            <!-- First Activity -->
           <marquee direction="up" height="500px" onmouseover="this.stop()" onmouseout="this.start()" >
            {foreach from=$recentactivity item=$Recent} 
             <div class="desc">
              <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
              </div>
              <div class="details"> 
               
                <p>
                  <muted>{$Recent.ACTIVITY_DATE_TIME}</muted>
                  
                  <br/>
                  <a href="#">{$Recent.username}</a> {$Recent.ACTIVITY_CONTEND} <br/>
                </p>
               
              </div>
            </div>
             {/foreach}
             </marquee>
             
            <!-- USERS ONLINE SECTION -->
             <h4 class="centered mt">{$index_TEAM_MEMBERS_ONLINE}</h4>
            <!-- First Member -->



             {foreach from=$members item=$Member} 
            <div class="desc">
              <div class="thumb">
                <img class="img-circle" src="../../Design/img/favicon.png" width="35px" height="35px" align="">
              </div>
              <div class="details">
                <p>
                  <a href="#">{$Member.username}</a><br/>
                  <muted>{$index_AVAILABLE}</muted>
                </p>
              </div>
            </div>
               {/foreach}

         

<!-- 
            <div class="desc">
             
              
                {foreach from=$members item=$Member} 
                 <div class="thumb">
                <img class="img-circle" src="../../Design/img/male.png" width="35px" height="35px" align=""><br/>
              </div>
                <p>
                  <a href="#">{$Member.username}</a><br/>
                  <muted style="color:green;">{$index_AVAILABLE}</muted><br/>
                </p>
                <br/>
                {/foreach}
               

            </div>
 -->

             
          </div>
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->










    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
{include file='../../mView/includes/Dashboard_footer.tpl'}
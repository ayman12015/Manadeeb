<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="../templates/index.html" class="logo"><b><span>Manadeeb</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          
          
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="../templates/index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">{$notyfiSize}</span>
              </a>
              
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have {$notyfiSize} Sales Percentage </p>
              </li>
              
              
              
              
               {foreach from=$UserShippingNotify item=$noty}
              <li>              
                <a href="../templates/index.html#">
                  <div class="task-info">
                    <div class="desc">{$noty.username}</div>
                    <div class="percent">{$noty.percent}%</div>
                  </div>            
                  
                  <div class="progress progress-striped">
                    <div class="
                    {if $noty.percent gt 70}
                    progress-bar progress-bar-success
                    {elseif $noty.percent gt 30}
                    progress-bar progress-bar-warning
                    {else}
                    progress-bar progress-bar-danger
                    {/if}
                    " role="progressbar" aria-valuenow="{$noty.percent}" aria-valuemin="0" aria-valuemax="100" style="width: {$noty.percent}%">
                      <span class="sr-only">{$noty.percent}% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              
               {/foreach} 
                        
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
         <!-- <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">55</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="../templates/index.html#">
                  <span class="photo"><img alt="avatar" src="../../Design/img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="../templates/index.html#">
                  <span class="photo"><img alt="avatar" src="../../Design/img/ui-divya.jpg"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="../templates/index.html#">
                  <span class="photo"><img alt="avatar" src="../../Design/img/ui-danro.jpg"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="../templates/index.html#">
                  <span class="photo"><img alt="avatar" src="../../Design/img/ui-sherman.jpg"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="../templates/index.html#">See all messages</a>
              </li>
            </ul>
          </li>-->
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
         <!-- <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="../templates/index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="../templates/index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="../templates/index.html#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="../templates/index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="../templates/index.html#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="../templates/index.html#">See all notifications</a>
              </li>
            </ul>
          </li>-->
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../../controllers/login/logout.php">Logout</a></li>
        </ul>
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{$actual_link}">{$SelectLang}</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
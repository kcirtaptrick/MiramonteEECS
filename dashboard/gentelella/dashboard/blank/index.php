<?php 
   $serverID = "u135302168";
   $isDev = strpos($_SERVER['HTTP_HOST'], "c9users.io");
   $conn = $isDev ? new mysqli(getenv('IP'), getenv('C9_USER'), "", "c9") : new mysqli("mysql.hostinger.com", serverID + "_admin", "12345trewqWERT", serverId +"_accnt");
   $conn->connect_error && die("Connection failed: " . $conn->connect_error);
   $userInfo = $conn->query("select * from userInfo where username=\"username\"")->fetch_assoc();
   ?>
<html lang="en" class=" ">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Dashboard</title>
      <!-- Bootstrap -->
      <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <!-- NProgress -->
      <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
      <!-- iCheck -->
      <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
      <!-- bootstrap-progressbar -->
      <link href="../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
      <!-- JQVMap -->
      <link href="../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet">
      <!-- bootstrap-daterangepicker -->
      <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
      <!-- Custom Theme Style -->
      <link href="../../build/css/custom.min.css" rel="stylesheet">
      <style>
         .menu_fixed::-webkit-scrollbar {
            width: 0px; 
            background: transparent;  
         }
         #sidebar-menu i.fas, #sidebar-menu i.far, #sidebar-menu i.fal {
            margin-right: 0.8rem;
            font-size: 1.5rem;
         }
         #sidebar-menu {
            overflow-y: scroll;
            overflow-x: hidden;
         }
         #sidebar-menu ul {
            overflow-x: visible;
         }
         .nav-md #sidebar-menu {
            height: calc(100vh - 167px);
         }
         .nav-sm #sidebar-menu {
            height: calc(100vh - 70px);
         }
         .nav-sm .site_title {
            margin-top: 10px;
         }
         .nav-md .nav_title img {
            width: 40;
         }
         .nav-sm .nav_title img {
            width: 46;
         }
      </style>
   </head>
   <body class="nav-md">
      <div class="container body">
         <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
               <div class="left_col scroll-view">
                  <div class="navbar nav_title" style="border: 0;">
                     <a href="index.html" class="site_title"><img src="../../../../Miramonte-EECS(white_background).png"/></i> <span> Dashboard</span></a>
                  </div>
                  <div class="clearfix"></div>
                  <!-- menu profile quick info -->
                  <div class="profile clearfix">
                     <div class="profile_pic">
                        <img src="https://www.freeiconspng.com/uploads/am-a-19-year-old-multimedia-artist-student-from-manila--21.png" alt="..." class="img-circle profile_img">
                     </div>
                     <div class="profile_info">
                        <span>Welcome,</span>
                        <h2 style="word-wrap: break-word; width: calc(230px * 0.55)"><?php echo $userInfo["firstname"] . " " . $userInfo["lastname"];?></h2>
                     </div>
                  </div>
                  <!-- /menu profile quick info -->
                  <br>
                  <!-- sidebar menu -->
                  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu menu_fixed">
                     <div class="menu_section active">
                        <h3>General</h3>
                        <ul class="nav side-menu" style="">
                           <li class="active current-page">
                              <a><i class="fas fa-home"></i> Home </a>
                           </li>
                           <!--<li><a href="../"><i class="fas fa-user-shield"></i> Administration </a></li>-->
                           <li>
                              <a><i class="fas fa-users"></i> Clubs <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="#">Computer Science</a></li>
                                 <li><a href="#">Game Development</a></li>
                                 <li><a href="#">Pioneers in Engineering</a></li>
                              </ul>
                           </li>
                           <li>
                              <a><i class="fas fa-project-diagram"></i> Projects </a>
                           </li>
                           <li>
                              <a><i class="fa fa-calendar"></i> Calendar <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="#">Events</a></li>
                                 <li><a href="#">Meetings</a></li>
                                 <li><a href="#">Deadlines</a></li>
                              </ul>
                           </li>
                           <li>
                              <a><i class="far fa-comment-alt"></i> Suggestions <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="#">Suggest Feature</a></li>
                                 <li><a href="#">Report Bug</a></li>
                              </ul>
                           </li>
                           <li>
                              <a><i class="fas fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="form.html">General Form</a></li>
                                 <li><a href="form_advanced.html">Advanced Components</a></li>
                                 <li><a href="form_validation.html">Form Validation</a></li>
                                 <li><a href="form_wizards.html">Form Wizard</a></li>
                                 <li><a href="form_upload.html">Form Upload</a></li>
                                 <li><a href="form_buttons.html">Form Buttons</a></li>
                              </ul>
                           </li>
                           <li>
                              <a><i class="fas fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="general_elements.html">General Elements</a></li>
                                 <li><a href="media_gallery.html">Media Gallery</a></li>
                                 <li><a href="typography.html">Typography</a></li>
                                 <li><a href="icons.html">Icons</a></li>
                                 <li><a href="glyphicons.html">Glyphicons</a></li>
                                 <li><a href="widgets.html">Widgets</a></li>
                                 <li><a href="invoice.html">Invoice</a></li>
                                 <li><a href="inbox.html">Inbox</a></li>
                                 <li><a href="calendar.html">Calendar</a></li>
                              </ul>
                           </li>
                           <li>
                              <a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="tables.html">Tables</a></li>
                                 <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                              </ul>
                           </li>
                           <li>
                              <a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="chartjs.html">Chart JS</a></li>
                                 <li><a href="chartjs2.html">Chart JS2</a></li>
                                 <li><a href="morisjs.html">Moris JS</a></li>
                                 <li><a href="echarts.html">ECharts</a></li>
                                 <li><a href="other_charts.html">Other Charts</a></li>
                              </ul>
                           </li>
                           <li>
                              <a><i class="fa fa-clone"></i> Layouts <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                                 <li><a href="fixed_footer.html">Fixed Footer</a></li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                     <div class="menu_section">
                        <h3>Administration</h3>
                        <ul class="nav side-menu">
                           <li>
                              <a><i class="fa fa-bug"></i> Site <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="#">Treeview</a></li>
                                 <li><a href="#">Editor</a></li>
                                 <li><a href="#">Preview</a></li>
                              </ul>
                           </li>
                           <li>
                              <a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="e_commerce.html">E-commerce</a></li>
                                 <li><a href="projects.html">Projects</a></li>
                                 <li><a href="project_detail.html">Project Detail</a></li>
                                 <li><a href="contacts.html">Contacts</a></li>
                                 <li><a href="profile.html">Profile</a></li>
                              </ul>
                           </li>
                           <li>
                              <a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="page_403.html">403 Error</a></li>
                                 <li><a href="page_404.html">404 Error</a></li>
                                 <li><a href="page_500.html">500 Error</a></li>
                                 <li><a href="plain_page.html">Plain Page</a></li>
                                 <li><a href="login.html">Login Page</a></li>
                                 <li><a href="pricing_tables.html">Pricing Tables</a></li>
                              </ul>
                           </li>
                           <li>
                              <a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="#level1_1">Level One</a>
                                 </li>
                                 <li>
                                    <a>Level One<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                       <li class="sub_menu"><a href="level2.html">Level Two</a>
                                       </li>
                                       <li><a href="#level2_1">Level Two</a>
                                       </li>
                                       <li><a href="#level2_2">Level Two</a>
                                       </li>
                                    </ul>
                                 </li>
                                 <li><a href="#level1_2">Level One</a>
                                 </li>
                              </ul>
                           </li>
                           <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                        </ul>
                     </div>
                  </div>
                  <!-- /sidebar menu -->
                  <!-- /menu footer buttons -->
                  <div class="sidebar-footer hidden-small">
                     <span class="glyphicons glyphicons-user"></span>
                     <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Profile">
                     <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                     </a>
                     <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
                     <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                     </a>
                     <a data-toggle="tooltip" data-placement="top" title="" data-original-title="FullScreen">
                     <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                     </a>
                     <a data-toggle="tooltip" data-placement="top" title="" href="login.html" data-original-title="Logout">
                     <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                     </a>
                  </div>
                  <!-- /menu footer buttons -->
               </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
               <div class="nav_menu">
                  <nav>
                     <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                     </div>
                     <ul class="nav navbar-nav navbar-right">
                        <li class="">
                           <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                           <img src="https://www.freeiconspng.com/uploads/am-a-19-year-old-multimedia-artist-student-from-manila--21.png" alt="">John Doe
                           <span class=" fa fa-angle-down"></span>
                           </a>
                           <ul class="dropdown-menu dropdown-usermenu pull-right">
                              <li><a href="javascript:;"> Profile</a></li>
                              <li>
                                 <a href="javascript:;">
                                 <span class="badge bg-red pull-right">50%</span>
                                 <span>Settings</span>
                                 </a>
                              </li>
                              <li><a href="javascript:;">Help</a></li>
                              <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                           </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                           <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                           <i class="fa fa-envelope-o"></i>
                           <span class="badge bg-green">6</span>
                           </a>
                           <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                              <li>
                                 <a>
                                 <span class="image"><img src="https://www.freeiconspng.com/uploads/am-a-19-year-old-multimedia-artist-student-from-manila--21.png" alt="Profile Image"></span>
                                 <span>
                                 <span>John Smith</span>
                                 <span class="time">3 mins ago</span>
                                 </span>
                                 <span class="message">
                                 Film festivals used to be do-or-die moments for movie makers. They were where...
                                 </span>
                                 </a>
                              </li>
                              <li>
                                 <a>
                                 <span class="image"><img src="https://www.freeiconspng.com/uploads/am-a-19-year-old-multimedia-artist-student-from-manila--21.png" alt="Profile Image"></span>
                                 <span>
                                 <span>John Smith</span>
                                 <span class="time">3 mins ago</span>
                                 </span>
                                 <span class="message">
                                 Film festivals used to be do-or-die moments for movie makers. They were where...
                                 </span>
                                 </a>
                              </li>
                              <li>
                                 <a>
                                 <span class="image"><img src="https://www.freeiconspng.com/uploads/am-a-19-year-old-multimedia-artist-student-from-manila--21.png" alt="Profile Image"></span>
                                 <span>
                                 <span>John Smith</span>
                                 <span class="time">3 mins ago</span>
                                 </span>
                                 <span class="message">
                                 Film festivals used to be do-or-die moments for movie makers. They were where...
                                 </span>
                                 </a>
                              </li>
                              <li>
                                 <a>
                                 <span class="image"><img src="https://www.freeiconspng.com/uploads/am-a-19-year-old-multimedia-artist-student-from-manila--21.png" alt="Profile Image"></span>
                                 <span>
                                 <span>John Smith</span>
                                 <span class="time">3 mins ago</span>
                                 </span>
                                 <span class="message">
                                 Film festivals used to be do-or-die moments for movie makers. They were where...
                                 </span>
                                 </a>
                              </li>
                              <li>
                                 <div class="text-center">
                                    <a>
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                    </a>
                                 </div>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main" style="min-height: 1875px;">
               <!-- top tiles -->
            </div>
            <!-- /page content -->
         </div>
      </div>
      <!-- jQuery -->
      <script async="" src="https://www.google-analytics.com/analytics.js"></script>
      <script src="../../vendors/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- FastClick -->
      <script src="../../vendors/fastclick/lib/fastclick.js"></script>
      <!-- NProgress -->
      <script src="../../vendors/nprogress/nprogress.js"></script>
      <!-- Chart.js -->
      <script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
      <!-- gauge.js -->
      <script src="../../vendors/gauge.js/dist/gauge.min.js"></script>
      <!-- bootstrap-progressbar -->
      <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
      <!-- iCheck -->
      <script src="../../vendors/iCheck/icheck.min.js"></script>
      <!-- Skycons -->
      <script src="../../vendors/skycons/skycons.js"></script>
      <!-- Flot -->
      <script src="../../vendors/Flot/jquery.flot.js"></script>
      <script src="../../vendors/Flot/jquery.flot.pie.js"></script>
      <script src="../../vendors/Flot/jquery.flot.time.js"></script>
      <script src="../../vendors/Flot/jquery.flot.stack.js"></script>
      <script src="../../vendors/Flot/jquery.flot.resize.js"></script>
      <!-- Flot plugins -->
      <script src="../../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
      <script src="../../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
      <script src="../../vendors/flot.curvedlines/curvedLines.js"></script>
      <!-- DateJS -->
      <script src="../../vendors/DateJS/build/date.js"></script>
      <!-- JQVMap -->
      <script src="../../vendors/jqvmap/dist/jquery.vmap.js"></script>
      <script src="../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
      <script src="../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
      <!-- bootstrap-daterangepicker -->
      <script src="../../vendors/moment/min/moment.min.js"></script>
      <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
      <!-- Custom Theme Scripts -->
      <script src="../../build/js/custom.js"></script>
      <div class="jqvmap-label" style="display: none;"></div>
      <div class="daterangepicker dropdown-menu ltr opensleft">
         <div class="calendar left">
            <div class="daterangepicker_input">
               <input class="input-mini form-control" type="text" name="daterangepicker_start" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i>
               <div class="calendar-time" style="display: none;">
                  <div></div>
                  <i class="fa fa-clock-o glyphicon glyphicon-time"></i>
               </div>
            </div>
            <div class="calendar-table"></div>
         </div>
         <div class="calendar right">
            <div class="daterangepicker_input">
               <input class="input-mini form-control" type="text" name="daterangepicker_end" value=""><i class="fa fa-calendar glyphicon glyphicon-calendar"></i>
               <div class="calendar-time" style="display: none;">
                  <div></div>
                  <i class="fa fa-clock-o glyphicon glyphicon-time"></i>
               </div>
            </div>
            <div class="calendar-table"></div>
         </div>
         <div class="ranges">
            <ul>
               <li data-range-key="Today">Today</li>
               <li data-range-key="Yesterday">Yesterday</li>
               <li data-range-key="Last 7 Days">Last 7 Days</li>
               <li data-range-key="Last 30 Days">Last 30 Days</li>
               <li data-range-key="This Month">This Month</li>
               <li data-range-key="Last Month">Last Month</li>
               <li data-range-key="Custom">Custom</li>
            </ul>
            <div class="range_inputs"><button class="applyBtn btn btn-default btn-small btn-primary" disabled="disabled" type="button">Submit</button> <button class="cancelBtn btn btn-default btn-small" type="button">Clear</button></div>
         </div>
      </div>
   </body>
</html>
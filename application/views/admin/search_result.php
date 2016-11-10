<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Search Results</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style_responsive.css" rel="stylesheet" />
   <link href="css/style_default.css" rel="stylesheet" id="style_color" />

   <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid">
               <!-- BEGIN LOGO -->
               <a class="brand" href="index.php">
                   <img src="img/logo.png" alt="Admin Lab" />
               </a>
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
               <div id="top_menu" class="nav notify-row">
                   <!-- BEGIN NOTIFICATION -->
                   <ul class="nav top-menu">
                       <!-- BEGIN SETTINGS -->
                       <li class="dropdown">
                           <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="search_result.php#" data-original-title="Settings">
                               <i class="icon-cog"></i>
                           </a>
                       </li>
                       <!-- END SETTINGS -->
                       <!-- BEGIN INBOX DROPDOWN -->
                       <li class="dropdown" id="header_inbox_bar">
                           <a href="search_result.php#" class="dropdown-toggle" data-toggle="dropdown">
                               <i class="icon-envelope-alt"></i>
                               <span class="badge badge-important">5</span>
                           </a>
                           <ul class="dropdown-menu extended inbox">
                               <li>
                                   <p>You have 5 new messages</p>
                               </li>
                               <li>
                                   <a href="search_result.php#">
                                       <span class="photo"><img src="img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Dulal Khan</span>
									<span class="time">Just now</span>
									</span>
									<span class="message">
									    Hello, this is an example messages please check
									</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="search_result.php#">
                                       <span class="photo"><img src="img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Rafiqul Islam</span>
									<span class="time">10 mins</span>
									</span>
									<span class="message">
									 Hi, Mosaddek Bhai how are you ?
									</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="search_result.php#">
                                       <span class="photo"><img src="img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Sumon Ahmed</span>
									<span class="time">3 hrs</span>
									</span>
									<span class="message">
									    This is awesome dashboard templates
									</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="search_result.php#">
                                       <span class="photo"><img src="img/avatar-mini.png" alt="avatar" /></span>
									<span class="subject">
									<span class="from">Dulal Khan</span>
									<span class="time">Just now</span>
									</span>
									<span class="message">
									    Hello, this is an example messages please check
									</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="search_result.php#">See all messages</a>
                               </li>
                           </ul>
                       </li>
                       <!-- END INBOX DROPDOWN -->
                       <!-- BEGIN NOTIFICATION DROPDOWN -->
                       <li class="dropdown" id="header_notification_bar">
                           <a href="search_result.php#" class="dropdown-toggle" data-toggle="dropdown">

                               <i class="icon-bell-alt"></i>
                               <span class="badge badge-warning">7</span>
                           </a>
                           <ul class="dropdown-menu extended notification">
                               <li>
                                   <p>You have 7 new notifications</p>
                               </li>
                               <li>
                                   <a href="search_result.php#">
                                       <span class="label label-important"><i class="icon-bolt"></i></span>
                                       Server #3 overloaded.
                                       <span class="small italic">34 mins</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="search_result.php#">
                                       <span class="label label-warning"><i class="icon-bell"></i></span>
                                       Server #10 not respoding.
                                       <span class="small italic">1 Hours</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="search_result.php#">
                                       <span class="label label-important"><i class="icon-bolt"></i></span>
                                       Database overloaded 24%.
                                       <span class="small italic">4 hrs</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="search_result.php#">
                                       <span class="label label-success"><i class="icon-plus"></i></span>
                                       New user registered.
                                       <span class="small italic">Just now</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="search_result.php#">
                                       <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                       Application error.
                                       <span class="small italic">10 mins</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="search_result.php#">See all notifications</a>
                               </li>
                           </ul>
                       </li>
                       <!-- END NOTIFICATION DROPDOWN -->

                   </ul>
               </div>
               <!-- END  NOTIFICATION -->
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu" >
                       <!-- BEGIN SUPPORT -->
                       <li class="dropdown mtop5">

                           <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="search_result.php#" data-original-title="Chat">
                               <i class="icon-comments-alt"></i>
                           </a>
                       </li>
                       <li class="dropdown mtop5">
                           <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="search_result.php#" data-original-title="Help">
                               <i class="icon-headphones"></i>
                           </a>
                       </li>
                       <!-- END SUPPORT -->
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown">
                           <a href="search_result.php#" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="img/avatar1_small.jpg" alt="">
                               <span class="username">Mosaddek Hossain</span>
                               <b class="caret"></b>
                           </a>
                           <ul class="dropdown-menu">
                               <li><a href="search_result.php#"><i class="icon-user"></i> My Profile</a></li>
                               <li><a href="search_result.php#"><i class="icon-tasks"></i> My Tasks</a></li>
                               <li><a href="search_result.php#"><i class="icon-calendar"></i> Calendar</a></li>
                               <li class="divider"></li>
                               <li><a href="login.php"><i class="icon-key"></i> Log Out</a></li>
                           </ul>
                       </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->   
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div id="sidebar" class="nav-collapse collapse">
         <div class="sidebar-toggler hidden-phone"></div>
         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu">
              <li class="has-sub">
                  <a href="javascript:;" class="">
                      <span class="icon-box"> <i class="icon-dashboard"></i></span> Dashboard
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="index.php">Dashboard 1</a></li>
                      <li><a class="" href="index.php">Dashboard 2</a></li>

                  </ul>
              </li>
              <li class="has-sub">
                  <a href="javascript:;" class="">
                      <span class="icon-box"> <i class="icon-book"></i></span> UI Elements
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="ui_elements_general.php">General</a></li>
                      <li><a class="" href="ui_elements_buttons.php">Buttons</a></li>
                      <li><a class="" href="jquery_ui.php">jQuery UI Component</a></li>
                      <li><a class="" href="ui_elements_tabs_accordions.php">Tabs & Accordions</a></li>
                      <li><a class="" href="ui_elements_typography.php">Typography</a></li>
                      <li><a class="" href="tree_view.php">Tree View</a></li>
                      <li><a class="" href="nestable.php">Nestable List</a></li>
                  </ul>
              </li>
              <li class="has-sub">
                  <a href="javascript:;" class="">
                      <span class="icon-box"><i class="icon-cogs"></i></span> Components
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="calendar.php">Calendar</a></li>
                      <li><a class="" href="grids.php">Grids</a></li>
                      <li><a class="" href="charts.php">Visual Charts</a></li>
                      <li><a class="" href="messengers.php">Conversations</a></li>
                      <li><a class="" href="gallery.php"> Gallery</a></li>
                  </ul>
              </li>
              <li class="has-sub">
                  <a href="javascript:;" class="">
                      <span class="icon-box"><i class="icon-tasks"></i></span> Form Stuff
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="form_layout.php">Form Layouts</a></li>
                      <li><a class="" href="form_component.php">Form Components</a></li>
                      <li><a class="" href="form_wizard.php">Form Wizard</a></li>
                      <li><a class="" href="form_validation.php">Form Validation</a></li>
                      <li><a class="" href="dropzone.php">Dropzone File Upload </a></li>
                  </ul>
              </li>
              <li class="has-sub">
                  <a href="javascript:;" class="">
                      <span class="icon-box"><i class="icon-th"></i></span> Data Tables
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="basic_table.php">Basic Table</a></li>
                      <li><a class="" href="managed_table.php">Managed Table</a></li>
                      <li><a class="" href="editable_table.php">Editable Table</a></li>
                  </ul>
              </li>
              <li class="has-sub">
                  <a href="javascript:;" class="">
                      <span class="icon-box"><i class=" icon-qrcode"></i></span> Portlets
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="general_portlet.php">General Portlets</a></li>
                      <li><a class="" href="draggable_portlet.php">Draggable Portlets</a></li>
                  </ul>
              </li>

              <li class="has-sub">
                  <a href="javascript:;" class="">
                      <span class="icon-box"><i class="icon-fire"></i></span> Icons
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="font_awesome.php">Font Awesome</a></li>
                      <li><a class="" href="glyphicons.php">Glyphicons</a></li>
                  </ul>
              </li>
              <li class="has-sub">
                  <a href="javascript:;" class="">
                      <span class="icon-box"><i class="icon-map-marker"></i></span> Maps
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="maps_google.php"> Google Maps</a></li>
                      <li><a class="" href="maps_vector.php"> Vector Maps</a></li>
                  </ul>
              </li>
              <li class="has-sub">
                  <a href="javascript:;" class="">
                      <span class="icon-box"><i class="icon-file-alt"></i></span> Sample Pages
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="blank.php">Blank Page</a></li>
                      <li><a class="" href="sidebar_closed.php">Sidebar Closed Page</a></li>
                      <li><a class="" href="coming_soon.php">Coming Soon</a></li>
                      <li><a class="" href="blog.php">Blog</a></li>
                      <li><a class="" href="news.php">News</a></li>
                      <li><a class="" href="about_us.php">About Us</a></li>
                      <li><a class="" href="contact_us.php">Contact Us</a></li>
                      <li><a class="" href="email_templates.php">Email Templates</a></li>
                  </ul>
              </li>
              <li class="has-sub active">
                  <a href="javascript:;" class="">
                      <span class="icon-box"><i class="icon-glass"></i></span> Extra
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="lock.php">Lock Screen</a></li>
                      <li><a class="" href="profile.php">Profile</a></li>
                      <li><a class="" href="invoice.php">Invoice</a></li>
                      <li><a class="" href="pricing_tables.php">Pricing Tables</a></li>
                      <li><a class="" href="inbox.php">Inbox</a></li>
                      <li class="active"><a class="" href="search_result.php">Search Result</a></li>
                      <li><a class="" href="faq.php">FAQ</a></li>
                      <li><a class="" href="404.php">404 Error</a></li>
                      <li><a class="" href="500.php">500 Error</a></li>
                  </ul>
              </li>
              <li><a class="" href="login.php"><span class="icon-box"><i class="icon-user"></i></span> Login Page</a></li>
          </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-navy-blue" data-style="navy-blue"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->                          
                  <h3 class="page-title">
                      Search Results
                     <small>search results samples</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="search_result.php#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="search_result.php#">Extra</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="search_result.php#">Search Results</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div id="page">
               <div class="row-fluid ">
                  <div class="span12">
                     <!-- BEGIN TAB PORTLET-->   
                     <div class="widget widget-tabs">
                        <div class="widget-title">
                           <!--<h4><i class=" icon-search"></i>Search Result</h4>-->
                        </div>
                        <div class="widget-body">
                           <div class="tabbable portlet-tabs">
                              <ul class="nav nav-tabs pull-left">
                                 <li><a href="search_result.php#portlet_tab4" data-toggle="tab">Product Search</a></li>
                                 <li><a href="search_result.php#portlet_tab3" data-toggle="tab">Company Search</a></li>
                                 <li><a href="search_result.php#portlet_tab2" data-toggle="tab">File Search</a></li>
                                 <li class="active"><a href="search_result.php#portlet_tab1" data-toggle="tab">Classsic Search</a></li>
                              </ul>
                               <div class="clearfix"></div>
                              <div class="tab-content">
                                 <div class="tab-pane active" id="portlet_tab1">
                                     <form class="form-horizontal search-result">
                                         <div class="control-group">
                                             <label class="control-label">Search</label>
                                             <div class="controls">
                                                 <input type="text" class="input-xxlarge" >
                                                 <p class="help-block">About 3,880,000 results (0.29 seconds) </p>
                                             </div>
                                             <button type="submit" class="btn btn-info">SEARCH</button>
                                         </div>
                                     </form>
                                     <div class="space20"></div>
                                     <!-- BEGIN CLASSIC SEARCH-->
                                     <div class="classic-search">
                                         <h4><a href="search_result.php#">Vector Lab launched their admin control dashboard- Admin Lab</a></h4>
                                         <a href="search_result.php#">http://themeforest.net/item/admin-lab-responsive-admin-dashboard-template/4701827</a>
                                         <p>Admin Lab is a responsive admin dashboard template built with Twitter Bootstrap Framework and it has a huge collection of reusable UI components and integrated with jQuery plugins also. </p>
                                     </div>
                                     <div class="classic-search">
                                         <h4><a href="search_result.php#">Vector Lab launched their admin control dashboard- Admin Lab</a></h4>
                                         <a href="search_result.php#">http://themeforest.net/item/admin-lab-responsive-admin-dashboard-template/4701827</a>
                                         <p>Admin Lab is a responsive admin dashboard template built with Twitter Bootstrap Framework and it has a huge collection of reusable UI components and integrated with jQuery plugins also. </p>
                                     </div>
                                     <div class="classic-search">
                                         <h4><a href="search_result.php#">Vector Lab launched their admin control dashboard- Admin Lab</a></h4>
                                         <a href="search_result.php#">http://themeforest.net/item/admin-lab-responsive-admin-dashboard-template/4701827</a>
                                         <p>Admin Lab is a responsive admin dashboard template built with Twitter Bootstrap Framework and it has a huge collection of reusable UI components and integrated with jQuery plugins also. </p>
                                     </div>
                                     <div class="classic-search">
                                         <h4><a href="search_result.php#">Vector Lab launched their admin control dashboard- Admin Lab</a></h4>
                                         <a href="search_result.php#">http://themeforest.net/item/admin-lab-responsive-admin-dashboard-template/4701827</a>
                                         <p>Admin Lab is a responsive admin dashboard template built with Twitter Bootstrap Framework and it has a huge collection of reusable UI components and integrated with jQuery plugins also. </p>
                                     </div>
                                     <div class="classic-search">
                                         <h4><a href="search_result.php#">Vector Lab launched their admin control dashboard- Admin Lab</a></h4>
                                         <a href="search_result.php#">http://themeforest.net/item/admin-lab-responsive-admin-dashboard-template/4701827</a>
                                         <p>Admin Lab is a responsive admin dashboard template built with Twitter Bootstrap Framework and it has a huge collection of reusable UI components and integrated with jQuery plugins also. </p>
                                     </div>

                                     <!-- END CLASSIC SEARCH-->

                                     <div class="pagination pagination-centered">
                                         <ul>
                                             <li><a href="search_result.php#">Prev</a></li>
                                             <li class="active"><a href="search_result.php#">1</a></li>
                                             <li><a href="search_result.php#">2</a></li>
                                             <li><a href="search_result.php#">3</a></li>
                                             <li><a href="search_result.php#">4</a></li>
                                             <li><a href="search_result.php#">5</a></li>
                                             <li><a href="search_result.php#">Next</a></li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div class="tab-pane" id="portlet_tab2">
                                     <form class="form-horizontal search-result">
                                         <div class="control-group">
                                             <label class="control-label">Search</label>
                                             <div class="controls">
                                                 <input type="text" class="input-xxlarge" >
                                                 <p class="help-block">About 3,880,000 results (0.29 seconds) </p>
                                             </div>
                                             <button type="submit" class="btn btn-info">SEARCH</button>
                                         </div>
                                     </form>
                                     <div class="space20"></div>
                                     <!-- BEGIN FILE SEARCH-->
                                     <table class="table table-hover file-search">
                                         <thead>
                                         <tr>
                                             <th>File Name & Location</th>
                                             <th>Created</th>
                                             <th>Last Modify</th>
                                             <th>Size</th>
                                             <th>Type</th>
                                         </tr>
                                         </thead>
                                         <tbody>
                                         <tr>
                                             <td>
                                                 <img src="img/file-search/doc.png" alt="">
                                                 <strong>Linux Manual for dummies.doc</strong>
                                                 C:\Users\Murat\Documents\My Dropbox
                                             </td>
                                             <td>01.01.2012	</td>
                                             <td>12.05.2013</td>
                                             <td>193 KB</td>
                                             <td>File</td>
                                         </tr>
                                         <tr>
                                             <td>
                                                 <img src="img/file-search/ppt.png" alt="">
                                                 <strong>User Documentation.ppt</strong>
                                                 C:\Users\Murat\Documents\My Dropbox
                                             </td>
                                             <td>01.01.2012	</td>
                                             <td>12.05.2013</td>
                                             <td>193 KB</td>
                                             <td>File</td>
                                         </tr>
                                         <tr>
                                             <td>
                                                 <img src="img/file-search/xls.png" alt="">
                                                 <strong>Price chart Table.xls</strong>
                                                 C:\Users\Murat\Documents\My Dropbox
                                             </td>
                                             <td>01.01.2012	</td>
                                             <td>12.05.2013</td>
                                             <td>193 KB</td>
                                             <td>File</td>
                                         </tr>
                                         <tr>
                                             <td>
                                                 <img src="img/file-search/jpg.png" alt="">
                                                 <strong>Linux Wallpaper.jpg</strong>
                                                 C:\Users\Murat\Documents\My Dropbox
                                             </td>
                                             <td>01.01.2012	</td>
                                             <td>12.05.2013</td>
                                             <td>193 KB</td>
                                             <td>File</td>
                                         </tr>
                                         <tr>
                                             <td>
                                                 <img src="img/file-search/zip.png" alt="">
                                                 <strong>All Main files.zip</strong>
                                                 C:\Users\Murat\Documents\My Dropbox
                                             </td>
                                             <td>01.01.2012	</td>
                                             <td>12.05.2013</td>
                                             <td>193 KB</td>
                                             <td>File</td>
                                         </tr>
                                         <tr>
                                             <td>
                                                 <img src="img/file-search/pdf.png" alt="">
                                                 <strong>Admin Lab User Manual and Help fiule.pdf</strong>
                                                 C:\Users\Murat\Documents\My Dropbox
                                             </td>
                                             <td>01.01.2012	</td>
                                             <td>12.05.2013</td>
                                             <td>193 KB</td>
                                             <td>File</td>
                                         </tr>
                                         <tr>
                                             <td>
                                                 <img src="img/file-search/ai.png" alt="">
                                                 <strong>Vector Lab Logo and Other stuff.ai</strong>
                                                 C:\Users\Murat\Documents\My Dropbox
                                             </td>
                                             <td>01.01.2012	</td>
                                             <td>12.05.2013</td>
                                             <td>193 KB</td>
                                             <td>File</td>
                                         </tr>
                                         <tr>
                                             <td>
                                                 <img src="img/file-search/psd.png" alt="">
                                                 <strong>Vectorlab wallpaper.psd</strong>
                                                 C:\Users\Murat\Documents\My Dropbox
                                             </td>
                                             <td>01.01.2012	</td>
                                             <td>12.05.2013</td>
                                             <td>193 KB</td>
                                             <td>File</td>
                                         </tr>
                                         <tr>
                                             <td>
                                                 <img src="img/file-search/rss.png" alt="">
                                                 <strong>themeforest feed.rss</strong>
                                                 C:\Users\Murat\Documents\My Dropbox
                                             </td>
                                             <td>01.01.2012	</td>
                                             <td>12.05.2013</td>
                                             <td>193 KB</td>
                                             <td>File</td>
                                         </tr>
                                         <tr>
                                             <td>
                                                 <img src="img/file-search/email.png" alt="">
                                                 <strong>Order and Contact.eml</strong>
                                                 C:\Users\Murat\Documents\My Dropbox
                                             </td>
                                             <td>01.01.2012	</td>
                                             <td>12.05.2013</td>
                                             <td>193 KB</td>
                                             <td>File</td>
                                         </tr>
                                         <tr>
                                             <td>
                                                 <img src="img/file-search/eps.png" alt="">
                                                 <strong>Admin Lab.eps</strong>
                                                 C:\Users\Murat\Documents\My Dropbox
                                             </td>
                                             <td>01.01.2012	</td>
                                             <td>12.05.2013</td>
                                             <td>193 KB</td>
                                             <td>File</td>
                                         </tr>

                                         </tbody>
                                     </table>
                                     <!-- END FILE SEARCH-->
                                     <div class="space20"></div>

                                     <div class="pagination pagination-centered">
                                         <ul>
                                             <li><a href="search_result.php#">Prev</a></li>
                                             <li class="active"><a href="search_result.php#">1</a></li>
                                             <li><a href="search_result.php#">2</a></li>
                                             <li><a href="search_result.php#">3</a></li>
                                             <li><a href="search_result.php#">4</a></li>
                                             <li><a href="search_result.php#">5</a></li>
                                             <li><a href="search_result.php#">Next</a></li>
                                         </ul>
                                     </div>

                                 </div>
                                 <div class="tab-pane" id="portlet_tab3">
                                     <form class="form-horizontal search-result">
                                         <div class="control-group">
                                             <label class="control-label">Search</label>
                                             <div class="controls">
                                                 <input type="text" class="input-xxlarge" >
                                                 <p class="help-block">About 3,880,000 results (0.29 seconds) </p>
                                             </div>
                                             <button type="submit" class="btn btn-info">SEARCH</button>
                                         </div>
                                     </form>
                                     <div class="space20"></div>
                                     <!--BEGIN COMPANY SEARCH-->
                                     <table class="table table-bordered table-hover">
                                         <thead>
                                         <tr>
                                             <th>Company Name</th>
                                             <th class="hidden-phone">Descrition</th>
                                             <th>Total Transaction</th>
                                             <th>Paid</th>
                                             <th>Due</th>
                                         </tr>
                                         </thead>
                                         <tbody>
                                         <tr>
                                             <td><a href="search_result.php#">Frame 2 frame</a></td>
                                             <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                             <td>$ 20,000</td>
                                             <td>$ 12,000</td>
                                             <td>$ 8,000</td>
                                         </tr>
                                         <tr>
                                             <td><a href="search_result.php#">Dot Net Corporation</a></td>
                                             <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                             <td>$ 20,000</td>
                                             <td>$ 12,000</td>
                                             <td>$ 8,000</td>
                                         </tr>
                                         <tr>
                                             <td><a href="search_result.php#">Graphic People	</a></td>
                                             <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                             <td>$ 20,000</td>
                                             <td>$ 12,000</td>
                                             <td>$ 8,000</td>
                                         </tr>
                                         <tr>
                                             <td><a href="search_result.php#">Graphzone</a></td>
                                             <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                             <td>$ 20,000</td>
                                             <td>$ 12,000</td>
                                             <td>$ 8,000</td>
                                         </tr>
                                         <tr>
                                             <td><a href="search_result.php#">Mega Pixel</a></td>
                                             <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                             <td>$ 20,000</td>
                                             <td>$ 12,000</td>
                                             <td>$ 8,000</td>
                                         </tr>
                                         <tr>
                                             <td><a href="search_result.php#">Pixel By Pixel</a></td>
                                             <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                             <td>$ 20,000</td>
                                             <td>$ 12,000</td>
                                             <td>$ 8,000</td>
                                         </tr>
                                         <tr>
                                             <td><a href="search_result.php#">Frame 2 frame</a></td>
                                             <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                             <td>$ 20,000</td>
                                             <td>$ 12,000</td>
                                             <td>$ 8,000</td>
                                         </tr>
                                         <tr>
                                             <td><a href="search_result.php#">Dot Net Corporation</a></td>
                                             <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                             <td>$ 20,000</td>
                                             <td>$ 12,000</td>
                                             <td>$ 8,000</td>
                                         </tr>
                                         <tr>
                                             <td><a href="search_result.php#">Graphzone</a></td>
                                             <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                             <td>$ 20,000</td>
                                             <td>$ 12,000</td>
                                             <td>$ 8,000</td>
                                         </tr>
                                         <tr>
                                             <td><a href="search_result.php#">Mega Pixel</a></td>
                                             <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                             <td>$ 20,000</td>
                                             <td>$ 12,000</td>
                                             <td>$ 8,000</td>
                                         </tr>
                                         <tr>
                                             <td><a href="search_result.php#">Frame 2 frame</a></td>
                                             <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                             <td>$ 20,000</td>
                                             <td>$ 12,000</td>
                                             <td>$ 8,000</td>
                                         </tr>
                                         <tr>
                                             <td><a href="search_result.php#">Dot Net Corporation</a></td>
                                             <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                             <td>$ 20,000</td>
                                             <td>$ 12,000</td>
                                             <td>$ 8,000</td>
                                         </tr>
                                         <tr>
                                             <td><a href="search_result.php#">Frame 2 frame</a></td>
                                             <td class="hidden-phone">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                                             <td>$ 20,000</td>
                                             <td>$ 12,000</td>
                                             <td>$ 8,000</td>
                                         </tr>
                                         </tbody>
                                     </table>
                                     <!--END COMPANY SEARCH-->
                                     <div class="space20"></div>

                                     <div class="pagination pagination-centered">
                                         <ul>
                                             <li><a href="search_result.php#">Prev</a></li>
                                             <li class="active"><a href="search_result.php#">1</a></li>
                                             <li><a href="search_result.php#">2</a></li>
                                             <li><a href="search_result.php#">3</a></li>
                                             <li><a href="search_result.php#">4</a></li>
                                             <li><a href="search_result.php#">5</a></li>
                                             <li><a href="search_result.php#">Next</a></li>
                                         </ul>
                                     </div>

                                 </div>
                                 <div class="tab-pane" id="portlet_tab4">
                                     <form class="form-horizontal search-result">
                                         <div class="control-group">
                                             <label class="control-label">Search</label>
                                             <div class="controls">
                                                 <input type="text" class="input-xxlarge" >
                                                 <p class="help-block">About 3,880,000 results (0.29 seconds) </p>
                                             </div>
                                             <button type="submit" class="btn btn-info">SEARCH</button>
                                         </div>
                                     </form>
                                     <div class="space20"></div>
                                     <!--BEGIN PRODUCT SEARCH-->
                                     <div class="row-fluid product-search">
                                         <div class="span4 product-text">
                                             <img alt="" src="img/product.jpg">
                                             <div class="portfolio-text-info">
                                                 <h4>iMac Slim</h4>
                                                 <p>21 inch Display, 1.8 GHz Processor, 8 GB Memory</p>
                                             </div>
                                         </div>
                                         <div class="span8">
                                             <div class="product-info">
                                                 Today Sold
                                                 <span>190</span>
                                             </div>
                                             <div class="product-info">
                                                 Today's Earning
                                                 <span>1,970</span>
                                             </div>
                                             <div class="product-info">
                                                 Total Sold
                                                 <span>$12.300</span>
                                             </div>
                                             <div class="product-info">
                                                 Total Earnings
                                                 <span>$12.300</span>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="row-fluid product-search">
                                         <div class="span4 product-text">
                                             <img alt="" src="img/product.jpg">
                                             <div class="portfolio-text-info">
                                                 <h4>iMac Slim</h4>
                                                 <p>21 inch Display, 1.8 GHz Processor, 8 GB Memory</p>
                                             </div>
                                         </div>
                                         <div class="span8">
                                             <div class="product-info">
                                                 Today Sold
                                                 <span>190</span>
                                             </div>
                                             <div class="product-info">
                                                 Today's Earning
                                                 <span>1,970</span>
                                             </div>
                                             <div class="product-info">
                                                 Total Sold
                                                 <span>$12.300</span>
                                             </div>
                                             <div class="product-info">
                                                 Total Earnings
                                                 <span>$12.300</span>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="row-fluid product-search">
                                         <div class="span4 product-text">
                                             <img alt="" src="img/product.jpg">
                                             <div class="portfolio-text-info">
                                                 <h4>iMac Slim</h4>
                                                 <p>21 inch Display, 1.8 GHz Processor, 8 GB Memory</p>
                                             </div>
                                         </div>
                                         <div class="span8">
                                             <div class="product-info">
                                                 Today Sold
                                                 <span>190</span>
                                             </div>
                                             <div class="product-info">
                                                 Today's Earning
                                                 <span>1,970</span>
                                             </div>
                                             <div class="product-info">
                                                 Total Sold
                                                 <span>$12.300</span>
                                             </div>
                                             <div class="product-info">
                                                 Total Earnings
                                                 <span>$12.300</span>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="row-fluid product-search">
                                         <div class="span4 product-text">
                                             <img alt="" src="img/product.jpg">
                                             <div class="portfolio-text-info">
                                                 <h4>iMac Slim</h4>
                                                 <p>21 inch Display, 1.8 GHz Processor, 8 GB Memory</p>
                                             </div>
                                         </div>
                                         <div class="span8">
                                             <div class="product-info">
                                                 Today Sold
                                                 <span>190</span>
                                             </div>
                                             <div class="product-info">
                                                 Today's Earning
                                                 <span>1,970</span>
                                             </div>
                                             <div class="product-info">
                                                 Total Sold
                                                 <span>$12.300</span>
                                             </div>
                                             <div class="product-info">
                                                 Total Earnings
                                                 <span>$12.300</span>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="row-fluid product-search">
                                         <div class="span4 product-text">
                                             <img alt="" src="img/product.jpg">
                                             <div class="portfolio-text-info">
                                                 <h4>iMac Slim</h4>
                                                 <p>21 inch Display, 1.8 GHz Processor, 8 GB Memory</p>
                                             </div>
                                         </div>
                                         <div class="span8">
                                             <div class="product-info">
                                                 Today Sold
                                                 <span>190</span>
                                             </div>
                                             <div class="product-info">
                                                 Today's Earning
                                                 <span>1,970</span>
                                             </div>
                                             <div class="product-info">
                                                 Total Sold
                                                 <span>$12.300</span>
                                             </div>
                                             <div class="product-info">
                                                 Total Earnings
                                                 <span>$12.300</span>
                                             </div>
                                         </div>
                                     </div>
                                     <!--END PRODUCT SEARCH-->
                                     <div class="space20"></div>

                                     <div class="pagination pagination-centered">
                                         <ul>
                                             <li><a href="search_result.php#">Prev</a></li>
                                             <li class="active"><a href="search_result.php#">1</a></li>
                                             <li><a href="search_result.php#">2</a></li>
                                             <li><a href="search_result.php#">3</a></li>
                                             <li><a href="search_result.php#">4</a></li>
                                             <li><a href="search_result.php#">5</a></li>
                                             <li><a href="search_result.php#">Next</a></li>
                                         </ul>
                                     </div>

                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- END TAB PORTLET-->
                  </div>
               </div>
            </div>
            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER--> 
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div id="footer">
       2013 &copy; Admin Lab Dashboard.
      <div class="span pull-right">
         <span class="go-top"><i class="icon-arrow-up"></i></span>
      </div>
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->    
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script src="js/scripts.js"></script>
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>
</body>
<!-- END BODY -->
</html>
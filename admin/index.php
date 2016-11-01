<?php include "header.php"; ?>
	<!-- BEGIN CONTAINER -->
	<div id="container" class="row-fluid">
		
		<!-- BEGIN PAGE -->
		<div id="main-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
                <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN THEME CUSTOMIZER-->
                        <!-- <div id="theme-change" class="hidden-phone">
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
                        </div> -->
                        <!-- END THEME CUSTOMIZER-->
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title">
                            Dashboard
                            <small>statistics and more</small>
                        </h3>
                        <ul class="breadcrumb">
                            <li>
                                <a href="index.php#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                            </li>
                            <li>
                                <a href="index.php#">Hunt Teachers Admin</a> <span class="divider">&nbsp;</span>
                            </li>
                            <li><a href="index.php#">Dashboard</a><span class="divider-last">&nbsp;</span></li>
                            <li class="pull-right search-wrap">
                                <form class="hidden-phone" action="search_result.php">
                                    <div class="search-input-area">
                                        <input id=" " class="search-query" type="text" placeholder="Search">
                                        <i class="icon-search"></i>
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div id="page" class="dashboard">
                    <!--BEGIN NOTIFICATION-->
                    <div class="alert alert-info">
                        <button data-dismiss="alert" class="close">×</button>
                         Welcome to the <strong>Hunt Teachers Admin</strong>. Please don't forget to check all the pages!
                    </div>
                    <!--END NOTIFICATION-->
                    <!-- BEGIN OVERVIEW STATISTIC BARS-->
                    <div class="row-fluid circle-state-overview">
                        <div class="span2 responsive clearfix" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle turquoise-color">
                                    <i class="icon-hand-up"></i>
                                </div>
                                <p>
                                    <strong>30</strong>
                                    Jobs
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle red-color">
                                    <i class="icon-search"></i>
                                </div>
                                <p>
                                    <strong>970</strong>
                                    Job Seekers
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle green-color">
                                    <i class="icon-user"></i>
                                </div>
                                <p>
                                    <strong>320</strong>
                                    Job Providers
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle gray-color">
                                    <i class="icon-envelope"></i>
                                </div>
                                <p>
                                    <strong>530</strong>
                                    Job Applications
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle purple-color">
                                    <i class="icon-eye-open"></i>
                                </div>
                                <p>
                                    <strong>430</strong>
                                    Unique Visitor
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle blue-color">
                                    <i class="icon-bar-chart"></i>
                                </div>
                                <p>
                                    <strong>230</strong>
                                    Updates
                                </p>
                            </div>
                        </div>


                    </div>
                    <!-- END OVERVIEW STATISTIC BARS-->

                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN MAILBOX PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                <h4><i class="icon-envelope"></i> Mailbox</h4>
                                <div class="tools pull-right mtop7 mail-btn">
                                    <div class="btn-group">
                                        <a class="btn btn-small element" data-original-title="Share" href="index.php#" data-toggle="tooltip" data-placement="top">
                                            <i class="icon-share-alt"></i>
                                        </a>

                                        <a class="btn btn-small element" data-original-title="Report" href="index.php#" data-toggle="tooltip" data-placement="top">
                                            <i class="icon-exclamation-sign">
                                            </i>
                                        </a>
                                        <a class="btn btn-small element" data-original-title="Delete" href="index.php#" data-toggle="tooltip" data-placement="top">
                                            <i class="icon-trash">
                                            </i>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-small element" data-original-title="Move to" href="index.php#" data-toggle="tooltip" data-placement="top">
                                            <i class="icon-folder-close">
                                            </i>
                                        </a>
                                        <a class="btn btn-small element" data-original-title="Tag" href="index.php#" data-toggle="tooltip" data-placement="top">
                                            <i class="icon-tag">
                                            </i>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <a class="btn btn-small element" data-original-title="Prev" href="index.php#" data-toggle="tooltip" data-placement="top">
                                            <i class="icon-chevron-left">
                                            </i>
                                        </a>
                                        <a class="btn btn-small element" data-original-title="Next" href="index.php#" data-toggle="tooltip" data-placement="top">
                                            <i class="icon-chevron-right">
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                                <div class="widget-body">
                                <table class="table table-condensed table-striped table-hover no-margin">
                                    <thead>
                                    <tr>
                                        <th style="width:3%">
                                            <input type="checkbox" class="no-margin">
                                        </th>
                                        <th style="width:17%">
                                            Sent by
                                        </th>
                                        <th class="hidden-phone" style="width:55%">
                                            Subject
                                        </th>
                                        <th class="right-align-text hidden-phone" style="width:12%">
                                            Labels
                                        </th>
                                        <th class="right-align-text hidden-phone" style="width:12%">
                                            Date
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="no-margin">
                                        </td>
                                        <td>
                                            Dulal khan
                                        </td>
                                        <td class="hidden-phone">
                                            <strong>
                                                Zoology Teacher
                                            </strong>
                                            <small class="info-fade">
                                                Vidhayaarambam vidyalaya
                                            </small>
                                        </td>
                                        <td class="right-align-text hidden-phone">
                                                  <span class="label label label-info">
                                                    Read
                                                  </span>
                                        </td>
                                        <td class="right-align-text hidden-phone">
                                            Yesterday
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="no-margin">
                                        </td>
                                        <td>
                                            Mosaddek Hossain
                                        </td>
                                        <td class="hidden-phone">
                                            <strong>
                                                Librarian
                                            </strong>
                                            <small class="info-fade">
                                                Mirapolis International
                                            </small>
                                        </td>
                                        <td class="right-align-text hidden-phone">
                                                  <span class="label label label-success">
                                                    New
                                                  </span>
                                        </td>
                                        <td class="right-align-text hidden-phone">
                                            Today
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="no-margin">
                                        </td>
                                        <td>
                                            Sumon Ahmed
                                        </td>
                                        <td class="hidden-phone">
                                            <strong>
                                                Dance Teachers
                                            </strong>

                                            <small class="info-fade">
                                                ABC International
                                            </small>
                                        </td>
                                        <td class="right-align-text hidden-phone">
                                                  <span class="label label">
                                                    Imp
                                                  </span>
                                        </td>
                                        <td class="right-align-text hidden-phone">
                                            Yesterday
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="no-margin">
                                        </td>
                                        <td>
                                            Rafiqul Islam
                                        </td>
                                        <td class="hidden-phone">
                                            <strong>
                                                Openings for Counsellor
                                            </strong>

                                            <small class="info-fade">
                                                Little Flowers Primary School, Salem
                                            </small>
                                        </td>
                                        <td class="right-align-text hidden-phone">
                                                  <span class="label label label-info">
                                                    Read
                                                  </span>
                                        </td>
                                        <td class="right-align-text hidden-phone">
                                            18-04-2013
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="no-margin">
                                        </td>
                                        <td>
                                            Dkmosa
                                        </td>
                                        <td class="hidden-phone">
                                            <strong>
                                                Looking For Science lab assistant
                                            </strong>
                                            <small class="info-fade">
                                                Amalorpavam Matric school, Pondicherry
                                            </small>
                                        </td>
                                        <td class="right-align-text hidden-phone">
                                                  <span class="label label label-success">
                                                    New
                                                  </span>
                                        </td>
                                        <td class="right-align-text hidden-phone">
                                            10-02-2013
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="no-margin">
                                        </td>
                                        <td>
                                            Mosaddek
                                        </td>
                                        <td class="hidden-phone">
                                            <strong>
                                                Wanted Office Assistant
                                            </strong>
                                            <small class="info-fade">
                                                Mahendragiri Public school
                                            </small>
                                        </td>
                                        <td class="right-align-text hidden-phone">
                                                  <span class="label label">
                                                    Imp
                                                  </span>
                                        </td>
                                        <td class="right-align-text hidden-phone">
                                            21-01-2013
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="no-margin">
                                        </td>
                                        <td>
                                            Dulal khan
                                        </td>
                                        <td class="hidden-phone">
                                            <strong>
                                                Looking for science Lab Assistant
                                            </strong>
                                            <small class="info-fade">
                                                Amalorpavan School
                                            </small>
                                        </td>
                                        <td class="right-align-text hidden-phone">
                                                  <span class="label label label-info">
                                                    New
                                                  </span>
                                        </td>
                                        <td class="right-align-text hidden-phone">
                                            19-01-2013
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            <!-- END MAILBOX PORTLET-->
                        </div>
                    </div>
                    <!-- BEGIN OVERVIEW STATISTIC BARS-->
                    <div class="row-fluid metro-overview-cont">
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview turquoise-color clearfix">
                                <div class="display">
                                    <i class="icon-hand-up"></i>
                                    <div class="percent">+55%</div>
                                </div>
                                <div class="details">
                                    <div class="numbers">530</div>
                                    <div class="title">Jobs</div>
                                </div>
                                <div class="progress progress-info">
                                    <div style="width: 55%" class="bar"></div>
                                </div>
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview red-color clearfix">
                                <div class="display">
                                    <i class="icon-search"></i>
                                    <div class="percent">+36%</div>
                                </div>
                                <div class="details">
                                    <div class="numbers">5440 $</div>
                                    <div class="title">Job Seekers</div>
                                    <div class="progress progress-warning">
                                        <div style="width: 36%" class="bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview green-color clearfix">
                                <div class="display">
                                    <i class="icon-user"></i>
                                    <div class="percent">+46%</div>
                                </div>
                                <div class="details">
                                    <div class="numbers">1000</div>
                                    <div class="title">Job Providers</div>
                                    <div class="progress progress-success">
                                        <div style="width: 46%" class="bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4 fix-margin" class="span2 responsive">
                            <div class="metro-overview gray-color clearfix">
                                <div class="display">
                                    <i class="icon-envelope"></i>
                                    <div class="percent">+26%</div>
                                </div>
                                <div class="details">
                                    <div class="numbers">170</div>
                                    <div class="title">Job Applications</div>
                                    <div class="progress progress-warning">
                                        <div style="width: 26%" class="bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview purple-color clearfix">
                                <div class="display">
                                    <i class="icon-eye-open"></i>
                                    <div class="percent">+72%</div>
                                </div>
                                <div class="details">
                                    <div class="numbers">1130</div>
                                    <div class="title">Unique Visitor</div>
                                    <div class="progress progress-danger">
                                        <div style="width: 72%" class="bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-desktop="span2" data-tablet="span4" class="span2 responsive">
                            <div class="metro-overview blue-color clearfix">
                                <div class="display">
                                    <i class="icon-bar-chart"></i>
                                    <div class="percent">+20%</div>
                                </div>
                                <div class="details">
                                    <div class="numbers">170</div>
                                    <div class="title">Updates</div>
                                    <div class="progress progress-success">
                                        <div style="width: 20%" class="bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OVERVIEW STATISTIC BARS-->
					<div class="row-fluid">
						<div class="span8">
							<!-- BEGIN SITE VISITS PORTLET-->
							<div class="widget">
								<div class="widget-title">
									<h4><i class="icon-bar-chart"></i> Line Chart</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
								</div>
								<div class="widget-body">
									<div id="site_statistics_loading">
										<img src="img/loading.gif" alt="loading" />
									</div>
									<div id="site_statistics_content" class="hide">
										<div id="site_statistics" class="chart"></div>
									</div>
								</div>
							</div>
							<!-- END SITE VISITS PORTLET-->
						</div>
                        <div class="span4">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-book"></i> Active Pages</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Page</th>
                                            <th>Visits</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Jobs</td>
                                            <td><strong>8790</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Job By Categories</td>
                                            <td><strong>7052</strong></td>
                                        </tr>
                                        <tr>
                                            <td>About</td>
                                            <td><strong>6577</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Contact Us</td>
                                            <td><strong>5760</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Subscription Pricing</td>
                                            <td><strong>4876</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Blog</td>
                                            <td><strong>3866</strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

					<div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN SERVER LOAD PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-umbrella"></i> Live Chart</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                                </div>
                                <div class="widget-body">
                                    <div id="load_statistics_loading">
                                        <img src="img/loading.gif" alt="loading" />
                                    </div>
                                    <div id="load_statistics_content" class="hide">
                                        <div id="load_statistics" class="chart"></div>
                                        <div class="btn-toolbar no-bottom-space clearfix">
                                            <div class="btn-group" data-toggle="buttons-radio">
                                                <button class="btn btn-mini">Web</button><button class="btn btn-mini">Database</button><button class="btn btn-mini">Static</button>
                                            </div>
                                            <div class="btn-group pull-right" data-toggle="buttons-radio">
                                                <button class="btn btn-mini active">Asia</button><button class="btn btn-mini">
                                                <span class="visible-phone">Eur</span>
                                                <span class="hidden-phone">Europe</span>
                                            </button><button class="btn btn-mini">USA</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END SERVER LOAD PORTLET-->
                        </div>
					</div>

                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN EXAMPLE TABLE widget-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Latest Job Providers</h4>
                                        <span class="tools">
                                            <a href="javascript:;" class="icon-chevron-down"></a>
                                            <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                </div>
                                <div class="widget-body">
                                <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <!-- <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th> -->
                                    <th>Username</th>
                                    <th class="hidden-phone">Email</th>
                                    <th class="hidden-phone">Institution</th>
                                    <th class="hidden-phone">Joined</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                    <!-- <td><input type="checkbox" class="checkboxes" value="1" /></td> -->
                                    <td>Jhone doe</td>
                                    <td class="hidden-phone"><a href="mailto:jhone-doe@gmail.com">jhone-doe@gmail.com</a></td>
                                    <td class="hidden-phone">10</td>
                                    <td class="center hidden-phone">02.03.2013</td>
                                </tr>
                                <tr class="odd gradeX">
                                   
                                    <td>gada</td>
                                    <td class="hidden-phone"><a href="mailto:gada-lal@gmail.com">gada-lal@gmail.com</a></td>
                                    <td class="hidden-phone">34</td>
                                    <td class="center hidden-phone">08.03.2013</td>
                                </tr>
                                <tr class="odd gradeX">
                                    
                                    <td>soa bal</td>
                                    <td class="hidden-phone"><a href="mailto:soa bal@yahoo.com">soa bal@yahoo.com</a></td>
                                    <td class="hidden-phone">33</td>
                                    <td class="center hidden-phone">1.12.2013</td>
                                </tr>
                                <tr class="odd gradeX">
                                    
                                    <td>ram sag</td>
                                    <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">soa bal@gmail.com</a></td>
                                    <td class="hidden-phone">33</td>
                                    <td class="center hidden-phone">7.2.2013</td>
                                </tr>
                                <tr class="odd gradeX">
                                    
                                    <td>durlab</td>
                                    <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">test@gmail.com</a></td>
                                    <td class="hidden-phone">33</td>
                                    <td class="center hidden-phone">03.07.2013</td>
                                </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE widget-->
                        </div>
                    </div>
                    <button class="btn btn-primary latest_align_center" type="button">View All Job Providers</button>
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN EXAMPLE TABLE widget-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Latest Jobs</h4>
                                        <span class="tools">
                                            <a href="javascript:;" class="icon-chevron-down"></a>
                                            <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                </div>
                                <div class="widget-body">
                                <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <!-- <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th> -->
                                    <th class="hidden-phone">Job Title</th>
                                    <th class="hidden-phone">Institution</th>
                                    <th class="hidden-phone">District</th>
                                    <th class="hidden-phone">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                    <!-- <td><input type="checkbox" class="checkboxes" value="1" /></td> -->
                                    <td class="hidden-phone">Zoology Teacher</td>
                                    <td class="hidden-phone">Vidhayaarambam vidyalaya </td>
                                    <td class="center hidden-phone">Salem</td>
                                    <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td class="hidden-phone">Librarian</td>
                                    <td class="hidden-phone">Mirapolis International</td>
                                    <td class="center hidden-phone">Tamilnadu</td>
                                    <td class="hidden-phone"><span class="label label-inverse">Blocked</span></td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td class="hidden-phone">Dance Teachers</td>
                                    <td class="hidden-phone">ABC International</td>
                                    <td class="center hidden-phone">Dindugal</td>
                                    <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td class="hidden-phone">Openings for Counsellor</td>
                                    <td class="hidden-phone">Little Flowers Primary School, Salem </td>
                                    <td class="center hidden-phone">Thanjavur</td>
                                    <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td class="hidden-phone">Wanted Office Assistant</td>
                                    <td class="hidden-phone">Mahendragiri Public school </td>
                                    <td class="center hidden-phone">Trivandram</td>
                                    <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE widget-->
                        </div>
                    </div>
                    <button class="btn btn-primary latest_align_center" type="button">View All Jobs</button>


					<!-- <div class="row-fluid"> -->
						<!-- <div class="span7 responsive" data-tablet="span7 fix-margin" data-desktop="span7"> -->
							<!-- BEGIN CALENDAR PORTLET-->
							<!-- <div class="widget">
								<div class="widget-title">
									<h4><i class="icon-calendar"></i> Calendar</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
								</div>
								<div class="widget-body">
									<div id="calendar" class="has-toolbar"></div>
								</div>
							</div> -->
							<!-- END CALENDAR PORTLET-->
						<!-- </div> -->
                        <!-- <div class="span5"> -->
                            <!-- BEGIN PROGRESS BARS PORTLET-->
                            <!-- <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i> Progress Bars</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                </div>
                                <div class="widget-body">
                                    <span class="fc-header-title"><h2>Basic</h2></span>
                                    <div class="progress">
                                        <div style="width: 40%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-success">
                                        <div style="width: 60%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-warning">
                                        <div style="width: 80%;" class="bar"></div>
                                    </div>
                                    <div class="progress progress-danger">
                                        <div style="width: 45%;" class="bar"></div>
                                    </div>

                                </div>
                            </div> -->
                            <!-- END PROGRESS BARS PORTLET-->
                            <!-- BEGIN ALERTS PORTLET-->
                           <!--  <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bell-alt"></i> Alerts</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                                </div>
                                <div class="widget-body">
                                    <div class="alert">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <strong>Warning!</strong> Your monthly traffic is reaching limit.
                                    </div>
                                    <div class="alert alert-success">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <strong>Success!</strong> The page has been added.
                                    </div>
                                    <div class="alert alert-info">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <strong>Info!</strong> You have 198 unread messages.
                                    </div>
                                    <div class="alert alert-error">
                                        <button class="close" data-dismiss="alert">×</button>
                                        <strong>Error!</strong> The daily cronjob has failed.
                                    </div>
                                </div>
                            </div> -->
                            <!-- END ALERTS PORTLET-->
                        <!-- </div> -->
					<!-- </div> -->
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
	    </div>
	<!-- END CONTAINER -->
<?php include "footer.php"; ?>
<?php include "templates/header.php" ?>
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
                                <a href="<?php echo base_url(); ?>admin/dashboard">Teacher Recruit</a> <span class="divider">&nbsp;</span>
                            </li>
                            <li><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a><span class="divider-last">&nbsp;</span></li>
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
                         Welcome to the <strong>Teacher Recruit</strong>. Please don't forget to check all the pages!
                    </div>
                    <!--END NOTIFICATION-->
                    <!-- BEGIN OVERVIEW STATISTIC BARS-->
                    <div class="row-fluid circle-state-overview">
                        <div class="span2 responsive clearfix" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle turquoise-color">
                                    <i class="icon-globe"></i>
                                </div>
                                <p>
                                    <strong><?php echo $overall_vacancies[0]['count_vac']; ?></strong>
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
                                    <strong><?php echo $jobseekers_count[0]['count_cand']; ?></strong>
                                    Job Seekers
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle green-color">
                                    <i class="icon-sitemap"></i>
                                </div>
                                <p>
                                    <strong><?php echo $jobproviders_count[0]['count_org']; ?></strong>
                                    Job Providers
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle gray-color">
                                    <i class="icon-paste"></i>
                                </div>
                                <p>
                                    <strong><?php echo $overall_job[0]['count_job']; ?></strong>
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
                                    <strong><?php echo $unique_visitors_count[0]['count_vis']; ?></strong>
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
                                    <strong><?php echo $visitors_count[0]['count_vis']; ?></strong>
                                    Page Visits
                                </p>
                            </div>
                        </div>


                    </div>
                    <!-- END OVERVIEW STATISTIC BARS-->

                    <div class="row-fluid">
                        <div class="span6">
                            <!-- BEGIN MAILBOX PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                <h4><i class="icon-filter"></i> Filter Vacancies By</h4>
                                <div class="tools pull-right mtop7 mail-btn select_by_option">
                                    <div class="btn-group">
                                        <select class="select_by filter_vacancy" data-placeholder="Select an option">
								            <option value="state">State</option>
								            <option value="district">District</option>
								            <option value="qualification">Qualification</option>
								            <option value="inst_type">Institution Type</option>
								        </select>
                                    </div>                                    
                                    <!-- <div class="btn-group prev_next_opt">
                                        <a class="btn btn-small element" data-original-title="Prev" href="index.php#" data-toggle="tooltip" data-placement="top">
                                            <i class="icon-chevron-left">
                                            </i>
                                        </a>
                                        <a class="btn btn-small element" data-original-title="Next" href="index.php#" data-toggle="tooltip" data-placement="top">
                                            <i class="icon-chevron-right"></i>
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                                <div class="widget-body">
                                <table class="table table-condensed table-striped table-hover no-margin dash_table" id="filter_vacancy_table">
                                    <thead>
                                    <tr>
                                        <th style="width:17%" class="vacancy_header">
                                            State Name
                                        </th>
                                        <th class="hidden-phone count_values" style="width:55%">
                                            Count
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if(!empty($state_vacancies)) :
                                        foreach ($state_vacancies as $sta_vac) :
                                    ?>
                                    <tr>
                                        <td><?php echo $sta_vac['state_name']; ?></td>
                                        <td class="hidden-phone"><?php echo $sta_vac['count_st']; ?></td>
                                    </tr>
                                    <?php
                                        endforeach;
                                        endif;
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            <!-- END MAILBOX PORTLET-->
                        </div>
                        <div class="span6">
                            <!-- BEGIN MAILBOX PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                <h4><i class="icon-filter"></i> Filter Job Providers By</h4>
                                <div class="tools pull-right mtop7 mail-btn select_by_option">
                                    <div class="btn-group">
                                         <select class="select_by filter_provider" data-placeholder="Select an option">
								            <option value="paid_provider">Paid</option>
								            <option value="paid_provider_district">Paid Provider District Wise</option>
                                            <option value="free_provider_district">Free Provider District Wise</option>
								        </select>
                                    </div>                                    
                                    <!-- <div class="btn-group prev_next_opt">
                                        <a class="btn btn-small element" data-original-title="Prev" href="index.php#" data-toggle="tooltip" data-placement="top">
                                            <i class="icon-chevron-left">
                                            </i>
                                        </a>
                                        <a class="btn btn-small element" data-original-title="Next" href="index.php#" data-toggle="tooltip" data-placement="top">
                                            <i class="icon-chevron-right">
                                            </i>
                                        </a>
                                    </div> -->
                                </div>
                                </div>
                                <div class="widget-body">
                                <table class="table table-condensed table-striped table-hover no-margin dash_table" id="filter_provider_table">
                                    <thead>
                                    <tr>
                                        <th style="width:17%" class="vacancy_header">
                                            Plan
                                        </th>
                                        <th class="hidden-phone count_values" style="width:55%">
                                            Count
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if(!empty($paid_jobprovider_count)) :
                                        foreach ($paid_jobprovider_count as $provider) :
                                    ?>
                                    <tr>
                                        <td><?php echo $provider['subscription_plan']; ?></td>
                                        <td class="hidden-phone"><?php echo $provider['count_plan']; ?></td>
                                    </tr>
                                    <?php
                                        endforeach;
                                        endif;
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            <!-- END MAILBOX PORTLET-->
                        </div>
                    </div>
                    <!-- BEGIN OVERVIEW STATISTIC BARS-->
                    <!-- <div class="row-fluid metro-overview-cont">
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
                    </div> -->
                    <!-- END OVERVIEW STATISTIC BARS-->
                    <div class="row-fluid">
                        <div class="span8">
                            <!-- BEGIN SITE VISITS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-bar-chart"></i> Site Visits</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <!-- <div class="widget-body">
                                    <div id="site_statistics_loading">
                                        <img src="<?php echo base_url(); ?>assets/admin/img/loading.gif" alt="loading" />
                                    </div>
                                    <div id="site_statistics_content" class="hide">
                                        <div id="site_statistics" class="chart"></div>
                                    </div>
                                </div> -->
                                <form class="form-horizontal">
                                    <div class="input-prepend cal_graph_range">
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                        <input type="text" name="range" id="range" />
                                    </div>
                                </form>
                                <div id="msg"></div>
                                <div id="placeholder">
                                    <figure id="chart"></figure>
                                </div>
                            </div>
                            <!-- END SITE VISITS PORTLET-->
                        </div>
                        <div class="span4">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-book"></i> Page High Count Visits</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body site_visites_cont">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Page</th>
                                            <th>Visits</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if(!empty($page_high_count_visits)) :
                                            foreach ($page_high_count_visits as $high_count) :
                                        ?>
                                        <tr>
                                            <td><?php echo $high_count['page_view'] ?></td>
                                            <td><strong><?php echo $high_count['count_vis'] ?></strong></td>
                                        </tr>
                                        <?php
                                            endforeach;
                                            endif;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row-fluid">
                        <div class="span12"> -->
                            <!-- BEGIN SERVER LOAD PORTLET-->
                            <!-- <div class="widget"> -->
                                <!-- <div class="widget-title">
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
                                </div> -->
                            </div>
                            <!-- END SERVER LOAD PORTLET-->
                        <!-- </div>
                    </div> -->

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
                                    <th class="hidden-phone">Institution Name</th>
                                    <th class="hidden-phone">Joined</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if(!empty($latest_job_providers)) :
                                    foreach ($latest_job_providers as $jobprovider) :
                                ?>
                                <tr class="odd gradeX">
                                    <!-- <td><input type="checkbox" class="checkboxes" value="1" /></td> -->
                                    <td><?php echo $jobprovider['organization_name'] ?></td>
                                    <td class="hidden-phone"><a href="mailto:<?php echo $jobprovider['registrant_email_id'] ?>"><?php echo $jobprovider['registrant_email_id'] ?></a></td>
                                    <td class="hidden-phone"><?php echo $jobprovider['registrant_name'] ?></td>
                                    <td class="center hidden-phone"><?php echo date("d/m/Y", strtotime($jobprovider['organization_created_date'])); ?></td>
                                </tr>
                                <?php
                                    endforeach;
                                    endif;
                                ?>
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
                                    <th class="hidden-phone">Job Posted Date</th>
                                    <th class="hidden-phone">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if(!empty($latest_vacancy_jobs)) :
                                    foreach ($latest_vacancy_jobs as $jobs) :
                                ?>
                                <tr class="odd gradeX">
                                    <!-- <td><input type="checkbox" class="checkboxes" value="1" /></td> -->
                                    <td><?php echo $jobs['vacancies_job_title'] ?></td>
                                    <td class="hidden-phone"><?php echo $jobs['registrant_name'] ?></td>
                                    <td class="hidden-phone"><?php echo $jobs['district_name'] ?></td>
                                    <td class="center hidden-phone"><?php echo date("d/m/Y", strtotime($jobs['vacancies_created_date'])); ?></td>
                                    <td class="hidden-phone"><span class="label label-success"><?php if($jobs['vacancies_status'] == 1) echo "Approved"; else "Waiting for Approve" ?></span></td>
                                    <!-- <td class="hidden-phone"><span class="label label-inverse">Blocked</span></td> -->
                                </tr>
                                <?php
                                    endforeach;
                                    endif;
                                ?>
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
<?php include "templates/footer.php" ?>

<?php include('include/header.php'); ?>
<?php include('include/menus.php'); ?>
        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Company Feedback</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a>
                                </li>
                                <li><a href="company-dashboard.html">Dashboard</a>
                                </li>
                                <li class="active">Posted Jobs</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="dashboard-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="panel">
                                <div class="dashboard-logo-sidebar">
                                    <img class="img-responsive center-block" src="images/company/logo1.jpg" alt="Image">
                                </div>
                                <div class="text-center dashboard-logo-sidebar-title">
                                    <h4>Your Companty Agency Pvt. Ltd</h4>
                                </div>
                            </div>
                            <!--include left panel menu-->
                            <?php include('include/company_dashboard_sidebar.php'); ?>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        	
                            <div class="heading-inner first-heading">
                                <p class="title">Posted Jobs</p>
                            </div>
                             <div id="dashboard-jobs-grid" class="all-jobs-list-box2">
                                <div class="job-box job-box-2">
	                                <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">
	                                    <div class="comp-logo">
	                                        <img src="<?php echo base_url(); ?>assets/images/company/5.png" class="img-responsive" alt="scriptsbundle">
	                                    </div>
	                                </div>
	                                <div class="col-md-10 col-sm-10 col-xs-12">
	                                    <div class="job-title-box">
	                                        <div class="job-title"> Name of the Candidate</div>
	                                        <span class="comp-name">Designation </span>
	                                        <span class="pull-right"><i class="fa fa-calendar"></i> Year of Experience </span>
	                                     </div>
	                                     <span class="comp-name">CTC per annum</span> <br>
	                                     <span class="comp-name">Salary Expectation </span> <br>
	                                     <span class="comp-name">Location</span> <br>
	                                     <span class="comp-name">Gender </span>
	                                    <p>Other Informations and Candidate Details.......<a href="company-dashboard-job-detail.html">Read More</a> </p>
	                                </div>
	                                <a href="javascript:void(0)" onclick='window.location = "company-dashboard-job-detail.html"'>
	                                	<span class="dashboard-jobs-grid-link"> </span>
	                                </a>
	                                <!-- <div class="job-salary">
	                                    <i class="fa fa-money"></i> $400 - $500
	                                </div> -->
                                </div>
                                <div class="job-box job-box-2">
                                    <div class="col-md-2 col-sm-2 col-xs-12  hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                           <img src="<?php echo base_url(); ?>assets/images/company/1.png" class="img-responsive" alt="scriptsbundle">
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <div class="job-title-box">
                                            <div class="job-title"> Assistant Engineer (IT/Networks)</div>
                                            <span class="comp-name">conversi Pvt. Ltd. Malaysia</span>
                                            <span><i class="fa fa-clock-o"></i> 2 Days Ago </span>
                                        </div>
                                        <p>Prompta numquam mel ad, tempor definiebas id usu, cum cu feugiat bonorum. Eu pri labores maiorum patrioque, sea an tation utinam. Idque albucius prodesset ei est, sea te vide.......<a href="company-dashboard-job-detail.html">Read More</a> </p>
                                    </div>
                                    <a href="javascript:void(0)" onclick='window.location = "company-dashboard-job-detail.html"'>
	                                	<span class="dashboard-jobs-grid-link"> </span>
	                                </a>
                                </div>
                                <div class="job-box job-box-2">
                                    <div class="col-md-2 col-sm-2 col-xs-12  hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <img src="<?php echo base_url(); ?>assets/images/company/5.png" class="img-responsive" alt="scriptsbundle">
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <div class="job-title-box">
                                            <div class="job-title"> Technical Network Director (IT/Networks)</div>
                                            <span class="comp-name">conversi Pvt. Ltd. United States</span>
                                            <span><i class="fa fa-clock-o"></i> 3 days ago </span>
                                        </div>
                                        <p>Prompta numquam mel ad, tempor definiebas id usu, cum cu feugiat bonorum. Eu pri labores maiorum patrioque, sea an tation utinam. Idque albucius prodesset ei est, sea te vide.......<a href="company-dashboard-job-detail.html">Read More</a> </p>
                                    </div>
                                    <a href="javascript:void(0)" onclick='window.location = "company-dashboard-job-detail.html"'>
	                                	<span class="dashboard-jobs-grid-link"> </span>
	                                </a>
                                </div>
                                <div class="job-box job-box-2">
                                    <div class="col-md-2 col-sm-2 col-xs-12  hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <img src="<?php echo base_url(); ?>assets/images/company/5.png" class="img-responsive" alt="scriptsbundle">
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <div class="job-title-box">
                                            <div class="job-title"> Technical Documentation Specialist</div>
                                            <span class="comp-name">conversi Pvt. Ltd. United States</span>
                                            <span><i class="fa fa-clock-o"></i> 7 days ago </span>
                                        </div>
                                        <p>Prompta numquam mel ad, tempor definiebas id usu, cum cu feugiat bonorum. Eu pri labores maiorum patrioque, sea an tation utinam. Idque albucius prodesset ei est, sea te vide ......<a href="company-dashboard-job-detail.html">Read More</a> </p>
                                    </div>
                                    <a href="javascript:void(0)" onclick='window.location = "company-dashboard-job-detail.html"'>
	                                	<span class="dashboard-jobs-grid-link"> </span>
	                                </a>
                                </div>
                            </div> 
                            <!--Pagination-->
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="pagination-box clearfix">
                                    <ul class="pagination">
                                        <li>
                                            <a href="company-dashboard-active-jobs.html#" aria-label="Previous"> <span aria-hidden="true">«</span> </a>
                                        </li>
                                        <li class="active"><a href="company-dashboard-active-jobs.html#">1</a></li>
                                        <li><a href="company-dashboard-active-jobs.html#">2</a></li>
                                        <li><a href="company-dashboard-active-jobs.html#">3</a></li>
                                        <li><a href="company-dashboard-active-jobs.html#">4</a></li>
                                        <li><a href="company-dashboard-active-jobs.html#">5</a></li>
                                        <li>
                                            <a href="company-dashboard-active-jobs.html#" aria-label="Next"> <span aria-hidden="true">»</span> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> <!--End pagination-->

                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php include('include/footermenu.php'); ?>
       <?php include('include/footer.php'); ?>
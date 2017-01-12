<?php include('include/header.php'); ?>
<?php include('include/menus.php'); ?>
        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Posted Jobs</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>provider/dashboard">Dashboard</a>
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
                                <div class="dashboard-logo-sidebar center-block">
                                    <?php if (@getimagesize($organization['organization_logo'])) { ?>
                                    <img src="<?php echo $organization['organization_logo']; ?>" alt="institution" class="img-responsive center-block ">
                                    <?php } else { ?>
                                	<img src="<?php echo base_url().'assets/images/institution.png'; ?>" alt="institution" class="img-responsive">
                                    <?php } ?>
                                </div>
                                <div class="text-center dashboard-logo-sidebar-title">
                                    <h4><?php echo $organization['organization_name']; ?></h4>
                                </div>
                            </div>
                            <!--include left panel menu-->
                             <?php include('include/company_dashboard_sidebar.php'); ?>  
                         </div>
                        
                        <?php //echo "<pre>"; print_r($postedjob);echo "</pre>"; ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        	
                            <div class="heading-inner first-heading">
                                <p class="title">Posted Jobs</p>
                            </div>

                             <!---List of posted jobs-->
                            <div class="all-jobs-list-box2">
                            	<?php foreach ($postedjob as $postedjobs) { ?>
                                <div class="job-box job-box-2" style="cursor:pointer" onclick='window.open("<?php echo base_url();?>provider/postedjobdetail/<?php echo $postedjobs['vacancies_id'];?>","_blank")'>
	                                <div class="col-md-12 col-sm-12 col-xs-12">
	                                    <div class="job-title-box">
	                                        <a>
	                                            <div class="job-title"><?php echo ucfirst($postedjobs['vacancies_job_title']); ?></div>
	                                        </a>
	                                        <a><span class="comp-name"><?php echo $postedjobs['vacancies_available']; ?> vacancies, <?php echo $postedjobs['vacancies_experience']; ?></span></a>
	                                    </div>
	                                    <p><?php echo substr($postedjobs['vacancies_instruction'], 0, 100); ?>...</p>
	                                </div>
	                                <div class="job-salary">
	                                    &#8377;<?php echo $postedjobs['vacancies_start_salary']; ?> - &#8377;<?php echo $postedjobs['vacancies_end_salary']; ?>
	                                </div>
	                                <a href="javascript:void(0)">
	                                	<span class="dashboard-jobs-grid-link"> </span>
	                                </a>
                                </div>
                              <?php }  ?>
                            </div>
                           

                            <!--Pagination-->
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="pagination-box clearfix">
                                    <ul class="pagination">
                                    	 <?php foreach ($links as $link) {
											echo "<li>". $link."</li>";
										} ?>
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
       <?php include('include/footercustom.php'); ?>
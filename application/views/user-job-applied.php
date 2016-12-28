<?php include('include/header.php'); ?><?php include('include/menus.php'); // echo "<pre>"; print_r($jobsapplied); echo "</pre>";?>          <section class="job-breadcrumb">            <div class="container">                <div class="row">                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">                        <h3>Edit profile</h3>                    </div>                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">                        <div class="bread">                            <ol class="breadcrumb">                                <li><a href="<?php echo base_url(); ?>">Home</a> </li>                                <li><a href="<?php echo base_url(); ?>job_seeker/dashboard">Dashboard</a> </li>                                <li class="active">edit profile</li>                            </ol>                        </div>                    </div>                </div>            </div>        </section>        <section class="dashboard-body">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                        <div class="col-md-4 col-sm-4 col-xs-12">                            <!--include left panel menu-->                            <?php include('include/user_dashboard_sidemenu.php'); ?>                        </div>                        <div class="col-md-8 col-sm-8 col-xs-12">                            <div class="heading-inner first-heading">                                <p class="title">Job applied</p>                            </div>                             <?php foreach($jobsapplied as $value) { ?>                                 <div id="dashboard-jobs-grid" class="all-jobs-list-box2">                                    <div class="job-box job-box-2">                                        <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">                                            <div class="comp-logo">                                                <?php if(isset($value['organization_logo'])){?>                                                <img src="<?php echo $value['organization_logo'];?>" class="img-responsive" alt="scriptsbundle">                                                <?php }else{ ?>                                                    <img src="<?php echo base_url(); ?>/assets/images/company/5.png" class="img-responsive" alt="Company Logo">                                                <?php } ?>                                            </div>                                        </div>                                        <div class="col-md-10 col-sm-10 col-xs-12">                                            <div class="job-title-box">                                                <div class="job-title"> <?php echo $value['vacancies_job_title'];?></div>                                                <span class="comp-name"><?php echo $organization_details['organization_name'];?></span>                                                <a class="job-type jt-full-time-color">                                                    <i class="fa fa-clock-o"></i> Full time                                                </a>                                            </div>                                            <p><?php echo $value['vacancies_instruction'];?>                                                 <a>Read More</a>                                            </p>                                        </div>                                        <div class="job-salary">                                            <i class="fa fa-money"></i>                                             <?php echo $value['vacancies_start_salary'].'-'. $value['vacancies_end_salary'];?>                                        </div>                                    <a href="javascript:void(0)" onclick='window.location = "<?php echo base_url(); ?>seeker/jobsapplieddetails/<?php echo $value['vacancies_id'];?>"'>                                            <span class="dashboard-jobs-grid-link"> </span>                                        </a>                                      </div>                                </div>                            <?php } ?>                            <!--Pagination-->                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                                <div class="pagination-box clearfix">                                    <ul class="pagination">                                         <?php foreach ($links as $link) {                                            echo "<li>". $link."</li>";                                        } ?>                                    </ul>                                </div>                            </div> <!--End pagination-->                                                    </div>                    </div>                </div>            </div>        </section>        <?php        if(!empty($provider_values)) :        ?>        <div class="brand-logo-area clients-bg">            <div class="clients-list">                <?php                foreach ($provider_values as $val) :                if(!empty($val['organization_logo'])) :                ?>                <div class="client-logo">                    <a href="#"><img src="<?php echo base_url().$val['organization_logo']; ?>" class="img-responsive" alt="Organization Logo" title="<?php echo $val['organization_name']; ?>" /></a>                </div>                <?php                endif;                endforeach;                ?>            </div>        </div>        <?php        endif;        ?><?php include('include/footermenu.php'); ?><?php include('include/footer.php'); ?>
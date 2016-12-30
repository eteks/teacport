<?php include('include/header.php'); ?><?php include('include/menus.php'); // echo "<pre>"; print_r($jobsapplied); echo "</pre>";?>  <section class="job-breadcrumb">    <div class="container">        <div class="row">            <div class="col-md-6 col-sm-7 co-xs-12 text-left">                <h3>Jobs Applied</h3>            </div>            <div class="col-md-6 col-sm-5 co-xs-12 text-right">                <div class="bread">                    <ol class="breadcrumb">                        <li><a href="<?php echo base_url(); ?>">Home</a> </li>                        <li><a href="<?php echo base_url(); ?>seeker/dashboard">Dashboard</a> </li>                        <li class="active">Jobs Applied</li>                    </ol>                </div>            </div>        </div>    </div></section><section class="dashboard-body">    <div class="container">        <div class="row">            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                <div class="col-md-4 col-sm-4 col-xs-12">                    <!--include left panel menu-->                    <?php include('include/user_dashboard_sidemenu.php'); ?>                </div>                <div class="col-md-8 col-sm-8 col-xs-12">                    <div class="heading-inner first-heading">                        <p class="title">Jobs applied</p>                    </div>                    <?php                     if(!empty($jobsapplied)) :                    foreach($jobsapplied as $value) : ?>                    <div id="dashboard-jobs-grid" class="all-jobs-list-box2">                        <div class="job-box job-box-2">                            <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">                                <div class="comp-logo">                                    <?php                                    if(!empty($value['organization_logo'])) :                                    ?>                                    <img src="<?php echo $value['organization_logo']; ?>" class="img-responsive" alt="Not Found">                                     <?php                                    else :                                    ?>                                    <img src="<?php echo base_url()."assets/images/institution.png"; ?>" class="img-responsive" alt="Not Found">                                    <?php                                    endif;                                    ?>                                </div>                            </div>                            <div class="col-md-10 col-sm-10 col-xs-12">                                <div class="job-title-box">                                    <div class="job-title"> <?php echo $value['vacancies_job_title'];?></div>                                    <span class="comp-name"><?php echo $value['organization_name'];?></span>                                    <a class="job-type jt-full-time-color">                                        <i class="fa fa-clock-o"></i> Full time                                    </a>                                </div>                                <p><?php echo substr($value['vacancies_instruction'], 0, 100); ?>...                                     <a>Read More</a>                                </p>                            </div>                            <div class="job-salary">                                &#8377; <?php echo $value['vacancies_start_salary']. " - " . $value['vacancies_end_salary']; ?>                            </div>                            <a href="<?php echo base_url(); ?>seeker/jobsapplieddetails/<?php echo $value['vacancies_id'];?>">                                <span class="dashboard-jobs-grid-link"> </span>                            </a>                        </div>                        <?php                         endforeach;                        if(!empty($links)) :                            echo "<div class='col-md-12 col-sm-12 col-xs-12 nopadding'><div class='pagination-box clearfix'>" .$links . "</div></div>";                        endif;                        else :                            echo "<p> You have applied no jobs. Click <a href='".base_url()."seeker/findjob/'> here </a> to apply new jobs.</p>";                        endif;                        ?>                    </div>                </div>            </div>        </div>    </div></section><?phpif(!empty($provider_values)) :?><div class="brand-logo-area clients-bg">    <div class="clients-list">        <?php        foreach ($provider_values as $val) :        if(!empty($val['organization_logo'])) :        ?>        <div class="client-logo">            <a href="#"><img src="<?php echo $val['organization_logo']; ?>" class="img-responsive" alt="Organization Logo" title="<?php echo $val['organization_name']; ?>" /></a>        </div>        <?php        endif;        endforeach;        ?>    </div></div><?phpendif;?><?php include('include/footermenu.php'); ?><?php include('include/footer.php'); ?>
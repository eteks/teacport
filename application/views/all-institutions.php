<?php include('include/header.php'); ?><?php include('include/menus.php'); ?><section class="job-breadcrumb">    <div class="container">        <div class="row">            <div class="col-md-12 col-sm-12 co-xs-12 text-left">                <div class="bread">                    <ol class="breadcrumb">                        <li><a href="<?php echo base_url(); ?>">Home</a> </li>                        <li class="active">All Institutions</li>                    </ol>                </div>            </div>        </div>    </div></section><section id="institution_grids" class="categories">    <div class="container">        <div class="row">            <div class="col-md-12 col-sm-12 col-xs-12">                <div class="col-md-12 col-sm-12 col-xs-12">                    <div class="Heading-title black">                        <h1>All Institutions</h1>                        <p>Please find the list of all institutuions who were registered with us.</p>                    </div>                </div>                                        <!--institution-grid-->                <?php                 if(!empty($allinstitutions_results)) :                ?>                <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                    <div class="company-list"> <!-- onclick='window.location = "<?php echo base_url(); ?>seeker/applynow"' -->                        <?php                           foreach ($allinstitutions_results as $ins_val):                        ?>                        <div class="company-box">                            <div class="col-md-2 col-sm-2 col-xs-12 nopadding">                                <a href="user-followed-companies">                                    <div class="company-list-img">                                        <?php                                        if(!empty($ins_val['organization_logo'])) :                                        ?>                                        <img src="<?php echo $ins_val['organization_logo']; ?>" class="img-responsive" target="_blank" alt="Not Found">                                         <?php                                        else :                                        ?>                                        <img src="<?php echo base_url()."assets/images/institution.png"; ?>" class="img-responsive" target="_blank" alt="Not Found">                                        <?php                                        endif;                                        ?>                                      </div>                                </a>                            </div>                            <div class="col-md-6 col-sm-6 col-xs-12 nopadding">                                <div class="company-list-name">                                    <a href="user-followed-companies/<?php echo $ins_val['organization_id']; ?>"><h5>                                    <?php echo $ins_val['organization_name']; ?></h5> </a>                                    <p><?php echo $ins_val['organization_address_1']; ?></p>                                </div>                            </div>                            <div class="col-md-2 col-sm-2 col-xs-6 nopadding">                                <?php                                $title = "";                                if(isset($provider_totaljobs[$ins_val['organization_id']]['job_title'])) {                                    $i = 1;                                    $count = count($provider_totaljobs[$ins_val['organization_id']]['job_title']);                                    foreach ($provider_totaljobs[$ins_val['organization_id']]['job_title'] as $val) :                                        if($i <= 5) {                                            $title .= $val;                                        }                                        if($i != $count && $i < 5) {                                            $title .= ",";                                        }                                        $i++;                                    endforeach;                                }                                else {                                    $title = "No jobs posted";                                   }                                ?>                                <a class="pull-left institution_new_jobs" title="<?php echo $title; ?>">Latest Jobs</a>                            </div>                            <div class="col-md-2 col-sm-2 col-xs-6 nopadding">                                <a class="pull-left institution_total_jobs">Total Jobs <span class="badge">(<?php                                     if(isset($provider_totaljobs[$ins_val['organization_id']]['job_title'])) {                                        echo count($provider_totaljobs[$ins_val['organization_id']]['job_title']);                                    }                                    else {                                        echo "0";                                    }                                ?>)</span></a>                            </div>                            <!-- <a href='javascript:void(0)' >								<span class='institutional_jobs_grid_link'></span>							</a> -->                        </div>                        <?php                         endforeach;                        if(!empty($links)) :                            echo "<div class='col-md-12 col-sm-12 col-xs-12 nopadding'><div class='pagination-box clearfix'>" .$links . "</div></div>";                        endif;                        ?>                    </div>                    <?php                    else :                        echo "<h1 class='text-center' style='color:#808080'>No institution available now.</h1>";                    endif;                    ?>                </div><!--end institution-grid-->            </div>        </div>    </div></section>        <?php include('include/footermenu.php'); ?><?php include('include/footer.php'); ?><?php include('include/footercustom.php'); ?>
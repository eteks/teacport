<?php include('include/header.php');include('include/menus.php'); // echo "<pre>"; print_r($findjob); echo "</pre>";?>    <div class="page category-page">                <div class="clearfix"></div>        <!--End Header-->                <section class="job-breadcrumb">            <div class="container">                <div class="row">                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">                        <h3>Find Jobs</h3>                    </div>                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">                        <div class="bread">                            <ol class="breadcrumb">                                <li><a href="<?php echo base_url(); ?>">Home</a> </li>                                <li><a href="<?php echo base_url(); ?>job_seeker/dashboard">Dashboard</a> </li>                                <li class="active">Find Jobs</li>                            </ol>                        </div>                    </div>                </div>            </div>        </section>        <section class="dashboard-body">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                        <div class="col-md-4 col-sm-12 col-xs-12">                            <?php include('include/user_dashboard_sidemenu.php'); ?>                                                    </div>                        <div id="candidate-browse-jobs" class="col-md-8 col-sm-12 col-xs-12">                            <div class="heading-inner first-heading">                                <p class="title">Search Related Jobs</p>                             </div>                            <!-- Normal Search-->                            <div class="breadcrumb-search parallex" id="candidate_nos_act">                                <div class="search-form-contaner">                                 <?php echo form_open('seeker/findjob'); ?>                                      <div class="col-md-3 col-sm-3 col-xs-12 nopadding">                                            <div class="form-group">                                                                               <select class="select-category form-control" name="selected_posting">                                                                      <option>  </option>                                                    <?php foreach ($applicable_postings as $postings) {                                                          echo "<option value='".$postings['posting_id']."' data-value='".$postings['posting_id']."'>".$postings['posting_name']." </option>";                                                } ?>                                                </select>                                            </div>                                        </div>                                        <div class="col-md-3 col-sm-3 col-xs-12 nopadding">                                            <div class="form-group select-salary">                                                <select class="select-minsalary form-control" name="selected_salary">                                                   <option>  </option>                                                   <option value="0">Less than 10,000</option>                                                    <option value="10000">10,000 +</option>                                                    <option value="20000">20,000 +</option>                                                    <option value="30000">30,000 +</option>                                                    <option value="40000">40,000 +</option>                                                    <option value="50000">50,000 +</option>                                                    <option value="60000">60,000 +</option>                                                </select>                                            </div>                                        </div>                                        <div class="col-md-3 col-sm-3 col-xs-12 nopadding">                                            <div class="form-group select-district">                                                <select class="select-location form-control" name="selected_salary">                                                <option>  </option>                                                    <?php foreach ($get_all_districts as $district) {                                                          echo "<option value='".$district['district_id']."' data-value='".$district['district_id']."'>".$district['district_name']." </option>";                                                } ?>                                                </select>                                            </div>                                        </div>                                        <div class="col-md-3 col-sm-3 col-xs-12 nopadding">                                            <div class="form-group form-action">                                                <button type="submit" class="btn btn-default">Search <i class="fa fa-angle-right"></i> </button>                                            </div>                                        </div>                                        <div id="advanced_srch_act" class="col-sm-12 nopadding">                                            <a class="pull-left advanced_search"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Advanced Search </a>                                        </div>                                          <div class="clearfix"> </div>                                    </form>                                </div>                           </div>                            <!--End of Normal Search-->                           <!--Advanced Search-->                            <div style="display: none;" class="breadcrumb-search parallex" id="candidate_ads_act">                                <div class="search-form-contaner">                                    <form class="form-inline">                                            <div class="col-md-2-5 col-sm-2 col-xs-12 ">                                                <div class="form-group">                                                   <select class="select-location form-control">                                                                              <option> </option>                                                                <?php foreach ($get_all_districts as $district) {                                                                  echo "<option value='".$district['district_id']."' data-value='".$district['district_id']."'>".$district['district_name']." </option>";                                                            } ?>                                                    </select>                                                </div>                                            </div>                                            <div class="col-md-2-5 col-sm-2 col-xs-12 ">                                                <div class="form-group">                                                    <select class="select-mothertongue form-control">                                                                              <option> </option>                                                                <?php foreach ($mother_tongues as $mother_tongue) {                                                                  echo "<option value='".$mother_tongue['language_id']."' data-value='".$mother_tongue['language_id']."'>".$mother_tongue['language_name']." </option>";                                                            } ?>                                                    </select>                                                </div>                                            </div>                                            <div class="col-md-2-5 col-sm-2 col-xs-12 ">                                                <div class="form-group">                                                    <select class="select-experience form-control">                                                        <option> </option>                                                        <option value="0">Fresher</option>                                                        <option value="1">1 year</option>                                                        <option value="2">2 year</option>                                                        <option value="3">3 year</option>                                                        <option value="4">4 year</option>                                                        <option value="5">5 year</option>                                                        <option value="6">6 year</option>                                                        <option value="6+">6+ year</option>                                                    </select>                                                </div>                                            </div>                                            <div class="col-md-2-5 col-sm-2 col-xs-12 ">                                                <div class="form-group">                                                    <select class="select-category form-control">                                                                              <option>  </option>                                                                <?php foreach ($applicable_postings as $postings) {                                                                  echo "<option value='".$postings['posting_id']."' data-value='".$postings['posting_id']."'>".$postings['posting_name']." </option>";                                                            } ?>                                                    </select>                                                </div>                                            </div>                                            <div class="col-md-2-5 col-sm-2 col-xs-12 ">                                                <div class="form-group select-salary">                                                    <select class="select-nationality form-control">                                                        <option> </option>                                                       <option value="india">India</option>                                                       <option value="others">Others</option>                                                    </select>                                                </div>                                            </div>                                        <div class="col-md-2-5 col-sm-2 col-xs-12 ">                                                <div class="form-group select-salary">                                                    <select class="select-religion form-control">                                                        <option> </option>                                                       <option value="hindu">Hindu</option>                                                       <option value="muslim">Muslim</option>                                                       <option value="christian">Christian</option>                                                       <option value="others">Others</option>                                                    </select>                                                </div>                                            </div>                                        <div class="col-md-2-5 col-sm-2 col-xs-12 ">                                                <div class="form-group select-salary">                                                    <select class="select-tet form-control">                                                        <option>  </option>                                                       <option value="0">Passed</option>                                                       <option value="1">Attended</option>                                                    </select>                                                </div>                                         </div>                                         <div class="col-md-2-5 col-sm-2 col-xs-12 ">                                                <div class="form-group select-salary">                                                    <select class="select-subject form-control">                                                                          <option>  </option>                                                        <?php foreach ($subjects as $subject) {                                                          echo "<option value='".$subject['subject_id']."' data-value='".$postings['subject_id']."'>".$subject['subject_name']." </option>";                                                    } ?>                                                    </select>                                                </div>                                         </div>                                         <div class="col-md-2-5 col-sm-2 col-xs-12 ">                                                <div class="form-group select-salary">                                                    <select class="select-qualification form-control">                                                    <option> </option>                                                            <?php foreach ($qualifications as $qualification) {                                                          echo "<option value='".$qualification['educational_qualification_id']."' data-value='".$qualification['educational_qualification_id']."'>".$qualification['educational_qualification']." </option>";                                                    } ?>                                                    </select>                                                </div>                                          </div>                                          <div class="col-md-2-5 col-sm-2 col-xs-12 ">                                            <div class="form-group select-salary">                                                <select class="select-minsalary form-control">                                                    <option> </option>                                                    <option value="0">Less than 10,000</option>                                                    <option value="1">10,000 +</option>                                                    <option value="2">20,000 +</option>                                                    <option value="3">30,000 +</option>                                                    <option value="1">40,000 +</option>                                                    <option value="2">50,000 +</option>                                                    <option value="3">100,000 +</option>                                                    <option value="3">Negotiable</option>                                                    <option value="3">As per norms</option>                                                </select>                                            </div>                                        </div>                                      </form> <br>                                                                                                          <div class="col-md-3 col-sm-3 col-xs-12 nopadding pull-right">                                            <button type="button" class="btn-default">Search <i class="fa fa-angle-right"></i> </button>                                    </div>                                     <div class="clearfix"> </div>	                                    <div id="normal_srch_act" class="col-md-3 col-sm-3 col-xs-12 nopadding pull-left">                                        <a  class="advanced_search" type="button"> Normal Search <i class="fa fa-hand-o-left" aria-hidden="true"></i></a>                                    </div>                                     <div class="clearfix"> </div>	                                   </div>                           </div>                           <!--End of Advanced Search-->                          <div id="dashboard-jobs-grid" class="all-jobs-list-box2">                          <?php                           if(!empty($findjob)) {                                 foreach($findjob as $findjobvalue) { ?>                                 <div class="job-box job-box-2">                                        <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">                                            <div class="comp-logo">                                                                                               <a href="<?php echo base_url(); ?>job_seeker/applynow/>"<img src="images/company/5.png" class="img-responsive" alt="scriptsbundle"> </a>                                            </div>                                        </div>                                        <div class="col-md-10 col-sm-10 col-xs-12">                                            <div class="job-title-box">                                                <a href="<?php echo base_url(); ?>job_seeker/applynow/<?php echo $findjobvalue['vacancies_id'];?>">                                                    <div class="job-title"><?php echo $findjobvalue['organization_name'];?></div>                                                </a>                                                <a href="<?php echo base_url(); ?>job_seeker/applynow"><span class="comp-name"><?php echo $findjobvalue['vacancies_job_title'];?> - <?php echo $findjobvalue['vacancies_experience'];?></span></a>                                            </div>                                            <div class="feature-post-meta-bottom">                                                <p><?php echo $findjobvalue['vacancies_accommodation_info'];?>                                                <?php if(isset($findjobvalue['vacancies_id'])){ ?>                                                    <a href="<?php echo base_url(); ?>seeker/applynow/<?php echo $findjobvalue['vacancies_id'];?>" class="apply pull-right"> Apply Now                                                    </a>                                                </p>                                                <?php } ?>                                            </div>                                                                                </div>                                        <div class="job-salary">                                            <i class="fa fa-money"></i><?php echo $findjobvalue['vacancies_start_salary'];?> - <?php echo $findjobvalue['vacancies_end_salary'];?>                                        </div>                                        <a href="javascript:void(0)" onclick='window.location = "<?php echo base_url();?>seeker/applynow/<?php echo $findjobvalue['vacancies_id'];?>"'>	                                		<span class="dashboard-jobs-grid-link"> </span>	                                	</a>                                    </div>                                     <?php }                                }else{ ?>                                       <p> No jobs Available </p>                                <?php } ?>                            </div>                                                       <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                                <div class="pagination-box clearfix">                                    <ul class="pagination">                                        <?php                                         if(!empty($links)) {                                             foreach($links as $link) {                                                echo "<li>". $link."</li>";                                            }                                         }                                        ?>                                    </ul>                                </div>                            </div>                        </div>                    </div>                </div>            </div>        </section>        <div class="brand-logo-area clients-bg">            <div class="clients-list light-blue">                <div class="client-logo">                    <a href="user-resume.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a>                </div>                <div class="client-logo">                    <a href="user-resume.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_2.png" class="img-responsive" alt="Brand Image" /></a>                </div>                <div class="client-logo">                    <a href="user-resume.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_3.png" class="img-responsive" alt="Brand Image" /></a>                </div>                <div class="client-logo">                    <a href="user-resume.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_4.png" class="img-responsive" alt="Brand Image" /></a>                </div>                <div class="client-logo">                    <a href="user-resume.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a>                </div>                <div class="client-logo">                    <a href="user-resume.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_2.png" class="img-responsive" alt="Brand Image" /></a>                </div>                <div class="client-logo">                    <a href="user-resume.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_3.png" class="img-responsive" alt="Brand Image" /></a>                </div>                <div class="client-logo">                    <a href="user-resume.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_4.png" class="img-responsive" alt="Brand Image" /></a>                </div>            </div>        </div>        <?php include('include/footermenu.php'); ?><?php include('include/footer.php'); ?></div>


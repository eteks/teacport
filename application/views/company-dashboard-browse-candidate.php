<?phpinclude ('include/header.php');include ('include/menus.php'); ?>        <section class="job-breadcrumb">            <div class="container">                <div class="row">                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">                        <h3>Browse Candidate</h3>                    </div>                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">                        <div class="bread">                            <ol class="breadcrumb">                                <li><a href="<?php echo base_url(); ?>">Home</a>                                </li>                                <li><a href="<?php echo base_url(); ?>provider/dashboard">Dashboard</a>                                </li>                                <li class="active">Browse Candidate</li>                            </ol>                        </div>                    </div>                </div>            </div>        </section>        <section class="dashboard-body">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                        <div class="col-md-4 col-sm-4 col-xs-12">                            <div class="panel">                                <div class="dashboard-logo-sidebar">                                    <?php if (@getimagesize($organization['organization_logo'])) { ?>                                    <img src="<?php echo $organization['organization_logo']; ?>" alt="institution" class="img-responsive center-block ">                                    <?php } else { ?>                                	<img src="<?php echo base_url().'assets/images/institution.png'; ?>" alt="institution" class="img-responsive center-block ">                                    <?php } ?>                                </div>                                <div class="text-center dashboard-logo-sidebar-title">                                    <h4><?php echo $organization['organization_name']; ?></h4>                                </div>                            </div>                             <!-- dashboard side bar  -->                            <?php								include ('include/company_dashboard_sidebar.php'); 							?>                        </div>                        <!--right panel-->                        <div id="company-browse-candidate" class="col-md-8 col-sm-8 col-xs-12">                            <div class="heading-inner first-heading">                                <p class="title">Browse Candidate</p>                            </div>                            <!-- Normal Search-->                            <?php echo form_open('provider/candidate'); ?>                            <div class="breadcrumb-search parallex <?php if(isset($search_mode) && $search_mode == 'advanced') echo 'dn'; ?>" id="normalsearch_act">	                            <div class="search-form-contaner">	                            	<?php echo form_open('provider/candidate'); ?>	                                    <div class="col-md-3 col-sm-3 col-xs-12 nopadding">	                                        <div class="form-group">	                                            <select class="form-control select-posting" name="candidate_posting_name">	                                                <option value="">Selece posting</option>	                                                <?php													foreach ($posting as $postings) {
														echo "<option value='" . $postings['posting_id'] . "' ".set_select('candidate_posting_name', $postings['posting_id']).">" . $postings['posting_name'] . "</option>";
													}	                                                ?>	                                            </select>	                                        </div>	                                    </div>	                                    <div class="col-md-3 col-sm-3 col-xs-12 nopadding">	                                        <div class="form-group ">	                                            <select class="form-control select-minsalary" name="candidate_salary">	                                               	<option value="">Select minimum salary</option>	                                               	<option value="0-10000" <?php echo  set_select('candidate_salary', '0-10000'); ?>>Less than 10,000</option>				                                    <option value="10000-20000" <?php echo  set_select('candidate_salary', '10000-20000'); ?>>10,000 +</option>				                                    <option value="20000-30000" <?php echo  set_select('candidate_salary', '20000-30000'); ?>>20,000 +</option>				                                    <option value="30000-40000" <?php echo  set_select('candidate_salary', '30000-40000'); ?>>30,000 +</option>				                                    <option value="40000-50000" <?php echo  set_select('candidate_salary', '40000-50000'); ?>>40,000 +</option>				                                    <option value="50000-60000" <?php echo  set_select('candidate_salary', '50000-60000'); ?>>50,000 +</option>				                                    <option value="60000-above" <?php echo  set_select('candidate_salary', '60000-70000'); ?>>60,000 +</option>	                                            </select>	                                        </div>	                                    </div>	                                    <div class="col-md-3 col-sm-3 col-xs-12 nopadding">	                                        <div class="form-group">	                                            <select class="form-control select-location" name="candidate_willing_district">	                                            	<option value="">  </option>	                                                <?php													foreach ($district as $districts) {														echo "<option value='" . $districts['district_id'] . "' ".set_select('candidate_willing_district', $districts['district_id']).">" . $districts['district_name'] . "</option>";													}	                                                ?>	                                            </select>	                                        </div>	                                    </div>	                                    <input type="hidden" name="candidate_search_type" value="normal" />	                                    <div class="col-md-3 col-sm-3 col-xs-12 nopadding">	                                        <div class="form-group form-action">	                                            <button type="submit" class="btn btn-default">Search <i class="fa fa-angle-right"></i> </button>	                                        </div>	                                    </div>	                              		 <?php echo form_close(); ?>	                                <a id="btn_advanced_act" class="advanced_search"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Advanced Search </a>	                            </div>                           </div>                            <!--End of Normal Search-->                           <!--Advanced Search-->                            <div class="breadcrumb-search parallex <?php if(isset($search_mode) && $search_mode == 'normal') echo 'dn'; ?>" id="advancedsearch_act">	                            <div class="search-form-contaner form-inline">	                            	<?php echo form_open('provider/candidate'); ?>                            			<input type="hidden" name="candidate_search_type" value="advanced" />                                    	<div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">	                                        <div class="form-group">	                                            <select class="form-control select-location" name="candidate_willing_district">	                                            	<option value="">District</option>	                                                <?php													foreach ($district as $districts) {														echo "<option value='" . $districts['district_id'] . "' ".set_select('candidate_willing_district', $districts['district_id']). ">" . ucfirst($districts['district_name']) . "</option>";													}	                                                ?>	                                            </select>	                                        </div>                                    	</div>	                                    <div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">	                                        <div class="form-group">	                                            <select class="form-control select-mothertongue" name="candidate_mother_tongue">	                                            	<option value="">Mother tongue</option>	                                            	<?php													foreach ($mother_tongue as $mother_tongues) {														echo "<option value='" . $mother_tongues['language_id'] . "' ".set_select('candidate_mother_tongue', $mother_tongues['language_id']). ">" . ucfirst($mother_tongues['language_name']) . "</option>";													}													?>				                                </select>	                                        </div>                                        </div>                                        <div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">	                                        <div class="form-group">	                                            <select class="form-control select-experience" name="candidate_experience">	                                            	<!-- <option value="">Experience</option> -->	                                               	<option value="0" <?php echo  set_select('candidate_experience', '0'); ?>>Fresher</option>				                                    <option value="1" <?php echo  set_select('candidate_experience', '1'); ?>>1 year</option>				                                    <option value="2" <?php echo  set_select('candidate_experience', '2'); ?>>2 year</option>				                                    <option value="3" <?php echo  set_select('candidate_experience', '3'); ?>>3 year</option>				                                    <option value="4" <?php echo  set_select('candidate_experience', '4'); ?>>4 year</option>				                                    <option value="5" <?php echo  set_select('candidate_experience', '5'); ?>>5 year</option>				                                    <option value="6" <?php echo  set_select('candidate_experience', '6'); ?>>6 year</option>				                                    <option value="6+" <?php echo  set_select('candidate_experience', '6+'); ?>>6+ year</option>				                                </select>	                                        </div>                                        </div>                                        <div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">	                                        <div class="form-group">	                                            <select class="form-control select-category" name="candidate_posting_name">	                                            	<option value="">Posting</option>	                                                <?php													foreach ($posting as $postings) {														echo "<option value='" . $postings['posting_id'] . "' ".set_select('candidate_posting_name', $postings['posting_id']). ">" . ucfirst($postings['posting_name']) . "</option>";													}													?>	                                            </select>	                                        </div>                                        </div>	                                    <div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">	                                        <div class="form-group">	                                            <select class="form-control select-nationality" name="candidate_nationality">	                                            	<option value="">Nationality</option>	                                               <option value="india" <?php echo  set_select('candidate_nationality', 'india'); ?>>India</option>				                                   <option value="others" <?php echo  set_select('candidate_nationality', 'others'); ?>>Others</option>				                                </select>	                                        </div>	                                    </div>                                 		<div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">	                                        <div class="form-group">	                                            <select class="form-control select-religion" name="candidate_religion">	                                            	<option value="">Religion</option>	                                               	<option value="hindu" <?php echo  set_select('candidate_religion', 'hindu'); ?>>Hindu</option>				                                   	<option value="muslim" <?php echo  set_select('candidate_religion', 'muslim'); ?>>Muslim</option>				                                   	<option value="christian" <?php echo  set_select('candidate_religion', 'christian'); ?>>Christian</option>				                                   	<option value="others" <?php echo  set_select('candidate_religion', 'others'); ?>>Others</option>				                                </select>	                                        </div>	                                    </div>                                 		<div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">	                                        <div class="form-group">	                                            <select class="form-control select-tet" name="candidate_tet_status">	                                            	<option value="">TET status</option>	                                               	<option value="0" <?php echo  set_select('candidate_tet_status', '0'); ?>>Passed</option>				                                   	<option value="1" <?php echo  set_select('candidate_tet_status', '1'); ?>>Attended</option>				                                </select>	                                        </div>	                                 	</div>	                                 	<div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">	                                        <div class="form-group">	                                            <select class="form-control select-subject" name="candidate_subject">	                                            	<option value="">Subject</option>	                                               <?php													foreach ($subject as $subjects) {														echo "<option value='" . $subjects['subject_id'] . "' ".set_select('candidate_subject', $subjects['subject_id']). ">" . ucfirst($subjects['subject_name']) . "</option>";													}													?>				                                </select>	                                        </div>	                                 	</div>	                                 	<div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">	                                        <div class="form-group">	                                            <select class="form-control select-qualification" name="candidate_qualification">	                                            	<option value="">Qualification</option>	                                               <?php													foreach ($qualification as $qualifications) {														echo "<option value='" . $qualifications['educational_qualification_id'] . "' ".set_select('candidate_qualification', $qualifications['educational_qualification_id']). ">" . ucfirst($qualifications['educational_qualification']) . "</option>";													}													?>				                                </select>	                                        </div>	                                 	</div>	                                  	<div class="col-md-2-5 col-sm-2 col-xs-12 nopadding margin-column">	                                        <div class="form-group ">	                                            <select class="form-control select-minsalary" name="candidate_salary">	                                            	<option value="">Select Salary</option>	                                               	<option value="0-10000" <?php echo  set_select('candidate_salary', '0-10000'); ?>>Less than 10,000</option>				                                    <option value="10000-20000" <?php echo  set_select('candidate_salary', '10000-20000'); ?>>10,000 +</option>				                                    <option value="20000-30000" <?php echo  set_select('candidate_salary', '20000-30000'); ?>>20,000 +</option>				                                    <option value="30000-40000" <?php echo  set_select('candidate_salary', '30000-40000'); ?>>30,000 +</option>				                                    <option value="40000-50000" <?php echo  set_select('candidate_salary', '40000-50000'); ?>>40,000 +</option>				                                    <option value="50000-60000" <?php echo  set_select('candidate_salary', '50000-60000'); ?>>50,000 +</option>				                                    <option value="60000-above" <?php echo  set_select('candidate_salary', '60000-70000'); ?>>60,000 +</option>	                                            </select>	                                        </div>                                    	</div><br/>                                    	 <?php echo form_close(); ?>                                    	 <div id="btn_normal_act" class="col-md-3 col-sm-3 col-xs-12 nopadding pull-left">	                               			<a type="button" class="advanced_search"> Normal Search <i class="fa fa-hand-o-left" aria-hidden="true"></i></a>	                               		</div> 	                               		<div class="clearfix"> </div>                                    	<div class="col-md-3 col-sm-3 col-xs-12 nopadding pull-right">	                                        <button type="button" class="btn-default advance_search_btn">Search <i class="fa fa-angle-right"></i> </button>		                                </div> 		                               	<div class="clearfix"> </div>	                           	  </div>                           	</div>                           	<!--End of Advanced Search-->                            <div id="dashboard-jobs-grid" class="all-jobs-list-box2">                            	<?php                             	if(!empty($candidates)){                            		foreach ($candidates as $candidate) {                         		?>
                                <div class="job-box job-box-2">                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">                                        <div class="comp-logo">                                            <a><img src="<?php echo (empty($candidate['candidate_image_path'])?base_url()."assets/images/user.png":base_url().$candidate['candidate_image_path']); ?>" class="img-responsive" alt="scriptsbundle"> </a>                                        </div>                                    </div>                                    <div class="col-md-10 col-sm-10 col-xs-12">                                        <div class="job-title-box">                                            <a>                                                <div class="job-title"> <?php echo $candidate['candidate_name'] ?></div>                                            </a>                                            <a><span class="comp-name"><?php echo date_diff(date_create($candidate['candidate_date_of_birth']), date_create('today'))->y; ?>, <?php echo ucfirst($candidate['candidate_gender']); ?>, <?php echo ucfirst($candidate['educational_qualification']); ?> </span></a>                                        </div>                                        <p>Hi,  my native is <?php echo $candidate['district_name']; ?>.  <?php echo $candidate['subject_name']; ?> is the area where I am fascinated with. <?php echo $candidate['experience']>0?'I encompass '.$candidate['experience'].' years of experience.':'I am a fresher.'; ?> And my matrimonial status is <?php echo $candidate['candidate_marital_status']; ?>........<a>Read More</a> </p>                                    </div>                                    <div class="job-salary">                                        &#8377;<?php echo $candidate['candidate_expecting_start_salary']; ?> - &#8377;<?php echo $candidate['candidate_expecting_end_salary']; ?>                                    </div>                                    <a href="<?php echo base_url(); ?>provider/candidateprofile/<?php echo $candidate['candidate_id']; ?>" target="_blank">	                                	<span class="dashboard-jobs-grid-link"> </span>	                                </a>                                </div>                               <?php }} else { ?>                               	<h2>No candidate registered right now! Please check it again later!!</h2>                               <?php } ?>                            </div>                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                                <div class="pagination-box clearfix">                                    <ul class="pagination">                                        <?php foreach ($links as $link) {											echo "<li>". $link."</li>";										} ?>                                    </ul>                                </div>                            </div>                        </div> <!--End of right panel-->                   </div>                </div>            </div>        </section><?php	include ('include/footermenu.php');	include ('include/footer.php');?>

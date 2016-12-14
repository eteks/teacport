<?php include('include/header.php'); ?><?php include('include/menus.php'); ?>        <section class="job-breadcrumb">            <div class="container">                <div class="row">                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">                        <h3>Featured Jobs</h3>                    </div>                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">                        <div class="bread">                            <ol class="breadcrumb">                                <li><a href="<?php echo base_url(); ?>">Home</a>                                </li>                                <li><a href="<?php echo base_url(); ?>provider/dashboard">Dashboard</a>                                </li>                                <li class="active">Featured Jobs</li>                            </ol>                        </div>                    </div>                </div>            </div>        </section>        <section class="dashboard-body">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                        <div class="col-md-4 col-sm-4 col-xs-12">                            <div class="panel">                                <div class="dashboard-logo-sidebar">                                    <img class="img-responsive center-block" src="<?php echo $organization['organization_logo'];?>" alt="Image">                                </div>                                <div class="text-center dashboard-logo-sidebar-title">                                    <h4><?php echo $organization['organization_name']; ?></h4>                                </div>                            </div>                            <!-- dashboard side bar  -->                            <?php include('include/company_dashboard_sidebar.php'); ?>                        </div>                        <div class="col-md-8 col-sm-8 col-xs-12">                            <div class="heading-inner first-heading">                                <p class="title">Post A Job</p>                            </div>                            <p class="success_server_msg"><?php if(isset($post_job_server_msg)) echo $post_job_server_msg; ?></p>                            <div class="box-panel">                            	<?php echo form_open('provider/postjob', 'id="post_job_form" class="row"'); ?>	                            	<div class="container"> 										<span class="error_test"> Please fill all required(*) fields </span> 									</div> 									<div class="col-md-12 col-sm-12 col-xs-12"> 										<?php echo form_error('provider_ug_or_pg'); ?>	                                    <div class="form-group">	                                        <label>UG or PG</label> <br>	                                        <div class="col-sm-3"><input id="radio_ug" type="radio" name="provider_ug_or_pg" value="ug" checked> UG</div>	                                        <div class="col-sm-3"><input id="radio_pg" type="radio" name="provider_ug_or_pg" value="pg"> PG</div>	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_job_title');?></div>	                                <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_vacancy');  ?></div>	                                <div class="col-md-6 col-sm-6 col-xs-12"> 	                                    <div class="form-group">	                                        <label>Job Title *</label>	                                        <input id="job_title" type="text" placeholder="Job Title" class="form-control" name="provider_job_title">	                                    </div>	                                </div>	                                 	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>No. of Vacancy *</label>	                                        <input id="no_of_vacancy" type="text" placeholder="Total Vacancies" class="form-control" name="provider_vacancy">	                                    </div>	                                </div>	                                	                                 <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_class_level');?></div>	                                 <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_qualification');?></div>	                                 <div class="clearfix"> </div>	                                 <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Class Level</label> <br>											<select id="sel_a" class="select-classlevel form-control" name="provider_class_level"> 	                                        <option value="">Select a Level</option>	                                        <?php	                                        	foreach ($classlevel as $classlevels) {													echo "<option value='".$classlevels['class_level_id']."'>".$classlevels['class_level']."</option>";												}                                         	?>                                        	</select>	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Qualification *</label>	                                        <select id="sel_a" class="select-qualification form-control" name="provider_qualification"> 	                                        <option value="">Select a qualification</option>	                                        <?php	                                        	foreach ($qualificatoin as $qualificatoins) {													echo "<option value='".$qualificatoins['educational_qualification_id']."'>".$qualificatoins['educational_qualification']."</option>";												}                                         	?>                                        	</select>	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_open_date');?></div>	                                 <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_close_date');?></div>	                                 <div class="clearfix"> </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Open Date *</label>	                                        <input id="open_date" type="text" placeholder="Job opening date" class="form-control pickdate_act provider_open_date"  name="provider_open_date">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>End Date *</label>	                                        <input id="end_date" type="text" placeholder="Job closing date" class="form-control pickdate_act provider_close_date"  name="provider_close_date">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_interview_start');?></div>	                                 <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_interview_end');?></div>	                                 <div class="clearfix"> </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Interview Start Date *</label>	                                        <input id="int_start_date" type="text" placeholder="Interview Starts On" class="form-control pickdate_act provider_start_date" id="datepicker" name="provider_interview_start">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Interview End Date *</label>	                                        <input id="int_end_date" type="text" placeholder="Interview Ends On" class="form-control pickdate_act provider_end_date" id="datepicker" name="provider_interview_end">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_subject');?></div>	                                 <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_experience');?></div>	                                 <div class="clearfix"> </div>	                                 <?php if(strtolower($organization['institution_type_name']) != 'school'){ ?>                                	<div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Department</label> <br>	                                        <input id="department" type="text" placeholder="Department" class="form-control" name="provider_department">	                                    </div>	                                </div>	                                <?php } ?>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Subjects *</label>	                                        <select id="sel_a" class="select-subject form-control" name="provider_subject">	                                        	<option value="">Select a subject</option>	                                        	<?php	                                        	foreach ($subjects as $subject) {													echo "<option value='".$subject['subject_id']."'>".$subject['subject_name']."</option>";												} 	                                        	?>	                                        </select>	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Experience required *</label>	                                        <select id="sel_b" class="select-experience form-control" name="provider_experience">	                                        	<option value="">Select a experience</option>	                                            <option value="fresher">Fresher</option>	                                            <option value="1 year">1 Year</option>	                                            <option value="2 year">2 Years</option>	                                            <option value="3 year">3 Years</option>	                                            <option value="4 year">4 Years</option>	                                            <option value="5 year">5 Years</option>	                                            <option value="6 year">6+ Years</option>	                                        </select>	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_university');?></div>	                                <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_medium_of_instruction');?></div>	                                 <div class="clearfix"> </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>University</label> <br>	                                        <input id="university" type="text" placeholder="University" class="form-control" name="provider_university">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">		                                    <div class="form-group">	                                        <label>Medium of Instruction *</label>	                                        <select id="sel_a" class="select-medium form-control" name="provider_medium_of_instruction">	                                        	<option value="">Select a Medium</option>	                                        	<?php	                                        	foreach ($medium as $mediums) {													echo "<option value='".strtolower($mediums['language_name'])."'>".$mediums['language_name']."</option>";												} 	                                        	?>	                                        </select>	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_min_salary');?></div>	                                <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_max_salary');?></div>                                 	<div class="clearfix"> </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Minimum Salary *</label>	                                        <input id="minimum_salary_vacancy" type="text" placeholder="Minimum salary" class="form-control" name="provider_min_salary">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Maximum Salary *</label>	                                        <input id="maximum_salary_vacancy" type="text" placeholder="Maximum salary" class="form-control" name="provider_max_salary">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_accom_instruction');?></div>                                 	<div class="clearfix"> </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Accommodation Information *</label>	                                        <input id="accomadation" type="text" placeholder="Accomadation" class="form-control" name="provider_accom_instruction">	                                    </div>	                                </div>	                                <div class="clearfix"> </div>	                                <div class="col-md-6 col-sm-6 col-xs-12"><?php echo form_error('provider_job_instruction');?></div>                                 	<div class="clearfix"> </div>	                                <div class="col-md-12 col-sm-12 col-xs-12">	                                    <div class="form-group">	                                        <label>Job Details &amp; Instructions *</label>	                                        <textarea name="provider_job_instruction" class="provider_job_instruction"></textarea>	                                    </div>	                                </div>	                                <div class="col-md-12 col-sm-12 col-xs-12">	                                    <button type="submit" class="btn btn-default pull-right">Publish Job <i class="fa fa-angle-right"></i></button>	                                </div>	                            <?php echo form_close(); ?>                           </div>                       </div>                    </div>                </div>            </div>        </section><?php include('include/footermenu.php'); ?><?php include('include/footer.php'); ?>           <!-- FOR POST-JOB PAGE ONLY --><script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.tagsinput.min.js"></script><script type="text/javascript">    $('#tags').tagsInput({        width: 'auto'    });</script>    

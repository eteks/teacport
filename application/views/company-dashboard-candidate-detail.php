 <?php include('include/header.php'); ?>
 <?php include('include/menus.php'); ?>
        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Candidate Detail</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>job_provider/dashboard">Dashboard</a>
                                </li>
                                <li class="active">Candidate Detail</li>
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
                                    <img class="img-responsive center-block" src="<?php echo $organization['organization_logo'];?>" alt="Image">
                                </div>
                                <div class="text-center dashboard-logo-sidebar-title">
                                    <h4><?php echo $organization['organization_name']; ?></h4>
                                </div>
                            </div>
                             <!--include left panel menu-->
                            <?php include('include/company_dashboard_sidebar.php'); ?>
                        </div>
                        <?php //echo "<pre>"; print_r($candidate); echo"</pre>"; ?>;
                        <div id="company-browse-candidate" class="col-md-8 col-sm-8 col-xs-12">
                        	<div class="heading-inner first-heading">
                                <p class="title">Profile Detail</p>
                            </div>
                            
                            <div class="all-jobs-list-box2">
                                <div class="job-box job-box-2">
	                                
	                                <div class="col-md-12 col-sm-12 col-xs-12">
	                                	<div class="seeker_individual_profile">
	                                    	<!--Personal Profile-->
			     							 <div>
			     							 	<h5> Personal Profile</h5>
				                           	 	<div class="display_seeker_details">
				                           	 		<span class="col-sm-4">Name of the Candidate</span>
				                           	 		<span class="col-sm-1"> : </span>
													<div class="col-sm-7">	<?php echo $candidate['personnal']['candidate_name']; ?> </div>
												</div>											
												<div class="display_seeker_details">
													<span class="col-sm-4">Gender </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['candidate_gender']; ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Date of Birth </span>
													<span class="col-sm-1"> : </span>
													<div class="col-sm-7"> <?php echo $candidate['personnal']['candidate_date_of_birth']; ?> </div>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Father's Name </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['candidate_father_name']; ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Marital Status </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['candidate_marital_status']; ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Native District  </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['living_district']; ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Mother Tongue</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['language_name']; ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Nationality  </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['candidate_nationality']; ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Religion </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['candidate_religion']; ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Communal Category </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['candidate_community']; ?> </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Physically Handicapped Person</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> <?php echo $candidate['personnal']['candidate_is_physically_challenged']; ?> </span>
												</div>
											</div> <br> <!---End personal profile-->	
											<!--Post Preference-->
			     							 <div>
			     							 	<h5>Post Preference</h5>
				                           	 	<div class="display_seeker_details">
				                           	 		<span class="col-sm-4">Post Applying For</span>
				                           	 		<span class="col-sm-1"> : </span>
													<div class="col-sm-7">	XXX </div>
												</div>											
												<div class="display_seeker_details">
													<span class="col-sm-4">Expected Monthly Salary</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> XXX </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Wish to Work in District </span>
													<span class="col-sm-1"> : </span>
													<div class="col-sm-7"> XXX </div>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Wish to take Classes For </span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> XXX </span>
												</div>
											</div> <br> <!---End Post Preference-->	
											<!--Educatinaol Profile-->
			     							 <div>
			     							 	<h5>Educational Profile</h5>
				                           	 	<div class="table-responsive">
													<table class="table seeker_edu-details">
														<thead>
															<th>Qualification</th>
															<th>Year of Passing </th>
															<th>Medium Of Instruction</th>
															<th>Subject</th>
															<th>% of Marks</th>
														</thead>
														<tbody>
															<tr>
																<td>SSLC</td>
																<td>2010 </td>
																<td>2012 </td>
																<td>Science</td>
																<td>95%</td>
															<tr>
															<tr>
																<td>HSC</td>
																<td>2010 </td>
																<td>2012 </td>
																<td>Science</td>
																<td>95%</td></tr>
															<tr>
																<td>BSC</td>
																<td>2010 </td>
																<td>2012 </td>
																<td>Science</td>
																<td>95%</td>
															</tr>
															<tr>
																<td>Mphil</td>
																<td>2010 </td>
																<td>2012 </td>
																<td>Science</td>
																<td>95%</td>
															</tr>
														</tbody>
													</table>
												</div> <!--.table-responsive-->
												<div class="display_seeker_details">
				                           	 		<span class="col-sm-4">TET Exam Status</span>
				                           	 		<span class="col-sm-1"> : </span>
													<div class="col-sm-7">	XXX </div>
												</div>
												<div class="display_seeker_details">
				                           	 		<span class="col-sm-4">Others</span>
				                           	 		<span class="col-sm-1"> : </span>
													<div class="col-sm-7">	XXX </div>
												</div>	
												<div class="display_seeker_details">
				                           	 		<span class="col-sm-4">Extra Curricular Skills </span>
				                           	 		<span class="col-sm-1"> : </span>
													<div class="col-sm-7">Abacus Computer Typing Drawing Hindi Sports Dance Red Cross Blue Cross </div>
												</div>	
											</div> <br>
											<!---End Educational Profile -->
											<!--Professional Profile-->
			     							 <div>
			     							 	<h5>Professional Profile</h5>
				                           	 	<div class="display_seeker_details">
				                           	 		<span class="col-sm-12"><strong>I am a Fresh Candidate</strong></span>
				                           	 	</div>											
												<div class="table-responsive">
													<table class="table">
														<thead>
															<th>Level</th>
															<th>Board </th>
															<th>No. of Years</th>
														</thead>
														<tbody>
															<tr>
																<td>Primary</td>
																<td>Matric </td>
																<td>2 </td>
															<tr>
															<tr>
																<td>Middle</td>
																<td>StateBoard </td>
																<td>0.7</td>
																
															<tr>
																<td>High School</td>
																<td>Others </td>
																<td>1</td>
															</tr>
															<tr>
																<td>Higher Secondary</td>
																<td>CBSE </td>
																<td>3 </td>
															</tr>
															<tr>
																<td>Higher Secondary</td>
																<td>CBSE </td>
																<td>3 </td>
															</tr>
															<tr>
																<td>College</td>
																<td>Arts </td>
																<td>3 </td>
															</tr>
															<tr>
																<td>Others</td>
																<td>Drawing Teacher</td>
																<td>3</td>
															</tr>
														</tbody>
													</table>
												 </div> <!--.table-responsive-->
											  </div> <br> <!---End Professional Profile-->
											  <!--Communication Information-->
			     							 <div>
			     							 	<h5>Communication Information</h5>
				                           	 	<div class="display_seeker_details">
				                           	 		<span class="col-sm-4">Door No.</span>
				                           	 		<span class="col-sm-1"> : </span>
													<div class="col-sm-7">	XXX </div>
												</div>											
												<div class="display_seeker_details">
													<span class="col-sm-4">Post/Village/Taluk</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> XXX </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">District </span>
													<span class="col-sm-1"> : </span>
													<div class="col-sm-7"> XXX </div>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">State</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> XXX </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Pin-Code</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> XXX </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Email ID</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> XXX </span>
												</div>
												<div class="display_seeker_details">
													<span class="col-sm-4">Mobile No</span>
													<span class="col-sm-1"> : </span>
													<span class="col-sm-7"> XXX </span>
												</div>
											</div> <br> <!---Communication Information-->	
	            						</div> <!--.seeker_induvidual_profile-->
	                                </div>
	                                <!-- <div class="job-salary">
	                                    <i class="fa fa-money"></i> $400 - $500
	                                </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php include('include/footermenu.php'); ?>
<?php include('include/footer.php'); ?>  
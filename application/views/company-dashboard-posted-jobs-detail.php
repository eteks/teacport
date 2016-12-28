<?php include('include/header.php'); ?><?php include('include/menus.php'); //echo "<pre>"; print_r($applyjob); echo "</pre>";//It will returns home as output?>         <section class="job-breadcrumb">            <div class="container">                <div class="row">                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">                        <h3>Posted Job detail</h3>                    </div>                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">                        <div class="bread">                            <ol class="breadcrumb">                                <li><a href="<?php echo base_url();?>">Home</a> </li>                                <li class="active">Posted Job Details</li>                            </ol>                        </div>                    </div>                </div>            </div>        </section>        <section class="single-job-section">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                        <div class="col-md-8 col-sm-8 col-xs-12">                            <div class="single-job-page">                                <div class="job-short-detail">                                    <div class="heading-inner">                                        <p class="title">Job Details</p>                                    </div>                                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                                        <dl>                                        	<dt>Job ID:</dt>                                            <dd><?php echo $applyjob['vacancies_id'];?></dd>                                                                                        <dt>Job title:</dt>                                            <dd><?php echo ucfirst($applyjob['vacancies_job_title']);?></dd>                                                                                        <dt>Course type:</dt>                                            <dd><?php echo ucfirst($applyjob['vacancies_course_type']);?></dd>                                                                                        <dt>Subject:</dt>                                            <dd><?php echo ucfirst($applyjob['subject_name']);?></dd>                                                                                        <dt>Class level:</dt>                                            <dd><?php echo ucfirst($applyjob['class_level']);?></dd>                                                                                        <?php											 $mediums = '';											 foreach ($medium as $moi) {												 $mediums .= $moi['language_name'].', ';											 }											 $trimed_mediums = trim($mediums, ", ");											 $qualifications = '';											 foreach ($qualification as $quali) {												 $qualifications .= $quali['educational_qualification'].', ';											 }											 $trimmed_qualifications = trim($qualifications, ", ");											?>                                                                                        <dt>Qualification:</dt>                                            <dd><?php echo $qualifications;?></dd>                                                                                        <dt>Medium:</dt>                                            <dd><?php echo $mediums;?></dd>                                                                                        <dt>University/board:</dt>                                            <dd><?php echo ucfirst($applyjob['university_board_name']);?></dd>                                                                                        <dt>No. of Vacancies:</dt>                                            <dd><?php echo $applyjob['vacancies_available'];?></dd>                                            <dt>Job Experience:</dt>                                            <dd><?php echo $applyjob['vacancies_experience'];?></dd>                                                                                        <dt>Interview Start Date:</dt>                                            <dd><?php echo $applyjob['vacancies_interview_start_date'];?></dd>                                            <dt>Interview End Date:</dt>                                            <dd><?php echo $applyjob['vacancies_end_date'];?></dd>                                                                                        <dt>Accommodation:</dt>                                            <dd><?php echo $applyjob['vacancies_accommodation_info'];?></dd>                                            <dt>Job Posted On:</dt>                                            <dd><?php echo $applyjob['vacancies_created_date'];?></dd>                                            <dt>Job Salary Range(s):</dt>                                            <dd><?php echo $applyjob['vacancies_start_salary'];?> - <?php echo $applyjob['vacancies_end_salary'];?></dd>                                        </dl>                                    </div>                                </div>                                <div class="heading-inner">                                    <p class="title">Job Description</p>                                </div>                                <div class="job-desc job-detail-boxes">                                    <p>                                        <?php echo $applyjob['vacancies_instruction'];?>                                    </p>                                </div>                            </div>                        </div>                        <div class="col-md-4 col-sm-4 col-xs-12">                            <aside>                                <div class="company-detail">                                    <div class="company-img">                                        <img src="<?php echo $applyjob['organization_logo'];?>" class="img-responsive" alt="sdfasdfs">                                    </div>                                    <div class="company-contact-detail">                                        <table>                                            <tr>                                                <th>Name:</th>                                                <td> <?php echo $applyjob['organization_name'];?></td>                                            </tr>                                            <tr>                                                <th>Email:</th>                                                <td> <?php echo $applyjob['registrant_email_id'];?></td>                                            </tr>                                            <tr>                                                <th>Phone:</th>                                                <td> <?php echo $applyjob['registrant_mobile_no'];?></td>                                            </tr>                                            <tr>                                                <th>Address:</th>                                                <td>                                                    <?php echo $applyjob['organization_address_1'];?>,                                                    <?php echo $applyjob['organization_address_2'];?>,                                                    <?php echo $applyjob['organization_address_3'];?>.                                                </td>                                            </tr>                                        </table>                                    </div>                                </div>                            </aside>                            <div class="single-job-map">                                <div id="map-contact"></div>                            </div>                        </div>                    </div>                </div>            </div>        </section>  <?php include('include/footermenu.php'); ?>  <?php include('include/footer.php'); ?>
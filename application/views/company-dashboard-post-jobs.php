<?php include('include/header.php'); ?><?php include('include/menus.php'); ?>        <section class="job-breadcrumb">            <div class="container">                <div class="row">                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">                        <h3>Featured Jobs</h3>                    </div>                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">                        <div class="bread">                            <ol class="breadcrumb">                                <li><a href="company-dashboard-featured-jobs.html#">Home</a>                                </li>                                <li><a href="company-dashboard-featured-jobs.html#">Dashboard</a>                                </li>                                <li class="active">Featured Jobs</li>                            </ol>                        </div>                    </div>                </div>            </div>        </section>        <section class="dashboard-body">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                        <div class="col-md-4 col-sm-4 col-xs-12">                            <div class="panel">                                <div class="dashboard-logo-sidebar">                                    <img class="img-responsive center-block" src="images/company/logo1.jpg" alt="Image">                                </div>                                <div class="text-center dashboard-logo-sidebar-title">                                    <h4>School Name</h4>                                </div>                            </div>                            <div class="profile-nav">                                <div class="panel">                                    <ul class="nav nav-pills nav-stacked">                                        <li>                                            <a href="<?php echo base_url();?>job_provider/dashboard"> <i class="fa fa-user"></i> Dashboard</a>                                        </li>                                        <li>                                            <a href="<?php echo base_url();?>job_provider/companydbd_editprofile"> <i class="fa fa-edit"></i> Edit Profile</a>                                        </li>                                        <li>                                            <a href="<?php echo base_url();?>job_provider/companydbd_resume"> <i class="fa fa-file-o"></i>Inbox </a>                                        </li>                                        <li>                                            <a href="<?php echo base_url();?>job_provider/companydbd_browsejobs"> <i class="fa  fa-list-ul"></i> Browse Candidate</a>                                        </li>                                        <li class="provider-jobs">                                            <a href="<?php echo base_url();?>job_provider/companydbd_postjobs"> <i class="fa  fa-list-alt"></i> Jobs</a>                                            <ul>                                            	<li class="active" ><a href="<?php echo base_url();?>job_provider/companydbd_postjobs"> <i class="fa  fa-list-alt"></i>New Jobs</a></li>                                            	<li><a href="<?php echo base_url();?>job_provider/companydbd_postjobs"> <i class="fa  fa-list-alt"></i>Post Jobs</a></li>                                            </ul>                                        </li>                                        <li>                                            <a href="<?php echo base_url();?>company-dashboard-post-jobs.php"> <i class="fa  fa-bookmark-o"></i> Post Adds </a>                                        </li>                                        <li>                                            <a href="<?php echo base_url();?>job_provider/"><i class="fa  fa-list-ul"></i>Subcription Lists</a>                                        </li>                                         <li>                                            <a href="<?php echo base_url();?>job_provider/"><i class="fa fa-commenting-o"></i> Feedback </a>                                        </li>                                        <li>                                            <a href="<?php echo base_url();?>job_provider/"><i class="fa fa-commenting-o"></i> Change Password </a>                                        </li>                                        <li>                                            <a href="<?php echo base_url();?>job_provider/"><i class="fa fa-commenting-o"></i> Logout </a>                                        </li>                                    </ul>                                </div>                            </div>                        </div>                        <div class="col-md-8 col-sm-8 col-xs-12">                            <div class="heading-inner first-heading">                                <p class="title">Post A Job</p>                            </div>                            <div class="box-panel">	                            <form class="row">	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Job Title</label>	                                        <input type="text" placeholder="Job Title" class="form-control">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Location</label>	                                        <input type="text" placeholder="Job Location" class="form-control">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>No. of Vacancy</label>	                                        <input type="text" placeholder="Total Vacancies" class="form-control">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Subjects</label>	                                        <select class="questions-category form-control" multiple="multiple">	                                            <option value="0">All Categories</option>	                                            <option value="1">Transporation</option>	                                            <option value="2">Restaurant, Food, Hotels</option>	                                            <option value="3">Art, Design & Multimedia</option>	                                            <option value="4">Healthcare & Medicine</option>	                                            <option value="5">Laravel</option>	                                            <option value="6">Sofware</option>	                                            <option value="7">Information Technology</option>	                                            <option value="8">Accounting & Finance</option>	                                            <option value="10">Education & Academia</option>	                                            <option value="11">Construction, Engineering</option>	                                            <option value="12">Software & Development</option>	                                        </select>	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Open Date</label>	                                        <input type="text" placeholder="Job Title" class="form-control pickdate_act" >	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>End Date</label>	                                        <input type="text" placeholder="Job Title" class="form-control pickdate_act" >	                                    </div>	                                </div>	                                <div class="clearfix"></div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Qualification</label>	                                        <input type="text" placeholder="Qualification" class="form-control">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>UG or PG(Optional)</label> <br>	                                        <div class="col-sm-3"><input type="radio" > UG</div>	                                         <div class="col-sm-3"><input type="radio" class="col-sm-3"> PG</div>	                                    </div>	                                </div>	                                	                                <div class="col-md-12 col-sm-12 col-xs-12">	                                    <div class="form-group">	                                        <label>Experience required</label>	                                        <select class="questions-category form-control">	                                            <option value="0">Fresher</option>	                                            <option value="1">1 Year</option>	                                            <option value="2">2 Years</option>	                                            <option value="3">3 Years</option>	                                            <option value="1">4 Years</option>	                                            <option value="2">5 Years</option>	                                            <option value="3">6+ Years</option>	                                        </select>	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Class Level(Optional)</label> <br>	                                        <input type="text" placeholder="Class Level" class="form-control">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>University (Optional)</label> <br>	                                        <input type="text" placeholder="University" class="form-control">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Minimum Salary</label>	                                        <select class="questions-category form-control">	                                            <option value="0">Less than 10,000</option>	                                            <option value="1">10,000 +</option>	                                            <option value="2">20,000 +</option>	                                            <option value="3">30,000 +</option>	                                            <option value="1">40,000 +</option>	                                            <option value="2">50,000 +</option>	                                            <option value="3">100,000 +</option>	                                            <option value="3">Negotiable</option>	                                            <option value="3">As Per Norms</option>	                                        </select>	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Maximum Salary</label>	                                        <select class="questions-category form-control">	                                            <option value="0">Less than 10,000</option>	                                            <option value="1">10,000 +</option>	                                            <option value="2">20,000 +</option>	                                            <option value="3">30,000 +</option>	                                            <option value="1">40,000 +</option>	                                            <option value="2">50,000 +</option>	                                            <option value="3">100,000 +</option>	                                            <option value="3">Negotiable</option>	                                            <option value="3">As Per Norms</option>	                                        </select>	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Institution</label>	                                        <input type="text" placeholder="Institution" class="form-control">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Medium of Instruction</label>	                                        <input type="text" placeholder="Medium" class="form-control">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Accomadation Information</label>	                                        <input type="text" placeholder="Accomadation" class="form-control">	                                    </div>	                                </div>	                                 <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Interview Start Date</label>	                                        <input type="text" placeholder="Interview Starts On" class="form-control" id="datepicker">	                                    </div>	                                </div>	                                <div class="col-md-6 col-sm-6 col-xs-12">	                                    <div class="form-group">	                                        <label>Interview End Date</label>	                                        <input type="text" placeholder="Interview Ends On" class="form-control" id="datepicker">	                                    </div>	                                </div>	                                <div class="col-md-12 col-sm-12 col-xs-12">	                                    <div class="form-group">	                                        <label>Job Details &amp; Instructions</label>	                                        <textarea name="ckeditor" id="ckeditor"></textarea>	                                    </div>	                                </div>	                                <div class="col-md-12 col-sm-12 col-xs-12">	                                    <button class="btn btn-default pull-right">Publish Job <i class="fa fa-angle-right"></i></button>	                                </div>	                            </form>                           </div>                       </div>                    </div>                </div>            </div>        </section><?php include('include/footermenu.php'); ?>        <?php include('include/footer.php'); ?>               <!-- FOR POST-JOB PAGE ONLY -->        <script type="text/javascript" src="js/jquery.tagsinput.min.js"></script>        <script type="text/javascript">            $(".questions-category").select2({                placeholder: "Select Post Category",                allowClear: true,                maximumSelectionLength: 3,                /*width: "50%",*/            });            $('#tags').tagsInput({                width: 'auto'            });        </script>      <!--FOR POST-JOB==CK-EDITOR -->        <script src="http://cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>        <script type="text/javascript">            CKEDITOR.replace('ckeditor');        </script>             
<?php include('include/header.php'); ?>
<?php include('include/menus.php'); ?>
        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Company Feedback</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url();?>">Home</a>
                                </li>
                                <li><a href="company-dashboard-followers.html#">Dashboard</a>
                                </li>
                                <li class="active">Subscribe Plan</li>
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
                            <!--include left panel menu-->
                            <?php include('include/company_dashboard_sidebar.php'); ?>                           
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        	<div class="heading-inner first-heading">
                                <p class="title">Choose Your Plan</p>
                            </div>
                            <div class="subscription">
                                <!--Select Pricing Plan-->
                                <form id="form-school" class="form-horizontal" action="" name="" autocomplete="false" method="post" accept-charset="utf-8">
                                	<div class="form-group">
										<label class="col-sm-3" for="subpack">Select Subscription : </label>
										<div class="col-sm-6">
											<select id="subpack_act" class="form-control" name="subpack">
												<option> Select Package </option>
												<option value="basic">Basic Membership Plan @ Rs. 10000</option>
												<option value="premium">Premium Membership Plan for 1 Year @ Rs.15000</option>
												<option value="standard">Standard Membership Plan for 1 Year @ Rs.30000</option>
											</select>
											<p>
												<b> + 15%</b>
												service tax applicable
											</p>
										</div>
										<div class="col-sm-3">
											<a href="pricing.html" target="_blank" class="btn btn-info btn-large">View Details &amp; Features</a>
								     </div>
								     </div>
							    </form> <!--End Select Pricing Plan-->
                                
                                <!--Display Chosen Plan-->
                                <div class="pricing-section-1">
                                	<!--Basic Plan-->
                                	<div id="basic_plan_act" class="col-md-12 col-sm-12 col-xs-12 light-grey subplan_act">
                                		<div class="heading-inner">
                                    		<span class="info"><i class="fa fa-info-circle" aria-hidden="true"></i> You have selected</span>
                                		</div>
			                            <div class="ui_box">
			                                <div class="ui_box__inner">
			                                    <h2> Basic Plan </h2>
			                                    <div class="price-rates"><i class="fa fa-inr" aria-hidden="true"></i> 10000 <small>per year</small> </div>
			                                    <div class="features_left">
			                                        <ul>
			                                            <li> Posting </li>
			                                            <li> Searching </li>
			                                            <li> 5000 SMS </li>
			                                            <li class="cut"> Support </li>
			                                            <li class="cut"> Access Resume </li>
			                                            <li class="cut"> Contact Details </li>
			                                            <li class="cut"> Interviews </li>
			                                            <li class="cut"> Test Preprations </li>
			                                        </ul>
			                                    </div>
			                                    <p>Join us soon to get total benefits.</p>
			                                </div>
			                            </div>
			                        </div>
			                        <!--Premium Plan-->
                                	<div id="premium_plan_act" class="col-md-12 col-sm-12 col-xs-12 light-grey subplan_act">
                                		<div class="heading-inner">
                                    		<span class="info"><i class="fa fa-info-circle" aria-hidden="true"></i> You have selected</span>
                                		</div>
			                            <div class="ui_box">
			                                <div class="ui_box__inner">
			                                    <h2> Premium Plan </h2>
			                                    <div class="price-rates"><i class="fa fa-inr" aria-hidden="true"></i> 15000 <small> per year</small></div>
			                                    <div class="features_left">
			                                        <ul>
			                                            <li> Posting </li>
			                                            <li> Searching </li>
			                                            <li> 15000 SMS </li>
			                                            <li> Support </li>
			                                            <li> Unlimited Recruitment </li>
			                                            <li> FTP Alerts - FREE Bulk SMS package </li>
			                                            <li class="cut"> Contact Details </li>
			                                            <li class="cut"> Interviews </li>
			                                            <li class="cut"> Test Preprations </li>
			                                        </ul>
			                                    </div>
			                                    <p>Join us soon to get total benefits and start Recruitment</p>
			                                </div>
			                             </div>
                       			    </div>
                       			    <!--Standarad Plan-->
                       			    <div id="standard_plan_act"class="col-md-12 col-sm-12 col-xs-12 light-grey subplan_act">
                       			    	<div class="heading-inner">
                                    		<span class="info"><i class="fa fa-info-circle" aria-hidden="true"></i> You have selected</span>
                                		</div>
			                            <div class="ui_box">
			                                <div class="ui_box__inner">
			                                    <h2> Standard Plan </h2>
			                                    <div class="price-rates"><i class="fa fa-inr" aria-hidden="true"></i> 30000 <small>per year</small> </div>
			                                    <div class="features_left">
			                                        <ul>
			                                            <li> Posting </li>
			                                            <li> Searching </li>
			                                            <li> Documentation </li>
			                                            <li> Support </li>
			                                            <li> Access Resume </li>
			                                            <li> Contact Details </li>
			                                            <li> Interviews </li>
			                                            <li> Test Preprations </li>
			                                            <li> FTP Alerts - FREE Bulk SMS Package </li>
			                                            
			                                        </ul>
			                                    </div>
			                                    <p>Join Standard plan and get total benefits soon.</p>
			                                </div>
			                            </div>
			                        </div>
			                    </div> 
			                 </div>     
			                 
		                    <!--Proceed to payment-->
		                    <div class="col-sm-offset-9 col-sm-1">
		                    	<a class="btn btn-default" href="#"> Proceed to pay </a>
		                    </div>
                        </div> <!--End right panel-->
                    </div>
                </div> <!--row-->
            </div>
        </section>
<?php include('include/footermenu.php'); ?>
       <?php include('include/footer.php'); ?>
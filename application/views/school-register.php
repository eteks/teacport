<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ScriptsBundle">
    <title>Recruit Techers</title>
    <link rel="icon" href="<?php echo base_url(); ?>images/tech-fav.ico" type="image/x-icon">

    <!-- BOOTSTRAPE STYLESHEET CSS FILES -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css">

    <!-- JQUERY MENU -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/mega_menu.min.css">

    <!-- ANIMATION -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/animate.min.css">

    <!-- OWl  CAROUSEL-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/owl.style.css">

    <!-- TEMPLATE CORE CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/custom.css">

    <!-- FOR THIS PAGE ONLY -->
    <link href="<?php echo base_url(); ?>/css/select2.min.css" rel="stylesheet" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/et-line-fonts.css" type="text/css">

    <!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
    <!-- JavaScripts -->
    <script src="<?php echo base_url(); ?>/js/modernizr.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="page category-page">
        <div id="spinner">
            <div class="spinner-img"> <img alt="Opportunities Preloader" src="images/loader.gif" />
                <h2>Please Wait.....</h2>
            </div>
        </div>
        <section class="login-page-4 parallex">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="login-container">
                            <div class="loginbox">
                               <div class="row">	
                            	  <a class="col-sm-2" href="<?php echo base_url(); ?>home/"><img src="<?php echo base_url(); ?>images/recriut-teachers-logo.png" alt="logo" class="img-responsive"></a>      	
                	              <div class="col-sm-8 pull-left loginbox-title"><h2><strong>School Registration<i class="fa fa-pencil" aria-hidden="true"></i></strong></h2> </div>
                	           </div> 
                	            <!--Steps indicator-->
                	            
                	            <div class="wizard">
							            <div class="wizard-inner">
							                <div class="connecting-line"></div>
							                <ul class="nav nav-tabs" role="tablist">
							                    
							                    <li role="presentation" class="disabled">
							                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 1">
							                            <span class="round-tab">
							                                <i class="glyphicon glyphicon-pencil"></i>
							                            </span>
							                        </a>
							                    </li>
							                    <li role="presentation" class="disabled">
							                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 2">
							                            <span class="round-tab">
							                                <i class="glyphicon glyphicon-phone"></i>
							                            </span>
							                        </a>
							                    </li>
							
							                    <li role="presentation" class="disabled">
							                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
							                            <span class="round-tab">
							                                <i class="glyphicon glyphicon-ok"></i>
							                            </span>
							                        </a>
							                    </li>
							                </ul>
							            </div>
							
							            <!-- form role="form">
							                <div class="tab-content">
							                    <div class="tab-pane active" role="tabpanel" id="step1">
							                        <h3>Step 1</h3>
							                        <p>This is step 1</p>
							                        <ul class="list-inline pull-right">
							                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
							                        </ul>
							                    </div>
							                    <div class="tab-pane" role="tabpanel" id="step2">
							                        <h3>Step 2</h3>
							                        <p>This is step 2</p>
							                        <ul class="list-inline pull-right">
							                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
							                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
							                        </ul>
							                    </div>
							                    <div class="tab-pane" role="tabpanel" id="step3">
							                        <h3>Step 3</h3>
							                        <p>This is step 3</p>
							                        <ul class="list-inline pull-right">
							                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
							                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
							                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
							                        </ul>
							                    </div>
							                    <div class="tab-pane" role="tabpanel" id="complete">
							                        <h3>Complete</h3>
							                        <p>You have successfully completed all steps.</p>
							                    </div>
							                    <div class="clearfix"></div>
							                </div>
							            </form> -->
							        </div> <!--Wizard-->
							     	            
                	            
                	    <form id="form-school" class="form-horizontal" action="" name="" autocomplete="false" method="post" accept-charset="utf-8">
                	       <div class="row-form">	
                	            <div class="form-group"	>
	                	            <label class="col-sm-4" for="schoolname">Name of the School : </label>
									<div class="col-sm-8">
										<input id="schoolname" class="form-control" maxlength="100" name="schoolname" size="60" required="" onkeypress="return alphadothyphen(event)" value="" placeholder="Full Name of the School">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4" for="address-line1">Address Line1 : </label>
									<div class="col-sm-8">
										<input id="address-line1" class="form-control" maxlength="30" name="address-line1" size="40" value="" placeholder="Building No / Road / Street" type="text">
								     </div>
								</div>
								<div class="form-group">
									<label class="col-sm-4" for="address-line2">Address Line2 : </label>
									<div class="col-sm-8">
										<input id="address-line2" class="form-control" maxlength="30" name="address-line2" size="40" value="" placeholder="Locality / Area / Village" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4" for="address-line3">Address Line3 : </label>
									<div class="col-sm-8">
										<input id="address-line2" class="form-control" maxlength="30" name="address-line3" size="40" value="" placeholder="Taluk / City" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4" for="add_district">District : </label>
									<div class="col-sm-4">
										<select id="add_district" class="form-control" name="add_district" onchange="add_distr_others()">
											<option selected="selected" value=""> Select District </option>
											<option value="0">Other than Tamilnadu</option>
											<option value="1">Chennai</option>
											<option value="2">Coimbatore</option>
											<option value="3">Cuddalore</option>
											<option value="4">Dharmapuri</option>
											<option value="5">Dindigul</option>
											<option value="6">Erode</option>
											<option value="7">Kancheepuram</option>
											<option value="8">Karur</option>
											<option value="9">Madurai</option>
											<option value="10">Nagapattinam</option>
											<option value="11">Namakkal</option>
											<option value="12">Udhagamandalam</option>
											<option value="13">Perambalur</option>
											<option value="14">Pudukkottai</option>
											<option value="15">Ramanathapuram</option>
											<option value="16">Salem</option>
											<option value="17">Sivaganga</option>
											<option value="18">Thanjavur</option>
											<option value="19">Theni</option>
											<option value="20">Tiruvallur</option>
											<option value="21">Thiruvannamalai</option>
											<option value="22">Tiruvarur</option>
											<option value="23">Tuticorin</option>
											<option value="24">Tiruchirappalli</option>
											<option value="25">Tirunelvelli</option>
											<option value="26">Vellore</option>
											<option value="27">Villupuram</option>
											<option value="28">Virudhunagar</option>
											<option value="29">Ariyalur</option>
											<option value="30">Krishnagiri</option>
											<option value="31">Tiruppur</option>
											<option value="32">Kanyakumari</option>
										</select>
								    </div>
									<div class="col-sm-4">
										<input id="add_district_oth" class="form-control" disabled="disabled" maxlength="35" name="add_district_oth" onkeypress="return alphadothyphen(event)" value="" placeholder="Other District" type="text">
									</div>
								</div> 
								<div class="form-group">
									<label class="col-sm-4" for="region">State</label>
									<div class="col-sm-4">
										<select id="region" class="form-control" name="region">
											<option selected="selected" value=""> Select State </option>
											<option class="s.0." value="0">Andhra Pradesh</option>
											<option class="s.1." value="1">Assam</option>
											<option class="s.2." value="2">Bihar</option>
											<option class="s.3." value="3">Chhattisgarh</option>
											<option class="s.4." value="4">Chandigarh</option>
											<option class="s.5." value="5">Delhi</option>
											<option class="s.6." value="6">Goa</option>
											<option class="s.7." value="7">Gujarat</option>
											<option class="s.8." value="8">Haryana</option>
											<option class="s.9." value="9">Himachal Pradesh</option>
											<option class="s.10." value="10">Jammu & Kashmir</option>
											<option class="s.11." value="11">Jharkhand</option>
											<option class="s.12." value="12">Karnataka</option>
											<option class="s.13." value="13">Kerala</option>
											<option class="s.14." value="14">Madhya Pradesh</option>
											<option class="s.15." value="15">Maharashtra</option>
											<option class="s.16." value="16">Manipur</option>
											<option class="s.17." value="17">Meghalaya</option>
											<option class="s.18." value="18">Mizoram</option>
											<option class="s.19." value="19">Orissa</option>
											<option class="s.20." value="20">Puducherry</option>
											<option class="s.21." value="21">Punjab</option>
											<option class="s.22." value="22">Rajasthan</option>
											<option class="s.23." value="23">Tamil Nadu</option>
											<option class="s.24." value="24">Uttar Pradesh</option>
											<option class="s.25." value="25">Uttrakhand</option>
											<option class="s.26." value="26">West Bengal</option>
										</select>
									</div>
									<div class="col-sm-4">
										<input id="postal-code" class="form-control" maxlength="6" name="postal-code" onkeypress="return number(event)" value="" placeholder="Pin Code" type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4" form="stdcode">School Phone Number : </label>
									<div class="col-sm-2">
										<input id="stdcode" class="form-control" maxlength="5" name="stdcode" onkeypress="return number(event)" value="" placeholder="STD Code">
									</div>
									<div class="col-sm-3">
										<input id="phone" class="form-control" maxlength="8" name="phone" onkeypress="return number(event)" value="" placeholder="Phone Number">
									</div>
								</div>
								<span class="space-6"></span>
								<div class="form-group">
									<label class="col-sm-4" for="firstname">Registrant Name : </label>
									<div class="col-sm-8">
									 	<input id="firstname" class="form-control" maxlength="30" name="firstname" size="40" required="" onkeypress="return alphadothyphen(event)" value="" placeholder="Full Name">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4" for="designation">Registrant Designation : </label>
									<div class="col-sm-8">
										<input id="designation" class="form-control" maxlength="30" name="designation" size="40" required="" onkeypress="return alphadothyphen(event)" value="" placeholder="ex. Principal / Correspondent">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4" for="dob_yrs">Date of Birth : </label>
									<div class="col-sm-4">
										<input id="dob" class="form-control" name="dob" size="40" required="" value="" placeholder="DOB" type="date">
									</div>
									<div class="col-sm-4"> </div>
								</div>
								<div class="form-group">
									<label class="col-sm-4" for="mail">Email ID : </label>
									<div class="col-sm-4">
										<input id="mail" class="form-control" maxlength="50" name="mail" onkeydown="return emailctrl(event)" onkeypress="return emailctrl(event)" value="" placeholder="Email" required="">
									</div>
									<div class="col-sm-4">
										<input id="cmail" class="form-control" maxlength="50" name="cmail" onkeydown="return emailctrl(event)" onkeypress="return emailctrl(event)" value="" placeholder="Confirm Email" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4" for="mobile">Mobile Number : </label>
									<div class="col-sm-4">
										<input id="mobile" class="form-control" maxlength="10" name="mobile" onkeypress="return number(event)" value="" placeholder="Mobile" required="">
									</div>
									<div class="col-sm-4">
										<input id="cmobile" class="form-control" maxlength="10" name="cmobile" onkeypress="return number(event)" value="" placeholder="Confirm Mobile" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4" for="passwordInput">Set a Password : </label>
									<div class="col-sm-4">
										<input id="passwordInput" class="form-control" name="passwordInput" placeholder="Password" required="" type="password">
									</div>
									<div class="col-sm-4">
										<input id="confirmPasswordInput" class="form-control" name="confirmPasswordInput" placeholder="Confirm Password" required="" type="password">
									</div>
								</div>
								<div id="passwordStrength" class="col-sm-12"></div>
								<div class="form-group">
									<label class="col-sm-4" for="subpack">Select Subscription : </label>
									<div class="col-sm-6">
										<select id="subpack" class="form-control" name="subpack">
											<option value=""> Select Package </option>
											<option value="8">Single Institution Membership for 1 Year @ Rs.10000</option>
											<option value="9">Group of Institutions Membership for 1 Year @ Rs.25000</option>
										</select>
										<p>
											<b> + 15%</b>
											service tax applicable
										</p>
									</div>
									<div class="col-sm-2">
										<a class="btn btn-grey btn-sm" href="" target="_blank">View Details : </a>
									</div>
								</div>
								<div class="form-group declaration">
									<p>
										<input id="declar_accept" class="ace" name="declar_accept" value="Y" type="checkbox">
										<span class="lbl"></span>
										I hereby declare that all the particulars furnished in this application are true, correct and complete to the best of my knowledge and belief.
									</p>
									<p>
										<input id="optin_sms" class="ace" name="optin_sms" value="Y" type="checkbox">
										<span class="lbl"></span>
										I accept to receive sms notifications to the above specified mobile number.
									</p>
									<p>
										<input id="optin_mail" class="ace" name="optin_mail" value="Y" type="checkbox">
										<span class="lbl"></span>
										I accept to receive E-mail notifications.
									</p>
								</div>
								<div class="form-group">
									<table width="70%" cellspacing="2" cellpadding="2" border="0" align="center">
										<tbody>
											<tr>
												<td>Security Verification</td>
												<td>
													<div class="text-center">
														<div class="g-recaptcha" data-sitekey="6LdQH_oSAAAAAIuDkLQ9cC0w-IajhXdAWoOtWAon">
															<div style="width: 304px; height: 78px;">
									
									                         <!---FILL caPTACha code-->
														    </div>
														    <textarea id="g-recaptcha-response" class="g-recaptcha-response" name="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none; display: none; "></textarea>
													    </div>
								                     </div>
								                 </td>
								             </tr>
								         </tbody>
								      </table>
								  </div>
							  <div class="row">
			                      <div class="loginbox-submit">
			                      	<a href="<?php echo base_url(); ?>companydashboard/">
			                          <input type="button" class="btn btn-default btn-medium pull-right" value="Submit & Next">
			                        </a>  
			                      </div>
			                  </div> 
		                   </div>     
                       </form>
                       <div class="row-fluid">                       
                      	<div class="loginbox-signup"> Already have account <a href="<?php echo base_url(); ?>logincandidate/">Sign in</a> </div>
                       </div>	
                     </div>
                   </div>
                 </div>
               </div>
            </div>
        </section>

        <a href="<?php echo base_url(); ?>/register-4.html#" class="scrollup"><i class="fa fa-chevron-up"></i></a>

        <!-- JAVASCRIPT JS  -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/jquery-2.2.3.min.js"></script>

        <!-- BOOTSTRAP CORE JS -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>

        <!-- JQUERY SELECT -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/select2.min.js"></script>

        <!-- MEGA MENU -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/mega_menu.min.js"></script>

        <!-- JQUERY EASING -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/easing.js"></script>

        <!-- JQUERY COUNTERUP -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/counterup.js"></script>

        <!-- JQUERY WAYPOINT -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/waypoints.min.js"></script>

        <!-- JQUERY REVEAL -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/footer-reveal.min.js"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/owl-carousel.js"></script>

        <!-- CORE JS -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/custom.js"></script>

        <script type="text/javascript">
            $(".full-page").height($(window).height());
            $(window).resize(function() {
                $(".full-page").height($(window).height());
            });
        </script>

    </div>
</body>

</html>
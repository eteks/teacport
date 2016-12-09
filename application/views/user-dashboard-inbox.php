<?php include('include/header.php'); ?>
<?php include('include/menus.php'); ?>

        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Inbox</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="index.html">Home</a> </li>
                                <li><a href="index.html">Dashboard</a> </li>
                                <li class="active">Inbox</li>
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
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="profile-card">
                                <div class="banner">
                                    <img src="images/building.jpg" alt="" class="img-responsive">
                                </div>
                                <div class="user-image">
                                    <img src="images/users/profile-avatar.jpg" class="img-responsive img-circle" alt="">
                                </div>
                                <div class="card-body">
                                    <h3>Mrs. Emilly Copper</h3>
                                    <span class="title">A web Designer</span>
                                </div>
                                <ul class="social-network social-circle onwhite">
                                    <li><a href="user-followed-companies.html#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="user-followed-companies.html#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="user-followed-companies.html#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="user-followed-companies.html#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <div class="profile-nav">
                                <div class="panel">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li>
                                            <a href="user-dashboard.html"> <i class="fa fa-user"></i> Profile</a>
                                        </li>
                                        <li class="active">
                                            <a href="user-dashboard-inbox.html"> <i class="fa fa-user"></i> Inbox</a>
                                        </li>
                                        <li>
                                            <a href="user-edit-profile.html"> <i class="fa fa-edit"></i> Edit Profile</a>
                                        </li>
                                        <li>
                                            <a href="user-find-jobs.html"> <i class="fa fa-file-o"></i>Find Jobs </a>
                                        </li>
                                        <li>
                                            <a href="user-job-applied.html"> <i class="fa  fa-list-ul"></i> Jobs Applied</a>
                                        </li>
                                        <li>
                                            <a href="user-followed-companies.html"> <i class="fa  fa-bookmark-o"></i> Feedback </a>
                                        </li>
                                        <li>
                                            <a href="user-dashboard-changepwd.html"><i class="fa fa-key" aria-hidden="true"></i> Change Password </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                           <div class="heading-inner first-heading">
                                <p class="title">Your Inbox</p>
                            </div>
                            <div class="resume-list">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th><input type="checkbox" /> All</th>
                                                <th>From</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            	 <td><input type="checkbox" /></td>
                                                <td><span>XXX</span></td>
                                                <td><a class="btn" data-toggle="modal" data-target="#user_inbox_msg_act"  data-backdrop="static" data-keyboard="false">Hi, your resume has been received </a></td>
                                                <td> 15.11.2016 </td>
                                               
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" /></td>
                                                <td><span>YYY</span></td>
                                                <td><a class="btn" data-toggle="modal" data-target="#user_inbox_msg_act"  data-backdrop="static" data-keyboard="false"> Hi, your resume  </a></td>
                                                <td>10.11.2016</td>
                                                
                                            </tr>
                                            <tr>
                                            	<td><input type="checkbox" /></td>
                                                <td><span>ZZZ</span></td>
                                                <td><a class="btn" data-toggle="modal" data-target="#user_inbox_msg_act"  data-backdrop="static" data-keyboard="false"> Hi, your resume  </a></td>
                                                <td> 05.11.2016 </td>
                                                
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" /></td>
                                                <td><span>AAA</span></td>
                                                <td><a class="btn" data-toggle="modal" data-target="#user_inbox_msg_act"  data-backdrop="static" data-keyboard="false"> Hi, your resume  </a></td>
                                                <td> 01.11.2016 </td>
                                                
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
	                      	<!--Popup Message for Inbox message-->
						  	<div class="modal fade" id="user_inbox_msg_act" role="dialog">
							    <div class="modal-dialog">
							      <!-- Modal content-->
							      <div class="modal-content">
							      	<div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title">Message</h4>
							        </div>
							         <div class="modal-body">
							          	<p class="inbox_msg">Hi, Kindly find my resume attached. Hi, Kindly find my resume attached. Hi, Kindly find my resume attached.</p>	
							         </div>
							      </div>
							    </div>	
						    </div>
						   <!--End of Popup Message for Inbox message-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
         <div class="brand-logo-area clients-bg">
            <div class="clients-list light-blue">
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_2.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_3.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_4.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_2.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_3.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="user-dashboard.html#"><img src="images/clients/client_4.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
            </div>
        </div>

<?php include('include/footermenu.php'); ?>
<?php include('include/footer.php'); ?>          


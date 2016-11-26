 <?php include('include/header.php'); ?>
 <?php include('include/menus.php'); ?>      
        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Login Page</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="login.html#">Home</a> </li>
                                <li class="active">login</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="login-page light-blue">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    
                        <div class="login-container">
                        <div class="loginbox">
                            <p class="registration_server_msg"><?php if(isset($reg_server_msg)) echo $reg_server_msg; ?></p>
                                 <div class="loginbox-title">Forgot Password<a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a></div><br>
                                 <span class="error_test"> Please fill Enter Valid Email </span> 
                                 <?php echo form_open('job_seeker/forgot_password', 'id="forgotpass-form" class="forgotpass-form"'); ?>
                                    <p class="registration_status"> </p>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Email address </label>
                                        <?php echo form_error('forget_email'); ?>
                                        <input id="forget_email" name="forget_email" class="form-control input" size="20" placeholder="Enter Email" type="text">
                                    </div>
                                    <button id="submit" type="submit" class="btn btn-default btn-block">
                                        <i class="fa fa-unlock"> </i> Retrieve Password
                                    </button>
                                <?php echo form_close(); ?>
                            <div class="clear clearfix">
                                <ul class="pager">
                                    <li class="previous pull-right">
                                        <a href="<?php echo base_url(); ?>"> &larr; Back to Home </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                       </div>
                    </div>
                </div>
            </div>
        </section>
         <?php include('include/footermenu.php'); ?>
         <?php include('include/footer.php'); ?>
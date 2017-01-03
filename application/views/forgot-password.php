 <?php include('include/header.php'); ?>
        <section class="login-page-4 parallex">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="login-container">
                            <div class="loginbox">                   
                            	<p class="registration_server_msg"><?php if(isset($reg_server_msg)) echo $reg_server_msg; ?></p>
                                 <div class="loginbox-title" style="color: #2ae; font-size: 25px; font-family: 'Kaushan Script', cursive;">Forgot Password<a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a></div><br>
                                 <span class="error_test"> Please fill Enter Valid Email </span> 
                                 <?php echo form_open('login/provider/forgotpassword', 'id="forgotpass-form" class="forgotpass-form"'); ?>
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
 <?php include('include/footer.php'); ?>
 <?php include('include/footercustom.php'); ?>

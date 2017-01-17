<?php include('include/header.php'); ?>
<section class="login-page-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="login-container">
                    <div class="loginbox">                   
                        <div class="loginbox-title" style="color: #2ae; font-size: 25px; font-family: 'Kaushan Script', cursive;">Forgot Password
                            <a class="pull-right" href="<?php echo base_url();?>"><i class="fa fa-close"></i></a>
                        </div><br>
                        <?php echo form_open('login/seeker/forgotpassword', 'id="forgotpass-form" class="forgotpass-form reg_login_form"'); ?>
                            <?php 
                            if(isset($error)) :
                                if($error == 2) {
                                    echo "<p class='val_status val_success db'> <i class='fa fa-check' aria-hidden='true'></i> $reg_server_msg </p>";
                                }
                                else {
                                    echo "<p class='val_status val_error db'> <i class='fa fa-times' aria-hidden='true'></i> $reg_server_msg </p>";
                                }
                            else :
                                echo "<p class='val_status'>  </p>";
                            endif;
                            ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Email address <span class="alert">*</span> </label>
                                <?php echo form_error('forget_email'); ?>
                                <input id="forget_email" name="forget_email" class="form-control input form_inputs email_value" size="20" placeholder="Enter Email" type="text">
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
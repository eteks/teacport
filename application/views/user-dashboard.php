<?php include('include/header.php');    include('include/menus.php');     // echo "<pre>"; print_r($initial_data); echo "</pre>";  // echo "<pre>"; print_r($user_data); echo "</pre>";  ?>        <section class="dashboard parallex">            <div class="container-fluid">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                        <div class="dashboard-header">                            <div class="col-md-5 col-sm-5 col-xs-12">                                <div class="user-avatar ">                                    <img src="images/users/12.jpg" alt="" class="img-responsive center-block "></a>                                    <h3><?php echo $user_data['candidate_name'];?></h3>                                </div>                            </div>                            <div class="col-md-3 col-sm-3 col-xs-12">                                <div class="rad-info-box rad-txt-success">                                    <i class="icon icon-presentation"></i>                                    <span class="title-dashboard">Followings</span>                                    <span class="value"><span>250K</span></span>                                </div>                            </div>                            <div class="col-md-3 col-sm-3 col-xs-12">                                <div class="rad-info-box rad-txt-success">                                    <i class="icon icon-aperture"></i>                                    <span class="title-dashboard">Jobs Applied</span>                                    <span class="value"><span>200</span></span>                                </div>                            </div>                        </div>                    </div>                </div>            </div>        </section>        <section class="dashboard-body">            <div class="container">                <div class="row">                	<!--START Popup for Dashboard-->                	<!-- Modal -->                    <?php                     if(!empty($initial_data) && $initial_data == 'show_popup') :                        ?>					<div class="modal fade" id="dashboard_popup_act" role="dialog">					<div class="modal-dialog">					    <!-- Modal content-->					    <div class="modal-content">					        <div class="modal-header">					            <h4 class="modal-title">You are few steps away.. Kindly fill the deatils.</h4>					        </div>                              <?php                            if(!empty($status)) :                                echo "<div class='error'> $status </div>"                        ;                            endif;                            ?>                            <?php echo form_open('seeker/dashboard'); ?>					        <div class="modal-body profile-edit">                                <?php                                if($popup_type == 'social') :                                ?>					          	<div class="form-group">	                                <label>Email :<sup class="alert">*</sup></label>                                    <?php echo form_error('seeker_email'); ?>                                    <?php                                    if(!empty($user_data['candidate_email'])) :                                    ?>                                        <input placeholder="Email" name="seeker_email" class="form-control" id="" type="text" value="<?php echo $user_data['candidate_email']; ?>" readonly>                                    <?php                                    else :                                    ?>                                        <input placeholder="Email" name="seeker_email" class="form-control" type="text" value="<?php echo set_value('seeker_email'); ?>">                                    <?php                                    endif;                                    ?>	                            </div>                                <div class="form-group">                                    <label>Mobile :<sup class="alert">*</sup></label>                                    <?php echo form_error('seeker_mobile'); ?>                                    <?php                                    if(!empty($user_data['candidate_mobile_no'])) :                                    ?>                                        <input placeholder="Mobile" name="seeker_mobile" class="form-control" id="" type="text" value="<?php echo $user_data['candidate_mobile_no']; ?>" readonly>                                    <?php                                    else :                                    ?>                                        <input placeholder="Mobile" name="seeker_mobile" class="form-control" type="text" value="<?php echo set_value('seeker_mobile'); ?>">                                    <?php                                    endif;                                    ?>                                </div>                                <div class="form-group">                                    <label>Password :<sup class="alert">*</sup></label>                                    <?php echo form_error('seeker_password'); ?>                                    <input placeholder="Password" name="seeker_password" class="form-control" value="<?php echo set_value('seeker_password'); ?>" type="password">                                </div>                                <div class="form-group">                                    <label>Confirm Password :<sup class="alert">*</sup></label>                                    <?php echo form_error('seeker_confirmpass'); ?>                                    <input placeholder="Confirm Password" name="seeker_confirmpass" class="form-control" value="<?php echo set_value('seeker_confirmpass'); ?>" type="password">                                </div>                                 <div class="form-group">                                    <label>Institution Type :<sup class="alert">*</sup></label>                                    <?php echo form_error('seeker_institution'); ?>                                    <select name="seeker_institution" class="select-institution form-control" >                                        <option value=""> Select Institution </option>                                        <?php                                        if(!empty($institution_values)) :                                        foreach ($institution_values as $ins_val) :                                        if(set_value('seeker_institution') == $ins_val['institution_type_id'] ) :                                         echo "<option value='".$ins_val['institution_type_id']."' selected> ".$ins_val['institution_type_name']." </option>";                                        else :                                         echo "<option value='".$ins_val['institution_type_id']."'> ".$ins_val['institution_type_name']." </option>";                                        endif;                                        endforeach;                                        endif;                                        ?>                                    </select>                                 </div>                                <input type="hidden" value="<?php echo $popup_type; ?>" name="popup_type" />                                <?php                                endif;                                ?>                                <div class="form-group">	                                <label> Father Name :<sup class="alert">*</sup></label>                                    <?php echo form_error('seeker_father'); ?>                                    <input placeholder="" name="seeker_father" class="form-control" id="" type="text" value="<?php echo set_value('seeker_father'); ?>" >	                            </div>                                <div class="form-group datepicker_section">                                    <label> Date Of Birth :<sup class="alert">*</sup></label>                                    <?php echo form_error('seeker_dob'); ?>                                    <input placeholder="" name="seeker_dob" class="form-control date_of_birth" id="" type="text" value="<?php echo set_value('seeker_dob'); ?>" >                                </div>                                <div class="form-group">                                    <label> Address - 1 :<sup class="alert">*</sup></label>                                    <?php echo form_error('seeker_address1'); ?>                                    <input placeholder="" name="seeker_address1" class="form-control" id="" type="text" value="<?php echo set_value('seeker_address1'); ?>" >                                </div>                                <div class="form-group">                                    <label> Address - 2 :<sup class="alert">*</sup></label>                                    <?php echo form_error('seeker_address2'); ?>                                    <input placeholder="" name="seeker_address2" class="form-control" id="" type="text" value="<?php echo set_value('seeker_address2'); ?>" >                                </div>                                <div class="form-group">                                    <label> District Name :<sup class="alert">*</sup></label>                                    <?php echo form_error('seeker_district'); ?>                                    <select name="seeker_district" class="select-location form-control" >                                        <option value=""> Select District </option>                                        <?php                                        if(!empty($district_values)) :                                        foreach ($district_values as $dis_val) :                                        if(set_value('seeker_district') == $dis_val['district_id'] ) :                                         echo "<option value='".$dis_val['district_id']."' selected> ".$dis_val['district_name']." </option>";                                        else :                                         echo "<option value='".$dis_val['district_id']."'> ".$dis_val['district_name']." </option>";                                        endif;                                        endforeach;                                        endif;                                        ?>                                    </select>                                 </div>                                 <input type="hidden" name="candidate_id" value="<?php echo $user_data['candidate_id'];?>">                                      					        </div>                            <div class="modal-footer">                                <button type="submit" class="btn btn-default btn-block">Proceed</button>                            </div>                            <?php echo form_close(); ?>					    </div>					</div>				    </div>                    <?php                     endif;                    ?>					  <!--END Popup for Dashboard-->                	<div class="col-md-12 col-sm-12 col-xs-12">                        <div class="col-md-4 col-sm-4 col-xs-12">                            <!--include left panel menu-->                            <?php include('include/user_dashboard_sidemenu.php'); ?>                        </div>                        <div class="col-md-8 col-sm-8 col-xs-12">                            <div class="job-short-detail">                                <div class="heading-inner">                                    <p class="title">Profile detail</p>                                </div>                                <!--Profile Progress-->                                <div id="seeker-profilebar">                                	<h6>Profile Completeness</h5>	                                <div class="progress">	                                	<div class="progress-bar progress-bar-info progress-bar-striped active" style="width:<?php echo (isset($user_data['candidate_profile_completeness'])?$user_data['candidate_profile_completeness']:'1'); ?>%;" role="progress-bar" aria-valuemin="0" aria-valuemax="100">                                        <?php echo $user_data['candidate_profile_completeness']; ?>%	                                	</div>	                                </div>                                </div>                                <dl>                                    <dt>First Name:</dt>                                    <dd><?php echo $user_data['candidate_name'];?></dd>                                    <dt>Father Name:</dt>                                    <dd><?php echo $user_data['candidate_father_name'];?></dd>                                    <dt>Date Of Birth:</dt>                                    <dd> <?php echo date('d-m-Y',strtotime($user_data['candidate_date_of_birth'])); ?> </dd>                                    <dt>Phone:</dt>                                    <dd> <?php echo $user_data['candidate_mobile_no'];?> </dd>                                    <dt>Email:</dt>                                    <dd> <?php echo $user_data['candidate_email'];?> </dd>                                    <dt>Address - 1:</dt>                                    <dd> <?php echo $user_data['candidate_address_1'];?> </dd>                                    <dt>Address - 2:</dt>                                    <dd> <?php echo $user_data['candidate_address_2'];?> </dd>                                    <dt>City:</dt>                                    <dd> <?php echo $user_data['district_name'];?> </dd>                                    <dt>State:</dt>                                    <dd> <?php echo $user_data['state_name'];?> </dd>                                    <?php                                    if(!empty($user_data['candidate_nationality'])) :                                    foreach (unserialize(NATIONALITY) as $key => $val):                                    if( $key == $user_data['candidate_nationality']) {                                     ?>                                        <dt>Country:</dt>                                        <dd> <?php echo $val; ?></dd>                                    <?php                                    }                                    endforeach;                                     endif;                                    ?>                                                             </dl>                            </div>                            <!-- <div class="heading-inner">                                <p class="title">Some Line About Me</p>                            </div>                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet. </p> -->                        </div>                    </div>                </div>            </div>        </section>        <div class="brand-logo-area clients-bg">            <div class="clients-list light-blue">                <div class="client-logo">                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a>                </div>                <div class="client-logo">                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_2.png" class="img-responsive" alt="Brand Image" /></a>                </div>                <div class="client-logo">                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_3.png" class="img-responsive" alt="Brand Image" /></a>                </div>                <div class="client-logo">                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_4.png" class="img-responsive" alt="Brand Image" /></a>                </div>                <div class="client-logo">                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a>                </div>                <div class="client-logo">                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_2.png" class="img-responsive" alt="Brand Image" /></a>                </div>                <div class="client-logo">                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_3.png" class="img-responsive" alt="Brand Image" /></a>                </div>                <div class="client-logo">                    <a href="user-dashboard.html#"><img src="<?php echo base_url(); ?>assets/images/clients/client_4.png" class="img-responsive" alt="Brand Image" /></a>                </div>            </div>        </div>        <?php include('include/footermenu.php'); ?>  <?php include('include/footer.php'); ?>
<div class="profile-card">
    <div class="banner">
        <img src="<?php echo base_url(); ?>assets/images/building.jpg" alt="" class="img-responsive">
    </div>
    <?php
    if(!empty($sidebar_values['candidate_image_path'])) : 
    ?>
    <div class="user-image">    
        <img src="<?php echo $sidebar_values['candidate_image_path']; ?>" class="img-responsive img-circle" alt="Not Found">
    </div>
    <?php endif; ?>
    <div class="card-body">
        <h3><?php if(!empty($sidebar_values['candidate_name'])) echo $sidebar_values['candidate_name']; ?></h3>
    </div>

    <ul class="social-network social-circle onwhite">
        <?php if(!empty($sidebar_values['candidate_facebook_url'])) : ?>
        <li><a href="<?php echo $sidebar_values['candidate_facebook_url']; ?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
        <?php else : ?>
        <li class="disabled"><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>   
        <?php endif; ?>
        <?php if(!empty($sidebar_values['candidate_googleplus_url'])) : ?>
        <li><a href="<?php echo $sidebar_values['candidate_googleplus_url']; ?>" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
        <?php else : ?>
        <li class="disabled"><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
        <?php endif; ?>
        <?php if(!empty($sidebar_values['candidate_linkedin_url'])) : ?>
        <li><a href="<?php echo $sidebar_values['candidate_linkedin_url']; ?>" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
        <?php else : ?>
        <li class="disabled"><a href="#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
        <?php endif; ?>                
    </ul>
</div>
<div class="profile-nav">
        <div class="panel">
            <ul class="nav nav-pills nav-stacked">
                <li class="<?php if($this->uri->segment(2)=='dashboard') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>seeker/dashboard"> <i class="fa fa-user"></i> Profile</a>
                </li>
                <li class="inbox_menu seeker_message_count <?php if($this->uri->segment(2)=='inbox') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>seeker/inbox"> <i class="fa fa-file-o"></i> Inbox <span class="button__badge"> 0 </span> </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>seeker/editprofile"> <i class="fa fa-edit"></i> Edit Profile</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>seeker/findjob"> <i class="fa fa-list-alt"></i> Find Jobs </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>seeker/jobsapplied"> <i class="fa  fa-list-ul"></i> Jobs Applied</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>seeker/feedback"> <i class="fa fa-commenting-o"></i> Feedback</a>
                </li>
                 <li>
                    <a href="<?php echo base_url(); ?>seeker/password"> <i class="fa fa-key" aria-hidden="true"></i> Change Password</a>
                </li>
            </ul>
        </div>
</div>
<div class="profile-nav">
        <div class="panel">
            <ul class="nav nav-pills nav-stacked">
                <li class="<?php if($this->uri->segment(2)=='dashboard') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>seeker/dashboard"> <i class="fa fa-user"></i> Profile</a>
                </li>
                <li class="inbox_menu seeker_message_count <?php if($this->uri->segment(2)=='inbox') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>seeker/inbox"> <i class="fa fa-user"></i> Inbox <span class="button__badge"> 0 </span> </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>seeker/editprofile"> <i class="fa fa-edit"></i> Edit Profile</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>seeker/findjob"> <i class="fa fa-file-o"></i>Find Jobs </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>seeker/jobsapplied"> <i class="fa  fa-list-ul"></i>Jobs Applied</a>
                </li>
                <li>
                    <a href="user-dashboard-feedback.php"> <i class="fa fa-commenting-o"></i>Feedback</a>
                </li>
                 <li>
                    <a href="<?php echo base_url(); ?>seeker/password"> <i class="fa fa-commenting-o"></i>Change Password</a>
                </li>
            </ul>
        </div>
</div>
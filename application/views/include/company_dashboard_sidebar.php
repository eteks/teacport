<div class="profile-nav panel-border">
    <div class="panel">
        <ul class="nav nav-pills nav-stacked">
            <li class="<?php if($this->uri->segment(2)=='dashboard') echo 'active'; ?>">
                <a href="<?php echo base_url();?>provider/dashboard"> <i class="fa fa-user"></i>Dashboard</a>
            </li>
            <li class="inbox_menu provider_message_count <?php if($this->uri->segment(2)=='inbox') echo 'active'; ?>">
                <a href="<?php echo base_url();?>provider/inbox"> <i class="fa fa-file-o"></i>Inbox <span class="button__badge">0</span>
				</a>
            </li>
            <li class="<?php if($this->uri->segment(2)=='candidate') echo 'active'; ?>">
                <a href="<?php echo base_url();?>provider/candidate"> <i class="fa  fa-list-ul"></i>Browse Candidate</a>
            </li>
            <ul class="nav nav-stacked provider-jobs"> <i class="fa  fa-list-alt"></i>Jobs <span class="pull-right"><i class="fa fa-angle-double-down"></i></span>
            	<li class="<?php if($this->uri->segment(2)=='postjob') echo 'active'; ?> submenu"><a href="<?php echo base_url();?>provider/postjob"> <i class="fa  fa-list-alt"></i>New Jobs</a></li>
            	<li class="<?php if($this->uri->segment(2)=='postedjob') echo 'active'; ?> submenu"><a href="<?php echo base_url();?>provider/postedjob"> <i class="fa  fa-list-alt"></i>Posted Jobs</a></li>
            </ul>
            </li>
            <li class="<?php if($this->uri->segment(2)=='postad') echo 'active'; ?>">
                <a href="<?php echo base_url();?>provider/postad"> <i class="fa  fa-bookmark-o"></i> Post Ads </a>
            </li>
            <li class="<?php if($this->uri->segment(2)=='subscription') echo 'active'; ?>">
                <a href="<?php echo base_url();?>provider/subscription"> <i class="fa fa-money"></i>Subcribe Plan</a>
            </li>
            <li class="<?php if($this->uri->segment(2)=='feedback') echo 'active'; ?>">
                <a href="<?php echo base_url();?>provider/feedback"> <i class="fa fa-commenting-o"></i>Feedback </a>
            </li>
            <li class="<?php if($this->uri->segment(2)=='password') echo 'active'; ?>">
                <a href="<?php echo base_url();?>provider/password"> <i class="fa fa-key" aria-hidden="true"></i>Change Password </a>
            </li>
        </ul>
    </div>
</div>
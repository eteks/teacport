<div class="profile-nav">
    <div class="panel">
        <ul class="nav nav-pills nav-stacked">
            <li class="<?php if($this->uri->segment(2)=='dashboard') echo 'active'; ?>">
                <a href="<?php echo base_url();?>provider/dashboard"> <i class="fa fa-user"></i> Dashboard</a>
            </li>
            <li class="inbox_menu provider_message_count <?php if($this->uri->segment(2)=='inbox') echo 'active'; ?>">
                <a href="<?php echo base_url();?>provider/inbox"> <i class="fa fa-file-o"></i>Inbox <span class="button__badge">4</span>
				</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>job_provider/companydbd_browsejobs"> <i class="fa  fa-list-ul"></i> Browse Candidate</a>
            </li>
            <li class="provider-jobs">
                <a href="#"><i class="fa  fa-list-alt"></i> Jobs</a>
                <ul>
                	<li><a href="<?php echo base_url();?>job_provider/companydbd_postjobs"> <i class="fa  fa-list-alt"></i>New Jobs</a></li>
                	<li><a href="<?php echo base_url();?>job_provider/companydbd_postedjobs"> <i class="fa  fa-list-alt"></i>Posted Jobs</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url();?>company-dashboard-post-jobs.php"> <i class="fa  fa-bookmark-o"></i> Post Adds </a>
            </li>
            <li>
                <a href="<?php echo base_url();?>job_provider/"> <i class="fa fa-money"></i> Subcribe Plan</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>job_provider/"> <i class="fa fa-commenting-o"></i> Feedback </a>
            </li>
            <li>
                <a href="<?php echo base_url();?>job_provider/"> <i class="fa fa-key" aria-hidden="true"></i> Change Password </a>
            </li>
        </ul>
    </div>
</div>
<?php include('include/header.php'); ?>
<?php include('include/menus.php'); ?>
        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 co-xs-12 text-left">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="<?php echo base_url(); ?>">Home</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>provider/dashboard">Dashboard</a>
                                </li>
                                <li class="active">Posted Jobs</li>
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
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="panel panel-border">
                                <div class="dashboard-logo-sidebar">
                                    <?php if (@getimagesize($organization['organization_logo'])) { ?>
                                    <img src="<?php echo $organization['organization_logo']; ?>" alt="institution" class="img-responsive center-block ">
                                    <?php } else { ?>
                                	<img src="<?php echo base_url().'assets/images/institution.png'; ?>" alt="institution" class="img-responsive center-block ">
                                    <?php } ?>
                                </div>
                                <div class="text-center dashboard-logo-sidebar-title">
                                    <h4><?php echo $organization['organization_name']; ?></h4>
                                </div>
                            </div>
                            <!--include left panel menu-->
                             <?php include('include/company_dashboard_sidebar.php'); ?>  
                         </div>
                        
                        <?php //echo "<pre>"; print_r($postedjob);echo "</pre>"; ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                        	
                            <div class="heading-inner first-heading">
                                <p class="title">Posted Jobs</p>
                            </div>
							<?php 
	                                if($this->session->userdata('error')) :
	                                    if($this->session->userdata('error') == 2) {
	                                        echo "<p class='val_status val_success db'> <i class='fa fa-check' aria-hidden='true'></i>".$this->session->userdata('post_job_server_msg')."</p>";
	                                    }
	                                    else {
	                                        echo "<p class='val_status val_error db'> <i class='fa fa-times' aria-hidden='true'></i>".$this->session->userdata('post_job_server_msg')."</p>";
	                                    }
	                                else :
	                                    echo "<p class='val_status'>  </p>";
	                                endif;
									$this->session->unset_userdata('error');
									$this->session->unset_userdata('post_job_server_msg');
                            ?>
                             <!---List of posted jobs-->
                            <div class="all-jobs-list-box2 posted_jobs_provider">
                            	<?php foreach ($postedjob as $postedjobs) { ?>
                                <div class="job-box job-box-2 posted_job_remove_act<?php echo $postedjobs['vacancies_id']; ?>">
	                                <div class="col-md-10 col-sm-10 col-xs-10"  style="cursor:pointer" onclick='window.open("<?php echo base_url();?>provider/postedjobdetail/<?php echo $postedjobs['vacancies_id'];?>","_blank")'>
	                                    <div class="job-title-box">
	                                        <a>
	                                            <div class="job-title"><?php echo ucfirst($postedjobs['vacancies_job_title']); ?></div>
	                                        </a>
	                                        <a><span class="comp-name"><?php echo $postedjobs['vacancies_available']; ?> vacancies, <?php echo $postedjobs['vacancies_experience']; ?></span></a>
	                                    </div>
	                                    <p><?php echo substr($postedjobs['vacancies_instruction'], 0, 100); ?>...</p>
		                                <div class="job-salary">
		                                    &#8377;<?php echo $postedjobs['vacancies_start_salary']; ?> - &#8377;<?php echo $postedjobs['vacancies_end_salary']; ?>
		                                </div>
	                                </div>
	                                <div class="col-md-2 col-sm-2 col-xs-2 buttonss">
	                                	<a class="btn btn-default pull-right" href="<?php echo base_url();?>provider/editjob/<?php echo $postedjobs['vacancies_id'];?>">EDIT</a>
	                                	<a class="btn btn-default pull-right provider_posted_job_delete" data-vacancy="<?php echo $postedjobs['vacancies_id']; ?>">DELETE</a>
	                                </div>
                                </div>
                              <?php }  ?>
                            </div>
                           

                            <!--Pagination-->
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="pagination-box clearfix">
                                    <ul class="pagination">
                                    	 <?php foreach ($links as $link) {
											echo "<li>". $link."</li>";
										} ?>
                                    </ul>
                                </div>
                            </div> <!--End pagination-->

                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php include('include/footermenu.php'); ?>
       <?php include('include/footer.php'); ?>
<div class="popup_fade cancel_btn"></div> 
<div class="error_popup_msg">
 	<div class="success-alert">
 		<span></span>
 	</div><!--- --->
 	<input type="submit" class="btn btn-default alert_btn provider_job_delete_yes" value="Yes">
</div><!--success_msg-->
       <?php include('include/footercustom.php'); ?>
  <script type="text/javascript">
 	 function error_popup(message){
		$('.error_popup_msg .success-alert span').text(message);
		$('.popup_fade').show();
		$('.error_popup_msg').show();
		document.body.style.overflow = 'hidden';
	}
  	$(document).ready(function(){
	// error popup message center alignment
	var height=$('.error_popup_msg').height();
    var width=$('.error_popup_msg').width();
    $(document).on('click','.cancel_btn',function(){
	  	$('.error_popup_msg').hide();
	  	$('.popup_fade').hide();
	  	document.body.style.overflow = 'auto';
	});
    $('.error_popup_msg').css({'margin-top': -height / 2 + "px", 'margin-left': -width / 2 + "px"});
	$('.provider_posted_job_delete').on('click',function(){
		error_popup('Are you sure want to delete?');
		var provider_vacancy_id = parseInt($(this).attr('data-vacancy'));
		$('.provider_job_delete_yes').attr('data-vacancy-id',provider_vacancy_id);
	});
	$('.provider_job_delete_yes').on('click',function(){
    	var provider_vacancy_id = parseInt($(this).attr('data-vacancy-id'));
    	var csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
    	var url = '<?php echo base_url(); ?>';
    	$.ajax({
	       type: "POST",
	       url: url+"provider/postedjob/removedata",
	       data:{ vacancy_id:provider_vacancy_id, csrf_token : csrf},
	       cache: false,
	       async: false,
	       success: function(data) {
	       		if(data == 'deleted'){
	       			$('.posted_job_remove_act'+provider_vacancy_id).remove();
	       			$('.error_popup_msg').hide();
				  	$('.popup_fade').hide();
				  	document.body.style.overflow = 'auto';
	       		}
	       }
	   });
	});
  	});
  </script>

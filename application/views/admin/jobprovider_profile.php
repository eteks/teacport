<?php
$is_super_admin = $this->config->item('is_super_admin');
// $access_rights = $this->config->item('access_rights');
if(!$is_super_admin){
  $access_permission=$this->config->item('current_page_rights');    
  $current_page_rights = $access_permission['access_permission'];
  $access_rights = explode(',',$current_page_rights);
}
else{
  $access_rights = $this->config->item('access_rights');
}
$feedback_data = $this->config->item('feedback_data');
if(!empty($this->session->userdata("admin_login_status"))):
?>
<?php if(!$this->input->is_ajax_request()) { ?>
<?php include "templates/header.php" ?>
<!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
  <!-- BEGIN SIDEBAR -->
  <div id="sidebar" class="nav-collapse collapse">
    <!-- <div class="sidebar-toggler hidden-phone"></div> -->
    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
    <div class="navbar-inverse">
      <form class="navbar-search visible-phone">
        <input type="text" class="search-query" placeholder="Search" />
      </form>
    </div>
    <!-- END RESPONSIVE QUICK SEARCH FORM -->
  </div>
  <!-- END SIDEBAR -->
  <!-- BEGIN PAGE -->
  <div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="mCustomScrollbar" data-mcs-theme="dark">
    <div class="container-fluid sub_pre_section">
      <!-- BEGIN PAGE HEADER-->
      <div class="row-fluid">
        <div class="span12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
          <!-- <h3 class="page-title">
            Teachers Recruit
            <small>Job Providers</small>
          </h3> -->
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>main/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span>Job Providers</span> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>main/job_provider_profile">Job Provider Profile</a>
              <span class="divider-last">&nbsp;</span>
            </li>
          </ul>
          <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
      </div>
      <!-- END PAGE HEADER-->
      <!-- BEGIN ADVANCED TABLE widget-->
      <div class="row-fluid">
        <div class="span12">
          <!-- BEGIN EXAMPLE TABLE widget-->
          <div class="widget">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i>Job Provider Profile 
              </h4>
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                <div class="clearfix add_section">
                </div> 
                <form action="job_provider_profile">
                  <p class="admin_status"> </p>
                  <div class="">
                    <table class="bordered table table-striped table-hover table-bordered admin_table" id="mple_editable_1">
                      <thead>
                        <tr class="ajaxTitle">
                          <th> Organization Registered Id </th>
                          <th> Organization Name </th>
                          <th> Registrant Name </th>
                          <th> Profile Completeness </th>
                          <!-- <th> Subcription Plan </th> -->
                          <th> Status </th>
                          <th> Created Date</th>
                          <!-- <th> Visitors Count </th> -->
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                            <th class="data_action">Edit</th>
                          <?php endif; ?>
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                            <th class="data_action">Delete</th>
                          <?php endif; ?>
                          <th class="data_action"> Full Details </th>
                        </tr>
                      </thead>
                      <tbody class="table_content_section">
                        <?php } ?>
                        <?php
                        if(!empty($provider_profile))  :
                        ?>  
                        <?php
                        foreach ($provider_profile as $pro_val) :
                        ?>                              
                        <tr class="parents_tr">
                          <td class="">
                            <?php echo $pro_val['organization_id']; ?>
                          </td> 
                          <td class="">
                            <?php
                            if(!empty($pro_val['organization_name'])) :
                              echo $pro_val['organization_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </td>
                          <td class="">
                            <?php
                              if(!empty($pro_val['registrant_name'])) :
                                echo $pro_val['registrant_name']; 
                              else :
                                echo "NULL";
                              endif;
                            ?>
                          </td>
                          <td class="">
                            <?php echo $pro_val['organization_profile_completeness']." %"; ?>      
                          </td>
                          <!-- <td class="">
                            <?php 
                            // if(!empty($pro_val['subscription_plan'])) :
                            //   echo $pro_val['subscription_plan'];
                            // else :
                            //   echo "Null";
                            // endif;
                            ?>   
                          </td> -->
                          <td class="">
                            <?php 
                            if($pro_val['organization_status']==1) :
                              echo "Active";
                            else :
                              echo "Inactive";
                            endif;
                            ?> 
                          </td>
                          <td class=""> 
                            <?php 
                              $created_datetime = explode(' ', $pro_val['organization_created_date']);
                              echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                            ?> 
                          </td> 
                          <!-- <td class="">
                          	<a class="job_edit popup_fields" data-id="<?php //echo $pro_val['organization_id']; ?>" data-href="job_provider_edit_profile" data-mode="edit" data-popup-open="show_visitorcount_detail">
                          		145
                          	</a>
                          </td> -->
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>                                     
                          <td class="edit_section">
                            <a class="job_edit popup_fields" data-id="<?php echo $pro_val['organization_id']; ?>" data-href="job_provider_edit_profile" data-mode="edit" data-popup-open="popup_section_profile">
                              Edit
                            </a>
                          </td>
                          <?php endif; ?>
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                          <td>
                            <a class="job_delete pop_delete_action" data-id="<?php echo $pro_val['organization_id']; ?>">
                              Delete
                            </a>
                          </td>
                          <?php endif; ?>
                          <td>
                            <a class="job_full_view popup_fields" data-id="<?php echo $pro_val['organization_id']; ?>" data-href="job_provider_edit_profile"  data-mode="full_view"  data-popup-open="popup_section_profile">
                              Full View
                            </a>
                          </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                        <?php 
                        endif;
                        ?>
                        <?php if(!$this->input->is_ajax_request()) { ?> 
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- END EXAMPLE TABLE widget-->    
        </div>                
      </div>            
      <!---Full View & Edit popup -->
      <div class="popup feedback-design" data-popup="popup_section_profile">
        <div class="popup-inner">
          <div class="widget box blue" id="popup_wizard_section">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> Job Providers Profile
              </h4>                        
            </div>
            <div class="widget-body form pop_details_section">
              <?php } ?>
              <form class="tab_form" action="job_provider_profile" data-index="" method="POST" data-mode="update">
                <?php
                if(!empty($provider_full_profile)) :
                ?>
                <div id="rootwizard" class="form-wizard job_pro_form">
                  <div class="navbar steps">
                    <div class="navbar-inner">
                      <div class="container">
                        <ul  id="pro_profile_tabs" class="span12 row-fluid nav nav-pills nav-design">
                          <li class="span-2">
                            <a href="#tab1" data-toggle="tab" class="step active">
                            	<span class="number">1</span>
                                <span class="desc desc_space"><i class="icon-ok"></i>Organization Details</span>
                            </a>
                          </li>
                          <li class="span-2">
                            <a href="#tab2" data-toggle="tab" class="step">
                            	<span class="number">2</span>
                                <span class="desc desc_space"><i class="icon-ok"></i>Registrant Details</span>
                            </a>
                          </li>
                          <?php
                          if(!empty($mode) && $mode=="full_view") :
                          ?>
                          <li class="span-2">
                            <a href="#tab3" data-toggle="tab" class="step">
                            	<span class="number">3</span>
                                <span class="desc desc_space"><i class="icon-ok"></i>Payment Details</span>
                            </a>
                          </li>
                          <!-- <li class="span-2">
                            <a href="#tab4" data-toggle="tab" class="step">
                            	<span class="number">4</span>
                              <span class="desc"><i class="icon-ok"></i>Addtional <br/> Details</span>
                            </a>
                          </li>
                          <li class="span-2">
                            <a href="#tab5" data-toggle="tab" class="step">
                              <span class="number">5</span>
                              <span class="desc"><i class="icon-ok"></i>Validity <br/> Details</span>
                            </a>
                          </li> -->
                          <?php
                          else :
                          ?>
                          <li class="span-2">
                            <a href="#tab3" data-toggle="tab" class="step">
                            	<span class="number">3</span>
                              <span class="desc desc_space"><i class="icon-ok"></i>Addtional Details</span>
                            </a>
                          </li>
                          <li class="span-2">
                            <a href="#tab4" data-toggle="tab" class="step">
                            	<span class="number">4</span>
                              <span class="desc desc_space"><i class="icon-ok"></i>Grace Period</span>
                            </a>
                          </li>
                          <!-- <li class="span-2">
                            <a href="#tab4" data-toggle="tab" class="step">
                              <span class="number">4</span>
                              <span class="desc"><i class="icon-ok"></i>Validity <br/> Details</span>
                            </a>
                          </li> -->
                          <?php
                          endif;
                          ?>
                          </ul>
                      </div>
                    </div>
                  </div>
                  <div id="bar" class="progress progress-striped active">
                    <div class="bar"></div>
                  </div>
                  <div class="tab-content tab_content_scroll">
                    <?php
                    if(!empty($mode) && $mode=="full_view") :
                    ?>
                    <input type="hidden" value="view" id="popup_mode" />
                    <div class="tab-pane" id="tab1">
                      <h4>Organization Details</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Name</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['organization_name'])) :
                              echo $provider_full_profile['organization_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Organization Logo</label>
                          <span class="dynamic_data"> 
                            <img src="<?php echo $provider_full_profile['organization_logo']; ?>" class="popup_preview" alt="Logo Not Found" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address1</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['organization_address_1'])) :
                              echo $provider_full_profile['organization_address_1']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Organization Address2</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['organization_address_2'])) :
                              echo $provider_full_profile['organization_address_2']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address3</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['organization_address_3'])) :
                              echo $provider_full_profile['organization_address_3']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">State Name</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['state_name'])) :
                              echo $provider_full_profile['state_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">District Name</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['district_name'])) :
                              echo $provider_full_profile['district_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>   
                        <div class="span6 control-group">  
                          <label class="control-label">Institution Type</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['institution_type_name'])) :
                              echo $provider_full_profile['institution_type_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Organization Status</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if($provider_full_profile['organization_status']==1) :
                              echo "Active";
                            else :
                              echo "Inactive";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                      <h4>Registrant Details</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant Name</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['registrant_name'])) :
                              echo $provider_full_profile['registrant_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?> 
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Register Type</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['registrant_register_type'])) :
                              echo $provider_full_profile['registrant_register_type']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Designation</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['registrant_designation'])) :
                              echo $provider_full_profile['registrant_designation']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Date Of Birth</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['registrant_date_of_birth'])) :
                              echo date("d/m/Y", strtotime($provider_full_profile['registrant_date_of_birth']));
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Email ID</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['registrant_email_id'])) :
                              echo $provider_full_profile['registrant_email_id']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Mobile No</label>
                          <span class="dynamic_data"> 
                            <?php 
                            if(!empty($provider_full_profile['registrant_mobile_no'])) :
                              echo $provider_full_profile['registrant_mobile_no']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <!-- <div class="span6 control-group">                                       
                          <label class="control-label"> Sms Verification</label>
                          <span class="dynamic_data"> 
                            <?php 
                            // if($provider_full_profile['is_sms_verified']==1) :
                            //   echo "Yes";
                            // else :
                            //   echo "No";
                            // endif;
                            ?>
                          </span>
                        </div> -->
                        <div class="span6 control-group">
                          <label class="control-label">Registrant Picture</label>
                          <span class="dynamic_data"> 
                            <img src="<?php echo $provider_full_profile['registrant_logo']; ?>" class="popup_preview" alt="Picture Not Found" />
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane profile_subscription_tab plan_details_scroll" id="tab3">
                      <h4>
                        Payment Details 
                        <?php
                        if(!empty($payment_details) && count($payment_details) > 1) :
                        ?>
                        <span class="arrow_section">
                          <a class="subscription_paginate popup_pag_prev"> 
                            <i class="icon-chevron-left"></i> 
                          </a> 
                          <a class="subscription_paginate">  
                            <i class="icon-chevron-right popup_pag_next"></i> 
                          </a> 
                        </span>
                        <?php
                        endif;
                        ?>
                      </h4>
                      <?php
                      if(!empty($payment_details)) :
                      ?>
                      <div class="subscription_organization_section">
                        <?php
                        foreach ($payment_details as $pay_key => $pay_val) :
                        ?>
                        <div class="span12 subscription_organization_inner_section">
                          <h4 class="center_align plan_name"> 
                            <a class="payment_wrapper"> 
                              <i class="icon-info-sign"></i> More Details 
                              <div class="payment_tooltip">
                                <label class="control-label">
                                <?php 
                                if($pay_val['is_email_validity']==1) : 
                                  echo "<i class='icon-ok'></i> <span> Email Valid </span> "; 
                                else :
                                  echo "<i class='icon-remove'></i> <span> Email Invalid </span>";
                                endif;
                                ?> </label>
                                <label class="control-label"> 
                                <?php 
                                if($pay_val['is_sms_validity']==1) : 
                                  echo "<i class='icon-ok'></i> <span> Sms Valid </span>"; 
                                else :
                                  echo "<i class='icon-remove'></i> <span> Sms Invalid </span>";
                                endif;
                                ?> </label>
                                <label class="control-label">
                                <?php 
                                if($pay_val['is_resume_validity']==1) : 
                                  echo "<i class='icon-ok'></i><span> Resume Valid </span>"; 
                                else :
                                  echo "<i class='icon-ok'></i><span> Resume Invalid </span>"; 
                                endif;
                                ?> </label>
                                <table>
                                  <thead> <th> Plan option </th> <th> Total </th> <th> Used </th> <th> Remaining </th>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td> Sms </td>
                                      <td> <?php echo $pay_val['organization_sms_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_sms_count']-$pay_val['organization_sms_remaining_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_sms_remaining_count']; ?> </td>
                                    </tr>
                                    <tr>
                                      <td> Resume </td>
                                      <td> <?php echo $pay_val['organization_resume_download_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_resume_download_count']-$pay_val['organization_remaining_resume_download_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_remaining_resume_download_count']; ?> </td>
                                    </tr>
                                    <tr>
                                      <td> Email </td>
                                      <td> <?php echo $pay_val['organization_email_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_email_count']-$pay_val['organization_email_remaining_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_email_remaining_count']; ?> </td>
                                    </tr>
                                    <tr>
                                      <td> Vacancy </td>
                                      <td> <?php echo $pay_val['organization_post_vacancy_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_post_vacancy_count']-$pay_val['organization_vacancy_remaining_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_vacancy_remaining_count']; ?> </td>
                                    </tr>
                                    <tr>
                                      <td> Ad </td>
                                      <td> <?php echo $pay_val['organization_post_ad_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_post_ad_count']-$pay_val['organization_ad_remaining_count']; ?> </td>
                                      <td> <?php echo $pay_val['organization_ad_remaining_count']; ?> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </a> <?php echo $pay_val['subscription_plan']; ?> </h4>
                          <div class="profile_plan_section">
                            <div class="span3 plan_label_section">  
                              <h4 class="">Summary</h4>
                              <label class=""> Subscription Price </label>
                              <label class=""> Subscription Start Date </label>
                              <label class=""> Subscription End Date </label>
                              <label class=""> Transaction Id </label>
                              <label class=""> Grace Period Start Date </label>
                              <label class=""> Grace Period End Date </label>
                              <label class=""> Subscription Created Date </label>
                              <label class=""> Subscription Status </label>
                            </div>
                            <div class="span3 plan_field_section">                                       
                              <h4 class="">Original Plan</h4>
                              <label class="">&#x20B9; <span> <?php echo $pay_val['subscription_price']; ?></span></label>
                              <label class=""> <?php echo date('d M Y',strtotime($pay_val['org_sub_validity_start_date'])); ?> 31-01-2017</label>
                              <label class=""> <?php echo date('d M Y',strtotime($pay_val['org_sub_validity_end_date'])); ?> 15-12-2017  </label>
                              <label class=""> <?php echo $pay_val['organization_transcation_id']; ?> </label>
                              <label class="show_grace"> 25.02.2017 </label>
                              <label class="show_grace"> 05.03.2017 </label>
                              <label class=""> <?php echo date('d-m-Y',strtotime($pay_val['organization_subscription_created_date'])); ?> </label> 
                              <?php
                              if($pay_val['organization_subscription_status'] == 1) :
                              ?>
                              <label class='subscription_status'> <span class='icon'> Active <span> </label>
                              <div class='inner-triangle'> </div> <span class='icon-ok triangle_notification'> </span>
                              <?php
                              else :
                              ?>
                              <label class='subscription_status'> <span class='icon icon_expired'> Inactive <span></label> 
                              <div class='inner-triangle triangle_disabled'> </div>
                              <?php
                              endif;
                              ?>                               
                            </div>
                            <?php
                            if(!empty($pay_val['upgrade_renewal']) && $pay_key) :
                            $upgrade = 0;
                            $renewal = 0;
                            $i=0;
                            $j=0;
                            // echo "<pre>";
                            // print_r($pay_val['upgrade_renewal']);
                            // echo "</pre>";
                            foreach ($pay_val['upgrade_renewal'] as $up_re_key => $up_re_val) :
                            ?>
                            <?php
                            if($up_re_val['is_renewal'] == 0) :
                            $i++;
                            ?>
                            <div class="upgrade_holder_content upgrade_section_profile plan_field_section">     
                              <h4 class="">Upgrade Plan</h4>
                              <label class=""> &#8377  </label>
                              <label class=""> <?php echo date('d M Y',strtotime($up_re_val['validity_start_date'])); ?> </label>
                              <label class=""> <?php echo date('d M Y',strtotime($up_re_val['validity_end_date'])); ?> </label>
                              <label class=""> <?php echo $up_re_val['transaction_id']; ?> </label>
                              <label class=""> <?php echo date('d-m-Y',strtotime($up_re_val['created_date'])); ?> </label>
                              <?php
                              if($up_re_val['status'] == 1) :
                              ?>
                              <label class='subscription_status'> <span class='icon'> Active <span> </label>
                              <div class='inner-triangle'> </div> <span class='icon-ok triangle_notification'> </span>
                              <?php
                              else :
                              ?>
                              <label class='subscription_status'> <span class='icon icon_expired'> Inactive <span></label> 
                              <div class='inner-triangle triangle_disabled'> </div>
                              <?php
                              endif;
                              ?>
                            </div>
                            <?php
                            if($i > 1) :
                            ?>  
                            <div class="upgrade_holder_content navigation_options">
                              <span class="arrow_section">
                                <a class="subscription_paginate upgrade_pag_prev"> 
                                  <i class="icon-chevron-left"></i> 
                                </a> 
                                <a class="subscription_paginate upgrade_pag_next">  
                                  <i class="icon-chevron-right"></i> 
                                </a> 
                              </span>
                            </div>
                            <?php
                            endif;
                            ?> 
                            <?php
                            $upgrade++;
                            else :
                            $j++;
                            ?>                  
                            <div class="renewal_holder_content renewal_section_profile plan_field_section">     
                              <h4 class="">Renewal Plan</h4>
                              <label class=""> &#8377  </label>
                              <label class=""> <?php echo date('d M Y',strtotime($up_re_val['validity_start_date'])); ?> </label>
                              <label class=""> <?php echo date('d M Y',strtotime($up_re_val['validity_end_date'])); ?> </label>
                              <label class=""> <?php echo $up_re_val['transaction_id']; ?> </label>
                              <label class=""> <?php echo date('d-m-Y',strtotime($up_re_val['created_date'])); ?> </label>
                              <?php
                              if($up_re_val['status'] == 1) :
                              ?>
                              <label class='subscription_status'> <span class='icon'> Active <span> </label>
                              <div class='inner-triangle'> </div> <span class='icon-ok triangle_notification'> </span>
                              <?php
                              else :
                              ?>
                              <label class='subscription_status'> <span class='icon icon_expired'> Inactive <span></label> 
                              <div class='inner-triangle triangle_disabled'> </div>
                              <?php
                              endif;
                              ?>
                            </div>
                            <?php
                            if($j > 1) :
                            ?>  
                            <div class="renewal_holder_content navigation_options">
                              <span class="arrow_section">
                                <a class="subscription_paginate renew_pag_prev"> 
                                  <i class="icon-chevron-left"></i> 
                                </a> 
                                <a class="subscription_paginate">  
                                  <i class="icon-chevron-right renew_pag_next"></i> 
                                </a> 
                              </span>
                            </div>
                            <?php
                            endif;
                            ?>
                            <?php
                            $renewal++;
                            endif;
                            endforeach;
                            ?>
                            <?php
                            if($renewal == 0):
                            ?>
                            <div class="span3 plan_field_section">     
                              <h4 class=""> Renewal Plan </h4>  
                              <label class="subscription_status"> <span class='icon icon_not_activate'> Not Renewal <span> </label>
                              <div class="inner-triangle triangle_disabled"></div>                        
                            </div>
                            <?php
                            elseif($upgrade == 0):
                            ?>
                            <div class="span3 plan_field_section">     
                              <h4 class="">Upgrade Plan</h4>
                              <label class="subscription_status"> <span class='icon icon_not_activate'> Not Upgrade <span> </label>
                              <div class="inner-triangle triangle_disabled"></div>                    
                            </div>
                            <?php
                            endif;
                            ?>
                            <?php
                            else :
                            ?>
                            <div class="span3 plan_field_section">     
                              <h4 class="">Upgrade Plan</h4>
                              <label class="subscription_status"> <span class='icon icon_not_activate'> Not Upgrade <span> </label>
                              <div class="inner-triangle triangle_disabled"></div>                    
                            </div>
                            <div class="span3 plan_field_section">     
                              <h4 class=""> Renewal Plan </h4>  
                              <label class="subscription_status"> <span class='icon icon_not_activate'> Not Renewal <span> </label>
                              <div class="inner-triangle triangle_disabled"></div>                        
                            </div>
                            <?php
                            endif;
                            ?>
                          </div>
                        </div>
                        <?php
                        endforeach;
                        ?>
                      </div>
                      <?php
                      else :
                      ?>
                      <div class="empty_subscription_section">
                        <p> This Organization has <span> no subscription </span> plans. </p>
                      </div>
                      <?php
                      endif;
                      ?>
                    </div>
                    <?php
                    else :
                    ?>
                    <input type="hidden" value="edit" id="popup_mode" />
                    <p class="val_error"> </p>
                    <div class="tab-pane" id="tab1">
                      <h4>Organization Details</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Name</label>
                          <span>
                            <input type="text" class="span6 tabfield1 tabfield" value="<?php echo $provider_full_profile['organization_name']; ?>" name="organization_name" placeholder="Organization Name" maxlength="50" />
                          </span>
                        </div>
                        <div class="span6 control-group">
                          <label class="control-label">Organization Logo</label>
                          <span>
                            <a class="btn upload_option"> Upload </a>
                            <input class="form-control hidden_upload tabfield1 tabfield" name="organization_logo" type="file">
                            <img src="<?php echo $provider_full_profile['organization_logo']; ?>" class="popup_preview" alt="Not Loaded">
                            <input type="hidden" value="<?php echo $provider_full_profile['organization_logo']; ?>" class="tabfield1 tabfield" name="old_file_path" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">
                          <label class="control-label">Institution Type</label>
                          <span>
                            <select name="institution_type" class="tabfield1 tabfield">
                              <option value=""> Please select institution type </option>
                              <?php
                              if(!empty($instution_values)) :
                              foreach ($instution_values as $ins_val) :
                              ?>
                              <?php
                                if($ins_val['institution_type_id']==$provider_full_profile['organization_institution_type_id']) {
                                  echo '<option value='.$ins_val["institution_type_id"].' selected> '.$ins_val["institution_type_name"].' </option>';
                                }
                                else if($ins_val['institution_type_status']==1){
                                  echo '<option value='.$ins_val["institution_type_id"].'> '.$ins_val["institution_type_name"].' </option>';
                                }
                              endforeach;
                              else :
                                echo '<option value='.$provider_full_profile['institution_type_id'].' selected> "'.$provider_full_profile['institution_type_name'].'" </option>';
                              endif;
                              ?>
                            </select> 
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Status</label>
                          <span>
                            <select name="organization_status" class="tabfield1 tabfield">
                              <option value=""> Please select status </option>
                              <option value="1" <?php if($provider_full_profile['organization_status']==1) echo "selected"; ?>> Active </option>
                              <option value="0" <?php if($provider_full_profile['organization_status']==0) echo "selected"; ?>> Inactive </option>
                            </select>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                      <h4>Organization Address</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address1</label>
                          <span>
                            <input type="text" class="span6 tabfield2 tabfield" value="<?php echo $provider_full_profile['organization_address_1']; ?>" name="org_addr_1" maxlength="150" placeholder="Organization Address" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address2</label>
                          <span>
                            <input type="text" class="span6 tabfield2 tabfield" value="<?php echo $provider_full_profile['organization_address_2']; ?>" name="org_addr_2" maxlength="150" placeholder="Organization Address" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Organization Address3</label>
                          <span>
                            <input type="text" class="span6 tabfield2 tabfield" value="<?php echo $provider_full_profile['organization_address_3']; ?>" name="org_addr_3" maxlength="150" placeholder="Organization Address" />
                          </span>
                        </div>
                        <div class="span6 control-group state_section">    
                          <label class="control-label">Organization State</label>
                          <span>
                            <select class="tabfield2 tabfield state_act" name="organization_state">
                              <option value=""> Please select State </option>
                              <?php
                              if(!empty($state_values)) :
                              foreach ($state_values as $st_val) :
                              ?>
                              <?php
                                if($st_val['state_id']==$provider_full_profile['organization_state_id']) {
                                  echo '<option value='.$st_val["state_id"].' selected> '.$st_val["state_name"].' </option>';
                                }
                                else if($st_val['state_status']==1){
                                  echo '<option value='.$st_val["state_id"].'> '.$st_val["state_name"].' </option>';
                                }
                              endforeach;
                                else :
                                  echo '<option value='.$provider_full_profile['organization_state_id'].' selected> "'.$provider_full_profile['state_name'].'" </option>';
                              endif;
                              ?>
                            </select>
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group district_section">  
                          <label class="control-label">Organization District</label>
                          <span>
                            <select class="tabfield2 tabfield" name="organization_district">
                              <option value=""> Please select district </option>
                              <?php
                              if(!empty($district_values)) :
                              foreach ($district_values as $dis_val) :
                              ?>
                              <?php
                                if($dis_val['district_id']==$provider_full_profile['organization_district_id']) {
                                  echo '<option value='.$dis_val["district_id"].' selected> '.$dis_val["district_name"].' </option>';
                                }
                                else if($dis_val['district_status']==1){
                                  echo '<option value='.$dis_val["district_id"].'> '.$dis_val["district_name"].' </option>';
                                }
                              endforeach;
                                else :
                                  echo '<option value='.$provider_full_profile['organization_district_id'].' selected> "'.$provider_full_profile['district_name'].'" </option>';
                              endif;
                              ?>
                            </select>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tab3">
                      <h4>Registrant Details</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant Name</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield alpha_value" value="<?php echo $provider_full_profile['registrant_name']; ?>" placeholder="Registrant Name" name="registrant_name" maxlength="50" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant Designation</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $provider_full_profile['registrant_designation']; ?>" name="registrant_designation" placeholder="Registrant Designation" maxlength="50" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant DOB</label>
                          <span>
                            <?php
                            if(!empty($provider_full_profile['registrant_date_of_birth'])) :
                            ?>
                            <input type="text" class="span6 m-ctrl-medium admin_date_picker tabfield3 tabfield" value="<?php echo date("d/m/Y", strtotime($provider_full_profile['registrant_date_of_birth'])); ?>" name="registrant_dob" placeholder="Registrant DOB" />
                            <?php
                            else :
                            ?>
                            <input type="text" placeholder="Registrant DOB" class="span6 m-ctrl-medium admin_date_picker tabfield3 tabfield" value="" name="registrant_dob" />
                            <?php
                            endif;
                            ?>
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant Email</label>
                          <span>
                            <input type="text" class="span6 tabfield3 tabfield" value="<?php echo $provider_full_profile['registrant_email_id']; ?>" name="registrant_email" placeholder="Registrant Email" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Registrant Mobile</label>
                          <span>
                            <?php
                            if(!empty($provider_full_profile['registrant_mobile_no']) && $provider_full_profile['registrant_mobile_no'] != 0) :
                            ?>
                            <input type="text" class="span6 tabfield3 tabfield numeric_value" value="<?php echo $provider_full_profile['registrant_mobile_no']; ?>" placeholder="Registrant Mobile" name="registrant_mobile" maxlength="10" />
                            <?php
                            else :
                            ?>
                            <input type="text" class="span6 tabfield3 tabfield numeric_value" value="" placeholder="Registrant Mobile" name="registrant_mobile" maxlength="10" />
                            <?php
                            endif;
                            ?>
                          </span>
                        </div>
                        <!-- <div class="span6 control-group">                                       
                          <label class="control-label">SMS Verification</label>
                          <span>
                            <ul class="on_off_button on_off_button_j">
                              <li data-value="1" <?php 
                              //if($provider_full_profile['is_sms_verified']==1) //echo "class='on'"; ?>><a>Yes</a></li>
                              <li data-value="0" <?php 
                              //if($provider_full_profile['is_sms_verified']==0) //echo "class='on'"; ?>><a>No</a></li>
                            </ul> 
                            <input type="hidden" value="<?php 
                            //echo $provider_full_profile['is_sms_verified']; ?>" class="verification tabfield3 tabfield" name="sms_verify" />
                          </span>
                        </div> -->
                      </div>
                    </div>
                    <div class="tab-pane" id="tab4">
                    	<h4>Grace Period</h4>
                       	<p class="span12 control-group">                                       
                        	<span class="info_color">Note :</span>
                         	Extending grace time is applicable only for the Latest Plan/Current Plan that customer availed. 
                      	</p>
                      	<div class="span12">
                        	<div class="span6 control-group">                                       
                          		<label class="control-label">Plan Name</label>
                          		<span>
                            	 <label class="show_plan_name icon"> <?php echo $latest_plan_details['subscription_plan']; ?> </label>	
                          		</span>
                        	</div>
                        	<div class="span6 control-group">
	                      		<label>Plan Current Status</label>
                            <?php if(empty($latest_plan_details['is_renewal']))
                                $sub_status = $latest_plan_details['organization_subscription_status'];
                              else
                                $sub_status = $latest_plan_details['status'];
                              if($sub_status==1) :
                                echo "<span class='icon'> Active </span>";
                              else :
                                echo "<span class='icon icon_expired'> Inactive </span>";
                              endif;
                            ?> 
		                    </div>
                        </div>	
                        <div class="span12">
                        	<div class="span6 control-group">  
                            <label class="control-label">Subscription Start Date</label>
	                          <span class="dynamic_data"> 
                              <?php 
                              if(empty($latest_plan_details['is_renewal'])):
                                if($latest_plan_details['is_grace_period_available']==0)
                                  echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['org_sub_validity_start_date'])[0]));
                                else
                                  echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['grace_period_start_date'])[0]));
                              else:
                                if($latest_plan_details['renewal_is_grace_period_available']==0)
                                  echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['validity_start_date'])[0]));
                                else
                                  echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['renewal_grace_period_start_date'])[0]));
                              endif;
                              ?> 
                          		</span>
	                        </div>
                            <div class="span6 control-group">  
                              <label class="control-label">Subscription End Date</label>
                      		    <span class="dynamic_data"> 
                           			<?php 
                              if(empty($latest_plan_details['is_renewal'])):
                                if($latest_plan_details['is_grace_period_available']==0)
                                  echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['org_sub_validity_end_date'])[0]));
                                else
                                  echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['grace_period_end_date'])[0]));
                              else:
                                if($latest_plan_details['renewal_is_grace_period_available']==0)
                                  echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['validity_end_date'])[0]));
                                else
                                  echo date("d/m/Y", strtotime(explode(' ', $latest_plan_details['renewal_grace_period_end_date'])[0]));
                              endif;
                              ?> 
                          		</span>
                          	</div>
                       	</div>
                       	<div class="span12">
                      		<div class="control-group check_grace">
                      			<input type="checkbox" class="control-group apply_grace_period" <?php if(empty($latest_plan_details['is_renewal']) && $latest_plan_details['organization_subscription_status'] == 1){ ?> disabled title="cannot assign grace period when provider is active" <?php } ?>>Apply Grace period for this provider latest/current plan 
                            <input type="hidden" class="grace_period_days" name="grace_period_days" value="10">
                      		</div>
                      	</div>
                      	<div class="span12 show_grace_period hide_all">
                        	<div class="span6 control-group">                                       
                          		<label class="control-label">Grace Period Start Date</label>
                          		<span>
                                5.04.2017
	                            	<!-- <input type="text" class="span6 m-ctrl-medium admin_date_picker tabfield3 tabfield" value="" name="" placeholder="Plan Start Date" maxlength="50" /> -->
	                          	</span>
                        	</div>
                        	<div class="span6 control-group">
                          		<label class="control-label">Grace Period End Date</label>
                          		<span>
                                5.04.2017
                            		<!-- <input type="text" class="span6 m-ctrl-medium admin_date_picker tabfield3 tabfield" value="" name="" placeholder="Plan End Date" /> -->
                          		</span>	
                        	</div>
                      	</div>
                    </div>
                    <!-- <div class="tab-pane" id="tab4">
                      <h4>Validity Details</h4>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Email Validity</label>
                          <span>
                            <ul class="on_off_button on_off_button_j">
                              <li data-value="1" <?php 
                              // if($provider_full_profile['is_email_validity']==1) echo "class='on'"; ?>><a>Yes</a></li>
                              <li data-value="0" <?php 
                              // if($provider_full_profile['is_email_validity']==0) echo "class='on'"; ?>><a>No</a></li>
                            </ul> 
                            <input type="hidden" value="<?php 
                            // echo $provider_full_profile['is_email_validity']; ?>" class="verification tabfield4 tabfield" name="email_valid" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">SMS Validity</label>
                          <span>
                            <ul class="on_off_button on_off_button_j">
                              <li data-value="1" <?php 
                              // if($provider_full_profile['is_sms_validity']==1) echo "class='on'"; ?>><a>Yes</a></li>
                              <li data-value="0" <?php 
                              // if($provider_full_profile['is_sms_validity']==0) echo "class='on'"; ?>><a>No</a></li>
                            </ul> 
                            <input type="hidden" value="<?php 
                            // echo $provider_full_profile['is_sms_validity']; ?>" class="verification tabfield4 tabfield" name="sms_valid" />
                          </span>
                        </div>
                      </div>
                      <div class="span12">
                        <div class="span6 control-group">                                       
                          <label class="control-label">Resume Validity</label>
                          <span>
                            <ul class="on_off_button on_off_button_j">
                              <li data-value="1" <?php 
                              // if($provider_full_profile['is_resume_validity']==1) echo "class='on'"; ?>><a>Yes</a></li>
                              <li data-value="0" <?php 
                              // if($provider_full_profile['is_resume_validity']==0) echo "class='on'"; ?>><a>No</a></li>
                            </ul> 
                            <input type="hidden" value="<?php 
                            // echo $provider_full_profile['is_resume_validity']; ?>" class="verification tabfield4 tabfield" name="resume_valid" />
                          </span>
                        </div>
                        <div class="span6 control-group">                                       
                          <label class="control-label">Subscription Status</label>
                          <span>
                            <select name="subscription_status" class="tabfield4 tabfield">
                              <option value=""> Please select status </option>
                              <option value="1" <?php 
                              // if($provider_full_profile['organization_subscription_status']==1) echo "selected"; ?>> Active </option>
                              <option value="0" <?php 
                              // if($provider_full_profile['organization_subscription_status']==0) echo "selected"; ?>> Inactive </option>
                            </select>
                          </span>
                        </div>
                      </div>
                    </div> -->
                    <?php
                    endif;
                    ?>
                    <ul class="pager wizard">
                      <li class="previous"><a href="#"><i class="icon-angle-left"></i>Previous</a></li>
                      <li class="next"><a href="#">Next<i class="icon-angle-right"></i></a></li>
                      <li class="finish disabled"><button type="submit">Finish<i class="icon-ok"></i></button></li>
                    </ul>
                    <div class="clearfix"> </div>
                  </div>  
                </
                div>
                <input type="hidden" class="hidden_id" value="<?php echo $provider_full_profile['org_id']; ?>" />
                <?php
                endif;
                ?>
              </form>
              <?php if(!$this->input->is_ajax_request()) { ?>
            </div>
          </div>
        	<p>
            <a data-popup-close="popup_section_profile" href="#">Close</a>
          </p>
          <a class="popup-close" data-popup-close="popup_section_profile" href="#">x</a>
        </div>
      </div> <!--end full and Edit-->
      
      
       <!---Visitors Count-->
      <div class="popup feedback-design" data-popup="show_visitorcount_detail">
        <div class="popup-inner">
          <div class="widget box blue" id="popup_wizard_section">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> Visitors Count
              </h4>                        
            </div>
            <div class="widget-body">
            	<table class="bordered table table-striped table-hover table-bordered">
                      <thead>
                        <tr class="">
                          <th> Organization Visitor Count Id </th>
                          <th> Organization Id </th>
                          <th> Candidate Id </th>
                          <th>IP Address </th>
                          <th>User Agent </th>
                          <th>Count </th>
                          <th>User Type </th>
                          <th>Created Date </th>
                        </tr>  
                      </thead>
                      <tbody>
                      	<tr>
                      		<td>1</td>
                      		<td>12234</td>
                      		<td>25</td>
                      		<td>10.0.0.0</td>
                      		<td>1</td>
                      		<td>45</td>
                      		<td>Registered</td>
                      		<td>18.02.2017</td>
                      		
                      	</tr>
                      	<tr>
                      		<td>12</td>
                      		<td>12234</td>
                      		<td>20</td>
                      		<td>10.0.12.200</td>
                      		<td>1</td>
                      		<td>14</td>
                      		<td>Guest</td>
                      		<td>18.02.2017</td>
                      		
                      	</tr><tr>
                      		<td>13</td>
                      		<td>12234</td>
                      		<td>18</td>
                      		<td>10.0.0.100</td>
                      		<td>1</td>
                      		<td>55</td>
                      		<td>Registered</td>
                      		<td>18.02.2017</td>
                      		
                      	</tr><tr>
                      		<td>233</td>
                      		<td>12234</td>
                      		<td>04</td>
                      		<td>10.0.0.220</td>
                      		<td>1</td>
                      		<td>145</td>
                      		<td>Registered</td>
                      		<td>18.02.2017</td>
                      		
                      	</tr>
                      </tbody> 
                 </table>        
            </div><!--widget-body-->
          </div>
          <p>
            <a data-popup-close="show_visitorcount_detail" href="#">Close</a>
          </p>
          <a class="popup-close" data-popup-close="show_visitorcount_detail" href="#">x</a>
        </div>
      </div>
          	
    </div>
   </div> 
    <!-- END PAGE CONTAINER-->
  </div>
  <!-- END PAGE -->
</div>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>

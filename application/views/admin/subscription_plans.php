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
    <div class="sidebar-toggler hidden-phone"></div>
    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
    <div class="navbar-inverse">
      <form class="navbar-search visible-phone">
        <input type="text" class="search-query" placeholder="Search" />
      </form>
    </div>
    <!-- END RESPONSIVE QUICK SEARCH FORM -->
    <!-- BEGIN SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
  </div>
  <!-- END SIDEBAR -->
  <!-- BEGIN PAGE -->
  <div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid sub_pre_section">
      <!-- BEGIN PAGE HEADER-->
      <div class="row-fluid">
        <div class="span12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
          <!-- <h3 class="page-title">
            Teachers Recruit
            <small>Plan Setting</small>
          </h3> -->
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>main/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span> Plan Settings </span>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>main/subscription_plans">
                Subscription Plan
              </a>
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
                <i class="icon-reorder"></i> Subscription Plan
              </h4>
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                <div class="clearfix add_section">
                  <div class="btn-group">
                    <button id="sample_editable_1_new" data-open="popup_section_subs" class="btn green add_option" data-action="save">
                      Add New <i class="icon-plus"></i>
                    </button>
                  </div>
                </div>
                <form action="subscription_plans">
                <p class="admin_status"> </p>
                  <div>
                    <table class="bordered table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                    <thead>
                      <tr class="ajaxTitle">
                        <th>Plan</th>
                        <th>Price</th>
                        <th>Features</th>
                        <th>Validity Days</th>
                        <!-- <th>Validity End Date</th> -->
                        <!-- <th>Max Vacancy Posts</th>
                        <th>Max Sms</th>
                        <th>Max Email</th>
                        <th>Max Resume Download</th>
                        <th>Max Ad Posts</th>
                        <th>Max Days Ad visible</th> -->
                        <th>Status</th>
                        <th>Created Date</th>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                            <th class="data_action">Edit</th>
                        <?php endif; ?>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                            <th class="data_action">Delete</th>
                        <?php endif; ?>                                 
                      </tr>
                    </thead>
                    <tbody class="table_content_section">
                    <?php } ?>
                    <?php
                      if(!empty($subscription_plans)):
                      foreach ($subscription_plans as $sub) :
                    ?>                              
                      <tr class="parents_tr" id="column">
                        <td> 
                        <?php echo $sub['subscription_plan']; ?>
                        </td>
                        <td> 
                          <?php echo $sub['subscription_price']; ?>
                        </td>
                        <td> 
                          <?php echo $sub['subscription_features']; ?>
                        </td>
                        <td> 
                          <?php //echo date("d/m/Y", strtotime($sub['subcription_valid_start_date'])); ?>
                        </td>
                        <!-- <td> 
                          <?php echo date("d/m/Y", strtotime($sub['subcription_valid_end_date'])); ?>
                        </td> -->
                        <td> 
                          <?php 
                            if ($sub['subscription_status'] == 1) 
                              echo "Active";
                            else
                              echo "Inactive";
                            ?>
                        </td>
                        <td> 
                          <?php 
                          $created_datetime = explode(' ', $sub['subscription_created_date']);
                          echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; ?>
                        </td>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                        <td class="edit_section">
                          <a class="edit_option popup_fields" data-id="<?php echo $sub['subscription_id']; ?>" data-popup-open="popup_section_subs" data-href="subscription_plans_ajax" data-mode="edit" data-popup-open="popup_section_subs" data-action="update">
                            Edit
                          </a>
                        </td>
                        <?php endif; ?>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                        <td>
                          <a class="pop_delete_action" data-mode="delete" data-id="<?php echo $sub['subscription_id']; ?>">
                            Delete
                          </a>
                        </td>
                        <?php endif; ?>
                      </tr>
                      <?php
                        endforeach;
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


  <!---Add and edit popup -->
    <div class="popup" data-popup="popup_section_subs">
      <div class="popup-inner">       
        <div class="widget box blue" id="popup_wizard_section">
          <div class="widget-title">
            <h4>
              <i class="icon-reorder"></i> Subscription Plan
            </h4>                        
          </div>
          <div class="widget-body form">
            <form action="subscription_plans" class="form-horizontal popup_form admin_form" data-mode="">
            <p class="admin_status"> </p>
              <fieldset>
                <legend> Subscription plan details:</legend>
                <div class="form-wizard pop_details_section">
                <?php } ?>
                <?php
                if(!empty(isset($subscription_plan_details)) || !$this->input->is_ajax_request()) :
                ?>
                  <div class="tab-content">
                    <div class="col12">
                      <div class="col6 control-group">  
                        <label class="control-label">Subscription Plan</label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control" maxlength="50" placeholder="Subscription Plan" name="sub_plan" value="<?php if(isset($subscription_plan_details)) echo $subscription_plan_details['subscription_plan']; ?>"/> 
                        </span>
                      </div>
                      <div class="col6 control-group">
                        <label class="control-label">Subscription Price</label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control decimal_act" maxlength="9" placeholder="Subscription Price" name="sub_price" value="<?php if(isset($subscription_plan_details)) echo $subscription_plan_details['subscription_price']; ?>"/> 
                        </span>
                      </div>
                    </div>
                    <div class="col12">
                      <div class="col6 control-group">  
                        <label class="control-label">Validitity Days</label>
                        <span class="dynamic_data"> 
                           <input class="numeric_value" placeholder="Days of Validity" size="16" type="text" name="validity_days" value="<?php if(isset($subscription_plan_details)) //echo date("d/m/Y", strtotime($subscription_plan_details['subcription_valid_start_date'])) ; ?>"/>
                        </span>
                      </div>
                      <!-- <div class="col6 control-group">  
                        <label class="control-label">Validitity Start</label>
                        <span class="dynamic_data date_picker_act"> 
                           <input type="text" class="form-control" placeholder="Subscription Validitity" />
                           <input class=" m-ctrl-medium admin_date_picker dp_width" placeholder="Validitity Start Date" size="16" type="text" name="sub_start_validity" value="<?php if(isset($subscription_plan_details)) echo date("d/m/Y", strtotime($subscription_plan_details['subcription_valid_start_date'])) ; ?>"/>
                        </span>
                      </div> -->
                      <!-- <div class="col6 control-group">  
                        <label class="control-label">Validitity End</label>
                        <span class="dynamic_data date_picker_act"> 
                           <input type="text" class="form-control" placeholder="Subscription Validitity" /> 
                           <input class=" m-ctrl-medium admin_date_picker dp_width" placeholder="Validitity End Date" size="16" type="text" name="sub_end_validity" value="<?php if(isset($subscription_plan_details)) echo date("d/m/Y", strtotime($subscription_plan_details['subcription_valid_end_date'])); ?>"/>
                        </span>
                      </div> --> 
                      <div class="col6 control-group">
                        <label class="control-label">Maximum Posts Count</label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control numeric_act" maxlength="5" placeholder="Maximum Posts Count" name="sub_max_vacancy" value="<?php if(isset($subscription_plan_details)) echo $subscription_plan_details['subscription_max_no_of_posts']; ?>"/> 
                        </span>
                      </div>
                      <div class="col6 control-group">  
                        <label class="control-label">Maximum SMS Count</label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control numeric_act" maxlength="5" placeholder="Maximum SMS Count" name="sub_max_sms" value="<?php if(isset($subscription_plan_details)) echo $subscription_plan_details['subcription_sms_counts']; ?>"/> 
                        </span>
                      </div>
                      <div class="col6 control-group">
                        <label class="control-label"> Maximum Email Count </label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control numeric_act" maxlength="5" placeholder="Maximum Email Count" name="sub_max_email" value="<?php if(isset($subscription_plan_details)) echo $subscription_plan_details['subscription_email_counts']; ?>"/> 
                        </span>
                      </div>
                      <div class="col6 control-group">
                        <label class="control-label"> Maximum Resume Count </label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control numeric_act" maxlength="5" placeholder="Maximum Resume Count" name="sub_max_resume" value="<?php if(isset($subscription_plan_details)) echo $subscription_plan_details['subcription_resume_download_count']; ?>"/> 
                        </span>
                      </div>
                      <div class="col6 control-group">
                        <label class="control-label"> Maximum Ads </label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control numeric_act" maxlength="5" placeholder="Maximum Ads" name="sub_max_ads" value="<?php if(isset($subscription_plan_details)) echo $subscription_plan_details['subscription_max_no_of_ads']; ?>"/> 
                        </span>
                      </div>
                      <div class="col6 control-group">
                        <label class="control-label"> Max Days Ad visisble </label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control numeric_act" maxlength="15" placeholder="Max Days Ad visisble" name="sub_max_days_ad_visible" value="<?php if(isset($subscription_plan_details)) echo $subscription_plan_details['subscription_max_days_ad_visible']; ?>"/> 
                        </span>
                      </div>
                      <div class="col6 control-group">
                        <label class="control-label">Subscription Status</label>
                        <span class="dynamic_data"> 
                          <select name="sub_status">
                            <option value=""> Please select status </option>
                                <option value="1" <?php if(isset($subscription_plan_details))  if($subscription_plan_details['subscription_status']==1) echo "selected"; ?>> Active </option>
                                <option value="0" <?php if(isset($subscription_plan_details))  if($subscription_plan_details['subscription_status']==0) echo "selected"; ?>> Inactive </option>
                          </select>
                        </span>
                      </div>
                      <div class="col6 control-group">  
                        <label class="control-label"> Subscription Features </label>
                        <span class="dynamic_data"> 
                          <textarea class="textarea" placeholder="Subscription Features" maxlength="150" name="sub_features"><?php if(isset($subscription_plan_details)) echo $subscription_plan_details['subscription_features']; ?></textarea>
                        </span>
                      </div>
                  </div>
                  <input type="hidden" name="rid" value="<?php if(isset($subscription_plan_details)) echo $subscription_plan_details['subscription_id']; ?>"/>
                </div>
                <button type="submit" class="btn btn-info save_button">Save</button>
                <?php
                  endif;
                  ?>
                  <?php if(!$this->input->is_ajax_request()) { ?>
                </div>
              </fieldset>
            </form>
          </div>  
        </div>                
      <p>
        <a data-open="popup_section_subs" class="close_trig" href="#">Close</a>
      </p>
      <a class="popup-close close_trig" data-open="popup_section_subs"href="#">x</a>
    </div>
  </div> 
 </div>
      <!-- END ADVANCED TABLE widget-->

      <!-- END PAGE CONTENT-->
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

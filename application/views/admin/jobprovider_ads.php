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
  </div>
  <!-- END SIDEBAR -->
  <!-- BEGIN PAGE -->
  <div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid sub_pre_section">
      <!-- BEGIN PAGE HEADER-->
      <div class="row-fluid">
        <div class="span12">   
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
              <a href="<?php echo base_url(); ?>main/jobprovider_ads">
                Job Provider Ads
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
                <i class="icon-reorder"></i>Job Provider Ads
              </h4>
              
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                  <div class="clearfix add_section">
                </div>
                <form action="jobprovider_ads">
                  <p class="admin_status"> </p>
                  <div class="">
                    <table class="table table-striped table-hover table-bordered admin_table ads_table" id="sample_editable_1">
                      <thead>
                        <tr class="ajaxTitle">
                          <th>Premium Ads Name</th>
                          <th class="not-sort">Ads Image</th>
                          <th>Organization Name</th>
                          <th>Ads Visible Days</th>
                          <th class="not-sort">Admin Verified </th>
                          <th>Ads Status</th>
                          <th>Ads Created Date</th>
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
                        if(!empty($provider_ads))  :
                        ?>
                        <?php
                        foreach ($provider_ads as $ads_val) :
                        ?>
                        <tr class="parents_tr" id="column">
                          <td> 
                            <?php 
                            if(!empty($ads_val['premium_ads_name'])) :
                              echo $ads_val['premium_ads_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </td>
                          <td class="magnify-posted-ads"> 
                            <a class="magnify-ad text-center"> <img class="popup_preview" src="<?php echo base_url()."uploads/jobprovider/premiumad/".$ads_val['ads_image_path']; ?>" alt="Not Found" /></a>
                          	 <!-- <span class="pull-right">Full View </span> -->
                           </td>
                          <td>
                            <?php 
                            if(!empty($ads_val['organization_name'])) :
                              echo $ads_val['organization_name']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </td>
                          <td>
                            <?php 
                            if(!empty($ads_val['ad_visible_days'])) :
                              echo $ads_val['ad_visible_days']; 
                            else :
                              echo "NULL";
                            endif;
                            ?>
                          </td>
                          <td class="center_align"> 
                            <?php 
                            if ($ads_val['is_admin_verified'] == 1) 
                              echo "<span class='icon-ok'> </span> <p class='hidden_values'> Yes </p>";
                            else
                              echo "<span class='icon-remove'> </span> <p class='hidden_values'> No </p>";
                            ?>   
                          </td>
                          <td class=""> 
                            <?php 
                            if ($ads_val['premium_ads_status'] == 1) 
                              echo "Active";
                            else
                              echo "Inactive";
                            ?>
                          </td>
                          <td class="created_date">
                            <?php 
                              $created_datetime = explode(' ', $ads_val['premium_ads_created_date']);
                              echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                            ?>
                          </td>
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                          <td class="edit_section">
                            <a class="job_edit popup_fields" data-id="<?php echo $ads_val['premium_ads_id']; ?>" data-href="job_provider_edit_ads" data-mode="edit" data-popup-open="popup_edit_section">
                              Edit
                            </a>
                          </td>
                          <?php endif; ?>
                          <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                          <td>
                            <a class="pop_delete_action" data-mode="delete" data-id="<?php echo $ads_val['premium_ads_id']; ?>">
                              Delete
                            </a>
                          </td>
                          <?php endif; ?>
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
        <div class="popup" data-popup="popup_edit_section">
          <div class="popup-inner">       
            <div class="widget box blue" id="popup_wizard_section">
              <div class="widget-title">
                <h4>
                  <i class="icon-reorder"></i> Job Provider Ads
                </h4>                        
              </div>
              <div class="widget-body form">
                <form action="jobprovider_ads" method="POST" class="form-horizontal admin_form" data-mode="update">
                  <p class="admin_status"> </p>
                  <fieldset>
                    <legend> Ads Details:</legend>
                    <div class="form-wizard pop_details_section">
                      <?php } ?>
                      <?php
                      if(!empty($activities_details)) :
                      ?>
                      <div class="tab-content">
                        <div class="span12">
                          <div class="span6 control-group">                                     
                            <label class="control-label"> Premium Ads Name </label>
                            <span class="dynamic_data"> 
                              <input type="text" class="form-control" placeholder="Premium Ads Name" value="<?php echo $activities_details['premium_ads_name']; ?>" maxlength="50" name="ads_name" /> 
                            </span>
                          </div>
                          <div class="span6 control-group">
                            <label class="control-label"> Ads Image Upload </label>
                            <span class="dynamic_data"> 
                              <a class="btn upload_option"> Upload </a>
                              <input class="form-control hidden_upload" name="ads_logo" type="file">
                              <img src="<?php echo base_url()."uploads/jobprovider/premiumad/".$activities_details['ads_image_path']; ?>" class="popup_preview" alt="Not Found" />
                              <input type="hidden" value="<?php echo $activities_details['ads_image_path']; ?>" name="old_file_path" />
                            </span>
                          </div>
                        </div>
                        <div class="span12">
                          <div class="span6 control-group">
                            <label class="control-label"> Ads Visible days </label>
                            <span class="dynamic_data"> 
                              <input type="text" class="form-control numeric_value" placeholder="Visible days" value="<?php echo $activities_details['ad_visible_days']; ?>" maxlength="15" name="ads_days" /> 
                            </span>
                          </div>
                          <div class="span6 control-group">                                     
                            <label class="control-label"> Admin verification </label>
                            <span class="dynamic_data"> 
                              <ul class="on_off_button on_off_button_j ad_verify_act">
                                <li data-value="1" <?php if($activities_details['is_admin_verified']==1) echo "class='on'"; ?>><a>Yes</a></li>
                                <li data-value="0" <?php if($activities_details['is_admin_verified']==0) echo "class='on'"; ?>><a>No</a></li>
                              </ul> 
                              <input type="hidden" value="<?php echo $activities_details['is_admin_verified']; ?>" class="verification" name="admin_verify" /> 
                              <input type="hidden" value="<?php echo $activities_details['is_admin_verified']; ?>" name="current_verify" /> 
                            </span>
                          </div>
                        </div>
                        <div class="span12">
                          <div class="span6 control-group">
                            <label class="control-label"> Premium Status </label>
                            <span class="dynamic_data"> 
                              <select name="ads_status">
                                <option value=""> Please select status </option>
                                <option value="1" <?php if($activities_details['premium_ads_status']==1) echo "selected"; ?>> Active </option>
                                <option value="0" <?php if($activities_details['premium_ads_status']==0) echo "selected"; ?>> Inactive </option>
                              </select>
                            </span>
                          </div>
                        </div>
                        <input type="hidden" name="rid" value="<?php echo $activities_details['premium_ads_id']; ?>" />
                        <input type="hidden" value="<?php echo $activities_details['registrant_email_id']; ?>" name="registrant_email">
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
              <a data-open="popup_edit_section" class="close_trig" href="#">Close</a>
            </p>
            <a class="popup-close close_trig" data-open="popup_edit_section"href="#">x</a>
          </div>
        </div>               
      </div>
      <!-- END ADVANCED TABLE widget-->
    </div>
    <!-- END PAGE CONTAINER-->
  </div>
</div>
<!-- END PAGE -->
<!--for Posted Ads popup view--> 
<div id="divLargerImage"></div>
	<div id="divOverlay"></div>
<!--Posted Ads-->

<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>


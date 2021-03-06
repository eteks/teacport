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
              <a href="#">Job Providers</a> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>main/jobprovider_activities">Job Activities</a>
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
            <div class="edit_add_overlay dn"> </div> <!-- Overlay for table -->
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> Job Activities
              </h4>
              <span class="loader_holder hide_loader"> </span>
            </div>
           <div class="widget-body">
                <div class="portlet-body">
                  <div class="clearfix add_section">
                  </div>
                  <form method="post" action="jobprovider_activities" class="admin_module_form" id="activitties_form">
                  <?php } ?> 
                  <?php
                  if(!empty($status)) :
                    echo "<p class='db_status update_success_md'><i class=' icon-ok-sign'></i>  $status </p>";
                  endif;
                  ?> 
                  <p class='val_error error_msg_md'> <p>
                  <table class="table table-striped job_activities table-hover table-bordered admin_table" id="sample_editable_1">
                    <thead>
                      <tr class="ajaxTitle">
                        <th> Organization Name </th>
                        <th> Candidate Name </th>
                        <th> Vacancy </th>
                        <th class="not-sort"> Sms Sent </th>
                        <th class="not-sort"> Mail Sent </th>
                        <th class="not-sort"> Resume Downloaded </th>
                        <th class="data_action" style="display: none;"> </th>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                            <th class="data_action">Edit</th>
                        <?php endif; ?>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                            <th class="data_action">Delete</th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($pro_activities)) :
                      $i=0;
                      foreach ($pro_activities as $act_val) :
                      $i++;
                      ?>                                  
                      <tr class="parents_tr" id="column<?php echo $i; ?>">
                        <td class="act_org_name"> 
                          <?php echo $act_val['organization_name']; ?>
                        </td>
                        <td class="act_cand_name"> 
                          <?php echo $act_val['candidate_name']; ?>
                        </td>
                        <td class="act_vac_name"> 
                          <?php  
                          if(!empty($act_val['vacancies_job_title'])) :
                            echo $act_val['vacancies_job_title']; 
                          else :
                            echo "NULL";
                          endif;
                          ?>
                        </td>
                        <td class="act_sms center_align">
                          <?php 
                          if ($act_val['is_sms_sent'] == 1) 
                            echo "<span class='icon-ok'> </span> <p class='hidden_values'> Yes </p>";
                          else
                            echo "<span class='icon-remove'> </span> <p class='hidden_values'> No </p>";
                          ?>
                          <input type="hidden" value="<?php echo $act_val['is_sms_sent']; ?>" />
                        </td>
                        <td class="act_email center_align">
                          <?php 
                          if ($act_val['is_email_sent'] == 1) 
                            echo "<span class='icon-ok'> </span> <p class='hidden_values'> Yes </p>" ;
                          else
                            echo "<span class='icon-remove'> </span> <p class='hidden_values'> No </p>";
                          ?>                               
                          <input type="hidden" value="<?php echo $act_val['is_email_sent']; ?>" />
                        </td>
                        <td class="act_resume center_align">
                          <?php 
                          if ($act_val['is_resume_downloaded'] == 1) 
                            echo "<span class='icon-ok'> </span> <p class='hidden_values'> Yes </p>";
                          else
                            echo "<span class='icon-remove'> </span> <p class='hidden_values'> No </p>";
                          ?>                               
                          <input type="hidden" value="<?php echo $act_val['is_resume_downloaded']; ?>" />
                        </td>  
                        <td style="display: none;"> </td> 
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>                      
                        <td class="edit_section">
                          <a class="ajaxEdit" href="javascript:;" data-id="<?php echo $act_val['activity_id']; ?>">
                            Edit
                          </a>
                        </td>
                        <?php endif; ?>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                        <td class="delete_section">
                          <a class="ajaxDelete" data-id="<?php echo $act_val['activity_id']; ?>">
                            Delete
                          </a>
                        </td>
                        <?php endif; ?>
                      </tr>
                      <?php
                      endforeach;
                      endif;
                      ?>
                    </tbody>
                  </table>
                  <?php if(!$this->input->is_ajax_request()) { ?>
                </form> 
              </div>
            </div>
          </div>
          <!-- END EXAMPLE TABLE widget-->
        </div>
      </div>
      <!-- END ADVANCED TABLE widget-->
      <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->
  </div>
  <!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<script>
  // Define default values
  var inputType = new Array("label","label","label","on_off","on_off","on_off");
  var columns = new Array("act_org_name","act_cand_name","act_vac_name","act_sms","act_email","act_resume");
  var placeholder = new Array(""); // Set placeholder of input types
  var class_selector = new Array("","","","","","");//To set class for element
  var maxlength = new Array("50","","","","",""); //To set maxlength for element
  var table = "admin_table"; // Set classname of table
  // var act_org_name_option = new Array("Select");
  // var act_org_name_value = new Array("");
  <?php
  // if(!empty($organization_values)) :
  // foreach ($organization_values as $org_val) :
  ?>
    // act_org_name_option.push("<?php 
    // echo $org_val['organization_name']; ?>");
    // act_org_name_value.push("<?php 
    // echo $org_val['organization_id']; ?>");
  <?php
  // endforeach;
  // endif;
  ?>
  // var act_cand_name_option = new Array("Select");
  // var act_cand_name_value = new Array("");
  <?php
  // if(!empty($candidate_values)) :
  // foreach ($candidate_values as $cand_val) :
  ?>
    // act_cand_name_option.push("<?php 
    // echo $cand_val['candidate_name']; ?>");
    // act_cand_name_value.push("<?php 
    // echo $cand_val['candidate_id']; ?>");
  <?php
  // endforeach;
  // endif;
  ?>
  // var act_vac_name_option = new Array("Select");
  // var act_vac_name_value = new Array("");
  <?php
  // if(!empty($vacancy_values)) :
  // foreach ($vacancy_values as $vac_val) :
  ?>
    // act_vac_name_option.push("<?php 
    // echo $vac_val['vacancies_job_title']; ?>");
    // act_vac_name_value.push("<?php 
    // echo $vac_val['vacancies_id']; ?>");
  <?php
  // endforeach;
  // endif;
  ?>

  var is_created ="no";
</script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>
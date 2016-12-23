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
if(!empty($this->session->userdata("admin_login_status"))):
?>
<?php if(!$this->input->is_ajax_request()) { ?>
<?php include "templates/header.php" ?>
<!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
  <!-- BEGIN PAGE -->
  <div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
      <!-- BEGIN PAGE HEADER-->
      <div class="row-fluid">
        <div class="span12">
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
          <h3 class="page-title">
            Teachers Recruit
            <small>Job Seekers</small>
          </h3>
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>admin/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span> Job Seekers</span> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/languages"> Job Seeker Preference</a>
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
                <i class="icon-reorder"></i> Job Seeker Preference
              </h4>
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                <div class="clearfix add_section">
                </div>
                <!-- <form method="post" action="job_seeker/job_seeker_preference" class="admin_module_form form_table_scl" id="job_seeker_preference_form"> -->
                <form method="post" action="job_seeker/job_seeker_preference" class="admin_module_form" id="job_seeker_preference_form">  
                  <?php } ?>
                  <?php
                  if(!empty($status)) :
                    echo "<p class='db_status update_success_md'><i class=' icon-ok-sign'></i>  $status </p>";
                  endif;
                  ?> 
                  <p class='val_error error_msg_md'> <p>
                  <table class="table table-striped table-hover table-bordered admin_table job_seeker_table" id="sample_editable_1">
                    <thead>
                      <tr class="ajaxTitle">
                        <th>Candidate Name</th>
                        <th>Posting Applied</th>
                        <th>Start Salary</th>
                        <th>End Salary</th>
                        <th>Class Level</th>
                        <th>Subject</th>
                        <th class="data_action">Edit</th>
                        <th class="data_action">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($preference)) :
                      $i=0;
                      foreach ($preference as $pre_key => $pre_val) :
                      $i++;
                      ?>                                  
                      <tr class="parents_tr" id="column<?php echo $i; ?>">
                        <td class="cand_name"> 
                          <?php echo $pre_val['candidate_name']; ?>
                        </td>
                        <td class="cand_post"> 
                          <?php
                          foreach ($pre_val['posting_values'] as $post_key => $post_val) :
                            echo "<span> $post_val </span> <br>";
                          endforeach;
                          ?>
                          <input type="hidden" value="<?php echo $pre_val['candidate_posting_applied_for']; ?>" /> 
                        </td>
                        <td class="cand_ssalary">
                          <?php echo $pre_val['candidate_expecting_start_salary']; ?>
                        </td>
                        <td class="cand_esalary">
                          <?php echo $pre_val['candidate_expecting_end_salary']; ?>
                        </td>
                        <td class="cand_class">
                          <?php
                          foreach ($pre_val['class_values'] as $cls_key => $cls_val) :
                            echo "<span> $cls_val </span> <br>";
                          endforeach;
                          ?>
                          <input type="hidden" value="<?php echo $pre_val['candidate_willing_class_level_id']; ?>" />
                        </td>  
                        <td class="cand_sub"> 
                          <?php
                          foreach ($pre_val['subject_values'] as $sub_key => $sub_val) :
                            echo "<span> $sub_val </span> <br>";
                          endforeach;
                          ?>
                          <input type="hidden" value="<?php echo $pre_val['candidate_willing_subject_id']; ?>" />
                        </td>   
                        <td class="edit_section">
                          <a class="ajaxEdit" href="javascript:;" data-id="<?php echo $pre_key; ?>">
                            Edit
                          </a>
                        </td>
                        <td>
                          <a class="ajaxDelete" data-id="<?php echo $pre_key; ?>">
                            Delete
                          </a>
                        </td>
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
    var inputType = new Array("label","multiselect","text","text","multiselect","multiselect"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("cand_name","cand_post","cand_ssalary","cand_esalary","cand_class","cand_sub"); // Set name of input types
    var placeholder = new Array("","Please select Post","Enter Start Salary","Enter End Salary","Please select class","Please Select Subject"); // Set placeholder of input types
    var class_selector = new Array("");//To set class for element
    var table = "admin_table"; // Set classname of table

    var cand_post_option = new Array();
    var cand_post_value = new Array();
    <?php
    if(!empty($post_values)) :
    foreach ($post_values as $po_val) :
    ?>
      cand_post_option.push("<?php echo $po_val['posting_name']; ?>");
      cand_post_value.push("<?php echo $po_val['posting_id']; ?>");
    <?php
    endforeach;
    endif;
    ?>
    var cand_class_option = new Array();
    var cand_class_value = new Array();
    <?php
    if(!empty($class_values)) :
    foreach ($class_values as $cls_val) :
    ?>
      cand_class_option.push("<?php echo $cls_val['class_level']; ?>");
      cand_class_value.push("<?php echo $cls_val['class_level_id']; ?>");
    <?php
    endforeach;
    endif;
    ?>
    var cand_sub_option = new Array();
    var cand_sub_value = new Array();
    <?php
    if(!empty($subject_values)) :
    foreach ($subject_values as $sub_val) :
    ?>
      cand_sub_option.push("<?php echo $sub_val['subject_name']; ?>");
      cand_sub_value.push("<?php echo $sub_val['subject_id']; ?>");
    <?php
    endforeach;
    endif;
    ?>
    var is_created = "no";
  </script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>


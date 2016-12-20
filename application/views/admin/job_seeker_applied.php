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
              <span>Job Seekers</span> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/job_seeker_applied"> Job Applaied</a>
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
                <i class="icon-reorder"></i> Job Applied
              </h4>
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                <div class="clearfix add_section">
                </div>
                <form method="post" action="job_seeker/job_seeker_applied" class="admin_module_form" id="job_seeker_applied_form">
                  <?php } ?> 
                  <?php
                  if(!empty($status)) :
                    echo "<p class='db_status update_success_md'><i class=' icon-ok-sign'></i>  $status </p>";
                  endif;
                  ?> 
                  <p class='val_error error_msg_md'> <p>
                  <table class="table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                    <thead>
                      <tr class="ajaxTitle">
                        <th>Organization</th>
                        <th>Job Title</th>
	                      <th>Candidate</th>
                        <th>Status</th>
                        <th>Applied Date</th>
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
                      if(!empty($job_applied)) :
                      $i=0;
                      foreach ($job_applied as $job_val) :
                      $i++;
                      ?>
	                    <tr class="parents_tr" id="column<?php echo $i; ?>">
                        <td class="org_name">
                          <?php echo $job_val['organization_name']; ?>
                        </td>
                        <td class="vac_name">
                          <?php echo $job_val['vacancies_job_title']; ?>
                          <input type="hidden" value="<?php echo $job_val['applied_job_vacancies_id']; ?>" />
                        </td>
	                      <td class="cand_name">
                          <?php echo $job_val['candidate_name']; ?>
                          <input type="hidden" value="<?php echo $job_val['applied_job_candidate_id']; ?>" />
                        </td>
	                      <td class="job_status">
                          <?php
                          if ($job_val['applied_job_status'] == 1) 
                            echo "Active";
                          else
                            echo "Inactive";
                          ?>
                          <input type="hidden" value="<?php echo $job_val['applied_job_status']; ?>" />
                        </td>
                        <td class="applied_date">
                          <?php echo date('d-m-Y',strtotime($job_val['applied_job_date'])); ?>
                        </td>
	                      <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
	                      <td class="edit_section">
                          <a class="ajaxEdit" href="javascript:;" data-id="<?php echo $job_val['applied_job_id']; ?>">Edit</a>
	                      </td>
	                      <?php endif; ?>
	                      <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
	                      <td>
                          <a class="ajaxDelete" data-id=<?php echo $job_val['applied_job_id']; ?>"">Delete</a>
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
  var inputType = new Array("label","select","select","select","label"); // Set type of input which are you have used like text, select,textarea.
  var columns = new Array("org_name","vac_name","cand_name","job_status","applied_date"); // Set name of input types
  var class_selector = new Array("");//To set class for element
  var table = "admin_table"; // Set classname of table
  var vac_name_option = new Array("Please select vacancy"); 
  var vac_name_value = new Array("");
  <?php
  if(!empty($vac_values)) :
  foreach ($vac_values as $vac_val) :
  ?>
    vac_name_option.push("<?php echo $vac_val['vacancies_job_title']; ?>");
    vac_name_value.push("<?php echo $vac_val['vacancies_id']; ?>");
  <?php
  endforeach;
  endif;
  ?>
  var cand_name_option = new Array("Please select candidate"); 
  var cand_name_value = new Array("");
  <?php
  if(!empty($cand_values)) :
  foreach ($cand_values as $cand_val) :
  ?>
    cand_name_option.push("<?php echo $cand_val['candidate_name']; ?>");
    cand_name_value.push("<?php echo $cand_val['candidate_id']; ?>");
  <?php
  endforeach;
  endif;
  ?>
  var job_status_option = new Array("Please select status","Active","Inactive"); 
  var job_status_value = new Array("","1","0"); 
  var is_created = "no";
</script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>
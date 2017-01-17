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
            <small>Master Data</small>
          </h3> -->
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>main/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span>Master Data</span> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>main/district">District</a>
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
                <i class="icon-reorder"></i> District
              </h4>
               <span class="loader_holder hide_loader"> </span>	 
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                <div class="clearfix">
                  <div class="btn-group">
                    <button id="sample_editable_1_new" class="btn green add_new">
                      Add New <i class="icon-plus"></i>
                    </button>
                  </div>
                  <div class="btn-group pull-right">
                  </div>
                </div>
                <form method="post" action="district" class="admin_module_form" id="district_form">
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
                        <th>District Name</th>
                        <th>State</th>
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
                    <tbody>
                      <?php
                      if(!empty($districts_values)) :
                      $i=0;
                      foreach ($districts_values as $dis_val) :
                      $i++;
                      ?>
                      <tr class="parents_tr" id="column<?php echo $i; ?>">
                        <td class="d_name"> 
                          <?php echo $dis_val['district_name']; ?>
                        </td>
                        <td class="d_state_name"> 
                          <?php echo $dis_val['state_name']; ?>
                          <?php 
                          if(!empty($mapped_data)){
                            $district_id = $dis_val['district_id'];  
                            $mapped_result = array_filter($mapped_data, function($m) use ($district_id) {
                            return $m == $district_id; });
                            if(count($mapped_result) > 0)
                              echo '<input type="hidden" value="'.$dis_val['state_id'].'" data-disabled="1" />';
                            else
                              echo '<input type="hidden" value="'.$dis_val['state_id'].'" />';
                          }
                          else{
                            echo '<input type="hidden" value="'.$dis_val['state_id'].'" />';
                          }
                          ?>
                        </td>
                        <td class="d_status"> 
                          <?php 
                          if ($dis_val['district_status'] == 1) 
                            echo "Active";
                          else
                            echo "Inactive";
                          ?>
                          <?php 
                          if(!empty($mapped_data)){
                            $district_id = $dis_val['district_id'];  
                            $mapped_result = array_filter($mapped_data, function($m) use ($district_id) {
                            return $m == $district_id; });
                            if(count($mapped_result) > 0)
                              echo '<input type="hidden" value="'.$dis_val['district_status'].'" data-disabled="1" />';
                            else
                              echo '<input type="hidden" value="'.$dis_val['district_status'].'" />';
                          }
                          else{
                              echo '<input type="hidden" value="'.$dis_val['district_status'].'" />';
                          }
                          ?>
                        </td>
                        <td class="created_date">
                          <?php 
                            $created_datetime = explode(' ', $dis_val['district_create_date']);
                            echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                          ?> 
                        </td>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                        <td class="edit_section">
                          <a class="ajaxEdit" href="javascript:;" data-id="<?php echo $dis_val['district_id']; ?>">
                            Edit
                          </a>
                        </td>
                        <?php endif; ?>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                        <td>
                          <?php 
                          if(!empty($mapped_data)){
                            $district_id = $dis_val['district_id'];  
                            $mapped_result = array_filter($mapped_data, function($m) use ($district_id) {
                            return $m == $district_id; });
                            if(count($mapped_result) > 0)
                              echo "<span class='restrict'>Delete<div class='restrict_tooltip'>Mapping has been already done. Delete not possible.</div></span>";
                            else
                              echo "<a class='ajaxDelete' data-id='".$dis_val['district_id']."'>Delete</a>";
                          }
                          else{
                              echo "<a class='ajaxDelete' data-id='".$dis_val['district_id']."'>Delete</a>";
                          }
                          ?>      
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
    var inputType = new Array("text","select","select"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("d_name","d_state_name","d_status"); // Set name of input types
    var placeholder = new Array("Enter District Name",""); // Set placeholder of input types
    var class_selector = new Array("alpha_value","","");//To set class for element
    var maxlength = new Array("50","",""); //To set maxlength for element
    var table = "admin_table"; // Set classname of table
    var d_state_name_option = new Array("Please select state");
    var d_state_name_value = new Array("");
    <?php
    if(!empty($state_values)) :
    foreach ($state_values as $sta_val) :
    ?>
      d_state_name_option.push("<?php echo $sta_val['state_name']; ?>");
      d_state_name_value.push("<?php echo $sta_val['state_id']; ?>");
    <?php
    endforeach;
    endif;
    ?>
    var d_status_option = new Array("Please select status","Active","Inactive"); 
    var d_status_value = new Array("","1","0"); 
</script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>
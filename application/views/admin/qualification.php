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
              <a href="<?php echo base_url(); ?>main/qualification">Qualification</a>
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
                <i class="icon-reorder"></i> Qualification
              </h4>
              <span class="loader_holder hide_loader"> </span>
              <!-- <span class="tools">
                <a href="javascript:;" class="icon-chevron-down"></a>
                <a href="javascript:;" class="icon-remove"></a>
              </span> -->
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                <div class="clearfix">
                  <div class="btn-group">
                  <?php if(($is_super_admin) || (recursiveFind($access_rights, "add"))): ?>
                    <button id="sample_editable_1_new" class="btn green add_new">
                      Add New <i class="icon-plus"></i>
                    </button>
                  <?php endif; ?>
                  <form action="qualification" method="post" enctype="multipart/form-data" name="csv_form"> 
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"><br /> 
                    <input name="csv" type="file" id="csv" /> 
                    <button id="" class="btn green">
                      Import
                  </form> 
                  </div>
                  <div class="btn-group pull-right">
                  </div>
                </div>
                
                <form method="post" action="qualification" class="admin_module_form" id="qualification_form">
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
                        <th>Qualification</th>
                        <th>Course Type</th>
                        <th>Institution Type</th>
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
                    if(!empty($qualification_type_values)) :
                    $i=0;
                    foreach ($qualification_type_values as $qua_val) :
                    $i++;
                    ?>
                      <tr class="parents_tr" id="column<?php echo $i; ?>">
                        <td class="q_name">
                          <?php echo $qua_val['educational_qualification']; ?>
                        </td>
                        <td class="q_course_type">
                          <?php 
                          $course_type = unserialize(COURSE_TYPE);
                          if(!empty($qua_val['educational_qualification_course_type'])) :
                            echo $course_type[$qua_val['educational_qualification_course_type']];
                          else :
                            echo "NULL";
                          endif;
                          ?>
                          <input type="hidden" value="<?php echo $qua_val['educational_qualification_course_type']; ?>" />
                        </td>
                        <td class="q_inst_type">
                          <?php echo $qua_val['institution_type_name']; ?>
                          <?php 
                          if(!empty($mapped_data)){
                            $qual_id = $qua_val['educational_qualification_id'];  
                            $mapped_result = array_filter($mapped_data, function($m) use ($qual_id) {
                            return $m == $qual_id; });
                            if(count($mapped_result) > 0)
                              echo '<input type="hidden" value="'.$qua_val['institution_type_id'].'" data-disabled="1" />';
                            else
                              echo '<input type="hidden" value="'.$qua_val['institution_type_id'].'" />';
                          }
                          else{
                            echo '<input type="hidden" value="'.$qua_val['institution_type_id'].'" />';
                          }
                          ?>
                        </td>
                        <td class="q_status"> 
                          <?php 
                          if ($qua_val['educational_qualification_status'] == 1) 
                            echo "Active";
                          else
                            echo "Inactive";
                          ?>
                          <?php 
                          if(!empty($mapped_data)){
                            $qual_id = $qua_val['educational_qualification_id'];  
                            $mapped_result = array_filter($mapped_data, function($m) use ($qual_id) {
                            return $m == $qual_id; });
                            if(count($mapped_result) > 0)
                              echo '<input type="hidden" value="'.$qua_val['educational_qualification_status'].'" data-disabled="1" />';
                            else
                              echo '<input type="hidden" value="'.$qua_val['educational_qualification_status'].'" />';
                          }
                          else{
                            echo '<input type="hidden" value="'.$qua_val['educational_qualification_status'].'" />';
                          }
                          ?>
                        </td>
                        <td class="educational_qualification_created_date">
                          <?php 
                            $created_datetime = explode(' ', $qua_val['educational_qualification_created_date']);
                            echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                          ?> 
                        </td>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                        <td class="edit_section">
                          <a class="ajaxEdit" href="javascript:;" data-id="<?php echo $qua_val['educational_qualification_id']; ?>">
                              Edit
                          </a>
                        </td>
                        <?php endif; ?>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                        <td class="delete_section">
                          <?php 
                          if(!empty($mapped_data)){
                            $qual_id = $qua_val['educational_qualification_id'];  
                            $mapped_result = array_filter($mapped_data, function($m) use ($qual_id) {
                            return $m == $qual_id; });
                            if(count($mapped_result) > 0)
                              echo "<span class='restrict'>Delete<div class='restrict_tooltip'>Mapping has been already done. Delete not possible.</div></span>";
                            else
                              echo "<a class='ajaxDelete' data-id='".$qua_val['educational_qualification_id']."'>Delete</a>";
                          }
                          else{
                              echo "<a class='ajaxDelete' data-id='".$qua_val['educational_qualification_id']."'>Delete</a>";
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
  var inputType = new Array("text","select","select","select"); // Set type of input which are you have used like text, select,textarea.
  var columns = new Array("q_name","q_course_type","q_inst_type","q_status"); // Set name of input types
  var placeholder = new Array("Enter Qualification","","",""); // Set placeholder of input types
  var class_selector = new Array("","","","");//To set class for element
  var maxlength = new Array("50","","",""); //To set maxlength for element
  var table = "admin_table"; // Set classname of table
  var q_course_type_option = new Array("Please select course"); 
  var q_course_type_value = new Array("");
  <?php foreach (unserialize(COURSE_TYPE) as $key => $value): ?>
   q_course_type_option.push("<?php echo $value; ?>");
   q_course_type_value.push("<?php echo $key; ?>");
  <?php endforeach; ?>
  var q_inst_type_option = new Array("Please select institution");
  var q_inst_type_value = new Array("");
  <?php
  if(!empty($institution_types)) :
  foreach ($institution_types as $ins_val) :
  ?>
    q_inst_type_option.push("<?php echo $ins_val['institution_type_name']; ?>");
    q_inst_type_value.push("<?php echo $ins_val['institution_type_id']; ?>");
  <?php
  endforeach;
  endif;
  ?>
  var q_status_option = new Array("Please select status","Active","Inactive"); 
  var q_status_value = new Array("","1","0");
</script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>

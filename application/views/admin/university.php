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
    <div class="container-fluid">
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
              <a href="<?php echo base_url(); ?>main/university">University / Board</a>
              <span class="divider-last">&nbsp;</span>
            </li>http://localhost/teac/teacport/main/postings
          </ul>
          <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
      </div>
      <!-- END PAGE HEADER-->
      <!-- BEGIN ADVANCED TABLE widget-->
      <div class="row-fluid">
        <div class="span12">
          <!-- BEGIN EXAMPLE TABLE widget-->
          <div class="widget sub_section_scroll">
            <div class="widget-title">
              <h4>
                <i class="icon-reorder"></i> University / Board
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
                    <button id="sample_editable_1_new" class="btn green add_new">
                      Add New <i class="icon-plus"></i>
                    </button>
                  </div>
                  <div class="btn-group pull-right">
                  </div>
                </div>
                
                <form method="post" action="university" class="admin_module_form" id="subject_form">
                  <?php } ?>
                  <?php
                  if(!empty($status)) :
                    echo "<p class='db_status update_success_md'><i class=' icon-ok-sign'></i>  $status </p>";
                  endif;
                  ?> 
                  <p class='val_error'> <p>
                  <table class="table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                    <thead>
                      <tr class="ajaxTitle">
                        <th>University Board Name</th>
                        <th>University Class Level</th>
                        <th>University Board Status</th>
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
                      if(!empty($universities_values)) :
                      $i=0;
                      foreach ($universities_values as $unv_key => $unv_val) :
                      $i++;
                      ?>
                      <tr class="parents_tr" id="column<?php echo $i; ?>">
                        <td class="u_name"> 
                          <?php echo $unv_val['university_board_name']; ?>
                        </td>
                        <td class="u_class_level"> 
                          <?php
                          foreach ($unv_val['class_level_id'] as $cls_key => $cls_val) :
                          ?>
                            <span data-id="<?php echo $cls_key; ?>"> 
                              <?php echo $cls_val; ?>
                            </span>
                            <br>
                          <?php
                          endforeach;
                          ?>
                          <input type="hidden" value="<?php echo $unv_val['university_class_level_id']; ?>">  
                        </td>
                        <td class="u_status"> 
                          <?php 
                          if ($unv_val['university_board_status'] == 1) 
                            echo "Active";
                          else
                            echo "Inactive";
                          ?>
                          <input type="hidden" value="<?php echo $unv_val['university_board_status']; ?>"> 
                        </td>
                        <td class="created_date">
                          <?php 
                            $created_datetime = explode(' ', $unv_val['university_board_created_date']);
                            echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                          ?> 
                        </td>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                        <td class="edit_section">
                          <a class="ajaxEdit" href="javascript:;" data-id="<?php echo $unv_key; ?>">
                            Edit
                          </a>
                        </td>
                        <?php endif; ?>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                        <td>
                          <?php 
                          if(!empty($mapped_data)){
                            $uni_id = $unv_key;  
                            $mapped_result = array_filter($mapped_data, function($m) use ($uni_id) {
                            return $m == $uni_id; });
                            if(count($mapped_result) > 0)
                              echo "<span class='restrict'>Delete<div class='restrict_tooltip'>Mapping has been already done. Delete not possible.</div></span>";
                            else
                              echo "<a class='ajaxDelete' data-id='".$unv_key."'>Delete</a>";
                          }
                          else{
                              echo "<a class='ajaxDelete' data-id='".$unv_key."'>Delete</a>";
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
  var inputType = new Array("text","multiselect","select"); // Set type of input which are you have used like text, select,textarea.
  var columns = new Array("u_name","u_class_level","u_status"); // Set name of input types
  var placeholder = new Array("Enter University Board Name","Please select class level"); // Set placeholder of input types
  var class_selector = new Array("");//To set class for element
  var table = "admin_table"; // Set classname of table
  var u_class_level_option = new Array();
  var u_class_level_value = new Array();
  <?php
  if(!empty($class_level_values)) :
  foreach ($class_level_values as $cls_val) :
  ?>
    u_class_level_option.push("<?php echo $cls_val['class_level']; ?>");
    u_class_level_value.push("<?php echo $cls_val['class_level_id']; ?>");
  <?php
  endforeach;
  endif;
  ?>
  var u_status_option = new Array("Please select status","Active","Inactive"); 
  var u_status_value = new Array("","1","0");
</script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>
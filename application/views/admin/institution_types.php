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
    <div class="container-fluid sub_section_scroll">
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
              <a href="<?php echo base_url(); ?>main/institution_types">Institution Type</a>
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
                <i class="icon-reorder"></i>Institution Type
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
                
                <form method="post" action="institution_types" class="admin_module_form" id="institution_types_form">
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
                      if(!empty($institution_type_values)) :
                      $i=0;
                      foreach ($institution_type_values as $ins_val) :
                      $i++;
                      ?>
                      <tr class="parents_tr" id="column<?php echo $i; ?>">
                        <td class="i_name"> 
                          <?php echo $ins_val['institution_type_name']; ?>
                        </td>
                        <td class="i_status"> 
                          <?php 
                          if ($ins_val['institution_type_status'] == 1) 
                            echo "Active";
                          else
                            echo "Inactive";
                          ?>
                          <input type="hidden" value="<?php echo $ins_val['institution_type_status']; ?>" />
                        </td>
                        <td class="created_date"> 
                            <?php 
                              $created_datetime = explode(' ', $ins_val['institution_type_created_date']);
                              echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                            ?> 
                        </td>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                        <td class="edit_section">
                          <a class="ajaxEdit" href="javascript:;" data-id="<?php echo $ins_val['institution_type_id']; ?>">
                            Edit
                          </a>
                        </td>
                        <?php endif; ?>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                        <td>
                          <?php 
                          if(!empty($mapped_data)){
                            $inst_id = $ins_val['institution_type_id'];  
                            $mapped_result = array_filter($mapped_data, function($m) use ($inst_id) {
                            return $m == $inst_id; });
                            if(count($mapped_result) > 0)
                              echo "<span class='restrict'>Delete<div class='restrict_tooltip'>Mapping has been already done. Edit or Delete not possible.</div></span>";
                            else
                              echo "<a class='ajaxDelete' data-id='".$ins_val['institution_type_id']."'>Delete</a>";
                          }
                          else{
                              echo "<a class='ajaxDelete' data-id='".$ins_val['institution_type_id']."'>Delete</a>";
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
  var inputType = new Array("text","select"); 
  var columns = new Array("i_name","i_status"); 
  var placeholder = new Array("Enter Institution Type Name","");
  var class_selector = new Array("");//To set class for element
  var table = "admin_table"; // Set classname of table
  var i_status_option = new Array("Please select status","Active","Inactive"); 
  var i_status_value = new Array("","1","0"); 
</script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>
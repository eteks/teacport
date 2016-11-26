<?php
if(!empty($this->session->userdata("login_status"))): 
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
            <small>Master Data</small>
          </h3>
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>admin/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span>Master Data</span> 
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/subject">Subject</a>
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
                <i class="icon-reorder"></i> Subject
              </h4>
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
                
                <form method="post" action="adminindex/subject" class="admin_module_form" id="subject_form">
                  <?php } ?>
                  <?php
                  if(!empty($status)) :
                    echo "<p class='db_status update_success_md'> $status </p>";
                  endif;
                  ?> 
                  <p class='val_error error_msg_md'> <p>
                  <table class="table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                    <thead>
                      <tr class="ajaxTitle">
                        <th>Subject</th>
                        <th>Institution</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="data_action">Edit</th>
                        <th class="data_action">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(!empty($subject_values)) :
                      $i=0;
                      foreach ($subject_values as $sub_key => $sub_val) :
                      $i++;
                      ?>
                      <tr class="parents_tr" id="column<?php echo $i; ?>">
                        <td class="s_name"> 
                          <?php echo $sub_val['subject_name']; ?>
                        </td>
                        <td class="s_inst_type"> 
                          <?php
                          foreach ($sub_val['institution_type_id'] as $ins_key => $ins_val) :
                          ?>
                            <span data-id="<?php echo $ins_key; ?>"> 
                              <?php echo $ins_val; ?>
                            </span>
                            <br>
                          <?php
                          endforeach;
                          ?>  
                          <input type="hidden" value="<?php echo $sub_val['subject_institution_id']; ?>" />
                        </td>
                        <td class="s_status"> 
                          <?php 
                          if ($sub_val['subject_status'] == 1) 
                            echo "Active";
                          else
                            echo "Inactive";
                          ?>
                          <input type="hidden" value="<?php echo $sub_val['subject_status']; ?>" />
                        </td>
                        <td class="created_date">
                          <?php echo $sub_val['subject_create_date']; ?>
                        </td>
                        <td class="edit_section">
                          <a class="ajaxEdit" href="javascript:;" data-id="<?php echo $sub_key; ?>">
                            Edit
                          </a>
                        </td>
                        <td>
                          <a class="ajaxDelete" data-id="<?php echo $sub_key; ?>">Delete</a>
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
  var inputType = new Array("text","multiselect","select"); // Set type of input which are you have used like text, select,textarea.
  var columns = new Array("s_name","s_inst_type","s_status"); // Set name of input types
  var placeholder = new Array("Enter Subject Name","Please select institution"); // Set placeholder of input types
  var table = "admin_table"; // Set classname of table
  var s_inst_type_option = new Array();
  var s_inst_type_value = new Array();
  <?php
  if(!empty($institution_types)) :
  foreach ($institution_types as $ins_val) :
  ?>
    s_inst_type_option.push("<?php echo $ins_val['institution_type_name']; ?>");
    s_inst_type_value.push("<?php echo $ins_val['institution_type_id']; ?>");
  <?php
  endforeach;
  endif;
  ?>
  var s_status_option = new Array("Please select status","Active","Inactive"); 
  var s_status_value = new Array("","1","0"); // Set value for select optionvalue which must have name of the select tag with '_value' . ex. select tag name is status means , the variable of the select optionvalue should be as 'status_value'
</script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>
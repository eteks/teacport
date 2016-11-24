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
                           <a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Master Data</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>admin/qualification">Qualification</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i> Qualification</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
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
                                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="editable_table.html#">Print</a></li>
                                            <li><a href="editable_table.html#">Save as PDF</a></li>
                                            <li><a href="editable_table.html#">Export to Excel</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="space15"></div>
                                <form method="post" action="adminindex/qualification" class="admin_module_form" id="qualification_form">
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
                                        <th>Qualification</th>
                                        <th>Course Type</th>
                                        <th>Institution Type</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
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
                                          echo $course_type[$qua_val['educational_qualification_course_type']];
                                          ?>
                                          <input type="hidden" value="<?php echo $qua_val['educational_qualification_course_type']; ?>" />
                                        </td>
                                        <td class="q_inst_type">
                                          <?php echo $qua_val['institution_type_name']; ?>
                                          <input type="hidden" value="<?php echo $qua_val['institution_type_id']; ?>" />
                                        </td>
                                        <td class="q_status"> 
                                          <?php 
                                          if ($qua_val['educational_qualification_status'] == 1) 
                                            echo "Active";
                                          else
                                            echo "Inactive";
                                          ?>
                                          <input type="hidden" value="<?php echo $qua_val['educational_qualification_status']; ?>" />
                                        </td>
                                        <td class="educational_qualification_created_date">
                                          <?php echo $qua_val['educational_qualification_created_date']; ?>
                                        </td>
                                        <td class="edit_section">
                                          <a class="ajaxEdit" href="javascript:;" data-id="<?php echo $qua_val['educational_qualification_id']; ?>">
                                              Edit
                                          </a>
                                        </td>
                                        <td>
                                          <a class="ajaxDelete" data-id="<?php echo $qua_val['educational_qualification_id']; ?>">
                                          <!-- <a class="ajaxDelete" onclick="Confirm.show()" data-id="<?php echo $qua_val['educational_qualification_id']; ?>"> -->
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
    var inputType = new Array("text","select","select","select"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("q_name","q_course_type","q_inst_type","q_status"); // Set name of input types
    var placeholder = new Array("Enter Qualification","","",""); // Set placeholder of input types
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
redirect(base_url().'admin');
endif;
?>

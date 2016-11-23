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
                       <li><a href="<?php echo base_url(); ?>admin/languages">Languages</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i> Languages</h4>
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
                              <form method="post" action="adminindex/languages" class="admin_module_form" id="languages_form">
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
                                    <th>Language</th>
                                    <th>Is Mother Tangue?</th>
                                    <th>Is Medium of Instruction?</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  if(!empty($language_values)) :
                                  foreach ($language_values as $lan_val) :
                                  ?>
                                  <tr class="parents_tr" id="column<?php echo $lan_val['language_id']; ?>">
                                    <td class="language_name">
                                      <?php echo $lan_val['language_name']; ?>
                                    </td>
                                    <td class="is_mother_tangue">
                                      <?php 
                                      if ($lan_val['is_mother_tangue'] == 1) 
                                        echo "Yes";
                                      else
                                        echo "No";
                                      ?>
                                    </td>
                                    <td class="is_medium_of_instruction">
                                      <?php 
                                      if ($lan_val['is_medium_of_instruction'] == 1) 
                                        echo "Yes";
                                      else
                                        echo "No";
                                      ?>
                                    </td>
                                    <td class="language_status">
                                      <?php 
                                      if ($lan_val['language_status'] == 1) 
                                        echo "Active";
                                      else
                                        echo "Inactive";
                                      ?>
                                    </td>
                                    <td class="language_created_date">
                                      <?php echo $lan_val['language_created_date']; ?>
                                    </td>
                                    <td class="edit_section">
                                      <a class="ajaxEdit" id="column<?php echo $lan_val['language_id']; ?>" href="javascript:;" data-id="<?php echo $lan_val['language_id']; ?>">
                                        Edit
                                      </a>
                                    </td>
                                    <td>                               	
                                      <a class="ajaxDelete" onclick="Confirm.show()" data-id="<?php echo $lan_val['language_id']; ?>">
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
    var columns = new Array("language_name","is_mother_tangue","is_medium_of_instruction","language_status"); // Set name of input types
    var placeholder = new Array("Enter Language Name",""); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table
    var is_mother_tangue_option = new Array("select","Yes","No"); 
    var is_mother_tangue_value = new Array("","1","0");
    var is_medium_of_instruction_option = new Array("select","Yes","No"); 
    var is_medium_of_instruction_value = new Array("","1","0");
    var language_status_option = new Array("select","Active","Inactive"); 
    var language_status_value = new Array("","1","0"); 
  </script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>


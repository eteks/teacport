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
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-navy-blue" data-style="navy-blue"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Editable Table
                     <small>Editable Table Sample</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Master Data</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>admin/district">District</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i>Editable Table</h4>
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
                                <form method="post" action="adminindex/district" class="admin_module_form" id="district_form">
                                  <?php } ?>
                                  <?php
                                  if(!empty($status)) :
                                    echo "<p class='db_status'> $status </p>";
                                  endif;
                                  ?> 
                                  <p class='val_error'> <p>
                                  <table class="table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                                    <thead>
                                      <tr class="ajaxTitle">
                                        <th>District Name</th>
                                        <th>State</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      if(!empty($districts_values)) :
                                      foreach ($districts_values as $dis_val) :
                                      ?>
                                      <tr class="parents_tr" id="column<?php echo $dis_val['district_id']; ?>">
                                        <td class="district_name"> 
                                          <?php echo $dis_val['district_name']; ?>
                                        </td>
                                        <td class="district_state_id"> 
                                          <?php echo $dis_val['state_name']; ?>
                                        </td>
                                        <td class="district_status"> 
                                          <?php 
                                          if ($dis_val['district_status'] == 1) 
                                            echo "Active";
                                          else
                                            echo "Inactive";
                                          ?>
                                        </td>
                                        <td class="created_date">
                                          <?php echo $dis_val['district_create_date']; ?>
                                        </td>
                                        <td class="edit_section">
                                          <a class="ajaxEdit" id="column<?php echo $dis_val['district_id']; ?>" href="javascript:;" data-id="<?php echo $dis_val['district_id']; ?>">
                                            Edit
                                          </a>
                                        </td>
                                        <td>
                                          <a class="ajaxDelete" id="column1" href="javascript:;" data-id="<?php echo $dis_val['district_id']; ?>">
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
    var inputType = new Array("text","select","select"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("district_name","district_state_id","district_status"); // Set name of input types
    var placeholder = new Array("Enter District Name",""); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table
    var district_state_id_option = new Array("Please select state");
    var district_state_id_value = new Array("");
    <?php
    if(!empty($state_values)) :
    foreach ($state_values as $sta_val) :
    ?>
      district_state_id_option.push("<?php echo $sta_val['state_name']; ?>");
      district_state_id_value.push("<?php echo $sta_val['state_id']; ?>");
    <?php
    endforeach;
    endif;
    ?>
    var district_status_option = new Array("Please select status","Active","Inactive"); 
    var district_status_value = new Array("","1","0"); 
  </script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>

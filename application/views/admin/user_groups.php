<?php
$current_page_rights = $this->config->item('current_page_rights')['access_permission'];
$access_rights = explode(',',$current_page_rights);
// print_r($access_rights);
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
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <!-- <div id="theme-change" class="hidden-phone">
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
                   </div> -->
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Teachers Recruit
                     <small>Admin Users</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="<?php echo base_url(); ?>admin/user_groups">Admin Users</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>admin/user_groups">User Groups</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i>User Groups</h4>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <div class="btn-group">
                                      <?php if(recursiveFind($access_rights, "add")): ?>
                                        <button id="sample_editable_1_new" class="btn green add_new">
                                            Add New <i class="icon-plus"></i>
                                        </button>
                                      <?php endif; ?>
                                    </div>
                                </div>
                                
                                <form method="post" action="user_groups" class="admin_module_form" id="users_group_form">
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
                                        <th>Group Name</th>
                                        <th>Group Description</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <?php if(recursiveFind($access_rights, "edit")): ?>
                                          <th>Edit</th>
                                        <?php endif; ?>
                                        <?php if(recursiveFind($access_rights, "delete")): ?>
                                          <th>Delete</th>
                                        <?php endif; ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                      if(!empty($group_values)) :
                                      $i=1;
                                      foreach ($group_values as $grp_val) :
                                    ?>
                                    <tr class="parents_tr" id="column<?php echo $i; ?>">
                                        <td class="user_group_name"><?php echo $grp_val['user_group_name']; ?></td>
                                        <td class="user_group_description"><?php echo $grp_val['user_group_description']; ?></td>
                                        <td class="user_group_status"><?php 
                                        if ($grp_val['user_group_status'] == 1) 
                                          echo "Active";
                                        else
                                          echo "Inactive";
                                        ?></td>
                                        <td class="created_date"><?php echo date("d/m/Y", strtotime($grp_val["user_group_created_date"])); ?></td>
                                        <?php if(recursiveFind($access_rights, "edit")): ?>
                                          <td class="edit_section">
                                            <a class="ajaxEdit" id="column<?php echo $i; ?>" href="javascript:;" data-id="<?php echo $grp_val['user_group_id']; ?>">Edit</a>
                                          </td>
                                        <?php endif; ?>
                                        <?php if(recursiveFind($access_rights, "delete")): ?>
                                          <td><a class="ajaxDelete" id="column<?php echo $i; ?>" onclick="Confirm.show()" data-id="<?php echo $grp_val['user_group_id']; ?>">Delete</a></td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php
                                      $i++;
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
    var inputType = new Array("text","textarea","select"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("user_group_name","user_group_description","user_group_status"); // Set name of input types
    var placeholder = new Array("Enter Group Name","Enter User Group Description"); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table    
    var user_group_status_option = new Array("Please select status","Active","Inactive"); 
    var user_group_status_value = new Array("","1","0");
  </script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>
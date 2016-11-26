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
                           <a href="<?php echo base_url(); ?>admin/user_accounts">Admin Users</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>admin/user_accounts">User Accounts</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i>User Accounts</h4>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <button id="sample_editable_1_new" class="btn green add_new">
                                            Add New <i class="icon-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <form method="post" action="users_accounts" class="admin_module_form" id="users_accounts_form">
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
                                        <th>User Name</th>
                                        <th>Password</th>
                                        <th>Email</th>
                                        <th>User Group</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                      if(!empty($user_details)) :
                                      $i=1;
                                      foreach ($user_details as $usr_det) :
                                    ?>
                                    <tr class="parents_tr user_accts_table" id="column<?php echo $i; ?>">
                                        <td class="admin_user_name"><?php echo $usr_det['admin_user_name']; ?></td>
                                        <td class="admin_user_password"><?php echo $usr_det['admin_user_password']; ?></td>
                                        <td class="admin_user_email"><?php echo $usr_det['admin_user_password']; ?></td>
                                        <td class="admin_user_group"><?php echo $usr_det['user_group_name']; ?></td>
                                        <td class="admin_user_status"><?php 
                                        if ($usr_det['admin_user_status'] == 1) 
                                          echo "Active";
                                        else
                                          echo "Inactive";
                                        ?></td>
                                        <td class="created_date"><?php echo date("d/m/Y", strtotime($usr_det["admin_user_created_date"])); ?></td>
                                        <td class="edit_section">
                                        	<a class="ajaxEdit" id="column<?php echo $i; ?>" href="javascript:;" data-id="<?php echo $usr_det['admin_user_id']; ?>">Edit</a>
                                        </td>
                                        <td><a class="ajaxDelete" id="column<?php echo $i; ?>" onclick="Confirm.show()" data-id="<?php echo $usr_det['admin_user_id']; ?>">Delete</a></td>
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
    var inputType = new Array("text","text","text","select","select"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("admin_user_name","admin_user_password","admin_user_email","admin_user_group","admin_user_status"); // Set name of input types
    var placeholder = new Array("Enter User Name","Enter Password","Enter Email","Select User Group","Select Status"); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table    
    var admin_user_group_option = new Array("Select User Group","Super Admin","Moderate Admin"); 
    var admin_user_group_value = new Array("1","0"); 
    var admin_user_status_option = new Array("Select Status","Active","Inactive"); 
    var admin_user_status_value = new Array("1","0");
  </script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>

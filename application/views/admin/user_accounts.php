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
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <!-- <h3 class="page-title">
                     Teachers Recruit
                     <small>Admin Users</small>
                  </h3> -->
                   <ul class="breadcrumb">
                       <li>
                           <a href="<?php echo base_url(); ?>main/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="<?php echo base_url(); ?>main/user_accounts">Admin Users</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>main/user_accounts">User Accounts</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i>User Accounts</h4>
                            <span class="loader_holder hide_loader"> </span>
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
                                    </div>
                                </div>
                                
                                <form method="post" action="user_accounts" class="admin_module_form" id="users_accounts_form_tbl">
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
                                        <th>User Name</th>
                                        <th>Password</th>
                                        <th>Email</th>
                                        <th>User Group</th>
                                        <!-- <th>Is Main Admin?</th> -->
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
                                      $session_data = $this->session->userdata("admin_login_session");
                                      if(!empty($user_details)) :
                                      $i=1;
                                      foreach ($user_details as $usr_det) :
                                    ?>
                                    <tr class="parents_tr user_accts_table" id="column<?php echo $i; ?>">
                                        <td class="admin_user_name"><?php echo $usr_det['admin_user_name']; ?></td>
                                        <td class="admin_user_password"><?php echo $usr_det['admin_user_password']; ?></td>
                                        <td class="admin_user_email"><?php echo $usr_det['admin_user_email']; ?></td>
                                        <td class="admin_user_group"><?php echo $usr_det['user_group_name']; ?>
                                        <input type="hidden" value="<?php echo $usr_det['user_group_id']; ?>" />
                                        </td>
                                        <!-- <td class="is_main_admin">
                                        <?php 
                                        // if ($usr_det['is_main_admin'] == 1) 
                                        //   echo "Yes";
                                        // else
                                        //   echo "No";
                                        ?>
                                        </td> -->
                                        <td class="admin_user_status"><?php 
                                        if ($usr_det['admin_user_status'] == 1) 
                                          echo "Active";
                                        else
                                          echo "Inactive";
                                        ?>
                                        <input type="hidden" value="<?php echo $usr_det['admin_user_status']; ?>" />
                                        </td>
                                        <td class="created_date">
                                          <?php 
                                            $created_datetime = explode(' ', $usr_det['admin_user_created_date']);
                                            echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                                          ?>
                                        </td>
                                        <?php 
                                        if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): 
                                          if($usr_det['is_super_admin'] || $usr_det['admin_user_id'] == $session_data['admin_user_id']):
                                          echo "<td class='edit_section'>-</td>";
                                          else:
                                        ?> 
                                        <td class="edit_section">
                                        	<a class="ajaxEdit" id="column<?php echo $i; ?>" href="javascript:;" data-id="<?php echo $usr_det['admin_user_id']; ?>">Edit</a>
                                        </td>
                                        <?php 
                                          endif;
                                        endif; ?>
                                        <?php 
                                        if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): 
                                          if($usr_det['is_super_admin'] || $session_data['admin_user_id'] == $usr_det['admin_user_id']):
                                          echo "<td class='delete_section'>-</td>";
                                          else:
                                        ?> 
                                        <td class="delete_section"><a class="ajaxDelete" id="column<?php echo $i; ?>"  data-id="<?php echo $usr_det['admin_user_id']; ?>">Delete</a></td>
                                        <?php 
                                          endif;
                                        endif; ?>
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
    //Below code Commented for future use (when handle multiple super admin)
    // var inputType = new Array("text","text","text","select","label","select"); 
    var inputType = new Array("text","text","text","select","select");
    // Set type of input which are you have used like text, select,textarea.

    // var columns = new Array("admin_user_name","admin_user_password","admin_user_email","admin_user_group","is_main_admin","admin_user_status");
    var columns = new Array("admin_user_name","admin_user_password","admin_user_email","admin_user_group","admin_user_status"); 
    // Set name of input types
    var placeholder = new Array("Enter User Name","Enter Password","Enter Email"); // Set placeholder of input types
    var class_selector = new Array("","","","","","");//To set class for element
    var maxlength = new Array("50","20","","",""); //To set maxlength for element
    var table = "admin_table"; // Set classname of table  
    var admin_user_group_option = new Array("Select Group");
    var admin_user_group_value = new Array("");
    <?php
    if(!empty($user_groups)) :
    foreach ($user_groups as $grp_val) :
    ?>
      admin_user_group_option.push("<?php echo $grp_val['user_group_name']; ?>");
      admin_user_group_value.push("<?php echo $grp_val['user_group_id']; ?>");
    <?php
    endforeach;
    endif;
    ?>  
    var admin_user_status_option = new Array("Select Status","Active","Inactive"); 
    var admin_user_status_value = new Array("","1","0");
  </script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>

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
<?php include "templates/header.php"?>
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
                     <small>Admin Users</small>
                  </h3> -->
                   <ul class="breadcrumb">
                       <li>
                           <a href="<?php echo base_url(); ?>main/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="<?php echo base_url(); ?>main/user_accounts">Admin Users</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>main/privileges">Privileges</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i>Privileges</h4>
                            <span class="loader_holder hide_loader"> </span>
                        </div>
                        <p class='privilege_status' style="display:none;"></p>
                       
                        <form method="post" class="admin_module_form form_table_scl privilege_form hori_scroll" action="privileges" id="privileges_form"> 
                          <div class="widget-body">
                                  <div class="portlet-body">
                                    <div class="clearfix">
                                        <!-- <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn green add_new">
                                                Add New <i class="icon-plus"></i>
                                            </button>
                                        </div> -->
                                        <div class="btn-group pull-right">
                                            
                                        </div>
                                    </div> 
                                  </div> <!-- portlet-body -->
                                  <!-- class="admin_module_form" -->
                                  <table class="table table-striped table-hover table-bordered privileges_table" id="sample_editable_1">
                                      <thead>
                                      <tr class="ajaxTitle">
                                          <th class="not-sort">Module Name</th>
                                          <?php   
                                          foreach ($admin_group as $group) : ?>
                                              <th class="not-sort"> 
                                              <?php echo ucwords($group['user_group_name']); ?>
                                              </th>
                                          <?php 
                                          endforeach ?>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                          // echo "<pre>";
                                          // print_r($admin_modules_list);
                                          // echo "</pre>";
                                          if(!empty($admin_modules_list)) :
                                          foreach ($admin_modules_list as $mod) :
                                          $mod['module_id'] = is_array($mod['module_id'])?$mod['module_id']:(array)$mod['module_id'];  
                                          $mod['sub_module'] = is_array($mod['sub_module'])?$mod['sub_module']:(array)$mod['sub_module'];
                                          $mod['operation_available'] = is_array($mod['operation_available'])?$mod['operation_available']:(array)$mod['operation_available'];
                                          $sub_module_data = array_map(null,$mod['module_id'], $mod['sub_module'],$mod['operation_available']);
                                          // echo "<pre>";
                                          // print_r($sub_module_data);
                                          // echo "</pre>";
                                      ?>
                                      <!--- First Module Description -->
                                      <tr class="parents_tr" id="">
                                          <td class="main_module"><?php echo strtoupper($mod['main_module']); ?></td>
                                           <?php   
                                          foreach ($admin_group as $group) : ?>
                                            <td class=""></td> 
                                          <?php 
                                          endforeach ?>                                      
                                      </tr>
                                      <?php  
                                          foreach ($sub_module_data as $sub) :
                                      ?>
                                          <tr class="parents_tr module_data" id="">
                                              <td class="sub_module"> <input type="hidden" name="module_id" class="module_id" value="<?php echo $sub[0] ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo ucwords($sub[1]); ?></td>
                                              <?php 
                                                foreach ($admin_group as $group) : 
                                                $group['access_module_id'] = is_array($group['access_module_id'])?$group['access_module_id']:(array)$group['access_module_id'];  
                                                $group['access_permission'] = is_array($group['access_permission'])?$group['access_permission']:(array)$group['access_permission'];
                                                $mapped_privileges = array_map(null,$group['access_module_id'], $group['access_permission']);
                                                $group_id = $group['user_group_id'];
                                                $module_id = $sub[0];
                                                $access_priveleges = is_array($sub[2])?$sub[2]:explode(",",$sub[2]); 
                                              ?>
                                                  <td class="admin_options module_inner_data">
                                                    <input type="hidden" name="group_id" class="group_id" value="<?php echo $group['user_group_id']?>">
                                                  	<select data-placeholder="Select Options" class="chosen span6 access_operation" multiple="multiple" tabindex="6" name="access_operation[]">
                                                    <?php 
                                                    $operation_array = array('add'=>'Add','edit'=>'Edit','view'=>'View','delete'=>'Delete');
                                                  foreach($operation_array as $key => $value):
                                                      if(in_array($key, $access_priveleges)): ?>
                                                        <option value="<?php echo $key; ?>" <?php $result = get_privileges($mapped_privileges,$module_id,$key); if(!empty($result)) echo "selected";?>><?php echo $value; ?></option>
                                                  <?php 
                                                    endif;
                                                    endforeach;
                                                  ?>
          			                                   </select>
          										                    </td>
                                              <?php 
                                                endforeach; 
                                              ?>
                                          </tr>
                                      <?php
                                          endforeach;
                                          endforeach;
                                          endif;
                                      ?>                            
                                      </tbody>
                                  </table>
                              </div>
                          <div class="form-actions">
                             <button type="submit" class="btn btn-success">Update</button>
                             <!-- <button type="button" class="btn">Cancel</button> -->
                          </div>
                        </form>
                      
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
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>
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
                           <a href="<?php echo base_url(); ?>admin/user_accounts">Admin Users</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>admin/privileges">Privileges</a><span class="divider-last">&nbsp;</span></li>
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
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <!-- <div class="btn-group">
                                        <button id="sample_editable_1_new" class="btn green add_new">
                                            Add New <i class="icon-plus"></i>
                                        </button>
                                    </div> -->
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
                                <form method="post" class="admin_module_form form_table_scl privilege_form" action="privileges" id="privileges_form"> <!-- class="admin_module_form" -->
                                <table class="table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                                    <thead>
                                    <tr class="ajaxTitle">
                                        <th>Module Name</th>
                                        <?php 
                                        foreach ($admin_group as $group) : ?>
                                            <th> 
                                            <?php echo ucwords($group['user_group_name']); ?>
                                            </th>
                                        <?php 
                                        endforeach ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        // echo "<pre>";
                                        // print_r($admin_modules);
                                        // echo "</pre>";
                                        if(!empty($admin_modules)) :
                                        foreach ($admin_modules as $mod) :
                                        $mod['module_id'] = is_array($mod['module_id'])?$mod['module_id']:(array)$mod['module_id'];  
                                        $mod['sub_module'] = is_array($mod['sub_module'])?$mod['sub_module']:(array)$mod['sub_module'];
                                        // echo "<pre>";
                                        // print_r(array_map(null,$mod['module_id'], $mod['sub_module']));
                                        // echo "</pre>";
                                        $sub_module_data = array_map(null,$mod['module_id'], $mod['sub_module']);
                                    ?>
                                    <!--- First Module Description -->
                                    <tr class="parents_tr" id="column1">
                                        <td class="main_module"><?php echo strtoupper($mod['main_module']); ?></td>
                                        <td class=""></td>
                                        <td class=""></td>
                                    </tr>
                                    <?php  
                                        foreach ($sub_module_data as $sub) :
                                    ?>
                                        <tr class="parents_tr module_data" id="column2">
                                            <td class="sub_module"> <input type="hidden" name="module_id" class="module_id" value="<?php echo $sub[0] ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo ucwords($sub[1]); ?></td>
                                            <?php 
                                              foreach ($admin_group as $group) : 
                                              $group['access_module_id'] = is_array($group['access_module_id'])?$group['access_module_id']:(array)$group['access_module_id'];  
                                              $group['access_permission'] = is_array($group['access_permission'])?$group['access_permission']:(array)$group['access_permission'];
                                              $mapped_privileges = array_map(null,$group['access_module_id'], $group['access_permission']);
                                              
                                              $group_id = $group['user_group_id'];
                                              $module_id = $sub[0];
                                              // array_push($mapped_privileges,$group_id);
                                              // echo "<pre>";
                                              // print_r($mapped_privileges);
                                              // echo "</pre>";

                                            ?>
                                                <td class="admin_options module_inner_data">
                                                  <input type="hidden" name="group_id" class="group_id" value="<?php echo $group['user_group_id']?>">
                                                	<select data-placeholder="Select Options" class="chosen span6 access_operation" multiple="multiple" tabindex="6" name="access_operation[]">
        			                                       <option value="add">Add</option>
        			                                       <option value="edit">Edit</option>
                                                     <option value="delete">Delete</option>
        			                                       <option value="view">View</option>
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
                                <div class="form-actions">
	                              <button type="submit" class="btn btn-success">Update</button>
	                              <!-- <button type="button" class="btn">Cancel</button> -->
                                </div>
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
<?php include "templates/footer_grid.php" ?>
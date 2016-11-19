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
                       <li><a href="<?php echo base_url(); ?>admin/languages">Language</a><span class="divider-last">&nbsp;</span></li>
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

                                 
    
                                    <?php
                                    if(!empty($qualification_type_values)) :
                                    foreach ($qualification_type_values as $qua_val) :
                                    ?>
                                      <tr class="parents_tr" id="column<?php echo $qua_val['educational_qualification_id']; ?>">

                                        <td class="educational_qualification">
                                          <?php echo $qua_val['educational_qualification']; ?>
                                        </td>
                                        <td class="educational_qualification_course_type">
                                          <?php 
                                          $course_type = unserialize(COURSE_TYPE);
                                          echo $course_type[$qua_val['educational_qualification_course_type']];
                                          ?>
                                        </td>
                                        <td class="educational_qualifcation_inst_type_id">
                                          <?php echo $qua_val['institution_type_name']; ?>
                                        </td>
                                        <td class=" educational_qualification_status"> 
                                          <?php 
                                          if ($qua_val['educational_qualification_status'] == 1) 
                                            echo "Active";
                                          else
                                            echo "Inactive";
                                          ?>
                                        </td>
                                        <td class="educational_qualification_created_date">
                                          <?php echo $qua_val['educational_qualification_created_date']; ?>
                                        </td>

                                        <td class="edit_section">
                                          <a class="ajaxEdit" id="column<?php echo $qua_val['educational_qualification_id']; ?>" href="javascript:;" data-id="<?php echo $qua_val['educational_qualification_id']; ?>">
                                              Edit
                                          </a>
                                        </td>
                                        <td>
                                          <a class="ajaxDelete" href="#myModal1" data-toggle="modal" data-id="<?php echo $qua_val['educational_qualification_id']; ?>">
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



                                  <tr class="parents_tr" id="column1">
                                        <td class="language_name">Tamil</td>
                                        <td class="is_mother_tangue">Yes</td>
                                        <td class="is_medium_of_instuction">No</td>
                                        <td class="language_status">Active</td>
                                        <td class="created_date">01-01-2000</td>
                                        <td class="edit_section">
                                        	<a class="ajaxEdit" id="column1" href="javascript:;">Edit</a>
                                        </td>
                                        <td><a class="ajaxDelete" id="column1" href="#myModal1" data-toggle="modal">Delete</a></td>
                                    </tr>
                                    <tr class="parents_tr" id="column2">
                                        <td class="language_name">English</td>
                                        <td class="is_mother_tangue">No</td>
                                        <td class="is_medium_of_instuction">Yes</td>
                                        <td class="language_status">Inactive</td>
                                        <td class="created_date">01-01-2000</td>
                                        <td class="edit_section">
                                        	<a class="ajaxEdit" id="column2" href="javascript:;">Edit</a>
                                        </td>
                                        <td><a class="ajaxDelete" id="column2" href="#myModal1" data-toggle="modal">Delete</a></td>
                                    </tr>
                                    <tr class="parents_tr" id="column3">
                                        <td class="language_name">French</td>
                                        <td class="is_mother_tangue">No</td>
                                        <td class="is_medium_of_instuction">No</td>
                                        <td class="language_status">Active</td>
                                        <td class="created_date">01-01-2000</td>
                                        <td class="edit_section">
                                        	<a class="ajaxEdit" id="column3" href="javascript:;">Edit</a>
                                        </td>
                                        <td><a class="ajaxDelete" id="column3" href="#myModal1" data-toggle="modal">Delete</a></td>
                                    </tr>
                                    <!-- <tr class="">
                                        <td>vectorlab</td>
                                        <td>dk mosa</td>
                                        <td>132</td>
                                        <td class="center">elite user</td>
                                        <td><a class="edit" href="javascript:;">Edit</a></td>
                                        <td><a class="delete" href="javascript:;">Delete</a></td>
                                    </tr>
                                    <tr class="">
                                        <td>Admin</td>
                                        <td> Admin lab</td>
                                        <td>462</td>
                                        <td class="center">new user</td>
                                        <td><a class="edit" href="javascript:;">Edit</a></td>
                                        <td><a class="delete" href="javascript:;">Delete</a></td>
                                    </tr>
                                    <tr class="">
                                        <td>Rafiqul</td>
                                        <td>Rafiqul dulal</td>
                                        <td>62</td>
                                        <td class="center">new user</td>
                                        <td><a class="edit" href="javascript:;">Edit</a></td>
                                        <td><a class="delete" href="javascript:;">Delete</a></td>
                                    </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-body delete_message_style">
								<input type="hidden" name="delete" id="vId" value=""/>
								<button type="button" class="close popup_tx" data-dismiss="modal" aria-hidden="true">
									&times;
								</button>
								<center class="popup_tx">
									<h5>Are you sure you want to delete this item? </h5>
								</center>
							</div>
							<div id="delete_btn" class="modal-footer footer_model_button" >
								<a name="action" class="btn btn-danger popup_btn yes_btn_act" id="popup_btn1" value="Delete">Yes</a>    
								<button type="button" class="btn btn-info popup_btn" id="popup_btn" data-dismiss="modal">No</button>
							</div>
				   		 </div><!--/row-->
				    </div>
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
    var columns = new Array("language_name","is_mother_tangue","is_medium_of_instuction","language_status"); // Set name of input types
    var placeholder = new Array("Enter Language Name",""); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table
    var is_mother_tangue_option = new Array("Yes","No"); 
    var is_mother_tangue_value = new Array("1","0");
    var is_medium_of_instuction_option = new Array("Yes","No"); 
    var is_medium_of_instuction_value = new Array("1","0");
    var language_status_option = new Array("Active","Inactive"); // Set optiontext for select option which must have name of the select tag with '_option' . ex. select tag name is status means , the variable of the select optiontext should be as 'status_option'
    var language_status_value = new Array("1","0"); // Set value for select optionvalue which must have name of the select tag with '_value' . ex. select tag name is status means , the variable of the select optionvalue should be as 'status_value'
  </script>
<?php include "templates/footer_grid.php" ?>
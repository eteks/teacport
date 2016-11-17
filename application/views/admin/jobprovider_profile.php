<?php
if(!empty($this->session->userdata("login_status"))): 
?>
<?php if(!$this->input->is_ajax_request()) { ?>
<?php include "templates/header.php" ?>
   <!-- BEGIN CONTAINER -->
  <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div id="sidebar" class="nav-collapse collapse">
         <div class="sidebar-toggler hidden-phone"></div>
         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          
         <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR -->
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
                           <a href="editable_table.html#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="<?php echo base_url(); ?>admin/job_provider_profile">Job Providers</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>admin/job_provider_profile">Job Provider Profile</a><span class="divider-last">&nbsp;</span></li>
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

                                <form method="post" action="adminindex/state" class="admin_module_form" id="state_form">
                                <?php } ?>
                                <?php
                                if(!empty($status)) :
                                  echo "<p class='db_status'> $status </p>";
                                endif;
                                ?> 
                                <p class='val_error'> <p>
                                <table class="bordered table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                                  <thead>
                                    <tr class="ajaxTitle">
                                      <th> Organization Name </th>
                                      <th> Registrant Name </th>
                                      <th> Profile Completeness </th>
                                      <th> Transaction ID </th>
                                      <th> Subcription Plan </th>
                                      <th> Status </th>
                                      <th> Created Date</th>
                                      <th> Edit </th>
                                      <th> Delete </th>
                                      <th> Full View Details </th>
                                    </tr>
                                  </thead>
                                  <tbody>                                   
                                    <tr class="parents_tr" id="column">
<<<<<<< HEAD
                                      <td class="organization_name"> 
                                      </td>
                                      <td class="organization_logo"> 
                                      </td>
                                      <td class="organization_address_1"> 
                                      </td>
                                      <td class="organization_address_2"> 
                                      </td>
                                      <td class="organization_address_3"> 
                                      </td>
                                      <td class="organization_district_id"> 
                                      </td>
                                      <td class="organization_institution_type_id"> 
                                      </td>
                                      <td class="registrant_register_type"> 
                                      </td>
                                      <td class="registrant_name"> 
                                      </td>
                                      <td class="registrant_designation"> 
                                      </td>
                                      <td class="registrant_date_of_birth"> 
                                      </td>
                                      <td class="registrant_email_id"> 
                                      </td>
                                      <td class="registrant_mobile_no"> 
                                      </td>
                                      <td class="is_sms_verified"> 
                                      </td>
                                      <td class="transcation_id"> 
                                      </td>
                                      <td class="subcription_id"> 
                                      </td>
                                      <td class="organization_profile_completeness"> 
                                      </td>
                                      <td class="organization_sms_count"> 
                                      </td>
                                      <td class="organization_resume_download_count"> 
                                      </td>
                                      <td class="organization_sms_remaining_count"> 
                                      </td>
                                      <td class="organization_remaining_resume_download_count"> 
                                      </td>
                                      <td class="organization_status"> 
=======
                                      <td class=""> Organization 
                                      </td>
                                      <td class="">Name1 
                                      </td>
                                      <td class="">100%
                                      </td>
                                      <td class="">1234
                                      </td>
                                      <td class="">3333
                                      </td>
                                      <td class="">Active 
>>>>>>> 452ab8bfe66b0cc392ecd583b37ce2487606bc04
                                      </td>
                                      <td class=""> 00-00-0000
                                      </td>                                      
                                      <td class="edit_section">
                                        <a class="job_edit" data-popup-open="popup-1">
                                          Edit
                                        </a>
                                      </td>
                                      <td>
                                        <a class="job_delete" href="#myModal1" data-toggle="modal">
                                          Delete
                                        </a>
                                      </td>
                                      <td>
                                        <a class="job_full_view" data-popup-open-sec="popup-1">
                                          Full View
                                        </a>
                                      </td>
                                    </tr>
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
            <!---Full edit popup --->
          <div class="popup-sec" data-popup-sec="popup-1">
                 <div class="popup-inner">				
				<div class="widget box blue" id="form_wizard_1">
                     <div class="widget-title">
                        <h4>
                           <i class="icon-reorder"></i> Job Providers Profile
                        </h4>                        
                     </div>
                     <div class="widget-body form">
                        <form action="form_wizard.html#" class="form-horizontal">
                           <div class="form-wizard">
                              <div class="navbar steps">
                                 <div class="navbar-inner">
                                    <ul class="row-fluid">
                                       <li class="span4">
                                          <a href="form_wizard.html#tab1" data-toggle="tab" class="step active">
                                          <span class="number">1</span>
                                          <span class="desc"><i class="icon-ok"></i>Organization Details</span>
                                          </a>
                                       </li>
                                       <li class="span4">
                                          <a href="form_wizard.html#tab2" data-toggle="tab" class="step">
                                          <span class="number">2</span>
                                          <span class="desc"><i class="icon-ok"></i>Registrant Details</span>
                                          </a>
                                       </li>
                                       <li class="span4">
                                          <a href="form_wizard.html#tab3" data-toggle="tab" class="step">
                                          <span class="number">3</span>
                                          <span class="desc"><i class="icon-ok"></i>Addtional Details</span>
                                          </a>
                                       </li>
                                       <!-- <li class="span3">
                                          <a href="form_wizard.html#tab4" data-toggle="tab" class="step">
                                          <span class="number">4</span>
                                          <span class="desc"><i class="icon-ok"></i> Final Step</span>
                                          </a> 
                                       </li> -->
                                    </ul>
                                 </div>
                              </div>
                              <div id="bar" class="progress progress-striped">
                                 <div class="bar"></div>
                              </div>
                              <div class="tab-content">
                                 <div class="tab-pane active" id="tab1">
                                    <h3>Fill up step 1</h3>
                                    <div class="control-group">
                                       <label class="control-label">Username</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">Give your username</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Email</label>
                                       <div class="controls">
                                          <input type="password" class="span6" />
                                          <span class="help-inline">Give your Email</span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="tab2">
                                    <h4>Fill up step 2</h4>
                                    <div class="control-group">
                                       <label class="control-label">First Name</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">Give your First Name</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Last Name</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">Give your Last Name</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Phone Number</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">Give your phone number</span>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- <div class="tab-pane" id="tab3">
                                    <h4>Fill up step 3</h4>
                                    <div class="control-group">
                                       <label class="control-label">Text Input</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline"></span>
                                       </div>
                                    </div>

                                    <div class="control-group">
                                       <label class="control-label">Checkbox and radio Options</label>
                                       <div class="controls">
                                          <label class="checkbox line">
                                          <input type="checkbox" value="" /> Lorem ipsum dolor imti
                                          </label>
                                          <label class="radio line">
                                          <input type="radio" value="" /> Duis autem vel eum iriure dolor in hendrerit
                                          </label>
                                       </div>
                                    </div>
                                 </div> -->
                                 <div class="tab-pane" id="tab3">
                                    <h4>Final step</h4>
                                    <div class="control-group">
                                       <label class="control-label">Fullname:</label>
                                       <div class="controls">
                                          <span class="text">Mosaddek Hossain</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Email:</label>
                                       <div class="controls">
                                          <span class="text">dkmosa@gmail.com</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Phone:</label>
                                       <div class="controls">
                                          <span class="text">123456789</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label"></label>
                                       <div class="controls">
                                          <label class="checkbox">
                                          <input type="checkbox" value="" /> I confirm my steps
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-actions clearfix">
                                 <a href="javascript:;" class="btn button-previous">
                                 <i class="icon-angle-left"></i> Back 
                                 </a>
                                 <a href="javascript:;" class="btn btn-primary blue button-next">
                                 Continue <i class="icon-angle-right"></i>
                                 </a>
                                 <a href="javascript:;" class="btn btn-success button-submit">
                                 Submit <i class="icon-ok"></i>
                                 </a>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
				 <p><a data-popup-close-sec="popup-1" href="#">Close</a></p>
           <a class="popup-close-sec" data-popup-close-sec="popup-1" href="#">x</a>
           </div>
       </div>
            <!-- Edit Popup-->
            <div class="popup" data-popup="popup-1">
                 <div class="popup-inner">				
				<div class="widget box blue" id="form_wizard_1">
                     <div class="widget-title">
                        <h4>
                           <i class="icon-reorder"></i> Job Provider Profile
                        </h4>                        
                     </div>
                     <div class="widget-body form">
                        <form action="form_wizard.html#" class="form-horizontal">
                           <div class="form-wizard">
                              <div class="navbar steps">
                                 <div class="navbar-inner">
                                    <ul class="row-fluid">
                                       <li class="span3">
                                          <a href="form_wizard.html#tab1" data-toggle="tab" class="step active">
                                          <span class="number">1</span>
                                          <span class="desc"><i class="icon-ok"></i> Step 1</span>
                                          </a>
                                       </li>
                                       <li class="span3">
                                          <a href="form_wizard.html#tab2" data-toggle="tab" class="step">
                                          <span class="number">2</span>
                                          <span class="desc"><i class="icon-ok"></i> Step 2</span>
                                          </a>
                                       </li>
                                       <li class="span3">
                                          <a href="form_wizard.html#tab3" data-toggle="tab" class="step">
                                          <span class="number">3</span>
                                          <span class="desc"><i class="icon-ok"></i> Step 3</span>
                                          </a>
                                       </li>
                                       <li class="span3">
                                          <a href="form_wizard.html#tab4" data-toggle="tab" class="step">
                                          <span class="number">4</span>
                                          <span class="desc"><i class="icon-ok"></i> Final Step</span>
                                          </a> 
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div id="bar" class="progress progress-striped">
                                 <div class="bar"></div>
                              </div>
                              <div class="tab-content">
                                 <div class="tab-pane active" id="tab1">
                                    <h3>Fill up step 1</h3>
                                    <div class="control-group">
                                       <label class="control-label">Username</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">Give your username</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Email</label>
                                       <div class="controls">
                                          <input type="password" class="span6" />
                                          <span class="help-inline">Give your Email</span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="tab2">
                                    <h4>Fill up step 2</h4>
                                    <div class="control-group">
                                       <label class="control-label">First Name</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">Give your First Name</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Last Name</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">Give your Last Name</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Phone Number</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline">Give your phone number</span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="tab3">
                                    <h4>Fill up step 3</h4>
                                    <div class="control-group">
                                       <label class="control-label">Text Input</label>
                                       <div class="controls">
                                          <input type="text" class="span6" />
                                          <span class="help-inline"></span>
                                       </div>
                                    </div>

                                    <div class="control-group">
                                       <label class="control-label">Checkbox and radio Options</label>
                                       <div class="controls">
                                          <label class="checkbox line">
                                          <input type="checkbox" value="" /> Lorem ipsum dolor imti
                                          </label>
                                          <label class="radio line">
                                          <input type="radio" value="" /> Duis autem vel eum iriure dolor in hendrerit
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="tab4">
                                    <h4>Final step</h4>
                                    <div class="control-group">
                                       <label class="control-label">Fullname:</label>
                                       <div class="controls">
                                          <span class="text">Mosaddek Hossain</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Email:</label>
                                       <div class="controls">
                                          <span class="text">dkmosa@gmail.com</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label">Phone:</label>
                                       <div class="controls">
                                          <span class="text">123456789</span>
                                       </div>
                                    </div>
                                    <div class="control-group">
                                       <label class="control-label"></label>
                                       <div class="controls">
                                          <label class="checkbox">
                                          <input type="checkbox" value="" /> I confirm my steps
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-actions clearfix">
                                 <a href="javascript:;" class="btn button-previous">
                                 <i class="icon-angle-left"></i> Back 
                                 </a>
                                 <a href="javascript:;" class="btn btn-primary blue button-next">
                                 Continue <i class="icon-angle-right"></i>
                                 </a>
                                 <a href="javascript:;" class="btn btn-success button-submit">
                                 Submit <i class="icon-ok"></i>
                                 </a>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
				 <p><a data-popup-close="popup-1" href="#">Close</a></p>
           <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
           </div>
       </div>       
       <!-- Delete Popup -->       
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
            <!-- END ADVANCED TABLE widget-->

            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
  </div>
  <script>
    // Define default values
    var inputType = new Array("text","select"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("state_name","state_status"); // Set name of input types
    var placeholder = new Array("Enter State Name",""); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table
    var organization_institution_type_id_option = new Array("Please select institution");
    var organization_institution_type_id_value = new Array("");
    <?php foreach ($variable as $key => $value): ?>
      
    <?php endforeach ?>







    var state_status_option = new Array("Please select status","Active","Inactive"); 
    var state_status_value = new Array("","1","0");
  </script>

<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>

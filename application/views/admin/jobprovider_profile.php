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
                            <h4><i class="icon-reorder"></i>Job Provider Profile </h4>
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
                                       <li class="span4">
                                          <a href="form_wizard.html#tab1" data-toggle="tab" class="step active">
                                          <span class="number">1</span>
                                          <span class="desc"><i class="icon-ok"></i>Organization Details</span>
                                          </a>
                                       </li>
                                       <li class="span4">
                                          <a href="form_wizard.html#tab2" data-toggle="tab" class="step">
                                          <span class="number">2</span>
                                          <span class="desc"><i class="icon-ok"></i> Organization Address</span>
                                          </a>
                                       </li>
                                       <li class="span4">
                                          <a href="form_wizard.html#tab3" data-toggle="tab" class="step">
                                          <span class="number">3</span>
                                          <span class="desc"><i class="icon-ok"></i> Registrant Details</span>
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
                                    <h4>Organization Details</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Organization Name</label>
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Institution Type</label>
                                       <div class="controls input_field_width">
                                           <select class="popup_select">
											  <option>Schools</option>
											  <option>Engineering</option>
											  <option>Arts & Science</option>
											</select> 
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Organization Status</label>
                                          <select class="popup_select">
											  <option>Active</option>
											  <option>Inactive</option>
											</select>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                    <label class="control-label">Organization Logo</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail uploaded_img">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail uploaded_img_preview"></div>
                                            <div class="select_chng_rmv">
                                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input type="file" class="default" /></span>
                                                <a href="form_component.html#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                   </div>                                   
                                 </div>
                                 <div class="tab-pane" id="tab2">
                                    <h4>Organization Address</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Organization Address1</label>
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Organization Address2</label>
                                       <div class="controls input_field_width">
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Organization Address3</label>
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">District Name</label>
                                       <div class="controls input_field_width">
                                         <select class="popup_select">
											  <option>Madurai</option>
											  <option>Chennai</option>
											  <option>Puducherry</option>
											  <option>Trichy</option>
											</select> 
                                       </div>
                                    </div>
                                   </div>                                   
                                 </div>
                                 <div class="tab-pane" id="tab3">
                                    <h4>Registrant Details</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Registrant Name</label>
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Designation</label>
                                       <div class="controls input_field_width">
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Date Of Birth</label>
                                          <input class=" m-ctrl-medium date-picker dp_width" size="16" type="text" value="12-02-2012" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Email ID</label>
                                       <div class="controls input_field_width">
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Mobile No</label>
                                          <input type="text" class="span6" />
                                       </div>
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
                                    </ul>
                                 </div>
                              </div>
                              <div id="bar" class="progress progress-striped">
                                 <div class="bar"></div>
                              </div>
                              <div class="tab-content">
                                 <div class="tab-pane active" id="tab1">
                                    <h4>Organization Details</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Organization Name</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Organization Logo</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Organization Address1</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Organization Address2</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Organization Address3</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">District Name</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Institution Type</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Organization Status</label>
                                    </div>
                                   </div>
                                 </div>
                                 <div class="tab-pane" id="tab2">
                                    <h4>Registrant Details</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Registrant Name</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Register Type</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Designation</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Date Of Birth</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Email ID</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Mobile No</label>
                                    </div>
                                   </div>
                                 </div>
                                 <div class="tab-pane" id="tab3">
                                    <h4>Addtional Details</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Is SMS Verified</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Transcation ID</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Subcription Plan</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Total SMS Count</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Remaining SMS Count</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Total Resume Count</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Remaining Resume Count</label>
                                       </div>
                                    </div>
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
				 <p><a data-popup-close-sec="popup-1" href="#">Close</a></p>
           <a class="popup-close-sec" data-popup-close-sec="popup-1" href="#">x</a>
            </div>
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

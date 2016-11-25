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
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Teachers Recruit
                     <small>Job Seekers</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="editable_table.html#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="<?php echo base_url(); ?>admin/job_seeker_profile">Job Seekers</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="<?php echo base_url(); ?>admin/job_seeker_profile">Job Seeker Profile</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i>Job Seeker Profile </h4>
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
                                <p class='val_error'> <p>
                                <table class="bordered table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                                  <thead>
                                    <tr class="ajaxTitle">
                                      <th> Candidate Name </th>
                                      <th> Mother Tongue </th>
                                      <th> Is Fresher </th>
                                      <th> Live District </th>
                                      <th> Email </th>
                                      <th> Mobile No </th>
                                      <th> Resume Upload Path</th>
                                      <th> Status </th>
                                      <th> Created Date</th>
                                      <th> Edit </th>
                                      <th> Delete </th>
                                      <th> Full View Details </th>
                                    </tr>
                                  </thead>
                                  <tbody>                                   
                                    <tr class="parents_tr" id="column">
                                      <td class="">Thiru
                                      </td>
                                      <td class="">English 
                                      </td>
                                      <td class="">Yes
                                      </td>
                                      <td class="">Chennai
                                      </td>
                                      <td class="">admin@gmail.com
                                      </td>
                                      <td class="">1234567890
                                      </td>
                                      <td class="">Path
                                      </td>
                                      <td class="">Active 
                                      </td>
                                      <td class=""> 00-00-0000
                                      </td>                                      
                                      <td class="edit_section">
                                        <a class="job_edit" data-popup-open="popup_section_edit">
                                          Edit
                                        </a>
                                      </td>
                                      <td>
                                        <a class="job_delete" onclick="Confirm.show()">
                                          Delete
                                        </a>
                                      </td>
                                      <td>
                                        <a class="job_full_view"  data-popup-open="popup_section">
                                          Full View
                                        </a>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->    
                </div>                
            </div>                           
            <!---Full edit popup --->
          <div class="popup" data-popup="popup_section">
                 <div class="popup-inner">				
				<div class="widget box blue" id="popup_wizard_section">
                     <div class="widget-title">
                        <h4>
                           <i class="icon-reorder"></i> Candidate Profile
                        </h4>                        
                     </div>
                     <div class="widget-body form pop_details_section">
                        <form class="tab_form" data-index="" method="POST" data-mode="update">
                           <div id="rootwizard" class="form-wizard">
                              <div class="navbar steps">
                                 <div class="navbar-inner">
                                 	<div class="container">
                                    <ul  class="row-fluid nav nav-pills">
                                       <li class="span2">
                                          <a href="#tab1" data-toggle="tab" class="step active">
                                          <span class="number seeker_tab_num">1</span>
                                          <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Basic<br /> Info-1</span>
                                          </a>
                                       </li>
                                       <li class="span2">
                                          <a href="#tab2" data-toggle="tab" class="step">
                                          <span class="number seeker_tab_num">2</span>
                                          <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Basic<br /> Info-2</span>
                                          </a>
                                       </li>
                                       <li class="span2">
                                          <a href="#tab3" data-toggle="tab" class="step">
                                          <span class="number seeker_tab_num">3</span>
                                          <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Contact<br /> Info</span>
                                          </a>
                                       </li>
                                       <li class="span2">
                                          <a href="#tab4" data-toggle="tab" class="step">
                                          <span class="number seeker_tab_num">4</span>
                                          <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Educational<br /> Info</span>
                                          </a>
                                       </li>
                                       <li class="span2">
                                          <a href="#tab5" data-toggle="tab" class="step">
                                          <span class="number seeker_tab_num">5</span>
                                          <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Experience<br /> Info</span>
                                          </a>
                                       </li>
                                       <li class="span2">
                                          <a href="#tab6" data-toggle="tab" class="step">
                                          <span class="number seeker_tab_num">6</span>
                                          <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Professional<br /> Info</span>
                                          </a>
                                       </li>
                                    </ul>
                                   </div>
                                 </div>
                              </div>
                              <div id="bar" class="progress progress-striped active">
                                <div class="bar"></div>
                              </div>
                              <div class="tab-content">
                              	<input type="hidden" value="view" id="popup_mode" />
                                 <div class="tab-pane active" id="tab1">
                                    <h4>Candidate Basic Info-1</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Candidate Name</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Gender</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Father Initial</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Father Name</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Date Of Birth</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Marital Status</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Mother Tongue</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Language Known</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Nationality</label>
                                       </div>
                                    </div>
                                   </div>
                                 </div>
                                 <div class="tab-pane" id="tab2">
                                    <h4>Candidate Basic Info-2</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Religion</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Community</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Is Physically Challenged</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Registration Type</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Image Path</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Facebook url</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Google Plus url</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Linkedin url</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Status</label>
                                       </div>
                                    </div>
                                   </div>
                                 </div>
                                 <div class="tab-pane" id="tab3">
                                    <h4>Candidate Contact Info</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Email</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Mobile No</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">District Name</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Address 1</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Address 2</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Live District Name</label>
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
                                 <div class="tab-pane" id="tab4">
                                    <h4>Candidate Educational Info</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Candidate Profile</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Qualification Name</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Education Yop</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Medium Of Inst Name</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Subject</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Percentage</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Education Board</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Status</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Created Date</label>
                                       </div>
                                    </div>
                                   </div>
                                 </div>
                                 <div class="tab-pane" id="tab5">
                                    <h4>Candidate Experience Info</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Profile Name</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Class Level</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Experience Year</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Experience Board</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Status</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Created Date</label>
                                    </div>
                                   </div>
                                 </div>
                                 <div class="tab-pane" id="tab6">
                                    <h4>Candidate Prefessional Info</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Institution Type</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">TET Exam Status</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Interest Subject</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Extra Curricular</label>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Is Fresher</label>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Resume Upload Path</label>
                                    </div>
                                   </div>
                                 </div>
                                    <ul class="pager wizard">
			                          <li class="previous"><a href="#"><i class="icon-angle-left"></i>Previous</a></li>
			                          <li class="next"><a href="#">Next<i class="icon-angle-right"></i></a></li>
			                          <li class="finish disabled"><a href="#">Finish<i class="icon-ok"></i></a></li>
			                        </ul>
                                 </div>
                              </div>
                              </form>
                           </div>
                     </div>
				 	<p>
                  	   <a data-popup-close="popup_section" href="#">Close</a>
                	</p>
                	<a class="popup-close" data-popup-close="popup_section" href="#">x</a>
            </div>
           </div>
           <!-- Edit Popup-->
            <div class="popup" data-popup="popup_section_edit">
                 <div class="popup-inner">				
				<div class="widget box blue" id="popup_wizard_section">
                     <div class="widget-title">
                        <h4>
                           <i class="icon-reorder"></i> Candidate Profile
                        </h4>                        
                     </div>
                     <div class="widget-body form pop_details_section">
                        <form class="tab_form" data-index="" method="POST" data-mode="update">
                           <div id="rootwizard" class="form-wizard">
                              <div class="navbar steps">
                                 <div class="navbar-inner">
                                 	<div class="container">
                                    <ul  class="row-fluid nav nav-pills">
                                       <li class="span2">
                                          <a href="#tab1" data-toggle="tab" class="step active">
                                          <span class="number seeker_tab_num">1</span>
                                          <span class="desc seeker_tab_desc"><i class="icon-ok"></i>Basic<br /> Info-1</span>
                                          </a>
                                       </li>
                                       <li class="span2">
                                          <a href="#tab2" data-toggle="tab" class="step">
                                          <span class="number seeker_tab_num">2</span>
                                          <span class="desc seeker_tab_desc"><i class="icon-ok"></i> Basic<br /> Info-2</span>
                                          </a>
                                       </li>
                                       <li class="span2">
                                          <a href="#tab3" data-toggle="tab" class="step">
                                          <span class="number seeker_tab_num">3</span>
                                          <span class="desc seeker_tab_desc"><i class="icon-ok"></i> Contact<br /> Info</span>
                                          </a>
                                       </li>
                                       <li class="span2">
                                          <a href="#tab4" data-toggle="tab" class="step">
                                          <span class="number seeker_tab_num">4</span>
                                          <span class="desc seeker_tab_desc"><i class="icon-ok"></i> Educational<br /> Info</span>
                                          </a>
                                       </li>
                                       <li class="span2">
                                          <a href="#tab5" data-toggle="tab" class="step">
                                          <span class="number seeker_tab_num">5</span>
                                          <span class="desc seeker_tab_desc"><i class="icon-ok"></i> Experience<br /> Info</span>
                                          </a>
                                       </li>
                                       <li class="span2">
                                          <a href="#tab6" data-toggle="tab" class="step">
                                          <span class="number seeker_tab_num">6</span>
                                          <span class="desc seeker_tab_desc"><i class="icon-ok"></i> Professional<br /> Info</span>
                                          </a>
                                       </li>
                                    </ul>
                                   </div>
                                 </div>
                              </div>
                              <div id="bar" class="progress progress-striped active">
                                <div class="bar"></div>
                              </div>
                              <div class="tab-content">
                                 <div class="tab-pane active" id="tab1">
                                    <h4>Candidate Basic Info-1</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Candidate Name</label>
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Gender</label>
                                       <div class="controls input_field_width">
                                           <select class="popup_select">
											  <option>Male</option>
											  <option>Female</option>
											</select> 
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Father Name</label>
                                       	 <input type="text" class="span6" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Date Of Birth</label>
                                       <input class=" m-ctrl-medium date-picker dp_width" size="16" type="text" value="12-02-2012" />
                                   </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">
			                              <label class="control-label">Marrital Status</label>
			                              <div class="controls">
			                                 <label class="radio line">
			                                 <div class="radio" id="uniform-undefined"><span><input name="optionsRadios2" value="option1" style="opacity: 0;" type="radio"></span></div>
			                                 Single
			                                 </label>
			                                 <label class="radio line">
			                                 <div class="radio" id="uniform-undefined"><span class="checked"><input name="optionsRadios2" value="option2" checked="" style="opacity: 0;" type="radio"></span></div>
			                                 Married
			                                 </label>   
			                              </div>
			                           </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Mother Tongue</label>
                                        <select class="popup_select">
											  <option>English</option>
											  <option>Tamil</option>
										</select>
                                   </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">
			                              <label class="control-label">Languages Known</label>
			                              <div class="controls">
			                                 <label class="checkbox line">
			                                 <div class="checker" id="uniform-undefined"><span><input value="" style="opacity: 0;" type="checkbox"></span></div> Tamil
			                                 </label>
			                                 <label class="checkbox line">
			                                 <div class="checker" id="uniform-undefined"><span><input value="" style="opacity: 0;" type="checkbox"></span></div> English
			                                 </label>
			                              </div>
			                           </div>
                                   </div>                                   
                               </div>
                                 <div class="tab-pane" id="tab2">
                                    <h4>Candidate Basic Info-2</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Nationality</label>
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Religion</label>
                                       <div class="controls input_field_width">
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Community</label>
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Is Physically Challenged</label>
                                       <div class="controls input_field_width">
                                       	   <input type="text" class="span6" />
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Image Path</label>
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Status</label>
                                       <div class="controls input_field_width">
                                       	   <select class="popup_select">
											  <option>Active</option>
											  <option>Inactive</option>
											</select>
                                       </div>
                                    </div>
                                   </div>                                    
                                 </div>
                                 <div class="tab-pane" id="tab3">
                                    <h4>Candidate Contact info</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Email</label>
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Mobile No</label>
                                       <div class="controls input_field_width">
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">District Name</label>
                                          <select class="popup_select">
											  <option>Puducherry</option>
											  <option>Chennai</option>
											  <option>Karaikal</option>
											</select>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Address 1</label>
                                       <div class="controls input_field_width">
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Address 2</label>
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Live District Name</label>
                                       <div class="controls input_field_width">
                                          <select class="popup_select">
											  <option>Puducherry</option>
											  <option>Chennai</option>
											  <option>Karaikal</option>
											</select>
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Pincode</label>
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                   </div>
                                 </div>
                                 <div class="tab-pane" id="tab4">
                                    <h4>Candidate Educational info</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Profile ID</label>
                                           <select class="popup_select">
											  <option>Profile</option>
											  <option>Profile</option>
											  <option>Profile</option>
											</select>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Qualification Name</label>
                                       <div class="controls input_field_width">
                                          <select data-placeholder="Select Options" class="chosen span6" multiple="multiple" tabindex="6">
			                                       <option>B.E</option>
			                                       <option>B.Sc</option>
			                                       <option>B.A</option>
			                                       <option>B.Com</option>
			                                </select>
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Education YOP</label>
                                            <input type="text" class="span6" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Medium Of Inst Name</label>
                                       <div class="controls input_field_width">
                                          <select class="popup_select">
											  <option>English</option>
											  <option>Tamil</option>
											</select>
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Subject</label>
                                          <select class="popup_select">
											  <option>Maths</option>
											  <option>Physics</option>
											</select>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Percentage</label>
                                       <div class="controls input_field_width">
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Education Board</label>
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Status</label>
                                       <div class="controls input_field_width">
                                          <select class="popup_select">
											  <option>Active</option>
											  <option>Inactive</option>
											</select>
                                       </div>
                                    </div>
                                   </div>
                                 </div>
                                 <div class="tab-pane" id="tab5">
                                    <h4>Candidate Experience info</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Profile Name</label>
                                          <select class="popup_select">
											  <option>Profile</option>
											  <option>Profile</option>
											  <option>Profile</option>
											</select>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Class Level</label>
                                       <div class="controls input_field_width">
                                          <select class="popup_select">
											  <option>Primary</option>
											  <option>Secondary</option>
											</select>
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Experience Year</label>
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Experience Board</label>
                                       <div class="controls input_field_width">
                                          <input type="text" class="span6" />
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Status</label>
                                           <select class="popup_select">
											  <option>Active</option>
											  <option>Inactive</option>
											</select>
                                       </div>
                                    </div>
                                 </div>
                                 </div>
                                 <div class="tab-pane" id="tab6">
                                    <h4>Candidate Professional Info</h4>
                                    <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Institution Type</label>
                                          <select class="popup_select">
											  <option>Engineering</option>
											  <option>Arts & Science</option>
											  <option>Schools</option>
											</select>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">TET Exam Status</label>
                                       <div class="controls input_field_width">
                                          <select class="popup_select">
											  <option>% Percentage</option>
											  <option>Not Attended</option>
											</select>
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Interest Subject</label>
                                          <select class="popup_select">
											  <option>Physics</option>
											  <option>Maths</option>
											</select>
                                       </div>
                                    </div>
                                    <div class="span6 control-group">
                                       <label class="control-label">Extra Curricular</label>
                                       <div class="controls input_field_width">
                                          <select class="popup_select">
											  <option>Football</option>
											  <option>Cricket</option>
											  <option>Tennis</option>
											</select>
                                       </div>
                                    </div>
                                   </div>
                                   <div class="span12">
                                    <div class="span6 control-group">                                       
                                       <div class="controls input_field_width">
                                       	<label class="control-label">Is Fresher</label>
                                          <select class="popup_select">
											  <option>Yes</option>
											  <option>No</option>
											</select>
                                       </div>
                                    </div>
                                   </div>
                                 </div>
                                 </div>
                              <ul class="pager wizard">
			                          <li class="previous"><a href="#"><i class="icon-angle-left"></i>Previous</a></li>
			                          <li class="next"><a href="#">Next<i class="icon-angle-right"></i></a></li>
			                          <li class="finish disabled"><a href="#">Finish<i class="icon-ok"></i></a></li>
			                        </ul>
                                 </div>
                              </div>
                              </form>
                           </div>
                     </div>
				 	<p>
                  	   <a data-popup-close="popup_section_edit" href="#">Close</a>
                	</p>
                	<a class="popup-close" data-popup-close="popup_section_edit" href="#">x</a>
            </div>
           </div> 	
            <!-- END ADVANCED TABLE widget-->

            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
  <script>
    // Define default values
    var inputType = new Array("text","select"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("state_name","state_status"); // Set name of input types
    var placeholder = new Array("Enter State Name",""); // Set placeholder of input types
    var table = "admin_table"; // Set classname of table
    var organization_institution_type_id_option = new Array("Please select institution");
    var organization_institution_type_id_value = new Array("");  
    var state_status_option = new Array("Please select status","Active","Inactive"); 
    var state_status_value = new Array("","1","0");
  </script>
<?php include "templates/footer_grid.php" ?>
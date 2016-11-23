<?php
if(!empty($this->session->userdata("login_status"))): 
?>
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
                     <small>Job Provider</small>
                  </h3>
                  <ul class="breadcrumb">
                       <li>
                          <a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                        <li>
                          <a href="#">Jobs</a><span class="divider">&nbsp;</span>
                        </li>
                       <li>
                          <a href="<?php echo base_url(); ?>admin/jobprovider_ads">
                            Job Provider Ads
                          </a>
                          <span class="divider-last">&nbsp;</span>
                        </li>
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
                            <h4><i class="icon-reorder"></i> Job Provider Ads</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <button id="sample_editable_1_new" data-open="popup_section" class="btn green add_option">
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
                                  <table class="table table-striped table-hover table-bordered admin_table ads_table" id="sample_editable_1">
                                    <thead>
                                      <tr class="ajaxTitle">
                                        <th>Premium Ads Name</th>
                                        <th>Ads Path</th>
                                        <th>Organization Name</th>
                                        <th>Ads Visible Date</th>
                                        <th>Admin Vefied </th>
                                        <th>Ads Status</th>
                                        <th>Ads Created Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="parents_tr" id="column">
                                        <td class=""> 
                                          test
                                        </td>
                                        <td class=""> 
                                          test
                                        </td>
                                        <td class=""> 
                                          test
                                        </td>
                                        <td class="">
                                          test
                                        </td>
                                         <td class=""> 
                                          test
                                        </td>
                                        <td class=""> 
                                          test
                                        </td>
                                        <td class="created_date">
                                          test
                                        </td>
                                        <td class="edit_section">
                                          <a class="edit_option" data-open="popup_section" id="column" href="javascript:;" data-id="">
                                            Edit
                                          </a>
                                        </td>
                                        <td>
                                          <a class="ajaxDelete" href="#myModal1" data-toggle="modal" data-id="">Delete</a>
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

  <div class="popup" data-popup="popup_section">
      <div class="popup-inner">       
        <div class="widget box blue" id="popup_wizard_section">
          <div class="widget-title">
            <h4>
              <i class="icon-reorder"></i> Job Provider Ads
            </h4>                        
          </div>
          <div class="widget-body form pop_details_section">
            <form action="form_wizard.html#" class="form-horizontal">
              <fieldset>
                <legend> Ads Details:</legend>
                <div class="form-wizard">
                  <div class="tab-content">
                    <div class="col12">
                      <div class="col6 control-group">                                       
                        <label class="control-label"> Premium Ads Name </label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control" placeholder="Premium Ads Name" /> 
                        </span>
                      </div>
                      <div class="col6 control-group">
                        <label class="control-label">Ads Image Upload </label>
                        <span class="dynamic_data"> 
                          <input type="file" class="form-control hidden_upload" />
                          <a class="btn upload_option"> Upload </a>
                          <img src ="<?php echo base_url(); ?>assets/logo/logo1.png" class="preview_images" />
                        </span>
                      </div>
                    </div>
                    <div class="col12">
                      <div class="col6 control-group">                                       
                        <label class="control-label">Organization Name </label>
                        <span class="dynamic_data"> 
                          <select>
                            <option> Please select Organzation </option>
                            <option> Ets </option>
                            <option> Esourceit </option>
                          </select>
                        </span>
                      </div>
                      <div class="col6 control-group">
                        <label class="control-label"> Ads Visible days </label>
                        <span class="dynamic_data"> 
                          <input class=" m-ctrl-medium date-picker dp_width" size="16" type="text" value="12-02-2012" />
                        </span>
                      </div>
                    </div>
                    <div class="col12">
                      <div class="col6 control-group">                                       
                        <label class="control-label">Admin verification</label>
                        <span class="dynamic_data"> 
                          <ul class="on_off_button on_off_button_j">
                            <li data-value="1"><a href="#">Yes</a></li>
                            <li data-value="0" class="on"><a href="#">No</a></li>
                          </ul> 
                          <input type="hidden" value="" class="verification" name="admin_verify" />
                        </span>
                      </div>
                      <div class="col6 control-group">
                        <label class="control-label"> Premium Status </label>
                        <span class="dynamic_data"> 
                          <select>
                            <option> Please select status </option>
                            <option> Active </option>
                            <option> Inactive </option>
                          </select>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-info save_button">Save</button>
              </fieldset>
            </form>
          </div>  
        </div>                
      <p>
        <a data-open="popup_section" class="close_trig" href="#">Close</a>
      </p>
      <a class="popup-close close_trig" data-open="popup_section"href="#">x</a>
    </div>
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





<?php include "templates/footer_grid.php" ?>
<?php
else :
redirect(base_url().'admin');
endif;
?>


text, browse,text,datepicker,verify,select
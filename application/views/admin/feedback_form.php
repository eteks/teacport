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
                     <small>Others</small>
                  </h3>
                  <ul class="breadcrumb">
                       <li>
                          <a href="<?php echo base_url(); ?>admin/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                        <li>
                          <a href="#">Others</a><span class="divider">&nbsp;</span>
                        </li>
                       <li>
                          <a href="<?php echo base_url(); ?>admin/jobprovider_ads">
                            Feedback Form
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
                            <h4><i class="icon-reorder"></i> Feedback Form</h4>
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
                                        <th>Form Title</th>
                                        <th>Form Message</th>
                                        <th>Is Organization?</th>
                                        <th>Is Candidate?</th>
                                        <th>Is Guest User?</th>
                                        <th>Candidate or Organization</th>
                                        <th>Created Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="parents_tr" id="column">
                                        <td class=""> 
                                          Feedback Form
                                        </td>
                                        <td class=""> 
                                          Message 
                                        </td>
                                        <td class="is_organization center_align"> 
                                          <span class="icon-ok"> </span>
                                        </td>
                                        <td class="is_candidate center_align">
                                          <span class="icon-remove"> </span>
                                        </td>
                                        <td class="is_guest_user center_align"> 
                                          <span class="icon-remove"> </span>
                                        </td>
                                        <td class=""> 
                                          Ets
                                        </td>
                                        <td class="created_date">
                                          00-00-0000
                                        </td>
                                        <td class="edit_section">
                                          <a class="edit_option" data-open="popup_section" id="column" href="javascript:;" data-id="">
                                            Edit
                                          </a>
                                        </td>
                                        <td>
                                          <a class="ajaxDelete" onclick="Confirm.show()" data-id="">Delete</a>
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
              <i class="icon-reorder"></i> Feedback Form
            </h4>                        
          </div>
          <div class="widget-body form pop_details_section">
            <form action="form_wizard.html#" class="form-horizontal">
              <fieldset>
                <legend> Feedback Form Details:</legend>
                <div class="form-wizard">
                  <div class="tab-content">
                    <div class="col12">
                      <div class="col6 control-group">                                       
                        <label class="control-label">Is Viewed</label>
                        <span class="dynamic_data"> 
                          <ul class="on_off_button on_off_button_j">
                            <li data-value="1"><a href="#">Yes</a></li>
                            <li data-value="0" class="on"><a href="#">No</a></li>
                          </ul> 
                          <input type="hidden" value="" class="verification" name="admin_verify" />
                        </span>
                      </div>
                      <div class="col6 control-group">                                       
                        <label class="control-label">Feedback Form Status</label>
                        <span class="dynamic_data"> 
                          <ul class="on_off_button on_off_button_j">
                            <li data-value="1"><a href="#">Active</a></li>
                            <li data-value="0" class="on"><a href="#">Inactive</a></li>
                          </ul> 
                          <input type="hidden" value="" class="verification" name="admin_verify" />
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
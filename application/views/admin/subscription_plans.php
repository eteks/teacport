<?php
$is_super_admin = $this->config->item('is_super_admin');
// $access_rights = $this->config->item('access_rights');
if(!$is_super_admin){
  $access_permission=$this->config->item('current_page_rights');	
  $current_page_rights = $access_permission['access_permission'];
  $access_rights = explode(',',$current_page_rights);
}
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
            <small>Plan Setting</small>
          </h3>
          <ul class="breadcrumb">
            <li>
              <a href="<?php echo base_url(); ?>admin/dashboard">
                <i class="icon-home"></i>
              </a>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <span> Plan Settings </span>
              <span class="divider">&nbsp;</span>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>admin/subscription_plans">
                Subscription Plan
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
              <h4>
                <i class="icon-reorder"></i> Subscription Plan
              </h4>
            </div>
            <div class="widget-body">
              <div class="portlet-body">
                <div class="clearfix add_section">
                  <div class="btn-group">
                    <button id="sample_editable_1_new" data-open="popup_section" class="btn green add_option">
                      Add New <i class="icon-plus"></i>
                    </button>
                  </div>
                </div>
                <form>
                  <table class="bordered table table-striped table-hover table-bordered admin_table" id="sample_editable_1">
                    <thead>
                      <tr class="ajaxTitle">
                        <th>Plan</th>
                        <th>Price</th>
                        <th>Features</th>
                        <th>Validitity</th>
                        <th>Maximum Posts</th>
                        <th>Sms Count</th>
                        <th>Resume Download Count</th>
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
                      <tr class="parents_tr" id="column">
                        <td class="state_name"> 
                          Plan1
                        </td>
                        <td class="state_name"> 
                          100
                        </td>
                        <td class="state_name"> 
                          1.Lorem
                          2. Lorem2
                        </td>
                        <td class="state_name"> 
                          08-12-2016
                        </td>
                        <td class="state_name"> 
                          200
                        </td>
                        <td class="state_name"> 
                          100
                        </td>
                        <td class="state_name"> 
                          100
                        </td>
                        <td class="state_name"> 
                          Active
                        </td>
                        <td class="state_name"> 
                          18-12-2016
                        </td>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                        <td class="edit_section">
                          <a class="edit_option" data-open="popup_section" id="column" href="javascript:;" data-id="">
                            Edit
                          </a>
                        </td>
                        <?php endif; ?>
                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                        <td>
                          <a class="uidelete" data-id="">
                            Delete
                          </a>
                        </td>
                        <?php endif; ?>
                      </tr>
                   </tbody>
                  </table>
                </form>
              </div>
          </div>
        </div>
        <!-- END EXAMPLE TABLE widget-->
      </div>


  <!---Full edit popup -->
    <div class="popup" data-popup="popup_section">
      <div class="popup-inner">       
        <div class="widget box blue" id="popup_wizard_section">
          <div class="widget-title">
            <h4>
              <i class="icon-reorder"></i> Subscription Plan
            </h4>                        
          </div>
          <div class="widget-body form pop_details_section">
            <form action="#" class="form-horizontal">
              <fieldset>
                <legend> Subscription plan details:</legend>
                <div class="form-wizard">
                  <div class="tab-content">
                    <div class="col12">
                      <div class="col6 control-group">                                       
                        <label class="control-label">Subscription Plan</label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control" placeholder="Subscription Plan" /> 
                        </span>
                      </div>
                      <div class="col6 control-group">
                        <label class="control-label">Subscription Price</label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control" placeholder="Subscription Price" /> 
                        </span>
                      </div>
                    </div>
                    <div class="col12">
                      <div class="col6 control-group">                                       
                        <label class="control-label">Subscription Validitity</label>
                        <span class="dynamic_data"> 
                          <!-- <input type="text" class="form-control" placeholder="Subscription Validitity" /> -->
                           <input class=" m-ctrl-medium date-picker dp_width" size="16" type="text" value="12-02-2012" />
                        </span>
                      </div>
                      <div class="col6 control-group">
                        <label class="control-label">Maximum Posts Count</label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control" placeholder="Maximum Posts Count" /> 
                        </span>
                      </div>
                    </div>
                    <div class="col12">
                      <div class="col6 control-group">                                       
                        <label class="control-label">Maximum SMS Count</label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control" placeholder="Maximum SMS Count" /> 
                        </span>
                      </div>
                      <div class="col6 control-group">
                        <label class="control-label"> Maximum Resume Count </label>
                        <span class="dynamic_data"> 
                          <input type="text" class="form-control" placeholder="Maximum Resume Count" /> 
                        </span>
                      </div>
                    </div>
                    <div class="col12">
                      <div class="col6 control-group">                                       
                        <label class="control-label"> Subscription Features </label>
                        <span class="dynamic_data"> 
                          <textarea class="textarea"></textarea>
                        </span>
                      </div>
                      <div class="col6 control-group">
                        <label class="control-label">Subscription Status</label>
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

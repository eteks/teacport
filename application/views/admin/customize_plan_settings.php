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
         <div class="container-fluid sub_pre_section">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <!-- <h3 class="page-title">
                     Teachers Recruit
                     <small>Plan Settings</small>
                  </h3> -->
                  <ul class="breadcrumb">
                       <li>
                          <a href="<?php echo base_url(); ?>main/dashboard"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                          <a href="#">Plan Settings</a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                          <a href="<?php echo base_url(); ?>main/plan_upgrade_creation">
                            Plan Upgrade Creation
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
                    <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="span12">
                    <div class="widget">
                        <div class="edit_add_overlay dn"> </div> <!-- Overlay for table -->
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Plan Upgrade Creation</h4>
                            <span class="loader_holder hide_loader"> </span>
                        </div>
                        <div class="widget-body">
                            <div class="portlet-body">
                                <div class="clearfix add_section">
                                    <div class="btn-group">
					                    <button id="sample_editable_1_new" data-open="popup_section_subs" class="btn green add_option" data-action="save">
					                      Add New <i class="icon-plus"></i>
					                    </button>
					                  </div>
                                </div>                               
                                <form method="post" action="plan_upgrade_creation" class="admin_module_form" id="plan_upgrade_creation_form">
                                <?php } ?> 
                                <?php
                                if(!empty($status)) :
                                  echo "<p class='db_status update_success_md'><i class=' icon-ok-sign'></i>  $status </p>";
                                endif;
                                ?> 
                                <p class='val_error error_msg_md'> <p>
                                  <table class="table table-striped table-hover table-bordered admin_table upgrade_table" id="sample_editable_1">
                                    <thead>
                                      <tr class="ajaxTitle">
                                        <th>Select Subscription Plan</th>
                                        <th>Upgrade Plans</th>
                                        <th>Price</th>
                                        <th>Minimum</th>
                                        <th>Maximum</th>
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
                                      if(!empty($subscription_plan_upgrade)) :
                                      $i=1;
                                      foreach ($subscription_plan_upgrade as $plan_upgrade) :
                                    ?>    
                                      <tr class="parents_tr" id="column<?php echo $i; ?>">
                                        <td class="subscription_name"> 
                                          <?php echo $plan_upgrade['subscription_plan']; ?>
                                          <input type="hidden" value="<?php echo $plan_upgrade['subscription_id']; ?>" />
                                        </td>
<!--                                         <td class="is_sms center_align"> 
                                          <span class="icon-ok"> </span> 
                                        </td> -->
                                        <td class="sms_count"> 
                                          <?php echo $plan_upgrade['sms_count']; ?>
                                        </td>
                                        <!-- <td class="is_email center_align"> 
                                          <span class="icon-ok"> </span>
                                        </td> -->
                                        <td class="email_count"> 
                                          <?php echo $plan_upgrade['email_count']; ?>
                                        </td>
                                        <!-- <td class="is_resume center_align">
                                          <span class="icon-remove"> </span>
                                        </td> -->
                                        <td class="resume_count"> 
                                          <?php echo $plan_upgrade['resume_count']; ?>
                                        </td>
                                        <td class="price"> 
                                          <?php echo $plan_upgrade['upgrade_price']; ?>
                                        </td>
                                        <td class="plan_upgrade_creation_status"> 
                                          <?php 
                                            if ($plan_upgrade['upgrade_status'] == 1) 
                                              echo "Active";
                                            else
                                              echo "Inactive";
                                          ?>
                                          <input type="hidden" value="<?php echo $plan_upgrade['upgrade_status']; ?>" />
                                        </td>
                                        <td class="created_date">
                                        <?php 
                                          $created_datetime = explode(' ', $plan_upgrade['upgrade_created_date']);
                                          echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
                                        ?> 
                                        </td>
                                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
                                        <td class="edit_section">
                                          <a class="ajaxEdit" id="column<?php echo $i; ?>" href="javascript:;" data-id="<?php echo $plan_upgrade['upgrade_id']; ?>">Edit</a>
                                        </td>
                                        <?php endif; ?>
                                        <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
                                        <td>
                                          <a class="ajaxDelete" id="column<?php echo $i; ?>"  data-id="<?php echo $plan_upgrade['upgrade_id']; ?>">Delete</a>
                                        </td>
                                        <?php endif; ?>
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
                
                <!---Add and edit popup -->
                <div class="popup" data-popup="popup_section_subs">
			      <div class="popup-inner">       
			        <div class="widget box blue" id="popup_wizard_section">
			          <div class="widget-title">
			            <h4>
			              <i class="icon-reorder"></i> Subscription Plan
			            </h4>                        
			          </div>
			          <div class="widget-body form">
			            <form action="subscription_plans" class="form-horizontal popup_form admin_form" data-mode="">
			            <p class="admin_status"> </p>
			              <fieldset>
			                <legend> Subscription plan details:</legend>
			                <div class="form-wizard pop_details_section">
			                <?php } ?>
			                <div class="form-group">
		                		<label>Select Plan</label>
		                		<select value="">
		                			<option value="Select">Select</option>
		                			<option value="Basic plans @ 1999">Basic plans @ 1999</option>
		                			<option value="Standard plans @ 5000">Standard plans @ 5000</option>
		                			<option value="Premium plans @ 10000">Premium plans @ 10000</option>
		                		</select>
		                	</div>
			                <div class="plan_creation">
			                	
			                	<!-- <div class="clone_plan_fields">
			                	  <div id="plan_clone_section" class="form-group clone_section subscribe_plan_clone">	
				                	<div class="col4">
				                		<label>Upgrade Plans</label>
				                		<select class="form-control" value="">
				                			<option value="">SMS</option>
				                			<option value="">Email</option>
				                			<option value="">Resume Download</option>
				                		</select>
				                	</div>
				                	<div class="col2">
				                		<label>Price</label>
				                		<input class="form-control" type="text" name="plan_price" maxlength="5">
				                	</div>
				                	<div class="col2">
				                		<label>Min Counts</label>
				                		<input class="form-control" type="text" name="minimum-count" maxlength="5">
				                	</div>
				                	<div class="col2">
				                		<label>Max Counts</label>
				                		<input class="form-control" type="text" name="maximum-count" maxlength="5">
				                	</div>
				                	<div class="clone_btn col1 actions">
				                		<a class="plan_clone clone_icon"><strong>+</strong></a>
				                		<a class="plan_clone clone_icon dn"><strong>+</strong></a>
				                		<a class="plan_remove clone_icon"><strong>-</strong></a>
				                	</div>
				                	<div class="clearfix"> </div>
				                  </div>	
				                </div> --><!--End append field-->
				                <h6>Customize Limits</h6>
				                <div class="field_wrapper"><!--append field-->
			                	   <div class="upg_plan col4">
				                		<select class="form-control" value="">
				                			<option value="Select">Select</option>
				                			<option value="SMS">SMS</option>
				                			<option value="Email">Email</option>
				                			<option value="Resume Download">Resume Download</option>
				                		</select>
				                	</div>
				                	<div class="col3">
				                		<input class="form-control numeric_value" type="text" name="plan_price" maxlength="5" placeholder="Price in Rupees">
				                	</div>
				                	<div class="col3">
				                		<input class="form-control numeric_value" type="text" name="minimum-count" maxlength="5" placeholder="Min Limit">
				                	</div>
				                	<div class="col3">
				                		<input class="form-control numeric_value" type="text" name="maximum-count" maxlength="5" placeholder="Max Limit">
				                	</div>
				                	<div class="">
				                		<a class="remove_button dn" title="Remove field"><strong>-</strong></a>
				                	</div>
				                	<div class="clearfix"> </div>
				                  </div>
				                  <div class="pull-right">
				                  	<a class="add_button" title="Add field"><strong>+</strong></a>
				                  </div>	
				             	  <div class="clearfix"> </div>
			          
			                <button type="submit" class="btn btn-info save_button">Save</button>
			                <?php if(!$this->input->is_ajax_request()) { ?>
			                </div>
			              </fieldset>
			            </form>
			            
			            
			          </div>  
			        </div>                
			      <p>
			        <a data-open="popup_section_subs" class="close_trig" href="#">Close</a>
			      </p>
			      <a class="popup-close close_trig" data-open="popup_section_subs"href="#">x</a>
			    </div>
 			 </div> 
             <!--End Popup-->  
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
    var inputType = new Array("select","text","text","text","text","select"); // Set type of input which are you have used like text, select,textarea.
    var columns = new Array("subscription_name","sms_count","email_count","resume_count","price","plan_upgrade_creation_status"); // Set name of input types
    var placeholder = new Array("","Enter SMS count","Enter Email count","Enter Resume count","Enter Price",""); // Set placeholder of input types
    var class_selector = new Array("","numeric_act","numeric_act","numeric_act","decimal_act",""); // Set placeholder of input types
    var maxlength = new Array("","","","","",""); 
    var table = "admin_table"; // Set classname of table  
    var subscription_name_option = new Array("Select Plan");
    var subscription_name_value = new Array("");
    <?php
    if(!empty($subscription_plans)) :
    foreach ($subscription_plans as $sub) :
    ?>
      subscription_name_option.push("<?php echo $sub['subscription_plan']; ?>");
      subscription_name_value.push("<?php echo $sub['subscription_id']; ?>");
    <?php
    endforeach;
    endif;
    ?>  
    var plan_upgrade_creation_status_option = new Array("Select Status","Active","Inactive"); 
    var plan_upgrade_creation_status_value = new Array("","1","0");
  </script>
<?php include "templates/footer_grid.php" ?>
<?php } ?>
<?php
else :
redirect(base_url().'main');
endif;
?>
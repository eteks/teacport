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
         <!-- <div class="sidebar-toggler hidden-phone"></div> -->
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
                          <a href="<?php echo base_url(); ?>main/customize_plan_settings">
                            Plan Upgrade Creation
                          </a>
                          <span class="divider-last">&nbsp;</span>
                       </li>
                   </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!--Added by Akila-->
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
                            <?php if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
  		                    			<button id="sample_editable_1_new" data-open="popup_section_subs" class="btn green add_option" data-action="save">
  		                     				 Add New <i class="icon-plus"></i>
  		                    			</button>
                            <?php endif; ?>
		                  			</div>
		           				</div>                               
		            			<form method="post" action="customize_plan_settings" class="admin_module_form" id="plan_upgrade_creation_form">
		            				<?php } ?> 
		            				<?php
		                                if(!empty($status)) :
		                                  echo "<p class='db_status update_success_md'><i class=' icon-ok-sign'></i>  $status </p>";
		                                endif;
	                                ?> 
		              				<table class="table table-striped table-hover table-bordered admin_table upgrade_table" id="sample_editable_1">
			                			<thead>
						                  	<tr class="ajaxTitle">
							                   	<th>Subscription Plan<br/> Name</th>
							                    <th class="text-center">Upgrade Plans</th>
						                        <th>Created Date</th>
							                    <?php //if(($is_super_admin) || (recursiveFind($access_rights, "edit"))): ?>
					              			   		<!-- <th class="data_action">Edit</th> -->
					            				<?php //endif; ?>
					           				  	<?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
					            				   	<th class="data_action">Delete</th>
							           			<?php endif; ?>
						                  	</tr>
						                  	<!-- <tr>
		               		  					<th>Plan</th>
		               		  					<th>Price</th>
		                        				<th>Minimum</th>
		                        				<th>Maximum</th>
		               		  				</tr> -->
										 </thead>
			                			<tbody>
			                			<?php
	                                      if(!empty($subscription_plan_upgrade)) :
	                                      $i=1;
	                                      foreach ($subscription_plan_upgrade as $key=>$plan_upgrade) :
	                                      $plan_upgrade_created_date ='';
	                                  	  $plan_id ='';
	                                    ?>   
			                   				<tr>
			                   					<td class="sub_plan_title"><?php echo $key; ?></td>
												<td>
			                   						<table class="table table-striped table-hover table-bordered sub_upgradeplan_title ">
			                   							<tbody>
			                   							<?php foreach ($plan_upgrade as $key => $value):
			                   							$plan_id = $value['subscription_id']; 
			                   							$plan_upgrade_created_date = $value['upgrade_created_date']; ?>
			                   								<tr>
			                   									<td class="showtooltip">
			                   										<?php echo $value['upgrade_options']; ?><span class="arrow_right"></span>
			                   										<span class="info_tooltip">Plan</span>
			                   									</td>
			                   									<td class="showtooltip">
			                   										<?php echo $value['upgrade_price']; ?>
			                   										<span class="info_tooltip">Price</span>
			                   									</td>
			                   									<td class="showtooltip">
			                   										<?php echo $value['upgrade_min_allowed']; ?> 
			                   										<span class="info_tooltip">Minimum Allowed</span>
			                   									</td>
			                   									<td class="showtooltip">
			                   										<?php echo $value['upgrade_max_allowed']; ?> 
			                   										<span class="info_tooltip">Maximum Allowed</span>
			                   									</td>
			                   								</tr>
			                   							<?php
					                                        endforeach;
					                                    ?>	
			                   							</tbody> 
			                   						</table>
			                   					</td>
				                   				<td>
					                   				<?php 
			                                          $created_datetime = explode(' ', $plan_upgrade_created_date);
			                                          echo date("d/m/Y", strtotime($created_datetime[0]))."&nbsp;&nbsp;&nbsp;".$created_datetime[1]; 
			                                        ?> 
		                                        </td>
												<!-- <td>
													<a id="sample_editable_1_new" data-open="popup_section_subs" class="green add_option"  data-mode="edit" data-action="update">
													Edit
													</a>
												</td> -->
                                    <?php if(($is_super_admin) || (recursiveFind($access_rights, "delete"))): ?>
    												              <td>
	                                          <a class="ajaxDelete" id="column<?php echo $i; ?>"  data-id="<?php echo $plan_id; ?>">Delete</a>
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
        <form action="customize_plan_settings" class="form-horizontal popup_form admin_form upgrade_plan" data-mode="">
        <p class="subs_min_max_error" style="display:none">Max Value cannot have value less than Min value</p>
        <p class="admin_status"> </p>
        <fieldset>
            <legend> Subscription plan details:</legend>
            <div class="form-wizard pop_details_section">
            <div class="form-group">
            <label class="control-label">Select Plan</label>
            <select name="subscription_name">
              <option value="">Select Plan</option>
              <?php foreach ($subscription_plans as $sub) : 
               echo "<option value=".$sub['subscription_id'].">".$sub['subscription_plan']."</option>";
              endforeach; ?>
            </select>
          </div>
            <div class="form-group plan_creation">
              <!--append field-->
              <div class="form-group field_wrapper">
                <label class="control-label" value="Customize">Upgrade Option</label>
                 <div class="upg_plan col4 select_plan">
                    <select class="form-control customize_plan" name="upgrade_option[]">
                      <option value="">Select</option>
                      <option value="sms">Per SMS</option>
                      <option value="email">Per Email</option>
                      <option value="resume">Per Resume Download</option>
                    </select>
                  </div>
                  <div class="col3">
                    <input class="form-control customize_plan decimal_act" type="text" value="" name="upgrade_price[]" maxlength="5" placeholder="Price in Rupees">
                  </div>
                  <div class="col3">
                    <input id="subs_min_val" class="form-control customize_plan numeric_value" type="text" value="" name="upgrade_min[]" maxlength="5" placeholder="Min Limit">
                  </div>
                  <div class="col3">
                    <input id="subs_max_val" class="form-control customize_plan numeric_value" type="text" value="" name="upgrade_max[]" maxlength="5" placeholder="Max Limit">
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
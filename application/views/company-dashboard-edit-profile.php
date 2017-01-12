<?php include ('include/header.php'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap-datepicker.css">
<?php include('include/menus.php'); ?>
<?php // echo "<pre>"; print_r($providerlogo);print_r($organizationlogo); echo "</pre>"; ?> 
<section class="job-breadcrumb">
	<div class="container">
		<div class="row">
			
			<div class="col-md-12 col-sm-12 co-xs-12 text-left">
				<div class="bread">
					<ol class="breadcrumb">
						<li>
							<a href="<?php echo base_url(); ?>">Home</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>provider/dashboard">Dashboard</a>
						</li>
						<li class="active">
							Update Profile
						</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="dashboard-body">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
					<div class="Heading-title black">
                        <h1>Update Profile</h1>
                        <p>Kindly provide your profile details to continue with us.</p>
                     </div>
                    <!-- <div class="container">
						<span class="error_test"> Please fill all required(*) fields </span>
						<span class="error_image"> Please Upload Image </span>
						<span class="error_extension"> Sorry, only JPG, JPEG, PNG files are allowed! </span>
					</div> -->
					<?php echo form_open_multipart('provider/dashboard/editprofile', 'id="provider_editprofile" class="form-horizontal provider-profile-edit provider_form"'); ?>
						<p class="val_status">  </p>	
						<div class="row-form">
							<div class="form-group image_upload">
                           	<div class="col-sm-offset-1 col-sm-2">
                                    <label>Provider Logo :</label>
                               </div>
                               <div class="col-sm-8">
                               		<?php echo form_error('organization_logo'); ?><?php if($this->session->userdata('upload_provider_logo_error')) echo '<div class="uploaderror">'.$this->session->userdata('upload_provider_logo_error').'</div>'; ?>
                               		<div class=" col-sm-10 input-group image-preview">
                               			<input type="text" disabled="disabled" class="form-control image-preview-filename form_inputs" placeholder="Upload Provider Logo">
	                                    <span class="input-group-btn">
	                                    	<button id="image_preview_clear_profile" style="display: none;" class="btn btn-default image-preview-clear" type="button">
	                                        	<span class="glyphicon glyphicon-remove"></span> Clear
	                                        </button>
	                                        <div class="btn btn-default image-preview-input">
	                                            <span class="glyphicon glyphicon-folder-open"></span>
	                                            <span class="image-preview-input-title">Browse</span>
	                                            <input id="file" class="image_upload_holder" type="file" accept="file_extension" name="organization_logo">
	                                        </div>
	                                    </span>
                               		</div>
                               		<div class="col-sm-2 col-sm-2 pull-right nopadding">   
                               			<img id="image_upload_profile_preview" class="image_upload_profile" src="<?php echo base_url();?>assets/images/placeholder.png" data-href = "<?php echo base_url();?>assets/images/placeholder.png">
                               		</div>                          
                            	</div>
                            	
                            </div>
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-2" for="organization_name">Organization Name : <sup class="alert">*</sup></label>
								<div class="col-sm-8">
									<?php echo form_error('organization_name'); ?>
									<input id="organization_name" class="form-control form_inputs" maxlength="50" data-minlength="3" data-name="Organization Name" name="organization_name" size="40" value="<?php if($organization['organization_name'] != '') echo $organization['organization_name']; elseif (set_value('organization_name') !='') { echo set_value('organization_name'); } ?>" placeholder="Organization Name" type="text">
								</div>
							</div>
                            
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-2" for="address-line1">Address Line1 : <sup class="alert">*</sup></label>
								<div class="col-sm-8">
									<?php echo form_error('address-line1'); ?>
									<input id="address-line1" data-minlength="3" data-name="Address" class="form-control form_inputs" maxlength="150" name="address-line1" size="40" value="<?php if($organization['organization_address_1'] != '') echo $organization['organization_address_1']; elseif (set_value('address-line1') != '') { echo set_value('address-line1'); } ?>" placeholder="Building No / Road / Street" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-2" for="address-line2">Address Line2 : <sup class="alert">*</sup></label>
								<div class="col-sm-8">
									<?php echo form_error('address-line2'); ?>
									<input id="address-line2" data-minlength="3" data-name="Address" class="form-control form_inputs" maxlength="150" name="address-line2" size="40" value="<?php if($organization['organization_address_2'] != '') echo $organization['organization_address_2']; elseif (set_value('address-line2') !='') { echo set_value('address-line2'); } ?>" placeholder="Locality / Area / Village" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-2" for="address-line3">Address Line3 : <sup class="alert">*</sup></label>
								<div class="col-sm-8">
									<?php echo form_error('address-line3'); ?>
									<input id="address-line2" data-minlength="3" data-name="Address" class="form-control form_inputs" maxlength="150" name="address-line3" size="40" value="<?php if($organization['organization_address_3'] != '') echo $organization['organization_address_3']; elseif (set_value('address-line3') !='') { echo set_value('address-line3'); } ?>" placeholder="Taluk / City" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-2" for="add_district">District : <sup class="alert">*</sup></label>
								<div class="col-sm-8">
									<?php echo form_error('organization_district'); ?>
									<select id="organization_district" class="select-location form-control form_inputs" name="organization_district" onchange="">
										<option value="">Select district</option>
										<?php
										foreach ($district as $value) {
											if($organization['organization_district_id'] == $value['district_id']){
												echo '<option value="'.$value['district_id'].'" selected>'.$value['district_name'].'</option>';
											}
											elseif(set_select('organization_district', $value['district_id']) != ''){
												echo '<option value="'.$value['district_id'].'" '.set_select('organization_district', $value['district_id']).'>'.$value['district_name'].'</option>';
											}
											else{
												echo '<option value="'.$value['district_id'].'">'.$value['district_name'].'</option>';
											}
											
										}
										?>
									</select>
								</div>
								<!-- <div class="col-sm-4">
									<input id="add_district_oth" class="form-control " disabled="disabled" maxlength="35" name="add_district_oth"  value="" placeholder="Other District" type="text">
								</div> -->
							</div>
							<!-- <div class="form-group">
								<label class="col-sm-4" for="firstname">Pincode : <span class="alert">*</span></label>
								<div class="col-sm-4">
									<input id="postal-code" class="form-control" maxlength="6" name="postal-code" onkeypress="return number(event)" value="" placeholder="Pin Code" type="text">
								</div>
							</div> -->
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-2" for="firstname">Registrant Name :</label>
								<div class="col-sm-8">
									<?php echo form_error('provider_name'); ?>
									<input id="firstname" data-name="Registrant Name" data-minlength="3" class="form-control form_inputs alpha_value" maxlength="50" name="provider_name" size="40" value="<?php if($organization['registrant_name'] != '') echo $organization['registrant_name']; elseif (set_value('provider_name')!='') { echo set_value('provider_name'); } ?>" placeholder="Full Name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-2" for="designation">Registrant Designation :</label>
								<div class="col-sm-8">
									<?php echo form_error('provider_designation'); ?>
									<input id="designation"  data-name="Registrant Designation" data-minlength="3" class="form-control form_inputs" maxlength="50" name="provider_designation" size="40"  value="<?php if($organization['registrant_designation'] != '') echo $organization['registrant_designation']; elseif (set_value('provider_designation')!= '') { echo set_value('provider_designation'); } ?>" placeholder="ex. Principal / Correspondent">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-2" for="dob_yrs">Date of Birth :</label>
								<div class="col-sm-4">
									<?php echo form_error('provider_dob'); 
									?>
									<input id="dob" class="form-control form_inputs provider_date_of_birth" name="provider_dob" size="40" value="<?php if($organization['registrant_date_of_birth'] != '' && $organization['registrant_date_of_birth'] != '0000-00-00'){ $dobsplit = explode('-',$organization['registrant_date_of_birth']); echo $dobsplit[2].'/'.$dobsplit[1].'/'.$dobsplit[0];  } elseif (set_value('provider_dob') != '') { echo set_value('provider_dob'); } ?>" placeholder="DOB" type="text">
								</div>
								<div class="col-sm-4"></div>
							</div>
							<div class="form-group image_upload">
                            	<div class="col-sm-offset-1 col-sm-2">
                                    <label>Your image :</label>
                               </div>
                               <div class="col-sm-8">
                               		<?php echo form_error('organization_logo'); ?><?php if($this->session->userdata('upload_provider_logo_error')) echo '<div class="uploaderror">'.$this->session->userdata('upload_provider_logo_error').'</div>'; ?>
                               		<div class="col-sm-10 input-group image-preview">
                               			<input type="text" disabled="disabled" class="form-control form_inputs image-preview-filename" placeholder="Upload Profile Image">
	                                    <span class="input-group-btn">
	                                    	<button id="image_preview_clear_your_image" style="display: none;" class="btn btn-default image-preview-clear" type="button">
	                                        	<span class="glyphicon glyphicon-remove"></span> Clear
	                                        </button>
	                                        <div class="btn btn-default image-preview-input">
	                                            <span class="glyphicon glyphicon-folder-open"></span>
	                                            <span class="image-preview-input-title">Browse</span>
	                                            <input id="yourfile" class="image_upload_holder" type="file" accept="file_extension" name="provider_logo">
	                                        </div>
	                                    </span>
                               		</div> 
                               		<div class="col-sm-2 pull-right nopadding">   
                               			<img id="image_upload_profile_preview" class="image_upload_profile" src="<?php echo base_url();?>assets/images/placeholder.png" data-href = "<?php echo base_url();?>assets/images/placeholder.png" /> 
                               		</div>                              
                            	</div>
                            </div>
							<div class="form-group declaration">
								<div class="col-sm-offset-1 col-sm-11">
									<?php echo form_error('declar_accept'); ?>
									<p>
										<input id="declar_accept" class="ace form_dec" name="declar_accept" value="Y" type="checkbox">
										<span class="lbl"></span>
										I hereby declare that all the particulars furnished in this application are true, correct and complete to the best of my knowledge and belief.
									</p>
									<!-- commented by muthu -->
									<!-- <p>
										<input id="optin_sms" class="ace" name="optin_sms" value="Y" type="checkbox">
										<span class="lbl"></span>
										I accept to receive sms notifications to the above specified mobile number.
									</p>
									<p>
										<input id="optin_mail" class="ace" name="optin_mail" value="Y" type="checkbox">
										<span class="lbl"></span>
										I accept to receive E-mail notifications.
									</p> -->
								</div>
							</div>
							<div class="row">
								<div class="loginbox-submit col-sm-offset-4 col-sm-7">
									<a><input type="submit" class="btn btn-default btn-medium pull-right" value="Submit & Next"></a>
								</div>
							</div>
						</div>
					<?php form_close(); ?>
					</form>
			</div>
		</div>
	</div>
</section>
<?php include('include/footermenu.php'); ?>
<?php include ('include/footer.php'); ?>
<!--datepicker-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/zebra_datepicker.js"></script>
<?php include('include/footercustom.php'); ?>
<script type="application/javascript">
  	$('.provider_date_of_birth').Zebra_DatePicker({
    	direction: -1,
        format: 'd/m/Y',
        view: 'years'
    });
     	
</script>


<!DOCTYPE>
<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		<title>Upgrade Details</title>
	</head>
	<body>
		<center>
			</br></br>
			<table width='600' background='#FFFFFF' style='text-align:left;' cellpadding='0' cellspacing='0'>
						<!--BLUE STRIPE-->
						<tr>
							<td background='' width='31' bgcolor='#29aafe' style='border-top:1px solid #FFF; border-bottom:1px solid #FFF;' height='80'>
							<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
							</td>
							
							<!--WHITE TEXT AREA-->
							<td width='250' bgcolor='#FFFFFF' style='border-top:1px solid #FFF; text-align:center;' height='80' valign='middle'>
							<span style='font-size:25px; font-family:Trebuchet MS, Verdana, Arial; color:#29aafe;'><span ><img src='<?php echo base_url(); ?>assets/images/logo/new_logo.png' /></span></span>
							</td>
							
							<!--BLUE TEXT AREA-->
							<td background='' bgcolor='#29aafe' style='border-top:1px solid #FFF; border-bottom:1px solid #FFF; padding-left:15px;' height='80'>
							<span style='color:#FFFFFF; font-size:18px; font-family:Trebuchet MS, Verdana, Arial;'>Upgrade Details</span>
							</td>
						</tr>
						
						<!--DOUBLE BORDERS BOTTOM-->
						<tr>
							<td height='3' width='31' style='border-top:1px solid #e4e4e4; border-bottom:1px solid #e4e4e4;'>
								<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
							</td>
							<td height='3' width='131'>
								<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
							</td>
							<td height='3' style='border-top:1px solid #e4e4e4; border-bottom:1px solid #e4e4e4;'>
								<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
							</td>
						</tr>
						<tr>
							<td colspan='3'>
								<!--CONTENT STARTS HERE-->
								<br />
								<br />
									<table cellpadding='0' cellspacing='0'>
										<tr>
											<td width='10'><div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
											</td>
											<td width='600' style='padding-right:10px; font-family:Trebuchet MS, Verdana, Arial; font-size:12px;' valign='top'>
												<span style='font-family:Trebuchet MS, Verdana, Arial; font-size:17px; font-weight:bold;'>Dear <?php echo $organization_name; ?>, </span>
												<br/>
												<p style='font-size:15px'>Thank you for Subscribed with us.</p>
												<p style='font-size:15px'>You are now in Subscription Plan: <span style='font-size:16px;color:#da651a;'><b><?php echo $subscription_details['subscription_plan']; ?>.</b></span> The Plan details get end on <span style='font-size:16px;color:#da651a;'><b> <?php echo date('d M Y',strtotime($subscription_details['org_sub_validity_end_date'])); ?> </b></span> </p>												
												<p style='font-size:15px'>Upgrade Plan Details are given below :</p>
												<br/>
												<table>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span>No of Vacancy Posts :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo $subscription_details['organization_vacancy_remaining_count']; ?></div></td>	
													</tr>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >SMS Count :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo ($subscription_details['organization_sms_remaining_count'] >= 99999 ? "Unlimited" : $subscription_details['organization_sms_remaining_count']); ?></div></td>	
													</tr>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Email Count :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo ($subscription_details['organization_email_remaining_count'] >= 99999 ? "Unlimited" : $subscription_details['organization_email_remaining_count']); ?></div></td>	
													</tr>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Resume Download :</span></div></td>
														<td><div style='padding-left:20px;padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo ($subscription_details['organization_remaining_resume_download_count'] >= 99999 ? "Unlimited" : $subscription_details['organization_remaining_resume_download_count']); ?></div></td>	
													</tr>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Max No of Ads :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo $subscription_details['organization_ad_remaining_count']; ?></div></td>	
													</tr>
												</table>
												<p style='font-size:15px'>Best Wishes,</p>
												<p style='font-size:15px'>TeachersRecruit Team</p>
											</td>					
										</tr>
								</table>
							</td>					
						</tr>				
			</table>			
			<br/>
			<table cellpadding='0' style='border-top:1px solid #e4e4e4; text-align:center; font-family:Trebuchet MS, Verdana, Arial; font-size:12px;' cellspacing='0' width='600'>
				<tr>
					<td height='2' style='border-bottom:1px solid #e4e4e4;'>
					<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
					</td>
				</tr>
			</table>
			<div>
				<center><p style='font-family:Trebuchet MS, Verdana, Arial; font-size:12px;' > NO. 82/2, Thiruvalluvar Road,<br> Uthukottai Town &amp; Tk,<br> Thiruvallur District - 602026<br>info@teachersrecruit.com</p></center>			
			</div>
		</center>
	</body>
</html>
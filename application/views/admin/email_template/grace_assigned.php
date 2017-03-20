<!DOCTYPE>
<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		<title>Grace Period Assigned </title>
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
								<span style='font-size:25px; font-family:Trebuchet MS, Verdana, Arial; color:#29aafe;'><span ><img src='<?php echo base_url(); ?>assets/admin/img/teachers_recruit_logo.png'></span></span>
							</td>
							
							<!--BLUE TEXT AREA-->
							<td background='' bgcolor='#29aafe' style='border-top:1px solid #FFF; border-bottom:1px solid #FFF; padding-left:15px;' height='80'>
								<span style='color:#FFFFFF; font-size:18px; font-family:Trebuchet MS, Verdana, Arial;'> Validity Extended</span>
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
											<span style='font-family:Trebuchet MS, Verdana, Arial; font-size:17px; font-weight:bold;'>Dear <?php echo (!empty($subscription_details['registrant_name']) ? $subscription_details['registrant_name'] : $subscription_details['organization_name']); ?>, </span>
												<p style='font-size:15px;'>The validity period for your plan, <span style='font-size:16px;color:#f37021;'><b> <?php echo $subscription_details['subscription_plan']; ?> </b></span> has been extended.</p>
												<p style='font-size:15px;'>Your plan has the grace period until <span style='color:#f37021;'> <?php echo date('d M Y',strtotime($subscription_details['organizaion_sub_updated_date'])); ?> </span>.</p>	
												<p style='font-size:15px;'>Enjoy using your plans count left, before the grace period ends. Your plan details are,</p>
												<br/>
												<table>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#f37021;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span>No of Vacancy Posts :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#f37021;'>&nbsp;&nbsp;&nbsp;<?php echo $subscription_details['organization_vacancy_remaining_count']; ?></div></td>	
													</tr>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#f37021;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >SMS Count :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#f37021;'>&nbsp;&nbsp;&nbsp;<?php echo ($subscription_details['organization_sms_remaining_count'] >= 99999 ? "Unlimited" : $subscription_details['organization_sms_remaining_count']); ?></div></td>	
													</tr>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#f37021;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Email Count :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#f37021;'>&nbsp;&nbsp;&nbsp;<?php echo ($subscription_details['organization_email_remaining_count'] >= 99999 ? "Unlimited" : $subscription_details['organization_email_remaining_count']); ?></div></td>	
													</tr>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#f37021;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Resume Download :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#f37021;'>&nbsp;&nbsp;&nbsp;<?php echo ($subscription_details['organization_remaining_resume_download_count'] >= 99999 ? "Unlimited" : $subscription_details['organization_remaining_resume_download_count']); ?></div></td>	
													</tr>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#f37021;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Max No of Ads :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#f37021;'>&nbsp;&nbsp;&nbsp;<?php echo $subscription_details['organization_ad_remaining_count']; ?></div></td>	
													</tr>
												</table>
												<p style='font-size:15px;padding-left:10px;'>You can also Upgrade your plan before your grace period ends. Please visit our <a href='https://www.teachersrecruit.com' style='font-size:15px;color:#29aafe;'>site</a> to Upgarde of the plan to enjoy full benefits of our services</p>
												<br/>											
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
				<center><p style='font-family:Trebuchet MS, Verdana, Arial; font-size:12px;' > NO : 82/2, Thiruvalluvar Road,<br> Uthukottai Town &amp; Tk,<br> Thiruvallur District - 602026<br>info@teachersrecruit.com</p></center>			
			</div>
		</center>
	</body>
</html>
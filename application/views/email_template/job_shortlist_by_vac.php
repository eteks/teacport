<!DOCTYPE>
<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		<title>Interview Call</title>
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
							<span style='font-size:25px; font-family:Trebuchet MS, Verdana, Arial; color:#29aafe;'><span ><img src='http://teachersrecruite.tk/demo/images/logo/new_logo.png'></span></span>
							</td>
							<!--BLUE TEXT AREA-->
							<td background='' bgcolor='#29aafe' style='border-top:1px solid #FFF; border-bottom:1px solid #FFF; padding-left:15px;' height='80'>
							<span style='color:#FFFFFF; font-size:18px; font-family:Trebuchet MS, Verdana, Arial;'>Interview Call</span>
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
												<span style='font-family:Trebuchet MS, Verdana, Arial; font-size:17px; font-weight:bold;'>Dear <?php echo $candidate_name; ?>,</span>
												<br/>
												<p style='font-size:15px'>Thank you for Registering with us.</p>
												<p style='font-size:15px'>We are pleased to inform you that you have been shortlisted for the job you have been applied and you are invited to attend an interview. The venue details are below:</p>
												<br/>
												<table>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span>Company Name :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo $vacancy_details['organization_name']; ?></div></td>	
													</tr>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Date :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo date('d M Y',strtotime($vacancy_details['vacancies_interview_start_date']))." - ".date('d M Y',strtotime($vacancy_details['vacancies_end_date'])); ?></div></td>	
													</tr>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Designation :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo $vacancy_details['vacancies_job_title']; ?></div></td>	
													</tr>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Interview Location :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo $vacancy_details['district_name']; ?></div></td>	
													</tr>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Salary :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo $vacancy_details['vacancies_start_salary']." - ".$vacancy_details['vacancies_end_salary']; ?></div></td>	
													</tr>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Email :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo $vacancy_details['registrant_email_id']; ?></div></td>	
													</tr>
													<tr>
														<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Mobile :</span></div></td>
														<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo $vacancy_details['registrant_mobile_no']; ?></div></td>	
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
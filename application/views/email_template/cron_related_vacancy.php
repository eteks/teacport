<!DOCTYPE>
<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		<title>Related Vacancy</title>
	</head>
	<body>
		<center>
			</br></br>
			<table width='600' background='#FFFFFF' style='text-align:left;' cellpadding='0' cellspacing='0'>
						<!--BLUE STRIPE-->
						<tr>
							<td width='31' bgcolor='#29aafe' style='border-top:1px solid #FFF; border-bottom:1px solid #FFF;' height='80'>
							<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
							</td>
							
							<!--WHITE TEXT AREA-->
							<td width='250' bgcolor='#FFFFFF' style='border-top:1px solid #FFF; text-align:center;' height='80' valign='middle'>
							<span style='font-size:25px; font-family:Trebuchet MS, Verdana, Arial; color:#29aafe;'><span ><img src='<?php echo base_url(); ?>assets/images/logo/new_logo.png'></span></span>
							</td>
							
							<!--BLUE TEXT AREA-->
							<td background='' bgcolor='#29aafe' style='border-top:1px solid #FFF; border-bottom:1px solid #FFF; padding-left:15px;' height='80'>
							<span style='color:#FFFFFF; font-size:18px; font-family:Trebuchet MS, Verdana, Arial;'>Matching Jobs</span>
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
										</tr>
										<tr>
											<td width='600' style='padding-right:10px;font-family:Trebuchet MS, Verdana, Arial; font-size:12px;'valign='top'>
												<span style='font-family:Trebuchet MS, Verdana, Arial; font-size:18px; font-weight:bold;'>Dear <?php echo $cron_related['candidate_name']; ?>, </span>
												<br/>
											</td>
										</tr>
										<tr>
											<td>
												<br/>
												<p style='font-size:18px'>We have found the following jobs matching your profile.</p>
												<br/>
											</td>
										</tr>
										<?php
										$i = 1;
										foreach ($cron_related['vacancy_details'] as $vac_key => $vac_val) :
										if($i < 4) :
										?>
										<tr>
											<td style="width:70%;">
												<a style='font-size:18px; color:#f37021;' href="#"><b> Wanted <?php echo $vac_val['vacancies_job_title']; ?> </b> </a>
												<ul style='font-size:16px;list-style-type:none;padding-left: 0px;margin:5px 0;'>
											 		<li style='float:left;color:#999;'> <?php echo ($vac_val['vacancy_type'] == "part" ? "Part Time" : "Full Time"); ?> <span>|</span> </li> 
											 		<li style='float:left;margin:0 3px 0;color:#999;'> <?php echo $vac_val['organization_name']; ?> <span>|</span>  </li>
											 		<li style='float:left;margin:0 3px 0;color:#999;'> Salary <span><?php echo $vac_val['vacancies_start_salary']." - ".$vac_val['vacancies_end_salary']; ?> </li>
											 		<li style='clear:both;'></li>
											 	 </ul>
											 	 </br>
											</td>
											<td style="width:30%;text-align:right;">
												<a style="font-size:12px;color:#f37021;border:1px solid #999;padding:3px;text-decoration:none;border-radius:2px;" href="<?php echo base_url()."login/seeker_cron/google?vac=".$vac_key; ?>" target="_blank"><b>View Jobs</b></a>
											</td>
										</tr>
										<?php
										endif;
										$i++;
										endforeach;
										?>
										<tr>
											<td style="width:70%;">
												<p style="font-size:18px;"><b>We have more jobs for you</b></p>
											</td>
											<td style="padding:20px 0;width:30%;text-align:right;">
												<a href="<?php echo base_url()."seeker/findjob/?pos=".$cron_related['candidate_posting_applied_for']; ?>" style="font-size:12px;background-color:#f37021;color:#fff;text-decoration:none;padding:5px;border-radius:3px;" target="_blank"><b>View More >></b></a>
											</td>
										</tr>
										<tr>
											<td>
												<p style='font-size:14px'>Best Wishes,</p>
												<p style='font-size:14px'>TeachersRecruit Team</p>
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
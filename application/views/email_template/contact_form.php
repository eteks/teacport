<!DOCTYPE>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Contact Form</title>
</head>
<body>
<center>
</br></br>
<table width='600' background='#FFFFFF' style='text-align:left;' cellpadding='0' cellspacing='0'>
<!--BLUE STRIPE-->
<tr>
	<td background='<?php echo base_url(); ?>assets/images/email_template/greenback.gif' width='31' bgcolor='#29aafe' style='border-top:1px solid #FFF; border-bottom:1px solid #FFF;' height='80'>
	<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
	</td>
	
	<!--WHITE TEXT AREA-->
	<td width='250' bgcolor='#FFFFFF' style='border-top:1px solid #FFF; text-align:center;' height='80' valign='middle'>
	<span style='font-size:25px; font-family:Trebuchet MS, Verdana, Arial; color:#29aafe;'><span ><img src="<?php echo base_url(); ?>assets/images/logo/new_logo.png"></span>&nbsp;Teachers Recruit</span>
	</td>
	
	<!--BLUE TEXT AREA-->
	<td background='<?php echo base_url(); ?>assets/images/email_template/greenback.gif' bgcolor='#29aafe' style='border-top:1px solid #FFF; border-bottom:1px solid #FFF; padding-left:15px;' height='80'>
	<span style='color:#FFFFFF; font-size:18px; font-family:Trebuchet MS, Verdana, Arial;'>Contact Form</span>
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
	<span style='font-family:Trebuchet MS, Verdana, Arial; font-size:17px; font-weight:bold;'>Welcome!</span>
	<br />
	<p></p>
	<p style='font-size:15px'>You have new contact form submission. The Contact details are below:</p>
	<br />
		<table>
		<tr>
			<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span>Name :</span></div></td>
			<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo($data_value['name']);?></div></td>	
		</tr>
		<tr>
			<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Email :</span></div></td>
			<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo($data_value['email']);?></div></td>	
		</tr>
		<tr>
			<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Phone :</span></div></td>
			<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo($data_value['phone']);?></div></td>	
		</tr>
		<tr>
			<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Subject :</span></div></td>
			<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo($data_value['subject']);?></div></td>	
		</tr>
		<tr>
			<td><div style='padding-left:30px; padding-bottom:10px;color:#29aafe;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=''/>&nbsp;&nbsp;&nbsp;<span >Message :</span></div></td>
			<td><div style='padding-left:20px; padding-bottom:10px;color:#29aafe;'>&nbsp;&nbsp;&nbsp;<?php echo($data_value['Message']);?></div></td>	
		</tr>
		</table>
		
	</tr>
	</table>
	
	</td>
	</tr>
	</table>
	</td>
<br/>
<table cellpadding='0' style='border-top:1px solid #e4e4e4; text-align:center; font-family:Trebuchet MS, Verdana, Arial; font-size:12px;' cellspacing='0' width='600'>
<tr>
	<td height='2' style='border-bottom:1px solid #e4e4e4;'>
	<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
	</td>
</tr>
</table>
<div>
	<center>
				<p style='font-family:Trebuchet MS, Verdana, Arial; font-size:12px;' > NO.82/2, Thiruvalluvar Road,<br/> UthukottaiTown & Tk,</br> Thiruvallur Dt - 602026</p>
	</center>	
</div>
</center>
</body>
</html>
<!DOCTYPE>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Welcome Message/provider</title>
</head>
<body>
<center>
	<table cellpadding='0' style='border-top:1px solid #e4e4e4; text-align:center; font-family:Trebuchet MS, Verdana, Arial; font-size:12px;' cellspacing='0' width='600'>
		<tr>
			<td height='2' style='border-bottom:1px solid #e4e4e4;'>
			<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
			</td>
		</tr>
	</table>
	<table cellpadding='0' style='border-top:1px solid #e4e4e4; text-align:center; font-family:Trebuchet MS, Verdana, Arial; font-size:12px;' cellspacing='0' width='600'>		
		<tr>		    
		     <td width='250' bgcolor='#FFFFFF' style='border-top:1px solid #FFF; text-align:center;' height='80' valign='middle'>
		     	
				<span style='font-size:25px; font-family:Trebuchet MS, Verdana, Arial; color:#29aafe;padding-left: 5px;float: left'><span ><img src="<?php echo base_url(); ?>assets/images/logo/new_logo.png"></span>&nbsp;Teachers Recruit</span>
			</td>
		</tr>			
</table>
<table width='600' background='#FFFFFF' style='text-align:left;' cellpadding='0' cellspacing='0'>
<tr>
	<td height='18' width='31' style='border-bottom:1px solid #e4e4e4;'>
	<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
	</td>
	<td height='18' width='131'>
	<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
	</td>
	<td height='18' width='466' style='border-bottom:1px solid #e4e4e4;'>
	<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
	</td>
</tr>
<tr>
	<td height='2' width='31' style='border-bottom:1px solid #e4e4e4;'>
	<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
	</td>
	<td height='2' width='131'>
	<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
	</td>
	<td height='2' width='466' style='border-bottom:1px solid #e4e4e4;'>
	<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
	</td>
</tr>
<!--GREEN STRIPE-->
<tr>
	<td background='<?php echo base_url(); ?>assets/images/email_template/greenback.gif' width='31' bgcolor='#f47020' style='border-top:1px solid #FFF; border-bottom:1px solid #FFF;' height='113'>
	<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
	</td>
	
	<!--WHITE TEXT AREA-->
	<td width='131' bgcolor='#FFFFFF' style='border-top:1px solid #FFF; text-align:center;' height='113' valign='middle'>
	<span style='font-size:25px; font-family:Trebuchet MS, Verdana, Arial; color:#f47020;'>Success!</span>
	</td>
	
	<!--GREEN TEXT AREA-->
	<td background='<?php echo base_url(); ?>assets/images/email_template/greenback.gif' bgcolor='#f47020' style='border-top:1px solid #FFF; border-bottom:1px solid #FFF; padding-left:15px;' height='113'>
	<span style='color:#FFFFFF; font-size:18px; font-family:Trebuchet MS, Verdana, Arial;'>Thank you for Registering at Teachers Recruit.</span>
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
	<td width='15'><div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
</td>
	<td width='325' style='padding-right:10px; font-family:Trebuchet MS, Verdana, Arial; font-size:12px;' valign='top'>
	<span style='font-family:Trebuchet MS, Verdana, Arial; font-size:17px; font-weight:bold;'>Welcome!</span>
	<br />
	<p>Hi,<?php echo $organization_name; ?></p>
	<p>Thanks for registering at Teachers Recruit. Your login details are below:</p>
	<br />
	<div style='padding-left:20px; padding-bottom:10px;color:#f47020;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt='spade image' style="display:block" height="15" width="10" title="username" />&nbsp;&nbsp;&nbsp;Username  :  <?php echo $registrant_email_id; ?></div>

	<div style='padding-left:20px; padding-bottom:10px;color:#f47020;'><img src='<?php echo base_url(); ?>assets/images/email_template/spade.gif' alt=' spade image' style="display:block" height="15" width="10" title="password"/>&nbsp;&nbsp;&nbsp;Password  : <?php echo $registrant_password; ?></div>
	

	<p>Please change your password on your next login.In the meantime, you can <a href='<?php echo base_url(); ?>'>return to my website</a> to continue browsing.</p>
	<br/><br/><br/>
   <p style='color:#f47020;'>Best Regards,<br/>
   TeachersRecruit Team</p><br/>
   <br/>
	</td>
	<td style='border-left:1px solid #e4e4e4; padding-left:15px;' valign='top'>
	
	<!--RIGHT COLUMN FIRST BOX-->
	<table width='100%' cellpadding='0' cellspacing='0' style='border-bottom:1px solid #e4e4e4; font-family:Trebuchet MS, Verdana, Arial; font-size:12px;'>
	<tr>
	<td>
	<div style='font-family:Trebuchet MS, Verdana, Arial; font-size:17px; font-weight:bold; padding-bottom:10px;'>Add Us To Your Address Book</div>
	<img src='<?php echo base_url(); ?>assets/images/email_template/addressbook.gif' align='right' style='padding-left:10px; padding-top:10px; padding-bottom:10px;' alt=''/>
	<p>To help ensure that you receive all email messages consistently in your inbox with images displayed, please add this address to your address book or contacts list:</p>
	<p style='color:#f47020;'><strong> NO.82/2, Thiruvalluvar Road, <br/>UthukottaiTown & Tk,<br/> Thiruvallur Dt - 602026</strong></p>
	<br />
	</td>
	</tr>
	</table>
	
	<!--RIGHT COLUMN SECOND BOX-->
	<br />
	<table width='100%' cellpadding='0' cellspacing='0' style='border-bottom:1px solid #e4e4e4; font-family:Trebuchet MS, Verdana, Arial; font-size:12px;'>
	<tr>
	<td>
	<div style='font-family:Trebuchet MS, Verdana, Arial; font-size:17px; font-weight:bold; padding-bottom:10px;'>Have Any Questions?</div>
	<img src='<?php echo base_url(); ?>assets/images/email_template/penpaper.gif' align='right' style='padding-left:10px; padding-top:10px; padding-bottom:10px;' alt=''/>
	<p>Don't hesitate to contact us to any of the messages you receive.</p>
	<br />
	</td>
	</tr>
	</table>
	
	<!--RIGHT COLUMN THIRD BOX-->
	
	</td>
	</tr>
	</table>
	
	</td>
	</tr>
	</table>
	</td>
</tr>
</table>
<br />
<table cellpadding='0' style='border-top:1px solid #e4e4e4; text-align:center; font-family:Trebuchet MS, Verdana, Arial; font-size:12px;' cellspacing='0' width='600'>
<tr>
	<td height='2' style='border-bottom:1px solid #e4e4e4;'>
	<div style='line-height: 0px; font-size: 1px; position: absolute;'>&nbsp;</div>
	</td>
</tr>
	
</tr>
</table>
</center>
</body>
</html>
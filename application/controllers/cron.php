<?php if (! defined('BASEPATH')) exit('No direct script access allowed');


class Cron extends CI_Controller
{

 	public function __construct()
 	{
   		parent::__construct();
   		$this->load->model('cron_model');
   		$this->load->helper('cron_helper');
   		// if (!$this->input->is_cli_request()) {
   		// 	show_error('Direct access is not allowed');
   		// }
 	}

 	// Mail sending fucntion
 	public function mail_send($message,$subject,$to) {
	    $this->config->load('email', true);
		$emailsetup = $this->config->item('email');
		$this->load->library('email', $emailsetup);
		$from_email = $emailsetup['smtp_user'];
		$this->email->initialize($emailsetup);
		$this->email->set_newline("\r\n");
		$this->email->from($from_email, 'Teacher Recruit');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
		return TRUE;
 	}

	// To perform automatic task using this function - Cron
 	public function cron_task()
 	{
	    // $this->load->library('CronRunner');
	    // $cron = new CronRunner();
	    // $cron->run();
	    /* Matching Jobs Start */

	    $data['related_jobs'] = cron_related_vacancy($this->cron_model->cron_related_jobs());
    	if(!empty($data['related_jobs'])) {
    		foreach ($data['related_jobs'] as $rel_key => $rel_val) {
    			$related['cron_related'] = $rel_val;		
    			$subject = "Matching Jobs";
    			$message = $this->load->view('email_template/cron_related_vacancy',$related,TRUE);
    			$this->mail_send($message,$subject,$rel_val['candidate_email']);
    		}
	   	}

	   	/* Matching Jobs End */

	   	/* Plan Expiry Alert Before 10 Days Start */

	   	$data['expiry_before_alert'] = $this->cron_model->plan_expiry_before_alert();
	   	if(!empty($data['expiry_before_alert'])) {
		   	foreach ($data['expiry_before_alert'] as $rel_val) {
	    		$related['organization_name'] = $rel_val['organization_name'];	
	    		$related['registrant_name'] = $rel_val['registrant_name'];		
	    		$related['subscription_name'] = $rel_val['subscription_plan'];		
	    		$subject = "Plan Expiry Alert";
	    		$message = $this->load->view('email_template/plan_expiry_b10_alert',$related,TRUE);
	    		$this->mail_send($message,$subject,$rel_val['registrant_email_id']);
	   		}
   		}

	   	/* Plan Expiry Alert Before 10 Days End */

	   	/* Grace Period Expiry Alert Before 10 Days Start */

	   	$data['grace_expiry_before_alert'] = $this->cron_model->grace_expiry_before_alert();
	   	if(!empty($data['grace_expiry_before_alert'])) {
		   	foreach ($data['grace_expiry_before_alert'] as $rel_val) {
	    		$related['organization_name'] = $rel_val['organization_name'];	
	    		$related['registrant_name'] = $rel_val['registrant_name'];		
	    		$related['subscription_name'] = $rel_val['subscription_plan'];		
	    		$subject = "Grace Period Expiry Alert";
	    		$message = $this->load->view('email_template/grace_expiry_b3_alert',$related,TRUE);
	    		$this->mail_send($message,$subject,$rel_val['registrant_email_id']);
	   		}
   		}

	   	/* Grace Period Expiry Alert Before 10 Days End */

	   	/* Plan Expiry Alert Start */

	   	// $data['expiry_alert'] = $this->cron_model->plan_expiry_alert();
	   	// if(!empty($data['expiry_alert'])) {
		   // 	foreach ($data['expiry_alert'] as $rel_val) {
	    // 		$related['organization_name'] = $rel_val['organization_name'];	
	    // 		$related['registrant_name'] = $rel_val['registrant_name'];		
	    // 		$related['subscription_name'] = $rel_val['subscription_plan'];		
	    // 		$subject = "Plan Expiry Alert";
	    // 		$message = $this->load->view('email_template/plan_expiry_b10_alert',$related,TRUE);
	    // 		$this->mail_send($message,$subject,$rel_val['registrant_email_id']);
	   	// 	}
   		// }

	   	/* Plan Expiry Alert End */

	   	/* Grace Period Expiry Alert Start */

	   	// $data['grace_expiry_alert'] = $this->cron_model->grace_expiry_alert();
	   	// if(!empty($data['grace_expiry_alert'])) {
		   // 	foreach ($data['grace_expiry_alert'] as $rel_val) {
	    // 		$related['organization_name'] = $rel_val['organization_name'];	
	    // 		$related['registrant_name'] = $rel_val['registrant_name'];		
	    // 		$related['subscription_name'] = $rel_val['subscription_plan'];		
	    // 		$subject = "Grace Period Expiry Alert";
	    // 		$message = $this->load->view('email_template/plan_expiry_b10_alert',$related,TRUE);
	    // 		$this->mail_send($message,$subject,$rel_val['registrant_email_id']);
	   	// 	}
   		// }

	   	/* Grace Period Expiry Alert End */
   	

		

		// echo "<pre>";
		// print_r($data['related_jobs']);
		// echo "</pre>";
 	}
 	// public function cron_mail()
 	// {
  //   	$subject = "Sample";
  //   	$message = "Hii... This is sample mail";
  //   	$this->mail_send($message,$subject,"kalaiarasi@etekchnoservices.com");
  //  	}

 	// public function cron_mail()
 	// {
  //   	// Email configuration
		// $this->config->load('email', true);
		// $emailsetup = $this->config->item('email');
		// $this->load->library('email', $emailsetup);
		// $from_email = $emailsetup['smtp_user'];
		// $subject = 'Sample to check cron';
		// $message = "Hii... This is sample mail";
		// $this->email->initialize($emailsetup);	
		// $this->email->from($from_email, 'Teacher Recruit');
		// $this->email->to('kalaiarasi@etekchnoservices.com');
		// $this->email->subject($subject);
		// $this->email->message($message);
		// /* Check whether mail send or not*/
		// $this->email->send();
  //  	}
}  // End

/* cron.php */
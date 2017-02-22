<?php if (! defined('BASEPATH')) exit('No direct script access allowed');


class Cron extends CI_Controller
{

 	public function __construct()
 	{
   		parent::__construct();
   		$this->load->model('cron_model');
   		$this->load->helper('cron_helper');
   		if (!$this->input->is_cli_request()) {
   			show_error('Direct access is not allowed');
   		}
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

		// echo "<pre>";
		// print_r($data['related_jobs']);
		// echo "</pre>";
 	}

}  // End

/* cron.php */
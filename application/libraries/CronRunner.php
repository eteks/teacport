<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CronRunner
{
 private $CI;

 public function __construct()
 {
    $this->CI =& get_instance();
 }

 private function calculateNextRun($obj)
 {
    return (time() + $obj->interval_sec);
 }

 public function run()
 {
   // $query = $this->CI->db->where('is_active', 1)->where('now() >= next_run_at OR next_run_at IS NULL', '', false)->from('cron')->get();
   // if ($query->num_rows() > 0) {
   //   $env = getenv('CI_ENV');
   //     foreach ($query->result() as $row) {
   //       $cmd = "export CI_ENV={$env} && {$row->command}";
   //       $this->CI->db->set('next_run_at', 'FROM_UNIXTIME('.$this->calculateNextRun($row).')', false)->where('id', $row->id)->update('cron');
   //       $output = shell_exec($cmd);
   //       $this->CI->db->set('last_run_at', 'now()', false)->where('id', $row->id)->update('cron');
   //     }
   //  } 
	$this->CI->config->load('email', true);
	$emailsetup = $this->CI->config->item('email');
	$this->CI->load->library('email', $emailsetup);
	$from_email = $emailsetup['smtp_user'];
	$subject = 'Test email';
	$message =  "Hello welcome! test message";
	$this->CI->email->initialize($emailsetup);
	$this->CI->email->set_newline("\r\n");
	$this->CI->email->from($from_email, 'Teacher Recruit');
	$this->CI->email->to('sivaramakannan05@gmail.com');
	$this->CI->email->subject($subject);
	$this->CI->email->message($message);
	$status = $this->CI->email->send();
	// echo $this->CI->email->print_debugger();



	// redirect(base_url().'allinstitutions');


	
  }
}
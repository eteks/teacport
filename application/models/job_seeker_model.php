<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_seeker_model extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	public function create_job_seeker($data)
	{
		/*query for check wheather data exist or not */
		$checkquery = $this->db->get_where('tr_candidate_profile', array(
            'candidate_email' => $data['candidate_email'],
        ));
        $count = $checkquery->num_rows();		
		/*check wheather data exist or not */
		if ($count === 0) {
			/* data not exist and insert to database and return verification message */
            $this->db->insert('tr_candidate_profile', $data);
			return 'inserted';
        }
		else{
			/* data exist and return verification message */
			return 'exists';
		}
	}
	public function check_valid_seeker_login($data){
		/*query for check wheather data exist or not */
		$where = "(candidate_email='".$data['candidate_login_data']."' AND candidate_password='".$data['candidate_password']."' AND candidate_status='1' OR candidate_mobile_no='".$data['candidate_login_data']."' AND candidate_password='".$data['candidate_password']."' AND candidate_status='1')";
		$existuser = $this->db->get_where('tr_candidate_profile',$where);
		$count = $existuser->num_rows();
		if ($count === 1) {
            $user_data = $existuser->row_array();
			$user_details['can_email'] = $user_data['candidate_email'];
			$user_details['can_userid'] = $user_data['candidate_id'];
			$user_details['can_mobile'] = $user_data['candidate_mobile_no'];
			$user_details['user_type'] = 'seeker';
			$user_details['valid_status'] = 'valid';
			return $user_details; 
		}
		else {
			$user_details['valid_status'] = 'invalid';
			return $user_details; 
		}
	}
	
	
}
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
	public function delete_job_seeker($data)
	{
		$this->db->delete('tr_candidate_profile',array('candidate_email' => $data['candidate_email']));
		return TRUE;
	}
	public function check_valid_seeker_login($data){
		/*query for check wheather data exist or not */
		$where = "(candidate_email='".$data['candidate_login_data']."' AND candidate_password='".$data['candidate_password']."' AND candidate_status='1' OR candidate_mobile_no='".$data['candidate_login_data']."' AND candidate_password='".$data['candidate_password']."' AND candidate_status='1')";
		$existuser = $this->db->get_where('tr_candidate_profile',$where);
		$count = $existuser->num_rows();
		if ($count === 1) {
            $user_data = $existuser->row_array();
            //print_r($user_data);   
			$user_details['candidate_email'] = $user_data['candidate_email'];
			$user_details['candidate_name'] = $user_data['candidate_name'];			
			$user_details['candidate_id'] = $user_data['candidate_id'];
			$user_details['login_type'] = $user_data['candidate_registration_type'];
			$user_details['candidate_date_of_birth'] = $user_data['candidate_date_of_birth'];
			$user_details['candidate_father_name'] = $user_data['candidate_father_name'];
			$user_details['candidate_state_id'] = $user_data['candidate_state_id'];
			$user_details['candidate_district_id'] = $user_data['candidate_district_id'];
			$user_details['candidate_institution_type'] = $user_data['candidate_institution_type'];
			$user_details['candidate_mobile_no'] = $user_data['candidate_mobile_no'];
			$user_details['candidate_image_path'] = $user_data['candidate_image_path'];
			$user_details['user_type'] = 'seeker';
			$user_details['valid_status'] = 'valid';
			return $user_details; 
		}
		else {
			$user_details['valid_status'] = 'invalid';
			return $user_details; 
		}
	}

	/** Seeker Social authentication **/
	public function social_authendication_registration($data)
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

	/** Seeker Social authentication **/
	public function social_valid_seeker_login($data)
	{
		$where = "(candidate_email='".$data['candidate_email']."' AND candidate_status='1')";
		$existuser = $this->db->get_where('tr_candidate_profile',$where);
		$count = $existuser->num_rows();
		if ($count === 1) {
            $user_data = $existuser->row_array();  
			$user_details['candidate_email'] = $user_data['candidate_email'];
			$user_details['candidate_name'] = $user_data['candidate_name'];			
			$user_details['candidate_id'] = $user_data['candidate_id'];
			$user_details['user_type'] = 'seeker';
			$user_details['valid_status'] = 'valid';
			$user_details['login_type'] = $user_data['candidate_registration_type'];
			$user_details['candidate_date_of_birth'] = $user_data['candidate_date_of_birth'];
			$user_details['candidate_father_name'] = $user_data['candidate_father_name'];
			$user_details['candidate_state_id'] = $user_data['candidate_state_id'];
			$user_details['candidate_district_id'] = $user_data['candidate_district_id'];
			$user_details['candidate_institution_type'] = $user_data['candidate_institution_type'];
			$user_details['candidate_mobile_no'] = $user_data['candidate_mobile_no'];
			$user_details['candidate_image_path'] = $user_data['candidate_image_path'];
			return $user_details; 
		}
		else {
			$user_details['valid_status'] = 'invalid';
			return $user_details; 
		}
	}

	public function check_has_initial_data($data) {
		
		$where = "(candidate_email='".$data."' AND candidate_status='1')";
		$validuser = $this->db->get_where('tr_candidate_profile',$where);
		$counts = $validuser->num_rows();
		if ($counts === 1) {					
			return 'has_data';
		}
		else{				
			return 'has_no_data';
		}			
	}

	public function job_seeker_update_profile($id,$profile)
	{
	 	$this->db->where('candidate_id', $id);
		$this->db->update('tr_candidate_profile', $profile);
		return 'updated';
	}

	public function get_cand_data_by_id($id)
	{
		$this->db->select('*');    
		$this->db->from('tr_candidate_profile');
		$this->db->join('tr_institution_type', 'tr_candidate_profile.candidate_institution_type = tr_institution_type.institution_type_id','left');
		$this->db->join('tr_district', 'tr_candidate_profile.candidate_district_id = tr_district.district_id','left');
		$this->db->join('tr_state', 'tr_district.district_state_id = tr_state.state_id','left');
		$where = "(tr_candidate_profile.candidate_id='".$id."' AND tr_candidate_profile.candidate_status='1')";
		$this->db->where($where);
		$existuser = $this->db->get()->row_array();
		return $existuser; 
	} 

	// public function get_candidate_resume_data($id)
	// {
	// 	$this->db->select('*');    
	// 	$this->db->from('tr_candidate_profile cp');
	// 	$this->db->join('tr_institution_type it', 'cp.candidate_institution_type = it.institution_type_id','inner');
	// 	$this->db->join('tr_district d', 'tr_candidate_profile.candidate_district_id = tr_district.district_id','left');
	// 	$this->db->join('tr_state', 'cp.district_state_id = tr_state.state_id','left');
	// 	$where = "(tr_candidate_profile.candidate_id='".$id."' AND tr_candidate_profile.candidate_status='1')";
	// 	$this->db->where($where);
	// 	$existuser = $this->db->get()->row_array();
	// 	return $existuser; 
	// } 
	// public function get_cand_data_by_mail($email)
	// {
	// 	$this->db->select('*');    
	// 	$this->db->from('tr_candidate_profile');
	// 	$this->db->join('tr_institution_type', ' tr_candidate_profile.candidate_institution_type = tr_institution_type.institution_type_id','left');
	// 	$this->db->join('tr_district', 'tr_candidate_profile.candidate_district_id = tr_district.district_id','left');
	// 	$this->db->join('tr_state', 'tr_district.district_state_id = tr_state.state_id','left');
	// 	$where = "(tr_candidate_profile.candidate_email='".$email."' AND tr_candidate_profile.candidate_status='1')";
	// 	$this->db->where($where);
	// 	$existuser = $this->db->get()->row_array();
	// 	return $existuser; 
	// } 


	public function check_seeker_popup_fields_social($data=array()) {
		$model_data['candidate_data'] =array();
		$mobile_exists_where = "candidate_mobile_no =" . "'" . $data['candidate_mobile_no'] . "' AND candidate_id NOT IN (". $this->input->post('candidate_id').")";

		$mobile_exists = $this->db->get_where('tr_candidate_profile',$mobile_exists_where);
		if($mobile_exists->num_rows() > 0) {
			$model_data['status'] = "Mobile Number Already exists";
			$model_data['error'] = 1;
		}
		else {
			$email_exists_where = "candidate_email =" . "'" . $data['candidate_email'] . "' AND candidate_id NOT IN (". $this->input->post('candidate_id').")";
			$email_exists = $this->db->get_where('tr_candidate_profile',$email_exists_where);
			if($email_exists->num_rows() > 0) {
				$model_data['error'] = 1;
				$model_data['status'] = "Email Already exists";
			}
			else {
				$update_where = '(candidate_id="'.$this->input->post('candidate_id').'")';
				$this->db->set($data);
				$this->db->where($update_where);
				$this->db->update('tr_candidate_profile',$data);
				$model_data['error'] = 2;
				$model_data['status'] = "success";
				$cand_data = $this->db->get_where('tr_candidate_profile',$update_where)->row_array();
				$model_data['candidate_data'] =array(
													'user_type' => 'seeker',
													'candidate_id' => $cand_data['candidate_id'],
													'candidate_name' => $cand_data['candidate_name'],
													'candidate_date_of_birth' => $cand_data['candidate_date_of_birth'],
													'candidate_father_name' => $cand_data['candidate_father_name'],
													'candidate_state_id' => $cand_data['candidate_state_id'],
													'candidate_district_id' => $cand_data['candidate_district_id'],
													'candidate_institution_type' => $cand_data['candidate_institution_type'],
													'candidate_mobile_no' => $cand_data['candidate_mobile_no'],
													'candidate_email' => $cand_data['candidate_email'],
													'candidate_image_path' => $cand_data['candidate_image_path'],
													'valid_status' => 'valid',
													'login_type' => $cand_data['candidate_registration_type'],
													);
			}
		}
		return $model_data;
	}
	
	public function check_seeker_popup_fields($data=array()) {
		$model_data['candidate_data'] =array();
		$update_where = 'candidate_id = "'.$this->input->post('candidate_id').'"';
		$this->db->set($data);
		$this->db->where($update_where);
		$this->db->update('tr_candidate_profile',$data);
		$cand_data = $this->db->get_where('tr_candidate_profile',$update_where)->row_array();
		$model_data['status'] = "success";
		$model_data['error'] = 2;
		$model_data['candidate_data'] =array(
											'user_type' => 'seeker',
											'candidate_id' => $cand_data['candidate_id'],
											'candidate_name' => $cand_data['candidate_name'],
											'candidate_date_of_birth' => $cand_data['candidate_date_of_birth'],
											'candidate_father_name' => $cand_data['candidate_father_name'],
											'candidate_state_id' => $cand_data['candidate_state_id'],
											'candidate_district_id' => $cand_data['candidate_district_id'],
											'candidate_institution_type' => $cand_data['candidate_institution_type'],
											'candidate_mobile_no' => $cand_data['candidate_mobile_no'],
											'candidate_email' => $cand_data['candidate_email'],
											'candidate_image_path' => $cand_data['candidate_image_path'],
											'valid_status' => 'valid',
											'login_type' => $cand_data['candidate_registration_type'],
											);
		return $model_data;
	}

	public function seeker_session_values($id) {
		$get_where = '(candidate_id="'.$id.'")';
		$cand_data = $this->db->get_where('tr_candidate_profile',$get_where)->row_array();
		$model_data  =array(
							'user_type' => 'seeker',
							'candidate_id' => $cand_data['candidate_id'],
							'candidate_name' => $cand_data['candidate_name'],
							'candidate_date_of_birth' => $cand_data['candidate_date_of_birth'],
							'candidate_father_name' => $cand_data['candidate_father_name'],
							'candidate_state_id' => $cand_data['candidate_state_id'],
							'candidate_district_id' => $cand_data['candidate_district_id'],
							'candidate_institution_type' => $cand_data['candidate_institution_type'],
							'candidate_mobile_no' => $cand_data['candidate_mobile_no'],
							'candidate_email' => $cand_data['candidate_email'],
							'candidate_image_path' => $cand_data['candidate_image_path'],
							'valid_status' => 'valid',
							'login_type' => $cand_data['candidate_registration_type'],
							);
		return $model_data;
	}



	// public function job_seeker_find_job_counts($ins_id)
	// {
	// 	$this->db->from('tr_organization_profile');
	// 	$this->db->join('tr_organization_vacancies','tr_organization_profile.organization_id = tr_organization_vacancies.vacancies_organization_id', 'left');
	// 	$where = "(tr_organization_profile.organization_institution_type_id='".$ins_id."' AND tr_organization_profile.	organization_status='1')";
	// 	$this->db->order_by('organization_id','desc');
	// 	return $this->db->where($where)->count_all_results();
	// }

	// public function job_seeker_find_jobs($limit,$start,$ins_id)
	// {
	//  	$this->db->select('*');   
	//  	$this->db->from('tr_organization_profile');
	// 	$this->db->join('tr_organization_vacancies','tr_organization_profile.organization_id =	tr_organization_vacancies.vacancies_organization_id','left');
	// 	$where = "(tr_organization_profile.organization_institution_type_id='".$ins_id."' AND tr_organization_profile.	organization_status='1')"; 		
	// 	$this->db->limit($limit,$start);
	// 	$this->db->where($where);
	// 	$findjobsjobdata = $this->db->get();
	// 	return $findjobsjobdata->result_array(); 
	// }

	/** to get applied job records **/
	public function job_seeker_applied_jobs($limit,$start,$id)
	{	
		$where = "(cap.applied_job_candidate_id='".$id."' AND cap.applied_job_status='1')"; 		
	 	$this->db->select('*');   
	 	$this->db->from('tr_candidate_applied_job cap');
		$this->db->join('tr_organization_vacancies ov','cap.applied_job_vacancies_id =	ov.vacancies_id','inner');
		$this->db->join('tr_organization_profile op','ov.vacancies_organization_id = op.organization_id','inner');
		$this->db->limit($limit,$start);
		$this->db->order_by('cap.applied_job_id','desc');
		$this->db->where($where);
		$findjobsjobdata = $this->db->get();
		return $findjobsjobdata->result_array(); 
	}

	// Get applied job value
	public function job_seeker_applied_value($id)
	{	
		$where = "(applied_job_candidate_id='".$id."' AND applied_job_status='1')"; 		
	 	$this->db->select('applied_job_vacancies_id');   
	 	$this->db->from('tr_candidate_applied_job');
		$this->db->where($where);
		$findjobsjobdata = $this->db->get();
		$data = implode(', ', array_column($findjobsjobdata->result_array(), 'applied_job_vacancies_id'));
		return $data ; 
	}

	public function job_seeker_detail_jobs($id)
	{
	 	$this->db->select('*');   
	 	$this->db->from('tr_organization_vacancies');
		$this->db->join('tr_organization_profile','tr_organization_vacancies.vacancies_organization_id =	tr_organization_profile.organization_id','left');
		$this->db->join('tr_class_level','tr_organization_vacancies.vacancies_class_level_id =	tr_class_level.class_level_id','left');
		$this->db->join('tr_university_board','tr_organization_vacancies.vacancies_university_board_id =	tr_university_board.education_board_id','left');
		$this->db->join('tr_subject','tr_organization_vacancies.vacancies_subject_id =	tr_subject.subject_id','left');
		$where = "(tr_organization_vacancies.vacancies_id='".$id."' AND tr_organization_vacancies.	vacancies_status='1')"; 				
		$this->db->where($where);
		$findjobsjobdata = $this->db->get();
		return $findjobsjobdata->row_array(); 
	}

	public function job_seeker_applied_status($cand_id,$vac_id)
	{
		$where = "(applied_job_candidate_id='".$cand_id."' AND applied_job_vacancies_id='".$vac_id."')";
		$data = $this->db->get_where('tr_candidate_applied_job',$where)->num_rows();
		return $data; 
	}
	

	public function get_relatedjob_list($vac_id,$ins_id)
	{	
		$data = array();
		$vac_where = '(vacancies_id="'.$vac_id.'" AND vacancies_status=1)';
		$this->db->select('vacancies_job_title');
		$this->db->from('tr_organization_vacancies');
		$vac_title = $this->db->where($vac_where)->get()->row_array();
		
		if(!empty($vac_title)) {
	        $job_where = '((cp.vacancies_status=1 AND cp.vacancies_id!="'.$vac_id.'" AND cp.vacancies_job_title LIKE "%'.$vac_title['vacancies_job_title'].'%") OR (cp.vacancies_status=1 AND cp.vacancies_id!="'.$vac_id.'" AND  op.organization_institution_type_id="'.$ins_id.'"))';
			$this->db->select('*');
	        $this->db->from('tr_organization_vacancies cp');
	        $this->db->join('tr_organization_profile op','cp.vacancies_organization_id = op.organization_id','inner');
	       	// $this->db->like('cp.vacancies_job_title',$vac_title['vacancies_job_title']);
	        $this->db->where($job_where);
	        $this->db->order_by('cp.vacancies_id','desc');
	        $this->db->limit(15,0);
	        $data = $this->db->group_by('cp.vacancies_id')->get()->result_array();
		}
		return $data;
	}

	// Get seeker details
	public function get_seeker_details($id)
	{
		$this->db->select('*');
		$this->db->from('tr_candidate_profile cp');
		$this->db->join('tr_candidate_preferance cpre','cp.candidate_id=cpre.candidate_profile_id','left');
		$this->db->where(array('candidate_id' => $id));
		$value = $this->db->get()->row_array();
		// $value = $this->db->get_where('tr_candidate_profile',array('candidate_id' => $id))->row_array();
		return $value;
	}

	// Get seeker applied job details
	public function get_seeker_applied_job($id)
	{
		$value = $this->db->get_where('tr_candidate_applied_job',array('applied_job_candidate_id' => $id, 'applied_job_status' => '1'))->result_array();
		return $value;
	}
	
	// Get seeker education details
	public function get_seeker_education_details($id)
	{
		$where = '(candidate_profile_id = "'.$id.'" AND candidate_education_status =1)';
		$this->db->select('*');
		$this->db->from('tr_candidate_education ce');
		$this->db->join('tr_educational_qualification eq','ce.candidate_education_qualification_id=eq.educational_qualification_id','inner');
		$this->db->join('tr_languages l','ce.candidate_medium_of_inst_id=l.language_id','inner');
		$this->db->join('tr_departments d','ce.candidate_education_department_id=d.departments_id','left');
		$this->db->join('tr_university_board u','ce.candidate_edu_board=u.education_board_id','left');
		$value = $this->db->where($where)->get()->result_array();
		return $value;
	}

	// Get seeker experience details
	public function get_seeker_experience_details($id)
	{
		$value = $this->db->get_where('tr_candidate_experience',array('candidate_profile_id' => $id, 'candidate_experience_status' => '1'))->result_array();
		return $value;
	}

	// Get seeker education details
	public function password_change($data=array())
	{
		$password_check_where =  '(candidate_id="'.$data['candidate_id'].'" and candidate_password="'.$data['old_password'].'")';
		$password_check = $this->db->get_where('tr_candidate_profile',$password_check_where);
		if($password_check->num_rows() == 1) {
			$password_update_where = '(candidate_id="'.$data['candidate_id'].'")';
			$password_update_data = array('candidate_password' => $data['new_password']);
			$this->db->set($password_update_data);
			$this->db->where($password_update_where);
			$this->db->update('tr_candidate_profile',$password_update_data);
			$model_data['status'] = "Updated successfully";
			$model_data['error'] = 2;
		}
		else {
			$model_data['error'] = 1;
			$model_data['status'] = "Password Not match";
		}
		return $model_data;
	}
	public function candidate_profile_by_id($id) {
		$cand_where = '(candidate_id="'.$id.'")';
		$value = $this->db->get_where('tr_candidate_profile',$cand_where)->row_array();
		return $value;
	}
	// To get sidebar values
	public function candidate_sidebar_menu_values($id) {
		$cand_where = '(candidate_id="'.$id.'")';
		return $this->db->select('candidate_name,candidate_image_path,candidate_facebook_url,candidate_googleplus_url,candidate_linkedin_url,candidate_profile_completeness')->from('tr_candidate_profile')->where($cand_where)->get()->row_array();
	}

	//  Inbox start

	// Inbox unread message count
	public function job_seeker_unread_inbox_count($candidate_id)
	{
	 	$this->db->select('count(is_viewed) as messagecount');    
		$this->db->from('tr_candidate_inbox');
		$where = "(candidate_id='".$candidate_id."' AND candidate_inbox_status='1' AND is_viewed ='0')";
		$this->db->where($where);
		$inboxcount = $this->db->get()->row_array();
		return $inboxcount['messagecount']; 
	}

	public function job_seeker_inbox($candidate_id)
	{
	 	$this->db->select('*');    
		$this->db->from('tr_candidate_inbox ci');
		$this->db->join('tr_organization_profile op', 'ci.candidate_organization_id = op.organization_id');
		$this->db->join('tr_organization_vacancies ov', 'ci.candidate_vacancy_id = ov.vacancies_id','left');
		$where = "(ci.candidate_id='".$candidate_id."' AND ci.candidate_inbox_status='1')";
		$this->db->order_by('ci.candidate_inbox_id','desc');
		$this->db->where($where);
		$inboxdata = $this->db->get();
		return $inboxdata->result_array(); 
	}

	public function job_seeker_inbox_ajax($candidate_id,$lastid)
	{
	 	$this->db->select('*');    
		$this->db->from('tr_candidate_inbox ci');
		$this->db->join('tr_organization_profile op', 'ci.candidate_organization_id = op.organization_id');
		$this->db->join('tr_organization_vacancies ov', 'ci.candidate_vacancy_id = ov.vacancies_id','left');
		$where = "(ci.candidate_id='".$candidate_id."' AND ci.candidate_inbox_status='1' AND ci.candidate_inbox_id > '".$lastid."')";
		$this->db->order_by('ci.candidate_inbox_id','desc');
		$this->db->where($where);
		$inboxdata = $this->db->get();
		return $inboxdata->result_array(); 
	}

	public function job_seeker_inbox_full_data($id)
	{
		// Update viewd status
		$this->db->set('is_viewed','1');
		$this->db->where('candidate_inbox_id',$id);
		$this->db->update('tr_candidate_inbox');
		return "success"; 
	}

	// Inbox remove data
	public function job_seeker_inbox_removedata($id=array())
	{	
		$remove_id = explode(',',$id);
		$this->db->where_in('candidate_inbox_id', $remove_id);
		$this->db->delete('tr_candidate_inbox');
		return "success"; 
	}
	
	//  Inbox end

	// Edit profile updation
	public function editprofile_validation($data=array()) {
		if(!$this->input->post('cand_fresh')) {
			$fresh = 0 ;
		}
		else {
			$fresh = 1 ;
		}

		// Check Mobile Number already exists or not
		$mobile_exists_where = "candidate_mobile_no =" . "'" . $data['cand_mobile'] . "' AND candidate_id NOT IN (". $this->input->post('cand_pro').")";

		$mobile_exists = $this->db->get_where('tr_candidate_profile',$mobile_exists_where);
		if($mobile_exists->num_rows() > 0) {
			$status = "Mobile Number Already exists";
		}
		else {
			// Check Email already exists or not
			$email_exists_where = "candidate_email =" . "'" . $data['cand_email'] . "' AND candidate_id NOT IN (". $this->input->post('cand_pro').")";
			$email_exists = $this->db->get_where('tr_candidate_profile',$email_exists_where);
			if($email_exists->num_rows() > 0) {
				$status = "Email Already exists";
			}
			else {
				$pro_com = 90;	
				if(!empty($data['cand_pic'])) {	
					$pro_com = $pro_com + 2;	
				}
				if(!empty($data['cand_live_dis'])) {	
					$pro_com = $pro_com + 2;	
				}
				if(!empty($data['cand_pincode'])) {	
					$pro_com = $pro_com + 2;	
				}
				if(!empty($data['cand_addr1']) || !empty($data['cand_addr2'])) {	
					$pro_com = $pro_com + 2;	
				}
				if(!empty($data['cand_facebook']) && !empty($data['cand_google']) && !empty($data['cand_linkedin'])) {	
					$pro_com = $pro_com + 2;	
				}

				$candidate_dob_explode = explode('/', $data['cand_dob']);
				$candidate_dob = $candidate_dob_explode[2]."-".$candidate_dob_explode[1]."-".$candidate_dob_explode[0];
				//newly added by kalai for client request
				if(!empty($data['cand_extra_cur_new']))
					$data['cand_extra_cur_new'] = implode(',', $data['cand_extra_cur_new']);
				else
					$data['cand_extra_cur_new'] = NULL;
				// Updation in profile table
				$profile_update_data = array(
								'candidate_name' => $data['cand_firstname'],
								'candidate_gender' => $data['cand_gen'],
								'candidate_date_of_birth' => $candidate_dob,
								'candidate_father_name' => $data['cand_fa_name'],
								'candidate_image_path' => $data['cand_pic'],
								'candidate_resume_upload_path' => $data['cand_resume'],
								'candidate_marital_status' => $data['cand_marital'],
								'candidate_district_id' => $data['cand_native_dis'],
								'candidate_state_id' => $data['cand_native_state'],						
								'candidate_mother_tongue' => $data['cand_mother_ton'],
								'candidate_institution_type' => implode(',',$data['cand_ins']),
								'candidate_language_known' => implode(',',$data['cand_known_lan_new']),
								'candidate_nationality' => $data['cand_nation'],
								'candidate_religion' => $data['cand_religion'],
								'candidate_community' => $data['cand_communal'],
								'candidate_is_physically_challenged' => $data['cand_phy'],
								'candidate_address_1' => $data['cand_addr1'],
								'candidate_address_2' => $data['cand_addr2'],
								'candidate_live_district_id' =>($data['cand_live_dis']) ? $data['cand_live_dis'] : NULL,
								'candidate_live_state_id' => ($data['cand_live_state']) ? $data['cand_live_state'] : NULL,
								// 'candidate_pincode' => $data['cand_pincode'],
								'candidate_pincode' => ($data['cand_pincode']) ?$data['cand_pincode'] : NULL,
								'candidate_email' => $data['cand_email'],
								'candidate_mobile_no' => $data['cand_mobile'],
								'candidate_facebook_url' => $data['cand_facebook'],
								'candidate_googleplus_url' => $data['cand_google'],
								'candidate_linkedin_url' => $data['cand_linkedin'],
								'candidate_tet_exam_status' => $data['cand_tet'],
								'candidate_profile_completeness' => $pro_com,
								// 'candidate_interest_subject_id' => $data['cand_int_sub'],
								// 'candidate_extra_curricular_id' => implode(',', $data['cand_extra_cur_new']),
								'candidate_extra_curricular_id' => $data['cand_extra_cur_new'],
								'candidate_is_fresher' => $fresh,
								);
				$this->db->set($profile_update_data);
				$this->db->where('candidate_id',$data['cand_pro']);
				$this->db->update('tr_candidate_profile',$profile_update_data);	
				// echo $this->db->last_query();

				// Updation in preference table
				$prefrence_update_data = array(
											'candidate_profile_id' => $data['cand_pro'],
											'candidate_posting_applied_for' => implode(',',$data['cand_posts_new']),
											'candidate_expecting_start_salary' => $data['cand_start_sal'],
											'candidate_expecting_end_salary' => $data['cand_end_sal'],
											'candidate_willing_class_level_id' => implode(',',$data['cand_class']),
											'candidate_willing_subject_id' => implode(',',$data['cand_sub_new'])
											);
				if(!empty($data['cand_pre'])) {
					$this->db->set($prefrence_update_data);
					$this->db->where('candidate_preferance_id',$data['cand_pre']);
					$this->db->update('tr_candidate_preferance',$prefrence_update_data);
				}
				else {
					// Insertion in preference table
					$this->db->insert('tr_candidate_preferance',$prefrence_update_data);
				}


				// Updation in education table
				$data_education = array_map(null,$data['cand_qual'],$data['cand_yop'],$data['cand_med'],$data['cand_dept'],$data['cand_board'],$data['cand_percen'],$data['cand_edu']);

				$edu_set = explode(',',$this->input->post('edu_set'));
				foreach ($data_education as $edu_key => $edu_val) {
					if(!empty($edu_val[6])) {
						if($edu_val[3] == 0) {
							$edu_val[3] = NULL;
						}
						$education_update_data = array(
										'candidate_education_qualification_id' => $edu_val[0],
										'candidate_education_yop' => $edu_val[1],
										'candidate_medium_of_inst_id' => $edu_val[2],
										'candidate_education_department_id' => $edu_val[3],
										'candidate_edu_board' => $edu_val[4],
										'candidate_education_percentage' => $edu_val[5]
										);
						$this->db->set($education_update_data);
						$this->db->where('candidate_education_id',$edu_val[6]);
						$this->db->update('tr_candidate_education',$education_update_data);
						if (in_array($edu_val[6], $edu_set)) 
						{
						    unset($edu_set[array_search($edu_val[6],$edu_set)]);
						}
					}
					else {
						// Insertion in education table
						if($edu_val[3] == 0) {
							$edu_val[3] = NULL;
						}
						$education_insert_data = array(
										'candidate_education_qualification_id' => $edu_val[0],
										'candidate_education_yop' => $edu_val[1],
										'candidate_medium_of_inst_id' => $edu_val[2],
										'candidate_education_department_id' => $edu_val[3],
										'candidate_edu_board' => $edu_val[4],
										'candidate_education_percentage' => $edu_val[5],
										'candidate_profile_id' => $data['cand_pro'],
										'candidate_education_status' => '1'
										);
						$this->db->insert('tr_candidate_education',$education_insert_data);
					}
				}
				// Delete record in education table
				if (!empty($edu_set)) {
			        $this->db->where_in('candidate_education_id', $edu_set);
			        $this->db->delete('tr_candidate_education');
			    }

				// Updation in experience table
				if($fresh == 0 ) {
					$exp_set = explode(',',$this->input->post('exp_set'));
					$data_experience = array_map(null,$data['cand_exp_class'],$data['cand_exp_sub'],$data['cand_exp_board'],$data['cand_exp_yr'],$data['cand_exp']);
					foreach ($data_experience as $exp_key => $exp_val) {
						if(!empty($exp_val[4])) {
							$experience_update_data = array(
											'candidate_experience_class_level_id' => $exp_val[0],
											'candidate_experience_subject_id' => $exp_val[1],
											'candidate_experience_board' => $exp_val[2],
											'candidate_experience_year' => $exp_val[3]
											);
							$this->db->set($experience_update_data);
							$this->db->where('candidate_experience_id',$exp_val[4]);
							$this->db->update('tr_candidate_experience',$experience_update_data);
							if (in_array($exp_val[4], $exp_set)) 
							{
							    unset($exp_set[array_search($exp_val[4],$exp_set)]);
							}
						}
						else {
							$experience_insert_data = array(
											'candidate_experience_class_level_id' => $exp_val[0],
											'candidate_experience_subject_id' => $exp_val[1],
											'candidate_experience_board' => $exp_val[2],
											'candidate_experience_year' => $exp_val[3],
											'candidate_profile_id' => $data['cand_pro'],
											'candidate_experience_status' => 1
											);
							$this->db->insert('tr_candidate_experience',$experience_insert_data);
						}
					}
					// Delete record in education table
					if (!empty($exp_set)) {
				        $this->db->where_in('candidate_experience_id', $exp_set);
				        $this->db->delete('tr_candidate_experience');
				    }
				}
				else {
					$this->db->where('candidate_profile_id',$data['cand_pro']);
					$this->db->delete('tr_candidate_experience');
				}
				$status = "success";
			}
		}
		return $status;
	}

	//get 
	public function qualification_ids($value){
		$this->db->select('*');    
		$this->db->from('tr_educational_qualification');
		$where = "(educational_qualification_id in (".$value.") AND educational_qualification_status='1')";
		$this->db->where($where);
		$subjectdata = $this->db->get();
		return $subjectdata->result_array(); 
	}

	public function medium_of_instruction($value){
		$this->db->select('*');    
		$this->db->from('tr_languages');
		$where = "(language_id in (".$value.") AND language_status='1')";
		$this->db->where($where);
		$subjectdata = $this->db->get();
		return $subjectdata->result_array(); 
	}

	public function job_seeker_applied_job($inbox_data,$applied_data)
	{
		$where = '(applied_job_vacancies_id="'.$applied_data['applied_job_vacancies_id'].'" AND applied_job_candidate_id="'.$applied_data['applied_job_candidate_id'].'")';
		$check_exist = $this->db->get_where('tr_candidate_applied_job',$where)->num_rows();
		if($check_exist == 0) {
			$this->db->insert('tr_candidate_applied_job', $applied_data);
		 	$this->db->insert('tr_organizaion_inbox', $inbox_data);
		 	return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function job_seeker_apply_status($cand_id,$vac_id)
	{
		$pro_where = '(candidate_id="'.$cand_id.'" AND candidate_profile_completeness>=90 AND candidate_status=1)';
		$pro_value = $this->db->get_where('tr_candidate_profile',$pro_where)->num_rows();
		if($pro_value == 1) {
			$apply_where = '(applied_job_vacancies_id="'.$vac_id.'" AND applied_job_candidate_id="'.$cand_id.'")';
			$apply_value = $this->db->get_where('tr_candidate_applied_job',$apply_where)->num_rows();	
			if($apply_value == 1) {
				$status = "You are already applied for this job";
			}
			else {
				$status = "success";
			}
		}
		else {
			$status = "You are not eligible to apply job. To fill all details in your profile";
		}
		return $status;
	}

	public function candidate_feedback_form($data)
	{
		if($this->db->insert('tr_feedback_form', $data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function get_seeker_search_results($limit,$start,$ins_id,$data=array())
    {
    	if(!empty($data['experience'])) {
    		if($data['experience'] <= 10) {
    			$min_exp = $data['experience'];
    			$max_exp = $data['experience'] + 1;
    		}
    		else {
    			$min_exp = $data['experience'];
    			$max_exp = 90; // Maximum experience - We must give it
    		}
    	}

  		// Search with limit
   		$this->db->select('*');
   		$this->db->from('tr_organization_vacancies ov');
   		$this->db->join('tr_organization_profile op','ov.vacancies_organization_id=op.organization_id','inner');
 		$this->db->join('tr_organization_subscription ops','op.organization_id=ops.organization_id and organization_subscription_status=1','left');
   		$this->db->join('tr_subscription s','ops.subscription_id=s.subscription_id','left');
  		if(!empty($data['keyword'])) {
   			$like_where = '(ov.vacancies_job_title LIKE "%'.$data['keyword'].'%" OR op.organization_name LIKE "%'.$data['keyword'].'%")';
			$this->db->where($like_where);
   		}
        $this->db->where(array('ov.vacancies_status' => '1'));
        $this->db->where("FIND_IN_SET(op.organization_institution_type_id,'".$ins_id."') !=", 0);
   		if(!empty($data['min_amount']) && !empty($data['max_amount'])) {
        	$this->db->where("ov.vacancies_start_salary <=".$data['max_amount']."");
        	$this->db->where("ov.vacancies_end_salary >=".$data['min_amount']."");
        }
        if(!empty($data['min_amount']) && empty($data['max_amount'])) {
        	$this->db->where("ov.vacancies_end_salary >=".$data['min_amount']."");
        }
        if(!empty($data['max_amount']) && empty($data['min_amount'])) {
        	$this->db->where("ov.vacancies_start_salary <=".$data['max_amount']."");
        }
	    if(!empty($data['location'])) {
        	$this->db->where('op.organization_district_id',$data['location']);
        }	
        if(!empty($data['posting'])) {
        	$this->db->where('ov.vacancies_applicable_posting_id',$data['posting']);
        }
        if(!empty($data['experience'])) {
        	$this->db->where("ov.vacancies_experience BETWEEN $min_exp AND $max_exp");
        }
        if(isset($data['experience']) && $data['experience']!='' && $data['experience']==0) {
        	$this->db->where("ov.vacancies_experience = 0");
        }
        if(!empty($data['qualification'])) {
        	$this->db->where("FIND_IN_SET('".$data['qualification']."',ov.vacancies_qualification_id) !=", 0);
        }
        if(isset($_GET['pos']) && !empty($_GET['pos'])) {
        	$this->db->where("FIND_IN_SET(ov.vacancies_applicable_posting_id,'".$_GET['pos']."') !=", 0);
        }
        // if(!empty($data['institution'])) {
        // 	$this->db->where('op.organization_institution_type_id',$data['institution']);
        // }
        if(!empty($data['candidate_work_type'])) {
        	$this->db->where('op.vacancies_type',$data['candidate_work_type']);
        }
        $this->db->limit($limit,$start);
        $this->db->order_by('s.subscription_price desc,ops.organization_subscription_status desc,ov.vacancies_id desc');
        // $this->db->order_by('ov.vacancies_id','desc');
        $model_data['search_results'] = $this->db->get()->result_array();

	    // echo $this->db->last_query();
        // echo "<pre>";
        // print_r($model_data['search_results']);
        // echo "</pre>";

       	// Total count
        $this->db->select('*');
   		$this->db->from('tr_organization_vacancies ov');
   		$this->db->join('tr_organization_profile op','ov.vacancies_organization_id=op.organization_id','inner');
   		 		$this->db->join('tr_organization_subscription ops','op.organization_id=ops.organization_id and organization_subscription_status=1','left');
   		$this->db->join('tr_subscription s','ops.subscription_id=s.subscription_id','left');
   		if(!empty($data['keyword'])) {
   			$like_where = '(ov.vacancies_job_title LIKE "%'.$data['keyword'].'%" OR op.organization_name LIKE "%'.$data['keyword'].'%")';
			$this->db->where($like_where);
   		}
   		$this->db->where(array('ov.vacancies_status' => '1'));
        $this->db->where("FIND_IN_SET(op.organization_institution_type_id,'".$ins_id."') !=", 0);
   		if(!empty($data['min_amount']) && !empty($data['max_amount'])) {
        	$this->db->where("ov.vacancies_start_salary <=".$data['max_amount']."");
        	$this->db->where("ov.vacancies_end_salary >=".$data['min_amount']."");
        }
        if(!empty($data['min_amount']) && empty($data['max_amount'])) {
        	$this->db->where("ov.vacancies_end_salary >=".$data['min_amount']."");
        }
        if(!empty($data['max_amount']) && empty($data['min_amount'])) {
        	$this->db->where("ov.vacancies_start_salary <=".$data['max_amount']."");
        }
	    if(!empty($data['location'])) {
        	$this->db->where('op.organization_district_id',$data['location']);
        }	
        if(!empty($data['posting'])) {
        	$this->db->where('ov.vacancies_applicable_posting_id',$data['posting']);
        }
        if(!empty($data['experience'])) {
        	$this->db->where("ov.vacancies_experience BETWEEN $min_exp AND $max_exp");
        }
        if(isset($data['experience']) && $data['experience']!='' && $data['experience']==0) {
        	$this->db->where("ov.vacancies_experience = 0");
        }
        if(!empty($data['qualification'])) {
        	$this->db->where("FIND_IN_SET('".$data['qualification']."',ov.vacancies_qualification_id) !=", 0);
        }
        if(isset($_GET['pos']) && !empty($_GET['pos'])) {
        	$this->db->where("FIND_IN_SET(ov.vacancies_applicable_posting_id,'".$_GET['pos']."') !=", 0);
        }
        // if(!empty($data['institution'])) {
        // 	$this->db->where('op.organization_institution_type_id',$data['institution']);
        // }
        if(!empty($data['candidate_work_type'])) {
        	$this->db->where('op.vacancies_type',$data['candidate_work_type']);
        }
        $this->db->order_by('s.subscription_price desc,ops.organization_subscription_status desc,ov.vacancies_id desc');
        // $this->db->order_by('ov.vacancies_id','desc');

        $model_data['total_rows'] = $this->db->get()->num_rows();

        return $model_data;
    }

    // Candidate job applied count
    public function candidate_job_applied_count($id)
	{
		$this->db->select('count(applied_job_vacancies_id) as applied_count');
		$this->db->from('tr_candidate_applied_job');
		$this->db->where(array('applied_job_candidate_id' => $id, 'applied_job_status' => '1'));
		$data = $this->db->get()->row_array();
		return $data['applied_count'];
	}

    

} // End
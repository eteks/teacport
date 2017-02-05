<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_provider_model extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	public function create_job_provider($data)
	{
		/*query for check wheather data exist or not */
		$checkquery = $this->db->get_where('tr_organization_profile', array(
            'registrant_email_id' => $data['registrant_email_id'],
        ));
		$count = $checkquery->num_rows();
		/*check wheather data exist or not */
		if ($count === 0) {
			/* data not exist and insert to database and return verification message */
            $this->db->insert('tr_organization_profile', $data);
			return 'inserted';
        }
		else{
			/* data exist and return verification message */
			return 'exists';
		}
	}
	public function check_valid_provider_login($data){
		/*query for check wheather data exist or not */
		$where = "(registrant_email_id='".$data['registrant_login_data']."' AND registrant_password='".$data['registrant_password']."' AND organization_status='1' OR registrant_mobile_no='".$data['registrant_login_data']."' AND registrant_password='".$data['registrant_password']."' AND organization_status='1')";
		$existuser = $this->db->get_where('tr_organization_profile',$where);
		$count = $existuser->num_rows();
		if ($count === 1) {
            $user_data = $existuser->row_array();
			$user_details['pro_email'] = $user_data['registrant_email_id'];
			$user_details['pro_userid'] = $user_data['organization_id'];
			$user_details['pro_mobile'] = $user_data['registrant_mobile_no'];
			$user_details['provider_image_path'] = $user_data['registrant_logo'];
			$user_details['registrant_name'] = $user_data['registrant_name'];
			$user_details['organization_name'] = $user_data['organization_name'];
			$user_details['user_type'] = 'provider';
			$user_details['valid_status'] = 'valid';
			$user_details['institution_type'] = $user_data['organization_institution_type_id'];
			$user_details['login_type'] = 'teacherrecruit';
			return $user_details; 
		}
		else {
			$user_details['valid_status'] = 'invalid';
			return $user_details; 
		}
	}

	public function social_authendication_registration($data)
	{
		/*query for check wheather data exist or not */
		$checkquery = $this->db->get_where('tr_organization_profile', array(
            'registrant_email_id' => $data['registrant_email_id'],
        ));
		$count = $checkquery->num_rows();
		/*check wheather data exist or not */
		if ($count === 0) {
			/* data not exist and insert to database and return verification message */
            $this->db->insert('tr_organization_profile', $data);
			return 'inserted';
        }
		else{
			/* data exist and return verification message */
			return 'exists';
		}
	}

	public function social_valid_provider_login($data)
	{
		$where = "(registrant_email_id='".$data['registrant_email_id']."' AND organization_status='1')";
		$existuser = $this->db->get_where('tr_organization_profile',$where);
		$count = $existuser->num_rows();
		if ($count === 1) {
            $user_data = $existuser->row_array();
			$user_details['pro_email'] = $user_data['registrant_email_id'];
			$user_details['pro_userid'] = $user_data['organization_id'];
			$user_details['registrant_name'] = $user_data['registrant_name'];
			$user_details['provider_image_path'] = $user_data['registrant_logo'];
			$user_details['organization_name'] = $user_data['organization_name'];
			$user_details['user_type'] = 'provider';
			$user_details['valid_status'] = 'valid';
			$user_detalls['login_type'] = $user_data['registrant_register_type'];
			return $user_details; 
		}
		else {
			$user_details['valid_status'] = 'invalid';
			return $user_details; 
		}
	}
	public function check_has_initial_data($data)
	{
		$where = "((((registrant_password IS NULL OR registrant_password = '') AND registrant_email_id='".$data."') OR ((registrant_mobile_no IS NULL OR registrant_mobile_no ='')  AND registrant_email_id='".$data."') AND organization_status='1' ))";
		$validuser = $this->db->get_where('tr_organization_profile',$where);
		$counts = $validuser->num_rows();
		if ($counts === 1) {
			return 'has_no_data';
		}
		else{
			return 'has_data';
		}	
	}
	public function get_org_data_by_id($id)
	{
		
		$this->db->select('*');    
		$this->db->from('tr_organization_profile');
		$wherecheck = "(tr_organization_profile.organization_id='".$id."' AND tr_organization_profile.organization_status='1')";
		$this->db->where($wherecheck);
		$checkuser = $this->db->get()->row_array();
		$this->db->select('*');    
		$this->db->from('tr_organization_profile');
		if($checkuser['organization_institution_type_id']){
			$this->db->join('tr_institution_type', ' tr_organization_profile.organization_institution_type_id = tr_institution_type.institution_type_id');
		}
		if($checkuser['organization_district_id']){
			$this->db->join('tr_district', 'tr_organization_profile.organization_district_id = tr_district.district_id');
			$this->db->join('tr_state', 'tr_district.district_state_id = tr_state.state_id');
		}
		$where = "(tr_organization_profile.organization_id='".$id."' AND tr_organization_profile.organization_status='1')";
		$this->db->where($where);
		$existuser = $this->db->get()->row_array();
		return $existuser; 
	} 
	public function get_org_data_by_mail($email)
	{
		$this->db->select('*');    
		$this->db->from('tr_organization_profile');
		$wherecheck = "(tr_organization_profile.registrant_email_id='".$email."' AND tr_organization_profile.organization_status='1')";
		$this->db->where($wherecheck);
		$checkuser = $this->db->get()->row_array();
		$this->db->select('*');    
		$this->db->from('tr_organization_profile');
		if($checkuser['organization_institution_type_id']){
			$this->db->join('tr_institution_type', ' tr_organization_profile.organization_institution_type_id = tr_institution_type.institution_type_id');
		}
		if($checkuser['organization_district_id']){
			$this->db->join('tr_district', 'tr_organization_profile.organization_district_id = tr_district.district_id');
			$this->db->join('tr_state', 'tr_district.district_state_id = tr_state.state_id');
		}
		$where = "(tr_organization_profile.registrant_email_id='".$email."' AND tr_organization_profile.organization_status='1')";
		$this->db->where($where);
		$existuser = $this->db->get()->row_array();
		return $existuser; 
	} 
	public function edit_profile_completeness($id)
	{
		$where = "(organization_id='".$id."' AND ((organization_logo IS NULL OR organization_logo ='') OR (organization_address_1 IS NULL OR organization_address_1 ='') OR (organization_address_2 IS NULL OR organization_address_2 ='') OR (organization_address_3 IS NULL OR organization_address_3 ='') OR (organization_district_id IS NULL OR organization_district_id ='') OR (organization_district_id IS NULL OR organization_district_id ='') OR (registrant_name IS NULL OR registrant_name ='') OR (registrant_designation IS NULL OR registrant_designation ='') OR (registrant_date_of_birth IS NULL OR registrant_date_of_birth ='')) AND organization_status='1')";
		$check_completeness = $this->db->get_where('tr_organization_profile',$where);
		
	}
	public function job_provider_update_profile($id,$profile)
	{
	 	$this->db->where('organization_id', $id);
		$this->db->update('tr_organization_profile', $profile);
		return 'updated';
	}
	public function job_provider_inbox($organizationid)
	{
	 	$this->db->select('*');    
		$this->db->from('tr_organizaion_inbox');
		$this->db->join('tr_candidate_profile', ' tr_organizaion_inbox.inbox_candidate_id = tr_candidate_profile.candidate_id');
		$this->db->join('tr_organization_vacancies', 'tr_organizaion_inbox.inbox_vacancy_id = tr_organization_vacancies.vacancies_id');
		$where = "(tr_organizaion_inbox.inbox_organization_id='".$organizationid."' AND tr_organizaion_inbox.inbox_status='1')";
		$this->db->order_by('inbox_id','desc');
		$this->db->where($where);
		$inboxdata = $this->db->get();
		return $inboxdata->result_array(); 
	}
	public function job_provider_unread_inbox_count($organizationid)
	{
	 	$this->db->select('count(is_viewed) as messagecount');    
		$this->db->from('tr_organizaion_inbox');
		$where = "(inbox_organization_id='".$organizationid."' AND inbox_status='1' AND is_viewed ='0')";
		$this->db->where($where);
		$inboxcount = $this->db->get()->row_array();
		return $inboxcount['messagecount']; 
	}
	public function job_provider_inbox_ajax($organizationid,$lastid)
	{
	 	$this->db->select('*');    
		$this->db->from('tr_organizaion_inbox');
		$this->db->join('tr_candidate_profile', ' tr_organizaion_inbox.inbox_candidate_id = tr_candidate_profile.candidate_id');
		$this->db->join('tr_organization_vacancies', 'tr_organizaion_inbox.inbox_vacancy_id = tr_organization_vacancies.vacancies_id');
		$where = "(tr_organizaion_inbox.inbox_organization_id='".$organizationid."' AND tr_organizaion_inbox.inbox_status='1' AND tr_organizaion_inbox.inbox_id > '".$lastid."')";
		$this->db->order_by('inbox_id','desc');
		$this->db->where($where);
		$inboxdata = $this->db->get();
		return $inboxdata->result_array(); 
	}
	public function job_provider_post_vacancy($vacancydata)
	{	
		$where = '(organization_id="'.$vacancydata['vacancies_organization_id'].'" AND 	organization_subscription_status=1 AND organization_vacancy_remaining_count > 0)';
		$validitity = $this->db->get_where('tr_organization_subscription',$where)->num_rows();
		if($validitity == 1) {
			if($this->db->insert('tr_organization_vacancies', $vacancydata)){
				$update_where = '(organization_id="'.$vacancydata['vacancies_organization_id'].'" AND 	organization_subscription_status=1)';
				$this->db->where($update_where);
				$this->db->set('organization_vacancy_remaining_count', 'organization_vacancy_remaining_count-1', FALSE);
				$this->db->update('tr_organization_subscription');
	 			return "success";
	 		}
	 		else{
				return "insertion_error";
			}
		}
		else {
			return "failure";
		}
	}
	public function job_provider_post_vacancy_update($vacancydata)
	{
	 	$this->db->where('vacancies_id', $vacancydata['vacancies_id']);
		if($this->db->update('tr_organization_vacancies', $vacancydata)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function job_provider_post_job_exist_or_not($vacancydata){
		$checkquery = $this->db->get_where('tr_organization_vacancies', array(
            'vacancies_job_title' => $vacancydata['vacancies_job_title'],
            'vacancies_available' => $vacancydata['vacancies_available'],
            'vacancies_organization_id' => $vacancydata['vacancies_organization_id']
        ));
		$count = $checkquery->num_rows();
		if($count === 1){
			return FALSE;
		}
		else{
			return TRUE;
		}
		
	}
	public function job_provider_posted_job_counts($ins_id)
	{
		return $this->db->where('vacancies_organization_id',$ins_id)->from("tr_organization_vacancies")->count_all_results();
	}
	public function job_provider_posted_jobs($limit,$start,$ins_id)
	{
	 	$this->db->select('*');    
		$this->db->from('tr_organization_vacancies');
		$where = "(vacancies_organization_id='".$ins_id."' AND vacancies_status='1')";
		$this->db->limit($limit,$start);
		$this->db->where($where);
		$postedjobdata = $this->db->get();
		return $postedjobdata->result_array(); 
	}
	// Commented by siva
	// public function all_candidate_list($limit,$start,$ins_id)
	// {
	// 	$this->db->select('tr_candidate_profile.candidate_id,tr_candidate_profile.candidate_marital_status,tr_candidate_profile.candidate_gender,tr_candidate_profile.candidate_date_of_birth,tr_candidate_profile.candidate_image_path,tr_candidate_preferance.candidate_expecting_start_salary,tr_candidate_preferance.candidate_expecting_end_salary,tr_candidate_profile.candidate_name,tr_district.district_name,tr_subject.subject_name,tr_educational_qualification.educational_qualification,(select sum(tr_candidate_experience.candidate_experience_year) as experience from tr_candidate_experience where tr_candidate_experience.candidate_profile_id = tr_candidate_profile.candidate_id ) as experience');
	// 	$this->db->from('tr_candidate_profile');
	// 	$this->db->join('tr_district`', 'tr_district.district_id = tr_candidate_profile.candidate_live_district_id');
	// 	$this->db->join('tr_candidate_education', 'tr_candidate_education.candidate_profile_id = tr_candidate_profile.candidate_id');
	// 	$this->db->join('tr_candidate_experience', 'tr_candidate_experience.candidate_profile_id = tr_candidate_profile.candidate_id','left');
	// 	$this->db->join('tr_candidate_preferance', 'tr_candidate_preferance.candidate_profile_id = tr_candidate_profile.candidate_id');
	// 	$this->db->join('tr_subject', 'tr_subject.subject_id = tr_candidate_preferance.candidate_willing_subject_id');
	// 	$this->db->join('tr_educational_qualification', 'tr_educational_qualification.educational_qualification_id = tr_candidate_education.candidate_education_qualification_id');
	// 	$where = "(tr_candidate_profile.candidate_institution_type ='".$ins_id."' AND tr_candidate_profile.candidate_status='1' and tr_candidate_education.candidate_education_yop=(select max(candidate_education_yop) from tr_candidate_education where tr_candidate_education.candidate_profile_id = tr_candidate_profile.candidate_id ))";
	// 	$this->db->limit($limit,$start);
	// 	$this->db->where($where);
	// 	$this->db->group_by('tr_candidate_profile.candidate_id'); 
	// 	$postedjobdata = $this->db->get();
	// 	return $postedjobdata->result_array();
	// }
	public function all_candidate_list_for_search($limit,$start,$ins_id,$searchdata)
	{
		if(!empty($searchdata['candidate_experience'])) {
    		if($searchdata['candidate_experience'] <= 10) {
    			$min_exp = $searchdata['candidate_experience'];
    			$max_exp = $searchdata['candidate_experience'] + 1;
    		}
    		else {
    			$min_exp = $searchdata['candidate_experience'];
    			$max_exp = 90; // Maximum experience - We must give it
    		}
    	}

		$this->db->select('d.district_name,cp.candidate_id,cp.candidate_marital_status,cp.candidate_gender,cp.candidate_date_of_birth,cp.candidate_image_path,cp.candidate_name,(select sum(cex.candidate_experience_year) from tr_candidate_experience cex where cex.candidate_profile_id = cp.candidate_id ) as experience,cpre.candidate_expecting_start_salary,cpre.candidate_expecting_end_salary,eq.educational_qualification');
		$this->db->from('tr_candidate_profile cp');
		$this->db->join('tr_district d', 'cp.candidate_district_id = d.district_id','inner');
		$this->db->join('tr_candidate_education cedu', 'cp.candidate_id = cedu.candidate_profile_id','inner');
		$this->db->join('tr_candidate_experience cexp', 'cp.candidate_id = cexp.candidate_profile_id','left');
		$this->db->join('tr_candidate_preferance cpre', 'cp.candidate_id = cpre.candidate_profile_id','inner');
		$this->db->join('tr_educational_qualification eq', 'cedu.candidate_education_qualification_id = eq.educational_qualification_id','inner');
		$where = "cp.candidate_institution_type ='".$ins_id."' AND cp.candidate_status='1' AND cp.candidate_profile_completeness>='90'";
		if(isset($searchdata['candidate_willing_district']) && $searchdata['candidate_willing_district'] != ''){
			$where .= " AND cp.candidate_district_id ='".$searchdata['candidate_willing_district']."'";
		}
		if(isset($searchdata['candidate_tet_status']) && $searchdata['candidate_tet_status'] != ''){
			$where .= " AND cp.candidate_tet_exam_status = '".$searchdata['candidate_tet_status']."'";
		}
		if(isset($searchdata['candidate_experience']) && $searchdata['candidate_experience'] != '' && $searchdata['candidate_experience'] != 0){
			$where .= " AND (select sum(cexpw.candidate_experience_year) as experience from tr_candidate_experience cexpw where cexpw.candidate_profile_id = cp.candidate_id ) BETWEEN '".$min_exp."' AND '".$max_exp."'";
		}
		if(isset($searchdata['candidate_experience']) && $searchdata['candidate_experience'] != '' && $searchdata['candidate_experience'] == 0){
			$where .= " AND cp.candidate_is_fresher='".$searchdata['candidate_experience']."'";
		}
		if(isset($searchdata['candidate_posting_name']) && $searchdata['candidate_posting_name'] != ''){
			$where .= " AND FIND_IN_SET('".$searchdata['candidate_posting_name']."',cpre.candidate_posting_applied_for) !=0";
		}
		if(isset($searchdata['candidate_class']) && $searchdata['candidate_class'] != ''){
			$where .= " AND FIND_IN_SET('".$searchdata['candidate_class']."',cpre.candidate_willing_class_level_id) !=0";
		}
		if(isset($searchdata['candidate_subject']) && $searchdata['candidate_subject'] != ''){
			$where .= " AND FIND_IN_SET('".$searchdata['candidate_subject']."',cpre.candidate_willing_subject_id) !=0";
		}
		if(isset($searchdata['candidate_qualification']) && $searchdata['candidate_qualification'] != ''){
			$where .= " AND cedu.candidate_education_qualification_id = '".$searchdata['candidate_qualification']."'";
		}
		else {
			$where .= "AND cedu.candidate_education_yop=(select max(candidate_education_yop) from tr_candidate_education ce where ce.candidate_profile_id = cp.candidate_id)";
		}
		if(empty($data['candidate_max_amount']) && isset($searchdata['candidate_min_amount']) && $searchdata['candidate_min_amount'] != '') {
        	$where .= "AND cpre.candidate_expecting_end_salary >='".$searchdata['candidate_min_amount']."' ";	
        }
        if(empty($data['candidate_min_amount']) && isset($searchdata['candidate_max_amount']) && $searchdata['candidate_max_amount'] != '') {
        	$where .= "AND cpre.candidate_expecting_start_salary <='".$searchdata['candidate_max_amount']."' ";	
        }
        if(isset($searchdata['candidate_min_amount']) && $searchdata['candidate_min_amount'] != '' && isset($searchdata['candidate_max_amount']) && $searchdata['candidate_max_amount'] != '') {
        	$where .= "AND cpre.candidate_expecting_start_salary <='".$searchdata['candidate_max_amount']."' AND cpre.candidate_expecting_end_salary >='".$searchdata['candidate_min_amount']."' AND cpre.candidate_expecting_end_salary >='".$searchdata['candidate_max_amount']."'";	
        }
		
		$this->db->limit($limit,$start);
		$this->db->where('('.$where.')');
		$this->db->group_by('cp.candidate_id'); 
		$postedjobdata = $this->db->get();
		return $postedjobdata->result_array();
	}
	public function all_candidate_list_for_search_count($ins_id,$searchdata)
	{
		if(!empty($searchdata['candidate_experience'])) {
    		if($searchdata['candidate_experience'] <= 10) {
    			$min_exp = $searchdata['candidate_experience'];
    			$max_exp = $searchdata['candidate_experience'] + 1;
    		}
    		else {
    			$min_exp = $searchdata['candidate_experience'];
    			$max_exp = 90; // Maximum experience - We must give it
    		}
    	}

		$this->db->select('d.district_name,cp.candidate_id,cp.candidate_marital_status,cp.candidate_gender,cp.candidate_date_of_birth,cp.candidate_image_path,cp.candidate_name,(select sum(cex.candidate_experience_year) from tr_candidate_experience cex where cex.candidate_profile_id = cp.candidate_id ) as experience,cpre.candidate_expecting_start_salary,cpre.candidate_expecting_end_salary,eq.educational_qualification');
		$this->db->from('tr_candidate_profile cp');
		$this->db->join('tr_district d', 'cp.candidate_district_id = d.district_id','inner');
		$this->db->join('tr_candidate_education cedu', 'cp.candidate_id = cedu.candidate_profile_id','inner');
		$this->db->join('tr_candidate_experience cexp', 'cp.candidate_id = cexp.candidate_profile_id','left');
		$this->db->join('tr_candidate_preferance cpre', 'cp.candidate_id = cpre.candidate_profile_id','inner');
		$this->db->join('tr_educational_qualification eq', 'cedu.candidate_education_qualification_id = eq.educational_qualification_id','inner');
		$where = "cp.candidate_institution_type ='".$ins_id."' AND cp.candidate_status='1' AND cp.candidate_profile_completeness>='90'";
		if(isset($searchdata['candidate_willing_district']) && $searchdata['candidate_willing_district'] != ''){
			$where .= " AND cp.candidate_district_id ='".$searchdata['candidate_willing_district']."'";
		}
		if(isset($searchdata['candidate_tet_status']) && $searchdata['candidate_tet_status'] != ''){
			$where .= " AND cp.candidate_tet_exam_status = '".$searchdata['candidate_tet_status']."'";
		}
		if(isset($searchdata['candidate_experience']) && $searchdata['candidate_experience'] != '' && $searchdata['candidate_experience'] != 0){
			$where .= " AND (select sum(cexpw.candidate_experience_year) as experience from tr_candidate_experience cexpw where cexpw.candidate_profile_id = cp.candidate_id ) BETWEEN '".$min_exp."' AND '".$max_exp."'";
		}
		if(isset($searchdata['candidate_experience']) && $searchdata['candidate_experience'] != '' && $searchdata['candidate_experience'] == 0){
			$where .= " AND cp.candidate_is_fresher='".$searchdata['candidate_experience']."'";
		}
		if(isset($searchdata['candidate_posting_name']) && $searchdata['candidate_posting_name'] != ''){
			$where .= " AND FIND_IN_SET('".$searchdata['candidate_posting_name']."',cpre.candidate_posting_applied_for) !=0";
		}
		if(isset($searchdata['candidate_class']) && $searchdata['candidate_class'] != ''){
			$where .= " AND FIND_IN_SET('".$searchdata['candidate_class']."',cpre.candidate_willing_class_level_id) !=0";
		}
		if(isset($searchdata['candidate_subject']) && $searchdata['candidate_subject'] != ''){
			$where .= " AND FIND_IN_SET('".$searchdata['candidate_subject']."',cpre.candidate_willing_subject_id) !=0";
		}
		if(isset($searchdata['candidate_qualification']) && $searchdata['candidate_qualification'] != ''){
			$where .= " AND cedu.candidate_education_qualification_id = '".$searchdata['candidate_qualification']."'";
		}
		else {
			$where .= "AND cedu.candidate_education_yop=(select max(candidate_education_yop) from tr_candidate_education ce where ce.candidate_profile_id = cp.candidate_id)";
		}
		if(empty($data['candidate_max_amount']) && isset($searchdata['candidate_min_amount']) && $searchdata['candidate_min_amount'] != '') {
        	$where .= "AND cpre.candidate_expecting_end_salary >='".$searchdata['candidate_min_amount']."' ";	
        }
        if(empty($data['candidate_min_amount']) && isset($searchdata['candidate_max_amount']) && $searchdata['candidate_max_amount'] != '') {
        	$where .= "AND cpre.candidate_expecting_start_salary <='".$searchdata['candidate_max_amount']."' ";	
        }
        if(isset($searchdata['candidate_min_amount']) && $searchdata['candidate_min_amount'] != '' && isset($searchdata['candidate_max_amount']) && $searchdata['candidate_max_amount'] != '') {
        	$where .= "AND cpre.candidate_expecting_start_salary <='".$searchdata['candidate_max_amount']."' AND cpre.candidate_expecting_end_salary >='".$searchdata['candidate_min_amount']."' AND cpre.candidate_expecting_end_salary >='".$searchdata['candidate_max_amount']."'";	
        }
		
		$this->db->where('('.$where.')');
		$this->db->group_by('cp.candidate_id'); 
		$postedjobdata = $this->db->get();
		return $postedjobdata->num_rows();
	}
	// public function all_candidate_list_counts($ins_id)
	// {
	// 	$this->db->select('tr_candidate_profile.candidate_marital_status,tr_candidate_profile.candidate_gender,tr_candidate_profile.candidate_date_of_birth,tr_candidate_profile.candidate_image_path,tr_candidate_preferance.candidate_expecting_start_salary,tr_candidate_preferance.candidate_expecting_end_salary,tr_candidate_profile.candidate_name,tr_district.district_name,tr_subject.subject_name,tr_educational_qualification.educational_qualification,(select sum(tr_candidate_experience.candidate_experience_year) as experience from tr_candidate_experience where tr_candidate_experience.candidate_profile_id = tr_candidate_profile.candidate_id ) as experience');
	// 	$this->db->from('tr_candidate_profile');
	// 	$this->db->join('tr_district`', 'tr_district.district_id = tr_candidate_profile.candidate_live_district_id');
	// 	$this->db->join('tr_candidate_education', 'tr_candidate_education.candidate_profile_id = tr_candidate_profile.candidate_id');
	// 	$this->db->join('tr_candidate_experience', 'tr_candidate_experience.candidate_profile_id = tr_candidate_profile.candidate_id','left');
	// 	$this->db->join('tr_candidate_preferance', 'tr_candidate_preferance.candidate_profile_id = tr_candidate_profile.candidate_id');
	// 	$this->db->join('tr_subject', 'tr_subject.subject_id = tr_candidate_preferance.candidate_willing_subject_id');
	// 	$this->db->join('tr_educational_qualification', 'tr_educational_qualification.educational_qualification_id = tr_candidate_education.candidate_education_qualification_id');
	// 	$where = "(tr_candidate_profile.candidate_institution_type ='".$ins_id."' AND tr_candidate_profile.candidate_status='1' and tr_candidate_education.candidate_education_yop=(select max(candidate_education_yop) from tr_candidate_education where tr_candidate_education.candidate_profile_id = tr_candidate_profile.candidate_id ))";
	// 	$this->db->where($where);
	// 	$this->db->group_by('tr_candidate_profile.candidate_id');
	// 	$postedjobdata = $this->db->get();
	// 	return $postedjobdata->num_rows();
	// }
	public function checkvalidpassword($oldpassword,$providerid)
	{
		$this->db->select('registrant_password');
		$this->db->from('tr_organization_profile');
		$where = "(organization_id='".$providerid."')";
		$this->db->where($where);
		$org_profiledata = $this->db->get()->row_array();
		if($oldpassword === $org_profiledata['registrant_password']){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function update_provider_password($newpassword,$providerid)
	{
		$this->db->where('organization_id', $providerid);
		if($this->db->update('tr_organization_profile', $newpassword)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function organization_feedback_form($data)
	{
		if($this->db->insert('tr_feedback_form', $data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function organization_premiun_ad_upload($data)
	{	
		$where = '(organization_id="'.$data['organization_id'].'" AND 	organization_subscription_status=1 AND organization_ad_remaining_count > 0)';
		$validitity = $this->db->get_where('tr_organization_subscription',$where)->num_rows();
		if($validitity == 1) {
			if($this->db->insert('tr_premium_ads', $data)){
				$update_where = '(organization_id="'.$data['organization_id'].'" AND 	organization_subscription_status=1)';
				$this->db->where($update_where);
				$this->db->set('organization_ad_remaining_count', 'organization_ad_remaining_count-1', FALSE);
				$this->db->update('tr_organization_subscription');
				return "success";
			}
			else {
				return "insertion_error";
			}
		}
		else {
			return "failure";
		}
	}
	public function candidate_full_data($candidate_id,$vacancyid=''){
		$candidate = array();
		$this->db->select('*,d.district_name as willing_district,dl.district_name as living_district,sl.state_name as livestate,s.state_name as willstate');
		$this->db->from('tr_candidate_profile cp');
		$this->db->join('tr_district d', 'cp.candidate_district_id = d.district_id');
		$this->db->join('tr_district dl', 'cp.candidate_live_district_id = dl.district_id','left');
		$this->db->join('tr_state s', 'cp.candidate_state_id = s.state_id');
		$this->db->join('tr_state sl', 'cp.candidate_live_state_id = sl.state_id','left');
		$this->db->join('tr_languages l', 'cp.candidate_mother_tongue = l.language_id');
		$this->db->join('tr_institution_type it', 'cp.candidate_institution_type = it.institution_type_id');
		$profile = "(cp.candidate_id ='".$candidate_id."' AND cp.candidate_status='1')";
		$this->db->where($profile);
		$candidate['personnal'] = $this->db->get()->row_array();
		if(!empty($candidate['personnal']['candidate_extra_curricular_id'])){
			$this->db->select('extra_curricular');
			$this->db->from('tr_extra_curricular');
			$extracurricular = "(extra_curricular_id in (".$candidate['personnal']['candidate_extra_curricular_id']."))";
			$this->db->where($extracurricular);
			$candidate['extracurricular'] = $this->db->get()->result_array();
		}
		$this->db->select('language_name');
		$this->db->from('tr_languages');
		$languageknown = "(language_id in (".$candidate['personnal']['candidate_language_known']."))";
		$this->db->where($languageknown);
		$candidate['languageknown'] = $this->db->get()->result_array();
		$this->db->select('tr_candidate_education.candidate_education_yop as passedout,tr_candidate_education.candidate_education_percentage as percentage,tr_educational_qualification.educational_qualification as qualification,tr_educational_qualification.educational_qualification_course_type as coursetype,tr_languages.language_name as medium,tr_departments.departments_name as department,tr_university_board.university_board_name as boardname');
		$this->db->from('tr_candidate_education');
		$this->db->join('tr_educational_qualification', 'tr_educational_qualification.educational_qualification_id = tr_candidate_education.candidate_education_qualification_id');
		$this->db->join('tr_languages', 'tr_languages.language_id = tr_candidate_education.candidate_medium_of_inst_id');
		$this->db->join('tr_departments', 'tr_departments.departments_id = tr_candidate_education.candidate_education_department_id','left');
		$this->db->join('tr_university_board', 'tr_university_board.education_board_id = tr_candidate_education.candidate_edu_board');
		$education = "(candidate_profile_id = ".$candidate['personnal']['candidate_id'].")";
		$this->db->where($education);
		$candidate['education'] = $this->db->get()->result_array();
		$this->db->select('tr_class_level.class_level as classlevel,tr_candidate_experience.candidate_experience_year as experienceyear,tr_subject.subject_name as subject,tr_university_board.university_board_name as experienceboard');
		$this->db->from('tr_candidate_experience');
		$this->db->join('tr_class_level', 'tr_class_level.class_level_id = tr_candidate_experience.candidate_experience_id');
		$this->db->join('tr_subject', 'tr_subject.subject_id = tr_candidate_experience.candidate_experience_subject_id');
		$this->db->join('tr_university_board', 'tr_university_board.education_board_id = tr_candidate_experience.candidate_experience_board');
		$experience = "(tr_candidate_experience.candidate_profile_id = ".$candidate['personnal']['candidate_id'].")";
		$this->db->where($experience);
		$candidate['experience'] = $this->db->get()->result_array();
		$this->db->select('*');
		$this->db->from('tr_candidate_preferance');
		$preferance = "(tr_candidate_preferance.candidate_profile_id = ".$candidate['personnal']['candidate_id'].")";
		$this->db->where($preferance);
		$candidate['preferance'] = $this->db->get()->row_array();
		$this->db->select('posting_name');
		$this->db->from('tr_applicable_posting');
		$appliedposting = "(posting_id in (".$candidate['preferance']['candidate_posting_applied_for']."))";
		$this->db->where($appliedposting);
		$candidate['appliedposting'] = $this->db->get()->result_array();
		$this->db->select('class_level');
		$this->db->from('tr_class_level');
		$willingclass = "(class_level_id in (".$candidate['preferance']['candidate_willing_class_level_id']."))";
		$this->db->where($willingclass);
		$candidate['willingclass'] = $this->db->get()->result_array();
		$this->db->select('subject_name');
		$this->db->from('tr_subject');
		$willingsubject = "(subject_id in (".$candidate['preferance']['candidate_willing_subject_id']."))";
		$this->db->where($willingsubject);
		$candidate['willingsubject'] = $this->db->get()->result_array();
		if($vacancyid != ''){
			$this->db->select('vacancies_id,vacancies_job_title');
			$this->db->from('tr_organization_vacancies');
			$vacancy = "(vacancies_id = ".$vacancyid.")";
			$this->db->where($vacancy);
			$candidate['vacancy'] = $this->db->get()->row_array();
		}
		return $candidate;
	}
	public function subscription_transaction_data($transction_data)
	{
		if($this->db->insert('tr_payumoney_transaction', $transction_data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function subscriped_plan_data($subscrip_data)
	{
		$already_where = '(organization_id = "'.$subscrip_data['organization_id'].'")';
		$check_already = $this->db->get_where('tr_organization_subscription',$already_where);
		if($check_already -> num_rows() > 0) {
			$this->db->where('organization_id',$subscrip_data['organization_id']);
			$this->db->set('organization_subscription_status', '0', FALSE);
            $this->db->update('tr_organization_subscription');
       	}
        $already_sub_where = '(organization_id = "'.$subscrip_data['organization_id'].'" AND subscription_id="'.$subscrip_data['subscription_id'].'")';
        $check_sub_already = $this->db->get_where('tr_organization_subscription',$already_sub_where);
        if($check_sub_already -> num_rows() == 1) {
            $this->db->where($already_sub_where);
            $this->db->set($subscrip_data);
            $this->db->update('tr_organization_subscription');
        }
        else {
            $this->db->insert('tr_organization_subscription', $subscrip_data);
        }
        return TRUE;
    }
	public function subscribed_or_not($subcription_id,$organization_id){
		$checkquery = $this->db->get_where('tr_organization_subscription', array(
            'organization_id' => $organization_id,'subscription_id' => $subcription_id
        ));
		$count = $checkquery->num_rows();
		if ($count === 0) {
			return TRUE;
        }
		else{
			return FALSE;
		}
	}
	public function provider_inbox_update($inbox_id){
		$this->db->where('inbox_id', $inbox_id);
		$this->db->update('tr_organizaion_inbox', array('is_viewed'=>'1'));
	}
	public function provider_inbox_remove_update($inbox_id){
		$where = "(inbox_id in (".$inbox_id."))";
		$this->db->where($where);
		if($this->db->update('tr_organizaion_inbox', array('inbox_status'=>'0'))){
			return TRUE;
		}
		else{
			return false;
		}
	}
	public function provider_postedjob_remove_update($vacancy_id){
		$where = "(vacancies_id in (".$vacancy_id."))";
		$this->db->where($where);
		if($this->db->update('tr_organization_vacancies', array('vacancies_status'=>'0'))){
			return TRUE;
		}
		else{
			return false;
		}
	}
	//provider subscription plan update for resume
	public function provider_resume_download_update($candidate_id,$org_id){
        $data['status'] = '';
        $resume_where = '(candidate_id="'.$candidate_id.'")';
        $cand_resume = $this->db->get_where('tr_candidate_profile',$resume_where)->row_array();
		$checkquery = $this->db->get_where('tr_organization_activity', array(
            'activity_organization_id' => $org_id,'activity_candidate_id' => $candidate_id
        ));
		$count = $checkquery->num_rows();
		if ($count === 0) {
			$this->db->insert('tr_organization_activity', array('activity_organization_id'=>$org_id,'activity_candidate_id'=>$candidate_id,'is_sms_sent'=>'0','is_email_sent'=>'0','is_resume_downloaded'=>'1'));
		}
		else{
			$check_already = $checkquery->row_array();
			$this->db->where(array('activity_organization_id'=>$org_id,'activity_candidate_id'=>$candidate_id));
			$this->db->update('tr_organization_activity', array('is_resume_downloaded'=>'1'));
		}
		$valid_count_where = '(organization_id="'.$org_id.'" AND organization_subscription_status=1)';
		$valid_count = $this->db->get_where('tr_organization_subscription',$valid_count_where)->row_array();
		if($valid_count['organization_remaining_resume_download_count'] != 0) {
			if($valid_count['organization_remaining_resume_download_count'] == 1) {
				$resume_update_data = array(
											"organization_remaining_resume_download_count" => $valid_count['organization_remaining_resume_download_count'] - 1,
											"is_resume_validity" => 0
										);
				}
				else {
					$resume_update_data = array(
												"organization_remaining_resume_download_count" => $valid_count['organization_remaining_resume_download_count'] - 1,
												"is_resume_validity" => 1
												);
				}
		$this->db->where($valid_count_where);
		$this->db->set($resume_update_data);
		$this->db->update('tr_organization_subscription');
		$data['status'] = $cand_resume['candidate_resume_upload_path'];
		}
		$valid_count_where = '(organization_id="'.$org_id.'" AND organization_subscription_status=1)';
		$data['subscribe_details'] = $this->db->get_where('tr_organization_subscription',$valid_count_where)->row_array();

		return $file;
	}
	public function provider_mail_send_update($candidate_id,$org_id){
		$data['status'] = '';
		// Store details in candidate inbox
		$this->db->insert('tr_candidate_inbox', array('candidate_organization_id'=>$org_id,'candidate_id'=>$candidate_id,'is_viewed'=>'0','candidate_inbox_status'=>'1','candidate_inbox_message'=>'Kudo! You have been Shortlisted.'));
		$checkquery = $this->db->get_where('tr_organization_activity', array(
            'activity_organization_id' => $org_id,'activity_candidate_id' => $candidate_id
        ));
		$count = $checkquery->num_rows();
		if ($count === 0) {
			$this->db->insert('tr_organization_activity', array('activity_organization_id'=>$org_id,'activity_candidate_id'=>$candidate_id,'is_sms_sent'=>'0','is_email_sent'=>'1','is_resume_downloaded'=>'0'));
		}
		else{
			$check_already = $checkquery->row_array();
			$this->db->where(array('activity_organization_id'=>$org_id,'activity_candidate_id'=>$candidate_id));
			$this->db->update('tr_organization_activity', array('is_email_sent'=>'1'));
		}
		$valid_count_where = '(organization_id="'.$org_id.'" AND organization_subscription_status=1)';
		$valid_count = $this->db->get_where('tr_organization_subscription',$valid_count_where)->row_array();
		if($valid_count['organization_email_remaining_count'] != 0) {
			if($valid_count['organization_email_remaining_count'] == 1) {
				$email_update_data = array(
											"organization_email_remaining_count" => $valid_count['organization_email_remaining_count'] - 1,
											"is_email_validity" => 0
											);
			}
			else {
				$email_update_data = array(
											"organization_email_remaining_count" => $valid_count['organization_email_remaining_count'] - 1,
											"is_email_validity" => 1
											);
			}
			$this->db->where($valid_count_where);
			$this->db->set($email_update_data);
			$this->db->update('tr_organization_subscription');
			$data['status'] = "success";
		}
		$valid_count_where = '(organization_id="'.$org_id.'" AND organization_subscription_status=1)';
		$data['subscribe_details'] = $this->db->get_where('tr_organization_subscription',$valid_count_where)->row_array();
		return $data;
	}

	// Sendsms
	public function provider_sms_send_update($candidate_id,$org_id){
		$data['status'] = '';
		$checkquery = $this->db->get_where('tr_organization_activity', array(
            'activity_organization_id' => $org_id,'activity_candidate_id' => $candidate_id
        ));
		$count = $checkquery->num_rows();
		if ($count === 0) {
			$this->db->insert('tr_organization_activity', array('activity_organization_id'=>$org_id,'activity_candidate_id'=>$candidate_id,'is_sms_sent'=>'1','is_email_sent'=>'0','is_resume_downloaded'=>'0'));
		}
		else{
			$check_already = $checkquery->row_array();
			$this->db->where(array('activity_organization_id'=>$org_id,'activity_candidate_id'=>$candidate_id));
			$this->db->update('tr_organization_activity', array('is_email_sent'=>'1'));
		}
		$valid_count_where = '(organization_id="'.$org_id.'" AND organization_subscription_status=1)';
		$valid_count = $this->db->get_where('tr_organization_subscription',$valid_count_where)->row_array();
		if($valid_count['organization_sms_remaining_count'] != 0) {
			if($valid_count['organization_sms_remaining_count'] == 1) {
				$email_update_data = array(
											"organization_sms_remaining_count" => $valid_count['organization_sms_remaining_count'] - 1,
											"is_sms_validity" => 0
											);
			}
			else {
				$email_update_data = array(
											"organization_sms_remaining_count" => $valid_count['organization_sms_remaining_count'] - 1,
											"is_sms_validity" => 1
											);
			}
			$this->db->where($valid_count_where);
			$this->db->set($email_update_data);
			$this->db->update('tr_organization_subscription');
			$data['status'] = "success";
		}
		$valid_count_where = '(organization_id="'.$org_id.'" AND organization_subscription_status=1)';
		$data['subscribe_details'] = $this->db->get_where('tr_organization_subscription',$valid_count_where)->row_array();
		return $data;
	}

	// Payment subscription validation
	public function orignial_renewal_validation($plan_id,$org_id){
		$data = '';
		$already_where = '(subscription_id = "'.$plan_id.'" AND organization_id = "'.$org_id.'")';
		$check_already = $this->db->get_where('tr_organization_subscription',$already_where);
		if($check_already -> num_rows() == 1) {
			$plan_value = $check_already->row_array();
			$start_date = date_create($plan_value['org_sub_validity_end_date']);
			$days = date_diff(date_create('today'),$start_date);
			if($days->invert == 1 || $days->d == 0)
			{
				$data = 2; // if correct
                echo "test";
			}
			else {
				$data = 1; // if wrong
                 echo "test1";
			}
		}
		else {
			$data = 2; // if correct
		}
		return $data;
	}

    // Get organization subscription details
    public function organization_subscription_data($org_id,$plan_id){
        $already_where = '(subscription_id = "'.$plan_id.'" AND organization_id = "'.$org_id.'")';
        $data = $check_already = $this->db->get_where('tr_organization_subscription',$already_where)->row_array();
        return $data;
    }
	   
    // Insert upgrade and renewal plan
    public function subscribe_upgrade_renewal($data)
    {
        if($this->db->insert('tr_organization_upgrade_or_renewal', $data)){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }


}  // End
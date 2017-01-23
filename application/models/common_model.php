<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	public function get_institution_type()
	{
		$institution_type = array();
		$allinstitutions = $this->db->get_where('tr_institution_type', array('institution_type_status' => '1'))->result_array();
		return $allinstitutions;
	}

    // Added By Siva
    public function get_search_results($limit,$start,$data=array())
    {
    	if(empty($data['min_amount'])) {
    		$data['min_amount'] = 0;
    	}
    	if(!empty($data['experience'])) {
    		if($data['experience'] <= 10) {
    			$min_exp = $data['experience'];
    			$max_exp = $data['experience'] + 1;
    		}
    		else {
    			$min_exp = $data['experience'];
    			$max_exp = 60;
    		}
    	}

   		// Search with limit
   		$this->db->select('*');
   		$this->db->from('tr_organization_vacancies ov');
   		$this->db->join('tr_organization_profile op','ov.vacancies_organization_id=op.organization_id','inner');
   		if(!empty($data['keyword'])) {
   		  	$this->db->like('ov.vacancies_job_title',$data['keyword']);
			$this->db->or_like('op.organization_name',$data['keyword']);
   		}
   		$this->db->where('ov.vacancies_status','1');
        $this->db->where("ov.vacancies_start_salary >=".$data['min_amount']."");
        if(!empty($data['location'])) {
        	$this->db->where('op.organization_district_id',$data['location']);
        }	
        if(!empty($data['posting'])) {
        	$this->db->where('ov.vacancies_applicable_posting_id',$data['posting']);
        }
        if(!empty($data['experience'])) {
        	$this->db->where("ov.vacancies_experience BETWEEN $min_exp AND $max_exp");
        }
        if(!empty($data['max_amount'])) {
        	$this->db->where("ov.vacancies_end_salary <=".$data['max_amount']."");
        }
        if(!empty($data['qualification'])) {
        	$this->db->where("FIND_IN_SET('".$data['qualification']."',ov.vacancies_qualification_id) !=", 0);
        }
        if(!empty($data['institution'])) {
        	$this->db->where('op.organization_institution_type_id',$data['institution']);
        }

        $this->db->limit($limit,$start);
        $model_data['search_results'] = $this->db->get()->result_array();

        // echo $this->db->last_query();
        // echo "<pre>";
        // print_r($model_data['search_results']);
        // echo "</pre>";

       	// Total count
        $this->db->select('*');
   		$this->db->from('tr_organization_vacancies ov');
   		$this->db->join('tr_organization_profile op','ov.vacancies_organization_id=op.organization_id','inner');
   		if(!empty($data['keyword'])) {
   		  	$this->db->like('ov.vacancies_job_title',$data['keyword']);
			$this->db->or_like('op.organization_name',$data['keyword']);
   		}
   		$this->db->where('ov.vacancies_status','1');
        $this->db->where("ov.vacancies_start_salary >=".$data['min_amount']."");
        if(!empty($data['location'])) {
        	$this->db->where('op.organization_district_id',$data['location']);
        }	
        if(!empty($data['posting'])) {
        	$this->db->where('ov.vacancies_applicable_posting_id',$data['posting']);
        }
        if(!empty($data['experience'])) {
        	$this->db->where("ov.vacancies_experience BETWEEN $min_exp AND $max_exp");
        }
        if(!empty($data['max_amount'])) {
        	$this->db->where("ov.vacancies_end_salary <=".$data['max_amount']."");
        }
        if(!empty($data['qualification'])) {
        	$this->db->where("FIND_IN_SET('".$data['qualification']."',ov.vacancies_qualification_id) !=", 0);
        }
        if(!empty($data['institution'])) {
        	$this->db->where('op.organization_institution_type_id',$data['institution']);
        }

        $model_data['total_rows'] = $this->db->get()->num_rows();

        return $model_data;

    }


	public function get_all_district()
	{
		$this->db->select('*');    
		$this->db->from('tr_district');
		$where = "(district_status='1')";
		$this->db->order_by('district_name', 'asc');
		$this->db->where($where);
		$alldistrict = $this->db->get();
		return $alldistrict->result_array(); 
	}
		
	public function subject_by_institution($ins_id)
	{
		$this->db->select('*');    
		$this->db->from('tr_subject');
		$where = '(FIND_IN_SET("'.$ins_id.'",subject_institution_id) !=0 AND subject_status=1)';
		$this->db->where($where);
		$subjectdata = $this->db->get();
		return $subjectdata->result_array(); 
	}
	public function qualification_by_institution($ins_id)
	{
		$this->db->select('*');    
		$this->db->from('tr_educational_qualification');
		$where = "(educational_qualifcation_inst_type_id = '".$ins_id."' AND educational_qualification_status='1')";
		$this->db->where($where);
		$educationdata = $this->db->get();
		return $educationdata->result_array(); 
	}
	public function classlevel_by_institution($ins_id)
	{
		$this->db->select('*');    
		$this->db->from('tr_class_level');
		$where = '(class_level_inst_type_id="'.$ins_id.'" AND class_level_status=1)';
		$this->db->where($where);
		$classlevel = $this->db->get();
		return $classlevel->result_array(); 
	}
	public function medium_of_instruction()
	{
		$this->db->select('*');    
		$this->db->from('tr_languages');
		$where = "(is_medium_of_instruction = '1'  AND language_status='1')";
		$this->db->where($where);
		$moi = $this->db->get();
		return $moi->result_array(); 
	}
	public function applicable_posting($ins_id = '')
	{
		$this->db->select('*');    
		$this->db->from('tr_applicable_posting');
		if($ins_id!='') {
			$where = '(FIND_IN_SET("'.$ins_id.'",posting_institution_id) !=0 AND posting_status=1)';
		}else {
			$where = "(posting_status='1')";	
		}		
		$this->db->where($where);
		$posting = $this->db->get();
		return $posting->result_array(); 
	}
	
	public function mother_tongue()
	{
		$this->db->select('*');    
		$this->db->from('tr_languages');
		$where = "(is_mother_tangue = '1'  AND language_status='1')";
		$this->db->where($where);
		$mt = $this->db->get();
		return $mt->result_array(); 
	}
	public function all_languages()
	{
		$this->db->select('*');    
		$this->db->from('tr_languages');
		$where = "(language_status='1')";
		$this->db->where($where);
		$mt = $this->db->get();
		return $mt->result_array(); 
	}
	public function subjects($ins_id = '')
	{
		$this->db->select('*');    
		$this->db->from('tr_subject');
		if($ins_id!='') {
			$where = "(subject_institution_id in ('.$ins_id.')  AND subject_status='1')";
		}else {
			$where = "(subject_status='1')";	
		}		
		$this->db->where($where);
		$subject = $this->db->get();
		return $subject->result_array(); 
	}
	public function qualification($ins_id = '')
	{
		$this->db->select('*');    
		$this->db->from('tr_educational_qualification');
		if($ins_id!='') {
			$where = '(educational_qualifcation_inst_type_id="'.$ins_id.'" AND educational_qualification_status=1)';
		}else {
			$where = '(educational_qualification_status=1)';	
		}	
		$this->db->where($where);
		$qualification = $this->db->get();
		return $qualification->result_array(); 
	}
	public function subcription_plan($planid='')
	{
		$this->db->select('*');    
		$this->db->from('tr_subscription');
		if($planid!='') {
			$where = "(subscription_id = '".$planid."'  AND subscription_status='1')";
		}else {
			$where = "(subscription_status='1')";	
		}
		$this->db->where($where);
		$subcription = $this->db->get();
		return $subcription->result_array(); 
	}

	// Get vacancy details
	public function get_vacancy_details()
	{
		$value = $this->db->get_where('tr_organization_vacancies',array('vacancies_status' => '1'))->result_array();
		return $value;
	}

	// Get salary details
	// public function get_salary_details()
	// {
	// 	$value = $this->db->get_where('tr_expect_salary',array('expect_salary_status' => '1'))->result_array();
	// 	return $value;
	// }

	// Get department details
	public function get_department_details()
	{
		$value = $this->db->get_where('tr_departments',array('departments_status' => '1'))->result_array();
		return $value;
	}

	// Get university board details
	public function get_board_details()
	{
		$value = $this->db->get_where('tr_university_board',array('university_board_status' => '1'))->result_array();
		return $value;
	}

	// Get extra curricular details
	public function get_extra_curricular_details()
	{
		$value = $this->db->get_where('tr_extra_curricular',array('extra_curricular_status' => '1'))->result_array();
		return $value;
	}
	public function get_job_list()
	{
			$search_product=$this->db->select('*');
            $search_product=$this->db->from('tr_organization_vacancies ov,tr_candidate_profile cp');
            $search_product = $this->db->join('tr_organization_profile op', 'ov.vacancies_organization_id = op.organization_id','inner');
            $where1 = '(ov.vacancies_status=1)';
            $where2 = '(cp.candidate_status=1)';
            $search_product=$this->db->where($where1);
            $search_product=$this->db->where($where2);
            $search_product=$this->db->group_by('ov.vacancies_id');
            $query = $this->db->get()->result_array(); 
            return $query;           
	}
	public function get_allinstitutions_list()
	{
			$search_product=$this->db->select('*');
            $search_product=$this->db->from('tr_organization_profile cp');
            $where1 = '(cp.organization_status=1)';
            $search_product=$this->db->where($where1);
            $search_product=$this->db->group_by('cp.organization_id');
            $query = $this->db->get()->result_array(); 
            return $query;
	}
	
	public function provider_subscription_active_plans($org_id){
		$this->db->select('*');    
		$this->db->from('tr_organization_subscription');
		$this->db->join('tr_subscription', 'tr_subscription.subscription_id = tr_organization_subscription.subscription_id');
		$where = "(organization_id = '".$org_id."' AND org_sub_validity_start_date <= CURRENT_DATE() AND  org_sub_validity_end_date >= CURRENT_DATE()  AND organization_subscription_status='1')";
		$this->db->where($where);
		$providersubcription = $this->db->get();
		return $providersubcription->row_array(); 
	}
	public function posted_jobs_count($org_id){
		$posted_jobs = $this->db->query("SELECT * FROM tr_organization_vacancies WHERE vacancies_organization_id =".$org_id);
		return $posted_jobs->num_rows();
	}
	public function organization_details($org_id){
		$posted_jobs = $this->db->query("SELECT * FROM tr_organization_profile WHERE organization_id =".$org_id);
		return $posted_jobs->row_array();

	}
	public function guest_user_feedback($contact_us_data)
	{
		if($this->db->insert('tr_feedback_form',$contact_us_data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	/* show total count of vacancies  */
	public function vacancies_count(){
		$posted_jobs = $this->db->query("SELECT * FROM tr_organization_vacancies WHERE vacancies_status = 1");
		return $posted_jobs->num_rows();
	}
	/* show total count of vacancies  */
	public function candidate_count(){
		$candidate = $this->db->query("SELECT * FROM tr_candidate_profile WHERE candidate_status = 1");
		return $candidate->num_rows();
	}
	/* show total count of vacancies  */
	public function organization_count(){
		$organization = $this->db->query("SELECT * FROM tr_organization_profile WHERE organization_status = 1");
		return $organization->num_rows();
	}

	// Organization Logo
	public function get_provider_details() {
		$this->db->select('organization_logo,organization_name');
		$this->db->from('tr_organization_profile');
		$this->db->where('organization_status','1');
		$org_data = $this->db->get()->result_array();
		return $org_data;
	}
	//premium ads
	public function get_premiumads(){
		$ads_data = $this->db->get_where('tr_premium_ads',array('premium_ads_status' => '1','is_admin_verified'=>'1'))->result_array();
		return $ads_data;
	}

} // End


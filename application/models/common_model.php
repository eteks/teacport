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
   		if(!empty($data['keyword'])) {
   			$like_where = '(ov.vacancies_job_title LIKE "%'.$data['keyword'].'%" OR op.organization_name LIKE "%'.$data['keyword'].'%")';
			$this->db->where($like_where);
   		}
   		$this->db->where('ov.vacancies_status','1');

   		if(!empty($data['min_amount']) && !empty($data['max_amount'])) {
        	$this->db->where("ov.vacancies_start_salary <=".$data['max_amount']."");
        	$this->db->where("ov.vacancies_end_salary >=".$data['max_amount']."");
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
        if(!empty($data['qualification'])) {
        	$this->db->where("FIND_IN_SET('".$data['qualification']."',ov.vacancies_qualification_id) !=", 0);
        }
        if(!empty($data['institution'])) {
        	$this->db->where('op.organization_institution_type_id',$data['institution']);
        }

        $this->db->limit($limit,$start);
        $this->db->order_by('ov.vacancies_id','desc');
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
   			$like_where = '(ov.vacancies_job_title LIKE "%'.$data['keyword'].'%" OR op.organization_name LIKE "%'.$data['keyword'].'%")';
			$this->db->where($like_where);
   		}
   		$this->db->where('ov.vacancies_status','1');
   		if(!empty($data['min_amount']) && !empty($data['max_amount'])) {
        	$this->db->where("ov.vacancies_start_salary <=".$data['max_amount']."");
        	$this->db->where("ov.vacancies_end_salary >=".$data['max_amount']."");
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
        if(!empty($data['qualification'])) {
        	$this->db->where("FIND_IN_SET('".$data['qualification']."',ov.vacancies_qualification_id) !=", 0);
        }
        if(!empty($data['institution'])) {
        	$this->db->where('op.organization_institution_type_id',$data['institution']);
        }
        $this->db->order_by('ov.vacancies_id','desc');

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
	public function get_district_by_state($id)
	{
		$this->db->select('*');    
		$this->db->from('tr_district');
		$where = "(district_status='1' AND district_state_id=$id)";
		$this->db->order_by('district_name', 'asc');
		$this->db->where($where);
		$alldistrict = $this->db->get();
		return $alldistrict->result_array(); 
	}
	

	public function get_all_state()
	{
		$this->db->select('*');    
		$this->db->from('tr_state');
		$where = "(state_status='1')";
		$this->db->order_by('state_name', 'asc');
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
			$where = '(FIND_IN_SET("'.$ins_id.'",subject_institution_id) !=0 AND subject_status=1)';
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

	// Get latest news
	public function latest_news()
	{
		$value = $this->db->get_where('tr_latest_news',array('latest_news_status' => '1'))->result_array();
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
        $where = '(ov.vacancies_status=1)';
		$this->db->select('*');
        $this->db->from('tr_organization_vacancies ov');
        $this->db->join('tr_organization_profile op', 'ov.vacancies_organization_id = op.organization_id','inner');
        $this->db->where($where);
	    $this->db->order_by('ov.vacancies_id','desc');
        $this->db->limit(15,0);
        $data = $this->db->group_by('ov.vacancies_id')->get()->result_array();
        return $data;           
	}
	public function get_allinstitutions_list($limit,$start)
	{
        // Retrieve data with limit
        $where = '(organization_status=1 AND organization_profile_completeness >=90)';  
        $model_data['allinstitutions_results'] = $this->db->limit($limit,$start)->get_where('tr_organization_profile',$where)->result_array();

       	// Total count
       	$model_data['total_rows'] = $this->db->get_where('tr_organization_profile',$where)->num_rows();

       	// Get total jobs count
       	$total_jobs_where = '(organization_status=1 AND organization_profile_completeness >=90 AND vacancies_status = 1)';  
       	$this->db->select('op.organization_id,ov.vacancies_job_title');
        $this->db->from('tr_organization_profile op');
        $this->db->join('tr_organization_vacancies ov','op.organization_id = ov.vacancies_organization_id','inner');   
        $this->db->order_by('ov.vacancies_id','desc');
        $this->db->where($total_jobs_where);
        $provider_job = $this->db->get()->result_array();
        $out=array();
		foreach($provider_job as $x) {
		  $out[$x['organization_id']]['organization_id']=$x['organization_id'];
		  $out[$x['organization_id']]['job_title'] []= $x['vacancies_job_title'];
		}
		$model_data['provider_totaljobs'] = $out;

		
        // Get new jobs count
        // $new_jobs_where = '(organization_status=1 AND organization_profile_completeness >=90 AND vacancies_status = 1 AND ov.vacancies_created_date BETWEEN CURDATE() - INTERVAL 2 DAY AND CURDATE() + INTERVAL 1 DAY)';  
       	// $this->db->select('op.organization_id,count(ov.vacancies_id) as newjobs');
        // $this->db->from('tr_organization_profile op');
        // $this->db->join('tr_organization_vacancies ov','op.organization_id = ov.vacancies_organization_id','inner');   
        // $this->db->group_by('op.organization_id');
        // $this->db->where($new_jobs_where);
        // $model_data['provider_newjobs'] = $this->db->get()->result_array();

     	// echo "<pre>";
      // 	print_r($out);
      // 	echo "</pre>";

		return $model_data;
	}

	// Get Company full details
	public function company_details($id)
	{
        $where = '(op.organization_status=1 AND op.organization_profile_completeness >=90 AND op.organization_id="'.$id.'")';  
        $this->db->select('*');
        $this->db->from('tr_organization_profile op');
        $this->db->join('tr_district d','op.organization_district_id = d.district_id','left'); 
        $this->db->join('tr_institution_type it','op.organization_institution_type_id = it.institution_type_id','left');
        $this->db->where($where);
        $model_data['company_details'] = $this->db->get()->row_array();

        $vac_where = '(vacancies_organization_id="'.$id.'" AND vacancies_status=1)';
        $this->db->select('*');
        $this->db->from('tr_organization_vacancies ov');
        $this->db->join('tr_organization_profile op','ov.vacancies_organization_id=op.organization_id','inner');
        $this->db->order_by('ov.vacancies_id','desc');
        $this->db->limit(5,0);
        $this->db->where($vac_where);
        $model_data['recent_vacancy_details'] = $this->db->get()->result_array();

		return $model_data;
	}

	// Get vacancy list based on organization
	public function get_vacancy_list($limit,$start,$id)
	{
        $vac_where = '(vacancies_organization_id="'.$id.'" AND vacancies_status=1)';
        $this->db->select('*');
        $this->db->from('tr_organization_vacancies ov');
        $this->db->join('tr_organization_profile op','ov.vacancies_organization_id=op.organization_id','inner');
        $this->db->limit($limit,$start);
        $this->db->where($vac_where);
        $model_data['vacancy_details'] = $this->db->get()->result_array();

        // Total rows
        $this->db->select('*');
        $this->db->from('tr_organization_vacancies ov');
        $this->db->join('tr_organization_profile op','ov.vacancies_organization_id=op.organization_id','inner');
        $this->db->where($vac_where);
        $model_data['total_rows'] = $this->db->get()->num_rows();

		return $model_data;
	}

	public function provider_subscription_active_plans($org_id){
		$this->db->select('*');    
		$this->db->from('tr_organization_subscription os');
		$this->db->join('tr_subscription ts', 'os.subscription_id = ts.subscription_id');
		$where = "(os.organization_id = '".$org_id."' AND os.organization_subscription_status='1')";
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

	// Get qualification by job level
	public function qualification_by_joblevel($val,$ins_id) {
		$where = '(educational_qualification_course_type="'.$val.'" AND educational_qualifcation_inst_type_id="'.$ins_id.'" AND educational_qualification_status=1)';
		$qua_data = $this->db->get_where('tr_educational_qualification',$where)->result_array();
		return $qua_data;
	}

	// Get university by class level
	public function university_by_classlevel($id) {
		$where = '(university_class_level_id="'.$id.'" AND university_board_status=1)';
		$uni_data = $this->db->get_where('tr_university_board',$where)->result_array();
		return $uni_data;
	}

	// Get department by qualification
	public function department_by_qualification($id) {
		$qua_id = explode(',',$id);
		$a = 1;
		$where = "departments_status = '1' AND ";
		foreach ($qua_id as $val) {
			$where .= "FIND_IN_SET('".$val."',department_educational_qualification_id) !=0";
			if($a < count($qua_id)) {
				$where .= " OR ";
			}
			$a++;
		}
		// $where = '(FIND_IN_SET("'.$id.'",department_educational_qualification_id) !=0 AND departments_status=1)';
		$dept_data = $this->db->get_where('tr_departments',$where)->result_array();
		return $dept_data;
	}

	// Get subscrition ads visible days by subscription id
	public function subscription_visible_days($id) {
		$ads_data = $this->db->get_where('tr_subscription',array('subscription_id' => $id))->row_array();
		return $ads_data['subscription_max_days_ad_visible'];
	}

	// Get site visit count
	public function get_site_visit_count() {
		$count = $this->db->group_by(array('organization_id','candidate_id','DATE(created_date)','ip_address'))->get_where('tr_site_visits')->num_rows();
		return $count;
	}
	

} // End


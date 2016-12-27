<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_Seekermodel extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  // Seeker profile
  public function get_seeker_profile($status) {
  	$model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {

      $mobile_exists_where = "candidate_mobile_no =" . "'" . $this->input->post('cand_mobile') . "' AND candidate_id NOT IN (". $this->input->post('rid').")";
      $mobile_exists = $this->db->get_where('tr_candidate_profile',$mobile_exists_where);
      if($mobile_exists->num_rows() > 0) {
        $model_data['status'] = "Mobile Number Already exists";
        $model_data['error'] = 1; 
      }
      else {
        $email_exists_where = "candidate_email =" . "'" . $this->input->post('cand_email') . "' AND candidate_id NOT IN (". $this->input->post('rid').")";
        $email_exists = $this->db->get_where('tr_candidate_profile',$email_exists_where);
        if($email_exists->num_rows() > 0) {
          $model_data['status'] = "Email Already exists";
          $model_data['error'] = 1;
        }
        else {
          $candidate_dob = explode('/', $this->input->post('cand_dob'));
          $candidate_dob_date = $candidate_dob[2]."-".$candidate_dob[1]."-".$candidate_dob[0];
          $profile_update_data = array( 
                              'candidate_name' => $this->input->post('cand_name'),
                              'candidate_gender' => $this->input->post('cand_gen'),
                              'candidate_father_name' => $this->input->post('cand_fa_name'),
                              'candidate_date_of_birth' => $candidate_dob_date,
                              'candidate_marital_status' => $this->input->post('cand_mar_status'),
                              'candidate_mother_tongue' => $this->input->post('cand_moth_ton'),
                              'candidate_language_known' => $this->input->post('cand_known_lang'),
                              'candidate_nationality' => $this->input->post('cand_nationality'),
                              'candidate_religion' => $this->input->post('cand_religion'),
                              'candidate_community' => $this->input->post('cand_community'),
                              'candidate_is_physically_challenged' => $this->input->post('cand_phy'),
                              'candidate_image_path' => $this->input->post('cand_img'),
                              'candidate_mobile_no' => $this->input->post('cand_mobile'),
                              'candidate_district_id' => $this->input->post('cand_district'),
                              'candidate_address_1' => $this->input->post('cand_address1'),
                              'candidate_address_2' => $this->input->post('cand_address2'),
                              'candidate_live_district_id' => $this->input->post('cand_live_district'),
                              'candidate_pincode' => $this->input->post('cand_pincode'),
                              'candidate_institution_type' => $this->input->post('cand_institution'),
                              'candidate_tet_exam_status' => $this->input->post('cand_tet_status'),
                              'candidate_interest_subject_id' => $this->input->post('cand_int_sub'),
                              'candidate_extra_curricular_id' => $this->input->post('cand_extra'),
                              'candidate_is_fresher' => $this->input->post('cand_is_fresh'),
                              'candidate_email' => $this->input->post('cand_email')
                            );
          $profile_update_where = '( candidate_id="'.$this->input->post('rid').'")'; 
          $this->db->set($profile_update_data); 
          $this->db->where($profile_update_where);
          $this->db->update("tr_candidate_profile", $profile_update_data); 
          $model_data['status'] = "Updated Successfully";
          $model_data['error'] = 2;   
        }
      }
    }

	// Delete data
    else if($status =='delete') {
      $profile_delete_where = '(candidate_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_candidate_profile", $profile_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_candidate_profile cp');
    $this->db->join('tr_district d','cp.candidate_live_district_id=d.district_id','left');
    $this->db->order_by('cp.candidate_id','desc');
    $model_data['seeker_profile'] = $this->db->get()->result_array();
    return $model_data;
  }

  // Job seeker profile - ajax
  public function get_full_seeker_profile($value) {

    // Canidate Profile
    $this->db->select('cp.*,live_dis.district_id as live_district_id,live_dis.district_name as live_district_name,native_dis.district_id as native_district_id,native_dis.district_name as native_district_name,it.*,lan.*,sub.*');
    $this->db->from('tr_candidate_profile cp');
    $this->db->join('tr_district live_dis','cp.candidate_live_district_id=live_dis.district_id','left');
    $this->db->join('tr_district native_dis','cp.candidate_district_id=native_dis.district_id','left');
    $this->db->join('tr_institution_type it','cp.candidate_institution_type=it.institution_type_id','left');
    $this->db->join('tr_languages lan','cp.candidate_mother_tongue=lan.language_id','left');
    $this->db->join('tr_subject sub','cp.candidate_interest_subject_id=sub.subject_id','left');
    $model_data['seeker_full_profile'] = $this->db->where('cp.candidate_id',$value)->get()->row_array();

    // Candidate Education
    $this->db->select('*');
    $this->db->from('tr_candidate_education ce');
    $this->db->join('tr_educational_qualification eq','ce.candidate_education_qualification_id=eq.educational_qualification_id','inner');
    $this->db->join('tr_languages l','ce.candidate_medium_of_inst_id=l.language_id','inner');
    $this->db->join('tr_departments d','ce.candidate_education_department_id=d.departments_id','left');
    $this->db->join('tr_university_board u','ce.candidate_edu_board=u.education_board_id','left');
    $model_data['education_details'] = $this->db->where('ce.candidate_profile_id',$value)->get()->result_array();

    // Candidate Experience
    $this->db->select('*');
    $this->db->from('tr_candidate_experience ce');
    $this->db->join('tr_class_level cl','ce.candidate_experience_class_level_id=cl.class_level_id','inner');
    $this->db->join('tr_subject s','ce.candidate_experience_subject_id=s.subject_id','left');
    $this->db->join('tr_university_board u','ce.candidate_experience_board=u.education_board_id','left');
    $model_data['experience_details'] = $this->db->where('ce.candidate_profile_id',$value)->get()->result_array();
    return $model_data;
  }


  // Seeker preference
  public function teacport_seeker_preference($status) {
  	$model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $preference_update_data = array( 
                              'candidate_posting_applied_for' => $this->input->post('cand_post'),
                              'candidate_expecting_start_salary' => $this->input->post('cand_ssalary'),
                              'candidate_expecting_end_salary' => $this->input->post('cand_esalary'),
                              'candidate_willing_class_level_id' => $this->input->post('cand_class'),
                              'candidate_willing_subject_id' => $this->input->post('cand_sub'),
                            );
      $preference_update_where = '( candidate_preferance_id="'.$this->input->post('rid').'")'; 
      $this->db->set($preference_update_data); 
      $this->db->where($preference_update_where);
      $this->db->update("tr_candidate_preferance", $preference_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;   
    }

	// Delete data
    else if($status =='delete') {
      $profile_delete_where = '(candidate_preferance_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_candidate_preferance", $profile_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $provider_vacancy_query = $this->db->query("SELECT * FROM tr_class_level INNER JOIN (SELECT *, SUBSTRING_INDEX( SUBSTRING_INDEX( t.candidate_posting_applied_for, ',', n.n ) , ',', -1 ) value1,SUBSTRING_INDEX( SUBSTRING_INDEX( t.candidate_willing_class_level_id, ',', n.n ) , ',', -1 ) value2, SUBSTRING_INDEX( SUBSTRING_INDEX( t.candidate_willing_subject_id, ',', n.n ) , ',', -1 ) value3 FROM tr_candidate_preferance t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.candidate_willing_class_level_id ) - LENGTH( REPLACE( t.candidate_willing_class_level_id, ',', ''))) or n.n <=1 + ( LENGTH( t.candidate_posting_applied_for ) - LENGTH(REPLACE( t.candidate_posting_applied_for, ',', ''))) or n.n <=1 + ( LENGTH( t.candidate_willing_subject_id ) - LENGTH( REPLACE( t.candidate_willing_subject_id, ',', ''))) ) AS a ON tr_class_level.class_level_id = a.value2 INNER JOIN tr_applicable_posting AS ap ON ap.posting_id = a.value1 INNER JOIN tr_subject AS sub ON sub.subject_id = a.value3 INNER JOIN tr_candidate_profile AS cand ON cand.candidate_id = a.candidate_profile_id");
    $model_data['preference'] = $provider_vacancy_query->result_array();
    return $model_data;
  }

  // Seeker applied job
  public function teacport_seeker_applied_job($status) {
  	$model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
	    $applied_get_where   = "applied_job_vacancies_id =" . "'" . $this->input->post('vac_name') . "' AND applied_job_candidate_id =" . "'" . $this->input->post('cand_name') . "' AND applied_job_id NOT IN (". $this->input->post('rid').")";
    	$applied_get = $this->db->get_where('tr_candidate_applied_job',$applied_get_where);
      	if($applied_get -> num_rows() > 0 ) {
        	$model_data['status'] = "Already exists";
        	$model_data['error'] = 1;
     	}
     	else {
     		$applied_update_data = array( 
                              'applied_job_vacancies_id' => $this->input->post('vac_name'),
                              'applied_job_candidate_id' => $this->input->post('cand_name'),
                              'applied_job_status' => $this->input->post('job_status')
                            );	
      		$applied_update_where = '( applied_job_id="'.$this->input->post('rid').'")'; 
      		$this->db->set($applied_update_data); 
      		$this->db->where($applied_update_where);
      		$this->db->update("tr_candidate_applied_job", $applied_update_data); 
      		$model_data['status'] = "Updated Successfully";
      		$model_data['error'] = 2;
     	}         
    }

	// Delete data
    else if($status =='delete') {
      $applied_delete_where = '(applied_job_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_candidate_applied_job", $applied_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_candidate_applied_job cja');
    $this->db->join('tr_organization_vacancies ov','cja.applied_job_vacancies_id=ov.vacancies_id','inner');
    $this->db->join('tr_candidate_profile cp','cja.applied_job_candidate_id=cp.candidate_id','inner');
    $this->db->join('tr_organization_profile op','ov.vacancies_organization_id=op.organization_id','inner');
    $model_data['job_applied'] = $this->db->get()->result_array();
    return $model_data;
  }

  //Get the approved candidate jobs by provider from candidate inbox
  public function get_approved_candidate_jobs(){
    // View
    $this->db->select('ci.*,cp.candidate_name,cp.candidate_mobile_no,op.organization_name,ov.vacancies_job_title');
    $this->db->from('tr_candidate_inbox ci');
    $this->db->join('tr_candidate_profile cp','cp.candidate_id=ci.candidate_id','left');
    $this->db->join('tr_organization_profile op','op.organization_id=ci.candidate_organization_id','left');
    $this->db->join('tr_organization_vacancies ov','ov.vacancies_id=ci.candidate_vacancy_id','left');
    $model_data = $this->db->order_by('ci.candidate_inbox_id','desc')->get()->result_array();
    return $model_data;
  }

}
/* End of file Job_Seekermodel.php */
/* Location: ./application/controllers/Job_Seekermodel.php */




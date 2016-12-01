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
      $profile_update_data = array( 
                              'candidate_name' => $this->input->post('cand_name'),
                              'candidate_gender' => $this->input->post('cand_gen'),
                              'candidate_father_name' => $this->input->post('cand_fa_name'),
                              'candidate_date_of_birth' => $this->input->post('cand_dob'),
                              'candidate_marital_status' => $this->input->post('cand_mar_status'),
                              'candidate_mother_tongue' => $this->input->post('cand_moth_ton'),
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
    $model_data['seeker_profile'] = $this->db->get()->result_array();
    return $model_data;
  }

  // Job seeker profile - ajax
  public function get_full_seeker_profile($value) {

  		// INNER JOIN ( SELECT * FROM tr_languages AS ls INNER JOIN ( SELECT *, SUBSTRING_INDEX( SUBSTRING_INDEX( ts.candidate_language_known, ',', ns.ns ) , ',', -1 ) value FROM tr_candidate_profile ts CROSS JOIN numbers ns WHERE ns.ns <=1 + ( LENGTH( ts.candidate_language_known ) - LENGTH( REPLACE( ts.candidate_language_known, ',', ''))) ) AS als ON als.value = ls.language_id )
  		
    $seeker_profile_query = $this->db->query("SELECT * FROM tr_extra_curricular AS c INNER JOIN ( SELECT *, SUBSTRING_INDEX( SUBSTRING_INDEX( t.candidate_extra_curricular_id, ',', n.n ) , ',', -1 ) value FROM tr_candidate_profile t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.candidate_extra_curricular_id ) - LENGTH( REPLACE( t.candidate_extra_curricular_id, ',', ''))) ) AS a ON a.value = c.extra_curricular_id INNER JOIN tr_candidate_education AS ce ON a.candidate_id = ce.candidate_profile_id INNER JOIN tr_candidate_experience AS cex ON a.candidate_id=cex.candidate_profile_id INNER JOIN tr_educational_qualification AS eq ON ce.candidate_education_qualification_id=eq.educational_qualification_id INNER JOIN tr_languages AS el ON ce.candidate_medium_of_inst_id=el.language_id INNER JOIN tr_departments AS ds ON ce.candidate_education_department_id=ds.departments_id INNER JOIN (SELECT dis.district_id,dis.district_name AS district FROM tr_district AS dis) AS dis_val ON a.candidate_district_id=dis_val.district_id INNER JOIN (SELECT ldis.district_id,ldis.district_name AS live_district FROM tr_district AS ldis) AS ldis_val ON a.candidate_live_district_id=ldis_val.district_id INNER JOIN (SELECT lan.language_id,lan.language_name AS mother_tongue FROM tr_languages AS lan) AS lan_val ON a.candidate_mother_tongue=lan_val.language_id INNER JOIN tr_class_level AS cl ON cex.candidate_experience_class_level_id=cl.class_level_id INNER JOIN tr_institution_type AS it ON a.candidate_institution_type=it.institution_type_id INNER JOIN (SELECT int_sub.subject_id,int_sub.subject_name AS edu_interest_sub FROM tr_subject AS int_sub) AS int_sub_val ON a.candidate_interest_subject_id=int_sub_val.subject_id INNER JOIN (SELECT edu.education_board_id,edu.university_board_name AS edu_board FROM tr_university_board AS edu) AS edu_val ON ce.candidate_edu_board=edu_val.education_board_id INNER JOIN (SELECT exu.education_board_id,exu.university_board_name AS exu_board FROM tr_university_board AS exu) AS exu_val ON cex.candidate_experience_board=exu_val.education_board_id WHERE a.candidate_id='$value'");
    $model_data['seeker_full_profile'] = $seeker_profile_query->result_array();  
    return $model_data;
  }


  // Seeker preference
  public function teacport_seeker_preference($status) {
  	$model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $preference_update_data = array( 
                              'candidate_profile_id' => $this->input->post('cand_name'),
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

}
/* End of file Job_Seekermodel.php */
/* Location: ./application/controllers/Job_Seekermodel.php */




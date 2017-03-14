<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  // Get Institution Type list
  public function get_institution_type()
  {
    $institution_get_where = '(institution_type_status=1)'; 
    $model_data = $this->db->get_where("tr_institution_type", $institution_get_where)->result_array(); 
    return $model_data;
  }

  // Get Qualification values
  public function get_qualification_values()
  {
    $qualification_get_where = '(educational_qualification_status=1)'; 
    $model_data = $this->db->get_where("tr_educational_qualification", $qualification_get_where)->result_array(); 
    return $model_data;
  }

  // Get Qualification list not based status
  public function get_qualification_list()
  {
    $model_data = $this->db->get_where("tr_educational_qualification")->result_array(); 
    return $model_data;
  }

  // Get state values
  public function get_state_values()
  {
    $state_get_where = '(state_status=1)'; 
    $model_data = $this->db->get_where("tr_state", $state_get_where)->result_array(); 
    return $model_data;
  }

  // Get class level values
  public function get_class_levels()
  {
    $class_level_get_where = '(class_level_status=1)'; 
    $model_data = $this->db->get_where("tr_class_level", $class_level_get_where)->result_array(); 
    return $model_data;
  }

  // Get class level not based status
  public function get_class_levels_list()
  {
    $model_data = $this->db->get_where("tr_class_level")->result_array(); 
    return $model_data;
  }

  // Get district values not based status
  public function get_district_values()
  {
    $model_data = $this->db->get("tr_district")->result_array(); 
    return $model_data;
  }

  // Get Institution Type list not based status
  public function get_institution_type_list()
  {
    $model_data = $this->db->get("tr_institution_type")->result_array(); 
    return $model_data;
  }

  // Get university not based status
  public function get_university_list()
  {
    $model_data = $this->db->get("tr_university_board")->result_array(); 
    return $model_data;
  }

  // Get university not based status
  public function get_subjects_list()
  {
    $model_data = $this->db->get("tr_subject")->result_array(); 
    return $model_data;
  }

  // Get subscription values
  public function get_subscription_values()
  {
    $subscription_get_where = '(subscription_status=1)'; 
    $model_data = $this->db->get_where("tr_subscription", $subscription_get_where)->result_array(); 
    return $model_data;
  }

  // Get organization values
  public function get_organization_values()
  {
    $organization_get_where = '(organization_status=1)'; 
    $model_data = $this->db->get_where("tr_organization_profile", $organization_get_where)->result_array(); 
    return $model_data;
  }

  // Get candidate values
  public function get_candidate_values()
  {
    $candidate_get_where = '(candidate_status=1)'; 
    $model_data = $this->db->get_where("tr_candidate_profile", $candidate_get_where)->result_array(); 
    return $model_data;
  }

  // Get language values
  public function get_language_list()
  {
    $language_get_where = '(language_status=1)'; 
    $model_data = $this->db->get_where("tr_languages", $language_get_where)->result_array(); 
    return $model_data;
  }

  // Get medium language values
  public function get_medium_language_list()
  {
    $medium_language_get_where = '(language_status=1 and is_medium_of_instruction=1)'; 
    $model_data = $this->db->get_where("tr_languages", $medium_language_get_where)->result_array(); 
    return $model_data;
  }

  // Get Mother Tongue language values
  public function get_mother_tongue_language_list()
  {
    $medium_language_get_where = '(language_status=1 and is_mother_tangue=1)'; 
    $model_data = $this->db->get_where("tr_languages", $medium_language_get_where)->result_array(); 
    return $model_data;
  }

  // Get subject values
  public function get_subject_values()
  {
    $subject_get_where = '(subject_status=1)'; 
    $model_data = $this->db->get_where("tr_subject", $subject_get_where)->result_array(); 
    return $model_data;
  }

  // Get extra curricular values
  public function get_extra_curricular_values()
  {
    $extra_curricular_get_where = '(extra_curricular_status=1)'; 
    $model_data = $this->db->get_where("tr_extra_curricular", $extra_curricular_get_where)->result_array(); 
    return $model_data;
  }

  // Get posting values
  public function get_posting_values()
  {
    $posting_get_where = '(posting_status=1)'; 
    $model_data = $this->db->get_where("tr_applicable_posting", $posting_get_where)->result_array(); 
    return $model_data;
  }

  // Get departments values
  public function get_departments_values()
  {
    $department_get_where = '(departments_status=1)'; 
    $model_data = $this->db->get_where("tr_departments", $department_get_where)->result_array(); 
    return $model_data;
  }

  // Get vacancy values
  public function get_vacancy_values()
  {
    $vacancy_get_where = '(vacancies_status=1)'; 
    $model_data = $this->db->get_where("tr_organization_vacancies", $vacancy_get_where)->result_array(); 
    return $model_data;
  }
  public function get_admin_feedback_form()
  {
    $this->db->select('*');
    $this->db->from('tr_feedback_form feed');
    $model_data= $this->db->order_by('feed.feedback_form_id')->get()->result_array();
    return $model_data;
  }
  public function get_admin_feedback_full_view($value) {
    $feed_where = '(feedback_form_id="'.$value.'")';
    $this->db->select('*');
    $this->db->from('tr_feedback_form feed');
    $this->db->where($feed_where);  
    $model_data = $this->db->get()->row_array(); 
    $this->db->where($feed_where); 
    $this->db->update('tr_feedback_form', array('is_viewed' => '1'));
    return $model_data;
  }  
  public function latest_news($status){
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      if($this->input->post('news_type') == "link") {
        $latest_news_update_data = array( 
                                      'latest_news_title' => $this->input->post('news_title'),
                                      'latest_news_type' => $this->input->post('news_type'),                            
                                      'latest_news_content_or_link' => $this->input->post('news_link'),
                                      'latest_news_status' => $this->input->post('news_status')
                                    );
      }
      else {
        $latest_news_update_data = array( 
                                      'latest_news_title' => $this->input->post('news_title'),
                                      'latest_news_type' => $this->input->post('news_type'),                            
                                      'latest_news_content_or_link' => $this->input->post('news_content'),
                                      'latest_news_status' => $this->input->post('news_status')
                                    );
      }
      
      $latest_news_update_where = '( latest_news_id="'.$this->input->post('rid').'")'; 
      $this->db->set($latest_news_update_data); 
      $this->db->where($latest_news_update_where);
      $this->db->update("tr_latest_news"); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      if($this->input->post('news_type') == "link") {
        $latest_news_insert_data = array( 
                                      'latest_news_title' => $this->input->post('news_title'),
                                      'latest_news_type' => $this->input->post('news_type'),                            
                                      'latest_news_content_or_link' => $this->input->post('news_link'),
                                      'latest_news_status' => $this->input->post('news_status')
                                    );
      }
      else {
        $latest_news_insert_data = array( 
                                      'latest_news_title' => $this->input->post('news_title'),
                                      'latest_news_type' => $this->input->post('news_type'),                            
                                      'latest_news_content_or_link' => $this->input->post('news_content'),
                                      'latest_news_status' => $this->input->post('news_status')
                                    );
      }
      $this->db->insert("tr_latest_news", $latest_news_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {      
        $latest_news_delete_where = '(latest_news_id="'.$this->input->post('rid').'")';
        $this->db->delete("tr_latest_news",$latest_news_delete_where); 
        $model_data['status'] = "Deleted Successfully";
        $model_data['error'] = 2;
    }

    // View
    $model_data['latest_news_values'] = $this->db->get_where('tr_latest_news')->result_array();
    return $model_data;
  }

  //get_district_by_state via ajax call
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

  //  Do enable search option for district
  public function do_enable_search_district($id)
  {
    $this->db->where('is_search',1);
    $this->db->set('is_search',0);
    $this->db->update('tr_district');

    if($id != '') {
      $id_array = explode(',',$id);
      $this->db->where_in('district_id',$id_array);
      $this->db->set('is_search',1);
      $this->db->update('tr_district');
    }
    return "success"; 
  }

  // To get latest news details
  public function get_latest_news_details($id) {
    $model_data = $this->db->get_where('tr_latest_news',array('latest_news_id' => $id))->row_array();
    return $model_data;
  }

}

/* End of file Admin_Model.php */
/* Location: ./application/controllers/Admin_Model.php */
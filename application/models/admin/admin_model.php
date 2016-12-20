<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }


   // 'rules'   => 'trim|required|xss_clean|callback_edit_unique[tr_state.state_id.state_name.'.$id.']'


  // State - Add Edit Delete View
  public function state($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $state_update_data = array( 
                              'state_name' => $this->input->post('s_name'),
                              'state_status' => $this->input->post('s_status')
                            );
      $state_update_where = '( state_id="'.$this->input->post('rid').'")'; 
      $this->db->set($state_update_data); 
      $this->db->where($state_update_where);
      $this->db->update("tr_state", $state_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $state_insert_data = array( 
                            'state_name' => $this->input->post('s_name'),
                            'state_status' => $this->input->post('s_status')
                          );
      $this->db->insert("tr_state", $state_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      $state_delete_where = '(state_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_state", $state_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $model_data['state_values'] = $this->db->order_by('state_id','desc')->get_where('tr_state')->result_array();
    return $model_data;
  }

  // Districts - Add Edit Delete View
  public function districts($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $district_get_where = "district_name =" . "'" . $this->input->post('d_name') . "' AND district_state_id =" . "'" . $this->input->post('d_state_name') . "' AND district_id NOT IN (". $this->input->post('rid').")";
      $district_get = $this->db->get_where('tr_district',$district_get_where);

      if($district_get -> num_rows() > 0) {
        $model_data['status'] = "District Name is already exist for choosen state";
        $model_data['error'] = 1;     
      }
      else {
        $district_update_data = array( 
                                    'district_name' => $this->input->post('d_name'),
                                    'district_state_id' => $this->input->post('d_state_name'),
                                    'district_status' => $this->input->post('d_status'),
                                  );
        $district_update_where = '(district_id="'.$this->input->post('rid').'")'; 
        $this->db->set($district_update_data); 
        $this->db->where($district_update_where);
        $this->db->update("tr_district", $district_update_data); 
        $model_data['status'] = "Updated Successfully";
        $model_data['error'] = 2;
      }
    }

    // Save data
    else if($status=='save') {
      $district_get_where = '(district_name="'.$this->input->post('d_name').'" and district_state_id="'.$this->input->post('d_state_name').'")';
      $district_get = $this->db->get_where('tr_district',$district_get_where);

      if($district_get -> num_rows() > 0) {
        $model_data['status'] = "District Name is already exist for choosen state";
        $model_data['error'] = 1;     
      }
      else {
        $district_insert_data = array( 
                                      'district_name' => $this->input->post('d_name'),
                                      'district_state_id' => $this->input->post('d_state_name'),
                                      'district_status' => $this->input->post('d_status'),
                                  );
        $this->db->insert("tr_district", $district_insert_data); 
        $model_data['status'] = "Inserted Successfully";
        $model_data['error'] = 2;
      }
    }

    // Delete data
    else if($status =='delete') {
      $district_delete_data = '(district_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_district", $district_delete_data); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_district d');
    $this->db->join('tr_state s','d.district_state_id=s.state_id','inner');
    $this->db->order_by('d.district_id','desc');
    $model_data['districts_values'] = $this->db->get()->result_array();

    return $model_data;
  }

  // Institution Type - Add Edit Delete View
  public function institution_type($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $institution_update_data = array( 
                              'institution_type_name' => $this->input->post('i_name'),
                              'institution_type_status' => $this->input->post('i_status')
                            );
      $institution_update_where = '(institution_type_id="'.$this->input->post('rid').'")'; 
      $this->db->set($institution_update_data); 
      $this->db->where($institution_update_where);
      $this->db->update("tr_institution_type", $institution_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $institution_insert_data = array( 
                            'institution_type_name' => $this->input->post('i_name'),
                            'institution_type_status' => $this->input->post('i_status')
                          );
      $this->db->insert("tr_institution_type", $institution_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      $institution_delete_where = '(institution_type_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_institution_type", $institution_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $model_data['institution_type_values'] = $this->db->order_by('institution_type_id','desc')->get_where('tr_institution_type')->result_array();
    return $model_data;
  }

  // Qualification Type - Add Edit Delete View
  public function qualification_type($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      // $qualification_get_where = '(educational_qualification="'.$this->input->post('educational_qualification').'" and educational_qualification_course_type="'.$this->input->post('educational_qualification_course_type').'")';
      $qualification_get_where = "educational_qualification =" . "'" . $this->input->post('q_name') . "' AND educational_qualification_course_type =" . "'" . $this->input->post('q_course_type') . "' AND educational_qualifcation_inst_type_id =" . "'" . $this->input->post('q_inst_type') . "' AND educational_qualification_id NOT IN (". $this->input->post('rid').")";


      $qualification_get = $this->db->get_where('tr_educational_qualification',$qualification_get_where);

      if($qualification_get -> num_rows() > 0) {
        $model_data['status'] = "Qualification Name is already exist for choosen qualification course type";
        $model_data['error'] = 1;     
      }
      else {
        $qualification_update_data = array( 
                                    'educational_qualification' => $this->input->post('q_name'),
                                    'educational_qualification_course_type' => $this->input->post('q_course_type'),
                                    'educational_qualifcation_inst_type_id' => $this->input->post('q_inst_type'),
                                    'educational_qualification_status' => $this->input->post('q_status'),
                                  );
        $qualification_update_where = '(educational_qualification_id="'.$this->input->post('rid').'")'; 
        $this->db->set($qualification_update_data); 
        $this->db->where($qualification_update_where);
        $this->db->update("tr_educational_qualification", $qualification_update_data); 
        $model_data['status'] = "Updated Successfully";
        $model_data['error'] = 2;
      }
    }

    // Save data
    else if($status=='save') {
      $qualification_get_where = '(educational_qualification="'.$this->input->post('q_name').'" and educational_qualification_course_type="'.$this->input->post('q_course_type').'" and educational_qualifcation_inst_type_id="'.$this->input->post('q_inst_type').'")';
      $qualification_get = $this->db->get_where('tr_educational_qualification',$qualification_get_where);

      if($qualification_get -> num_rows() > 0) {
        $model_data['status'] = "Qualification Name is already exist for choosen qualification course type";
        $model_data['error'] = 1;     
      }
      else {
        $qualification_insert_data = array( 
                                      'educational_qualification' => $this->input->post('q_name'),
                                      'educational_qualification_course_type' => $this->input->post('q_course_type'),
                                      'educational_qualifcation_inst_type_id' => $this->input->post('q_inst_type'),
                                      'educational_qualification_status' => $this->input->post('q_status'),
                                    );
        $this->db->insert("tr_educational_qualification", $qualification_insert_data); 
        $model_data['status'] = "Inserted Successfully";
        $model_data['error'] = 2;
      }
    }

    // Delete data
    else if($status =='delete') {
      $qualification_delete_where = '(educational_qualification_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_educational_qualification", $qualification_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_educational_qualification eq');
    $this->db->join('tr_institution_type it','eq.educational_qualifcation_inst_type_id=it.institution_type_id','inner');
    $model_data['qualification_type_values'] = $this->db->order_by('eq.educational_qualification_id','desc')->get()->result_array();

    return $model_data;
  }

  // Languages - Add Edit Delete View
  public function languages($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $language_update_data = array( 
                                    'language_name' => $this->input->post('l_name'),
                                    'is_mother_tangue' => $this->input->post('l_mother_tongue'),
                                    'is_medium_of_instruction' => $this->input->post('l_instruction'),
                                    'language_status' => $this->input->post('l_status'),
                                  );
      $language_update_where = '(language_id="'.$this->input->post('rid').'")'; 
      $this->db->set($language_update_data); 
      $this->db->where($language_update_where);
      $this->db->update("tr_languages", $language_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $language_insert_data = array( 
                                      'language_name' => $this->input->post('l_name'),
                                      'is_mother_tangue' => $this->input->post('l_mother_tongue'),
                                      'is_medium_of_instruction' => $this->input->post('l_instruction'),
                                      'language_status' => $this->input->post('l_status'),
                                    );
      $this->db->insert("tr_languages", $language_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      $language_delete_where = '(language_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_languages", $language_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $model_data['language_values'] = $this->db->order_by('language_id','desc')->get('tr_languages')->result_array();

    return $model_data;
  }



  // Extra Curricular - Add Edit Delete View
  public function extra_curricular($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $extrac_update_data = array( 
                              'extra_curricular' => $this->input->post('e_name'),
                              'extra_curricular_status' => $this->input->post('e_status')
                            );
      $extrac_update_where = '( extra_curricular_id="'.$this->input->post('rid').'")'; 
      $this->db->set($extrac_update_data); 
      $this->db->where($extrac_update_where);
      $this->db->update("tr_extra_curricular", $extrac_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $extrac_insert_data = array( 
                            'extra_curricular' => $this->input->post('e_name'),
                            'extra_curricular_status' => $this->input->post('e_status')
                          );
      $this->db->insert("tr_extra_curricular", $extrac_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      $extrac_delete_where = '(extra_curricular_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_extra_curricular", $extrac_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $model_data['extra_curricular_values'] = $this->db->order_by('extra_curricular_id','desc')->get_where('tr_extra_curricular')->result_array();
    return $model_data;
  }

  // Qualification Type - Add Edit Delete View
  public function class_level($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $class_level_get_where = "class_level =" . "'" . $this->input->post('c_name') . "' AND class_level_inst_type_id =" . "'" . $this->input->post('c_inst_type') . "' AND class_level_id NOT IN (". $this->input->post('rid').")";
      $class_level_get = $this->db->get_where('tr_class_level',$class_level_get_where);

      if($class_level_get -> num_rows() > 0) {
        $model_data['status'] = "Class Level is already exist for choosen institution type";
        $model_data['error'] = 1;     
      }
      else {
        $class_level_update_data = array( 
                                    'class_level' => $this->input->post('c_name'),
                                    'class_level_inst_type_id' => $this->input->post('c_inst_type'),
                                    'class_level_status' => $this->input->post('c_status'),
                                  );
        $class_level_update_where = '(class_level_id="'.$this->input->post('rid').'")'; 
        $this->db->set($class_level_update_data); 
        $this->db->where($class_level_update_where);
        $this->db->update("tr_class_level", $class_level_update_data); 
        $model_data['status'] = "Updated Successfully";
        $model_data['error'] = 2;
      }
    }

    // Save data
    else if($status=='save') {
      $class_level_get_where = '(class_level="'.$this->input->post('c_name').'" and class_level_inst_type_id="'.$this->input->post('c_inst_type').'")';
      $class_level_get = $this->db->get_where('tr_class_level',$class_level_get_where);

      if($class_level_get -> num_rows() > 0) {
        $model_data['status'] = "Class Level is already exist for choosen institution type";
        $model_data['error'] = 1;     
      }
      else {
        $class_level_insert_data = array( 
                                      'class_level' => $this->input->post('c_name'),
                                      'class_level_inst_type_id' => $this->input->post('c_inst_type'),
                                      'class_level_status' => $this->input->post('c_status'),
                                  );
        $this->db->insert("tr_class_level", $class_level_insert_data); 
        $model_data['status'] = "Inserted Successfully";
        $model_data['error'] = 2;
      }
    }

    // Delete data
    else if($status =='delete') {
      $class_level_delete_where = '(class_level_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_class_level", $class_level_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_class_level cl');
    $this->db->join('tr_institution_type it','cl.class_level_inst_type_id=it.institution_type_id','inner');
    $this->db->order_by('cl.class_level_id','desc');
    $model_data['class_level_values'] = $this->db->get()->result_array();

    return $model_data;
  }

  // Departments - Add Edit Delete View
  public function departments($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $departments_update_data = array( 
                              'departments_name' => $this->input->post('d_name'),
                              'department_educational_qualification_id' => $this->input->post('d_qualification'),
                              'departments_status' => $this->input->post('d_status'),
                            );
      $departments_update_where = '(departments_id="'.$this->input->post('rid').'")'; 
      $this->db->set($departments_update_data); 
      $this->db->where($departments_update_where);
      $this->db->update("tr_departments", $departments_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $departments_insert_data = array( 
                            'departments_name' => $this->input->post('d_name'),
                            'department_educational_qualification_id' => $this->input->post('d_qualification'),
                            'departments_status' => $this->input->post('d_status'),
                          );
      $this->db->insert("tr_departments", $departments_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      $departments_delete_where = '(departments_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_departments", $departments_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $departments_list_query = $this->db->query("SELECT * FROM tr_educational_qualification AS c INNER JOIN ( SELECT *, SUBSTRING_INDEX( SUBSTRING_INDEX( t.department_educational_qualification_id, ',', n.n ) , ',', -1 ) value FROM tr_departments t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.department_educational_qualification_id ) - LENGTH( REPLACE( t.department_educational_qualification_id, ',', ''))) ) AS a ON a.value = c.educational_qualification_id order by (a.departments_id) desc");
    $model_data['departments_values'] = $departments_list_query->result_array(); 
	// echo "<pre>";
	// print_r($model_data['departments_values']);
	// echo "</pre>";
    return $model_data;
  }

  // Subjects - Add Edit Delete View
  public function subjects($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $subjects_update_data = array( 
                                'subject_name' => $this->input->post('s_name'),
                                'subject_institution_id' => $this->input->post('s_inst_type'),
                                'subject_status' => $this->input->post('s_status'),
                              );
      $subjects_update_where = '(subject_id="'.$this->input->post('rid').'")'; 
      $this->db->set($subjects_update_data); 
      $this->db->where($subjects_update_where);
      $this->db->update("tr_subject", $subjects_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $subjects_insert_data = array( 
                            'subject_name' => $this->input->post('s_name'),
                            'subject_institution_id' => $this->input->post('s_inst_type'),
                            'subject_status' => $this->input->post('s_status'),
                          );
      $this->db->insert("tr_subject", $subjects_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      $subjects_delete_where = '(subject_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_subject", $subjects_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $subjects_list_query = $this->db->query("SELECT * FROM tr_institution_type AS c INNER JOIN ( SELECT *, SUBSTRING_INDEX( SUBSTRING_INDEX( t.subject_institution_id, ',', n.n ) , ',', -1 ) value FROM tr_subject t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.subject_institution_id ) - LENGTH( REPLACE( t.subject_institution_id, ',', ''))) ) AS a ON a.value = c.institution_type_id order by (a.subject_id) desc");
    $model_data['subject_values'] = $subjects_list_query->result_array();  
    return $model_data;
  }

  // Universities - Add Edit Delete View
  public function universities($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $universities_update_data = array( 
                              'university_board_name' => $this->input->post('u_name'),
                              'university_class_level_id' => $this->input->post('u_class_level'),
                              'university_board_status' => $this->input->post('u_status'),
                            );
      $universities_update_where = '(education_board_id="'.$this->input->post('rid').'")'; 
      $this->db->set($universities_update_data); 
      $this->db->where($universities_update_where);
      $this->db->update("tr_university_board", $universities_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $universities_insert_data = array( 
                            'university_board_name' => $this->input->post('u_name'),
                            'university_class_level_id' => $this->input->post('u_class_level'),
                            'university_board_status' => $this->input->post('u_status'),
                          );
      $this->db->insert("tr_university_board", $universities_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      $universities_delete_data = '(education_board_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_university_board", $universities_delete_data); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $universities_list_query = $this->db->query("SELECT * FROM tr_class_level AS c INNER JOIN ( SELECT *, SUBSTRING_INDEX( SUBSTRING_INDEX( t.university_class_level_id, ',', n.n ) , ',', -1 ) value FROM tr_university_board t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.university_class_level_id ) - LENGTH( REPLACE( t.university_class_level_id, ',', ''))) ) AS a ON a.value = c.class_level_id order by (a.education_board_id) desc");
    $model_data['universities_values'] = $universities_list_query->result_array();  
    return $model_data;
  }

  // Postings - Add Edit Delete View
  public function postings($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $postings_update_data = array( 
                              'posting_name' => $this->input->post('p_name'),
                              'posting_institution_id' => $this->input->post('p_inst_type'),
                              'posting_status' => $this->input->post('p_status'),
                            );
      $postings_update_where = '(posting_id="'.$this->input->post('rid').'")'; 
      $this->db->set($postings_update_data); 
      $this->db->where($postings_update_where);
      $this->db->update("tr_applicable_posting", $postings_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $postings_insert_data = array( 
                            'posting_name' => $this->input->post('p_name'),
                            'posting_institution_id' => $this->input->post('p_inst_type'),
                            'posting_status' => $this->input->post('p_status'),
                          );
      $this->db->insert("tr_applicable_posting", $postings_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      $postings_delete_data = '(posting_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_applicable_posting", $postings_delete_data); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $postings_list_query = $this->db->query("SELECT * FROM tr_institution_type AS c INNER JOIN ( SELECT *, SUBSTRING_INDEX( SUBSTRING_INDEX( t.posting_institution_id, ',', n.n ) , ',', -1 ) value FROM tr_applicable_posting t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.posting_institution_id ) - LENGTH( REPLACE( t.posting_institution_id, ',', ''))) ) AS a ON a.value = c.institution_type_id order by (a.posting_id) desc");
    $model_data['postings_values'] = $postings_list_query->result_array();  
    return $model_data;



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


  
}

/* End of file Admin_Model.php */
/* Location: ./application/controllers/Admin_Model.php */
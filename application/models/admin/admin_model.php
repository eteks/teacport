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
                              'state_name' => $this->input->post('state_name'),
                              'state_status' => $this->input->post('state_status')
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
                            'state_name' => $this->input->post('state_name'),
                            'state_status' => $this->input->post('state_status')
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
    $model_data['state_values'] = $this->db->get_where('tr_state')->result_array();
    return $model_data;
  }

  // Districts - Add Edit Delete View
  public function districts($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $district_get_where = "district_name =" . "'" . $this->input->post('district_name') . "' AND district_state_id =" . "'" . $this->input->post('district_state_id') . "' AND district_id NOT IN (". $this->input->post('rid').")";
      $district_get = $this->db->get_where('tr_district',$district_get_where);

      if($district_get -> num_rows() > 0) {
        $model_data['status'] = "District Name is already exist for choosen state";
        $model_data['error'] = 1;     
      }
      else {
        $district_update_data = array( 
                                    'district_name' => $this->input->post('district_name'),
                                    'district_state_id' => $this->input->post('district_state_id'),
                                    'district_status' => $this->input->post('district_status'),
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
      $district_get_where = '(district_name="'.$this->input->post('district_name').'" and district_state_id="'.$this->input->post('district_state_id').'")';
      $district_get = $this->db->get_where('tr_district',$district_get_where);

      if($district_get -> num_rows() > 0) {
        $model_data['status'] = "District Name is already exist for choosen state";
        $model_data['error'] = 1;     
      }
      else {
        $district_insert_data = array( 
                                      'district_name' => $this->input->post('district_name'),
                                      'district_state_id' => $this->input->post('district_state_id'),
                                      'district_status' => $this->input->post('district_status'),
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
                              'institution_type_name' => $this->input->post('institution_type_name'),
                              'institution_type_status' => $this->input->post('institution_type_status')
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
                            'institution_type_name' => $this->input->post('institution_type_name'),
                            'institution_type_status' => $this->input->post('institution_type_status')
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
    $model_data['institution_type_values'] = $this->db->get_where('tr_institution_type')->result_array();
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
      $qualification_get_where = "educational_qualification =" . "'" . $this->input->post('educational_qualification') . "' AND educational_qualification_course_type =" . "'" . $this->input->post('educational_qualification_course_type') . "' AND educational_qualifcation_inst_type_id =" . "'" . $this->input->post('educational_qualifcation_inst_type_id') . "' AND educational_qualification_id NOT IN (". $this->input->post('rid').")";


      $qualification_get = $this->db->get_where('tr_educational_qualification',$qualification_get_where);

      if($qualification_get -> num_rows() > 0) {
        $model_data['status'] = "Qualification Name is already exist for choosen qualification course type";
        $model_data['error'] = 1;     
      }
      else {
        $qualification_update_data = array( 
                                    'educational_qualification' => $this->input->post('educational_qualification'),
                                    'educational_qualification_course_type' => $this->input->post('educational_qualification_course_type'),
                                    'educational_qualifcation_inst_type_id' => $this->input->post('educational_qualifcation_inst_type_id'),
                                    'educational_qualification_status' => $this->input->post('educational_qualification_status'),
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
      $qualification_get_where = '(educational_qualification="'.$this->input->post('educational_qualification').'" and educational_qualification_course_type="'.$this->input->post('educational_qualification_course_type').'" and educational_qualifcation_inst_type_id="'.$this->input->post('educational_qualifcation_inst_type_id').'")';
      $qualification_get = $this->db->get_where('tr_educational_qualification',$qualification_get_where);

      if($qualification_get -> num_rows() > 0) {
        $model_data['status'] = "Qualification Name is already exist for choosen qualification course type";
        $model_data['error'] = 1;     
      }
      else {
        $qualification_insert_data = array( 
                                      'educational_qualification' => $this->input->post('educational_qualification'),
                                      'educational_qualification_course_type' => $this->input->post('educational_qualification_course_type'),
                                      'educational_qualifcation_inst_type_id' => $this->input->post('educational_qualifcation_inst_type_id'),
                                      'educational_qualification_status' => $this->input->post('educational_qualification_status'),
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
    $model_data['qualification_type_values'] = $this->db->get()->result_array();

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
                              'extra_curricular' => $this->input->post('extra_curricular'),
                              'extra_curricular_status' => $this->input->post('extra_curricular_status')
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
                            'extra_curricular' => $this->input->post('extra_curricular'),
                            'extra_curricular_status' => $this->input->post('extra_curricular_status')
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
    $model_data['extra_curricular_values'] = $this->db->get_where('tr_extra_curricular')->result_array();
    return $model_data;
  }

  // Qualification Type - Add Edit Delete View
  public function class_level($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $class_level_get_where = "class_level =" . "'" . $this->input->post('class_level') . "' AND class_level_inst_type_id =" . "'" . $this->input->post('class_level_inst_type_id') . "' AND class_level_id NOT IN (". $this->input->post('rid').")";
      $class_level_get = $this->db->get_where('tr_class_level',$class_level_get_where);

      if($class_level_get -> num_rows() > 0) {
        $model_data['status'] = "Class Level is already exist for choosen institution type";
        $model_data['error'] = 1;     
      }
      else {
        $class_level_update_data = array( 
                                    'class_level' => $this->input->post('class_level'),
                                    'class_level_inst_type_id' => $this->input->post('class_level_inst_type_id'),
                                    'class_level_status' => $this->input->post('class_level_status'),
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
      $class_level_get_where = '(class_level="'.$this->input->post('class_level').'" and class_level_inst_type_id="'.$this->input->post('class_level_inst_type_id').'")';
      $class_level_get = $this->db->get_where('tr_class_level',$class_level_get_where);

      if($class_level_get -> num_rows() > 0) {
        $model_data['status'] = "Class Level is already exist for choosen institution type";
        $model_data['error'] = 1;     
      }
      else {
        $class_level_insert_data = array( 
                                      'class_level' => $this->input->post('class_level'),
                                      'class_level_inst_type_id' => $this->input->post('class_level_inst_type_id'),
                                      'class_level_status' => $this->input->post('class_level_status'),
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
                              'departments_name' => $this->input->post('departments_name'),
                              'department_educational_qualification_id' => $this->input->post('department_educational_qualification_id'),
                              'departments_status' => $this->input->post('departments_status'),
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
                            'departments_name' => $this->input->post('departments_name'),
                            'department_educational_qualification_id' => $this->input->post('department_educational_qualification_id'),
                            'departments_status' => $this->input->post('departments_status'),
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
    $departments_list_query = $this->db->query("SELECT * FROM tr_educational_qualification AS c INNER JOIN ( SELECT departments_id,departments_name,departments_status,departments_created_date, SUBSTRING_INDEX( SUBSTRING_INDEX( t.department_educational_qualification_id, ',', n.n ) , ',', -1 ) value FROM tr_departments t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.department_educational_qualification_id ) - LENGTH( REPLACE( t.department_educational_qualification_id, ',', ''))) ) AS a ON a.value = c.educational_qualification_id order by (a.departments_id)");
    $model_data['departments_values'] = $departments_list_query->result_array();  
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
                              'subject_name' => $this->input->post('subject_name'),
                              'subject_institution_id' => $this->input->post('subject_institution_id'),
                              'subject_status' => $this->input->post('subject_status'),
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
                            'subject_name' => $this->input->post('subject_name'),
                            'subject_institution_id' => $this->input->post('subject_institution_id'),
                            'subject_status' => $this->input->post('subject_status'),
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
    $subjects_list_query = $this->db->query("SELECT * FROM tr_institution_type AS c INNER JOIN ( SELECT subject_id,subject_name,subject_status,subject_create_date, SUBSTRING_INDEX( SUBSTRING_INDEX( t.subject_institution_id, ',', n.n ) , ',', -1 ) value FROM tr_subject t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.subject_institution_id ) - LENGTH( REPLACE( t.subject_institution_id, ',', ''))) ) AS a ON a.value = c.institution_type_id order by (a.subject_id)");
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
                              'university_board_name' => $this->input->post('university_board_name'),
                              'university_class_level_id' => $this->input->post('university_class_level_id'),
                              'university_board_status' => $this->input->post('university_board_status'),
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
                            'university_board_name' => $this->input->post('university_board_name'),
                            'university_class_level_id' => $this->input->post('university_class_level_id'),
                            'university_board_status' => $this->input->post('university_board_status'),
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
    $universities_list_query = $this->db->query("SELECT * FROM tr_class_level AS c INNER JOIN ( SELECT education_board_id,university_board_name,university_board_status,university_board_created_date, SUBSTRING_INDEX( SUBSTRING_INDEX( t.university_class_level_id, ',', n.n ) , ',', -1 ) value FROM tr_university_board t CROSS JOIN numbers n WHERE n.n <=1 + ( LENGTH( t.university_class_level_id ) - LENGTH( REPLACE( t.university_class_level_id, ',', ''))) ) AS a ON a.value = c.class_level_id order by (a.education_board_id)");
    $model_data['universities_values'] = $universities_list_query->result_array();  
    return $model_data;
  }

  // Get Institution Type list
  public function get_institution_type()
  {
    $institution_get_where = '(institution_type_status=1)'; 
    $model_data = $this->db->get_where("tr_institution_type", $institution_get_where)->result_array(); 
    return $model_data;
  }

  // Get Qualification list
  public function get_qualification_list()
  {
    $qualification_get_where = '(educational_qualification_status=1)'; 
    $model_data = $this->db->get_where("tr_educational_qualification", $qualification_get_where)->result_array(); 
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

  // Get subscription values
  public function get_subscription_values()
  {
    $subscription_get_where = '(subscription_status=1)'; 
    $model_data = $this->db->get_where("tr_subscription", $subscription_get_where)->result_array(); 
    return $model_data;
  }
  
}

/* End of file Ajax_Model.php */
/* Location: ./application/controllers/Ajax_Model.php */
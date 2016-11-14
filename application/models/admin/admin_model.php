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
      $state_delete_where = '(institution_type_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_institution_type", $state_delete_where); 
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
      $state_delete_where = '(educational_qualification_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_educational_qualification", $state_delete_where); 
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
      $state_delete_where = '(class_level_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_class_level", $state_delete_where); 
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

  // Get Institution Type list
  public function get_institution_type()
  {
    $institution_get_where = '(institution_type_status=1)'; 
    $model_data = $this->db->get_where("tr_institution_type", $institution_get_where)->result_array(); 
    return $model_data;
  }
  
}

/* End of file Ajax_Model.php */
/* Location: ./application/controllers/Ajax_Model.php */
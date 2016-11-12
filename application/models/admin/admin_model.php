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
    if($status=='update' && $this->input->post('rid')) {
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
    else if($status =='delete' && $this->input->post('rid')) {
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
    if($status=='update' && $this->input->post('rid')) {
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
    else if($status =='delete' && $this->input->post('rid')) {
      $state_delete_where = '(institution_type_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_institution_type", $state_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $model_data['institution_type_values'] = $this->db->get_where('tr_institution_type')->result_array();
    return $model_data;
  }
  
}

/* End of file Ajax_Model.php */
/* Location: ./application/controllers/Ajax_Model.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model {

	public function __construct()
  {
    $this->load->database();
  }
  
  // State - Add Edit Delete View
  public function state()
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;
    if($this->input->post('action')=='update' && $this->input->post('rid') && $this->input->post('state_name')) {
      // $state_where = '(state_name="'.$this->input->post("state_name").'" and state_id NOT IN "'.$this->input->post('state_id').'" )';
      $state_where = "state_name =" . "'" . $this->input->post("state_name") . "' AND state_id NOT IN (". $this->input->post('rid').")";
      $query = $this->db->get_where('tr_state',$state_where);
      if($query -> num_rows() > 0) {
        $model_data['status'] = "Already exists";
        $model_data['error'] = 1;
      }
      else {
        $state_update_data = array( 
                              'state_name' => $this->input->post('state_name'),
                              'state_status' => $this->input->post('state_status')
                              );
        $state_update_where = '( state_id="'.$this->input->post('rid').'")'; 
        $this->db->set($state_update_data); 
        $this->db->where($state_update_where);
        $this->db->update("tr_state", $state_update_data); 
        $model_data['status'] = "Updated";
      }
    }

    
    else if($this->input->post('status')=='new' && $this->input->post('state_name')) {
      $state_where = '(state_name="'.$this->input->post("state_name").'" )';
      $query = $this->db->get_where('tr_state',$state_where);
      if($query -> num_rows() > 0) {
        $model_data['status'] = "Already exists";
      }
      else {
        $state_insert_data = array( 
                              'state_name' => $this->input->post('state_name'),
                              'state_status' => $this->input->post('state_status')
                              );
        $this->db->insert("tr_state", $state_insert_data); 
        $model_data['status'] = "Inserted";
      }
    }

    $model_data['state_values'] = $this->db->get_where('tr_state')->result_array();
    return $model_data;
  }
  
}

/* End of file Ajax_Model.php */
/* Location: ./application/controllers/Ajax_Model.php */
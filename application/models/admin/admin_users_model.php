<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_users_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  // User groups - Add Edit Delete View
  public function user_groups($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $group_update_data = array( 
                              'user_group_name' => $this->input->post('user_group_name'),
                              'user_group_description' => $this->input->post('user_group_description'),
                              'is_super_admin' => $this->input->post('user_super_admin'),                             
                              'user_group_status' => $this->input->post('user_group_status')
                            );
      $group_update_where = '( user_group_id="'.$this->input->post('rid').'")'; 
      $this->db->set($group_update_data); 
      $this->db->where($group_update_where);
      $this->db->update("tr_admin_user_groups", $group_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $group_insert_data = array( 
                              'user_group_name' => $this->input->post('user_group_name'),
                              'user_group_description' => $this->input->post('user_group_description'),
                              'is_super_admin' => $this->input->post('user_super_admin'),      
                              'user_group_status' => $this->input->post('user_group_status')
                            );
      $this->db->insert("tr_admin_user_groups", $group_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      $group_delete_where = '(user_group_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_admin_user_groups", $group_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $model_data['group_values'] = $this->db->get_where('tr_admin_user_groups')->result_array();
    return $model_data;
  }

  // Edit admin profile
  public function teac_admin_edit_profile($status)
  {
    $session_data = $this->session->userdata('login_session');
    // Update data
    if($status == 'update') {
      $update_where = '(admin_user_id="'.$session_data['admin_user_id'].'")';
      $update_data =  array(
                        'admin_user_name' => $this->input->post('user_name'),
                        'admin_user_email' => $this->input->post('user_email')              
                      );
      $this->db->set($update_data);
      $this->db->where($update_where);
      $this->db->update("tr_admin_users", $update_data); 
      $model_data['status'] = "Updated Successfully";
    }
    else if($status = 'init') {
      $select_where = '(admin_user_id="'.$session_data['admin_user_id'].'")';
      $model_data = $this->db->get_where('tr_admin_users',$select_where)->row_array();
    }
    return $model_data;
  }

  // Change password
  public function teac_admin_change_password()
  {
    $session_data = $this->session->userdata('login_session');
    // Update data
    $update_where = '(admin_user_id="'.$session_data['admin_user_id'].'")';
    $update_data =  array(
                      'admin_user_password' => $this->input->post('new_pass_confirm')            
                    );
    $this->db->set($update_data);
    $this->db->where($update_where);
    $this->db->update("tr_admin_users", $update_data); 
    $model_data['status'] = "Updated Successfully";
    return $model_data;
  }

  // User groups - Add Edit Delete View
  public function user_accounts($status)
  {
    $model_data['status'] = 0;
    $model_data['error'] = 0;

    // Update data
    if($status=='update') {
      $users_update_data = array( 
                              'admin_user_name' => $this->input->post('admin_user_name'),
                              'admin_user_password' => $this->input->post('admin_user_password'),
                              'admin_user_email' => $this->input->post('admin_user_email'),
                              'admin_user_group_id' => $this->input->post('admin_user_group'),
                              'admin_user_status' => $this->input->post('admin_user_status')
                            );
      $users_update_where = '( admin_user_id="'.$this->input->post('rid').'")'; 
      $this->db->set($users_update_data); 
      $this->db->where($users_update_where);
      $this->db->update("tr_admin_users", $users_update_data); 
      $model_data['status'] = "Updated Successfully";
      $model_data['error'] = 2;
    }

    // Save data
    else if($status=='save') {
      $users_insert_data = array( 
                              'admin_user_name' => $this->input->post('admin_user_name'),
                              'admin_user_password' => $this->input->post('admin_user_password'),
                              'admin_user_email' => $this->input->post('admin_user_email'),
                              'admin_user_group_id' => $this->input->post('admin_user_group'),
                              'admin_user_status' => $this->input->post('admin_user_status')
                            );
      $this->db->insert("tr_admin_users", $users_insert_data); 
      $model_data['status'] = "Inserted Successfully";
      $model_data['error'] = 2;
    }

    // Delete data
    else if($status =='delete') {
      $users_delete_where = '(state_id="'.$this->input->post('rid').'")';
      $this->db->delete("tr_admin_users", $users_delete_where); 
      $model_data['status'] = "Deleted Successfully";
      $model_data['error'] = 2;
    }

    // View
    $this->db->select('*');
    $this->db->from('tr_admin_users usr');
    $this->db->join('tr_admin_user_groups grp','usr.admin_user_group_id=grp.user_group_id','inner');
    $model_data['user_details'] = $this->db->get()->result_array();
    return $model_data;
  }
    //Admin modules to store in database
    public function insert_modules(){
        // echo "<pre>";
        // print_r($this->config->item('admin_modules'));
        // echo "</pre>";
        $data = $this->config->item('admin_modules');
        // $data = json_decode($data, true);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // $full_map_array = array();
        // foreach($data as $data_value) {
        //   foreach ($data_value as $key => $value) {
        //     $array = array();
        //     foreach ($value as $record) {
        //       $array['main_module'] = $key;
        //       $array['sub_module'] = $record['sub_module'];
        //       $array['operation_available'] = $record['module_access'];
        //       array_push($full_map_array, $array);
        //     }
        //   }
        // }
        $full_map_array = array();
        foreach($data as $key => $value) {      
            foreach ($value['sub_module'] as $k => $v) {
                $array = array();
                $array['main_module'] = $value['main_module'];
                $array['sub_module'] = $v['name'];
                $array['operation_available'] = $v['access_operation'];
                $array['page_url'] = $v['route_url'];
                array_push($full_map_array, $array);
            }            
        }
        //Here insert_batch is a inbuilt function to store the set of records into database in a single query at the same time
        // $this->db->insert_batch('tr_admin_modules', $full_map_array);

        //Here insert_on_duplicate_update_batch is also a inbuilt function, it ignores the insertion when duplicate record found. To use this function we have to download two files MY_Loader.php and MY_DB_mysql_driver.php and place in folder application/core
        $this->db->trans_start();
        $this->db->insert_on_duplicate_update_batch('tr_admin_modules', $full_map_array);
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE)
          return "failure";
        else 
          return "success";
    }
    //Get all the admin modules to assign priveleges for each user
    public function get_all_modules(){
        $this->db->select('*');
        $this->db->from('tr_admin_modules');
        $query = $this->db->get()->result_array();
        return $query;
    }
    //Get all the admin groups to assign priveleges for that group user
    public function get_admin_groups(){
        $super_admin_where = '(is_super_admin=0)';
        $this->db->select('*');
        $this->db->from('tr_admin_user_groups grp');
        $this->db->join('tr_admin_access_control acc','grp.user_group_id=acc.access_group_id','left');
        $this->db->where($super_admin_where);
        $query = $this->db->get()->result_array();
        return $query;
    }
    //Store the admin privileges by group id
    public function insert_update_admin_prvileges($data){
        $data = json_decode($data, true);
        $this->db->trans_start();
        $this->db->insert_on_duplicate_update_batch('tr_admin_access_control',$data);
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE)
          return "failure";
        else 
          return "success";
    }
    //Get every access rights of each module by group id
    public function get_admin_rights_by_group(){
        // $users_group_where = '(access_group_id="'.$this->input->post('rid').'")';
        $access_group_id = $this->session->userdata("admin_login_session")['admin_user_group_id'];
        $users_group_where = '(access_group_id="'.$access_group_id.'")';
        $this->db->select('am.main_module,am.sub_module,am.operation_available,am.page_url,aac.access_permission');
        $this->db->from('tr_admin_access_control aac');
        $this->db->join('tr_admin_modules am','aac.access_module_id=am.module_id','inner');
        $this->db->where($users_group_where);
        $query = $this->db->get()->result_array();
        return $query;
    }
    //Get all the user groups
    public function get_user_groups(){
        $user_group_where = '(user_group_status=1)'; 
        $model_data = $this->db->get_where("tr_admin_user_groups", $user_group_where)->result_array(); 
        return $model_data;
    }
}

/* End of file Admin_users_model.php */
/* Location: ./application/controllers/Admin_users_model.php */
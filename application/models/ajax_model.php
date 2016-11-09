<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Model extends CI_Model {

   	//  Get registration status
    public function get_registeration_status_provider() {
        $validation_rules = array(
            array(
                 'field'   => 'registrant_name',
                 'label'   => 'User Name',
                 'rules'   => 'trim|required|xss_clean|is_unique[tr_organization_profile.registrant_name]'
              ),
            array(
                 'field'   => 'registrant_email_id',
                 'label'   => 'Email',
                 'rules'   => 'trim|required|valid_email|xss_clean|is_unique[tr_organization_profile.registrant_email_id]'
              ),
            array(
            'field'   => 'registrant_password', 
            'label'   => 'Password', 
            'rules'   => 'trim|required|matches[registrant_password]'
        ),
        array(
            'field'   => 'registrant_password', 
            'label'   => 'Confirm Password', 
            'rules'   => 'trim|required|'
            )
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == FALSE) {   
            foreach($validation_rules as $row){

                $field = $row['field'];         //getting field name
                $error = form_error($field);  
                $status = $error;
                  //getting error for field name
                //form_error() is inbuilt function
                //if error is their for field then only add in $errors_array array
                if($error){
                    $status = strip_tags($error);
                    break;
                }
            }
        }
        else {
            $reg_data = array(
                'registrant_name' => $this->input->post('registrant_name'),
                'registrant_email_id' => $this->input->post('registrant_email_id'),
                'registrant_password' => $this->input->post('registrant_password'),
                'registrant_password' => $this->input->post('registrant_password'),
                'organization_status' => '1'
                );
            $this->db->insert('tr_organization_profile', $reg_data);
            $organization_id = $this->db->organization_id();
            $check_login_where = '(organization_id="'.$organization_id.'")';
            $check_login_data = $this->db->get_where('tr_organization_profile',$check_login_where);
            $this->session->set_userdata("login_status","1");   
            $user_session_details = $check_login_data->row_array();
            $this->session->set_userdata("login_session",$user_session_details);
            $status = "success";
        }
        return $status;
    } 
    public function get_registeration_status_seeker() {
        $validation_rules = array(
            array(
                 'field'   => 'candidate_name',
                 'label'   => 'User Name',
                 'rules'   => 'trim|required|xss_clean|is_unique[tr_candidate_profile.candidate_name]'
              ),
            array(
                 'field'   => 'candidate_email',
                 'label'   => 'Email',
                 'rules'   => 'trim|required|valid_email|xss_clean|is_unique[tr_candidate_profile.candidate_email]'
              ),
            array(
                'field'   => 'candidate_password', 
                'label'   => 'Password', 
                'rules'   => 'trim|required|matches[candidate_password]'
            ),
            array(
                'field'   => 'candidate_password', 
                'label'   => 'Confirm Password', 
                'rules'   => 'trim|required|'
                )
            );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == FALSE) {   
            foreach($validation_rules as $row){

                $field = $row['field'];         //getting field name
                $error = form_error($field);  
                $status = $error;
                  //getting error for field name
                //form_error() is inbuilt function
                //if error is their for field then only add in $errors_array array
                if($error){
                    $status = strip_tags($error);
                    break;
                }
            }
        }
        else {
            $reg_data = array(
                'candidate_name' => $this->input->post('candidate_name'),
                'candidate_email' => $this->input->post('candidate_email'),
                'candidate_password' => $this->input->post('candidate_password'),
                'candidate_password' => $this->input->post('candidate_password'),
                'candidate_status' => '1'
                );
            $this->db->insert('tr_candidate_profile', $reg_data);
            $candidate_id = $this->db->candidate_id();
            $check_login_where = '(candidate_email="'.$candidate_email.'")';
            $check_login_data = $this->db->get_where('tr_candidate_profile',$check_login_where);
            $this->session->set_userdata("login_status","1");   
            $user_session_details = $check_login_data->row_array();
            $this->session->set_userdata("login_session",$user_session_details);
            $status = "success";
        }
        return $status;
    } 
    public function get_login_status_provider() {
        $validation_rules = array(
            array(
                 'field'   => 'registrant_email_id',
                 'label'   => 'Email',
                 'rules'   => 'trim|required|valid_email|xss_clean'
              ),
            array(
                 'field'   => 'registrant_password',
                 'label'   => 'Password',
                 'rules'   => 'trim|required|xss_clean'
              ),   
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == FALSE) {   
            foreach($validation_rules as $row){
                $field = $row['field'];         
                $error = form_error($field); 
                $status = $error;
                if($error){
                    $status = strip_tags($error);
                    break;
                }
            }
        }
        else {
            $check_login_where = '(registrant_email_id="'.$this->input->post('registrant_email_id').'" and    organization_status=1 and registrant_password="'.$this->input->post('registrant_password').'")';
            $check_login_data = $this->db->get_where('tr_organization_profile',$check_login_where);
            if($check_login_data->num_rows() > 0) {
                $this->session->set_userdata("login_status","1");   
                $user_session_details = $check_login_data->row_array();
                $this->session->set_userdata("login_session",$user_session_details);
                $status = "success";
            }
            else {
                $status = "Please enter valid details";  
            }
        }
        echo $status;
    }
    public function get_login_status_seeker() {
        $validation_rules = array(
            array(
                 'field'   => 'candidate_email',
                 'label'   => 'Email',
                 'rules'   => 'trim|required|valid_email|xss_clean'
              ),
            array(
                 'field'   => 'candidate_password',
                 'label'   => 'Password',
                 'rules'   => 'trim|required|xss_clean'
              ),   
        );
        $this->form_validation->set_rules($validation_rules);

        if ($this->form_validation->run() == FALSE) {   
            foreach($validation_rules as $row){
                $field = $row['field'];         
                $error = form_error($field); 
                $status = $error;
                if($error){
                    $status = strip_tags($error);
                    break;
                }
            }
        }
        else {
            $check_login_where = '(candidate_email="'.$this->input->post('candidate_email').'" and    candidate_status=1 and candidate_password="'.$this->input->post('candidate_password').'")';
            $check_login_data = $this->db->get_where('tr_candidate_profile',$check_login_where);
            if($check_login_data->num_rows() > 0) {
                $this->session->set_userdata("login_status","1");   
                $user_session_details = $check_login_data->row_array();
                $this->session->set_userdata("login_session",$user_session_details);
                $status = "success";
            }
            else {
                $status = "Please enter valid details";  
            }
        }
        echo $status;
    }
}
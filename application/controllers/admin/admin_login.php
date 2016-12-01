<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/admin_login_model');
		$this->load->library('form_validation');
		$this->load->helper('custom');
		$this->load->helper('cookie');
		//Here, the 'admin_modules' contains the array variable to hold all the modules with their full details, its loads here because to access that global array variable in view without passing in every controller function
		$this->config->load('admin_modules');
	}

	
	// Extra Curricular - Add Edit View Delete
	public function index()
	{	
		$data['error']=0;
		$validation_rules = array(
 					          	array(
  			                        'field'   => 'username',
			                        'label'   => 'Username',
		    	                    'rules'   => 'trim|required|xss_clean|'
			                    ),
			                    array(
			                        'field'   => 'password',
		                            'label'   => 'Password',
		                            'rules'   => 'trim|required|xss_clean|'
		                        ),
		                    );
  		$this->form_validation->set_rules($validation_rules);
 	  	if ($this->form_validation->run() == FALSE) {   
		    foreach($validation_rules as $row){
		        $field = $row['field'];         //getting field name
		        $error = form_error($field);    //getting error for field name
			    if($error){
					$data['status'] = strip_tags($error);
					break;
		        }
		    }
 	 	}
		else {
	   		$data_values = $this->admin_login_model->teac_login(); 
	   		$data['status'] = $data_values['status'];
	   		$data['error'] = $data_values['error'];
		}
		if($data['error']==0) {
			if($data['status']=='login_success') {
				$data['login_values'] = $data_values['login_values'];
				// Session
	        	$this->session->set_userdata("login_status",1);
    	    	$this->session->set_userdata("login_session",$data['login_values']);
				if($this->input->post('remember_me')) {
					// Set cookie
					$cookie = array(
			        'name'   => 'teacport_name',
			        'value'  => $data['login_values']['admin_user_name'],
			        'expire' =>  time() + (60 * 24 * 60 * 60),
			        'domain' => '.localhost',
			        'path'   => '/',
			        'prefix' => 'admin_',
			        );
			 		set_cookie($cookie);
			 	}
			}
			echo $data['status'];
		}
		else if($data['error']==1) {
			redirect(base_url().'admin/admin_error');
		}
  	}

  	public function teac_admin_login()
	{	
		// get cookie
 		$data['remember_value'] = get_cookie('admin_teacport_name');
		$this->load->view('admin/login',$data);
    }

    // Admin - Forget
  	public function admin_forget() {
  		$data['error']=0;
		$validation_rules = array(
			                    array(
			                        'field'   => 'useremail',
		                            'label'   => 'User Email',
		                            'rules'   => 'trim|required|xss_clean|valid_email|'
		                        ),
		                    );
  		$this->form_validation->set_rules($validation_rules);
 	  	if ($this->form_validation->run() == FALSE) {   
		    foreach($validation_rules as $row){
		        $field = $row['field'];         //getting field name
		        $error = form_error($field);    //getting error for field name
			    if($error){
					$data['status'] = strip_tags($error);
					break;
		        }
		    }
 	 	}
		else {
	   		$data_values = $this->admin_login_model->teac_forget_login(); 
	   		$data['status'] = $data_values['status'];
	   		$data['error'] = $data_values['error'];
		}
		if($data['error']==0) {
			if($data['status']=='valid') {
				$user_values = $data_values['user_values'];	
			 	// $config['protocol'] = 'smtp';
			 	// $config['smtp_host'] = 'ssl://smtp.googlemail.com';
    			// $config['smtp_port'] = 25;
			 	// $config['smtp_user'] = $user_values['admin_user_email'];
			 	// $config['smtp_pass'] = '********';          
		  		// $this->load->library('email', $config);		
				// $this->email->from('sivaramakannan05@gmail.com');
				// $this->email->to($config['smtp_user']);						
				// $this->email->subject('Get your forgotten Password');
				// $this->email->message("Your registered password is ".$user_values['admin_user_password']);
				// $this->email->send();
				// $data['status'] = "Mail sent successfully";
				

				$config = Array(
              		'protocol' => 'smtp',
              		'smtp_host' => 'ssl://smtp.gmail.com',
              		'smtp_port' => 465,
              		'smtp_user' => 'sivaramakannan05@gmail.com',
              		'smtp_pass' => ''
    			);

    			$this->load->library('email',$config);
    			$this->email->set_newline("\r\n");

    			$this->email->from("sivaramakannan05@gmail.com");
    			$this->email->to("sivaramakannan05@gmail.com");
    			$this->email->subject("Email with Codeigniter");
    			$this->email->message("This is email has been sent with Codeigniter");





    			if($this->email->send())
    			{
        			echo "Your email was sent.!";
    			}
    			else 
    			{
        			echo "Your email was not sent.!";
    			}

				// echo $data['status'];
			}
			else {
				echo $data['status'];
			}
		}
		else if($data['error']==1) {
			redirect(base_url().'admin/admin_error');
		}
  	}

  	// Admin - Logout
  	public function teac_admin_logout() {
  		$this->session->unset_userdata("login_status");
        $this->session->unset_userdata("login_session");
        redirect(base_url().'admin');
  	}



	
}
/* End of file Admin_login.php */ 
/* Location: ./application/controllers/Admin_login.php */

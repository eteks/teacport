<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation','session','captcha','iptracker')); 
		$this->load->model(array('job_provider_model','common_model'));
		session_start(); 
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	// Alpha with white space
 	public function alpha_dash_space($provider_job_title){
		if (! preg_match('/^[a-zA-Z\s]+$/', $provider_job_title)) {
			$this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters & White spaces');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function index()
	{
		$session = $this->session->all_userdata();
		$ins_id = isset($session['login_session']['institution_type']) ? $session['login_session']['institution_type'] : (isset($session['login_session']['candidate_institution_type'])?$session['login_session']['candidate_institution_type']:NULL);
		$home['posting'] = $this->common_model->applicable_posting($ins_id);
	    $home['job_results'] = $this->common_model->get_job_list($ins_id);
	    $inative_ads = $this->common_model->ads_inactive();
		$home['totalvacancy'] = $this->common_model->vacancies_count();
		$home['totalcandidate'] = $this->common_model->candidate_count();
		$home['totalorganization'] = $this->common_model->organization_count();
		$home['allposting'] = $this->common_model->applicable_posting($ins_id);
		$home['latest_news'] = $this->common_model->latest_news();
		$home['alldistrict'] = $this->common_model->get_all_district();
		$home['premiumads'] = $this->common_model->get_premiumads();
		$home['site_visit_count'] = $this->common_model->get_site_visit_count();
	    $this->load->view('index',$home);
	}
	public function featured_job()
	{
		$session_data = $this->session->all_userdata();
		if(isset($session_data['login_session']))
		{
			$categories['search_results'] = $this->common_model->get_search_list();
        $this->load->view('vacancies',$categories);
		}
	    else {
		    redirect('login/seeker');
		}
	}
	public function aboutus()
	{
// 		$this->load->library('pdf');
// $pdf = $this->pdf->load();
// $html=$this->load->view('user_resume',null,true);
// $pdf->WriteHTML($html);

// // write the HTML into the PDF
// $output = 'templated_resume' . date('Y_m_d_H_i_s') . '_.pdf';
// $pdf->Output("$output", 'I');
// $this->load->view('user_resume');
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$this->load->view('aboutus',$data);
	}
	public function contactus()
	{
		$ci =& get_instance();	
		$ci->config->load('email', true);
		$emailsetup = $ci->config->item('email');
		$this->load->library('email', $emailsetup);
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		if($_POST){
			$session_data = $this->session->all_userdata();
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
			$this->form_validation->set_rules('contact_us_name', 'Name', 'trim|required|alpha|xss_clean|min_length[3]|max_length[50]|callback_alpha_dash_space');
			$this->form_validation->set_rules('contact_us_email', 'Email ID', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('contact_us_mobile', 'Mobile', 'trim|required|xss_clean|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('contact_us_subject', 'Subject', 'trim|required|min_length[5]|max_length[100]|xss_clean');
			$this->form_validation->set_rules('contact_us_message', 'Message', 'trim|required|min_length[10]|max_length[700]|xss_clean');
			if ($this->form_validation->run()){
				$contact_us_data = array(
										'feedback_form_title' => $this->input->post('contact_us_subject'),
										'feedback_form_message' => 'Hi, My name is '.$this->input->post('contact_us_name').'. '.$this->input->post('contact_us_subject').' Mobile number: '.$this->input->post('contact_us_mobile').' .Email address: '.$this->input->post('contact_us_email'),
										'is_viewed'=>0,
										'feedback_form_status'=>1
									);
				if($session_data['login_status']=='1'){
					if($session_data['login_session']['user_type']=='provider'){
						$contact_us_data['is_organization']=1;
						$contact_us_data['is_candidate']=0;
						$contact_us_data['is_guest_user']=0;
					}
					else if($session_data['login_session']['user_type']=='seeker') {
						$contact_us_data['is_organization']=0;
						$contact_us_data['is_candidate']=1;
						$contact_us_data['is_guest_user']=0;
					}
				}
				else{
					$contact_us_data['is_organization']=0;
					$contact_us_data['is_candidate']=0;
					$contact_us_data['is_guest_user']=1;
				}
				$data['data_value'] = array(
					'name' => $this->input->post('contact_us_name'),
					'email' =>$this->input->post('contact_us_email'),
					'phone' =>$this->input->post('contact_us_mobile'),
					'subject' =>$this->input->post('contact_us_subject'),
					'Message' => $this->input->post('contact_us_message')
				);
				// print_r($contact_us_data);
				if($this->common_model->guest_user_feedback($contact_us_data)){
					$smtp_user = $emailsetup['smtp_user'];
					$subject = 'Teacher Recruit Contact';
					$message =  $this->load->view('email_template/contact_form', $data, TRUE);	
					// print_r($message);		
					$this->email->initialize($emailsetup);
					$this->email->from($this->input->post('contact_us_email'),'Teacher Recruit');
					$this->email->to($smtp_user);
					$this->email->subject($subject);
					$this->email->message($message);
					/* Check whether mail send or not*/
					$this->email->send();
					$data['contact_server_msg'] = 'Thank you for contact us! Our customer representative contact you soon!!';
					$data['error'] = 2;
					$this->load->view('contactus',$data);
				}
				else{
					$data['contact_server_msg'] = 'Some thing wrong data insertion process! Please try again!!';
					$data['error'] = 1;
					$this->load->view('contactus',$data);
				}
			}
			else{
				$this->load->view('contactus',$data);
			}
		}
		else{
			$this->load->view('contactus',$data);
		}
	}
	//Akila Created
	public function pricing(){
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$data['subcription_plan'] = $this->common_model->subcription_plan();
		$this->load->view('pricing',$data);
	}
	public function faq(){
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$this->load->view('faq',$data);
	}


	public function allinstitutions(){
		$session = $this->session->all_userdata();
		$ins_id = isset($session['login_session']['institution_type']) ? $session['login_session']['institution_type'] : (isset($session['login_session']['candidate_institution_type'])?$session['login_session']['candidate_institution_type']:'');
		// $categories['allinstitutions_results'] = $this->common_model->get_allinstitutions_list();
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
    	// Pagination values
    	$per_page = 20;

    	$offset = ($this->uri->segment(2)) ? ($this->uri->segment(2)-1)*$per_page : 0;
        $results = $this->common_model->get_allinstitutions_list($per_page, $offset,$ins_id);
    	$total_rows = $results['total_rows'];
    	$data["allinstitutions_results"] = $results['allinstitutions_results'];
    	$data["provider_totaljobs"] = $results['provider_totaljobs'];

    	//pagination
		$this->load->library('pagination');

		// Pagination configuration
  		$config['base_url'] = base_url().'allinstitutions';
		$config['per_page'] = $per_page;
		$config['total_rows'] = $total_rows;
		$config['uri_segment'] = 2;
		$config['num_links'] = 4;
		$config['use_page_numbers'] = TRUE;

    	// Custom Configuration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		// Pagination Inititalization
		$this->pagination->initialize($config);

		// Navigation Links
		$pagination_links = $this->pagination->create_links();
		$data["links"] = $pagination_links;
        $this->load->view('all-institutions',$data);
	}

	public function userfollowedcompanies()
	{	
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$data_values = $this->common_model->company_details($this->uri->segment('2'));
		$data['company_details'] = $data_values['company_details'];
		$data['recent_vacancy_details'] = $data_values['recent_vacancy_details'];


		$per_page = 10;

    	$offset = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1)*$per_page : 0;
        $results = $this->common_model->get_vacancy_list($per_page, $offset,$this->uri->segment('2'));
    	$total_rows = $results['total_rows'];
    	$data["vacancy_details"] = $results['vacancy_details'];

    	//pagination
		$this->load->library('pagination');

		// Pagination configuration
  		$config['base_url'] = base_url().'user-followed-companies/'.$this->uri->segment('2');
		$config['per_page'] = $per_page;
		$config['total_rows'] = $total_rows;
		$config['uri_segment'] = 3;
		$config['num_links'] = 4;
		$config['use_page_numbers'] = TRUE;

    	// Custom Configuration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		// Pagination Inititalization
		$this->pagination->initialize($config);

		// Navigation Links
		$pagination_links = $this->pagination->create_links();
		$data["links"] = $pagination_links;

		$params = array('organization_id' => $this->uri->segment('2'));
		$this->load->library('provider_iptracker');
		$this->provider_iptracker->seeker_save_site_visit($params);
		$this->load->view('user-followed-companies',$data);
	}
	public function vacancies()
	{
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$data['applicable_postings'] = $this->common_model->applicable_posting();
		$data['qualifications'] = $this->common_model->qualification();
		$data['institution_values'] = $this->common_model->get_institution_type();

		$search_inputs = array();	
		if($_POST) {
    		$inputs = array(
        				'keyword' => $this->input->post('search_keyword'),
        				'min_amount' => $this->input->post('search_min_amount'),
        				'location' => $this->input->post('search_location'),
        				'max_amount' => $this->input->post('search_max_amount'),
        				'experience' => $this->input->post('search_exp'),
        				'posting' => $this->input->post('search_posting'),
        				'qualification' => $this->input->post('search_qualification'),
        				'institution' => $this->input->post('search_institution'),
        				'candidate_work_type' => $this->input->post('candidate_work_type'),
        				);
    		$this->session->set_userdata('search_inputs',$inputs); // To store search inputs in session
    	}
    	$search_inputs = $this->session->userdata('search_inputs'); // To get search inputs from session

    	// Pagination values
    	$per_page = 20;

    	$offset = ($this->uri->segment(2)) ? ($this->uri->segment(2)-1)*$per_page : 0;
        $search_results = $this->common_model->get_search_results($per_page, $offset,$search_inputs);
    	$total_rows = $search_results['total_rows'];
    	$data['search_inputs'] = $search_inputs;
    	$data['alldistrict'] = $this->common_model->get_all_district();
    	$data["search_results"] = $search_results['search_results'];


    	//pagination
		$this->load->library('pagination');

		// Pagination configuration
  		$config['base_url'] = base_url().'vacancies';
		$config['per_page'] = $per_page;
		$config['total_rows'] = $total_rows;
		$config['uri_segment'] = 2;
		$config['num_links'] = 4;
		$config['use_page_numbers'] = TRUE;

    	// Custom Configuration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		// Pagination Inititalization
		$this->pagination->initialize($config);

		// Navigation Links
		$pagination_links = $this->pagination->create_links();
		$data["links"] = $pagination_links;
		$data['provider_values'] = $this->common_model->get_provider_details();
        $this->load->view('vacancies',$data);
		
	}

	// Added By Siva

	public function informations()
	{
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$this->load->view('information',$data);
	}
	public function terms()
	{
		$data['site_visit_count'] = $this->common_model->get_site_visit_count();
		$this->load->view('terms',$data);
	}	
	// State
	public function state() {
		$data = '';
		if($this->input->post('value')) {
			$data = $this->common_model->get_district_by_state($this->input->post('value'));
		}
		echo json_encode($data);
	}
	// To test email
	public function test_email() {
		$ci =& get_instance();	
		$ci->config->load('email', true);
		$emailsetup = $ci->config->item('email');
		$this->load->library('email', $emailsetup);
		$from_email = $emailsetup['smtp_user'];
		$subject = 'Test email';
		$message =  "Hello welcome! test message";
		$this->email->initialize($emailsetup);
		$this->email->set_newline("\r\n");
		$this->email->from($from_email, 'Teacher Recruit');
		$this->email->to('kalaiarasi@etekchnoservices.com');
		$this->email->subject($subject);
		$this->email->message($message);
		$status = $this->email->send();
		echo $this->email->print_debugger();
		/* Check whether mail send or not*/
		if($status)
			echo "mail sent";
		else
			echo "mail not sent";
	}

	public function qua_pos_by_institution() {
		$data = '';
		$data['qualification'] = array();
		$data['posting'] = array();
		if($this->input->post('value')) {
			$data['qualification'] = $this->common_model->qualification($this->input->post('value'));
			$data['posting'] = $this->common_model->applicable_posting($this->input->post('value'));
		}
		else {
			$data['qualification'] = $this->common_model->qualification();
			$data['posting'] = $this->common_model->applicable_posting();
		}
		echo json_encode($data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */

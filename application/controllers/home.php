<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
    	
        parent::__construct();
        $this->load->library(array('form_validation','session','captcha')); 
		$this->load->model(array('job_provider_model','common_model'));
		$this->load->library("ajax_pagination");
		$this->perPage = 2;
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
	public function index()
	{
	    $categories['job_results'] = $this->common_model->get_job_list();
	    // $categories['count_results'] = $this->common_model->get_count_list();
	    $this->load->view('index',$categories);
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
		$this->load->view('aboutus');
	}
	public function contactus()
	{
		$this->load->view('contactus');
	}
	//Akila Created
	public function pricing(){
		$this->load->view('pricing');
	}
	public function faq(){
		$this->load->view('faq');
	}
	public function allinstitutions(){
		$categories['allinstitutions_results'] = $this->common_model->get_allinstitutions_list();
		$this->load->view('all-institutions',$categories);
	}
	public function vacancies()
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
	public function search_section()
    {
    	$categories['search_results'] = $this->common_model->get_search_list();
        $this->load->view('vacancies',$categories);
    }

    public function search_results() {
    	// Get offset
        $offset = ($this->input->post('page')) ? $this->input->post('page') : 0;
        $search_results = $this->common_model->get_search_results($this->perPage, $offset);
    	$totalRec = $search_results['total_rows'];
    	$data["search_results"] = $search_results['search_results'];
       
        // Pagination Configuration
        $config['target']      = '#searchlist';
        $config['base_url']    = base_url().'search';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        
       //load the view
        $this->load->view('search_result', $data);
  
        
        //load the view
        // $this->load->view('search_result', $data, false);

	}


	public function informations()
	{
		$this->load->view('information');
	}
	public function terms()
	{
		$this->load->view('terms');
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
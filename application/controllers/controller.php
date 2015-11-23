<?php
session_start();
class controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url');
		// $this->load->helper('form');
		// $this->load->library('session');
		// $this->load->library('form_validation');
		$this->load->model('process');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function about()
	{
		$this->load->view('about');
	}
    public function home()
    {
        $this->load->view('home');
    }
	public function login_validate()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) 
		{
			$data['message'] = 'wala Invalid Username and password';
			$this->load->view('login', $data);
		}
		else
		{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);

			$result = $this->process->login($data);
			if ($result)
			{
				// $session_data = array(
				// 'username' => $this->input->post('username'),
				// 'id' => $result['id']
				// );
			
				// $this->session->set_userdata('logged_in', $session_data);
				//$this->load->view('home');
                $this->home();
			}
			else 
			{
				$data['message'] = ' sayupInvalid username'.$result['username'].'and Password';
				$this->load->view('login', $data);
			}
		}
	}

	public function suggest()
	{
		$queryString = $this->input->post("data");
		$query = $this->process->getContacts1($queryString );	
		$data['contacts'] = null;
		if($query)
			$data['contacts'] = $query;
		$this->load->view('results', $data);
	}

	public function contacts()
	{
	   		$this->load->view('contacts');
	}

	public function contactsResult()
	{
			$query = $this->process->getContacts();
			$data['contacts'] = null;
	  		if($query)
	   			$data['contacts'] =  $query;
	 		$this->load->view('results', $data);

	}
    
    /**LOGS**/
    public $perpage = 10;
    public function logs(){
        $this->load->library('pagination');
        $config['full_tag_open'] = '<div class="paging">';
        $config['full_tag_close'] = '</div>';
        
        $where = 'pk_fire != 0';
        $config['base_url'] = base_url() . 'controller/logs';
        $config['total_rows'] = $this->countData('fire_info',$where);
        $config['per_page'] = $this->perpage;
        
        $this->pagination->initialize($config);
        $data = array(
            'paging' => $this->pagination->create_links(),
            'values' => $this->process->select_logs($this->uri->segment(3),$this->perpage),
            'brgy' => $this->process->select_locNS("brgy_name","brgy"),
            'substn' => $this->process->select_locNS("substn_name","substation_info")
        );
        $this->load->view('logs',$data);
    }
    
    public function loclogs(){
        $this->load->library('pagination');
        $Nsearch = $this->input->post('locchoice');
        
        var_dump($Nsearch);die();
        $where = array('location' => $Nsearch);
        $config['full_tag_open'] = '<div class="paging">';
        $config['full_tag_close'] = '</div>';
        $config['base_url'] = base_url() . 'controller/loclogs';
        $config['total_rows'] = $this->countData('location_info',$where);
        $config['per_page'] = $this->perpage;
        
        $this->pagination->initialize($config);
        
        $data = array(
            'paging' => $this->pagination->create_links(),
            'values' => $this->process->filter($where,$this->uri->segment(3),$this->perpage),
            'brgy' => $this->process->select_locNS("brgy_name","brgy"),
            'substn' => $this->process->select_locNS("substn_name","substation_info")
        );
      //  var_dump($data['brgy']);die();
        $this->load->view('logs',$data);
    }
  /*  public function locSlogs(){
        $this->load->library('pagination');
        $Ssearch = $this->input->post('southchoice');
        $where = array('location' => $Ssearch);
        $config['full_tag_open'] = '<div class="paging">';
        $config['full_tag_close'] = '</div>';
        $config['base_url'] = base_url() . 'controller/locSlogs';
        $config['total_rows'] = $this->countData('location_info',$where);
        $config['per_page'] = $this->perpage;
        
        $this->pagination->initialize($config);
        
        $data = array(
            'paging' => $this->pagination->create_links(),
            'values' => $this->process->filter($where,$this->uri->segment(3),$this->perpage),
            'brgy' => $this->process->select_locNS("brgy_name","brgy"),
            'substn' => $this->process->select_locNS("substn_name","substation_info")
        );
        $this->load->view('logs',$data);
    }*/
    
    public function sublogs(){
        $this->load->library('pagination');

        $search = $this->input->post('subchoice');
        $where = array('substn_name' => $search);
        $config['full_tag_open'] = '<div class="paging">';
        $config['full_tag_close'] = '</div>';
        $config['base_url'] = base_url() . 'controller/sublogs';
        $config['total_rows'] = $this->countData('substation_info',$where);
        $config['per_page'] = $this->perpage;
        $this->pagination->initialize($config);
        $data = array(
            'paging' => $this->pagination->create_links(),
            'values' => $this->process->filter($where,$this->uri->segment(3),$this->perpage),
            'brgy' => $this->process->select_locNS("brgy_name","brgy"),
            'substn' => $this->process->select_locNS("substn_name","substation_info")
        );
        $this->load->view('logs',$data);
    }
    
    public function categlogs(){
        $this->load->library('pagination');

        $search = $this->input->post('categchoice');
      //  var_dump($search);die();
        if($search==='1'){
                $where = array('category_type' => 'alpha');
                $session_data =$this->session->set_userdata($where);
        }else if($search==='2'){
                $where = array('category_type' => 'beta');
                $session_data =$this->session->set_userdata($where);
        }
        $where =  array('category_type' => $this->session->userdata('category_type'));
        $config['full_tag_open'] = '<div class="paging">';
        $config['full_tag_close'] = '</div>';
        $config['base_url'] = base_url() . 'controller/categlogs';
        $config['total_rows'] = $this->countData('categ_info',$where);
        $config['per_page'] = $this->perpage;
        
        $this->pagination->initialize($config);
        $data = array(
            'paging' => $this->pagination->create_links(),
            'values' => $this->process->filter($where,$this->uri->segment(3),$this->perpage),
            'brgy' => $this->process->select_locNS("brgy_name","brgy"),
            'substn' => $this->process->select_locNS("substn_name","substation_info")
        );
        $this->load->view('logs',$data);
    }
    
    public function countData($tablename,$where){  
        $count = $this->process->select('*',$tablename, $where);
        if($count !== false) 
        {
            return count($count);
        }
        return 0;
    }
    /**END OF LOGS**/
}
?>
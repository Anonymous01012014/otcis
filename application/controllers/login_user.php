<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_user extends CI_Controller {
	
	/**
	 * login_user variables
	 * 
	 * Description: 
	 * these variables are used as flags in the login page
	 * 
	 * created date: 18-2-2014
	 * ccreated by: Eng. Ahmad Mulhem Barakat
	 * contact: molham225@gmail.com 
	 */
	 //is post back is a flag to tell if the request is 
	 //coming from login function or not. 
	 var $is_post_back = false;
	 
	 
	 /**
	 * Filename: login.php
	 * Description: 
	 * login contoller that login process.
	 * 
	 * created date: 17-2-2014
	 * ccreated by: Eng. Ahmad Mulhem Barakat
	 * contact: molham225@gmail.com 
	 */
	 
	public function index()
	{
		$this->load->library('form_validation');
		//if the user is logged in redirect him to dashboard
		if(!isset($this->session->userdata['user'])){
			$data['is_post_back'] = $this->is_post_back;
			$this->load->view('gen/header');
			$this->load->view('gen/logo');
			$this->load->view('gen/main_content');
			$this->load->view('login',$data);
			$this->load->view('gen/footer');
		}else{
			redirect(base_url()."count");
		}
	}
	
	/**
	 * Function: login.php
	 * Description: 
	 * the actual login process.
	 * 
	 * created date: 17-2-2014
	 * ccreated by: Eng. Ahmad Mulhem Barakat
	 * contact: molham225@gmail.com 
	 */
	 
	public function login()
	{
		//is_post back is true here because the request
		// is being redirected from this page to the login page
		$this->is_post_back = true;
		$data['is_post_back'] = $this->is_post_back;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password','Password','required|trim');
		
		if($this->form_validation->run()){
			redirect(base_url().'count');
		}else{
			$this->load->view('gen/header');
			//$this->load->view('gen/main_menu');
			$this->load->view('gen/logo');
			$this->load->view('gen/main_content');
			$this->load->view('login',$data);
			$this->load->view('gen/footer');
		}
	}
	
	
	/**
	 * Function: validate_credentials
	 * Description: 
	 * check if there is a user with the given username and password.
	 * 
	 * created date: 17-2-2014
	 * ccreated by: Eng. Ahmad Mulhem Barakat
	 * contact: molham225@gmail.com 
	 */
	
	public function validate_credentials()
	{
		//load user model.
		$this->load->model('user_model');
		
		//fill use model with user and password
		$this->user_model->username = $this->input->post('username');
		//$this->user_model->password = hash('sha256', $this->input->post('password'), false); 
		$this->user_model->password = $this->input->post('password'); 
		
		//get the user specified by login info entered
		$user = $this->user_model->getUserByUsernameAndPassword();
		
		//if the user exists
		if(isset($user)){
			if($user['UserID'] !== 0){
				$this->session->set_userdata(array('user'=> $user));
			}
			return true;
		}else{
			$this->form_validation->set_message('validate_credentials','Incorrect username/password.');
			return false;
		}
	}
	
	
	/**
	 * Function name: signout
	 * 
	 * Description: 
	 * This function will destroy user's session and redirects 
	 * him/her to the login page.
	 * 
	 * created date: 22-2-2014
	 * ccreated by: Eng. Ahmad Mulhem Barakat
	 * contact: molham225@gmail.com 
	 */
	 
	public function signout()
	{
		$this->session->sess_destroy();
		redirect(base_url()."login_user");
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */

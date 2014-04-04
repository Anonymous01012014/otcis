<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Filename: user.php
	 * Description: 
	 * user contoller that control the user for example add - edit - delete - manage - ...etc
	 * 
	 * created date: 17-2-2014
	 * created by: Eng. Ahmad Mulhem Barkat
	 * contact: molham225@gmail.com
	 */
	 
	 
	 
	public function index()
	{			
		$this->manage();
	}	
	
	/**
	 * Function name : manage
	 * Description: 
	 * this function calls the case management view. 
	 * 
	 * created date: 17-2-2014
	 * created by: Eng. Ahmad Mulhem Barkat
	 * contact: molham225@gmail.com
	 */
	public function manage()
	{
			$data['user_data'] = $this->session->userdata['user'];;
			//call the general views for page structure	
			$this->load->view('gen/header');
			$this->load->view('gen/main_menu',$data);
			$this->load->view('gen/logo');
			$this->load->view('gen/main_content');
			
			//show manage user view
			$this->load->view('user_manage');
				
			
			$this->load->view('gen/footer');
	}
	
	/**
	 * Function name : __construct
	 * Description: 
	 * this contructor is called as this object is initiated.
	 * 
	 * created date: 18-2-2014
	 * ccreated by: Eng. Mohanad Shab Kaleia
	 * contact: ms.kaleia@gmail.com 
	 */
	public function __construct(){
		parent::__construct();
		//check login state of the user requestin this controller.
		$this->load->helper('is_logged_in');
		checkLogin($this->session->userdata['user']);
	}
	
	/**
	 * Function name : add
	 * Description: 
	 * this function will call user_add view. 
	 * 
	 * created date: 17-2-2014
	 * created by: Eng. Ahmad Mulhem Barkat
	 * contact: molham225@gmail.com
	 */
	public function add()
	{
		
		$data['user_data'] = $this->session->userdata['user'];;
		//call the general views for page structure	
		$this->load->view('gen/header');
		$this->load->view('gen/main_menu',$data);
		$this->load->view('gen/logo');
		$this->load->view('gen/main_content');
		
		//show add user view
		$this->load->view('user_add');
			
		
		$this->load->view('gen/footer');
		
	}
	
	/**
	 * Function name : getUserByUsername
	 * Description: 
	 * this function will call get the site specified by the given name
	 * it's used to check if the site name is unique
	 * 
	 * created date: 1-3-2014
	 * ccreated by: Eng. Ahmad Mulhem Barakat
	 * contact: molham225@gmail.com 
	 */
	public function getUserByUsername()
	{
		$this->load->model('user_model');
		$username = $_GET['username'];
		if(isset($_GET['old_username'])){
			if($username == $_GET['old_username']){
				echo "";
			}else{
				$this->user_model->username = $username;
				$user = $this->user_model->getUserByUsername();
				if(isset($user[0])){
					echo 'true';
				}else{
					echo "";
				}
			}
		}else{
			$this->user_model->username = $username;
			$user = $this->user_model->getUserByUsername();
			if(isset($user[0])){
				echo 'true';
			}else{
				echo "";
			}
		}
	}
	
	
	/**
	 * Function name : end
	 * Description: 
	 * this function will call end user function of the user model. 
	 * 
	 * created date: 19-2-2014
	 * created by: Eng. Ahmad Mulhem Barkat
	 * contact: molham225@gmail.com
	 */
	public function end($user_id)
	{
		
		$this->load->model('user_model');
		if($user_id > 0){
			$this->user_model->id = $user_id;
			$this->user_model->endUser();
		}
		redirect(base_url()."user");		
	}
	
	
	/**
	 * Function name : edit
	 * Description: 
	 * this function will call user_edit view. 
	 * 
	 * created date: 17-2-2014
	 * created by: Eng. Ahmad Mulhem Barkat
	 * contact: molham225@gmail.com
	 */
	public function edit($user_id)
	{
		//load user model.
		$this->load->model('user_model');
		//set user model id to given id.
		$this->user_model->id = $user_id;
		//get the data of the user to be edited
		$users = $this->user_model->getUserById();
		
		$user = $users[0];
		
		if(isset($user)){
			$data['user'] = $user;
			
			$data['user_data'] = $this->session->userdata['user'];;
			//call the general views for page structure	
			$this->load->view('gen/header');
			$this->load->view('gen/main_menu',$data);
			$this->load->view('gen/logo');
			$this->load->view('gen/main_content');
			
			//show edit user view
			$this->load->view('user_edit',$data);
				
			
			$this->load->view('gen/footer');
		}
	}
	
	
	/**
	 * Function name : saveData
	 * Description: 
	 * this function will save the addition form info ot the database.
	 * 
	 * created date: 17-2-2014
	 * ccreated by: Eng. Ahmad Mulhem Barakat
	 * contact: molham225@gmail.com
	 */
	public function saveData($action,$id)
	{		
		// instanciating the model file
		$this->load->model('user_model');
		
		//insert post values into the model
		$this->user_model->first_name = $this->input->post('first_name');
		$this->user_model->middle_name = $this->input->post('middle_name');
		$this->user_model->last_name = $this->input->post('last_name');
		$this->user_model->username = $this->input->post('username');
		$this->user_model->address = $this->input->post('address');
		$this->user_model->phone_number = $this->input->post('phone_number');
		$this->user_model->mobile_number = $this->input->post('mobile_number');
		$this->user_model->type = $this->input->post('type');
		
		if($action == "add"){
			//insert post values into the model 
			if($this->input->post('password') == $this->input->post('re_password')){
				$this->user_model->password =  hash('sha256', $this->input->post('password'), false); 
				//Execute addition function.
				$this->user_model->addUser();
			}
		}elseif($action == "edit" && $id>0){
			
			if(
				trim($this->input->post('re_password').$this->input->post('password')) !== "" &&
			    $this->input->post('password') == $this->input->post('re_password')
			    )
			    {
					$this->user_model->password = hash('sha256', $this->input->post('password'), false); 
			   }
			   $this->user_model->hire_date = $this->input->post('hire_date');
				$this->user_model->id = $id;
				
				//Execute addition function.
				$this->user_model->modifyUser();
			}
		redirect(base_url()."user");
	}
	
	
	/**
	 * Function name : ajaxGetUsers
	 * Description: 
	 * get users' information from database
	 * 
	 * created date: 19-2-2014
	 * ccreated by: Eng. Ahmad Mulhem Barakat
	 * contact: molham225@gmail.com
	 */
	public function ajaxGetUsers()
	{										
		//load user model to get data from it
		$this->load->model('user_model');
		
		//load grid library
		$this->load->library('grid');				
		
		//grid option
		$this->grid->option['title'] = "Users";   //  grid title
		$this->grid->option['id'] = "id";         // database table id
		$this->grid->option['sortable'] = FALSE;  // is sortable
		$this->grid->option['page_size'] = 5;    //records per page
		$this->grid->option['row_number'] = true; //show the row number		
		$this->grid->option['add_button'] = true; //show add button
		$this->grid->option['add_url'] = base_url()."user/add"; //add url
		$this->grid->option['add_title'] = "Add new"; //add title
			
		$this->grid->columns = array('full_name' , 'type' , 'mobile_number' , 'phone_number' , 'hire_date');
		
		//get the data
		
		$this->grid->data = $this->user_model->getAllUsersForGridView();
		
		//grid controls
		$this->grid->control = array(
									  array("title" => "Edit" , "icon"=>"glyphicon glyphicon-pencil" , "url"=>base_url()."user/edit" , "message_type"=>null , "message"=>"") , 
									  array("title" => "End" , "icon"=>"glyphicon glyphicon-trash" ,"url"=>base_url()."user/end" , "message_type"=>"confirm" , "message"=>"Are you sure?")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();
												
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */

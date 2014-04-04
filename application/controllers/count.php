<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Count extends CI_Controller {

	/**
	 * Filename: dashboard.php
	 * Description: 
	 * dashboard contoller control the function of delete
	 * 
	 * created date: 25-3-2014 
	 * ccreated by: Eng. Mohanad Shab Kaleia
	 * contact: ms.kaleia@gmail.com 
	 */
	 
	 
	 
	public function index()
	{		
		$this->manage();
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
	 * Function name : manage
	 * Description: 
	 * show manage page of count
	 * 
	 * created date: 25-3-2014
	 * ccreated by: Eng. Mohanad Shab Kaleia
	 * contact: ms.kaleia@gmail.com 
	 */
	public function manage()
	{
		$this->load->view("gen/header");
		$this->load->view("gen/logo.php");
		$this->load->view("gen/main_content");
		$this->load->view("count_manage");
		$this->load->view("gen/footer");					
	}
	
	/**
	 * function name : ajaxGetSites
	 * 
	 * Description : 
	 * get sites information from database
	 * 
	 * Created date ; 18-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function ajaxGetCounts()
	{												
		//load user model to get data from it
		$this->load->model('count_model');
		
		//load grid library
		$this->load->library('grid');				
		
		//grid option
		$this->grid->option['title'] = "Counts";   //  grid title
		$this->grid->option['id'] = "TempCountID";         // database table id
		$this->grid->option['sortable'] = true;  // is sortable
		$this->grid->option['page_size'] = 10;    //records per page
		$this->grid->option['row_number'] = true; //show the row number		
		$this->grid->option['add_button'] = false; //show add button
		$this->grid->option['add_url'] = base_url()."site/add"; //add url
		$this->grid->option['add_title'] = "Add new"; //add title
			
		$this->grid->columns = array('SiteName' , 'Count' , 'Date' , 'Accepted');
		
		//get the data			
		$counts = $this->count_model->getAllCounts();
		//converting enumeration
		for( $i = 0 ; $i <count($counts) ;  $i++)
		{
			if($counts[$i]["Accepted"] == 1) $counts[$i]["Accepted"] = "true";
			else $counts[$i]["Accepted"] = "false";			
		}
		
		$this->grid->data = $counts;
		//grid controls
		$this->grid->control = array(									  									  
									  array("title" => "Delete" , "icon"=>"glyphicon glyphicon-trash" ,"url"=>base_url()."count/delete" , "message_type"=>"confirm" , "message"=>"Are you sure to delete this count record?")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();
												
	}
	
	
	/**
	 * function name : ajaxSearchSites
	 * 
	 * Description : 
	 * search counts by parameters
	 * 
	 * parameters:
	 * site_name: site name
	 * count_less: 
	 * count_bigger:
	 * date_from:
	 * date_to:
	 * 
	 * Created date ; 29-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Shab Kaleia
	 * contact : ms.kaleia@gmail.com
	 */
	public function ajaxSearchSites()
	{												
		//load user model to get data from it
		$this->load->model('count_model');
		
		//load grid library
		$this->load->library('grid');				
		
		//grid option
		$this->grid->option['title'] = "Counts";   //  grid title
		$this->grid->option['id'] = "TempCountID";         // database table id
		$this->grid->option['sortable'] = true;  // is sortable
		$this->grid->option['page_size'] = 10;    //records per page
		$this->grid->option['row_number'] = true; //show the row number		
		$this->grid->option['add_button'] = false; //show add button
		$this->grid->option['add_url'] = base_url()."site/add"; //add url
		$this->grid->option['add_title'] = "Add new"; //add title
			
		$this->grid->columns = array('SiteName' , 'Count' , 'Date' , 'Accepted');
		
		//get the data		
		$site_name = $this->input->get("site_name")	;
		$count_bigger = $this->input->get("count_bigger")	;
		$count_less = $this->input->get("count_less")	;
		$date_from = $this->input->get("date_from")	;
		$date_to = $this->input->get("date_to")	;
		
		$counts = $this->count_model->searchCount($site_name,
													$count_less,
													$count_bigger,
													$date_from,
													$date_to);
		//converting enumeration
		for( $i = 0 ; $i <count($counts) ;  $i++)
		{
			if($counts[$i]["Accepted"] == 1) $counts[$i]["Accepted"] = "true";
			else $counts[$i]["Accepted"] = "false";			
		}
		
		$this->grid->data = $counts;
		//grid controls
		$this->grid->control = array(									  									  
									  array("title" => "Delete" , "icon"=>"glyphicon glyphicon-trash" ,"url"=>base_url()."count/delete" , "message_type"=>"confirm" , "message"=>"Are you sure to delete this count record?")
									);												
						
		//render our grid :)
		echo $this->grid->gridRender();
												
	}
	
	/**
	 * Function name : delete
	 * Description: 
	 * delete count using its id 
	 * 
	 * parameters:
	 * count_id: count id
	 * created date: 28-3-2014
	 * ccreated by: Eng. Mohanad Shab Kaleia
	 * contact: ms.kaleia@gmail.com 
	 */
	public function delete($id)
	{
		//load count model
		$this->load->model("count_model");
		$this->count_model->TempCountID = $id;
		
		//delete the record
		$this->count_model->delete();	
		
		//redirect to delete page
		$this->manage();		
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

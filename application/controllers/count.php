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
		//load count model
		$this->load->model("count_model");
		$counties = $this->count_model->getAllCounties();				
		
		$data["counties"] = $counties;

		
		$this->load->view("gen/header");
		$this->load->view("gen/logo.php");
		$this->load->view("gen/main_content");
		$this->load->view("count_manage" , $data);
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
			
		$this->grid->columns = array('CountyName' , 'SiteName' , 'Count' , 'Date' , 'Accepted');
		
		//get the data
        $county_fips = $this->input->get("county_fips")	;					
		$site_name = $this->input->get("site_name")	;
		$count_bigger = $this->input->get("count_bigger")	;
		$count_less = $this->input->get("count_less")	;
		$date_from = $this->input->get("date_from")	;
		$date_to = $this->input->get("date_to")	;
		$status = $this->input->get("status")	;
		
		$counts = $this->count_model->searchCount(  $county_fips,
													$site_name,
													$count_less,
													$count_bigger,
													$date_from,
													$date_to,
													$status);
		//converting enumeration
		for( $i = 0 ; $i <count($counts) ;  $i++)
		{
			if($counts[$i]["Accepted"] == 1) $counts[$i]["Accepted"] = "true";
			else $counts[$i]["Accepted"] = "false";			
		}
		
		$this->grid->data = $counts;
		//grid controls
		$this->grid->control = array(									  									  
									  array("title" => "Delete" , "icon"=>"glyphicon glyphicon-trash" ,"url"=>base_url()."count/delete" , "message_type"=>"confirm" , "message"=>"Are you sure you want to delete this count record: #1 from site:#2 in county: #3 on date: #4?" , "message_parameter" => array("Count","SiteName","CountyName" , "Date"))
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
		redirect(base_url()."count");		
	}
	
	
	/**
	 * Function name : generateExcelReport
	 * Description: 
	 * generate excel report
	 * 
	 * parameters:
	 * 
	 * created date: 4-4-2014
	 * ccreated by: Eng. Mohanad Shab Kaleia
	 * contact: ms.kaleia@gmail.com 
	 */
	public function generateExcelReport($extension="excel")
	{
		//get the search parameters
		$county_fips = $this->input->post("county_fips");
		$site_name = $this->input->post("site_name");
		$count_bigger = $this->input->post("count_bigger");
		$count_less = $this->input->post("count_less");
		$date_from = $this->input->post("date_from");
		$date_to = $this->input->post("date_to");
		$status = $this->input->post("status");
		
		//get counts record from the database
		$this->load->model("count_model");
		$count_records = $this->count_model->searchCount($county_fips , $site_name , $count_bigger , $count_less , $date_from , $date_to , $status);
		
		
		
		
		//set header array that will contain header 
		//$header[] = "county";
		$header[] = "CountyName";
		$header[] = "SiteName";
		$header[] = "Count";
		$header[] = "Date";
		$header[] = "Accepted";
		

		
		/** Error reporting */
		error_reporting(E_ALL);
		
		//include the phpExcel classes from third party folder
		$include_path = "./application/third_party/phpexcel/";		
		include $include_path . 'PHPExcel.php';
		include $include_path . 'PHPExcel/Writer/Excel2007.php';
		
		
		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		
		
		// Set properties				
		$objPHPExcel->setActiveSheetIndex(0);
	
		$cell_index = "A";
		
		/** add header and data **/	
		for($i = 0 ; $i < count($header); $i++)
		{				
			//add header data				
			$objPHPExcel->getActiveSheet()->SetCellValue($cell_index."1", $header[$i]);
		
			for($j=0 ; $j<count($count_records) ; $j++)
			{
				$objPHPExcel->getActiveSheet()->SetCellValue($cell_index.($j+2),  $count_records[$j][$header[$i]] );		
			}			
			$cell_index++;					
		}
				
		// Rename sheet		
		$objPHPExcel->getActiveSheet()->setTitle('sheet1');
		
		
		//set the default time zone to be in Oklahoma
		date_default_timezone_set('US/central');
		
		$file_name = "OTCIS-report-".date("[Y-m-d]-[H-i-s]");
		
		if($extension == "excel")
		{
			// Save Excel 2007 file		
			$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);				
			$objWriter->save(str_replace('.php', '.xlsx', __FILE__));										
			rename(__DIR__ . "\\count.xlsx", "files/".$file_name.".xlsx");
		}
		else
		{
			//save csv file
			$objWriter = new PHPExcel_Writer_CSV($objPHPExcel);
			$objWriter->save("report.csv"); 
			$objWriter->save(str_replace('.php', '.csv', __FILE__));			
			rename(__DIR__ . "\\count.csv", "files/".$file_name.".csv");
		}
		
		
		//echo the file name and send it to javascript so it will read it
		echo json_encode($file_name);				
	}
	
	/*
	public function testTimeZone()
	{
		date_default_timezone_set('US/central');
		echo date_default_timezone_get();
		echo "<br/>";
		echo date("Y-m-d : H:i:s");
	}
	*/
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

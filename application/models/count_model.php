<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

/**
 * Class name : Counter
 * 
 * Description :
 * This class contains functions to deal with the counter table (Add , Edit , Delete)
 * 
 * Created date ; 12-2-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */    

class Count_model extends CI_Model{
	/** Counter class variables **/
	
	//The id field of the counter
	var $TempCountID;
	
	//site id 
	var $SiteID = "";
	
	//county FPIS
	var $CountyFIPS = "";
	
	//count
	var $Count = "";
	
	//Date of taking count
	var $Date = "";
	
	//0 or 1 variable 
	var $Accepted = "";
	
	//comment about these count
	var $Comment;
	
	//the id of collector
	var $DataCollectorID;
	
	/**
     * Constructor
     **/	
	function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Class functions
	 **/
    
    
	
	/**
	 * function name : getAllCounts
	 * 
	 * Description : 
	 * Returns the data of all of the counters in the database.
	 * 
	 * Created date : 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gnail.com
	 */
	 public function getAllCounts(){
		$query = "SELECT TempCount.TempCountID , site.SiteName as SiteName , TempCount.count as Count, TempCount.Date as Date, TempCount.Accepted as Accepted
				  FROM TempCount , site
				  where site.SiteID = TempCount.SiteID
				  and
				  (
				  site.SiteID = 5
				  or 
				  site.SiteID = 6
				  )
				  ";
				  
		$query = $this->db->query($query);
		return $query->result_array();
	 }	
	 
	 
	 /**
	 * function name : searchCount
	 * 
	 * Description : 
	 * search for counts
	 * 
	 * parameters:
	 * site_name: site name
	 * count_less: 
	 * count_bigger:
	 * date_from:
	 * date_to:
	 * 
	 * Created date : 29-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gnail.com
	 */
	 public function searchCount($county_FIPS,
								 $site_name,
								 $count_less,
								 $count_bigger,
								 $date_from,
								 $date_to)
	 {
		$query = "SELECT TempCount.TempCountID , county.CountyName , site.SiteName as SiteName , TempCount.count as Count, TempCount.Date as Date, TempCount.Accepted as Accepted
				  FROM TempCount , site , county
				  where 
				  site.SiteID = TempCount.SiteID	
				  and
				  site.FipsCounty = county.CountyFIPS			  
				  ";	  
		if($county_FIPS<>"") $query.=" and site.FipsCounty = '{$county_FIPS}' ";		  
		if($site_name<>"") $query.=" and site.SiteName = '{$site_name}' ";
		if($count_less<>"") $query.=" and TempCount.count < '{$count_less}' ";
		if($count_bigger<>"") $query.=" and TempCount.count > '{$count_bigger}' ";
		if($date_from<>"") $query.=" and TempCount.Date > '{$date_from}' ";
		if($date_to<>"") $query.=" and TempCount.Date < '{$date_to}' ;";
		
		
		 
		if($county_FIPS =="" && $site_name=="" && $count_less=="" && $count_bigger=="" && $date_from=="" && $date_to=="")
		{
			$query="SELECT TempCount.TempCountID , site.SiteName as SiteName , TempCount.count as Count, TempCount.Date as Date, TempCount.Accepted as Accepted
					FROM TempCount , site
					where site.SiteID = 0";
		}
		
				  
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 /**
	 * function name : delete
	 * 
	 * Description : 
	 * Returns the data of all of the counters in the database.
	 * 
	 * Created date : 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gnail.com
	 */
	 public function delete()
	 {
		$query = "delete TempCount
				  where 
				  TempCountID = {$this->TempCountID}
				  ";
				  
		$this->db->query($query);		
	 }
	 
	 /**
	 * function name : getAllCounties
	 * 
	 * Description : 
	 * Returns the data of all of the counties in the database.
	 * 
	 * Created date : 8-4-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gnail.com
	 */
	 public function getAllCounties(){
		$query = "SELECT * from 
				  County				  
						  ";	  
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getAllSites
	 * 
	 * Description : 
	 * Returns the data of all of the sites in the database.
	 * 
	 * Created date : 8-4-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Mohanad Kaleia
	 * contact : ms.kaleia@gnail.com
	 */
	 public function getAllSites(){
		$query = "SELECT * from 
				  site				  
						  ";	  
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
}

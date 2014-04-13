<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

/**
 * Class name : User
 * 
 * Description :
 * This class contains functions to deal with the user table (Add , Edit , Delete)
 * 
 * Created date ; 11-2-2014
 * Modification date : ---
 * Modfication reason : ---
 * Author : Ahmad Mulhem Barakat
 * contact : molham225@gmail.com
 */    

class User_model extends CI_Model{
	/** User class variables **/
	
	//The id field of the user
	var $id;
	
	//The first name of the user
	var $first_name = "";
	
	//The middle name of the user
	var $middle_name = "";
	
	//The last name of the user
	var $last_name = "";
	
	//The login username of the user
	var $username = "";
	
	//The login password of the user encrypted with MD5 hash.
	var $password = "";
	
	//The current address of the user
	var $address = "";
	
	//The current phone number of the user
	var $phone_number = "";
	
	//The current mobile number of the user
	var $mobile_number = "";
	
	//The type of the user (collector or operator)
	var $type = "";
	
	//The date of adding this user to the app
	var $hire_date = "";
	
	//The date of ending this user.once the end date 
	//is determined the user is no longer able to login the app
	var $end_date = "";
	
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
	 * function name : addUser
	 * 
	 * Description : 
	 * add new user to the app
	 * 
	 * parameters:
	 * 	
	 * Created date : 11-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function addUser(){
		$query = "INSERT INTO user(
							first_name,
							middle_name,
							last_name,
							username,
							password,
							address,
							phone_number,
							mobile_number,
							type,
							hire_date
						) 
						VALUES (
							'{$this->first_name}',
							'{$this->middle_name}',
							'{$this->last_name}',
							'{$this->username}',
							'{$this->password}',
							'{$this->address}',
							'{$this->phone_number}',
							'{$this->mobile_number}',
							'{$this->type}',
							CURDATE()
						);
					";
		$this->db->query($query);
		return true;
	 }
	 
	 /**
	 * function name : deleteUser
	 * 
	 * Description : 
	 * delete the user of the given id from the database.
	 * 
	 * Created date : 11-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function deleteUser(){
		$query = "delete from user
	 			  where id = {$this->id}";
		$this->db->query($query);
		return true;
	 }
	 
	 /**
	 * function name : modifyUser
	 * 
	 * Description : 
	 * modify the data of the user of the given id.
	 * 
	 * Created date : 11-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function modifyUser(){
		$query = "UPDATE user
				  SET
					first_name = '{$this->first_name}',
					middle_name = '{$this->middle_name}',
					last_name = '{$this->last_name}',
					username = '{$this->username}',";
		//If the password isn't set right 			
		if(isset($this->password) && $this->password !== ""){
			$query .=	"
					password = '{$this->password}',";
			}
		$query .= "
					address = '{$this->address}',
					phone_number = '{$this->phone_number}',
					mobile_number = '{$this->mobile_number}',
					type = '{$this->type}',
					hire_date = '{$this->hire_date}',
					end_date = '{$this->end_date}'
	 			  WHERE id = {$this->id}";
	 			  echo $query;
		$this->db->query($query);
		return true;
	 }
	 
	 /**
	 * function name : getUserById
	 * 
	 * Description : 
	 * Returns the data of the user specified by the given id.
	 * 
	 * Created date : 11-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getUserById(){
		$query = "SELECT * 
				  FROM user
	 			  WHERE id = {$this->id}";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	
	/**
	 * function name : getUserByUsername
	 * 
	 * Description : 
	 * Returns the data of the user specified by the given username.
	 * 
	 * Created date : 1-3-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getUserByUsername(){
		$query = "SELECT * 
				  FROM user
	 			  WHERE username like '{$this->username}'";
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	
	
	/**
	 * function name : getAllUsers
	 * 
	 * Description : 
	 * Returns the data of all of the users in the database.
	 * 
	 * Created date : 11-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAllUsers(){
		$query = "SELECT * 
				  FROM user";
				  
		$query = $this->db->query($query);
		return $query->result_array();
	 }
	 
	 
	 /**
	 * function name : getAllUsersForGridView
	 * 
	 * Description : 
	 * Returns the data of all of the users in the database and modify them for view.
	 * 
	 * Created date : 19-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getAllUsersForGridView(){
		$query = "SELECT * 
				  FROM user
				  WHERE end_date = '00000000' 
				  ORDER BY id DESC;";
				  
		$query = $this->db->query($query);
		
		$result =$query->result_array();
		for($i=0;$i < count($result);$i++){
			$result[$i]['full_name'] = $result[$i]['first_name'] . ' '.$result[$i]['middle_name']. ' ' .$result[$i]['last_name'];
			switch($result[$i]['type']){
				case 0:
					$result[$i]['type'] = "Admin";
					break;
				case 1:
					$result[$i]['type'] = "Collector";
					break;
			}
		};
		return $result;
	 }
	 
	 
	 /**
	 * function name : checkUser
	 * 
	 * Description : 
	 * Checks if the user of the given id exists in the database.
	 * 
	 * Created date : 11-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function checkUser(){
		$query = "SELECT * 
				  FROM user
				  WHERE id = {$this->id}";
				  
		$query = $this->db->query($query);
		
		if(count($query->result_array()) == 0){
			return false;
		}else{
			return true;
		}
	 }
	 
	 /**
	 * function name : getUserByUsernameAndPassword
	 * 
	 * Description : 
	 * Gets the user whose username 
	 * and password are the same as the given ones.
	 * 
	 * Notes : 
	 * When using this function you should use isset() function
	 * on the returned to know if the user exists or not.
	 * 
	 * Created date : 11-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function getUserByUsernameAndPassword()
	 {
		$query = "SELECT * 
				  FROM [user]
				  WHERE UserName = '{$this->username}'
				  AND Password = '{$this->password}'
				  AND active = '1'
				  and userName = 'admin'			  
				  ";
				  
		$query = $this->db->query($query);
		$users = $query->result_array();
		if(count($users) == 1)
		return $users[0];
	 }
	 
	 /**
	 * function name : endUser
	 * 
	 * Description : 
	 * sets the end date to current for the user of the given id.
	 * 
	 * Created date : 11-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */
	 public function endUser(){
		$query = "UPDATE user
				  SET end_date = CURDATE()
				  WHERE id = {$this->id}";
				  
		$query = $this->db->query($query);
		return true;
	 }
}

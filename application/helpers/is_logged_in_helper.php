<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	function checkLogin($user){
	// if the user is not logged in
	if(!$user){
			redirect(base_url()."login_user");
	}
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Auth logout related operation controller
class Logout extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		//Check if logged in otherwise return
		$this->_return_to_login_auth();
	}

	//Logout function 
	//Session deleted current only
	public function index()
	{
		//Delete session variable
		$this->session->unset_userdata([
			'auth_ID', 'username', 'auth_login'
		]);

		//Destroy session
		//$this->session->sess_destroy();
	
		//Redirect to home
		return redirect(base_url('auth/login'));
	}
}

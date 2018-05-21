<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Check if user not login and redirect to login
		$this->_return_to_login();
	}

	//Logout function 
	//Session deleted current only
	public function index()
	{
		//Delete from user session
		$this->usersess->delete($this->session->userdata('user_token'), $this->_uID());

		//Delete Cookie
		delete_cookie('__mu_login');
		
		//Delete session variable
		$this->session->unset_userdata([
			'user_ID', 'user_token', 'logged_in'
		]);

		//Destroy Session
		//$this->session->sess_destroy();
	
		//Redirect to home
		return redirect(base_url());
	}

	//Ajax used function to logout from every where
	//Session deleted expect current only
	public function every_where()
	{
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			die("Error: Invalid Request !");
		
		$token = $this->session->userdata('user_token');

		$this->usersess->delete_every_where($token, $this->_uID());

		$this->_response([
			'error'	=> false,
			'message' => lang('alert_loggedout_other_side')
		]);
	}
}

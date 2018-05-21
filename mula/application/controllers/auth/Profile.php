<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Auth Dashboard related operation controller
class Profile extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		//Check if logged in otherwise return
		$this->_return_to_login_auth();
	}

	//Main index of dashboard
	public function index()
	{
		$auth = $this->auth->get($this->_aID());

		//Load admin dashboard page
		$this->_load_auth_view('profile/profile', [
			'title' => 'Auth | Profile',
			'auth' => $auth->row()
		]);
	}

	//FUnction to change password
	public function change_password()
	{
		//Check if post method only
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			die("Error: Invalid Request !");

		//Check for form validation
		if( $this->form_validation->run() === FALSE )
		{
			$this->_response([
				'error'	=> true,
				'message' => validation_errors()
			]);
		}

		$curPass = $this->input->post('curpass');
		$newPass = $this->input->post('newpass');

		//Get user data
		$getAuth = $this->auth->get($this->_aID());

		//Check for user is exist
		if( $getAuth->num_rows() == 0 )
			die("Error: Invalid Request !");

		//Check current password match
		if( ! password_verify($curPass, $getAuth->row()->password) )
		{
			$this->_response([
				'error'	=> true,
				'message' => lang('alert_current_pass_not_match')
			]);
		}

		//Check if new is not same as old
		if( password_verify($newPass, $getAuth->row()->password) )
		{
			$this->_response([
				'error'	=> true,
				'message' => lang('alert_new_pass_cant_same')
			]);
		}

		//update password
		$this->auth->update(
			$this->_aID(),
			[
				'password' => $this->_hash_pass($newPass),
				'updated_at' => datetime()
			]
		);

		$this->_response([
			'error'	=> false,
			'message' => lang('alert_password_change_success')
		]);
	}

	//Function to update profile
	public function update_profile()
	{
		//Check if post method only
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			die("Error: Invalid Request !");

		//Check for form validation
		if( $this->form_validation->run('auth_profile') === FALSE )
		{
			$this->_response([
				'error'	=> true,
				'message' => validation_errors()
			]);
		}

		//Get user data
		$getAuth = $this->auth->get($this->_aID());

		//Check for user is exist
		if( $getAuth->num_rows() == 0 )
			die("Error: Invalid Request !");

		//update password
		$this->auth->update($this->_aID(), [
				'full_name'	=> $this->input->post('fname'),
				'username'		=> $this->input->post('username'),
				'phone'			=> $this->input->post('phone'),
				'updated_at'	=> datetime(),
			]);

		$this->_response([
			'error'	=> false,
			'message' => lang('alert_profile_update_success')
		]);
	}
}

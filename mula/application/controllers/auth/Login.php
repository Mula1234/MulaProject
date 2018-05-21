<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Auth Login related operation controller
class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		//Check if user is already logged in
		if( $this->_is_auth_loggedin() )
			return redirect('auth/dashboard');
	}

	/**
	 * login action for this controller.
	 */
	public function index()
	{
		//Check for validations
		if( $this->form_validation->run('auth_login') === FALSE )
		{
			//Load admin login page
			$this->load->view('auth/login');
		}
		else
		{
			//Check for user
			$auth = $this->auth->check(
				$this->input->post('username'),
				$this->input->post('password')
			);

			//Next to url
			$next_url = ( $this->input->post('next') && 
						  $this->input->post('next') !== '' )
						? $this->input->post('next')
						: base_url('auth/dashboard');

			//If not match either username or password
			if( $auth == FALSE )
			{
				$this->_setFlash('danger', 'Invalid login credentials.', 'auth/login');
			}

			//Set session data
			$this->session->set_userdata([
				'auth_ID' => $auth->auth_ID,
				'username' => $auth->username,
				'auth_login' => TRUE,
			]);

			return redirect($next_url);
		}
	}
}

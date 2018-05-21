<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Profile related operation controller
class Settings extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Check if user not login and redirect to login
		$this->_return_to_login();
	}

	public function index()
	{
		$this->_load_user_view('settings/settings', [
									'title' => 'User Settings',
								]);
	}
}

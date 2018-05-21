<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Auth Dashboard related operation controller
class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		//Check if logged in otherwise return
		$this->_return_to_login_auth();
	}

	//Main index of dashboard
	public function index()
	{
		$eth_address = $this->options->get('eth_address');
		$balance = $this->ether->getBalance($eth_address);

		//Load admin dashboard page
		$this->_load_auth_view('dashboard/dashboard', [
			'title' => 'Auth | Dashboard',
			'userCount' => $this->users->count(),
			'eth_address' => $eth_address,
			'eth_balance' => $balance->eth,
			'mut_balance' => $balance->token,
		]);
	}
}

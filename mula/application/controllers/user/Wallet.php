<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Profile related operation controller
class Wallet extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Check if user not login and redirect to login
		$this->_return_to_login();
	}

	public function index()
	{
		$link = $this->users->get_column('referral_link', $this->_uID());

		$eth_addr = $this->address->get($this->_uID(), 'eth');

		$eth_bal = $this->ether->getBalance($eth_addr);

		$this->_load_user_view('wallet/wallet', [
			'title' => 'Wallet',
			'referral_link' => base_url("referral/{$link}"),
			'ethbal' => (double) $eth_bal->eth,
			'tokenbal' => (double) $eth_bal->token,
			'reward' => $this->options->get('referral_amount'),
			'bonous' => $this->referral->get_bonous($this->_uID()),
			'rates' => $this->market->rate()
		]);
	}
}

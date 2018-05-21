<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Auth user wallets related operation controller
class Wallets extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		// Check if logged in otherwise return
		$this->_return_to_login_auth();
	}

	// Show user wallet
	public function user($userID = null)
	{
		// If not a valid id
		if( empty($userID) )
			die('Invalid argument supplied');

		// If not a valid user
		if( ! $this->users->has($userID) )
			die('Invalid user id');

		$link = $this->users->get_column('referral_link', $userID);

		$eth_addr = $this->address->get($userID, 'eth');

		$eth_bal = $this->ether->getBalance($eth_addr);

		$this->_load_auth_view('wallets/wallets', [
			'title' => 'Auth | User Wallet',
			'referral_link' => base_url("referral/{$link}"),
			'ethaddress' => $eth_addr,
			'ethbal' => $eth_bal->eth,
			'userID' => $userID,
			'tokenbal' => $eth_bal->token,
			'reward' => $this->options->get('referral_amount'),
			'bonous' => $this->referral->get_bonous($userID),
			'rates' => $this->market->rate()
		]);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Auth setting related operation controller
class Settings extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		//Check if logged in otherwise return
		$this->_return_to_login_auth();
	}

	//Setting main page
	public function index()
	{
		$this->_load_auth_view('settings/settings', [
			'title' => 'Auth | Settings',
			'rewardToken' => $this->options->get('referral_amount'),
			'contractTerms' => $this->options->get('contract_terms')
		]);
	}

	//AJAX based
	//Set amount
	public function set_referral_reward()
	{
		//If not post method
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			return;

		//Get reward amount
		$reward = $this->input->post('reward');

		//Check for proper validation
		if( empty($reward) OR ! is_numeric($reward) )
		{
			return $this->_response([
				'error' => true,
				'message' => 'Please enter valid reward token amount.'
			]);
		}

		//update token reward for referral
		$this->options->update('referral_amount', $reward);

		//Return response
		return $this->_response([
			'error' => false,
			'message' => 'Referral Rewardz Token Amount Updated.'
		]);
	}

	//AJAX based
	//Update contact terms
	public function contract_terms_update()
	{
		//If not post method
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			return;

		//Get reward amount
		$terms = $this->input->post('terms');

		//Check for proper validation
		if( empty($terms) )
		{
			return $this->_response([
				'error' => true,
				'message' => 'Please enter terms.'
			]);
		}

		//update token reward for referral
		$this->options->update('contract_terms', $terms);

		//Return response
		return $this->_response([
			'error' => false,
			'message' => 'Contact Terms and Conditions Updated.'
		]);
	}
}

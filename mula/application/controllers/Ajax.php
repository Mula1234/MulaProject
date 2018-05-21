<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @controller Ajax
 *
 * For ajax operation
 */
class Ajax extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	// Ajax get balance from address
	public function balance($address = null)
	{
		$balance = $this->ether->getBalance($address);
		$this->_response($balance);
	}

	//Function to get asset signed contract
	public function get_signed_contract()
	{
		// If not request method is post
		if( $this->input->server('REQUEST_METHOD') !== "POST" )
			die("Error: Invalid Request !");

		$assetID = $this->input->post("assetID");

		// Check for asset valid id
		if( empty($assetID) )
		{
			$this->_response([
            	'error'	=> true,
            	'message' => 'Sorry ! invalid request'
            ]);
		}

		// Get asset data
		$assetData = $this->assets->get_by_id($assetID);

		// Check asset data
		if( ! $assetData->num_rows() )
		{
			$this->_response([
				'error'	=> true,
				'message' => 'Sorry ! invalid request'
			]);
		}

		// load ajax view
		$html = $this->load->view('user/ajax/signed_contract', [
			'assetData' => $assetData->row(),
			'contractTerms' => $this->options->get('contract_terms')
		], true);

		$this->_response([
			'error' => false,
			'html' => $html,
		]);
	}
}

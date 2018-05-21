<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @controller Transfer
 *
 * For transfer eth mula
 */
class Transfer extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	// Function transfer ether to any address
	public function ether()
	{
		// Check if method is post only
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
		{
			$this->_response([
				'error' => true,
				'message' => 'Sorry ! invalid request method.'
			]);
		}

		// Get required params
		$ether = $this->input->post('_ether');
		$to = $this->input->post('_to');

		// Get initiator of exchange
		$init = $this->input->post('_init');

		// Check for all required field
		if( empty($ether) OR empty($to) OR empty($init) )
		{
			$this->_response([
				'error' => true,
				'message' => 'You must enter both ether and address to transfer.'
			]);
		}
		
		// Key address of initiator
		$key = ( $init == 'user' ) 
				? $this->address->get_private_key($this->_uID()) 
				: $this->options->get('eth_private');

		// Get user id of initiator
		$userID = ( $init == 'user' ) ? $this->_uID() : $this->_aID();


		// If ether value is less than
		if( $ether < MIN_ETHER_TO_TX )
		{
			$this->_response([
				'error' => true,
				'message' => 'You must transfer at least '.MIN_ETHER_TO_TX.' ether.'
			]);
		}

		// Begin to send ether
		$response = $this->ether->doTransferEth($key, $to, $ether);

		// If error while transfer
		if( isset($response->code) )
		{
			$obj = json_decode($response->responseText);

			$this->_response([
				'error' => true,
				'message' => $obj->error->message
			]);
		}

		// Add transaction
		$this->transac->add([
			'user_ID' => $userID,
			'by' => $init,
			'from' => $response->from,
			'to' => $response->to,
			'amount' => $ether,
			'tx_hash' => $response->hash,
			'type' => 'eth',
			'created_at' => datetime(),
			'created_ip' => userip()
		]);

		$this->_response([
			'error' => false,
			'message' => 'Ether transfered successfully'
		]);
	}

	// Function transfer mula to any address
	public function mula()
	{
		// Check if method is post only
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
		{
			$this->_response([
				'error' => true,
				'message' => 'Sorry ! invalid request method.'
			]);
		}

		// Get required params
		$token = $this->input->post('_token');
		$to = $this->input->post('_to');

		// Get initiator of exchange
		$init = $this->input->post('_init');

		// Check for all required field
		if( empty($token) OR empty($to) OR empty($init) )
		{
			$this->_response([
				'error' => true,
				'message' => 'You must enter both token and address to transfer.'
			]);
		}

		// Key address of initiator
		$key = ( $init == 'user' ) 
				? $this->address->get_private_key($this->_uID()) 
				: $this->options->get('eth_private');

		// Get user id of initiator
		$userID = ( $init == 'user' ) ? $this->_uID() : $this->_aID();

		// If token value is less than
		if( $token < MIN_TOKEN_TO_TX )
		{
			$this->_response([
				'error' => true,
				'message' => 'You must transfer at least '.MIN_TOKEN_TO_TX.' token.'
			]);
		}

		// Begin to send ether
		$response = $this->ether->doTransferMut($key, $to, $token);

		// If error while transfer
		if( isset($response->code) )
		{
			$obj = json_decode($response->responseText);

			$this->_response([
				'error' => true,
				'message' => $obj->error->message
			]);
		}

		// Add transaction
		$this->transac->add([
			'user_ID' => $userID,
			'by' => $init,
			'from' => $response->from,
			'to' => $to,
			'amount' => $token,
			'tx_hash' => $response->hash,
			'type' => 'mut',
			'created_at' => datetime(),
			'created_ip' => userip()
		]);

		$this->_response([
			'error' => false,
			'message' => 'Your tokens transfered successfully'
		]);
	}
}

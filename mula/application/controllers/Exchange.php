<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @controller Transaction
 *
 * For transaction eth mula
 */
class Exchange extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function ethtomula()
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

		// Check for all required field
		if( empty($ether) )
		{
			$this->_response([
				'error' => true,
				'message' => 'You must enter ether to exchange.'
			]);
		}
		
		// Key address
		$key = $this->address->get_private_key($this->_uID());

		// Get user id
		$userID = $this->_uID();

		// If ether value is less than
		if( $ether < MIN_ETH_TO_EXCHNG )
		{
			$this->_response([
				'error' => true,
				'message' => 'Mininum ether to exchange is '.MIN_ETH_TO_EXCHNG.'.'
			]);
		}

		//Begin to send ether
		$response = $this->ether->doTransferEth($key, CONTRACT_ADDR, $ether);

		//If error while transfer
		if( isset($response->code) )
		{
			$obj = json_decode($response->responseText);

			$this->_response([
				'error' => true,
				'message' => $obj->error->message
			]);
		}

		//Add transaction
		$this->transac->add([
			'user_ID' => $userID,
			'by' => 'user',
			'from' => $response->from,
			'to' => $response->to,
			'amount' => $ether,
			'tx_hash' => $response->hash,
			'type' => 'eth-mut',
			'created_at' => datetime(),
			'created_ip' => userip()
		]);

		$this->_response([
			'error' => false,
			'message' => 'Ether to token exchanged successfully.'
		]);
	}

	public function mulatoeth()
	{
		// Check if method is post only
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
		{
			$this->_response([
				'error' => true,
				'message' => 'Sorry ! invalid request method'
			]);
		}

		//get required params
		$token = $this->input->post('_token');

		//User id
		$userID = $this->_uID();

		// If initiator is user
		if( empty($token) )
		{
			$this->_response([
				'error' => true,
				'message' => 'Please enter token to exchange.'
			]);
		}

		// If token value is less than
		if( $token < MIN_MUT_TO_EXCHNG )
		{
			$this->_response([
				'error' => true,
				'message' => 'Mininum mut token to exchange is '.MIN_MUT_TO_EXCHNG.'.'
			]);
		}

		// Key address of initiator
		$key = $this->address->get_private_key($userID);

		//Begin to send mula
		$response = $this->ether->doTransferMut(
						$key, 
						$this->options->get('eth_address'), 
						$token
					);

		//If error while transfer
		if( isset($response->code) )
		{
			$obj = json_decode($response->responseText);

			$this->_response([
				'error' => true,
				'message' => $obj->error->message
			]);
		}

		//Add transaction
		$isTx = $this->transac->add([
			'user_ID' => $userID,
			'by' => 'user',
			'from' => $response->from,
			'to' => $response->to,
			'amount' => $token,
			'tx_hash' => $response->hash,
			'type' => 'mut-eth',
			'created_at' => datetime(),
			'created_ip' => userip()
		]);

		if( ! $isTx )
		{
			//Response
			$this->_response([
				'error' => false,
				'message' => 'There is problem while exchange.'
			]);
		}

		//Convert mula token to eth
		$ethTx = $token * TVALETH;

		//Get user address
		$userEthAddr = $this->address->get($userID, 'eth');

		//Begin to send eth
		$responseE = $this->ether->doTransferEth(
						$this->options->get('eth_private'), 
						$userEthAddr, 
						$ethTx
					);

		//If error while transfer
		if( isset($responseE->code) )
		{
			$obj = json_decode($response->responseText);

			$this->_response([
				'error' => true,
				'message' =>  $obj->error->message
			]);
		}

		//Add transaction
		$isEx = $this->transac->add([
			'user_ID' => $userID,
			'by' => 'auth',
			'from' => $responseE->from,
			'to' => $responseE->to,
			'amount' => $ethTx,
			'tx_hash' => $responseE->hash,
			'type' => 'mut-eth',
			'created_at' => datetime(),
			'created_ip' => userip()
		]);

		//Response
		$this->_response([
			'error' => false,
			'message' => 'Token to ether exchanged successfully.'
		]);
	}
}

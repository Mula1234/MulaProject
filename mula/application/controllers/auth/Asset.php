<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Auth asset related operation controller
class Asset extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		//Check if logged in otherwise return
		$this->_return_to_login_auth();
	}

	//Index page function
	public function index($offset = 0)
	{
		$this->load->library('pagination');

		$config = [
			'base_url' => base_url('auth/asset/list'),
			'per_page' => 10,
			'total_rows' => $this->assets->count_all(),
			'full_tag_open' => '<ul class="pagination">',
			'full_tag_close' => '</ul>',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			'num_tag_open' => '<li>',
			'num_tag_close' => '</li>',
			'cur_tag_open' => '<li class="active"><a href="#">',
			'cur_tag_close' => '</a></li>',
		];

		$this->pagination->initialize($config);

		//Load admin asset page
		$this->_load_auth_view('asset/asset', [
			'title' => 'Auth | Asset',
			'assets' => $this->assets->get_all($config['per_page'], $offset),
			'pagination' => $this->pagination->create_links()
		]);
	}

	//Function call to popup
	public function call_popup()
	{
		//If not post method then
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			die('Invalid request !');

		$assetID = $this->input->post('assetID');
		$callTo = $this->input->post('callTo');

		//If empty asset id
		if( empty($assetID) OR empty($callTo) )
			die('Invalid asset !');

		//Cases for popup
		switch ($callTo)
		{
			case 'approve':

				// Get market rates of ether
				$marketRateEth = $this->market->rate();

				// Get asset data
				$assetData = $this->assets->get_by_id($assetID);

				// Get market value of asset
				$marketVal = $assetData->row()->market_value;

				// Total token value by asset value
				$totalTokenAmount = $marketVal / ($marketRateEth['eth'] * TVALETH);

				// 80 percent of token value
				$sendTokenAmount = ($totalTokenAmount * 80) / 100;

				return $this->load->view('auth/ajax/asset_approve', [
					'assetID' => $assetID,
					'marketValue' => $marketVal,
					'userAddress' => $this->address->get($assetData->row()->user_ID, 'eth'),
					'tokenAmount' => round($sendTokenAmount)
				]);
				break;
			
			case 'reject':
				return $this->load->view('auth/ajax/asset_reject', ['assetID' => $assetID]);
				break;
		}
	}

	//Function to reject asset
	public function reject()
	{
		if( $this->form_validation->run('asset_reject') === FALSE )
		{
			$this->_setFlash(
				'danger',
				validation_errors(),
				'auth/asset'
			);
		}
		else
		{
			$assetID = $this->input->post('assetID');
			$comment = $this->input->post('rejectComment');

			//Set status
			$this->assets->do_reject($assetID, $comment);

			$this->_setFlash(
				'info',
				'Asset was rejected successfully',
				'auth/asset'
			);
		}
	}

	//Function to approve asset tokenization
	public function approve()
	{
		if( $this->form_validation->run('asset_approve') === FALSE )
		{
			$this->_setFlash(
				'danger',
				validation_errors(),
				'auth/asset'
			);
		}
		else
		{
			$assetID = $this->input->post('assetID');
			$comment = $this->input->post('approveComment');
			$token = $this->input->post('tokenAmount');
			$address = $this->input->post('userAddress');

			//Check for valid address
			if( ! $this->_isAddress($address) )
			{
				//Set flash
				$this->_setFlash(
					'info',
					'Address is not valid.',
					'auth/asset'
				);
			}

			//Begin to send token
			$key = $this->options->get('eth_private');

			//Begin to send ether
			$response = $this->ether->doTransferMut($key, $address, $token);


			//If error while transfer
			if( isset($response->code) )
			{
				//Set flash
				$this->_setFlash(
					'info',
					'Unable to approve and transfer token.',
					'auth/asset'
				);
			}

			//Add transaction
			$this->transac->add([
				'user_ID' => $this->_aID(),
				'by' => 'auth',
				'from' => $response->from,
				'to' => $address,
				'amount' => $token,
				'tx_hash' => $response->hash,
				'type' => 'mut',
				'created_at' => datetime(),
				'created_ip' => userip()
			]);

			//Set status
			$this->assets->do_approve($assetID, $comment, $token);

			//Set flash
			$this->_setFlash(
				'info',
				'Asset was approved successfully',
				'auth/asset'
			);
		}
	}
}

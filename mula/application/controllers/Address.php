<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @controller Address
 *
 * Get address of the user
 */
class Address extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @get page
	 * 
	 * Get user address
	 */
	public function get()
	{
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
		{
			$this->_response([
				'error' => true,
				'message' => 'Sorry invalid request method.'
			]);
		}

		$type = $this->input->post('type');
		$userID = ($this->input->post('id') && $this->input->post('id') != "") 
					? $this->input->post('id')
					: $this->_uID();

		if( $type != 'eth' && $type != 'btc' )
		{
			$this->_response([
				'error' => true,
				'message' => 'Sorry invalid request'
			]);
		}

		$head = ($type == 'btc') ? 'BTC Address' : 'ETH and '.TSYMBOL.' Address';

		$html = $this->load->view('user/ajax/addresses', [
			'address' => $this->address->get($userID, $type),
			'head' => $head
		], true);

		$this->_response([
			'error' => false,
			'html' => $html,
		]);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User mail send library
class Ether {

	private $CI,
			$Api;

	public function __construct()
	{
		$this->CI = & get_instance();
		$this->Api = 'http://localhost:3000';
		$this->CI->load->model('tables/address_model', 'address');
	}

	//Function to create a new ether wallet address
	public function createAddress($userID)
	{
		$address = $this->_callApi('/create');

		if( $address !== FALSE )
		{
			$this->CI->address->add([
				'user_ID' => $userID,
				'type' => 'eth',
				'address' => $address->address,
				'address_data' => json_encode($address),
				'created_at' => datetime(),
				'created_ip' => userip(),
			]);

			return TRUE;
		}

		return FALSE;
	}

	//Function to get balance
	//Using ether address of user
	//@return object
	public function getBalance($addr)
	{
		return $this->_callApi("/balance/{$addr}");
	}

	//Function to transfer token from address to address
	//Using ether address of user
	//@return object
	public function doTransferMut($key, $to, $val)
	{
		return $this->_callApi("/muttx/{$key}/{$to}/{$val}");
	}

	//Function to transfer token from main address
	//Using ether address of user
	//@return object
	public function doTransferEth($key, $addr, $amount)
	{
		return $this->_callApi("/ethtx/{$key}/{$addr}/{$amount}");
	}

	//Function call api using curl
	private function _callApi($url, $data = [])
	{
		$curl = curl_init($this->Api . $url);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($curl, CURLOPT_POST, true);
		//curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

		$curl_response = curl_exec($curl);

		if ($curl_response === false)
		{
		    $info = curl_getinfo($curl);
		    curl_close($curl);

		    return FALSE;
		}

		curl_close($curl);

		return json_decode($curl_response);
	}
}

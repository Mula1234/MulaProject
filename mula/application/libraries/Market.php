<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Market api library
class Market {

	//Function to get eth and btc market rate
	public function rate()
	{
		//Get api response
		$response =  @file_get_contents("https://api.coinmarketcap.com/v1/ticker/?start=0&limit=2");

		$data = json_decode($response);

		//Return prices
		return [
			'btc' => $data[0]->price_usd,
			'eth' => $data[1]->price_usd,
			'btc_eth' => $data[1]->price_btc
		];
	}
}

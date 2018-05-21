<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Profile related operation controller
class History extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Check if user not login and redirect to login
		$this->_return_to_login();
	}

	//Show history list of transactions
	public function index($offset = 0)
	{
		//Get user ether address
		$userAdd = $this->address->get($this->_uID(), 'eth');

		//Get user transactions
		$userTx = $this->transac->get(
					$this->_uID(),
					$userAdd,
					10,
					$offset
				);

		//Pagination
		$this->load->library('pagination');

		//Pagination config
		$config = [
			'base_url' => base_url('user/history/list'),
			'per_page' => 10,
			'total_rows' => $this->transac->count($this->_uID(), $userAdd),
			'full_tag_open' => '<ul class="pagination">',
			'full_tag_close' => '</ul>',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			'num_tag_open' => '<li>',
			'num_tag_close' => '</li>',
			'first_tag_open' => '<li>',
			'first_tag_close' => '</li>',
			'last_tag_open' => '<li>',
			'last_tag_close' => '</li>',
			'cur_tag_open' => '<li class="active"><a href="#">',
			'cur_tag_close' => '</a></li>',
		];

		//Initialize pagination
		$this->pagination->initialize($config);

		//Load view
		$this->_load_user_view(
					'history/history', [
						'title' => 'Transaction History',
						'history' => $userTx,
						'address' => $userAdd,
						'pagination' => $this->pagination->create_links()
				]);
	}
}

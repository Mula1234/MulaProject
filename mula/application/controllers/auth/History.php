<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Auth History related operation controller
class History extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		//Check if logged in otherwise return
		$this->_return_to_login_auth();
	}

	//History index
	public function index($offset = 0)
	{
		//Get user transactions
		$allTx = $this->transac->get_all(10, $offset);

		//Pagination
		$this->load->library('pagination');

		//Pagination config
		$config = [
			'base_url' => base_url('auth/history/list/'),
			'per_page' => 10,
			'total_rows' => $this->transac->count_all(),
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
			'cur_tag_close' => '</a></li>'
		];

		//Initialize pagination
		$this->pagination->initialize($config);

		//Load view
		$this->_load_auth_view(
					'history/history', [
						'title' => 'Auth | All History',
						'history' => $allTx,
						'authAddr' => $this->options->get('eth_address'),
						'pagination' => $this->pagination->create_links()
				]);
	}

	//User history
	public function user($userID = null, $offset = 0)
	{
		// If not a valid id
		if( empty($userID) )
			die('Invalid argument supplied');

		// If not a valid user
		if( ! $this->users->has($userID) )
			die('Invalid user id');

		//Get user ether address
		$userAdd = $this->address->get($userID, 'eth');

		//Get user transactions
		$userTx = $this->transac->get(
					$userID,
					$userAdd,
					10,
					$offset
				);

		//Pagination
		$this->load->library('pagination');

		//Pagination config
		$config = [
			'base_url' => base_url("auth/history/user/{$userID}"),
			'per_page' => 10,
			'total_rows' => $this->transac->count($userID, $userAdd),
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
		$this->_load_auth_view(
					'history/history', [
						'title' => 'Auth | User History',
						'history' => $userTx,
						'address' => $userAdd,
						'pagination' => $this->pagination->create_links()
				]);
	}
}

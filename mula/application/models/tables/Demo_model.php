<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Account related operation model
class Demo_model extends MY_Model {

	//@var for table name
	private $table;

	public function __construct()
	{
		parent::__construct();
		//Set table name
		$this->table = 'demo';
	}

	//FUnction to get user profile
	public function get($address)
	{
		return 	$this->db
					 ->where('token_benef', $address)
					 ->get($this->table);
	}

	//Function to add demo
	public function add(Array $data)
	{
		$this->db
			 ->insert($this->table, $data);

		return $this->db->insert_id();
	}
}	

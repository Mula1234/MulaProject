<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Account related operation model
class Testbal_model extends MY_Model {

	//@var for table name
	private $table;

	public function __construct()
	{
		parent::__construct();
		//Set table name
		$this->table = 'test_balances';
	}

	//FUnction to get user profile
	public function get($address)
	{
		return 	$this->db
					 ->where('address', $address)
					 ->get($this->table);
	}

	//Function to add demo
	public function add(Array $data)
	{
		$this->db
			 ->insert($this->table, $data);

		return $this->db->insert_id();
	}

	// Function to update balance
	public function add_bal($address, $bal, $for)
	{
		$this->db
			 ->where('address', $address)
			 ->update($this->table, [$for => $bal]);

		return $this->db->affected_rows();
	}

	// FUnction to get balance
	public function get_balance($address, $type)
	{
		$q = $this->db
			 	  ->where('address', $address)
			 	  ->limit(1)
			 	  ->get($this->table);

		if( $q->num_rows() )
			return $q->row()->$type;

		return FALSE;
	}
}	

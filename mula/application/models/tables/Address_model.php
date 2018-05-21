<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Account related operation model
class Address_model extends MY_Model {

	//@var for table name
	private $table;

	public function __construct()
	{
		parent::__construct();
		//Set table name
		$this->table = 'address';
	}

	//Function to get address
	public function get($userID, $type)
	{
		$q = $this->db
				  ->where([
				  	'user_ID' => $userID,
				  	'type' => $type
				  ])
				  ->limit(1)
				  ->get($this->table);

		if( $q->num_rows() )
			return $q->row()->address;

		return 0;
	}

	//Add address data in table
	public function add($data)
	{
		$this->db
			 ->insert($this->table, $data);

		return $this->db->insert_id();
	}

	//Get user private key
	public function get_private_key($userID, $type = 'eth')
	{
		$q = $this->db
				  ->where(['user_ID' => $userID, 'type' => $type])
				  ->limit(1)
				  ->get($this->table);

		if( $q->num_rows() )
		{
			$data = json_decode($q->row()->address_data);
			return ($type == 'eth') ? $data->privateKey : $data->private_key;
		}

		return '';
	}
}

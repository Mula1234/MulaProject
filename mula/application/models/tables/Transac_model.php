<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Account related operation model
class Transac_model extends MY_Model {

	//@var for table name
	private $table;

	public function __construct()
	{
		parent::__construct();
		//Set table name
		$this->table = 'transactions';
	}

	//Function to get all history
	public function get_all($limit, $offset)
	{
		return $this->db
					->limit($limit, $offset)
					->order_by('created_at', 'DESC')
					->get($this->table);
	}

	//Function to get user profile
	public function get($userID, $addr, $limit, $offset)
	{
		return $this->db
					->where(['user_ID' => $userID, 'by !=' => 'auth'])
					->or_where('to', $addr)
					->limit($limit, $offset)
					->order_by('created_at', 'DESC')
					->get($this->table);
	}

	//Function to count assets
	public function add($data)
	{
		$this->db
			 ->insert($this->table, $data);

		return $this->db->insert_id();
	}

	//Function to count all
	public function count_all()
	{
		return $this->db
					->count_all_results($this->table);
	}

	//Function to count
	public function count($userID, $addr)
	{
		return $this->db
					->where(['user_ID' => $userID, 'by !=' => 'auth'])	
					->or_where('to', $addr)
					->count_all_results($this->table);
	}
}

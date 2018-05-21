<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Account related operation model
class Assets_model extends MY_Model {

	//@var for table name
	private $table;

	public function __construct()
	{
		parent::__construct();
		//Set table name
		$this->table = 'assets';
		$this->table_user = 'users';
	}

	//FUnction to get user profile
	public function get_all($limit, $offset)
	{
		return 	$this->db
					 ->select('t1.*, t2.first_name')
					 ->from("{$this->table} as t1")
					 ->join("{$this->table_user} as t2", 't1.user_ID = t2.user_ID', 'LEFT')
					 ->get();
	}

	//FUnction to get user profile
	public function get_by_id($assetsID)
	{
		return $this->db
					->where('asset_ID', $assetsID)
					->limit(1)
					->get($this->table);
	}

	//FUnction to get user profile
	public function get_by_user($userID, $limit, $offset)
	{
		return $this->db
					->where('user_ID', $userID)
					->limit($limit, $offset)
					->order_by('created_at', 'DESC')
					->get($this->table);
	}

	//Function to count assets
	public function count_all()
	{
		return $this->db
					->count_all_results($this->table);
	}


	//FUnction to get user asssets count
	public function count_by_user($userID)
	{
		return $this->db
					->where('user_ID', $userID)
					->count_all_results($this->table);
	}

	//Function to add assets
	public function add(Array $data)
	{
		$this->db
			 ->insert($this->table, $data);

		return $this->db->insert_id();
	}

	//reject asset request
	public function do_reject($assetID, $comment)
	{
		$this->db
			 ->where('asset_ID', $assetID)
			 ->update($this->table, [
			 	'status' => 2,
			 	'auth_comment' => $comment
			 ]);

		return $this->db->affected_rows();
	}

	//Function to approve 
	public function do_approve($assetID, $comment, $token)
	{
		$this->db
			 ->where('asset_ID', $assetID)
			 ->update($this->table, [
			 	'status' => 1,
			 	'auth_comment' => $comment,
			 	'approved_amount' => $token
			 ]);

		return $this->db->affected_rows();
	}
}	

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Account related operation model
class Auth_model extends MY_Model {

	//@var for table name
	private $table;

	public function __construct()
	{
		parent::__construct();
		//Set table name
		$this->table = 'auth';
	}



	//FUnction to get user profile
	public function get($authID)
	{
		return $this->db
					->where('auth_ID', $authID)
					->limit(1)
					->get($this->table);
	}

	//Function to update user
	public function update($authID, $data)
	{
		$this->db
			 ->where('auth_ID', $authID)
			 ->update($this->table, $data);

		return $this->db->affected_rows();
	}

	//Check for admin details
	public function check($username, $password)
	{
		$q = $this->db
				  ->select(['auth_ID', 'username', 'password'])
				  ->where('username', $username)
				  ->limit(1)
				  ->get($this->table);

		//If no username match
		if( $q->num_rows() == 0 )
			return FALSE;

		//If password match
		if( password_verify($password, $q->row()->password) )
			return $q->row();

		//Otherwise return
		return FALSE;
	}

	//Function to update password
	public function update_pass($pass, $userID)
	{
		return $this->db
					->where('auth_ID', $userID)
					->update($this->table, ['password' => $pass]);

		return $this->db->affected_rows();
	}

	//function to get user table column
	public function get_column($col, $userID)
	{
		$q = $this->db
				  ->select($col)
				  ->where('auth_ID', $userID)
				  ->get($this->table);

		if( $q->num_rows() )
			return $q->row()->$col;
	}
}

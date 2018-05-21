<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Account related operation model
class Usersess_model extends MY_Model {

	//@var for table name
	private $table;

	public function __construct()
	{
		parent::__construct();
		//Set table name
		$this->table = 'sessions';
	}

	//Check if there is a token exist or not
	public function has_token($token)
	{
		$q = $this->db
				  ->where('token', $token)
				  ->limit(1)
				  ->get($this->table);

		if( $q->num_rows() )
			return TRUE;

		return FALSE;
	}


	//Get user token details
	public function get($token)
	{
		$q = $this->db
				  ->where('token', $token)
				  ->limit(1)
				  ->get($this->table);

		if( $q->num_rows() )
			return $q->row();

		return FALSE;
	}

	//Function to set user session 
	public function set_session($user, $token)
	{
		$this->db
			 ->insert($this->table, [
			 	'user_ID'	=> $user,
			 	'token'		=> $token,
			 	'created_at'=> datetime(),
			 	'updated_at'=> datetime(),
			 	'created_ip'=> userip()
			 ]);

		return $this->db->affected_rows();
	}

	//Function to update session
	public function update_session()
	{
		$this->db
			 ->where([
			 	'user_ID'	=> $this->session->userdata(''),
			 	'token'		=> $this->session->userdata('')
			 ])
			 ->update($this->table, [
			 	'updated_at'=> datetime(),
			 ]);

		return $this->db->affected_rows();
	}

	//FUnction to delete sessions expect current
	//logout from every where
	public function delete_every_where($token, $userID)
	{
		$this->db
			 ->where([
			 	'user_ID'	=> $userID,
			 	'token !='	=> $token
			 ])
			 ->delete($this->table);

		return $this->db->affected_rows();
	}

	//FUnction to delete logout session
	public function delete($token, $userID)
	{
		$this->db
			 ->where([
			 	'user_ID'	=> $userID,
			 	'token'	=> $token
			 ])
			 ->delete($this->table);

		return $this->db->affected_rows();
	}
}
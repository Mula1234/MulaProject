<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Account related operation model
class Users_model extends MY_Model {

	//@var for table name
	private $table;

	public function __construct()
	{
		parent::__construct();
		//Set table name
		$this->table = 'users';
	}

	//FUnction to get user profile
	public function get($userID)
	{
		return $this->db
					->where('user_ID', $userID)
					->limit(1)
					->get($this->table);
	}

	//FUnction to get user profile
	public function get_all($limit, $offset)
	{
		return $this->db
					->where('is_deleted', 0)
					->limit($limit, $offset)
					->get($this->table);
	}

	//Function to add assets
	public function add(Array $data)
	{
		$this->db
			 ->insert($this->table, $data);

		return $this->db->insert_id();
	}

	//Function to check if has user
	public function has($userID)
	{
		$q = $this->db
				  ->where('user_ID', $userID)
				  ->limit(1)
				  ->get($this->table);

		if( $q->num_rows() )
			return TRUE;

		return FALSE;
	}

	//Function to changes user status
	public function changeStatus($userID)
	{
		$user =  $this->get($userID);

		if( $user->row()->status == 1 )
		{
			$status = 0;
		}
		else
		{
			$status = 1;
		}

		$this->update($userID, ['status' => $status]);

		return $status;
	}

	//Function to update user
	public function update($userID, $data)
	{
		$this->db
			 ->where('user_ID', $userID)
			 ->update($this->table, $data);

		return $this->db->affected_rows();
	}

	//Function to delete user
	public function delete($userID)
	{
		$this->db
			 ->where('user_ID', $userID)
			 ->update($this->table, [
			 	'is_deleted' => 1
			 ]);

		$this->db
			 ->where('user_ID', $userID)
			 ->delete('mu_sessions');	

		return $this->db->affected_rows();
	}

	//Function to count users
	public function count()
	{
		return $this->db
					->where('is_deleted', 0)
					->count_all_results($this->table);
	}

	//Function check if phone exist
	public function has_phone($phone, $user)
	{
		$q = $this->db
				  ->where([
				  	'user_ID !=' => $user,
				  	'phone' => $phone,
				  ])
				  ->get($this->table);

		if( $q->num_rows() )
			return TRUE;

		return FALSE;
	}

	//Function to update password
	public function update_pass($pass, $userID)
	{
		return $this->db
					->where('user_ID', $userID)
					->update($this->table, ['password' => $pass]);

		return $this->db->affected_rows();
	}


	//function to get user table column
	public function get_column($col, $userID)
	{
		$q = $this->db
				  ->select($col)
				  ->where('user_ID', $userID)
				  ->get($this->table);

		if( $q->num_rows() )
			return $q->row()->$col;
	}

	//Function update user profile picture
	public function update_dp($file, $userID)
	{
		return $this->db
					->where('user_ID', $userID)
					->update($this->table, ['user_profile' => $file]);

		return $this->db->affected_rows();
	}

	//Check if referral is exist
	public function has_referral($link)
	{
		$q = $this->db
				  ->select('user_ID')
				  ->where([
				  		'referral_link' => $link,
				  		'is_deleted' => 0,
				  		'status' => 1
				  	])
				  ->limit(1)
				  ->get($this->table);

		if( $q->num_rows() )
			return $q->row()->user_ID;

		return FALSE;
	}

	//Function check if user exist
	public function has_username($username)
	{
		return $this->db
					->select([
						'user_ID', 'email_address', 'password', 
						'status', 'account_verify', 'is_deleted',
						'secure_hash', 'first_name'
					])
					->where('email_address', $username)
					->limit(1)
					->get($this->table);
	}

	//FUnction to count register today from an ip
	public function count_today()
	{
		$q = $this->db
				  ->where(
				  		"`created_ip` = '".userip()."' AND
						DATE(`created_at`) = CURDATE()"
					)
				  ->get($this->table);

		return $q->num_rows();
	}

	//Function to verify token
	public function verify_account($token)
	{
		$this->db
			 ->where('secure_hash', $token)
			 ->update($this->table, ['account_verify' => 1]);

		return $this->db->affected_rows();
	}

	//Function check if has token
	public function has_token($token)
	{
		return $this->db
					->where([
						'secure_hash' => $token,
						'is_deleted' => 0,
						'status' => 1
					])
					->limit(1)
					->get($this->table);
	}

	//Function update token
	public function update_token($user, $token)
	{
		$this->db
			 ->where('user_ID', $user)
			 ->update($this->table, ['secure_hash' => $token]);

		return $this->db->affected_rows();
	}

	//Function to update password
	public function reset_password($pass, $token)
	{
		$this->db
			 ->where('secure_hash', $token)
			 ->update($this->table, ['password' => $pass]);

		return $this->db->affected_rows();
	}
}

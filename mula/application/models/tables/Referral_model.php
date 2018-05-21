<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Account related operation model
class Referral_model extends MY_Model {

	//@var for table name
	private $table_user;

	public function __construct()
	{
		parent::__construct();
		//Set table name
		$this->table = 'referrals';
	}

	//public function add referral
	public function add($from, $to, $token)
	{
		$this->db
		     ->insert($this->table, [
		     	'referral_by' => $from,
		     	'referral_to' => $to,
		     	'token' => $token,
		     	'created_at' => datetime(),
		     ]);

		return $this->db->insert_id();
	}

	//Function to get user bonous
	public function get_bonous($userID)
	{
		return $this->db
					->select_sum('token')
					->where('referral_by', $userID)
					->get($this->table)
					->row()
					->token;
	}
}
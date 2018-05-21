<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Account related operation model
class Options_model extends MY_Model {

	//@var for table name
	private $table;

	public function __construct()
	{
		parent::__construct();
		//Set table name
		$this->table = 'options';
	}

	//FUnction to get user profile
	public function get($name)
	{
		return $this->db
					->where('option_name', $name)
					->limit(1)
					->get($this->table)
					->row()
					->option_value;
	}

	//Function to update option
	public function update($name, $value)
	{
		$this->db
			 ->where('option_name', $name)
			 ->update($this->table, [
			 	'option_value' => $value
			 ]);

		return $this->db->affected_rows();
	}
}

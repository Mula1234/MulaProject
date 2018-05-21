<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @core Model
 *
 * All application models extends this
 */
class MY_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		// connect application to database
		$this->load->database();
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @controller Notfound
 *
 * Shows not found 404 page
 */
class Notfound extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @index page
	 *
	 * Shows not found 404 page
	 */
	public function index()
	{
		// Load not found view
		$this->_load_view('notfound/notfound', 
							['title' => '404 Not found !']
						);
	}
}

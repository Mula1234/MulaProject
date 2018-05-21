<?php


defined('BASEPATH') OR exit('No direct script access allowed');

//Home default controller of website
class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	//Default home page landing page of website
	public function index($link = '')
	{
		$this->_load_view('home/home', ['title' => 'Welcome to Our Site']);
	}

	//Contact page
	//Also AJAX form submitting page
	public function contact()
	{
		//If post request
		//AJAX
		if( $this->input->server('REQUEST_METHOD') === 'POST' )
		{
			//Get data in post
			//Hint for object to be convert in array
			$_POST = (array) json_decode(@file_get_contents("php://input"));

			//Check for validations
			if( $this->form_validation->run() === FALSE )
			{
				$this->_response([
					'error' => true,
					'message' => validation_errors()
				]);
			}

			//Load user mail library
			$this->load->library('usermail');

			//Send contact email
			$isSent = $this->usermail->contact(
				$this->input->post('contact_name'),
				$this->input->post('contact_email'),
				$this->input->post('contact_sub'),
				$this->input->post('contact_msg')
			);

			//If email sent
			if( $isSent )
			{
				$this->_response([
					'error' => false,
					'message' => 'Your message sent. we will contact you soon'
				]);
			}

			//If mail not sent
			$this->_response([
				'error' => true,
				'message' => 'Unable to send your message !'
			]);
		}

		//Load contact view with data
		$this->_load_view('home/contact', ['title' => 'Contact Us']);
	}

	public function info()
	{
		phpinfo();
	}
}

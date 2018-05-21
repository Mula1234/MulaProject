<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User mail send library
class Usermail {

	private $CI;
	private $subject;
	private $from;
	private $from_name;

	public function __construct()
	{
		//Get instance of ci
		$this->CI = & get_instance();

		$this->CI->load->library('email');

		$this->from = APPMAIL;
		$this->name = APPNAME;
	}

	//Send user verification email
	public function verify($email, $name, $token)
	{
		//Set body with data
		$body = $this->CI->load->view(
								'emails/verify-account',
								['user_name' => $name, 'verify_link' => base_url('/account/verify_account/?_token='.$token)],
								true
							);
		//Set email subject
		$this->subject = 'Mula - Verify Your Account';
		//Send verification mail
		return $this->_send_email($email, $body);
	}

	//Send user forgot pass mail
	public function forgot($email, $name, $token)
	{
		//Set body with data
		$body = $this->CI->load->view(
								'emails/forgot-password',
								['user_name' => $name, 'reset_link' => base_url('/account/reset_password/?_token='.$token)],
								true
							);
		//Set email subject
		$this->subject = 'Mula - Reset Your Password';
		//Send verification mail
		return $this->_send_email($email, $body);
	}

	//Send welcome mail
	public function welcome($email, $name)
	{
		//Set body with data
		$body = $this->CI->load->view(
								'emails/welcome',
								['user_name' => $name],
								true
							);
		//Set email subject
		$this->subject = 'Mula - Welcome to Mula';
		//Send verification mail
		return $this->_send_email($email, $body);
	}

	//Send contact email to admin
	public function contact($name, $email, $sub, $msg)
	{
		//Set body with data
		$body = $this->CI->load->view(
								'emails/contact',
								[
									'name' => $name,
									'email' => $email,
									'sub' => $sub,
									'msg' => $msg,
									'ip' => userip(),
								],
								true
							);

		//Set email subject
		$this->subject = 'Mula - New Contact Enquiry';
		//Send verification mail
		return $this->_send_email(CONTACT_TO_MAIL, $body);
	}

	//Send credentials to user
	public function credentials($username, $password, $name)
	{
		//Set body with data
		$body = $this->CI->load->view(
								'emails/credentials',
								[
									'username' => $username,
									'password' => $password,
									'user_name' => $name
								],
								true
							);

		//Set email subject
		$this->subject = 'Mula - Account Credentials';
		//Send credentials mail
		return $this->_send_email($username, $body);
	}

	//Function to send email
	private function _send_email($email, $body)
	{
		//Email config
		$config['charset']  = 'iso-8859-1';
		$config['mailtype'] = 'html';

		//Initialize email with config
		$this->CI->email->initialize($config);

		//Set from email and name
		$this->CI->email->from($this->from, $this->name);

		//Set to email
		$this->CI->email->to($email);
		
		//Set subject
		$this->CI->email->subject($this->subject);

		//Set email body
		$this->CI->email->message($body);

		return $this->CI->email->send();
	}
}

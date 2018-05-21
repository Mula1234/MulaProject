<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Account related operation controller
class Account extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		// Check if user is already logged in
		if( $this->_is_user_loggedin() )
			return redirect('user/wallet');
		
		// Load user mail library
		$this->load->library('usermail');
	}

	/**
	 * login action for this controller.
	 * AJAX based
	 */
	public function login()
	{
		//Check for method is post only
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			die("Error: Invalid Request !");

		$_POST = (array) json_decode(@file_get_contents("php://input"));

		//Check for validations
		if( $this->form_validation->run() === FALSE )
		{
			$this->_response([
				'error'	=> true,
				'message' => validation_errors()
			]);
		}

		//Get login credentials
		$email  = $this->input->post('email_address');
		$password  = $this->input->post('password');

		//Check for user
		$has_user = $this->users->has_username($email);

		//Check if record found
		if( $has_user->num_rows() == 0 )
		{
			$this->_response([
				'error'	=> true,
				'message' => lang('alert_invalid_login')
			]);
		}

		//Check if remember me setted
		$is_remem = ( $this->input->post('remember') && 
					  $this->input->post('remember') === 'on' )
					? TRUE
					: FALSE;

		//Next to url
		$next_url = ( $this->input->post('next') && 
					  $this->input->post('next') !== '' )
					? $this->input->post('next')
					: base_url('user/wallet');

		//Get user row data
		$user_data = $has_user->row();

		//Check if account is verified
		if( $user_data->account_verify == 0 )
		{
			//Send verification email
			$this->usermail->verify(
							$user_data->email_address, 
							$user_data->first_name, 
							$user_data->secure_hash
						);

			$this->_response([
				'error'	=> true,
				'message' => lang('alert_ac_not_verify')
			]);
		}

		//Check if account is active
		if( $user_data->status == 0 )
		{
			$this->_response([
				'error'	=> true,
				'message' => lang('alert_ac_not_active')
			]);
		}

		//Check if account is deleted
		if( $user_data->is_deleted == 1 )
		{
			$this->_response([
				'error'	=> true,
				'message' => lang('alert_ac_is_deleted')
			]);
		}

		//Check for password if not match
		if( ! password_verify($password, $user_data->password) )
		{
			$this->_response([
				'error'	=> true,
				'message' => lang('alert_invalid_login')
			]);
		}

		//Get session token
		$user_token = $this->_sess_token();

		//Check if remember me setted
		if( $is_remem )
		{
			// Set remember me cookie
			set_cookie('__mu_login', $user_token, 30*86400);
		}

		//Set user session
		$this->session->set_userdata([
			'user_ID' => $user_data->user_ID,
			'user_token' => $user_token,
			'logged_in'	=> true,
		]);

		//Set session in databse
		$this->usersess->set_session($user_data->user_ID, $user_token);

		//Redirect to next
		$this->_response([
			'error'	=> false,
			'message' => lang('alert_login_success'),
			'url'	=> $next_url
		]);
	}

	/**
	 * Sign up Page for this controller.
	 */
	public function register()
	{
		//Check for method is post only
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
		{
			$this->_response([
				'error'	=> true,
				'message' => 'Invalid request method'
			]);
		}

		$_POST = (array) json_decode(@file_get_contents("php://input"));

		//Check for validations
		if( $this->form_validation->run() === FALSE )
		{
			$this->_response([
				'error'	=> true,
				'message' => validation_errors()
			]);
		}

		//Count for max register today from same ip
		$registerCount = $this->users->count_today();

		//CHeck
		if( $registerCount >= 5 )
		{
			$this->_response([
				'error'	=> true,
				'message' => lang('alert_reached_max')
			]);
		}

		//Secure hash
		$token = $this->_secure_hash();

		//First name
		$fname = $this->input->post('fname');

		//Check if reffered
		$refered = $this->input->post('referral');

		//Register user
		$userID = $this->users->add([
			'first_name'	=> $fname,
			'last_name'		=> '',
			'email_address'	=> $this->input->post('email'),
			'password'		=> $this->_hash_pass($this->input->post('pass')),
			'user_profile'	=> '',
			'phone'			=> '',
			'country'		=> '',
			'referral_link'	=> $this->_getReferral($fname),
			'secure_hash'	=> $token,
			'status'		=> 1,
			'account_verify'=> 0,
			'created_ip'	=> userip(),
			'created_at'	=> datetime(),
			'updated_at'	=> datetime(),
			'is_deleted'	=> 0,
		]);

		//If user not created then
		if( ! $userID )
		{
			//return error true
			$this->_response([
				'error'	=> true,
				'message' => lang('alert_ac_not_created')
			]);
		}

		//Create user ether address
		$this->ether->createAddress($userID);

		//Check if referred and referral exist add
		if( !empty($refered) )
		{
			$hasReferer = $this->users->has_referral($refered);

			//Get current referral amount
			$refToken = $this->options->get('referral_amount');

			//If has add refferal
			if( $hasReferer ) {

				//Transfer address
				$txAddr = $this->address->get($hasReferer, 'eth');

				//Transfer referral ether to user token
				$response = $this->ether->doTransferMut(
					$this->options->get('eth_private'), 
					$txAddr, 
					$refToken
				);

				//If transfer success
				if( ! isset($response->code) )
				{
					//Add transaction
					$this->transac->add([
						'user_ID' => $hasReferer,
						'by' => 'referral',
						'from' => $response->from,
						'to' => $txAddr,
						'amount' => $refToken,
						'tx_hash' => $response->hash,
						'type' => 'mut',
						'created_at' => datetime(),
						'created_ip' => userip()
					]);

					//Add referral amount
					$this->referral->add($hasReferer, $userID, $refToken);
				}
			}
		}

		//Send verification email
		$this->usermail->verify(
							$this->input->post('email'), 
							$this->input->post('fname'), 
							$token
						);

		//return error true
		$this->_response([
			'error'	=> false,
			'message' => lang('alert_ac_created')
		]);
	}

	/**
	 * Forgot password Page for this controller.
	 * AJAX based
	 */
	public function forgot_password()
	{
		//Check for method is post only
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			die("Error: Invalid Request !");

		$_POST = (array) json_decode(@file_get_contents("php://input"));

		//Check for validations
		if( $this->form_validation->run() === FALSE )
		{
			$this->_response([
				'error'	=> true,
				'message' => validation_errors()
			]);
		}

		$email = $this->input->post('email_id');

		//check if has account with user email
		$has_user = $this->users->has_username($email);

		//if not found user 
		if( $has_user->num_rows() == 0 )
		{
			$this->_response([
				'error'	=> true,
				'message' => lang('alert_email_not_registered')
			]);
		}

		//Check if account is verified
		if( $has_user->row()->account_verify == 0 )
		{
			//Send verification email
			$this->usermail->verify(
							$has_user->row()->email_address, 
							$has_user->row()->first_name, 
							$has_user->row()->secure_hash
						);

			$this->_response([
				'error'	=> true,
				'message' => lang('alert_ac_not_verify')
			]);
		}

		//Check if account is active
		if( $has_user->row()->status == 0 )
		{
			$this->_response([
				'error'	=> true,
				'message' => lang('alert_ac_not_active')
			]);
		}

		//Check if account is deleted
		if( $has_user->row()->is_deleted == 1 )
		{
			$this->_response([
				'error'	=> true,
				'message' => lang('alert_ac_is_deleted')
			]);
		}

		//send reset password link
		$isSent = $this->usermail->forgot(
							$email, 
							$has_user->row()->first_name, 
							$has_user->row()->secure_hash
						);

		//If unable to send email
		if( ! $isSent )
		{
			$this->_response([
				'error'	=> true,
				'message' => lang('alert_reset_link_not_sent')
			]);
		}

		$this->_response([
			'error'	=> false,
			'message' => lang('alert_reset_link_sent')
		]);
	}

	/**
	 * Verify Account Page for this controller.
	 */
	public function verify_account()
	{
		//Get token
		$token = $this->input->get("_token");

		//Check for token
		if( empty($token) )
			die("Error: Invalid Request !");

		//find for token
		$hasToken = $this->users->has_token($token);

		//if not has token return
		if( $hasToken->num_rows() == 0 )
			die("Error: Invalid Token !");

		//Set account verified
		$this->users->verify_account($token);

		//Update token
		$this->users->update_token(
							$hasToken->row()->user_ID, 
							$this->_secure_hash()
						);

		//send welcome email to user
		$this->usermail->welcome(
							$hasToken->row()->email_address,
							$hasToken->row()->first_name
						);

		$this->_load_view('account/verify_account', ['title' => 'Verify Account']);
	}

	/**
	 * Reset password Page for this controller.
	 * AJAX based Submission
	 */
	public function reset_password()
	{
		//Begin to reset process
		if( $this->input->server('REQUEST_METHOD') === 'POST' )
		{
			$_POST = (array) json_decode(@file_get_contents("php://input"));

			//Check for validations
			if( $this->form_validation->run() === FALSE )
			{
				$this->_response([
					'error'	=> true,
					'message' => validation_errors()
				]);
			}

			$token = $this->input->post('token');

			//Check for token
			$hasToken = $this->users->has_token($token);

			//if not has token return
			if( $hasToken->num_rows() == 0 )
			{
				$this->_response([
					'error'	=> true,
					'message' => lang('alert_invalid_reset_request')
				]);
			}

			$newPass = $this->input->post('password');

			//CHeck if it is previous password
			if( password_verify($newPass, $hasToken->row()->password) )
			{
				$this->_response([
					'error'	=> true,
					'message' => lang('alert_new_pass_cant_same')
				]);
			}

			//Update password
			$this->users->reset_password(
								$this->_hash_pass($newPass),
								$token
							);
			
			//Update token
			$this->users->update_token(
								$hasToken->row()->user_ID, 
								$this->_secure_hash()
							);

			//Password reset success
			$this->_response([
				'error'	=> false,
				'message' => lang('alert_password_reset_success')
			]);
		}

		//Get token
		$token = $this->input->get("_token");

		//Check for token
		if( empty($token) )
			die("Error: Invalid Request !");

		//find for token
		$hasToken = $this->users->has_token($token);

		//if not has token return
		if( $hasToken->num_rows() == 0 )
			die("Error: Invalid Token !");

		$this->_load_view('account/reset_password', ['title' => 'Reset Password']);
	}
}

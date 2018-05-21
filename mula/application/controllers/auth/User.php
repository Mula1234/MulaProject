<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Auth users related operation controller
class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		//Check if logged in otherwise return
		$this->_return_to_login_auth();

		//Load country config
		$this->load->config('countries');

		//Load email library 
		$this->load->library('usermail');
	}

	//User list page
	public function index($offset = 0)
	{
		$this->load->library('pagination');

		$config = [
			'base_url' => base_url('auth/user/list'),
			'per_page' => 10,
			'total_rows' => $this->users->count(),
			'full_tag_open' => '<ul class="pagination">',
			'full_tag_close' => '</ul>',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			'num_tag_open' => '<li>',
			'num_tag_close' => '</li>',
			'first_tag_open' => '<li>',
			'first_tag_close' => '</li>',
			'last_tag_open' => '<li>',
			'last_tag_close' => '</li>',
			'cur_tag_open' => '<li class="active"><a href="#">',
			'cur_tag_close' => '</a></li>',
		];

		$this->pagination->initialize($config);

		//Load admin dashboard page
		$this->_load_auth_view('user/user', [
			'title' => 'Auth | Users',
			'users' => $this->users->get_all($config['per_page'], $offset),
			'pagination' => $this->pagination->create_links()
		]);
	}

	//User add page
	public function add()
	{
		if( $this->form_validation->run('add_user') === FALSE )
		{
			//Load admin dashboard page
			$this->_load_auth_view('user/add', [
				'title' => 'Add User',
				'countries' => $this->config->item('countries')
			]);
		}
		else
		{
			//Secure hash
			$token = $this->_secure_hash();

			//First name
			$fname = $this->input->post('fname');

			//ac verifiy or not
			$ac_verify = $this->input->post('ac_verify');

			//Register user
			$userID = $this->users->add([
				'first_name'	=> $fname,
				'last_name'		=> $this->input->post('lname'),
				'email_address'	=> $this->input->post('email'),
				'password'		=> $this->_hash_pass($this->input->post('password')),
				'user_profile'	=> '',
				'phone'			=> $this->input->post('phone'),
				'country'		=> $this->input->post('country'),
				'referral_link'	=> $this->_getReferral($fname),
				'secure_hash'	=> $token,
				'status'		=> $this->input->post('status'),
				'account_verify'=> $ac_verify,
				'created_ip'	=> userip(),
				'created_at'	=> datetime(),
				'updated_at'	=> datetime(),
				'is_deleted'	=> 0,
			]);

			if( $userID )
			{
				//Create user ether address
				$this->ether->createAddress($userID);

				//Create user bitcoin address
				$this->bitcoin->createAddress($userID);

				//Email user its login credentials
				$this->usermail->credentials(
									$this->input->post('email'), 
									$this->input->post('password'),
									$fname
								);

				//If account is not verified
				if( ! $ac_verify )
				{
					//Send verification email
					$this->usermail->verify(
										$this->input->post('email'), 
										$fname, 
										$token
									);
				}
				else
				{
					//otherwise
					//Send welcome email
					$this->usermail->welcome(
										$this->input->post('email'), 
										$fname
									);
				}

				//return success
				$this->_setFlash('success', 'User created successfully', 'auth/user/add');
			}

			//return error
			$this->_setFlash('danger', 'Unable to create user', 'auth/user/add');
		}
	}

	//User edit page
	public function edit($userID = '')
	{
		//Check for proper user id
		if( empty($userID) && !is_numeric($userID) )
			die("Error: Invalid Request !");

		//Check if not has user with id
		if( ! $this->users->has($userID) )
			die("Error: Invalid User !");

		if( $this->form_validation->run('update_user') === FALSE )
		{
			//User data
			$user = $this->users->get($userID);
			$userData = $user->row();

			//Load admin dashboard page
			$this->_load_auth_view('user/edit', [
				'title' => 'Edit User',
				'user' => $userData,
				'countries' => $this->config->item('countries')
			]);
		}
		else
		{
			$phone  = $this->input->post('phone');
			$userID  = $this->input->post('userID');
			$status  = $this->input->post('status');

			//Check for phone no. unique
			if( !empty($phone) && 
				$this->users->has_phone($phone, $userID) )
			{
				//return success
				$this->_setFlash('danger', 'Phone number already exist.', "auth/user/edit/{$userID}");
			}

			//If user status inactive
			if( $status == 0 )
			{
				//Begin to delete user session
				$this->usersess->delete_every_where("", $userID);
			}

			//Data to be update
			$data = [
				'first_name'	=> $this->input->post('fname'),
				'last_name'		=> $this->input->post('lname'),
				'phone'			=> $phone,
				'country'		=> $this->input->post('country'),
				'status'		=> $status,
				'account_verify'=> $this->input->post('ac_verify'),
				'updated_at'	=> datetime(),
			];

			//If password is setted add password in data
			if( $this->input->post('password') &&
				$this->input->post('password') != "" )
			{

				$data['password'] = $this->_hash_pass($this->input->post('password'));
			}

			//Update user
			$this->users->update($userID, $data);

			//return success
			$this->_setFlash('success', 'User updated successfully', "auth/user/edit/{$userID}");
		}
	}

	//User edit page
	//AJAX based
	public function delete()
	{
		//check if post method
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			die("Error: Invalid Request !");

		//get id and check
		$userID = $this->input->post('userID');

		if( ! $this->users->has($userID) )
			die("Error: Invalid User !");

		//begin to delete
		$this->users->delete($userID);

		//Begin to delete user session
		$this->usersess->delete_every_where("", $userID);

		$this->_response([
			'error' => false,
			'message' => 'User deleted successfully.'
		]);
	}

	//User status change
	//AJAX based
	public function changeStatus()
	{
		//check if post method
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			die("Error: Invalid Request !");

		//get id and check
		$userID = $this->input->post('userID');

		if( ! $this->users->has($userID) )
			die("Error: Invalid User !");

		//begin to delete
		$status = $this->users->changeStatus($userID);

		//Return changed status text to be updated
		if( $status == 0 )
		{
			$btntext = 'Active';
			$statustext = '<span class="text-danger"><b>Inactive</b></span>';

			//Begin to delete user session
			$this->usersess->delete_every_where("", $userID);
		}
		else
		{
			$btntext = 'Inactive';
			$statustext = '<span class="text-success"><b>Active</b></span>';
		}

		//Alert text
		$alerttext = ($btntext == 'Active')
					 ? 'Inactive'
					 : 'Active';

		//Return response
		$this->_response([
			'error' => false,
			'message' => 'User '.$alerttext.' successfully.',
			'btntext' => $btntext,
			'statustext' => $statustext
		]);
	}
}

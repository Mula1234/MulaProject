<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(

	//User sign up validations
	'account/login'	=> array(
		array(
			'field' => 'email_address',
			'label' => 'Email address',
			'rules' => 'required|valid_email',
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required'
		),
	),

	//User sign in validations
	'account/register'	=> array(
		array(
			'field' => 'fname',
			'label' => 'Name',
			'rules' => 'required'
		),
		array(
			'field' => 'email',
			'label' => 'Email address',
			'rules' => 'required|valid_email|is_unique[mu_users.email_address]',
			'errors' => [
				'is_unique' => 'Email address already exist.'
			]
		),
		array(
			'field' => 'pass',
			'label' => 'Password',
			'rules' => 'required|min_length[8]'
		),
		array(
			'field' => 'confpass',
			'label' => 'Confirm password',
			'rules' => 'required|matches[pass]'
		)
	),

	//User forgot password validations
	'account/forgot_password'	=> array(
		array(
			'field' => 'email_id',
			'label' => 'Email address',
			'rules' => 'required|valid_email'
		),
	),

	//User reset password validations
	'account/reset_password'	=> array(
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|min_length[8]'
		),
		array(
			'field' => 'confpassword',
			'label' => 'Confirm password',
			'rules' => 'required|matches[password]'
		)
	),

	//Change password validations
	'profile/change_password'	=> array(
		array(
			'field' => 'curpass',
			'label' => 'Current password',
			'rules' => 'required'
		),
		array(
			'field' => 'newpass',
			'label' => 'New password',
			'rules' => 'required|min_length[8]'
		),
		array(
			'field' => 'confnewpass',
			'label' => 'Confirm password',
			'rules' => 'required|min_length[8]|matches[newpass]'
		)
	),

	//update profile validations
	'profile/update_profile' => array(
		array(
			'field' => 'fname',
			'label' => 'First name',
			'rules' => 'required'
		),
	),

	//Upload assets form validations
	'assets/upload_assets' => array(
		array(
			'field' => 'asset_type',
			'label' => 'Asset type',
			'rules' => 'required'
		),
		array(
			'field' => 'assets_dsc',
			'label' => 'Asset description',
			'rules' => 'required'
		),
		array(
			'field' => 'assets_val',
			'label' => 'Asset description',
			'rules' => 'required|numeric'
		),
		array(
			'field' => 'uploaded_docs',
			'label' => 'Asset owner proof document',
			'rules' => 'required'
		),
	),


	//User contact form validations
	'home/contact'	=> array(
		array(
			'field' => 'contact_name',
			'label' => 'Name',
			'rules' => 'required'
		),
		array(
			'field' => 'contact_email',
			'label' => 'Email address',
			'rules' => 'required|valid_email'
		),
		array(
			'field' => 'contact_sub',
			'label' => 'Subject',
			'rules' => 'required'
		),
		array(
			'field' => 'contact_msg',
			'label' => 'Message',
			'rules' => 'required'
		),
	),

	//Auth login validations
	'auth_login'	=> array(
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required',
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required'
		),
	),

	//User validation add admin
	'add_user' => array(
		array(
			'field' => 'fname',
			'label' => 'First name',
			'rules' => 'required',
		),
		array(
			'field' => 'email',
			'label' => 'Email address',
			'rules' => 'required|valid_email|is_unique[mu_users.email_address]'
		),
		array(
			'field' => 'status',
			'label' => 'Account status',
			'rules' => 'required'
		),
		array(
			'field' => 'ac_verify',
			'label' => 'Account verification',
			'rules' => 'required'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|min_length[8]'
		),
		array(
			'field' => 'phone',
			'label' => 'Phone',
			'rules' => 'is_unique[mu_users.phone]'
		),
	),

	//User validation update user
	'update_user' => array(
		array(
			'field' => 'fname',
			'label' => 'First name',
			'rules' => 'required',
		),
		array(
			'field' => 'status',
			'label' => 'Account status',
			'rules' => 'required'
		),
		array(
			'field' => 'ac_verify',
			'label' => 'Account verification',
			'rules' => 'required'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'min_length[8]'
		),
	),


	//Auth validation profile
	'auth_profile' => array(
		array(
			'field' => 'fname',
			'label' => 'Full name',
			'rules' => 'required',
		),
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required|min_length[5]'
		),
		array(
			'field' => 'email',
			'label' => 'Email address',
			'rules' => 'valid_email'
		),
	),

	//Asset reject validation
	'asset_reject' => array(
		array(
			'field' => 'assetID',
			'label' => 'asset id',
			'rules' => 'required',
		),
		array(
			'field' => 'rejectComment',
			'label' => 'Reject reason',
			'rules' => 'required',
		),
	),

	//Asset reject validation
	'asset_approve' => array(
		array(
			'field' => 'assetID',
			'label' => 'Asset id',
			'rules' => 'required',
		),
		array(
			'field' => 'tokenAmount',
			'label' => 'Token amount',
			'rules' => 'required',
		),
		array(
			'field' => 'userAddress',
			'label' => 'User address',
			'rules' => 'required',
		)
	),
);
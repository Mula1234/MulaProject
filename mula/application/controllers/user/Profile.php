<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Profile related operation controller
class Profile extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Check if user not login and redirect to login
		$this->_return_to_login();
		//Load country config
		$this->load->config('countries');
	}

	//FUnction show profile page
	public function index()
	{
		//Get user data
		$getUser = $this->users->get($this->_uID());

		//Check for user is exist
		if( $getUser->num_rows() == 0 )
			die("Error: Invalid Request !");

		$userData = $getUser->row();

		$this->_load_user_view('profile/profile', [
									'title' => 'User Profile', 
									'user' => $userData,
									'countries' => $this->config->item('countries')
								]);
	}

	//FUnction to change password
	public function change_password()
	{
		//Check if post method only
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			return;

		//Check for form validation
		if( $this->form_validation->run() === FALSE )
		{
			$this->_response([
				'error'	=> true,
				'message' => validation_errors()
			]);
		}

		$curPass = $this->input->post('curpass');
		$newPass = $this->input->post('newpass');

		//Get user data
		$getUser = $this->users->get($this->_uID());

		//Check for user is exist
		if( $getUser->num_rows() == 0 )
			return;

		//Check current password match
		if( ! password_verify($curPass, $getUser->row()->password) )
		{
			$this->_response([
				'error'	=> true,
				'message' => lang('alert_current_pass_not_match')
			]);
		}

		//Check if new is not same as old
		if( password_verify($newPass, $getUser->row()->password) )
		{
			$this->_response([
				'error'	=> true,
				'message' => lang('alert_new_pass_cant_same')
			]);
		}

		//update password
		$this->users->update_pass(
			$this->_hash_pass($newPass),
			$this->_uID()
		);

		$this->_response([
			'error'	=> false,
			'message' => lang('alert_password_change_success')
		]);
	}

	//Function to update profile
	public function update_profile()
	{
		//Check if post method only
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			die("Error: Invalid Request !");

		//Check for form validation
		if( $this->form_validation->run() === FALSE )
		{
			$this->_response([
				'error'	=> true,
				'message' => validation_errors()
			]);
		}

		//Get user data
		$getUser = $this->users->get($this->_uID());

		//Check for user is exist
		if( $getUser->num_rows() == 0 )
			return;

		//Check for phone number if already exist
		$phone = $this->input->post('phone');

		if( !empty($phone) && $this->users->has_phone($phone, $this->_uID()) )
		{
			$this->_response([
				'error'	=> true,
				'message' => 'Phone number already exist.'
			]);
		}

		//update password
		$this->users->update($this->_uID(), [
			'first_name'	=> $this->input->post('fname'),
			'last_name'		=> $this->input->post('lname'),
			'phone'			=> $phone,
			'country'		=> $this->input->post('country'),
			'updated_at'	=> datetime(),
		]);

		$this->_response([
			'error'	=> false,
			'message' => lang('alert_profile_update_success')
		]);
	}

	//FUnction to upload profile picture
	public function upload_dp()
	{
		//If not request method is post
		if( $this->input->server('REQUEST_METHOD') !== "POST" )
			return;

		//Set upload config
		$config['upload_path'] = PROFILEPATH;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $config['file_name'] = "DP" . random_string('numeric', 12);;

        //Load upload library
        $this->load->library('upload', $config);

        if( ! $this->upload->do_upload('profile_dp'))
        {
            $this->_response([
            	'error'	=> true,
            	'message' => $this->upload->display_errors('', '')
            ]);
        }

    	//Get current profile
    	$profile = $this->users->get_column('user_profile', $this->_uID());

    	//Delete old profile of user
    	if( !empty($profile) && file_exists(PROFILEPATH . $profile) )
    	{
    		unlink(PROFILEPATH . $profile);
    	}

    	//Image height width
    	$width = $this->upload->data('image_width');
    	$height = $this->upload->data('image_height');

    	//CROP
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= $this->upload->data('full_path');
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= FALSE;
		$config['width']         	= 200;
		$config['height']       	= 200;
		$config['thumb_marker']     = uniqid();

		//Square from center
		if ($width > $height)
		{
			$config['width'] = $height;
			$config['height'] = $height;
			$config['x_axis'] = (($width / 2) - ($config['width'] / 2));
		}
		else
		{
			$config['height'] = $width;
			$config['width'] = $width;
			$config['y_axis'] = (($height / 2) - ($config['height'] / 2));
		}

		//Load library of image
		$this->load->library('image_lib', $config);

		//Crop not success
		if( ! $this->image_lib->crop())
        {
            $this->_response([
            	'error'	=> true,
            	'message' => $this->image_lib->display_errors('', '')
            ]);
        }

    	//Profile picture name
    	$file_name = $this->upload->data('raw_name') . $config['thumb_marker'] . $this->upload->data('file_ext');

    	//Update profile
    	$this->users->update_dp($file_name, $this->_uID());

    	//Delete original
    	unlink( $this->upload->data('full_path') );

    	//Return response
        $this->_response([
        	'error'	=> false,
        	'message' => 'Profile picture changed',
        	'dp' => base_url(PROFILEPATH) . $file_name,
        ]);
	}
}

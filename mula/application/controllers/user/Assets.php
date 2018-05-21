<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User Dashboard related operation controller
class Assets extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		//Check if user not login and redirect to login
		$this->_return_to_login();
	}

	//Function for index of assets page
	public function index($offset = 0)
	{
		//Pagination
		$this->load->library('pagination');

		//Pagination config
		$config = [
			'base_url' => base_url('user/assets/list'),
			'per_page' => 10,
			'total_rows' => $this->assets->count_by_user($this->_uID()),
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

		//Initialize pagination
		$this->pagination->initialize($config);

		//Get all assets of user
		$assetsData = $this->assets->get_by_user(
										$this->_uID(), 
										$config['per_page'], 
										$offset
									);

		$this->_load_user_view('assets/assets', [
									'title' => 'Assets',
									'assets' => $assetsData,
									'pagination' => $this->pagination->create_links()
							]);
	}

	// Function shows assets tokensize
	public function tokenize()
	{
		$this->_load_user_view('assets/tokenize', [
				'title' => 'Tokenize',
				'contractTerms' => $this->options->get('contract_terms')
			]);
	}

	// Function buyback portion
	public function buyback()
	{
		
	}

	//Function to upload assets
	public function upload_assets()
	{
		//If not request method is post
		if( $this->input->server('REQUEST_METHOD') !== "POST" )
			die("Error: Invalid Request !");

		//For validation check
		if( $this->form_validation->run() === FALSE )
		{
			$this->_response([
            	'error'	=> true,
            	'message' => validation_errors()
            ]);
		}

		$data = $this->input->post("user_sign");

		if( preg_match('/^data:image\/(\w+);base64,/', $data, $type))
		{
		    $data = substr($data, strpos($data, ',') + 1);
		    $type = strtolower($type[1]); // jpg, png, gif

		    if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ]))
		    {
		        //Return response
				$this->_response([
		        	'error'	=> false,
		        	'message' => 'invalid image type.'
		        ]);
		    }

		    $data = base64_decode($data);

		    if ($data === false)
		    {
		    	//Return response
				$this->_response([
		        	'error'	=> false,
		        	'message' => 'base64_decode failed.'
		        ]);
		    }
		}
		else
		{
			//Return response
			$this->_response([
	        	'error'	=> false,
	        	'message' => 'Did not match data URI with image data.'
	        ]);
		}

		$imageName = md5(uniqid(time())) . $type;

		file_put_contents(SIGNPATH . "{$imageName}", $data);

		//Add assets
		$this->assets->add([
			'user_ID' => $this->_uID(),
			'assets_type' => $this->input->post('asset_type'),
			'assets_description' => $this->input->post('assets_dsc'),
			'auth_comment' => '',
			'approved_amount' => '',
			'market_value' => $this->input->post('assets_val'),
			'user_sign' => $imageName,
			'assets_docs' => $this->input->post('uploaded_docs'),
			'status' => 0,
			'created_at' => datetime(),
			'tokenized_at' => datetime(),
			'created_ip' => userip()
		]);

		//Return response
		$this->_response([
        	'error'	=> false,
        	'message' => 'Assets added successfully.'
        ]);
	}

	//Function to upload assets documents
	public function upload_document()
	{
		//If not request method is post
		if( $this->input->server('REQUEST_METHOD') !== "POST" )
		{
			$this->_response([
            	'error'	=> true,
            	'message' => 'Invalid request method'
            ]);
		}

		//Set upload config
		$config['upload_path'] = ASSETSPATH;
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
        $config['file_name'] = "ASSET" . random_string('numeric', 12);

        //Load upload library
        $this->load->library('upload', $config);

        //If document not uploaded then
        if( ! $this->upload->do_upload('assets_document'))
        {
            $this->_response([
            	'error'	=> true,
            	'message' => $this->upload->display_errors('', '')
            ]);
        }
        
        $this->_response([
        	'error'	=> false,
        	'message' => 'Document uploaded successfully',
        	'doc' => $this->upload->data('file_name'),
        	'doc_path' => base_url(ASSETSPATH) . $this->upload->data('file_name'),
        ]);
	}
}

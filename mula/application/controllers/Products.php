<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Website Demo Porducts controller
class Products extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load demo table
		$this->load->model('tables/demo_model', 'demo');
		$this->load->model('tables/testbal_model', 'testbal');
	}

	// function for exchanges
	public function exchange()
	{
		$this->load->view('products/exchange');
	}

	// function for token create page
	public function token()
	{
		$this->_load_view('products/token', ['title' => 'Create Token']);
	}

	// funciton for show token builder
	public function builder()
	{
		$this->_load_view('products/builder', ['title' => 'Token Builder']);
	}

	// function add token to user metamask
	public function add()
	{
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			return;

		$config['upload_path'] = DEMOPATH;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|docx|doc|pdf';
        $config['file_name'] = "DEMOS" . random_string('numeric', 12);;

        //Load upload library
        $this->load->library('upload', $config);

        if( ! $this->upload->do_upload('assetDocs'))
        {
            $this->_response([
            	'error'	=> true,
            	'message' => $this->upload->display_errors('', '')
            ]);
        }

        // If uploaded then
        $types = $this->input->post('assetType');

        $this->demo->add(array(
        	'asset_types'	=> implode(',', $types),
        	'token_name'	=> $this->input->post('tokenName'),
        	'token_symbol'	=> $this->input->post('tokenSymbol'),
        	'token_rate'	=> $this->input->post('tokenRate'),
        	'start_date'	=> $this->input->post('tokenStart'),
        	'end_date'		=> $this->input->post('tokenEnd'),
        	'token_benef'	=> $this->input->post('tokenBenf'),
        	'asset_descrip'	=> $this->input->post('assetDesc'),
        	'asset_document'=> $this->upload->data('file_name'),
        	'asset_value'	=> $this->input->post('assetValue'),
        	'created_ip' 	=> userip(),
        	'created_at' 	=> datetime()
        ));

        $this->_response([
        	'error'	=> false,
        	'message' => 'Asset added'
        ]);
	}

	// function transfer demo balance
	public function add_balance()
	{
		// if not post method
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			return;

		// get balance
		$balance = $this->input->post('balance') ? $this->input->post('balance') : 0;
		$address = $this->input->post('address');
		$for = $this->input->post('type');
 
		// check if address available
		if( empty($balance) OR empty($address) )
		{
			$this->_response([
				'success' => false,
				'message' => 'Error while adding balance.'
			]);
		}

		// Check if test has addr
		$Addr = $this->testbal->get($address);

		// If address already exist
		if( $Addr->num_rows() )
		{
			$this->testbal->add_bal($address, ($balance + $Addr->row()->$for), $for);
			$this->_response([
				'success' => true,
				'message' => 'Balance added to your account.'
			]);
		}

		// If not found
		$this->testbal->add([
			'address'	=> $address,
			$for		=> $balance,
			'created_ip'=> userip()
		]);

		$this->_response([
			'success' => true,
			'message' => 'Balance added to your account.'
		]);
	}

	//Function to check user balance with type
	public function check_balance()
	{
		// check if post method
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			return;

		// get params
		$address = $this->input->post('address');
		$type    = $this->input->post('type');

		$hasBal = $this->testbal->get_balance($address, $type);

		if( $hasBal === FALSE )
		{
			$this->_response([
				'success' => false,
				'message' => 'Insufficient balance.',
				'balance' => 0
			]);
		}

		$this->_response([
			'success' => $hasBal ? true : false,
			'balance' => $hasBal
		]);
	}

	// Function for user details of address
	public function show_balances()
	{
		// if not post method
		if( $this->input->server('REQUEST_METHOD') !== 'POST' )
			return;

		// get balance
		$address = $this->input->post('address');

		// get address data
		$Addr = $this->testbal->get($address);

		// check if row
		if( $Addr->num_rows() )
		{
			?>
			<table class="table" style="background: #fff;">
				<thead>
					<th>Address</th>
					<th>Mula</th>
					<th>Ether</th>
					<th>Xlm</th>
					<th>Prop Coin</th>
					<th>Dragon Token</th>
					<th>Crtpyo Kitties</th>
					<th>Token Buzz</th>
				</thead>
				<thead>
					<th><?= substr($address, 0, 10); ?>...</th>
					<th><?= $Addr->row()->token; ?></th>
					<th><?= $Addr->row()->ether; ?></th>
					<th><?= $Addr->row()->xlm; ?></th>
					<th><?= $Addr->row()->prop; ?></th>
					<th><?= $Addr->row()->dragon; ?></th>
					<th><?= $Addr->row()->crypto; ?></th>
					<th><?= $Addr->row()->buzz; ?></th>
				</thead>
			</table>
			<?php
		}
		else
		{
			?>
			<table class="table" style="background: #fff;">
				<thead>
					<th>Address</th>
					<th>Mula</th>
					<th>Ether</th>
					<th>Xlm</th>
					<th>Prop Coin</th>
					<th>Dragon Token</th>
					<th>Crtpyo Kitties</th>
					<th>Token Buzz</th>
				</thead>
				<thead>
					<th><?= substr($address, 0, 10); ?>...</th>
					<th>0</th>
					<th>0</th>
					<th>0</th>
					<th>0</th>
					<th>0</th>
					<th>0</th>
					<th>0</th>
				</thead>
			</table>
			<?php
		}
	}

	// Function list all demo token of benef
	public function get()
	{
		$address = $this->input->get('address');

		// If empty address
		if( empty($address) )
		{
			die('<div class="alert alert-info text-center">No project were found in your address !</div>');
		}

		$result = $this->demo->get($address);

		// If no result found
		if( $result->num_rows() == 0 )
		{
			die('<div class="alert alert-info text-center">No project were found in your address !</div>');
		}

		?>

		<table class="table">
			<thead>
				<tr>
					<th>Asset Type</th>
					<th>Token Name</th>
					<th>Token Symbol</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Description</th>
					<th>Document</th>
					<th>Value</th>
					<th>Create Time</th>
					<th>Process</th>
				</tr>
			</thead>
			<tbody>

		<?php

		foreach ($result->result() as $one)
		{
			?>

			<tr>
				<td><?= $one->asset_types ?></td>
				<td><?= $one->token_name ?></td>
				<td><?= $one->token_symbol ?></td>
				<td><?= $one->start_date ?></td>
				<td><?= $one->end_date ?></td>
				<td><?= $one->asset_descrip ?></td>
				<td><a class="text-success" href="<?= base_url(DEMOPATH . $one->asset_document); ?>">See</a></td>
				<td><?= $one->asset_value ?></td>
				<td><?= $one->created_at ?></td>
				<td>-</td>
			</tr>

			<?php
		}

		?>
			</tbody>
		</table>

		<?php
		die;
	}
}

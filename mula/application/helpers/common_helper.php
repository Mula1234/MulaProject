<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( ! function_exists('datetime') )
{
	// Function return date in correct formate for db
	function datetime()
	{
		return date('Y-m-d H:i:s');
	}
}

if( ! function_exists('userip') )
{
	// Function return ip address of user
	function userip()
	{
		$CI = & get_instance();
		return $CI->input->ip_address();
	}
}

if( ! function_exists('_flash_get') )
{
	//function to get flash message
	function _flash_get()
	{
		$CI = & get_instance();

		if( $CI->session->flashdata('_alert_type') != "" &&
			$CI->session->flashdata('_alert_msg') != "" )
		{
			?>

			<div class="alert alert-<?= $CI->session->flashdata('_alert_type'); ?> alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?= $CI->session->flashdata('_alert_msg'); ?>
			</div>

			<?php
		}
	}
}

if( ! function_exists('is_user_loggedin') )
{
	//Function to check if user is logged in or not
	function is_user_loggedin()
	{
		$CI = & get_instance();

		//Load model usersession
		$CI->load->model('tables/usersess_model', 'usersess');
		
		return ($CI->session->has_userdata('user_ID') &&
		  		$CI->session->has_userdata('user_token') &&
		  		$CI->session->has_userdata('logged_in') &&
		  		$CI->session->userdata('logged_in') === TRUE) &&
				//Check for token to be valid
				$CI->usersess->has_token($CI->session->userdata('user_token'))
				? TRUE
				: FALSE;
	}

}

if( ! function_exists('url_active') )
{
	//Function to active url
	//pass url segment and no.
	function url_active($url, $pos = 2)
	{
		$CI = & get_instance();

		$seg = $CI->uri->segment($pos);

		if( is_array($url) )
		{
			if( in_array($seg, $url) )
				return 'class="active"';
		}

		if( $seg == $url )
			return 'class="active"';

		return;
	}
}

if( ! function_exists('money') )
{
	//Formate money in usd
	function money($no)
	{
		setlocale(LC_MONETARY,"en_US.UTF-8");
		return money_format("%(#10n", $no);
	}
}

if( ! function_exists('dd') )
{
	//Function for dump and die
	//var_dump and die
	function dd($exp)
	{
		var_dump($exp);
		die;
	}
}

if( ! function_exists('strdots') )
{
	//Function to show string part and then add dots
	function strdots($str, $length)
	{
		return substr($str, 0, $length) . '...';
	}
}
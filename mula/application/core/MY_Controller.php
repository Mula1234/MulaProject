<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @core Model
 *
 * All application controllers extends this
 */
class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		/**
		 * @load all models 
		 * @based on table for each table one model is specified
		 */
		$this->load->model('tables/address_model', 	'address');
		$this->load->model('tables/assets_model', 	'assets');
		$this->load->model('tables/auth_model', 	'auth');
		$this->load->model('tables/options_model', 	'options');
		$this->load->model('tables/referral_model', 'referral');
		$this->load->model('tables/transac_model', 	'transac');
		$this->load->model('tables/users_model', 	'users');
		$this->load->model('tables/usersess_model', 'usersess');

		// Check for cookie if setted login user
		if( get_cookie("__mu_login") )
		{
			$this->_login_user(get_cookie('__mu_login'));
		}
	}

	/**
	 * @load
	 *
	 * Application outer views
	 */
	protected function _load_view($view, $data = '')
	{
		// header with data available in all views
		$this->load->view('templates/header', $data);
		$this->load->view($view);
		$this->load->view('templates/footer');
	}

	/**
	 * @load
	 *
	 * Application user views
	 */
	protected function _load_user_view($view, $data = '')
	{
		// header with data available in all views
		$this->load->view('templates/user_header', $data);
		$this->load->view("user/{$view}");
		$this->load->view('templates/user_footer');
	}

	/**
	 * @load
	 *
	 * Application author views
	 */
	protected function _load_auth_view($view, $data = '')
	{
		// header with data available in all views
		$this->load->view('templates/auth_header', $data);
		$this->load->view("auth/{$view}");
		$this->load->view('templates/auth_footer');
	}

	/**
	 * @check
	 *
	 * If user is logged in
	 */
	protected function _is_user_loggedin()
	{
		return ($this->session->has_userdata('user_ID') &&
		  		$this->session->has_userdata('user_token') &&
		  		$this->session->has_userdata('logged_in') &&
		  		$this->session->userdata('logged_in') === TRUE &&
		  		// Check if has session token in database
		  		$this->_has_token($this->session->userdata('user_token')))
				? TRUE
				: FALSE;
	}

	/**
	 * @check
	 *
	 * If author is logged in
	 */
	protected function _is_auth_loggedin()
	{
		return ($this->session->has_userdata('auth_ID') &&
		  		$this->session->has_userdata('username') &&
		  		$this->session->has_userdata('auth_login') &&
		  		$this->session->userdata('auth_login') === TRUE )
				? TRUE
				: FALSE;
	}

	/**
	 * @returnto
	 *
	 * If not loggedin in case of user with current url
	 */
	protected function _return_to_login()
	{
		if( ! $this->_is_user_loggedin() )
		{
			// Delete cookie
			delete_cookie('__mu_login');
			// Destroy session
			// --> $this->session->sess_destroy();
			return redirect(base_url() .'?next=' . urlencode(current_url()));
		}
	}

	/**
	 * @returnto
	 *
	 * If not loggedin in case of auth with current url
	 */
	protected function _return_to_login_auth()
	{
		if( ! $this->_is_auth_loggedin() )
		{
			return redirect(base_url('auth/login') .'?next=' . urlencode(current_url()));
		}
	}

	/**
	 * @generate
	 *
	 * secure hash user token
	 */
	protected function _secure_hash()
	{
		// with sha1 of unique id with micro time prefix
		return sha1(uniqid(microtime()));
	}


	/**
	 * @generate
	 *
	 * user session token
	 */
	protected function _sess_token()
	{
		// with md5 of unique id with user ip prefix
		return md5(uniqid(userip()));
	}

	/**
	 * @generate
	 *
	 * user or auth password hash
	 */
	protected function _hash_pass($pass)
	{
		return password_hash($pass, PASSWORD_DEFAULT);
	}

	/**
	 * @check
	 *
	 * if user session token is valid
	 */
	protected function _has_token($token)
	{
		return $this->usersess->has_token($token);
	}

	/**
	 * @returnthe
	 *
	 * json response and exit from script
	 */
	protected function _response(Array $data)
	{
		echo json_encode($data);
		exit();
	}

	/**
	 * @doAutoLogin
	 *
	 * login if token is found and valid
	 */
	protected function _login_user($token)
	{
		// CHeck if this token is in db
		$hasToken = $this->usersess->get($token);

		// If token found
		if( $hasToken !== FALSE )
		{
			// Set user session
			$this->session->set_userdata([
				'user_ID' => $hasToken->user_ID,
				'user_token' => $hasToken->token,
				'logged_in'	=> true,
			]);
		}
	}

	/**
	 * @returnthe
	 *
	 * current logged in users user id
	 */
	protected function _uID()
	{
		if( $this->session->has_userdata('user_ID') )
			return $this->session->userdata('user_ID');

		return 0;
	}

	/**
	 * @returnthe
	 *
	 * current logged in auths auth id
	 */
	protected function _aID()
	{
		if( $this->session->has_userdata('auth_ID') )
			return $this->session->userdata('auth_ID');

		return 0;
	}

	/**
	 * @set
	 *
	 * application session flash alert
	 */
	protected function _setFlash($type, $msg, $url)
	{
		$this->session->set_flashdata('_alert_type', $type);
		$this->session->set_flashdata('_alert_msg', $msg);

		return redirect($url);
	}

	/**
	 * @generate
	 *
	 * user referral unique code
	 */
	protected function _getReferral($name)
	{
		$nameNew = str_replace(' ', '', $name);
		// Get random
		$refer  = random_string('alnum', 10);
		// Get 4 char of name
		$refer .= '-'. substr($nameNew, 0, 4);
		// Set all to upper case
		return strtoupper($refer);
	}

	/**
	 * Checks if the given string is an address
	 *
	 * @method isAddress
	 * @param {String} $address the given HEX adress
	 * @return {Boolean}
	*/
	protected function _isAddress($address)
	{
	    if (!preg_match('/^(0x)?[0-9a-f]{40}$/i',$address))
	    {
	        // check if it has the basic requirements of an address
	        return false;
	    }
	    elseif (!preg_match('/^(0x)?[0-9a-f]{40}$/',$address) || 
	    		preg_match('/^(0x)?[0-9A-F]{40}$/',$address))
	    {
	        // If it's all small caps or all all caps, return true
	        return true;
	    }
	    else
	    {
	        // Otherwise check each case
	        return $this->_isChecksumAddress($address);
	    }
	}

	/**
	 * Checks if the given string is a checksummed address
	 *
	 * @method isChecksumAddress
	 * @param {String} $address the given HEX adress
	 * @return {Boolean}
	*/
	protected function _isChecksumAddress($address)
	{
	    // Check each case
	    $address = str_replace('0x','',$address);
	    $addressHash = hash('sha3',strtolower($address));
	    $addressArray = str_split($address);
	    $addressHashArray = str_split($addressHash);

	    for($i = 0; $i < 40; $i++ )
	    {
	        // the nth letter should be uppercase if the nth digit of casemap is 1
	        if ((intval($addressHashArray[$i], 16) > 7 && 
	        	 strtoupper($addressArray[$i]) !== $addressArray[$i]) || 
	        	(intval($addressHashArray[$i], 16) <= 7 && 
	        	strtolower($addressArray[$i]) !== $addressArray[$i]))
	        {
	            return false;
	        }
	    }

	    return true;
	}
}

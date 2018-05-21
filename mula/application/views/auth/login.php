<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= APPNAME; ?> - Auth Login</title>
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			background: #1f497c;
			font-family: sans-serif;
		}

		.loginContainer {
			width: 1180px;
			margin: 0 auto;
		}

		.loginBox {
			width: 30%;
			margin: 0 auto;
			border: 1px solid #999;
			border-radius: 4px;
			margin-top: 80px;
			padding: 30px;
			background: #fff;
			box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.49);
		}

		.loginBox img {
			display: block;
			margin: 0 auto;
			margin-bottom: 15px;
		}

		.loginBox input {
			display: block;
			width: 100%;
			height: 40px;
			border-radius: 4px;
			border: 1px solid #aaa;
			padding: 4px 8px;
			font-size: 16px;
			margin-bottom: 12px;
			outline: none;
		}

		.loginBox input[type="submit"] {
			margin: 0;
			background: #1f497c;
			border: 0;
			color: #fff;
			text-transform: uppercase;
			outline: none;
			cursor: pointer;
		}

		.errors {
			background: #ffafaf;
    		border: 1px solid #bd4747;
    		color: #802727;
			font-size: 13px;
			margin-bottom: 12px;
			padding: 4px 8px;
		}

		.errors p:not(:last-child) {
			margin-bottom: 4px;
		}
	</style>
</head>
<body>
	<div class="loginContainer">
		<div class="loginBox">
			<?php
				echo form_open(
						'auth/login', 
						['autocomplete' => 'off'],
						['next' => ( $this->input->get('next') && $this->input->get('next') !== '' ) ? urldecode($this->input->get('next')) : '']
				);

				echo img('assets/images/logo.png', true, ['width' => 150]);

				echo ( $this->session->flashdata('_alert_msg') != "" )
					 ? '<div class="errors"><p>' . 
					   $this->session->flashdata('_alert_msg') . 
					   '</p></div>'
					 : '';

				echo (validation_errors() != FALSE)
					 ? '<div class="errors">' . validation_errors() . '</div>'
					 : '';

				echo form_input([
						'name' => 'username',
						'value' => set_value('username'),
						'placeholder' => 'Username',
						'autofocus' => 'autofocus'
					]);

				echo form_password([
						'name' => 'password',
						'placeholder' => 'Password'
					]);

				echo form_submit([
						'value' => 'Login'
					]);

				echo form_close();
			?>
		</div>
	</div>
</body>
</html>
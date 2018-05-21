$(function(){

	// Initialize form validation on the registration form.
	// It has the name attribute "registration"
	$("form#exchangeETHtoMUTForm").validate({
		// Specify validation rules
		rules: {
			ethvalexch: {
				required: true
			}
		},
		// Make sure the form is submitted to the destination defined
		// in the "action" attribute of the form when valid
		submitHandler: function(form) {
			var btnInside = $("#exchangeETHtoMUTSubmit").html();
			$("#exchangeETHtoMUTSubmit").prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
			$.post(baseUrl + 'exchange/ethtomula', {
				_ether: $("#ethvalexch").val()
			}, function(response){

				var obj = JSON.parse(response);

				if( obj.error == true ) {
					setTimeout(function(){
						toastr["error"](obj.message);
						$("#exchangeETHtoMUTSubmit").removeClass('waves-effect').prop('disabled', false).html(btnInside);
					}, 1500);
				}

				if( obj.error == false ) {
					setTimeout(function(){
						toastr["success"](obj.message);				
						$("#exchangeETHtoMUTSubmit").removeClass('waves-effect').prop('disabled', false).html(btnInside);
						$("form#exchangeETHtoMUTForm").trigger('reset');
						$("form#exchangeETHtoMUTForm .form-group").addClass('is-empty');
					}, 1500);
				}
			});
			return false;
		}
	});


	// Initialize form validation on the registration form.
	// It has the name attribute "registration"
	$("form#exchangeMUTtoETHForm").validate({
		// Specify validation rules
		rules: {
			mutvalexch: {
				required: true
			}
		},
		// Make sure the form is submitted to the destination defined
		// in the "action" attribute of the form when valid
		submitHandler: function(form) {
			var btnInside = $("#exchangeMUTtoETHSubmit").html();
			$("#exchangeMUTtoETHSubmit").prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
			$.post(baseUrl + 'exchange/mulatoeth', {
				_token: $("#mutvalexch").val(),
			}, function(response){

				var obj = JSON.parse(response);

				if( obj.error == true ) {
					setTimeout(function(){
						toastr["error"](obj.message);
						$("#exchangeMUTtoETHSubmit").removeClass('waves-effect').prop('disabled', false).html(btnInside);
					}, 1500);
				}

				if( obj.error == false ) {
					setTimeout(function(){
						toastr["success"](obj.message);				
						$("#exchangeMUTtoETHSubmit").removeClass('waves-effect').prop('disabled', false).html(btnInside);
						$("form#exchangeMUTtoETHForm").trigger('reset');
						$("form#exchangeMUTtoETHForm .form-group").addClass('is-empty');
					}, 1500);
				}
			});
			return false;
		}
	});

	// Send mula token to address form
	$("form#sendMulaForm").validate({
		// Specify validation rules
		rules: {
			ercaddr: {
				required: true
			},
			tokenval: {
				required: true,
				digits: true,
			}
		},
		// Make sure the form is submitted to the destination defined
		// in the "action" attribute of the form when valid
		submitHandler: function(form) {

			$.confirm({
			    title: 'Are you sure ?',
			    content: 'Want to make this transaction !',
			    buttons: {
			        confirm: function () {
						var btnInside = $("#mulaSendSubmit").html();
						var toAddr = $("#ercaddr").val();
						$("#mulaSendSubmit").prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');

						$.post(baseUrl + 'transfer/mula', {
							_to: toAddr,
							_token: $("#tokenval").val(),
							_init: INIT
						}, function(response){

							setTimeout(function(){

								var obj = JSON.parse(response);
								$("#mulaSendSubmit").removeClass('waves-effect').prop('disabled', false).html(btnInside);

								if( obj.error == true ) {
									toastr["error"](obj.message);
								}

								if( obj.error == false ) {
									$("form#sendMulaForm").trigger('reset');
									$("form#sendMulaForm .form-group").addClass('is-empty');
									toastr["success"](obj.message);
								}
							}, 1500);

						});
			        },
			        cancel: function () {
			        }
			    }
			});


			return false;
		}
	});


	// Send ether to address form
	$("form#sendETHForm").validate({
		// Specify validation rules
		rules: {
			ercaddr: {
				required: true
			},
			tokenval: {
				required: true,
				digits: true,
			}
		},
		// Make sure the form is submitted to the destination defined
		// in the "action" attribute of the form when valid
		submitHandler: function(form) {

			$.confirm({
			    title: 'Are you sure ?',
			    content: 'Want to make this transaction !',
			    buttons: {
			        confirm: function () {
						var btnInside = $("#ethSendSubmit").html();
						var toAddr = $("#ethaddr").val();

						$("#ethSendSubmit").prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
						
						$.post(baseUrl + 'transfer/ether', {
							_to: toAddr,
							_ether: $("#ethval").val(),
							_init: INIT,
						}, function(response){

							setTimeout(function(){

								var obj = JSON.parse(response);
								$("#ethSendSubmit").removeClass('waves-effect').prop('disabled', false).html(btnInside);

								if( obj.error == true ) {
									toastr["error"](obj.message);
								}

								if( obj.error == false ) {
									$("form#sendETHForm").trigger('reset');
									$("form#sendETHForm .form-group").addClass('is-empty');
									toastr["success"](obj.message);
								}
							}, 1500);

						});
			        },
			        cancel: function () {
			        }
			    }
			});

			return false;
		}
	});

	//Function get address with qr
	$(document).on('click', '#getAddress', function(){

		var type = $(this).attr('data-type');
		var userID = $(this).attr('data-user');
		var thisIs = $(this);

		thisIs.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');

		$.post(baseUrl + 'address/get', {
			type: type,
			id: userID ? userID : ''
		}, function(response){
			setTimeout(function(){
				var obj = JSON.parse(response);

				thisIs.removeClass('waves-effect').prop('disabled', false).html('Address');

				if( obj.error == true ) {
					toastr["error"](obj.message);
					return;
				}

				$("#popupModal").html(obj.html);

				$("#ethAddress").modal();

			}, 1000);
		});
	});

	//Function get asset sign contract
	$(document).on('click', '#getAssetSigned', function(){

		var assetID = $(this).attr('data-asset');

		$.post(baseUrl + 'ajax/get_signed_contract', {
			assetID: assetID
		}, function(response){

			var obj = JSON.parse(response);

			if( obj.error == true ) {
				toastr["error"](obj.message);
				return;
			}

			$("#popupModal").html(obj.html);

			$("#signedContract").modal();
		});
	});
});
$(function(){

	//delete user
	$(document).on('click', '#deleteUser', function(){
		var userID = $(this).attr('data-id');

		$.confirm({
		    title: 'Are you sure ?',
		    content: 'Want to delete this user !',
		    buttons: {
		        confirm: function () {

					toastr["info"]("Processing...");

					$.post(baseUrl + 'auth/user/delete', {
						userID: userID
					}, function(response){

						var obj = JSON.parse(response);

						if( obj.error == false )
						{
							//Remove user row
							$("#usersTable #userRow" + userID).remove();

							toastr["success"](obj.message);

							if( $("#usersTable tbody tr").length == 0 )
							{
								//Set empty table text
								$("#usersTable tbody").html(
									'<tr>' +
					                    '<th colspan="6">' +
					                        '<p class="text-center">' +
					                            '<i class="material-icons">add</i><br>' +
					                            'You do not have registered users !' +
					                        '</p>' +
					                    '</th>' +
					                '</tr>'
								);
							}
						}

					});
		        },
		        cancel: function () {
		        }
		    }
		});
	});

	//Function to see password
	$(document).on("click", "#seePassword", function(){
		var curStatus = $("#password").attr("type");

		if( curStatus == 'password' ) {
			$("#password").attr('type', 'text');
			$(this).attr('title', 'Hide password').removeClass('fa-eye').addClass('fa-eye-slash');
		} else {
			$("#password").attr('type', 'password');
			$(this).attr('title', 'See password').removeClass('fa-eye-slash').addClass('fa-eye');
		}
	});

	//change user status
	$(document).on('click', '#changeStatusUser', function(){
		var userID = $(this).attr('data-id');
		var thisIs = $(this);

		$.confirm({
		    title: 'Are you sure ?',	
		    content: 'Want to change user status !',
		    buttons: {
		        confirm: function () {

					toastr["info"]("Processing...");
					
					$.post(baseUrl + 'auth/user/changeStatus', {
						userID: userID
					}, function(response){

						var obj = JSON.parse(response);

						if( obj.error == false )
						{
							//Change user row status
							$("#usersTable #userRow" + userID + " .userStatus").html(obj.statustext);
							$("#usersTable #userRow" + userID + " #changeStatusUser").text(obj.btntext);

							toastr["success"](obj.message);
						}

					});
		        },
		        cancel: function () {
		        }
		    }
		});
	});

	// Initialize form validation on the registration form.
	// It has the name attribute "registration"
	$("form#changepassForm").validate({
		// Specify validation rules
		rules: {
			curpass: {
				required: true
			},
			newpass: {
				required: true,
				minlength: 8
			},
			confnewpass: {
				required: true,
				minlength: 8,
				equalTo: '#newpass'
			},
		},
		// Make sure the form is submitted to the destination defined
		// in the "action" attribute of the form when valid
		submitHandler: function(form) {
			var btnInside = $("#changepassSubmit").html();
			$("#changepassSubmit").prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
			$.post(baseUrl + 'auth/profile/change_password', {
				curpass: $("#curpass").val(),
				newpass: $("#newpass").val(),
				confnewpass: $("#confnewpass").val(),
			}, function(response){

				var obj = JSON.parse(response);

				if( obj.error == true ) {
					setTimeout(function(){
						toastr["error"](obj.message);
						$("#changepassSubmit").removeClass('waves-effect').prop('disabled', false).html(btnInside);
					}, 1500);
				}

				if( obj.error == false ) {
					setTimeout(function(){
						toastr["success"](obj.message);
						$("#changepassSubmit").removeClass('waves-effect').prop('disabled', false).html(btnInside);
						$("form#changepassForm").trigger('reset');
					}, 1500);
				}
			});
			return false;
		}
	});


	// Initialize form validation on the registration form.
	// It has the name attribute "registration"
	$("form#updateprofileForm").validate({
		// Specify validation rules
		rules: {
			username: {
				required: true,
				minlength: 5
			},
			fname: {
				required: true
			}
		},
		// Make sure the form is submitted to the destination defined
		// in the "action" attribute of the form when valid
		submitHandler: function(form) {
			var btnInside = $("#updateprofileSubmit").html();
			$("#updateprofileSubmit").prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
			$.post(baseUrl + 'auth/profile/update_profile', {
				username: $("#username").val(),
				fname: $("#fname").val(),
				email: $("#email").val(),
				phone: $("#phone").val(),
			}, function(response){

				var obj = JSON.parse(response);

				if( obj.error == true ) {
					setTimeout(function(){
						toastr["error"](obj.message);
						$("#updateprofileSubmit").removeClass('waves-effect').prop('disabled', false).html(btnInside);
					}, 1500);
				}

				if( obj.error == false ) {
					setTimeout(function(){
						toastr["success"](obj.message);				
						$("#updateprofileSubmit").removeClass('waves-effect').prop('disabled', false).html(btnInside);
					}, 1500);
				}
			});
			return false;
		}
	});

	//On tooltip
	$('[data-toggle="tooltip"]').tooltip();

	//On popover
	$('[data-toggle="popover"]').popover();

	//Copy text onclick
	$(document).on('click', '#copyText, #ethAddrVal', function(){
		var thisIs = $(this);
		var id = thisIs.attr('data-copy');
		var copyText = document.getElementById(id);
		copyText.select();
		document.execCommand("Copy");
		toastr["success"]('Copied !');
	});

	//Update reward token amount
	$("#updateRewardToken").click(function(){

		var reward = $("#rewardToken").val();
		var thisIs = $("#updateRewardToken");

		thisIs.prop('disabled', false).html('<i class="fa fa-spinner fa-spin"></i>');
		
		$.post(baseUrl + 'auth/settings/set_referral_reward', {
			reward: reward
		}, function(response){
			setTimeout(function(){

				var obj = JSON.parse(response);
				thisIs.prop('disabled', false).removeClass('waves-effect').html('Done');

				if( obj.error == true ) {
					toastr["error"](obj.message);
				}

				if( obj.error == false ) {
					toastr["success"](obj.message);
				}
			}, 1500);
		});

	});


	//Update reward token amount
	$("#updateContractTerms").click(function(){
		tinyMCE.triggerSave();
		var terms = $("#contractTerms").val();
		var thisIs = $("#updateContractTerms");

		thisIs.prop('disabled', false).html('<i class="fa fa-spinner fa-spin"></i>');
		
		$.post(baseUrl + 'auth/settings/contract_terms_update', {
			terms: terms
		}, function(response){
			setTimeout(function(){

				var obj = JSON.parse(response);
				thisIs.prop('disabled', false).removeClass('waves-effect').html('Done');

				if( obj.error == true ) {
					toastr["error"](obj.message);
				}

				if( obj.error == false ) {
					toastr["success"](obj.message);
				}
			}, 1500);
		});

	});

	//Call asset reject popup
	$(document).on('click', '#rejectAsset', function(){
		var assetID = $(this).attr('data-asset-id');

		$.post(baseUrl + 'auth/asset/call_popup', {
			callTo: 'reject',
			assetID: assetID
		}, function(response){
			$(".callToPopup").html(response);
			$("#rejectAssetModal").modal();
		});
	});

	//Call asset approve popup
	$(document).on('click', '#approveAsset', function(){
		var assetID = $(this).attr('data-asset-id');

		$.post(baseUrl + 'auth/asset/call_popup', {
			callTo: 'approve',
			assetID: assetID
		}, function(response){
			$(".callToPopup").html(response);
			$("#approveAssetModal").modal();
		});
	});

	//Disable 
	$(document).on("submit", "#approveAssetForm", function(){
		$("#approveAssetFormSubmit").prop("disabled", true);
		return true;
	});
});
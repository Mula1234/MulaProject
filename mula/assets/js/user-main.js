// Wait for the DOM to be ready
$(function() {
	//Set toastr option
	toastr.options = {
	  "preventDuplicates": false,
	}

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
			$.post(baseUrl + 'user/profile/change_password', {
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
						$("form#changepassForm .form-group").addClass('is-empty');
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
			fname: {
				required: true
			}
		},
		// Make sure the form is submitted to the destination defined
		// in the "action" attribute of the form when valid
		submitHandler: function(form) {
			var btnInside = $("#updateprofileSubmit").html();
			$("#updateprofileSubmit").prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
			$.post(baseUrl + 'user/profile/update_profile', {
				fname: $("#fname").val(),
				lname: $("#lname").val(),
				phone: $("#phone").val(),
				country: $("#country").val(),
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

	// Initialize form validation on the registration form.
	// It has the name attribute "registration"
	$("form#assetsForm").validate({
		// Specify validation rules
		rules: {
			asset_type: {
				required: true
			},
			assets_dsc: {
				required: true
			},
			assets_val: {
				required: true,
				digits: true
			},
			assets_docs: {
				required: true
			}
		},
		// Make sure the form is submitted to the destination defined
		// in the "action" attribute of the form when valid
		submitHandler: function(form) {

			var uplaods = $("#uploaded_docs").val();

			if(uplaods == "") {
				toastr["error"]('You must select owner proof documents.');
				return;
			}

			$.confirm({
			    title: 'Are you sure ?',
			    content: 'Want to tokenize the assets !',
			    buttons: {
			        confirm: function () {
						var btnInside = $("#assetSubmit").html();
						$("#assetSubmit").prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
						
						$.post(baseUrl + 'user/assets/upload_assets', {
							asset_type: $("#asset_type").val(),
							assets_dsc: $("#assets_dsc").val(),
							assets_val: $("#assets_val").val(),
							user_sign: $("#user_sign").val(),
							uploaded_docs: uplaods
						}, function(response){

							setTimeout(function(){

								var obj = JSON.parse(response);
								$("#assetSubmit").removeClass('waves-effect').prop('disabled', false).html(btnInside);

								if( obj.error == true ) {
									toastr["error"](obj.message);
								}

								if( obj.error == false ) {
									$('#assets_docs').val("");
									$('#uploaded_docs').val("");
									$("form#assetsForm .form-group").addClass('is-empty');
									$("form#assetsForm").trigger('reset');
									$(".asset_docs_list").html("");
									$("#assetuploadMsg").removeAttr('class').html("");
									$('#resetSign').trigger('click');
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

	//Logout from every where
	$("#logoutEveryWhere").click(function(){
		var btnInside = $(this).html();
			$(this).prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
		$.post(baseUrl + 'user/logout/every_where', {}, function(response){
			var obj = JSON.parse(response);

			setTimeout(function(){
				toastr["success"](obj.message);
				$("#logoutEveryWhere").removeClass('waves-effect').prop('disabled', false).html(btnInside);
			}, 1500);
		});
	});

	//Ajax upload documents
	$('#assets_docs').on('change', function() {
		//CHange upload text
		$(".upload_box_text").text('Uploading...');
	    var file_data = $(this).prop('files')[0];   
	    var form_data = new FormData();
	    //Append file       
	    form_data.append('assets_document', file_data);
	    $.ajax({
	        url: baseUrl + 'user/assets/upload_document',
	        dataType: 'json', 
	        cache: false,
	        contentType: false,
	        processData: false,
	        data: form_data,                         
	        type: 'post',
	        success: function(response){
	        	setTimeout(function(){
		        	//Change upload text
		        	$(".upload_box_text").text('Upload');
		        	$('#assets_docs').val("");

		        	//If error
		            if( response.error == true ) {
						toastr["error"](response.message);
					}

					//If success
					if( response.error == false ) {
						toastr["success"](response.message);
						//Append doc in list
						$(".asset_docs_list").append(
							'<li><a target="_blank" href="'+response.doc_path+'">' +
							response.doc + '</a></li>'
						);

						var nowDocs = $("#uploaded_docs").val();

						//Set docs value
						if( nowDocs != "" ) {
							$("#uploaded_docs").val(nowDocs + ',' + response.doc);
						} else {
							$("#uploaded_docs").val(response.doc);
						}
					}
	        	}, 1500);
	        }
	    });
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

	//Ajax change profile picture

	//Ajax upload documents
	$('#upload_profile').on('change', function() {
		toastr["info"]("Uploading...");
		//CHange upload text
	    var file_data = $(this).prop('files')[0];   
	    var form_data = new FormData();
	    //Append file       
	    form_data.append('profile_dp', file_data);
	    $.ajax({
	        url: baseUrl + 'user/profile/upload_dp',
	        dataType: 'json', 
	        cache: false,
	        contentType: false,
	        processData: false,
	        data: form_data,                         
	        type: 'post',
	        success: function(response){
	        	$('#upload_profile').val("");
	        	setTimeout(function(){
		        	//If error
		            if( response.error == true ) {
						toastr["error"](response.message);
					}

					//If success
					if( response.error == false ) {
						toastr["success"](response.message);
						$("#userProfile").attr('src', response.dp);
					}
	        	}, 1500);
	        }
	    });
	});
});
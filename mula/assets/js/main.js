app.controller('mulaCtrl', function($scope, $http, $window, $timeout){
	//Function to register user
	$scope.doRegister = function(){
		var inLink = $("#signupSubmit").html();
		$("#signupSubmit").prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
		$http.post(baseUrl + 'account/register', {
			fname: $scope.fname,
			email: $scope.email,
			pass: $scope.pass,
			confpass: $scope.confpass,
			referral: $("input#referralLink").val(),
		}).then(function(response){
			if( response.data.error === true ) {
				toastr["error"](response.data.message);
				$("#signupSubmit").removeClass('waves-effect').prop('disabled', false).html(inLink);
			}

			if( response.data.error === false ) {
				$scope.fname = $scope.email = $scope.pass = $scope.confpass = null;
				$scope.registerForm.$setPristine();
				$("#signupSubmit").removeClass('waves-effect').prop('disabled', false).html(inLink);
				$("#registerForm label, #registerForm i.fa").removeClass('active');
				$("#modalLRFormDemo").modal("hide");
				toastr["success"](response.data.message);
			}
		});
	}

	//Function for login user
	$scope.doLogin = function(){
		var inLink = $("#loginSubmit").html();
		$("#loginSubmit").prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
		$http.post(baseUrl + 'account/login', {
			email_address: $scope.email_address,
			password: $scope.password,
			next: $("input#next_url").val(),
			remember: $("#remember").is(":checked") ? 'on' : ''
		}).then(function(response){
			if( response.data.error === true ) {
				toastr["error"](response.data.message);
				$("#loginSubmit").removeClass('waves-effect').prop('disabled', false).html(inLink);
			}

			if( response.data.error === false ) {
				$("#loginSubmit").removeClass('waves-effect').prop('disabled', false).html(inLink);
				$("#modalLRFormDemo").modal("hide");
				toastr["success"](response.data.message);
				$timeout(function(){
					$window.location.href = response.data.url;
				}, 1500);
			}
		});
	}

	//Function for login user
	$scope.doResetPass = function(){
		var inLink = $("#resetSubmit").html();
		$("#resetSubmit").prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
		$http.post(baseUrl + 'account/reset_password', {
			password: $scope.reset.password,
			confpassword: $scope.reset.confpassword,
			token: $("input#resetToken").val()
		}).then(function(response){
			if( response.data.error === true ) {
				$("#resetSubmit").removeClass('waves-effect').prop('disabled', false).html(inLink);
				toastr["error"](response.data.message);
			}

			if( response.data.error === false ) {
				$scope.reset.password = $scope.reset.confpassword = null;
				$scope.resetForm.$setPristine();
				$("#resetSubmit").removeClass('waves-effect').prop('disabled', false).html(inLink);
				$("#resetForm label, #resetForm i.fa").removeClass('active');
				$("#exampleModal").modal("hide");
				toastr["success"](response.data.message);
			}
		});
	}

	//Function for send forgot pass link
	$scope.sendForgotLink = function(){
		var inLink = $("#forgotSubmit").html();
		$("#forgotSubmit").prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
		$http.post(baseUrl + 'account/forgot_password', {
			email_id: $scope.email_id,
		}).then(function(response){
			if( response.data.error === true ) {
				toastr["error"](response.data.message);
				$("#forgotSubmit").removeClass('waves-effect').prop('disabled', false).html(inLink);
			}

			if( response.data.error === false ) {
				$scope.email_id = null;
				$scope.forgotForm.$setPristine();
				$("#forgotForm label, #forgotForm i.fa").removeClass('active');
				$("#forgotSubmit").removeClass('waves-effect').prop('disabled', false).html(inLink);
				toastr["success"](response.data.message);
			}
		});
	}


	//Function for send contact us email
	$scope.sendContact = function(){
		var inLink = $("#contactSubmit").html();
		$("#contactSubmit").prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
		$http.post(baseUrl + 'contact', {
			contact_name: $scope.contact_name,
			contact_email: $scope.contact_email,
			contact_sub: $scope.contact_sub,
			contact_msg: $scope.contact_msg,
		}).then(function(response){
			if( response.data.error === true ) {
				toastr["error"](response.data.message);
				$("#contactSubmit").removeClass('waves-effect').prop('disabled', false).html(inLink);
			}

			if( response.data.error === false ) {
				$scope.contact_name = $scope.contact_email = $scope.contact_sub = $scope.contact_msg = null;
				$scope.contactForm.$setPristine();
				$("#contactSubmit").removeClass('waves-effect').prop('disabled', false).html(inLink);
				$("#contactForm label, #contactForm i.fa").removeClass('active');
				toastr["success"](response.data.message);
			}
		});
	}

});

$(function(){
	$("#demoForm").submit(function(e){
	    var formData = new FormData($(this)[0]);
	    $.ajax({
	        url: baseUrl + 'products/add',
	        type: 'POST',
	        data: formData,
	        async: false,
	        success: function (data) {
	            obj = JSON.parse(data);

	            if( obj.error == true ) {
	            	alert(obj.message);
	            	return;
	            }

	            if( obj.error == false ) {
	            	window.location.href = baseUrl + 'products/token';
	            }
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });
	    return false;
	});
});

// Choosing asset
function chooseAsset(asset)
{
	if( $("input[value='"+asset+"']").is(":checked") )
	{
		$("span[data-asset='"+asset+"']").removeClass('active');
		$("input[value='"+asset+"']").prop('checked', false);
	}
	else
	{
		$("span[data-asset='"+asset+"']").addClass('active');
		$("input[value='"+asset+"']").prop('checked', true);
	}
}

// Create step 2
function createStep2()
{
	var isChecked = $('input[name="assetType[]"]').is(':checked');

	if( ! isChecked ) {
		alert('Please select at least one function for token');
		return;
	}

	$("#Step1").hide();
	$("#Step2").show();
}

// Create step 3
function createStep3()
{
	var tokenName = $("#tokenName").val();
	var tokenSymbol = $("#tokenSymbol").val();
	var tokenRate = $("#tokenRate").val();
	var tokenStart = $("#tokenStart").val();
	var tokenEnd = $("#tokenEnd").val();
	var tokenBenf = $("#tokenBenf").val();
	var assetType = [];

	if( tokenName == "" || tokenSymbol == "" || 
		tokenRate == "" || tokenStart == "" ||
		tokenEnd == "" || tokenBenf == "" )
	{
		alert('You must fill all the fields');
		return;
	}

	$("#Step2").hide();
	$("#Step3").show();
}

// Create step 4
function createStep4()
{
	var tokenName = $("#tokenName").val();
	var tokenSymbol = $("#tokenSymbol").val();
	var tokenRate = $("#tokenRate").val();
	var tokenStart = $("#tokenStart").val();
	var tokenEnd = $("#tokenEnd").val();
	var tokenBenf = $("#tokenBenf").val();

	var assetDesc = $("#assetDesc").val();
	var assetDocs = $("#assetDocs").val();
	var assetValue = $("#assetValue").val();
	var assetType = [];

	if( assetDesc == "" || assetDocs == "" || 
		assetValue == "" )
	{
		alert('You must fill all the fields');
		return;
	}

	$('input[name="assetType[]').each(function(){
		assetType.push($(this).val());
	});

	$("#bindAssetType").text(assetType.join(', '));

	$("#bindTokenName").text(tokenName);
	$("#bindTokenSymbol").text(tokenSymbol);
	$("#bindTokenRate").text(tokenRate);
	$("#bindTokenStart").text(tokenStart);
	$("#bindTokenEnd").text(tokenEnd);
	$("#bindTokenBenf").text(tokenBenf);

	$("#bindAssetDesc").text(assetDesc);
	$("#bindAssetDocs").text(assetDocs);
	$("#bindAssetValue").text(assetValue);

	$("#Step3").hide();
	$("#Step4").show();
}

// Show step 1
function showStep1()
{
	$("#Step1").show();
	$("#Step2").hide();
}

// Show step 2
function showStep2()
{
	$("#Step2").show();
	$("#Step3").hide();
}

// Show step 3
function showStep3()
{
	$("#Step3").show();
	$("#Step4").hide();
}

//Function pay with metamask
function payWithMetamask()
{
	web3.eth.sendTransaction({
		from: web3.eth.accounts[0], 
		to:'0xCb198FE6c2B40848568835EAD87f293F2319E36A',
		value: 10000000000000000
	}, function(err, TxHash){
		if( err ) { 
			alert('ERROR ! an error occur while making transaction. try again.');
			return;
		}
		
		document.getElementById('demoFormSubmit').click();
	});
}
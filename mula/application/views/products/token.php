<script type="text/javascript">

    window.addEventListener('load', function() {
        // Checking if Web3 has been injected by the browser (Mist/MetaMask)
        if (typeof web3 === 'undefined')
        {
            $("#assetList").html('<div class="alert alert-danger text-center">You do not have metamask please add metamask to your browser go to <a href="https://metamask.io">Metamask</a>.</div>');
            return;
        }

        // Use the browser's ethereum provider
        var provider = web3.currentProvider
        web3.eth.getAccounts(function(err, accounts){

            // If error
            if (err != null)
            {
                $("#assetList").html('<div class="alert alert-danger text-center">SORRY ! An Error Occured : ' + err + '</div>');
                return;
            }

            // If no account found
            if(accounts.length == 0)
            {
                $("#assetList").html('<div class="alert alert-danger text-center">Please login to metamask of your browser.</div>');

                var account = web3.eth.accounts[0];
                var accountInterval = setInterval(function() {
                    if (web3.eth.accounts[0] !== account) {
                        account = web3.eth.accounts[0];
                        window.location.reload();
                    }
                }, 1000);

                return;
            }

            web3.version.getNetwork(function(err, netId){
                if( netId != 3 ) {
                    $("#assetList").html('<div class="alert alert-danger text-center">Please select ropsten test network mode in metamask.</div>');
                    return;
                }
            });

            var account = web3.eth.accounts[0];

            var accountInterval = setInterval(function() {
                if (web3.eth.accounts[0] !== account) {
                    account = web3.eth.accounts[0];
                    window.location.reload();
                }
            }, 1000);

			var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function() {

			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("assetList").innerHTML = this.responseText;
			}};

			xhttp.open("GET", baseUrl + 'products/get?address=' + account, true);
			xhttp.send();
        });
    });
</script>
<!-- Start your project here-->
<div class="demo-page">
	<div class="container">
		<div class="heading h2">
        	 <h2>Create Your Token</h2>
        	 <span class="divider"><img src="http://localhost/mula/assets/images/divider-angle.png" alt=""></span>
      	</div>
      	<p>Welcome to the profile page. You can manage your Asset Tokens and account details from here.</p>

      		<p><a class="btn btn-theme" href="<?= base_url('products/builder'); ?>">Create New</a></p>

      		<div id="assetList" class="table-responsive"></div>

	</div>
</div>
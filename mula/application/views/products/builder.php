<script type="text/javascript">

    window.addEventListener('load', function(){
        // Checking if Web3 has been injected by the browser (Mist/MetaMask)
        if (typeof web3 === 'undefined')
        {
            $("#Step1").hide();
            $("#ErrorMetamask").html('You do not have metamask please add metamask to your browser go to <a href="https://metamask.io">Metamask</a>.').show();
            return;
        }

        // Use the browser's ethereum provider
        var provider = web3.currentProvider
        web3.eth.getAccounts(function(err, accounts){

            // If error
            if (err != null)
            {
                $("#Step1").hide();
                $("#ErrorMetamask").html('SORRY ! An Error Occured : ' + err).show();
                return;
            }

            // If no account found
            if(accounts.length == 0)
            {
                $("#Step1").hide();
                $("#ErrorMetamask").text('Please login to metamask of your browser.').show();

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
                    $("#Step1").hide();
                    $("#ErrorMetamask").text('Please select ropsten test network mode in metamask.').show();
                    return;
                }
            });

            var account = web3.eth.accounts[0];

            $("#tokenBenf").val(account);

            var accountInterval = setInterval(function() {
                if (web3.eth.accounts[0] !== account) {
                    account = web3.eth.accounts[0];
                    window.location.reload();
                }
            }, 1000);
        });
    });
</script>

<!-- Start your project here-->
<div class="steps-page step-1">
    <div class="container">

        <div class="heading h2">
            <h2>Create Your Token</h2>
            <span class="divider"><img src="<?= base_url('assets/images/divider-angle.png'); ?>" alt=""></span>
        </div>

        <p>The first step of creating your asset is choosing the type of asset.</p>

        <div class="step-wrapper">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <form id="demoForm" method="POST" style="margin-bottom: 50px;" enctype="multipart/form-data">
                        
                        <div style="display: none;" id="ErrorMetamask"  class="alert alert-danger text-center">
                            You do not have MetaMask. Please add metamask to your browser.
                        </div>

                        <div class="card step-content" id="Step1">

                            <h3>Step 1: Create Token</h3>
                            <p>Choose asset type (these are asset types to select)</p>

                            <div class="token-btns">
                                <?php

                                //Set assets type array for dropdown
                                $assetsType = [
                                'Equity', 'Product/Service'
                                ];

                                foreach ($assetsType as $one):
                                ?>

                                <span onclick="chooseAsset('<?= $one; ?>')" data-asset="<?= $one; ?>" class="selectableBox"><?= $one; ?></span>
                                <input type="checkbox" name="assetType[]" value="<?= $one; ?>">

                                <?php
                                endforeach;
                                ?>
                            </div>

                            <p class="text-center" style="margin: 0">
                                <a href="javascript:void(0);" class="btn btn-theme" onclick="createStep2()">
                                    Next
                                </a>
                            </p>

                        </div>

                        <div class="card step-content" id="Step2" style="display: none;">
                            <h3>Step 2: Provide Token Information</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 token-info-block">
                                    <h4>2.1 Token Info</h4>

                                    <label for="tokenName" class="grey-text">Name</label>
                                    <input type="text" id="tokenName" name="tokenName" class="form-control">
                                    <br>

                                    <label for="tokenSymbol" class="grey-text">Symbol</label>
                                    <input type="text" id="tokenSymbol" name="tokenSymbol" class="form-control">
                                    <br>

                                    <label for="tokenRate" class="grey-text">Conversion Rate</label>
                                    <input type="number" id="tokenRate" name="tokenRate" class="form-control">
                                </div>

                                <div class="col-md-6 token-info-block">
                                    <h4>2.2 Crowdsale Info</h4>

                                    <label for="tokenStart" class="grey-text">Token Start</label>
                                    <input type="date" id="tokenStart" name="tokenStart" class="form-control">
                                    <br>

                                    <label for="tokenEnd" class="grey-text">Token End</label>
                                    <input type="date" id="tokenEnd" name="tokenEnd" class="form-control">
                                    <br>

                                    <label for="tokenBenf" class="grey-text">Beneficiary</label>
                                    <input type="text" id="tokenBenf" name="tokenBenf" class="form-control" readonly>
                                </div>
                            </div>

                            <p class="text-center" style="margin-bottom: 0">

                                <a href="javascript:void(0);" class="btn btn-theme" onclick="showStep1()">
                                    Back
                                </a>

                                <a href="javascript:void(0);" class="btn btn-theme" onclick="createStep3()">
                                    Next
                                </a>
                            </p>
                        </div>


                        <div class="card step-content" id="Step3" style="display: none;">
                            <h3>Step 3: Asset Ownership</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 token-info-block">
                                    <h4>2. Asset Info</h4>

                                    <label for="assetDesc" class="grey-text">Describe your asset or project</label>
                                    <input type="text" id="assetDesc" name="assetDesc" class="form-control">
                                    <br>

                                    <label for="assetDocs" class="grey-text">Upload proof of asset ownership (only png, jpg, jpeg, gif, doc, docx, pdf allowed)</label>
                                    <input type="file" style="border: 0;border-bottom: 1px solid;" id="assetDocs" name="assetDocs" class="form-control">
                                    <br>

                                    <label for="assetValue" class="grey-text">Asset Valuation</label>
                                    <input type="text" id="assetValue" name="assetValue" class="form-control">

                                </div>
                            </div>

                            <p class="text-center" style="margin-bottom: 0">

                                <a href="javascript:void(0);" class="btn btn-theme" onclick="showStep2()">
                                    Back
                                </a>

                                <a href="javascript:void(0);" class="btn btn-theme" onclick="createStep4()">
                                    Next
                                </a>
                            </p>
                        </div>

                        <div class="card step-content" id="Step4" style="display: none">
                            <h3>Step 4. Review Of Asset / Token Information &amp; Payment</h3>
                            <hr>
                            <h4>4.1 Review</h4>

                            <h5 class="text-center">You have provide the following info about your asset</h5>

                            <div class="table-responsive table-bordered">
                                <table class="table table-hover ">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Asset Types</th>
                                            <td id="bindAssetType"></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Token Name</th>
                                            <td id="bindTokenName"></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Token Symbol</th>
                                            <td id="bindTokenSymbol"></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Token Conversion Rate</th>
                                            <td id="bindTokenRate"></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Start Date</th>
                                            <td id="bindTokenStart"></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">End Date</th>
                                            <td id="bindTokenEnd"></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Token Beneficiary</th>
                                            <td id="bindTokenBenf"></td>
                                        </tr>


                                        <tr>
                                            <th scope="row">Asset Description</th>
                                            <td id="bindAssetDesc"></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Asset Document</th>
                                            <td id="bindAssetDocs"></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Asset Value</th>
                                            <td id="bindAssetValue"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="payment-sec">
                                <h4>4.2 Payment</h4>
                                <p class="lower-pera">Current price for TokenGen smart contracts is 0.01 Ether
                                    
                                    <br>
                                    <a href="javascript:void(0);" class="btn btn-theme" onclick="showStep3()">
                                        Back
                                    </a>
                                    <br>

                                    <a href="#" onclick="payWithMetamask()" class="btn btn-theme">Purchase Smart Contracts</a>
                                </p>
                            </div>

                            <input style="visibility: hidden;" type="submit" id="demoFormSubmit" value="submit">

                        </form>
                    </div>
                </div>
            </div>	
        </div>
    </div>
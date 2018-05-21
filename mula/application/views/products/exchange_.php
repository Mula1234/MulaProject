<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/toastr.css'); ?>">


    <title>Mula - Use Our Product (Alpha)</title>
    <style>
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            background-color: #134984;
        }
        .btn-primary.focus, .btn-primary:focus{
            box-shadow: none !important;
        }
        .ErrorMetamask{
            display: none;
        }
        body{
            background: #eeeeef;
        }
        .coin-img a{
            display: flex;
            align-items: flex-start;
            color: #333;
        }
        .from{
            margin: 0 10px;
            position: relative;
        }
        .from-lable {
            color: #999;
            font-size: 12px;
        }
        .coin-name {
            font-weight: 700;
            font-size: 12px;
        }
        .exchange-amount .form-group{
            margin-bottom: 0;
        }
        .exchange-amount .form-control{
            border-bottom: 1px solid #ccc !important;
            border: none;
            border-radius: 0;
        }
        .exchange-amount .form-control:focus{
            box-shadow: none;
            border-bottom-color: #1f497d !important;
        }
        .card{
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            border: 1px solid rgb(223, 223, 223);
        }
        .coin-img{
            width: 33%;
        }
        .exchange-amount{
            width: 67%;
        }
        .coin-img a:hover{
            text-decoration: none;
        }
        .list-card{
            margin-top: 30px;
            margin-bottom: 60px;
        }
        .table-coin-name{
            display: flex;
            flex:1;
        }
        .table-coin-name h5{
            margin-left: 10px;
        }
        .table-coin-name h5 small{
            display: block;
            color: #ccc;
        }
        .btn-buy{
            margin-right: 10px;
        }
        .btn{
            border-radius: 0;
        }
        .navbar{
            margin-bottom: 30px;
            background: #fff;
            border-bottom: 1px solid #ddd;
        }
        #projectToken, #erc20Token {
            list-style: none;
            padding:10px 0;
            margin: 0;
            background: #fff;
            text-align: center;
        }

        #projectToken li, #erc20Token li {
            line-height: 40px;
            width: 24%;
            padding: 0 10px;
            font-size: 14px;
            display: inline-block;
            text-align: center;
            cursor: pointer;
            border: 1px solid #ddd;
            padding-top: 12px;
            border-radius: 4px;
        }

        #projectToken li:hover, #erc20Token li:hover {
            border-color: #5682bd;
        }

        .error{
            font-size: 13px;
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }
        .btn-primary {
            background: #333333;
            border-color: #000000;
        }
        ul.navbar-nav li a {
            font-weight: bold;
            color: #000;
        }

        ul.navbar-nav li:first-child a {
            margin-right: 24px;
        }
        .offer-section {
            margin-top: 30px;
        }
        .offer-section .offer-box {
            padding: 15px;
        }
        .buySellBox ul li{
            width: 50%;text-align: center;
        }
        .buySellBox .tab-pane {
            padding: 0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-sm static-top">
        <div class="container">     
            <a class="navbar-brand" href="<?= base_url(); ?>"><img width="120" src="<?= base_url('/assets/images/logo.png'); ?>" class="logo-img"></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('products/token'); ?>">TOKEN BUILDER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/?next=') . urlencode(base_url('/products/exchange')); ?>">CREATE WALLET</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="top-card">
        <div class="container">
            <div class="error"></div>
            <div class="ErrorMetamask alert alert-danger"></div>
            <div id="detailsOfAddr"></div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-baseline">
                            <div class="coin-img">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#projectTokenModel">
                                    <input type="hidden" id="selectedProject" value="Prop">
                                    <div><img width="30" id="tokenSelectedImg" src="<?= base_url('assets/images/prop-coin.png'); ?>" width="46px"></div>
                                    <div class="from">
                                        <div class="from-lable">PROJECT</div>
                                        <div class="coin-name" id="tokenSelectedCoin"><span>Prop</span> <i class="fas fa-sort-down"></i></div>
                                    </div>
                                </a>
                            </div>
                            <div class="exchange-amount">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="tokenAmount" aria-describedby="emailHelp" placeholder="Enter Amount">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-1 d-flex align-items-center justify-content-center">
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </div>

                        <div class="col-md-4 d-flex align-items-baseline">
                            <div class="coin-img">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#erc20TokenModel">
                                    <input type="hidden" id="selectedERC20" value="MULA">
                                    <input type="hidden" id="metamaskAddr">
                                    <div><img width="30" id="erc20SelectedImg" src="<?= base_url('assets/images/mula-coin-tp.png'); ?>" width="46px"></div>
                                    <div class="from">
                                        <div class="from-lable">ERC20</div>
                                        <div class="coin-name" id="erc20SeletedCoin"><span>MULA</span> <i class="fas fa-sort-down"></i></div>
                                    </div>
                                </a>
                            </div>
                            <div class="exchange-amount">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="erc20Recieve" aria-describedby="emailHelp" placeholder="Receive" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <a href="javascript:;" onclick="doConversionOnClick()" class="btn btn-block btn-primary">Convert</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="offer-section">
        <div class="container">
            <div class="card">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="offer-box">
                                <div class="clearfix">
                                    <img width="95" src="<?= base_url('assets/images/prop-coin.png'); ?>" class="pull-left">
                                    <span class="pull-right">Prop Coin</span>
                                </div>
                                <strong>Buy prop coin at 30$ discount.</strong> <br>
                                - 20% Ownership <br>
                                - Commercial Property London <br>
                                - Inverstment Opportunity
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="offer-box">
                                <div class="clearfix">
                                    <img width="95" src="<?= base_url('assets/images/dragon-token.jpg'); ?>" class="pull-left">
                                    <span class="pull-right">Dragon Game Token</span>
                                </div>
                                <strong>Buy prop coin at 30$ discount.</strong> <br>
                                - Virtual Reality Game <br>
                                - Launch Nov 2018 <br>
                                - 10% Game Ownership Available
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="list-card">
        <div class="container">
            <div class="card">
                <div class="">  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Token Info</th>
                                            <th scope="col">Asset Info</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <div class="table-coin-name">
                                                    <img src="<?= base_url('assets/images/prop-coin.png'); ?>" width="40" height="44">
                                                    <h5>Prop Coin</h5>
                                                </div>
                                            </th>
                                            <td>-</td>
                                            <td>-</td>
                                            <td class="d-flex justify-content-end">
                                                <a href="javascript:void(0);" onclick="buySellModal('buy', 'prop')" class="btn btn-primary btn-buy">Buy</a>
                                                <a href="javascript:void(0);" onclick="buySellModal('sell', 'prop')" class="btn btn-primary">Sell</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="table-coin-name">
                                                    <img src="<?= base_url('assets/images/dragon-token.jpg'); ?>" width="40" height="44">
                                                    <h5>Dragon Game Token</h5>
                                                </div>
                                            </th>
                                            <td>-</td>
                                            <td>-</td>
                                            <td class="d-flex justify-content-end">
                                                <a href="javascript:void(0);" onclick="buySellModal('buy', 'dragon')" class="btn btn-primary btn-buy">Buy</a>
                                                <a href="javascript:void(0);" onclick="buySellModal('sell', 'dragon')" class="btn btn-primary">Sell</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="table-coin-name">
                                                    <img src="<?= base_url('assets/images/crypto-kittie.png'); ?>" width="40" height="44">
                                                    <h5>Crypto Kitties</h5>
                                                </div>
                                            </th>
                                            <td>-</td>
                                            <td>-</td>
                                            <td class="d-flex justify-content-end">
                                                <a href="javascript:void(0);" onclick="buySellModal('buy', 'crypto')" class="btn btn-primary btn-buy">Buy</a>
                                                <a href="javascript:void(0);" onclick="buySellModal('sell', 'crypto')" class="btn btn-primary">Sell</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="table-coin-name">
                                                    <img src="<?= base_url('assets/images/buzz-token.png'); ?>" width="40" height="44">
                                                    <h5>Token Buzz</h5>
                                                </div>
                                            </th>
                                            <td>-</td>
                                            <td>-</td>
                                            <td class="d-flex justify-content-end">
                                                <a href="javascript:void(0);" onclick="buySellModal('buy', 'buzz')" class="btn btn-primary btn-buy">Buy</a>
                                                <a href="javascript:void(0);" onclick="buySellModal('sell', 'buzz')" class="btn btn-primary">Sell</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="convertModel">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Convert</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>From</th>
                                <th>To</th>
                                <th>Receive</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="convertDataRow">
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <button id="convertFunc" class="btn btn-success btn-block" onclick="transferTestBal()">Convert</button>
                    <div class="ErrorMetamask alert alert-danger"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="projectTokenModel">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Project Token</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <ul id="projectToken">
                        <li data-name="Prop">
                            <img width="60" src="<?= base_url('assets/images/prop-coin.png'); ?>"><br>Prop Coin
                        </li>
                        <li data-name="Dragon">
                            <img width="60" src="<?= base_url('assets/images/dragon-token.jpg'); ?>"><br>Dragon Game
                        </li>
                        <li data-name="Crypto">
                            <img width="60" src="<?= base_url('assets/images/crypto-kittie.png'); ?>"><br>Crypto Kittie 
                        </li>
                        <li data-name="Buzz">
                            <img width="60" src="<?= base_url('assets/images/buzz-token.png'); ?>"><br>Buzz Token
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="erc20TokenModel">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ERC20</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <ul id="erc20Token">
                        <li data-name="MULA">
                            <img width="60" src="<?= base_url('assets/images/mula-coin-tp.png'); ?>"><br>MULA
                        </li>
                        <li data-name="ETH">
                            <img width="60" src="<?= base_url('assets/images/eth-icon.png'); ?>"><br>ETH
                        </li>
                        <li data-name="XLM">
                            <img width="60" src="<?= base_url('assets/images/xlm-icon.svg'); ?>"><br>XLM
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tokenBuySellModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Buy OR Sell</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="ErrorMetamask alert alert-danger"></div>

                    <div class="buySellBox">
                        <ul class="nav nav-pills" role="tablist">
                            <li id="buy_tab" class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#buyTab">BUY</a>
                            </li>
                            <li id="sell_tab" class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#sellTab">SELL</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="buyTab" class="container tab-pane active"><br>
                                <input type="hidden" name="whatToBuy" id="whatToBuy">
                                <div class="form-group">
                                    <input id="buyAmount" placeholder="Amount to Buy" class="form-control" type="number" name="buyAmount">
                                </div>
                                <button onclick="doBuySell('buy')" class="btn btn-block btn-primary">Buy</button>
                            </div>
                            <div id="sellTab" class="container tab-pane fade"><br>
                                <input type="hidden" name="whatToSell" id="whatToSell">
                                <div class="form-group">
                                    <input id="sellAmount" placeholder="Amount to Sell" class="form-control" type="number" name="sellAmount">
                                </div>
                                <button onclick="doBuySell('sell')" class="btn btn-block btn-primary">Sell</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

   <div class="modal fade" id="allConverts">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Convert</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="ErrorMetamask alert alert-danger"></div>

                    

                </div>
            </div>
        </div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/js/toastr.js'); ?>"></script>

    <script type="text/javascript">

        window.addEventListener('load', function() {
            // Checking if Web3 has been injected by the browser (Mist/MetaMask)
            if (typeof web3 === 'undefined')
            {
                $('#convertFunc, .buySellBox').remove();
                $(".ErrorMetamask").html('You do not have metamask please add metamask to your browser go to <a href="https://metamask.io">Metamask</a>.').show();
                return;
            }

            // Use the browser's ethereum provider
            var provider = web3.currentProvider
            web3.eth.getAccounts(function(err, accounts){

                // If error
                if (err != null){
                    $('#convertFunc, .buySellBox').remove();
                    $(".ErrorMetamask").html('SORRY ! An Error Occured : ' + err).show();
                    return;
                }

                // If no account found
                if(accounts.length == 0){
                    $('#convertFunc, .buySellBox').remove();
                    $(".ErrorMetamask").text('Please login to metamask of your browser.').show();

                    var account = web3.eth.accounts[0];
                    var accountInterval = setInterval(function(){
                        if (web3.eth.accounts[0] !== account){
                            account = web3.eth.accounts[0];
                            window.location.reload();
                        }
                    }, 1000);

                    return;
                }

                web3.version.getNetwork(function(err, netId){
                    if( netId != 3 ){
                        $('#convertFunc, .buySellBox').remove();
                        $(".ErrorMetamask").text('Please select ropsten test network mode in metamask.').show();
                        return;
                    }
                });

                var account = web3.eth.accounts[0];

                $("#metamaskAddr").val(account);

                getAddressDetails(account);

                var accountInterval = setInterval(function(){
                    if (web3.eth.accounts[0] !== account){
                        account = web3.eth.accounts[0];
                        window.location.reload();
                    }
                }, 1000);
            });
        });
    </script>

    <script type="text/javascript">
        $(function(){

            $(document).on('keyup, change', '#tokenAmount', function(){
                // Token Amount
                var tokenAmount = Number($(this).val());

                // Token Amount Validation
                if( tokenAmount <= 0 ){
                    toastr['error']('Please enter valid amount to be convert.');
                    $('#erc20Recieve').val('');
                    return;
                }

                // Check if amount is > 200
                if( tokenAmount > 200 ) {
                    toastr['error']('Entered amount should not be less than 200.');
                    $('#tokenAmount, #erc20Recieve').val('');
                    return;
                }

                if( tokenAmount !== '' ) {
                    doConversion();
                }
            });


            // On click on projectToken
            $(document).on('click', '#projectToken li', function(){
                var selectedToken = $(this).attr('data-name');

                $('#tokenSelectedCoin span').text(selectedToken);
                $('#selectedProject').val(selectedToken);

                var selectedImg = $(this).find('img').attr('src');
                $('#tokenSelectedImg').attr('src', selectedImg);

                if( $("#tokenAmount").val() != '' ) {
                    doConversion();
                }

                $('#projectTokenModel').modal('hide');
            });

            // On click on erc20Token
            $(document).on('click', '#erc20Token li', function(){
                var selectedToken = $(this).attr('data-name');

                $('#erc20SeletedCoin span').text(selectedToken);
                $('#selectedERC20').val(selectedToken);
                var selectedImg = $(this).find('img').attr('src');
                $('#erc20SelectedImg').attr('src', selectedImg);
                
                if( $("#tokenAmount").val() != '' ) {
                    doConversion();
                }

                $('#erc20TokenModel').modal('hide');
            });
        });

        function doConversionOnClick()
        {
            var tokenAmount = Number($('#tokenAmount').val());

            if( tokenAmount <= 0 ) {
                toastr['error']('Please enter valid amount to be convert.');
                $('#erc20Recieve').val('');
                return;
            }

            doConversion();

            var selectedToken = $("#selectedProject").val();
            var selectedErc = $("#selectedERC20").val();
            var from = $('li[data-name="'+selectedToken+'"]').text();
            var to = $('li[data-name="'+selectedErc+'"]').text();
            var receive = $('#erc20Recieve').val();

            $("#convertDataRow td:first-child").text(from);
            $("#convertDataRow td:nth-child(2)").text(to);
            $("#convertDataRow td:last-child").text(receive);

            $("#convertModel").modal();
        }

        function getAddressDetails(account)
        {
            $.post('<?= base_url('products/show_balances') ?>', {
                address: account
            }, function(response){
                $('#detailsOfAddr').html(response);
                return;
            });
        }

        function doBuySell(what)
        {
            var address = $('#metamaskAddr').val();
            var type = (what == 'buy') ? $('#whatToBuy').val() : $('#whatToSell').val();
            var amount = (what == 'buy') 
                        ? Number($('#buyAmount').val()) : Number($('#sellAmount').val());

            if( amount <= 0 ) {
                toastr['error']('Please enter valid amount.');
                return;
            }

            if( amount > 200 ) {
                toastr['error']('Enter amount should be less or equal to 200.');
                return;
            }

            if( what == 'buy' ) {
                web3.eth.sendTransaction({
                    from: web3.eth.accounts[0], 
                    to:'0xCb198FE6c2B40848568835EAD87f293F2319E36A',
                    value: 10000000000000000
                }, function(err, TxHash){
                    if( err ) { 
                        toastr['error']('Something gone wrong while making transaction.');
                        return;
                    }
                    
                    $.post('<?= base_url('products/add_balance'); ?>', {
                        address: address,
                        balance: amount,
                        type: type
                    }, function(response){
                        var obj = JSON.parse(response);
                        if( obj.success == true ) {
                            $('#buyAmount').val('');
                            $('#tokenBuySellModal').modal('hide');
                            toastr['success']('Token has been transfered to your account.');
                            getAddressDetails(address);
                        }

                        if( obj.success == false ) {
                            toastr['error'](obj.message);
                        }
                    });
                });
            }
        }

        function transferTestBal()
        {
            $('#convertFunc').text('Converting...').prop('disabled', true);

            var forWhich = $('#selectedERC20').val();

            if( forWhich == 'MULA' ) {
                var mainWhich = 'token';
            } else if( forWhich == 'ETH' ) {
                var mainWhich = 'ether';
            } else {
                var mainWhich = 'xlm';
            }

            $.post('<?= base_url('products/add_balance') ?>', {
                address: $('#metamaskAddr').val(),
                balance: $('#erc20Recieve').val(),
                type: mainWhich
            }, function(response){
                $('#convertFunc').text('Convert').prop('disabled', false);
                getAddressDetails($('#metamaskAddr').val());
                $('#tokenAmount, #erc20Recieve').val('');
                toastr['success']('Your exchange was successfull.');
                $('#convertModel').modal('hide');
            });
        }

        function buySellModal(what, which)
        {
            $('#tokenBuySellModal').modal();

            if( what == 'sell' ) {
                $('#sell_tab a').trigger('click');
            } else {
                $('#buy_tab a').trigger('click');
            }
            $('#whatToSell, #whatToBuy').val(which);
        }

        function doConversion()
        {
            var token = $('#selectedProject').val();
            var erc20 = $('#selectedERC20').val();
            var tokenAmount = $('#tokenAmount').val();

            if( tokenAmount == "" && tokenAmount <= 0 ) {
                $('#erc20Recieve').val('');
                return false;
            }

            // Exchange values
            var propToMula = 56;
            var cryptoKittieToMula = 4;
            var buzzToMula = 1;
            var dragonToMula = 500;

            var propToEth = 0.11;
            var cryptoKittieToEth = 0.02;
            var buzzToEth = 0.0008;
            var dragonToEth = 0.3;

            var propToXlm = 23;
            var cryptoKittieToXlm = 1;
            var buzzToXlm = 0.5;
            var dragonToXlm = 0.5;

            switch(token) {
                case 'Prop':

                    switch(erc20) {
                        case 'MULA':
                            $('#erc20Recieve').val(tokenAmount * propToMula);
                        break;

                        case 'ETH':
                            $('#erc20Recieve').val(tokenAmount * propToEth);
                        break;

                        case 'XLM':
                            $('#erc20Recieve').val(tokenAmount * propToXlm);
                        break;
                    }

                    break;

                case 'Dragon':

                    switch(erc20) {
                        case 'MULA':
                            $('#erc20Recieve').val(tokenAmount * dragonToMula);
                        break;

                        case 'ETH':
                            $('#erc20Recieve').val(tokenAmount * dragonToEth);
                        break;

                        case 'XLM':
                            $('#erc20Recieve').val(tokenAmount * dragonToXlm);
                        break;
                    }

                    break;

                case 'Crypto':

                    switch(erc20) {
                        case 'MULA':
                            $('#erc20Recieve').val(tokenAmount * cryptoKittieToMula);
                        break;

                        case 'ETH':
                            $('#erc20Recieve').val(tokenAmount * cryptoKittieToEth);
                        break;

                        case 'XLM':
                            $('#erc20Recieve').val(tokenAmount * cryptoKittieToXlm);
                        break;
                    }

                    break;

                case 'Buzz':

                    switch(erc20) {
                        case 'MULA':
                            $('#erc20Recieve').val(tokenAmount * buzzToMula);
                        break;

                        case 'ETH':
                            $('#erc20Recieve').val(tokenAmount * buzzToEth);
                        break;

                        case 'XLM':
                            $('#erc20Recieve').val(tokenAmount * buzzToXlm);
                        break;
                    }

                    break;
            }
        }
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/toastr.css'); ?>">
    <title>Mula - Exchange | Convert - Tokens</title>
    <style>
        body{
            background: #eeeeef;
        }
        .coin-img a{
            display: flex;
            align-items: center;
            color: #333;
        }
        .from{
            margin: 0 10px;
            float: right;
        }
        .from-lable {
            color: #999;
        }
        .coin-name {
            font-weight: 700;
            font-size: 20px;
        }
        .exchange-amount .form-group{
            margin-bottom: 0;
        }
        .card{
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            border: 1px solid rgb(223, 223, 223);
        }
        .coin-img{
            width: 30%;
        }
        .exchange-amount{
            width: 70%;
        }
        .coin-img a:hover{
            text-decoration: none;
        }
        .list-card{
            margin-bottom: 30px;
        }
        .table-coin-name{
            display: flex;
            flex:1;
        }
        .table-coin-name h5{
            margin-left: 10px;
            line-height: 40px;
        }
        .table-coin-name h5 small{
            display: block;
            color: #ccc;
        }
        .top-card{
            margin-bottom: 30px;
        }
        .top-card .dropdown-menu.show {
            right: 0;
            left: auto !important;
        }
        .btn-buy{
            margin-right: 10px;
        }
        .btn{
            border-radius: 0;
        }
        .exchange{
            text-align: center;
        }
        .exchange h1{
            font-size: 60px;
            line-height: 0;
        }
        .border1{
            border: 1px solid #c7c7c7;
            height: 84px;
        }
        .top-card .form-control{
            border: none;
            padding: 0 4px;
        }
        .top-card .form-control:focus{
            border: none;
            box-shadow: none;
        }
        .border1:active,.border1:focus-within{
            border:1px solid #1f497d;
        }
        .card{
            border-radius: 0;
            box-shadow: 0 2px 4px 0 rgba(0,0,0,0.10);
        }
        .heading{
            margin: 10px;
        }
        .projects-token{
            margin-bottom: 30px;
        }
        .project-image{
            height: 200px;
            background-size: cover;
        }
        .project-logo img{
            background-color: #fff;
        }
        .project-logo {
            display: flex;
            flex: 1;
        }
        .project-logo h2{
            margin-top: 50px;
            margin-left: 20px;
            color: #fff;
            text-shadow: 1px 1px #000;
        }
        .project-details ul{
            padding-left: 0;
            margin-top: 20px;
            list-style: none;
        }
        .project-wrap{
            border:1px solid #c7c7c7; 
        }
        .project-details {
            padding: 15px;
        }
        #BuySellModal .modal-body{
            padding-left: 0; 
            padding-right: 0; 
        }
        #BuySellModal .nav-tabs .nav-item{
            width: 50%;
            text-align: center;
        }
        #BuySellModal .nav-tabs .nav-link{
            color: #777;
            border: none;
            font-weight: 600;
        }
        #BuySellModal .nav-tabs .nav-item.show .nav-link,
        #BuySellModal  .nav-tabs .nav-link.active{
            border: none;
            border-bottom: 2px solid #1f497d;
            color: #1f497d;
        }
        #BuySellModal .tab-content,#SellModal .tab-content{
            padding: 15px;
        }
        #BuySellModal .form-control{
            border: none;
            border-bottom: 1px solid #ced4da;
            border-radius: 0;
            padding-left: 0; 
        }
        #BuySellModal .form-control:focus{
            box-shadow: none;
            border-bottom:2px solid #1f497d;
        }
        .p-relative{
            position: relative;
        }
        .max-0{
            position: absolute;
            bottom: 5px;
            right: 0;
        }
        .max-0 p{
            color: #1f497d;
            text-transform: uppercase;
        }
        .modal-content{
            border-radius: 0;
        }
        .token-modal{
            margin-top: -7px;
            cursor: pointer;
            justify-content: flex-end;
        }
        .down-arrow {
            color: rgb(223, 223, 223);
            font-size: 28px;
            margin-bottom: 20px;
        }
        .rate p span{
            text-align: right;
            float: right;
        }
        #BuySellModal .modal-header{
            background-color: #1f497d;
            border-radius: 0;
            color: #fff;
        }
        #BuySellModal .modal-title{
            text-align: center;
            margin: auto;
        }
        #BuySellModal .modal-header .close{
            padding: 0;
            margin: 0;
            color: #fff;
            opacity: 1;
        }
        .select-coin{
            position: absolute;
            background: #fff;
            top: 0;
            left: 0;
            padding: 15px;
            width: 100%;
            bottom: 0;
            display: none;
        }
        .input-group-addon {
            padding: 15px;
            position: absolute;
            right: 0;
            top: -15px;
            z-index: 9999999;
            cursor: pointer;
        }
        .tokens-wrap{
            text-align: center;
            border: 1px solid #c7c7c7;
            padding-top: 10px;
        }
        .popular-token-list{
            padding-left: 0;
            list-style: none;
        }
        .popular-token-list li{
            float: left;
            width: 23%;
            margin: 4px;
            height: 128px;
        }
        .tokens-wrap h4{
            margin-bottom: 6px;
            margin-top: 8px;
        }
        .tokens-wrap p{
            color: #777;
        }
        .popular-token{
            max-height: 314px;
            overflow-x:hidden;
            overflow-y: auto;
            padding-top: 15px; 
        }
        .dropdown-item{
            padding: 0 10px;
        }
        .dropdown-item .coin-name{
            font-size: 18px;
            font-weight: 300;
        }
        .quick-exchange{
            padding: 20px;
        }
        .exchange-btn {
            width: 250px;
        }
        .btn-primary {
            background: #333333;
            border: 0;
        }
        .btn-primary:focus,
        .btn-primary:hover,
        .btn-primary:active{
            box-shadow: none !important;
        }
        .navbar{
            margin-bottom: 30px;
            background: #fff;
            border-bottom: 1px solid #ddd;
        }
        ul.navbar-nav li a {
            font-weight: bold;
            color: #000;
        }
        ul.navbar-nav li:first-child a {
            margin-right: 24px;
        }
        .mainDD{
            top: 14px !important;
            right: -26px !important;
        }
        .mainDD .dropdown-item {
            border-top: 1px solid #ddd;
            padding: 5px 10px;
        }
        .mainDD .dropdown-item:first-child{
            border-top: 0;
        }
        .mainDD .dropdown-item img {
            margin-right: 8px;
        }
        .mainDD .dropdown-item.active, .dropdown-item:active{
            background: none;
            color: #000;
        }
        ul.popular-token-list li div:hover {
            border-color: #20487d !important;
            cursor: pointer;
        }
        ul.popular-token-list li div p {
            font-size: 13px;
        }
        ul#myTab li {
            width: 50%;
            text-align: center;
        }
        ul#myTab {
            margin-bottom: 10px;
        }
        .close-select-coin {
            position: absolute;
            top: -55px;
            right: 15px;
            font-size: 28px;
            font-weight: 700;
            color: #ffffff;
        }
        .form-control:disabled, .form-control[readonly] {
            background-color: #ffffff;
            opacity: 1;
        }
        .metamaskApp{
            border-radius: 0;
            display: none;
        }
        .btn-primary.disabled, 
        .btn-primary:disabled {
            cursor: not-allowed;
            background: #555555;
        }
        .close-select-coin:hover {
            color: #fff;
            text-decoration: none;
        }
        .accordion{
            margin-bottom: 40px;
        }
        .accordion .card-header{
            padding: 0;
        }
        .accordion .btn.btn-link {
            width: 100%;
            text-align: left;
            color: #333;
            font-weight: 500;
            font-size: 21px;
            transition:  0.3s;
        }
        .accordion .btn.btn-link:hover,.accordion .btn.btn-link:focus,.accordion .btn.btn-link:active{
            color: #fff;
            background: #333;
            transition: 0.3s;
            text-decoration: none;
        }
        .accordion .card-header .active {
            background-color: #333;
        }
        ul.popular-token-list::after {
            content: '';
            display: block;
            clear: both;
        }
        footer#footer-main {
            background: #fff;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }
        #receiveTokenImg {
            width: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm static-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>"><img width="120" src="<?= base_url('/assets/images/logo.png'); ?>" class="logo-img"></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('products/token'); ?>">      TOKEN BUILDER
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="alert alert-danger text-center metamaskApp"></div>
    <section class="top-card">
        <div class="container">
            <div class="card">
                <div class="card-body m-3">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center">CONVERT ANY TOKEN AT ANY TIME</h3>
                            <p class="text-center">Buy and sell your project tokens for Ether and Mula</p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5 d-flex align-items-center border1">
                            <div class="exchange-amount">
                                <div class="form-group">
                                    <label for="send">You Send</label>
                                    <input type="text" class="form-control" id="sendAmount" aria-describedby="emailHelp" placeholder="Enter amount (max. 200)">
                                    <input type="hidden" id="sendChoosed" value="PC">
                                </div>
                            </div>
                            <div class="coin-img">
                                <div class="from">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div style="margin-right: 5px;">
                                                <img id="sendTokenImg" src="<?= base_url('assets/images/prop-coin.png'); ?>" width="50">
                                            </div>
                                            <div class="coin-name" id="sendTokenSymbol">PC</div>
                                        </a>
                                        <div class="mainDD sendDD dropdown-menu" aria-labelledby="dropdownMenuLink" id="sendTokenDD">
                                            <a data-symbol="PC" class="dropdown-item" href="javascript:void(0);">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <img src="<?= base_url('assets/images/prop-coin.png'); ?>" width="40px">
                                                    </div>
                                                    <div class="coin-name"> Prop Coin (PC)</div>
                                                </div>
                                            </a>
                                            <a data-symbol="DG" class="dropdown-item" href="javascript:void(0);">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <img src="<?= base_url('assets/images/dragon-token.jpg'); ?>" width="40px">
                                                    </div>
                                                    <div class="coin-name">Dragon Game (DG)</div>
                                                </div>
                                            </a>
                                            <a data-symbol="CK" class="dropdown-item" href="javascript:void(0);">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <img src="<?= base_url('assets/images/crypto-kittie.png'); ?>" width="40px">
                                                    </div>
                                                    <div class="coin-name">Crypto Kitties (CK)</div>
                                                </div>
                                            </a>
                                            <a data-symbol="BT" class="dropdown-item" href="javascript:void(0);">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <img src="<?= base_url('assets/images/buzz-token.png'); ?>" width="40px">
                                                    </div>
                                                    <div class="coin-name">Buzz Token (BT)</div>
                                                </div>
                                            </a>
                                            <a data-symbol="DNZ" class="dropdown-item" href="javascript:void(0);">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <img src="<?= base_url('assets/images/denimz-token.png'); ?>" width="40px">
                                                    </div>
                                                    <div class="coin-name">Denimz Token</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2  d-flex align-items-center justify-content-center">
                            <div class="exchange">
                                <p>RATE: <strong><span id="exSendSymbol">PC</span> / <span id="exReceiveSymbol">MUT</span></strong></p>
                                <h5 id="tokenExchangeRate">56</h5>
                                <h1 class="exchange-arrow"><a href="#"><i class="fas fa-long-arrow-alt-right"></i></a></h1>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-center border1">
                            <div class="exchange-amount">
                                <div class="form-group">
                                    <label for="send">You Get</label>
                                    <input type="text" class="form-control" id="receiveAmount" aria-describedby="emailHelp" placeholder="Reacive amount" readonly="">
                                    <input type="hidden" id="receiveChoosed" value="MUT">
                                </div>
                            </div>
                            <div class="coin-img">
                                <div class="from">
                                    <div class="dropdown">
                                        <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div style="margin-right: 5px;">
                                                <img id="receiveTokenImg" src="<?= base_url('assets/images/mula-coin-tp.png'); ?>" width="50">
                                            </div>
                                            <div class="coin-name" id="receiveTokenSymbol"> MUT</div>
                                        </a>
                                        <div class="mainDD recieveDD dropdown-menu" aria-labelledby="dropdownMenuLink" id="receiveTokenDD">
                                            <a data-symbol="ETH" class="dropdown-item" href="#">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <img src="<?= base_url('assets/images/eth-icon.png'); ?>" width="40px">
                                                    </div>
                                                    <div class="coin-name">Ether (ETH)</div>
                                                </div>
                                            </a>
                                            <a data-symbol="MUT" class="dropdown-item" href="#">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <img src="<?= base_url('assets/images/mula-coin-tp.png'); ?>" width="40px">
                                                    </div>
                                                    <div class="coin-name">Mula (MUT)</div>
                                                </div>
                                            </a>
                                            <a data-symbol="XLM" class="dropdown-item" href="#">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <img src="<?= base_url('assets/images/xlm-icon.svg'); ?>" width="40px">
                                                    </div>
                                                    <div class="coin-name">Xlm Coin (XLM)</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12  d-flex  justify-content-center">
                            <div class="exchange-btn">
                                <button onclick="doConvertWithMM()" class="btn btn-block btn-lg btn-primary quick-exchange">TOKEN CONVERTER</button>
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
                            <div class="heading">
                                <h3 class="text-center">TOKEN EXCHANGE</h3>
                            </div>
                            <br>
                            <div class="">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">7d Chart</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <div class="table-coin-name">
                                                    <img src="<?= base_url('assets/images/prop-coin.png'); ?>" width="40" height="40">
                                                    <h5>Prop Coin</h5>
                                                </div>
                                            </th>
                                            <td>0.11<br><small>$77.25</small></td>
                                            <td>
                                                <svg width="200" height="40"><linearGradient id="lineargradient6330" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#0096AC" stop-opacity="0.3"></stop><stop offset="100%" stop-color="#0096AC" stop-opacity="0.05"></stop></linearGradient><g transform="translate(-1,0)"><path d="M0,41L0,41L1,41L2,41L3,41L4,41L6,41L7,41L8,41L9,41L10,41L12,41L13,41L14,41L15,41L16,41L18,41L19,41L20,41L21,41L22,41L24,41L25,41L26,41L27,41L29,41L30,41L31,41L32,41L33,41L35,41L36,41L37,41L38,41L39,41L41,41L42,41L43,41L44,41L45,41L47,41L48,41L49,41L50,41L52,41L53,41L54,41L55,41L56,41L58,41L59,41L60,41L61,41L62,41L64,41L65,41L66,41L67,41L68,41L70,41L71,41L72,41L73,41L74,41L76,41L77,41L78,41L79,41L81,41L82,41L83,41L84,41L85,41L87,41L88,41L89,41L90,41L91,41L93,41L94,41L95,41L96,41L97,41L99,41L100,41L101,41L102,41L104,41L105,41L106,41L107,41L108,41L110,41L111,41L112,41L113,41L114,41L116,41L117,41L118,41L119,41L120,41L122,41L123,41L124,41L125,41L127,41L128,41L129,6L130,6L131,6L133,4L134,3L135,2L136,2L137,3L139,4L140,4L141,3L142,4L143,5L145,4L146,4L147,5L148,5L149,5L151,2L152,2L153,2L154,3L156,3L157,1L158,2L159,2L160,1L162,1L163,2L164,2L165,2L166,3L168,3L169,4L170,3L171,3L172,4L174,3L175,4L176,3L177,3L179,4L180,4L181,4L182,5L183,4L185,4L186,4L187,1L188,2L189,3L191,3L192,4L193,4L194,1L195,0L197,2L198,3L199,3L200,4L202,3L202,41Z" stroke="#0096AC" stroke-width="1" fill="url(#lineargradient6330)"></path></g></svg>
                                            </td>
                                            <td class="d-flex justify-content-end">
                                                <a href="javascript:void(0);" class="btn btn-primary btn-buy btnBuy" data-symbol="PC">Buy</a>
                                                <a href="javascript:void(0);" class="btn btn-primary btnSell" data-symbol="PC">Sell</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="table-coin-name">
                                                    <img src="<?= base_url('assets/images/dragon-token.jpg'); ?>" width="40" height="40">
                                                    <h5>Dragon Game Token</h5>
                                                </div>
                                            </th>
                                            <td>0.3<br><small>$210.702</small></td>
                                            <td>
                                                <svg width="200" height="40"><linearGradient id="lineargradient1433" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#0096AC" stop-opacity="0.3"></stop><stop offset="100%" stop-color="#0096AC" stop-opacity="0.05"></stop></linearGradient><g transform="translate(-1,0)"><path d="M0,41L0,35L1,35L2,36L3,35L4,33L6,34L7,34L8,34L9,34L10,34L12,34L13,34L14,34L15,34L16,34L18,34L19,34L20,34L21,34L22,34L24,34L25,34L26,34L27,34L29,32L30,31L31,31L32,31L33,31L35,31L36,31L37,31L38,31L39,31L41,31L42,31L43,31L44,31L45,31L47,31L48,31L49,31L50,31L52,31L53,31L54,31L55,31L56,31L58,31L59,31L60,31L61,31L62,31L64,31L65,31L66,31L67,31L68,31L70,31L71,31L72,31L73,31L74,31L76,31L77,31L78,31L79,31L81,31L82,31L83,31L84,31L85,31L87,31L88,31L89,31L90,31L91,31L93,31L94,31L95,28L96,28L97,28L99,28L100,28L101,28L102,28L104,28L105,28L106,28L107,28L108,28L110,28L111,28L112,28L113,28L114,28L116,28L117,28L118,28L119,28L120,28L122,28L123,28L124,28L125,28L127,28L128,28L129,28L130,28L131,28L133,28L134,28L135,22L136,20L137,21L139,24L140,28L141,27L142,23L143,29L145,26L146,30L147,26L148,30L149,37L151,31L152,31L153,31L154,29L156,27L157,25L158,29L159,29L160,26L162,27L163,27L164,27L165,29L166,24L168,26L169,25L170,26L171,27L172,30L174,29L175,29L176,27L177,28L179,26L180,27L181,28L182,31L183,28L185,29L186,28L187,6L188,17L189,22L191,23L192,23L193,23L194,11L195,0L197,18L198,22L199,20L200,20L202,22L202,41Z" stroke="#0096AC" stroke-width="1" fill="url(#lineargradient1433)"></path></g></svg>
                                            </td>
                                            <td class="d-flex justify-content-end">
                                                <a href="javascript:void(0);" class="btn btn-primary btn-buy btnBuy" data-symbol="DG">Buy</a>
                                                <a href="javascript:void(0);" class="btn btn-primary btnSell" data-symbol="DG">Sell</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="table-coin-name">
                                                    <img src="<?= base_url('assets/images/crypto-kittie.png'); ?>" width="40" height="40">
                                                    <h5>Crypto Kitties</h5>
                                                </div>
                                            </th>
                                            <td>0.02<br><small>$14.04</small></td>
                                            <td>
                                                <svg width="200" height="40"><linearGradient id="lineargradient5087" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#0096AC" stop-opacity="0.3"></stop><stop offset="100%" stop-color="#0096AC" stop-opacity="0.05"></stop></linearGradient><g transform="translate(-1,0)"><path d="M0,41L0,13L1,13L2,13L3,12L4,12L6,12L7,9L8,9L9,9L10,9L12,9L13,9L14,9L15,9L16,9L18,9L19,9L20,9L21,9L22,9L24,9L25,9L26,9L27,9L29,9L30,9L31,9L32,9L33,9L35,9L36,9L37,9L38,9L39,9L41,9L42,9L43,9L44,9L45,9L47,9L48,9L49,9L50,9L52,9L53,9L54,9L55,9L56,9L58,9L59,9L60,9L61,9L62,9L64,9L65,9L66,9L67,9L68,9L70,9L71,9L72,9L73,9L74,9L76,9L77,9L78,9L79,9L81,9L82,9L83,9L84,9L85,9L87,9L88,9L89,9L90,9L91,9L93,9L94,9L95,9L96,9L97,9L99,9L100,9L101,9L102,9L104,9L105,9L106,9L107,9L108,9L110,9L111,9L112,9L113,9L114,9L116,9L117,9L118,9L119,9L120,9L122,9L123,9L124,9L125,9L127,9L128,9L129,11L130,37L131,37L133,37L134,37L135,18L136,21L137,16L139,20L140,20L141,18L142,20L143,23L145,20L146,23L147,21L148,24L149,29L151,24L152,21L153,21L154,21L156,22L157,18L158,16L159,15L160,14L162,14L163,16L164,16L165,17L166,17L168,18L169,19L170,20L171,20L172,23L174,22L175,22L176,20L177,18L179,19L180,19L181,21L182,20L183,20L185,21L186,19L187,4L188,10L189,10L191,11L192,13L193,13L194,2L195,0L197,7L198,10L199,9L200,10L202,10L202,41Z" stroke="#0096AC" stroke-width="1" fill="url(#lineargradient5087)"></path></g></svg>
                                            </td>
                                            <td class="d-flex justify-content-end">
                                                <a href="javascript:void(0);" class="btn btn-primary btn-buy btnBuy" data-symbol="CK">Buy</a>
                                                <a href="javascript:void(0);" class="btn btn-primary btnSell" data-symbol="CK">Sell</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div class="table-coin-name">
                                                    <img src="<?= base_url('assets/images/buzz-token.png'); ?>" width="40" height="40">
                                                    <h5>Token Buzz</h5>
                                                </div>
                                            </th>
                                            <td>0.0008<br><small>$0.56</small></td>
                                            <td>
                                                <svg width="200" height="40"><linearGradient id="lineargradient6674" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#0096AC" stop-opacity="0.3"></stop><stop offset="100%" stop-color="#0096AC" stop-opacity="0.05"></stop></linearGradient><g transform="translate(-1,0)"><path d="M0,41L0,20L1,18L2,18L3,15L4,15L6,20L7,20L8,20L9,20L10,20L12,21L13,21L14,21L15,25L16,27L18,28L19,26L20,26L21,26L22,21L24,23L25,24L26,22L27,21L29,24L30,24L31,0L32,15L33,9L35,11L36,18L37,20L38,26L39,28L41,29L42,26L43,25L44,25L45,25L47,25L48,27L49,27L50,26L52,25L53,28L54,28L55,29L56,25L58,23L59,24L60,19L61,24L62,25L64,25L65,24L66,23L67,21L68,20L70,27L71,25L72,25L73,23L74,23L76,24L77,25L78,27L79,29L81,28L82,25L83,22L84,23L85,22L87,19L88,19L89,19L90,19L91,18L93,18L94,18L95,27L96,27L97,27L99,27L100,25L101,25L102,35L104,33L105,34L106,30L107,32L108,37L110,32L111,31L112,34L113,34L114,34L116,34L117,34L118,34L119,35L120,31L122,31L123,31L124,29L125,29L127,25L128,31L129,23L130,29L131,31L133,31L134,31L135,27L136,30L137,31L139,31L140,31L141,31L142,27L143,32L145,25L146,34L147,31L148,34L149,35L151,29L152,25L153,29L154,31L156,31L157,32L158,31L159,31L160,28L162,31L163,30L164,31L165,31L166,32L168,31L169,33L170,32L171,32L172,33L174,31L175,32L176,33L177,32L179,31L180,30L181,31L182,33L183,29L185,28L186,29L187,0L188,22L189,22L191,24L192,24L193,24L194,11L195,6L197,18L198,21L199,20L200,19L202,23L202,41Z" stroke="#0096AC" stroke-width="1" fill="url(#lineargradient6674)"></path></g></svg>
                                            </td>
                                            <td class="d-flex justify-content-end">
                                                <a href="javascript:void(0);" class="btn btn-primary btn-buy btnBuy" data-symbol="TB">Buy</a>
                                                <a href="javascript:void(0);" class="btn btn-primary btnSell" data-symbol="TB">Sell</a>
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
    <section class="projects-token">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                                <h3 class="text-center">PROJECT TOKEN SALES</h3>
                                <p class="text-center">Popular projects </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="project-wrap">
                                <div class="project-image" style="background: url('<?= base_url("assets/images/prop-coin-banner.jpg"); ?>');">
                                    <div class="project-logo">
                                        <div class="">
                                            <img src="<?= base_url('assets/images/prop-coin.png'); ?>" width="100px">
                                        </div>
                                    </div>
                                </div>
                                <div class="project-details">
                                    <ul>
                                        <h4>Buy Prop Coin now at 30% Discount</h4>
                                        <li>- 20% Ownership</li>
                                        <li>- Commercial Property London</li>
                                        <li>- Investment Opportunity</li>
                                    </ul>
                                    <a href="javascript:void(0);" class="btn btn-primary btn-block btn-lg btnBuy" data-symbol="PC">Buy</a>
                                    <div class="progress" style="height: 10px;margin-top: 10px;">
                                        <div class="progress-bar" style="width:30%"></div>
                                    </div>
                                    <small>30% OF TOKEN SOLD</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="project-wrap">
                                <div class="project-image" style="background: url('<?= base_url("assets/images/dragon-game-banner.jpg"); ?>');">
                                    <div class="project-logo">
                                        <div class="">
                                            <img src="<?= base_url('assets/images/dragon-token.jpg'); ?>" width="100px">
                                        </div>
                                    </div>
                                </div>
                                <div class="project-details">
                                    <ul>
                                        <h4>Buy Dragon Coin now at 21% Discount</h4>
                                        <li>- Virtual Reality Game</li>
                                        <li>- Launch Nov 2018</li>
                                        <li>- 10% Game Ownership Available</li>
                                    </ul>
                                    <a href="javascript:void(0);" class="btn btn-primary btn-block btn-lg btnBuy" data-symbol="DG">Buy</a>
                                    <div class="progress" style="height: 10px;margin-top: 10px;">
                                        <div class="progress-bar" style="width:50%"></div>
                                    </div>
                                    <small>50% OF TOKEN SOLD</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="project-wrap" style="margin-top: 30px;">
                                <div class="project-image" style="background: url('<?= base_url("assets/images/buzz-token-banner.jpg"); ?>');">
                                    <div class="project-logo">
                                        <div class="">
                                            <img src="<?= base_url('assets/images/buzz-token.png'); ?>" width="100px">
                                        </div>
                                    </div>
                                </div>
                                <div class="project-details">
                                    <ul>
                                        <h4>Buy Buzz Token now at 15% Discount</h4>
                                        <li>- Energy Drink Token</li>
                                        <li>- Launch Oct 2018</li>
                                        <li>- 20% Ownership available </li>
                                    </ul>
                                    <a href="javascript:void(0);" class="btn btn-primary btn-block btn-lg btnBuy" data-symbol="BT">Buy</a>
                                    <div class="progress" style="height: 10px;margin-top: 10px;">
                                        <div class="progress-bar" style="width:80%"></div>
                                    </div>
                                    <small>80% OF TOKEN SOLD</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="project-wrap" style="margin-top: 30px;">
                                <div class="project-image" style="background: url('<?= base_url("assets/images/denimz-token-banner.jpg"); ?>');">
                                    <div class="project-logo">
                                        <div class="">
                                            <img src="<?= base_url('assets/images/denimz-token.png'); ?>" width="100px">
                                        </div>
                                    </div>
                                </div>
                                <div class="project-details">
                                    <ul>
                                        <h4>Buy Denimz Token now at 20% Discount</h4>
                                        <li>- Men’s fashion brand</li>
                                        <li>- Launched 2017</li>
                                        <li>- 23% Equity available</li>
                                    </ul>
                                    <a href="javascript:void(0);" class="btn btn-primary btn-block btn-lg btnBuy" data-symbol="DNZ">Buy</a>
                                    <div class="progress" style="height: 10px;margin-top: 10px;">
                                        <div class="progress-bar" style="width:60%"></div>
                                    </div>
                                    <small>60% OF TOKEN SOLD</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="BuySellModal" tabindex="-1" role="dialog" aria-labelledby="BuyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="BuyModalLabel">Convert</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <input type="hidden" id="forWhatOpen">
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="buy-tab" data-toggle="tab" href="#buy" role="tab" aria-controls="buy" aria-selected="true">Buy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Sell-tab" data-toggle="tab" href="#Sell" role="tab" aria-controls="Sell" aria-selected="false">Sell</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="buy-tab">
                        <div class="alert alert-danger metamaskApp"></div>
                        <div class="tab-pane fade show active" id="buy" role="tabpanel" aria-labelledby="buy-tab">
                            <div class="form-group p-relative">
                                <label for="pay-with">PAY WITH</label>
                                <input type="email" class="form-control" id="pay-with" placeholder="Enter Amount">
                                <input type="hidden" id="buyPay" value="ETH">
                                <div class="max-0">
                                    <p>Max - <span class="metamaskBal">0</span> <img src="https://user-images.githubusercontent.com/542863/31909920-9c465162-b7f0-11e7-90d5-abe260c0eced.png" width="25"></p>
                                    <div class="d-flex token-modal" data-what="buyPay">
                                        <div style="margin-right: 4px;">
                                            <img src="<?= base_url("assets/images/eth-icon.png") ?>" width="25px">
                                        </div>
                                        <div class="coin-name"><span class="selected-symbol">ETH</span> <i class="fas fa-caret-down"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="down-arrow">
                                <i class="fas fa-long-arrow-alt-down"></i>
                            </div>
                            <div class="form-group p-relative">
                                <label for="pay-with">RECEIVE</label>
                                <input type="email" class="form-control" id="pay-with-receive" placeholder="Enter Amount" readonly>
                                <input type="hidden" id="buyReceive" value="MUT">
                                <div class="max-0">
                                    <div class="d-flex token-modal" data-what="buyReceive">
                                        <div style="margin-right: 4px;">
                                            <img src="<?= base_url("assets/images/mula-coin-tp.png") ?>" width="25">
                                        </div>
                                        <div class="coin-name"><span class="selected-symbol">MUT</span> <i class="fas fa-caret-down"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rate">
                                <p>RATE : <span class="text-right"><span id="rateBuyTab">1 ETH = 21725 MUT</span></p>
                            </div>
                            <button type="button" onclick="buyWithMM()" class="btn btn-primary btn-block btn-buy-sell">BUY</button>
                        </div>
                        <div class="tab-pane fade" id="Sell" role="tabpanel" aria-labelledby="Sell-tab">
                            <div class="form-group p-relative">
                                <label for="sell-with">SELL</label>
                                <input type="email" class="form-control" id="sell-with" placeholder="Enter Amount">
                                <input type="hidden" id="sellSell" value="MUT">
                                <div class="max-0">
                                    <p>Max - <span class="metamaskBal">0</span> <img src="https://user-images.githubusercontent.com/542863/31909920-9c465162-b7f0-11e7-90d5-abe260c0eced.png" width="25"></p>
                                    <div class="d-flex token-modal" data-what="sellSell">
                                        <div style="margin-right: 4px;">
                                            <img src="<?= base_url("assets/images/mula-coin-tp.png") ?>" width="25">
                                        </div>
                                        <div class="coin-name"><span class="selected-symbol">MUT</span> <i class="fas fa-caret-down"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="down-arrow">
                                <i class="fas fa-long-arrow-alt-down"></i>
                            </div>
                            <div class="form-group p-relative">
                                <label for="pay-with">RECEIVE</label>
                                <input type="email" class="form-control" id="sell-with-receive" placeholder="Enter Amount" readonly>
                                <input type="hidden" id="sellReceive" value="ETH">
                                <div class="max-0">
                                    <div class="d-flex token-modal" data-what="sellReceive">
                                        <div style="margin-right: 4px;">
                                            <img src="<?= base_url("assets/images/eth-icon.png") ?>" width="25">
                                        </div>
                                        <div class="coin-name"><span class="selected-symbol">ETH</span> <i class="fas fa-caret-down"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rate">
                                <p>RATE : <span id="rateSellTab">1 MUT = 0.00004602991 ETH</span></p>
                            </div>
                            <button onclick="sellWithMM()" type="button" class="btn btn-primary btn-block btn-buy-sell">SELL</button>
                        </div>
                    </div>
                    <div class="select-coin">
                        <div class="popular-token">

                            <a href="javascript:void(0);" onclick="$('.select-coin').fadeOut();" class="close-select-coin">
                                &times;
                            </a>
                            <ul class="popular-token-list">
                                <li data-for="ETH">
                                    <div class="tokens-wrap">
                                        <div>
                                            <img src="<?= base_url("assets/images/eth-icon.png") ?>" width="40">
                                        </div>
                                        <h4>ETH</h4>
                                        <P>Ether</P>
                                    </div>
                                </li>
                                <li data-for="MUT">
                                    <div class="tokens-wrap">
                                        <div>
                                            <img src="<?= base_url("assets/images/mula-coin-tp.png") ?>" width="40">
                                        </div>
                                        <h4>MUT</h4>
                                        <P>Mula</P>
                                    </div>
                                </li>
                                <li data-for="XLM">
                                    <div class="tokens-wrap">
                                        <div>
                                            <img src="<?= base_url("assets/images/xlm-icon.svg") ?>" width="40">
                                        </div>
                                        <h4>XLM</h4>
                                        <P>Xlm coin</P>
                                    </div>
                                </li>
                                <li data-for="PC">
                                    <div class="tokens-wrap">
                                        <div>
                                            <img src="<?= base_url("assets/images/prop-coin.png") ?>" width="40">
                                        </div>
                                        <h4>PC</h4>
                                        <P>Prop Coin</P>
                                    </div>
                                </li>
                                <li data-for="DG">
                                    <div class="tokens-wrap">
                                        <div>
                                            <img src="<?= base_url("assets/images/dragon-token.jpg") ?>" width="40">
                                        </div>
                                        <h4>DG</h4>
                                        <P>Dragon Game</P>
                                    </div>
                                </li>
                                <li data-for="CK">
                                    <div class="tokens-wrap">
                                        <div>
                                            <img src="<?= base_url("assets/images/crypto-kittie.png") ?>" width="40">
                                        </div>
                                        <h4>CK</h4>
                                        <P>Crypto Kitties</P>
                                    </div>
                                </li>
                                <li data-for="BT">
                                    <div class="tokens-wrap">
                                        <div>
                                            <img src="<?= base_url("assets/images/buzz-token.png") ?>" width="40">
                                        </div>
                                        <h4>BT</h4>
                                        <P>Buzz Token</P>
                                    </div>
                                </li>
                                <li data-for="DNZ">
                                    <div class="tokens-wrap">
                                        <div>
                                            <img src="<?= base_url("assets/images/denimz-token.png") ?>" width="40">
                                        </div>
                                        <h4>DNZ</h4>
                                        <P>Denimz Token</P>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1 class="text-center">FAQ's</h1>
        <hr>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="projects-tab" data-toggle="tab" href="#projects" role="tab" aria-controls="projects" aria-selected="true">FOR PROJECTS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="backers-tab" data-toggle="tab" href="#backers" role="tab" aria-controls="backers" aria-selected="false">FOR BACKERS</a>
            </li>
        </ul>
        <div class="tab-content" id="buy-tab">
            <div class="tab-pane fade show active" id="projects" role="tabpanel" aria-labelledby="projects-tab">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    - Can I tokenize any project?
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                Yes, we do however verify the validity of projects through their smart contracts.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    - How much equity do I have to stake?                                           
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                This is entirely up to the project owner. You have the option of creating a utility token or an Equity token, both have different functions as explained in the token builder.    

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    - What fees do you charge?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                We don’t charge any investment fees. Our goal is to provide great projects with access to funding. We are a platform for the community.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="backers" role="tabpanel" aria-labelledby="backers-tab">
                <div class="accordion" id="accordionExample2">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    What happens after I have invested in a Project?
                                </button>
                            </h5>
                        </div>

                        <div id="collapseFour" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample2">
                            <div class="card-body">
                                You have the option to keep your project tokens or sell them back to the Mula bonding curve smart contract at any time.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    - What if there are no buyers for my tokens?                                          
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample2">
                            <div class="card-body">
                                Every project token is continuously liquid through a liquidity mechanism. Project tokens can be bought and sold without a buyer or seller being present.    
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    - How is Mula different to traditional crowdfunding platforms? 
                                </button>
                            </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample2">
                            <div class="card-body">
                                1. We don’t charge any fees.
                                2. Projects are validated autonomously using a proof of project protocol which makes the process 98% more efficient, faster and safer to use.
                                3. Token backers  are able to make a profitable exit at any time by selling tokens back to the smart contract instead of having to wait 3-6 years for an exit.  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="margin-bottom: 50px;">
                    <div class="card-body"> 
                        <h1 class="text-center">GET EARLY ACCESS</h1>
                        <h3 class="text-center">To the best new projects</h3>
                        <br>
                        <form onsubmit="
                            toastr['success']('Email has been added to subscribe list.');
                            $('#subscribe').val('');
                            return false;">
                            <table width="40%" border="0" align="center">
                                <tr>
                                    <td><input placeholder="Enter email" id="subscribe" type="email" class="form-control" required></td>
                                    <td><button type="submit" class="btn btn-primary btn-block">SUBMIT</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <p>
                        <small>
                            Mula is the first business funding platform that chargesno fees and provides<br>instant and continuous liquidity.
                        </small>
                    </p>
                </div>
                <div class="col-sm-4">
                    <p class="text-right">
                        <small>
                            Contact Us <br>
                            <a href="mailto:invest@mulacoins.io">
                                invest@mulacoins.io
                            </a>
                        </small>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/js/toastr.js'); ?>"></script>

<script type="text/javascript">
/**
 * JQuery operation code buy / sell / exchange
 */
$(function(){

    /**
     * Pay with change
     */
    $('#pay-with').keyup(function(){
        updateBuyInterface();
    });

    // -------------------------------------------------------------------


    /**
     * Sell with
     */
    $('#sell-with').keyup(function(){
        updateSellInterface();
    });

    // -------------------------------------------------------------------

    /**
     * send token drop down click
     */
    $("#sendTokenDD a").click(function(){
        var img = $(this).find('img').attr('src');
        var symbol = $(this).attr('data-symbol');

        $('#sendChoosed').val(symbol);
        $('#sendTokenImg').attr('src', img);
        $('#sendTokenSymbol, #exSendSymbol').text(symbol);

        doConvert();
    });

    // ------------------------------------------------------------------

    /**
     * recieve token drop down click
     */
    $("#receiveTokenDD a").click(function(){
        var img = $(this).find('img').attr('src');
        var symbol = $(this).attr('data-symbol');

        $('#receiveTokenImg').attr('src', img);
        $('#receiveChoosed').val(symbol);
        $('#receiveTokenSymbol, #exReceiveSymbol').text(symbol);

        doConvert();
    });

    // ------------------------------------------------------------------

    /**
     * on click button of buy
     */
    $('.btnBuy').click(function(){
        var symbol = $(this).attr('data-symbol');

        $('.select-coin').hide();

        $('#buy-tab').trigger('click');
        $('#BuySellModal').modal();
    });

    // ------------------------------------------------------------------

    /**
     * on click btn of sell
     */
    $('.btnSell').click(function(){
        var symbol = $(this).attr('data-symbol');

        $('.select-coin').hide();

        $('#sellSell').val(symbol);

        $('#Sell-tab').trigger('click');
        $('#BuySellModal').modal();
    });

    // ------------------------------------------------------------------

    /**
     * open token modal
     */
    $('.token-modal').click(function(){
        var openSelectCoinFor = $(this).attr('data-what');

        // show all
        $('.popular-token-list li').each(function(){
            $(this).show();
        });

        // hide based on condition
        switch(openSelectCoinFor)
        {
            case 'buyPay':
                    var selected = $('#buyReceive').val();
                    $('.popular-token-list li[data-for="'+selected+'"]').hide();
                    updateBuyInterface();
                break;

            case 'buyReceive':
                    var selected = $('#buyPay').val();
                    $('.popular-token-list li[data-for="'+selected+'"]').hide();
                    updateBuyInterface();
                break;

            case 'sellSell':
                    var selected = $('#sellReceive').val();
                    $('.popular-token-list li[data-for="'+selected+'"]').hide();
                    updateSellInterface(); 
                break;

            case 'sellReceive':
                    var selected = $('#sellSell').val();
                    $('.popular-token-list li[data-for="'+selected+'"]').hide();
                    updateSellInterface();
                break;
        }

        $('#forWhatOpen').val(openSelectCoinFor);
        $('.select-coin').fadeIn();
    });

    // ------------------------------------------------------------------

    /**
     * on click popup of token
     */
    $(document).on('click', '.popular-token-list .tokens-wrap', function(){        
        var forWhatOpen = $('#forWhatOpen').val();
        var thisIs = $(this);
        var findIn = $('div.token-modal[data-what="'+forWhatOpen+'"]');

        // find and replace
        findIn.find('img').attr('src', $(this).find('img').attr('src'));
        findIn.find('span').text(thisIs.find('h4').text());

        //Set value
        $('#' + forWhatOpen).val(thisIs.find('h4').text());

        updateBuyInterface();
        updateSellInterface();

        $('.select-coin').hide();
    });

    // ------------------------------------------------------------------

    /**
     * on change or keyup the send amount field
     */
    $(document).on('keyup change', '#sendAmount', function(){
        doConvert();
    });
});

// ------------------------------------------------------------------

/**
 * Conversion function
 */
function doConvert()
{
    // get all fields value
    var sendAmount = Number($('#sendAmount').val());
    var receiveAmount = $('#receiveAmount');
    var tokenExchangeRate = $('#tokenExchangeRate');
    var sendChoosed = $('#sendChoosed').val();
    var receiveChoosed = $('#receiveChoosed').val();

    // Exchange values
    var propToMula = 56;
    var cryptoKittieToMula = 4;
    var buzzToMula = 1;
    var dragonToMula = 500;
    var denimzToMula = 40;

    var propToEth = 0.11;
    var cryptoKittieToEth = 0.02;
    var buzzToEth = 0.0008;
    var dragonToEth = 0.3;
    var denimzToEth = 0.0018;

    var propToXlm = 23;
    var cryptoKittieToXlm = 1;
    var buzzToXlm = 0.5;
    var dragonToXlm = 0.5;
    var denimzToXml = 3.89;

    // cnoverter conditions
    switch(sendChoosed) {
        case 'PC':

            switch(receiveChoosed)
            {
                case 'MUT':
                    tokenExchangeRate.text(propToMula);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * propToMula);
                    }
                break;

                case 'ETH':
                    tokenExchangeRate.text(propToEth);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * propToEth);
                    }
                break;

                case 'XLM':
                    tokenExchangeRate.text(propToXlm);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * propToXlm);
                    }
                break;
            }

            break;

        case 'DG':

            switch(receiveChoosed)
            {
                case 'MUT':
                    tokenExchangeRate.text(dragonToMula);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * dragonToMula);
                    }
                break;

                case 'ETH':
                    tokenExchangeRate.text(dragonToEth);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * dragonToEth);
                    }
                break;

                case 'XLM':
                    tokenExchangeRate.text(dragonToXlm);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * dragonToXlm);
                    }
                break;
            }

            break;

        case 'DNZ':

            switch(receiveChoosed)
            {
                case 'MUT':
                    tokenExchangeRate.text(denimzToMula);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * denimzToMula);
                    }
                break;

                case 'ETH':
                    tokenExchangeRate.text(denimzToEth);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * denimzToEth);
                    }
                break;

                case 'XLM':
                    tokenExchangeRate.text(denimzToXml);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * denimzToXml);
                    }
                break;
            }

            break;

        case 'CK':

            switch(receiveChoosed)
            {
                case 'MUT':
                    tokenExchangeRate.text(cryptoKittieToMula);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * cryptoKittieToMula);
                    }
                break;

                case 'ETH':
                    tokenExchangeRate.text(cryptoKittieToEth);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * cryptoKittieToEth);
                    }
                break;

                case 'XLM':
                    tokenExchangeRate.text(cryptoKittieToXlm);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * cryptoKittieToXlm);
                    }
                break;
            }

            break;

        case 'BT':

            switch(receiveChoosed) {
                case 'MUT':
                    tokenExchangeRate.text(buzzToMula);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * buzzToMula);
                    }
                break;

                case 'ETH':
                    tokenExchangeRate.text(buzzToEth);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * buzzToEth);
                    }
                break;

                case 'XLM':
                    tokenExchangeRate.text(buzzToXlm);

                    if( checkPassed() )
                    {
                        receiveAmount.val(sendAmount * buzzToXlm);
                    }
                break;
            }

            break;
    }

    // ------------------------------------------------------------------

    /**
     * check for amount to be proper
     */
    function checkPassed()
    {
        // if overflow
        if( sendAmount > 200 )
        {
            receiveAmount.val('');
            toastr['error']('Maximum amount to be convert is 200.');
            return false;
        }

        // send amount
        if( sendAmount > 0)
        {
            return true;
        }

        return false;
    }
}

// ------------------------------------------------------------------

/**
 * Convert with metamask make transaction from metamask
 */
function doConvertWithMM()
{
    // amount to be convert
    sendAmount = Number($('#sendAmount').val());

    // check amount not valid
    if( sendAmount <= 0)
    {
        toastr['error']('Please enter send amount to be convert.');
        return false;
    }

    // check amount overflow
    if( sendAmount > 200 )
    {
        toastr['error']('Maximum amount to be convert is 200.');
        return false;
    }

    /**
     * Make transaction metamask web3
     */
    web3.eth.sendTransaction({
        from: web3.eth.accounts[0],
        // address to
        to:'0xCb198FE6c2B40848568835EAD87f293F2319E36A',
        value: 10000000000000000
    }, function(err, TxHash){

        // if error
        if( err )
        {
            toastr['error']('Something gone wrong while making transaction.');
            return;
        }
            
        // success and return
        toastr['success']('Test amount has been transfered to your account.');
        $('#sendAmount, #receiveAmount').val('');
        return;
    });
}

// ------------------------------------------------------------------

/**
 * Sell with metamask make transaction from metamask
 */
function sellWithMM(id = 'sell-with')
{
    // amount to be convert
    sendAmount = Number($('#' + id ).val());

    // check amount not valid
    if( sendAmount <= 0)
    {
        toastr['error']('Please enter valid amount.');
        return false;
    }

    // check amount overflow
    if( sendAmount > 200 )
    {
        toastr['error']('Maximum amount to be enter is 200.');
        return false;
    }

    /**
     * Make transaction metamask web3
     */
    web3.eth.sendTransaction({
        from: web3.eth.accounts[0],
        // address to
        to:'0xCb198FE6c2B40848568835EAD87f293F2319E36A',
        value: 10000000000000000
    }, function(err, TxHash){

        // if error
        if( err )
        {
            toastr['error']('Something gone wrong while making transaction.');
            return;
        }

        // hide modal
        $('#BuySellModal').modal('hide');
        $('#' + id + ', #pay-with-receive ,#sell-with-receive').val('');
            
        // success and return
        toastr['success']('Test amount has been transfered to your account.');
        $('#sendAmount, #receiveAmount').val('');
        return;
    });
}

// ------------------------------------------------------------------

/**
 * Buy with metamask make transaction from metamask
 */
function buyWithMM()
{
    sellWithMM('pay-with');
}

// ------------------------------------------------------------------

/**
 * Function to update sell interface
 */
function updateSellInterface()
{
    var val = $('#sell-with').val();

    if( val <= 0 ) {
        $('#sell-with-receive').val('');
        return;
    }

    var ETH = {
        "PC": 0.11,
        "CK": 0.02,
        "BT": 0.0008,
        "DG": 0.3,
        "DNZ": 0.0018,
        "MUT": 0.00004,
        "XLM": 0.0004
    };

    var XLM = {
        "PC": 0.00363,
        "CK": 0.02,
        "BT": 0.5,
        "DG": 0.06,
        "DNZ": 0.2222,
        "MUT": 10,
        "ETH": 0.0004
    };

    var MUT = {
        "PC": 0.00036,
        "CK": 0.002,
        "BT": 0.05,
        "DG": 0.006,
        "DNZ": 0.00013,
        "XLM": 0.1,
        "ETH": 0.00004
    };

    var DNZ = {
        "PC": 0.0163,
        "CK": 0.09,
        "BT": 2.25,
        "DG": .006,
        "XLM": 4.5,
        "MUT": 45,
        "ETH": 0.0018
    };

    var DG = {
        "PC": 2.7272,
        "CK": 15,
        "BT": 375,
        "XLM": 166.666,
        "MUT": 7500,
        "DNZ": 750,
        "ETH": 0.3
    };

    var PC = {
        "CK": 5.5,
        "BT": 137.5,
        "DG": 0.366,
        "XLM": 275,
        "MUT": 2750,
        "DNZ": 61.11,
        "ETH": 0.0008
    };

    var CK = {
        "PC": 0.181,
        "BT": 25,
        "DG": 2,
        "XLM": 0.066,
        "MUT": 500,
        "DNZ": 50,
        "ETH": 0.02
    };

    var BT = {
        "PC": 0.0072,
        "CK": 0.4,
        "DG": 0.0026,
        "XLM": 0.444,
        "MUT": 20,
        "DNZ": 2,
        "ETH": 0.11
    };

    var pay         = $('#sellSell').val();
    var receive    = $('#sellReceive').val();
    var payAmount = Number($('#sell-with').val());

    switch(pay) {
        case 'ETH':
            $('#sell-with-receive').val( payAmount * ETH[receive] );
            $('#rateSellTab').text( '1 ' + pay + ' = ' + ETH[receive] +' '+ receive );
            break;

        case 'MUT':
            $('#sell-with-receive').val( payAmount * MUT[receive] );
            $('#rateSellTab').text( '1 ' + pay + ' = ' + MUT[receive] +' '+ receive );
            break;

        case 'XLM':
            $('#sell-with-receive').val( payAmount * XLM[receive] );
            $('#rateSellTab').text( '1 ' + pay + ' = ' + XLM[receive] +' '+ receive );
            break;

        case 'PC':
            $('#sell-with-receive').val( payAmount * PC[receive] );
            $('#rateSellTab').text( '1 ' + pay + ' = ' + PC[receive] +' '+ receive );
            break;

        case 'DG':
            $('#sell-with-receive').val( payAmount * DG[receive] );
            $('#rateSellTab').text( '1 ' + pay + ' = ' + DG[receive] +' '+ receive );
            break;

        case 'CK':
            $('#sell-with-receive').val( payAmount * CK[receive] );
            $('#rateSellTab').text( '1 ' + pay + ' = ' + CK[receive] +' '+ receive );
            break;

        case 'BT':
            $('#sell-with-receive').val( payAmount * BT[receive] );
            $('#rateSellTab').text( '1 ' + pay + ' = ' + BT[receive] +' '+ receive );
            break;

        case 'DNZ':
            $('#sell-with-receive').val( payAmount * DNZ[receive] );
            $('#rateSellTab').text( '1 ' + pay + ' = ' + DNZ[receive] +' '+ receive );
            break;
    }
}

// ------------------------------------------------------------------

/**
 * Function to update buy interface
 */
function updateBuyInterface()
{
    var val = $('#pay-with').val();

    if( val <= 0 ) {
        $('#pay-with-receive').val('');
        return;
    }

    var ETH = {
        "PC": 0.11,
        "CK": 0.02,
        "BT": 0.0008,
        "DG": 0.3,
        "DNZ": 0.0018,
        "MUT": 0.00004,
        "XLM": 0.0004
    };

    var XLM = {
        "PC": 0.00363,
        "CK": 0.02,
        "BT": 0.5,
        "DG": 0.06,
        "DNZ": 0.2222,
        "MUT": 10,
        "ETH": 0.0004
    };

    var MUT = {
        "PC": 0.00036,
        "CK": 0.002,
        "BT": 0.05,
        "DG": 0.006,
        "DNZ": 0.00013,
        "XLM": 0.1,
        "ETH": 0.00004
    };

    var DNZ = {
        "PC": 0.0163,
        "CK": 0.09,
        "BT": 2.25,
        "DG": .006,
        "XLM": 4.5,
        "MUT": 45,
        "ETH": 0.0018
    };

    var DG = {
        "PC": 2.7272,
        "CK": 15,
        "BT": 375,
        "XLM": 166.666,
        "MUT": 7500,
        "DNZ": 750,
        "ETH": 0.3
    };

    var PC = {
        "CK": 5.5,
        "BT": 137.5,
        "DG": 0.366,
        "XLM": 275,
        "MUT": 2750,
        "DNZ": 61.11,
        "ETH": 0.0008
    };

    var CK = {
        "PC": 0.181,
        "BT": 25,
        "DG": 2,
        "XLM": 0.066,
        "MUT": 500,
        "DNZ": 50,
        "ETH": 0.02
    };

    var BT = {
        "PC": 0.0072,
        "CK": 0.4,
        "DG": 0.0026,
        "XLM": 0.444,
        "MUT": 20,
        "DNZ": 2,
        "ETH": 0.11
    };

    var pay         = $('#buyPay').val();
    var receive    = $('#buyReceive').val();
    var payAmount = Number($('#pay-with').val());

    switch(pay) {
        case 'ETH':
            $('#pay-with-receive').val( payAmount * ETH[receive] );
            $('#rateBuyTab').text( '1 ' + pay + ' = ' + ETH[receive] +' '+ receive );
            break;

        case 'MUT':
            $('#pay-with-receive').val( payAmount * MUT[receive] );
            $('#rateBuyTab').text( '1 ' + pay + ' = ' + MUT[receive] +' '+ receive );
            break;

        case 'XLM':
            $('#pay-with-receive').val( payAmount * XLM[receive] );
            $('#rateBuyTab').text( '1 ' + pay + ' = ' + XLM[receive] +' '+ receive );
            break;

        case 'PC':
            $('#pay-with-receive').val( payAmount * PC[receive] );
            $('#rateBuyTab').text( '1 ' + pay + ' = ' + PC[receive] +' '+ receive );
            break;

        case 'DG':
            $('#pay-with-receive').val( payAmount * DG[receive] );
            $('#rateBuyTab').text( '1 ' + pay + ' = ' + DG[receive] +' '+ receive );
            break;

        case 'CK':
            $('#pay-with-receive').val( payAmount * CK[receive] );
            $('#rateBuyTab').text( '1 ' + pay + ' = ' + CK[receive] +' '+ receive );
            break;

        case 'BT':
            $('#pay-with-receive').val( payAmount * BT[receive] );
            $('#rateBuyTab').text( '1 ' + pay + ' = ' + BT[receive] +' '+ receive );
            break;

        case 'DNZ':
            $('#pay-with-receive').val( payAmount * DNZ[receive] );
            $('#rateBuyTab').text( '1 ' + pay + ' = ' + DNZ[receive] +' '+ receive );
            break;
    }
}

// ------------------------------------------------------------------

// ------------------------------------------------------------------
// METAMASK INTERFACE CODE JAVASCRIPT
// ------------------------------------------------------------------

/**
 * @var
 * 
 * Alert message variables
 */
var ERR_NO_METAMASK     = 'You do not have a <strong>metamask</strong>. please add <a href="https://metamask.io">metamask</a> to your browser.';
var ERR_WRONG_NETWORK   = 'You are inside wrong network please select <strong>ropsten test network</strong> in metamask.';
var ERR_NOT_LOGIN       = 'You are not logged in to <strong>metamask</strong> please login.';

/**
 * @checks
 * 
 * check for metamask different errors
 */
window.addEventListener('load', function(){

    var appId = '.metamaskApp';

    /**
     * @check
     * 
     * Check if type of web3js is defined or not
     */
    if( typeof web3 === 'undefined' )
    {
        // alert and return application
        metamask_error(appId, ERR_NO_METAMASK);
        return;
    }

    // ------------------------------------------------------------

    /**
     * @check
     *
     * Check for account related things and errors
     */
    web3.eth.getAccounts(function(err, accounts){

        /**
        * @check
        * 
        * If there is any error found inside metamask
        */
        if (err != null)
        {
            // alert and return application
            metamask_error(appId, err);
            return;
        }

        // --------------------------------------------------------

        /**
         * @check
         * 
         * If there is no account found | mean metamask not logged in
         */
        if(accounts.length == 0)
        {
            /**
             * @check
             *
             * Continously check if there is change in account (user logged in) load page
             */
            track_change();

            // alert and return application
            metamask_error(appId, ERR_NOT_LOGIN);
            return;
        }

        // ------------------------------------------------------------

        /**
         * @check
         * 
         * Check for correct network of metamask
         */
        web3.version.getNetwork((err, netId) => {

            /**
             * @check
             * 
             * If there is any error found inside metamask
             */
            if (err != null)
            {
                // alert and return application
                metamask_error(appId, err);
                return;
            }

            if( netId != 3 )
            {
                // alert and return application
                metamask_error(appId, ERR_WRONG_NETWORK);
                track_change();
                return;
            }

            // --------------------------------------------------------

            /**
             * Keep tracking on metamask activity
             */
            track_change();

            // --------------------------------------------------------

            /** 
             * @GET Balance and address of user
             */
            var account = web3.eth.accounts[0];

            web3.eth.getBalance(account, (err, balance) => {

                /**
                 * @check
                 * 
                 * If there is any error found inside metamask
                 */
                if (err != null)
                {
                    // alert and return application
                    metamask_error(appId, err);
                    return;
                }
                    
                $('.metamaskBal').text(web3.fromWei(balance, "ether").toFixed(6));

                //startApp();
            });

        });
    });
});


// -----------------------------------------------------

/**
 * @param boxId
 *
 * Function to alert error of metamasks checks
 */
function metamask_error(appId, msg)
{
    var alert_box = $(appId);
    // disable buttons
    $('.quick-exchange, .btn-buy-sell').prop('disabled', true);
    // alert user for different message
    alert_box.show().html(msg);
}

// -----------------------------------------------------

/**
 * @function
 *
 * Checking for slight change in metamask
 */
function track_change()
{
    var account = web3.eth.accounts[0];
    // keep track changes in metamask
    var accountInterval = setInterval(function(){
        if (web3.eth.accounts[0] !== account){
            window.location.reload();
        }
    }, 2000);
}

/**
 * @function
 *
 * Start application
 */
function startApp()
{
    alert('Application started . . .');
}
</script>
</body>
</html>
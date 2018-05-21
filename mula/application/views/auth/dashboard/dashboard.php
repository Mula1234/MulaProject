<div class="content dashboard-content">
    <div class="container-fluid">

         <div class="row">

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Users</p>
                        <h3 class="title"> <?= $userCount ?>
                            <small class="unit-bit"> <?= $userCount > 1 ? 'USERS' : 'USER'; ?></small>
                        </h3>
                        <a class="btn btn-primary btn-xs" href="<?= base_url('auth/user'); ?>">Manage</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="fab fa-ethereum"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Ether Balance</p>
                        <h3 class="title "> <?= round($eth_balance, 8) ?> 
                            <small class="unit-bit"> ETH</small>
                        </h3>
                        <a class="btn btn-primary btn-xs" data-target="#sendETH" data-toggle="modal">Send</a> 
                        <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ethAddress">Address</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <img src="<?= base_url('assets/images/mula-icon-new.png'); ?>">
                    </div>
                    <div class="card-content">
                        <p class="category"><?= TNAMEL; ?> Balance</p>
                        <h3 class="title "> <?= $mut_balance ?> 
                            <small class="unit-bit"> <?= TSYMBOL; ?></small>
                        </h3>
                        <a class="btn btn-primary btn-xs" data-target="#sendMula" data-toggle="modal">Send</a> 
                        <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#ethAddress">Address</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div id="ethAddress" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>ETH and Mula Address</h3>
            </div>
            <div class="modal-body">
                <input type="text" id="ethAddrVal" value="<?= $eth_address; ?>" data-copy="ethAddrVal" readonly>
                <p>
                    <img src="https://chart.googleapis.com/chart?cht=qr&chs=250x250&choe=UTF-8&chl=<?= $eth_address; ?>">
                </p>
                <p class="modal-title">Copy this address or scan QR code.</p>
            </div>
        </div>
    </div>
</div>


<div id="sendMula" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Send MUL to address</h3>
            </div>
            <div class="modal-body">
                <form id="sendMulaForm" action="<?= base_url('/user/wallet/send_mula') ?>" method="post">
                    <div class="form-group label-floating">
                        <label class="control-label">Address</label>
                        <input type="text" id="ercaddr" name="ercaddr" class="form-control" required>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Token Value</label>
                        <input type="number" id="tokenval" name="tokenval" class="form-control" required>
                    </div>
                    <button type="submit" id="mulaSendSubmit" class="btn btn-block btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="sendETH" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Send ETH to address</h3>
            </div>
            <div class="modal-body">
                <form id="sendETHForm" action="<?= base_url('/user/wallet/send_eth') ?>" method="post">
                    <div class="form-group label-floating">
                        <label class="control-label">Address</label>
                        <input type="text" id="ethaddr" name="ethaddr" class="form-control" required>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Amount</label>
                        <input type="number" id="ethval" name="ethval" class="form-control" required>
                    </div>
                    <button type="submit" id="ethSendSubmit" class="btn btn-block btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
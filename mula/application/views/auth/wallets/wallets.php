<div class="content dashboard-content">
    <div class="container-fluid">

         <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="fab fa-ethereum"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Ethereum</p>
                        <h3 class="title "><?= round($ethbal, 10); ?>
                            <small class="unit-bit"> ETH</small>
                        </h3>
                        <a class="btn btn-primary btn-xs" data-target="#sendETH" data-toggle="modal">Send</a> 
                        <a class="btn btn-primary btn-xs" id="getAddress" data-type="eth" data-user="<?= $userID; ?>">Address</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="red">
                        <img src="<?= base_url('assets/images/mula-icon-new.png'); ?>">
                    </div>
                    <div class="card-content">
                        <p class="category"><?= TNAMEL; ?></p>
                        <h3 class="title "><?= $tokenbal; ?>
                            <small class="unit-bit"> <?= TSYMBOL; ?></small>
                        </h3>
                        <a class="btn btn-primary btn-xs" data-target="#sendMula" data-toggle="modal">Send</a> 
                        <a class="btn btn-primary btn-xs" id="getAddress" data-type="eth" data-user="<?= $userID; ?>">Address</a>
                    </div>
                </div>
            </div>   
        </div>
        <div class="bouns-reffrl-link">
         <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8">
                <div class="card-panel card-alert">
                    <div   class="card-content sponsor-alert">
                        <div class="input-group">
                         <span  class="input-group-addon">User Referral link:</span>
                            <input   class="form-control" id="referrerCopy" readonly value="<?= $referral_link; ?>" type="text">
                            <span   class="input-group-btn"> <a id="copyText" data-copy="referrerCopy" class="btn btn-xs">Copy</a> </span> 
                        </div>
                    </div>
                </div>  
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card card-stats bounse">
                    <div class="card-content clearfix">
                        <p class="category pull-left">Earned Bonuses</p>
                        <p class=" lat-bonse pull-right"><?= ($bonous ? $bonous : 0).' '.TSYMBOL; ?>
                        </p>
                    </div>
                </div>
            </div>
         </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-stats bounse">
                    <div class="card-content clearfix">

<table class="table mulValTable">
    <tr>
        <td><strong>1 ETH</strong></td>
        <td><strong class="text-success"><?= number_format(TETHVAL) .' '. TSYMBOL; ?></strong></td>
    </tr>
    <tr>
        <td><strong>1 <?= TSYMBOL; ?></strong></td>
        <td><strong class="text-success"><?= TVALETH * $rates['eth']; ?> USD</strong></td>
    </tr>
</table>
                        
                    </div>
                </div>
            </div>

            <?php if($tokenbal): ?>

            <div class="col-md-6">
                <div class="card card-stats bounse">
                    <div class="card-content clearfix">

<table class="table mulValTable">
    <tr>
        <td><strong>User Have <span class="text-success"><?= $tokenbal .' '. TSYMBOL ?></span> Of Worth <span class="text-success"><?= ((int) $tokenbal > 100) ? TVALETH * $tokenbal : 0; ?> ETH</span></strong></td>
    </tr>
    <tr>
        <td><strong>User Have <span class="text-success"><?= $tokenbal .' '. TSYMBOL ?></span> Of Worth <span class="text-success"><?= ((int) $tokenbal > 100) ? $rates['btc_eth'] * TVALETH * $tokenbal : 0; ?> BTC</span></strong></td>
    </tr>
</table>

                    </div>
                </div>
            </div>

            <?php endif; ?>
        </div>

    </div>
</div>

<div id="popupModal"></div>

<div id="sendMula" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Send MUL to User</h3>
            </div>
            <div class="modal-body">
                <form id="sendMulaForm" action="<?= base_url('/user/wallet/send_mula') ?>" method="post">
                    <div class="form-group label-floating">
                        <label class="control-label">Address</label>
                        <input type="text" value="<?= $ethaddress; ?>" id="ercaddr" name="ercaddr" class="form-control" required disabled>
                        <label><small>You can not change user address</small></label>
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
                <h3>Send ETH to User</h3>
            </div>
            <div class="modal-body">
                <form id="sendETHForm" action="<?= base_url('/user/wallet/send_eth') ?>" method="post">
                    <div class="form-group label-floating">
                        <label class="control-label">Address</label>
                        <input type="text" value="<?= $ethaddress; ?>" id="ethaddr" name="ethaddr" class="form-control" required disabled>
                        <label><small>You can not change user address</small></label>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Amount</label>
                        <input type="number" id="ethval" name="ethval" class="form-control" required>
                        <label><small class="text-left">Transaction fee <?= TXFEE ?> will be apply.</small></label>
                    </div>
                    <button type="submit" id="ethSendSubmit" class="btn btn-block btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

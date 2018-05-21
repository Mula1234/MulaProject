<div class="content dashboard-content">
    <div class="container-fluid">

         <div class="row">
            <!-- <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange">
                        <i class="fab fa-bitcoin"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">BitCoin</p>
                        <h3 class="title">0.0
                            <small class="unit-bit"> BTC</small>
                        </h3>
                        <a class="btn btn-primary btn-xs" id="getAddress" data-type="btc">Address</a>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="green">
                        <i class="fab fa-ethereum"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Ethereum</p>
                        <h3 class="title "><?= round($ethbal, 8); ?>
                            <small class="unit-bit"> ETH</small>
                        </h3>
                        <button class="btn btn-primary btn-xs" data-target="#exchangeETHtoMUT" data-toggle="modal"<?= $ethbal > 0 ? "" : " disabled"; ?>>Exchange</button> 
                        <button class="btn btn-primary btn-xs" data-target="#sendETH" data-toggle="modal"<?= $ethbal > 0 ? "" : " disabled"; ?>>Send</button> 
                        <a class="btn btn-primary btn-xs" id="getAddress" data-type="eth">Address</a>
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
                        <button class="btn btn-primary btn-xs" data-target="#exchangeMUTtoETH" data-toggle="modal"<?= ($tokenbal > 0 && $ethbal > 0) ? "" : " disabled"; ?>>Exchange</button> 
                        <button class="btn btn-primary btn-xs" data-target="#sendMula" data-toggle="modal"<?= ($tokenbal > 0 && $ethbal > 0) ? "" : " disabled"; ?>>Send</button> 
                        <a class="btn btn-primary btn-xs" id="getAddress" data-type="eth">Address</a>
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
                         <span  class="input-group-addon">Your referral link:</span>
                            <input   class="form-control" id="referrerCopy" readonly value="<?= $referral_link; ?>" type="text">
                            <span   class="input-group-btn"> <a id="copyText" data-copy="referrerCopy" class="btn btn-xs">Copy</a> </span> 
                        </div>
                        <p><small><strong>You will recieve <?= $reward.' '.TSYMBOL; ?> for each referral.</strong></small></p>
                    </div>
                </div>  
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card card-stats bounse">
                    <div class="card-content clearfix">
                        <p class="category pull-left">Bonuses</p>
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

            <?php if($tokenbal > 1000): ?>

            <div class="col-md-6">
                <div class="card card-stats bounse">
                    <div class="card-content clearfix">

<table class="table mulValTable">
    <tr>
        <td><strong>You Have <span class="text-success"><?= $tokenbal .' '. TSYMBOL ?></span> Of Worth <span class="text-success"><?= TVALETH * $tokenbal; ?> ETH</span></strong></td>
    </tr>
    <tr>
        <td><strong>You Have <span class="text-success"><?= $tokenbal .' '. TSYMBOL ?></span> Of Worth <span class="text-success"><?= $rates['btc_eth'] * TVALETH * $tokenbal; ?> BTC</span></strong></td>
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
                        <label><small class="text-left">Transaction fee <?= TXFEE ?> will be apply.</small></label>
                    </div>
                    <button type="submit" id="ethSendSubmit" class="btn btn-block btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="exchangeETHtoMUT" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Exchange ETH to <?= TSYMBOL; ?></h3>
            </div>
            <div class="modal-body">
                <form id="exchangeETHtoMUTForm" action="<?= base_url('/user/wallet/exchange_to_mula'); ?>" method="post">
                    <div class="form-group label-floating">
                        <label class="control-label">Amount</label>
                        <input type="number" id="ethvalexch" name="ethvalexch" class="form-control" required>
                        <label><small class="text-left">Transaction fee <?= TXFEE ?> will be apply.</small></label>
                    </div>
                    <button type="submit" id="exchangeETHtoMUTSubmit" class="btn btn-block btn-primary">Exchange</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="exchangeMUTtoETH" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Exchange <?= TSYMBOL; ?> to ETH</h3>
            </div>
            <div class="modal-body">
                <form id="exchangeMUTtoETHForm" action="<?= base_url('/user/wallet/exchange_to_eth'); ?>" method="post">
                    <div class="form-group label-floating">
                        <label class="control-label">Amount</label>
                        <input type="number" id="mutvalexch" name="mutvalexch" class="form-control" required>
                        <label><small class="text-left">Transaction fee <?= TXFEE ?> will be apply.</small></label>
                    </div>
                    <button type="submit" id="exchangeMUTtoETHSubmit" class="btn btn-block btn-primary">Exchange</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title"><i class="fa fa-clock"></i>  Transaction History</h4>
                    </div>
                    <div class="card-content table-responsive">
<table class="table">
    <thead class="text-primary">
        <th>Type</th>
        <th>From</th>
        <th>Tx</th>
        <th>To</th>
        <th>Amount</th>
        <th>Tx Hash</th>
        <th>Time</th>
    </thead>
    <tbody>

        <?php if($history->num_rows()): ?>

            <?php foreach($history->result() as $one): ?>

                <tr>
                    <td>
                        <strong><?= strtoupper($one->type); ?></strong>
                        <?php if( $one->by == 'referral' ): ?>
                            <br><small>REWARD</small>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="javascript:void(0);" title="<?= $one->from; ?>" data-toggle="tooltip">
                            <?= strdots($one->from, 10); ?>
                        </a>
                    </td>
                    <td class="">
                        <?php if(strpos($one->type, '-') !== false): ?>

                            <button class="btn btn-warning btn-xs">Ex</button>

                        <?php else: ?>
                            <?php if(isset($address) && $one->from == $address ): ?>

                                <button class="btn btn-danger btn-xs">out</button>

                            <?php elseif( !isset($address) ): ?>

                                <button class="btn btn-success btn-xs">Tx</button>

                            <?php else: ?>

                                <button class="btn btn-success btn-xs">in</button>

                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="javascript:void(0);" title="<?= $one->to; ?>" data-toggle="tooltip">
                            <?= strdots($one->to, 10); ?>
                        </a>
                    </td>
                    <td><?= $one->amount; ?></td>
                    <td>
                        <a target="_blank" href="<?= TX_LINK . $one->tx_hash; ?>" title="<?= $one->tx_hash; ?>" data-toggle="tooltip">
                            <?= strdots($one->tx_hash, 16); ?>
                        </a>
                    </td>
                    <td><?= $one->created_at; ?></td>
                </tr>

            <?php endforeach; ?>

        <?php else: ?>


            <tr>
                <td colspan="7" class="text-center">
                    <br>
                    <i class="fa fa-clock fa-4x" style="color: #ccc;"></i><br><br>

                    No transaction history found !
                </td>
            </tr>

        <?php endif; ?>

    </tbody>
</table>

<?= $pagination; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
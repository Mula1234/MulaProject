<div id="ethAddress" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3><?= $head; ?></h3>
            </div>
            <div class="modal-body">
                <input type="text" id="ethAddrVal" value="<?= $address; ?>" data-copy="ethAddrVal" readonly>
                <p>
                    <img src="https://chart.googleapis.com/chart?cht=qr&chs=250x250&choe=UTF-8&chl=<?= $address; ?>">
                </p>
                <p class="modal-title">Copy this address or scan QR code.</p>
            </div>
        </div>
    </div>
</div>
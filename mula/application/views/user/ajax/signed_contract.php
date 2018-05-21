<div id="signedContract" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Asset Signed Contract</h3>
            </div>
            <div class="modal-body text-left">
                <?= $contractTerms ?>

                <img src="<?= base_url(SIGNPATH . $assetData->user_sign); ?>"><br>
                <strong><?= $assetData->created_at; ?></strong><br>
                <strong><?= $assetData->created_ip; ?></strong>
            </div>
        </div>
    </div>
</div>
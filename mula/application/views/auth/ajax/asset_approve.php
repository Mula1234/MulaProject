<div id="approveAssetModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Approve request Tokenize the asset</h3>
            </div>
            <div class="modal-body">
                <form id="approveAssetForm" action="<?= base_url('/auth/asset/approve'); ?>" method="post">
                    <input type="hidden" name="assetID" value="<?= $assetID; ?>">
                    <div class="form-group label-floating is-focused">
                        <label class="control-label">User address</label>
                        <input type="text" id="userAddress" name="userAddress" class="form-control" value="<?= $userAddress ?>" readonly>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">80% amount Tokens</label>
                        <input type="number" id="tokenAmount" name="tokenAmount" class="form-control" value="<?= $tokenAmount; ?>" required>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Comment</label>
                        <textarea class="form-control" name="approveComment" id="approveComment"></textarea>
                    </div>
                    <p>Market value of asset : <strong><?= money($marketValue); ?></strong></p>
                    <button onsubmit="$(this).prop('disabled', true);" type="submit" id="approveAssetFormSubmit" class="btn btn-block btn-primary">Approve &amp; Tokenize</button>
                </form>
            </div>
        </div>
    </div>
</div>
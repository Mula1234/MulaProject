<div id="rejectAssetModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Specify the reason and reject asset tokenize request</h3>
            </div>
            <div class="modal-body">
                <form id="rejectAssetForm" action="<?= base_url('/auth/asset/reject'); ?>" method="post">
                    <input type="hidden" name="assetID" value="<?= $assetID; ?>">
                    <div class="form-group label-floating">
                        <label class="control-label">Reason for reject</label>
                        <textarea class="form-control" name="rejectComment" id="rejectComment" required></textarea>
                    </div>
                    <button type="submit" id="rejectAssetFormSubmit" class="btn btn-block btn-primary">Reject</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $("#rejectAssetForm").validate({
            rules: {
                rejectComment: {
                    required: true
                }
            }
        });
    });
</script>
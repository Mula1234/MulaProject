<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

<div class="card" id="assetsForm">
    <div class="card-header" data-background-color="purple">
        <h4 class="title">Request Assets for Tokenize</h4>
    </div>
    <div class="card-content table-responsive">
        <form id="assetsForm" action="<?= base_url('/user/assets/tokenize'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="uploaded_docs" id="uploaded_docs" value="">
            <input type="hidden" name="user_sign" id="user_sign" value="">
            <div class="form-group">
                <select class="form-control" name="asset_type" id="asset_type">
                    <option value="">Asset type</option>
                    <?php

                        //Set assets type array for dropdown
                        $assetsType = [
                            'Property', 'Vehicles', 'Machinery', 'Company Shares',
                            'Business Stock (physical)', 'Balance sheet debt',
                            'Valuables', 'Land', 'Equipment', 'Livestock and Agriculture produce (new)'
                        ];

                        foreach ($assetsType as $one):
                        ?>
                        <option value="<?= $one; ?>"><?= $one; ?></option>
                        <?php
                        endforeach;
                    ?>
                </select>
            </div>

            <div class="form-group label-floating">
                <label class="control-label">Assets Description</label>
                <textarea class="form-control" id="assets_dsc" name="assets_dsc"></textarea>
            </div>

            <div class="form-group label-floating">
                <label class="control-label">Current marker value (in USD)</label>
                <input type="number" name="assets_val" id="assets_val" class="form-control">
                <p><small>Asset % to be tokenizes (max 80%)</small></p>
            </div>

            <div class="form-group">
                <label style="color: #000;">Upload Asset ownership proof (100% needs to be owned) [only pdf, word, images allowed]</label>
                <input type="file" id="assets_docs" name="assets_docs" style="display: none;">
                <br>
                <div id="assetuploadMsg"></div>
                <span class="uploadButton" onclick="$('#assets_docs').trigger('click')">
                    <i class="material-icons">add</i><br>
                    <span class="upload_box_text">Upload</span>
                </span>
                <br>
                <ul class="asset_docs_list" type="1"></ul>
            </div>

            <div class="col-sm-7">
                <label>Your Signature ( Agree to contract <a href="javascript:void(0);" data-target="#contractTermsAgree" data-toggle="modal">terms</a> ) [ <a href="javascript:void(0);" id="resetSign">Reset Signature</a> ]</label>
                <div id="signature"></div>
                <p><small>By Signature You Will Accept Contract Terms and Transfer Ownership of Your Assets to Mula.</small></p>
                <h4><?= date("d M Y"); ?></h4>
                <h4><?= userip(); ?></h4>
            </div>

            <div class="clearfix"></div>

            <button id="assetSubmit" class="btn btn-theme" type="submit">Request Assets For Tokenize</button>

        </form>
    </div>
</div>

            </div>
        </div>
    </div>
</div>

<div id="contractTermsAgree" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Asset Tokenization Terms and Conditions</h3>
            </div>
            <div class="modal-body text-left">
                <?= $contractTerms; ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdn.rawgit.com/willowsystems/jSignature/master/libs/jSignature.min.js"></script>
<script type="text/javascript">
    $('#signature').jSignature();
    var $sigdiv = $('#signature');
    var datapair = $sigdiv.jSignature('getData', 'svgbase64');

    $('#resetSign').click(function(e){
        $('#signature').jSignature('clear');
        var data = $('#signature').jSignature('getData');
        $('#user_sign').val('');
        e.preventDefault();
    });

    $('#signature').bind('change', function(e) {
        $('#submit').removeAttr('disabled');
        $("#user_sign").val($('#signature').jSignature('getData'));
    });
</script>
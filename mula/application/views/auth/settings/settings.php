<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

<div class="panel-group" id="accordion">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title clearfix">
                <a class="pull-left" data-toggle="collapse" data-parent="#accordion" href="#referralSetting"><strong>Referral Rewardz Token Amount</strong></a>
                <span style="margin-top: 4px;" class="pull-right fa fa-angle-down"></span>
            </h4>
        </div>
        <div id="referralSetting" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="form-group">
                    <input id="rewardToken" value="<?= $rewardToken; ?>" type="number" class="form-control">
                    <small>This is the amount of token transfered from main wallet when any user registered with referral.</small>
                </div>
                <button class="btn btn-sm btn-primary" id="updateRewardToken">Done</button>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title clearfix">
                <a class="pull-left" data-toggle="collapse" data-parent="#accordion" href="#contractTermSetting"><strong>Asset contract terms and conditions</strong></a>
                <span style="margin-top: 4px;" class="pull-right fa fa-angle-down"></span>
            </h4>
        </div>
        <div id="contractTermSetting" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="form-group">
                    <textarea id="contractTerms" name="contractTerms" class="form-control"><?= $contractTerms; ?></textarea>
                </div>
                <button class="btn btn-sm btn-primary" id="updateContractTerms">Done</button>
            </div>
        </div>
    </div>

</div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script type="text/javascript">
    // WYSIWYG editor for contract copy
    tinymce.init({
        selector: "#contractTerms",
        min_height: 300,
        plugins: [
            'advlist lists image charmap',
            'searchreplace visualblocks code',
            'insertdatetime table contextmenu paste'
        ],
        toolbar: 'code undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent'
    });
</script>
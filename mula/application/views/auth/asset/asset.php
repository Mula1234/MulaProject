<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
<?= _flash_get(); ?>
<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title"><i class="fa fa-paper-plane"></i> Assets Request for Tokenization</h4>
    </div>
    <div class="card-content table-responsive">
        <table class="table" id="assetTable">
            <thead class="text-primary">
                <tr>
                    <th>User Name</th>
                    <th>Type</th>
                    <th>Discription</th>
                    <th>Value</th>
                    <th>Contract</th>
                    <th>Documents</th>
                    <th>Status</th>
                    <th style="width: 120px;">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php 

                    //Check for assets available or not
                    if($assets->num_rows()): 
                    //Loop through data
                    foreach ($assets->result() as $one):
                    ?>
                
                <tr id="assetRow<?= $one->asset_ID; ?>">
                    <th><a href="<?= base_url("auth/user/edit/{$one->user_ID}"); ?>"><?= $one->first_name; ?></a></th>
                    <th><?= $one->assets_type; ?></th>
                    <th><?= $one->assets_description; ?></th>
                    <th><?= money($one->market_value) ?></th>
                    <th><a href="javascript:void(0);" id="getAssetSigned" data-asset="<?= $one->asset_ID; ?>">View</a></th>
                    <th>
                        <?php

                            //Set documents
                            $docs = explode(',', $one->assets_docs);

                            foreach ($docs as $single)
                            {
                                echo anchor(
                                        ASSETSPATH.$single, 
                                        $single, 
                                        ['target' => '_blank']
                                    ).br();
                            }

                        ?>
                    </th>
                    <th class="assetStatus">
                        <?php

                            //Set status
                            switch ($one->status) {
                                case 0:
                                    echo '<span class="text-warning">
                                            <b>Requested</b>
                                          </span>';
                                    break;
                                case 1:
                                    echo '<span class="text-success" data-toggle="popover" data-placement="left" title="Comment" data-content="Tokenized Amount - '.$one->approved_amount.' | '.$one->auth_comment.'">
                                            <b><u>Tokenized</u></b>
                                          </span>';
                                    break;
                                default:
                                    echo '<span class="text-danger" data-toggle="popover" data-placement="left" title="Reason for reject" data-content="'.$one->auth_comment.'">
                                            <b><u>Rejected</u></b>
                                          </span>';
                                    break;
                            }

                        ?>
                    </th>

                    <th>
                        
<div class="btn-group">
    <button type="button" class="btn btn-xs">Actions</button>
    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">

        <?php if($one->status == 0): ?>

            <li><a id="rejectAsset" href="javascript:void(0);" data-asset-id="<?= $one->asset_ID; ?>">Reject</a></li>
            <li><a id="approveAsset" href="javascript:void(0);" data-asset-id="<?= $one->asset_ID;   ?>">Approve &amp; Tokenize</a></li>

        <?php elseif($one->status == 1): ?>

            <li><a href="javascript:void(0);" disabled>Already tokenized</a></li>

        <?php else: ?>

            <li><a href="javascript:void(0);" disabled>Already rejected</a></li>

        <?php endif; ?>
    </ul>
</div>

                    </th>

                </tr>

                    <?php 
                    endforeach;

                    else:
                ?>

                <tr>
                    <th colspan="8">
                        <p class="text-center">
                             <br>
                    <i class="fa fa-paper-plane fa-4x" style="color: #ccc;"></i><br><br>
                            You have not added any assets yet !
                        </p>
                    </th>
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

<div class="callToPopup"></div>
<div id="popupModal"></div>

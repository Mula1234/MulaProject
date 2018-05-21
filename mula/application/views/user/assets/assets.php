<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title pull-left"><i class="fa fa-paper-plane"></i> Assets Request for Tokenization</h4>
        <a style="margin-top: 4px;" href="<?= base_url('/user/assets/tokenize'); ?>" class="pull-right">
            <i class="material-icons">add</i>
             Add Assets
        </a>
        <div class="clearfix"></div>
    </div>
    <div class="card-content table-responsive">
        <table class="table">
            <thead class="text-primary">
                <tr>
                    <th>Type</th>
                    <th>Discription</th>
                    <th>Value</th>
                    <th>Contract</th>
                    <th>Documents</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                <?php 

                    //Check for assets available or not
                    if($assets->num_rows()): 
                    //Loop through data
                    foreach ($assets->result() as $one):
                    ?>
                
                <tr>
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
                    <th>
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
                </tr>

                    <?php 
                    endforeach;

                    else:
                ?>

                <tr>
                    <th colspan="6">
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

<div id="popupModal"></div>

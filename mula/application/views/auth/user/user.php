<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

            <p class="text-center">
                
            </p>

<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title pull-left"><i class="fa fa-users"></i> Users</h4>
        <a class="pull-right" style="margin-top: 5px;" href="<?= base_url('/auth/user/add'); ?>">
            <i class="fa fa-plus"></i>
             Add User
        </a>
        <div class="clearfix"></div>
    </div>
    <div class="card-content table-responsive">
        <table class="table" id="usersTable">
            <thead class="text-primary">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php 

                //Check for users available or not
                if($users->num_rows()): 
                //Loop through data
                foreach ($users->result() as $one):
                ?>
                
                <tr id="userRow<?= $one->user_ID; ?>">
                    <th>
                        <a href="<?= base_url("/auth/user/edit/{$one->user_ID}"); ?>">
                            <?= $one->first_name .' '. $one->last_name; ?>
                        </a>
                    </th>
                    <th><?= $one->email_address; ?></th>
                    <th><?= $one->phone; ?></th>
                    <th><?= $one->country; ?></th>
                    </th>
                    <th class="userStatus">
                        <?php

                            //Set status
                            switch ($one->status) {
                                case 1:
                                    echo '<span class="text-success">
                                            <b>Active</b>
                                          </span>';
                                    break;
                                default:
                                    echo '<span class="text-danger">
                                            <b>Inactive</b>
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
        <li><a href="<?= base_url("auth/user/edit/{$one->user_ID}"); ?>">Edit</a></li>
        <li><a href="javascript:void(0);" id="deleteUser" data-id="<?= $one->user_ID; ?>">Delete</a></li>
        <li><a href="javascript:void(0);" id="changeStatusUser" data-id="<?= $one->user_ID; ?>">
            <?php

                //Set status
                switch ($one->status) {
                    case 1:
                        echo 'Inactive';
                        break;
                    default:
                        echo 'Active';
                        break;
                }

            ?>
        </a></li>
        <li><a href="<?= base_url("auth/history/user/{$one->user_ID}"); ?>">History</a></li>
        <li><a href="<?= base_url("auth/wallets/user/{$one->user_ID}"); ?>">Wallet</a></li>
    </ul>
</div>
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
                    <i class="fa fa-users fa-4x" style="color: #ccc;"></i><br><br>
                            No user registered yet !
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
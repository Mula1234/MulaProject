<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title">Add User</h4>
    </div>
    <div class="card-content table-responsive">
        <form id="userEditForm" action="<?= base_url("auth/user/add"); ?>" method="post">

<?php
    
    //Get flash message
    _flash_get();

    //Get validation errors
    echo (validation_errors() != FALSE)
     ? '<div class="alert alert-danger">' . validation_errors() . '</div>'
     : '';

?>

<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="fname">First name *</label>
            <input type="text" class="form-control" name="fname" id="fname" value="<?= set_value('fname'); ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="lname">Last name</label>
            <input type="text" class="form-control" name="lname" id="lname" value="<?= set_value('lname'); ?>">
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">Email address *</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" value="<?= set_value('phone'); ?>">
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="country">Country</label>
            <select class="form-control" name="country" id="country">
                <option value="">Country</option>
                <?php foreach($countries as $country): ?>
                    <option value="<?= $country ?>">
                        <?= $country ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
         <div class="form-group">
            <label for="status">Status *</label>
            <?php
                //Status dropdown
                echo form_dropdown('status', [
                    '1' => 'Active',
                    '0' => 'Inctive',
                ], 1, ['id' => 'status', 'class' => 'form-control']);

            ?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="ac_verify">Account Verification *</label>

            <?php
                //Status dropdown
                echo form_dropdown('ac_verify', [
                    '1' => 'Verified',
                    '0' => 'Not Verified',
                ], 1, ['id' => 'ac_verify', 'class' => 'form-control']);

            ?>
        </div>
    </div>
    <div class="col-md-6">
         <div class="form-group">
            <label for="password">Password *</label>
            <div class="input-group"> 
                <input type="password" class="form-control" id="password" name="password">
                <span class="input-group-addon">
                    <i id="seePassword" style="cursor: pointer;" title="See password" class="fa fa-eye"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<input type="submit" name="submit" value="Create User" class="btn btn-primary">

        </form>
    </div>
</div>

            </div>
        </div>
    </div>
</div>
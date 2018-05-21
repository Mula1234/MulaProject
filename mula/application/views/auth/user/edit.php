<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

<div class="card">
    <div class="card-header" data-background-color="purple">
        <h4 class="title">Edit User</h4>
    </div>
    <div class="card-content table-responsive">

        <form id="userEditForm" action="<?= base_url("auth/user/edit/{$user->user_ID}"); ?>" method="post">

<?php
    
    //Get flash message
    _flash_get();

    //Get validation errors
    echo (validation_errors() != FALSE)
     ? '<div class="alert alert-danger">' . validation_errors() . '</div>'
     : '';

?>


<table class="table">
    <tr>
        <td>Register Time</td>
        <td><?= $user->created_at; ?></td>
    </tr>
    <tr>
        <td>Register IP</td>
        <td><?= $user->created_ip; ?></td>
    </tr>
    <tr>
        <td>Last Updated Time</td>
        <td><?= $user->updated_at; ?></td>
    </tr>
    <tr>
        <td>Referral Link</td>
        <td>
            <a target="_blank" href="<?= base_url("/referral/{$user->referral_link}");?>">
                <?= base_url("/referral/{$user->referral_link}");?>
            </a>
        </td>
    </tr>
</table>

<input type="hidden" name="userID" value="<?= $user->user_ID; ?>">

<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="fname">First name</label>
            <input type="text" class="form-control" name="fname" id="fname" value="<?= set_value('fname', $user->first_name); ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="lname">Last name</label>
            <input type="text" class="form-control" name="lname" id="lname" value="<?= set_value('lname', $user->last_name); ?>">
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email', $user->email_address); ?>" disabled>
            <p><small>Email can not be change</small></p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" class="form-control" id="phone" name="phone" value="<?= set_value('phone', $user->phone); ?>">
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
                    <option value="<?= $country ?>" <?= ($user->country == $country) ? 'selected' : ''; ?>>
                        <?= $country ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
         <div class="form-group">
            <label for="status">Status</label>
            <?php
                //Status dropdown
                echo form_dropdown('status', [
                    '1' => 'Active',
                    '0' => 'Inctive',
                ], $user->status, ['id' => 'status', 'class' => 'form-control']);

            ?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="ac_verify">Account Verification</label>

            <?php
                //Status dropdown
                echo form_dropdown('ac_verify', [
                    '1' => 'Verified',
                    '0' => 'Not Verified',
                ], $user->account_verify, ['id' => 'ac_verify', 'class' => 'form-control']);

            ?>
        </div>
    </div>
    <div class="col-md-6">
         <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group"> 
                <input type="password" class="form-control" id="password" name="password">
                <span class="input-group-addon">
                    <i id="seePassword" style="cursor: pointer;" title="See password" class="fa fa-eye"></i>
                </span>
            </div>
            <p><small>Optional - Keep blank if you do not want to change</small></p>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<input type="submit" name="submit" value="Update User" class="btn btn-primary">

        </form>
    </div>
</div>

            </div>
        </div>
    </div>
</div>
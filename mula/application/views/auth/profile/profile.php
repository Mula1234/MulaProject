<div class="content">
    <div class="container-fluid">
        <div class="row">
             <div class="col-md-5">
                <div class="card card-profile" style="margin-top: 0;">
                    <div class="content">
                        <h4 class="card-title">Welcome, 
                            <span><?= $auth->full_name; ?></span>
                        </h4>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Change Password</h4>
                    </div>
                    <div class="card-content">
                        <form id="changepassForm" method="post" action="<?= base_url('/auth/profile/change_password'); ?>" autocomplete="off" novalidate>
                            <div class="form-group label-floating">
                                <label class="control-label">Current Password</label>
                                <input type="password" id="curpass" name="curpass" class="form-control" required>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">New Password</label>
                                <input type="password" id="newpass" name="newpass" class="form-control" required>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Confirm Password</label>
                                <input type="password" id="confnewpass" name="confnewpass" class="form-control" required>
                            </div>
                            
                            <button id="changepassSubmit" type="submit" class="btn btn-theme btn-block">Update Password</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Edit Your Profile</h4>
                    </div>
                    <div class="card-content">
                        <form id="updateprofileForm" method="post" autocomplete="off" novalidate>
                            <div class="form-group label-floating">
                                <label class="control-label">Username</label>
                                <input type="text" id="username" name="username" value="<?= set_value('username', $auth->username);  ?>" class="form-control">
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Full Name</label>
                                <input type="text" id="fname" name="fname" value="<?= set_value('fname', $auth->full_name);  ?>" class="form-control" onkeyup="$('h4.card-title span').text(this.value);">
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Email address</label>
                                <input type="email" id="email_id" name="email_id" value="<?= set_value('email', $auth->email);  ?>" class="form-control">
                            </div>

                            <div class="form-group label-floating">
                                <label class="control-label">Phone No.</label>
                                <input type="number" id="phone" value="<?= set_value('phone', $auth->phone);  ?>" name="phone" class="form-control">
                            </div>
                           
                            <button id="updateprofileSubmit" type="submit" class="btn btn-theme btn-block">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
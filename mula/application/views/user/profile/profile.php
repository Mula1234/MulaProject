<div class="content">
    <div class="container-fluid">
        <div class="row">
             <div class="col-md-5">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <?php

                            //Check for profile
                            if( ! file_exists(PROFILEPATH.$user->user_profile) || 
                                empty($user->user_profile) )
                            {
                                $profile_img = base_url('/assets/images/' . AVATAR);
                            }
                            else
                            {
                                //Other wise set it
                                $profile_img = base_url(PROFILEPATH.$user->user_profile);
                            }

                        ?>
                        <input type="file" name="upload_profile" id="upload_profile" style="display: none;" accept="image/*">
                        <img id="userProfile" data-toggle="tooltip" title="Click to change" onclick="$('#upload_profile').trigger('click');" class="img" src="<?= $profile_img; ?>">
                    </div>
                    <div class="content">
                        <h4 class="card-title">Hello, 
                            <span><?= $user->first_name; ?></span>
                        </h4>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Change Password</h4>
                    </div>
                    <div class="card-content">
                        <form id="changepassForm" method="post" action="<?= base_url('/user/profile/change_password'); ?>" autocomplete="off" novalidate>
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
                        <form id="updateprofileForm" autocomplete="off" novalidate>
                            <div class="form-group label-floating">
                                <label class="control-label">First Name</label>
                                <input type="text" id="fname" name="fname" value="<?= set_value('', $user->first_name);  ?>" class="form-control" onkeyup="$('h4.card-title span').text(this.value);">
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Last Name</label>
                                <input type="text" id="lname" name="lname" value="<?= set_value('', $user->last_name);  ?>" class="form-control">
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Email address</label>
                                <input type="email" value="<?= set_value('email', $user->email_address);  ?>" class="form-control" disabled>
                                <p><small>You can not change your email address</small></p>
                            </div>

                            <div class="form-group label-floating">
                                <label class="control-label">Phone No.</label>
                                <input type="number" id="phone" value="<?= set_value('phone', $user->phone);  ?>" name="phone" class="form-control">
                            </div>

                            <div class="form-group label-floating">
                                <select class="selectpicker form-control" data-style="select-with-transition" title="Country" name="country" id="country" data-size="7">
                                    <option value="">Country</option>
                                    <?php foreach($countries as $country): ?>
                                        <option value="<?= $country ?>" <?= ($country == $user->country) ? 'selected' : ''; ?>>
                                            <?= $country ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
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
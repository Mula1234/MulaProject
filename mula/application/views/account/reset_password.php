<div class=" forget-pw padding-top80">
    <div class="container">
        <div class="heading h2">
            <h2>Reset Password </h2>
            <span class="divider"><img src="img/divider-angle.png" alt=""></span>
        </div>

        <div class="" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <!--Modal: Contact form-->
            <div class="modal-dialog cascading-modal" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header primary-color white-text">
                        <h4 class="title">Reset Password</h4>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                        <form id="resetForm" name="resetForm"  autocomplete="off" ng-submit="resetForm.$valid && doResetPass()" novalidate>
                            <input type="hidden" id="resetToken" value="<?= trim($this->input->get('_token')); ?>">
                            <div id="resetMsg"></div>
                            <!-- Material input name -->
                            <div class="md-form form-sm">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" name="password" id="reset_pass" class="form-control form-control-sm" ng-model="reset.password" required>
                                <label for="reset_pass">New Passwprd</label>
                                <span ng-show="(resetForm.password.$dirty || resetForm.$submitted) && resetForm.password.$error.required">Password field is required.</span>
                            </div>

                            <!-- Material input email -->
                            <div class="md-form form-sm">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" name="confpassword" id="confpassword" ng-model="reset.confpassword" class="form-control form-control-sm" password-confirm match-target="reset.password" required>
                                <label for="confpassword">Confirm Password</label>
                                <span ng-show="(resetForm.confpassword.$dirty || resetForm.$submitted) && resetForm.confpassword.$error.required">Confirm password field is required.</span>
                                <span class="help-block" ng-show="!resetForm.confpassword.$error.required && resetForm.confpassword.$error.match">Confirm password and password do not match.</span>
                            </div>

                            <div class="text-center mt-4 mb-2">
                                <button id="resetSubmit" type="submit" class="btn btn-theme">Submit
                                    <i class="fa fa-send ml-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/.Content-->
            </div>
            <!--/Modal: Contact form-->
        </div>
    </div>
</div>
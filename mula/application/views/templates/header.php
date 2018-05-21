<!DOCTYPE html>
<html lang="en" ng-app="mulaApp" ng-controller="mulaCtrl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= isset($title) ? APPNAME.TSAPRAT.$title : APPNAME; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url('/assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/css/mdb.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/css/compiled.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/css/toastr.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/css/custom.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/assets/css/my.css'); ?>" rel="stylesheet">
    
</head>
<script type="text/javascript">
    var baseUrl = "<?= base_url() ?>";
</script>
<body ng-cloak>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" id="header">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url('/assets/images/logo.png'); ?>" class="logo-img"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/products/exchange'); ?>">Use Our Product (Alpha) <span class="sr-only">(current)</span></a>
                </li>
                

                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);">Whitepaper</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  js-scroll-trigger" href="<?= base_url('#our-team'); ?>">Team</a>
                </li>
                
                <?php if( ! is_user_loggedin() ): ?>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modalLRFormDemo">Login</a>
                </li>
                <?php else: ?>
                 <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/user/profile') ?>">My Account</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
 </nav>

<?php if( ! is_user_loggedin() ): ?>

<!-- Login signup popup modal -->

<div class="modal fade show" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">
        <div class="modal-c-tabs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs tabs-2 light-blue darken-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" id="loginShow" data-toggle="tab" href="#panel17" role="tab" aria-selected="false">
                <i class="fa fa-user mr-1"></i> Login</a>
            </li>
                <li class="nav-item">
                <a class="nav-link" id="signupShow" data-toggle="tab" href="#panel18" role="tab" aria-selected="true">
                <i class="fa fa-user-plus mr-1"></i> Sign Up</a>
            </li>
        </ul>

        <!-- Tab panels -->
        <div class="tab-content">
            <!--Panel 17-->
            <div class="tab-pane fade active show " id="panel17" role="tabpanel">
                <!--Body-->
                <div class="modal-body mb-1">
                    <form id="loginForm" name="loginForm"  autocomplete="off" ng-submit="loginForm.$valid && doLogin()" novalidate>
                        <input type="hidden" name="next_url" id="next_url" value="<?= ( $this->input->get('next') && $this->input->get('next') !== '' ) ? urldecode($this->input->get('next')) : '' ?>">
                        <div class="md-form form-sm">
                            <i class="fa fa-envelope prefix"></i>
                            <input type="email" id="email_address" name="email_address" class="form-control form-control-sm" ng-model="email_address" required>
                            <label for="email_address">Your email</label>
                            <span ng-show="(loginForm.email_address.$dirty || loginForm.$submitted) && loginForm.email_address.$error.required">Email address field is required.</span>
                            <span ng-show="(loginForm.email_address.$dirty || loginForm.$submitted) && loginForm.email_address.$error.email">Email address should be valid.</span>
                        </div>

                        <div class="md-form form-sm">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="password" name="password" ng-model="password" class="form-control form-control-sm" required>
                            <label for="password">Your password</label>
                            <span ng-show="(loginForm.password.$dirty || loginForm.$submitted) && loginForm.password.$error.required">Password field is required.</span>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" value="on">
                            <label for="remember" class="grey-text"> Keep me logged in</label>
                        </div>

                        <div class="text-center mt-4">
                            <button id="loginSubmit" type="submit" class="btn btn-info btn-theme waves-effect waves-light">Log in
                                <i class="fa fa-sign-in ml-1"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!--Footer-->
                <div class="modal-footer">
                    <div class="options text-center text-md-right mt-1">
                        <p>Not a member?
                            <a href="#" onclick="$('a#signupShow').trigger('click')" class="blue-text sign-tab">Sign Up</a>
                        </p>
                        <p>Forgot
                            <a href="#" class="blue-text"  data-toggle="modal" data-target="#exampleModal" data-dismiss="modal">Password?</a>
                        </p>
                    </div>
                    <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                </div>

            </div>
            <!--/.Panel 7-->

            <!--Panel 18-->
            <div class="tab-pane fade  in" id="panel18" role="tabpanel">

                <!--Body-->
                <div class="modal-body">
                    <form id="registerForm" name="registerForm" autocomplete="off" ng-submit="registerForm.$valid && doRegister()" novalidate>

                    <input type="hidden" name="referral" id="referralLink" value="<?= $this->uri->segment(2); ?>">

                    <div class="md-form form-sm">
                        <i class="fa fa-user prefix"></i>
                        <input type="text" id="fname" ng-model="fname" name="fname" class="form-control form-control-sm" required>
                        <label for="fname">Name</label>
                        <span ng-show="(registerForm.fname.$dirty || registerForm.$submitted) && registerForm.fname.$error.required">Name field is required.</span>
                    </div>

                    <div class="md-form form-sm">
                        <i class="fa fa-envelope prefix"></i>
                        <input type="email" id="email" ng-model="email" name="email" class="form-control form-control-sm" required>
                        <label for="email">Your email</label>
                        <span ng-show="(registerForm.email.$dirty || registerForm.$submitted) && registerForm.email.$error.required">Email address field is required.</span>
                        <span ng-show="(registerForm.email.$dirty || registerForm.$submitted) && registerForm.email.$error.email">Email address should be valid.</span>
                    </div>

                    <div class="md-form form-sm">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" id="pass" ng-model="pass" name="pass" class="form-control form-control-sm" required>
                        <label for="pass">Your password</label>
                        <span ng-show="(registerForm.pass.$dirty || registerForm.$submitted) && registerForm.pass.$error.required">Password field is required.</span>
                    </div>

                    <div class="md-form form-sm">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" id="confpass" ng-model="confpass" name="confpass" class="form-control form-control-sm" password-confirm match-target="pass" required>
                        <label for="confpass">Repeat password</label>
                        <span ng-show="(registerForm.confpass.$dirty || registerForm.$submitted) && registerForm.confpass.$error.required">Confirm password field is required.</span>
                        <span class="help-block" ng-show="!registerForm.confpass.$error.required && registerForm.confpass.$error.match">Confirm password and password do not match.</span>
                    </div>

                    <div class="text-center form-sm mt-4">
                        <button id="signupSubmit" class="btn btn-info btn-theme waves-effect waves-light">
                            Sign up
                            <i class="fa fa-sign-in ml-1"></i>
                        </button>
                    </div>
                    </form>
                </div>

                <!--Footer-->
                <div class="modal-footer">
                    <div class="options text-right">
                        <p class="pt-1">Already have an account?
                            <a href="#" class="blue-text login-tab" onclick="$('a#loginShow').trigger('click')">Log In</a>
                        </p>
                    </div>
                    <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                </div>

            </div>
            <!--/.Panel 8-->
        </div>
        </div>
        </div>
        <!--/.Content-->
    </div>
</div> 


<!-- Forgot password popup modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="forgotForm" name="forgotForm"  autocomplete="off" ng-submit="forgotForm.$valid && sendForgotLink()" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forget Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form form-sm">
                        <i class="fa fa-envelope prefix"></i>
                        <input type="email" name="email_id" id="email_id" ng-model="email_id" class="form-control" required>
                        <label for="email_id">E-mail address</label>
                        <span ng-show="(forgotForm.email_id.$dirty || forgotForm.$submitted) && forgotForm.email_id.$error.required">Email address field is required.</span>
                        <span ng-show="(forgotForm.email_id.$dirty || forgotForm.$submitted) && forgotForm.email_id.$error.email">Email address should be valid.</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button id="forgotSubmit" type="submit" class="btn btn-primary btn-theme">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
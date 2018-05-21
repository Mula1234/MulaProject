<div class="contact-page padding-top80">
    <div class="container">
        <div class="heading h2">
            <h2>Contact us </h2>
            <span class="divider"><img src="img/divider-angle.png" alt=""></span>
        </div>

        <div class="" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <!--Modal: Contact form-->
            <div class="modal-dialog cascading-modal" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header primary-color white-text">
                        <h4 class="title">Contact form</h4>
                    </div>
                    <!--Body-->
                    <div class="modal-body">

                        <form id="contactForm" name="contactForm"  autocomplete="off" ng-submit="contactForm.$valid && sendContact()" novalidate>

                        <!-- Material input name -->
                        <div class="md-form form-sm">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="contact_name" name="contact_name" ng-model="contact_name" class="form-control form-control-sm" required>
                            <label for="contact_name">Your name</label>
                            <span ng-show="(contactForm.contact_name.$dirty || contactForm.$submitted) && contactForm.contact_name.$error.required">Name field is required.</span>
                        </div>

                        <!-- Material input email -->
                        <div class="md-form form-sm">
                            <i class="fa fa-envelope prefix"></i>
                            <input type="email" name="contact_email" ng-model="contact_email" id="contact_email" class="form-control form-control-sm" required>
                            <label for="contact_email">Your email</label>
                            <span ng-show="(contactForm.contact_email.$dirty || contactForm.$submitted) && contactForm.contact_email.$error.required">Email address field is required.</span>
                            <span ng-show="(contactForm.contact_email.$dirty || contactForm.$submitted) && contactForm.contact_email.$error.email">Email address should be valid.</span>
                        </div>

                        <!-- Material input subject -->
                        <div class="md-form form-sm">
                            <i class="fa fa-tag prefix"></i>
                            <input type="text" id="contact_sub" name="contact_sub" ng-model="contact_sub" class="form-control form-control-sm" required>
                            <label for="contact_sub">Subject</label>
                            <span ng-show="(contactForm.contact_sub.$dirty || contactForm.$submitted) && contactForm.contact_sub.$error.required">Subject field is required.</span>
                        </div>

                        <!-- Material textarea message -->
                        <div class="md-form form-sm">
                            <i class="fa fa-pencil prefix"></i>
                            <textarea type="text" id="contact_msg" class="md-textarea form-control" name="contact_msg" ng-model="contact_msg" required></textarea>
                            <label for="contact_msg">Your Message</label>
                            <span style="top: 102px;" ng-show="(contactForm.contact_msg.$dirty || contactForm.$submitted) && contactForm.contact_msg.$error.required">Message field is required.</span>
                        </div>

                        <div class="text-center mt-4 mb-2">
                            <button class="btn btn-theme" id="contactSubmit">Send
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

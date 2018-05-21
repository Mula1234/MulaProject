</div>
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-logo-add footer-col-6">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="footer-logo">
                                    <img src="<?= base_url('/assets/images/logo-white.png'); ?>">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="footer-address">
                                    <p>
                                        MULA COINS, <br>USA.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-contact-details footer-col-6">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="footer-contact">
                                    <p>
                                        Phone : (1234) 12345-678<br>
                                        Email : <a href="mailto:invest@mulacoins.io">invest@mulacoins.io</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="footer-address-social">
                                    <ul class="social-icons">
                                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p class="copyright ">
               Copyright &copy; <?= date("Y"); ?> | All rights are resrved. <a href="<?= base_url(); ?>">Mula</a>
            </p>
        </div>
    </div>
</footer>

<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/mdb.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/angular.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/angular.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/toastr.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/main.js'); ?>"></script>
<script type="text/javascript">
    <?php if( ( $this->input->get('next') && 
                $this->input->get('next') !== '' ) OR 
                ( $this->uri->segment('1') == 'referral' && 
                $this->uri->segment('2') !== '' )
            ): ?>
        //Open model when next OR referral url is setted
        $('#modalLRFormDemo').modal();
    <?php endif; ?>

    <?php if(( $this->uri->segment('1') == 'referral' && 
                $this->uri->segment('2') !== '' ) ): ?>
        //When referral is setted also show register tab
        $('a#signupShow').trigger('click');
    <?php endif; ?>
</script>
</body>
</html>
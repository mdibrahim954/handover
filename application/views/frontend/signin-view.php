<?php
if (isset($header)) {
    echo $header;
}
?>
<div style="margin-top:53px;">
    <router-outlet></router-outlet><ng-component _nghost-c1=""><div _ngcontent-c1="" class="hexp">
            <div _ngcontent-c1="" class="container">
                <div _ngcontent-c1="" class="row">
                    <div _ngcontent-c1="" class="col-sm-12 col-lg-12">
                        <h1 _ngcontent-c1="" class="h1">
                            Sign in </h1>
                    </div>
                </div>
            </div>
        </div>

        <div _ngcontent-c1="" style="max-width:350px; margin:50px auto;">
            <?php $this->load->view('error-message-display'); ?>

            <h1 _ngcontent-c1="" class="text-center login-title">Sign in to continue to Handover Express</h1>
            <div _ngcontent-c1="" class="account-wall">
                <img _ngcontent-c1="" alt="" class="profile-img" src="<?php echo base_url(); ?>resources/images/nouser.png">
                <form  class="form-signin" action="<?php echo base_url(); ?>signin/signin_ajax" method="post">
                    <input _ngcontent-c1="" autofocus="" class="form-control ng-untouched ng-pristine ng-invalid" name="email" placeholder="Email" required="" type="email">
                    <input _ngcontent-c1="" class="form-control ng-untouched ng-pristine ng-invalid" name="password" placeholder="Password" required="" type="password">

                    <!---->
                    <!---->


                    <button _ngcontent-c1="" class="btn btn-lg btn-primary btn-block" type="submit">
                        Sign in</button>
                    <label _ngcontent-c1="" class="checkbox pull-left">
                        <input name="logged" value="keep_login" type="checkbox">
                        Remember me
                    </label>
                    <a _ngcontent-c1="" class="pull-right need-help" href="<?php echo base_url(); ?>forgot_password">Forgot Password? </a><span _ngcontent-c1="" class="clearfix"></span>
                </form>
            </div>
            <a _ngcontent-c1="" class="text-center new-account" href="<?php echo base_url(); ?>signup">Create an account </a>

        </div>

        <div _ngcontent-c1="" class="container" style="max-width:400px;margin:50px auto;">

            <!---->
            <!---->
        </div></ng-component>
</div></ng-component></app-root></div></div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>
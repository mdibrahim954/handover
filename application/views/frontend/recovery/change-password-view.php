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
                                                     </h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div _ngcontent-c1="" style="max-width:350px; margin:50px auto;">
                                    <?php $this->load->view('error-message-display'); ?>

                                    <h1 _ngcontent-c1="" class="text-center login-title" style="text-align:center">Password Recovery</h1>
                                    <div _ngcontent-c1="" class="account-wall">
                                        
                                        <form  class="form-signin" action="<?php echo base_url(); ?>forgot_password/reset_passwod_success" method="post">
                                            <input autofocus="" class="form-control" name="user_id" value="<?php echo $user_id; ?>" placeholder="" required="" type="hidden">
                                            <input autofocus="" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="" required="" type="hidden">
                                            <input autofocus="" class="form-control" name="password" placeholder="Password" required="" type="password">
                                            <span class="help-block confirm_password error" style="color:red"><?php echo form_error('password'); ?></span>
                                            <input autofocus="" class="form-control" name="confirm_password" placeholder="Confirm Password" required="" type="password">
                                            <span class="help-block confirm_password error" style="color:red"><?php echo form_error('confirm_password'); ?></span>
                                            <br>
                                            <button _ngcontent-c1="" class="btn btn-lg btn-primary btn-block" type="submit">
                                                Submit</button>
                                            
                                        </form>
                                    </div>
                                    <a _ngcontent-c1="" class="text-center new-account" href="<?php echo base_url(); ?>signin">Singin </a>

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
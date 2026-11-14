<?php
if (isset($header)) {
    echo $header;
}
?>


<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">


    <router-outlet></router-outlet><ng-component>
        <div class="card" style="max-width:700px;margin:10% auto;">
            <div class="header">
                <h4 class="title"><span>Change password</span> </h4>
                <?php $this->load->view('error-message-display'); ?>
                <button aria-hidden="true" class="close" type="button">×</button>
            </div>
            <div class="content">

                <form class="form-horizontal ng-untouched ng-pristine ng-invalid" action="<?php echo base_url(); ?>client/user/password_update" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Current Password <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="currentPassword" placeholder="Choose password (6-15 chars)" type="password" required="">
                            </div>   
                            <!---->
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">New Password <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="newPassword" placeholder="Choose password (6-15 chars)" type="password" required="">
                            </div>   
                        </div>
                    </div>

                    <div class="form-group">

                        <label class="control-label col-sm-3">Retype Password <span class="text-danger">*</span></label>

                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="retypePassword" placeholder="Choose password (6-15 chars)" type="password" required="">
                            </div> 
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-10">
                            <button class="btn btn-warning" type="submit">SUBMIT <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </ng-component>


</div>

</div>

</ng-component></app-root></div></div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>
<?php $this->load->view('dashboard-admin/common/admin-header'); ?>

<?php
$all_user=$this->db
                ->select('*')
                ->get('users')
                ->result();
?>
<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">


    <router-outlet></router-outlet><ng-component>
        <div class="card" style="max-width:700px;margin:10% auto;">
            <div class="header">
                <h4 class="title"><span>Update Client password</span> </h4>
                <?php $this->load->view('error-message-display'); ?>
                <button aria-hidden="true" class="close" type="button">×</button>
            </div>
            <div class="content">

                <form class="form-horizontal ng-untouched ng-pristine ng-invalid" action="<?php echo base_url(); ?>admin/user/client_password_save" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Email <span class="text-danger">*</span></label>
                        <div class="col-xs-8">			
                            <select class="form-control ng-untouched ng-pristine ng-invalid" name="userid" required="">
                                <option value="">Select any..</option>
                                <?php foreach($all_user as $row){?>
                                <option value="<?php echo $row->userid; ?>"><?php echo $row->email; ?></option>
                                <?php } ?>
                            </select>			
                        </div>
                    </div>
                    
                    

                    <div class="form-group">
                        <label class="control-label col-sm-3">New Password <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="newPassword" value="<?php
                                if (!isset($success)) {
                                    echo set_value('newPassword');
                                }
                                ?>" placeholder="Choose password (6-15 chars)" type="password" required="">
                            </div>   
                            <span class="help-block first_name" style="color:red"><?php echo form_error('newPassword'); ?></span>
                        </div>
                    </div>

                    <div class="form-group">

                        <label class="control-label col-sm-3">Retype Password <span class="text-danger">*</span></label>

                        <div class="col-md-8 col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="retypePassword" value="<?php
                                if (!isset($success)) {
                                    echo set_value('retypePassword');
                                }
                                ?>" placeholder="Choose password (6-15 chars)" type="password" required="">
                            </div> 
                            <span class="help-block first_name" style="color:red"><?php echo form_error('retypePassword'); ?></span>
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
<?php $this->load->view('dashboard-admin/common/admin-header'); ?>
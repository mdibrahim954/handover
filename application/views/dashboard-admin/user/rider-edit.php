<?php
if (isset($header)) {
    echo $header;
}
?>

<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">
    <router-outlet></router-outlet><ng-component>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home"></span> </li>
            <li>Users</li>
            <li class="active">Rider List</li>
        </ol>
        <div class="tabbable-panel" style="margin-top:20px;">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                    <!--                    <li class="active">
                                            <a data-toggle="tab" href="#tab_default_1">
                                            <a  href="<?php echo base_url(); ?>admin/user/rider_list">
                                                All Rider List </a>
                                        </li>-->

                    <li style="float:right;">
                        <a href="<?php echo base_url(); ?>admin/user"><i aria-hidden="true" class="fa fa-user-plus" style="font-size:20px;cursor:pointer;" tabindex="0"></i></a>
                    </li>
                </ul>

                <div class="tab-content">
                    <?php $this->load->view('error-message-display'); ?>
                    <form class="form-horizontal" action="<?php echo base_url(); ?>admin/user/update_rider" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-3">First Name <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="first_name" value="<?php echo $userinfo->first_name; ?>" placeholder="Enter your first name" type="text" required="">
                                <input class="form-control" name="userid" value="<?php echo $userinfo->userid; ?>" type="hidden" required="">
                                <span class="help-block first_name error"><?php echo form_error('firstname'); ?></span>
                                <!---->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Last Name <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="last_name" value="<?php echo $userinfo->last_name; ?>" placeholder="Enter your last name" type="text" required="">
                                <span class="help-block  error"><?php echo form_error('lastname'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Father's Name <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="father_name" value="<?php echo $userinfo->father_name; ?>" placeholder="Enter your father's name" type="text" required="">
                                <span class="help-block  error"><?php echo form_error('father_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Mothers's Name <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="mother_name" value="<?php echo $userinfo->mother_name; ?>" placeholder="Enter your mothers's name" type="text" required="">
                                <span class="help-block  error"><?php echo form_error('mother_name'); ?></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3">Date of Birth <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input class="form-control datepicker" readonly="" name="dob" value="<?php echo $userinfo->dob; ?>" placeholder="Enter your Date of Birth" type="text" required="">
                                    <span class="help-block  error"><?php echo form_error('dob'); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                        $gender = '';
                        if (isset($userinfo->gender)) {
                            $gender = $userinfo->gender;
                        } else {
                            $gender = 'Male';
                        }
                        if ($gender == '') {
                            $gender = 'Male';
                        }
                        ?>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Gender <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">  
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="Male" <?php
                                        if ($gender == 'Male') {
                                            echo 'checked';
                                        }
                                        ?>>Male
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="Female" <?php
                                        if ($gender == 'Female') {
                                            echo 'checked';
                                        }
                                        ?>>Female
                                    </label>

                                    <span class="help-block error"><?php echo form_error('gender'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Marital Status <span class="text-danger"></span></label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="marital_status" value="<?php echo $userinfo->marital_status; ?>" placeholder="Enter your maritual status" type="text">
                                <span class="help-block  error"><?php echo form_error('marital_status'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Email <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input class="form-control ng-untouched ng-pristine ng-invalid" name="email" value="<?php echo $userinfo->email; ?>" readonly="" placeholder="Enter your Email ID" type="email" required="">
                                </div>
                                <span class="help-block first_name error"><?php echo form_error('email'); ?></span>
                                <!---->
                                <small> Your Email Id is being used for ensuring the security of your account, authorization and access recovery. </small> </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3">Mobile <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input class="form-control ng-untouched ng-pristine ng-invalid" id="mobile-number" name="mobile" value="<?php echo $userinfo->mobile; ?>" placeholder="Enter your Primary contact no." type="text" required="">
                                </div>
                                <span class="help-block first_name error" id="mobile-number-message"></span>
                                <span class="help-block first_name error"><?php echo form_error('mobile'); ?></span>
                                <!---->
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-sm-3">Region <span class="text-danger"></span></label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="region" value="<?php echo $userinfo->region; ?>" placeholder="Enter your region" type="text" >
                                <span class="help-block  error"><?php echo form_error('region'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Nationality <span class="text-danger"></span></label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="nationality" value="<?php echo $userinfo->nationality; ?>" placeholder="Enter your nationality" type="text" >
                                <span class="help-block  error"><?php echo form_error('nationality'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">NID Number <span class="text-danger"></span></label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="nid_number" value="<?php echo $userinfo->nid_number; ?>" placeholder="Enter your NID Number" type="text" >
                                <span class="help-block  error"><?php echo form_error('nid_number'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Blood Group <span class="text-danger"></span></label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="blood_group" value="<?php echo $userinfo->blood_group; ?>" placeholder="Enter your blood group" type="text" >
                                <span class="help-block  error"><?php echo form_error('blood_group'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Present Address<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <textarea class="form-control ng-untouched ng-pristine ng-invalid" cols="30" name="address" id=""  placeholder="Enter your present address" rows="2" required=""><?php echo $userinfo->address; ?></textarea>
                                <span class="help-block first_name error"><?php echo form_error('address'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Permanent Address<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <textarea class="form-control ng-untouched ng-pristine ng-invalid" cols="30" name="permanent_address" id=""  placeholder="Enter your permanent address" rows="2" required=""><?php echo $userinfo->permanent_address; ?></textarea>
                                <span class="help-block first_name error"><?php echo form_error('permanent_address'); ?></span>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-xs-offset-3 col-xs-10">
                                <button class="btn btn-warning" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            </div>
                        </div>

                    </form>



                </div>
            </div>

        </div></ng-component>


</div>

</div>

</ng-component></app-root></div></div>
<?php
if (isset($footer)) {
    echo $footer;
}
?>
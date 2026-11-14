<?php
if (isset($header)) {
    echo $header;
}
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datePicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#mobile-number").blur(function () {
            $('#mobile-number-message').html('');
            var mobile = $('#mobile-number').val();
//           if(phone.indexOf('0')!==0){
            if (!mobile.match('[0-9]{11}')) {
//             alert('First number must be 10 disit');
                $('#mobile-number-message').html('Your mobile number is not valid');
                $('#mobile-number').val('');
            }
        });
    });

</script>

<style>
    .error{
        color:red;
    }
</style>
<div style="margin-top:53px;">
    <router-outlet></router-outlet><ng-component>
        <div class="container">


            <div class="tabbable-panel" style="max-width:600px; margin:50px auto;">
                <div class="tabbable-line">

                    <ul class="nav nav-tabs ">
                        <li class="">
                            <a href="<?php echo base_url(); ?>signup">
                                Merchant Sign Up</a>
                        </li>
                        <li class="active">
                            <a data-toggle="tab" href="#tab_default_2">
                                Rider Sign Up</a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <!--start Merchant Signup------------------------------------------------------------------------------------->
                        <div class="tab-pane" id="tab_default_1">

                        </div>

                        <!--start Rider Signup------------------------------------------------------------------------------------->
                        <div class="tab-pane active" id="tab_default_2">
                            <form class="form-horizontal" action="<?php echo base_url(); ?>signup/register_rider" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">First Name <span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input class="form-control ng-untouched ng-pristine ng-invalid" name="firstname" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('firstname');
                                        }
                                        ?>" placeholder="Enter your first name" type="text" required="">
                                        <span class="help-block first_name error"><?php echo form_error('firstname'); ?></span>
                                        <!---->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Last Name <span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input class="form-control ng-untouched ng-pristine ng-invalid" name="lastname" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('lastname');
                                        }
                                        ?>" placeholder="Enter your last name" type="text" required="">
                                        <span class="help-block  error"><?php echo form_error('lastname'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Father's Name <span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input class="form-control ng-untouched ng-pristine ng-invalid" name="father_name" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('father_name');
                                        }
                                        ?>" placeholder="Enter your father's name" type="text" required="">
                                        <span class="help-block  error"><?php echo form_error('father_name'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Mothers's Name <span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input class="form-control ng-untouched ng-pristine ng-invalid" name="mother_name" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('mother_name');
                                        }
                                        ?>" placeholder="Enter your mothers's name" type="text" required="">
                                        <span class="help-block  error"><?php echo form_error('mother_name'); ?></span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3">Date of Birth <span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            <input class="form-control datepicker" readonly="" name="dob" value="<?php
                                            if (!isset($success)) {
                                                echo set_value('dob');
                                            }
                                            ?>" placeholder="Enter your Date of Birth" type="text" required="">
                                            <span class="help-block  error"><?php echo form_error('dob'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $gender = '';
                                if (!isset($success)) {
                                    $gender = set_value('gender');
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
                                                <input type="radio" name="gender" value="Male" <?php if ($gender == 'Male') {
                                    echo 'checked';
                                } ?>>Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="gender" value="Female" <?php if ($gender == 'Female') {
                                    echo 'checked';
                                } ?>>Female
                                            </label>

                                            <span class="help-block error"><?php echo form_error('gender'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Marital Status <span class="text-danger"></span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input class="form-control ng-untouched ng-pristine ng-invalid" name="marital_status" value="<?php
                                if (!isset($success)) {
                                    echo set_value('marital_status');
                                }
                                ?>" placeholder="Enter your maritual status" type="text">
                                        <span class="help-block  error"><?php echo form_error('marital_status'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Email <span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                            <input class="form-control ng-untouched ng-pristine ng-invalid" name="email" value="<?php
                                if (!isset($success)) {
                                    echo set_value('email');
                                }
                                ?>" placeholder="Enter your Email ID" type="email" required="">
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
                                            <input class="form-control ng-untouched ng-pristine ng-invalid" id="mobile-number" name="mobile" value="<?php
                                if (!isset($success)) {
                                    echo set_value('mobile');
                                }
                                ?>" placeholder="Enter your Primary contact no." type="text" required="">
                                        </div>
                                        <span class="help-block first_name error" id="mobile-number-message"></span>
                                        <span class="help-block first_name error"><?php echo form_error('mobile'); ?></span>
                                        <!---->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Password <span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input class="form-control ng-untouched ng-pristine ng-invalid" name="password" value="<?php
                                if (!isset($success)) {
                                    echo set_value('password');
                                }
                                ?>" placeholder="Choose password (6-15 chars)" type="password" required="">
                                        </div>   
                                        <span class="help-block confirm_password error"><?php echo form_error('password'); ?></span>
                                        <!---->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Confirm Password <span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input class="form-control ng-untouched ng-pristine ng-invalid" name="confirm_password" value="<?php
                                if (!isset($success)) {
                                    echo set_value('confirm_password');
                                }
                                ?>" placeholder="Choose password (6-15 chars)" type="password" required="">
                                        </div>   
                                        <span class="help-block confirm_password error"><?php echo form_error('confirm_password'); ?></span>
                                        <!---->
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3">Region <span class="text-danger"></span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input class="form-control ng-untouched ng-pristine ng-invalid" name="region" value="<?php
                                if (!isset($success)) {
                                    echo set_value('region');
                                }
                                ?>" placeholder="Enter your region" type="text" >
                                        <span class="help-block  error"><?php echo form_error('region'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Nationality <span class="text-danger"></span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input class="form-control ng-untouched ng-pristine ng-invalid" name="nationality" value="<?php
                                if (!isset($success)) {
                                    echo set_value('nationality');
                                }
                                ?>" placeholder="Enter your nationality" type="text" >
                                        <span class="help-block  error"><?php echo form_error('nationality'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">NID Number <span class="text-danger"></span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input class="form-control ng-untouched ng-pristine ng-invalid" name="nid_number" value="<?php
                                if (!isset($success)) {
                                    echo set_value('nid_number');
                                }
                                ?>" placeholder="Enter your NID Number" type="text" >
                                        <span class="help-block  error"><?php echo form_error('nid_number'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Blood Group <span class="text-danger"></span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input class="form-control ng-untouched ng-pristine ng-invalid" name="blood_group" value="<?php
                                if (!isset($success)) {
                                    echo set_value('blood_group');
                                }
                                ?>" placeholder="Enter your blood group" type="text" >
                                        <span class="help-block  error"><?php echo form_error('blood_group'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Present Address<span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <textarea class="form-control ng-untouched ng-pristine ng-invalid" cols="30" name="address" id=""  placeholder="Enter your present address" rows="2" required=""><?php
                                if (!isset($success)) {
                                    echo set_value('address');
                                }
                                ?></textarea>
                                        <span class="help-block first_name error"><?php echo form_error('address'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Permanent Address<span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <textarea class="form-control ng-untouched ng-pristine ng-invalid" cols="30" name="permanent_address" id=""  placeholder="Enter your permanent address" rows="2" required=""><?php
                                if (!isset($success)) {
                                    echo set_value('permanent_address');
                                }
                                ?></textarea>
                                        <span class="help-block first_name error"><?php echo form_error('permanent_address'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Upload Photo<span class="text-danger"></span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input type="file" id="exampleInputFile" name="user_image">
                                        <p class="help-block">png,jpg,jpeg,gif format only</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Upload CV<span class="text-danger"></span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input type="file" id="exampleInputFile" name="your_cv">
                                        <p class="help-block">xls,doc,pdf,zip format only</p>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-10">
                                        <button class="btn btn-warning" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
                <a _ngcontent-c1="" class="text-center new-account" href="<?php echo base_url(); ?>signin">Signin </a>
            </div>

        </div>
    </ng-component>
</div></ng-component></app-root></div></div>


<?php
if (isset($footer)) {
    echo $footer;
}
?>
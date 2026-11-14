<?php
if (isset($header)) {
    echo $header;
}
?>
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

<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">
    <router-outlet></router-outlet><ng-component>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home"></span> </li>
            <!--<li>Users</li>-->
            <li class="active">Edit Profile</li>
        </ol>
        <div class="tabbable-panel" style="margin-top:20px;">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                    <!--                    <li class="active">
                                            <a data-toggle="tab" href="#tab_default_1">
                                            <a  href="<?php echo base_url(); ?>admin/user/rider_list">
                                                All Rider List </a>
                                        </li>-->

                   
                </ul>

                <div class="tab-content">
                    <?php $this->load->view('error-message-display'); ?>
                    <form class="form-horizontal" action="<?php echo base_url(); ?>client/user/update_client" method="post" enctype="multipart/form-data">
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
                            <label class="control-label col-sm-3">Email <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input class="form-control ng-untouched ng-pristine ng-invalid" name="email" value="<?php echo $userinfo->email; ?>" readonly="" placeholder="Enter your Email ID" type="email" required="">
                                </div>
                                <span class="help-block first_name error"><?php echo form_error('email'); ?></span>
                                <!---->
                                <!--<small> Your Email Id is being used for ensuring the security of your account, authorization and access recovery. </small> </div>-->
                        </div>
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
                                    <label class="control-label col-sm-3">Area <span class="text-danger">*</span></label>
                                    <div class="col-xs-8">			
                                        <select class="form-control ng-untouched ng-pristine ng-invalid" name="areaid" required="">
                                            <option value="<?php echo $user_area->areaid; ?>"><?php echo $user_area->area_name; ?></option>
                                            <?php foreach($area as $ar){?>
                                            <option value="<?php echo $ar->areaid; ?>"><?php echo $ar->area_name; ?></option>
                                            <?php } ?>

                                        </select>	
                                        <span class="help-block first_name error"><?php echo form_error('areaid'); ?></span>
                                    </div>
                                </div>
                       

                        <div class="form-group">
                            <label class="control-label col-sm-3">Address<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <textarea class="form-control ng-untouched ng-pristine ng-invalid" cols="30" name="address" id=""  placeholder="Enter your present address" rows="2" required=""><?php echo $userinfo->address; ?></textarea>
                                <span class="help-block first_name error"><?php echo form_error('address'); ?></span>
                            </div>
                        </div>

                       
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="steadfast_api_key">SteadFast API Key</label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" id="steadfast_api_key" name="steadfast_api_key" value="<?php echo $userinfo->steadfast_api_key; ?>" placeholder="Enter your SteadFast Courier API Key" type="text">
                                <span class="help-block  error"><?php echo form_error('steadfast_api_key'); ?></span>
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="steadfast_api_secret">SteadFast API Secret</label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" id="steadfast_api_secret" name="steadfast_api_secret" value="<?php echo $userinfo->steadfast_api_secret; ?>" placeholder="Enter your SteadFast Courier API Secret" type="text">
                                <span class="help-block  error"><?php echo form_error('steadfast_api_secret'); ?></span>
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
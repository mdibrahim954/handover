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
            <li class="active">Details</li>
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
                    <form class="form-horizontal" action="<?php echo base_url(); ?>admin/user/update_rider" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-3">First Name <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                               
                                <p><?php echo $userinfo->first_name; ?></p>
                                
                                <!---->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Last Name <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <p><?php echo $userinfo->last_name; ?></p>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Father's Name <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                 <p><?php echo $userinfo->father_name; ?></p>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Mothers's Name <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                 <p><?php echo $userinfo->mother_name; ?></p>
                               
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3">Date of Birth <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                     <p><?php echo $userinfo->dob; ?></p>
                                    
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
                                 <p><?php echo $gender; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Marital Status <span class="text-danger"></span></label>
                            <div class="col-md-8 col-sm-9">
                                 <p><?php echo $userinfo->marital_status; ?></p>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Email <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                     <p><?php echo $userinfo->email; ?></p>
                                   
                                </div>
                                <span class="help-block first_name error"></span>
                                <!---->
                                <small> Your Email Id is being used for ensuring the security of your account, authorization and access recovery. </small> </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3">Mobile <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                     <p><?php echo $userinfo->mobile; ?></p>
                                    
                                </div>
                                
                                <!---->
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-sm-3">Region <span class="text-danger"></span></label>
                            <div class="col-md-8 col-sm-9">
                                 <p><?php echo $userinfo->region; ?></p>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Nationality <span class="text-danger"></span></label>
                            <div class="col-md-8 col-sm-9">
                                 <p><?php echo $userinfo->nationality; ?></p>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">NID Number <span class="text-danger"></span></label>
                            <div class="col-md-8 col-sm-9">
                                 <p><?php echo $userinfo->nid_number; ?></p>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Blood Group <span class="text-danger"></span></label>
                            <div class="col-md-8 col-sm-9">
                                 <p><?php echo $userinfo->blood_group; ?></p>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Present Address<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                 <p><?php echo $userinfo->address; ?></p>
                               
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Permanent Address<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                 <p><?php echo $userinfo->permanent_address; ?></p>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Bank Information<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <?php if($userinfo->my_account_type=='cash'){?>
                                 <p>Cash</p>
                                <?php } ?>
                                <?php if($userinfo->my_account_type=='mobile_bank'){?>
                                 <p>Mobile Bank</p>
                                <?php } ?>
                                <?php if($userinfo->my_account_type=='bank'){?>
                                 <p>Bank</p>
                                <?php } ?>
                                 
                                <?php if($userinfo->my_account_type!='cash'){
                                $bankInfo=$this->db
                                        ->select('*')
                                        ->where('userid',$userinfo->userid)
                                        ->get('bank_info')
                                        ->row();
//                                echo '<pre>';
//                                print_r($bankInfo);
//                                echo '</pre>';
                                    } ?>

                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-3"><span class="text-danger"></span></label>
                            <div class="col-md-8 col-sm-9">
                                 <?php if($userinfo->my_account_type=='bank'){?>

                                Bank Name: <p><b><?php echo $bankInfo->bank_name; ?></b></p><br>
                                Account Name: <p><b><?php echo $bankInfo->bank_account_name; ?></b></p><br>
                                Account Account Number: <p><b><?php echo $bankInfo->bank_account_number; ?></b></p><br>
                                Account Routing Number: <p><b><?php echo $bankInfo->bank_routing_no; ?></b></p><br>
                                Branch Name: <p><b><?php echo $bankInfo->bank_branch_name; ?></b></p><br>
                                <?php } ?>
                                
                                <?php if($userinfo->my_account_type=='mobile_bank'){?>
                                Wallet Type: <p><b><?php echo $bankInfo->wallet_type; ?></b></p><br>
                                Wallet Number: <p><b><?php echo $bankInfo->wallet_number; ?></b></p><br>
                                Payment Info: <p><b><?php echo $bankInfo->payment_info; ?></b></p><br>

                                <?php } ?>
                                
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
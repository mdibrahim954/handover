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
<div style="margin-top:53px;">
    <router-outlet></router-outlet><ng-component>
        <div class="container">


            <div class="tabbable-panel" style="max-width:600px; margin:50px auto;">
                <div class="tabbable-line">

                    <ul class="nav nav-tabs ">
                        <li class="active">
                            <a data-toggle="tab" href="#tab_default_1">
                                Update Bank Information</a>
                        </li>

                    </ul>

                    <div class="tab-content">

                        <!--start Merchant Signup------------------------------------------------------------------------------------->
                        <div class="tab-pane active" id="tab_default_1">
                            <?php $this->load->view('error-message-display'); ?>
                            <form class="form-horizontal" action="<?php echo base_url(); ?>client/user/update_bankInfo" method="post" enctype="multipart/form-data" >


                                <script type="text/javascript">
                                    $("#should_contact_content").hide();
//                                    $("#bank_content_mobile_bank").hide();
                                    $(".bank_content_mobile_bank").hide();


                                    $("#should_contact_yes").on('click', function () {
                                        $("#should_contact_no").removeClass('checked');
                                        $("#should_contact_content").hide();
                                    })

                                    $("#should_contact_no").on('click', function () {
                                        $("#should_contact_yes").removeClass('checked');
                                        $("#should_contact_content").show();

                                    })

                                    function changeAccountType(accountType) {
                                        $(".bank_content").hide();
                                        $("#bank_content_" + accountType).show();

                                        $(".req_bank, .req_mobile_bank").removeAttr('required');
                                        $(".req_" + accountType).attr('required', true);

                                        $("#account_type").val(accountType);
                                    }
                                </script>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Bank Information<span class="text-danger"></span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <div class="col-md-3 col-sm-3">

                                            <div class="radio-option foundry-radio <?php if ($userinfo->my_account_type == 'bank') {
                                echo 'checked';
                            } ?>" onclick="changeAccountType('bank')">
                                                <div class="inner"></div>
                                                <input type="radio" <?php if ($userinfo->my_account_type == 'bank') {
                                echo 'checked';
                            } ?> name="my_account_type" value="bank">
                                                <span style="shadowed" data-localize="mr-should-contact-no">Bank</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-5">

                                            <div class="radio-option foundry-radio <?php if ($userinfo->my_account_type == 'mobile_bank') {
                                echo 'checked';
                            } ?>" onclick="changeAccountType('mobile_bank')">
                                                <div class="inner"></div>
                                                <input type="radio" <?php if ($userinfo->my_account_type == 'mobile_bank') {
                                echo 'checked';
                            } ?> name="my_account_type" value="mobile_bank" >
                                                <span style="shadowed" data-localize="mr-should-contact-yes">Mobile Bank</span>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-3">                                          
                                            <div class="radio-option foundry-radio <?php if ($userinfo->my_account_type == 'cash') {
                                echo 'checked';
                            } ?>" onclick="changeAccountType('cash')">
                                                <div class="inner"></div>
                                                <input type="radio" <?php if ($userinfo->my_account_type == 'cash') {
                                echo 'checked';
                            } ?> name="my_account_type" value="cash" >
                                                <span style="shadowed" data-localize="mr-should-contact-yes">Cash</span>
                                            </div>
                                            <span class="help-block  error"></span>
                                        </div>
                                    </div>
                                </div>



                                <input type="hidden" name="account_type" value="bank" id="account_type">


                                <div class="form-group">
                                    <label class="control-label col-sm-3"><span class="text-danger"></span></label>
                                    <div class="col-md-8 col-sm-9">


                                        <div class="col-md-12 bank_content" id="bank_content_bank" <?php if ($userinfo->my_account_type != 'bank') { ?>  style="display:none" <?php } ?>>
                                            <!--<div class="row">-->
                                            <div class="col-xs-12">
                                                <!--<label for="" data-localize="mr-bank-name">Bank Name</label>-->
                                                <label for="" data-localize="mr-bank-name"></label>

                                                <div class="select-option">
                                                    <i class="ti-angle-down"></i>
                                                    <select class="validate-required form-control"  name="bank_name" id="select-bank-name">
<?php if (!empty($bankinfo) && $bankinfo->bank_name) { ?>
                                                            <option value='<?php echo $bankinfo->bank_name; ?>'><?php echo $bankinfo->bank_name; ?></option> 
<?php } else { ?>
                                                            <option value='' data-localize="">Select Bank Name</option> 
<?php } ?>
                                                        <option value="Bangladesh Development Bank (BDBL)">Bangladesh Development Bank (BDBL)</option>
                                                        <option value="AB Bank">AB Bank</option>
                                                        <option value="Agrani Bank">Agrani Bank</option>
                                                        <option value="Al-Arafah Islami Bank">Al-Arafah Islami Bank</option>
                                                        <option value="Bangladesh Commerce Bank">Bangladesh Commerce Bank</option>
                                                        <option value="Bank Asia">Bank Asia</option>
                                                        <option value="Bangladesh Small Industries and Commerce Bank">Bangladesh Small Industries and Commerce Bank</option>
                                                        <option value="BRAC Bank">BRAC Bank</option>
                                                        <option value="Bangladesh Krishi Bank">Bangladesh Krishi Bank</option>
                                                        <option value="City Bank">City Bank</option>
                                                        <option value="Commercial Bank of Ceylon PLC">Commercial Bank of Ceylon PLC</option>
                                                        <option value="Dhaka Bank">Dhaka Bank</option>
                                                        <option value="Dutch-Bangla Bank">Dutch-Bangla Bank</option>
                                                        <option value="Eastern Bank">Eastern Bank</option>
                                                        <option value="Export Import Bank Of Bangladesh">Export Import Bank Of Bangladesh</option>
                                                        <option value="First Security Islami Bank">First Security Islami Bank</option>
                                                        <option value="Habib Bank">Habib Bank</option>
                                                        <option value="The Hongkong and Shanghai Banking Corporation">The Hongkong and Shanghai Banking Corporation</option>
                                                        <option value="ICB Islamic Bank">ICB Islamic Bank</option>
                                                        <option value="International Finance Investment and Commerce Bank">International Finance Investment and Commerce Bank</option>
                                                        <option value="Islami Bank Bangladesh Ltd">Islami Bank Bangladesh Ltd</option>
                                                        <option value="Jamuna Bank">Jamuna Bank</option>
                                                        <option value="Janata Bank">Janata Bank</option>
                                                        <option value="Mercantile Bank">Mercantile Bank</option>
                                                        <option value="Mutual Trust Bank">Mutual Trust Bank</option>
                                                        <option value="National Bank">National Bank</option>
                                                        <option value="National Bank of Pakistan">National Bank of Pakistan</option>
                                                        <option value="National Credit &amp; Commerce Bank">National Credit &amp; Commerce Bank</option>
                                                        <option value="One Bank">One Bank</option>
                                                        <option value="The Premier Bank">The Premier Bank</option>
                                                        <option value="Prime Bank">Prime Bank</option>
                                                        <option value="Pubali Bank">Pubali Bank</option>
                                                        <option value="Rupali Bank">Rupali Bank</option>
                                                        <option value="SBAC Bank">SBAC Bank</option>
                                                        <option value="Shahjalal Islami Bank">Shahjalal Islami Bank</option>
                                                        <option value="Social Islami Bank Ltd">Social Islami Bank Ltd</option>
                                                        <option value="Sonali Bank">Sonali Bank</option>
                                                        <option value="Southeast Bank">Southeast Bank</option>
                                                        <option value="Standard Bank">Standard Bank</option>
                                                        <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                                        <option value="Trust Bank">Trust Bank</option>
                                                        <option value="United Commercial Bank">United Commercial Bank</option>
                                                        <option value="Uttara Bank">Uttara Bank</option>
                                                        <option value="Bank Al-Falah Limited">Bank Al-Falah Limited</option>
                                                        <option value="BASIC Bank Limited">BASIC Bank Limited</option>
                                                        <option value="Citibank N.A">Citibank N.A</option>
                                                        <option value="Meghna Bank Limited">Meghna Bank Limited</option>
                                                        <option value="Midland Bank Limited">Midland Bank Limited</option>
                                                        <option value="NRB Commercial Bank Limited">NRB Commercial Bank Limited</option>
                                                        <option value="NRBC Bank Limited">NRBC Bank Limited</option>
                                                        <option value="Rajshahi Krishi Unnayan Bank">Rajshahi Krishi Unnayan Bank</option>
                                                        <option value="Shimanto Bank Limited">Shimanto Bank Limited</option>
                                                        <option value="South Bangla Agriculture &amp; Commerce Bank Limited">South Bangla Agriculture &amp; Commerce Bank Limited</option>
                                                        <option value="State Bank of India">State Bank of India</option>
                                                        <option value="Union Bank Limited">Union Bank Limited</option>
                                                        <option value="Woori Bank">Woori Bank</option>
                                                        <option value="United Commercial Bank Limited">United Commercial Bank Limited</option>
                                                    </select>
                                                </div>


                                                <!-- <div id="other-bank-name-content" style="display:none">
                                                <input type="text" placeholder="Other Bank Name" name="other_bank_name"/>
                                                
                                              </div> -->


                                            </div>

                                            <div class="col-xs-12">
                                                <!--<label for="" data-localize="mr-bank-account-name">Bank Account Name</label>-->
                                                <label for="" data-localize="mr-bank-account-name"></label>

                                                <input type="text" placeholder="Bank Account Name" name="bank_account_name" value="<?php if (!empty($bankinfo) && $bankinfo->bank_account_name) {
    echo $bankinfo->bank_account_name;
} ?>" class="req_bank form-control">
                                            </div>


                                            <div class="col-xs-12">
                                                <!--<label for="" data-localize="mr-bank-account-number">Bank Account Number</label>-->
                                                <label for="" data-localize="mr-bank-account-number"></label>

                                                <input type="text" placeholder="Bank Account Number" name="bank_account_number" value="<?php if (!empty($bankinfo) && $bankinfo->bank_account_number) {
    echo $bankinfo->bank_account_number;
} ?>"  class="req_bank form-control">
                                            </div>

                                            <div class="col-xs-12">
                                                <!--<label for="" data-localize="mr-bank-account-routing-number">Routing</label>-->
                                                <label for="" data-localize="mr-bank-account-routing-number"></label>

                                                <input type="text" placeholder="Routing Number" name="bank_routing_no" value="<?php if (!empty($bankinfo) && $bankinfo->bank_routing_no) {
    echo $bankinfo->bank_routing_no;
} ?>" class="req_bank form-control">
                                            </div>

                                            <div class="col-xs-12">
                                                <!--<label for="" data-localize="mr-bank-account-number">Branch Name</label>-->
                                                <label for="" data-localize="mr-bank-account-number"></label>

                                                <input type="text" placeholder="Branch Name" name="bank_branch_name" value="<?php if (!empty($bankinfo) && $bankinfo->bank_branch_name) {
    echo $bankinfo->bank_branch_name;
} ?>" class="req_bank form-control">
                                            </div>

                                            <!--</div>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3"><span class="text-danger"></span></label>
                                    <div class="col-md-8 col-sm-9">


                                        <div class="col-md-12 bank_content bank_content_mobile_bank" id="bank_content_mobile_bank"  <?php if ($userinfo->my_account_type != 'mobile_bank') { ?>  style="display:none" <?php } ?> >
                                            <!--<div class="row">-->
                                            <div class="col-xs-12" style="margin-top:-30px">

                                                <!--<label for="" data-localize="mr-wallet-type">Mobile Wallet type</label>-->
                                                <label for="" data-localize="mr-wallet-type"></label>
                                                <div class="select-option">
                                                    <i class="ti-angle-down"></i>
                                                    <select class="validate-required form-control" name="wallet_type">
<?php if (!empty($bankinfo) && $bankinfo->wallet_type) { ?>
                                                            <option value='<?php echo $bankinfo->wallet_type; ?>'><?php echo $bankinfo->wallet_type; ?></option> 
<?php } else { ?>
                                                            <option value=''>Select Wallet Type</option>
<?php } ?>
                                                        <option value='dbbl'>dbbl</option>
                                                        <option value='bkash'>bkash</option>
                                                        <option value="mcash">mCash</option>
                                                        <option value="rocket">rocket</option>
                                                        <option value="ucash">ucash</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col-xs-12">
                                                <!--<label for="" data-localize="mr-wallet-number">Wallet Number</label>-->
                                                <label for="" data-localize="mr-wallet-number"></label>

                                                <input type="text" placeholder="Wallet Number" name="wallet_number" value="<?php if (!empty($bankinfo) && $bankinfo->wallet_number) {
    echo $bankinfo->wallet_number;
} ?>" class="req_mobile_bank form-control">
                                            </div>


                                            <div class="col-xs-12">

                                                <!--<label for="" data-localize="mr-payment-instruction">Payment Instructions (plain)</label>-->
                                                <label for="" data-localize="mr-payment-instruction"></label>
                                                <input type="text" placeholder="Payment Info" name="payment_info" value="<?php if (!empty($bankinfo) && $bankinfo->payment_info) {
    echo $bankinfo->payment_info;
} ?>" class="req_mobile_bank form-control">
                                            </div>

                                            <!--</div>-->
                                        </div>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-10">
                                        <button class="btn btn-warning" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UPDATE <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>




        </div>

        <!---->
        <!---->
    </ng-component>
</div></ng-component></app-root></div></div>


<?php
if (isset($footer)) {
    echo $footer;
}?>
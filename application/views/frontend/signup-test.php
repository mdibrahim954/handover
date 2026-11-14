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
            changeYear: true
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
                        <li class="active">
                            <a data-toggle="tab" href="#tab_default_1">
                                Merchant Sign Up</a>
                        </li>
                        <li class="">
                            <a href="<?php echo base_url(); ?>signup/rider">
                                Rider Sign Up</a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <!--start Merchant Signup------------------------------------------------------------------------------------->
                        <div class="tab-pane active" id="tab_default_1">
                            <form class="form-horizontal" action="<?php echo base_url(); ?>signup/register_ajax" method="post" enctype="multipart/form-data" >
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
                                        <span class="help-block first_name error"><?php echo form_error('lastname'); ?></span>
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
                                    <label class="control-label col-sm-3">Company Name <span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input class="form-control ng-untouched ng-pristine ng-invalid" name="companyname" value="<?php
                                        if (!isset($success)) {
                                            echo set_value('companyname');
                                        }
                                        ?>" placeholder="Enter your company name" type="text" required="">
                                        <span class="help-block first_name error"><?php echo form_error('companyname'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Address<span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <textarea class="form-control ng-untouched ng-pristine ng-invalid" cols="30" name="address" id=""  placeholder="Enter your company address" rows="2" required=""><?php
                                            if (!isset($success)) {
                                                echo set_value('address');
                                            }
                                            ?></textarea>
                                        <span class="help-block first_name error"><?php echo form_error('address'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Area <span class="text-danger">*</span></label>
                                    <div class="col-xs-8">			
                                        <select class="form-control ng-untouched ng-pristine ng-invalid" name="areaid" required="">
                                            <!----><option value="">Select One..</option>
                                            <option value="17">Adabor</option>
                                            <option value="68">Agargaon</option>
                                            <option value="58">Ahmed bag</option>
                                            <option value="113">Airport</option>
                                            <option value="19">Azimpur</option>
                                            <option value="14">Badda</option>
                                            <option value="12">Badda - Middle Badda</option>
                                            <option value="13">Badda - Uttar Badda</option>
                                            <option value="88">Banani</option>
                                            <option value="61">Banasree</option>
                                            <option value="21">Bangsal</option>
                                            <option value="4">Baridhara</option>
                                            <option value="56">Bashabo</option>
                                            <option value="65">Bosila</option>
                                            <option value="106">BUET</option>
                                            <option value="22">Cantonment</option>
                                            <option value="23">Chowk bazar</option>
                                            <option value="69">Darussalam</option>
                                            <option value="24">Demra</option>
                                            <option value="110">Dhaka Medical</option>
                                            <option value="107">Dhaka University</option>
                                            <option value="7">Dhanmondi</option>
                                            <option value="16">Dhanmondi - Shankar</option>
                                            <option value="111">Dokkhin Khan</option>
                                            <option value="102">Elephant road</option>
                                            <option value="40">Farmgate</option>
                                            <option value="63">Gabtoli</option>
                                            <option value="25">Gandaria</option>
                                            <option value="57">Goran</option>
                                            <option value="1">Gulshan-1</option>
                                            <option value="87">Gulshan-2</option>
                                            <option value="86">Hatirjheel</option>
                                            <option value="26">Hazaribagh</option>
                                            <option value="105">Jatrabari</option>
                                            <option value="112">Jurain</option>
                                            <option value="27">Kadamtali</option>
                                            <option value="28">Kafrul</option>
                                            <option value="29">kalabagan</option>
                                            <option value="62">Kallyanpur</option>
                                            <option value="30">kamrangirchar</option>
                                            <option value="31">Khilgaon</option>
                                            <option value="32">Khilkhet</option>
                                            <option value="33">Kotwali</option>
                                            <option value="71">Kuril</option>
                                            <option value="34">Lalbagh</option>
                                            <option value="64">Lalmatia</option>
                                            <option value="53">Magh Bazar</option>
                                            <option value="55">Malibagh</option>
                                            <option value="89">Mirpur-1</option>
                                            <option value="5">Mirpur-10</option>
                                            <option value="93">Mirpur-11</option>
                                            <option value="91">Mirpur-12</option>
                                            <option value="92">Mirpur-14</option>
                                            <option value="90">Mirpur-2</option>
                                            <option value="95">Mohakhali</option>
                                            <option value="2">Mohakhali-DOHS</option>
                                            <option value="6">Mohammadpur</option>
                                            <option value="70">Monipur-Mirpur</option>
                                            <option value="36">Motijheel</option>
                                            <option value="54">Mouchak</option>
                                            <option value="94">Naya Paltan</option>
                                            <option value="35">New Market</option>
                                            <option value="85">Nikunja</option>
                                            <option value="37">Pallabi</option>
                                            <option value="39">Panthapath</option>
                                            <option value="109">Puran Dhaka</option>
                                            <option value="38">Purana Paltan</option>
                                            <option value="41">Ramna</option>
                                            <option value="59">Rampura</option>
                                            <option value="67">Rayer Bazar</option>
                                            <option value="108">Razarbagh</option>
                                            <option value="42">Sabujbagh</option>
                                            <option value="114">Savar Bus Stand</option>
                                            <option value="51">Segunbagicha</option>
                                            <option value="43">Shahbag</option><option value="52">Shantinagar</option><option value="44">Sher-E-Bangla Nagor</option><option value="66">Shukrabad</option><option value="60">Shyamoli</option><option value="45">Shyampur</option><option value="46">Sutrapur</option><option value="48">Tejgaon</option><option value="47">Tejgaon Industrial Area</option><option value="49">Uttar Khan</option><option value="15">Uttara</option><option value="9">Uttara - Sector-1</option><option value="104">Uttara - Sector-10</option><option value="10">Uttara - Sector-2</option><option value="11">Uttara - Sector-3</option><option value="50">Vatara</option><option value="18">Wari</option><option value="116">Whole Nation SA Paribahan</option><option value="115">Whole Nation SundarBan Courier</option>
                                            <option value="101">Zigatala</option>
                                        </select>	
                                        <span class="help-block first_name error"><?php echo form_error('areaid'); ?></span>
                                    </div>
                                </div>
 <script type="text/javascript">
  $("#should_contact_content").hide();
  $("#bank_content_mobile_bank").hide();

  $("#should_contact_yes").on('click', function(){
     $("#should_contact_no").removeClass('checked');
     $("#should_contact_content").hide();
  })

  $("#should_contact_no").on('click', function(){
     $("#should_contact_yes").removeClass('checked');
     $("#should_contact_content").show();
     
  })

  function changeAccountType(accountType){
    $(".bank_content").hide();
    $("#bank_content_"+accountType).show();

    $(".req_bank, .req_mobile_bank").removeAttr('required');
    $(".req_"+accountType).attr('required', true);

    $("#account_type").val(accountType);
  }
</script>
<div class="col-xs-12">
                              <!-- <label data-localize="mr-should-contact">Payment Type</label> -->
                            <div class="radio-option foundry-radio checked" onclick="changeAccountType('bank')">
                                    <div class="inner"></div>
                                    <input type="radio" name="my_account_type" value="bank">
                                </div>
                                <span style="shadowed" data-localize="mr-should-contact-no">না</span>
                                <div class="radio-option foundry-radio" onclick="changeAccountType('mobile_bank')">
                                    <div class="inner"></div>
                                    <input type="radio" name="my_account_type" value="mobile_bank">
                                </div>
                                <span style="shadowed" data-localize="mr-should-contact-yes">হাঁ</span>


                                <div class="radio-option foundry-radio" onclick="changeAccountType('cash')">
                                    <div class="inner"></div>
                                    <input type="radio" name="my_account_type" value="cash">
                                </div>
                                <span style="shadowed" data-localize="mr-should-contact-yes">হাঁ</span>

                            </div>
<div class="col-md-12 bank_content" id="bank_content_bank" style="display: block;">
                             <div class="row">
                               <div class="col-xs-4">
                                 <label for="" data-localize="mr-bank-name">ব্যাংকের নাম</label>
                          
                                <div class="select-option">
                                        <i class="ti-angle-down"></i>
                                        <select class="validate-required" name="bank_name" id="select-bank-name">
                                          <!-- <option value='' data-localize="mr-select-bank">Select Bank Name</option> -->
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
                                 <input type="hidden" name="account_type" value="bank" id="account_type">

                        <div class="col-xs-4">
                          <label for="" data-localize="mr-bank-account-name">ব্যাংক একাউন্টের নাম</label>
                           
                           <input type="text" placeholder="Bank Account Name" name="bank_account_name" class="req_bank" required="required">
                        </div>


                         <div class="col-xs-4">
                          <label for="" data-localize="mr-bank-account-number">ব্যাংক একাউন্ট নাম্বার</label>
                           
                           <input type="text" placeholder="Bank Account Number" name="bank_account_number" class="req_bank" required="required">
                        </div>
                        
                         <div class="col-xs-6">
                          <label for="" data-localize="mr-bank-account-routing-number">Routing</label>
                           
                           <input type="text" placeholder="Routing Number" name="bank_routing_no" class="req_bank" required="required">
                        </div>
                        
                         <div class="col-xs-6">
                          <label for="" data-localize="mr-bank-account-number">ব্যাংক একাউন্ট নাম্বার</label>
                           
                           <input type="text" placeholder="Branch Name" name="bank_branch_name" class="req_bank" required="required">
                        </div>
                        
                             </div>
                          </div>
<div class="row">
                               <div class="col-xs-4">

                         <label for="" data-localize="mr-wallet-type">মোবাইল ওয়ালেটের ধরণ</label>
                          <div class="select-option">
                                       <i class="ti-angle-down"></i>
                                       <select class="validate-required" name="wallet_type">
                                          <option value="">Select Wallet Type</option>
                                           <option value="dbbl">dbbl</option>
                                           <option value="bkash">bkash</option>
                                           <option value="mcash">mCash</option>
                                           <option value="rocket">rocket</option>
                                           <option value="ucash">ucash</option>
                                       </select>
                                   </div>
                       
                       </div>

                        <div class="col-xs-4">
                          <label for="" data-localize="mr-wallet-number">ওয়ালেট নাম্বার</label>
                           
                           <input type="text" placeholder="Wallet Number" name="wallet_number" class="req_mobile_bank" required="required">
                        </div>


                        <div class="col-xs-4">

                          <label for="" data-localize="mr-payment-instruction">টাকা প্রদানের নির্দেশনা (স্পষ্ট ভাবে)</label>
                           <input type="text" placeholder="Payment Info" name="payment_info" class="req_mobile_bank" required="required">
                        </div>

                          </div>

                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-10">
                                        <button class="btn btn-warning" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <!--start Rider Signup------------------------------------------------------------------------------------->
                        <div class="tab-pane" id="tab_default_2">

                        </div>
                    </div>

                </div>
                <a _ngcontent-c1="" class="text-center new-account" href="<?php echo base_url(); ?>signin">Signin </a>
            </div>




        </div>

        <!---->
        <!---->
    </ng-component>
</div></ng-component></app-root></div></div>


<?php
if (isset($footer)) {
    echo $footer;
}
?>
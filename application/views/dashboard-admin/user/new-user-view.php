<?php
if (isset($header)) {
    echo $header;
}
?>


<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">


    <router-outlet></router-outlet><ng-component>

        <div class="card" style="max-width:700px;margin:50px auto;">
            <div class="header">
                <h4 class="title"><span>Create New User</span> </h4>
                <?php
                $this->load->view('error-message-display');

                $area_list = $this->db
                        ->select('*')
                        ->order_by('area_name', 'ASC')
                        ->get('areas')
                        ->result();
                ?>
                <style>
                    .error{
                        color:red;
                    }
                </style>
            </div>
            <div class="content">

                <form class="form-horizontal" action="<?php echo base_url(); ?>admin/user/user_save" method="post">


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
                        <label class="control-label col-sm-3">Email ID <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="email" value="<?php
                                if (!isset($success)) {
                                    echo set_value('email');
                                }
                                ?>" placeholder="Enter your Email ID" type="email" required="">
                                <span class="help-block first_name error"><?php echo form_error('email'); ?></span>
                            </div>
                            <!---->
                            <small> Your Email Id is being used for ensuring the security of your account, authorization and access recovery. </small> </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-3">Mobile <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="mobile" value="<?php
                                if (!isset($success)) {
                                    echo set_value('mobile');
                                }
                                ?>" placeholder="Enter your Primary contact no." type="text" required="">
                                <span class="help-block first_name error"><?php echo form_error('mobile'); ?></span>
                            </div>
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
                        <label class="control-label col-sm-3">User Type <span class="text-danger">*</span></label>
                        <div class="col-xs-8">			
                            <select class="form-control ng-untouched ng-pristine ng-invalid" name="usertypeid" required="">
                                <option value="">Select any..</option>
                                <option value="1">Admin</option>
                                <option value="2">Delivery Man</option>
                                <option value="3">Client</option>
                                <option value="5">Corporate Client</option>
                                <option value="6">test</option>
                            </select>			
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Area <span class="text-danger">*</span></label>
                        <div class="col-xs-8">			
                            <select class="form-control ng-untouched ng-pristine ng-invalid" name="areaid" required="">
                                <!--<option value="17">Adabor</option><option value="68">Agargaon</option><option value="58">Ahmed bag</option><option value="113">Airport</option><option value="19">Azimpur</option><option value="14">Badda</option><option value="12">Badda - Middle Badda</option><option value="13">Badda - Uttar Badda</option><option value="88">Banani</option><option value="61">Banasree</option><option value="21">Bangsal</option><option value="4">Baridhara</option><option value="56">Bashabo</option><option value="65">Bosila</option><option value="106">BUET</option><option value="22">Cantonment</option><option value="23">Chowk bazar</option><option value="69">Darussalam</option><option value="24">Demra</option><option value="110">Dhaka Medical</option><option value="107">Dhaka University</option><option value="7">Dhanmondi</option><option value="16">Dhanmondi - Shankar</option><option value="111">Dokkhin Khan</option><option value="102">Elephant road</option><option value="40">Farmgate</option><option value="63">Gabtoli</option><option value="25">Gandaria</option><option value="57">Goran</option><option value="1">Gulshan-1</option><option value="87">Gulshan-2</option><option value="86">Hatirjheel</option><option value="26">Hazaribagh</option><option value="105">Jatrabari</option><option value="112">Jurain</option><option value="27">Kadamtali</option><option value="28">Kafrul</option><option value="29">kalabagan</option><option value="62">Kallyanpur</option><option value="30">kamrangirchar</option><option value="31">Khilgaon</option><option value="32">Khilkhet</option><option value="33">Kotwali</option><option value="71">Kuril</option><option value="34">Lalbagh</option><option value="64">Lalmatia</option><option value="53">Magh Bazar</option><option value="55">Malibagh</option><option value="89">Mirpur-1</option><option value="5">Mirpur-10</option><option value="93">Mirpur-11</option><option value="91">Mirpur-12</option><option value="92">Mirpur-14</option><option value="90">Mirpur-2</option><option value="95">Mohakhali</option><option value="2">Mohakhali-DOHS</option><option value="6">Mohammadpur</option><option value="70">Monipur-Mirpur</option><option value="36">Motijheel</option><option value="54">Mouchak</option><option value="94">Naya Paltan</option><option value="35">New Market</option><option value="85">Nikunja</option><option value="37">Pallabi</option><option value="39">Panthapath</option><option value="109">Puran Dhaka</option><option value="38">Purana Paltan</option><option value="41">Ramna</option><option value="59">Rampura</option><option value="67">Rayer Bazar</option><option value="108">Razarbagh</option><option value="42">Sabujbagh</option><option value="114">Savar Bus Stand</option><option value="51">Segunbagicha</option><option value="43">Shahbag</option><option value="52">Shantinagar</option><option value="44">Sher-E-Bangla Nagor</option><option value="66">Shukrabad</option><option value="60">Shyamoli</option><option value="45">Shyampur</option><option value="46">Sutrapur</option><option value="48">Tejgaon</option><option value="47">Tejgaon Industrial Area</option><option value="49">Uttar Khan</option><option value="15">Uttara</option><option value="9">Uttara - Sector-1</option><option value="104">Uttara - Sector-10</option><option value="10">Uttara - Sector-2</option><option value="11">Uttara - Sector-3</option><option value="50">Vatara</option><option value="18">Wari</option><option value="116">Whole Nation SA Paribahan</option><option value="115">Whole Nation SundarBan Courier</option><option value="101">Zigatala</option>-->
                                <option value="">Select any..</option>
                                <?php foreach ($area_list as $row) { ?>
                                    <option value="<?php echo $row->areaid; ?>"><?php echo $row->area_name; ?></option>
                                <?php } ?>
                            </select>			
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Address <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <textarea class="form-control ng-untouched ng-pristine ng-invalid" name="address" placeholder="Address" required=""><?php
                                if (!isset($success)) {
                                    echo set_value('address');
                                }
                                ?></textarea>
                            <!---->
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
    </ng-component>


</div>

</div>

</ng-component></app-root></div></div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>
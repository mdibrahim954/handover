<?php
if (isset($header)) {
    echo $header;
}
?>
<div class="row" style="margin-top:57px;">
    <div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">
        <router-outlet></router-outlet><ng-component>
            <br>
            <?php $this->load->view('error-message-display'); ?>
            <br>
            <script>
                $(document).ready(function () {
                    $('.seller_info').change(function () {
            //            alert('hi');
                        var sellerid = $(this).val();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>admin/order/seller_info",
                            data: 'sellerid=' + sellerid,
                            success: function (data) {
            //                    alert(data);
                                var jsondata = $.parseJSON(data);
            //                  console.log(jsondata);
                                $('#sellersmobile').val(jsondata.mobile);
                                $('#sellersaddress').html(jsondata.address);
                            }
                        });
                    });
                });
            </script>

            <form class="form-horizontal ng-untouched ng-pristine ng-invalid" action="<?php echo base_url(); ?>admin/order/order_save" method="post">
                <div class="card" style="max-width:700px;margin:10px auto;">
                    <div class="header" style="text-align:center">
                        <h4 class="title"><span>New Order</span> </h4>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Delivery Type <span class="text-danger">*</span></label>
                            <div class="col-xs-8">			
                                <select class="form-control ng-untouched ng-pristine ng-valid" name="deliverytypeid" required="">
                                    <option value="">Select any..</option>
                                    <?php foreach ($delivery as $row) { ?>
                                        <option value="<?php echo $row->order_type_id; ?>"><?php echo $row->order_type_name; ?></option>
                                    <?php } ?>

                                </select>			
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Seller's Name<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <!--<input class="form-control ng-untouched ng-pristine ng-valid" name="sellersname" placeholder="" value="" type="text">-->
                                <select class="form-control seller_info" name="sellerid" required="">
                                    <option value="">Select sellers..</option>
                                    <?php foreach ($sellerInfo as $row) { ?>
                                        <option value="<?php echo $row->userid; ?>"><?php echo $row->first_name . ' ' . $row->last_name; ?></option>
                                    <?php } ?>
                                </select>	
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Phone<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input class="form-control sellersmobile" id="sellersmobile" name="sellersmobile" value="" type="text">
                                </div>
                                <!---->
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3">Address<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">	
                                <textarea class="form-control ng-untouched ng-pristine ng-valid"  id="sellersaddress" name="sellersaddress" style="height:80px;"></textarea>
                                <!---->
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3">Pickup Area<span class="text-danger">*</span></label>
                            <div class="col-xs-8">			
                                <select class="form-control ng-untouched ng-pristine ng-valid" name="pickupareaid" required="">
                                    <!----><option value="">Select any..</option>
                                    <!----><option value="17">Adabor</option>
                                    <option value="68">Agargaon</option><option value="58">Ahmed bag</option><option value="113">Airport</option><option value="19">Azimpur</option><option value="14">Badda</option><option value="12">Badda - Middle Badda</option><option value="13">Badda - Uttar Badda</option><option value="88">Banani</option><option value="61">Banasree</option><option value="21">Bangsal</option><option value="4">Baridhara</option><option value="56">Bashabo</option><option value="65">Bosila</option><option value="106">BUET</option><option value="22">Cantonment</option><option value="23">Chowk bazar</option><option value="69">Darussalam</option><option value="24">Demra</option><option value="110">Dhaka Medical</option><option value="107">Dhaka University</option><option value="7">Dhanmondi</option><option value="16">Dhanmondi - Shankar</option><option value="111">Dokkhin Khan</option><option value="102">Elephant road</option><option value="40">Farmgate</option><option value="63">Gabtoli</option><option value="25">Gandaria</option><option value="57">Goran</option><option value="1">Gulshan-1</option><option value="87">Gulshan-2</option><option value="86">Hatirjheel</option><option value="26">Hazaribagh</option><option value="105">Jatrabari</option><option value="112">Jurain</option><option value="27">Kadamtali</option><option value="28">Kafrul</option><option value="29">kalabagan</option><option value="62">Kallyanpur</option><option value="30">kamrangirchar</option><option value="31">Khilgaon</option><option value="32">Khilkhet</option><option value="33">Kotwali</option><option value="71">Kuril</option><option value="34">Lalbagh</option><option value="64">Lalmatia</option><option value="53">Magh Bazar</option><option value="55">Malibagh</option><option value="89">Mirpur-1</option><option value="5">Mirpur-10</option><option value="93">Mirpur-11</option><option value="91">Mirpur-12</option><option value="92">Mirpur-14</option><option value="90">Mirpur-2</option><option value="95">Mohakhali</option><option value="2">Mohakhali-DOHS</option><option value="6" selected="selected">Mohammadpur</option><option value="70">Monipur-Mirpur</option><option value="36">Motijheel</option><option value="54">Mouchak</option><option value="94">Naya Paltan</option><option value="35">New Market</option><option value="85">Nikunja</option><option value="37">Pallabi</option><option value="39">Panthapath</option><option value="109">Puran Dhaka</option><option value="38">Purana Paltan</option><option value="41">Ramna</option><option value="59">Rampura</option><option value="67">Rayer Bazar</option><option value="108">Razarbagh</option><option value="42">Sabujbagh</option><option value="114">Savar Bus Stand</option><option value="51">Segunbagicha</option><option value="43">Shahbag</option><option value="52">Shantinagar</option><option value="44">Sher-E-Bangla Nagor</option><option value="66">Shukrabad</option><option value="60">Shyamoli</option><option value="45">Shyampur</option><option value="46">Sutrapur</option><option value="48">Tejgaon</option><option value="47">Tejgaon Industrial Area</option><option value="49">Uttar Khan</option><option value="15">Uttara</option><option value="9">Uttara - Sector-1</option><option value="104">Uttara - Sector-10</option><option value="10">Uttara - Sector-2</option><option value="11">Uttara - Sector-3</option><option value="50">Vatara</option><option value="18">Wari</option><option value="116">Whole Nation SA Paribahan</option><option value="115">Whole Nation SundarBan Courier</option><option value="101">Zigatala</option>
                                </select>			
                                <!---->
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3">Pickup Time<span class="text-danger">*</span></label>
                            <div class="col-md-9 col-sm-10">
                                <div class="input-group">

                                    <input class="form-control ng-untouched ng-pristine ng-valid datepicker" name="pickupDate" id="" style="width:110px;" value="" type="text" required="">

                                    <select class="form-control ng-untouched ng-pristine ng-valid" name="pickupTime" style="width:110px;margin-left:5px;" required="">
                                        <!----><option value="">Select any..</option>
                                        <!----><option value="07:00 AM">07:00 AM</option>
                                        <option value="07:30 AM">07:30 AM</option><option value="07:45 AM">07:45 AM</option><option value="08:00 AM">08:00 AM</option><option value="08:30 AM">08:30 AM</option><option value="08:45 AM">08:45 AM</option><option value="09:00 AM">09:00 AM</option><option value="09:30 AM">09:30 AM</option><option value="09:45 AM">09:45 AM</option><option value="10:00 AM">10:00 AM</option><option value="10:30 AM">10:30 AM</option><option value="10:45 AM">10:45 AM</option><option value="11:00 AM">11:00 AM</option><option value="11:30 AM">11:30 AM</option><option value="11:45 AM">11:45 AM</option><option value="12:00 PM">12:00 PM</option><option value="12:30 PM">12:30 PM</option><option value="12:45 PM">12:45 PM</option><option value="01:00 PM">01:00 PM</option><option value="01:30 PM">01:30 PM</option><option value="01:45 PM">01:45 PM</option><option value="02:00 PM">02:00 PM</option><option value="02:30 PM">02:30 PM</option><option value="02:45 PM">02:45 PM</option><option value="03:00 PM">03:00 PM</option><option value="03:30 PM">03:30 PM</option><option value="03:45 PM">03:45 PM</option><option value="04:00 PM">04:00 PM</option><option value="04:30 PM">04:30 PM</option><option value="04:45 PM">04:45 PM</option><option value="05:00 PM">05:00 PM</option><option value="05:30 PM">05:30 PM</option><option value="05:45 PM">05:45 PM</option><option value="06:00 PM">06:00 PM</option><option value="06:30 PM">06:30 PM</option><option value="06:45 PM">06:45 PM</option><option value="07:00 PM">07:00 PM</option><option value="07:30 PM">07:30 PM</option><option value="07:45 PM">07:45 PM</option><option value="08:00 PM">08:00 PM</option><option value="08:30 PM">08:30 PM</option><option value="08:45 PM">08:45 PM</option><option value="09:00 PM">09:00 PM</option><option value="09:30 PM">09:30 PM</option><option value="09:45 PM">09:45 PM</option><option value="10:00 PM">10:00 PM</option><option value="10:30 PM">10:30 PM</option><option value="10:45 PM">10:45 PM</option><option value="11:00 PM">11:00 PM</option><option value="11:30 PM">11:30 PM</option><option value="11:45 PM">11:45 PM</option>
                                    </select>

                                </div>
                            </div>
                        </div>	

                        <hr>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Customer Name<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="customername" id="customername" name="customername" placeholder="" type="text">
                                <!---->
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Phone<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="customermobile" id="customermobile" name="customermobile" placeholder="" type="text">
                                </div>
                                <!---->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Address<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">	
                                <textarea class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="customeraddress" id="customeraddress" name="customeraddress" style="height:80px;"></textarea>
                                <!---->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Delivery Area<span class="text-danger">*</span></label>
                            <div class="col-xs-8">			
                                <select class="form-control ng-untouched ng-pristine ng-invalid" name="deliveryareaid" required="">
                                    <!----><option value="">Select any</option>
                                    <?php foreach ($area as $row) { ?>
                                        <option value="<?php echo $row->areaid; ?>"><?php echo $row->area_name; ?></option>
                                    <?php } ?>
                                    <!--<option value="17">Adabor</option><option value="68">Agargaon</option><option value="58">Ahmed bag</option><option value="113">Airport</option><option value="19">Azimpur</option><option value="14">Badda</option><option value="12">Badda - Middle Badda</option><option value="13">Badda - Uttar Badda</option><option value="88">Banani</option><option value="61">Banasree</option><option value="21">Bangsal</option><option value="4">Baridhara</option><option value="56">Bashabo</option><option value="65">Bosila</option><option value="106">BUET</option><option value="22">Cantonment</option><option value="23">Chowk bazar</option><option value="69">Darussalam</option><option value="24">Demra</option><option value="110">Dhaka Medical</option><option value="107">Dhaka University</option><option value="7">Dhanmondi</option><option value="16">Dhanmondi - Shankar</option><option value="111">Dokkhin Khan</option><option value="102">Elephant road</option><option value="40">Farmgate</option><option value="63">Gabtoli</option><option value="25">Gandaria</option><option value="57">Goran</option><option value="1">Gulshan-1</option><option value="87">Gulshan-2</option><option value="86">Hatirjheel</option><option value="26">Hazaribagh</option><option value="105">Jatrabari</option><option value="112">Jurain</option><option value="27">Kadamtali</option><option value="28">Kafrul</option><option value="29">kalabagan</option><option value="62">Kallyanpur</option><option value="30">kamrangirchar</option><option value="31">Khilgaon</option><option value="32">Khilkhet</option><option value="33">Kotwali</option><option value="71">Kuril</option><option value="34">Lalbagh</option><option value="64">Lalmatia</option><option value="53">Magh Bazar</option><option value="55">Malibagh</option><option value="89">Mirpur-1</option><option value="5">Mirpur-10</option><option value="93">Mirpur-11</option><option value="91">Mirpur-12</option><option value="92">Mirpur-14</option><option value="90">Mirpur-2</option><option value="95">Mohakhali</option><option value="2">Mohakhali-DOHS</option><option value="6">Mohammadpur</option><option value="70">Monipur-Mirpur</option><option value="36">Motijheel</option><option value="54">Mouchak</option><option value="94">Naya Paltan</option><option value="35">New Market</option><option value="85">Nikunja</option><option value="37">Pallabi</option><option value="39">Panthapath</option><option value="109">Puran Dhaka</option><option value="38">Purana Paltan</option><option value="41">Ramna</option><option value="59">Rampura</option><option value="67">Rayer Bazar</option><option value="108">Razarbagh</option><option value="42">Sabujbagh</option><option value="114">Savar Bus Stand</option><option value="51">Segunbagicha</option><option value="43">Shahbag</option><option value="52">Shantinagar</option><option value="44">Sher-E-Bangla Nagor</option><option value="66">Shukrabad</option><option value="60">Shyamoli</option><option value="45">Shyampur</option><option value="46">Sutrapur</option><option value="48">Tejgaon</option><option value="47">Tejgaon Industrial Area</option><option value="49">Uttar Khan</option><option value="15">Uttara</option><option value="9">Uttara - Sector-1</option><option value="104">Uttara - Sector-10</option><option value="10">Uttara - Sector-2</option><option value="11">Uttara - Sector-3</option><option value="50">Vatara</option><option value="18">Wari</option><option value="116">Whole Nation SA Paribahan</option><option value="115">Whole Nation SundarBan Courier</option><option value="101">Zigatala</option>-->
                                </select>			
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Delivery Time<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">

                                    <input class="form-control ng-untouched ng-pristine ng-valid datepicker" name="deliveryDate" id="" style="width:110px;" value="" type="text">
                                    <select class="form-control ng-untouched ng-pristine ng-valid" name="deliveryTime" style="width:110px;margin-left:5px;">
                                        <!----><option value="">Select any</option>
                                        <!----><option value="07:00 AM">07:00 AM</option>
                                        <option value="07:30 AM">07:30 AM</option><option value="07:45 AM">07:45 AM</option><option value="08:00 AM">08:00 AM</option><option value="08:30 AM">08:30 AM</option><option value="08:45 AM">08:45 AM</option><option value="09:00 AM">09:00 AM</option><option value="09:30 AM">09:30 AM</option><option value="09:45 AM">09:45 AM</option><option value="10:00 AM">10:00 AM</option><option value="10:30 AM">10:30 AM</option><option value="10:45 AM">10:45 AM</option><option value="11:00 AM">11:00 AM</option><option value="11:30 AM">11:30 AM</option><option value="11:45 AM">11:45 AM</option><option value="12:00 PM">12:00 PM</option><option value="12:30 PM">12:30 PM</option><option value="12:45 PM">12:45 PM</option><option value="01:00 PM">01:00 PM</option><option value="01:30 PM">01:30 PM</option><option value="01:45 PM">01:45 PM</option><option value="02:00 PM">02:00 PM</option><option value="02:30 PM">02:30 PM</option><option value="02:45 PM">02:45 PM</option><option value="03:00 PM">03:00 PM</option><option value="03:30 PM">03:30 PM</option><option value="03:45 PM">03:45 PM</option><option value="04:00 PM">04:00 PM</option><option value="04:30 PM">04:30 PM</option><option value="04:45 PM">04:45 PM</option><option value="05:00 PM">05:00 PM</option><option value="05:30 PM">05:30 PM</option><option value="05:45 PM">05:45 PM</option><option value="06:00 PM">06:00 PM</option><option value="06:30 PM">06:30 PM</option><option value="06:45 PM">06:45 PM</option><option value="07:00 PM">07:00 PM</option><option value="07:30 PM">07:30 PM</option><option value="07:45 PM">07:45 PM</option><option value="08:00 PM">08:00 PM</option><option value="08:30 PM">08:30 PM</option><option value="08:45 PM">08:45 PM</option><option value="09:00 PM">09:00 PM</option><option value="09:30 PM">09:30 PM</option><option value="09:45 PM">09:45 PM</option><option value="10:00 PM">10:00 PM</option><option value="10:30 PM">10:30 PM</option><option value="10:45 PM">10:45 PM</option><option value="11:00 PM">11:00 PM</option><option value="11:30 PM">11:30 PM</option><option value="11:45 PM">11:45 PM</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Reference Invoice</label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="referenceinvoice" id="referenceinvoice" name="referenceinvoice" placeholder="" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Package Description</label>
                            <div class="col-md-8 col-sm-9">
                                <textarea class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="packagedescription" id="packagedescription" name="packagedescription"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Note To Delivery Man</label>
                            <div class="col-md-8 col-sm-9">
                                <textarea class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="deliverynote" id="deliverynote" name="deliverynote"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-md-8 col-sm-9">
                                <button class="btn btn-warning" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="max-width:700px;margin:50px auto;">
                    <div class="header" style="text-align:center">
                        <h4 class="title"><span>Order Items</span> </h4>
                    </div>
                    <div class="content">

<script>
//    https://stackoverflow.com/questions/24126819/jquery-sum-of-multiple-input-fields-if-same-class-in-one-input/24126947
//https://stackoverflow.com/questions/43308230/calculating-quantity-and-price-and-subtotal-in-jquery
    $(document).ready(function(){
    $('#item_a1').keyup(calculate);
    $('#item_a2').keyup(calculate);
    $('#item_b1').keyup(calculate);
    $('#item_b2').keyup(calculate);
});
function calculate(e)
{
   $('#item_a_total').val($('#item_a1').val() * $('#item_a2').val());
    $('#item_b_total').val($('#item_b1').val() * $('#item_b2').val());

//console.log($('#item_a_total').val());
    var total=$('#item_a_total').val()+$('#item_b_total').val();
    $('#item_total').val(total);
//alert($('#item_a_total').val());
}
//$(document).ready(function(){
//$('#item_a1').on('keyup',function(){
// var item_a1 = $(this).val();
//
// var item_a2 = $('#item_a2').val();
// $("#item_a_total").html(item_a1*item_a2);
//alert(item_a2);
//});
//$('#price').on('keyup',function(){
// var qty = $('#qty').val();
// var price = $(this).val();
// $("#total").html(qty*price);
//});
//
//});
</script>
                        <table class="table table-bordered"> 
                            <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>Item Name</th> 
                                    <th>Quantity</th> 
                                    <th>Unit Price</th> 
                                    <th>Total</th>
                                    <th><button class="btn btn-xs btn-primary" id="clicker-more" type="button">Add Item</button></th>
                                </tr> 
                            </thead> 
                            <tbody> 
                                <tr> 
                                    <td>1</td>
                                    <td><textarea class="form-control ng-untouched" name="itemname[]" placeholder="Item Name" style="width:200px;"></textarea></td>
                                    <td><input class="form-control text-center" id="item_a1" maxlength="3" name="quantity[]" ngdefaultcontrol="" style="width:80px;" value="" type="text"></td>
                                    <td><input class="form-control text-center" id="item_a2" name="unitprice[]" ngdefaultcontrol="" style="width:80px;" value="" type="text"></td>
                                    <td><input class="form-control text-centere" disabled="disabled" id="item_a_total" name="total[]" ngdefaultcontrol="" style="width:80px;" value="" type="text"></td>
                                    <td style="width:15%">
                                        <!--                                                                <button class="btn btn-xs btn-danger" type="button">
                                                                                                            Delete
                                                                                                        </button>-->
                                    </td>
                                </tr>
                                <tr> 
                                    <td>2</td>
                                    <td><textarea class="form-control ng-untouched ng-pristine ng-valid"  name="itemname_delivery" ngdefaultcontrol="" style="width:200px;">Delivery Charge</textarea></td>
                                    <td><input class="form-control text-center" id="item_b1" maxlength="3" name="quantity_delivery" ngdefaultcontrol="" style="width:80px;" value="" type="text"></td>
                                    <td><input class="form-control text-center" id="item_b2" name="unitprice_delivery" ngdefaultcontrol="" style="width:80px;" value="" type="text"></td>
                                    <td><input class="form-control text-center" disabled="disabled" id="item_b_total" name="total_delivery" ngdefaultcontrol="" style="width:80px;" value="" type="text"></td>
                                    <td>
                                        <!--                                                                <button class="btn btn-xs btn-danger" type="button">
                                                                                                            Delete
                                                                                                        </button>-->
                                    </td>
                                </tr> 
                            </tbody> 
                                                    <tfoot>
                                <tr>
                                    <td colspan="4"></td>
                                    <td>
                                        <input class="form-control text-center" disabled="disabled" id="item_total" name="total"  style="width:80px;" value="" type="text">
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="more-question2">                                                      
                        </div>
                    </div>
                </div>
            </form>
        </ng-component>
    </div>
</div>
</ng-component></app-root></div></div>

<div class="more-question" style="display:none">
    <table class="table table-bordered">
        <tr> 
            <td></td>
            <td><textarea class="form-control ng-untouched ng-pristine ng-valid" name="itemname[]" placeholder="Item Name" style="width:200px;"></textarea></td>
            <td><input class="form-control text-center ng-untouched ng-pristine ng-valid" maxlength="3" name="quantity[]" ngdefaultcontrol="" style="width:80px;" value="" type="number"></td>
            <td><input class="form-control text-center ng-untouched ng-pristine ng-valid" name="unitprice[]" ngdefaultcontrol="" style="width:80px;" value="" type="text"></td>
            <td><input class="form-control text-center ng-untouched ng-pristine" disabled="disabled" name="total[]" ngdefaultcontrol="" style="width:80px;" value="" type="text"></td>
            <td style="width:15%">
                <!--                        <button class="btn btn-xs btn-danger" type="button">
                                            Delete
                                        </button>-->
            </td>
        </tr>
    </table>

</div>

<script>
    $(document).on("click", '#clicker-more', function (e) {
        var l = $(".more-question div").length + 1;
        var moreQuestion = $(".more-question").html();
        $("<div/>").html(moreQuestion).appendTo($(".more-question2"));
    });
</script>

<?php
if (isset($footer)) {
    echo $footer;
}
?>

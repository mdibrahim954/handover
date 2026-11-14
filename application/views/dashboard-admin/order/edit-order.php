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

            <form class="form-horizontal ng-untouched ng-pristine ng-invalid" action="<?php echo base_url(); ?>admin/order/order_update" method="post">
                <div class="card" style="max-width:700px;margin:10px auto;">
                    <div class="header" style="text-align:center">
                        <h4 class="title"><span>Edit Order</span> </h4>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Delivery Type <span class="text-danger">*</span></label>
                            <div class="col-xs-8">			
                                <select class="form-control ng-untouched ng-pristine ng-valid" name="order_type_id" required="">
                                    <option value="<?php echo $orderType->order_type_id; ?>"><?php echo $orderType->order_type_name; ?></option>
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
                                <input class="form-control ng-untouched ng-pristine ng-valid" name="seller_name" placeholder="" value="<?php echo $orderinfo->seller_name; ?>" type="text">
                                <input class="form-control ng-untouched ng-pristine ng-valid" name="order_id" placeholder="" value="<?php echo $orderinfo->order_id; ?>" type="hidden">
                                <!---->
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Phone<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input class="form-control ng-untouched ng-pristine ng-valid" id="sellersmobile" name="sellersmobile" placeholder="" value="<?php echo $orderinfo->seller_mobile; ?>" type="text">
                                </div>
                                <!---->
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Address<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">	
                                <textarea class="form-control ng-untouched ng-pristine ng-valid" id="sellersaddress" name="sellersaddress" style="height:80px;"><?php echo $orderinfo->seller_address; ?></textarea>
                                <!---->
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Pickup Area<span class="text-danger">*</span></label>
                            <div class="col-xs-8">			
                                <select class="form-control ng-untouched ng-pristine ng-valid" name="pickupareaid" required="">
                                    <option value="<?php echo $pickupArea->areaid; ?>"><?php echo $pickupArea->area_name; ?></option>
                                    <?php foreach($area as $ar){?>
                                <option value="<?php echo $ar->areaid; ?>"><?php echo $ar->area_name; ?></option>
                                <?php } ?>
<!--                                    <option value="17">Adabor</option>
                                    <option value="68">Agargaon</option><option value="58">Ahmed bag</option><option value="113">Airport</option><option value="19">Azimpur</option><option value="14">Badda</option><option value="12">Badda - Middle Badda</option><option value="13">Badda - Uttar Badda</option><option value="88">Banani</option><option value="61">Banasree</option><option value="21">Bangsal</option><option value="4">Baridhara</option><option value="56">Bashabo</option><option value="65">Bosila</option><option value="106">BUET</option><option value="22">Cantonment</option><option value="23">Chowk bazar</option><option value="69">Darussalam</option><option value="24">Demra</option><option value="110">Dhaka Medical</option><option value="107">Dhaka University</option><option value="7">Dhanmondi</option><option value="16">Dhanmondi - Shankar</option><option value="111">Dokkhin Khan</option><option value="102">Elephant road</option><option value="40">Farmgate</option><option value="63">Gabtoli</option><option value="25">Gandaria</option><option value="57">Goran</option><option value="1">Gulshan-1</option><option value="87">Gulshan-2</option><option value="86">Hatirjheel</option><option value="26">Hazaribagh</option><option value="105">Jatrabari</option><option value="112">Jurain</option><option value="27">Kadamtali</option><option value="28">Kafrul</option><option value="29">kalabagan</option><option value="62">Kallyanpur</option><option value="30">kamrangirchar</option><option value="31">Khilgaon</option><option value="32">Khilkhet</option><option value="33">Kotwali</option><option value="71">Kuril</option><option value="34">Lalbagh</option><option value="64">Lalmatia</option><option value="53">Magh Bazar</option><option value="55">Malibagh</option><option value="89">Mirpur-1</option><option value="5">Mirpur-10</option><option value="93">Mirpur-11</option><option value="91">Mirpur-12</option><option value="92">Mirpur-14</option><option value="90">Mirpur-2</option><option value="95">Mohakhali</option><option value="2">Mohakhali-DOHS</option><option value="6" selected="selected">Mohammadpur</option><option value="70">Monipur-Mirpur</option><option value="36">Motijheel</option><option value="54">Mouchak</option><option value="94">Naya Paltan</option><option value="35">New Market</option><option value="85">Nikunja</option><option value="37">Pallabi</option><option value="39">Panthapath</option><option value="109">Puran Dhaka</option><option value="38">Purana Paltan</option><option value="41">Ramna</option><option value="59">Rampura</option><option value="67">Rayer Bazar</option><option value="108">Razarbagh</option><option value="42">Sabujbagh</option><option value="114">Savar Bus Stand</option><option value="51">Segunbagicha</option><option value="43">Shahbag</option><option value="52">Shantinagar</option><option value="44">Sher-E-Bangla Nagor</option><option value="66">Shukrabad</option><option value="60">Shyamoli</option><option value="45">Shyampur</option><option value="46">Sutrapur</option><option value="48">Tejgaon</option><option value="47">Tejgaon Industrial Area</option><option value="49">Uttar Khan</option><option value="15">Uttara</option><option value="9">Uttara - Sector-1</option><option value="104">Uttara - Sector-10</option><option value="10">Uttara - Sector-2</option><option value="11">Uttara - Sector-3</option><option value="50">Vatara</option><option value="18">Wari</option><option value="116">Whole Nation SA Paribahan</option><option value="115">Whole Nation SundarBan Courier</option><option value="101">Zigatala</option>-->
                                </select>			
                                <!---->
                            </div>
                        </div>

                        <?php
                        $pickupDateTime = $orderinfo->pickup_time;
                        $pickupDateTime = explode(" ", $pickupDateTime);
                        $PickupDate = $pickupDateTime[0];
                        $PickupDate = date('m/d/Y', strtotime($PickupDate));

                        $PickupTime = $pickupDateTime[1];
                        //convert time to am/pm
                        $PickupTime = date('h:i A', strtotime($PickupTime));
                        ?>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Pickup Time<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                    <input class="form-control ng-untouched ng-pristine ng-valid datepicker" name="pickupDate" id="" style="width:110px;" value="<?php echo $PickupDate; ?>" type="text" required="">

                                    <select class="form-control ng-untouched ng-pristine ng-valid" name="pickupTime" style="width:110px;margin-left:5px;" required="">
                                        <option value="<?php echo $PickupTime; ?>"><?php echo $PickupTime; ?></option>
                                        <option value="07:00 AM">07:00 AM</option>
                                        <option value="07:30 AM">07:30 AM</option><option value="07:45 AM">07:45 AM</option><option value="08:00 AM">08:00 AM</option><option value="08:30 AM">08:30 AM</option><option value="08:45 AM">08:45 AM</option><option value="09:00 AM">09:00 AM</option><option value="09:30 AM">09:30 AM</option><option value="09:45 AM">09:45 AM</option><option value="10:00 AM">10:00 AM</option><option value="10:30 AM">10:30 AM</option><option value="10:45 AM">10:45 AM</option><option value="11:00 AM">11:00 AM</option><option value="11:30 AM">11:30 AM</option><option value="11:45 AM">11:45 AM</option><option value="12:00 PM">12:00 PM</option><option value="12:30 PM">12:30 PM</option><option value="12:45 PM">12:45 PM</option><option value="01:00 PM">01:00 PM</option><option value="01:30 PM">01:30 PM</option><option value="01:45 PM">01:45 PM</option><option value="02:00 PM">02:00 PM</option><option value="02:30 PM">02:30 PM</option><option value="02:45 PM">02:45 PM</option><option value="03:00 PM">03:00 PM</option><option value="03:30 PM">03:30 PM</option><option value="03:45 PM">03:45 PM</option><option value="04:00 PM">04:00 PM</option><option value="04:30 PM">04:30 PM</option><option value="04:45 PM">04:45 PM</option><option value="05:00 PM">05:00 PM</option><option value="05:30 PM">05:30 PM</option><option value="05:45 PM">05:45 PM</option><option value="06:00 PM">06:00 PM</option><option value="06:30 PM">06:30 PM</option><option value="06:45 PM">06:45 PM</option><option value="07:00 PM">07:00 PM</option><option value="07:30 PM">07:30 PM</option><option value="07:45 PM">07:45 PM</option><option value="08:00 PM">08:00 PM</option><option value="08:30 PM">08:30 PM</option><option value="08:45 PM">08:45 PM</option><option value="09:00 PM">09:00 PM</option><option value="09:30 PM">09:30 PM</option><option value="09:45 PM">09:45 PM</option><option value="10:00 PM">10:00 PM</option><option value="10:30 PM">10:30 PM</option><option value="10:45 PM">10:45 PM</option><option value="11:00 PM">11:00 PM</option><option value="11:30 PM">11:30 PM</option><option value="11:45 PM">11:45 PM</option>
                                    </select>
                                </div>
                            </div>
                        </div>	

                        <hr>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Customer Name<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-invalid"  id="customername" name="customername" value="<?php echo $orderinfo->customer_name; ?>" placeholder="" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Phone<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input class="form-control ng-untouched ng-pristine ng-invalid"  id="customermobile" name="customermobile" value="<?php echo $orderinfo->customer_mobile; ?>" placeholder="" type="text">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3">Address<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">	
                                <textarea class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="customeraddress" id="customeraddress" name="customeraddress" style="height:80px;"><?php echo $orderinfo->customer_address; ?></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3">Delivery Area<span class="text-danger">*</span></label>
                            <div class="col-xs-8">			
                                <select class="form-control ng-untouched ng-pristine ng-invalid" name="deliveryareaid" required="">
                                    <option value="<?php echo $deliveryArea->areaid; ?>"><?php echo $deliveryArea->area_name; ?></option>
                                    <?php foreach ($area as $row) { ?>
                                        <option value="<?php echo $row->areaid; ?>"><?php echo $row->area_name; ?></option>
                                    <?php } ?>
                                    <!--<option value="17">Adabor</option><option value="68">Agargaon</option><option value="58">Ahmed bag</option><option value="113">Airport</option><option value="19">Azimpur</option><option value="14">Badda</option><option value="12">Badda - Middle Badda</option><option value="13">Badda - Uttar Badda</option><option value="88">Banani</option><option value="61">Banasree</option><option value="21">Bangsal</option><option value="4">Baridhara</option><option value="56">Bashabo</option><option value="65">Bosila</option><option value="106">BUET</option><option value="22">Cantonment</option><option value="23">Chowk bazar</option><option value="69">Darussalam</option><option value="24">Demra</option><option value="110">Dhaka Medical</option><option value="107">Dhaka University</option><option value="7">Dhanmondi</option><option value="16">Dhanmondi - Shankar</option><option value="111">Dokkhin Khan</option><option value="102">Elephant road</option><option value="40">Farmgate</option><option value="63">Gabtoli</option><option value="25">Gandaria</option><option value="57">Goran</option><option value="1">Gulshan-1</option><option value="87">Gulshan-2</option><option value="86">Hatirjheel</option><option value="26">Hazaribagh</option><option value="105">Jatrabari</option><option value="112">Jurain</option><option value="27">Kadamtali</option><option value="28">Kafrul</option><option value="29">kalabagan</option><option value="62">Kallyanpur</option><option value="30">kamrangirchar</option><option value="31">Khilgaon</option><option value="32">Khilkhet</option><option value="33">Kotwali</option><option value="71">Kuril</option><option value="34">Lalbagh</option><option value="64">Lalmatia</option><option value="53">Magh Bazar</option><option value="55">Malibagh</option><option value="89">Mirpur-1</option><option value="5">Mirpur-10</option><option value="93">Mirpur-11</option><option value="91">Mirpur-12</option><option value="92">Mirpur-14</option><option value="90">Mirpur-2</option><option value="95">Mohakhali</option><option value="2">Mohakhali-DOHS</option><option value="6">Mohammadpur</option><option value="70">Monipur-Mirpur</option><option value="36">Motijheel</option><option value="54">Mouchak</option><option value="94">Naya Paltan</option><option value="35">New Market</option><option value="85">Nikunja</option><option value="37">Pallabi</option><option value="39">Panthapath</option><option value="109">Puran Dhaka</option><option value="38">Purana Paltan</option><option value="41">Ramna</option><option value="59">Rampura</option><option value="67">Rayer Bazar</option><option value="108">Razarbagh</option><option value="42">Sabujbagh</option><option value="114">Savar Bus Stand</option><option value="51">Segunbagicha</option><option value="43">Shahbag</option><option value="52">Shantinagar</option><option value="44">Sher-E-Bangla Nagor</option><option value="66">Shukrabad</option><option value="60">Shyamoli</option><option value="45">Shyampur</option><option value="46">Sutrapur</option><option value="48">Tejgaon</option><option value="47">Tejgaon Industrial Area</option><option value="49">Uttar Khan</option><option value="15">Uttara</option><option value="9">Uttara - Sector-1</option><option value="104">Uttara - Sector-10</option><option value="10">Uttara - Sector-2</option><option value="11">Uttara - Sector-3</option><option value="50">Vatara</option><option value="18">Wari</option><option value="116">Whole Nation SA Paribahan</option><option value="115">Whole Nation SundarBan Courier</option><option value="101">Zigatala</option>-->
                                </select>			
                            </div>
                        </div>

                        <?php
                        $deliveryDateTime = $orderinfo->pickup_time;
                        $deliveryDateTime = explode(" ", $deliveryDateTime);
                        $DeliveryDate = $deliveryDateTime[0];
                        $DeliveryDate = date('m/d/Y', strtotime($DeliveryDate));

                        $DeliveryTime = $deliveryDateTime[1];
                        //convert time to am/pm
                        $DeliveryTime = date('h:i A', strtotime($DeliveryTime));
                        ?>


                        <div class="form-group">
                            <label class="control-label col-sm-3">Delivery Time<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                    <input class="form-control ng-untouched ng-pristine ng-valid datepicker" name="deliveryDate" id="" style="width:110px;" value="<?php echo $DeliveryDate; ?>" type="text">
                                    <select class="form-control ng-untouched ng-pristine ng-valid" name="deliveryTime" style="width:110px;margin-left:5px;">                                        
                                        <option value="<?php echo $DeliveryTime; ?>"><?php echo $DeliveryTime; ?></option>
                                        <option value="07:30 AM">07:30 AM</option><option value="07:45 AM">07:45 AM</option><option value="08:00 AM">08:00 AM</option><option value="08:30 AM">08:30 AM</option><option value="08:45 AM">08:45 AM</option><option value="09:00 AM">09:00 AM</option><option value="09:30 AM">09:30 AM</option><option value="09:45 AM">09:45 AM</option><option value="10:00 AM">10:00 AM</option><option value="10:30 AM">10:30 AM</option><option value="10:45 AM">10:45 AM</option><option value="11:00 AM">11:00 AM</option><option value="11:30 AM">11:30 AM</option><option value="11:45 AM">11:45 AM</option><option value="12:00 PM">12:00 PM</option><option value="12:30 PM">12:30 PM</option><option value="12:45 PM">12:45 PM</option><option value="01:00 PM">01:00 PM</option><option value="01:30 PM">01:30 PM</option><option value="01:45 PM">01:45 PM</option><option value="02:00 PM">02:00 PM</option><option value="02:30 PM">02:30 PM</option><option value="02:45 PM">02:45 PM</option><option value="03:00 PM">03:00 PM</option><option value="03:30 PM">03:30 PM</option><option value="03:45 PM">03:45 PM</option><option value="04:00 PM">04:00 PM</option><option value="04:30 PM">04:30 PM</option><option value="04:45 PM">04:45 PM</option><option value="05:00 PM">05:00 PM</option><option value="05:30 PM">05:30 PM</option><option value="05:45 PM">05:45 PM</option><option value="06:00 PM">06:00 PM</option><option value="06:30 PM">06:30 PM</option><option value="06:45 PM">06:45 PM</option><option value="07:00 PM">07:00 PM</option><option value="07:30 PM">07:30 PM</option><option value="07:45 PM">07:45 PM</option><option value="08:00 PM">08:00 PM</option><option value="08:30 PM">08:30 PM</option><option value="08:45 PM">08:45 PM</option><option value="09:00 PM">09:00 PM</option><option value="09:30 PM">09:30 PM</option><option value="09:45 PM">09:45 PM</option><option value="10:00 PM">10:00 PM</option><option value="10:30 PM">10:30 PM</option><option value="10:45 PM">10:45 PM</option><option value="11:00 PM">11:00 PM</option><option value="11:30 PM">11:30 PM</option><option value="11:45 PM">11:45 PM</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Reference Invoice</label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="referenceinvoice" id="referenceinvoice" name="referenceinvoice" value="<?php echo $orderinfo->reference_invoice; ?>" placeholder="" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Package Description</label>
                            <div class="col-md-8 col-sm-9">
                                <textarea class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="packagedescription" id="packagedescription" name="packagedescription"><?php echo $orderinfo->package_description; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Note To Delivery Man</label>
                            <div class="col-md-8 col-sm-9">
                                <textarea class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="deliverynote" id="deliverynote" name="deliverynote"><?php echo $orderinfo->deliveryman_note; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3"></label>
                            <div class="col-md-8 col-sm-9">
                                <button class="btn btn-warning" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card" style="max-width:700px;margin:50px auto;">
                    <div class="header" style="text-align:center">
                        <h4 class="title"><span>Order Items</span> </h4>
                        <h4 class="title item_delete_status" style="color:green"> </h4>

                    </div>
                    <div class="content">

                        <table class="table table-bordered" id="invoiceitems">  
                            <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>Item Name</th> 
                                    <th>Item Code</th> 
                                    <th>Qty</th> 
                                    <th>Unit Price</th> 
                                    <th>Total</th>
                                    <th><button class="btn btn-xs btn-primary" id="buttonadd" type="button">Add Item</button></th>
                                </tr> 
                            </thead> 
                            <tbody> 
                                <?php
                                if (!empty($orderItem)) {
                                    $itemSl = 1;
                                    foreach ($orderItem as $row) {
//                                        echo '<pre>';
//                                        print_r($row);
//                                        echo '</pre>';
                                        ?>
                                        <tr class="remove-item-<?php echo $itemSl; ?>"> 
                                            <td><?php echo $itemSl; ?></td>
                                            <td><input class="form-control regular-text" name="item[<?php echo $itemSl; ?>][itemname]" value="<?php echo $row->item_name; ?>" placeholder="Item Name" style="width:180px;" required=""></td>
                                            <td>                                               
                                                <input class="form-control text-center item_code" name="item[<?php echo $itemSl; ?>][item_code]" style="width:90px;" value="<?php if($row->item_code !='' || $row->item_code !=0){echo $row->item_code; }else{ echo '0'; }; ?>" type="text" placeholder="Item Code" readonly>
                                            </td>
                                            <td>
                                                <input class="form-control text-center order_details_id_<?php echo $row->order_details_id; ?>" name="item[<?php echo $itemSl; ?>][order_details_id]"  style="width:80px;" value="<?php echo $row->order_details_id; ?>" type="hidden">
                                                <input class="form-control text-center quantity" min="0" maxlength="3" name="item[<?php echo $itemSl; ?>][quantity]" style="width:70px;" value="<?php echo $row->quantity; ?>" type="number" required="">
                                            </td>
                                            
                                            <td><input class="form-control text-center price" name="item[<?php echo $itemSl; ?>][price]" style="width:80px;" value="<?php echo $row->unit_price; ?>" type="text" required=""></td>
                                            <td><label class="subtotal" style="font-weight: bold"><?php echo $row->quantity * $row->unit_price; ?></label></td>
                                            <!--<td><input class="form-control text-center" disabled="disabled" name="total2[]" style="width:80px;" value="" type="text"></td>-->
                                            <td style="width:15%">
                                                <?php if($this->session->userdata('menu_permission')==1){?>
                                                <a class="btn btn-xs btn-danger" id="deleteItem_<?php echo $row->order_details_id ?>" style="cursor:pointer" onclick="return confirm('Are you sure you want to delete?');">
                                                    Delete
                                                </a>
                                            <?php } ?>
                                            </td>
                                        </tr>                                        
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            //           alert('hi');
                                            /* attach a submit handler to the form */
                                            $("#deleteItem_<?php echo $row->order_details_id ?>").click(function (event) {
                                                /* stop form from submitting normally */
                                                var order_details_id = <?php echo $row->order_details_id ?>;

                                                var data_value = 'order_details_id=' + order_details_id;
                                                //        console.log(data_value);
                                                $.ajax({
                                                    url: "<?php echo base_url() ?>admin/order/deleteOrderItem",
                                                    type: "POST",
                                                    data: data_value,
                                                    cache: false,
                                                    beforeSend: function () {
                                                        //                            $("#first").remove();
                                                    },
                                                    success: function (data) {
                                                        if (data == 'Success') {
                                                            $(".remove-item-<?php echo $itemSl; ?>").hide();
                                                            $(".item_delete_status").html('Deleted Succefully!');

                                                        }
                                                    },
                                                    error: function () {
                                                        alert('there is error while submit');
                                                    }
                                                });
                                            });
                                        });


                                    </script>
                                    <?php
                                    $itemSl++;
                                }
                            }
                            ?>

                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="4"></td>
                                    <td>
                                        <label class="grandtotal" style="font-weight: bold"></label>
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </form>

            <script type="text/javascript">
                $(document).ready(function () {
                    $counter = 1;
                    $serial = <?php echo $orderItemTotal; ?>;
                    $('#buttonadd').click(function () {
                        $counter++;
                        $serial++;
                        $('#invoiceitems > tbody:last').append('<tr><td>' + $serial + '</td><td><input class="form-control regular-text" name="item[' + $serial + '][itemname]" placeholder="Item Name" style="width:180px;"></td><td><input class="form-control text-center item_code" style="width:90px;" name="item[' + $serial + '][item_code]" value="0" placeholder="Item Code" /></td><td><input type="number" class="form-control text-center quantity" style="width:80px;" min="0"  maxlength="3" name="item[' + $serial + '][quantity]" value="0" /></td><td><input class="form-control text-center price" style="width:80px;" name="item[' + $serial + '][price]" value="0" /></td><td><label class="subtotal" style="font-weight: bold"></label></td><td><input type="button" class="btn btn-xs btn-danger deleteitem" value="Delete"/></td></tr>');
                        $('.quantity , .price').unbind().on('change', function () {
                            UpdateTotals(this);
                        });
                    });


                    $('#invoiceitems').on('click', '.deleteitem', function () {
                        if ($('#invoiceitems tbody tr').length == 1) {
                            alert('Cant delete single row');
                            return false;
                        }
                        $(this).closest('tr').remove();
                    });


                });

                $(function () {
                    CalculateSubTotals();
                    CalculateTotal();
                    // Adding the change events for the Price and
                    // quantity fields only..
                    // Changing the total should not affect anything
                    $('.quantity , .price').on('change', function () {
                        UpdateTotals(this);
                    });
                });

                function UpdateTotals(elem) {
                    // This will give the tr of the Element Which was changed
                    var $container = $(elem).parent().parent();
                    var quantity = $container.find('.quantity').val();
                    var price = $container.find('.price').val();
                    var subtotal = parseInt(quantity) * parseFloat(price);
                    $container.find('.subtotal').text(subtotal.toFixed(2));
                    CalculateTotal();
                }

                function CalculateSubTotals() {
                    // Calculate the Subtotals when page loads for the 
                    // first time
                    var lineTotals = $('.subtotal');
                    var quantity = $('.quantity');
                    var price = $('.price');
                    $.each(lineTotals, function (i) {
                        var tot = parseInt($(quantity[i]).val()) * parseFloat($(price[i]).val());
                        $(lineTotals[i]).text(tot.toFixed(2));
                    });
                }

                function CalculateTotal() {
                    // This will Itearate thru the subtotals and
                    // claculate the grandTotal and Quantity here
                    var lineTotals = $('.subtotal');
                    var quantityTotal = $('.quantity');
                    var grandTotal = 0.0;
                    var totalQuantity = 0;
                    $.each(lineTotals, function (i) {
                        grandTotal += parseFloat($(lineTotals[i]).text());
                        totalQuantity += parseInt($(quantityTotal[i]).val())
                    });

                    $('.totalquantity').text(totalQuantity);
                    $('.grandtotal').text(parseFloat(grandTotal).toFixed(2));

                }
            </script>

        </ng-component>


    </div>




</div>

</ng-component></app-root></div></div>


<?php
if (isset($footer)) {
    echo $footer;
}
?>

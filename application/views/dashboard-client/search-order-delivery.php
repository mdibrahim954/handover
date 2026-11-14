<?php
if (isset($header)) {
    echo $header;
}
?>

<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">


    <router-outlet></router-outlet><ng-component>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home"></span> </li>
            <li>Report</li>
            <li class="active">Delivery List</li>
        </ol>

        <div class="maincontent">
            <form class="form-inline ng-untouched ng-pristine ng-invalid" action="<?php echo base_url(); ?>client/dashboard/search_list" method="post">
                <div class="form-group">
                    <select class="form-control ng-untouched ng-pristine ng-invalid" name="areaname" required="">
                        <option value="All">All</option>
                        <?php foreach ($area_list as $row) { ?>
                            <option value="<?php echo $row->area_name; ?>"><?php echo $row->area_name; ?></option>
                        <?php } ?>
                        <!--<option value="17">Adabor</option><option value="68">Agargaon</option><option value="58">Ahmed bag</option><option value="113">Airport</option><option value="19">Azimpur</option><option value="14">Badda</option><option value="12">Badda - Middle Badda</option><option value="13">Badda - Uttar Badda</option><option value="88">Banani</option><option value="61">Banasree</option><option value="21">Bangsal</option><option value="4">Baridhara</option><option value="56">Bashabo</option><option value="65">Bosila</option><option value="106">BUET</option><option value="22">Cantonment</option><option value="23">Chowk bazar</option><option value="69">Darussalam</option><option value="24">Demra</option><option value="110">Dhaka Medical</option><option value="107">Dhaka University</option><option value="7">Dhanmondi</option><option value="16">Dhanmondi - Shankar</option><option value="111">Dokkhin Khan</option><option value="102">Elephant road</option><option value="40">Farmgate</option><option value="63">Gabtoli</option><option value="25">Gandaria</option><option value="57">Goran</option><option value="1">Gulshan-1</option><option value="87">Gulshan-2</option><option value="86">Hatirjheel</option><option value="26">Hazaribagh</option><option value="105">Jatrabari</option><option value="112">Jurain</option><option value="27">Kadamtali</option><option value="28">Kafrul</option><option value="29">kalabagan</option><option value="62">Kallyanpur</option><option value="30">kamrangirchar</option><option value="31">Khilgaon</option><option value="32">Khilkhet</option><option value="33">Kotwali</option><option value="71">Kuril</option><option value="34">Lalbagh</option><option value="64">Lalmatia</option><option value="53">Magh Bazar</option><option value="55">Malibagh</option><option value="89">Mirpur-1</option><option value="5">Mirpur-10</option><option value="93">Mirpur-11</option><option value="91">Mirpur-12</option><option value="92">Mirpur-14</option><option value="90">Mirpur-2</option><option value="95">Mohakhali</option><option value="2">Mohakhali-DOHS</option><option value="6">Mohammadpur</option><option value="70">Monipur-Mirpur</option><option value="36">Motijheel</option><option value="54">Mouchak</option><option value="94">Naya Paltan</option><option value="35">New Market</option><option value="85">Nikunja</option><option value="37">Pallabi</option><option value="39">Panthapath</option><option value="109">Puran Dhaka</option><option value="38">Purana Paltan</option><option value="41">Ramna</option><option value="59">Rampura</option><option value="67">Rayer Bazar</option><option value="108">Razarbagh</option><option value="42">Sabujbagh</option><option value="114">Savar Bus Stand</option><option value="51">Segunbagicha</option><option value="43">Shahbag</option><option value="52">Shantinagar</option><option value="44">Sher-E-Bangla Nagor</option><option value="66">Shukrabad</option><option value="60">Shyamoli</option><option value="45">Shyampur</option><option value="46">Sutrapur</option><option value="48">Tejgaon</option><option value="47">Tejgaon Industrial Area</option><option value="49">Uttar Khan</option><option value="15">Uttara</option><option value="9">Uttara - Sector-1</option><option value="104">Uttara - Sector-10</option><option value="10">Uttara - Sector-2</option><option value="11">Uttara - Sector-3</option><option value="50">Vatara</option><option value="18">Wari</option><option value="116">Whole Nation SA Paribahan</option><option value="115">Whole Nation SundarBan Courier</option><option value="101">Zigatala</option>-->
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control ng-untouched ng-pristine ng-invalid" name="orderstatename" required="">

                        <option value="All">All</option>
                        <?php foreach ($order_state as $row) { ?>
                            <option value="<?php echo $row->orderstatename; ?>"><?php echo $row->orderstatename; ?></option>
                        <?php } ?>
                        <!--<option value="1">Pending</option><option value="2">Cancelled</option><option value="11">Accepted</option><option value="13">Unassigned</option><option value="14">Started</option><option value="22">Declined</option><option value="27">Returned</option><option value="30">Failed</option><option value="31">Partial Delivery Complete</option><option value="33">Picked Up Complete</option><option value="35">Completed</option>-->
                    </select>
                </div>

                <div class="form-group">
                    <input class="form-control" id="datePicker" placeholder="Date from" style="width:100px;" name="date_from"  type="text" required="">
                </div>

                <div class="form-group">
                    <input class="form-control" id="datePicker2" placeholder="Date to" style="width:100px;" name="date_to"  type="text" required="">
                </div>


                <div class="form-group" style="margin-left:20px;">
                    <label class="control-label">Order by: </label>

                    <select class="form-control ng-untouched ng-pristine ng-invalid" name="orderby">
                        <option value="track_number">Track number</option>
                        <option value="delivery_area">Area</option>
                        <!--                        <option value="area desc">Area Desc</option>-->
                        <option value="delivery_time">Delivery date</option>
                        <!--<option value="deliveryCdate desc">Delivery date desc</option>-->
                        <!--<option value="status">Status </option>-->
                        <!--<option value="status desc">Status desc</option>-->
                        <option value="seller_name">Seller</option>
                        <!--<option value="seller desc">Seller desc</option>-->
                    </select>
                </div>
                <div class="form-group" style="margin-left:20px;">
                    <label class="control-label">Order by: </label>

                    <select class="form-control ng-untouched ng-pristine ng-invalid" name="sortby">
                        <option value="asc">ASC</option>
                        <option value="desc">DESC</option>

                    </select>
                </div>

                <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-list-alt"></span> Report</button>
                <a class="btn btn-default" onclick="printReport('divReportContent', 'Delivery List');">
                    <span class="glyphicon glyphicon-print"></span> Print 
                </a>

                <!--                <a class="btn btn-default" onclick="tableToExcel('tblExport', 'Territory Product Summary');">
                                    <i aria-hidden="true" class="fa fa-file-excel-o"></i> Export 
                                </a>-->
                <a _ngcontent-c3="" class="btn btn-default" href="<?php echo base_url(); ?>client/dashboard/create_order"><span _ngcontent-c3="" class="glyphicon glyphicon-plus"></span> New order</a>
            </form>   
            <br>
            <br>

            <form class="form-inline ng-untouched ng-pristine ng-invalid" action="<?php echo base_url(); ?>client/dashboard/search_list_export" method="post" target="_blank">
                <input type="hidden" name="areaname" value="<?php echo $areaname ?>">
                <input type="hidden" name="orderstatename" value="<?php echo $orderstatename ?>">
                <input type="hidden" name="date_from" value="<?php echo $date_from ?>">
                <input type="hidden" name="date_to" value="<?php echo $date_to ?>">
                <input type="hidden" name="orderby" value="<?php echo $orderby ?>">
                <input type="hidden" name="sortby" value="<?php echo $sortby ?>">
                &nbsp;&nbsp;<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-export"></span> Export Search Result List</button>
            </form>
            <?php $this->load->view('error-message-display'); ?>



            <div id="divReportContent" style="padding-top: 15px">  

                <div class="panel panel-primary filterable">

                    <div class="panel-heading">
                        <h3 class="panel-title">Delivery List</h3>
                        <div class="pull-right">
                            <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                        </div>
                    </div>


                    <div class="content table-responsive table-full-width print">


                        <table class="table table-hover table-striped table-left" id="tblExport">
                            <thead class="filters">
                                <tr>
                                    <th>#</th>
                                    <!--<th>Order ID</th>-->
                                    <th>Track No.</th>
                                    <th>Customer</th>
                                    <th>Mobile</th>
                                    <th style="max-width:260px;">Address</th>
                                    <th><input class="form-control" disabled="disabled" placeholder="Area" type="text"></th>
                                    <th><input class="form-control" disabled="disabled" placeholder="Status" type="text"></th>
                                    <th>Delivery time</th>
                                    <th><input class="form-control" disabled="disabled" placeholder="Seller" type="text"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sl = 1;
                                if (!empty($result)) {
                                    foreach ($result as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $sl; ?></td>
                                            <!--<td><?php // echo $row['order_id'] ?></td>-->
                                            <td><a style="cursor:pointer;" href="<?php echo base_url(); ?>client/dashboard/order_details/<?php echo $row['track_number'] ?>" target="_blank"><?php echo $row['track_number'] ?></a></td>
                                            <td><?php echo $row['customer_name'] ?></td>
                                            <td><?php echo $row['customer_mobile'] ?></td>
                                            <td style="max-width:260px;"><?php echo $row['customer_address'] ?></td>
                                            <td><?php echo $row['delivery_area'] ?></td>
                                            <td><?php echo $row['orderstatename'] ?></td>
                                            <td><?php echo $row['deliverytime'] ?></td>
                                            <td><?php echo $row['seller_name'] ?></td>
                                        </tr>
                                        <?php
                                        $sl++;
                                    }
                                }
                                ?>
    <!--            <tr>
                    <td>2</td>
                    <td><a style="cursor:pointer;" href="#/order/MO003827">MO003827</a></td>
                    <td>Simran Akhtar Mim</td>
                    <td>01628104456</td>
                    <td style="max-width:260px;">Mohammadpur,Sheikhertek 1/1     house no.4</td>
                    <td>Mohammadpur</td>
                    <td>Completed</td>
                    <td>Apr 09, 01:00</td>
                    <td>RED SHOP BD</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><a style="cursor:pointer;" href="#/order/MO003859">MO003859</a></td>
                    <td>Fuad</td>
                    <td>01766666492</td>
                    <td style="max-width:260px;">35/11, Block -F, Johuri Moholla, Mohammadpur</td>
                    <td>Mohammadpur</td>
                    <td>Completed</td>
                    <td>Apr 10, 02:30</td>
                    <td>RED SHOP BD</td>
                </tr>-->
                            </tbody>
                        </table>

                    </div>


                </div>
            </div>


            <!---->
            <!---->


    </ng-component>


</div>

</div>

</ng-component></app-root></div></div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>
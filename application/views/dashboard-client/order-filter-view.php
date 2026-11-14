<?php
if (isset($header)) {
    echo $header;
}
?>
        <script>
      $(document).ready(function () {
          // Setup - add a text input to each footer cell
          $('#example tfoot th').each(function () {
              var title = $(this).text();
              $(this).html('<input type="text" placeholder="Search ' + title + '" />');
          });

          // DataTable
          var table = $('#example').DataTable({
              "lengthMenu": [[20, 30, 50, 100, -1], [20, 30, 50, 100, "All"]],
              responsive: true,
              "order": [[9, 'desc' ]]
          });

          // Apply the search
          table.columns().every(function () {
              var that = this;

              $('input', this.footer()).on('keyup change', function () {
                  if (that.search() !== this.value) {
                      that
                              .search(this.value)
                              .draw();
                  }
              });
          });
      });

      $(document).ready(function () {
          // Setup - add a text input to each footer cell
          $('#example .filters th').each(function () {
              var title = $('#example thead th').eq($(this).index()).text();
              $(this).html('<input type="text" placeholder="Search ' + title + '" />');
          });

          // DataTable
          var table = $('#example').DataTable();

          // Apply the search
          table.columns().eq(0).each(function (colIdx) {
              $('input', $('.filters th')[colIdx]).on('keyup change', function () {
                  table
                          .column(colIdx)
                          .search(this.value)
                          .draw();
              });
          });
      });
        </script>
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

            <form class="form-inline ng-untouched ng-pristine ng-invalid" action="<?php echo base_url(); ?>client/dashboard/all_list_export" method="post" target="_blank">
<!--                <input type="hidden" name="areaname" value="<?php // echo $areaname    ?>">
               <input type="hidden" name="orderstatename" value="<?php // echo $orderstatename    ?>">
               <input type="hidden" name="date_from" value="<?php // echo $date_from    ?>">
               <input type="hidden" name="date_to" value="<?php // echo $date_to    ?>">
               <input type="hidden" name="orderby" value="<?php // echo $orderby    ?>">
               <input type="hidden" name="sortby" value="<?php // echo $sortby    ?>">-->
                <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-export"></span> Export All</button>
            </form>

            <?php $this->load->view('error-message-display'); ?>

            <div id="divReportContent" style="padding-top: 15px">


                <div class="table-responsive">
                    <!-- <p>Hello world</p> -->
                    <div class="dataTables_wrapper">
                        <div class="dataTables_length" id="example_length">
                            <label>Show 
                                <select name="ndev_producuct_length" aria-controls="example" class="ndev_producuct_length">
                                <option selected value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                                <option title="প্রয়জন না হলে All সিলেক্ট না করা ভালো হবে , একসাথে ৭৮হাজার+ অর্ডার লোড হবে , সার্ভার ও ব্রাউজার স্লো করবে এবং সার্ভার ডাউন হতে পারে!"  value="0">All</option>
                            </select> entries</label>
                            <span class="ndev-spiner" id="ndev-spiner"></span>
                        </div>
                    <div id="example_filter" class="dataTables_filter">
                        <label>Search:
                            <input type="search" id="ndev-order-search" class="" placeholder="" aria-controls="example">
                        </label>
                    </div>
                    </div>
                    <table id="example"  class="display table" style="width:100%;">
                        <thead>
                            <tr style="background-color: #5ba3ae">
                                <!--<th>Order ID</th>-->
                                <th>Track Number</th>
                                <th>Order Status</th>
                                <th>Customer Name</th>
                                <th>Customer Mobile</th>
                                <th>Customer Address</th>
                                <th>Delivery Area</th>
                                <th>Delivery Time</th>
                                <th>Seller</th>
                                <th>Sale By</th>
                                <th>Created DateTime</th>
                            </tr>
                        </thead>
                        <thead class="filters">
                            <tr style="background-color: #5ba3ae">
                                <!--<th>Order ID</th>-->
                                <th>Track Number</th>
                                <th>Order Status</th>
                                <th>Customer Name</th>
                                <th>Customer Mobile</th>
                                <th>Customer Address</th>
                                <th>Delivery Area</th>
                                <th>Delivery Time</th>
                                <th>Seller</th>
                                <th>Sale By</th>
                                <th>Created DateTime</th>
                            </tr>
                        </thead>
                        <tbody class="ndev-table-data" id="ndev-table-data" >
                            <?php
                            foreach ($order as $row) {
                                $order_state_id = $row->order_state_id;
                                $delivery_area_id = $row->delivery_area_id;

                                $statusInfo = $this->db
                                        ->select('*')
                                        ->where('orderstateid', $order_state_id)
                                        ->get('order_state')
                                        ->row();
//            echo '<pre>';
//            print_r($statusInfo);
//            echo '</pre>';
                                $areaInfo = $this->db
                                        ->select('*')
                                        ->where('areaid', $delivery_area_id)
                                        ->get('areas')
                                        ->row();
                                ?>
                                <tr>
                                    <!--<td><?php // echo $row->order_id ?></td>-->
                                    <td><a style="cursor:pointer;" href="<?php echo base_url(); ?>client/dashboard/order_details/<?php echo $row->track_number ?>" target="_blank"><?php echo $row->track_number ?></a></td>
                                    <td><span style="background: <?php if (isset($statusInfo->state_color)) { echo $statusInfo->state_color; } ?>;border-radius: 3px; color:white;padding:3px"><?php
                                            if (isset($statusInfo->orderstatename)) {
                                                echo $statusInfo->orderstatename;
                                            }
                                            ?></span>
                                    </td>                                    
                                    <td><?php echo $row->customer_name ?></td>
                                    <td><?php echo $row->customer_mobile ?></td>
                                    <td><?php echo $row->customer_address ?></td>
                                    <td><?php if(!empty($areaInfo) && isset($areaInfo->area_name)){ echo $areaInfo->area_name; } ?></td>
                                    <td><?php echo $row->delivery_time ?></td>
                                    <td><?php echo $row->seller_name ?></td>
                                    <td><?php echo $row->reference_invoice ?></td>
                                    <td><?php echo $row->created_at ?></td>
                                </tr>
<?php } ?>

                    
                        </tbody>
                        <tfoot>
                            <tr style="">
                                <!--<th>Order ID</th>-->
                                <th>Track Number</th>
                                <th>Order Status</th>
                                <th>Customer Name</th>
                                <th>Customer Mobile</th>
                                <th>Customer Address</th>
                                <th>Delivery Area</th>
                                <th>Delivery Time</th>
                                <th>Seller</th>
                                <th>Sale By</th>
                                <th>Created DateTime</th>
                            </tr>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="dataTables_wrapper" >
                        <div class="dataTables_paginate paging_simple_numbers" id="ndev-pagination" class="ndev-pagination" >
                    </div>
                    </div>
                    
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

<?php
if (isset($header)) {
    echo $header;
}
?>


<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">


    <router-outlet></router-outlet><ng-component _nghost-c0=""><ol _ngcontent-c0="" class="breadcrumb">
            <li _ngcontent-c0=""><span _ngcontent-c0="" class="glyphicon glyphicon-home"></span> </li>
            <li _ngcontent-c0="" class="active">Dashboard</li>
        </ol>
        <div _ngcontent-c0="" class="maincontent">
            <div _ngcontent-c0="" style="margin:auto; margin-bottom:20px;">
                <div _ngcontent-c0="" class="page-header" style="margin-top: -10px;">
                    <div _ngcontent-c0="" class="row">

                        <div _ngcontent-c0="" class="col-md-4">
                            <h3 _ngcontent-c0="">Todays Order Status</h3>
                        </div>

                        <?php
                        if (isset($todays_order_status)) {
                            echo $todays_order_status;
                        }
                        ?>

                    </div>

                </div>





                <div _ngcontent-c0="" class="tabbable-panel">
                    <div _ngcontent-c0="" class="tabbable-line">

                        <ul _ngcontent-c0="" class="nav nav-tabs ">
                            <li _ngcontent-c0="" >
                                <!--<a _ngcontent-c0="" data-toggle="tab" href="#tab_default_1">-->
                                <a _ngcontent-c0=""  href="<?php echo base_url(); ?>admin/dashboard">
                                    Pending 
                                    <span _ngcontent-c0="" class="badge"><?php echo $count_pending; ?></span>
                                </a>
                            </li>
                            <li _ngcontent-c0=""  >
                                <!--<a _ngcontent-c0="" data-toggle="tab" href="#tab_default_2">-->
                                <a _ngcontent-c0="" href="<?php echo base_url(); ?>admin/dashboard/new_order">
                                    New 
                                    <span _ngcontent-c0="" class="badge"><?php echo $count_new; ?></span>
                                </a>
                            </li>
                            <li _ngcontent-c0="">
                                <a _ngcontent-c0="" href="<?php echo base_url(); ?>admin/dashboard/completed_order">
                                    Completed 
                                    <span _ngcontent-c0="" class="badge"><?php echo $count_completed; ?></span>
                                </a>
                            </li>
                            <li _ngcontent-c0="">
                                <a _ngcontent-c0="" href="<?php echo base_url(); ?>admin/dashboard/paid_order">
                                    Paid 
                                    <span _ngcontent-c0="" class="badge"><?php echo $count_completed; ?></span>
                                </a>
                            </li>
                            <li _ngcontent-c0="" class="active">
                                <a _ngcontent-c0="" href="<?php echo base_url(); ?>admin/dashboard/canceled_order">
                                    Cancelled 
                                    <span _ngcontent-c0="" class="badge"><?php echo $count_cancelled; ?></span>
                                </a>
                            </li>
                            <?php if($this->session->userdata('menu_permission')==1){?>
                            <li _ngcontent-c0="" >
                                <a _ngcontent-c0="" href="<?php echo base_url(); ?>admin/dashboard/deleted_order">
                                    Deleted 
                                    <span _ngcontent-c0="" class="badge"><?php echo $count_declined; ?></span>
                                </a>
                            </li>
                            <?php } ?>
                            
                            <?php if($this->session->userdata('menu_permission')==1){?>
                            <li _ngcontent-c0="" >
                                <a _ngcontent-c0="" href="<?php echo base_url(); ?>admin/dashboard/booked_order">
                                    Booked 
                                    <span _ngcontent-c0="" class="badge"><?php echo $count_booked; ?></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>

                        <div _ngcontent-c0="" class="tab-content">



                            <div _ngcontent-c0="" class="tab-pane active" id="tab_default_1">

                                <div  class="content table-responsive table-full-width">

                                    <table id="example" class="display table" style="width:100%">
                                        <thead>
                                            <tr style="background-color: #5ba3ae">
                                                <th>Track Number</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>Ref Invoice</th>
                                                <th>Pickup</th>
                                                <th>Created DateTime</th>
                                                <th>Seller</th>
                                                <th>Customer</th>
                                                <th>Delivery</th>
                                                <th>Created By</th>
                                                <th>Order Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <thead class="filters">
                                            <tr style="background-color: #5ba3ae">
                                                <th>Track Number</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>Ref Invoice</th>
                                                <th>Pickup</th>
                                                <th>Created DateTime</th>
                                                <th>Seller</th>
                                                <th>Customer</th>
                                                <th>Delivery</th>
                                                <th>Created By</th>
                                                <th>Order Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sl = 1;
                                            foreach ($cancelled as $row) {
                                                if ($sl < 500) {
                                                    ?>
                                                    <tr>
                                                       

                                                        <td><a href="<?php echo base_url(); ?>admin/report/order_details/<?php echo $row->track_number; ?>" target="_blank"><?php echo $row->track_number ?></a></td>
                                                        <td><span style="background: <?php echo $row->state_color; ?>;border-radius: 3px;"><?php echo $row->orderstatename ?></span></td>
                                                         <td>
                                                            <div class="dropdown" style="width:15px;float:right; margin-right: 10px">

                                                                <i _ngcontent-c0="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview_<?php echo $sl; ?>" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                                                            </div>
                                                            <div  class="" style="width:15px;float:right;">.
                                                            </div>
                                                            <div  class="dropdown" style="width:15px;float:right;">
                                                                <i _ngcontent-c0="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                                                                <ul _ngcontent-c0="" class="dropdown-menu dropdown-menu-right">
                                                                    <!--<li _ngcontent-c0=""><a  data-target="#divPickupTask_<?php // echo $sl;      ?>" data-toggle="modal">Pickup Task</a></li>-->
                                                                    <li _ngcontent-c0=""><a href="<?php echo base_url(); ?>admin/order/pickup/<?php echo $row->order_id; ?>" target="_blank">Pickup Task</a></li>
                                                                    <li _ngcontent-c0="" class="divider"></li>
                                                                    <!--<li _ngcontent-c0=""><a  data-target="#divOrderUpdate_<?php // echo $sl;      ?>" data-toggle="modal">Delivery Task</a></li>-->
                                                                    <li _ngcontent-c0=""><a href="<?php echo base_url(); ?>admin/order/delivery/<?php echo $row->order_id; ?>" target="_blank">Delivery Task</a></li>
                                                                    <li _ngcontent-c0="" class="divider"></li>
                                                                    <!--<li _ngcontent-c0=""><a  data-target="#myModal_<?php echo $sl; ?>" data-toggle="modal">Assign Person</a></li>-->
                                                                    <li _ngcontent-c0=""><a href="<?php echo base_url(); ?>admin/order/task_assign/<?php echo $row->order_id; ?>" target="_blank">Assign Person</a></li>
                                                                    <li _ngcontent-c0="" class="divider"></li>
                                                                    <li _ngcontent-c0=""><a  href="<?php echo base_url(); ?>admin/order/order_edit/<?php echo $row->order_id; ?>" target="_blank">Edit Order</a></li>
                                                                    <li _ngcontent-c0="" class="divider"></li>
                                                                    <!--<li _ngcontent-c0=""><a id="delete_order_<?php // echo $sl;       ?>" style="cursor:pointer" onclick="return confirm('Are you sure you want to delete?');">Delete</a></li>-->
                                                                    <?php if($this->session->userdata('menu_permission')==1){?>
                                                                    <li _ngcontent-c0=""><a href="<?php echo base_url(); ?>admin/order/delete_order/<?php echo $row->order_id; ?>" target="_blank">Delete</a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                            <div _ngcontent-c0="" class="modal fade" id="divPrintPreview_<?php echo $sl; ?>" role="dialog">
                                                                <div _ngcontent-c0="" class="modal-dialog">
                                                                    <div _ngcontent-c0="" class="modal-content">

                                                                        <div _ngcontent-c0="" class="modal-header">   
                                                                            <h4 _ngcontent-c0="" class="title">Print Preview</h4>      
                                                                        </div>

                                                                        <div _ngcontent-c0="" class="modal-body" id="divPrintContent_<?php echo $sl; ?>" style="margin:0px auto;">
                                                                            <div _ngcontent-c0="" class="print page">
                                                                                <div _ngcontent-c0="" style="width:100%;display:block;height:130px;position:relative;">   
                                                                                    <div _ngcontent-c0="" style="width:200px;">
                                                                                        <img _ngcontent-c0="" src="<?php echo base_url(); ?>assets/images/logo.jpg" style="width:170px;height:120px;margin:0px auto;">         
                                                                                    </div> 
                                                                                    <div _ngcontent-c0="" style="position:absolute;top:10px;right:10px;text-align:right">
                                                                                        <p _ngcontent-c0=""> Track Number: <b _ngcontent-c0=""><?php echo $row->track_number; ?></b></p>
                                                                                        <p _ngcontent-c0=""> Ref Invoice: <b _ngcontent-c0=""><?php echo $row->reference_invoice; ?></b></p>
                                                                                        <p _ngcontent-c0="">Date: <?php echo date('Y-m-d') ?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div _ngcontent-c0="" style="margin:5px;font-size:14px;">
                                                                                    <b>Pickup Address:</b> <?php echo $row->seller_name . ', ' . $row->seller_address . ', Mob: ' . $row->seller_mobile ?>
                                                                                </div>
                                                                                <div _ngcontent-c0="" style="margin:10px 5px 5px;font-size:14px;">
                                                                                    <b>Delivery Address:</b> <?php echo $row->customer_name . ', ' . $row->customer_address . ', Mob: ' . $row->customer_mobile ?>
                                                                                </div>
                                                                                <div _ngcontent-c0="">

                                                                                    <table _ngcontent-c0="" class="table table-sm table-hover table-bordered orderDetails">
                                                                                        <thead _ngcontent-c0="">
                                                                                            <tr _ngcontent-c0="">
                                                                                                <th _ngcontent-c0="">Item Name</th>
                                                                                                <th _ngcontent-c0="">Qty.</th>
                                                                                                <th _ngcontent-c0="" style="text-align:center">U. Price</th>
                                                                                                <th _ngcontent-c0="" style="text-align:center">Amount</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody _ngcontent-c0="">
                                                                                            <?php
                                                                                            $total_price = 0;
                                                                                            foreach ($orderList as $row2) {
                                                                                                ?>
                                                                                                <tr>
                                                                                                    <td><?php echo $row2->item_name; ?></td>
                                                                                                    <td><?php echo $row2->quantity; ?></td>
                                                                                                    <td><?php echo $row2->unit_price; ?></td>
                                                                                                    <td><?php
                                                                                                        if ($row2->quantity != '' && $row2->unit_price != '') {
                                                                                                            echo $total = $row2->quantity * $row2->unit_price;
                                                                                                        }
                                                                                                        ?></td>
                                                                                                </tr>   
                                                                                                <?php
                                                                                                if ($row2->quantity != '' && $row2->unit_price != '') {
                                                                                                    $total_price += $total;
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </tbody>
                                                                                        <tfoot _ngcontent-c0=""> 
                                                                                            <tr _ngcontent-c0="">
                                                                                                <td _ngcontent-c0="" colspan="3" style="text-align:right;">Total</td>
                                                                                                <td _ngcontent-c0="" style="width:60px; text-align:right;font-weight:bold"><?php echo $total_price; ?></td>
                                                                                            </tr>
                                                                                        </tfoot>
                                                                                    </table>

                                                                                </div>
                                                                                <div _ngcontent-c0="" id="divPriceInWords" style="margin-left:10px;margin-top:5px;text-align:center;">  </div>
                                                                                <table _ngcontent-c0="" style="width:100%;margin-top:10px;">
                                                                                    <tbody _ngcontent-c0=""><tr _ngcontent-c0="">
                                                                                            <td _ngcontent-c0="" style="width:55%;">

                                                                                                <div _ngcontent-c0="" style="width:100%;">

                                                                                                    <div _ngcontent-c0="" style="margin:0px;margin-top:5px;font-weight:bold;font-size:13px;">Handover Express</div>
                                                                                                    <div _ngcontent-c0="" style="margin:0px;">Hotline: 01872-737 757</div>
                                                                                                    <div _ngcontent-c0="" style="margin:0px;">info@handoverexpressbd.com<br _ngcontent-c0="">www.handoverexpressbd.com</div>

                                                                                                </div>
                                                                                            </td>
                                                                                            <td _ngcontent-c0="" style="width:44%;">

                                                                                                <div _ngcontent-c0="" style="margin-top:50px; width:100%;padding-top:5px;border-top:1px dashed #A6A6A6">Customer Sign</div>           
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody></table>

                                                                                <div _ngcontent-c0="" style="width:100%;text-align:center;margin:0px;">
                                                                                    <div _ngcontent-c0="" style="width:100%;text-align:center;margin:0px;">
                                                                                    <!--<svg _ngcontent-c0="" id="qrcode"></svg>-->
                                                                                        <svg id="barcode_<?php echo $row->order_id; ?>"></svg>
                                                                                    </div>
                                                                                    <!--http://lindell.me/JsBarcode/-->
                                                                                    <script>
                                                                                        //                                                                                    JsBarcode("#barcode", <?php // echo $row->order_id;      ?>);
                                                                                        JsBarcode("#barcode_<?php echo $row->order_id; ?>", <?php echo $row->order_id; ?>, {
                                                                                            //  lineColor: "#0aa",
                                                                                            width: 5,
                                                                                            height: 30,
                                                                                            displayValue: false
                                                                                        });
                                                                                    </script>

                                                                                    <div  style="font-size:10px;width:100%;margin-top:5px;text-align:center ">THANK YOU FOR SHOPPING WITH US</div>
                                                                                    <br>
                                                                                    <div  style="font-size:10px;width:100%;margin-top:5px;text-align:left ">Order By: <?php
                                                                                        $order_created_by = $row->order_created_by;
                                                                                        if ($order_created_by != 0) {
                                                                                            $createdBy = $this->db
                                                                                                    ->select('*')
                                                                                                    ->where('userid', $row->order_created_by)
                                                                                                    ->get('users')
                                                                                                    ->row();
                                                                                            $orderBy = $createdBy->first_name . ' ' . $createdBy->last_name;
                                                                                        } else {
                                                                                            $orderBy = '';
                                                                                        }
                                                                                        echo $orderBy;
                                                                                        ?>
                                                                                    </div>
                                                                                    <div  style="font-size:10px;width:100%;margin-top:5px;text-align:left ">Printed By: <?php echo $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?></div>
                                                                                    <div  style="font-size:10px;width:100%;margin-top:5px;text-align:left ">Order Created Date: <?php
                                                                                        $created_date = $row->created_at;
                                                                                        $created_date = explode(" ", $created_date);
                                                                                        echo $created_date[0];
                                                                                        ?></div>
                                                                                    <div  style="font-size:10px;width:100%;margin-top:5px;text-align:left ">Delivery Man Note: <?php echo $row->deliveryman_note; ?></div>

                                                                                </div>
                                                                            </div>
                                                                            <div  class="modal-footer">
                                                                                <button _ngcontent-c0="" class="btn btn-primary" onclick="printContent('divPrintContent_<?php echo $sl; ?>');" type="button">Print</button>
                                                                                <button _ngcontent-c0="" class="btn btn-default" data-dismiss="modal" id="btnClose" type="button">Close</button>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--- all modal form------------->

                                                        </td>
                                                        <td><?php echo $row->reference_invoice ?></td>
                                                        <td><?php echo $row->pickup_area . '<br>' . $row->pickuptime ?></td>
                                                        <td><?php echo $row->created_at ?></td>
                                                        <td><?php echo $row->seller_name . '<br>' . $row->seller_mobile . '<br>' . $row->seller_address ?></td>      
                                                        <td><?php echo $row->customer_name . '<br>' . $row->customer_mobile . '<br>' . $row->customer_address ?></td> 
                                                        <td><?php echo $row->delivery_area . '<br>' . $row->deliverytime ?></td>
                                                        <td><?php echo ''; ?></td>
                                                        <td><?php echo '' ?></td>                                                    
                                                        <td >
                                                            <div class="dropdown" style="width:15px;float:right; margin-right: 10px">

                                                                <!----><i _ngcontent-c0="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview_<?php echo $sl; ?>" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                                                            </div>
                                                            <div  class="" style="width:15px;float:right;">.
                                                            </div>
                                                            <div  class="dropdown" style="width:15px;float:right;">
                                                                <i _ngcontent-c0="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                                                                <ul _ngcontent-c0="" class="dropdown-menu dropdown-menu-right">

                                                                </ul>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $sl++;
                                                }
                                            }
                                            ?>


                                        </tbody>
                                        <tfoot>
                                            <tr style="">              
                                                <th>Track Number</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>Ref Invoice</th>
                                                <th>Pickup</th>
                                                <th>Created DateTime</th>
                                                <th>Seller</th>
                                                <th>Customer</th>
                                                <th>Delivery</th>
                                                <th>Created By</th>
                                                <th>Order Time</th>
                                                <th>Action</th>
                                            </tr>
                                            </tr>
                                        </tfoot>
                                    </table>


                                </div>
                            </div>


                            <div _ngcontent-c0="" class="tab-pane" id="tab_default_2">

                                <div _ngcontent-c0="" class="content table-responsive table-full-width">

                                    <table _ngcontent-c0="" class="table table-hover table-striped" style="margin-bottom:200px;">
                                        <thead _ngcontent-c0="">
                                            <tr _ngcontent-c0="">
                                                <th _ngcontent-c0="">#</th>
                                                <th _ngcontent-c0="">Track No.</th>
                                                <th _ngcontent-c0="">Status</th>
                                                <th _ngcontent-c0="">Pickup</th>
                                                <th _ngcontent-c0="">Seller</th>
                                                <th _ngcontent-c0="">Customer</th>
                                                <th _ngcontent-c0="">Delivery</th>
                                                <th _ngcontent-c0="">Order Time</th>
                                                <th _ngcontent-c0="">Created by</th>
                                                <th _ngcontent-c0="" style="text-align:center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody _ngcontent-c0="">
                                            <!---->
                                        </tbody>
                                    </table>

                                </div>

                            </div>


                            <div _ngcontent-c0="" class="tab-pane" id="tab_default_3">

                                <div _ngcontent-c0="" class="content table-responsive table-full-width">

                                    <table _ngcontent-c0="" class="table table-hover table-striped" style="margin-bottom:200px;">
                                        <thead _ngcontent-c0="">
                                            <tr _ngcontent-c0="">
                                                <th _ngcontent-c0="">#</th>
                                                <th _ngcontent-c0="">Track No.</th>
                                                <th _ngcontent-c0="">Status</th>
                                                <th _ngcontent-c0="">Pickup</th>
                                                <th _ngcontent-c0="">Seller</th>
                                                <th _ngcontent-c0="">Customer</th>
                                                <th _ngcontent-c0="">Delivery</th>
                                                <th _ngcontent-c0="">Order Date</th>
                                                <th _ngcontent-c0="">Created by</th>
                                                <th _ngcontent-c0="" style="text-align:center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody _ngcontent-c0="">
                                            <!---->
                                        </tbody>
                                    </table>

                                </div>

                            </div>


                            <div _ngcontent-c0="" class="tab-pane" id="tab_default_4">

                                <div _ngcontent-c0="" class="content table-responsive table-full-width">


                                    <table _ngcontent-c0="" class="table table-hover table-striped" style="margin-bottom:200px;">
                                        <thead _ngcontent-c0="">
                                            <tr _ngcontent-c0="">
                                                <th _ngcontent-c0="">#</th>
                                                <th _ngcontent-c0="">Track No.</th>
                                                <th _ngcontent-c0="">Status</th>
                                                <th _ngcontent-c0="">Pickup</th>
                                                <th _ngcontent-c0="">Seller</th>
                                                <th _ngcontent-c0="">Customer</th>
                                                <th _ngcontent-c0="">Delivery</th>
                                                <th _ngcontent-c0="">Created by</th>
                                                <th _ngcontent-c0="" style="text-align:center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody _ngcontent-c0="">
                                            <!---->
                                        </tbody>
                                    </table>

                                </div>

                            </div>


                            <div _ngcontent-c0="" class="tab-pane" id="tab_default_5">

                                <div _ngcontent-c0="" class="content table-responsive table-full-width">


                                    <table _ngcontent-c0="" class="table table-hover table-striped" style="margin-bottom:200px;">
                                        <thead _ngcontent-c0="">
                                            <tr _ngcontent-c0="">
                                                <th _ngcontent-c0="">#</th>
                                                <th _ngcontent-c0="">Track No.</th>
                                                <th _ngcontent-c0="">Status</th>
                                                <th _ngcontent-c0="">Pickup</th>
                                                <th _ngcontent-c0="">Seller</th>
                                                <th _ngcontent-c0="">Customer</th>
                                                <th _ngcontent-c0="">Delivery</th>
                                                <th _ngcontent-c0="">Order Date</th>
                                                <th _ngcontent-c0="">Created by</th>
                                                <th _ngcontent-c0="" style="text-align:center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody _ngcontent-c0="">
                                            <!---->
                                        </tbody>
                                    </table>

                                </div>

                            </div>


                        </div>
                    </div>







                    <div _ngcontent-c0="" class="modal fade" id="myModal" role="dialog">
                        <div _ngcontent-c0="" class="modal-dialog">
                            <div _ngcontent-c0="" class="modal-content">

                                <div _ngcontent-c0="" class="modal-header">   
                                    <h4 _ngcontent-c0="" class="title">Task Assign</h4>      
                                </div>

                                <div _ngcontent-c0="" class="modal-body">

                                    <h3 _ngcontent-c0="">Pickup Man</h3>
                                    <hr _ngcontent-c0="">


                                    <!---->

                                    <br _ngcontent-c0=""><br _ngcontent-c0="">
                                    <form _ngcontent-c0="" class="form-inline ng-untouched ng-pristine ng-invalid" novalidate="">
                                        <div _ngcontent-c0="" class="form-group">
                                            <select _ngcontent-c0="" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="userid">
                                                <!---->
                                            </select>
                                        </div>
                                        <div _ngcontent-c0="" class="form-group">
                                            <input _ngcontent-c0="" class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="remarks" placeholder="Remarks" style="width:300px;" type="email">
                                        </div>
                                        <button _ngcontent-c0="" class="btn btn-success" type="submit">Assign</button>
                                    </form>


                                    <br _ngcontent-c0=""><br _ngcontent-c0=""><br _ngcontent-c0="">
                                    <h3 _ngcontent-c0="">Delivery Man</h3>
                                    <hr _ngcontent-c0="">


                                    <!---->

                                    <br _ngcontent-c0=""><br _ngcontent-c0="">

                                    <form _ngcontent-c0="" class="form-inline ng-untouched ng-pristine ng-invalid" novalidate="">
                                        <div _ngcontent-c0="" class="form-group">
                                            <select _ngcontent-c0="" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="userid">
                                                <!---->
                                            </select>
                                        </div>
                                        <div _ngcontent-c0="" class="form-group">
                                            <input _ngcontent-c0="" class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="remarks" placeholder="Remarks" style="width:300px;" type="email">
                                        </div>
                                        <button _ngcontent-c0="" class="btn btn-success" type="submit">Assign</button>
                                    </form>


                                </div>


                                <div _ngcontent-c0="" class="modal-footer">
                                    <button _ngcontent-c0="" class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>





                    <div _ngcontent-c0="" class="modal fade" id="divPickupTask" role="dialog">
                        <div _ngcontent-c0="" class="modal-dialog">
                            <div _ngcontent-c0="" class="modal-content">

                                <div _ngcontent-c0="" class="modal-header">   
                                    <h4 _ngcontent-c0="" class="title">Pickup Task</h4>      
                                </div>

                                <div _ngcontent-c0="" class="modal-body">


                                    <form _ngcontent-c0="" novalidate="" class="ng-untouched ng-pristine ng-invalid">

                                        <div _ngcontent-c0="" class="form-group">
                                            <label _ngcontent-c0="" for="exampleInputPassword1">Remarks</label>
                                            <textarea _ngcontent-c0="" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="remarks" style="height:90px;"></textarea>
                                        </div>

                                        <button _ngcontent-c0="" class="btn btn-success" type="submit" disabled="disabled">Submit</button>
                                    </form>



                                </div>


                                <div _ngcontent-c0="" class="modal-footer">
                                    <button _ngcontent-c0="" class="btn btn-default" data-dismiss="modal" id="btnPickupClose" type="button">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>





                    <div _ngcontent-c0="" class="modal fade" id="divOrderUpdate" role="dialog">
                        <div _ngcontent-c0="" class="modal-dialog">
                            <div _ngcontent-c0="" class="modal-content">

                                <div _ngcontent-c0="" class="modal-header">   
                                    <h4 _ngcontent-c0="" class="title">Delivery Task</h4>      
                                </div>

                                <div _ngcontent-c0="" class="modal-body">



                                    <form _ngcontent-c0="" novalidate="" class="ng-untouched ng-pristine ng-invalid">
                                        <div _ngcontent-c0="" class="form-group">
                                            <label _ngcontent-c0="" for="exampleInputEmail1">Order State</label>
                                            <select _ngcontent-c0="" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="orderstateid">
                                                <!---->
                                            </select>
                                        </div>
                                        <div _ngcontent-c0="" class="form-group">
                                            <label _ngcontent-c0="" for="exampleInputPassword1">Remarks</label>

                                            <textarea _ngcontent-c0="" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="remarks" style="height:90px;"></textarea>

                                        </div>
                                        <button _ngcontent-c0="" class="btn btn-success" type="submit" disabled="disabled">Submit</button>
                                    </form>



                                </div>


                                <div _ngcontent-c0="" class="modal-footer">
                                    <button _ngcontent-c0="" class="btn btn-default" data-dismiss="modal" id="btnClose" type="button">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>





                    <div _ngcontent-c0="" class="modal fade" id="divPrintPreview_<?php echo $sl; ?>" role="dialog">
                        <div _ngcontent-c0="" class="modal-dialog">
                            <div _ngcontent-c0="" class="modal-content">

                                <div _ngcontent-c0="" class="modal-header">   
                                    <h4 _ngcontent-c0="" class="title">Print Preview</h4>      
                                </div>

                                <div _ngcontent-c0="" class="modal-body" id="divPrintContent_<?php echo $sl; ?>" style="margin:0px auto;">

                                    <div _ngcontent-c0="" class="print page">

                                        <div _ngcontent-c0="" style="width:100%;display:block;height:130px;position:relative;">   
                                            <div _ngcontent-c0="" style="width:200px;">
                                                <img _ngcontent-c0="" src="<?php echo base_url(); ?>assets/images/logo.jpg" style="width:170px;height:120px;margin:0px auto;">         
                                            </div> 
                                            <div _ngcontent-c0="" style="position:absolute;top:10px;right:10px;text-align:right">
                                                <p _ngcontent-c0=""> Track Number: <b _ngcontent-c0=""><?php echo $row->track_number; ?></b></p>
                                                <p _ngcontent-c0=""> Ref Invoice: <b _ngcontent-c0=""><?php echo $row->reference_invoice; ?></b></p>
                                                <p _ngcontent-c0="">Date: <?php echo date('Y-m-d') ?></p>
                                            </div>
                                        </div>

                                        <div _ngcontent-c0="" style="margin:5px;font-size:14px;">
                                            Pickup Address: , ,

                                        </div>

                                        <div _ngcontent-c0="" style="margin:10px 5px 5px;font-size:14px;">
                                            Delivery Address: , ,

                                        </div>





                                        <div _ngcontent-c0="">

                                            <table _ngcontent-c0="" class="table table-sm table-hover table-bordered orderDetails">
                                                <thead _ngcontent-c0="">
                                                    <tr _ngcontent-c0="">
                                                        <th _ngcontent-c0="">Item Name</th>
                                                        <th _ngcontent-c0="">Qty.</th>
                                                        <th _ngcontent-c0="" style="text-align:center">U. Price</th>
                                                        <th _ngcontent-c0="" style="text-align:center">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody _ngcontent-c0="">
                                                    <!---->                
                                                </tbody>
                                                <tfoot _ngcontent-c0=""> 
                                                    <tr _ngcontent-c0="">
                                                        <td _ngcontent-c0="" colspan="3" style="text-align:right;">Total</td>
                                                        <td _ngcontent-c0="" style="width:60px; text-align:right;font-weight:bold">00.0</td>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                        </div>


                                        <div _ngcontent-c0="" id="divPriceInWords" style="margin-left:10px;margin-top:5px;text-align:center;">  </div>




                                        <table _ngcontent-c0="" style="width:100%;margin-top:10px;">
                                            <tbody _ngcontent-c0=""><tr _ngcontent-c0="">
                                                    <td _ngcontent-c0="" style="width:55%;">

                                                        <div _ngcontent-c0="" style="width:100%;">

                                                            <div _ngcontent-c0="" style="margin:0px;margin-top:5px;font-weight:bold;font-size:13px;">Handover Express</div>
                                                            <div _ngcontent-c0="" style="margin:0px;">‎Hotline: 01872-737 757</div>
                                                            <div _ngcontent-c0="" style="margin:0px;">info@handoverexpressbd.com<br _ngcontent-c0="">www.handoverexpressbd.com</div>

                                                        </div>

                                                    </td>
                                                    <td _ngcontent-c0="" style="width:44%;">

                                                        <div _ngcontent-c0="" style="margin-top:50px; width:100%;padding-top:5px;border-top:1px dashed #A6A6A6">Customer Sign</div>           
                                                    </td>
                                                </tr>
                                            </tbody></table>

                                        <div _ngcontent-c0="" style="width:100%;text-align:center;margin:0px;">
                                            <svg _ngcontent-c0="" id="qrcode"></svg>
                                        </div>

                                        <div  style="font-size:10px;width:100%;margin-top:5px;text-align:center ">THANK YOU FOR SHOPPING WITH US</div>
                                        <br>
                                        <div  style="font-size:10px;width:100%;margin-top:5px;text-align:left ">Printed By: <?php echo $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?></div>
                                        <div  style="font-size:10px;width:100%;margin-top:5px;text-align:left ">Order Created Date: <?php
                                            $created_date = $row->created_at;
                                            $created_date = explode(" ", $created_date);
                                            echo $created_date[0];
                                            ?></div>
                                        <div  style="font-size:10px;width:100%;margin-top:5px;text-align:left ">Delivery Man Note: <?php echo $row->deliveryman_note; ?></div>

                                    </div>
                                </div>


                                <div _ngcontent-c0="" class="modal-footer">
                                    <button _ngcontent-c0="" class="btn btn-primary" onclick="printContent('divPrintContent_<?php echo $sl; ?>');" type="button">Print</button>
                                    <button _ngcontent-c0="" class="btn btn-default" data-dismiss="modal" id="btnClose" type="button">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div></div></ng-component>


</div>

</div>

</ng-component></app-root></div></div>

</body>
</html>

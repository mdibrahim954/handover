<?php
if (isset($header)) {
    echo $header;
}
?>
<style>
/*.deliveryClass {*/
/*    margin-right: 8%;*/
/*    font-size: xx-large;*/
/*    font-weight: 900;*/
/*    float: right;*/
/*}*/
    .modal-header {
    padding: 3px;
    border-bottom: 1px solid #e5e5e5;
    /* align-items: center; */
    text-align-last: right;
}
</style>
<script type="text/javascript">
    $(document).ready(function () {
//    alert('hi');
        $('#select_all').on('click', function () {
            if (this.checked) {
                $('.checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $('.checkbox').each(function () {
                    this.checked = false;
                });
            }
        });

        $('.checkbox').on('click', function () {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
        });
    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.qrcode.min.js"></script>
<style>
    .product-print-qrcode {
        width: 70px;
        height: 70px;
        margin: 0 auto;
    }
</style>

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

                        <div _ngcontent-c0="" class="col-md-12">
                            <h3 class="order_delete_status" style="color:green"></h3>
                        </div>

                    </div>

                </div>

                <div _ngcontent-c0="" class="tabbable-panel">
                    <div _ngcontent-c0="" class="tabbable-line">

                        <ul _ngcontent-c0="" class="nav nav-tabs ">
                            <li _ngcontent-c0="" class="active">
                                <a _ngcontent-c0="" href="<?php echo base_url(); ?>admin/dashboard">
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
                            <li _ngcontent-c0="" >
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
                                    <br>
                                    <?php $this->load->view('error-message-display'); ?>
                                    <br>
                                    <form class="form-inline" action="<?php echo base_url() ?>admin/order/assign_selected_pending_order" method="post">
                                        <div _ngcontent-c0="" class="form-group">
                                            <input type="checkbox" id="select_all" /> <span style="color:black;font-size: 18px;"> Select all</span><br><br>
                                        </div>
                                        <select class="form-control" name="orderstateid" required>
                                            <option value="">Order State</option>
                                            <?php foreach ($states as $oState) { ?>
                                                <option value="<?php echo $oState->orderstateid; ?>"><?php echo $oState->orderstatename; ?></option>
                                            <?php } ?>
                                        </select>                                        
                                        <input class="form-control" name="remarks" placeholder="Remarks" style="width:300px;" type="text">
                                        <input class="btn btn-success" type="submit" value="Assign"><br>
                                        <br>

                                        <table id="example" class="display table" style="width:100%">
                                            <thead>
                                                <tr style="background-color: #5ba3ae">
                                                    <th>ID</th>
                                                    <th>Track Number</th>
                                                    <th>Action</th>
                                                    <!--<th style="width:50px">Order ID</th>-->
                                                    <th>Status</th>
                                                    <th>Created DateTime</th>
                                                    <th>Pickup</th>
                                                    <th>Seller</th>
                                                    <th>Customer</th>
                                                    <th>Delivery</th>
                                                    <th>Sale By</th>
                                                </tr>
                                            </thead>
                                            <thead class="filters">
                                                <tr style="background-color: #5ba3ae">
                                                    <th>ID</th>
                                                    <!--<th style="width:50px">Order ID</th>-->
                                                    <th>Track Number</th>
                                                    <th>Action</th>
                                                    <th>Status</th>
                                                    <th>Created DateTime</th>
                                                    <th>Pickup</th>
                                                    <th>Seller</th>
                                                    <th>Customer</th>
                                                    <th>Delivery</th>
                                                    <th>Ref Invoice</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sl = 1;
                                                foreach ($pending as $row) {
                                                    
//                                                echo '<pre>';
//                                                print_r($row);
//                                                echo '</pre>';
                                                    // file_put_contents("row3.txt",json_encode($row).PHP_EOL, FILE_APPEND);
                                                    $orderList = $this->db
                                                            ->select('*')
                                                            ->where('order_id', $row->order_id)
                                                            ->get('order_details')
                                                            ->result();
                                                    ?>
                                                    <tr class="delete_order_div_<?php echo $row->order_id; ?>">
                                                <a href="">
                                                    <td>
                                                        <input type="checkbox" class="checkbox" name="order_id[]" value="<?php echo $row->order_id; ?>"/>
                                                    </td>
                                                </a>       
                                        </form>         
                                     <td><a href="<?php echo base_url(); ?>admin/report/order_details/<?php echo $row->track_number; ?>" target="_blank"><?php echo $row->track_number ?></a></td>
                                        <td>
                                            <div class="dropdown" style="width:15px;float:left; margin-right: 10px">

                                                <i _ngcontent-c0="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview_<?php echo $sl; ?>" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                                            </div>
                                            <div  class="" style="width:15px;float:left;">.
                                            </div>
                                            <div  class="dropdown" style="width:15px;float:left;">
                                                <i _ngcontent-c0="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                                                <ul _ngcontent-c0="" class="dropdown-menu dropdown-menu-right">
                                                    <!--<li _ngcontent-c0=""><a  data-target="#divPickupTask_<?php // echo $sl;   ?>" data-toggle="modal">Pickup Task</a></li>-->
                                                    <li _ngcontent-c0=""><a href="<?php echo base_url(); ?>admin/order/pickup/<?php echo $row->order_id; ?>" target="_blank">Pickup Task</a></li>
                                                    <li _ngcontent-c0="" class="divider"></li>
                                                    <!--<li _ngcontent-c0=""><a  data-target="#divOrderUpdate_<?php // echo $sl;   ?>" data-toggle="modal">Delivery Task</a></li>-->
                                                    <li _ngcontent-c0=""><a href="<?php echo base_url(); ?>admin/order/delivery/<?php echo $row->order_id; ?>" target="_blank">Delivery Task</a></li>
                                                    <li _ngcontent-c0="" class="divider"></li>
                                                    <!--<li _ngcontent-c0=""><a  data-target="#myModal_<?php echo $sl; ?>" data-toggle="modal">Assign Person</a></li>-->
                                                    <li _ngcontent-c0=""><a href="<?php echo base_url(); ?>admin/order/task_assign/<?php echo $row->order_id; ?>" target="_blank">Assign Person</a></li>
                                                    <li _ngcontent-c0="" class="divider"></li>
                                                    <li _ngcontent-c0=""><a  href="<?php echo base_url(); ?>admin/order/order_edit/<?php echo $row->order_id; ?>" target="_blank">Edit Order</a></li>
                                                    <li _ngcontent-c0="" class="divider"></li>
                                                    <!--<li _ngcontent-c0=""><a id="delete_order_<?php // echo $sl;    ?>" style="cursor:pointer" onclick="return confirm('Are you sure you want to delete?');">Delete</a></li>-->
                                                    <?php if($this->session->userdata('menu_permission')==1){?>
                                                    <li _ngcontent-c0=""><a href="<?php echo base_url(); ?>admin/order/delete_order/<?php echo $row->order_id; ?>" target="_blank">Delete</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                            
                                            
                                             <div _ngcontent-c0="" class="modal fade" id="divPrintPreview_<?php echo $sl; ?>" role="dialog">
                                                    <div _ngcontent-c0="" class="modal-dialog">
                                                        <div _ngcontent-c0="" class="modal-content">

                                                            <div _ngcontent-c0="" class="modal-header">   
                                                                
                                                                <!--<div  class="modal-footer">-->
                                                                    <button _ngcontent-c0="" class="btn btn-primary" onclick="printContent('divPrintContent_<?php echo $sl; ?>');" type="button">Print</button>
                                                                    <button _ngcontent-c0="" class="btn btn-default" data-dismiss="modal" id="btnClose" type="button">Close</button>
                                                                <!--</div>-->
                                                                
                                                            </div>

                                                            <div _ngcontent-c0="" class="modal-body" id="divPrintContent_<?php echo $sl; ?>" style="margin:0px auto;">
                                                                <div _ngcontent-c0="" class="print page">
                                                                    <div _ngcontent-c0="" style="width:100%;display:block;height:130px;position:relative;">   
                                                                        <div _ngcontent-c0="" style="width:200px;">
                                                                            <img _ngcontent-c0="" src="<?php echo base_url(); ?>assets/images/logo.jpg" style="width:170px;height:120px;margin:0px auto;">         
                                                                        </div> 
                                                                        <div _ngcontent-c0="" style="position:absolute;top:10px;right:10px;text-align:right">
                                                                            <p _ngcontent-c0=""> Track Number: <b _ngcontent-c0=""><?php echo $row->track_number; ?></b></p>
                                                                            <!--<p _ngcontent-c0=""> Delivery: <b _ngcontent-c0=""><?php echo $row->delivery_area; ?></b></p>-->
                                                                            <p _ngcontent-c0=""> Ref Invoice: <b _ngcontent-c0=""><?php echo $row->reference_invoice; ?></b></p>
                                                                            <p _ngcontent-c0="">Date: <?php echo date('Y-m-d') ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div _ngcontent-c0="" style="margin:5px;font-size:14px;">
                                                                        <b>Pickup Address:</b> <?php echo $row->seller_name . ', ' . $row->seller_address . ', Mob: ' . $row->seller_mobile ?>
                                                                    </div>
                                                                    <div _ngcontent-c0="" style="margin:10px 5px 5px;font-size:16px;">
                                                                        <b>Delivery Address: <?php echo $row->customer_name . ', ' . $row->customer_address . ', Mob: ' . $row->customer_mobile ?></b>
                                                                    </div>
                                                                    <div _ngcontent-c0="">

                                                                        <table _ngcontent-c0="" class="table table-sm table-hover table-bordered orderDetails">
                                                                            <thead _ngcontent-c0="">
                                                                                <tr _ngcontent-c0="">
                                                                                    <th _ngcontent-c0="">Item Name</th>
                                                                                    <th _ngcontent-c0="">Qty.</th>
                                                                                    <th _ngcontent-c0="" style="text-align:center">U. Price</th>
                                                                                    <th _ngcontent-c0="" style="text-align:center">Amount</th>
                                                                                    <th>QR Code</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody _ngcontent-c0="">
                                                                                <?php
                                                                                $total_price = 0;
                                                                                $counter = 0;
                                                                                foreach ($orderList as $row2) {
                                                                                    //file_put_contents('row2.txt',json_encode($row2));

                                                                                    $counter++;
                                                                                    $qrItemCode = isset($row2->item_code) ? trim((string) $row2->item_code) : '';
                                                                                    if ($qrItemCode === '' && !empty($row2->item_name)) {
                                                                                        $matchingProducts = $this->db
                                                                                                ->select('item_code')
                                                                                                ->where('name', $row2->item_name)
                                                                                                ->get('product')
                                                                                                ->result();
                                                                                        if (count($matchingProducts) === 1) {
                                                                                            $qrItemCode = (string) $matchingProducts[0]->item_code;
                                                                                        }
                                                                                    }
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
                                                                                        <td>
                                                                                            <?php if ( !empty($qrItemCode)) { ?>
                                                                                                <div class="product-print-qrcode" id="product-item-code-<?php echo $row->order_id . '-' . $counter; ?>"></div>
                                                                                                <script>
                                                                                                    new QRCode(document.getElementById("product-item-code-<?php echo $row->order_id . '-' . $counter; ?>"), {
                                                                                                        text: <?php echo json_encode(rtrim(base_url(), '/') . '/item/?item=' . rawurlencode($qrItemCode), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>,
                                                                                                        width: 70,
                                                                                                        height: 70,
                                                                                                        correctLevel: QRCode.CorrectLevel.M
                                                                                                    });
                                                                                                </script>
                                                                                            <?php } else { ?>
                                                                                            <div class="product-print-qrcode" id="product-item-code-<?php echo $row->order_id . '-' . $counter; ?>"></div>
                                                                                                <script>
                                                                                                    new QRCode(document.getElementById("product-item-code-<?php echo $row->order_id . '-' . $counter; ?>"), {
                                                                                                        text: <?php echo json_encode(rtrim(base_url(), '/') . '/item/?order=' . rawurlencode($row->order_id), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>,
                                                                                                        width: 70,
                                                                                                        height: 70,
                                                                                                        correctLevel: QRCode.CorrectLevel.M
                                                                                                    });
                                                                                                </script>
                                                                                            <?php } ?>
                                                                                        </td>
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
                                                                            //                                                                                    JsBarcode("#barcode", <?php // echo $row->order_id;   ?>);
                                                                            JsBarcode("#barcode_<?php echo $row->order_id; ?>", <?php echo $row->order_id; ?>, {
                                                                                //  lineColor: "#0aa",
                                                                                width: 5,
                                                                                height: 30,
                                                                                displayValue: false
                                                                            });

                                                                            
                                                                        </script>

                                                                        <div  style="font-size:10px;width:100%;margin-top:5px;text-align:center ">THANK YOU FOR SHOPPING WITH US</div>
                                                                        <?php 
                                                                        $findSingleOrder = $this->db
                                                                            ->select('steadfast_parcel_id, redx_tracking_id, pathao_consignment_id, delivery_area_id')
                                                                            ->from('orders')
                                                                            ->where('order_id', $row->order_id)
                                                                            ->get()
                                                                            ->row();
                                                                        
                                                                        $parcel_id = null;
                                                                        
                                                                        if (!empty($findSingleOrder->redx_tracking_id)) {
                                                                            $parcel_id = $findSingleOrder->redx_tracking_id;
                                                                        } elseif (!empty($findSingleOrder->steadfast_parcel_id)) {
                                                                            $parcel_id = $findSingleOrder->steadfast_parcel_id;
                                                                        } elseif (!empty($findSingleOrder->pathao_consignment_id)) {
                                                                            $parcel_id = $findSingleOrder->pathao_consignment_id;
                                                                        }
                                                                        
                                                                        if ($findSingleOrder->delivery_area_id == 133 && $parcel_id) {
                                                                            echo '<div style="font-weight:900;font-size:28px;text-align: left">Parcel ID : ' . $parcel_id . '</div>';
                                                                        }elseif($findSingleOrder->delivery_area_id == 130 && $parcel_id){
                                                                            echo '<div style="font-weight:900;font-size:28px;text-align: left">Parcel ID : ' . $parcel_id . '</div>';
                                                                        }elseif($findSingleOrder->delivery_area_id == 126 && $parcel_id){
                                                                            echo '<div style="font-weight:900;font-size:28px;text-align: left">Parcel ID : ' . $parcel_id . '</div>';
                                                                        } else {
                                                                            echo '<div style="font-weight:900;font-size:28px;text-align: left">Parcel ID : No Id</div>';
                                                                        }
                                                                        ?>
                                                                        <br>
                                                                        <p class="deliveryClass" style=" margin-right: 8%;font-size: xx-large;font-weight: 900;float: right;"><?php echo $row->delivery_area;?></p>
                                                                        <div  style="font-size:10px;width:100%;margin-top:5px;text-align:left ">Order By: <?php
                                                                         $order_created_by=$row->order_created_by;
                                                                         if($order_created_by !=0){
                                                                         $createdBy=$this->db
                                                                                 ->select('*')
                                                                                 ->where('userid',$row->order_created_by)
                                                                                 ->get('users')
                                                                                 ->row();
                                                                         $orderBy=$createdBy->first_name.' '.$createdBy->last_name;
                                                                         }else{
                                                                             $orderBy='';
                                                                         }
                                                                         echo $orderBy;   ?>
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
                                                                <!--<div  class="modal-footer">-->
                                                                <!--    <button _ngcontent-c0="" class="btn btn-primary" onclick="printContent('divPrintContent_<?php echo $sl; ?>');" type="button">Print</button>-->
                                                                <!--    <button _ngcontent-c0="" class="btn btn-default" data-dismiss="modal" id="btnClose" type="button">Close</button>-->
                                                                <!--</div>-->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!--- all modal form------------->

                                        </td>
                                       
                                        <!--<td style="width:50px"><?php // echo $row->order_id;    ?></td>-->
                                        <td><span style="background: <?php echo $row->state_color; ?>;border-radius: 3px; color:white;padding:3px"><?php echo $row->orderstatename ?></span></td>
                                        <td><?php echo $row->created_at ?></td>
                                        <td><?php echo $row->pickup_area . '<br>' . $row->pickuptime ?></td>
                                        <td><?php echo $row->seller_name . '<br>' . $row->seller_mobile . '<br>' . $row->seller_address ?></td>      
                                        <td><?php echo $row->customer_name . '<br>' . $row->customer_mobile . '<br>' . $row->customer_address ?></td> 
                                        <td><?php echo $row->delivery_area . '<br>' . $row->deliverytime ?></td>
                                        <td><?php echo $row->reference_invoice ?></td>


                                        </tr>
                                        <?php
                                        $sl++;
                                        // if($sl = 500){
                                        //     break;
                                        // }
                                    }
                                    ?>


                                    </tbody>
                                    <tfoot>
                                        <tr style="">
                                            <th>ID</th>
                                            <th>Track Number</th>
                                            <th>Action</th>
                                            <!--<th>Order ID</th>-->
                                            <th>Status</th>
                                            <th>Created DateTime</th>
                                            <th>Pickup</th>
                                            <th>Seller</th>
                                            <th>Customer</th>
                                            <th>Delivery</th>
                                            <th>Sale By</th>
                                        </tr>
                                        </tr>
                                    </tfoot>
                                    </table>
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

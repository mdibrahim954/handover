<?php
if (isset($header)) {
    echo $header;
}
?>
<?php
$delivery_area_id = $order->delivery_area_id;
$deliveryArea = $this->db
        ->select('*')
        ->where('areaid', $delivery_area_id)
        ->get('areas')
        ->row();

$pickup_area_id = $order->pickup_area_id;
$pickupArea = $this->db
        ->select('*')
        ->where('areaid', $pickup_area_id)
        ->get('areas')
        ->row();
$order_id = $order->order_id;
$orderDetails = $this->db
        ->select('*')
        ->where('order_id', $order_id)
        ->get('order_details')
        ->result();

$orderStateId2=$order->order_state_id;

$orderState2 = $this->db
        ->select('*')
        ->where('orderstateid',$orderStateId2)
        ->get('order_state')
        ->row();

$orderTaskPerson = $this->db
        ->select('*')
        ->where('order_id', $order_id)
        ->get('order_task_person')
        ->result();

$orderTask = $this->db
        ->select('*')
        ->where('order_id', $order_id)
        ->get('order_tasks')
        ->result();
?>


<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">


    <router-outlet></router-outlet><ng-component><div class="container">

            <span class="btn btn-default"><a href="<?php echo base_url(); ?>admin/dashboard">Back</a></span>
            <a href="<?php echo base_url(); ?>admin/order/order_edit/<?php echo $order->order_id; ?>"><span class="btn btn-primary" tabindex="0">Edit Order</span></a>


            <div class="page-header" style="margin-top:0px; text-align:center">
                <h1 class="clear"> <span class="label orderstate" style="background: <?php echo $orderState2->state_color; ?>"> <?php echo $order->track_number; ?></span> </h1>
            </div>



            <div class="tabbable-panel">
                <div class="tabbable-line">

                    <ul class="nav nav-tabs ">
                        <li class="active">
                            <a data-toggle="tab" href="#tab_default_1" aria-expanded="true">
                                Order Information </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#tab_default_2" aria-expanded="false">
                                Order Status </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#tab_default_3" aria-expanded="false">
                                Order Details </a>
                        </li>
<!--                        <li class="">
                            <a data-toggle="tab" href="#tab_default_4" aria-expanded="false">
                                Pickup </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#tab_default_5" aria-expanded="false">
                                Delivery </a>
                        </li>-->
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_default_1">
                            <div class="row" style="margin:15px 10px;">
                                <div class="col-sm-6 col-md-6">
                                    <h4>Pickup Address</h4>
                                    <b><?php echo $order->seller_name; ?></b>
                                    <br>
                                    <?php echo $order->seller_address; ?>
                                    <br>
                                    Mobile: <?php echo $order->seller_mobile; ?>
                                    <br>
                                    <?php echo $pickupArea->area_name; ?>
                                    <br><br><br>
                                    <h4>Note To Delivery Man</h4>
                                    <br>
                                    <p><?php echo $order->deliveryman_note; ?></p>                                   


                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <h4>Delivery Address</h4>
                                    <b><?php echo $order->customer_name; ?></b>
                                    <br>
                                    <?php echo $order->customer_address; ?>
                                    <br>
                                    Mobile:<?php echo $order->customer_mobile; ?>
                                    <br>
                                    Alt Mobile:<?php echo $order->customer_mobile_alt; ?>
                                    <br>
                                    <?php echo $deliveryArea->area_name; ?>

                                </div>
                            </div>
                        </div>


                        <div class="tab-pane" id="tab_default_2">

                            <div class="content table-responsive table-full-width" style="margin:20px;">

                                <table class="table table-sm table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Status</th>
                                            <th>Assign To</th>
                                            <th>Assign By</th>
                                            <th style="width:40%">Remarks</th>
                                            <th>Started on</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $taskSL = 1;
                                        foreach ($orderTask as $Task) {
                                            $taskPersonID = $Task->user_id;
                                            $taskPerson = $this->db
                                                    ->select('*')
                                                    ->where('userid', $taskPersonID)
                                                    ->get('users')
                                                    ->row();
                                            $orderStates = $this->db
                                                        ->select('*')
                                                        ->where('orderstateid', $Task->task_state_id)
                                                        ->get('order_state')
                                                        ->row();
                                            ?>
                                            <tr>
                                                <td><?php echo $taskSL; ?></td>
                                                <td><?php
                                                    if ($Task->task_type_id == 1) {
                                                        echo 'Pickup';
                                                    } elseif ($Task->task_type_id == 2) {
                                                        echo 'Delivery';
                                                    }
                                                    ?></td>
                                                <td><span class="label orderstate" style="background: <?php echo $orderStates->state_color; ?>"> <?php echo $orderStates->orderstatename; ?></span></td>
                                                <td></td>
                                                <td><?php echo $taskPerson->first_name . ' ' . $taskPerson->last_name; ?></td>
                                                <td style="width:40%"><?php echo $Task->remarks; ?></td>
                                                <td><?php echo $Task->created_at; ?></td>
                                            </tr>
                                        <?php $taskSL++; } ?>
                                        <?php
                                        foreach ($orderTaskPerson as $Task) {
                                            $taskPersonID = $Task->user_id;
                                            $taskPerson = $this->db
                                                    ->select('*')
                                                    ->where('userid', $taskPersonID)
                                                    ->get('users')
                                                    ->row();
                                            
                                             $ordersInfo = $this->db
                                                        ->select('*')
                                                        ->where('order_id', $Task->order_id)
                                                        ->get('orders')
                                                        ->row();
                                             
                                            $orderStateId=$ordersInfo->order_state_id;
                                             
                                            $orderState = $this->db
                                                    ->select('*')
                                                    ->where('orderstateid',$orderStateId)
                                                    ->get('order_state')
                                                    ->row();
                                            ?>
                                            <tr>
                                                <td><?php echo $taskSL; ?></td>
                                                <td><?php
                                                    if ($Task->task_type_id == 1) {
                                                        echo 'Pickup';
                                                    } elseif ($Task->task_type_id == 2) {
                                                        echo 'Delivery';
                                                    }
                                                    ?> </td>
                                                <td><span class="label orderstate" style="background: <?php echo $orderState->state_color; ?>"> <?php echo $orderState->orderstatename; ?></span></td>
                                                <td><?php echo $taskPerson->first_name . ' ' . $taskPerson->last_name; ?></td>
                                                <td></td>
                                                <td style="width:40%"><?php echo $Task->remarks; ?></td>
                                                <td><?php echo $Task->created_at; ?></td>
                                            </tr>
<?php $taskSL++; } ?>
<!--                                        <tr>
                                        <td>2</td>
                                        <td>Delivery</td>
                                        <td><span class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                                        <td>sheikh sabit</td>
                                        <td style="width:40%">done</td>
                                        <td>2018-04-08 14:21:36</td>
                                    </tr>                -->
                                    </tbody>
                                    <tfoot>
                                        <tr>

                                        </tr>
                                    </tfoot>
                                </table>


                            </div>
                        </div>


                        <div class="tab-pane" id="tab_default_3">

                            <div class="content table-responsive table-full-width" style="max-width:550px;margin:10px auto;">

                                <table class="table table-sm table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th style="width:60%;">Item Name</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Unit Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $it = 1;
                                        $itemTotalPrice = 0;
                                        if (!empty($orderDetails)) {
                                            foreach ($orderDetails as $item) {
//                                                echo '<pre>';
//                                                print_r($item);
//                                                echo '</pre>';
                                                if ($item->quantity != '' && $item->quantity != 0) {

                                                    $itemTotalPrice += $item->quantity * $item->unit_price;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $it; ?></td>
                                                        <td style="width:60%;"><?php echo $item->item_name; ?></td>
                                                        <td class="text-center"><?php echo $item->quantity; ?></td>
                                                        <td class="text-center"><?php echo $item->unit_price; ?></td>
                                                    </tr>   
                                                    <?php
                                                    $it++;
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" style="text-align:right">Total = </td>
                                            <td class="text-center">
<?php echo $itemTotalPrice; ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_default_4">  
                            <div class="content table-responsive table-full-width" style="margin:20px;">
                                <table class="table table-sm table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Status</th>
                                            <th>Pickup Man</th>
                                            <th style="width:40%">Remarks</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $taskSL = 1;
                                        foreach ($orderTaskPerson as $Task) {
                                            if ($Task->task_type_id == 1) {
                                            $taskPersonID = $Task->user_id;
                                            $taskPerson = $this->db
                                                    ->select('*')
                                                    ->where('userid', $taskPersonID)
                                                    ->get('users')
                                                    ->row();
                                            ?>
                                            <tr>
                                                <td><?php echo $taskSL; ?></td>
                                                <td><?php
                                                    if ($Task->task_type_id == 1) {
                                                        echo 'Pickup';
                                                    } elseif ($Task->task_type_id == 2) {
                                                        echo 'Delivery';
                                                    }
                                                    ?></td>
                                                <td><span class="label orderstate" style="background: #777777"> <?php
                                                    if ($Task->task_type_id == 1) {
                                                        echo 'Pickup';
                                                    } elseif ($Task->task_type_id == 2) {
                                                        echo 'Delivery';
                                                    }
                                                    ?></span></td>
                                                <td><?php echo $taskPerson->first_name . ' ' . $taskPerson->last_name; ?></td>
                                                <td style="width:40%"><?php echo $Task->remarks; ?></td>
                                                <td><?php echo $Task->created_at; ?></td>
                                            </tr>
                                        <?php $taskSL++; } } ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>

                                        </tr>
                                    </tfoot>
                                </table>


                            </div>

                        </div>
                        <div class="tab-pane" id="tab_default_5">
                            
                             <div class="content table-responsive table-full-width" style="margin:20px;">
                                <table class="table table-sm table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Status</th>
                                            <th>Delivery Man</th>
                                            <th style="width:40%">Remarks</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $taskSL = 1;
                                        foreach ($orderTaskPerson as $Task) {
                                            if ($Task->task_type_id == 2) {
                                            $taskPersonID = $Task->user_id;
                                            $taskPerson = $this->db
                                                    ->select('*')
                                                    ->where('userid', $taskPersonID)
                                                    ->get('users')
                                                    ->row();
                                            ?>
                                            <tr>
                                                <td><?php echo $taskSL; ?></td>
                                                <td><?php
                                                    if ($Task->task_type_id == 1) {
                                                        echo 'Pickup';
                                                    } elseif ($Task->task_type_id == 2) {
                                                        echo 'Delivery';
                                                    }
                                                    ?></td>
                                                <td><span class="label orderstate" style="background: #777777"> <?php
                                                    if ($Task->task_type_id == 1) {
                                                        echo 'Pickup';
                                                    } elseif ($Task->task_type_id == 2) {
                                                        echo 'Delivery';
                                                    }
                                                    ?></span></td>
                                                <td><?php echo $taskPerson->first_name . ' ' . $taskPerson->last_name; ?></td>
                                                <td style="width:40%"><?php echo $Task->remarks; ?></td>
                                                <td><?php echo $Task->created_at; ?></td>
                                            </tr>
                                        <?php $taskSL++; } } ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
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

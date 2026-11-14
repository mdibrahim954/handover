<?php
if (isset($header)) {
    echo $header;
}
?>

<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">

<br>
            <?php $this->load->view('error-message-display'); ?>
            <br>
    <br>
    <br>
    <div  class="content table-responsive table-full-width">
        <table _ngcontent-c2="" class="table table-sm table-hover table-bordered orderDetails">
            <thead _ngcontent-c2="">
                <tr _ngcontent-c2="">
                    <th _ngcontent-c2="">#</th>
                    <th _ngcontent-c2="">Assign To</th>
                    <th _ngcontent-c2="">Track Number</th>
                    <th _ngcontent-c2="">Type</th>
                    <th _ngcontent-c2="">Address</th>
                    <th _ngcontent-c2="">Time</th>
                    <th _ngcontent-c2="">Order Status</th>
                    <th _ngcontent-c2="">Remarks</th>
                    <th _ngcontent-c2="" style="text-align:center">Assigned On</th>
                    <th _ngcontent-c2="" style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody _ngcontent-c2="">
                <?php
                if (!empty($today_taskList)) {
                    $sl_pMan = 1;
                    foreach ($today_taskList as $row) {
                        $pManInfo = $this->db
                                ->select('*')
                                ->where('userid', $row['user_id'])
                                ->get('users')
                                ->row();
                        $orderInfo = $this->db
                                ->select('*')
                                ->where('order_id', $row['order_id'])
                                ->get('orderlist')
                                ->row();

                        $pickupDateTime = $orderInfo->pickup_time;
                        $pickupDateTime = explode(" ", $pickupDateTime);
                        $PickupDate = $pickupDateTime[0];
                        $PickupDate = date('m/d/Y', strtotime($PickupDate));
                        $PickupTime = $pickupDateTime[1];
                        //convert time to am/pm
                        $PickupTime = date('h:i A', strtotime($PickupTime));

                        $deliveryDateTime = $orderInfo->pickup_time;
                        $deliveryDateTime = explode(" ", $deliveryDateTime);
                        $DeliveryDate = $deliveryDateTime[0];
                        $DeliveryDate = date('m/d/Y', strtotime($DeliveryDate));

                        $DeliveryTime = $deliveryDateTime[1];
                        //convert time to am/pm
                        $DeliveryTime = date('h:i A', strtotime($DeliveryTime));
                        ?>
                        <tr _ngcontent-c2="">
                            <td _ngcontent-c2=""><?php echo $sl_pMan; ?></td>
                            <td _ngcontent-c2=""><?php echo $pManInfo->first_name . ' ' . $pManInfo->last_name; ?></td>
                            <td _ngcontent-c2=""><?php echo $orderInfo->track_number; ?></td>
                            <td _ngcontent-c2=""><?php
                                if ($row['task_type_id'] == 1) {
                                    echo 'Pickup';
                                } elseif ($row['task_type_id'] == 2) {
                                    echo 'Delivery';
                                }
                                ?></td>
                            <td _ngcontent-c2=""><?php
                                if ($row['task_type_id'] == 1) {
                                    echo '<b>Pickup Address:</b><br>';
                                    echo 'Seller Name: ' . $orderInfo->seller_name . '<br>';
                                    echo 'Seller Mobile: ' . $orderInfo->seller_mobile . '<br>';
                                    echo 'Seller Address: ' . $orderInfo->seller_address . '<br>';
                                } elseif (
                                        $row['task_type_id'] == 2) {
                                    echo '<b>Delivery Address:</b><br>';
                                    echo 'Customer Name: ' . $orderInfo->customer_name . '<br>';
                                    echo 'Customer Mobile: ' . $orderInfo->customer_mobile . '<br>';
                                    echo 'Customer Address: ' . $orderInfo->customer_address . '<br>';
                                }
                                ?></td>
                            <td _ngcontent-c2=""><?php
                                if ($row['task_type_id'] == 1) {
                                    echo $PickupTime;
                                } elseif ($row['task_type_id'] == 2) {
                                    echo $DeliveryTime;
                                }
                                ?></td>
                            <td _ngcontent-c2=""><span style="background: <?php echo $orderInfo->state_color; ?>;border-radius: 3px; color:white;padding:3px"><?php echo $orderInfo->orderstatename; ?></span></td>
                            <td _ngcontent-c2=""><?php echo $row['remarks']; ?></td>
                            <td _ngcontent-c2="" style="text-align:center"><?php echo $row['created_at']; ?></td>
                            <td _ngcontent-c2="" style="text-align:center">
                                <form action="<?php echo base_url(); ?>deliveryman/dashboard/update_task_status" method="POST">
                                    <input type="hidden" name="track_number" value="<?php echo $orderInfo->track_number; ?>">
                                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                    <input type="hidden" name="task_type_id" value="<?php echo $row['task_type_id']; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $pManInfo->userid; ?>">
                                    <input class="btn btn-success" type="submit" value="Update"><br>
                                </form>

                        </tr>    
                        <?php
                        $sl_pMan++;
                    }
                } else {
                    ?>
                    <tr>

                        <td colspan="9"><h3 class="text-center">No Task Assigned!</h3></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>
<?php
if (isset($footer)) {
    echo $footer;
}
?>
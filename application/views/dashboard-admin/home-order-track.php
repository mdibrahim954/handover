<?php
if (isset($header)) {
    echo $header;
}
?>

<div style="">
    <router-outlet></router-outlet><ng-component _nghost-c0="">
        <div _ngcontent-c0="" class="" style="height:95vh;">

            <div _ngcontent-c0="" class="container">

                <div _ngcontent-c0="" style="max-width:600px;margin:10px auto; margin-top:30px;padding:50px;background-color:#F3F3F3;border-radius:4px;">


                    <form action="<?php echo base_url(); ?>admin/order/order_track" method="post" class="form-inline" novalidate="" style="text-align:center;">
                        <div _ngcontent-c0="" class="form-group">
                            <div _ngcontent-c0="" class="input-group">
                                <span _ngcontent-c0="" class="input-group-addon"><i _ngcontent-c0="" aria-hidden="true" class="fa fa-truck" style="font-size:22px;"></i></span>
                                <input _ngcontent-c0="" class="form-control" name="tracknumber" value="<?php echo $result->track_number; ?>" id="tracknumber" placeholder="Tracking number" style="height:45px;" value="CA000064" type="text">
                            </div>
                        </div>

                        <input _ngcontent-c0="" class="btn btn-success" style="height:45px;" value="Track Your Order" type="submit">
                        <!----> 
                    </form>    


                </div>


                <!----><div _ngcontent-c0="" style="max-width:600px;margin:10px auto; margin-top:30px;padding:20px;background-color:#F3F3F3;border-radius:4px;">

                    <?php
                    $pickupAreaId = $result->pickup_area_id;
                    $pickupArea = $this->db
                            ->select('*')
                            ->where('areaid', $pickupAreaId)
                            ->get('areas')
                            ->row();

                    $deliveryAreaId = $result->delivery_area_id;
                    $deliveryArea = $this->db
                            ->select('*')
                            ->where('areaid', $deliveryAreaId)
                            ->get('areas')
                            ->row();
                    $order_state_id = $result->order_state_id;
                    $orderState = $this->db
                            ->select('*')
                            ->where('orderstateid', $order_state_id)
                            ->get('order_state')
                            ->row();
                    ?>

                    <div _ngcontent-c0="" class="row">
                        <div _ngcontent-c0="" class="col-md-5 block">
                            <div _ngcontent-c0="" class="box box-lightBlue">
                                <p _ngcontent-c0=""><b _ngcontent-c0=""><?php echo $result->track_number; ?></b><br _ngcontent-c0="">
                                    <?php echo $pickupArea->area_name; ?>
                                    <br _ngcontent-c0="">
                                    <span _ngcontent-c0="" title="<?php echo $result->pickup_time; ?>"> 
                                        <?php
                                        $pickupTime = $result->pickup_time;
                                        $pickupTime = explode(" ", $pickupTime);
                                        $Pdate = $pickupTime[0];
                                        $pDayName = date('l', strtotime($Pdate));
                                        ?>
                                        <?php echo $pDayName; ?> 
                                        <?php echo date("g:i a", strtotime("$pickupTime[1]")); ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div _ngcontent-c0="" class="col-md-2" style="padding:0px;">
                            <div _ngcontent-c0="" style="margin:80px auto; background-color:#ED9E2E;color:white; padding:10px;width:100px; border-radius:3px;text-align:center;"><?php echo $orderState->orderstatename; ?></div>
                        </div>
                        <div _ngcontent-c0="" class="col-md-5 block">
                            <div _ngcontent-c0="" class="box box-blue">
                                <p _ngcontent-c0=""><?php echo $result->customer_name; ?><br _ngcontent-c0="">
                                    <?php echo $deliveryArea->area_name; ?>
                                    <br _ngcontent-c0="">
                                    <span _ngcontent-c0="" title="2017-08-20 15:30:00"> 
                                        <?php
                                        $deliveryTime = $result->delivery_time;
                                        $deliveryTime = explode(" ", $deliveryTime);
                                        $Ddate = $deliveryTime[0];
                                        $dDayName = date('l', strtotime($Ddate));
                                        ?>
                                        <?php echo $dDayName; ?> 
                                        <?php echo date("g:i a", strtotime("$deliveryTime[1]")); ?>
                                    </span>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <!----><div _ngcontent-c0="" style="max-width:600px;margin:10px auto; margin-top:30px;padding:20px;background-color:#F3F3F3;border-radius:4px;">


                    <!----><div _ngcontent-c0="" class="panel panel-primary">
                        <?php $this->load->view('error-message-display'); ?>
                        <div _ngcontent-c0="" class="panel-heading">
                            <span _ngcontent-c0="" class="glyphicon glyphicon-comment"></span> Comments
                        </div>
                        <div _ngcontent-c0="" class="panel-body">
                            <ul _ngcontent-c0="" class="chat">

                                <?php foreach($orderComments as $oComments){?>
                                <li><b>Name:</b> <?php echo $oComments->Fullname; ?>,<br><b>Comments:</b> <?php echo $oComments->Comment; ?></li>
                                <?php } ?>

                            </ul>
                        </div>

                    </div>


                    <form _ngcontent-c0="" action="<?php echo base_url(); ?>admin/order/order_comments" method="post" class="ng-untouched ng-pristine ng-invalid">
                        <div _ngcontent-c0="" class="form-group">
                            <label _ngcontent-c0="" for="exampleInputEmail1">Enter your comment</label>
                            <input _ngcontent-c0="" class="form-control ng-untouched ng-pristine ng-invalid" name="fullname" required="" placeholder="Full name" type="text">
                            <input  name="order_id" value="<?php echo $result->order_id; ?>" required="" type="hidden">
                            <!---->
                        </div>
                        <div _ngcontent-c0="" class="form-group">
                            <textarea _ngcontent-c0="" class="form-control ng-untouched ng-pristine ng-invalid" name="comment" required="" placeholder="Your comment"></textarea>
                            <!---->
                        </div>
                        <button _ngcontent-c0="" class="btn btn-success" type="submit">Submit</button>
                    </form>

                </div>

            </div>
        </div>
    </ng-component>
</div></ng-component></app-root></div></div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>
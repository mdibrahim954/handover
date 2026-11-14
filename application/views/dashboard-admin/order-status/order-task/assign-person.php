<?php
if (isset($header)) {
    echo $header;
}
?>

<script type="text/javascript">
    $(document).ready(function () {
        /* attach a submit handler to the form */
        $("#pickup_man").submit(function (event) {
            event.preventDefault();
            /* stop form from submitting normally */
            var values = $("#pickup_man").serialize();
            $.ajax({
                url: "<?php echo base_url() ?>admin/order/task_assign_pickup",
                type: "POST",
                data: values,
                cache: false,
                beforeSend: function () {
                },
                success: function (data) {
                    $(".successMessage").html(data);
                    $(".remarks").val('');

                },
                error: function () {
                    alert('there is error while submit');
                }
            });
        });
    });
</script>


<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">
    <router-outlet></router-outlet><ng-component>
        <div class="card" style="margin:50px auto;max-width:450px;">
            <div class="header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="title">Pickup Man</h4>  

                    </div>
                    <!--<div class="col-md-2"><a class="btn btn-default" data-target="#myModal" data-toggle="modal" style="float:right;">Create new</a></div>-->
                </div>

            </div>
            <br>
            <div class="header">
                <div class="row">
                    <div class="col-md-12">                       
                        <div class="successMessage" style="">
                            <table _ngcontent-c2="" class="table table-sm table-hover table-bordered orderDetails">
                                <thead _ngcontent-c2="">
                                    <tr _ngcontent-c2="">
                                        <th _ngcontent-c2="">#</th>
                                        <th _ngcontent-c2="">Pickup Man</th>
                                        <th _ngcontent-c2="">Remarks</th>
                                        <th _ngcontent-c2="" style="text-align:center">Assigned On</th>
                                        <th _ngcontent-c2="" style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody _ngcontent-c2="">
                                    <?php
                                    $sl_pMan = 1;
                                    foreach ($pickupMan as $row) {
                                        $pManInfo = $this->db
                                                ->select('*')
                                                ->where('userid', $row->user_id)
                                                ->get('users')
                                                ->row();
                                        ?>
                                        <tr _ngcontent-c2="">
                                            <td _ngcontent-c2=""><?php echo $sl_pMan; ?></td>
                                            <td _ngcontent-c2=""><?php echo $pManInfo->first_name . ' ' . $pManInfo->last_name; ?></td>
                                            <td _ngcontent-c2=""><?php echo $row->remarks; ?></td>
                                            <td _ngcontent-c2="" style="text-align:center"><?php echo $row->created_at; ?></td>
                                            <?php if($this->session->userdata('menu_permission')==1){?>
                                            <td _ngcontent-c2="" style="text-align:center"><a class="btn btn-danger">Delete</a></td>
                            <?php } ?>
                                        </tr>    
                                        <?php $sl_pMan++;
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!--<div class="col-md-2"><a class="btn btn-default" data-target="#myModal" data-toggle="modal" style="float:right;">Create new</a></div>-->
                </div>

            </div>
            <!--<form novalidate="" class="" action="<?php // echo base_url();        ?>admin/order/delete_order_by_orderid" method="post">-->
            <form  class="" id="pickup_man" method="post">
                <div class="form-group">
                    <label>Order Track Number</label>
                    <input class="form-control" name="order_id" value="<?php echo $order_id; ?>" placeholder="" type="hidden" required="" readonly="">
                    <input class="form-control" name="track_number" value="<?php echo $orderinfo->track_number; ?>" placeholder="" type="text" required="" readonly="">
                </div>
                <div class="form-group">
                    <label>Pickup Man</label>
                    <select class="form-control" name="userid" required="">
                        <option value="">Select..</option>
                        <?php foreach ($delivery_man as $dMan) { ?>
                            <option value="<?php echo $dMan->userid; ?>"><?php echo $dMan->first_name . ' ' . $dMan->last_name; ?></option>
<?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control remarks" name="remarks" placeholder="Write Something" required=""></textarea>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-success text-center" type="submit">Submit</button>
                </div>
            </form>
    </ng-component>
</div>

</div>



<script type="text/javascript">
    $(document).ready(function () {
        /* attach a submit handler to the form */
        $("#delivery_man").submit(function (event) {
            event.preventDefault();
            /* stop form from submitting normally */
            var values = $("#delivery_man").serialize();
            $.ajax({
                url: "<?php echo base_url() ?>admin/order/task_assign_delivery",
                type: "POST",
                data: values,
                cache: false,
                beforeSend: function () {
                },
                success: function (data) {
                    $(".successMessageDeliveryman").html(data);
                    $(".remarks").val('');

                },
                error: function () {
                    alert('there is error while submit');
                }
            });
        });
    });
</script>
<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">
    <router-outlet></router-outlet><ng-component>
        <div class="card" style="margin:50px auto;max-width:450px;">
            <div class="header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="title" style="">Deliery Man</h4>  

                    </div>
                    <!--<div class="col-md-2"><a class="btn btn-default" data-target="#myModal" data-toggle="modal" style="float:right;">Create new</a></div>-->
                </div>

            </div>
            <br>
            <div class="header">
                <div class="row">
                    <div class="col-md-12">                       
                        <div class="successMessageDeliveryman" style="">
                            <table _ngcontent-c2="" class="table table-sm table-hover table-bordered orderDetails">
                                <thead _ngcontent-c2="">
                                    <tr _ngcontent-c2="">
                                        <th _ngcontent-c2="">#</th>
                                        <th _ngcontent-c2="">Delivery Man</th>
                                        <th _ngcontent-c2="">Remarks</th>
                                        <th _ngcontent-c2="" style="text-align:center">Assigned On</th>
                                        <th _ngcontent-c2="" style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody _ngcontent-c2="">
                                    <?php
                                    $sl_dMan = 1;
                                    foreach ($deliveryMan as $row) {
                                        $dManInfo = $this->db
                                                ->select('*')
                                                ->where('userid', $row->user_id)
                                                ->get('users')
                                                ->row();
                                        ?>
                                        <tr _ngcontent-c2="">
                                            <td _ngcontent-c2=""><?php echo $sl_dMan; ?></td>
                                            <td _ngcontent-c2=""><?php echo $dManInfo->first_name . ' ' . $dManInfo->last_name; ?></td>
                                            <td _ngcontent-c2=""><?php echo $row->remarks; ?></td>
                                            <td _ngcontent-c2="" style="text-align:center"><?php echo $row->created_at; ?></td>
                                            <td _ngcontent-c2="" style="text-align:center"><a class="btn btn-danger">Delete</a></td>
                                        </tr>    
    <?php $sl_dMan++;
} ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!--<div class="col-md-2"><a class="btn btn-default" data-target="#myModal" data-toggle="modal" style="float:right;">Create new</a></div>-->
                </div>

            </div>
            <!--<form novalidate="" class="" action="<?php // echo base_url();        ?>admin/order/delete_order_by_orderid" method="post">-->
            <form  class="" id="delivery_man" method="post">
                <div class="form-group">
                    <label>Order Track Number</label>
                    <input class="form-control" name="order_id" value="<?php echo $order_id; ?>" placeholder="" type="hidden" required="" readonly="">
                    <input class="form-control" name="track_number" value="<?php echo $orderinfo->track_number; ?>" placeholder="" type="text" required="" readonly="">
                </div>
                <div class="form-group">
                    <label>Pickup Man</label>
                    <select class="form-control" name="userid" required="">
                        <option value="">Select..</option>
                        <?php foreach ($delivery_man as $dMan) { ?>
                            <option value="<?php echo $dMan->userid; ?>"><?php echo $dMan->first_name . ' ' . $dMan->last_name; ?></option>
<?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control remarks" name="remarks" placeholder="Write Something" required=""></textarea>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-success text-center" type="submit">Submit</button>
                </div>
            </form>
    </ng-component>
</div>

</div>

</ng-component></app-root></div></div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>
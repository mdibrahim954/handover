<?php
if (isset($header)) {
    echo $header;
}
?>

<script type="text/javascript">
    $(document).ready(function () {
        /* attach a submit handler to the form */
        $("#delete_order").submit(function (event) {
            event.preventDefault();
            /* stop form from submitting normally */
            var values = $("#delete_order").serialize();
            $.ajax({
                url: "<?php echo base_url() ?>admin/order/delete_order_by_orderid",
                type: "POST",
                data: values,
                cache: false,
                beforeSend: function () {
                },
                success: function (data) {
                    $(".delete_successMessage").html(data);
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
                        <h4 class="title">Delete Order</h4>  
                    <div class="delete_successMessage" style="color:green"></div>
                    </div>
                    <!--<div class="col-md-2"><a class="btn btn-default" data-target="#myModal" data-toggle="modal" style="float:right;">Create new</a></div>-->
                </div>

            </div>
            <br>
            <!--<form novalidate="" class="" action="<?php // echo base_url(); ?>admin/order/delete_order_by_orderid" method="post">-->
            <form  class="" id="delete_order" method="post">
                <div class="form-group">
                    <label>Order Track Number</label>
                    <input class="form-control" name="order_id" value="<?php echo $order_id; ?>" placeholder="" type="hidden" required="" readonly="">
                    <input class="form-control" name="track_number" value="<?php echo $orderinfo->track_number; ?>" placeholder="" type="text" required="" readonly="">
                </div>
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control remarks" name="remarks" placeholder="Write Something" required=""></textarea>
                </div>
                
                <?php if($this->session->userdata('menu_permission')==1){?>
                <button class="btn btn-danger" type="submit">delete</button>
                            <?php } ?>
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
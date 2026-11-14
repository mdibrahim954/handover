<?php
if (isset($header)) {
    echo $header;
}
?>




<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">


    <router-outlet></router-outlet><ng-component>
        <!---->
        <!---->




        <div class="card" style="margin:50px auto;max-width:450px;">
            <div class="header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="title">Payment Type Edit</h4>  
                    </div>
                    <!--<div class="col-md-2"><a class="btn btn-default" data-target="#myModal" data-toggle="modal" style="float:right;">Create new</a></div>-->
                </div>

            </div>
            <br>


            <form novalidate="" class="ng-untouched ng-pristine ng-invalid" action="<?php echo base_url(); ?>admin/order/payment_type_update" method="post">
                <div class="form-group">
                    <label>State Name</label>
                    <input class="form-control ng-untouched ng-pristine ng-invalid" name="payment_type_name" value="<?php echo $result->payment_type_name; ?>" placeholder="" type="text" required="">
                    <input class="form-control ng-untouched ng-pristine ng-invalid" name="id" value="<?php echo $result->payment_type_id; ?>" placeholder="" type="hidden" required="">
                    <!---->
                </div>



                <button class="btn btn-success" type="submit">Update</button>
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
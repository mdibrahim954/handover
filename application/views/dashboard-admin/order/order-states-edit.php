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
              <h4 class="title">Edit Order States</h4>  
        </div>
        <!--<div class="col-md-2"><a class="btn btn-default" data-target="#myModal" data-toggle="modal" style="float:right;">Create new</a></div>-->
    </div>
  
</div>
<br>


        <form novalidate="" class="ng-untouched ng-pristine ng-invalid" action="<?php echo base_url(); ?>admin/order/order_states_update" method="post">
            <div class="form-group">
                <label>State Name</label>
                <input class="form-control ng-untouched ng-pristine ng-invalid" name="orderstatename" value="<?php echo $result->orderstatename; ?>" placeholder="" type="text" required="">
                <input class="form-control ng-untouched ng-pristine ng-invalid" name="id" value="<?php echo $result->orderstateid; ?>" placeholder="" type="hidden" required="">
                <!---->
            </div>
            <div class="form-group">
                <label>Color</label>
                <input class="form-control ng-untouched ng-pristine ng-invalid" name="state_color" value="<?php echo $result->state_color; ?>" placeholder="" type="text" required="">
                <!---->
            </div>

            <div class="form-group">
                <span class="label" style="background-color:#777777">#777777</span>
                <span class="label" style="background-color:#5CB85C">#5CB85C</span>
                <span class="label" style="background-color:#D9534F">#D9534F</span>
                <span class="label" style="background-color:#694F93">#694F93</span>
                <span class="label" style="background-color:#337AB7">#337AB7</span>
                <span class="label" style="background-color:#F0AD4E">#F0AD4E</span>
                <span class="label" style="background-color:#5BC0DE">#5BC0DE</span>
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
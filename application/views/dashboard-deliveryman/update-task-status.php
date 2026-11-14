<?php
if (isset($header)) {
    echo $header;
}
?>

<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">

    <br>                                  
    <form class="form-horizontal ng-untouched ng-pristine ng-invalid" action="<?php echo base_url(); ?>deliveryman/dashboard/task_status_save" method="post">
    <!--        <select class="form-control" name="orderstateid" required>
                <option value="">Order State</option>
                <option value="35">Complete</option>
                <option value="1">Pending</option>
                <option value="2">Cancel</option>            
            </select>                                        
            <textarea class="form-control" name="remarks" placeholder="Remarks" style="width:300px;" type="text"></textarea>
            <input class="btn btn-success" type="submit" value="Submit"><br>-->

        <div class="card" style="max-width:700px;margin:10px auto;">
            <div class="header" style="text-align:center">
                <h4 class="title"><span>Update Task Status</span> </h4>
            </div>
            <div class="content">
                <div class="form-group">
                    <label class="control-label col-sm-3">Track Number <span class="text-danger">*</span></label>
                    <div class="col-xs-8">			
                        <b><?php echo $track_number; ?></b>                	
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Order State <span class="text-danger">*</span></label>
                    <div class="col-xs-8">			
                        <select class="form-control" name="orderstateid" required>
                            <option value="">Order State</option>
                            <option value="33">Picked Up Complete</option>
                            <option value="35">Complete</option>
                            <option value="1">Pending</option>
                            <option value="2">Cancel</option>            
                        </select>                                  	
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Remarks</label>
                    <div class="col-md-8 col-sm-9">
                        <input  class="" type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                        <input  class="" type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <input  class="" type="hidden" name="task_type_id" value="<?php echo $task_type_id; ?>">
                        <textarea class="form-control ng-untouched ng-pristine ng-valid" id="" name="remarks" required=""></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3"></label>
                    <div class="col-md-8 col-sm-9">
                        <button class="btn btn-warning" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                    </div>
                </div>


            </div>
        </div>


    </form>   

</div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>
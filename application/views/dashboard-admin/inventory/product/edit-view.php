<?php
if (isset($header)) {
    echo $header;
}
?>

<style>
    .error{
        color:red;
    }
</style>

<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">
    <router-outlet></router-outlet><ng-component>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home"></span> </li>
            <!--<li>Users</li>-->
            <li class="active">Edit</li>
        </ol>
        <div class="tabbable-panel" style="margin-top:20px;">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                </ul>

                <div class="tab-content">
                    <?php $this->load->view('error-message-display'); ?>
                    <form class="form-horizontal" action="<?php echo base_url(); ?>admin/product/update" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Name <span class="text-danger">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="name" value="<?php echo $result->name; ?>" placeholder="Enter name" type="text" required="">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="id" value="<?php echo $result->id; ?>" type="hidden" required="">

                                <span class="help-block first_name error"><?php // echo form_error('firstname');  ?></span>
                            </div>
                        </div>
                        
                        <?php
                        $categoryId = $result->category_id;
                        $categoryInfo = $this->db
                                        ->select('*')
                                        ->where('id', $categoryId)
                                        ->get('product_category')
                                        ->row();
                        ?>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-3">Category <span class="text-danger">*</span></label>

                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="category_id" required="">

                                    <option value="<?php echo $categoryInfo->id; ?>"><?php echo $categoryInfo->name; ?></option>
                                    <?php foreach ($category as $row) { ?>
                                        <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                    <?php } ?>
                                    <!--<option value="1">Pending</option><option value="2">Cancelled</option><option value="11">Accepted</option><option value="13">Unassigned</option><option value="14">Started</option><option value="22">Declined</option><option value="27">Returned</option><option value="30">Failed</option><option value="31">Partial Delivery Complete</option><option value="33">Picked Up Complete</option><option value="35">Completed</option>-->
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Item Code <span class="text-danger">*</span></label>

                            <div class="col-md-6 col-sm-6">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="item_code" value="<?php echo $result->item_code; ?>" placeholder="Enter item code" type="text" required="" readonly="">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Qty <span class="text-danger">*</span></label>

                            <div class="col-md-6 col-sm-6">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="qty" value="<?php /* echo $result->qty*/ echo ""; ?>" placeholder="Enter New Product Quantity" type="number" required="">

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-offset-3 col-xs-10">
                                <button class="btn btn-warning" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            </div>
                        </div>

                    </form>



                </div>
            </div>

        </div></ng-component>


</div>

</div>

</ng-component></app-root></div></div>
<?php
if (isset($footer)) {
    echo $footer;
}
?>
<?php
if (isset($header)) {
    echo $header;
}
?>



<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">


        <router-outlet></router-outlet><ng-component>
<div class="card" style="margin:50px auto;max-width:400px;">
    <div class="header">
        <div class="row">
            <div class="col-md-10">
                  <h4 class="title">Payment Type</h4>  
                  <br>
                  <?php $this->load->view('error-message-display'); ?>
            </div>
            <div class="col-md-2"><a class="btn btn-default" data-target="#divModal" data-toggle="modal" style="float:right;">Create new</a></div>
        </div>
      
    </div>
    <br>
    
    
    <ul class="list-group" style="margin:15px;">    
        <!--<li class="list-group-item"><input class="form-control ng-untouched ng-pristine ng-valid" placeholder="Search" type="text"></li>-->

        <?php foreach($result as $row){?>
        <li class="list-group-item">
            <?php echo $row->payment_type_name; ?>
    
            <span style="float:right">
          
            <a href="<?php echo base_url(); ?>admin/order/edit_payment_type/<?php echo $row->payment_type_id; ?>" class="btn btn-xs btn-default" tabindex="0">Edit</a>
            <?php if($this->session->userdata('menu_permission')==1){?>
            <button class="btn btn-xs btn-danger" type="button">Delete</button>
<?php } ?>
            </span>
        </li>
        <?php } ?>

    </ul>
    
    <br>
    <br>
    <br>
    </div>



<div class="modal fade" id="divModal" role="dialog">
<div class="modal-dialog">
<div class="modal-content">

    <div class="modal-header">   
        <h4 class="title">New Payment Type</h4>      
    </div>
    
    <div class="modal-body">
    
    <div style="margin:10px;">
    
    
    
        <form class="form-horizontal ng-untouched ng-pristine ng-invalid" action="<?php echo base_url(); ?>admin/order/payment_type_save" method="post">
    
        <div class="form-group">
            <label class="control-label">Payment type name <span class="text-danger">*</span></label>
            <input class="form-control ng-untouched ng-pristine ng-invalid" name="paymenttypename" placeholder="" type="text" required="">
        </div>
        <!---->
    
        <button class="btn btn-success" type="submit"> Save <span class="glyphicon glyphicon-send"></span></button>
    
    </form>
    
    </div>
    
    </div>
    
    
    <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal" id="btnCloseModal" type="button">Close</button>
    </div>

</div>
</div>
</div>



  

<!---->

<!----></ng-component>


</div>

</div>

</ng-component></app-root></div></div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>

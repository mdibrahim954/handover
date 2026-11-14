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
              <h4 class="title">Order States</h4>  
        </div>
        <div class="col-md-2"><a class="btn btn-default" data-target="#myModal" data-toggle="modal" style="float:right;">Create new</a></div>
    </div>
  
</div>
<br>


<div class="content table-responsive table-full-width"> 
<?php $this->load->view('error-message-display'); ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>State Name</th>
        <th>Default</th>
        <th style="text-align:center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($states as $row) { ?>
        <tr>
          <td>1</td>
          <td>
            <span class="label statecolor" style="background: <?php echo $row->state_color; ?>"> <?php echo $row->orderstatename; ?> </span>
          </td>
          <td>
             <!---->
             <!----><span class="tick <?php if($row->neworder_default==1){ echo 'tick-success'; }?> glyphicon glyphicon-ok"></span>
          </td>
          <td style="text-align:center">
              <a href="<?php echo base_url(); ?>admin/order/edit_order_state/<?php echo $row->orderstateid; ?>" class="btn btn-xs btn-default" tabindex="0">Edit</a>
            <?php if($this->session->userdata('menu_permission')==1){?>
              <button class="btn btn-xs btn-danger" type="button">Delete</button>
            <?php } ?>
          </td>
      </tr>
      <?php } ?>
      
    </tbody>
  </table>

</div>
</div>




<div class="modal fade" id="myModal" role="dialog" style="display: none;">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">   
    <h4 class="title">New Order State</h4>      
</div>

<div class="modal-body">



    <form novalidate="" class="ng-untouched ng-pristine ng-invalid" action="<?php echo base_url(); ?>admin/order/order_states_save" method="post">
  <div class="form-group">
    <label>State Name</label>
    <input class="form-control ng-untouched ng-pristine ng-invalid" name="statename" placeholder="" type="text" required="">
    <!---->
  </div>
  <div class="form-group">
    <label>Color</label>
    <input class="form-control ng-untouched ng-pristine ng-invalid" name="color" placeholder="" type="text" required="">
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

  <button class="btn btn-success" type="submit">Submit</button>
</form>



</div>


<div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
      </div>

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
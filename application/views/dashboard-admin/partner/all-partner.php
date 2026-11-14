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
              <h4 class="title">Partners</h4>  
        </div>
        <div class="col-md-2"><a class="btn btn-default" href="<?php echo base_url(); ?>admin/partner/new_partner" style="float:right;">Create new partner</a></div>
    </div>
  
</div>
<br>


<div class="content table-responsive table-full-width"> 
<?php $this->load->view('error-message-display'); ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Partner Name</th>
        <th>Photo</th>
        <th style="text-align:center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $sl=1;
      foreach($partner as $row) {?>
        <tr>
          <td><?php echo $sl; ?></td>
          <td>
            <?php echo $row->name; ?>
          </td>
          <td>
              <img src="<?php echo base_url();?>resources/partner/<?php echo $row->partner_image; ?>" width="80" />
          </td>
          <td style="text-align:center">
              <a href="<?php echo base_url(); ?>admin/partner/edit_partner/<?php echo $row->partner_id; ?>" class="btn btn-xs btn-default" tabindex="0">Edit</a>
             <?php if($this->session->userdata('menu_permission')==1){?>
              <a href="<?php echo base_url(); ?>admin/partner/delete_partner/<?php echo $row->partner_id; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
                            <?php } ?>
          </td>
      </tr>
      <?php $sl++; } ?>
      
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
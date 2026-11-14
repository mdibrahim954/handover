<?php
if (isset($header)) {
    echo $header;
}
?>
<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">


        <router-outlet></router-outlet><ng-component>
<div class="card" style="margin:50px auto;max-width:400px;">
<div class="header">
	<h4 class="title"><span>Create User Type</span> </h4>
</div>
<div class="content">


<form class="form-inline ng-untouched ng-pristine ng-invalid" action="<?php echo base_url(); ?>admin/user/user_type_save" method="post" >
  <div class="form-group">
     
      <input class="form-control ng-untouched ng-pristine ng-invalid" name="user_type_name" value="" placeholder="User type name" style="width:220px;" type="text" required=""> 
  </div>

  <button class="btn btn-success" type="submit" >Submit</button>
  <a href="<?php echo base_url(); ?>admin/user/user_type"><span class="btn btn-default" tabindex="0">Back</span></a>
</form>    
			<!---->



</div>
</div>
</ng-component>


</div>

</div>

</ng-component></app-root></div></div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>
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
                        <h4 class="title">All Area</h4>  
                        <?php
                        echo '<br>';
                        $this->load->view('error-message-display');
                        ?>
                        <style>
                            .error{
                                color:red;
                            }
                        </style>
                    </div>
                    <div class="col-md-2"><a class="btn btn-default" style="float:right;" href="<?php echo base_url(); ?>admin/area/area_create">Create new</a></div>
                </div>

            </div>
            <br>


            <ul class="list-group" style="margin:15px;">
                <?php foreach ($area as $row) { ?>
                    <li class="list-group-item">
                        <?php echo $row->area_name; ?>
                        <span style="float:right">
                            <a class="btn btn-xs btn-default" href="<?php echo base_url(); ?>admin/area/edit_area/<?php echo $row->areaid; ?>">Edit</a>
                             <?php if($this->session->userdata('menu_permission')==1){?>
                            <a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>admin/area/delete_area/<?php echo $row->areaid; ?>" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
                            <?php } ?>
                        </span>
                    </li>
                <?php } ?>

            </ul>
            <br>



        </div></ng-component>


</div>

</div>

</ng-component></app-root></div></div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>
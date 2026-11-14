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
            <li class="active">Create Partner</li>
        </ol>
        <div class="tabbable-panel" style="margin-top:20px;">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                    <!--                    <li class="active">
                                            <a data-toggle="tab" href="#tab_default_1">
                                            <a  href="<?php echo base_url(); ?>admin/user/rider_list">
                                                All Rider List </a>
                                        </li>-->

                   
                </ul>

                <div class="tab-content">
                    <?php $this->load->view('error-message-display'); ?>
                    <form class="form-horizontal" action="<?php echo base_url(); ?>admin/partner/partner_save" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Partner Name <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <input class="form-control ng-untouched ng-pristine ng-invalid" name="name" value="" placeholder="Enter partner name" type="text" required="">
                               
                                <span class="help-block first_name error"><?php // echo form_error('firstname'); ?></span>
                                <!---->
                            </div>
                        </div>
                        
                         <div class="form-group">
                                    <label class="control-label col-sm-3">Partner Logo<span class="text-danger"></span>*</label>
                                    <div class="col-md-8 col-sm-9">
                                        <input type="file" id="exampleInputFile" name="partner_image">
                                        <p class="help-block">png,jpg,jpeg,gif format only</p>
                                    </div>
                                </div>
                        

                       



                        <div class="form-group">
                            <div class="col-xs-offset-3 col-xs-10">
                                <button class="btn btn-warning" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submit <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
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
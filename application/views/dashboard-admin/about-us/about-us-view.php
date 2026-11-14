<?php
if (isset($header)) {
    echo $header;
}
?>

<script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 500,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ],
        content_css: [
//    'http://fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '<?php echo base_url() ?>css/lato_font.css',
            'https://www.tinymce.com/css/codepen.min.css'
        ]
    });

</script>      
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
            <li class="active">Update About Us</li>
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
                    <form class="form-horizontal" action="<?php echo base_url(); ?>admin/about/about_update" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="control-label col-sm-3">Description<span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <textarea class="form-control ng-untouched ng-pristine ng-invalid ckeditor" cols="30" name="description" id=""  placeholder="Description" rows="2" ><?php echo $about->description; ?></textarea>
                                <!--<span class="help-block first_name error"><?php // echo form_error('permanent_address');  ?></span>-->
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
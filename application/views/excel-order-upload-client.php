<?php
//https://phppot.com/php/import-excel-file-into-mysql-database-using-php/
?>
<?php
if (isset($header)) {
    echo $header;
}
?>

<div class="row" style="margin-top:57px;">
    <div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">
        <div class="col-sm-6 col-md-6 col-lg-6 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
            <div class="container">
                <!--<h3><a href="" class="btn btn-primary">Download Sample Excel File</a></h3>-->
                <h3><a href="<?php echo base_url(); ?>resources/excel-sample/sample.xls" class="">Download for Sample upload Excel File</a></h3>
                <h1>Product Upload (Excel File)</h1>
                <br>

                <div class="col-sm-4 col-md-4 col-lg-4">.
                <?php $this->load->view('error-message-display'); ?>
                    <form method="POST" action="<?php echo base_url(); ?>client/import_order/excel_data" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Upload Excel File</label>
                            <input type="file" name="file" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="Submit" class="btn btn-success">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>
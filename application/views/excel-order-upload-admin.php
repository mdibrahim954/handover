<?php
//https://phppot.com/php/import-excel-file-into-mysql-database-using-php/
?>
<!--<!DOCTYPE html>
<html>
<head>
    <title>Product Upload</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>-->

<?php
if (isset($header)) {
    echo $header;
}
?>

<div class="row" style="margin-top:57px;">
    <div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">
        <div class="col-sm-6 col-md-6 col-lg-6 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
            <div class="container">
                <h1>Product Upload (Excel File)</h1>
                <br>
                <?php $this->load->view('error-message-display'); ?>

                <div class="col-sm-4 col-md-4 col-lg-4">.
                    <form method="POST" action="<?php echo base_url(); ?>admin/import_order/excel_data" enctype="multipart/form-data">
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
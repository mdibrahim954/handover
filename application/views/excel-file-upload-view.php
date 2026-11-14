<?php
//https://phppot.com/php/import-excel-file-into-mysql-database-using-php/
//    $dbHost = "localhost";
//    $dbDatabase = "insert_data_from_excel";
//    $dbPasswrod = "";
//    $dbUser = "root";
//    $mysqli = new mysqli($dbHost, $dbUser, $dbPasswrod, $dbDatabase);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Upload</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Product Upload (Excel File)</h1>

	<form method="POST" action="<?php echo base_url(); ?>test/excel_data" enctype="multipart/form-data">
        <div class="form-group">
            <label>Upload Excel File</label>
            <input type="file" name="file" class="form-control" required="">
        </div>
        <div class="form-group">
            <button type="submit" name="Submit" class="btn btn-success">Upload</button>
        </div>
    </form>
</div>
</body>
</html>
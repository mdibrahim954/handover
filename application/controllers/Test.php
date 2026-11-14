<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function TestTime() {
        echo 'Current Datetime: ' . date('Y-m-d H:i:s');
        echo '<br>';
//       echo 'added 6 hours: '.$cenvertedTime = date('Y-m-d H:i:s',strtotime('+6 hour',strtotime('Y-m-d H:i:s')));

        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));
    }

    public function excel_upload() {
        $this->load->view('excel-file-upload-view');
    }

    public function excel_data() {
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        require('library/php-excel-reader/excel_reader2.php');
//require('library/SpreadsheetReader.php');

        include_once(APPPATH . '/libraries/excel-lib/php-excel-reader/excel_reader2.php');
        include_once(APPPATH . '/libraries/excel-lib/SpreadsheetReader.php');

//$dbHost = "localhost";
//$dbDatabase = "import_excel";
//$dbPasswrod = "";
//$dbUser = "root";
//$mysqli = new mysqli($dbHost, $dbUser, $dbPasswrod, $dbDatabase);
        print_r($_FILES);
        if (isset($_POST['Submit'])) {
            $mimes = array('application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.oasis.opendocument.spreadsheet', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            if (in_array($_FILES["file"]["type"], $mimes)) {
                $uploadFilePath = './resources/uploads/' . basename($_FILES['file']['name']);

                move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
                $Reader = new SpreadsheetReader($uploadFilePath);

                $totalSheet = count($Reader->sheets());
                echo "You have total " . $totalSheet . " sheets" .
                $html = "<table border='1'>";
                $html .= "<tr><th>SL</th><th>Order ID</th><th>Product name</th><th>Amount</th><th>Qty</th></tr>";

                /* For Loop for all sheets */
                for ($i = 0; $i < $totalSheet; $i++) {
                    $Reader->ChangeSheet($i);
                    foreach ($Reader as $Row) {
//                        echo '<pre>';
//                        print_r($Row);
//                        echo '</pre>';
                        $html .= "<tr>";
                        $title = isset($Row[0]) ? $Row[0] : '';
                        $description = isset($Row[1]) ? $Row[1] : '';
                        $productName = isset($Row[2]) ? $Row[2] : '';
                        $amount = isset($Row[3]) ? $Row[3] : '';
                        $qty = isset($Row[4]) ? $Row[4] : '';
                        $pickupMerchant = isset($Row[5]) ? $Row[5] : '';
                        $merchantPhone = isset($Row[6]) ? $Row[6] : '';
                        $merchantAddress = isset($Row[7]) ? $Row[7] : '';
                        $deliveryName = isset($Row[8]) ? $Row[8] : '';
                        $deliveryPhone = isset($Row[9]) ? $Row[9] : '';
                        $deliveryAddress = isset($Row[10]) ? $Row[10] : '';
                        $pickupDate = isset($Row[11]) ? $Row[11] : '';
                        $pickupDate = date('Y-m-d', strtotime($pickupDate));
                        $pickupDate=$pickupDate.' '.'00:00:00';
                        $deliveryDate = isset($Row[12]) ? $Row[12] : '';
                        $deliveryDate = date('Y-m-d', strtotime($deliveryDate));
                        $deliveryDate=$deliveryDate.' '.'00:00:00';
                        $productSpecification = isset($Row[13]) ? $Row[13] : '';
                        
                        $html .= "<td>" . $title . "</td>";
                        $html .= "<td>" . $description . "</td>";
                        $html .= "<td>" . $amount . "</td>";
                        $html .= "<td>" . $qty . "</td>";
                        $html .= "</tr>";
                        
                        $dataArray[]=array(
                            'title'=>$title,
                            'description'=>$description,
                            'product name'=>$productName,
                            'amount'=>$amount,
                            'qty'=>$qty,
                            'pickupMerchant'=>$pickupMerchant,
                            'merchantPhone'=>$merchantPhone,
                            'merchantAddress'=>$merchantAddress,
                            'deliveryName'=>$deliveryName,
                            'deliveryPhone'=>$deliveryPhone,
                            'deliveryAddress'=>$deliveryAddress,
                            'pickupDate'=>$pickupDate,
                            'deliveryDate'=>$deliveryDate,
                            'productSpecification'=>$productSpecification,
                            'order_state_id'=>13,
                        );

//				$query = "insert into items(title,description) values('".$title."','".$description."')";
//                $mysqli->query($query);
                    }
                }
                $html .= "</table>";
//                echo $html;
                 echo '<pre>';
                        print_r($dataArray);
                        echo '</pre>';

                echo "<br />Data Inserted in dababase";
            } else {
                die("<br/>Sorry, File type is not allowed. Only Excel file.");
            }
        }
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Import_order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') && $this->session->userdata('user_type_id') != 1) {
            redirect(base_url());
        }
//        $this->load->model('user_model');
    }

    public function excel_upload() {
        $data = array();
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('excel-order-upload-admin', $data);
    }

    public function excel_data() {

        include_once(APPPATH . '/libraries/excel-lib/php-excel-reader/excel_reader2.php');
        include_once(APPPATH . '/libraries/excel-lib/SpreadsheetReader.php');

//        echo '<pre>';
//        print_r($_FILES);
//        echo '</pre>';
        if (isset($_POST['Submit'])) {
            $mimes = array('application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.oasis.opendocument.spreadsheet', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            if (in_array($_FILES["file"]["type"], $mimes)) {
                $uploadFilePath = './resources/uploads/' . basename($_FILES['file']['name']);

                move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
                $Reader = new SpreadsheetReader($uploadFilePath);

                $totalSheet = count($Reader->sheets());

                if ($totalSheet >= 1) {

                    /* For Loop for all sheets */
                    for ($i = 0; $i < $totalSheet; $i++) {
                        $Reader->ChangeSheet($i);
                        $count = 1;
                        foreach ($Reader as $Row) {
//                        echo '<pre>';
//                        print_r($Row);
//                        echo '</pre>';
                            $sl = isset($Row[0]) ? $Row[0] : '';
                            $orderid = isset($Row[1]) ? $Row[1] : '';
                            $productName = isset($Row[2]) ? $Row[2] : '';
                            $amount = isset($Row[3]) ? $Row[3] : '';
                            if ($amount == '') {
                                $amount = 0;
                            }
                            $qty = isset($Row[4]) ? $Row[4] : '';
                            if ($qty == '') {
                                $qty = 0;
                            }
                            $pickupMerchant = isset($Row[5]) ? $Row[5] : '';
                            $merchantPhone = isset($Row[6]) ? $Row[6] : '';
                            $merchantAddress = isset($Row[7]) ? $Row[7] : '';
                            $deliveryName = isset($Row[8]) ? $Row[8] : '';
                            $deliveryPhone = isset($Row[9]) ? $Row[9] : '';
                            $deliveryAddress = isset($Row[10]) ? $Row[10] : '';
                            $pickupDate = isset($Row[11]) ? $Row[11] : '';
                            $pickupDate = date('Y-m-d', strtotime($pickupDate));
                            $pickupDate = $pickupDate . ' ' . '12:00:00';
                            $deliveryDate = isset($Row[12]) ? $Row[12] : '';
                            $deliveryDate = date('Y-m-d', strtotime($deliveryDate));
                            $deliveryDate = $deliveryDate . ' ' . '12:00:00';
                            $productSpecification = isset($Row[13]) ? $Row[13] : '';

                            $OrderID = $this->db->select("*")->limit(1)->order_by('order_id', "DESC")->get("orders")->row();
                            $lastOrderID = $OrderID->order_id;
                            $lastOrderID = $lastOrderID + 1;
//        $track_number = strtoupper(substr($areaInfo->area_name, 0, 2)) . sprintf("%06d", $lastOrderID);
                            $track_number = strtoupper(substr('HE', 0, 2)) . sprintf("%06d", $lastOrderID);

                            $user_id = $this->session->userdata('user_id');
                            $startTime = date("Y-m-d H:i:s");
                            $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));

                            if ($count != 1) {
                                $input = array(
//                            'sl'=>$sl,
//                            'MerchantOrderid'=>$MerchantOrderid,
//                            'product name'=>$productName,
//                            'amount'=>$amount,
//                            'qty'=>$qty,
//                            'track_number' => $track_number,
//                            'pickupMerchant'=>$pickupMerchant,
//                            'merchantPhone'=>$merchantPhone,
//                            'merchantAddress'=>$merchantAddress,
//                            'deliveryName'=>$deliveryName,
//                            'deliveryPhone'=>$deliveryPhone,
//                            'deliveryAddress'=>$deliveryAddress,
//                            'pickupDate'=>$pickupDate,
//                            'deliveryDate'=>$deliveryDate,
//                            'productSpecification'=>$productSpecification,
                                    'track_number' => $track_number,
                                    'delivery_charge' => '0',
                                    'order_type_id' => 1,
                                    'seller_name' => $pickupMerchant,
                                    'seller_mobile' => '0' . $merchantPhone,
                                    'seller_address' => $merchantAddress,
                                    'pickup_area_id' => 117,
                                    'pickup_time' => $pickupDate,
                                    'customer_name' => $deliveryName,
                                    'customer_mobile' => '0' . $deliveryPhone,
                                    'customer_address' => $deliveryAddress,
                                    'delivery_area_id' => 117, //select any (no area)
                                    'delivery_time' => $deliveryDate,
                                    'reference_invoice' => '',
                                    'package_description' => '',
                                    'deliveryman_note' => '',
                                    'is_client_order' => 1,
                                    'order_state_id' => 13,
                                    'user_id' => $user_id,
                                    'order_created_by' => $user_id,
                                    'created_at' => $cenvertedCurrentTime,
                                    'updated_at' => $cenvertedCurrentTime,
                                );
                                $response = $this->db->insert('orders', $input);
                                $last_insert_id = $this->db->insert_id();

                                  //insert item delivery charge---------------------------------------------------------
                                if (isset($last_insert_id)) {

                                    $orderItemDeliveryCharge = array(
                                        'order_id' => $last_insert_id,
                                        'item_name' => 'Delivery Charge',
                                        'quantity' => 0,
                                        'unit_price' => 0,
                                        'total' => 0,
                                        'created_at' => $cenvertedCurrentTime,
                                        'updated_at' => $cenvertedCurrentTime,
                                    );
                                    $response1 = $this->db->insert('order_details', $orderItemDeliveryCharge);

                                    $orderItemCharge = array(
                                        'order_id' => $last_insert_id,
                                        'item_name' => $productName,
                                        'quantity' => $qty,
                                        'unit_price' => $amount,
                                        'total' => $qty * $amount,
                                        'created_at' => $cenvertedCurrentTime,
                                        'updated_at' => $cenvertedCurrentTime,
                                    );
                                    $response2 = $this->db->insert('order_details', $orderItemCharge);
                                }
                            }
                            $count++;
                        }
                    }



                    $sess['success'] = 'Order Imported Successfully!';
                    $this->session->set_userdata($sess);
                    redirect('admin/import_order/excel_upload');
                } else {
                    $sess['exception'] = 'Ohh! Something went wrong';
                    $this->session->set_userdata($sess);
                    redirect('admin/import_order/excel_upload');
                }
            } else {
                $sess['exception'] = 'Ohh! Something went wrong';
                $this->session->set_userdata($sess);
                redirect('admin/import_order/excel_upload');
            }
        }
    }

}

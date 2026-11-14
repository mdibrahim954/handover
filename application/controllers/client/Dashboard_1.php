<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') && ($this->session->userdata('user_type_id') != 3 || $this->session->userdata('user_type_id') != 5)) {
            redirect(base_url());
        }
        $this->load->model('user_dashboard_model');
    }

    public function index() {
        $data = array();
        $user_id = $this->session->userdata('user_id');
        $first_name = $this->session->userdata('first_name');
        $last_name = $this->session->userdata('last_name');

        $fullName = $first_name . ' ' . $last_name;
        $data['order'] = $this->db
                ->select('*')
                ->where('showing_status', 1)
                ->where('seller_name', $fullName)
                ->or_where('user_id', $this->session->userdata('user_id'))
                ->limit(400)
                ->order_by('order_id', 'desc')
                ->get('orders')
                ->result();

        $data['area_list'] = $this->db
                ->select('*')
//                ->where('status', 1)
                ->order_by('area_name', 'asc')
                ->get('areas')
                ->result();
        $data['order_state'] = $this->db
                ->select('*')
//                    ->where('status',1)
                ->order_by('orderstatename', 'asc')
                ->get('order_state')
                ->result();

//            echo '<pre>';
//            print_r($data['order']);
//            echo '</pre>';
//            exit();

        $data['header'] = $this->load->view('dashboard-client/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-client/common/footer', $data, TRUE);
        $this->load->view('dashboard-client/order-filter-view', $data);
    }

    public function search_list() {
        $data = array();
        $data['user_id'] = $user_id = $this->session->userdata('user_id');
//        $data['user_id'] = $user_id = 92;
        $data['areaname'] = $areaname = $this->input->post('areaname');
        $data['orderstatename'] = $orderstatename = $this->input->post('orderstatename');
        $date_from = $this->input->post('date_from');
        $date_from = date("Y-m-d", strtotime($date_from));
        $date_from2 = $date_from . ' ' . '00:00:00';

        $data['date_from'] = $date_from2;

        $date_to = $this->input->post('date_to');
        $date_to = date("Y-m-d", strtotime($date_to));
        $date_to2 = $date_to . ' ' . '00:00:00';

        $data['date_to'] = $date_to2;

        $data['orderby'] = $orderby = $this->input->post('orderby');
        $data['sortby'] = $sortby = $this->input->post('sortby');
        $data['result'] = $this->user_dashboard_model->delivery_list_search($data);

//            echo '<pre>';
//            print_r($data['result']);
////            print_r($_POST);
//            echo '</pre>';
//            exit();

        $data['order'] = $this->db
                ->select('*')
                ->where('user_id', $user_id)
                ->order_by('order_id', 'desc')
                ->get('orders')
                ->result();
        $data['area_list'] = $this->db
                ->select('*')
//                ->where('status', 1)
                ->order_by('area_name', 'asc')
                ->get('areas')
                ->result();
        $data['order_state'] = $this->db
                ->select('*')
//                    ->where('status',1)
                ->order_by('orderstatename', 'asc')
                ->get('order_state')
                ->result();

        $data['header'] = $this->load->view('dashboard-client/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-client/common/footer', $data, TRUE);
        $this->load->view('dashboard-client/search-order-delivery', $data);
    }

    public function all_list_export() {
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
        $data = array();

        $result = $this->user_dashboard_model->client_all_list($data);
        $dataToExports = [];
        if (!empty($result)) {
            foreach ($result as $row) {

                $totalItemPrice = 0;
                $itemInfo = $this->db
                        ->select('*')
                        ->where('order_id', $row['order_id'])
                        ->get('order_details')
                        ->result();
                if (!empty($itemInfo)) {
                    foreach ($itemInfo as $item) {
                        $totalItemPrice += $item->quantity * $item->unit_price;
                    }
                }

                $customerAddress = str_replace("\r", "", $row['customer_address']);
                $customerAddress = str_replace("\n", "", $customerAddress);

                $arrangeData['Track Number'] = $row['track_number'];
                $arrangeData['Invoice Ref'] = $row['reference_invoice'];
                $arrangeData['Customer Name'] = $row['customer_name'];
                $arrangeData['Customer Aobile'] = $row['customer_mobile'];
                $arrangeData['Customer Address'] = $customerAddress;
                $arrangeData['Delivery Area'] = $row['delivery_area'];
                $arrangeData['Orderstatename'] = $row['orderstatename'];
                $arrangeData['Delivery date'] = $row['delivery_time'];
                $arrangeData['Delivery day'] = $row['deliverytime'];
                $arrangeData['Seller Name'] = $row['seller_name'];
                $arrangeData['Total Price'] = $totalItemPrice;
                $dataToExports[] = $arrangeData;
            }
//            echo '<pre>';
//            print_r($row);
//            echo '</pre>';
            // set header
            $filename = "OrderReport-" . date('Y-d-m') . ".xls";
            //  $filename = "dataToExport.xlsx";
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=\"$filename\"");
            $this->exportExcelData($dataToExports);
        } else {
            $sess['exception'] = 'No Record Found!';
            $this->session->set_userdata($sess);
            redirect('client/dashboard');
        }
    }

    public function search_list_export() {
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';

        $data['areaname'] = $areaname = $this->input->post('areaname');
        $data['orderstatename'] = $orderstatename = $this->input->post('orderstatename');
        $data['date_from'] = $this->input->post('date_from');
        $data['date_to'] = $this->input->post('date_to');

        $data['orderby'] = $orderby = $this->input->post('orderby');
        $data['sortby'] = $sortby = $this->input->post('sortby');
        $result = $this->user_dashboard_model->admin_delivery_list_search($data);

//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';

        $dataToExports = [];
        if (!empty($result)) {
            foreach ($result as $row) {


                $totalItemPrice = 0;
                $itemInfo = $this->db
                        ->select('*')
                        ->where('order_id', $row['order_id'])
                        ->get('order_details')
                        ->result();
                if (!empty($itemInfo)) {
                    foreach ($itemInfo as $item) {
                        $totalItemPrice += $item->quantity * $item->unit_price;
                    }
                }

                $arrangeData['Track Number'] = $row['track_number'];
                $arrangeData['Invoice Ref'] = $row['reference_invoice'];
                $arrangeData['Customer Name'] = $row['customer_name'];
                $arrangeData['Customer Aobile'] = $row['customer_mobile'];
                $arrangeData['Customer Address'] = $row['customer_address'];
                $arrangeData['Delivery Area'] = $row['delivery_area'];
                $arrangeData['Orderstatename'] = $row['orderstatename'];
                $arrangeData['Deliverytime'] = $row['deliverytime'];
                $arrangeData['Seller Name'] = $row['seller_name'];
                $arrangeData['Total Price'] = $totalItemPrice;
                $dataToExports[] = $arrangeData;


//                echo '<br>';
//                echo 'Total Price: -------------------------------'.$totalItemPrice;
//                echo '<br>';
//            echo '<pre>';
//            print_r($itemInfo);
////            print_r($row);
//            echo '</pre>';
            }


            // set header
            $filename = "OrderReport-" . date('Y-d-m') . ".xls";
//  $filename = "dataToExport.xlsx";
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=\"$filename\"");
            $this->exportExcelData($dataToExports);
        } else {
            $sess['exception'] = 'No Record Found!';
            $this->session->set_userdata($sess);
            redirect('client/dashboard');
        }
    }

    public function exportExcelData($records) {
        $heading = false;
        if (!empty($records))
            foreach ($records as $row) {
                if (!$heading) {
                    // display field/column names as a first row
                    echo implode("\t", array_keys($row)) . "\n";
                    $heading = true;
                }
                echo implode("\t", ($row)) . "\n";
            }
    }

    public function order_details($track_number) {
        $data = array();
        $data['order'] = $this->db
                ->select('*')
                ->where('track_number', $track_number)
                ->get('orders')
                ->row();

        if (empty($data['order'])) {
            redirect('client/dashboard');
        }

//            echo '<pre>';
//            print_r($data['order']);
//            echo '</pre>';
//            exit();

        $data['header'] = $this->load->view('dashboard-client/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-client/common/footer', $data, TRUE);
        $this->load->view('dashboard-client/order-details', $data);
    }

    public function create_order() {
        $data = array();
        $data['delivery'] = $this->db
                ->select('*')
                ->get('order_type')
                ->result();
        $data['area'] = $this->db
                ->select('*')
                ->order_by('area_name', 'asc')
                ->get('areas')
                ->result();

        $data['userinfo'] = $this->db
                ->select('*')
                ->where('userid', $this->session->userdata('user_id'))
                ->get('users')
                ->row();
        $userAreaId = $data['userinfo']->area_id;

        $data['defaultArea'] = $this->db
                ->select('*')
                ->where('areaid', $userAreaId)
                ->get('areas')
                ->row();

        $data['header'] = $this->load->view('dashboard-client/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-client/common/footer', $data, TRUE);
        $this->load->view('dashboard-client/new-order-create', $data);
    }

    public function order_save() {
        $item = $this->input->post('item'); //array

        $deliverytypeid = $this->input->post('deliverytypeid');
        $sellersname = trim($this->input->post('sellersname'));
        $sellersmobile = trim($this->input->post('sellersmobile'));
        $sellersaddress = trim($this->input->post('sellersaddress'));
        $pickupareaid = $this->input->post('pickupareaid');

        $pickupDate = $this->input->post('pickupDate');
        $pickupDate = date('Y-m-d', strtotime($pickupDate));
        $pickupTime = $this->input->post('pickupTime');
        $pickupTime = date("H:i:s", strtotime($pickupTime)); //convert 12 hr to 24 hours

        $customername = trim($this->input->post('customername'));
        $customermobile = trim($this->input->post('customermobile'));
        $customeraddress = trim($this->input->post('customeraddress'));
        $deliveryareaid = $this->input->post('deliveryareaid');
        $deliveryDate = $this->input->post('deliveryDate');
        $deliveryDate = date('Y-m-d', strtotime($deliveryDate));
        $deliveryTime = $this->input->post('deliveryTime');
        $deliveryTime = date("H:i:s", strtotime($deliveryTime)); //convert 12 hr to 24 hours

        $referenceinvoice = trim($this->input->post('referenceinvoice'));
        $packagedescription = trim($this->input->post('packagedescription'));
        $deliverynote = trim($this->input->post('deliverynote'));

        $itemname_delivery = trim($this->input->post('itemname_delivery'));
        $quantity_delivery = $this->input->post('quantity_delivery');
        $unitprice_delivery = $this->input->post('unitprice_delivery');

        if ($quantity_delivery == '') {
            $unitprice_delivery = '';
        }

        /*
          $itemname = $this->input->post('itemname'); //array
          $quantity = $this->input->post('quantity'); //array
          $unitprice = $this->input->post('unitprice'); //array
          $final_array = array_map(NULL, $itemname, $quantity, $unitprice);
         * 
         */

        //order Track Number---------------------------------------------------------------------------
        $areaInfo = $this->db
                ->select('*')
                ->where('areaid', $deliveryareaid)
                ->get('areas')
                ->row();

        $OrderID = $this->db->select("*")->limit(1)->order_by('order_id', "DESC")->get("orders")->row();
        $lastOrderID = $OrderID->order_id;
        $lastOrderID=$lastOrderID+1;
        $track_number = strtoupper(substr($areaInfo->area_name, 0, 2)) . sprintf("%06d", $lastOrderID);

        $user_id = $this->session->userdata('user_id');

        $newOrder_Default = $this->db
                ->select('orderstateid')
                ->where('neworder_default', 1)
                ->get('order_state')
                ->row();


        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));

        $input = array(
            'track_number' => $track_number,
            'delivery_charge' => '0',
            'order_type_id' => $deliverytypeid,
            'seller_name' => $sellersname,
            'seller_mobile' => $sellersmobile,
            'seller_address' => $sellersaddress,
            'pickup_area_id' => $pickupareaid,
            'pickup_time' => $pickupDate . ' ' . $pickupTime,
            'customer_name' => $customername,
            'customer_mobile' => $customermobile,
            'customer_address' => $customeraddress,
            'delivery_area_id' => $deliveryareaid,
            'delivery_time' => $deliveryDate . ' ' . $deliveryTime,
            'reference_invoice' => $referenceinvoice,
            'package_description' => $packagedescription,
            'deliveryman_note' => $deliverynote,
            'is_client_order' => 1,
            'order_state_id' => $newOrder_Default->orderstateid,
            'user_id' => $user_id,
            'order_created_by' => $user_id,
            'created_at' => $cenvertedCurrentTime,
            'updated_at' => $cenvertedCurrentTime,
        );

        $response = $this->db->insert('orders', $input);
        $last_insert_id = $this->db->insert_id();

//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//exit();       
        //insert item delivery charge---------------------------------------------------------
        $orderItemCharge = array(
            'order_id' => $last_insert_id,
            'item_name' => $itemname_delivery,
            'quantity' => $quantity_delivery,
            'unit_price' => $unitprice_delivery,
            'total' => $quantity_delivery * $unitprice_delivery,
            'created_at' => $cenvertedCurrentTime,
        );
        $response2 = $this->db->insert('order_details', $orderItemCharge);

        //insert item price---------------------------------------------------------
        if (!empty($item)) {
            foreach ($item as $item2) {
                if (($item2['quantity'] != '' || $item2['quantity'] != 0) && ($item2['price'] != '' || $item2['price'] != 0)) {
                    $orderItem = array(
                        'order_id' => $last_insert_id,
                        'item_name' => $item2['itemname'],
                        'quantity' => $item2['quantity'],
                        'unit_price' => $item2['price'],
                        'total' => $item2['quantity'] * $item2['price'],
                        'created_at' => $cenvertedCurrentTime,
                    );
                    $response3 = $this->db->insert('order_details', $orderItem);
//                    echo '<pre>';
//                    print_r($orderItem);
//                    echo '</pre>';
                }
            }
        }

        $sess['success'] = 'Created Successfully!';
        $this->session->set_userdata($sess);
        redirect('client/dashboard/create_order');
    }

    public function ajax_data() {
        $request_data = $_GET['columns'];
//             echo '<pre>';
//             print_r($request_data);
//             echo '</pre>';
//             exit();
        $stage = $request_data[1]['search']['value']; //columns start from 0, so column 3 STAGE column for accounts
        $priority = $request_data[2]['search']['value']; //columns start from 0, so column 4  PRIORITY column for accounts
        if (isset($request_data[8]['search']['value']) && strlen($request_data[8]['search']['value']) > 0) {
            $adcmd = $request_data[8]['search']['value']; //columns start from 0, so column 8  ADC MD column for accounts		  
        }

        include_once(APPPATH . 'libraries/ssp.class.php');
//        $ssp = new SSP();
        $user_id = $this->session->userdata('user_id');
        $where = "user_id ='$user_id'";
//$result =$ssp->simple($_GET,$sql_details=null, $table, $primaryKey=null, $columns=null);
        $result = SSP::simple($_GET, $where);
//echo '<pre>';
//print_r($result);
//echo '</pre>';
//exit();
        echo json_encode($result);
    }

}

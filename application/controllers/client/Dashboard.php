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
        $per_page = 100;
        $page     = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $offset   = ($page - 1) * $per_page;

        // Total count (same conditions)
        $total = $this->db
            ->where('showing_status', 1)
            ->where('seller_name', $fullName)
            ->or_where('user_id', $this->session->userdata('user_id'))
            ->count_all_results('orders');

        $total_pages = ceil($total / $per_page);

        // Your data query
        $data['order'] = $this->db
            ->select('*')
            ->where('showing_status', 1)
            ->where('seller_name', $fullName)
            ->or_where('user_id', $this->session->userdata('user_id'))
            ->limit($per_page, $offset)
            ->order_by('order_id', 'desc')
            ->get('orders')
            ->result();

        $data['current_page'] = $page;
        $data['total_pages']  = $total_pages;

        $data['area_list'] = $this->db
                ->select('*')
                ->where('status',1)
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
//            print_r($_POST);
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
                ->where('status', 1)
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
        $result = $this->user_dashboard_model->client_delivery_list_search($data);

//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';
//        exit();

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
                
                $customerAddress = str_replace("\r", " ", $row['customer_address']);
                $customerAddress = str_replace("\n", " ", $customerAddress);

                $arrangeData['Track Number'] = $row['track_number'];
                $arrangeData['Invoice Ref'] = $row['reference_invoice'];
                $arrangeData['Customer Name'] = $row['customer_name'];
                $arrangeData['Customer Aobile'] = $row['customer_mobile'];
                $arrangeData['Customer Address'] = $customerAddress;
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
            
//            echo '<pre>';
//            print_r($dataToExports);
//            echo '</pre>';
//            exit();


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
                ->where('status', 1)
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
//        echo '<pre>';
//        print_r($_POST);
//        print_r($this->input->post());
//        echo '</pre>';
//        die();
        
        $item = $this->input->post('item'); //array

        $deliverytypeid = $this->input->post('deliverytypeid');
        $sellersname = $this->input->post('sellersname');
        $sellersmobile = $this->input->post('sellersmobile');
        $sellersaddress = trim($this->input->post('sellersaddress'));
        $pickupareaid = $this->input->post('pickupareaid');

        $pickupDate = $this->input->post('pickupDate');
        $pickupDate = date('Y-m-d', strtotime($pickupDate));
        $pickupTime = $this->input->post('pickupTime');
        $pickupTime = date("H:i:s", strtotime($pickupTime)); //convert 12 hr to 24 hours

        $customername = trim($this->input->post('customername'));
        $customermobile = trim($this->input->post('customermobile'));
        $customermobilealt = trim($this->input->post('customermobilealt'));
        $customeraddress = trim($this->input->post('customeraddress'));
        $deliveryareaid = trim($this->input->post('deliveryareaid'));
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
        
         //Getting details for api R
        $district=$this->input->post('district');
       $area=$this->input->post('area');
        $thana=$this->input->post('thana');
        $postcode=$this->input->post('postcode');
        $packagecode=$this->input->post('packagecode');
        
         $redx_area=$this->input->post('redex_area');
        $area_name_redx=$this->input->post('area_name_redx1');
        file_put_contents('delivarea.txt',$area_name_redx);
        $redx_postcode=$this->input->post('redex_postcode');
        $redx_packagecode=$this->input->post('redex_packagecode');
        
         $pathao_city=$this->input->post('pathao_city1');
        
        $pathao_zone=$this->input->post('pathao_zone1');

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
           'customer_mobile_alt' => $customermobilealt,
            
            'customer_address' => $customeraddress.' '.$district.' '.$thana.' '.$postcode,
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
        
        $orderItemCharge = array(
            'order_id' => '',
            'item_name' => $itemname_delivery,
            'quantity' => $quantity_delivery,
            'unit_price' => $unitprice_delivery,
            'total' => $quantity_delivery * $unitprice_delivery,
            'created_at' => $cenvertedCurrentTime,
        );
        
//        echo '<pre>';
//        print_r($areaInfo);
//        print_r($input);
//        print_r($_POST);
//        print_r($orderItemCharge);
//        echo '</pre>';
//        exit();

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
                    if($item2['item_code']==0){
                        $item_code='';
                    }else{                        
                        $item_code=$item2['item_code'];
                    }
                    $orderItem = array(
                        'order_id' => $last_insert_id,
                        'item_name' => $item2['itemname'],
                        'item_code' => $item_code,
                        'quantity' => $item2['quantity'],
                        'unit_price' => $item2['price'],
                        'total' => $item2['quantity'] * $item2['price'],
                        'created_at' => $cenvertedCurrentTime,
                    );
                    $response3 = $this->db->insert('order_details', $orderItem);
                    
                    if ($item_code != '') {
                        $productInfo = $this->db
                                ->where('item_code', $item_code)
                                ->get('product')
                                ->row();

                        if (!empty($productInfo)) {
                            $itemQtyOld=$productInfo->qty;
                            $remItemQty=$itemQtyOld-$item2['quantity'];

                            //update Product Qty by  item_code to product inventory-----------------------------------------
                            $responseInventory = $this->db
                                    ->where('item_code', $item_code)
                                    ->set('qty', $remItemQty)
                                    ->update('product');

                            //insert to product log----------------------------------------------------------------------
                            $inventoryLog = array(
                                'product_id' => 0,
                                'order_id' => $last_insert_id,
                                'category_id' => 0,
                                'name' => $item2['itemname'],
                                'item_code' => $item_code,
                                'qty' => $item2['quantity'],
                                'type' => 'New Order Create',
                                'created_by' => $this->session->userdata('user_id'),
                                'created_at' => $cenvertedCurrentTime,
                                'updated_at' => $cenvertedCurrentTime,
                            );
                            $responseInventoryLog = $this->db->insert('product_logs', $inventoryLog);
                        }
                    }
                    
                }
            }
        }
        $orderDetails = $this->db
        ->select('*')
        ->where('order_id', $orderItem['order_id'])
        ->get('order_details')
        ->result();
        $it = 1;
        $itemTotalPrice = 0;
        if (!empty($orderDetails)) {
            foreach ($orderDetails as $item) {
                if ($item->quantity != '' && $item->quantity != 0) {

                    $itemTotalPrice += $item->quantity * $item->unit_price;
            //$itemTotalPrice +=$item->total;
                 
                      
                    $it++;
                }
            }
        } 
		
		
		//echo $itemTotalPrice;
        
         //Call Ecourior api R
            $pp=$orderItem['total']+$orderItemCharge['total'];
            if ($deliveryareaid == "68") {
              //$sess['success'] = $deliveryareaid;
             $jayParsedAry = [
               "recipient_name" =>$customername, 
               "recipient_mobile" => $customermobile, 
               "recipient_city" =>$district, 
               "recipient_area" => $area, 
               "recipient_thana" => $thana, 
               "recipient_address" => $customeraddress, 
               "package_code" => $packagecode, 
               "product_price" => $itemTotalPrice, 
               "payment_method" => "COD",  
               "parcel_type" => "BOX", 
               "recipient_zip" => $postcode, 
               "comments" => $deliverynote,
               "special_instruction"=>$deliverynote ,
               "is_ipay"=>"1"
               
            ]; 
            
            $orderData=json_encode($jayParsedAry);
            //Test account details 
             //https://staging.ecourier.com.bd/api/order-place
               
               //live account details
              // https://backoffice.ecourier.com.bd/api/order-place
              
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://backoffice.ecourier.com.bd/api/order-place',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>json_encode($jayParsedAry),
              CURLOPT_HTTPHEADER => array(
                'API-SECRET: UYPm7',
                'API-KEY: XfRh',
                'USER-ID: C1721',
                'Content-Type: application/json'
              ),
            ));
            
            $response = curl_exec($curl);
            $id = $response["ID"];
            
            curl_close($curl);

            $msg = "Dear $customername,\n";
            $msg .= "Your order from red shop BD has been confirmed. We are processing your order parcel id -$id by ecourier."; 
            $msg .= "And amount is -$itemTotalPrice BDT  You will get a SMS once it gets ready for the delivery.";

            $res = $this->sendSMS($customermobile , $msg , $id);
            
            file_put_contents('ecouriorLogs.txt',"Client Order Data :$orderData  , Response:  .$response". PHP_EOL, FILE_APPEND);
            
           
            }else if($deliveryareaid == "130"){
              //Redx API integration 
                    
                 //Data array 
                  $redxData = [
                       "customer_name" =>$customername, 
                       "customer_phone" => $customermobile, 
                       "delivery_area" => $area_name_redx, 
                       "delivery_area_id" => $redx_area, 
                       "customer_address" => $customeraddress." ".$district." ". $redx_postcode,  
                       "cash_collection_amount" => $itemTotalPrice, 
                       "parcel_weight" => 500, 
                       "instruction" => $deliverynote,
                         "value"=> $itemTotalPrice
                    ]; 
                    $redxData1=json_encode($redxData);
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://openapi.redx.com.bd/v1.0.0-beta/parcel',
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'POST',
                      CURLOPT_POSTFIELDS =>json_encode($redxData),
                      CURLOPT_HTTPHEADER => array(
                        'API-ACCESS-TOKEN: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIyNTA0NDgiLCJpYXQiOjE2OTMxMTA5MjAsImlzcyI6ImVYNU5admpudjZPOEdqS0ltZ1c1QnZyUzJYUDNOVVJ6Iiwic2hvcF9pZCI6MjUwNDQ4LCJ1c2VyX2lkIjo2MDk3N30.1N7YfpdcBXII8Gj9vH2cA2KATsXkwSh3XPFhmfercpQ',
                        'Content-Type: application/json'
                      ),
                    ));
                    
                    $response = curl_exec($curl);
                    
                    curl_close($curl);
                file_put_contents('redxlogs.txt',"client Order Data :$redxData1  , Response:  .$response". PHP_EOL, FILE_APPEND);   
                    // Decode and save tracking ID
                $responseArray = json_decode($response, true);
                if ($responseArray && isset($responseArray['tracking_id'])) {
                    $redx_tracking_id = $responseArray['tracking_id'];
            
                    // Store in DB
                    $updateData = [
                        'redx_tracking_id' => $redx_tracking_id
                    ];
                    $this->db->where('order_id', $last_insert_id);
                    $this->db->update('orders', $updateData);

                    $msg = "Dear $customername,\n";
                            $msg .= "Your order from red shop BD has been confirmed. We are processing your order parcel id -$redx_tracking_id by Redx courier."; 
                            $msg .= "And amount is -$itemTotalPrice BDT  You will get a SMS once it gets ready for the delivery.";

                            $res = $this->sendSMS($customermobile , $msg , $redx_tracking_id );
                }
          }
            //API ends here R
            else if ($deliveryareaid == "126"){
                 //Pathao API starts here 
                 
                 $pathaoData = [
                        "store_id" => "64828",
                        "recipient_name" => $customername,
                        "recipient_phone" => $customermobile,
                        "recipient_address" =>$customeraddress." ".$district." ". $redx_postcode,
                        "recipient_city" => $pathao_city,
                        "recipient_zone" => $pathao_zone,
                        "delivery_type" => 48,
                        "item_type" => 2,
                        "special_instruction" => $deliverynote,
                        "item_quantity" => 1,
                        "item_weight" => "1",
                        "amount_to_collect" => 0,
                        "item_description" => $itemTotalPrice,
                    ];
                $pathoDataJson=json_encode($pathaoData);    
                 $curl = curl_init();
                 curl_setopt_array($curl, array(
                  CURLOPT_URL => 'https://api-hermes.pathao.com/aladdin/api/v1/orders',
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'POST',
                  CURLOPT_POSTFIELDS =>json_encode($pathaoData),
                  CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyODQxIiwianRpIjoiMWFmZWQ2YjdlOTQwZjY3YWQzZWY4YWIwMTRhZTNlM2FjN2FkMzA0NzMwOTJjMjYwY2Y5YzVhYzQ2OWI5YWZkM2VhMTE1NWU2MDViYjg4NGIiLCJpYXQiOjE3NTA5MjUzNTcuNzcwMDMsIm5iZiI6MTc1MDkyNTM1Ny43NzAwMzQsImV4cCI6MTc1ODcwMTM1Ny43NTY2LCJzdWIiOiI4NDgzMyIsInNjb3BlcyI6W119.VYvLk99MfdGkwlihLBLXMNoCUYcz_N5-rhVDe68RbjjHkd67_pXACOETYtM7xnuU-F5pzt7NWUgS130VzOyNPLofGKC4y1kXPhZKBXNxXt5lqzb-_wG06d1yFieCTpK7-hkaWROvWIPYgAqDFSDuhMVN_t9Ny_LywzHmx-Duyyhy_DglW2CpT1RHNfmMQSnByGYpGcjY6dvOQ94aysHWJNb_9tUj09IHoOj8TQ7c47piwE76l9mmgsJd9HVrQRs_uSjp8D4ISY3zuR95tcFHKQI5d8KcsUEB8W6No5IYAeI0DNNDGZMpRw81nhXvCix4A8-kxJQUG3Jcgg4X1X5ZcrHcL4Q89KC_BF4azm8CM5TVrn_hAS4UOtCsmKOicBpuA0208o88cUNZ0J6JxvVb3mnNnV54eIEX7j2PAoDA1y0W-l4UR8CWGcMhEbEooAkeGQAAJ2x0KovIY12Dtf8Bs997ASId3u8Plmd2aeiF3gvr6JX-wU3OeP1evjbBVPp82Sb9vYH1SOdOWPqwzpYnEVrgdxNXzjCKJzV-Gd9mxcjH-8rJ-0mimKMeHoTVsbAFs_3neK64elmg9WI-NcHYeV2wCVE8qOZEWYIU0AkNjDPuOw3YdqrUBPVcuEATFPbImCOunMwCkGYMmoCmZs7u--VgfoPB7JN4M2uCVoeY5l4',
                    'Content-Type: application/json'
                  ),
                ));
                
                $response = curl_exec($curl);
                
                curl_close($curl);
                //echo $response;
                 file_put_contents('pathaologs.txt',"client Order Data :$pathoDataJson  , Response:  .$response". PHP_EOL, FILE_APPEND); 
                     // Decode and save tracking ID
                    $responseArray = json_decode($response, true);
                    if (
                        $responseArray &&
                        isset($responseArray['code']) &&
                        $responseArray['code'] == 200 &&
                        isset($responseArray['data']['consignment_id'])
                    ) {
                        $pathao_consignment_id = $responseArray['data']['consignment_id'];
                
                        // Store in DB
                        $updateData = [
                            'pathao_consignment_id' => $pathao_consignment_id
                        ];
                        $this->db->where('order_id', $last_insert_id);
                        $this->db->update('orders', $updateData);

                        $msg = "Dear $customername,\n";
                            $msg .= "Your order from red shop BD has been confirmed. We are processing your order parcel id -$pathao_consignment_id by pathao courier."; 
                            $msg .= "And amount is -$itemTotalPrice BDT  You will get a SMS once it gets ready for the delivery.";

                            $res = $this->sendSMS($customermobile , $msg , $pathao_consignment_id );
                    }
                 //Pathao API ends here
             }
            else if($deliveryareaid == '133'){
                $useridForAPI = $this->session->userdata('user_id');
                $userinfoForAPI = $this->db
                ->select('*')
                ->where('userid', $useridForAPI)
                ->where('isactive', '1')
                ->get('users')
                ->row();
                // **Steadfast Courier API Integration**
                $steadfastData = [
                    "invoice" => $track_number, // Tracking ID is Percel ID
                    "recipient_name" => $customername,
                    "recipient_phone" => $customermobile,
                    "recipient_address" => $customeraddress . " " . $district . " " . $redx_postcode,
                    "cod_amount" => $itemTotalPrice,
                    "note" => $deliverynote
                ];
    
                $steadfastDataJson = json_encode($steadfastData);
                if (!empty($userinfoForAPI->steadfast_api_key) && !empty($userinfoForAPI->steadfast_api_secret)) {
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://portal.packzy.com/api/v1/create_order',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_POST => true,
                        CURLOPT_POSTFIELDS => $steadfastDataJson,
                        CURLOPT_HTTPHEADER => array(
                            "Api-Key: $userinfoForAPI->steadfast_api_key",
                            "Secret-Key: $userinfoForAPI->steadfast_api_secret",
                            "Content-Type: application/json"
                        ),
                    ));
                
                    $response = curl_exec($curl);
                    curl_close($curl);
                
                    file_put_contents('steadfastlogs.txt', "Admin Order Data: $steadfastDataJson, Response: $response" . PHP_EOL, FILE_APPEND);
                    // Store required info in database 
                    $responseArray = json_decode($response, true);
                    if ($responseArray && isset($responseArray['status']) && $responseArray['status'] == 200) {
                        if (isset($responseArray['consignment']['consignment_id'], $responseArray['consignment']['tracking_code'])) {
                            $steadfast_parcel_id = $responseArray['consignment']['consignment_id'];
                            $steadfast_tracking_id = $responseArray['consignment']['tracking_code'];
            
                            // Update the order only if response status is 200
                            $updateData = [
                                'steadfast_parcel_id' => $steadfast_parcel_id,
                                'steadfast_tracking_id' => $steadfast_tracking_id
                            ];
                            $this->db->where('order_id', $last_insert_id);
                            $this->db->update('orders', $updateData);

                             $msg = "Dear $customername,\n";
                            $msg .= "Your order from red shop BD has been confirmed. We are processing your order parcel id -$steadfast_parcel_id by staedfast courier."; 
                            $msg .= "And amount is -$itemTotalPrice BDT  You will get a SMS once it gets ready for the delivery.";

                            $res = $this->sendSMS($customermobile , $msg , $steadfast_parcel_id );
                        }
                    }
                } else {
                    file_put_contents('steadfastlogs.txt', "API Key or Secret is missing for User ID: $useridForAPI" . PHP_EOL, FILE_APPEND);
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

      private function sendSMS($numbers = null, $message = null, $invoice = "00000") {
        $hash = "0390d737d5de692f56b1b1b55205e2da";
        $sender = "8809617640017";
        $msisdn = $numbers;

        $params = [
            'msisdn' => $msisdn,
            'smstext' => $message,
            'apikey' => $hash,
            'sender' => $sender
        ];

        $url = "https://api.automas.com.bd/smsapiv3";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $timeNdate = gmdate("Y-m-d H:i", time() + 6*60*60);
        $this->db->insert('sms_log', array(
            'mobile' => $numbers,
            'invoice' => $invoice,
            'message' => $message,
            'response' => $response,
            'created_at' => $timeNdate,
        ));

        return $response;
    }

}

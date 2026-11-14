<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_client extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') && $this->session->userdata('user_type_id') != 3) {
            redirect(base_url());
        }
    }

    public function order_update() {

        $item = $this->input->post('item'); //array
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        exit();
        $order_id = $this->input->post('order_id');

        $order_type_id = $this->input->post('order_type_id');
        $sellersname = trim($this->input->post('seller_name'));
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




        //order Track Number---------------------------------------------------------------------------
        $areaInfo = $this->db
                ->select('*')
                ->where('areaid', $deliveryareaid)
                ->get('areas')
                ->row();

        $OrderID = $this->db->select("*")->limit(1)->order_by('order_id', "DESC")->get("orders")->row();
        $lastOrderID = $OrderID->order_id;
        $track_number = strtoupper(substr($areaInfo->area_name, 0, 2)) . sprintf("%06d", $lastOrderID);

        $user_id = $this->session->userdata('user_id');

        $newOrder_Default = $this->db
                ->select('orderstateid')
                ->where('neworder_default', 1)
                ->get('order_state')
                ->row();


        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));
        $update_order = array(
            'delivery_charge' => '0',
            'order_type_id' => $order_type_id,
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
            'order_state_id' => $newOrder_Default->orderstateid,
//            'user_id' => $user_id,
            'updated_at' => $cenvertedCurrentTime,
        );

        $response = $this->db
                ->where('order_id', $order_id)
                ->update('orders', $update_order);


        //update or insert item info-------------------------------------------------------------------------
        if (!empty($item)) {
            foreach ($item as $item2) {
                if (!isset($item2['order_details_id'])) { // insert new item
                    if (($item2['quantity'] != '' || $item2['quantity'] != 0) && ($item2['price'] != '' || $item2['price'] != 0)) {
                        $insertOrderItem = array(
                            'order_id' => $order_id,
                            'item_name' => $item2['itemname'],
                            'quantity' => $item2['quantity'],
                            'unit_price' => $item2['price'],
                            'total' => $item2['quantity'] * $item2['price'],
                            'created_at' => $cenvertedCurrentTime,
                        );
                        $response3 = $this->db->insert('order_details', $insertOrderItem);
//                    echo '<pre>';
//                    print_r($insertOrderItem);
//                    echo '</pre>';
//                    exit();
                    }
                } elseif (isset($item2['order_details_id'])) {//update item info
                    if (($item2['quantity'] != '' || $item2['quantity'] != 0) && ($item2['price'] != '' || $item2['price'] != 0)) {
                        $updateOrderItem = array(
                            'item_name' => $item2['itemname'],
                            'quantity' => $item2['quantity'],
                            'unit_price' => $item2['price'],
                            'total' => $item2['quantity'] * $item2['price'],
                            'updated_at' => $cenvertedCurrentTime,
                        );

                        $responseUpdateItem = $this->db
                                ->where('order_details_id', $item2['order_details_id'])
                                ->update('order_details', $updateOrderItem);
                    }
                }
            }
        }


        $sess['success'] = 'Updated Successfully!';
        $this->session->set_userdata($sess);
        redirect('client/order_client/order_edit/' . $order_id);
    }

//    public function order_edit($order_id) {
    public function order_edit($track_number) {
        $data = array();
        $data['menu'] = '';
        $user_id = $this->session->userdata('user_id');

        $data['orderinfo'] = $this->db
                ->select('*')
//                ->where('user_id', $user_id)
//                ->where('order_id', $order_id)
                ->where('track_number', $track_number)
                ->get('orders')
                ->row();

        if (empty($data['orderinfo'])) {
            redirect('client/dashboard');
        }
        $order_id = $data['orderinfo']->order_id;

        $data['orderItem'] = $this->db
                ->select('*')
                ->where('order_id', $order_id)
                ->get('order_details')
                ->result();

        $data['orderItemTotal'] = count($data['orderItem']);

        $data['orderType'] = $this->db
                ->select('*')
                ->where('order_type_id', $data['orderinfo']->order_type_id)
                ->get('order_type')
                ->row();
        $data['pickupArea'] = $this->db
                ->select('*')
                ->where('areaid', $data['orderinfo']->pickup_area_id)
                ->get('areas')
                ->row();
        $data['deliveryArea'] = $this->db
                ->select('*')
                ->where('areaid', $data['orderinfo']->delivery_area_id)
                ->get('areas')
                ->row();

        /* time convert to am/pm
          $currentDateTime = '08/04/2010 22:15:00';
          $currentDateTime = '22:15:00';
          echo $newDateTime = date('h:i A', strtotime($currentDateTime));
         * 
         */

        $data['delivery'] = $this->db
                ->select('*')
                ->get('order_type')
                ->result();
        $data['area'] = $this->db
                ->select('*')
                ->order_by('area_name', 'asc')
                ->get('areas')
                ->result();
        /*
          $data['order_assigned'] = $this->db
          ->select('*')
          ->where('order_id',$order_id)
          ->get('order_task_person')
          ->row();
         */

        $data['order_assigned'] = $this->db
                ->select('*')
                ->where('order_id', $order_id)
//                ->where('order_state_id',13) //unassigned order
                ->get('orders')
                ->row();
        
//        echo '<pre>';
//        print_r($data['order_assigned']);
//        echo '</pre>';
//        exit();


        $data['header'] = $this->load->view('dashboard-client/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-client/common/footer', $data, TRUE);
        $this->load->view('dashboard-client/edit-order', $data);
    }

}

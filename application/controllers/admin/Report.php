<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') && $this->session->userdata('user_type_id') != 1) {
            redirect(base_url());
        }
        $this->load->model('user_dashboard_model');
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
        
        $order_id=$data['order']->order_id;
        
        $data['order'] = $this->db
                ->select('*')
                ->where('track_number', $track_number)
                ->get('orders')
                ->row();


//            echo '<pre>';
//            print_r($data['order']);
//            echo '</pre>';
//            exit();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/report/order-details', $data);
    }

    public function delivery_list() {
        $data = array();
        $data['menu'] = '';

        $data['order'] = $this->db
                ->select('*')
//                    ->where('user_id',$user_id)
//                    ->where('user_id',92)
//                ->where('user_id', $this->session->userdata('user_id'))
                ->order_by('order_id', 'desc')
                ->get('orderlist')
                ->result();
        $data['area_list'] = $this->db
                ->select('*')
//                ->where('status', '1')
                ->order_by('area_name', 'asc')
                ->get('areas')
                ->result();

        $data['order_state'] = $this->db
                ->select('*')
//                    ->where('status',1)
                ->order_by('orderstatename', 'asc')
                ->get('order_state')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/report/delivery-list', $data);
    }

    public function search_list() {
        $data = array();

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
        $data['result'] = $this->user_dashboard_model->admin_delivery_list_search($data);

//            echo '<pre>';
//            print_r($data['result']);
//            print_r($_POST);
//            echo '</pre>';
//            exit();
//        $data['order'] = $this->db
//                ->select('*')
////                    ->where('user_id',$user_id)
////                ->where('user_id', 92)
//                ->order_by('order_id', 'desc')
//                ->get('orders')
//                ->result();
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

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/report/search-order-delivery', $data);
    }

    public function all_list_export() {
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
        $data = array();

//        $data['areaname'] = $areaname = $this->input->post('areaname');
//        $data['orderstatename'] = $orderstatename = $this->input->post('orderstatename');
//        $data['date_from'] = $this->input->post('date_from');
//        $data['date_to'] = $this->input->post('date_to');
//
//        $data['orderby'] = $orderby = $this->input->post('orderby');
//        $data['sortby'] = $sortby = $this->input->post('sortby');
        $result = $this->user_dashboard_model->admin_all_list($data);

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

                $customerAddress = str_replace("\r", " ", $row['customer_address']);
                $customerAddress = str_replace("\n", " ", $customerAddress);

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
            // set header
            $filename = "OrderReport-" . date('Y-d-m') . ".xls";
//  $filename = "dataToExport.xlsx";
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=\"$filename\"");
            $this->exportExcelData($dataToExports);
        } else {
            $sess['exception'] = 'No Record Found!';
            $this->session->set_userdata($sess);
            redirect('admin/report/delivery_list');
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

                $customerAddress = str_replace("\r", " ", $row['customer_address']);
                $customerAddress = str_replace("\n", " ", $customerAddress);

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

//                    echo '<pre>';
//        print_r($dataToExports);
//        echo '</pre>';
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
            redirect('admin/report/delivery_list');
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

    public function client_report() {
        $data = array();
        $data['menu'] = '';

        $data['clientlist'] = $this->db
                ->select('*')
//                ->where('user_type_id', '3')
//                ->or_where('user_type_id', '5')
                ->where('isactive', '1')
                ->order_by('email', 'asc')
                ->get('users')
                ->result();

//        $data['order'] = $this->db
//                ->select('*')
////                    ->where('user_id',$user_id)
////                    ->where('user_id',92)
////                ->where('user_id', $this->session->userdata('user_id'))
//                ->order_by('order_id', 'desc')
//                ->get('orderlist')
//                ->result();
//        $data['area_list'] = $this->db
//                ->select('*')
////                ->where('status', '1')
//                ->order_by('area_name', 'asc')
//                ->get('areas')
//                ->result();
//
//        $data['order_state'] = $this->db
//                ->select('*')
////                    ->where('status',1)
//                ->order_by('orderstatename', 'asc')
//                ->get('order_state')
//                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/report/client-report', $data);
    }

    public function client_order_report() {

        $data = array();
        $data['menu'] = '';

        $data['clientlist'] = $this->db
                ->select('*')
//                ->where('user_type_id', '3')
//                ->or_where('user_type_id', '5')
                ->where('isactive', '1')
                ->order_by('email', 'asc')
                ->get('users')
                ->result();

//        $data['user_id'] = $user_id =91;
        $data['user_id'] = $user_id = $this->input->post('user_id');

        $date_from = $this->input->post('date_from');
        $data['dateFrom'] = $date_from = date("Y-m-d", strtotime($date_from));
        $date_from2 = $date_from . ' ' . '00:00:00';

        $data['date_from'] = $date_from2;

        $date_to = $this->input->post('date_to');
        $data['dateTo'] = $date_to = date("Y-m-d", strtotime($date_to));
        $date_to2 = $date_to . ' ' . '00:00:00';

        $data['date_to'] = $date_to2;


        $data['result'] = $result = $this->user_dashboard_model->order_report_by_client($data);

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/report/client-report-result', $data);

//        echo '<pre>';
////        print_r($data);
//        print_r($result);
//        echo '</pre>';
    }

}

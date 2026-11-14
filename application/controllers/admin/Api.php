<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        header('Content-Type: application/json');
    }
    public function get_address() {
        $this->load->model('daynamic_order_model');
        $result = $this->daynamic_order_model->getUserAddress();
        echo json_encode($result);
    }

    public function get_order(){
        $this->load->model('daynamic_order_model');
        $result = $this->daynamic_order_model->getOrder();
        // echo $_GET['id'] ?? 'No ID provided';
        echo json_encode($result);
    }
        public function get_invoice(){
        $this->load->model("daynamic_order_model");
        $result = $this->daynamic_order_model->get_invoice_Data();
        echo json_encode($result );
    }
}
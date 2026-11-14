<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
    public function __construct() {
        parent::__construct();
//        if ($this->session->userdata('user_id')) {
//            redirect('home');
//        }
        $this->load->model('user_model');
        $this->load->helper('cookie');
    }

//    public function index() {
//        $data = array();
//        $data['header'] = $this->load->view('frontend/common/header', $data, TRUE);
//        $data['footer'] = $this->load->view('frontend/common/footer', $data, TRUE);
//        $this->load->view('frontend/home/home-view', $data);
//    }
    public function index() {
        $data = array();

        $data['team'] = $this->user_model->rider_team();
        $data['testimonial']= $this->user_model->testimonial();
        $data['partner']= $this->user_model->partner();
        
        $data['delivery'] = $this->db
                ->select('*')
                ->where('id',2)
                ->get('delivery_charge')
                ->row();
        
        $data['area']=json_decode($data['delivery']->area);
        $data['delivery_name']=json_decode($data['delivery']->delivery_name);
        $data['timing']=json_decode($data['delivery']->timing);
        $data['bdt_kg']=(array)json_decode($data['delivery']->bdt_kg);
        $data['additional']=json_decode($data['delivery']->additional_perkg);
        
        
        $data['price'] = $this->db
                ->select('*')
                ->where('id',2)
                ->get('regular_price')
                ->row();
        $data['area2']=json_decode($data['price']->area);
        $data['delivery_name2']=json_decode($data['price']->delivery_name);
        $data['timing2']=json_decode($data['price']->timing);
        $data['bdt_kg2']=(array)json_decode($data['price']->bdt_kg);
        $data['additional2']=json_decode($data['price']->additional_perkg);
        

        $data['header'] = $this->load->view('frontend/home/header', $data, TRUE);
        $data['footer'] = $this->load->view('frontend/home/footer', $data, TRUE);
        $this->load->view('frontend/home/home-view', $data);
    }

    public function order_track() {

        $tracknumber = trim($this->input->post('tracknumber'));
        $data['result'] = $this->db
                ->select('*')
                ->where('track_number', $tracknumber)
                ->get('orders')
                ->row();

        if (empty($data['result'])) {
            $sess['exception'] = 'No record found!';
            $this->session->set_userdata($sess);
        }
//           echo '<pre>';
//           print_r($data['result']);
//           echo '</pre>';

        $data['header'] = $this->load->view('frontend/common/header', $data, TRUE);
        $data['footer'] = $this->load->view('frontend/common/footer', $data, TRUE);
        $this->load->view('frontend/home-order-track', $data);
    }

    public function order_comments() {
        $order_id = $this->input->post('order_id');
        if (!isset($order_id)) {
            redirect('home');
        }
        $fullname = trim($this->input->post('fullname'));
        $comment = trim($this->input->post('comment'));

        $input = array(
            'order_id' => $order_id,
            'Fullname' => $fullname,
            'Comment' => $comment,
        );

        $response = $this->db->insert('order_comments', $input);

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);


            $data['result'] = $this->db
                    ->select('*')
                    ->where('order_id', $order_id)
                    ->get('orders')
                    ->row();

            $data['header'] = $this->load->view('frontend/common/header', $data, TRUE);
            $data['footer'] = $this->load->view('frontend/common/footer', $data, TRUE);
            $this->load->view('frontend/home-order-track', $data);
        }
    }

}

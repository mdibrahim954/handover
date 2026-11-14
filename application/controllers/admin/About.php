<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') && $this->session->userdata('user_type_id') != 1) {
            redirect(base_url());
        }
//        $this->load->model('user_model');
    }

    public function index() {
        $this->load->library('form_validation');
        $data = array();
        $data['menu'] = 'web';
        $user_id = $this->session->userdata('user_id');

        $data['about'] = $this->db
                ->select('*')
                ->where('id',1)
                ->get('about_us')
                ->row();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/about-us/about-us-view', $data);
    }


    public function about_update() {
        $data = array();
        $data['description'] = $description = $this->input->post('description');

        

        $response = $this->db
                ->where('id',1)
                ->update('about_us',$data);

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/about');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/about');
        }
    }


}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

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

        $data['testimonial'] = $this->db
                ->select('*')
                ->get('testimonial')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/website/price-view', $data);
    }

    public function delivery_charge_save() {
        $data = array();

        $data['name'] = $name = $this->input->post('name');
        $data['description'] = $description = $this->input->post('description');

        $response = $this->db->insert('delivery_charge', $data);

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/website');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/website');
        }
    }

}
